<?php
class ControllerExtensionFeedPSGoogleSitemap extends Controller
{
    /**
     * Generates and outputs the Google Sitemap XML.
     *
     * This method checks if the sitemap feature is enabled in the configuration.
     * If it is, it initializes the XMLWriter, sets the XML header, and populates
     * the sitemap with URLs for products, categories, manufacturers, and
     * information pages based on the active languages.
     *
     * @return void
     */
    public function index()
    {
        if (!$this->config->get('feed_ps_google_sitemap_status')) {
            return;
        }

        $this->load->model('setting/setting');
        $this->load->model('localisation/language');

        $languages = $this->model_localisation_language->getLanguages();

        $language_id = (int) $this->config->get('config_language_id');
        $old_language_id = $language_id;

        if (isset($this->request->get['language']) && isset($languages[$this->request->get['language']])) {
            $cur_language = $languages[$this->request->get['language']];

            $language_id = $cur_language['language_id'];
        }

        $this->config->set('config_language_id', $language_id);


        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->startDocument('1.0', 'UTF-8');

        $xml->startElement('urlset');
        $xml->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $xml->writeAttribute('xmlns:image', 'http://www.google.com/schemas/sitemap-image/1.1');

        #region Product
        if ($this->model_setting_setting->getSettingValue('feed_ps_google_sitemap_product', $this->config->get('config_store_id'))) {
            $this->load->model('catalog/product');
            $this->load->model('tool/image');

            // Fetch products in chunks to handle large datasets
            $products = $this->model_catalog_product->getProducts();

            foreach ($products as $product) {
                if (0 === (int) $product['status']) {
                    continue;
                }

                $xml->startElement('url');
                $product_url = $this->url->link('product/product', 'product_id=' . $product['product_id']);
                $xml->writeElement('loc', str_replace('&amp;', '&', $product_url));
                $xml->writeElement('lastmod', date('Y-m-d\TH:i:sP', strtotime($product['date_modified'])));

                if (!empty($product['image'])) {
                    $xml->startElement('image:image');
                    $xml->writeElement('image:loc', $this->model_tool_image->resize(
                        html_entity_decode($product['image'], ENT_QUOTES, 'UTF-8'),
                        $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_width'),
                        $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_height')
                    ));
                    $xml->endElement();
                }

                $xml->endElement();
            }
        }
        #endregion


        #region Category
        if ($this->model_setting_setting->getSettingValue('feed_ps_google_sitemap_category', $this->config->get('config_store_id'))) {
            $this->load->model('catalog/category');

            $this->getCategories($xml, 0);
        }
        #endregion

        #region Manufacturer
        if ($this->model_setting_setting->getSettingValue('feed_ps_google_sitemap_manufacturer', $this->config->get('config_store_id'))) {
            $this->load->model('catalog/manufacturer');

            $manufacturers = $this->model_catalog_manufacturer->getManufacturers();

            foreach ($manufacturers as $manufacturer) {
                $xml->startElement('url');
                $manufacturer_url = $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $manufacturer['manufacturer_id']);
                $xml->writeElement('loc', str_replace('&amp;', '&', $manufacturer_url));
                $xml->endElement();
            }
        }
        #endregion

        #region Information
        if ($this->model_setting_setting->getSettingValue('feed_ps_google_sitemap_information', $this->config->get('config_store_id'))) {
            $this->load->model('catalog/information');

            $informations = $this->model_catalog_information->getInformations();

            foreach ($informations as $information) {
                if (0 === (int) $information['status']) {
                    continue;
                }

                $xml->startElement('url');
                $information_url = $this->url->link('information/information', 'information_id=' . $information['information_id']);
                $xml->writeElement('loc', str_replace('&amp;', '&', $information_url));
                $xml->endElement();
            }
        }
        #endregion

        $xml->endElement();
        $xml->endDocument();

        $this->config->set('config_language_id', $old_language_id);

        $this->response->addHeader('Content-Type: application/xml');
        $this->response->setOutput($xml->outputMemory());

        unset($xml);
    }

    /**
     * Recursively retrieves categories and appends them as XML elements.
     *
     * This method generates XML elements for each category with a status of 'active'
     * and appends them to the given XMLWriter instance. It includes child categories by
     * calling itself recursively.
     *
     * @param \XMLWriter $xml      The XMLWriter instance used to write the XML structure.
     * @param string     $language The language code to use in the URL link for each category.
     * @param int        $parent_id The ID of the parent category, used for retrieving child categories.
     *
     * @return void
     */
    protected function getCategories($xml, $parent_id)
    {
        $categories = $this->model_catalog_category->getCategories($parent_id);

        foreach ($categories as $category) {
            if (0 === (int) $category['status']) {
                continue;
            }

            $xml->startElement('url');
            $category_url = $this->url->link('product/category', 'path=' . $category['category_id']);
            $xml->writeElement('loc', str_replace('&amp;', '&', $category_url));
            $xml->writeElement('lastmod', date('Y-m-d\TH:i:sP', strtotime($category['date_modified'])));
            $xml->endElement();

            $this->getCategories($xml, $category['category_id']);
        }
    }
}

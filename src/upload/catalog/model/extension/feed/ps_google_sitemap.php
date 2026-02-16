<?php
class ModelExtensionFeedPSGoogleSitemap extends Model
{
    public function getProducts()
    {
        $sql = "SELECT `p`.`product_id`, `p`.`date_modified`, `p`.`image` FROM `" . DB_PREFIX . "product` `p`
        LEFT JOIN `" . DB_PREFIX . "product_to_store` `p2s` ON (`p`.`product_id` = `p2s`.`product_id`)
        WHERE `p2s`.`store_id` = '" . (int) $this->config->get('config_store_id') . "' AND `p`.`status` = '1' AND `p`.`date_available` <= NOW()";

        $key = md5($sql);

        $product_data = $this->cache->get('product.' . $key);

        if (!$product_data) {
            $query = $this->db->query($sql);

            $product_data = $query->rows;

            $this->cache->set('product.' . $key, $product_data);
        }

        return $product_data;
    }

    public function getProductImages($data, $max_images = 10)
    {
        $query = $this->db->query("SELECT `product_id`, `image` FROM `" . DB_PREFIX . "product_image` WHERE `product_id` IN ('" . implode("','", $data) . "')");

        $result = array();

        foreach ($query->rows as $row) {
            $product_id = (int) $row['product_id'];

            if (!isset($result[$product_id])) {
                $result[$product_id] = array();
            }

            if (count($result[$product_id]) < $max_images) {
                $result[$product_id][] = $row;
            }
        }

        return $result;
    }


    public function getManufacturers()
    {
        $sql = "SELECT m.`manufacturer_id`, m.`image` FROM `" . DB_PREFIX . "manufacturer` `m`
        LEFT JOIN `" . DB_PREFIX . "manufacturer_to_store` `m2s` ON (`m`.`manufacturer_id` = `m2s`.`manufacturer_id`)
        WHERE `m2s`.`store_id` = '" . (int) $this->config->get('config_store_id') . "'";

        $key = md5($sql);

        $manufacturer_data = $this->cache->get('manufacturer.' . $key);

        if (!$manufacturer_data) {
            $query = $this->db->query($sql);

            $manufacturer_data = $query->rows;

            $this->cache->set('manufacturer.' . $key, $manufacturer_data);
        }

        return $manufacturer_data;
    }

    public function getInformations()
    {
        $sql = "SELECT `i`.`information_id` FROM `" . DB_PREFIX . "information` `i`
        LEFT JOIN `" . DB_PREFIX . "information_to_store` `i2s` ON (`i`.`information_id` = `i2s`.`information_id`)
        WHERE `i`.`status` = '1' AND `i2s`.`store_id` = '" . (int) $this->config->get('config_store_id') . "'";

        $key = md5($sql);

        $information_data = $this->cache->get('information.' . $key);

        if (!$information_data) {
            $query = $this->db->query($sql);

            $information_data = $query->rows;

            $this->cache->set('information.' . $key, $information_data);
        }

        return $information_data;
    }

    public function getCategories($parent_id = 0)
    {
        $sql = "SELECT `c`.`category_id`, `c`.`date_modified`, `c`.`image` FROM `" . DB_PREFIX . "category` `c`
        LEFT JOIN `" . DB_PREFIX . "category_to_store` `c2s` ON (`c`.`category_id` = `c2s`.`category_id`)
        WHERE `c`.`parent_id` = '" . (int) $parent_id . "' AND `c`.`status` = '1' AND `c2s`.`store_id` = '" . (int) $this->config->get('config_store_id') . "'";

        $key = md5($sql);

        $category_data = $this->cache->get('category.' . $key);

        if (!$category_data) {
            $query = $this->db->query($sql);

            $category_data = $query->rows;

            $this->cache->set('category.' . $key, $category_data);
        }

        return $category_data;
    }
}

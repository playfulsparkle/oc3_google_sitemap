<?php
// Heading
$_['heading_title']                = 'Playful Sparkle - خريطة موقع جوجل';
$_['heading_robotstxt']            = 'Robots.txt';
$_['heading_product']              = 'المنتجات';
$_['heading_category']             = 'الفئات';
$_['heading_manufacturer']         = 'المصنعون';
$_['heading_information']          = 'المعلومات';
$_['heading_getting_started']      = 'ابدأ';
$_['heading_setup']                = 'إعداد خريطة موقع جوجل';
$_['heading_troubleshot']          = 'استكشاف الأخطاء وإصلاحها الشائعة';
$_['heading_faq']                  = 'الأسئلة الشائعة';
$_['heading_contact']              = 'اتصل بالدعم';

// Text
$_['text_extension']               = 'الإضافات';
$_['text_success']                 = 'نجاح: لقد قمت بتعديل تغذية خريطة موقع جوجل!';
$_['text_htaccess_update_success'] = 'نجاح: تم تحديث ملف .htaccess بنجاح.';
$_['text_edit']                    = 'تحرير خريطة موقع جوجل';
$_['text_clear']                   = 'مسح قاعدة البيانات';
$_['text_getting_started']         = '<p><strong>نظرة عامة:</strong> تساعد خريطة موقع جوجل لـ OpenCart 3.x في تعزيز رؤية متجرك من خلال إنشاء خرائط مواقع XML محسّنة. تساعد خرائط المواقع هذه محركات البحث مثل جوجل في فهرسة الصفحات الرئيسية لموقعك، مما يؤدي إلى تحسين تصنيفات محركات البحث وزيادة التواجد عبر الإنترنت.</p><p><strong>المتطلبات:</strong> OpenCart 3.x+، PHP 7.3 أو أعلى، والوصول إلى <a href="https://search.google.com/search-console/about?hl=en" target="_blank" rel="external noopener noreferrer">وحدة تحكم بحث جوجل</a> لإرسال خريطة الموقع.</p>';
$_['text_setup']                   = '<p><strong>إعداد خريطة موقع جوجل:</strong> قم بتكوين خريطة موقعك لتضمين صفحات المنتجات والفئات والمصنعين والمعلومات حسب الحاجة. قم بتبديل الخيارات لتمكين أو تعطيل أنواع الصفحات هذه في إخراج خريطة الموقع، وتخصيص محتوى خريطة الموقع ليناسب احتياجات جمهور متجرك.</p>';
$_['text_troubleshot']             = '<ul><li><strong>الإضافة:</strong> تأكد من تمكين إضافة خريطة موقع جوجل في إعدادات OpenCart الخاصة بك. إذا تم تعطيل الإضافة، فلن يتم إنشاء إخراج خريطة الموقع.</li><li><strong>المنتج:</strong> إذا كانت صفحات المنتجات مفقودة من خريطة موقعك، فتأكد من تمكينها في إعدادات الإضافة وأن حالة المنتجات ذات الصلة مضبوطة على "تمكين".</li><li><strong>الفئة:</strong> إذا كانت صفحات الفئات لا تظهر، فتحقق من تمكين الفئات في إعدادات الإضافة وأن حالتها مضبوطة أيضًا على "تمكين".</li><li><strong>المصنع:</strong> بالنسبة لصفحات المصنعين، تحقق من تمكينها في إعدادات الإضافة وأن حالة المصنعين مضبوطة على "تمكين".</li><li><strong>المعلومات:</strong> إذا كانت صفحات المعلومات لا تظهر في خريطة الموقع، فتأكد من تمكينها في إعدادات الإضافة وأن حالتها مضبوطة على "تمكين".</li></ul>';
$_['text_faq']                     = '<details><summary>كيف يمكنني إرسال خريطة موقعي إلى وحدة تحكم بحث جوجل؟</summary>في وحدة تحكم بحث جوجل، انتقل إلى <em>خرائط المواقع</em> في القائمة، وأدخل عنوان URL لخريطة الموقع (عادةً /sitemap.xml)، وانقر فوق <em>إرسال</em>. سيؤدي هذا إلى إخطار جوجل لبدء الزحف إلى موقعك.</details><details><summary>لماذا تعتبر خريطة الموقع مهمة لتحسين محركات البحث؟</summary>توجه خريطة الموقع محركات البحث إلى أهم صفحات موقعك، مما يسهل عليها فهرسة المحتوى الخاص بك بدقة، مما قد يؤثر إيجابًا على ترتيب البحث.</details><details><summary>هل يتم تضمين الصور في خريطة الموقع؟</summary>نعم، يتم تضمين الصور في خريطة الموقع التي تم إنشاؤها بواسطة هذه الإضافة، مما يضمن أن محركات البحث يمكنها فهرسة المحتوى المرئي الخاص بك جنبًا إلى جنب مع عنوان url.</details><details><summary>لماذا تستخدم خريطة الموقع <em>lastmod</em> بدلاً من <em>priority</em> و <em>changefreq</em>؟</summary>تتجاهل جوجل الآن قيم <priority> و <changefreq>، وتركز بدلاً من ذلك على <lastmod> لضمان تحديث المحتوى. تساعد استخدام <lastmod> في تحديد أولويات التحديثات الأخيرة.</details>';
$_['text_contact']                 = '<p>للحصول على مزيد من المساعدة، يرجى التواصل مع فريق الدعم لدينا:</p><ul><li><strong>الاتصال:</strong> <a href="mailto:%s">%s</a></li><li><strong>التوثيق:</strong> <a href="%s" target="_blank" rel="noopener noreferrer">توثيق المستخدم</a></li></ul>';
$_['text_user_agent_any']          = 'أي وكيل مستخدم';
$_['text_allowed']                 = 'مسموح به: %s';
$_['text_disallowed']              = 'غير مسموح به: %s';

// Tab
$_['tab_general']                  = 'عام';
$_['tab_help_and_support']         = 'المساعدة والدعم';
$_['tab_data_feed_url']            = 'عنوان URL لتغذية البيانات';
$_['tab_data_feed_seo_url']        = 'عنوان URL لتغذية البيانات صديق لمحركات البحث';

// Entry
$_['entry_status']                 = 'الحالة';
$_['entry_product']                = 'المنتج';
$_['entry_product_images']         = 'تصدير صور المنتج';
$_['entry_max_product_images']     = 'الحد الأقصى لصور المنتج';
$_['entry_category']               = 'الفئة';
$_['entry_category_images']        = 'تصدير صور الفئة';
$_['entry_manufacturer']           = 'المصنع';
$_['entry_manufacturer_images']    = 'تصدير صورة المصنع';
$_['entry_information']            = 'المعلومات';
$_['entry_data_feed_url']          = 'عنوان URL لتغذية البيانات';
$_['entry_active_store']           = 'المتجر النشط';
$_['entry_htaccess_mod']           = '.htaccess تعديل';
$_['entry_validation_results']     = 'نتائج التحقق';
$_['entry_user_agent']             = 'وكيل المستخدم';

// Button
$_['button_patch_htaccess']        = 'تصحيح .htaccess';
$_['button_validate_robotstxt']    = 'التحقق من صحة قواعد Robots.txt';

// Help
$_['help_copy']                    = 'نسخ عنوان URL';
$_['help_open']                    = 'فتح عنوان URL';
$_['help_product_images']          = 'قد يؤدي تصدير صور المنتج إلى زيادة وقت المعالجة مبدئيًا (فقط عند معالجة الصور للمرة الأولى)، وسيكون حجم ملف XML لخريطة الموقع أكبر نتيجة لذلك.';
$_['help_htaccess_mod']            = 'يتطلب عنوان URL لتغذية البيانات الصديق لمحركات البحث تعديل ملف .htaccess الخاص بك. يمكنك إضافة الكود المطلوب يدويًا عن طريق نسخه ولصقه في ملف .htaccess الخاص بك، أو ببساطة النقر فوق الزر البرتقالي "تصحيح .htaccess" لتطبيق التغييرات تلقائيًا.';

// Error
$_['error_permission']             = 'تحذير: ليس لديك إذن لتعديل تغذية خريطة موقع جوجل!';
$_['error_htaccess_update']        = 'تحذير: حدث خطأ أثناء تحديث ملف .htaccess. يرجى التحقق من أذونات الملف والمحاولة مرة أخرى.';
$_['error_store_id']               = 'تحذير: النموذج لا يحتوي على store_id!';
$_['error_max_product_images_min'] = 'لا يمكن أن تكون قيمة الحد الأقصى لصور المنتج أقل من الصفر.';

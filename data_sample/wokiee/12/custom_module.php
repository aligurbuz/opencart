<?php 

$language_id = 2;
foreach($data['languages'] as $language) {
	if($language['language_id'] != 1) {
		$language_id = $language['language_id'];
	}
}

$output = array();
$output["custom_module_module"] = array (
  1 => 
  array (
    'type' => '2',
    'block_heading' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'block_content' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'html' => 
    array (
      1 => '&lt;div class=&quot;tt-footer-custom tt-color-scheme-04&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;tt-row&quot;&gt;
      &lt;div class=&quot;tt-col-left&quot;&gt;
        &lt;div class=&quot;tt-col-item tt-logo-col&quot;&gt;
          &lt;a class=&quot;tt-logo tt-logo-alignment&quot; href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/custom/logo-white.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
        &lt;/div&gt;
        &lt;div class=&quot;tt-col-item&quot;&gt;
          &lt;div class=&quot;tt-box-copyright&quot;&gt;
            &amp;copy; Wokiee 2019. All Rights Reserved
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;tt-col-right&quot;&gt;
        &lt;div class=&quot;tt-col-item&quot;&gt;
          &lt;ul class=&quot;tt-payment-list&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt;&lt;span class=&quot;icon-Stripe2&quot;&gt;&lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt; &lt;span class=&quot;icon-paypal-22&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt;&lt;span class=&quot;icon-visa2&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt;&lt;span class=&quot;icon-mastercard2&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path13&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt;&lt;span class=&quot;icon-discover2&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path13&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path14&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path15&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path16&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt;&lt;span class=&quot;icon-american-express2&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
          &lt;/ul&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;tt-footer-custom tt-color-scheme-04&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;tt-row&quot;&gt;
      &lt;div class=&quot;tt-col-left&quot;&gt;
        &lt;div class=&quot;tt-col-item tt-logo-col&quot;&gt;
          &lt;a class=&quot;tt-logo tt-logo-alignment&quot; href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/custom/logo-white.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
        &lt;/div&gt;
        &lt;div class=&quot;tt-col-item&quot;&gt;
          &lt;div class=&quot;tt-box-copyright&quot;&gt;
            &amp;copy; Wokiee 2019. All Rights Reserved
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;tt-col-right&quot;&gt;
        &lt;div class=&quot;tt-col-item&quot;&gt;
          &lt;ul class=&quot;tt-payment-list&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt;&lt;span class=&quot;icon-Stripe2&quot;&gt;&lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt; &lt;span class=&quot;icon-paypal-22&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt;&lt;span class=&quot;icon-visa2&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt;&lt;span class=&quot;icon-mastercard2&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path13&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt;&lt;span class=&quot;icon-discover2&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path13&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path14&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path15&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path16&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt;&lt;span class=&quot;icon-american-express2&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
          &lt;/ul&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
    ),
    'layout_id' => '99999',
    'position' => 'bottom',
    'status' => '1',
    'sort_order' => '',
  ),
  2 => 
  array (
    'type' => '2',
    'block_heading' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'block_content' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'html' => 
    array (
      1 => '&lt;div class=&quot;tt-promo-fixed&quot;&gt;
    &lt;button class=&quot;tt-btn-close&quot;&gt;&lt;/button&gt;
    &lt;div class=&quot;tt-img&quot;&gt;
      &lt;a href=&quot;#&quot;&gt;&lt;img  src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/product/product-14.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
    &lt;/div&gt;
    &lt;div class=&quot;tt-description&quot;&gt;
      &lt;div class=&quot;tt-box-top&quot;&gt;
        &lt;p&gt;
          Someone purchased a
        &lt;/p&gt;
        &lt;p&gt;
          &lt;a href=&quot;#&quot;&gt;
            iPod Classic
          &lt;/a&gt;
        &lt;/p&gt;
      &lt;/div&gt;
      &lt;div class=&quot;tt-info&quot;&gt;
        14 Minutes ago from  New York, USA
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;',
      $language_id => '&lt;div class=&quot;tt-promo-fixed&quot;&gt;
    &lt;button class=&quot;tt-btn-close&quot;&gt;&lt;/button&gt;
    &lt;div class=&quot;tt-img&quot;&gt;
      &lt;a href=&quot;#&quot;&gt;&lt;img  src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/product/product-14.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
    &lt;/div&gt;
    &lt;div class=&quot;tt-description&quot;&gt;
      &lt;div class=&quot;tt-box-top&quot;&gt;
        &lt;p&gt;
          Someone purchased a
        &lt;/p&gt;
        &lt;p&gt;
          &lt;a href=&quot;#&quot;&gt;
            iPod Classic
          &lt;/a&gt;
        &lt;/p&gt;
      &lt;/div&gt;
      &lt;div class=&quot;tt-info&quot;&gt;
        14 Minutes ago from  New York, USA
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;',
    ),
    'layout_id' => '1',
    'position' => 'header_notice',
    'status' => '1',
    'sort_order' => '',
  ),
  3 => 
  array (
    'type' => '2',
    'block_heading' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'block_content' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'html' => 
    array (
      1 => '&lt;div class=&quot;tt-collapse open&quot;&gt;
  &lt;h3 class=&quot;tt-collapse-title&quot;&gt;TAGS&lt;/h3&gt;
  &lt;div class=&quot;tt-collapse-content&quot; style=&quot;&quot;&gt;
    &lt;ul class=&quot;tt-list-inline&quot;&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Dresses&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Shirts &amp;amp; Tops&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Polo Shirts&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Sweaters&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Blazers&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Vests&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Jackets&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Outerwear&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Activewear&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Pants&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Jumpsuits&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Shorts&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Jeans&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Skirts&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Swimwear&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;tt-collapse open&quot;&gt;
  &lt;h3 class=&quot;tt-collapse-title&quot;&gt;TAGS&lt;/h3&gt;
  &lt;div class=&quot;tt-collapse-content&quot; style=&quot;&quot;&gt;
    &lt;ul class=&quot;tt-list-inline&quot;&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Dresses&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Shirts &amp;amp; Tops&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Polo Shirts&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Sweaters&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Blazers&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Vests&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Jackets&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Outerwear&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Activewear&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Pants&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Jumpsuits&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Shorts&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Jeans&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Skirts&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Swimwear&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
  &lt;/div&gt;
&lt;/div&gt;',
    ),
    'layout_id' => '3',
    'position' => 'column_left',
    'status' => '1',
    'sort_order' => '10',
  ),
  4 => 
  array (
    'type' => '2',
    'block_heading' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'block_content' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'html' => 
    array (
      1 => '&lt;div class=&quot;tt-content-aside&quot;&gt;
  &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-03&quot;&gt;
    &lt;img src=&quot;image/catalog/wokiee/custom/listing_promo_img_07.jpg&quot; alt=&quot;&quot; class=&quot;loading&quot; data-was-processed=&quot;true&quot;&gt;
  &lt;/a&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;tt-content-aside&quot;&gt;
  &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-03&quot;&gt;
    &lt;img src=&quot;image/catalog/wokiee/custom/listing_promo_img_07.jpg&quot; alt=&quot;&quot; class=&quot;loading&quot; data-was-processed=&quot;true&quot;&gt;
  &lt;/a&gt;
&lt;/div&gt;',
    ),
    'layout_id' => '3',
    'position' => 'column_left',
    'status' => '1',
    'sort_order' => '11',
  ),
  5 => 
  array (
    'type' => '2',
    'block_heading' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'block_content' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'html' => 
    array (
      1 => '&lt;header&gt;
  &lt;!-- tt-top-panel --&gt;
  &lt;div class=&quot;tt-top-panel&quot;&gt;
    &lt;div class=&quot;container&quot;&gt;
      &lt;div class=&quot;tt-row&quot;&gt;
        &lt;div class=&quot;tt-description&quot;&gt;
          20% STUDENT DISCOUNT PLUS FREE NEXT DAY DELIVEY, EXCLUDES SALE. &lt;a href=&quot;#&quot;&gt;DETAILS&lt;/a&gt;
        &lt;/div&gt;
        &lt;button class=&quot;tt-btn-close&quot;&gt;&lt;/button&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
  &lt;!-- /tt-top-panel --&gt;
&lt;/header&gt;',
      $language_id => '&lt;header&gt;
  &lt;!-- tt-top-panel --&gt;
  &lt;div class=&quot;tt-top-panel&quot;&gt;
    &lt;div class=&quot;container&quot;&gt;
      &lt;div class=&quot;tt-row&quot;&gt;
        &lt;div class=&quot;tt-description&quot;&gt;
          20% STUDENT DISCOUNT PLUS FREE NEXT DAY DELIVEY, EXCLUDES SALE. &lt;a href=&quot;#&quot;&gt;DETAILS&lt;/a&gt;
        &lt;/div&gt;
        &lt;button class=&quot;tt-btn-close&quot;&gt;&lt;/button&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
  &lt;!-- /tt-top-panel --&gt;
&lt;/header&gt;',
    ),
    'layout_id' => '99999',
    'position' => 'header_notice',
    'status' => '1',
    'sort_order' => '',
  ),
  6 => 
  array (
    'type' => '2',
    'block_heading' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'block_content' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'html' => 
    array (
      1 => '&lt;div class=&quot;container-indent nomargin&quot;&gt;
  &lt;div class=&quot;container-fluid-custom&quot;&gt;
    &lt;div class=&quot;row tt-list-sm-shift&quot;&gt;
      &lt;div class=&quot;col-md-3&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-6 col-md-12 col-12-575width&quot;&gt;
            &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index12-promo-img-01.jpg&quot; alt=&quot;&quot;&gt;
              &lt;div class=&quot;tt-description&quot;&gt;
                &lt;div class=&quot;tt-description-wrapper&quot;&gt;
                  &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
                  &lt;div class=&quot;tt-title-small&quot;&gt;SHIRTS &amp;amp; TOPS&lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/a&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-6 col-md-12 col-12-575width&quot;&gt;
            &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index12-promo-img-02.jpg&quot; alt=&quot;&quot;&gt;
              &lt;div class=&quot;tt-description&quot;&gt;
                &lt;div class=&quot;tt-description-wrapper&quot;&gt;
                  &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
                  &lt;div class=&quot;tt-title-small&quot;&gt;PANTS&lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/a&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-xs-6 col-6 col-sm-6 col-md-6 col-12-575width&quot;&gt;
        &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index12-promo-img-03.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-title-small&quot;&gt;DRESSES&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-md-3 col-12-575width&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-6 col-md-12 col-12-575width&quot;&gt;
            &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index12-promo-img-04.jpg&quot; alt=&quot;&quot;&gt;
              &lt;div class=&quot;tt-description&quot;&gt;
                &lt;div class=&quot;tt-description-wrapper&quot;&gt;
                  &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
                  &lt;div class=&quot;tt-title-small&quot;&gt;JACKETS&lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/a&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-6 col-md-12 col-12-575width&quot;&gt;
            &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index12-promo-img-05.jpg&quot; alt=&quot;&quot;&gt;
              &lt;div class=&quot;tt-description&quot;&gt;
                &lt;div class=&quot;tt-description-wrapper&quot;&gt;
                  &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
                  &lt;div class=&quot;tt-title-small&quot;&gt;SHOES&lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/a&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;container-indent nomargin&quot;&gt;
  &lt;div class=&quot;container-fluid-custom&quot;&gt;
    &lt;div class=&quot;row tt-list-sm-shift&quot;&gt;
      &lt;div class=&quot;col-md-3&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-6 col-md-12 col-12-575width&quot;&gt;
            &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index12-promo-img-01.jpg&quot; alt=&quot;&quot;&gt;
              &lt;div class=&quot;tt-description&quot;&gt;
                &lt;div class=&quot;tt-description-wrapper&quot;&gt;
                  &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
                  &lt;div class=&quot;tt-title-small&quot;&gt;SHIRTS &amp;amp; TOPS&lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/a&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-6 col-md-12 col-12-575width&quot;&gt;
            &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index12-promo-img-02.jpg&quot; alt=&quot;&quot;&gt;
              &lt;div class=&quot;tt-description&quot;&gt;
                &lt;div class=&quot;tt-description-wrapper&quot;&gt;
                  &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
                  &lt;div class=&quot;tt-title-small&quot;&gt;PANTS&lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/a&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-xs-6 col-6 col-sm-6 col-md-6 col-12-575width&quot;&gt;
        &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index12-promo-img-03.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-title-small&quot;&gt;DRESSES&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-md-3 col-12-575width&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-6 col-md-12 col-12-575width&quot;&gt;
            &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index12-promo-img-04.jpg&quot; alt=&quot;&quot;&gt;
              &lt;div class=&quot;tt-description&quot;&gt;
                &lt;div class=&quot;tt-description-wrapper&quot;&gt;
                  &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
                  &lt;div class=&quot;tt-title-small&quot;&gt;JACKETS&lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/a&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-6 col-md-12 col-12-575width&quot;&gt;
            &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index12-promo-img-05.jpg&quot; alt=&quot;&quot;&gt;
              &lt;div class=&quot;tt-description&quot;&gt;
                &lt;div class=&quot;tt-description-wrapper&quot;&gt;
                  &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
                  &lt;div class=&quot;tt-title-small&quot;&gt;SHOES&lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/a&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
    ),
    'layout_id' => '1',
    'position' => 'slideshow',
    'status' => '1',
    'sort_order' => '2',
  ),
  7 => 
  array (
    'type' => '2',
    'block_heading' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'block_content' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'html' => 
    array (
      1 => '&lt;div class=&quot;container-indent&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;row tt-services-listing&quot;&gt;
      &lt;div class=&quot;col-xs-12 col-md-6 col-lg-3&quot;&gt;
        &lt;a href=&quot;faq.html&quot; class=&quot;tt-services-block&quot;&gt;
          &lt;div class=&quot;tt-col-icon&quot;&gt;
            &lt;i class=&quot;icon-f-48&quot;&gt;&lt;/i&gt;
          &lt;/div&gt;
          &lt;div class=&quot;tt-col-description&quot;&gt;
            &lt;h4 class=&quot;tt-title&quot;&gt;FREE SHIPPING&lt;/h4&gt;
            &lt;p&gt;Free shipping on all US order or order above $99&lt;/p&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-xs-12 col-md-6 col-lg-3&quot;&gt;
        &lt;a href=&quot;faq.html&quot; class=&quot;tt-services-block&quot;&gt;
          &lt;div class=&quot;tt-col-icon&quot;&gt;
            &lt;i class=&quot;icon-f-35&quot;&gt;&lt;/i&gt;
          &lt;/div&gt;
          &lt;div class=&quot;tt-col-description&quot;&gt;
            &lt;h4 class=&quot;tt-title&quot;&gt;SUPPORT 24/7&lt;/h4&gt;
            &lt;p&gt;Contact us 24 hours a day, 7 days a week&lt;/p&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-xs-12 col-md-6 col-lg-3&quot;&gt;
        &lt;a href=&quot;faq.html&quot; class=&quot;tt-services-block&quot;&gt;
          &lt;div class=&quot;tt-col-icon&quot;&gt;
            &lt;i class=&quot;icon-e-09&quot;&gt;&lt;/i&gt;
          &lt;/div&gt;
          &lt;div class=&quot;tt-col-description&quot;&gt;
            &lt;h4 class=&quot;tt-title&quot;&gt;30 DAYS RETURN&lt;/h4&gt;
            &lt;p&gt;Simply return it within 24 days for an exchange.&lt;/p&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-xs-12 col-md-6 col-lg-3&quot;&gt;
        &lt;a href=&quot;faq.html&quot; class=&quot;tt-services-block&quot;&gt;
          &lt;div class=&quot;tt-col-icon&quot;&gt;
            &lt;i class=&quot;icon-f-76&quot;&gt;&lt;/i&gt;
          &lt;/div&gt;
          &lt;div class=&quot;tt-col-description&quot;&gt;
            &lt;h4 class=&quot;tt-title&quot;&gt;100% PAYMENT SECURE&lt;/h4&gt;
            &lt;p&gt;We ensure secure payment with PEV&lt;/p&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;container-indent&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;row tt-services-listing&quot;&gt;
      &lt;div class=&quot;col-xs-12 col-md-6 col-lg-3&quot;&gt;
        &lt;a href=&quot;faq.html&quot; class=&quot;tt-services-block&quot;&gt;
          &lt;div class=&quot;tt-col-icon&quot;&gt;
            &lt;i class=&quot;icon-f-48&quot;&gt;&lt;/i&gt;
          &lt;/div&gt;
          &lt;div class=&quot;tt-col-description&quot;&gt;
            &lt;h4 class=&quot;tt-title&quot;&gt;FREE SHIPPING&lt;/h4&gt;
            &lt;p&gt;Free shipping on all US order or order above $99&lt;/p&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-xs-12 col-md-6 col-lg-3&quot;&gt;
        &lt;a href=&quot;faq.html&quot; class=&quot;tt-services-block&quot;&gt;
          &lt;div class=&quot;tt-col-icon&quot;&gt;
            &lt;i class=&quot;icon-f-35&quot;&gt;&lt;/i&gt;
          &lt;/div&gt;
          &lt;div class=&quot;tt-col-description&quot;&gt;
            &lt;h4 class=&quot;tt-title&quot;&gt;SUPPORT 24/7&lt;/h4&gt;
            &lt;p&gt;Contact us 24 hours a day, 7 days a week&lt;/p&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-xs-12 col-md-6 col-lg-3&quot;&gt;
        &lt;a href=&quot;faq.html&quot; class=&quot;tt-services-block&quot;&gt;
          &lt;div class=&quot;tt-col-icon&quot;&gt;
            &lt;i class=&quot;icon-e-09&quot;&gt;&lt;/i&gt;
          &lt;/div&gt;
          &lt;div class=&quot;tt-col-description&quot;&gt;
            &lt;h4 class=&quot;tt-title&quot;&gt;30 DAYS RETURN&lt;/h4&gt;
            &lt;p&gt;Simply return it within 24 days for an exchange.&lt;/p&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-xs-12 col-md-6 col-lg-3&quot;&gt;
        &lt;a href=&quot;faq.html&quot; class=&quot;tt-services-block&quot;&gt;
          &lt;div class=&quot;tt-col-icon&quot;&gt;
            &lt;i class=&quot;icon-f-76&quot;&gt;&lt;/i&gt;
          &lt;/div&gt;
          &lt;div class=&quot;tt-col-description&quot;&gt;
            &lt;h4 class=&quot;tt-title&quot;&gt;100% PAYMENT SECURE&lt;/h4&gt;
            &lt;p&gt;We ensure secure payment with PEV&lt;/p&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
    ),
    'layout_id' => '1',
    'position' => 'content_bottom',
    'status' => '1',
    'sort_order' => '2',
  ),
); 

$output2 = array();
$output2["custom_module_module"] = $this->config->get('custom_module_module');

if(!is_array($output["custom_module_module"])) $output["custom_module_module"] = array();
if(!is_array($output2["custom_module_module"])) $output2["custom_module_module"] = array();
$output3 = array();
$output3["custom_module_module"] = array_merge($output["custom_module_module"], $output2["custom_module_module"]);

$this->model_setting_setting->editSetting( "custom_module", $output3 );	

?>
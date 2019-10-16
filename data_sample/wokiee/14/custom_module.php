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
          &lt;a class=&quot;tt-logo tt-logo-alignment&quot; href=&quot;#&quot;&gt;
            &lt;img src=&quot;image/catalog/wokiee/custom/logo-white.png&quot; alt=&quot;&quot;&gt;
          &lt;/a&gt;
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
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;span class=&quot;icon-Stripe2&quot;&gt;&lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt; &lt;span class=&quot;icon-paypal-22&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;span class=&quot;icon-visa2&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;span class=&quot;icon-mastercard2&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path13&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&quot;&gt;&lt;span class=&quot;icon-discover2&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path13&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path14&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path15&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path16&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;span class=&quot;icon-american-express2&quot;&gt;
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
          &lt;a class=&quot;tt-logo tt-logo-alignment&quot; href=&quot;#&quot;&gt;
            &lt;img src=&quot;image/catalog/wokiee/custom/logo-white.png&quot; alt=&quot;&quot;&gt;
          &lt;/a&gt;
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
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;span class=&quot;icon-Stripe2&quot;&gt;&lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt; &lt;span class=&quot;icon-paypal-22&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;span class=&quot;icon-visa2&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;span class=&quot;icon-mastercard2&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path13&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&quot;&gt;&lt;span class=&quot;icon-discover2&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path13&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path14&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path15&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path16&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;span class=&quot;icon-american-express2&quot;&gt;
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
      1 => '  &lt;div class=&quot;container-indent&quot;&gt;
    &lt;div class=&quot;container-fluid&quot;&gt;
      &lt;div class=&quot;tt-block-title&quot;&gt;
        &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;https://www.instagram.com/wokieeshop/&quot;&gt;@ FOLLOW&lt;/a&gt; US ON&lt;/h2&gt;
        &lt;div class=&quot;tt-description&quot;&gt;INSTAGRAM&lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;row&quot;&gt;
        &lt;div id=&quot;instafeed&quot; class=&quot;instafeed-fluid&quot;
          data-accessToken=&quot;8626857013.dd09515.0fcd8351c65140d48f5a340693af1c3f&quot;
          data-clientId=&quot;dd095157744c4bd0a67181fc4906e5b6&quot;
          data-userId=&quot;8626857013&quot;
          data-limitImg=&quot;6&quot;&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;',
      $language_id => ' &lt;div class=&quot;container-indent&quot;&gt;
    &lt;div class=&quot;container-fluid&quot;&gt;
      &lt;div class=&quot;tt-block-title&quot;&gt;
        &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;https://www.instagram.com/wokieeshop/&quot;&gt;@ FOLLOW&lt;/a&gt; US ON&lt;/h2&gt;
        &lt;div class=&quot;tt-description&quot;&gt;INSTAGRAM&lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;row&quot;&gt;
        &lt;div id=&quot;instafeed&quot; class=&quot;instafeed-fluid&quot;
          data-accessToken=&quot;8626857013.dd09515.0fcd8351c65140d48f5a340693af1c3f&quot;
          data-clientId=&quot;dd095157744c4bd0a67181fc4906e5b6&quot;
          data-userId=&quot;8626857013&quot;
          data-limitImg=&quot;6&quot;&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;',
    ),
    'layout_id' => '1',
    'position' => 'content_bottom',
    'status' => '1',
    'sort_order' => '15',
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
      1 => '&lt;div class=&quot;container-indent&quot;&gt;
  &lt;div class=&quot;container container-fluid-custom-mobile-padding&quot;&gt;
    &lt;div class=&quot;tt-block-title&quot;&gt;
      &lt;h1 class=&quot;tt-title&quot;&gt;OUR COLLECTIONS&lt;/h1&gt;
      &lt;div class=&quot;tt-description&quot;&gt;SUMMER 2019&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;tt-carousel-products row arrow-location-tab arrow-location-tab01 tt-alignment-img tt-collection-listing slick-animated-show-js&quot;&gt;
      &lt;div class=&quot;col-2 col-md-4 col-lg-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-collection-item&quot;&gt;
          &lt;div class=&quot;tt-image-box&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-20.jpg&quot; alt=&quot;&quot;&gt;&lt;/div&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;h2 class=&quot;tt-title&quot;&gt;Shirts &amp;amp; Tops&lt;/h2&gt;
            &lt;ul class=&quot;tt-add-info&quot;&gt;
              &lt;li&gt;45 PRODUCTS&lt;/li&gt;
            &lt;/ul&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-2 col-md-4 col-lg-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-collection-item&quot;&gt;
          &lt;div class=&quot;tt-image-box&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-03.jpg&quot; alt=&quot;&quot;&gt;&lt;/div&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;h2 class=&quot;tt-title&quot;&gt;Jackets &amp;amp; Outerwear&lt;/h2&gt;
            &lt;ul class=&quot;tt-add-info&quot;&gt;
              &lt;li&gt;35 PRODUCTS&lt;/li&gt;
            &lt;/ul&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-2 col-md-4 col-lg-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-collection-item&quot;&gt;
          &lt;div class=&quot;tt-image-box&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-11.jpg&quot; alt=&quot;&quot;&gt;&lt;/div&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;h2 class=&quot;tt-title&quot;&gt;Sweaters&lt;/h2&gt;
            &lt;ul class=&quot;tt-add-info&quot;&gt;
              &lt;li&gt;28 PRODUCTS&lt;/li&gt;
            &lt;/ul&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-2 col-md-4 col-lg-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-collection-item&quot;&gt;
          &lt;div class=&quot;tt-image-box&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-23.jpg&quot; alt=&quot;&quot;&gt;&lt;/div&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;h2 class=&quot;tt-title&quot;&gt;Pants&lt;/h2&gt;
            &lt;ul class=&quot;tt-add-info&quot;&gt;
              &lt;li&gt;22 PRODUCTS&lt;/li&gt;
            &lt;/ul&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-2 col-md-4 col-lg-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-collection-item&quot;&gt;
          &lt;div class=&quot;tt-image-box&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-14.jpg&quot; alt=&quot;&quot;&gt;&lt;/div&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;h2 class=&quot;tt-title&quot;&gt;Sweaters&lt;/h2&gt;
            &lt;ul class=&quot;tt-add-info&quot;&gt;
              &lt;li&gt;26 PRODUCTS&lt;/li&gt;
            &lt;/ul&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;container-indent&quot;&gt;
  &lt;div class=&quot;container container-fluid-custom-mobile-padding&quot;&gt;
    &lt;div class=&quot;tt-block-title&quot;&gt;
      &lt;h1 class=&quot;tt-title&quot;&gt;OUR COLLECTIONS&lt;/h1&gt;
      &lt;div class=&quot;tt-description&quot;&gt;SUMMER 2019&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;tt-carousel-products row arrow-location-tab arrow-location-tab01 tt-alignment-img tt-collection-listing slick-animated-show-js&quot;&gt;
      &lt;div class=&quot;col-2 col-md-4 col-lg-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-collection-item&quot;&gt;
          &lt;div class=&quot;tt-image-box&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-20.jpg&quot; alt=&quot;&quot;&gt;&lt;/div&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;h2 class=&quot;tt-title&quot;&gt;Shirts &amp;amp; Tops&lt;/h2&gt;
            &lt;ul class=&quot;tt-add-info&quot;&gt;
              &lt;li&gt;45 PRODUCTS&lt;/li&gt;
            &lt;/ul&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-2 col-md-4 col-lg-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-collection-item&quot;&gt;
          &lt;div class=&quot;tt-image-box&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-03.jpg&quot; alt=&quot;&quot;&gt;&lt;/div&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;h2 class=&quot;tt-title&quot;&gt;Jackets &amp;amp; Outerwear&lt;/h2&gt;
            &lt;ul class=&quot;tt-add-info&quot;&gt;
              &lt;li&gt;35 PRODUCTS&lt;/li&gt;
            &lt;/ul&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-2 col-md-4 col-lg-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-collection-item&quot;&gt;
          &lt;div class=&quot;tt-image-box&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-11.jpg&quot; alt=&quot;&quot;&gt;&lt;/div&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;h2 class=&quot;tt-title&quot;&gt;Sweaters&lt;/h2&gt;
            &lt;ul class=&quot;tt-add-info&quot;&gt;
              &lt;li&gt;28 PRODUCTS&lt;/li&gt;
            &lt;/ul&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-2 col-md-4 col-lg-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-collection-item&quot;&gt;
          &lt;div class=&quot;tt-image-box&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-23.jpg&quot; alt=&quot;&quot;&gt;&lt;/div&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;h2 class=&quot;tt-title&quot;&gt;Pants&lt;/h2&gt;
            &lt;ul class=&quot;tt-add-info&quot;&gt;
              &lt;li&gt;22 PRODUCTS&lt;/li&gt;
            &lt;/ul&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-2 col-md-4 col-lg-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-collection-item&quot;&gt;
          &lt;div class=&quot;tt-image-box&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-14.jpg&quot; alt=&quot;&quot;&gt;&lt;/div&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;h2 class=&quot;tt-title&quot;&gt;Sweaters&lt;/h2&gt;
            &lt;ul class=&quot;tt-add-info&quot;&gt;
              &lt;li&gt;26 PRODUCTS&lt;/li&gt;
            &lt;/ul&gt;
          &lt;/div&gt;
        &lt;/a&gt;
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
      1 => '&lt;div class=&quot;container-indent&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;row tt-carousel-brands arrow-location-center-02 tt-arrow-hover&quot;&gt;
      &lt;div&gt;
        &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/custom/brand-img-01.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
      &lt;/div&gt;
      &lt;div&gt;
        &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/custom/brand-img-05.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
      &lt;/div&gt;
      &lt;div&gt;
        &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/custom/brand-img-06.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
      &lt;/div&gt;
      &lt;div&gt;
        &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/custom/brand-img-02.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
      &lt;/div&gt;
      &lt;div&gt;
        &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/custom/brand-img-07.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
      &lt;/div&gt;
      &lt;div&gt;
        &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/custom/brand-img-04.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
      &lt;/div&gt;
      &lt;div&gt;
        &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/custom/brand-img-03.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
      &lt;/div&gt;
      &lt;div&gt;
        &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/custom/brand-img-08.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;container-indent&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;row tt-carousel-brands arrow-location-center-02 tt-arrow-hover&quot;&gt;
      &lt;div&gt;
        &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/custom/brand-img-01.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
      &lt;/div&gt;
      &lt;div&gt;
        &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/custom/brand-img-05.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
      &lt;/div&gt;
      &lt;div&gt;
        &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/custom/brand-img-06.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
      &lt;/div&gt;
      &lt;div&gt;
        &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/custom/brand-img-02.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
      &lt;/div&gt;
      &lt;div&gt;
        &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/custom/brand-img-07.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
      &lt;/div&gt;
      &lt;div&gt;
        &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/custom/brand-img-04.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
      &lt;/div&gt;
      &lt;div&gt;
        &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/custom/brand-img-03.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
      &lt;/div&gt;
      &lt;div&gt;
        &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/custom/brand-img-08.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
    ),
    'layout_id' => '1',
    'position' => 'slideshow',
    'status' => '1',
    'sort_order' => '10',
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
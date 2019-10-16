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
      1 => '&lt;div class=&quot;tt-footer-custom&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;tt-row&quot;&gt;
      &lt;div class=&quot;tt-col-left&quot;&gt;
        &lt;div class=&quot;tt-col-item&quot;&gt;
          &lt;!-- copyright --&gt;
          &lt;div class=&quot;tt-box-copyright&quot;&gt;
            &amp;copy; Wokiee 2019. All Rights Reserved
          &lt;/div&gt;
          &lt;!-- /copyright --&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;tt-col-right&quot;&gt;
        &lt;div class=&quot;tt-col-item&quot;&gt;
          &lt;!-- payment-list --&gt;
          &lt;ul class=&quot;tt-payment-list&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;span class=&quot;icon-Stripe&quot;&gt;&lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt; &lt;span class=&quot;icon-paypal-2&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;span class=&quot;icon-visa&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;span class=&quot;icon-mastercard&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path13&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;span class=&quot;icon-discover&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path13&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path14&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path15&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path16&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;span class=&quot;icon-american-express&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
          &lt;/ul&gt;
          &lt;!-- /payment-list --&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;tt-footer-custom&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;tt-row&quot;&gt;
      &lt;div class=&quot;tt-col-left&quot;&gt;
        &lt;div class=&quot;tt-col-item&quot;&gt;
          &lt;!-- copyright --&gt;
          &lt;div class=&quot;tt-box-copyright&quot;&gt;
            &amp;copy; Wokiee 2019. All Rights Reserved
          &lt;/div&gt;
          &lt;!-- /copyright --&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;tt-col-right&quot;&gt;
        &lt;div class=&quot;tt-col-item&quot;&gt;
          &lt;!-- payment-list --&gt;
          &lt;ul class=&quot;tt-payment-list&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;span class=&quot;icon-Stripe&quot;&gt;&lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt; &lt;span class=&quot;icon-paypal-2&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;span class=&quot;icon-visa&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;span class=&quot;icon-mastercard&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path13&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;span class=&quot;icon-discover&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path13&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path14&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path15&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path16&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;span class=&quot;icon-american-express&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
          &lt;/ul&gt;
          &lt;!-- /payment-list --&gt;
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
      &lt;a href=&quot;#&quot;&gt;&lt;img  src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/skin-weapons/products/1.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
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
      &lt;a href=&quot;#&quot;&gt;&lt;img  src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/skin-weapons/products/1.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
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
  &lt;div class=&quot;tt-color-scheme-01&quot;&gt;
    &lt;div class=&quot;container&quot;&gt;
      &lt;div class=&quot;tt-header-row tt-top-row&quot;&gt;
        &lt;div class=&quot;tt-col-left&quot;&gt;
          &lt;div class=&quot;tt-box-info&quot;&gt;
            &lt;ul&gt;
              &lt;li&gt;
                &lt;i class=&quot;icon-f-93&quot;&gt;&lt;/i&gt;+566 4774 9930; +566 4774 9940
              &lt;/li&gt;
              &lt;li&gt;
                &lt;i class=&quot;icon-f-92&quot;&gt;&lt;/i&gt;ALL WEEK FROM 9 AM TO 9 PM 
              &lt;/li&gt;
            &lt;/ul&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;tt-col-right ml-auto&quot;&gt;
          &lt;ul class=&quot;tt-social-icon&quot;&gt;
            &lt;li&gt;&lt;a class=&quot;icon-g-64&quot; target=&quot;_blank&quot; href=&quot;https://twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a class=&quot;icon-h-58&quot; target=&quot;_blank&quot; href=&quot;https://twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a class=&quot;icon-g-66&quot; target=&quot;_blank&quot; href=&quot;https://twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a class=&quot;icon-g-67&quot; target=&quot;_blank&quot; href=&quot;https://twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a class=&quot;icon-g-70&quot; target=&quot;_blank&quot; href=&quot;https://twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
          &lt;/ul&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/header&gt;',
      $language_id => '&lt;header&gt;
  &lt;div class=&quot;tt-color-scheme-01&quot;&gt;
    &lt;div class=&quot;container&quot;&gt;
      &lt;div class=&quot;tt-header-row tt-top-row&quot;&gt;
        &lt;div class=&quot;tt-col-left&quot;&gt;
          &lt;div class=&quot;tt-box-info&quot;&gt;
            &lt;ul&gt;
              &lt;li&gt;
                &lt;i class=&quot;icon-f-93&quot;&gt;&lt;/i&gt;+566 4774 9930; +566 4774 9940
              &lt;/li&gt;
              &lt;li&gt;
                &lt;i class=&quot;icon-f-92&quot;&gt;&lt;/i&gt;ALL WEEK FROM 9 AM TO 9 PM 
              &lt;/li&gt;
            &lt;/ul&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;tt-col-right ml-auto&quot;&gt;
          &lt;ul class=&quot;tt-social-icon&quot;&gt;
            &lt;li&gt;&lt;a class=&quot;icon-g-64&quot; target=&quot;_blank&quot; href=&quot;https://twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a class=&quot;icon-h-58&quot; target=&quot;_blank&quot; href=&quot;https://twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a class=&quot;icon-g-66&quot; target=&quot;_blank&quot; href=&quot;https://twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a class=&quot;icon-g-67&quot; target=&quot;_blank&quot; href=&quot;https://twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a class=&quot;icon-g-70&quot; target=&quot;_blank&quot; href=&quot;https://twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
          &lt;/ul&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
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
      1 => '&lt;div class=&quot;tt-offset-small container-indent&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;row tt-layout-promo02&quot;&gt;
      &lt;div class=&quot;col-sm-6 col-md-4 col-12-440width&quot;&gt;
        &lt;div class=&quot;tt-promo02&quot; data-hovercolors=&quot;&quot;&gt;
          &lt;a href=&quot;#&quot; class=&quot;image-box&quot;&gt;
            &lt;img class=&quot;lazyload&quot; src=&quot;image/catalog/wokiee/skin-weapons/sk09_1_400x.jpg&quot;&gt;
          &lt;/a&gt;
          &lt;div class=&quot;tt-description text-center&quot;&gt;
            &lt;a href=&quot;#&quot; class=&quot;tt-title&quot;&gt;
              &lt;div class=&quot;tt-title-small&quot; style=&quot;color:#b27022;&quot; data-c=&quot;#b27022&quot; data-ac=&quot;#b27022&quot;&gt;Get up to 20% off!&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot; style=&quot;color: rgb(61, 68, 31);&quot; data-c=&quot;#3d441f&quot; data-ac=&quot;#b27022&quot;&gt;ARCHERY&lt;/div&gt;
            &lt;/a&gt;
            &lt;p style=&quot;color:#707050;&quot;&gt;Limited Time!&lt;/p&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-sm-6 col-md-4 col-12-440width&quot;&gt;
        &lt;div class=&quot;tt-promo02&quot; data-hovercolors=&quot;&quot;&gt;
          &lt;a href=&quot;#&quot; class=&quot;image-box&quot;&gt;&lt;img class=&quot;lazyload&quot; src=&quot;image/catalog/wokiee/skin-weapons/sk09_2_400x.jpg&quot;&gt;&lt;/a&gt;
          &lt;div class=&quot;tt-description text-center&quot;&gt;
            &lt;a href=&quot;#&quot; class=&quot;tt-title&quot;&gt;
              &lt;div class=&quot;tt-title-small&quot; style=&quot;color:#b27022;&quot; data-c=&quot;#b27022&quot; data-ac=&quot;#b27022&quot;&gt;Get up to 20% off!&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot; style=&quot;color: rgb(61, 68, 31);&quot; data-c=&quot;#3d441f&quot; data-ac=&quot;#b27022&quot;&gt;RIFLE AND SHOTGUN&lt;/div&gt;
            &lt;/a&gt;
            &lt;p style=&quot;color:#707050;&quot;&gt;Limited Time!&lt;/p&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-sm-6 col-md-4 col-12-440width&quot;&gt;
        &lt;div class=&quot;tt-promo02&quot; data-hovercolors=&quot;&quot;&gt;
          &lt;a href=&quot;#&quot; class=&quot;image-box&quot;&gt;&lt;img class=&quot;lazyload&quot; src=&quot;image/catalog/wokiee/skin-weapons/sk09_3_400x.jpg&quot;&gt;&lt;/a&gt;
          &lt;div class=&quot;tt-description text-center&quot;&gt;
            &lt;a href=&quot;#&quot; class=&quot;tt-title&quot;&gt;
              &lt;div class=&quot;tt-title-small&quot; style=&quot;color:#b27022;&quot; data-c=&quot;#b27022&quot; data-ac=&quot;#b27022&quot;&gt;Get up to 20% off!&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot; style=&quot;color:#3d441f;&quot; data-c=&quot;#3d441f&quot; data-ac=&quot;#b27022&quot;&gt;BUMPS AND BANGS&lt;/div&gt;
            &lt;/a&gt;
            &lt;p style=&quot;color:#707050;&quot;&gt;Limited Time!&lt;/p&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;

&lt;div class=&quot;container-indent&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
&lt;hr&gt;
&lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;tt-offset-small container-indent&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;row tt-layout-promo02&quot;&gt;
      &lt;div class=&quot;col-sm-6 col-md-4 col-12-440width&quot;&gt;
        &lt;div class=&quot;tt-promo02&quot; data-hovercolors=&quot;&quot;&gt;
          &lt;a href=&quot;#&quot; class=&quot;image-box&quot;&gt;
            &lt;img class=&quot;lazyload&quot; src=&quot;image/catalog/wokiee/skin-weapons/sk09_1_400x.jpg&quot;&gt;
          &lt;/a&gt;
          &lt;div class=&quot;tt-description text-center&quot;&gt;
            &lt;a href=&quot;#&quot; class=&quot;tt-title&quot;&gt;
              &lt;div class=&quot;tt-title-small&quot; style=&quot;color:#b27022;&quot; data-c=&quot;#b27022&quot; data-ac=&quot;#b27022&quot;&gt;Get up to 20% off!&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot; style=&quot;color: rgb(61, 68, 31);&quot; data-c=&quot;#3d441f&quot; data-ac=&quot;#b27022&quot;&gt;ARCHERY&lt;/div&gt;
            &lt;/a&gt;
            &lt;p style=&quot;color:#707050;&quot;&gt;Limited Time!&lt;/p&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-sm-6 col-md-4 col-12-440width&quot;&gt;
        &lt;div class=&quot;tt-promo02&quot; data-hovercolors=&quot;&quot;&gt;
          &lt;a href=&quot;#&quot; class=&quot;image-box&quot;&gt;&lt;img class=&quot;lazyload&quot; src=&quot;image/catalog/wokiee/skin-weapons/sk09_2_400x.jpg&quot;&gt;&lt;/a&gt;
          &lt;div class=&quot;tt-description text-center&quot;&gt;
            &lt;a href=&quot;#&quot; class=&quot;tt-title&quot;&gt;
              &lt;div class=&quot;tt-title-small&quot; style=&quot;color:#b27022;&quot; data-c=&quot;#b27022&quot; data-ac=&quot;#b27022&quot;&gt;Get up to 20% off!&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot; style=&quot;color: rgb(61, 68, 31);&quot; data-c=&quot;#3d441f&quot; data-ac=&quot;#b27022&quot;&gt;RIFLE AND SHOTGUN&lt;/div&gt;
            &lt;/a&gt;
            &lt;p style=&quot;color:#707050;&quot;&gt;Limited Time!&lt;/p&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-sm-6 col-md-4 col-12-440width&quot;&gt;
        &lt;div class=&quot;tt-promo02&quot; data-hovercolors=&quot;&quot;&gt;
          &lt;a href=&quot;#&quot; class=&quot;image-box&quot;&gt;&lt;img class=&quot;lazyload&quot; src=&quot;image/catalog/wokiee/skin-weapons/sk09_3_400x.jpg&quot;&gt;&lt;/a&gt;
          &lt;div class=&quot;tt-description text-center&quot;&gt;
            &lt;a href=&quot;#&quot; class=&quot;tt-title&quot;&gt;
              &lt;div class=&quot;tt-title-small&quot; style=&quot;color:#b27022;&quot; data-c=&quot;#b27022&quot; data-ac=&quot;#b27022&quot;&gt;Get up to 20% off!&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot; style=&quot;color:#3d441f;&quot; data-c=&quot;#3d441f&quot; data-ac=&quot;#b27022&quot;&gt;BUMPS AND BANGS&lt;/div&gt;
            &lt;/a&gt;
            &lt;p style=&quot;color:#707050;&quot;&gt;Limited Time!&lt;/p&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;

&lt;div class=&quot;container-indent&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
&lt;hr&gt;
&lt;/div&gt;
&lt;/div&gt;',
    ),
    'layout_id' => '1',
    'position' => 'slideshow',
    'status' => '1',
    'sort_order' => '5',
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
    &lt;hr&gt;
  &lt;/div&gt;
&lt;/div&gt;

&lt;div class=&quot;container-indent&quot;&gt;
  &lt;div class=&quot;container&quot; data-sectionname=&quot;index_testimonials&quot;&gt;
    &lt;div class=&quot;tt-block-title&quot;&gt;
      &lt;h2 class=&quot;tt-title&quot;&gt;WHAT THEY’RE SAYING&lt;/h2&gt;
    &lt;/div&gt;
    &lt;div class=&quot;tt-slider-fullwidth arrow-location-center-02 slick-animated-show-js&quot; data-slick=\'{&quot;slidesToShow&quot;: 1, &quot;slidesToScroll&quot;: 1, &quot;autoplay&quot;: , &quot;autoplaySpeed&quot;: }\'&gt;
      &lt;div class=&quot;item&quot; &gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-content-info&quot;&gt;
          &lt;p&gt;Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.&lt;/p&gt;
          &lt;div class=&quot;tt-subscription&quot;&gt;
            &lt;div class=&quot;tt-text-lage&quot;&gt;ADRIAN PARKER&lt;/div&gt;
            &lt;div class=&quot;tt-text-small&quot;&gt;Developer&lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;item&quot; &gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-content-info&quot;&gt;
          &lt;p&gt;Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.&lt;/p&gt;
          &lt;div class=&quot;tt-subscription&quot;&gt;
            &lt;div class=&quot;tt-text-lage&quot;&gt;ADRIAN PARKER&lt;/div&gt;
            &lt;div class=&quot;tt-text-small&quot;&gt;Developer&lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;item&quot; &gt;
        &lt;a href=&quot;blog-single-post.html&quot; class=&quot;tt-content-info&quot;&gt;
          &lt;p&gt;Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.&lt;/p&gt;
          &lt;div class=&quot;tt-subscription&quot;&gt;
            &lt;div class=&quot;tt-text-lage&quot;&gt;ADRIAN PARKER&lt;/div&gt;
            &lt;div class=&quot;tt-text-small&quot;&gt;Developer&lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;container-indent&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;hr&gt;
  &lt;/div&gt;
&lt;/div&gt;

&lt;div class=&quot;container-indent&quot;&gt;
  &lt;div class=&quot;container&quot; data-sectionname=&quot;index_testimonials&quot;&gt;
    &lt;div class=&quot;tt-block-title&quot;&gt;
      &lt;h2 class=&quot;tt-title&quot;&gt;WHAT THEY’RE SAYING&lt;/h2&gt;
    &lt;/div&gt;
    &lt;div class=&quot;tt-slider-fullwidth arrow-location-center-02 slick-animated-show-js&quot; data-slick=\'{&quot;slidesToShow&quot;: 1, &quot;slidesToScroll&quot;: 1, &quot;autoplay&quot;: , &quot;autoplaySpeed&quot;: }\'&gt;
      &lt;div class=&quot;item&quot; &gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-content-info&quot;&gt;
          &lt;p&gt;Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.&lt;/p&gt;
          &lt;div class=&quot;tt-subscription&quot;&gt;
            &lt;div class=&quot;tt-text-lage&quot;&gt;ADRIAN PARKER&lt;/div&gt;
            &lt;div class=&quot;tt-text-small&quot;&gt;Developer&lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;item&quot; &gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-content-info&quot;&gt;
          &lt;p&gt;Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.&lt;/p&gt;
          &lt;div class=&quot;tt-subscription&quot;&gt;
            &lt;div class=&quot;tt-text-lage&quot;&gt;ADRIAN PARKER&lt;/div&gt;
            &lt;div class=&quot;tt-text-small&quot;&gt;Developer&lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;item&quot; &gt;
        &lt;a href=&quot;blog-single-post.html&quot; class=&quot;tt-content-info&quot;&gt;
          &lt;p&gt;Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.&lt;/p&gt;
          &lt;div class=&quot;tt-subscription&quot;&gt;
            &lt;div class=&quot;tt-text-lage&quot;&gt;ADRIAN PARKER&lt;/div&gt;
            &lt;div class=&quot;tt-text-small&quot;&gt;Developer&lt;/div&gt;
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
    'sort_order' => '1',
  ),
  8 => 
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
  &lt;div class=&quot;container&quot; data-sectionname=&quot;index_brands&quot;&gt;
    &lt;div class=&quot;row tt-carousel-brands arrow-location-center-02 tt-arrow-hover&quot; data-slick=\'{&quot;slidesToShow&quot;: 6, &quot;slidesToScroll&quot;: 2, &quot;autoplay&quot;: false, &quot;autoplaySpeed&quot;: 7000}\'&gt;
      &lt;div &gt;
        &lt;a href=&quot;&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/skin-weapons/br_01_large.png&quot; alt=&quot;&quot;&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div &gt;
        &lt;a href=&quot;&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/skin-weapons/br_02_large.png&quot; alt=&quot;&quot;&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div &gt;
        &lt;a href=&quot;&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/skin-weapons/br_03_large.png&quot; alt=&quot;&quot;&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div &gt;
        &lt;a href=&quot;&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/skin-weapons/br_04_large.png&quot; alt=&quot;&quot;&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div &gt;
        &lt;a href=&quot;&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/skin-weapons/br_05_large.png&quot; alt=&quot;&quot;&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div &gt;
        &lt;a href=&quot;&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/skin-weapons/br_06_large.png&quot; alt=&quot;&quot;&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div &gt;
        &lt;a href=&quot;&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/skin-weapons/br_07_large.png&quot; alt=&quot;&quot;&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div &gt;
        &lt;a href=&quot;&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/skin-weapons/br_08_large.png&quot; alt=&quot;&quot;&gt;
        &lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;container-indent&quot;&gt;
  &lt;div class=&quot;container&quot; data-sectionname=&quot;index_brands&quot;&gt;
    &lt;div class=&quot;row tt-carousel-brands arrow-location-center-02 tt-arrow-hover&quot; data-slick=\'{&quot;slidesToShow&quot;: 6, &quot;slidesToScroll&quot;: 2, &quot;autoplay&quot;: false, &quot;autoplaySpeed&quot;: 7000}\'&gt;
      &lt;div &gt;
        &lt;a href=&quot;&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/skin-weapons/br_01_large.png&quot; alt=&quot;&quot;&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div &gt;
        &lt;a href=&quot;&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/skin-weapons/br_02_large.png&quot; alt=&quot;&quot;&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div &gt;
        &lt;a href=&quot;&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/skin-weapons/br_03_large.png&quot; alt=&quot;&quot;&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div &gt;
        &lt;a href=&quot;&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/skin-weapons/br_04_large.png&quot; alt=&quot;&quot;&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div &gt;
        &lt;a href=&quot;&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/skin-weapons/br_05_large.png&quot; alt=&quot;&quot;&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div &gt;
        &lt;a href=&quot;&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/skin-weapons/br_06_large.png&quot; alt=&quot;&quot;&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div &gt;
        &lt;a href=&quot;&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/skin-weapons/br_07_large.png&quot; alt=&quot;&quot;&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div &gt;
        &lt;a href=&quot;&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/skin-weapons/br_08_large.png&quot; alt=&quot;&quot;&gt;
        &lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
    ),
    'layout_id' => '1',
    'position' => 'content_bottom',
    'status' => '1',
    'sort_order' => '10',
  ),
  9 => 
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
    &lt;div class=&quot;row tt-layout-promo02&quot;&gt;
      &lt;div class=&quot;col-sm-6 col-md-6 col-12-440width&quot; &gt;
        &lt;div class=&quot;tt-promo02&quot; data-hovercolors&gt;
          &lt;a href=&quot;#&quot; class=&quot;image-box&quot;&gt;&lt;img class=&quot;lazyload&quot; src=&quot;image/catalog/wokiee/skin-weapons/sk09_4_600x.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
          &lt;div class=&quot;tt-description text-center&quot;&gt;
            &lt;a href=&quot;#&quot; class=&quot;tt-title&quot;&gt;
              &lt;div class=&quot;tt-title-small&quot; style=&quot;color:#b27022;&quot;  data-c=&quot;#b27022&quot; data-ac=&quot;#b27022&quot;&gt;OPTICS AND ACCESSORIES&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot; style=&quot;color:#3d441f;&quot; data-c=&quot;#3d441f&quot; data-ac=&quot;#b27022&quot;&gt;SAVE 20%OFF&lt;/div&gt;
            &lt;/a&gt;
            &lt;p style=&quot;color:#707050;&quot;&gt;Binoculars, Riflescopes, Spotting Scopes&lt;/p&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-sm-6 col-md-6 col-12-440width&quot; &gt;
        &lt;div class=&quot;tt-promo02&quot; data-hovercolors&gt;
          &lt;a href=&quot;&quot; class=&quot;image-box&quot;&gt;&lt;img class=&quot;lazyload&quot; src=&quot;image/catalog/wokiee/skin-weapons/sk09_5_600x.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
          &lt;div class=&quot;tt-description text-center&quot;&gt;
            &lt;a href=&quot;&quot; class=&quot;tt-title&quot;&gt;
              &lt;div class=&quot;tt-title-small&quot; style=&quot;color:#b27022;&quot; data-c=&quot;#b27022&quot; data-ac=&quot;#b27022&quot;&gt;CLOTHING AND FOOTWEAR&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot; style=&quot;color:#3d441f;&quot; data-c=&quot;#3d441f&quot; data-ac=&quot;#b27022&quot;&gt;SAVE 20%OFF&lt;/div&gt;
            &lt;/a&gt;
            &lt;p style=&quot;color:#707050;&quot;&gt;Hunting Clothing, Hunting Boots, Hunting Waders&lt;/p&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;container-indent&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;row tt-layout-promo02&quot;&gt;
      &lt;div class=&quot;col-sm-6 col-md-6 col-12-440width&quot; &gt;
        &lt;div class=&quot;tt-promo02&quot; data-hovercolors&gt;
          &lt;a href=&quot;#&quot; class=&quot;image-box&quot;&gt;&lt;img class=&quot;lazyload&quot; src=&quot;image/catalog/wokiee/skin-weapons/sk09_4_600x.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
          &lt;div class=&quot;tt-description text-center&quot;&gt;
            &lt;a href=&quot;#&quot; class=&quot;tt-title&quot;&gt;
              &lt;div class=&quot;tt-title-small&quot; style=&quot;color:#b27022;&quot;  data-c=&quot;#b27022&quot; data-ac=&quot;#b27022&quot;&gt;OPTICS AND ACCESSORIES&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot; style=&quot;color:#3d441f;&quot; data-c=&quot;#3d441f&quot; data-ac=&quot;#b27022&quot;&gt;SAVE 20%OFF&lt;/div&gt;
            &lt;/a&gt;
            &lt;p style=&quot;color:#707050;&quot;&gt;Binoculars, Riflescopes, Spotting Scopes&lt;/p&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-sm-6 col-md-6 col-12-440width&quot; &gt;
        &lt;div class=&quot;tt-promo02&quot; data-hovercolors&gt;
          &lt;a href=&quot;&quot; class=&quot;image-box&quot;&gt;&lt;img class=&quot;lazyload&quot; src=&quot;image/catalog/wokiee/skin-weapons/sk09_5_600x.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
          &lt;div class=&quot;tt-description text-center&quot;&gt;
            &lt;a href=&quot;&quot; class=&quot;tt-title&quot;&gt;
              &lt;div class=&quot;tt-title-small&quot; style=&quot;color:#b27022;&quot; data-c=&quot;#b27022&quot; data-ac=&quot;#b27022&quot;&gt;CLOTHING AND FOOTWEAR&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot; style=&quot;color:#3d441f;&quot; data-c=&quot;#3d441f&quot; data-ac=&quot;#b27022&quot;&gt;SAVE 20%OFF&lt;/div&gt;
            &lt;/a&gt;
            &lt;p style=&quot;color:#707050;&quot;&gt;Hunting Clothing, Hunting Boots, Hunting Waders&lt;/p&gt;
          &lt;/div&gt;
        &lt;/div&gt;
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
); 

$output2 = array();
$output2["custom_module_module"] = $this->config->get('custom_module_module');

if(!is_array($output["custom_module_module"])) $output["custom_module_module"] = array();
if(!is_array($output2["custom_module_module"])) $output2["custom_module_module"] = array();
$output3 = array();
$output3["custom_module_module"] = array_merge($output["custom_module_module"], $output2["custom_module_module"]);

$this->model_setting_setting->editSetting( "custom_module", $output3 );	

?>
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
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt;&lt;span class=&quot;icon-Stripe&quot;&gt;&lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt; &lt;span class=&quot;icon-paypal-2&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt;&lt;span class=&quot;icon-visa&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt;&lt;span class=&quot;icon-mastercard&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path13&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt;&lt;span class=&quot;icon-discover&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path13&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path14&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path15&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path16&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt;&lt;span class=&quot;icon-american-express&quot;&gt;
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
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt;&lt;span class=&quot;icon-Stripe&quot;&gt;&lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt; &lt;span class=&quot;icon-paypal-2&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt;&lt;span class=&quot;icon-visa&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt;&lt;span class=&quot;icon-mastercard&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path13&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt;&lt;span class=&quot;icon-discover&quot;&gt;
                    &lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path3&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path4&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path5&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path6&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path7&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path8&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path9&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path10&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path11&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path12&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path13&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path14&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path15&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path16&quot;&gt;&lt;/span&gt;
                    &lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;page404.html&quot;&gt;&lt;span class=&quot;icon-american-express&quot;&gt;
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
      &lt;a href=&quot;#&quot;&gt;&lt;img  src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/skin-yoga/productrs/1-1.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
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
      &lt;a href=&quot;#&quot;&gt;&lt;img  src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/skin-yoga/productrs/1-1.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
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
        Need help? Call us on&amp;nbsp;&lt;b style=&quot;color: 191919;&quot;&gt;+44 000 400 7777&lt;/b&gt;
      &lt;/div&gt;&lt;div class=&quot;tt-col-right ml-auto&quot;&gt;
        &lt;ul class=&quot;tt-social-icon&quot;&gt;&lt;li&gt;&lt;a class=&quot;icon-g-64&quot; target=&quot;_blank&quot; href=&quot;https://twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a class=&quot;icon-h-58&quot; target=&quot;_blank&quot; href=&quot;https://twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a class=&quot;icon-g-66&quot; target=&quot;_blank&quot; href=&quot;https://twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a class=&quot;icon-g-67&quot; target=&quot;_blank&quot; href=&quot;https://twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a class=&quot;icon-g-70&quot; target=&quot;_blank&quot; href=&quot;https://twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;&lt;/ul&gt;
      &lt;/div&gt;&lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;/header&gt;',
      $language_id => '&lt;header&gt;
&lt;div class=&quot;tt-color-scheme-01&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;tt-header-row tt-top-row&quot;&gt;
      &lt;div class=&quot;tt-col-left&quot;&gt;
        Need help? Call us on&amp;nbsp;&lt;b style=&quot;color: 191919;&quot;&gt;+44 000 400 7777&lt;/b&gt;
      &lt;/div&gt;&lt;div class=&quot;tt-col-right ml-auto&quot;&gt;
        &lt;ul class=&quot;tt-social-icon&quot;&gt;&lt;li&gt;&lt;a class=&quot;icon-g-64&quot; target=&quot;_blank&quot; href=&quot;https://twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a class=&quot;icon-h-58&quot; target=&quot;_blank&quot; href=&quot;https://twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a class=&quot;icon-g-66&quot; target=&quot;_blank&quot; href=&quot;https://twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a class=&quot;icon-g-67&quot; target=&quot;_blank&quot; href=&quot;https://twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a class=&quot;icon-g-70&quot; target=&quot;_blank&quot; href=&quot;https://twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;&lt;/ul&gt;
      &lt;/div&gt;&lt;/div&gt;
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
      1 => '&lt;div class=&quot;container-indent &quot;&gt;
  &lt;div class=&quot;container-fluid-custom&quot;&gt;
    &lt;div class=&quot;tt-block-title&quot;&gt;
      &lt;h2 class=&quot;tt-title&quot;&gt;Everything for Your Yoga Needs&lt;/h2&gt;
    &lt;/div&gt;
    &lt;div class=&quot;row tt-layout-promo-box&quot;&gt;
      &lt;div class=&quot;col-sm-6 col-md-4 col-12-440width&quot;&gt;
        &lt;div class=&quot;tt-promo-box selecttext tt-one-child hover-type-2&quot; data-hovercolors=&quot;&quot;&gt;
          &lt;img class=&quot;lazyload&quot; src=&quot;image/catalog/wokiee/skin-yoga/yoga_01_800x.png&quot;&gt;&lt;div class=&quot;tt-description normal&quot;&gt;
          &lt;div class=&quot;tt-description-wrapper&quot;&gt;
            &lt;div class=&quot;tt-background&quot; style=&quot;background: rgba(255, 255, 255, 0); border: 2px solid rgba(0, 0, 0, 0); border-radius: 0px;&quot; data-bgc=&quot;rgba(255, 255, 255, 0.0)&quot; data-abgc=&quot;rgba(40, 121, 254, 0.0)&quot; data-borc=&quot;rgba(0, 0, 0, 0.0)&quot; data-aborc=&quot;rgba(0, 0, 0, 0.0)&quot;&gt;&lt;/div&gt;
            &lt;div class=&quot;tt-title-small&quot; style=&quot;color:#ffffff;&quot; data-c=&quot;#ffffff&quot; data-ac=&quot;#ffffff&quot;&gt;&lt;i&gt;Bras&lt;/i&gt;&lt;/div&gt;
            &lt;div class=&quot;tt-title-large&quot; style=&quot;color:#ffffff;&quot; data-c=&quot;#ffffff&quot; data-ac=&quot;#ffffff&quot;&gt;UP TO 50% OFF&lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;tt-description tt-point-v-b&quot;&gt;
          &lt;div class=&quot;tt-description-wrapper&quot;&gt;
            &lt;div class=&quot;tt-background&quot; style=&quot;background:rgba(0,0,0,0)&quot;&gt;&lt;/div&gt;&lt;div class=&quot;custom-buttons&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;btn&quot; style=&quot;background:#ffffff; color:#191919;&quot; data-bgc=&quot;#ffffff&quot; data-abgc=&quot;#191919&quot; data-c=&quot;#191919&quot; data-ac=&quot;#ffffff&quot; data-hovercolors=&quot;&quot; use-on-hover=&quot;true&quot;&gt;Discover now!&lt;/a&gt;&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;div class=&quot;col-sm-6 col-md-4 col-12-440width&quot;&gt;
        &lt;div class=&quot;tt-promo-box selecttext tt-one-child hover-type-2&quot; data-hovercolors=&quot;&quot;&gt;
          &lt;img class=&quot;lazyload&quot; src=&quot;image/catalog/wokiee/skin-yoga/yoga_02_800x.png&quot;&gt;
          &lt;div class=&quot;tt-description normal&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot; style=&quot;background: rgba(255, 255, 255, 0); border: 2px solid rgba(0, 0, 0, 0); border-radius: 0px;&quot; data-bgc=&quot;rgba(255, 255, 255, 0.0)&quot; data-abgc=&quot;rgba(40, 121, 254, 0.0)&quot; data-borc=&quot;rgba(0, 0, 0, 0.0)&quot; data-aborc=&quot;rgba(0, 0, 0, 0.0)&quot;&gt;&lt;/div&gt;&lt;div class=&quot;tt-title-small&quot; style=&quot;color:#ffffff;&quot; data-c=&quot;#ffffff&quot; data-ac=&quot;#ffffff&quot;&gt;&lt;i&gt;Leggings&lt;/i&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot; style=&quot;color:#ffffff;&quot; data-c=&quot;#ffffff&quot; data-ac=&quot;#ffffff&quot;&gt;UP TO 50% OFF&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;tt-description tt-point-v-b&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot; style=&quot;background:rgba(0,0,0,0)&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;custom-buttons&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;btn&quot; style=&quot;background: rgb(255, 255, 255); color: rgb(25, 25, 25);&quot; data-bgc=&quot;#ffffff&quot; data-abgc=&quot;#191919&quot; data-c=&quot;#191919&quot; data-ac=&quot;#ffffff&quot; data-hovercolors=&quot;&quot; use-on-hover=&quot;true&quot;&gt;Discover now!&lt;/a&gt;&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;div class=&quot;col-sm-6 col-md-4 col-12-440width&quot;&gt;
        &lt;div class=&quot;tt-promo-box selecttext tt-one-child hover-type-2&quot; data-hovercolors=&quot;&quot;&gt;
          &lt;img class=&quot;lazyload&quot; src=&quot;image/catalog/wokiee/skin-yoga/yoga_03_800x.png&quot;&gt;
          &lt;div class=&quot;tt-description normal&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot; style=&quot;background: rgba(255, 255, 255, 0); border: 2px solid rgba(0, 0, 0, 0); border-radius: 0px;&quot; data-bgc=&quot;rgba(255, 255, 255, 0.0)&quot; data-abgc=&quot;rgba(40, 121, 254, 0.0)&quot; data-borc=&quot;rgba(0, 0, 0, 0.0)&quot; data-aborc=&quot;rgba(0, 0, 0, 0.0)&quot;&gt;&lt;/div&gt;&lt;div class=&quot;tt-title-small&quot; style=&quot;color:#ffffff;&quot; data-c=&quot;#ffffff&quot; data-ac=&quot;#ffffff&quot;&gt;&lt;i&gt;Top&lt;/i&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot; style=&quot;color:#ffffff;&quot; data-c=&quot;#ffffff&quot; data-ac=&quot;#ffffff&quot;&gt;UP TO 50% OFF&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;tt-description tt-point-v-b&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot; style=&quot;background:rgba(0,0,0,0)&quot;&gt;&lt;/div&gt;&lt;div class=&quot;custom-buttons&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;btn&quot; style=&quot;background:#ffffff; color:#191919;&quot; data-bgc=&quot;#ffffff&quot; data-abgc=&quot;#191919&quot; data-c=&quot;#191919&quot; data-ac=&quot;#ffffff&quot; data-hovercolors=&quot;&quot; use-on-hover=&quot;true&quot;&gt;Discover now!&lt;/a&gt;&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;container-indent &quot;&gt;
  &lt;div class=&quot;container-fluid-custom&quot;&gt;
    &lt;div class=&quot;tt-block-title&quot;&gt;
      &lt;h2 class=&quot;tt-title&quot;&gt;Everything for Your Yoga Needs&lt;/h2&gt;
    &lt;/div&gt;
    &lt;div class=&quot;row tt-layout-promo-box&quot;&gt;
      &lt;div class=&quot;col-sm-6 col-md-4 col-12-440width&quot;&gt;
        &lt;div class=&quot;tt-promo-box selecttext tt-one-child hover-type-2&quot; data-hovercolors=&quot;&quot;&gt;
          &lt;img class=&quot;lazyload&quot; src=&quot;image/catalog/wokiee/skin-yoga/yoga_01_800x.png&quot;&gt;&lt;div class=&quot;tt-description normal&quot;&gt;
          &lt;div class=&quot;tt-description-wrapper&quot;&gt;
            &lt;div class=&quot;tt-background&quot; style=&quot;background: rgba(255, 255, 255, 0); border: 2px solid rgba(0, 0, 0, 0); border-radius: 0px;&quot; data-bgc=&quot;rgba(255, 255, 255, 0.0)&quot; data-abgc=&quot;rgba(40, 121, 254, 0.0)&quot; data-borc=&quot;rgba(0, 0, 0, 0.0)&quot; data-aborc=&quot;rgba(0, 0, 0, 0.0)&quot;&gt;&lt;/div&gt;
            &lt;div class=&quot;tt-title-small&quot; style=&quot;color:#ffffff;&quot; data-c=&quot;#ffffff&quot; data-ac=&quot;#ffffff&quot;&gt;&lt;i&gt;Bras&lt;/i&gt;&lt;/div&gt;
            &lt;div class=&quot;tt-title-large&quot; style=&quot;color:#ffffff;&quot; data-c=&quot;#ffffff&quot; data-ac=&quot;#ffffff&quot;&gt;UP TO 50% OFF&lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;tt-description tt-point-v-b&quot;&gt;
          &lt;div class=&quot;tt-description-wrapper&quot;&gt;
            &lt;div class=&quot;tt-background&quot; style=&quot;background:rgba(0,0,0,0)&quot;&gt;&lt;/div&gt;&lt;div class=&quot;custom-buttons&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;btn&quot; style=&quot;background:#ffffff; color:#191919;&quot; data-bgc=&quot;#ffffff&quot; data-abgc=&quot;#191919&quot; data-c=&quot;#191919&quot; data-ac=&quot;#ffffff&quot; data-hovercolors=&quot;&quot; use-on-hover=&quot;true&quot;&gt;Discover now!&lt;/a&gt;&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;div class=&quot;col-sm-6 col-md-4 col-12-440width&quot;&gt;
        &lt;div class=&quot;tt-promo-box selecttext tt-one-child hover-type-2&quot; data-hovercolors=&quot;&quot;&gt;
          &lt;img class=&quot;lazyload&quot; src=&quot;image/catalog/wokiee/skin-yoga/yoga_02_800x.png&quot;&gt;
          &lt;div class=&quot;tt-description normal&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot; style=&quot;background: rgba(255, 255, 255, 0); border: 2px solid rgba(0, 0, 0, 0); border-radius: 0px;&quot; data-bgc=&quot;rgba(255, 255, 255, 0.0)&quot; data-abgc=&quot;rgba(40, 121, 254, 0.0)&quot; data-borc=&quot;rgba(0, 0, 0, 0.0)&quot; data-aborc=&quot;rgba(0, 0, 0, 0.0)&quot;&gt;&lt;/div&gt;&lt;div class=&quot;tt-title-small&quot; style=&quot;color:#ffffff;&quot; data-c=&quot;#ffffff&quot; data-ac=&quot;#ffffff&quot;&gt;&lt;i&gt;Leggings&lt;/i&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot; style=&quot;color:#ffffff;&quot; data-c=&quot;#ffffff&quot; data-ac=&quot;#ffffff&quot;&gt;UP TO 50% OFF&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;tt-description tt-point-v-b&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot; style=&quot;background:rgba(0,0,0,0)&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;custom-buttons&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;btn&quot; style=&quot;background: rgb(255, 255, 255); color: rgb(25, 25, 25);&quot; data-bgc=&quot;#ffffff&quot; data-abgc=&quot;#191919&quot; data-c=&quot;#191919&quot; data-ac=&quot;#ffffff&quot; data-hovercolors=&quot;&quot; use-on-hover=&quot;true&quot;&gt;Discover now!&lt;/a&gt;&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;div class=&quot;col-sm-6 col-md-4 col-12-440width&quot;&gt;
        &lt;div class=&quot;tt-promo-box selecttext tt-one-child hover-type-2&quot; data-hovercolors=&quot;&quot;&gt;
          &lt;img class=&quot;lazyload&quot; src=&quot;image/catalog/wokiee/skin-yoga/yoga_03_800x.png&quot;&gt;
          &lt;div class=&quot;tt-description normal&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot; style=&quot;background: rgba(255, 255, 255, 0); border: 2px solid rgba(0, 0, 0, 0); border-radius: 0px;&quot; data-bgc=&quot;rgba(255, 255, 255, 0.0)&quot; data-abgc=&quot;rgba(40, 121, 254, 0.0)&quot; data-borc=&quot;rgba(0, 0, 0, 0.0)&quot; data-aborc=&quot;rgba(0, 0, 0, 0.0)&quot;&gt;&lt;/div&gt;&lt;div class=&quot;tt-title-small&quot; style=&quot;color:#ffffff;&quot; data-c=&quot;#ffffff&quot; data-ac=&quot;#ffffff&quot;&gt;&lt;i&gt;Top&lt;/i&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot; style=&quot;color:#ffffff;&quot; data-c=&quot;#ffffff&quot; data-ac=&quot;#ffffff&quot;&gt;UP TO 50% OFF&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;tt-description tt-point-v-b&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot; style=&quot;background:rgba(0,0,0,0)&quot;&gt;&lt;/div&gt;&lt;div class=&quot;custom-buttons&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;btn&quot; style=&quot;background:#ffffff; color:#191919;&quot; data-bgc=&quot;#ffffff&quot; data-abgc=&quot;#191919&quot; data-c=&quot;#191919&quot; data-ac=&quot;#ffffff&quot; data-hovercolors=&quot;&quot; use-on-hover=&quot;true&quot;&gt;Discover now!&lt;/a&gt;&lt;/div&gt;
            &lt;/div&gt;
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
      1 => '&lt;div class=&quot;container-indent &quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;row&quot;&gt;
      &lt;div class=&quot;col-sm-6 col-md-6 col-12-440width&quot;&gt;
        &lt;div class=&quot;tt-promo-box selecttext tt-one-child hover-type-2&quot; data-hovercolors=&quot;&quot;&gt;
          &lt;img class=&quot;lazyload&quot; src=&quot;image/catalog/wokiee/skin-yoga/yoga_04_600x.png&quot;&gt;
          &lt;div class=&quot;tt-description normal&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot; style=&quot;background: rgba(255, 255, 255, 0); border: 2px solid rgba(0, 0, 0, 0); border-radius: 0px;&quot; data-bgc=&quot;rgba(255, 255, 255, 0.0)&quot; data-abgc=&quot;rgba(40, 121, 254, 0.0)&quot; data-borc=&quot;rgba(0, 0, 0, 0.0)&quot; data-aborc=&quot;rgba(0, 0, 0, 0.0)&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-title-small&quot; style=&quot;color:#ffffff;&quot; data-c=&quot;#ffffff&quot; data-ac=&quot;#ffffff&quot;&gt;&lt;i&gt;The Must-Haves&lt;/i&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot; style=&quot;color:#ffffff;&quot; data-c=&quot;#ffffff&quot; data-ac=&quot;#ffffff&quot;&gt;SHOP BESTSELLERS&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;tt-description tt-point-v-b&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot; style=&quot;background:rgba(0,0,0,0)&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;custom-buttons&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;btn&quot; style=&quot;background:#ffffff; color:#191919;&quot; data-bgc=&quot;#ffffff&quot; data-abgc=&quot;#191919&quot; data-c=&quot;#191919&quot; data-ac=&quot;#ffffff&quot; data-hovercolors=&quot;&quot; use-on-hover=&quot;true&quot;&gt;Discover now!&lt;/a&gt;&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;div class=&quot;col-sm-6 col-md-6 col-12-440width&quot;&gt;
        &lt;div class=&quot;tt-promo-box selecttext tt-one-child hover-type-2&quot; data-hovercolors=&quot;&quot;&gt;
        &lt;img class=&quot;lazyload&quot; src=&quot;image/catalog/wokiee/skin-yoga/yoga_05_600x.png&quot;&gt;
        &lt;div class=&quot;tt-description normal&quot;&gt;
          &lt;div class=&quot;tt-description-wrapper&quot;&gt;
            &lt;div class=&quot;tt-background&quot; style=&quot;background: rgba(255, 255, 255, 0); border: 2px solid rgba(0, 0, 0, 0); border-radius: 0px;&quot; data-bgc=&quot;rgba(255, 255, 255, 0.0)&quot; data-abgc=&quot;rgba(40, 121, 254, 0.0)&quot; data-borc=&quot;rgba(0, 0, 0, 0.0)&quot; data-aborc=&quot;rgba(0, 0, 0, 0.0)&quot;&gt;&lt;/div&gt;&lt;div class=&quot;tt-title-small&quot; style=&quot;color:#ffffff;&quot; data-c=&quot;#ffffff&quot; data-ac=&quot;#ffffff&quot;&gt;&lt;i&gt;Men’s Clothing&lt;/i&gt;&lt;/div&gt;
            &lt;div class=&quot;tt-title-large&quot; style=&quot;color:#ffffff;&quot; data-c=&quot;#ffffff&quot; data-ac=&quot;#ffffff&quot;&gt;UP TO 50% OFF&lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;tt-description tt-point-v-b&quot;&gt;
          &lt;div class=&quot;tt-description-wrapper&quot;&gt;
            &lt;div class=&quot;tt-background&quot; style=&quot;background:rgba(0,0,0,0)&quot;&gt;&lt;/div&gt;
            &lt;div class=&quot;custom-buttons&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;btn&quot; style=&quot;background:#ffffff; color:#191919;&quot; data-bgc=&quot;#ffffff&quot; data-abgc=&quot;#191919&quot; data-c=&quot;#191919&quot; data-ac=&quot;#ffffff&quot; data-hovercolors=&quot;&quot; use-on-hover=&quot;true&quot;&gt;Discover now!&lt;/a&gt;&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;container-indent &quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;row&quot;&gt;
      &lt;div class=&quot;col-sm-6 col-md-6 col-12-440width&quot;&gt;
        &lt;div class=&quot;tt-promo-box selecttext tt-one-child hover-type-2&quot; data-hovercolors=&quot;&quot;&gt;
          &lt;img class=&quot;lazyload&quot; src=&quot;image/catalog/wokiee/skin-yoga/yoga_04_600x.png&quot;&gt;
          &lt;div class=&quot;tt-description normal&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot; style=&quot;background: rgba(255, 255, 255, 0); border: 2px solid rgba(0, 0, 0, 0); border-radius: 0px;&quot; data-bgc=&quot;rgba(255, 255, 255, 0.0)&quot; data-abgc=&quot;rgba(40, 121, 254, 0.0)&quot; data-borc=&quot;rgba(0, 0, 0, 0.0)&quot; data-aborc=&quot;rgba(0, 0, 0, 0.0)&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-title-small&quot; style=&quot;color:#ffffff;&quot; data-c=&quot;#ffffff&quot; data-ac=&quot;#ffffff&quot;&gt;&lt;i&gt;The Must-Haves&lt;/i&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot; style=&quot;color:#ffffff;&quot; data-c=&quot;#ffffff&quot; data-ac=&quot;#ffffff&quot;&gt;SHOP BESTSELLERS&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;tt-description tt-point-v-b&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot; style=&quot;background:rgba(0,0,0,0)&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;custom-buttons&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;btn&quot; style=&quot;background:#ffffff; color:#191919;&quot; data-bgc=&quot;#ffffff&quot; data-abgc=&quot;#191919&quot; data-c=&quot;#191919&quot; data-ac=&quot;#ffffff&quot; data-hovercolors=&quot;&quot; use-on-hover=&quot;true&quot;&gt;Discover now!&lt;/a&gt;&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;div class=&quot;col-sm-6 col-md-6 col-12-440width&quot;&gt;
        &lt;div class=&quot;tt-promo-box selecttext tt-one-child hover-type-2&quot; data-hovercolors=&quot;&quot;&gt;
        &lt;img class=&quot;lazyload&quot; src=&quot;image/catalog/wokiee/skin-yoga/yoga_05_600x.png&quot;&gt;
        &lt;div class=&quot;tt-description normal&quot;&gt;
          &lt;div class=&quot;tt-description-wrapper&quot;&gt;
            &lt;div class=&quot;tt-background&quot; style=&quot;background: rgba(255, 255, 255, 0); border: 2px solid rgba(0, 0, 0, 0); border-radius: 0px;&quot; data-bgc=&quot;rgba(255, 255, 255, 0.0)&quot; data-abgc=&quot;rgba(40, 121, 254, 0.0)&quot; data-borc=&quot;rgba(0, 0, 0, 0.0)&quot; data-aborc=&quot;rgba(0, 0, 0, 0.0)&quot;&gt;&lt;/div&gt;&lt;div class=&quot;tt-title-small&quot; style=&quot;color:#ffffff;&quot; data-c=&quot;#ffffff&quot; data-ac=&quot;#ffffff&quot;&gt;&lt;i&gt;Men’s Clothing&lt;/i&gt;&lt;/div&gt;
            &lt;div class=&quot;tt-title-large&quot; style=&quot;color:#ffffff;&quot; data-c=&quot;#ffffff&quot; data-ac=&quot;#ffffff&quot;&gt;UP TO 50% OFF&lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;tt-description tt-point-v-b&quot;&gt;
          &lt;div class=&quot;tt-description-wrapper&quot;&gt;
            &lt;div class=&quot;tt-background&quot; style=&quot;background:rgba(0,0,0,0)&quot;&gt;&lt;/div&gt;
            &lt;div class=&quot;custom-buttons&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;btn&quot; style=&quot;background:#ffffff; color:#191919;&quot; data-bgc=&quot;#ffffff&quot; data-abgc=&quot;#191919&quot; data-c=&quot;#191919&quot; data-ac=&quot;#ffffff&quot; data-hovercolors=&quot;&quot; use-on-hover=&quot;true&quot;&gt;Discover now!&lt;/a&gt;&lt;/div&gt;
            &lt;/div&gt;
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
    'sort_order' => '5',
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
      1 => '&lt;div class=&quot;container-indent &quot; style=&quot;margin-top: 72px&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;row tt-services-listing&quot;&gt;&lt;div class=&quot;col-xs-12 col-md-6 col-lg-3&quot;&gt;
        &lt;a href=&quot;&quot; class=&quot;tt-services-block&quot; data-hovercolors=&quot;&quot;&gt;&lt;div class=&quot;tt-col-icon&quot;&gt;&lt;i class=&quot;icon-f-48&quot; style=&quot;color: #191919&quot;&gt;&lt;/i&gt;&lt;/div&gt;&lt;div class=&quot;tt-col-description&quot;&gt;
            &lt;h4 class=&quot;tt-title&quot; style=&quot;color: rgb(253, 126, 94);&quot; data-c=&quot;#fd7e5e&quot; data-ac=&quot;#191919&quot;&gt;FREE SHIPPING&lt;/h4&gt;
            &lt;p style=&quot;color: #777777&quot;&gt;Free shipping on all US order or order above $99&lt;/p&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;&lt;div class=&quot;col-xs-12 col-md-6 col-lg-3&quot;&gt;
        &lt;a href=&quot;&quot; class=&quot;tt-services-block&quot; data-hovercolors=&quot;&quot;&gt;&lt;div class=&quot;tt-col-icon&quot;&gt;&lt;i class=&quot;icon-f-35&quot; style=&quot;color: #191919&quot;&gt;&lt;/i&gt;&lt;/div&gt;&lt;div class=&quot;tt-col-description&quot;&gt;
            &lt;h4 class=&quot;tt-title&quot; style=&quot;color: rgb(253, 126, 94);&quot; data-c=&quot;#fd7e5e&quot; data-ac=&quot;#191919&quot;&gt;SUPPORT 24/7&lt;/h4&gt;
            &lt;p style=&quot;color: #777777&quot;&gt;Contact us 24 hours a day, 7 days a week&lt;/p&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;&lt;div class=&quot;col-xs-12 col-md-6 col-lg-3&quot;&gt;
        &lt;a href=&quot;&quot; class=&quot;tt-services-block&quot; data-hovercolors=&quot;&quot;&gt;&lt;div class=&quot;tt-col-icon&quot;&gt;&lt;i class=&quot;icon-e-09&quot; style=&quot;color: #191919&quot;&gt;&lt;/i&gt;&lt;/div&gt;&lt;div class=&quot;tt-col-description&quot;&gt;
            &lt;h4 class=&quot;tt-title&quot; style=&quot;color:#fd7e5e;&quot; data-c=&quot;#fd7e5e&quot; data-ac=&quot;#191919&quot;&gt;30 DAYS RETURN&lt;/h4&gt;
            &lt;p style=&quot;color: #777777&quot;&gt;Simply return it within 24 days for an exchange.&lt;/p&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;&lt;div class=&quot;col-xs-12 col-md-6 col-lg-3&quot;&gt;
        &lt;a href=&quot;&quot; class=&quot;tt-services-block&quot; data-hovercolors=&quot;&quot;&gt;&lt;div class=&quot;tt-col-icon&quot;&gt;&lt;i class=&quot;icon-f-77&quot; style=&quot;color: #191919&quot;&gt;&lt;/i&gt;&lt;/div&gt;&lt;div class=&quot;tt-col-description&quot;&gt;
            &lt;h4 class=&quot;tt-title&quot; style=&quot;color:#fd7e5e;&quot; data-c=&quot;#fd7e5e&quot; data-ac=&quot;#191919&quot;&gt;100% PAYMENT SECURE&lt;/h4&gt;
            &lt;p style=&quot;color: #777777&quot;&gt;We ensure secure payment with PEV&lt;/p&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;&lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;container-indent &quot; style=&quot;margin-top: 72px&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;row tt-services-listing&quot;&gt;&lt;div class=&quot;col-xs-12 col-md-6 col-lg-3&quot;&gt;
        &lt;a href=&quot;&quot; class=&quot;tt-services-block&quot; data-hovercolors=&quot;&quot;&gt;&lt;div class=&quot;tt-col-icon&quot;&gt;&lt;i class=&quot;icon-f-48&quot; style=&quot;color: #191919&quot;&gt;&lt;/i&gt;&lt;/div&gt;&lt;div class=&quot;tt-col-description&quot;&gt;
            &lt;h4 class=&quot;tt-title&quot; style=&quot;color: rgb(253, 126, 94);&quot; data-c=&quot;#fd7e5e&quot; data-ac=&quot;#191919&quot;&gt;FREE SHIPPING&lt;/h4&gt;
            &lt;p style=&quot;color: #777777&quot;&gt;Free shipping on all US order or order above $99&lt;/p&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;&lt;div class=&quot;col-xs-12 col-md-6 col-lg-3&quot;&gt;
        &lt;a href=&quot;&quot; class=&quot;tt-services-block&quot; data-hovercolors=&quot;&quot;&gt;&lt;div class=&quot;tt-col-icon&quot;&gt;&lt;i class=&quot;icon-f-35&quot; style=&quot;color: #191919&quot;&gt;&lt;/i&gt;&lt;/div&gt;&lt;div class=&quot;tt-col-description&quot;&gt;
            &lt;h4 class=&quot;tt-title&quot; style=&quot;color: rgb(253, 126, 94);&quot; data-c=&quot;#fd7e5e&quot; data-ac=&quot;#191919&quot;&gt;SUPPORT 24/7&lt;/h4&gt;
            &lt;p style=&quot;color: #777777&quot;&gt;Contact us 24 hours a day, 7 days a week&lt;/p&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;&lt;div class=&quot;col-xs-12 col-md-6 col-lg-3&quot;&gt;
        &lt;a href=&quot;&quot; class=&quot;tt-services-block&quot; data-hovercolors=&quot;&quot;&gt;&lt;div class=&quot;tt-col-icon&quot;&gt;&lt;i class=&quot;icon-e-09&quot; style=&quot;color: #191919&quot;&gt;&lt;/i&gt;&lt;/div&gt;&lt;div class=&quot;tt-col-description&quot;&gt;
            &lt;h4 class=&quot;tt-title&quot; style=&quot;color:#fd7e5e;&quot; data-c=&quot;#fd7e5e&quot; data-ac=&quot;#191919&quot;&gt;30 DAYS RETURN&lt;/h4&gt;
            &lt;p style=&quot;color: #777777&quot;&gt;Simply return it within 24 days for an exchange.&lt;/p&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;&lt;div class=&quot;col-xs-12 col-md-6 col-lg-3&quot;&gt;
        &lt;a href=&quot;&quot; class=&quot;tt-services-block&quot; data-hovercolors=&quot;&quot;&gt;&lt;div class=&quot;tt-col-icon&quot;&gt;&lt;i class=&quot;icon-f-77&quot; style=&quot;color: #191919&quot;&gt;&lt;/i&gt;&lt;/div&gt;&lt;div class=&quot;tt-col-description&quot;&gt;
            &lt;h4 class=&quot;tt-title&quot; style=&quot;color:#fd7e5e;&quot; data-c=&quot;#fd7e5e&quot; data-ac=&quot;#191919&quot;&gt;100% PAYMENT SECURE&lt;/h4&gt;
            &lt;p style=&quot;color: #777777&quot;&gt;We ensure secure payment with PEV&lt;/p&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;&lt;/div&gt;
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
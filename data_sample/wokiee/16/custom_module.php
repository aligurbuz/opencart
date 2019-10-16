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
      1 => '  &lt;div class=&quot;tt-footer-custom tt-color-scheme-04&quot;&gt;
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
      $language_id => ' &lt;div class=&quot;tt-footer-custom tt-color-scheme-04&quot;&gt;
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
      1 => '  &lt;div class=&quot;container-indent&quot;&gt;
    &lt;div class=&quot;container&quot;&gt;
      &lt;div class=&quot;tt-block-title&quot;&gt;
        &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a target=&quot;_blank&quot; href=&quot;https://www.instagram.com/wokieeshop/&quot;&gt;@ FOLLOW&lt;/a&gt; US ON&lt;/h2&gt;
        &lt;div class=&quot;tt-description&quot;&gt;INSTAGRAM&lt;/div&gt;
      &lt;/div&gt;
      &lt;div id=&quot;instafeed&quot; class=&quot;instafeed-fluid&quot;
          data-accessToken=&quot;8626857013.dd09515.0fcd8351c65140d48f5a340693af1c3f&quot;
          data-clientId=&quot;dd095157744c4bd0a67181fc4906e5b6&quot;
          data-userId=&quot;8626857013&quot;
          data-limitImg=&quot;6&quot;&gt;
        &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;',
      $language_id => ' &lt;div class=&quot;container-indent&quot;&gt;
    &lt;div class=&quot;container&quot;&gt;
      &lt;div class=&quot;tt-block-title&quot;&gt;
        &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a target=&quot;_blank&quot; href=&quot;https://www.instagram.com/wokieeshop/&quot;&gt;@ FOLLOW&lt;/a&gt; US ON&lt;/h2&gt;
        &lt;div class=&quot;tt-description&quot;&gt;INSTAGRAM&lt;/div&gt;
      &lt;/div&gt;
      &lt;div id=&quot;instafeed&quot; class=&quot;instafeed-fluid&quot;
          data-accessToken=&quot;8626857013.dd09515.0fcd8351c65140d48f5a340693af1c3f&quot;
          data-clientId=&quot;dd095157744c4bd0a67181fc4906e5b6&quot;
          data-userId=&quot;8626857013&quot;
          data-limitImg=&quot;6&quot;&gt;
        &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;',
    ),
    'layout_id' => '1',
    'position' => 'content_bottom',
    'status' => '1',
    'sort_order' => '8',
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
  &lt;div class=&quot;container container-fluid-custom-mobile-padding&quot;&gt;
    &lt;div class=&quot;tt-categories-listing&quot;&gt;
      &lt;div class=&quot;row&quot;&gt;
        &lt;div class=&quot;col-6 col-md-4&quot;&gt;
          &lt;div class=&quot;tt-items-categories&quot;&gt;
            &lt;a class=&quot;tt-title-block&quot; href=&quot;#&quot;&gt;
              &lt;h2 class=&quot;tt-title&quot;&gt;WOMEN&lt;/h2&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/index16-img-01.jpg&quot; alt=&quot;&quot;&gt;
            &lt;/a&gt;
            &lt;ul&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Dresses&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Shirts &amp;amp; Tops&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Polo Shirts&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Sweaters&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Blazers &amp;amp; Vests&lt;/a&gt;&lt;/li&gt;
            &lt;/ul&gt;
            &lt;a class=&quot;btn-link-02&quot; href=&quot;#&quot;&gt;See All Products&lt;/a&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;col-6 col-md-4&quot;&gt;
          &lt;div class=&quot;tt-items-categories&quot;&gt;
            &lt;a class=&quot;tt-title-block&quot; href=&quot;#&quot;&gt;
              &lt;h2 class=&quot;tt-title&quot;&gt;MEN&lt;/h2&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/index16-img-02.jpg&quot; alt=&quot;&quot;&gt;
            &lt;/a&gt;
            &lt;ul&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Coats &amp;amp; Jackets &lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Suits&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Sweatshirts&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;T-shirts&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Pants&lt;/a&gt;&lt;/li&gt;
            &lt;/ul&gt;
            &lt;a class=&quot;btn-link-02&quot; href=&quot;#&quot;&gt;See All Products&lt;/a&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;col-6 col-md-4&quot;&gt;
          &lt;div class=&quot;tt-items-categories&quot;&gt;
            &lt;a class=&quot;tt-title-block&quot; href=&quot;#&quot;&gt;
              &lt;h2 class=&quot;tt-title&quot;&gt;ACCESSORIES&lt;/h2&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/index16-img-03.jpg&quot; alt=&quot;&quot;&gt;
            &lt;/a&gt;
            &lt;ul&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Bags &amp;amp; Wallets&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Shoes&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Hats&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Sunglasses&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Scarves&lt;/a&gt;&lt;/li&gt;
            &lt;/ul&gt;
            &lt;a class=&quot;btn-link-02&quot; href=&quot;#&quot;&gt;See All Products&lt;/a&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;container-indent&quot;&gt;
  &lt;div class=&quot;container container-fluid-custom-mobile-padding&quot;&gt;
    &lt;div class=&quot;tt-categories-listing&quot;&gt;
      &lt;div class=&quot;row&quot;&gt;
        &lt;div class=&quot;col-6 col-md-4&quot;&gt;
          &lt;div class=&quot;tt-items-categories&quot;&gt;
            &lt;a class=&quot;tt-title-block&quot; href=&quot;#&quot;&gt;
              &lt;h2 class=&quot;tt-title&quot;&gt;WOMEN&lt;/h2&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/index16-img-01.jpg&quot; alt=&quot;&quot;&gt;
            &lt;/a&gt;
            &lt;ul&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Dresses&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Shirts &amp;amp; Tops&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Polo Shirts&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Sweaters&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Blazers &amp;amp; Vests&lt;/a&gt;&lt;/li&gt;
            &lt;/ul&gt;
            &lt;a class=&quot;btn-link-02&quot; href=&quot;#&quot;&gt;See All Products&lt;/a&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;col-6 col-md-4&quot;&gt;
          &lt;div class=&quot;tt-items-categories&quot;&gt;
            &lt;a class=&quot;tt-title-block&quot; href=&quot;#&quot;&gt;
              &lt;h2 class=&quot;tt-title&quot;&gt;MEN&lt;/h2&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/index16-img-02.jpg&quot; alt=&quot;&quot;&gt;
            &lt;/a&gt;
            &lt;ul&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Coats &amp;amp; Jackets &lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Suits&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Sweatshirts&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;T-shirts&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Pants&lt;/a&gt;&lt;/li&gt;
            &lt;/ul&gt;
            &lt;a class=&quot;btn-link-02&quot; href=&quot;#&quot;&gt;See All Products&lt;/a&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;col-6 col-md-4&quot;&gt;
          &lt;div class=&quot;tt-items-categories&quot;&gt;
            &lt;a class=&quot;tt-title-block&quot; href=&quot;#&quot;&gt;
              &lt;h2 class=&quot;tt-title&quot;&gt;ACCESSORIES&lt;/h2&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/index16-img-03.jpg&quot; alt=&quot;&quot;&gt;
            &lt;/a&gt;
            &lt;ul&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Bags &amp;amp; Wallets&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Shoes&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Hats&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Sunglasses&lt;/a&gt;&lt;/li&gt;
              &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Scarves&lt;/a&gt;&lt;/li&gt;
            &lt;/ul&gt;
            &lt;a class=&quot;btn-link-02&quot; href=&quot;#&quot;&gt;See All Products&lt;/a&gt;
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
    'sort_order' => '4',
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
    &lt;div class=&quot;tt-block-title&quot;&gt;
      &lt;h1 class=&quot;tt-title&quot;&gt;POPULAR&lt;/h1&gt;
      &lt;div class=&quot;tt-description&quot;&gt;CLOTHING BRANDS&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;row tt-layout-promo-box&quot;&gt;
      &lt;div class=&quot;col-6 col-md-3 col-12-575width&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index06-promo-img-06.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-01.png&quot; alt=&quot;&quot;&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-md-3 col-12-575width&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index06-promo-img-05.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-02.png&quot; alt=&quot;&quot;&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-md-3 col-12-575width&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index06-promo-img-11.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-03.png&quot; alt=&quot;&quot;&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-md-3 col-12-575width&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index06-promo-img-09.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-04.png&quot; alt=&quot;&quot;&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-md-3 col-12-575width&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index06-promo-img-08.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-05.png&quot; alt=&quot;&quot;&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-md-3 col-12-575width&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index06-promo-img-10.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-06.png&quot; alt=&quot;&quot;&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-md-3 col-12-575width&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index06-promo-img-12.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-07.png&quot; alt=&quot;&quot;&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-md-3 col-12-575width&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index06-promo-img-07.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-08.png&quot; alt=&quot;&quot;&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;container-indent&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;tt-block-title&quot;&gt;
      &lt;h1 class=&quot;tt-title&quot;&gt;POPULAR&lt;/h1&gt;
      &lt;div class=&quot;tt-description&quot;&gt;CLOTHING BRANDS&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;row tt-layout-promo-box&quot;&gt;
      &lt;div class=&quot;col-6 col-md-3 col-12-575width&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index06-promo-img-06.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-01.png&quot; alt=&quot;&quot;&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-md-3 col-12-575width&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index06-promo-img-05.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-02.png&quot; alt=&quot;&quot;&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-md-3 col-12-575width&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index06-promo-img-11.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-03.png&quot; alt=&quot;&quot;&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-md-3 col-12-575width&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index06-promo-img-09.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-04.png&quot; alt=&quot;&quot;&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-md-3 col-12-575width&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index06-promo-img-08.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-05.png&quot; alt=&quot;&quot;&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-md-3 col-12-575width&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index06-promo-img-10.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-06.png&quot; alt=&quot;&quot;&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-md-3 col-12-575width&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index06-promo-img-12.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-07.png&quot; alt=&quot;&quot;&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-md-3 col-12-575width&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index06-promo-img-07.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-08.png&quot; alt=&quot;&quot;&gt;
            &lt;/div&gt;
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
    'sort_order' => '6',
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
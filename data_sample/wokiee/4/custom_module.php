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
        &lt;div class=&quot;tt-col-item tt-logo-col&quot;&gt;
          &lt;!-- logo --&gt;
          &lt;a class=&quot;tt-logo tt-logo-alignment&quot; href=&quot;index.html&quot;&gt;
            &lt;img  src=&quot;image/catalog/wokiee/custom/logo.png&quot; alt=&quot;&quot;&gt;
          &lt;/a&gt;
          &lt;!-- /logo --&gt;
        &lt;/div&gt;
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
        &lt;div class=&quot;tt-col-item tt-logo-col&quot;&gt;
          &lt;!-- logo --&gt;
          &lt;a class=&quot;tt-logo tt-logo-alignment&quot; href=&quot;index.html&quot;&gt;
            &lt;img  src=&quot;image/catalog/wokiee/custom/logo.png&quot; alt=&quot;&quot;&gt;
          &lt;/a&gt;
          &lt;!-- /logo --&gt;
        &lt;/div&gt;
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
      1 => '  &lt;div class=&quot;tt-offset-35 container-indent&quot;&gt;
    &lt;div class=&quot;container&quot;&gt;
      &lt;div class=&quot;row tt-services-listing&quot;&gt;
        &lt;div class=&quot;col-xs-12 col-md-6 col-lg-4&quot;&gt;
          &lt;a href=&quot;#&quot; class=&quot;tt-services-block&quot;&gt;
            &lt;div class=&quot;tt-col-icon&quot;&gt;
              &lt;i class=&quot;icon-f-48&quot;&gt;&lt;/i&gt;
            &lt;/div&gt;
            &lt;div class=&quot;tt-col-description&quot;&gt;
              &lt;h4 class=&quot;tt-title&quot;&gt;FREE SHIPPING&lt;/h4&gt;
              &lt;p&gt;Free shipping on all US order or order above $99&lt;/p&gt;
            &lt;/div&gt;
          &lt;/a&gt;
        &lt;/div&gt;
        &lt;div class=&quot;col-xs-12 col-md-6 col-lg-4&quot;&gt;
          &lt;a href=&quot;#&quot; class=&quot;tt-services-block&quot;&gt;
            &lt;div class=&quot;tt-col-icon&quot;&gt;
              &lt;i class=&quot;icon-f-35&quot;&gt;&lt;/i&gt;
            &lt;/div&gt;
            &lt;div class=&quot;tt-col-description&quot;&gt;
              &lt;h4 class=&quot;tt-title&quot;&gt;SUPPORT 24/7&lt;/h4&gt;
              &lt;p&gt;Contact us 24 hours a day, 7 days a week&lt;/p&gt;
            &lt;/div&gt;
          &lt;/a&gt;
        &lt;/div&gt;
        &lt;div class=&quot;col-xs-12 col-md-6 col-lg-4&quot;&gt;
          &lt;a href=&quot;#&quot; class=&quot;tt-services-block&quot;&gt;
            &lt;div class=&quot;tt-col-icon&quot;&gt;
              &lt;i class=&quot;icon-e-09&quot;&gt;&lt;/i&gt;
            &lt;/div&gt;
            &lt;div class=&quot;tt-col-description&quot;&gt;
              &lt;h4 class=&quot;tt-title&quot;&gt;30 DAYS RETURN&lt;/h4&gt;
              &lt;p&gt;Simply return it within 24 days for an exchange.&lt;/p&gt;
            &lt;/div&gt;
          &lt;/a&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;',
      $language_id => '  &lt;div class=&quot;tt-offset-35 container-indent&quot;&gt;
    &lt;div class=&quot;container&quot;&gt;
      &lt;div class=&quot;row tt-services-listing&quot;&gt;
        &lt;div class=&quot;col-xs-12 col-md-6 col-lg-4&quot;&gt;
          &lt;a href=&quot;#&quot; class=&quot;tt-services-block&quot;&gt;
            &lt;div class=&quot;tt-col-icon&quot;&gt;
              &lt;i class=&quot;icon-f-48&quot;&gt;&lt;/i&gt;
            &lt;/div&gt;
            &lt;div class=&quot;tt-col-description&quot;&gt;
              &lt;h4 class=&quot;tt-title&quot;&gt;FREE SHIPPING&lt;/h4&gt;
              &lt;p&gt;Free shipping on all US order or order above $99&lt;/p&gt;
            &lt;/div&gt;
          &lt;/a&gt;
        &lt;/div&gt;
        &lt;div class=&quot;col-xs-12 col-md-6 col-lg-4&quot;&gt;
          &lt;a href=&quot;#&quot; class=&quot;tt-services-block&quot;&gt;
            &lt;div class=&quot;tt-col-icon&quot;&gt;
              &lt;i class=&quot;icon-f-35&quot;&gt;&lt;/i&gt;
            &lt;/div&gt;
            &lt;div class=&quot;tt-col-description&quot;&gt;
              &lt;h4 class=&quot;tt-title&quot;&gt;SUPPORT 24/7&lt;/h4&gt;
              &lt;p&gt;Contact us 24 hours a day, 7 days a week&lt;/p&gt;
            &lt;/div&gt;
          &lt;/a&gt;
        &lt;/div&gt;
        &lt;div class=&quot;col-xs-12 col-md-6 col-lg-4&quot;&gt;
          &lt;a href=&quot;#&quot; class=&quot;tt-services-block&quot;&gt;
            &lt;div class=&quot;tt-col-icon&quot;&gt;
              &lt;i class=&quot;icon-e-09&quot;&gt;&lt;/i&gt;
            &lt;/div&gt;
            &lt;div class=&quot;tt-col-description&quot;&gt;
              &lt;h4 class=&quot;tt-title&quot;&gt;30 DAYS RETURN&lt;/h4&gt;
              &lt;p&gt;Simply return it within 24 days for an exchange.&lt;/p&gt;
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
    'sort_order' => '0',
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
      1 => '  &lt;div class=&quot;container-indent&quot;&gt;
    &lt;div class=&quot;container-fluid&quot;&gt;
      &lt;div class=&quot;tt-block-title&quot;&gt;
        &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a target=&quot;_blank&quot; href=&quot;https://www.instagram.com/wokieeshop/&quot;&gt;@ FOLLOW&lt;/a&gt; US ON&lt;/h2&gt;
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
        &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a target=&quot;_blank&quot; href=&quot;https://www.instagram.com/wokieeshop/&quot;&gt;@ FOLLOW&lt;/a&gt; US ON&lt;/h2&gt;
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
    'sort_order' => '8',
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
      1 => '&lt;div class=&quot;container-indent0&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;row flex-sm-row-reverse tt-layout-promo-box&quot;&gt;
      &lt;div class=&quot;col-sm-12 col-md-6&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-sm-6&quot;&gt;
            &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box tt-one-child hover-type-2&quot;&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index04-promo-img-02.jpg&quot; alt=&quot;&quot;&gt;
              &lt;div class=&quot;tt-description&quot;&gt;
                &lt;div class=&quot;tt-description-wrapper&quot;&gt;
                  &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
                  &lt;div class=&quot;tt-title-small&quot;&gt;WOMEN&lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/a&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-6&quot;&gt;
            &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box tt-one-child hover-type-2&quot;&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index04-promo-img-03.jpg&quot; alt=&quot;&quot;&gt;
              &lt;div class=&quot;tt-description&quot;&gt;
                &lt;div class=&quot;tt-description-wrapper&quot;&gt;
                  &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
                  &lt;div class=&quot;tt-title-small&quot;&gt;MEN&lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/a&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-12&quot;&gt;
            &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index04-promo-img-04.jpg&quot; alt=&quot;&quot;&gt;
              &lt;div class=&quot;tt-description&quot;&gt;
                &lt;div class=&quot;tt-description-wrapper&quot;&gt;
                  &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
                  &lt;div class=&quot;tt-title-small&quot;&gt;READY TO&lt;/div&gt;
                  &lt;div class=&quot;tt-title-large&quot;&gt;USE UNIQUE DEMOS&lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/a&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-sm-12 col-md-6&quot;&gt;
        &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index04-promo-img-01.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-title-small&quot;&gt;MULTI-PURPOSE&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot;&gt;OPENCART THEME&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;container-indent0&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;row flex-sm-row-reverse tt-layout-promo-box&quot;&gt;
      &lt;div class=&quot;col-sm-12 col-md-6&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-sm-6&quot;&gt;
            &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box tt-one-child hover-type-2&quot;&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index04-promo-img-02.jpg&quot; alt=&quot;&quot;&gt;
              &lt;div class=&quot;tt-description&quot;&gt;
                &lt;div class=&quot;tt-description-wrapper&quot;&gt;
                  &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
                  &lt;div class=&quot;tt-title-small&quot;&gt;WOMEN&lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/a&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-6&quot;&gt;
            &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box tt-one-child hover-type-2&quot;&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index04-promo-img-03.jpg&quot; alt=&quot;&quot;&gt;
              &lt;div class=&quot;tt-description&quot;&gt;
                &lt;div class=&quot;tt-description-wrapper&quot;&gt;
                  &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
                  &lt;div class=&quot;tt-title-small&quot;&gt;MEN&lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/a&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-12&quot;&gt;
            &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
              &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index04-promo-img-04.jpg&quot; alt=&quot;&quot;&gt;
              &lt;div class=&quot;tt-description&quot;&gt;
                &lt;div class=&quot;tt-description-wrapper&quot;&gt;
                  &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
                  &lt;div class=&quot;tt-title-small&quot;&gt;READY TO&lt;/div&gt;
                  &lt;div class=&quot;tt-title-large&quot;&gt;USE UNIQUE DEMOS&lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/a&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-sm-12 col-md-6&quot;&gt;
        &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index04-promo-img-01.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-title-small&quot;&gt;MULTI-PURPOSE&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot;&gt;OPENCART THEME&lt;/div&gt;
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
    &lt;div class=&quot;row tt-layout-promo-box&quot;&gt;
      &lt;div class=&quot;col-md-6&quot;&gt;
        &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index04-promo-img-05.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-title-small&quot;&gt;NEW IN:&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot;&gt;CLOTHING&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-md-6&quot;&gt;
        &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index04-promo-img-06.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-title-small&quot;&gt;CLEARANCE SALES&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot;&gt;GET UP TO &lt;span class=&quot;tt-base-color&quot;&gt;20% OFF&lt;/span&gt;&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;container-indent&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;row tt-layout-promo-box&quot;&gt;
      &lt;div class=&quot;col-md-6&quot;&gt;
        &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index04-promo-img-05.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-title-small&quot;&gt;NEW IN:&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot;&gt;CLOTHING&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-md-6&quot;&gt;
        &lt;a href=&quot;listing-left-column.html&quot; class=&quot;tt-promo-box tt-one-child&quot;&gt;
          &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/promo/index04-promo-img-06.jpg&quot; alt=&quot;&quot;&gt;
          &lt;div class=&quot;tt-description&quot;&gt;
            &lt;div class=&quot;tt-description-wrapper&quot;&gt;
              &lt;div class=&quot;tt-background&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-title-small&quot;&gt;CLEARANCE SALES&lt;/div&gt;
              &lt;div class=&quot;tt-title-large&quot;&gt;GET UP TO &lt;span class=&quot;tt-base-color&quot;&gt;20% OFF&lt;/span&gt;&lt;/div&gt;
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
      1 => '&lt;div class=&quot;container-indent&quot;&gt;
  &lt;div class=&quot;container container-fluid-custom-mobile-padding&quot;&gt;
    &lt;div class=&quot;tt-block-title&quot;&gt;
      &lt;h2 class=&quot;tt-title&quot;&gt;POPULAR&lt;/h2&gt;
      &lt;div class=&quot;tt-description&quot;&gt;CLOTHING BRANDS&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;row tt-img-box-listing&quot;&gt;
      &lt;div class=&quot;col-6 col-sm-4 col-md-3&quot;&gt;
              &lt;a href=&quot;#&quot; class=&quot;tt-img-box&quot;&gt;
                &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-01.png&quot; alt=&quot;&quot;&gt;
              &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-sm-4 col-md-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-img-box&quot;&gt;
                &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-02.png&quot; alt=&quot;&quot;&gt;
              &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-sm-4 col-md-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-img-box&quot;&gt;
                &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-03.png&quot; alt=&quot;&quot;&gt;
              &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-sm-4 col-md-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-img-box&quot;&gt;
                &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-04.png&quot; alt=&quot;&quot;&gt;
              &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-sm-4 col-md-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-img-box&quot;&gt;
                &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-05.png&quot; alt=&quot;&quot;&gt;
              &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-sm-4 col-md-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-img-box&quot;&gt;
                &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-06.png&quot; alt=&quot;&quot;&gt;
              &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-sm-4 col-md-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-img-box&quot;&gt;
                &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-07.png&quot; alt=&quot;&quot;&gt;
              &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-sm-4 col-md-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-img-box&quot;&gt;
                &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-08.png&quot; alt=&quot;&quot;&gt;
              &lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;container-indent&quot;&gt;
  &lt;div class=&quot;container container-fluid-custom-mobile-padding&quot;&gt;
    &lt;div class=&quot;tt-block-title&quot;&gt;
      &lt;h2 class=&quot;tt-title&quot;&gt;POPULAR&lt;/h2&gt;
      &lt;div class=&quot;tt-description&quot;&gt;CLOTHING BRANDS&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;row tt-img-box-listing&quot;&gt;
      &lt;div class=&quot;col-6 col-sm-4 col-md-3&quot;&gt;
              &lt;a href=&quot;#&quot; class=&quot;tt-img-box&quot;&gt;
                &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-01.png&quot; alt=&quot;&quot;&gt;
              &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-sm-4 col-md-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-img-box&quot;&gt;
                &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-02.png&quot; alt=&quot;&quot;&gt;
              &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-sm-4 col-md-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-img-box&quot;&gt;
                &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-03.png&quot; alt=&quot;&quot;&gt;
              &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-sm-4 col-md-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-img-box&quot;&gt;
                &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-04.png&quot; alt=&quot;&quot;&gt;
              &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-sm-4 col-md-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-img-box&quot;&gt;
                &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-05.png&quot; alt=&quot;&quot;&gt;
              &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-sm-4 col-md-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-img-box&quot;&gt;
                &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-06.png&quot; alt=&quot;&quot;&gt;
              &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-sm-4 col-md-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-img-box&quot;&gt;
                &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-07.png&quot; alt=&quot;&quot;&gt;
              &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-6 col-sm-4 col-md-3&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;tt-img-box&quot;&gt;
                &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/brand-img-08.png&quot; alt=&quot;&quot;&gt;
              &lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
    ),
    'layout_id' => '1',
    'position' => 'slideshow',
    'status' => '1',
    'sort_order' => '7',
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
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
      1 => '&lt;div class=&quot;container-indent nomargin&quot;&gt;
  &lt;div class=&quot;container-fluid-custom container-fluid-custom-mobile-padding&quot;&gt;
    &lt;div class=&quot;tt-lookbook-masonry&quot;&gt;
      &lt;div class=&quot;tt-lookbook-init tt-grid-col-3 tt-add-item&quot;&gt;
        &lt;div class=&quot;element-item&quot;&gt;
          &lt;div class=&quot;tt-lookbook&quot;&gt;
            &lt;img src=&quot;image/catalog/wokiee/lookbook/lookbook-10.jpg&quot; alt=&quot;&quot;&gt;
            &lt;div class=&quot;tt-hotspot&quot; style=&quot;top: 79%; left: 37%;&quot; data-top=&quot;79&quot; data-left=&quot;37&quot;&gt;
              &lt;div class=&quot;tt-btn&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-content-parent&quot;&gt;
                &lt;div class=&quot;tt-hotspot-content&quot;&gt;
                  &lt;a href=&quot;#&quot; class=&quot;tt-btn-close&quot;&gt;&lt;/a&gt;
                  &lt;div class=&quot;tt-img&quot;&gt;
                    &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-01-02.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
                  &lt;/div&gt;
                  &lt;div class=&quot;tt-description&quot;&gt;
                    &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;Denim Boyfriend Trucker Jacket&lt;/a&gt;&lt;/h2&gt;
                    &lt;div class=&quot;tt-price&quot;&gt;$124&lt;/div&gt;
                    &lt;a href=&quot;#&quot; class=&quot;btn&quot;&gt;ADD TO CART&lt;/a&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;element-item&quot;&gt;
          &lt;div class=&quot;tt-lookbook&quot;&gt;
            &lt;img src=&quot;image/catalog/wokiee/lookbook/lookbook-11.jpg&quot; alt=&quot;&quot;&gt;
            &lt;div class=&quot;tt-hotspot&quot; style=&quot;top: 22%; left: 49%;&quot; data-top=&quot;22&quot; data-left=&quot;49&quot;&gt;
              &lt;div class=&quot;tt-btn&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-content-parent&quot;&gt;
                &lt;div class=&quot;tt-hotspot-content&quot;&gt;
                  &lt;a href=&quot;#&quot; class=&quot;tt-btn-close&quot;&gt;&lt;/a&gt;
                  &lt;div class=&quot;tt-img&quot;&gt;
                    &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-01-02.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
                  &lt;/div&gt;
                  &lt;div class=&quot;tt-description&quot;&gt;
                    &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;Denim Boyfriend Trucker Jacket&lt;/a&gt;&lt;/h2&gt;
                    &lt;div class=&quot;tt-price&quot;&gt;$124&lt;/div&gt;
                    &lt;a href=&quot;#&quot; class=&quot;btn&quot;&gt;ADD TO CART&lt;/a&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;tt-hotspot&quot; style=&quot;top: 55%; left: 34%;&quot; data-top=&quot;55&quot; data-left=&quot;34&quot;&gt;
              &lt;div class=&quot;tt-btn&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-content-parent&quot;&gt;
                &lt;div class=&quot;tt-hotspot-content&quot;&gt;
                  &lt;a href=&quot;#&quot; class=&quot;tt-btn-close&quot;&gt;&lt;/a&gt;
                  &lt;div class=&quot;tt-img&quot;&gt;
                    &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-01-02.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
                  &lt;/div&gt;
                  &lt;div class=&quot;tt-description&quot;&gt;
                    &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;Denim Boyfriend Trucker Jacket&lt;/a&gt;&lt;/h2&gt;
                    &lt;div class=&quot;tt-price&quot;&gt;$124&lt;/div&gt;
                    &lt;a href=&quot;#&quot; class=&quot;btn&quot;&gt;ADD TO CART&lt;/a&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;element-item&quot;&gt;
          &lt;div class=&quot;tt-lookbook&quot;&gt;
            &lt;img src=&quot;image/catalog/wokiee/lookbook/lookbook-12.jpg&quot; alt=&quot;&quot;&gt;
            &lt;div class=&quot;tt-hotspot&quot; style=&quot;top: 40%; left: 40%;&quot; data-top=&quot;40&quot; data-left=&quot;40&quot;&gt;
              &lt;div class=&quot;tt-btn&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-content-parent&quot;&gt;
                &lt;div class=&quot;tt-hotspot-content&quot;&gt;
                  &lt;a href=&quot;#&quot; class=&quot;tt-btn-close&quot;&gt;&lt;/a&gt;
                  &lt;div class=&quot;tt-img&quot;&gt;
                    &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-01-02.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
                  &lt;/div&gt;
                  &lt;div class=&quot;tt-description&quot;&gt;
                    &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;Denim Boyfriend Trucker Jacket&lt;/a&gt;&lt;/h2&gt;
                    &lt;div class=&quot;tt-price&quot;&gt;$124&lt;/div&gt;
                    &lt;a href=&quot;#&quot; class=&quot;btn&quot;&gt;ADD TO CART&lt;/a&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;element-item&quot;&gt;
          &lt;div class=&quot;tt-lookbook&quot;&gt;
            &lt;img src=&quot;image/catalog/wokiee/lookbook/lookbook-13.jpg&quot; alt=&quot;&quot;&gt;
            &lt;div class=&quot;tt-hotspot&quot; style=&quot;top: 35%; left: 61%;&quot; data-top=&quot;35&quot; data-left=&quot;61&quot;&gt;
              &lt;div class=&quot;tt-btn&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-content-parent&quot;&gt;
                &lt;div class=&quot;tt-hotspot-content&quot;&gt;
                  &lt;a href=&quot;#&quot; class=&quot;tt-btn-close&quot;&gt;&lt;/a&gt;
                  &lt;div class=&quot;tt-img&quot;&gt;
                    &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-01-02.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
                  &lt;/div&gt;
                  &lt;div class=&quot;tt-description&quot;&gt;
                    &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;Denim Boyfriend Trucker Jacket&lt;/a&gt;&lt;/h2&gt;
                    &lt;div class=&quot;tt-price&quot;&gt;$124&lt;/div&gt;
                    &lt;a href=&quot;#&quot; class=&quot;btn&quot;&gt;ADD TO CART&lt;/a&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;tt-hotspot&quot; style=&quot;top: 40%; left: 27%;&quot; data-top=&quot;40&quot; data-left=&quot;27&quot;&gt;
              &lt;div class=&quot;tt-btn&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-content-parent&quot;&gt;
                &lt;div class=&quot;tt-hotspot-content&quot;&gt;
                  &lt;a href=&quot;#&quot; class=&quot;tt-btn-close&quot;&gt;&lt;/a&gt;
                  &lt;div class=&quot;tt-img&quot;&gt;
                    &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-01-02.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
                  &lt;/div&gt;
                  &lt;div class=&quot;tt-description&quot;&gt;
                    &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;Denim Boyfriend Trucker Jacket&lt;/a&gt;&lt;/h2&gt;
                    &lt;div class=&quot;tt-price&quot;&gt;$124&lt;/div&gt;
                    &lt;a href=&quot;#&quot; class=&quot;btn&quot;&gt;ADD TO CART&lt;/a&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;element-item&quot;&gt;
          &lt;div class=&quot;tt-lookbook&quot;&gt;
            &lt;img src=&quot;image/catalog/wokiee/lookbook/lookbook-14.jpg&quot; alt=&quot;&quot;&gt;
            &lt;div class=&quot;tt-hotspot&quot; style=&quot;top: 47%; left: 67%;&quot; data-top=&quot;47&quot; data-left=&quot;67&quot;&gt;
              &lt;div class=&quot;tt-btn&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-content-parent&quot;&gt;
                &lt;div class=&quot;tt-hotspot-content&quot;&gt;
                  &lt;a href=&quot;#&quot; class=&quot;tt-btn-close&quot;&gt;&lt;/a&gt;
                  &lt;div class=&quot;tt-img&quot;&gt;
                    &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-01-02.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
                  &lt;/div&gt;
                  &lt;div class=&quot;tt-description&quot;&gt;
                    &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;Denim Boyfriend Trucker Jacket&lt;/a&gt;&lt;/h2&gt;
                    &lt;div class=&quot;tt-price&quot;&gt;$124&lt;/div&gt;
                    &lt;a href=&quot;#&quot; class=&quot;btn&quot;&gt;ADD TO CART&lt;/a&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;element-item&quot;&gt;
          &lt;div class=&quot;tt-lookbook&quot;&gt;
            &lt;img src=&quot;image/catalog/wokiee/lookbook/lookbook-15.jpg&quot; alt=&quot;&quot;&gt;
            &lt;div class=&quot;tt-hotspot&quot; style=&quot;top: 37%; left: 47%;&quot; data-top=&quot;37&quot; data-left=&quot;47&quot;&gt;
              &lt;div class=&quot;tt-btn&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-content-parent&quot;&gt;
                &lt;div class=&quot;tt-hotspot-content&quot;&gt;
                  &lt;a href=&quot;#&quot; class=&quot;tt-btn-close&quot;&gt;&lt;/a&gt;
                  &lt;div class=&quot;tt-img&quot;&gt;
                    &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-01-02.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
                  &lt;/div&gt;
                  &lt;div class=&quot;tt-description&quot;&gt;
                    &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;Denim Boyfriend Trucker Jacket&lt;/a&gt;&lt;/h2&gt;
                    &lt;div class=&quot;tt-price&quot;&gt;$124&lt;/div&gt;
                    &lt;a href=&quot;#&quot; class=&quot;btn&quot;&gt;ADD TO CART&lt;/a&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;container-indent nomargin&quot;&gt;
  &lt;div class=&quot;container-fluid-custom container-fluid-custom-mobile-padding&quot;&gt;
    &lt;div class=&quot;tt-lookbook-masonry&quot;&gt;
      &lt;div class=&quot;tt-lookbook-init tt-grid-col-3 tt-add-item&quot;&gt;
        &lt;div class=&quot;element-item&quot;&gt;
          &lt;div class=&quot;tt-lookbook&quot;&gt;
            &lt;img src=&quot;image/catalog/wokiee/lookbook/lookbook-10.jpg&quot; alt=&quot;&quot;&gt;
            &lt;div class=&quot;tt-hotspot&quot; style=&quot;top: 79%; left: 37%;&quot; data-top=&quot;79&quot; data-left=&quot;37&quot;&gt;
              &lt;div class=&quot;tt-btn&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-content-parent&quot;&gt;
                &lt;div class=&quot;tt-hotspot-content&quot;&gt;
                  &lt;a href=&quot;#&quot; class=&quot;tt-btn-close&quot;&gt;&lt;/a&gt;
                  &lt;div class=&quot;tt-img&quot;&gt;
                    &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-01-02.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
                  &lt;/div&gt;
                  &lt;div class=&quot;tt-description&quot;&gt;
                    &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;Denim Boyfriend Trucker Jacket&lt;/a&gt;&lt;/h2&gt;
                    &lt;div class=&quot;tt-price&quot;&gt;$124&lt;/div&gt;
                    &lt;a href=&quot;#&quot; class=&quot;btn&quot;&gt;ADD TO CART&lt;/a&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;element-item&quot;&gt;
          &lt;div class=&quot;tt-lookbook&quot;&gt;
            &lt;img src=&quot;image/catalog/wokiee/lookbook/lookbook-11.jpg&quot; alt=&quot;&quot;&gt;
            &lt;div class=&quot;tt-hotspot&quot; style=&quot;top: 22%; left: 49%;&quot; data-top=&quot;22&quot; data-left=&quot;49&quot;&gt;
              &lt;div class=&quot;tt-btn&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-content-parent&quot;&gt;
                &lt;div class=&quot;tt-hotspot-content&quot;&gt;
                  &lt;a href=&quot;#&quot; class=&quot;tt-btn-close&quot;&gt;&lt;/a&gt;
                  &lt;div class=&quot;tt-img&quot;&gt;
                    &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-01-02.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
                  &lt;/div&gt;
                  &lt;div class=&quot;tt-description&quot;&gt;
                    &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;Denim Boyfriend Trucker Jacket&lt;/a&gt;&lt;/h2&gt;
                    &lt;div class=&quot;tt-price&quot;&gt;$124&lt;/div&gt;
                    &lt;a href=&quot;#&quot; class=&quot;btn&quot;&gt;ADD TO CART&lt;/a&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;tt-hotspot&quot; style=&quot;top: 55%; left: 34%;&quot; data-top=&quot;55&quot; data-left=&quot;34&quot;&gt;
              &lt;div class=&quot;tt-btn&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-content-parent&quot;&gt;
                &lt;div class=&quot;tt-hotspot-content&quot;&gt;
                  &lt;a href=&quot;#&quot; class=&quot;tt-btn-close&quot;&gt;&lt;/a&gt;
                  &lt;div class=&quot;tt-img&quot;&gt;
                    &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-01-02.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
                  &lt;/div&gt;
                  &lt;div class=&quot;tt-description&quot;&gt;
                    &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;Denim Boyfriend Trucker Jacket&lt;/a&gt;&lt;/h2&gt;
                    &lt;div class=&quot;tt-price&quot;&gt;$124&lt;/div&gt;
                    &lt;a href=&quot;#&quot; class=&quot;btn&quot;&gt;ADD TO CART&lt;/a&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;element-item&quot;&gt;
          &lt;div class=&quot;tt-lookbook&quot;&gt;
            &lt;img src=&quot;image/catalog/wokiee/lookbook/lookbook-12.jpg&quot; alt=&quot;&quot;&gt;
            &lt;div class=&quot;tt-hotspot&quot; style=&quot;top: 40%; left: 40%;&quot; data-top=&quot;40&quot; data-left=&quot;40&quot;&gt;
              &lt;div class=&quot;tt-btn&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-content-parent&quot;&gt;
                &lt;div class=&quot;tt-hotspot-content&quot;&gt;
                  &lt;a href=&quot;#&quot; class=&quot;tt-btn-close&quot;&gt;&lt;/a&gt;
                  &lt;div class=&quot;tt-img&quot;&gt;
                    &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-01-02.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
                  &lt;/div&gt;
                  &lt;div class=&quot;tt-description&quot;&gt;
                    &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;Denim Boyfriend Trucker Jacket&lt;/a&gt;&lt;/h2&gt;
                    &lt;div class=&quot;tt-price&quot;&gt;$124&lt;/div&gt;
                    &lt;a href=&quot;#&quot; class=&quot;btn&quot;&gt;ADD TO CART&lt;/a&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;element-item&quot;&gt;
          &lt;div class=&quot;tt-lookbook&quot;&gt;
            &lt;img src=&quot;image/catalog/wokiee/lookbook/lookbook-13.jpg&quot; alt=&quot;&quot;&gt;
            &lt;div class=&quot;tt-hotspot&quot; style=&quot;top: 35%; left: 61%;&quot; data-top=&quot;35&quot; data-left=&quot;61&quot;&gt;
              &lt;div class=&quot;tt-btn&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-content-parent&quot;&gt;
                &lt;div class=&quot;tt-hotspot-content&quot;&gt;
                  &lt;a href=&quot;#&quot; class=&quot;tt-btn-close&quot;&gt;&lt;/a&gt;
                  &lt;div class=&quot;tt-img&quot;&gt;
                    &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-01-02.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
                  &lt;/div&gt;
                  &lt;div class=&quot;tt-description&quot;&gt;
                    &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;Denim Boyfriend Trucker Jacket&lt;/a&gt;&lt;/h2&gt;
                    &lt;div class=&quot;tt-price&quot;&gt;$124&lt;/div&gt;
                    &lt;a href=&quot;#&quot; class=&quot;btn&quot;&gt;ADD TO CART&lt;/a&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;tt-hotspot&quot; style=&quot;top: 40%; left: 27%;&quot; data-top=&quot;40&quot; data-left=&quot;27&quot;&gt;
              &lt;div class=&quot;tt-btn&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-content-parent&quot;&gt;
                &lt;div class=&quot;tt-hotspot-content&quot;&gt;
                  &lt;a href=&quot;#&quot; class=&quot;tt-btn-close&quot;&gt;&lt;/a&gt;
                  &lt;div class=&quot;tt-img&quot;&gt;
                    &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-01-02.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
                  &lt;/div&gt;
                  &lt;div class=&quot;tt-description&quot;&gt;
                    &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;Denim Boyfriend Trucker Jacket&lt;/a&gt;&lt;/h2&gt;
                    &lt;div class=&quot;tt-price&quot;&gt;$124&lt;/div&gt;
                    &lt;a href=&quot;#&quot; class=&quot;btn&quot;&gt;ADD TO CART&lt;/a&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;element-item&quot;&gt;
          &lt;div class=&quot;tt-lookbook&quot;&gt;
            &lt;img src=&quot;image/catalog/wokiee/lookbook/lookbook-14.jpg&quot; alt=&quot;&quot;&gt;
            &lt;div class=&quot;tt-hotspot&quot; style=&quot;top: 47%; left: 67%;&quot; data-top=&quot;47&quot; data-left=&quot;67&quot;&gt;
              &lt;div class=&quot;tt-btn&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-content-parent&quot;&gt;
                &lt;div class=&quot;tt-hotspot-content&quot;&gt;
                  &lt;a href=&quot;#&quot; class=&quot;tt-btn-close&quot;&gt;&lt;/a&gt;
                  &lt;div class=&quot;tt-img&quot;&gt;
                    &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-01-02.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
                  &lt;/div&gt;
                  &lt;div class=&quot;tt-description&quot;&gt;
                    &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;Denim Boyfriend Trucker Jacket&lt;/a&gt;&lt;/h2&gt;
                    &lt;div class=&quot;tt-price&quot;&gt;$124&lt;/div&gt;
                    &lt;a href=&quot;#&quot; class=&quot;btn&quot;&gt;ADD TO CART&lt;/a&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;element-item&quot;&gt;
          &lt;div class=&quot;tt-lookbook&quot;&gt;
            &lt;img src=&quot;image/catalog/wokiee/lookbook/lookbook-15.jpg&quot; alt=&quot;&quot;&gt;
            &lt;div class=&quot;tt-hotspot&quot; style=&quot;top: 37%; left: 47%;&quot; data-top=&quot;37&quot; data-left=&quot;47&quot;&gt;
              &lt;div class=&quot;tt-btn&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;tt-content-parent&quot;&gt;
                &lt;div class=&quot;tt-hotspot-content&quot;&gt;
                  &lt;a href=&quot;#&quot; class=&quot;tt-btn-close&quot;&gt;&lt;/a&gt;
                  &lt;div class=&quot;tt-img&quot;&gt;
                    &lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;image/catalog/wokiee/product/product-01-02.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
                  &lt;/div&gt;
                  &lt;div class=&quot;tt-description&quot;&gt;
                    &lt;h2 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;Denim Boyfriend Trucker Jacket&lt;/a&gt;&lt;/h2&gt;
                    &lt;div class=&quot;tt-price&quot;&gt;$124&lt;/div&gt;
                    &lt;a href=&quot;#&quot; class=&quot;btn&quot;&gt;ADD TO CART&lt;/a&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
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
); 

$output2 = array();
$output2["custom_module_module"] = $this->config->get('custom_module_module');

if(!is_array($output["custom_module_module"])) $output["custom_module_module"] = array();
if(!is_array($output2["custom_module_module"])) $output2["custom_module_module"] = array();
$output3 = array();
$output3["custom_module_module"] = array_merge($output["custom_module_module"], $output2["custom_module_module"]);

$this->model_setting_setting->editSetting( "custom_module", $output3 );	

?>
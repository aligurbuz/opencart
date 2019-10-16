<?php 

$language_id = 2;
foreach($data['languages'] as $language) {
	if($language['language_id'] != 1) {
		$language_id = $language['language_id'];
	}
}

$output = array();
$output["product_blocks_module"] = array (
  1 => 
  array (
    'type' => '1',
    'block_name' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'icon' => '',
    'icon_position' => 'left',
    'popup_module' => '1',
    'html' => 
    array (
      1 => '&lt;div class=&quot;product-information-buttons&quot;&gt;
                &lt;a data-toggle=&quot;modal&quot; data-target=&quot;#modalProductInfo&quot; href=&quot;#&quot;&gt;&lt;i class=&quot;icon-f-09&quot;&gt;&lt;/i&gt; Size Guide&lt;/a&gt;
                &lt;a data-toggle=&quot;modal&quot; data-target=&quot;#modalProductInfo-02&quot; href=&quot;#&quot;&gt;&lt;i class=&quot;icon-f-44&quot;&gt;&lt;/i&gt; Shipping&lt;/a&gt;
              &lt;/div&gt;
&lt;!-- modal (size guid) --&gt;
&lt;div class=&quot;modal  fade&quot;  id=&quot;modalProductInfo&quot; tabindex=&quot;-1&quot; role=&quot;dialog&quot; aria-label=&quot;myModalLabel&quot; aria-hidden=&quot;true&quot;&gt;
  &lt;div class=&quot;modal-dialog modal-lg&quot;&gt;
    &lt;div class=&quot;modal-content &quot;&gt;
      &lt;div class=&quot;modal-header&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;close&quot; data-dismiss=&quot;modal&quot; aria-hidden=&quot;true&quot;&gt;&lt;span class=&quot;icon icon-clear&quot;&gt;&lt;/span&gt;&lt;/button&gt;
      &lt;/div&gt;
      &lt;div class=&quot;modal-body&quot;&gt;
        &lt;div class=&quot;tt-layout-product-info&quot;&gt;
          &lt;h6 class=&quot;tt-title&quot;&gt;SIZE GUIDE&lt;/h6&gt;
          This is an approximate conversion table to help you find your size.
          &lt;div class=&quot;tt-table-responsive-md&quot;&gt;
            &lt;table class=&quot;tt-table-modal-info&quot;&gt;
              &lt;thead&gt;
                &lt;tr&gt;
                  &lt;th&gt;Italian&lt;/th&gt;
                  &lt;th&gt;Spanish&lt;/th&gt;
                  &lt;th&gt;German&lt;/th&gt;
                  &lt;th&gt;UK&lt;/th&gt;
                  &lt;th&gt;US&lt;/th&gt;
                  &lt;th&gt;Japanese&lt;/th&gt;
                  &lt;th&gt;Chinese&lt;/th&gt;
                  &lt;th&gt;Russian&lt;/th&gt;
                  &lt;th&gt;Korean&lt;/th&gt;
                &lt;/tr&gt;
              &lt;/thead&gt;
              &lt;tbody&gt;
                &lt;tr&gt;
                  &lt;td&gt;34&lt;/td&gt;
                  &lt;td&gt;30&lt;/td&gt;
                  &lt;td&gt;28&lt;/td&gt;
                  &lt;td&gt;4&lt;/td&gt;
                  &lt;td&gt;00&lt;/td&gt;
                  &lt;td&gt;3&lt;/td&gt;
                  &lt;td&gt;155/75A&lt;/td&gt;
                  &lt;td&gt;36&lt;/td&gt;
                  &lt;td&gt;44&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                  &lt;td&gt;36&lt;/td&gt;
                  &lt;td&gt;32&lt;/td&gt;
                  &lt;td&gt;30&lt;/td&gt;
                  &lt;td&gt;6&lt;/td&gt;
                  &lt;td&gt;0&lt;/td&gt;
                  &lt;td&gt;5&lt;/td&gt;
                  &lt;td&gt;155/80A&lt;/td&gt;
                  &lt;td&gt;38&lt;/td&gt;
                  &lt;td&gt;44&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                  &lt;td&gt;38&lt;/td&gt;
                  &lt;td&gt;34&lt;/td&gt;
                  &lt;td&gt;32&lt;/td&gt;
                  &lt;td&gt;8&lt;/td&gt;
                  &lt;td&gt;2&lt;/td&gt;
                  &lt;td&gt;7&lt;/td&gt;
                  &lt;td&gt;160/84A&lt;/td&gt;
                  &lt;td&gt;40&lt;/td&gt;
                  &lt;td&gt;55&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                  &lt;td&gt;40&lt;/td&gt;
                  &lt;td&gt;36&lt;/td&gt;
                  &lt;td&gt;34&lt;/td&gt;
                  &lt;td&gt;10&lt;/td&gt;
                  &lt;td&gt;4&lt;/td&gt;
                  &lt;td&gt;9&lt;/td&gt;
                  &lt;td&gt;165/88A&lt;/td&gt;
                  &lt;td&gt;42&lt;/td&gt;
                  &lt;td&gt;55&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                  &lt;td&gt;42&lt;/td&gt;
                  &lt;td&gt;38&lt;/td&gt;
                  &lt;td&gt;36&lt;/td&gt;
                  &lt;td&gt;12&lt;/td&gt;
                  &lt;td&gt;6&lt;/td&gt;
                  &lt;td&gt;11&lt;/td&gt;
                  &lt;td&gt;170/92A&lt;/td&gt;
                  &lt;td&gt;44&lt;/td&gt;
                  &lt;td&gt;66&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                  &lt;td&gt;44&lt;/td&gt;
                  &lt;td&gt;40&lt;/td&gt;
                  &lt;td&gt;38&lt;/td&gt;
                  &lt;td&gt;14&lt;/td&gt;
                  &lt;td&gt;8&lt;/td&gt;
                  &lt;td&gt;13&lt;/td&gt;
                  &lt;td&gt;175/96A&lt;/td&gt;
                  &lt;td&gt;46&lt;/td&gt;
                  &lt;td&gt;66&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                  &lt;td&gt;46&lt;/td&gt;
                  &lt;td&gt;42&lt;/td&gt;
                  &lt;td&gt;40&lt;/td&gt;
                  &lt;td&gt;16&lt;/td&gt;
                  &lt;td&gt;10&lt;/td&gt;
                  &lt;td&gt;15&lt;/td&gt;
                  &lt;td&gt;170/98A&lt;/td&gt;
                  &lt;td&gt;48&lt;/td&gt;
                  &lt;td&gt;77&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                  &lt;td&gt;48&lt;/td&gt;
                  &lt;td&gt;44&lt;/td&gt;
                  &lt;td&gt;42&lt;/td&gt;
                  &lt;td&gt;18&lt;/td&gt;
                  &lt;td&gt;12&lt;/td&gt;
                  &lt;td&gt;17&lt;/td&gt;
                  &lt;td&gt;170/100B&lt;/td&gt;
                  &lt;td&gt;50&lt;/td&gt;
                  &lt;td&gt;77&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                  &lt;td&gt;50&lt;/td&gt;
                  &lt;td&gt;46&lt;/td&gt;
                  &lt;td&gt;44&lt;/td&gt;
                  &lt;td&gt;20&lt;/td&gt;
                  &lt;td&gt;14&lt;/td&gt;
                  &lt;td&gt;19&lt;/td&gt;
                  &lt;td&gt;175/100B&lt;/td&gt;
                  &lt;td&gt;52&lt;/td&gt;
                  &lt;td&gt;88&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                  &lt;td&gt;52&lt;/td&gt;
                  &lt;td&gt;48&lt;/td&gt;
                  &lt;td&gt;46&lt;/td&gt;
                  &lt;td&gt;22&lt;/td&gt;
                  &lt;td&gt;16&lt;/td&gt;
                  &lt;td&gt;21&lt;/td&gt;
                  &lt;td&gt;180/104B&lt;/td&gt;
                  &lt;td&gt;54&lt;/td&gt;
                  &lt;td&gt;88&lt;/td&gt;
                &lt;/tr&gt;
              &lt;/tbody&gt;
            &lt;/table&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;!-- modal (size guid) --&gt;
&lt;div class=&quot;modal  fade&quot;  id=&quot;modalProductInfo-02&quot; tabindex=&quot;-1&quot; role=&quot;dialog&quot; aria-label=&quot;myModalLabel&quot; aria-hidden=&quot;true&quot;&gt;
  &lt;div class=&quot;modal-dialog modal-lg&quot;&gt;
    &lt;div class=&quot;modal-content &quot;&gt;
      &lt;div class=&quot;modal-header&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;close&quot; data-dismiss=&quot;modal&quot; aria-hidden=&quot;true&quot;&gt;&lt;span class=&quot;icon icon-clear&quot;&gt;&lt;/span&gt;&lt;/button&gt;
      &lt;/div&gt;
      &lt;div class=&quot;modal-body&quot;&gt;
        &lt;div class=&quot;tt-layout-product-info-02&quot;&gt;
          &lt;h6 class=&quot;tt-title&quot;&gt;SHIPPING&lt;/h6&gt;
          &lt;ul&gt;
            &lt;li&gt;Complimentary ground shipping within 1 to 7 business days&lt;/li&gt;
            &lt;li&gt;In-store collection available within 1 to 7 business days&lt;/li&gt;
            &lt;li&gt;Next-day and Express delivery options also available&lt;/li&gt;
            &lt;li&gt;Purchases are delivered in an orange box tied with a Bolduc ribbon, with the exception of certain items&lt;/li&gt;
            &lt;li&gt;See the delivery FAQs for details on shipping methods, costs and delivery times&lt;/li&gt;
          &lt;/ul&gt;
          &lt;h6 class=&quot;tt-title&quot;&gt;RETURNS AND EXCHANGES&lt;/h6&gt;
          &lt;ul&gt;
            &lt;li&gt;Easy and complimentary, within 14 days&lt;/li&gt;
            &lt;li&gt;See conditions and procedure in our return FAQs&lt;/li&gt;
          &lt;/ul&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div class=&quot;product-information-buttons&quot;&gt;
                &lt;a data-toggle=&quot;modal&quot; data-target=&quot;#modalProductInfo&quot; href=&quot;#&quot;&gt;&lt;i class=&quot;icon-f-09&quot;&gt;&lt;/i&gt; Size Guide&lt;/a&gt;
                &lt;a data-toggle=&quot;modal&quot; data-target=&quot;#modalProductInfo-02&quot; href=&quot;#&quot;&gt;&lt;i class=&quot;icon-f-44&quot;&gt;&lt;/i&gt; Shipping&lt;/a&gt;
              &lt;/div&gt;
&lt;!-- modal (size guid) --&gt;
&lt;div class=&quot;modal  fade&quot;  id=&quot;modalProductInfo&quot; tabindex=&quot;-1&quot; role=&quot;dialog&quot; aria-label=&quot;myModalLabel&quot; aria-hidden=&quot;true&quot;&gt;
  &lt;div class=&quot;modal-dialog modal-lg&quot;&gt;
    &lt;div class=&quot;modal-content &quot;&gt;
      &lt;div class=&quot;modal-header&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;close&quot; data-dismiss=&quot;modal&quot; aria-hidden=&quot;true&quot;&gt;&lt;span class=&quot;icon icon-clear&quot;&gt;&lt;/span&gt;&lt;/button&gt;
      &lt;/div&gt;
      &lt;div class=&quot;modal-body&quot;&gt;
        &lt;div class=&quot;tt-layout-product-info&quot;&gt;
          &lt;h6 class=&quot;tt-title&quot;&gt;SIZE GUIDE&lt;/h6&gt;
          This is an approximate conversion table to help you find your size.
          &lt;div class=&quot;tt-table-responsive-md&quot;&gt;
            &lt;table class=&quot;tt-table-modal-info&quot;&gt;
              &lt;thead&gt;
                &lt;tr&gt;
                  &lt;th&gt;Italian&lt;/th&gt;
                  &lt;th&gt;Spanish&lt;/th&gt;
                  &lt;th&gt;German&lt;/th&gt;
                  &lt;th&gt;UK&lt;/th&gt;
                  &lt;th&gt;US&lt;/th&gt;
                  &lt;th&gt;Japanese&lt;/th&gt;
                  &lt;th&gt;Chinese&lt;/th&gt;
                  &lt;th&gt;Russian&lt;/th&gt;
                  &lt;th&gt;Korean&lt;/th&gt;
                &lt;/tr&gt;
              &lt;/thead&gt;
              &lt;tbody&gt;
                &lt;tr&gt;
                  &lt;td&gt;34&lt;/td&gt;
                  &lt;td&gt;30&lt;/td&gt;
                  &lt;td&gt;28&lt;/td&gt;
                  &lt;td&gt;4&lt;/td&gt;
                  &lt;td&gt;00&lt;/td&gt;
                  &lt;td&gt;3&lt;/td&gt;
                  &lt;td&gt;155/75A&lt;/td&gt;
                  &lt;td&gt;36&lt;/td&gt;
                  &lt;td&gt;44&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                  &lt;td&gt;36&lt;/td&gt;
                  &lt;td&gt;32&lt;/td&gt;
                  &lt;td&gt;30&lt;/td&gt;
                  &lt;td&gt;6&lt;/td&gt;
                  &lt;td&gt;0&lt;/td&gt;
                  &lt;td&gt;5&lt;/td&gt;
                  &lt;td&gt;155/80A&lt;/td&gt;
                  &lt;td&gt;38&lt;/td&gt;
                  &lt;td&gt;44&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                  &lt;td&gt;38&lt;/td&gt;
                  &lt;td&gt;34&lt;/td&gt;
                  &lt;td&gt;32&lt;/td&gt;
                  &lt;td&gt;8&lt;/td&gt;
                  &lt;td&gt;2&lt;/td&gt;
                  &lt;td&gt;7&lt;/td&gt;
                  &lt;td&gt;160/84A&lt;/td&gt;
                  &lt;td&gt;40&lt;/td&gt;
                  &lt;td&gt;55&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                  &lt;td&gt;40&lt;/td&gt;
                  &lt;td&gt;36&lt;/td&gt;
                  &lt;td&gt;34&lt;/td&gt;
                  &lt;td&gt;10&lt;/td&gt;
                  &lt;td&gt;4&lt;/td&gt;
                  &lt;td&gt;9&lt;/td&gt;
                  &lt;td&gt;165/88A&lt;/td&gt;
                  &lt;td&gt;42&lt;/td&gt;
                  &lt;td&gt;55&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                  &lt;td&gt;42&lt;/td&gt;
                  &lt;td&gt;38&lt;/td&gt;
                  &lt;td&gt;36&lt;/td&gt;
                  &lt;td&gt;12&lt;/td&gt;
                  &lt;td&gt;6&lt;/td&gt;
                  &lt;td&gt;11&lt;/td&gt;
                  &lt;td&gt;170/92A&lt;/td&gt;
                  &lt;td&gt;44&lt;/td&gt;
                  &lt;td&gt;66&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                  &lt;td&gt;44&lt;/td&gt;
                  &lt;td&gt;40&lt;/td&gt;
                  &lt;td&gt;38&lt;/td&gt;
                  &lt;td&gt;14&lt;/td&gt;
                  &lt;td&gt;8&lt;/td&gt;
                  &lt;td&gt;13&lt;/td&gt;
                  &lt;td&gt;175/96A&lt;/td&gt;
                  &lt;td&gt;46&lt;/td&gt;
                  &lt;td&gt;66&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                  &lt;td&gt;46&lt;/td&gt;
                  &lt;td&gt;42&lt;/td&gt;
                  &lt;td&gt;40&lt;/td&gt;
                  &lt;td&gt;16&lt;/td&gt;
                  &lt;td&gt;10&lt;/td&gt;
                  &lt;td&gt;15&lt;/td&gt;
                  &lt;td&gt;170/98A&lt;/td&gt;
                  &lt;td&gt;48&lt;/td&gt;
                  &lt;td&gt;77&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                  &lt;td&gt;48&lt;/td&gt;
                  &lt;td&gt;44&lt;/td&gt;
                  &lt;td&gt;42&lt;/td&gt;
                  &lt;td&gt;18&lt;/td&gt;
                  &lt;td&gt;12&lt;/td&gt;
                  &lt;td&gt;17&lt;/td&gt;
                  &lt;td&gt;170/100B&lt;/td&gt;
                  &lt;td&gt;50&lt;/td&gt;
                  &lt;td&gt;77&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                  &lt;td&gt;50&lt;/td&gt;
                  &lt;td&gt;46&lt;/td&gt;
                  &lt;td&gt;44&lt;/td&gt;
                  &lt;td&gt;20&lt;/td&gt;
                  &lt;td&gt;14&lt;/td&gt;
                  &lt;td&gt;19&lt;/td&gt;
                  &lt;td&gt;175/100B&lt;/td&gt;
                  &lt;td&gt;52&lt;/td&gt;
                  &lt;td&gt;88&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                  &lt;td&gt;52&lt;/td&gt;
                  &lt;td&gt;48&lt;/td&gt;
                  &lt;td&gt;46&lt;/td&gt;
                  &lt;td&gt;22&lt;/td&gt;
                  &lt;td&gt;16&lt;/td&gt;
                  &lt;td&gt;21&lt;/td&gt;
                  &lt;td&gt;180/104B&lt;/td&gt;
                  &lt;td&gt;54&lt;/td&gt;
                  &lt;td&gt;88&lt;/td&gt;
                &lt;/tr&gt;
              &lt;/tbody&gt;
            &lt;/table&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;!-- modal (size guid) --&gt;
&lt;div class=&quot;modal  fade&quot;  id=&quot;modalProductInfo-02&quot; tabindex=&quot;-1&quot; role=&quot;dialog&quot; aria-label=&quot;myModalLabel&quot; aria-hidden=&quot;true&quot;&gt;
  &lt;div class=&quot;modal-dialog modal-lg&quot;&gt;
    &lt;div class=&quot;modal-content &quot;&gt;
      &lt;div class=&quot;modal-header&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;close&quot; data-dismiss=&quot;modal&quot; aria-hidden=&quot;true&quot;&gt;&lt;span class=&quot;icon icon-clear&quot;&gt;&lt;/span&gt;&lt;/button&gt;
      &lt;/div&gt;
      &lt;div class=&quot;modal-body&quot;&gt;
        &lt;div class=&quot;tt-layout-product-info-02&quot;&gt;
          &lt;h6 class=&quot;tt-title&quot;&gt;SHIPPING&lt;/h6&gt;
          &lt;ul&gt;
            &lt;li&gt;Complimentary ground shipping within 1 to 7 business days&lt;/li&gt;
            &lt;li&gt;In-store collection available within 1 to 7 business days&lt;/li&gt;
            &lt;li&gt;Next-day and Express delivery options also available&lt;/li&gt;
            &lt;li&gt;Purchases are delivered in an orange box tied with a Bolduc ribbon, with the exception of certain items&lt;/li&gt;
            &lt;li&gt;See the delivery FAQs for details on shipping methods, costs and delivery times&lt;/li&gt;
          &lt;/ul&gt;
          &lt;h6 class=&quot;tt-title&quot;&gt;RETURNS AND EXCHANGES&lt;/h6&gt;
          &lt;ul&gt;
            &lt;li&gt;Easy and complimentary, within 14 days&lt;/li&gt;
            &lt;li&gt;See conditions and procedure in our return FAQs&lt;/li&gt;
          &lt;/ul&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
    ),
    'show_on_products_from' => 'all',
    'product' => '',
    'products' => '',
    'category' => '',
    'categories' => '',
    'layout_id' => '99999',
    'position' => 'product_options_center',
    'status' => '1',
    'sort_order' => '',
  ),
  2 => 
  array (
    'type' => '2',
    'block_name' => 
    array (
      1 => 'Request a quote!',
      $language_id => 'Request a quote!',
    ),
    'icon' => '',
    'icon_position' => 'left',
    'popup_module' => '4',
    'html' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'show_on_products_from' => 'products',
    'product' => '',
    'products' => '47',
    'category' => '',
    'categories' => '',
    'layout_id' => '99999',
    'position' => 'product_enquiry',
    'status' => '0',
    'sort_order' => '',
  ),
); 

$output2 = array();
$output2["product_blocks_module"] = $this->config->get('product_blocks_module');

if(!is_array($output["product_blocks_module"])) $output["product_blocks_module"] = array();
if(!is_array($output2["product_blocks_module"])) $output2["product_blocks_module"] = array();
$output3 = array();
$output3["product_blocks_module"] = array_merge($output["product_blocks_module"], $output2["product_blocks_module"]);

$this->model_setting_setting->editSetting( "product_blocks", $output3 );	

?>
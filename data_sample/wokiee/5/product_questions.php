<?php 

$language_id = 2;
foreach($data['languages'] as $language) {
	if($language['language_id'] != 1) {
		$language_id = $language['language_id'];
	}
}

$output = array();
$output["product_questions_module"] = array (
  1 => 
  array (
    'module_id' => '1',
    'button_text' => 
    array (
      1 => ' Ask about this product',
      $language_id => ' Ask about this product',
    ),
    'icon' => '',
    'icon_position' => 'left',
    'block_title' => 
    array (
      1 => 'Have a question?',
      $language_id => 'Have a question?',
    ),
    'show_on_products_from' => 'all',
    'product' => '',
    'products' => '',
    'category' => '',
    'categories' => '',
    'layout_id' => '99999',
    'position' => 'product_question',
    'status' => '1',
    'sort_order' => '',
  ),
); 

$output2 = array();
$output2["product_questions_module"] = $this->config->get('product_questions_module');

if(!is_array($output["product_questions_module"])) $output["product_questions_module"] = array();
if(!is_array($output2["product_questions_module"])) $output2["product_questions_module"] = array();
$output3 = array();
$output3["product_questions_module"] = array_merge($output["product_questions_module"], $output2["product_questions_module"]);

$this->model_setting_setting->editSetting( "product_questions", $output3 );	

?>
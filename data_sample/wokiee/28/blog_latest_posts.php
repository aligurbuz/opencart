<?php 

$language_id = 2;
foreach($data['languages'] as $language) {
	if($language['language_id'] != 1) {
		$language_id = $language['language_id'];
	}
}

$output = array();
$output["blog_latest_module"] = array (
  1 => 
  array (
    'heading_title' => 
    array (
      1 => 'LATEST FROM BLOG, THE FRESHEST AND MOST EXCITING NEWS',
      $language_id => 'LATEST FROM BLOG, THE FRESHEST AND MOST EXCITING NEWS',
    ),
    'layout_id' => '1',
    'position' => 'content_bottom',
    'template' => 'default.twig',
    'status' => '1',
    'thumb_width' => '930',
    'thumb_height' => '658',
    'articles_limit' => '3',
    'sort_order' => '5',
  ),
); 

$output2 = array();
$output2["blog_latest_module"] = $this->config->get('blog_latest_module');

if(!is_array($output["blog_latest_module"])) $output["blog_latest_module"] = array();
if(!is_array($output2["blog_latest_module"])) $output2["blog_latest_module"] = array();
$output3 = array();
$output3["blog_latest_module"] = array_merge($output["blog_latest_module"], $output2["blog_latest_module"]);

$this->model_setting_setting->editSetting( "blog_latest", $output3 );	

?>
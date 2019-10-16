<?php 

$language_id = 2;
foreach($data['languages'] as $language) {
	if($language['language_id'] != 1) {
		$language_id = $language['language_id'];
	}
}

$output = array();
$output["newsletter_module"] = array (
  1 => 
  array (
    1 => 
    array (
      'module_title' => 'BE IN TOUCH WITH US:',
      'module_text' => '&lt;ul class=&quot;tt-social-icon&quot;&gt;
  &lt;li&gt;&lt;a class=&quot;icon-g-64&quot; target=&quot;_blank&quot; href=&quot;http://www.facebook.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a class=&quot;icon-h-58&quot; target=&quot;_blank&quot; href=&quot;http://www.facebook.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a class=&quot;icon-g-66&quot; target=&quot;_blank&quot; href=&quot;http://www.twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a class=&quot;icon-g-67&quot; target=&quot;_blank&quot; href=&quot;http://www.google.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a class=&quot;icon-g-70&quot; target=&quot;_blank&quot; href=&quot;https://instagram.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;',
      'input_placeholder' => 'Enter your e-mail',
      'subscribe_text' => 'JOIN US',
      'unsubscribe_text' => '',
    ),
    $language_id => 
    array (
      'module_title' => 'BE IN TOUCH WITH US:',
      'module_text' => '&lt;ul class=&quot;tt-social-icon&quot;&gt;
  &lt;li&gt;&lt;a class=&quot;icon-g-64&quot; target=&quot;_blank&quot; href=&quot;http://www.facebook.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a class=&quot;icon-h-58&quot; target=&quot;_blank&quot; href=&quot;http://www.facebook.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a class=&quot;icon-g-66&quot; target=&quot;_blank&quot; href=&quot;http://www.twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a class=&quot;icon-g-67&quot; target=&quot;_blank&quot; href=&quot;http://www.google.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a class=&quot;icon-g-70&quot; target=&quot;_blank&quot; href=&quot;https://instagram.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;',
      'input_placeholder' => 'Enter your e-mail',
      'subscribe_text' => 'JOIN US',
      'unsubscribe_text' => '',
    ),
    'button_unsubscribe' => '0',
    'layout_id' => '99999',
    'position' => 'footer_top',
    'status' => '1',
    'sort_order' => '',
  ),
); 

$output2 = array();
$output2["newsletter_module"] = $this->config->get('newsletter_module');

if(!is_array($output["newsletter_module"])) $output["newsletter_module"] = array();
if(!is_array($output2["newsletter_module"])) $output2["newsletter_module"] = array();
$output3 = array();
$output3["newsletter_module"] = array_merge($output["newsletter_module"], $output2["newsletter_module"]);

$this->model_setting_setting->editSetting( "newsletter", $output3 );	

?>
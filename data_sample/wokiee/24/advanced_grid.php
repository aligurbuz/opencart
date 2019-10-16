<?php 

$language_id = 2;
foreach($data['languages'] as $language) {
	if($language['language_id'] != 1) {
		$language_id = $language['language_id'];
	}
}

$output = array();
$output["advanced_grid_module"] = array (
  1 => 
  array (
    'custom_class' => '',
    'margin_top' => '0',
    'margin_right' => 'auto',
    'margin_bottom' => '0',
    'margin_left' => 'auto',
    'padding_top' => '0',
    'padding_right' => '0',
    'padding_bottom' => '0',
    'padding_left' => '0',
    'force_full_width' => '0',
    'background_color' => '',
    'background_image_type' => '0',
    'background_image' => '',
    'background_image_position' => 'top left',
    'background_image_repeat' => 'no-repeat',
    'background_image_attachment' => 'scroll',
    'layout_id' => '99999',
    'position' => 'footer',
    'status' => '1',
    'sort_order' => '',
    'disable_on_mobile' => '0',
    'column' => 
    array (
      1 => 
      array (
        'status' => '1',
        'width' => '12',
        'disable_on_mobile' => '0',
        'width_xs' => '12',
        'width_sm' => '6',
        'width_md' => '4',
        'width_lg' => '12',
        'sort' => '1',
        'module' => 
        array (
          1 => 
          array (
            'status' => '1',
            'sort' => '1',
            'type' => 'newsletter',
            'newsletter' => 
            array (
              'module_layout' => 'default.twig',
              'title' => 
              array (
                1 => 'NEWSLETTER SIGNUP',
                $language_id => 'NEWSLETTER SIGNUP',
              ),
              'text' => 
              array (
                1 => 'Sign up for our e-mail and be the first who know our special offers! Furthermore, we will give a 15% discount on the next order after you sign up.',
                $language_id => 'Sign up for our e-mail and be the first who know our special offers! Furthermore, we will give a 15% discount on the next order after you sign up.',
              ),
              'input_placeholder' => 
              array (
                1 => 'Enter your e-mail',
                $language_id => 'Enter your e-mail',
              ),
              'subscribe_text' => 
              array (
                1 => 'Join us',
                $language_id => 'Join us',
              ),
              'unsubscribe_text' => 
              array (
                1 => '',
                $language_id => '',
              ),
            ),
          ),
          2 => 
          array (
            'status' => '1',
            'sort' => '2',
            'type' => 'html',
            'html' => 
            array (
              1 => '&lt;ul class=&quot;tt-social-icon&quot;&gt;
            &lt;li&gt;&lt;a class=&quot;icon-g-64&quot; target=&quot;_blank&quot; href=&quot;http://www.facebook.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a class=&quot;icon-h-58&quot; target=&quot;_blank&quot; href=&quot;http://www.facebook.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a class=&quot;icon-g-66&quot; target=&quot;_blank&quot; href=&quot;http://www.twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a class=&quot;icon-g-67&quot; target=&quot;_blank&quot; href=&quot;http://www.google.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a class=&quot;icon-g-70&quot; target=&quot;_blank&quot; href=&quot;https://instagram.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
          &lt;/ul&gt;',
              $language_id => '',
            ),
          ),
        ),
      ),
    ),
  ),
  2 => 
  array (
    'custom_class' => '',
    'margin_top' => '0',
    'margin_right' => '0',
    'margin_bottom' => '0',
    'margin_left' => '0',
    'padding_top' => '0',
    'padding_right' => '0',
    'padding_bottom' => '0',
    'padding_left' => '0',
    'force_full_width' => '0',
    'background_color' => '',
    'background_image_type' => '0',
    'background_image' => '',
    'background_image_position' => 'top left',
    'background_image_repeat' => 'no-repeat',
    'background_image_attachment' => 'scroll',
    'layout_id' => '3',
    'position' => 'column_left',
    'status' => '1',
    'sort_order' => '9',
    'disable_on_mobile' => '0',
    'column' => 
    array (
      2 => 
      array (
        'status' => '1',
        'width' => '12',
        'disable_on_mobile' => '0',
        'width_xs' => '1',
        'width_sm' => '1',
        'width_md' => '1',
        'width_lg' => '1',
        'sort' => '1',
        'module' => 
        array (
          1 => 
          array (
            'status' => '1',
            'sort' => '1',
            'type' => 'products',
            'products' => 
            array (
              'module_layout' => 'default.twig',
              'title' => 
              array (
                1 => 'Sale products',
                $language_id => 'Sale products',
              ),
              'get_products_from' => 'most_viewed',
              'product' => '',
              'products' => '',
              'category' => '',
              'categories' => '',
              'width' => '930',
              'height' => '1163',
              'limit' => '3',
            ),
          ),
        ),
      ),
    ),
  ),
  3 => 
  array (
    'custom_class' => 'container container-indent',
    'margin_top' => 'auto',
    'margin_right' => 'auto',
    'margin_bottom' => '0',
    'margin_left' => 'auto',
    'padding_top' => '0',
    'padding_right' => '0',
    'padding_bottom' => '0',
    'padding_left' => '0',
    'force_full_width' => '0',
    'background_color' => '',
    'background_image_type' => '0',
    'background_image' => '',
    'background_image_position' => 'top left',
    'background_image_repeat' => 'no-repeat',
    'background_image_attachment' => 'scroll',
    'layout_id' => '1',
    'position' => 'content_bottom',
    'status' => '1',
    'sort_order' => '5',
    'disable_on_mobile' => '0',
    'column' => 
    array (
      3 => 
      array (
        'status' => '1',
        'width' => '4',
        'disable_on_mobile' => '0',
        'width_xs' => '1',
        'width_sm' => '1',
        'width_md' => '1',
        'width_lg' => '1',
        'sort' => '1',
        'module' => 
        array (
          1 => 
          array (
            'status' => '1',
            'sort' => '1',
            'type' => 'products',
            'products' => 
            array (
              'module_layout' => 'default2.twig',
              'title' => 
              array (
                1 => 'NEW PRODUCTS',
                $language_id => 'NEW PRODUCTS',
              ),
              'get_products_from' => 'latest',
              'product' => '',
              'products' => '',
              'category' => '',
              'categories' => '',
              'width' => '1000',
              'height' => '1250',
              'limit' => '3',
            ),
          ),
        ),
      ),
      4 => 
      array (
        'status' => '1',
        'width' => '4',
        'disable_on_mobile' => '0',
        'width_xs' => '1',
        'width_sm' => '1',
        'width_md' => '1',
        'width_lg' => '1',
        'sort' => '2',
        'module' => 
        array (
          1 => 
          array (
            'status' => '1',
            'sort' => '1',
            'type' => 'products',
            'products' => 
            array (
              'module_layout' => 'default2.twig',
              'title' => 
              array (
                1 => 'SPECIAL PRODUCTS',
                $language_id => 'SPECIAL PRODUCTS',
              ),
              'get_products_from' => 'random',
              'product' => '',
              'products' => '',
              'category' => '',
              'categories' => '',
              'width' => '1000',
              'height' => '1250',
              'limit' => '3',
            ),
          ),
        ),
      ),
      5 => 
      array (
        'status' => '1',
        'width' => '4',
        'disable_on_mobile' => '0',
        'width_xs' => '1',
        'width_sm' => '1',
        'width_md' => '1',
        'width_lg' => '1',
        'sort' => '3',
        'module' => 
        array (
          1 => 
          array (
            'status' => '1',
            'sort' => '1',
            'type' => 'products',
            'products' => 
            array (
              'module_layout' => 'default2.twig',
              'title' => 
              array (
                1 => 'FEATURED PRODUCTS',
                $language_id => 'FEATURED PRODUCTS',
              ),
              'get_products_from' => 'random',
              'product' => '',
              'products' => '',
              'category' => '',
              'categories' => '',
              'width' => '1000',
              'height' => '1250',
              'limit' => '3',
            ),
          ),
        ),
      ),
    ),
  ),
); 

$output2 = array();
$output2["advanced_grid_module"] = $this->config->get('advanced_grid_module');

if(!is_array($output["advanced_grid_module"])) $output["advanced_grid_module"] = array();
if(!is_array($output2["advanced_grid_module"])) $output2["advanced_grid_module"] = array();
$output3 = array();
$output3["advanced_grid_module"] = array_merge($output["advanced_grid_module"], $output2["advanced_grid_module"]);

$this->model_setting_setting->editSetting( "advanced_grid", $output3 );	

?>
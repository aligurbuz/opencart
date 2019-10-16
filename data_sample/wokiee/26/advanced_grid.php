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
        'width' => 'advanced',
        'disable_on_mobile' => '0',
        'width_xs' => '12',
        'width_sm' => '6',
        'width_md' => '2',
        'width_lg' => '3',
        'sort' => '1',
        'module' => 
        array (
          1 => 
          array (
            'status' => '1',
            'sort' => '1',
            'type' => 'links',
            'links' => 
            array (
              'module_layout' => 'default.twig',
              'title' => 
              array (
                1 => 'CATEGORIES',
                $language_id => 'CATEGORIES',
              ),
              'limit' => '20',
              'array' => 
              array (
                1 => 
                array (
                  'name' => 
                  array (
                    1 => 'Women',
                    $language_id => 'Women',
                  ),
                  'url' => 
                  array (
                    1 => 'index.php?route=product/category&amp;path=34',
                    $language_id => 'index.php?route=product/category&amp;path=34',
                  ),
                  'sort' => '1',
                ),
                2 => 
                array (
                  'name' => 
                  array (
                    1 => 'Men',
                    $language_id => 'Men',
                  ),
                  'url' => 
                  array (
                    1 => 'index.php?route=product/category&amp;path=34',
                    $language_id => 'index.php?route=product/category&amp;path=34',
                  ),
                  'sort' => '2',
                ),
                3 => 
                array (
                  'name' => 
                  array (
                    1 => 'Accessories',
                    $language_id => 'Accessories',
                  ),
                  'url' => 
                  array (
                    1 => 'index.php?route=product/category&amp;path=34',
                    $language_id => 'index.php?route=product/category&amp;path=34',
                  ),
                  'sort' => '3',
                ),
                4 => 
                array (
                  'name' => 
                  array (
                    1 => 'Shoes',
                    $language_id => 'Shoes',
                  ),
                  'url' => 
                  array (
                    1 => 'index.php?route=product/category&amp;path=34',
                    $language_id => 'index.php?route=product/category&amp;path=34',
                  ),
                  'sort' => '4',
                ),
                5 => 
                array (
                  'name' => 
                  array (
                    1 => 'New Arrivals',
                    $language_id => 'New Arrivals',
                  ),
                  'url' => 
                  array (
                    1 => 'index.php?route=product/category&amp;path=34',
                    $language_id => 'index.php?route=product/category&amp;path=34',
                  ),
                  'sort' => '5',
                ),
                6 => 
                array (
                  'name' => 
                  array (
                    1 => 'Clearence',
                    $language_id => 'Clearence',
                  ),
                  'url' => 
                  array (
                    1 => 'index.php?route=product/category&amp;path=34',
                    $language_id => 'index.php?route=product/category&amp;path=34',
                  ),
                  'sort' => '6',
                ),
              ),
            ),
          ),
        ),
      ),
      2 => 
      array (
        'status' => '1',
        'width' => 'advanced',
        'disable_on_mobile' => '0',
        'width_xs' => '12',
        'width_sm' => '6',
        'width_md' => '2',
        'width_lg' => '3',
        'sort' => '2',
        'module' => 
        array (
          1 => 
          array (
            'status' => '1',
            'sort' => '1',
            'type' => 'links',
            'links' => 
            array (
              'module_layout' => 'default.twig',
              'title' => 
              array (
                1 => 'MY ACCOUNT',
                $language_id => 'MY ACCOUNT',
              ),
              'limit' => '20',
              'array' => 
              array (
                7 => 
                array (
                  'name' => 
                  array (
                    1 => 'Orders',
                    $language_id => 'Orders',
                  ),
                  'url' => 
                  array (
                    1 => 'index.php?route=account/order',
                    $language_id => 'index.php?route=account/order',
                  ),
                  'sort' => '1',
                ),
                8 => 
                array (
                  'name' => 
                  array (
                    1 => 'Compare',
                    $language_id => 'Compare',
                  ),
                  'url' => 
                  array (
                    1 => 'index.php?route=product/compare',
                    $language_id => 'index.php?route=product/compare',
                  ),
                  'sort' => '2',
                ),
                9 => 
                array (
                  'name' => 
                  array (
                    1 => 'Wishlist',
                    $language_id => 'Wishlist',
                  ),
                  'url' => 
                  array (
                    1 => 'index.php?route=account/wishlist',
                    $language_id => 'index.php?route=account/wishlist',
                  ),
                  'sort' => '3',
                ),
                10 => 
                array (
                  'name' => 
                  array (
                    1 => 'Log In',
                    $language_id => 'Log In',
                  ),
                  'url' => 
                  array (
                    1 => 'index.php?route=account/login',
                    $language_id => 'index.php?route=account/login',
                  ),
                  'sort' => '4',
                ),
                11 => 
                array (
                  'name' => 
                  array (
                    1 => 'Register',
                    $language_id => 'Register',
                  ),
                  'url' => 
                  array (
                    1 => 'index.php?route=account/register',
                    $language_id => 'index.php?route=account/register',
                  ),
                  'sort' => '5',
                ),
              ),
            ),
          ),
        ),
      ),
      3 => 
      array (
        'status' => '1',
        'width' => 'advanced',
        'disable_on_mobile' => '0',
        'width_xs' => '12',
        'width_sm' => '12',
        'width_md' => '6',
        'width_lg' => '6',
        'sort' => '4',
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
                1 => 'GET!',
                $language_id => 'GET!',
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
              $language_id => '&lt;ul class=&quot;tt-social-icon&quot;&gt;
            &lt;li&gt;&lt;a class=&quot;icon-g-64&quot; target=&quot;_blank&quot; href=&quot;http://www.facebook.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a class=&quot;icon-h-58&quot; target=&quot;_blank&quot; href=&quot;http://www.facebook.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a class=&quot;icon-g-66&quot; target=&quot;_blank&quot; href=&quot;http://www.twitter.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a class=&quot;icon-g-67&quot; target=&quot;_blank&quot; href=&quot;http://www.google.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a class=&quot;icon-g-70&quot; target=&quot;_blank&quot; href=&quot;https://instagram.com/&quot;&gt;&lt;/a&gt;&lt;/li&gt;
          &lt;/ul&gt;',
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
      4 => 
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
              'width' => '600',
              'height' => '400',
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
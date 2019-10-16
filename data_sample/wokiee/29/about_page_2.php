<?php 

$language_id = 2;
foreach($data['languages'] as $language) {
	if($language['language_id'] != 1) {
		$language_id = $language['language_id'];
	}
}

$output = array();
$output["about2_module"] = array (
  1 => 
  array (
    'title' => 
    array (
      1 => 'About us',
      $language_id => 'About us',
    ),
    'html' => 
    array (
      1 => '&lt;div id=&quot;tt-pageContent&quot;&gt;
  &lt;div class=&quot;container-indent&quot;&gt;
    &lt;div class=&quot;container container-fluid-custom-mobile-padding&quot;&gt;
      &lt;div class=&quot;row&quot;&gt;
        &lt;div class=&quot;col-xs-12 col-md-11 col-lg-9&quot;&gt;
          &lt;div class=&quot;tt-about-box-02&quot;&gt;
            &lt;h1 class=&quot;tt-title&quot; style=&quot;text-transform: none&quot;&gt;
              Wokiee is a global fashion destination for 20-somethings.
              We sell cutting-edge fashion and offer a wide variety
              of fashion-related content.
            &lt;/h1&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
  &lt;div class=&quot;container-indent&quot;&gt;
    &lt;div class=&quot;container-fluid-custom&quot;&gt;
      &lt;div class=&quot;tt-col-img&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-sm-12 col-md-6&quot;&gt;
            &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/about2-img-01.jpg&quot; alt=&quot;&quot;&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-6 col-md-3&quot;&gt;
            &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/about2-img-02.jpg&quot; alt=&quot;&quot;&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-6 col-md-3&quot;&gt;
            &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/about2-img-03.jpg&quot; alt=&quot;&quot;&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
  &lt;div class=&quot;container-indent&quot;&gt;
    &lt;div class=&quot;container container-fluid-custom-mobile-padding &quot;&gt;
      &lt;div class=&quot;tt-about02-col-list&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-md-6&quot;&gt;
            &lt;h5 class=&quot;tt-title&quot;&gt;OUR STORES&lt;/h5&gt;
            &lt;div class=&quot;width-90&quot;&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor.
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-md-6&quot;&gt;
            &lt;h5 class=&quot;tt-title&quot;&gt;CONTACTS&lt;/h5&gt;
            &lt;div class=&quot;tt-box-info&quot;&gt;
              &lt;p&gt;
                &lt;span class=&quot;tt-base-dark-color&quot;&gt;Address:&lt;/span&gt; 2548 Broaddus Maple Court Avenue, Madisonville KY 4783,&lt;br&gt;
                United States of America
              &lt;/p&gt;
              &lt;p&gt;
                &lt;span class=&quot;tt-base-dark-color&quot;&gt;Phone:&lt;/span&gt; +777 2345 7885:  +777 2345 7886
              &lt;/p&gt;
              &lt;p&gt;
                &lt;span class=&quot;tt-base-dark-color&quot;&gt;Hours:&lt;/span&gt; 7 Days a week from 10 am to 6 pm
              &lt;/p&gt;
              &lt;p&gt;
                &lt;span class=&quot;tt-base-dark-color&quot;&gt;E-mail:&lt;/span&gt; &lt;a class=&quot;link&quot; href=&quot;mailto:info@mydomain.com&quot;&gt;info@mydomain.com&lt;/a&gt;
              &lt;/p&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div id=&quot;tt-pageContent&quot;&gt;
  &lt;div class=&quot;container-indent&quot;&gt;
    &lt;div class=&quot;container container-fluid-custom-mobile-padding&quot;&gt;
      &lt;div class=&quot;row&quot;&gt;
        &lt;div class=&quot;col-xs-12 col-md-11 col-lg-9&quot;&gt;
          &lt;div class=&quot;tt-about-box-02&quot;&gt;
            &lt;h1 class=&quot;tt-title&quot; style=&quot;text-transform: none&quot;&gt;
              Wokiee is a global fashion destination for 20-somethings.
              We sell cutting-edge fashion and offer a wide variety
              of fashion-related content.
            &lt;/h1&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
  &lt;div class=&quot;container-indent&quot;&gt;
    &lt;div class=&quot;container-fluid-custom&quot;&gt;
      &lt;div class=&quot;tt-col-img&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-sm-12 col-md-6&quot;&gt;
            &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/about2-img-01.jpg&quot; alt=&quot;&quot;&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-6 col-md-3&quot;&gt;
            &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/about2-img-02.jpg&quot; alt=&quot;&quot;&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-6 col-md-3&quot;&gt;
            &lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/about2-img-03.jpg&quot; alt=&quot;&quot;&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
  &lt;div class=&quot;container-indent&quot;&gt;
    &lt;div class=&quot;container container-fluid-custom-mobile-padding &quot;&gt;
      &lt;div class=&quot;tt-about02-col-list&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-md-6&quot;&gt;
            &lt;h5 class=&quot;tt-title&quot;&gt;OUR STORES&lt;/h5&gt;
            &lt;div class=&quot;width-90&quot;&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor.
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-md-6&quot;&gt;
            &lt;h5 class=&quot;tt-title&quot;&gt;CONTACTS&lt;/h5&gt;
            &lt;div class=&quot;tt-box-info&quot;&gt;
              &lt;p&gt;
                &lt;span class=&quot;tt-base-dark-color&quot;&gt;Address:&lt;/span&gt; 2548 Broaddus Maple Court Avenue, Madisonville KY 4783,&lt;br&gt;
                United States of America
              &lt;/p&gt;
              &lt;p&gt;
                &lt;span class=&quot;tt-base-dark-color&quot;&gt;Phone:&lt;/span&gt; +777 2345 7885:  +777 2345 7886
              &lt;/p&gt;
              &lt;p&gt;
                &lt;span class=&quot;tt-base-dark-color&quot;&gt;Hours:&lt;/span&gt; 7 Days a week from 10 am to 6 pm
              &lt;/p&gt;
              &lt;p&gt;
                &lt;span class=&quot;tt-base-dark-color&quot;&gt;E-mail:&lt;/span&gt; &lt;a class=&quot;link&quot; href=&quot;mailto:info@mydomain.com&quot;&gt;info@mydomain.com&lt;/a&gt;
              &lt;/p&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
    ),
  ),
); 

$this->model_setting_setting->editSetting( "about2_module", $output );	

?>
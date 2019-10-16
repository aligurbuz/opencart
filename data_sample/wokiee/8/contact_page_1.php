<?php 

$language_id = 2;
foreach($data['languages'] as $language) {
	if($language['language_id'] != 1) {
		$language_id = $language['language_id'];
	}
}

$output = array();
$output["contact_module"] = array (
  1 => 
  array (
    'title' => 
    array (
      1 => 'Contact us',
      $language_id => 'Contact us',
    ),
    'html' => 
    array (
      1 => '&lt;div id=&quot;tt-pageContent&quot;&gt;
  &lt;div class=&quot;container-indent nomargin&quot;&gt;
    &lt;div class=&quot;tt-contact-box&quot; style=&quot;background-image: url(image/catalog/wokiee/custom/contact-img-01.jpg)&quot;&gt;
      &lt;img class=&quot;img-mobile&quot; src=&quot;image/catalog/wokiee/custom/contact-img-01.jpg&quot; alt=&quot;&quot;&gt;
      &lt;div class=&quot;container container-fluid-custom-mobile-padding&quot;&gt;
        &lt;h1 class=&quot;tt-title&quot;&gt;WE ARE LOOKING FORWARD &lt;br&gt;TO HEARING FROM YOU&lt;/h1&gt;
        &lt;address&gt;
          Address: 2548 Broaddus Maple Court Avenue, Madisonville KY 4783,&lt;br&gt;
          United States of America&lt;br&gt;
          Phone: +777 2345 7885: &amp;nbsp;+777 2345 7886
        &lt;/address&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
  &lt;div class=&quot;container-indent&quot;&gt;
    &lt;div class=&quot;container container-fluid-custom-mobile-padding&quot;&gt;
      &lt;div class=&quot;tt-contact-col-list&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-md-4&quot;&gt;
            &lt;h5 class=&quot;tt-title&quot;&gt;RETAIL PARTNERSHIPS&lt;/h5&gt;
            &lt;div class=&quot;width-90&quot;&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor.
              &lt;br&gt;&lt;a class=&quot;link&quot; href=&quot;mailto:info@mydomain.com&quot;&gt;info@mydomain.com&lt;/a&gt;
            &lt;/div&gt;

          &lt;/div&gt;
          &lt;div class=&quot;col-md-4&quot;&gt;
            &lt;h5 class=&quot;tt-title&quot;&gt;PRESS &amp;AMP; MARKETING&lt;/h5&gt;
            &lt;address class=&quot;width-90&quot;&gt;
              Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
              &lt;br&gt;&lt;a class=&quot;link&quot; href=&quot;mailto:info@mydomain.com&quot;&gt;info@mydomain.com&lt;/a&gt;
            &lt;/address&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-md-4&quot;&gt;
            &lt;h5 class=&quot;tt-title&quot;&gt;CAREERS&lt;/h5&gt;
            &lt;address&gt;
              Ctetur adipisicing elit, sed do eiusmod tempor.
              &lt;br&gt;&lt;a class=&quot;link&quot; href=&quot;mailto:info@mydomain.com&quot;&gt;info@mydomain.com&lt;/a&gt;
            &lt;/address&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div id=&quot;tt-pageContent&quot;&gt;
  &lt;div class=&quot;container-indent nomargin&quot;&gt;
    &lt;div class=&quot;tt-contact-box&quot; style=&quot;background-image: url(image/catalog/wokiee/custom/contact-img-01.jpg)&quot;&gt;
      &lt;img class=&quot;img-mobile&quot; src=&quot;image/catalog/wokiee/custom/contact-img-01.jpg&quot; alt=&quot;&quot;&gt;
      &lt;div class=&quot;container container-fluid-custom-mobile-padding&quot;&gt;
        &lt;h1 class=&quot;tt-title&quot;&gt;WE ARE LOOKING FORWARD &lt;br&gt;TO HEARING FROM YOU&lt;/h1&gt;
        &lt;address&gt;
          Address: 2548 Broaddus Maple Court Avenue, Madisonville KY 4783,&lt;br&gt;
          United States of America&lt;br&gt;
          Phone: +777 2345 7885: &amp;nbsp;+777 2345 7886
        &lt;/address&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
  &lt;div class=&quot;container-indent&quot;&gt;
    &lt;div class=&quot;container container-fluid-custom-mobile-padding&quot;&gt;
      &lt;div class=&quot;tt-contact-col-list&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-md-4&quot;&gt;
            &lt;h5 class=&quot;tt-title&quot;&gt;RETAIL PARTNERSHIPS&lt;/h5&gt;
            &lt;div class=&quot;width-90&quot;&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor.
              &lt;br&gt;&lt;a class=&quot;link&quot; href=&quot;mailto:info@mydomain.com&quot;&gt;info@mydomain.com&lt;/a&gt;
            &lt;/div&gt;

          &lt;/div&gt;
          &lt;div class=&quot;col-md-4&quot;&gt;
            &lt;h5 class=&quot;tt-title&quot;&gt;PRESS &amp;AMP; MARKETING&lt;/h5&gt;
            &lt;address class=&quot;width-90&quot;&gt;
              Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
              &lt;br&gt;&lt;a class=&quot;link&quot; href=&quot;mailto:info@mydomain.com&quot;&gt;info@mydomain.com&lt;/a&gt;
            &lt;/address&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-md-4&quot;&gt;
            &lt;h5 class=&quot;tt-title&quot;&gt;CAREERS&lt;/h5&gt;
            &lt;address&gt;
              Ctetur adipisicing elit, sed do eiusmod tempor.
              &lt;br&gt;&lt;a class=&quot;link&quot; href=&quot;mailto:info@mydomain.com&quot;&gt;info@mydomain.com&lt;/a&gt;
            &lt;/address&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
    ),
  ),
); 

$this->model_setting_setting->editSetting( "contact_module", $output );	

?>
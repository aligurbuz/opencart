<?php 

$language_id = 2;
foreach($data['languages'] as $language) {
	if($language['language_id'] != 1) {
		$language_id = $language['language_id'];
	}
}

$output = array();
$output["services_module"] = array (
  1 => 
  array (
    'title' => 
    array (
      1 => 'Services',
      $language_id => 'Services',
    ),
    'html' => 
    array (
      1 => '&lt;div id=&quot;tt-pageContent&quot;&gt;
  &lt;div class=&quot;container-indent&quot;&gt;
    &lt;div class=&quot;container container-fluid-custom-mobile-padding&quot;&gt;
      &lt;h1 class=&quot;tt-title-subpages noborder&quot;&gt;WHAT WE DO&lt;/h1&gt;
      &lt;div class=&quot;tt-box-thumb-listing&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-sm-6 col-md-6 col-lg-4&quot;&gt;
            &lt;div class=&quot;tt-box-thumb&quot;&gt;
              &lt;a href=&quot;#&quot; class=&quot;tt-img&quot;&gt;&lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/services-img-01.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;FUTURE LEADERS&lt;/a&gt;&lt;/h6&gt;
              &lt;p&gt;Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. &lt;/p&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-6 col-md-6 col-lg-4&quot;&gt;
            &lt;div class=&quot;tt-box-thumb&quot;&gt;
              &lt;a href=&quot;#&quot; class=&quot;tt-img&quot;&gt;&lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/services-img-02.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;POWERFUL SOLUTIONS&lt;/a&gt;&lt;/h6&gt;
              &lt;p&gt;Dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.&lt;/p&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-6 col-md-6 col-lg-4&quot;&gt;
            &lt;div class=&quot;tt-box-thumb&quot;&gt;
              &lt;a href=&quot;#&quot; class=&quot;tt-img&quot;&gt;&lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/services-img-03.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;PROGRESSIVE TOOLS&lt;/a&gt;&lt;/h6&gt;
              &lt;p&gt;Ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. &lt;/p&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-6 col-md-6 col-lg-4&quot;&gt;
            &lt;div class=&quot;tt-box-thumb&quot;&gt;
              &lt;a href=&quot;#&quot; class=&quot;tt-img&quot;&gt;&lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/services-img-04.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;CREATIVE PROJECTS&lt;/a&gt;&lt;/h6&gt;
              &lt;p&gt;Sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.&lt;/p&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-6 col-md-6 col-lg-4&quot;&gt;
            &lt;div class=&quot;tt-box-thumb&quot;&gt;
              &lt;a href=&quot;#&quot; class=&quot;tt-img&quot;&gt;&lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/services-img-05.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;INNOVATION EXPERTS&lt;/a&gt;&lt;/h6&gt;
              &lt;p&gt;Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.&lt;/p&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-6 col-md-6 col-lg-4&quot;&gt;
            &lt;div class=&quot;tt-box-thumb&quot;&gt;
              &lt;a href=&quot;#&quot; class=&quot;tt-img&quot;&gt;&lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/services-img-06.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;LEADING STRATEGIES&lt;/a&gt;&lt;/h6&gt;
              &lt;p&gt;Dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.&lt;/p&gt;
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
      &lt;h1 class=&quot;tt-title-subpages noborder&quot;&gt;WHAT WE DO&lt;/h1&gt;
      &lt;div class=&quot;tt-box-thumb-listing&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-sm-6 col-md-6 col-lg-4&quot;&gt;
            &lt;div class=&quot;tt-box-thumb&quot;&gt;
              &lt;a href=&quot;#&quot; class=&quot;tt-img&quot;&gt;&lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/services-img-01.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;FUTURE LEADERS&lt;/a&gt;&lt;/h6&gt;
              &lt;p&gt;Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. &lt;/p&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-6 col-md-6 col-lg-4&quot;&gt;
            &lt;div class=&quot;tt-box-thumb&quot;&gt;
              &lt;a href=&quot;#&quot; class=&quot;tt-img&quot;&gt;&lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/services-img-02.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;POWERFUL SOLUTIONS&lt;/a&gt;&lt;/h6&gt;
              &lt;p&gt;Dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.&lt;/p&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-6 col-md-6 col-lg-4&quot;&gt;
            &lt;div class=&quot;tt-box-thumb&quot;&gt;
              &lt;a href=&quot;#&quot; class=&quot;tt-img&quot;&gt;&lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/services-img-03.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;PROGRESSIVE TOOLS&lt;/a&gt;&lt;/h6&gt;
              &lt;p&gt;Ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. &lt;/p&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-6 col-md-6 col-lg-4&quot;&gt;
            &lt;div class=&quot;tt-box-thumb&quot;&gt;
              &lt;a href=&quot;#&quot; class=&quot;tt-img&quot;&gt;&lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/services-img-04.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;CREATIVE PROJECTS&lt;/a&gt;&lt;/h6&gt;
              &lt;p&gt;Sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.&lt;/p&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-6 col-md-6 col-lg-4&quot;&gt;
            &lt;div class=&quot;tt-box-thumb&quot;&gt;
              &lt;a href=&quot;#&quot; class=&quot;tt-img&quot;&gt;&lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/services-img-05.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;INNOVATION EXPERTS&lt;/a&gt;&lt;/h6&gt;
              &lt;p&gt;Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.&lt;/p&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-6 col-md-6 col-lg-4&quot;&gt;
            &lt;div class=&quot;tt-box-thumb&quot;&gt;
              &lt;a href=&quot;#&quot; class=&quot;tt-img&quot;&gt;&lt;img src=&quot;catalog/view/theme/wokiee/img/loader.svg&quot; data-src=&quot;image/catalog/wokiee/custom/services-img-06.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;LEADING STRATEGIES&lt;/a&gt;&lt;/h6&gt;
              &lt;p&gt;Dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.&lt;/p&gt;
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

$this->model_setting_setting->editSetting( "services_module", $output );	

?>
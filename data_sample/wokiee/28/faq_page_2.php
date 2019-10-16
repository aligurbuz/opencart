<?php 

$language_id = 2;
foreach($data['languages'] as $language) {
	if($language['language_id'] != 1) {
		$language_id = $language['language_id'];
	}
}

$output = array();
$output["faq2_module"] = array (
  1 => 
  array (
    'title' => 
    array (
      1 => 'FAQ',
      $language_id => 'FAQ',
    ),
    'html' => 
    array (
      1 => '&lt;div id=&quot;tt-pageContent&quot;&gt;
  &lt;div class=&quot;container-indent&quot;&gt;
    &lt;div class=&quot;container container-fluid-custom-mobile-padding&quot;&gt;
      &lt;h1 class=&quot;tt-title-subpages&quot;&gt;ANSWERS TO YOUR QUESTIONS&lt;/h1&gt;
      &lt;h2 class=&quot;tt-base-color small&quot; style=&quot;text-transform: none&quot;&gt;Shopping Information&lt;/h2&gt;
      &lt;div class=&quot;tt-box-faq-listing&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-sm-12 col-md-6&quot;&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;WHAT SHIPPING METHODS ARE AVAILABLE?&lt;/a&gt;&lt;/h6&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.
              &lt;p&gt;
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.
              &lt;/p&gt;
            &lt;/div&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;HOW LONG WILL IT TAKE TO GET MY PACKAGE?&lt;/a&gt;&lt;/h6&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-12 col-md-6&quot;&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;DO YOU SHIP INTERNATIONALLY?&lt;/a&gt;&lt;/h6&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
            &lt;/div&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;WHAT SHIPPING METHODS ARE AVAILABLE?&lt;/a&gt;&lt;/h6&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;hr class=&quot;hr-01&quot;&gt;
      &lt;h2 class=&quot;tt-base-color small&quot; style=&quot;text-transform: none&quot;&gt;Payment Information&lt;/h2&gt;
      &lt;div class=&quot;tt-box-faq-listing&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-sm-12 col-md-6&quot;&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;WHAT PAYMENT METHODS ARE ACCEPTED?&lt;/a&gt;&lt;/h6&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-12 col-md-6&quot;&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;IS BUYING ON-LINE SAFE?&lt;/a&gt;&lt;/h6&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;hr class=&quot;hr-01&quot;&gt;
      &lt;h2 class=&quot;tt-base-color small&quot; style=&quot;text-transform: none&quot;&gt;Orders and Returns&lt;/h2&gt;
      &lt;div class=&quot;tt-box-faq-listing&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-sm-12 col-md-6&quot;&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;HOW DO I PLACE AN ORDER?&lt;/a&gt;&lt;/h6&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            &lt;/div&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;DO I NEED AN ACCOUNT TO PLACE AN ORDER?&lt;/a&gt;&lt;/h6&gt;
              Conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            &lt;/div&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;WHO SHOULD I TO CONTACT IF I HAVE ANY QUERIES?&lt;/a&gt;&lt;/h6&gt;
              Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-12 col-md-6&quot;&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;HOW CAN I CANCEL OR CHANGE MY ORDER?&lt;/a&gt;&lt;/h6&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
            &lt;/div&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;HOW DO I TRACK MY ORDER?&lt;/a&gt;&lt;/h6&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. Conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
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
      &lt;h1 class=&quot;tt-title-subpages&quot;&gt;ANSWERS TO YOUR QUESTIONS&lt;/h1&gt;
      &lt;h2 class=&quot;tt-base-color small&quot; style=&quot;text-transform: none&quot;&gt;Shopping Information&lt;/h2&gt;
      &lt;div class=&quot;tt-box-faq-listing&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-sm-12 col-md-6&quot;&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;WHAT SHIPPING METHODS ARE AVAILABLE?&lt;/a&gt;&lt;/h6&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.
              &lt;p&gt;
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.
              &lt;/p&gt;
            &lt;/div&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;HOW LONG WILL IT TAKE TO GET MY PACKAGE?&lt;/a&gt;&lt;/h6&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-12 col-md-6&quot;&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;DO YOU SHIP INTERNATIONALLY?&lt;/a&gt;&lt;/h6&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
            &lt;/div&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;WHAT SHIPPING METHODS ARE AVAILABLE?&lt;/a&gt;&lt;/h6&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;hr class=&quot;hr-01&quot;&gt;
      &lt;h2 class=&quot;tt-base-color small&quot; style=&quot;text-transform: none&quot;&gt;Payment Information&lt;/h2&gt;
      &lt;div class=&quot;tt-box-faq-listing&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-sm-12 col-md-6&quot;&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;WHAT PAYMENT METHODS ARE ACCEPTED?&lt;/a&gt;&lt;/h6&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-12 col-md-6&quot;&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;IS BUYING ON-LINE SAFE?&lt;/a&gt;&lt;/h6&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;hr class=&quot;hr-01&quot;&gt;
      &lt;h2 class=&quot;tt-base-color small&quot; style=&quot;text-transform: none&quot;&gt;Orders and Returns&lt;/h2&gt;
      &lt;div class=&quot;tt-box-faq-listing&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-sm-12 col-md-6&quot;&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;HOW DO I PLACE AN ORDER?&lt;/a&gt;&lt;/h6&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            &lt;/div&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;DO I NEED AN ACCOUNT TO PLACE AN ORDER?&lt;/a&gt;&lt;/h6&gt;
              Conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            &lt;/div&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;WHO SHOULD I TO CONTACT IF I HAVE ANY QUERIES?&lt;/a&gt;&lt;/h6&gt;
              Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-sm-12 col-md-6&quot;&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;HOW CAN I CANCEL OR CHANGE MY ORDER?&lt;/a&gt;&lt;/h6&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
            &lt;/div&gt;
            &lt;div class=&quot;tt-box-faq&quot;&gt;
              &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;HOW DO I TRACK MY ORDER?&lt;/a&gt;&lt;/h6&gt;
              Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. Conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
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

$this->model_setting_setting->editSetting( "faq2_module", $output );	

?>
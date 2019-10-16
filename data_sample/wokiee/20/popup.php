<?php 

$language_id = 2;
foreach($data['languages'] as $language) {
	if($language['language_id'] != 1) {
		$language_id = $language['language_id'];
	}
}

$output = array();
$output["popup_id_module"] = 11;
$output["popup_module"] = array (
  1 => 
  array (
    'type' => '1',
    'newsletter_popup_title' => 
    array (
      1 => 'BE THE FIRST&lt;br&gt;TO KNOW ABOUT, WOKIEE, OPENCART FASHION DROPSHIPPING THEME',
      $language_id => 'BE THE FIRST&lt;br&gt;TO KNOW ABOUT, WOKIEE, HTML FASHION DROPSHIPPING THEMEBE THE FIRST&lt;br&gt;TO KNOW ABOUT, WOKIEE, OPENCART FASHION DROPSHIPPING THEME',
    ),
    'newsletter_popup_text' => 
    array (
      1 => 'By subscribe, you accept the terms &amp; privacy policy',
      $language_id => 'By subscribe, you accept the terms &amp; privacy policy',
    ),
    'newsletter_input_placeholder' => 
    array (
      1 => 'Enter your e-mail',
      $language_id => 'Enter your e-mail',
    ),
    'newsletter_subscribe_button_text' => 
    array (
      1 => 'Join us',
      $language_id => 'Join us',
    ),
    'custom_popup_title' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'custom_popup_text' => 
    array (
      1 => '                &lt;p&gt;We need to verify your age&lt;/p&gt;
                &lt;div class=&quot;tt-title&quot;&gt;Are you 18 or older?&lt;/div&gt;',
      $language_id => '                &lt;p&gt;We need to verify your age&lt;/p&gt;
                &lt;div class=&quot;tt-title&quot;&gt;Are you 18 or older?&lt;/div&gt;',
    ),
    'contact_form_popup_title' => 
    array (
      1 => 'Contact Form',
      $language_id => 'Contact Form',
    ),
    'module_id' => '1',
    'show_only_once' => '1',
    'display_text_dont_show_again' => '0',
    'text_dont_show_again' => 
    array (
      1 => 'Don’t Show This Popup Again',
      $language_id => 'Don’t Show This Popup Again',
    ),
    'display_buttons_yes_no' => '1',
    'no' => 
    array (
      1 => 'No',
      $language_id => 'No',
    ),
    'yes' => 
    array (
      1 => 'Yes',
      $language_id => 'Yes',
    ),
    'content_width' => '750',
    'background_color' => '',
    'background_image' => '',
    'background_image_position' => 'top left',
    'background_image_repeat' => 'no-repeat',
    'show_after' => '2000',
    'autoclose_after' => '',
    'disable_on_desktop' => '0',
    'layout_id' => '1',
    'position' => 'popup',
    'status' => '1',
    'sort_order' => '0',
  ),
  2 => 
  array (
    'type' => '2',
    'newsletter_popup_title' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'newsletter_popup_text' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'newsletter_input_placeholder' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'newsletter_subscribe_button_text' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'custom_popup_title' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'custom_popup_text' => 
    array (
      1 => '      &lt;form class=&quot;form-default&quot;&gt;
        &lt;div class=&quot;modal-body tt-background&quot;&gt;
          &lt;div class=&quot;tt-modal-discount row&quot;&gt;
            &lt;div class=&quot;col-6 ml-auto&quot;&gt;
              &lt;div class=&quot;tt-promo-title&quot;&gt;
                &lt;div class=&quot;text-01&quot;&gt;Lucky You!&lt;/div&gt;
                &lt;div class=&quot;text-02&quot;&gt;Want an Instant&lt;/div&gt;
                &lt;div class=&quot;text-03&quot;&gt;10% OFF?&lt;/div&gt;
              &lt;/div&gt;
              &lt;div class=&quot;form-group&quot;&gt;
                &lt;input type=&quot;text&quot; name=&quot;name&quot; class=&quot;form-control&quot; placeholder=&quot;Enter Email&quot;&gt;
              &lt;/div&gt;
              &lt;a href=&quot;#&quot; class=&quot;btn&quot;&gt;ACTIVATE CODE&lt;/a&gt;
              &lt;p&gt;
                &lt;a href=&quot;#&quot; class=&quot;tt-link-underline js-reject-discount&quot;&gt;No Thanks, I want to pay the full price.&lt;/a&gt;
              &lt;/p&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/form&gt;',
      $language_id => '     &lt;form class=&quot;form-default&quot;&gt;
        &lt;div class=&quot;modal-body tt-background&quot;&gt;
          &lt;div class=&quot;tt-modal-discount row&quot;&gt;
            &lt;div class=&quot;col-6 ml-auto&quot;&gt;
              &lt;div class=&quot;tt-promo-title&quot;&gt;
                &lt;div class=&quot;text-01&quot;&gt;Lucky You!&lt;/div&gt;
                &lt;div class=&quot;text-02&quot;&gt;Want an Instant&lt;/div&gt;
                &lt;div class=&quot;text-03&quot;&gt;10% OFF?&lt;/div&gt;
              &lt;/div&gt;
              &lt;div class=&quot;form-group&quot;&gt;
                &lt;input type=&quot;text&quot; name=&quot;name&quot; class=&quot;form-control&quot; placeholder=&quot;Enter Email&quot;&gt;
              &lt;/div&gt;
              &lt;a href=&quot;#&quot; class=&quot;btn&quot;&gt;ACTIVATE CODE&lt;/a&gt;
              &lt;p&gt;
                &lt;a href=&quot;#&quot; class=&quot;tt-link-underline js-reject-discount&quot;&gt;No Thanks, I want to pay the full price.&lt;/a&gt;
              &lt;/p&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/form&gt;',
    ),
    'contact_form_popup_title' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'module_id' => '2',
    'show_only_once' => '0',
    'display_text_dont_show_again' => '1',
    'text_dont_show_again' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'display_buttons_yes_no' => '1',
    'no' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'yes' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'content_width' => '750',
    'background_color' => '',
    'background_image' => '',
    'background_image_position' => 'top left',
    'background_image_repeat' => 'no-repeat',
    'show_after' => '2000',
    'autoclose_after' => '',
    'disable_on_desktop' => '0',
    'layout_id' => '1',
    'position' => 'popup',
    'status' => '0',
    'sort_order' => '0',
  ),
  3 => 
  array (
    'type' => '2',
    'newsletter_popup_title' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'newsletter_popup_text' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'newsletter_input_placeholder' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'newsletter_subscribe_button_text' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'custom_popup_title' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'custom_popup_text' => 
    array (
      1 => '          &lt;p&gt;We need to verify youe age&lt;/p&gt;
          &lt;div class=&quot;tt-title&quot;&gt;Are you 18 or older?&lt;/div&gt;',
      $language_id => '         &lt;p&gt;We need to verify youe age&lt;/p&gt;
          &lt;div class=&quot;tt-title&quot;&gt;Are you 18 or older?&lt;/div&gt;',
    ),
    'contact_form_popup_title' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'module_id' => '3',
    'show_only_once' => '0',
    'display_text_dont_show_again' => '1',
    'text_dont_show_again' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'display_buttons_yes_no' => '0',
    'no' => 
    array (
      1 => 'No',
      $language_id => 'No',
    ),
    'yes' => 
    array (
      1 => 'Yes',
      $language_id => 'Yes',
    ),
    'content_width' => '750',
    'background_color' => '',
    'background_image' => '',
    'background_image_position' => 'top left',
    'background_image_repeat' => 'no-repeat',
    'show_after' => '',
    'autoclose_after' => '',
    'disable_on_desktop' => '0',
    'layout_id' => '1',
    'position' => 'popup',
    'status' => '0',
    'sort_order' => '0',
  ),
  4 => 
  array (
    'type' => '3',
    'newsletter_popup_title' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'newsletter_popup_text' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'newsletter_input_placeholder' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'newsletter_subscribe_button_text' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'custom_popup_title' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'custom_popup_text' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'contact_form_popup_title' => 
    array (
      1 => 'Contact Form',
      $language_id => 'Contact Form',
    ),
    'module_id' => '4',
    'show_only_once' => '1',
    'display_text_dont_show_again' => '1',
    'text_dont_show_again' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'display_buttons_yes_no' => '1',
    'no' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'yes' => 
    array (
      1 => '',
      $language_id => '',
    ),
    'content_width' => '750',
    'background_color' => '',
    'background_image' => '',
    'background_image_position' => 'top left',
    'background_image_repeat' => 'no-repeat',
    'show_after' => '',
    'autoclose_after' => '',
    'disable_on_desktop' => '0',
    'layout_id' => '1',
    'position' => 'popup',
    'status' => '0',
    'sort_order' => '0',
  ),
); 

$output2 = array();
$output2["popup_module"] = $this->config->get('popup_module');

if(!is_array($output["popup_module"])) $output["popup_module"] = array();
if(!is_array($output2["popup_module"])) $output2["popup_module"] = array();
$output3 = array();
$output3["popup_module"] = array_merge($output["popup_module"], $output2["popup_module"]);

$this->model_setting_setting->editSetting( "popup", $output3 );	

?>
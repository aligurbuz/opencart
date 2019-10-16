<?php  
/* 
Version: 1.0
Author: Artur SuÅkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModulePopup extends Controller {
	public function index($setting) {
		if(isset($setting['newsletter_popup_title'][$this->config->get('config_language_id')])) {
			$data['newsletter_popup_title'] = html_entity_decode($setting['newsletter_popup_title'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
			$data['newsletter_popup_text'] = html_entity_decode($setting['newsletter_popup_text'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
			$data['newsletter_input_placeholder'] = html_entity_decode($setting['newsletter_input_placeholder'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
			$data['newsletter_subscribe_button_text'] = html_entity_decode($setting['newsletter_subscribe_button_text'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
			$data['custom_popup_title'] = html_entity_decode($setting['custom_popup_title'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
			$data['custom_popup_text'] = html_entity_decode($setting['custom_popup_text'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
			$data['contact_form_popup_title'] = html_entity_decode($setting['contact_form_popup_title'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
			$data['text_dont_show_again'] = html_entity_decode($setting['text_dont_show_again'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
			$data['no'] = html_entity_decode($setting['no'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
			$data['yes'] = html_entity_decode($setting['yes'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
		} else {
			$data['newsletter_popup_title'] = 'Set title!';
			$data['newsletter_popup_text'] = 'Set text!';
			$data['newsletter_input_placeholder'] = 'Set text!';
			$data['newsletter_subscribe_button_text'] = 'Set title!';
			$data['custom_popup_title'] = 'Set title!';
			$data['custom_popup_text'] = 'Set text!';
			$data['contact_form_popup_title'] = 'Set title!';
			$data['text_dont_show_again'] = '';
			$data['no'] = '';
			$data['yes'] = '';
		}
		
		if($data['text_dont_show_again'] == '') $data['text_dont_show_again'] = 'Don\'t show again';
		if($data['no'] == '') $data['no'] = 'No';
		if($data['yes'] == '') $data['yes'] = 'Yes';
		
		$data['module_id'] = $setting['module_id'];
		$data['type'] = $setting['type'];
		$data['show_only_once'] = $setting['show_only_once'];
		$data['display_text_dont_show_again'] = $setting['display_text_dont_show_again'];
		$data['display_buttons_yes_no'] = $setting['display_buttons_yes_no'];
		$data['content_width'] = $setting['content_width'];
		$data['background_color'] = $setting['background_color'];
		$data['background_image'] = $setting['background_image'];
		$data['background_image_position'] = $setting['background_image_position'];
		$data['background_image_repeat'] = $setting['background_image_repeat'];
		$data['show_after'] = $setting['show_after'];
		$data['autoclose_after'] = $setting['autoclose_after'];
		$data['disable_on_desktop'] = $setting['disable_on_desktop'];
		$data['subscribe_url'] = $this->url->link('extension/module/newsletter/subscribe', '', true);
		$data['unsubscribe_url'] = $this->url->link('extension/module/newsletter/unsubscribe', '', true);
		$data['contact_url'] = $this->url->link('extension/module/popup/contact', '', true);
		$data['url'] = $this->url->link('common/home', '', true);
		$data['ajax'] = false;
		
		if($setting['type'] == 3) {
		     $this->load->language('information/contact');
		     $data['entry_name'] = $this->language->get('entry_name');
		     $data['entry_email'] = $this->language->get('entry_email');
		     $data['entry_enquiry'] = $this->language->get('entry_enquiry');
		     $data['button_submit'] = $this->language->get('button_submit');
		     $data['text_message'] = $this->language->get('text_success');
		}
		
		return $this->load->view('extension/module/popup', $data);
	}
	
	public function contact() {
	     $this->load->language('information/contact');
	     if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 32)) {
	          echo $this->language->get('error_name');
	          exit;
	     }
	     
	     if (!preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i', $this->request->post['email'])) {
	          echo $this->language->get('error_email');
	          exit;
	     }
	     
	     if ((utf8_strlen($this->request->post['enquiry']) < 10) || (utf8_strlen($this->request->post['enquiry']) > 3000)) {
	          echo $this->language->get('error_enquiry');
	          exit;
	     }
	     
	     $send_from =  '';
	     if (isset($this->request->post['product_id'])) {
	         $send_from = $this->url->link('product/product', 'product_id=' . $this->request->post['product_id']);
	     } else if (isset($this->request->post['url'])) {
	         $send_from = $this->request->post['url'];
	     }
	     
	     if ($send_from) {
	          $send_from = "\n\nSend from: <a href='" . $send_from . "'>" . $send_from . "</a>";
	     }
	     
		$mail = new Mail();
		$mail->protocol = $this->config->get('config_mail_protocol');
		$mail->parameter = $this->config->get('config_mail_parameter');
		$mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
		$mail->smtp_username = $this->config->get('config_mail_smtp_username');
		$mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
		$mail->smtp_port = $this->config->get('config_mail_smtp_port');
		$mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');

		$mail->setTo($this->config->get('config_email'));
		$mail->setFrom($this->request->post['email']);
		$mail->setSender(html_entity_decode($this->request->post['name'], ENT_QUOTES, 'UTF-8'));
		$mail->setSubject(html_entity_decode(sprintf($this->language->get('email_subject'), $this->request->post['name']), ENT_QUOTES, 'UTF-8'));
		$mail->setText(strip_tags(html_entity_decode($this->request->post['enquiry'] . $send_from, ENT_QUOTES, 'UTF-8')));
		$mail->send();
	     
	     echo strip_tags($this->language->get('text_success'));
	}
	
	public function show() {
	     $modules = $this->config->get('popup_module');
	     $module_id = 0;
	     $product_id = 0;
	     if(isset($_GET['module_id'])) $module_id = intval($_GET['module_id']);
	     if(isset($_GET['product_id'])) $product_id = intval($_GET['product_id']);
	     
	     if(is_array($modules)) {
     	     foreach($modules as $setting) {
     	          if($setting['module_id'] == $module_id) {
     	               if(isset($setting['newsletter_popup_title'][$this->config->get('config_language_id')])) {
     	               	$data['newsletter_popup_title'] = html_entity_decode($setting['newsletter_popup_title'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
     	               	$data['newsletter_popup_text'] = html_entity_decode($setting['newsletter_popup_text'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
     	               	$data['newsletter_input_placeholder'] = html_entity_decode($setting['newsletter_input_placeholder'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
     	               	$data['newsletter_subscribe_button_text'] = html_entity_decode($setting['newsletter_subscribe_button_text'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
     	               	$data['custom_popup_title'] = html_entity_decode($setting['custom_popup_title'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
     	               	$data['custom_popup_text'] = html_entity_decode($setting['custom_popup_text'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
     	               	$data['contact_form_popup_title'] = html_entity_decode($setting['contact_form_popup_title'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
     	               	$data['text_dont_show_again'] = html_entity_decode($setting['text_dont_show_again'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
     	               	$data['no'] = html_entity_decode($setting['no'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
     	               	$data['yes'] = html_entity_decode($setting['yes'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
     	               } else {
     	               	$data['newsletter_popup_title'] = 'Set title!';
     	               	$data['newsletter_popup_text'] = 'Set text!';
     	               	$data['newsletter_input_placeholder'] = 'Set text!';
     	               	$data['newsletter_subscribe_button_text'] = 'Set title!';
     	               	$data['custom_popup_title'] = 'Set title!';
     	               	$data['custom_popup_text'] = 'Set text!';
     	               	$data['contact_form_popup_title'] = 'Set title!';
     	               	$data['text_dont_show_again'] = '';
     	               	$data['no'] = '';
     	               	$data['yes'] = '';
     	               }
     	               
     	               if($data['text_dont_show_again'] == '') $data['text_dont_show_again'] = 'Don\'t show again';
     	               if($data['no'] == '') $data['no'] = 'No';
     	               if($data['yes'] == '') $data['yes'] = 'Yes';
     	               
     	               $data['template_name'] = $this->config->get('theme_' . $this->config->get('config_theme') . '_directory');
     	               $data['module_id'] = $setting['module_id']+10000;
     	               $data['type'] = $setting['type'];
		               $data['show_only_once'] = $setting['show_only_once'];
     	               $data['display_text_dont_show_again'] = $setting['display_text_dont_show_again'];
     	               $data['display_buttons_yes_no'] = $setting['display_buttons_yes_no'];
     	               $data['content_width'] = $setting['content_width'];
     	               $data['background_color'] = $setting['background_color'];
     	               $data['background_image'] = $setting['background_image'];
     	               $data['background_image_position'] = $setting['background_image_position'];
     	               $data['background_image_repeat'] = $setting['background_image_repeat'];
     	               $data['show_after'] = $setting['show_after'];
     	               $data['autoclose_after'] = $setting['autoclose_after'];
     	               $data['disable_on_desktop'] = $setting['disable_on_desktop'];
     	               $data['subscribe_url'] = $this->url->link('extension/module/newsletter/subscribe', '', true);
     	               $data['unsubscribe_url'] = $this->url->link('extension/module/newsletter/unsubscribe', '', true);
     	               $data['contact_url'] = $this->url->link('extension/module/popup/contact', '', true);
     	               if($product_id > 0) $data['product_id'] = $product_id;
     	               $data['url'] = $this->url->link('common/home', '', true);
     	               $data['ajax'] = true;
     	               
     	               if($setting['type'] == 3) {
     	                    $this->load->language('information/contact');
     	                    $data['entry_name'] = $this->language->get('entry_name');
     	                    $data['entry_email'] = $this->language->get('entry_email');
     	                    $data['entry_enquiry'] = $this->language->get('entry_enquiry');
     	                    $data['button_submit'] = $this->language->get('button_submit');
     	                    $data['text_message'] = $this->language->get('text_success');
     	               }

     	               echo $this->load->view('extension/module/popup', $data);
     	          }
     	     }
	     }
	}
}
?>
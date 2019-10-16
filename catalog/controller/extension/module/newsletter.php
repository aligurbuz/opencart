<?php  
/* 
Version: 1.0
Author: Artur Sułkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModuleNewsletter extends Controller {
    public function getText($text) {    	
        $newsletter_settings = $this->config->get('newsletter_settings');
        $subscribe_message = false;
        $unsubscribe_message = false;
        $confirm_unsubscribe = false;
        $invalid_email_message = false;
        $email_not_found = false;
        
        if(isset($newsletter_settings[$this->config->get('config_language_id')]['subscribe_message'])) $subscribe_message = html_entity_decode($newsletter_settings[$this->config->get('config_language_id')]['subscribe_message'], ENT_QUOTES, 'UTF-8');
        if(isset($newsletter_settings[$this->config->get('config_language_id')]['unsubscribe_message'])) $unsubscribe_message = html_entity_decode($newsletter_settings[$this->config->get('config_language_id')]['unsubscribe_message'], ENT_QUOTES, 'UTF-8');
        if(isset($newsletter_settings[$this->config->get('config_language_id')]['confirm_unsubscribe'])) $confirm_unsubscribe = html_entity_decode($newsletter_settings[$this->config->get('config_language_id')]['confirm_unsubscribe'], ENT_QUOTES, 'UTF-8');
        if(isset($newsletter_settings[$this->config->get('config_language_id')]['invalid_email_message'])) $invalid_email_message = html_entity_decode($newsletter_settings[$this->config->get('config_language_id')]['invalid_email_message'], ENT_QUOTES, 'UTF-8');
        if(isset($newsletter_settings[$this->config->get('config_language_id')]['email_not_found'])) $email_not_found = html_entity_decode($newsletter_settings[$this->config->get('config_language_id')]['email_not_found'], ENT_QUOTES, 'UTF-8');
        
        if($subscribe_message == '') $subscribe_message = "Your subscription has been confirmed. You've been added to our list and will hear from us soon.";
        if($unsubscribe_message == '') $unsubscribe_message = 'You have successfully unsubscribed from our newsletter.';
        if($confirm_unsubscribe == '') $confirm_unsubscribe = 'That email address is already subscribed to the list. Unsubscribe?';
        if($invalid_email_message == '') $invalid_email_message = 'Invalid email address.';
        if($email_not_found == '') $email_not_found = 'Your e-mail not found.';
        
        if($text == 'subscribe_message') return $subscribe_message;
        if($text == 'unsubscribe_message') return $unsubscribe_message;
        if($text == 'confirm_unsubscribe') return $confirm_unsubscribe;
        if($text == 'invalid_email_message') return $invalid_email_message;
        if($text == 'email_not_found') return $email_not_found;
    }
	
	public function index($setting) {
		$data['module_title'] = 'Newsletter';
		$data['module_text'] = '';
		$data['input_placeholder'] = '';
		$data['subscribe_text'] = 'Subscribe';
		$data['unsubscribe_text'] = 'Unsubscribe';
		
		if(isset($setting[$this->config->get('config_language_id')]['module_title'])) $data['module_title'] = $setting[$this->config->get('config_language_id')]['module_title'];
		
		if(isset($setting[$this->config->get('config_language_id')]['module_text'])) $data['module_text'] = html_entity_decode($setting[$this->config->get('config_language_id')]['module_text'], ENT_QUOTES, 'UTF-8');
		
		if(isset($setting[$this->config->get('config_language_id')]['input_placeholder'])) $data['input_placeholder'] = $setting[$this->config->get('config_language_id')]['input_placeholder'];
		
		if(isset($setting[$this->config->get('config_language_id')]['subscribe_text'])) $data['subscribe_text'] = $setting[$this->config->get('config_language_id')]['subscribe_text'];
		
		if(isset($setting[$this->config->get('config_language_id')]['unsubscribe_text'])) $data['unsubscribe_text'] = $setting[$this->config->get('config_language_id')]['unsubscribe_text'];

		$data['button_unsubscribe'] = $setting['button_unsubscribe'];
		$data['position'] = $setting['position'];
		$data['module_id'] = rand(0, 5000);
		
		$data['subscribe_url'] = $this->url->link('extension/module/newsletter/subscribe', '', true);
		$data['unsubscribe_url'] = $this->url->link('extension/module/newsletter/unsubscribe', '', true);
		
		return $this->load->view('extension/module/newsletter', $data);
	}
	
	public function subscribe() {
		$this->load->model('newsletter/newsletter');
		$json = array();
		if ($this->validateEmail()) {
		    $newsletter = $this->model_newsletter_newsletter;
		    if ($newsletter->isSubscribed($this->request->post['email'])) {
		        $json['error'] = 1;
		        $json['message'] = $this->getText('confirm_unsubscribe');
		    } else {
		        $newsletter->subscribe($this->request->post['email']);
		        $json['error'] = 0;
		        $json['message'] = $this->getText('subscribe_message');
		    }
		} else {
		    $json['error'] = 2;
		    $json['message'] = $this->getText('invalid_email_message');
		}
		
		$this->response->setOutput(json_encode($json));
	}
	
	public function unsubscribe() {
		$this->load->model('newsletter/newsletter');
		$json = array();
		if ($this->validateEmail()) {
		    $newsletter = $this->model_newsletter_newsletter;
		    if ($newsletter->isSubscribed($this->request->post['email'])) {
		    	$newsletter->unsubscribe($this->request->post['email']);
		        $json['message'] = $this->getText('unsubscribe_message');
		    } else {
		        $json['message'] =  $this->getText('email_not_found');
		    }
		} else {
		    $json['message'] = $this->getText('invalid_email_message');
		}
		
		$this->response->setOutput(json_encode($json));
	}
	
	private function validateEmail() {
	    return isset($this->request->post['email']) && preg_match('/^[^\@]+@.*\.[a-z]{2,6}$/i', $this->request->post['email']);
	}
}
?>
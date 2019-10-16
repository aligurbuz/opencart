<?php  
/* 
Version: 1.0
Author: Artur SuÅkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModuleProductQuestions extends Controller {
	public function index($setting) {
        $data['module_id'] = $setting['module_id'];
        $data['contact_url'] = $this->url->link('extension/module/product_questions/contact', '', true);

        $this->load->language('information/contact');
        $data['entry_name'] = $this->language->get('entry_name');
        $data['entry_email'] = $this->language->get('entry_email');
        $data['entry_enquiry'] = $this->language->get('entry_enquiry');
        $data['button_submit'] = $this->language->get('button_submit');
        $data['text_message'] = $this->language->get('text_success');
		
		if(isset($setting['button_text'][$this->config->get('config_language_id')])) {
			$data['button_text'] = html_entity_decode($setting['button_text'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
		} else {
			$data['button_text'] = 'Request a qoute!';
		}
		if(isset($setting['block_title'][$this->config->get('config_language_id')])) {
			$data['block_title'] = html_entity_decode($setting['block_title'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
		} else {
			$data['block_title'] = 'Request a qoute!';
		}
		
		if (isset($this->request->get['product_id'])) {
			$data['product_id'] = (int)$this->request->get['product_id'];
		} else {
			$data['product_id'] = 0;
		}
		
		$data['icon'] = $setting['icon'];
		$data['icon_position'] = $setting['icon_position'];
        $data['url'] = $this->url->link('common/home', '', true);
        
		$status = false;
		if($setting['show_on_products_from'] == 'all') $status = true;
				
		if($setting['show_on_products_from'] == 'products') {
		     if (isset($this->request->get['product_id'])) {
		     	$product_id = (int)$this->request->get['product_id'];
		     } else {
		     	$product_id = 0;
		     }
		
		     $products = explode(',', $setting['products']);
		     foreach ($products as $product) {
		          if($product == $product_id) $status = true;
		     }
		}
		
		if($setting['show_on_products_from'] == 'categories') {
		     if (isset($this->request->get['product_id'])) {
		     	$product_id = (int)$this->request->get['product_id'];
		     } else {
		     	$product_id = 0;
		     }
		     
		     $this->load->model('catalog/products');
		     $category_id = $this->model_catalog_products->getCategoryId($product_id);
		     
		     $categories = explode(',', $setting['categories']);
		     foreach ($categories as $category) {
		          if($category == $category_id['category_id']) $status = true;
		     }
		}
		
		if($status) {
           return $this->load->view('extension/module/product_questions', $data);
        }
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

}
?>
<?php  
/* 
Version: 1.0
Author: Artur Sułkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModuleContact extends Controller {
	public function index() {
		$lang_id = $this->config->get('config_language_id');
		$setting = $this->config->get('contact_module');
		if(isset($setting[1]['html'][$lang_id])) {
			$data['text'] = html_entity_decode($setting[1]['html'][$lang_id], ENT_QUOTES, 'UTF-8');
		} else {
			$data['text'] = 'You must set text in the module Contact [age!';
		}

		if(isset($setting[1]['title'][$lang_id])) {
			$data['title'] = $setting[1]['title'][$lang_id];
		} else {
			$data['title'] = 'Contact us';
		}
		
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $data['title'],
			'href' => $this->url->link('extension/module/contact', '', true)
		);
      
        $data['heading_title'] = $data['title'];

        $this->document->setTitle($data['title']);
        
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('extension/module/contact', $data));
	}
}
?>
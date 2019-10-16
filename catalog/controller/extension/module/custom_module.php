<?php  
/* 
Version: 1.0
Author: Artur Sułkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModuleCustomModule extends Controller {
	public function index($setting) {
		if(isset($setting['html'][$this->config->get('config_language_id')])) {
			$data['text'] = html_entity_decode($setting['html'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
		} else {
			$data['text'] = 'You must set text in the module Custom Module!';
		}
		
		if(isset($setting['block_heading'][$this->config->get('config_language_id')])) {
			$data['block_heading'] = html_entity_decode($setting['block_heading'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
		} else {
			$data['block_heading'] = 'You must set block heading in the module Custom Module!';
		}
		
		if(isset($setting['block_content'][$this->config->get('config_language_id')])) {
			$data['block_content'] = html_entity_decode($setting['block_content'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
		} else {
			$data['block_content'] = 'You must set block content in the module Custom Module!';
		}
		
		$data['type'] = $setting['type'];
		$data['position'] = $setting['position'];
		
		return $this->load->view('extension/module/custom_module', $data);
	}
}
?>
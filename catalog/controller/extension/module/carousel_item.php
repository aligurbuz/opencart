<?php  
/* 
Version: 1.0
Author: Artur Sułkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModuleCarouselItem extends Controller {
	public function index($setting) {
		if(isset($setting['heading'][$this->config->get('config_language_id')])) {
			$data['block_heading'] = html_entity_decode($setting['heading'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
		} else {
			$data['block_heading'] = 'You must set block heading in the module Carousel Item!';
		}
		$data['carousel_item'] = array();
		$lang_id = $this->config->get('config_language_id');
		
		foreach($setting['items'] as $item) {
			if(isset($item[$lang_id]['html'])) {
				$data['carousel_item'][]['content'] = html_entity_decode($item[$lang_id]['html'], ENT_QUOTES, 'UTF-8');
			} else {
				$data['carousel_item'][]['content'] = 'You must set block content in the module Carousel Item!';
			}
		}
		
		return $this->load->view('extension/module/carousel_item', $data);
	}
}
?>
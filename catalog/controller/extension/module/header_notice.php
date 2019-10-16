<?php  
/* 
Version: 1.0
Author: Artur Sułkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModuleHeaderNotice extends Controller {
	public function index($setting) {
		if(isset($setting['html'][$this->config->get('config_language_id')])) {
			$data['text'] = html_entity_decode($setting['html'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
		} else {
			$data['text'] = 'You must set text in the module Custom Module!';
		}
		
		$data['background_color'] = $setting['background_color'];
		$data['text_color'] = $setting['text_color'];
		$data['text_link_hover_color'] = $setting['text_link_hover_color'];
		$data['close_button_background_color'] = $setting['close_button_background_color'];
		$data['close_button_text_color'] = $setting['close_button_text_color'];
		$data['close_button_hover_background_color'] = $setting['close_button_hover_background_color'];
		$data['close_button_hover_text_color'] = $setting['close_button_hover_text_color'];
		$data['show_only_once'] = $setting['show_only_once'];
		$data['disable_on_desktop'] = $setting['disable_on_desktop'];
		$data['disable_on_mobile'] = $setting['disable_on_mobile'];
		$data['position'] = $setting['position'];
		$data['id'] = rand(0, 5000)*rand(5000, 50000);
		
		return $this->load->view('extension/module/header_notice', $data);
	}
}
?>
<?php  
/* 
Version: 1.0
Author: Artur Sułkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModuleCookie extends Controller {
	public function index($setting) {
        
        // jeśli cookie zostało zaakceptowane, zwracamy false
        if(isset($_COOKIE['cookie-module-'.$setting['module_id'].'-accepted']) && $_COOKIE['cookie-module-'.$setting['module_id'].'-accepted'] == '1'){
            return false;
        }
        
		$data = array();
        
        $data['text_cookie'] = html_entity_decode($setting['text_cookie'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
        $data['text_button'] = html_entity_decode($setting['text_button'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
        
        if($data['text_cookie'] == '') $data['text_cookie'] = 'Set text cookie';
		if($data['text_button'] == '') $data['text_button'] = 'Accept';

		$data['module_id'] = $setting['module_id'];
		$data['border_color'] = $setting['border_color'];
		$data['text_color'] = $setting['text_color'];
		$data['background_color'] = $setting['background_color'];
		$data['background_image'] = $setting['background_image'];
		$data['background_image_position'] = $setting['background_image_position'];
		$data['background_image_repeat'] = $setting['background_image_repeat'];
		$data['display_position'] = $setting['display_position'];

		return $this->load->view('extension/module/cookie', $data);
	}
	
}
?>
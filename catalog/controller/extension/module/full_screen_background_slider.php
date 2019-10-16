<?php
/* 
Version: 1.0
Author: Artur Sułkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModuleFullScreenBackgroundSlider extends Controller {
	public function index($setting) {
		
		// Ładowanie modelu Full screen background slider
		$this->load->model('slider/full_screen_background_slider');

		// Pobranie slideru z modelu
		$data['slider'] = $this->model_slider_full_screen_background_slider->getSlider($setting['slider_id']);
		
		$data['language_id'] = $this->config->get('config_language_id');
		
		return $this->load->view('extension/module/full_screen_background_slider', $data);

	}
}
?>
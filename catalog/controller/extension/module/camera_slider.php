<?php
/* 
Version: 1.0
Author: Artur Sułkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModuleCameraSlider extends Controller {
	public function index($setting) {
		
		// Ładowanie modelu Camera slider
		$this->load->model('slider/camera_slider');

		// Pobranie slideru z modelu
		$data['slider'] = $this->model_slider_camera_slider->getSlider($setting['slider_id']);
		
		$data['language_id'] = $this->config->get('config_language_id');
		
		return $this->load->view('extension/module/camera_slider', $data);

	}
}
?>
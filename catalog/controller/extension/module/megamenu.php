<?php
/* 
Version: 1.0
Author: Artur Sułkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModuleMegamenu extends Controller {
	public function index($setting) {
		
		// Ładowanie modelu MegaMenu
		$this->load->model('menu/megamenu');
		
		// Module id
		if(isset($setting['module_id'])) {
			$module_id = $setting['module_id'];
		} else {
			$module_id = 0;
		}
		
		// Cache MegaMenu	
		if(!isset($setting['status_cache'])) $setting['status_cache'] = 0;	
		$file_cache = 'catalog/model/menu/cache/cache_' . $module_id . '_' . $this->config->get('config_language_id') . '.json';
		if($setting['status_cache'] == 1 && is_writable('catalog/model/menu/cache')) {
			$cache_life = $setting['cache_time']*3600;
			if(!file_exists($file_cache) or (time() - filemtime($file_cache) >= $cache_life)) {
				file_put_contents($file_cache, json_encode($this->model_menu_megamenu->getMenu($module_id)));
			}
			$data['menu'] = json_decode(file_get_contents($file_cache), true);
		} else {
			$data['menu'] = $this->model_menu_megamenu->getMenu($module_id);
		}
		
		// Pobranie ustawień
		$lang_id = $this->config->get('config_language_id');
		$data['ustawienia'] = array(
			'display_on_mobile' => $setting['display_on_mobile'],
			'orientation' => $setting['orientation'],
			'search_bar' => $setting['search_bar'],
			'navigation_text' => $setting['navigation_text'],
			'full_width' => $setting['full_width'],
			'home_item' => $setting['home_item'],
			'home_text' => $setting['home_text'],
			'animation' => $setting['animation'],
			'animation_time' => $setting['animation_time']
		);
		$data['navigation_text'] = 'Navigation';
		if(isset($setting['navigation_text'][$lang_id])) {
			if(!empty($setting['navigation_text'][$lang_id])) {
				$data['navigation_text'] = $setting['navigation_text'][$lang_id];
			}
		}
		$data['home_text'] = 'Home';
		if(isset($setting['home_text'][$lang_id])) {
			if(!empty($setting['home_text'][$lang_id])) {
				$data['home_text'] = $setting['home_text'][$lang_id];
			}
		}
		
		$data['home'] = $this->url->link('common/home');
		$data['lang_id'] = $this->config->get('config_language_id');
		
		// Search
		$this->language->load('common/header');
		$data['text_search'] = $this->language->get('text_search');
		if (isset($this->request->get['search'])) {
			$data['search'] = $this->request->get['search'];
		} else {
			$data['search'] = '';
		}
		
		
		return $this->load->view('extension/module/megamenu', $data);
	}
}
?>
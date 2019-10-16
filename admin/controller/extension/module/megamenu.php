<?php
/* 
Version: 1.0
Author: Artur SuÅkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModuleMegaMenu extends Controller {
	
	private $error = array(); 
	
	public function index() {  
	
		//Load the language file for this module
		$this->language->load('extension/module/megamenu');

		//Set the title from the language file $_['heading_title'] string
		$this->document->setTitle('MegaMenu'); 
		
		//Load the settings model. You can also add any other models you want to load here.
		$this->load->model('setting/setting');
		
		// Dodawanie plikÃ³w css i js do <head>
		$this->document->addStyle('view/stylesheet/megamenu.css');
		$this->document->addScript('view/javascript/jquery/jquery.nestable.js');
		
		// Åadowanie modelu megamenu
		$this->load->model('menu/megamenu');
		
		// Instalacja megamenu w bazie danych
		$this->model_menu_megamenu->install();
		
		// Multilanguage
		$this->load->model('localisation/language');
		$data['languages'] = $this->model_localisation_language->getLanguages();
		$data['language_id'] = 0;
		foreach($data['languages'] as $value) {
			if($value['code'] == $this->config->get('config_language')) {
				$data['language_id'] = $value['language_id'];
			}
		}
		
		$data['user_token'] = $this->session->data['user_token'];
		if(isset($_GET['edit'])) {
			$data['get_edit'] = $_GET['edit'];
		}

		// Multistore
		$data['stores'] = array();
		$this->load->model('setting/store');
		$results = $this->model_setting_store->getStores();
		
		$data['stores'][] = array(
			'name' => 'Default',
			'href' => '',
			'store_id' => 0
		);
			
		foreach ($results as $result) {
			$data['stores'][] = array(
				'name' => $result['name'],
				'href' => $result['url'],
				'store_id' => $result['store_id']
			);
		}	
		
		// Unlimited modules
		$data['active_module'] = 'Default';
		$data['active_module_id'] = 0;
		$data['megamenu_modules'] = array(
			array(
				'id' => 0,
				'name' => 'Default'
			)
		);
		
		foreach($this->model_menu_megamenu->getModules() as $module) {
			$data['megamenu_modules'][] = array(
				'id' => $module['id'],
				'name' => $module['name']
			);
		}
		
		// Aktywny moduł
		if(isset($_GET['module_id'])) {
			if($this->model_menu_megamenu->getModules($_GET['module_id'])) {
				$data['active_module_info'] = $this->model_menu_megamenu->getModules($_GET['module_id']);
				$data['active_module'] = $data['active_module_info'][0]['name'];
				$data['active_module_id'] = $data['active_module_info'][0]['id'];
			}
		}
		
		// Dodawanie modułu
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if(isset($_POST['add-module'])){
				if($this->model_menu_megamenu->addModule($this->request->post)) {
					$this->session->data['success'] = $this->language->get('text_success');
				} else {
					$this->session->data['error_warning'] = $this->language->get('text_warning');
				}
				
				$this->response->redirect($this->url->link('extension/module/megamenu', 'user_token=' . $this->session->data['user_token'], true));
		    }
		}
		
		// Usuwanie modułu
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if(isset($_POST['delete-module'])){
				if($this->model_menu_megamenu->deleteModule($this->request->post)) {
					$megamenu = array();
					if($this->config->get('megamenu_module')) {
						foreach($data['megamenu_modules'] as $module) {
							if($module['id'] != $this->request->post['megamenu_modules']) {
								$module_id = $module['id'];
								$megamenu_module = $this->config->get('megamenu_module');
								if(isset($megamenu_module[$module_id])) $megamenu['megamenu_module'][$module_id] = $megamenu_module[$module_id];
							}
						}
						$this->model_setting_setting->editSetting('megamenu', $megamenu);
					}
					$this->session->data['success'] = $this->language->get('text_success');
				} else {
					$this->session->data['error_warning'] = $this->language->get('text_warning');
				}
				
				$this->response->redirect($this->url->link('extension/module/megamenu', 'user_token=' . $this->session->data['user_token'], true));
		    }
		}
		
		// Aktywacja modułu
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if(isset($_POST['active-module'])){
				if($this->request->post['megamenu_modules'] == 0) $this->response->redirect($this->url->link('extension/module/megamenu', 'user_token=' . $this->session->data['user_token'], true));
				$this->response->redirect($this->url->link('extension/module/megamenu&module_id=' . $this->request->post['megamenu_modules'], 'user_token=' . $this->session->data['user_token'], true));
		    }
		}
		
		// Generowanie linku w przypadku gdy edytujemy inny moduł niż Default
		$url = false;
		if($data['active_module_id'] != 0) $url = '&module_id=' . $data['active_module_id'];
		
		// Usuwanie menu
		if(isset($_GET['delete'])) {
			if($this->validate()){
				if($this->model_menu_megamenu->deleteMenu(intval($_GET['delete']))) {
					$this->session->data['success'] = 'This menu has been properly removed from the database.';
				} else {
					$this->session->data['error_warning'] = $this->model_menu_megamenu->displayError();
				}
			} else {
				$this->session->data['error_warning'] = $this->language->get('error_permission');
			}
			
			$this->response->redirect($this->url->link('extension/module/megamenu' . $url, 'user_token=' . $this->session->data['user_token'], true));
		}
		
		// Dodawanie menu
		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
			if(isset($_POST['button-create'])) {
				if($this->validate()) {
					$error = false;
					$lang_id = $data['language_id'];
					if($this->request->post['name'][$lang_id] == '') $error = true;
					if($error == true) {
						$this->session->data['error_warning'] = $this->language->get('text_warning');
					} else {
						$this->model_menu_megamenu->addMenu($this->request->post, $data['active_module_id']);
						$this->session->data['success'] = $this->language->get('text_success');
					}
				} else {
					$this->session->data['error_warning'] = $this->language->get('error_permission');
				}
				
				$this->response->redirect($this->url->link('extension/module/megamenu' . $url, 'user_token=' . $this->session->data['user_token'], true));
			}
		}
		
		// Zapisywanie menu
		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
			if(isset($_POST['button-edit'])) {
				if($this->validate()) {
					$error = false;
					$lang_id = $data['language_id'];
					if($this->request->post['name'][$lang_id] == '') $error = true;
					if($error == true) {
						$this->session->data['error_warning'] = $this->language->get('text_warning');
					} else {
						$this->model_menu_megamenu->saveMenu($this->request->post, $data['active_module_id']);
						$this->session->data['success'] = $this->language->get('text_success');
					}
				} else {
					$this->session->data['error_warning'] = $this->language->get('error_permission');
				}
				
				$this->response->redirect($this->url->link('extension/module/megamenu' . $url, 'user_token=' . $this->session->data['user_token'], true));
			}
		}
		
		// Generowanie menu z lewej strony
		$data['nestable_list'] = $this->model_menu_megamenu->generate_nestable_list($data['language_id'], $data['active_module_id']);
				
		// Zapisywanie ustawień
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if(isset($_POST['button-save'])){
				$megamenu = array();
				if($this->config->get('megamenu_module')) {
					foreach($data['megamenu_modules'] as $module) {
						$module_id = $module['id'];
						$megamenu_module = $this->config->get('megamenu_module');
						if(isset($megamenu_module[$module_id])) $megamenu['megamenu_module'][$module_id] = $megamenu_module[$module_id];
					}
				}
				
				if(isset($this->request->post['search_bar'])) {
					$search_bar = 1;
				} else {
					$search_bar = 0;
				}
				if(!isset($this->request->post['layout_id'])) $this->request->post['layout_id'] = 100;
				if(!isset($this->request->post['position'])) $this->request->post['position'] = 'menu';
				if(!isset($this->request->post['status'])) $this->request->post['status'] = 1;
				if(!isset($this->request->post['display_on_mobile'])) $this->request->post['display_on_mobile'] = 1;
				if(!isset($this->request->post['sort_order'])) $this->request->post['layout_id'] = 0;
				if(!isset($this->request->post['orientation'])) $this->request->post['orientation'] = 0;
				if(!isset($this->request->post['navigation_text'])) $this->request->post['navigation_text'] = 0;
				if(!isset($this->request->post['home_text'])) $this->request->post['home_text'] = 0;
				if(!isset($this->request->post['full_width'])) $this->request->post['full_width'] = 0;
				if(!isset($this->request->post['home_item'])) $this->request->post['home_item'] = 0;
				if(!isset($this->request->post['animation'])) $this->request->post['animation'] = 'slide';
				if(!isset($this->request->post['animation_time'])) $this->request->post['animation_time'] = 500;
				if(!isset($this->request->post['status_cache'])) $this->request->post['status_cache'] = 0;
				if(!isset($this->request->post['cache_time'])) $this->request->post['cache_time'] = 1;
				$module_id = $data['active_module_id'];
				$megamenu['megamenu_module'][$module_id] = array(
					'module_id'  => $module_id,
					'layout_id'  => $this->request->post['layout_id'],
					'position'   => $this->request->post['position'],
					'status'     => $this->request->post['status'],
					'display_on_mobile'     => $this->request->post['display_on_mobile'],
					'sort_order' => intval($this->request->post['sort_order']),
					'orientation' =>  $this->request->post['orientation'],
					'search_bar' => $search_bar,
					'navigation_text' => $this->request->post['navigation_text'],
					'home_text'  => $this->request->post['home_text'],
					'full_width' => $this->request->post['full_width'],
					'home_item'  => $this->request->post['home_item'],
					'animation'  => $this->request->post['animation'],
					'animation_time'  => intval($this->request->post['animation_time']),
					'status_cache'  => intval($this->request->post['status_cache']),
					'cache_time'  => intval($this->request->post['cache_time'])
				);
				$this->model_setting_setting->editSetting('megamenu', $megamenu);
				$this->session->data['success'] = $this->language->get('text_success');
				
				$this->response->redirect($this->url->link('extension/module/megamenu' . $url, 'user_token=' . $this->session->data['user_token'], true));
			}
		}
		
		// Zapisywanie kolejnoÅci linkÃ³w
		if (isset($_POST['jsonstring'])) {
			if($this->validate()){
				$jsonstring = $_POST['jsonstring'];
				$jsonDecoded = json_decode(html_entity_decode($jsonstring));
				
				function parseJsonArray($jsonArray, $parentID = 0) {
					$return = array();
					foreach ($jsonArray as $subArray) {
						$returnSubSubArray = array();
						if (isset($subArray->children)) {
							$returnSubSubArray = parseJsonArray($subArray->children, $subArray->id);
						}
						$return[] = array('id' => $subArray->id, 'parentID' => $parentID);
						$return = array_merge($return, $returnSubSubArray);
					}
				
					return $return;
				}
				
				
				$readbleArray = parseJsonArray($jsonDecoded);
								
				foreach ($readbleArray as $key => $value) {
					if (is_array($value)) {
						$this->model_menu_megamenu->save_rang($value['parentID'], $value['id'], $key, $data['active_module_id']);
					}	
				}

				die("The list was updated ".date("y-m-d H:i:s")."!");
				
			} else {
				die($this->language->get('error_permission'));
			}
		}
		
		// Pobranie ustawień
		$ustawienia = $this->config->get('megamenu_module');
		
		if(isset($ustawienia[$data['active_module_id']])) {
			$data['layout_id'] = $ustawienia[$data['active_module_id']]['layout_id'];
			$data['status'] = $ustawienia[$data['active_module_id']]['status'];
			$data['display_on_mobile'] = 0;
			if(isset($ustawienia[$data['active_module_id']]['display_on_mobile'])) $data['display_on_mobile'] = $ustawienia[$data['active_module_id']]['display_on_mobile'];
			$data['position'] = $ustawienia[$data['active_module_id']]['position'];
			$data['orientation'] = $ustawienia[$data['active_module_id']]['orientation'];
			$data['search_bar'] = $ustawienia[$data['active_module_id']]['search_bar'];
			$data['sort_order'] = $ustawienia[$data['active_module_id']]['sort_order'];
			$data['navigation_text'] = $ustawienia[$data['active_module_id']]['navigation_text'];
			$data['home_text'] = $ustawienia[$data['active_module_id']]['home_text'];
			$data['full_width'] = $ustawienia[$data['active_module_id']]['full_width'];
			$data['home_item'] = $ustawienia[$data['active_module_id']]['home_item'];
			$data['animation'] = $ustawienia[$data['active_module_id']]['animation'];
			$data['animation_time'] = $ustawienia[$data['active_module_id']]['animation_time'];
			if(isset($ustawienia[$data['active_module_id']]['status_cache'])) {
				$data['status_cache'] = $ustawienia[$data['active_module_id']]['status_cache'];
				$data['cache_time'] = $ustawienia[$data['active_module_id']]['cache_time'];
			} else {
				$data['status_cache'] = '0';
				$data['cache_time'] = '1';
			}
		} else {
			$data['layout_id'] = 100;
			$data['status'] = 1;
			$data['display_on_mobile'] = 0;
			$data['orientation'] = 0;
			$data['position'] = 'menu';   
			$data['search_bar'] = 0;
			$data['sort_order'] = 0;
			$data['full_width'] = 0;
			$data['home_item'] = 'icon';
			$data['animation'] = 'slide';
			$data['animation_time'] = '500';
			$data['status_cache'] = '0';
			$data['cache_time'] = '1';
		}
		
		// Dodawanie menu
		$data['action_type'] = 'basic';
		if(isset($_GET['action'])) {
			if($_GET['action'] == 'create') {
				$data['action_type'] = 'create';
				$data['name'] = '';
				$data['description'] = '';
				$data['label'] = '';
				$data['label_text_color'] = '';
				$data['label_background_color'] = '';
				$data['custom_class'] = '';
				$data['icon'] = '';
				$data['link'] = '';
				$data['new_window'] = '';
				$data['status'] = '';
				$data['display_on_mobile'] = '';
				$data['position'] = '';
				$data['submenu_width'] = '100%';
				$data['display_submenu'] = '';
				$data['submenu_background'] = '';
				$data['submenu_background_position'] = '';
				$data['submenu_background_repeat'] = '';
				$data['content_width'] = '4';
				$data['content_type'] = '0';
				$data['content'] = array(
					'html' => array(
							'text' => array()
						),
					'product' => array(
							'id' => '',
							'name' => '',
							'width' => '400',
							'height' => '400'
						),
					'categories' => array(
							'categories' => array(),
							'columns' => '',
							'submenu' => '',
							'submenu_columns' => '',
							'image_position' => '',
							'image_width' => '',
							'image_height' => ''
						),
					'products' => array(
							'products' => array(),
							'columns' => '',
							'image_position' => '',
							'image_width' => '',
							'image_height' => ''
						),
				);
				$data['list_categories'] = false;
				$data['list_products'] = false;
			}
		}
		
		// Edycja menu
		if(isset($_GET['edit'])) {
			$data['action_type'] = 'edit';
			$dane = $this->model_menu_megamenu->getMenu(intval($_GET['edit']));
			if($dane) {
				$data['name'] = $dane['name'];
				$data['description'] = $dane['description'];
				if(isset($dane['label'])) $data['label'] = $dane['label'];
				if(isset($dane['label_text_color'])) $data['label_text_color'] = $dane['label_text_color'];
				if(isset($dane['label_background_color'])) $data['label_background_color'] = $dane['label_background_color'];
				if(isset($dane['custom_class'])) $data['custom_class'] = $dane['custom_class'];
				$data['icon'] = $dane['icon'];
				$data['link'] = $dane['link'];
				$data['new_window'] = $dane['new_window'];
				$data['status'] = $dane['status'];
				$data['display_on_mobile'] = $dane['display_on_mobile'];
				$data['position'] = $dane['position'];
				$data['submenu_width'] = $dane['submenu_width'];
				$data['display_submenu'] = $dane['display_submenu'];
				$data['submenu_background'] = $dane['submenu_background'];
				$data['submenu_background_position'] = $dane['submenu_background_position'];
				$data['submenu_background_repeat'] = $dane['submenu_background_repeat'];
				$data['content_width'] = $dane['content_width'];
				$data['content_type'] = $dane['content_type'];
				$data['content'] = $dane['content'];
				$data['list_categories'] = $this->model_menu_megamenu->getCategories($dane['content']['categories']['categories']);
				$data['list_products'] = false;
				if(isset($dane['content']['products']['products'])) if(is_array($dane['content']['products']['products'])) $data['list_products'] = $this->model_menu_megamenu->getCategories($dane['content']['products']['products']);
			} else {
				$this->session->data['error_warning'] = 'This menu does not exist!';
				$this->response->redirect($this->url->link('extension/module/megamenu' . $url, 'user_token=' . $this->session->data['user_token'], true));
			}
		}
		
		// Layouts
		$this->load->model('design/layout');
		$data['layouts'] = $this->model_design_layout->getLayouts();
		
		//This creates an error message. The error['warning'] variable is set by the call to function validate() in this controller (below)
		if (isset($this->session->data['error_warning'])) {
			$data['error_warning'] = $this->session->data['error_warning'];
			unset($this->session->data['error_warning']);
		} else {
			$data['error_warning'] = '';
		}
		
		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
		    unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}
		
		$data['action'] = $this->url->link('extension/module/megamenu' . $url, 'user_token=' . $this->session->data['user_token'], true);
		
		$data['breadcrumbs'] = array();
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => 'Modules',
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['breadcrumbs'][] = array(
			'text' => 'MegaMenu',
			'href' => $this->url->link('extension/module/megamenu', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		// No image
		$this->load->model('tool/image');
		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);
				
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
				
		$this->response->setOutput($this->load->view('extension/module/megamenu', $data));
	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/megamenu')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}	
	}
	
	public function autocomplete() {
		$json = array();

		if (isset($this->request->get['filter_name'])) {
			$this->load->model('menu/megamenu');
			$results = $this->model_menu_megamenu->getLinks($this->request->get['filter_name']);

			foreach ($results as $result) {
				$json[] = array(
					'id'   => $result['id'],
					'name' => strip_tags(html_entity_decode($result['name_for_autocomplete'], ENT_QUOTES, 'UTF-8'))
				);
			}
		}

		$sort_order = array();

		foreach ($json as $key => $value) {
			$sort_order[$key] = $value['name'];
		}

		array_multisort($sort_order, SORT_ASC, $json);

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}

?>
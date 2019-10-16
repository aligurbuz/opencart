<?php
/* 
Version: 1.0
Author: Artur Sułkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModuleAdvancedGrid extends Controller {
	private $error = array(); 
	 
	public function index() {   
		$this->language->load('extension/module/advanced_grid');

		$this->document->setTitle('Advanced Grid');
		
		$this->load->model('setting/setting');
		$this->load->model('catalog/product');
		$this->load->model('catalog/category');
		
		// Dodawanie plików css i js do <head>
		$this->document->addStyle('view/stylesheet/advanced_grid.css');
		
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
		
		// Zapisywanie modułu		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('advanced_grid', $this->request->post);		
			
			$this->session->data['success'] = $this->language->get('text_success');
						
			$this->response->redirect($this->url->link('extension/module/advanced_grid', 'user_token=' . $this->session->data['user_token'], true));
		}
		
		// Wyświetlanie powiadomień
 		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
		    unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}
		
		$data['action'] = $this->url->link('extension/module/advanced_grid', 'user_token=' . $this->session->data['user_token'], true);
				
		$data['user_token'] = $this->session->data['user_token'];
	
		// Ładowanie listy modułów
		$data['modules'] = array();
		
		if (isset($this->request->post['advanced_grid_module'])) {
			$data['modules'] = $this->request->post['advanced_grid_module'];
		} elseif ($this->config->get('advanced_grid_module')) { 
			$data['modules'] = $this->config->get('advanced_grid_module');
		}	
				
		$data['load_modules'] = array();
		$this->load->model('setting/extension');
		// Get a list of installed modules
		$extensions = $this->model_setting_extension->getInstalled('module');

		// Add all the modules which have multiple settings for each module
		foreach ($extensions as $code) {
			$this->load->language('extension/module/' . $code);
		
			$i = 1;
			
			$module_data = array();
			
			if ($this->config->has($code . '_module')) {
				$modules = $this->config->get($code . '_module');
				
				foreach (array_keys($modules) as $key) {
					$module_data[] = array(
						'name' => $this->language->get('heading_title') . ' ' . $i++,
						'code' => $code . '.' . $key
					);
				}
			} else {
				$module_data[] = array(
					'name' => $this->language->get('heading_title'),
					'code' => $code
				);
			}
			
			if ($module_data) {
				$data['load_modules'][] = array(
					'name'   => str_replace('</b>', '', str_replace('<b>', '', $this->language->get('heading_title'))),
					'module' => $module_data
				);
			}
		}
		
		// Ładowanie templatek modułów
		$data['latest_blogs_templates'] = array();
		$data['links_templates'] = array();
		$data['newsletter_templates'] = array();
		$data['products_templates'] = array();
		$data['products_tabs_templates'] = array();
		
		$data['templates'] = array();

		$directories = glob(DIR_CATALOG . 'view/theme/*', GLOB_ONLYDIR);

		foreach ($directories as $directory) {
		     $directory = basename($directory);
			$data['templates'][] = $directory;
			$files_latest_blogs = glob(DIR_CATALOG . 'view/theme/' . $directory . '/template/extension/module/advanced_grid/latest_blogs/*');
			$files_links = glob(DIR_CATALOG . 'view/theme/' . $directory . '/template/extension/module/advanced_grid/links/*');
			$files_newsletter = glob(DIR_CATALOG . 'view/theme/' . $directory . '/template/extension/module/advanced_grid/newsletter/*');
			$files_products = glob(DIR_CATALOG . 'view/theme/' . $directory . '/template/extension/module/advanced_grid/products/*');
			$files_products_tabs = glob(DIR_CATALOG . 'view/theme/' . $directory . '/template/extension/module/advanced_grid/products_tabs/*');
			if(!empty($files_latest_blogs)) {
			     $data['latest_blogs_templates'][$directory] = array();
			     foreach ($files_latest_blogs as $file_latest_blogs) {
			          $data['latest_blogs_templates'][$directory][] = basename($file_latest_blogs);
			     }
			}
			
			if(!empty($files_links)) {
			     $data['links_templates'][$directory] = array();
			     foreach ($files_links as $file_links) {
			          $data['links_templates'][$directory][] = basename($file_links);
			     }
			}
			
			if(!empty($files_newsletter)) {
			     $data['newsletter_templates'][$directory] = array();
			     foreach ($files_newsletter as $file_newsletter) {
			          $data['newsletter_templates'][$directory][] = basename($file_newsletter);
			     }
			}
			
			if(!empty($files_products)) {
			     $data['products_templates'][$directory] = array();
			     foreach ($files_products as $file_products) {
			          $data['products_templates'][$directory][] = basename($file_products);
			     }
			}
			
			if(!empty($files_products_tabs)) {
			     $data['products_tabs_templates'][$directory] = array();
			     foreach ($files_products_tabs as $file_products_tabs) {
			          $data['products_tabs_templates'][$directory][] = basename($file_products_tabs);
			     }
			}
		}
          
		// Layouts		
		$this->load->model('design/layout');
		$data['layouts'] = $this->model_design_layout->getLayouts();
		
		// Languages
		$this->load->model('localisation/language');
		$data['languages'] = $this->model_localisation_language->getLanguages();
		
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
			'text' => 'Advanced Grid',
			'href' => $this->url->link('extension/module/advanced_grid', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		// No image
		$this->load->model('tool/image');
		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);
				
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
				
		$this->response->setOutput($this->load->view('extension/module/advanced_grid', $data));
	}
	
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/advanced_grid')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
}
?>
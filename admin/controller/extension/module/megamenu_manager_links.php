<?php
/* 
Version: 1.0
Author: Artur SuÅkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModuleMegaMenuManagerLinks extends Controller {
	
	private $error = array(); 
	
	public function link() {
		$this->language->load('extension/module/megamenu_manager_links');
		
		$this->document->setTitle('MegaMenu Manager Links');
		
		// Dodawanie plikÃ³w css i js do <head>
		$this->document->addStyle('view/stylesheet/megamenu_manager_links.css');
		
		// Åadowanie modelu MegaMenu
		$this->load->model('menu/megamenu');
		
		// Pobieranie ustawień linku
		if(isset($_GET['link_id'])) {
			$data = $this->model_menu_megamenu->getDataLink(intval($_GET['link_id']));
			if($data == false) { 
				$this->response->redirect($this->url->link('extension/module/megamenu_manager_links', 'user_token=' . $this->session->data['user_token'], true));
			}
			$data['name'] = $data['name'];
			$data['url'] = $data['url'];
			$data['label'] = $data['label'];
			$data['label_text'] = $data['label_text'];
			$data['label_background'] = $data['label_background'];
			$data['image'] = $data['image'];
			$data['link_id'] = $_GET['link_id'];
		} else {
			$data['name'] = false;
			$data['url'] = false;
			$data['label'] = false;
			$data['label_text'] = false;
			$data['label_background'] = false;
			$data['image'] = false;
		}
		
		// Multilanguage
		$this->load->model('localisation/language');
		$data['languages'] = $this->model_localisation_language->getLanguages();
		$data['language_id'] = 0;
		foreach($data['languages'] as $value) {
			if($value['code'] == $this->config->get('config_language')) {
				$data['language_id'] = $value['language_id'];
			}
		}
		
		// Dodawanie linku
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if(isset($_POST['button-add'])) {
				if($this->model_menu_megamenu->addLink($this->request->post, $data['language_id'])) {
					$this->session->data['success'] = $this->language->get('text_success');
				} else {
					$this->session->data['error_warning'] = $this->model_menu_megamenu->displayError();
				}
				$this->response->redirect($this->url->link('extension/module/megamenu_manager_links', 'user_token=' . $this->session->data['user_token'], true));
			}
		}
		
		// Zapisywanie linku
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if(isset($_POST['button-save'])) {
				if($this->model_menu_megamenu->saveLink($this->request->post, $data['language_id'])) {
					$this->session->data['success'] = $this->language->get('text_success');
				} else {
					$this->session->data['error_warning'] = $this->model_menu_megamenu->displayError();
				}
				$this->response->redirect($this->url->link('extension/module/megamenu_manager_links', 'user_token=' . $this->session->data['user_token'], true));
			}
		}
		
		// Usuwanie linku
		if(isset($_GET['link_id']) && isset($_GET['delete'])) {
			if($this->validate()){
				if($this->model_menu_megamenu->deleteLink(intval($_GET['link_id']))) {
					$this->session->data['success'] = 'This link has been properly removed from the database.';
				} else {
					$this->session->data['error_warning'] = $this->model_menu_megamenu->displayError();
				}
			} else {
				$this->session->data['error_warning'] = $this->language->get('error_permission');
			}
			$this->response->redirect($this->url->link('extension/module/megamenu_manager_links', 'user_token=' . $this->session->data['user_token'], true));
		}
		
		// WyÅwietlanie powiadomieÅ
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		if (isset($this->session->data['error_warning'])) {
			$data['error_warning'] = $this->session->data['error_warning'];
		    unset($this->session->data['error_warning']);
		}
		
		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
		    unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}
		
		$data['action'] = $this->url->link('extension/module/megamenu_manager_links/link', 'user_token=' . $this->session->data['user_token'], true);
		$data['user_token'] = $this->session->data['user_token'];
		
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
			'text' => 'MegaMenu Manager Links',
			'href' => $this->url->link('extension/module/megamenu_manager_links', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		// No image
		$this->load->model('tool/image');
		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/megamenu_manager_links_edit', $data));
		
	}
	
	public function index() {  
		//Load the language file for this module
		$this->language->load('extension/module/megamenu_manager_links');

		//Set the title from the language file $_['heading_title'] string
		$this->document->setTitle('MegaMenu Manager Links'); 
		
		//Load the settings model. You can also add any other models you want to load here.
		$this->load->model('setting/setting');
		
		// Dodawanie plikÃ³w css i js do <head>
		$this->document->addStyle('view/stylesheet/megamenu_manager_links.css');
		
		// Åadowanie modelu megamenu_manager_links
		$this->load->model('menu/megamenu');
		
		// Instalacja megamenu_manager_links w bazie danych
		$this->model_menu_megamenu->install();
		
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
		
		$data['links'] = $this->model_menu_megamenu->getLinks(false);
		$data['link_url'] = $this->url->link('extension/module/megamenu_manager_links/link', 'user_token=' . $this->session->data['user_token'], true);	
		
		$data['action'] = $this->url->link('extension/module/megamenu_manager_links', 'user_token=' . $this->session->data['user_token'], true);
		
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
			'text' => 'MegaMenu Manager Links',
			'href' => $this->url->link('extension/module/megamenu_manager_links', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
				
		$this->response->setOutput($this->load->view('extension/module/megamenu_manager_links', $data));
	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/megamenu_manager_links')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}	
	}
}

?>
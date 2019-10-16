<?php
/* 
Version: 1.0
Author: Artur SuÅkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModuleFaq extends Controller {
	private $error = array(); 
	 
	public function index() {   
		$this->language->load('extension/module/faq');

		$this->document->setTitle('FAQ');
		
		$this->load->model('setting/setting');
				
		// Dodawanie plikÃ³w css i js do <head>
		$this->document->addStyle('view/stylesheet/faq.css');
        
		
		// Zapisywanie moduÅu		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            
            //nadawanie ID nowym skecjom
            if(!empty($this->request->post['faq_module']['sections'])){
                foreach($this->request->post['faq_module']['sections'] as &$section){
                    if(!isset($section['id']) || !$section['id']){
                        $section['id'] = uniqid();
                    }
                }
            }
            
			$this->model_setting_setting->editSetting('faq', $this->request->post);		
			
			$this->session->data['success'] = $this->language->get('text_success');
			
			$this->response->redirect($this->url->link('extension/module/faq', 'user_token=' . $this->session->data['user_token'], true));			
		}
		
		// WyÅwietlanie powiadomieÅ
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
		
		$data['action'] = $this->url->link('extension/module/faq', 'user_token=' . $this->session->data['user_token'], true);
			
        $front_url = new Url(HTTP_CATALOG, $this->config->get('config_secure') ? HTTP_CATALOG : HTTPS_CATALOG);
        $data['front_url'] = $front_url->link('extension/module/faq');
        
		$data['user_token'] = $this->session->data['user_token'];
	
		if (isset($this->request->post['faq_module'])) {
			$data['module'] = $this->request->post['faq_module'];
		} elseif ($this->config->get('faq_module')) { 
			$data['module'] = $this->config->get('faq_module');
		}	
        
        if(isset($data['module']['sections']) && !empty($data['module']['sections'])){
            $this->sortData($data['module']['sections'], 'order');
        }
        if(isset($data['module']['items']) && !empty($data['module']['items'])){
            $this->sortData($data['module']['items'], 'order');
        }
		
		
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
			'text' => 'FAQ',
			'href' => $this->url->link('extension/module/faq', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        $data['current_lang_id'] = $this->config->get('config_language_id');
				
		$this->response->setOutput($this->load->view('extension/module/faq', $data));
	}
	
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/faq')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
        // Languages
		$this->load->model('localisation/language');
        $languages = $this->model_localisation_language->getLanguages();
        
        if(!empty($this->request->post['faq_module']['sections'])){
            foreach($this->request->post['faq_module']['sections'] as $section){
                foreach($languages as $lang){
                    if(trim($section['title'][$lang['language_id']]) == ''){
                        $this->error['warning'] = "Section title cannot be empty"; 
                    }
                }
            }
        }
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
    
    function sortData(&$data, $col)
    {
        usort($data, function($a, $b) use ($col){
            if ($a[$col] == $b[$col]) {
                return 0;
            }
            return ($a[$col] < $b[$col]) ? -1 : 1;
        });
    }
}
?>
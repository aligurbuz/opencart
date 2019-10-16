<?php
/* 
Template Name: wokiee
Version: 1.0
Author: Artur Sulkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModuleWokiee extends Controller {
	
	private $error = array(); 
	
	public function index() {   
	
		//Load the language file for this module
		$this->language->load('extension/module/wokiee');

		//Set the title from the language file $_['heading_title'] string
		$this->document->setTitle('Wokiee Theme Options');
		
		//Load the settings model. You can also add any other models you want to load here.
		$this->load->model('setting/setting');
		
		// Multilanguage
		$this->load->model('localisation/language');
		$data['languages'] = $this->model_localisation_language->getLanguages();
		
		/* Konfiguracja kolorow */
		$data['colors_data'] = array(
			array(
				'name' => 'Body',
				'content' => array(
					array(
						'name' => 'Main color',
						'id'   => 'main_color'
					)
				)
			)
		);
		
		foreach ($data['colors_data'] as $colors) {
			foreach($colors['content'] as $color) {
				$data[$color['id']] = false;
			}
		}
		
		// Konfiguracja zmiennych
		$config_data = array(
			'page_direction',
			'layout_type',
						
			'add_to_compare_text',
			'add_to_wishlist_text',
			'checkout_text',
			'continue_shopping_text',
			'confirmation_text',
			'shopping_cart_text',
			'home_text',
			'welcome_text',
			'more_details_text',
			'quickview_text',
			'sale_text',
			'our_brands_text',
			'limited_time_offer_text',
			'new_text',
			'new_products_label_limit',
			'yrs_text',
			'mths_text',
			'wk_text',
			'day_text',
			'hrs_text',
			'min_text',
			'sec_text',
			'close_text',
			'back_text',
			'view_all_products_text',
			'what_are_you_looking_for_text',
			'added_to_cart_text',
			'qty_text',
			'total_text',
			'there_are_one_items_in_your_cart_text',
			'continue_shopping_text',
			'view_cart_text',
			'proceed_to_checkout_text',
			'settings_text',
			'compare_text',
			'filter_text',
			'back_to_top_text',
			
			'header_type',
			
			'product_per_pow',
			'product_scroll_latest',
			'product_scroll_featured',
			'product_scroll_bestsellers',
			'product_scroll_specials',
			'product_scroll_related',
			'quick_view',
			'display_text_sale',
			'type_sale',
			'display_text_new',
			'product_image_effect',
			'display_add_to_compare',
			'display_add_to_wishlist',
			'display_add_to_cart',
			'display_specials_countdown',

			'refine_search_style',
			'refine_image_width',
			'refine_image_height',
			'refine_search_number',
			'product_type',
			'product_social_share',
			'product_related_status',
			'product_page_radio_style',
			'product_page_radio_image_width',
			'product_page_radio_image_height',
			'product_page_checkbox_style',
			
			'custom_block',
			
			'product_grid_type',
			
			'footer_colors',
			'load_styles',
			'colors_status',
			
			'product_image_zoom',
			
			'custom_code_css_status',
			'custom_code_css',
			'custom_code_javascript_status',
			'custom_code_js',
						
			'select_demo'
		);
		
		foreach ($config_data as $conf) {
			$data[$conf] = false;
		}

		// Funkcja do usuwania katalogu
		function removeDir($path) { 
			$dir = new DirectoryIterator($path); 
			foreach ($dir as $fileinfo) { 
				if ($fileinfo->isFile() || $fileinfo->isLink()) { 
					unlink($fileinfo->getPathName()); 
				} elseif (!$fileinfo->isDot() && $fileinfo->isDir()) { 
					removeDir($fileinfo->getPathName()); 
				} 
			} 
			rmdir($path); 
		}
		
  		// wokiee MUTLI STORE
  		
			if (isset($this->request->post['store_id'])) {
				$data['store_id'] = $this->request->post['store_id'];
			} else {
				$data['store_id'] = $this->config->get('d_store_id');
			}

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
			
			
			if(isset($_GET['store_id'])) {
				$data['store_id'] = $_GET['store_id'];
			} else {
				if (isset($_GET['submit'])) {
					$data['store_id'] = $data['store_id'];
				} else {
					if (isset($this->request->post['store_id'])) {
						$data['store_id'] = $this->request->post['store_id'];
					} else {
						$data['store_id'] = 0;
					}
				}
			}
			
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
				$data['array'] = array(
					'd_store_id' => $this->request->post['store_id']
				);
				$this->model_setting_setting->editSetting('d_id_store', $data['array']);	
			}
			
		// END MULTISTORE
		
		// Pobieranie informacji, ktora skorka jest wlaczona	
		$data['setting_skin'] = $this->model_setting_setting->getSetting('wokiee_skin', $data['store_id']);
		
		// Nadanie nazw sklepom 
		if($data['store_id'] == 0) {
			$data['edit_skin_store'] = 'default';
		} else {
			$data['edit_skin_store'] = $data['store_id'];
		}
		
		// Aktywna skorka
		if(isset($data['setting_skin']['wokiee_skin'])) {
			$data['active_skin'] = $data['setting_skin']['wokiee_skin'];
		} else {
			$data['active_skin'] = 'default';
		}
		
		if(!file_exists(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$data['active_skin'].'')) {
			$data['active_skin'] = false;
		}
		
		// Tworzenie listy skorek
		if(file_exists(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/')) {
			$data['skins'] = array();
			$dir = opendir(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/');
			while(false !== ($file = readdir($dir))) {
				if(is_dir(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$file) && $file != '.' && $file != '..')  {
					$data['skins'][] = $file;
				}
			}
			sort($data['skins']);
		}
		
		// Edycja skorki - sprawdzanie jaki szablon jest edytowany
		if(isset($data['setting_skin']['wokiee_skin'])) {
			$data['active_skin_edit'] = $data['setting_skin']['wokiee_skin'];
		} else {
			$data['active_skin_edit'] = 'default';
		}
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if(isset($_POST['button-edit']) || isset($_POST['button-delete'])){
				$data['active_skin_edit'] = $this->request->post['skin'];
			}
		}
		
		if(isset($this->request->post['save_skin']) && !isset($_POST['button-edit']) && !isset($_POST['button-delete'])) {
			$data['active_skin_edit'] = $this->request->post['save_skin'];
		}
		
		if(isset($_GET['skin_edit'])) {
			$data['active_skin_edit'] = $_GET['skin_edit'];
		}
			
		// Zmiana skorki
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if(isset($_POST['button-active'])){
				$save_wokiee_skin = array(
					'wokiee_skin' => $this->request->post['skin']
				);
				$this->model_setting_setting->editSetting('wokiee_skin', $save_wokiee_skin, $this->request->post['store_id']);	
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('extension/module/wokiee&submit=true&store_id=' . $data['store_id'] . '', 'user_token=' . $this->session->data['user_token'], true));
            }
		}
		
		// Dodawanie skorki
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if(isset($_POST['add-skin'])){
				if(is_writable(DIR_CATALOG . 'view/theme/wokiee/skins/') && (is_writable(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/') || !file_exists(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'))) {
					// Sprawdzanie czy istnieje folder store_ 
					if(file_exists(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/') && filetype(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/') == 'dir') {
					} else {
						mkdir(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/', 0777);
					}
					
					// Dodawanie pliku z ustawieniami
					if($this->request->post['add-skin-name'] != '') {	
						if(!file_exists(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$this->request->post['add-skin-name'].'/')) {
							mkdir(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$this->request->post['add-skin-name'].'/', 0777);
							file_put_contents(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$this->request->post['add-skin-name'].'/settings.json', json_encode($config_data));
							mkdir(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$this->request->post['add-skin-name'].'/js/', 0777);
							file_put_contents(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$this->request->post['add-skin-name'].'/js/custom_code.js', ' ');
							mkdir(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$this->request->post['add-skin-name'].'/css/', 0777);
							file_put_contents(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$this->request->post['add-skin-name'].'/css/custom_code.css', ' ');
							$this->session->data['success'] = $this->language->get('text_success');
							$this->response->redirect($this->url->link('extension/module/wokiee&submit=true&store_id=' . $data['store_id'] . '', 'user_token=' . $this->session->data['user_token'], true));
						}
					}  
				}

				$this->session->data['error_warning'] = 'You need to set CHMOD 777 for all folder and subfolder in catalog/view/theme/wokiee/skins!';
				$this->response->redirect($this->url->link('extension/module/wokiee&submit=true&store_id=' . $data['store_id'] . '', 'user_token=' . $this->session->data['user_token'], true));
		    }
		}
		
		// Zapisywanie skorki
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if(isset($_POST['button-save'])){
				if(is_writable(DIR_CATALOG . 'view/theme/wokiee/skins') && is_writable(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store']) && is_writable(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$data['active_skin_edit'])) {
					// Sprawdzanie czy istnieje skorka
					if(file_exists(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/') && filetype(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/') == 'dir' && file_exists(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$data['active_skin_edit'].'')) {
						// Zapisywanie ustawien
						file_put_contents(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$data['active_skin_edit'].'/settings.json', json_encode($this->request->post));  
						
						// Custom js
						file_put_contents(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$data['active_skin_edit'].'/js/custom_code.js', html_entity_decode($this->request->post['custom_code_js']));  
						
						// Custom css
						file_put_contents(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$data['active_skin_edit'].'/css/custom_code.css', html_entity_decode($this->request->post['custom_code_css']));  
						
						// Informacja o zapisaniu ustawien
						$this->session->data['success'] = $this->language->get('text_success');
						$this->response->redirect($this->url->link('extension/module/wokiee&submit=true&store_id=' . $data['store_id'] . '&skin_edit=' . $data['active_skin_edit'] . '', 'user_token=' . $this->session->data['user_token'], true));
					}
				}
				
				// Jezeli nie istnieje katalog skorki to pojawia sie komunikat o bledzie
				$this->session->data['error_warning'] = 'You need to set CHMOD 777 for all folder and subfolder in catalog/view/theme/wokiee/skins!';
				$this->response->redirect($this->url->link('extension/module/wokiee&submit=true&store_id=' . $data['store_id'] . '', 'user_token=' . $this->session->data['user_token'], true));
			}
			if(isset($_POST['button-save-live-editor'])){

                // Pobieranie ustawien szablonu
                if(file_exists(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$data['active_skin_edit'].'/settings.json')) {
                    $template_temp = json_decode(file_get_contents(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$data['active_skin_edit'].'/settings.json'), true);
                    $data_temp = array();
                    if(isset($template_temp)) {
                        foreach ($template_temp as $option => $value) { 
                            if($option != 'store_id') {
                                $data_temp[$option] = $value;
                            }
                        }
                    }
                }
                
                $this->request->post = array_replace($data_temp, $this->request->post);
                
				if(is_writable(DIR_CATALOG . 'view/theme/wokiee/skins') && is_writable(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store']) && is_writable(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$data['active_skin_edit'])) {
					// Sprawdzanie czy istnieje skorka
					if(file_exists(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/') && filetype(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/') == 'dir' && file_exists(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$data['active_skin_edit'].'')) {
						// Zapisywanie ustawien
						file_put_contents(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$data['active_skin_edit'].'/settings.json', json_encode($this->request->post));  
						
						// Informacja o zapisaniu ustawien
						$this->session->data['success'] = $this->language->get('text_success');
						$this->response->redirect($this->url->link('extension/module/wokiee&submit=true&store_id=' . $data['store_id'] . '&skin_edit=' . $data['active_skin_edit'] . '', 'live_editor=true&store_id='.$data['store_id'].'&user_token=' . $this->session->data['user_token'], true));
					}
				}
				
				// Jezeli nie istnieje katalog skorki to pojawia sie komunikat o bledzie
				$this->session->data['error_warning'] = 'You need to set CHMOD 777 for all folder and subfolder in catalog/view/theme/wokiee/skins!';
				$this->response->redirect($this->url->link('extension/module/wokiee&submit=true&store_id=' . $data['store_id'] . '', 'live_editor=true&store_id='.$data['store_id'].'&user_token=' . $this->session->data['user_token'], true));
			}
		}
		
		// Usuwanie skorki
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if(isset($_POST['button-delete'])){
				if(is_writable(DIR_CATALOG . 'view/theme/wokiee/skins')) {
					// Sprawdzanie czy istnieje skorka
					if(file_exists(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/') && filetype(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/') == 'dir' && file_exists(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$data['active_skin_edit'].'')) {
						// Sprawdzanie czy skorka jest ustawiona jako aktywna
						if($data['active_skin_edit'] != $data['active_skin']) {
							removeDir(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$data['active_skin_edit'].'');
							
							// Informacja o usunieciu skorki
							$this->session->data['success'] = $this->language->get('text_success');
							$this->response->redirect($this->url->link('extension/module/wokiee&submit=true&store_id=' . $data['store_id'] . '', 'user_token=' . $this->session->data['user_token'], true));
						}
					}
				} else {
					$this->session->data['error_warning'] = 'You need to set CHMOD 777 for all folder and subfolder in catalog/view/theme/wokiee/skins!';
					$this->response->redirect($this->url->link('extension/module/wokiee&submit=true&store_id=' . $data['store_id'] . '', 'user_token=' . $this->session->data['user_token'], true));
				}
				
				// Jezeli nie usunieto szablonu to pojawia sie blad
				$this->session->data['error_warning'] = $this->language->get('text_warning2');
				$this->response->redirect($this->url->link('extension/module/wokiee&submit=true&store_id=' . $data['store_id'] . '', 'user_token=' . $this->session->data['user_token'], true));
			}
		}
		
		// Pobieranie ustawien szablonu
		if(file_exists(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$data['active_skin_edit'].'/settings.json')) {
			$template = json_decode(file_get_contents(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$data['active_skin_edit'].'/settings.json'), true);
			if(isset($template)) {
				foreach ($template as $option => $value) { 
					if($option != 'store_id') {
						$data[$option] = $value;
					}
				}
			}
		}
				
		// Pobieranie ustawien szablon --> custom code js
		if(file_exists(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$data['active_skin_edit'].'/js/custom_code.js')) {
			$data['custom_code_js'] = file_get_contents(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$data['active_skin_edit'].'/js/custom_code.js');
		}
		
		// Pobieranie ustawien szablon --> custom code css
		if(file_exists(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$data['active_skin_edit'].'/css/custom_code.css')) {
			$data['custom_code_css'] = file_get_contents(DIR_CATALOG . 'view/theme/wokiee/skins/store_'.$data['edit_skin_store'].'/'.$data['active_skin_edit'].'/css/custom_code.css');
		}
		
		$data['text_image_manager'] = 'Image manager';
		$data['user_token'] = $this->session->data['user_token'];		
		
		$text_strings = array('heading_title');
		
		foreach ($text_strings as $text) {
			$data[$text] = $this->language->get($text);
		}
		
		
		// Instalacja przykladowych danych
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {	
		     // Custom Module
		     if(isset($_POST['install_advanced_grid'])){
		          $output["select_demo"] = $this->request->post['select_demo'];
		          $this->model_setting_setting->editSetting( "select_demo", $output );	
		          
		          include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/advanced_grid.php'; 
		          
		     	$this->session->data['success'] = $this->language->get('text_success');
		     	$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
		     }
		     
		     // Filter product
		     if(isset($_POST['install_filter_product'])){
		          $output["select_demo"] = $this->request->post['select_demo'];
		          $this->model_setting_setting->editSetting( "select_demo", $output );	
		          
		          include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/filter_product.php'; 
		          
		     	$this->session->data['success'] = $this->language->get('text_success');
		     	$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
		     }
		     
		     // Product questions
		     if(isset($_POST['install_product_questions'])){
		          $output["select_demo"] = $this->request->post['select_demo'];
		          $this->model_setting_setting->editSetting( "select_demo", $output );	
		          
		          include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/product_questions.php'; 
		          
		     	$this->session->data['success'] = $this->language->get('text_success');
		     	$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
		     }
		     
		     // Faq
		     if(isset($_POST['install_faq'])){
		          $output["select_demo"] = $this->request->post['select_demo'];
		          $this->model_setting_setting->editSetting( "select_demo", $output );	
		          
		          include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/faq.php'; 
		          
		     	$this->session->data['success'] = $this->language->get('text_success');
		     	$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
		     }
		     
		     // Popup
		     if(isset($_POST['install_popup'])){
		          $output["select_demo"] = $this->request->post['select_demo'];
		          $this->model_setting_setting->editSetting( "select_demo", $output );	
		          
		          include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/popup.php'; 
		          
		     	$this->session->data['success'] = $this->language->get('text_success');
		     	$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
		     }
		     
		     // Product blocks
		     if(isset($_POST['install_product_blocks'])){
		          $output["select_demo"] = $this->request->post['select_demo'];
		          $this->model_setting_setting->editSetting( "select_demo", $output );	
		          
		          include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/product_blocks.php'; 
		          
		     	$this->session->data['success'] = $this->language->get('text_success');
		     	$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
		     }
		     
			// Custom Module
			if(isset($_POST['install_custom_module'])){
			     $output["select_demo"] = $this->request->post['select_demo'];
			     $this->model_setting_setting->editSetting( "select_demo", $output );	
			     
			     include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/custom_module.php'; 
			     
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
			}
			
			// Blog latest posts
			if(isset($_POST['install_blog_latest_posts'])){
			     $output["select_demo"] = $this->request->post['select_demo'];
			     $this->model_setting_setting->editSetting( "select_demo", $output );	
			     
			     include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/blog_latest_posts.php'; 
			     
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
			}

			// Newsletter
			if(isset($_POST['install_newsletter'])){
			     $output["select_demo"] = $this->request->post['select_demo'];
			     $this->model_setting_setting->editSetting( "select_demo", $output );	
			     
			     include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/newsletter.php'; 
			     
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
			}
			
			// BLOG
			if(isset($_POST['install_blog'])){
				
				$this->load->model('blog/setup');
				$this->model_blog_setup->installSampleData();
			    
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
			}
			
			// Megamenu
			if(isset($_POST['install_megamenu'])){
			     $output["select_demo"] = $this->request->post['select_demo'];
			     $this->model_setting_setting->editSetting( "select_demo", $output );	
			     
				include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/megamenu_query.php'; 
				
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
			}

			// About page 1
			if(isset($_POST['install_about_page_1'])){
			     $output["select_demo"] = $this->request->post['select_demo'];
			     $this->model_setting_setting->editSetting( "select_demo", $output );	
			     
			     include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/about_page_1.php'; 
			     
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
			}

			// About page 2
			if(isset($_POST['install_about_page_2'])){
			     $output["select_demo"] = $this->request->post['select_demo'];
			     $this->model_setting_setting->editSetting( "select_demo", $output );	
			     
			     include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/about_page_2.php'; 
			     
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
			}

			// Contact page 1
			if(isset($_POST['install_contact_page_1'])){
			     $output["select_demo"] = $this->request->post['select_demo'];
			     $this->model_setting_setting->editSetting( "select_demo", $output );	
			     
			     include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/contact_page_1.php'; 
			     
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
			}

			// Services page 1
			if(isset($_POST['install_services_page_1'])){
			     $output["select_demo"] = $this->request->post['select_demo'];
			     $this->model_setting_setting->editSetting( "select_demo", $output );	
			     
			     include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/services_page_1.php'; 
			     
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
			}

			// Faq page 2
			if(isset($_POST['install_faq_page_2'])){
			     $output["select_demo"] = $this->request->post['select_demo'];
			     $this->model_setting_setting->editSetting( "select_demo", $output );	
			     
			     include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/faq_page_2.php'; 
			     
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
			}

			// Gift card page
			if(isset($_POST['install_gift_card_page'])){
			     $output["select_demo"] = $this->request->post['select_demo'];
			     $this->model_setting_setting->editSetting( "select_demo", $output );	
			     
			     include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/gift_card_page.php'; 
			     
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
			}

			// Lookbook page
			if(isset($_POST['install_lookbook_page'])){
			     $output["select_demo"] = $this->request->post['select_demo'];
			     $this->model_setting_setting->editSetting( "select_demo", $output );	
			     
			     include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/lookbook_page.php'; 
			     
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
			}

			// Portfolio page 1
			if(isset($_POST['install_portfolio_page_1'])){
			     $output["select_demo"] = $this->request->post['select_demo'];
			     $this->model_setting_setting->editSetting( "select_demo", $output );	
			     
			     include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/portfolio_page_1.php'; 
			     
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
			}

			// Portfolio page 2
			if(isset($_POST['install_portfolio_page_2'])){
			     $output["select_demo"] = $this->request->post['select_demo'];
			     $this->model_setting_setting->editSetting( "select_demo", $output );	
			     
			     include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/portfolio_page_2.php'; 
			     
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
			}

			// Portfolio page 3
			if(isset($_POST['install_portfolio_page_3'])){
			     $output["select_demo"] = $this->request->post['select_demo'];
			     $this->model_setting_setting->editSetting( "select_demo", $output );	
			     
			     include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/portfolio_page_3.php'; 
			     
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
			}

			// Portfolio page 4
			if(isset($_POST['install_portfolio_page_4'])){
			     $output["select_demo"] = $this->request->post['select_demo'];
			     $this->model_setting_setting->editSetting( "select_demo", $output );	
			     
			     include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/portfolio_page_4.php'; 
			     
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
			}

			// Portfolio page 5
			if(isset($_POST['install_portfolio_page_5'])){
			     $output["select_demo"] = $this->request->post['select_demo'];
			     $this->model_setting_setting->editSetting( "select_demo", $output );	
			     
			     include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/portfolio_page_5.php'; 
			     
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
			}

			// Portfolio page 6
			if(isset($_POST['install_portfolio_page_6'])){
			     $output["select_demo"] = $this->request->post['select_demo'];
			     $this->model_setting_setting->editSetting( "select_demo", $output );	
			     
			     include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/portfolio_page_6.php'; 
			     
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
			}

			// Portfolio page 7
			if(isset($_POST['install_portfolio_page_7'])){
			     $output["select_demo"] = $this->request->post['select_demo'];
			     $this->model_setting_setting->editSetting( "select_demo", $output );	
			     
			     include '../data_sample/wokiee/' . $this->request->post['select_demo'] . '/portfolio_page_7.php'; 
			     
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true));
			}
		}
		
		// Pobieranie informacji, ktora wersja dema jest instalowana		
		$data['select_demos'] = $this->model_setting_setting->getSetting('select_demo');
		if(isset($data['select_demos']['select_demo'])) $data['select_demo'] = $data['select_demos']['select_demo'];
		
		//This creates an error message. The error['warning'] variable is set by the call to function validate() in this controller (below)
		if (isset($this->session->data['error_warning'])) {
			$data['error_warning'] = $this->session->data['error_warning'];
			unset($this->session->data['error_warning']);
 		} elseif(isset($this->error['warning'])) {
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

		$data['action'] = $this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true);
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true);
		
		// Multilanguage
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
			'text' => 'wokiee Theme Options',
			'href' => $this->url->link('extension/module/wokiee', 'user_token=' . $this->session->data['user_token'], true)
		);

		// Subtle patterns
		$data['subtle_patterns'] = array();
		if(is_dir("../image/subtle_patterns/")) {
	        $dir = opendir ("../image/subtle_patterns/");
	        while (false !== ($file = readdir($dir))) { 
	            if ($file<>"." && $file<>"..") {
	                if (strpos($file, '.gif',1) || strpos($file, '.jpg',1) || strpos($file, '.png',3) ) {
	                	$data['subtle_patterns'][] = $file;
	                }
	            }
	        }
	    }
				
		// No image
		$this->load->model('tool/image');
		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);
        
        $data['live_editor_link'] = $this->url->link('extension/module/wokiee', 'live_editor=true&store_id='.$data['store_id'].'&user_token=' . $this->session->data['user_token'], true);
		$data['theme_options_link'] = $this->url->link('extension/module/wokiee', 'store_id='.$data['store_id'].'&user_token=' . $this->session->data['user_token'], true);	
        
        if(!isset($this->request->get['live_editor'])){
            $data['header'] = $this->load->controller('common/header');
            $data['column_left'] = $this->load->controller('common/column_left');
            $data['footer'] = $this->load->controller('common/footer');

            $this->response->setOutput($this->load->view('extension/module/wokiee', $data));
        }else{
            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');
            $front_url = new Url(HTTP_CATALOG, $this->config->get('config_secure') ? HTTP_CATALOG : HTTPS_CATALOG);
            $data['front_url'] = $front_url->link('common/home');
            $data['front_url'] = str_replace('admin/', '', $data['front_url']);
            $this->response->setOutput($this->load->view('extension/module/wokiee_live_editor', $data));
        }
        
		
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/wokiee')) {
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
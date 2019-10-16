<?php
class ControllerExtensionModuleTemplateSwitcher extends Controller {
	private $error = array();
	protected $template_engines = array();

	public function __construct($registry) {
		// Call parent constructor
		parent::__construct($registry);

		if (!$this->config->get('module_template_switcher_status')) {
			return;
		}
		
		// Find all available template engines
		$template_engines = array();
		$files = glob(DIR_SYSTEM . 'library/template/*.php');
		if ($files) {
			foreach ($files as $file) {
				if (is_file($file)) {
					$template_engine = basename($file,'.php');
					$template_engines[] = $template_engine;
				}
			}
		}
		$this->template_engines = $template_engines;
	}

	public function index() {
		$this->load->language('extension/module/template_switcher');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('module_template_switcher', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/template_switcher', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/module/template_switcher', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

		$data['text_explain'] = $this->language->get('text_explain');
		
		if (isset($this->request->post['module_template_switcher_status'])) {
			$data['module_template_switcher_status'] = $this->request->post['module_template_switcher_status'];
		} else {
			$data['module_template_switcher_status'] = $this->config->get('module_template_switcher_status');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/template_switcher', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/template_switcher')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	public function install() {
		// add event handlers
		$this->load->model('setting/event');
		$code = 'module_template_switcher';
		$app = 'catalog/';
		$trigger = 'view/*/before';
		$route = 'extension/module/template_switcher/override';
		$this->model_setting_event->addEvent( $code, $app.$trigger, $route, 1, 499 );
		$route = 'extension/module/template_switcher/render';
		$this->model_setting_event->addEvent( $code, $app.$trigger, $route, 1, 999 );
		$trigger = 'controller/*/before';
		$route = 'extension/module/template_switcher/before';
		$this->model_setting_event->addEvent( $code, $app.$trigger, $route, 1, 0 );
		$app = 'admin/';
		$trigger = 'view/*/before';
		$route = 'extension/module/template_switcher/override';
		$this->model_setting_event->addEvent( $code, $app.$trigger, $route, 1, 0 );
		$trigger = 'view/design/layout_form/before';
		$route = 'extension/module/template_switcher/eventViewDesignLayoutFormBefore';
		$this->model_setting_event->addEvent( $code, $app.$trigger, $route, 1, 0 );
	}

	public function uninstall() {
		// remove event handlers
		$this->load->model('setting/event');
		$code = 'module_template_switcher';
		$this->model_setting_event->deleteEventByCode( $code );
	}


	// event handler for admin/view/*/before 
	public function override(&$route, &$data, &$template) {
		if (!$this->config->get('module_template_switcher_status')) {
			return null;
		}

		// Find the correct template_engine and template_directory for a later rendering
		foreach ($this->template_engines as $template_engine) {
			$ext = ($template_engine == 'template') ? '.tpl' : '.'.$template_engine;
			if (is_file(DIR_TEMPLATE.$route.$ext)) {
				$this->config->set( 'template_engine', $template_engine );
				$this->config->set( 'template_directory', '' );
				return null;
			} 
		}

		trigger_error("Cannot find template file for route '$route'");
		exit;
	}


	// event handler for admin/view/*/before
	public function render(&$route, &$data, &$template) {
		if (!$this->config->get('module_template_switcher_status')) {
			return null;
		}

		// If there is a template buffer from previous view/*/before events then we render
		if ($template) {
			$template_engine = $this->config->get('template_engine');

			if ($template_engine == 'twig') {
				// include and register Twig auto-loader
				include_once(DIR_SYSTEM . 'library/template/Twig/Autoloader.php');
				
				Twig_Autoloader::register();
						
				// specify where to look for templates
				$loader = new \Twig_Loader_Filesystem(DIR_TEMPLATE);		
				
				$config = array('autoescape' => false);
				
				if ($this->config->get('template_cache')) {
					$config['cache'] = DIR_CACHE;
				}
				
				// initialize Twig environment
				$twig = new \Twig_Environment($loader, $config);
					
				return $twig->createTemplate($template)->render($data);
			}

			// render using other template engines, such as PHP
			$template = new Template($this->registry->get('config')->get('template_engine'));
			foreach ($data as $key => $value) {
				$template->set($key, $value);
			}
			return $template->render($this->registry->get('config')->get('template_directory') . $route);		
		}
	
	}


	// event handler for admin/view/design/layout_form/before
	public function eventViewDesignLayoutFormBefore( &$route, &$data, &$template ) {
		foreach ($data['extensions'] as $key=>$extension) {
			if ($extension['code'] == 'template_switcher') {
				unset($data['extensions'][$key]);
			}
		}
		return null;
	}
}
?>
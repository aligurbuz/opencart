<?php
class ControllerTrendyolSetting extends Controller {
	public function index(){
		ini_set('error_reporting', E_ALL);
		$data = array();
		$this->load->model('trendyol/general');
		$this->model_trendyol_general->CreatePage('Trendyol Entegrasyon Ayarları', array('trendyol/sale'));
		
		$data['heading_title'] = 'Trendyol Dashboard';
		$data['heading_title2'] = '<img src="view/template/trendyol/asset/istn112.png">';
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'user_token=' . $this->session->data['user_token'], 'SSL'),
		);
		$data['breadcrumbs'][] = array(
			'text'      => 'Trendyol Dashboard',
			'href'      => $this->url->link('trendyol/dashboard', 'user_token=' . $this->session->data['user_token'], 'SSL'),
		);

		$data['user_token'] = $this->session->data['user_token'];
		$data['links'] = $this->model_trendyol_general->getlinks();

		$data['shop'] = $this->model_trendyol_general->getShop();

		$data['step1duzenle'] = $this->url->link('trendyol/install', 'duzenle=1&user_token=' . $this->session->data['user_token'], 'SSL');
		$data['step2duzenle'] = $this->url->link('trendyol/install/step2', 'duzenle=1&user_token=' . $this->session->data['user_token'], 'SSL');

		$this->model_trendyol_general->gettheme($data, 'setting');
	}

	public function logs(){
		// n11 general dosyamızı alıyoruz
		$data = array();
		$this->load->model('trendyol/general');
		$this->document->setTitle('Trendyol İşlem Kayıtları');
		$this->document->addStyle('view/template/trendyol/asset/global_style.css');
		$data['heading_title'] = 'Trendyol İşlem Kayıtları';
		$data['heading_title2'] = '<img src="view/template/trendyol/asset/istn112.png">';
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'user_token=' . $this->session->data['user_token'], 'SSL'),
		);
		$data['breadcrumbs'][] = array(
			'text'      => 'Trendyol İşlem Kayıtları',
			'href'      => $this->url->link('trendyol/setting/logs', 'user_token=' . $this->session->data['user_token'], 'SSL'),
		);
		$data['links'] = $this->model_trendyol_general->getlinks();
		$data['user_token'] = $this->session->data['user_token'];
	

		$data['clear'] = $this->url->link('trendyol/setting/clearlog', 'user_token=' . $this->session->data['user_token'], true);


		$data['log'] = '';

		$file = DIR_LOGS . 'trendyol_log.txt';

		if (file_exists($file)) {
			$size = filesize($file);

			if ($size >= 5242880) {
				$suffix = array(
					'B',
					'KB',
					'MB',
					'GB',
					'TB',
					'PB',
					'EB',
					'ZB',
					'YB'
				);

				$i = 0;

				while (($size / 1024) > 1) {
					$size = $size / 1024;
					$i++;
				}

				$data['error_warning'] = sprintf($this->language->get('error_warning'), basename($file), round(substr($size, 0, strpos($size, '.') + 4), 2) . $suffix[$i]);
			} else {
				$data['log'] = file_get_contents($file, FILE_USE_INCLUDE_PATH, null);
			}
		}


		$this->model_trendyol_general->gettheme($data, 'log_list');
	}

	public function clearlog() {
		$file = DIR_LOGS . 'trendyol_log.txt';
		$handle = fopen($file, 'w+');
		fclose($handle);
		$this->response->redirect($this->url->link('trendyol/setting/logs', 'user_token=' . $this->session->data['user_token'], true));
	}
}
?>
<?php
class ControllerTrendyolInstall extends Controller {
	/*
		trendyol ilk kurulum yaparken çalışacak step by step panel
		adım 1 : mağaza ekleme bu alanda müşteri mağaza bilgilerini ekleyecektir
	*/
	public function index(){
		$data = array();
		//unset($this->session->data['trend_storeid']);
		unset($this->session->data['action']);
		$this->load->model('trendyol/general');
		$this->document->setTitle('Trendyol Kurulum Ekranı - Api Bilgileri');
		$this->document->addStyle('view/template/trendyol/asset/global_style.css');
		$data['heading_title'] = 'Trendyol Kurulum Ekranı - Api Bilgileri';
		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			$this->model_trendyol_general->addShop($this->request->post);
			$this->session->data['success'] = 'Api başarıyla eklendi!';
			if(isset($this->request->get['duzenle']) and $this->request->get['duzenle'] == 1){
				$this->response->redirect($this->url->link('trendyol/setting', 'user_token=' . $this->session->data['user_token'], 'SSL'));
			} else {
				$this->response->redirect($this->url->link('trendyol/install/step2', 'user_token=' . $this->session->data['user_token'], 'SSL'));
			}
		}
		if($this->model_trendyol_general->has_shop()){
			$data['shop'] = $this->model_trendyol_general->getShop();
			$this->session->data['trend_storeid'] = $data['shop']['id'];
		} else {
			$data['shop'] = array(
				'supplier_id' => '',
				'store_name' => '',
				'api_username' => '',
				'api_password' => '',
			);

		}
		$data['user_token'] = $this->session->data['user_token'];
		$this->model_trendyol_general->gettheme($data, 'install_step1');
	}

	public function step2(){
		$data = array();
		$this->load->model('trendyol/general');
		$this->document->setTitle('Trendyol Kurulum Ekranı - Kargo ve Kar Marjı');
		$this->document->addStyle('view/template/trendyol/asset/global_style.css');
		$data['heading_title'] = 'Trendyol Kurulum Ekranı - Kargo ve Kar Marjı';

		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			$this->model_trendyol_general->updateshop($this->request->post);
			$this->session->data['success'] = 'Mağaza Ayarları Başarıyla Güncellendi!';
			if(isset($this->request->get['duzenle']) and $this->request->get['duzenle'] == 1){
				$this->response->redirect($this->url->link('trendyol/setting', 'user_token=' . $this->session->data['user_token'], 'SSL'));
			} else {
				$this->response->redirect($this->url->link('trendyol/install/step3', 'user_token=' . $this->session->data['user_token'], 'SSL'));
			}
		}
		
		$data['user_token'] = $this->session->data['user_token'];
		if(isset($this->session->data['trend_storeid']) and !empty($this->session->data['trend_storeid'])){
			$data['trend_storeid'] = $this->session->data['trend_storeid'];
			$store = $this->model_trendyol_general->getShop($data['trend_storeid']);
			$data['shop'] = $store;
		} else {
			$store = $this->model_trendyol_general->getShop();
			$this->session->data['trend_storeid'] = $data['trend_storeid']= $store['id'];
			$data['shop'] = $store;
		}
		
		
		

		$login = $store['api_username'];
		$password = $store['api_password'];
		$url = 'https://api.trendyol.com/sapigw/suppliers/'.$store['supplier_id'].'/addresses';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
		$result = curl_exec($ch);
		curl_close($ch);  
		$data['adresler'] = json_decode($result);

		$data['kargo_sirketleri'] = json_decode(file_get_contents('https://api.trendyol.com/sapigw/shipment-providers'));

		if(isset($this->session->data['install_action'])){
			$data['action'] = $this->session->data['install_action'];
		} else {
			$data['action'] = 'install';
		}
		
		$data['geri_don'] = $this->url->link('store/setting', 'user_token=' . $this->session->data['user_token'], 'SSL');

		$this->model_trendyol_general->gettheme($data, 'install_step2');
	}


	public function step3(){
		$data = array();
		$this->load->model('trendyol/general');
		$this->document->setTitle('Trendyol Kurulum Ekranı - Kategoriler İndiriliyor');
		$this->document->addStyle('view/template/trendyol/asset/global_style.css');
		$data['heading_title'] = 'Trendyol Kurulum Ekranı - Kategoriler İndiriliyor';

		$data['user_token'] = $this->session->data['user_token'];
		
		
		if(isset($this->session->data['trend_storeid'])){
			$data['trend_storeid'] = $this->session->data['trend_storeid'];
			$store = $this->model_trendyol_general->getShop($data['trend_storeid']);
		} else {
			$store = $this->model_trendyol_general->getShop(false);
			$this->session->data['trend_storeid'] = $store['id'];
			$data['trend_storeid'] = $store['id'];
		}
		
		$data['shop'] = $store;
		
		$this->model_trendyol_general->gettheme($data, 'install_step3');
	}

	public function step4(){
		$data = array();
		$this->load->model('trendyol/general');
		$this->document->setTitle('Trendyol Kurulum Ekranı - Markalar İndiriliyor');
		$this->document->addStyle('view/template/trendyol/asset/global_style.css');
		$data['heading_title'] = 'Trendyol Kurulum Ekranı - Markalar İndiriliyor';

		$data['user_token'] = $this->session->data['user_token'];
		
		
		if(isset($this->session->data['trend_storeid'])){
			$data['trend_storeid'] = $this->session->data['trend_storeid'];
			$store = $this->model_trendyol_general->getShop($data['trend_storeid']);
		} else {
			$store = $this->model_trendyol_general->getShop(false);
			$this->session->data['trend_storeid'] = $store['id'];
			$data['trend_storeid'] = $store['id'];
		}
		
		$data['shop'] = $store;
		
		$this->model_trendyol_general->gettheme($data, 'install_step4');
	}
}

?>
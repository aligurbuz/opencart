<?php
class ControllerTrendyolDashboard extends Controller {
	/* 
		trendyol genel anasayfasıdır
		modül hakkında bilgi, sipariş sayıları gibi temel bilgiler içerir.
	*/
	public function index(){
		ini_set('error_reporting', E_ALL);
		// trendyol general dosyamızı alıyoruz
		$data = array();
		$this->load->model('trendyol/general');
		/*
		$table_check = $this->db->query("SHOW TABLES LIKE '".DB_PREFIX."n11shops'");
		if($table_check->num_rows < 1){
			$this->model_n11_general->install();
		}
		*/
		$this->model_trendyol_general->CreatePage('Trendyol Entegrasyonuna Hoşgeldiniz', array('trendyol/sale'));
		

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

		$data['created_count'] = $this->model_trendyol_sale->salecount('Created', $this->model_trendyol_general->getShop());
		$data['created_link'] = $this->url->link('trendyol/sales', 'user_token='.$this->session->data['user_token'].'&status=Created', 'SSL');

		$data['picking_count'] = $this->model_trendyol_sale->salecount('Picking', $this->model_trendyol_general->getShop());
		$data['picking_link'] = $this->url->link('trendyol/sales', 'user_token='.$this->session->data['user_token'].'&status=Picking', 'SSL');

		$data['invoiced_count'] = $this->model_trendyol_sale->salecount('Invoiced', $this->model_trendyol_general->getShop());
		$data['invoiced_link'] = $this->url->link('trendyol/sales', 'user_token='.$this->session->data['user_token'].'&status=Invoiced', 'SSL');

		$data['shipped_count'] = $this->model_trendyol_sale->salecount('Shipped', $this->model_trendyol_general->getShop());
		$data['shipped_link'] = $this->url->link('trendyol/sales', 'user_token='.$this->session->data['user_token'].'&status=Shipped', 'SSL');

		$data['cancelled_count'] = $this->model_trendyol_sale->salecount('Cancelled', $this->model_trendyol_general->getShop());
		$data['cancelled_link'] = $this->url->link('trendyol/sales', 'user_token='.$this->session->data['user_token'].'&status=Cancelled', 'SSL');

		$data['delivered_count'] = $this->model_trendyol_sale->salecount('Delivered', $this->model_trendyol_general->getShop());
		$data['delivered_link'] = $this->url->link('trendyol/sales', 'user_token='.$this->session->data['user_token'].'&status=Delivered', 'SSL');

		$data['undelivered_count'] = $this->model_trendyol_sale->salecount('UnDelivered', $this->model_trendyol_general->getShop());
		$data['undelivered_link'] = $this->url->link('trendyol/sales', 'user_token='.$this->session->data['user_token'].'&status=UnDelivered', 'SSL');

		$data['returned_count'] = $this->model_trendyol_sale->salecount('Returned', $this->model_trendyol_general->getShop());
		$data['returned_link'] = $this->url->link('trendyol/sales', 'user_token='.$this->session->data['user_token'].'&status=Returned', 'SSL');

		$data['repack_count'] = $this->model_trendyol_sale->salecount('Repack', $this->model_trendyol_general->getShop());
		$data['repack_link'] = $this->url->link('trendyol/sales', 'user_token='.$this->session->data['user_token'].'&status=Repack', 'SSL');

		$data['unsupplied_count'] = $this->model_trendyol_sale->salecount('UnSupplied', $this->model_trendyol_general->getShop());
		$data['unsupplied_link'] = $this->url->link('trendyol/sales', 'user_token='.$this->session->data['user_token'].'&status=UnSupplied', 'SSL');

		$data['escat'] = $this->model_trendyol_general->eslesmemisCat();

		$data['user_token'] = $this->session->data['user_token'];
		$data['links'] = $this->model_trendyol_general->getlinks();

		$data['shops'] = array();
		$this->model_trendyol_general->gettheme($data, 'dashboard');
	}
}
?>

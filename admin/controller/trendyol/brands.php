<?php
class ControllerTrendyolBrands extends Controller {
	// kategori listesi
	public function index(){
		ini_set('error_reporting', E_ALL);
		// trendyol general dosyamızı alıyoruz

		$data = array();
		$this->load->model('trendyol/general');

		$this->model_trendyol_general->CreatePage('Trendyol Kategori Eşleştirme', array('trendyol/brands', 'trendyol/category'));
		

		$data['heading_title'] = 'Trendyol Kategori Eşleştirme';
		$data['heading_title2'] = '<img src="view/template/trendyol/asset/istn112.png">';
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'user_token=' . $this->session->data['user_token'], 'SSL'),
		);
		$data['breadcrumbs'][] = array(
			'text'      => 'Trendyol Kategori Eşleştirme',
			'href'      => $this->url->link('trendyol/dashboard', 'user_token=' . $this->session->data['user_token'], 'SSL'),
		);
		$data['user_token'] = $this->session->data['user_token'];
		$data['links'] = $this->model_trendyol_general->getlinks();


		if (isset($this->request->get['filter_manufacturer'])) {
			$filter_manufacturer = $this->request->get['filter_manufacturer'];
		} else {
			$filter_manufacturer = null;
		}

		if (isset($this->request->get['filter_manufacturer_id'])) {
			$filter_manufacturer_id = $this->request->get['filter_manufacturer_id'];
		} else {
			$filter_manufacturer_id = null;
		}


		if (isset($this->request->get['filter_status'])) {
			$filter_status = $this->request->get['filter_status'];
		} else {
			$filter_status = null;
		}

		if (isset($this->request->get['filter_eslesme'])) {
			$filter_eslesme = $this->request->get['filter_eslesme'];
		} else {
			$filter_eslesme = null;
		}

		if (isset($this->request->get['filter_komisyon'])) {
			$filter_komisyon = $this->request->get['filter_komisyon'];
		} else {
			$filter_komisyon = null;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['filter_eslesme'])) {
			$url .= '&filter_eslesme=' . $this->request->get['filter_eslesme'];
		}

		if (isset($this->request->get['filter_manufacturer_id'])) {
			$url .= '&filter_manufacturer_id=' . $this->request->get['filter_manufacturer_id'];
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['filter_komisyon'])) {
			$url .= '&filter_komisyon=' . $this->request->get['filter_komisyon'];
		}


		$data['brands'] = array();

		$filter_data = array(
			'filter_eslesme'	  => $filter_eslesme,
			'filter_manufacturer_id'	  => $filter_manufacturer_id,
			'filter_status'	  => $filter_status,
			'filter_komisyon' => $filter_komisyon,
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);
	
		$category_total = $this->model_trendyol_brands->getTotalopBrands($filter_data);
		$results = $this->model_trendyol_brands->getOpBrands($filter_data);
		foreach ($results as $result) {
			$trendcat = $this->model_trendyol_brands->getTrendBrand($result['manufacturer_id']);
			$data['brands'][] = array(
				'trend_id' => $trendcat['id'],
				'trend_name' => $trendcat['name'],
				'komisyon' => $trendcat['komisyon'],
				'manufacturer_id' => $result['manufacturer_id'],
				'name'        => $result['name']
			);
		}

		$pagination = new Pagination();
		$pagination->total = $category_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('trendyol/brands', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', 'SSL');

		$data['trendyol_markalari'] = $this->url->link('trendyol/brands/trendyolbrands', 'user_token=' . $this->session->data['user_token'], 'SSL');
		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($category_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($category_total - $this->config->get('config_limit_admin'))) ? $category_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $category_total, ceil($category_total / $this->config->get('config_limit_admin')));

		$data['filter_status'] = $filter_status;
		$data['filter_manufacturer'] = $filter_manufacturer;
		$data['filter_manufacturer_id'] = $filter_manufacturer_id;
		$data['filter_eslesme'] = $filter_eslesme;
		$data['filter_komisyon'] = $filter_komisyon;
		
		if (isset($this->session->data['error'])) {
			$data['error_warning'] = $this->session->data['error'];
			unset($this->session->data['error']);
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		$this->model_trendyol_general->gettheme($data, 'brands');
	}

	// marka komisyon atama
	public function brand_komisyon(){
		$post = $this->request->post;
		print_r($post);
		$this->db->query("UPDATE ".DB_PREFIX."trendyol_toopbrand SET komisyon = '".$post['value']."' WHERE ocbrand = '".$post['pk']."'");
	}

	// kategori eşleştirme
	public function eslestir(){
		$trendyol = explode('|', $this->request->post['value']);
		$trend_id = $trendyol[0];

		$check = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_toopbrand WHERE ocbrand = '".$this->request->post['pk']."'");
	
		if($check->num_rows > 0){
			$this->db->query("UPDATE ".DB_PREFIX."trendyol_toopbrand SET trendbrand = '".$trend_id."' WHERE ocbrand = '".$this->request->post['pk']."'");
		} else {
			$this->db->query("INSERT INTO ".DB_PREFIX."trendyol_toopbrand SET trendbrand = '".$trend_id."', ocbrand = '".$this->request->post['pk']."'");
		}
		
		$json = array('ocbrand' => $this->request->post['pk'], 'trend_id' => $trend_id);
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	// kategori otomatik tamamlama
	public function trendyol_markaara(){
	 	$json = array();
  		if(isset($this->request->get['filter_name'])){
  			$sqlSorgu = "SELECT * FROM ".DB_PREFIX."trendyol_brands WHERE ";
			$kelime = explode(" ", $this->request->get['filter_name']);
			foreach ($kelime as $key => $value) {
			     $whereSql[] = " name like '%".$this->db->escape($value)."%'";
			}
			$sqlSorgu .= implode(" AND ",$whereSql);
  			$query = $this->db->query($sqlSorgu);
  			if($query->num_rows > 0){
  				foreach ($query->rows as $value){
  					$json[] = array('mid' => $value['mid'], 'name' => strip_tags(html_entity_decode($value['mid'].' | '.$value['name'], ENT_QUOTES, 'UTF-8')));
  				}
  			}
  		}
 
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function trendyolbrands(){
		$data = array();
		$this->load->model('trendyol/general');
		$this->model_trendyol_general->CreatePage('Trendyol Markaları', array('trendyol/category', 'trendyol/brands'));
		$data['heading_title'] = 'Trendyol Markaları';
		$data['heading_title2'] = '<img src="view/template/trendyol/asset/istn112.png">';
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'user_token=' . $this->session->data['user_token'], 'SSL'),
		);
		$data['breadcrumbs'][] = array(
			'text'      => 'Trendyol Markaları',
			'href'      => $this->url->link('trendyol/brands/trendyolbrands', 'user_token=' . $this->session->data['user_token'], 'SSL'),
		);
		$data['links'] = $this->model_trendyol_general->getlinks();
		$data['user_token'] = $this->session->data['user_token'];

		if(isset($this->session->data['success'])){
			$data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if(isset($this->session->data['error'])){
			$data['error'] = $this->session->data['error'];
			unset($this->session->data['error']);
		} else {
			$data['error'] = '';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';
		

		$data['brands'] = array();

		$filter_data = array(
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$total_brands = $this->model_trendyol_brands->getTotalTrendyolbrands();
		$results = $this->model_trendyol_brands->getTrendyolbrands($filter_data);
		foreach ($results as $result) {
			$data['brands'][] = array(
				'brand_id' => $result['mid'],
				'name'        => $result['name']
			);
		}

		$pagination = new Pagination();
		$pagination->total = $total_brands;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('trendyol/brands/trendyolbrands', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', 'SSL');
		$data['pagination'] = $pagination->render();
		$data['results'] = sprintf($this->language->get('text_pagination'), ($total_brands) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($total_brands - $this->config->get('config_limit_admin'))) ? $total_brands : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $total_brands, ceil($total_brands / $this->config->get('config_limit_admin')));
		$data['return'] = $this->url->link('trendyol/brands', 'user_token=' . $this->session->data['user_token'], 'SSL');
		$this->model_trendyol_general->gettheme($data, 'trendyol_brands');
	}

	// trendyol marka indirme
	public function downloadbrands(){
		$this->load->model('trendyol/general');
		$this->load->model('trendyol/brands');
		$this->load->model('setting/setting');
		if(isset($this->request->get['page'])){
			$page = $this->request->get['page'];
		} else {
			$page = 0;
		}
		$result = $this->model_trendyol_brands->downloadbrands($this->model_trendyol_general->getMode(), $page);
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($result));
	}

	// kategori otomatik tamamlama
	public function trendyol_kategoriara(){
	 	$json = array();
  		if(isset($this->request->get['filter_name'])){
  			$sqlSorgu = "SELECT * FROM ".DB_PREFIX."trendyol_categories WHERE ";
			$kelime = explode(" ", $this->request->get['filter_name']);
			foreach ($kelime as $key => $value) {
			     $whereSql[] = " name like '%".$this->db->escape($value)."%'";
			}
			$sqlSorgu .= implode(" AND ",$whereSql);
  			$query = $this->db->query($sqlSorgu);
  			if($query->num_rows > 0){
  				foreach ($query->rows as $value){
  					$json[] = array('cid' => $value['cid'], 'name' => strip_tags(html_entity_decode($value['cid'].' | '.$value['name'], ENT_QUOTES, 'UTF-8')));
  				}
  			}
  		}
 
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
?>
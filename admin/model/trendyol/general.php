<?php
class ModelTrendyolGeneral extends Model {

	// sayfa oluşturma kodu
	public function CreatePage($title, $models = array()){
		if($this->has_shop() == false){
			$this->response->redirect($this->url->link('trendyol/install', 'user_token=' . $this->session->data['user_token'], 'SSL'));
		}
		$this->document->setTitle($title);
		foreach ($models as $model) {
			$this->load->model($model);
		}
		$this->document->addStyle('view/template/trendyol/asset/global_style.css');
		$this->document->addStyle('view/template/trendyol/asset/select2/css/select2.css');
		$this->document->addStyle('view/template/trendyol/asset/bootstrap3-editable/css/bootstrap-editable.css');
		$this->document->addStyle('view/template/trendyol/asset/inputs-ext/typeaheadjs/lib/typeahead.js-bootstrap.css');
		$this->document->addStyle("view/template/trendyol/asset/boottoggle/css/bootstrap-toggle.min.css");
  		$this->document->addStyle("view/template/trendyol/asset/toast/jquery.toast.min.css");
  		$this->document->addScript("view/template/trendyol/asset/toast/jquery.toast.min.js");
  		$this->document->addScript("view/template/trendyol/asset/boottoggle/js/bootstrap-toggle.min.js");
		$this->document->addScript('view/template/trendyol/asset/bootstrap3-editable/js/bootstrap-editable.js');
		$this->document->addScript('view/template/trendyol/asset/inputs-ext/typeaheadjs/lib/typeahead.js');
		$this->document->addScript('view/template/trendyol/asset/inputs-ext/typeaheadjs/typeaheadjs.js');
		$this->document->addScript('view/template/trendyol/asset/select2/js/select2.full.js');
	}

	// trendyol için gerekli linkler
	public function getlinks(){
		// anasayfa
	 	if(strstr($_GET['route'],'trendyol/dashboard')){ $css = 'active'; } else { $css = 'atab'; }
	 	$data[] = array(
	 		'link' => $this->url->link('trendyol/dashboard', 'user_token=' . $this->session->data['user_token'], 'SSL'),
	 		'text' => 'DASHBOARD',
	 		'css'  => $css
	 	);


	 	


	 	// kategori indirme ve eşleştirme sayfası
	 	if(strstr($_GET['route'],'trendyol/category')){ $css = 'active'; } else { $css = 'atab'; }
	 	$data[] = array(
	 		'link' => $this->url->link('trendyol/category', 'user_token=' . $this->session->data['user_token'], 'SSL'),
	 		'text' => 'KATEGORİLER',
	 		'css'  => $css
	 	);

	 	// marka indirme ve eşleştirme sayfası
	 	if(strstr($_GET['route'],'trendyol/brands')){ $css = 'active'; } else { $css = 'atab'; }
	 	$data[] = array(
	 		'link' => $this->url->link('trendyol/brands', 'user_token=' . $this->session->data['user_token'], 'SSL'),
	 		'text' => 'MARKALAR',
	 		'css'  => $css
	 	);


	 	// kategori indirme ve eşleştirme sayfası
	 	if(strstr($_GET['route'],'trendyol/options')){ $css = 'active'; } else { $css = 'atab'; }
	 	$data[] = array(
	 		'link' => $this->url->link('trendyol/options', 'user_token=' . $this->session->data['user_token'], 'SSL'),
	 		'text' => 'SEÇENEKLER',
	 		'css'  => $css
	 	);
	 	
	 	// ürünler
	 	if(strstr($_GET['route'],'trendyol/products')){ $css = 'active'; } else { $css = 'atab'; }
	 	$data[] = array(
	 		'link' => $this->url->link('trendyol/products', 'user_token=' . $this->session->data['user_token'], 'SSL'),
	 		'text' => 'ÜRÜNLER',
	 		'css'  => $css
	 	);

	 	if(strstr($_GET['route'],'trendyol/sales')){ $css = 'active'; } else { $css = 'atab'; }
	 	$data[] = array(
	 		'link' => $this->url->link('trendyol/sales', 'user_token=' . $this->session->data['user_token'], 'SSL'),
	 		'text' => 'SİPARİŞLER',
	 		'css'  => $css
	 	);

	 	if(strstr($_GET['route'],'trendyol/setting/logs')){ $css = 'active'; } else { $css = 'atab'; }
	 	$data[] = array(
	 		'link' => $this->url->link('trendyol/setting/logs', 'user_token=' . $this->session->data['user_token'], 'SSL'),
	 		'text' => 'İŞLEM KAYITLARI',
	 		'css'  => $css
	 	);

	 	if(strstr($_GET['route'],'trendyol/setting')){ 
	 		if(!strstr($_GET['route'],'trendyol/setting/logs')) {
	 			$css = 'active'; 
	 		} else {
	 			 $css = 'atab';
	 		}
	 	} else { $css = 'atab'; }

	 	$data[] = array(
	 		'link' => $this->url->link('trendyol/setting', 'user_token=' . $this->session->data['user_token'], 'SSL'),
	 		'text' => 'AYARLAR',
	 		'css'  => $css
	 	);
		return $data;
	}

	public function addShop($data){
		if(isset($this->session->data['trend_storeid'])){
			$this->db->query("UPDATE ".DB_PREFIX."trendyol_store SET store_name = '".$data['store_name']."', supplier_id = '".$data['supplier_id']."', api_username = '".$data['api_username']."', api_password = '".$data['api_password']."' WHERE id = '".$this->session->data['trend_storeid']."'");
		} else {
			$this->db->query("INSERT INTO ".DB_PREFIX."trendyol_store SET store_name = '".$data['store_name']."', supplier_id = '".$data['supplier_id']."', api_username = '".$data['api_username']."', api_password = '".$data['api_password']."'");
			$shop_id = $this->db->getLastId();
			$this->session->data['trend_storeid'] = $shop_id;
		}
		
		return $shop_id;
	}

	public function has_shop(){
	 	$check = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_store");
	 	if($check->num_rows > 0){
	 		return true;
	 	} else {
	 		return false;
	 	}
	}

	public function getShop($id = false){
		if($id == false){
			$shop = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_store ORDER BY id DESC LIMIT 1");
		} else {
			$shop = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_store WHERE id = '".$id."'");
		}
		
		return $shop->row;	
	}

	public function actShopid(){
		$shop = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_store ORDER BY id DESC LIMIT 1");		
		return $shop->row['id'];	
	}

	public function updateshop($data){
		$store_id = $data['store_id'];
		foreach ($data as $key => $value) {
			if($key != 'store_id' and $key != 'files' and $key != 'iaction'){
				$this->db->query("UPDATE ".DB_PREFIX."trendyol_store SET ".$key." = '".$value."' WHERE id = '".$store_id."'");
			}
		}
		return $data['store_id'];
	}

	public function gettheme($data, $doc){
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view('trendyol/'.$doc, $data));
	}

	public function eslesmemisCat(){
		$query = $this->db->query("SELECT category_id FROM ".DB_PREFIX."category WHERE category_id NOT IN (SELECT opcat FROM " . DB_PREFIX . "trendyol_toopcat WHERE trendcat != '' OR trendcat != '0')");
		return $query->num_rows;
	}


	public function getMode(){
		return 'test';
	}
}
?>
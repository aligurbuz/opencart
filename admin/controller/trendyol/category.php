<?php
class ControllerTrendyolCategory extends Controller {
	// kategori listesi
	public function index(){
		ini_set('error_reporting', E_ALL);
		// trendyol general dosyamızı alıyoruz
		$data = array();
		$this->load->model('trendyol/general');

		$this->model_trendyol_general->CreatePage('Trendyol Kategori Eşleştirme', array('trendyol/sale', 'trendyol/category'));
		

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

		if($this->request->server['REQUEST_METHOD'] == 'POST') {
			if(empty($this->request->post['toplu_trendyolcategoryid']) or empty($this->request->post['toplu_komisyon']) or !isset($this->request->post['selected'])){
				$this->session->data['error'] = 'Hata : Kategori seçmek, toplu trendyol kategorisi seçmek, ve komisyon girmek zorunludur';
			} else {
				foreach ($this->request->post['selected'] as $category_id) {
					$check = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_toopcat WHERE opcat = '".$category_id."' AND trendcat = '".$this->request->post['toplu_trendyolcategoryid']."'");
					if($check->num_rows > 0){
						$this->db->query("UPDATE ".DB_PREFIX."trendyol_toopcat SET trendcat = '".$this->request->post['toplu_trendyolcategoryid']."', komisyon = '".$this->request->post['toplu_komisyon']."' WHERE opcat = '".$category_id."'");
					} else {
						$this->db->query("INSERT INTO ".DB_PREFIX."trendyol_toopcat SET trendcat = '".$this->request->post['toplu_trendyolcategoryid']."', opcat = '".$category_id."', komisyon = '".$this->request->post['toplu_komisyon']."'");
					}
				}

				$this->session->data['success'] = 'Kategoriler Başarıyla Eşleştirildi';
			}
		}


		if (isset($this->request->get['filter_category'])) {
			$filter_category = $this->request->get['filter_category'];
		} else {
			$filter_category = null;
		}

		if (isset($this->request->get['filter_category_id'])) {
			$filter_category_id = $this->request->get['filter_category_id'];
		} else {
			$filter_category_id = null;
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

		if (isset($this->request->get['filter_category_id'])) {
			$url .= '&filter_category_id=' . $this->request->get['filter_category_id'];
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['filter_komisyon'])) {
			$url .= '&filter_komisyon=' . $this->request->get['filter_komisyon'];
		}

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$data['categories'] = array();

		$filter_data = array(
			'filter_eslesme'	  => $filter_eslesme,
			'filter_category_id'	  => $filter_category_id,
			'filter_status'	  => $filter_status,
			'filter_komisyon' => $filter_komisyon,
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);
	
		$category_total = $this->model_trendyol_category->getTotalopcategories($filter_data);
		$results = $this->model_trendyol_category->getOpcategories($filter_data);
		foreach ($results as $result) {
			$trendcat = $this->model_trendyol_category->getTrendCat($result['category_id']);
			$data['categories'][] = array(
				'trend_id' => $trendcat['id'],
				'trend_name' => $trendcat['name'],
				'komisyon' => $trendcat['komisyon'],
				'category_id' => $result['category_id'],
				'name'        => $result['name']
			);
		}

		$pagination = new Pagination();
		$pagination->total = $category_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('trendyol/category', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', 'SSL');

		$data['trendyol_kategorileri'] = $this->url->link('trendyol/category/trendyolcategory', 'user_token=' . $this->session->data['user_token'], 'SSL');
		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($category_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($category_total - $this->config->get('config_limit_admin'))) ? $category_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $category_total, ceil($category_total / $this->config->get('config_limit_admin')));

		$data['filter_status'] = $filter_status;
		$data['filter_category'] = $filter_category;
		$data['filter_category_id'] = $filter_category_id;
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

		$this->model_trendyol_general->gettheme($data, 'category');
	}

	public function getattr(){
		$this->load->model('trendyol/general');
		$this->load->model('trendyol/category');
		$attr = $this->model_trendyol_category->getCategoryAttr($this->request->get['nnid']);
		if(isset($this->request->get['ocid'])){
			$ocid = $this->request->get['ocid'];
			$op_attr = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_toopcat WHERE opcat = '".$this->request->get['ocid']."' AND trendcat = '".$this->request->get['nnid']."'");
			$opattr = (array)json_decode($op_attr->row['attr']);
		} else {
			$ocid = 0;
			$opattr = array();
		}

		$html = '<form id="attrform" method="post">';
		$html .= '<input type="hidden" name="category_id" value="'.$ocid.'">';
		$html .= '<input type="hidden" name="trend_id" value="'.$this->request->get['nnid'].'">';
		
		foreach ($attr as $tatrr) {
			$atrid = $tatrr['attribute_id'];
			setlocale(LC_ALL,'TURKISH');
			$required = (int)$tatrr['required'];
			if($required == 1){
				$zorunlu = 'required="required"';
				$html .= '<div class="form-group"><label>'.$tatrr['name'].' (Zorunlu) ('.count($tatrr['val_list']).')</label>';
			} else {
				$html .= '<div class="form-group"><label>'.$tatrr['name'].' ('.count($tatrr['val_list']).')</label>';
				$zorunlu = '';
			}
			if(count($tatrr['val_list']) != 0){
				$html .= '<select name="prdattr['.$tatrr['attribute_id'].']" class="form-control input-sm" '.$zorunlu.'>';
				if($required != 1){
					$html .= '<option value="">- Seçiniz -</option>';
				}	

				foreach ($tatrr['val_list'] as $atrval){
					
					if($opattr){ 
						
						foreach ($opattr as $ke => $val) {
							if($ke == $atrval['attr_id']){
								if((int)$val == (int)$atrval['value_id']){
									$html .= '<option value="'.$atrval['value_id'].'" selected>'.$atrval['value_name'].'</option>';
								} else {
									$html .= '<option value="'.$atrval['value_id'].'">'.$atrval['value_name'].'</option>';
								}
							}
						}
					} else {
						$html .= '<option value="'.$atrval['value_id'].'">'.$atrval['value_name'].'</option>';
					}
				}
				$html .= '</select></div>';
			} else {
				$ival = '';
				foreach ($opattr as $opk => $opv) {
					if($opk == $atrid){
						$ival = $opv;
					}
				}
				$html .= '<input name="prdattr['.$tatrr['attribute_id'].']" value="'.$ival.'" class="form-control input-sm" '.$zorunlu.'></div>';
			}
		}
		$html .= '</form>';
		echo $html;
	}


	public function attrsave(){
		error_reporting(E_ALL);
		ini_set("display_errors", 1);
		$post = $this->request->post;
		$check = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_toopcat WHERE opcat = '".$post['category_id']."' AND trendcat = '".$post['trend_id']."'");
		if($check->num_rows > 0){
			$up = $this->db->query("UPDATE ".DB_PREFIX."trendyol_toopcat SET attr = '".$this->db->escape(json_encode($post['prdattr']))."' WHERE opcat = '".$post['category_id']."' AND trendcat = '".$post['trend_id']."'");
		} else {
			$up = $this->db->query("INSERT INTO ".DB_PREFIX."trendyol_toopcat SET attr = '".$this->db->escape(json_encode($post['prdattr']))."', opcat = '".$post['category_id']."', trendcat = '".$post['trend_id']."'");
		}
		if($up){
			$json = array('status' => 1, 'msg' => 'Kategori özellikleri başarıyla düzenlendi');
		}
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}


	public function trendyolcategory(){
		$data = array();
		$this->load->model('trendyol/general');
		$this->model_trendyol_general->CreatePage('Trendyol Kategorileri', array('trendyol/category'));
		$data['heading_title'] = 'Trendyol Kategorileri';
		$data['heading_title2'] = '<img src="view/template/trendyol/asset/istn112.png">';
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'user_token=' . $this->session->data['user_token'], 'SSL'),
		);
		$data['breadcrumbs'][] = array(
			'text'      => 'Opencart Trendyol Kategoriler',
			'href'      => $this->url->link('trendyol/dashboard', 'user_token=' . $this->session->data['user_token'], 'SSL'),
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
		

		$data['categories'] = array();

		$filter_data = array(
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$category_total = $this->model_trendyol_category->getTotalTrendyolcategories();
		$results = $this->model_trendyol_category->getTrendyolcategories($filter_data);
		foreach ($results as $result) {
			$data['categories'][] = array(
				'category_id' => $result['cid'],
				'name'        => $result['name']
			);
		}

		$pagination = new Pagination();
		$pagination->total = $category_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('trendyol/category/trendyolcategory', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', 'SSL');
		$data['pagination'] = $pagination->render();
		$data['results'] = sprintf($this->language->get('text_pagination'), ($category_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($category_total - $this->config->get('config_limit_admin'))) ? $category_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $category_total, ceil($category_total / $this->config->get('config_limit_admin')));
		$data['return'] = $this->url->link('trendyol/category', 'user_token=' . $this->session->data['user_token'], 'SSL');
		$this->model_trendyol_general->gettheme($data, 'trendyol_category');
	}


	// trendyol kategori indirme
	public function downloadcategory(){
		$this->load->model('trendyol/general');
		$this->load->model('trendyol/category');
		$this->load->model('setting/setting');
		$result = $this->model_trendyol_category->downloadCategory($this->model_trendyol_general->getMode());
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($result));
	}

	// trendyol kategori özelliklerini indirme
	public function downloadcatAttr(){
		$this->load->model('trendyol/general');
		$this->load->model('trendyol/category');
		$this->load->model('setting/setting');
		if(isset($this->request->get['page'])){
			$result = $this->model_trendyol_category->downloadcatAttr($this->model_trendyol_general->getMode(),$this->request->get['page']);
		} else {
			$result = $this->model_trendyol_category->downloadcatAttr($this->model_trendyol_general->getMode(), 0);
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($result));
	}

	// kategori eşleştirme
	public function eslestir(){
		$trendyol = explode('|', $this->request->post['value']);
		$trend_id = $trendyol[0];

		$check = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_toopcat WHERE opcat = '".$this->request->post['pk']."' AND trendcat = '".$trend_id."'");
		if($check->num_rows > 0){
			$this->db->query("UPDATE ".DB_PREFIX."trendyol_toopcat SET trendcat = '".$trend_id."' WHERE opcat = '".$this->request->post['pk']."'");
		} else {
			$this->db->query("INSERT INTO ".DB_PREFIX."trendyol_toopcat SET trendcat = '".$trend_id."', opcat = '".$this->request->post['pk']."'");
		}
		
		$json = array('opcategory' => $this->request->post['pk'], 'trend_id' => $trend_id);
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	// kategoriye iskonto atama
	public function category_komisyon(){
		$post = $this->request->post;
		$this->db->query("UPDATE ".DB_PREFIX."trendyol_toopcat SET komisyon = '".$post['value']."' WHERE opcat = '".$post['pk']."'");
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
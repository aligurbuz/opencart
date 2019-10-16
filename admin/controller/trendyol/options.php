<?php
class ControllerTrendyolOptions extends Controller {
	// kategori listesi
	public function index(){
		ini_set('error_reporting', E_ALL);
		// trendyol general dosyamızı alıyoruz

		$data = array();
		$this->load->model('trendyol/general');
		$this->load->model('catalog/option');
		$this->model_trendyol_general->CreatePage('Trendyol Seçenek Eşleştirme', array('trendyol/brands', 'trendyol/category'));
		

		$data['heading_title'] = 'Trendyol Seçenek Eşleştirme';
		$data['heading_title2'] = '<img src="view/template/trendyol/asset/istn112.png">';
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'user_token=' . $this->session->data['user_token'], 'SSL'),
		);
		$data['breadcrumbs'][] = array(
			'text'      => 'Trendyol Seçenek Eşleştirme',
			'href'      => $this->url->link('trendyol/options', 'user_token=' . $this->session->data['user_token'], 'SSL'),
		);
		$data['user_token'] = $this->session->data['user_token'];
		$data['links'] = $this->model_trendyol_general->getlinks();


		
		$url = '';
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'od.name';
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

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);



		$option_total = $this->model_catalog_option->getTotalOptions();

		$results = $this->model_catalog_option->getOptions($filter_data);

		foreach ($results as $result) {
			$trend_option = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_tooption WHERE oc_optionid = '".$result['option_id']."'");
			if($trend_option->num_rows > 0){
				$trend_option_name = $this->db->query("SELECT attribute_name FROM ".DB_PREFIX."trendyol_categoryattr WHERE attribute_id = '".$trend_option->row['trend_optionid']."'");
				$data['options'][] = array(
					'trend_id'  => $trend_option->row['trend_optionid'],
					'trend_name'  => $trend_option_name->row['attribute_name'],
					'option_id'  => $result['option_id'],
					'name'       => $result['name']
				);
			} else {
				$data['options'][] = array(
					'trend_id'  => false,
					'trend_name'  => false,
					'option_id'  => $result['option_id'],
					'name'       => $result['name']
				);
			}
		}

		$pagination = new Pagination();
		$pagination->total = $option_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('trendyol/options', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($option_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($option_total - $this->config->get('config_limit_admin'))) ? $option_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $option_total, ceil($option_total / $this->config->get('config_limit_admin')));

		
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

		$this->model_trendyol_general->gettheme($data, 'options');
	}

	public function optioneslestir(){
		$trendyol = explode('|', $this->request->post['value']);
		$trend_id = $trendyol[0];

		$check = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_tooption WHERE oc_optionid = '".$this->request->post['pk']."'");
	
		if($check->num_rows > 0){
			$this->db->query("UPDATE ".DB_PREFIX."trendyol_tooption SET trend_optionid = '".$trend_id."' WHERE oc_optionid = '".$this->request->post['pk']."'");
		} else {
			$this->db->query("INSERT INTO ".DB_PREFIX."trendyol_tooption SET trend_optionid = '".$trend_id."', oc_optionid = '".$this->request->post['pk']."'");
		}
		
		$json = array('oc_optionid' => $this->request->post['pk'], 'trend_id' => $trend_id);
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function getopvals(){
		$this->load->model('trendyol/general');
		$this->load->model('trendyol/category');
		$this->load->model('catalog/option');
		$ocid = $this->request->get['ocid'];
		$trendop_id = $this->request->get['nnid'];
		$langauge_id = (int)$this->config->get('config_language_id');

		$html = '<form id="opvalform" method="post">';
		// trendyol attr id göre değerleri getir
		$trendopval = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_categoryattr_value WHERE attr_id = '".$trendop_id."' ORDER BY value_name DESC");

		// opencart option id göre değerleri getir
		$option_values = $this->model_catalog_option->getOptionValueDescriptions($this->request->get['ocid']);

		foreach ($option_values as $opval) {
			$to_opval = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_tooption_value WHERE oc_opval_id = '".$opval['option_value_id']."' AND oc_optid ='".$ocid."'");

			$html .= '<div class="form-group" style="margin-bottom:5px;">';
				$html .= '<label class="control-label">'.$opval['option_value_description'][$langauge_id]['name'].'</label>';
				$html .= '<select name="opvaltotrend['.$opval['option_value_id'].']" class="form-control input-sm">';
					foreach ($trendopval->rows as $trend_val) {
						if($to_opval->num_rows > 0){
							if($trend_val['value_id'] == $to_opval->row['trend_opval_id']){
								$html .= '<option selected="selected" value="'.$trend_val['value_id'].'">'.$trend_val['value_name'].'</option>';
							} else {
								$html .= '<option value="'.$trend_val['value_id'].'">'.$trend_val['value_name'].'</option>';
							}
						} else {
							$html .= '<option value="'.$trend_val['value_id'].'">'.$trend_val['value_name'].'</option>';
						}
					}
				$html .= '</select>';
			$html .= '</div>';
		}

		$html .= '<input type="hidden" name="option_id" value="'.$ocid.'">';
		$html .= '<input type="hidden" name="trend_id" value="'.$this->request->get['nnid'].'">';
		
		$html .= '</form>';
		echo $html;
	}

	public function opvalsave(){
		$option_id = $this->request->post['option_id'];
		$trend_id = $this->request->post['trend_id'];
		$option_values = $this->request->post['opvaltotrend'];
		foreach ($option_values as $option_value_id => $trendval_id) {
			$check = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_tooption_value WHERE oc_opval_id = '".$option_value_id."' AND trend_opval_id = '".$trendval_id."' AND oc_optid = '".$option_id."' AND trend_optid = '".$trend_id."'");
			if($check->num_rows > 0){
				// var güncelle
				$up = $this->db->query("UPDATE ".DB_PREFIX."trendyol_tooption_value SET trend_opval_id = '".$trendval_id."' WHERE oc_opval_id = '".$option_value_id."' AND oc_optid = '".$option_id."' AND trend_optid = '".$trend_id."'");
			} else {
				// yok ekle
				$up = $this->db->query("INSERT INTO ".DB_PREFIX."trendyol_tooption_value SET oc_opval_id = '".$option_value_id."', trend_opval_id = '".$trendval_id."', oc_optid = '".$option_id."', trend_optid = '".$trend_id."'");
			}
		}
		if($up){
			$json = array('status' => 1, 'msg' => 'Seçenek değerleri başarıyla düzenlendi');
		}
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}


	// kategori otomatik tamamlama
	public function trendyol_optionara(){
	 	$json = array();
  		if(isset($this->request->get['filter_name'])){
  			$sqlSorgu = "SELECT * FROM ".DB_PREFIX."trendyol_categoryattr WHERE ";
			$kelime = explode(" ", $this->request->get['filter_name']);
			foreach ($kelime as $key => $value) {
			     $whereSql[] = " attribute_name like '%".$this->db->escape($value)."%'";
			}
			$sqlSorgu .= implode(" AND ",$whereSql);
  			$query = $this->db->query($sqlSorgu);
  			if($query->num_rows > 0){
  				foreach ($query->rows as $value){
  					$json[] = array('mid' => $value['attribute_id'], 'name' => strip_tags(html_entity_decode($value['attribute_id'].' | '.$value['attribute_name'], ENT_QUOTES, 'UTF-8')));
  				}
  			}
  		}
 
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
?>
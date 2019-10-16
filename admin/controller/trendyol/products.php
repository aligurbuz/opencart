<?php
class ControllerTrendyolProducts extends Controller {
	public function index(){
		error_reporting(E_ALL);
		ini_set("display_errors", 1);
		// trendyol general dosyamızı alıyoruz
		$data = array();
		$this->load->model('trendyol/general');
		$this->model_trendyol_general->CreatePage('Trendyol Ürünler', array('trendyol/product', 'trendyol/category', 'catalog/product', 'tool/image'));
		$data['heading_title'] = 'Trendyol Ürünler';
		$data['heading_title2'] = '<img src="view/template/trendyol/asset/istn112.png">';
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'user_token=' . $this->session->data['user_token'], 'SSL'),
		);
		$data['breadcrumbs'][] = array(
			'text'      => 'Trendyol Ürünler',
			'href'      => $this->url->link('trendyol/products', 'user_token=' . $this->session->data['user_token'], 'SSL'),
		);

		$data['links'] = $this->model_trendyol_general->getlinks();
		$data['actshop_id'] = $this->model_trendyol_general->actShopid();
		$data['user_token'] = $this->session->data['user_token'];

		// toplu eşleştirmeleri kayıt edelim
		if($this->request->server['REQUEST_METHOD'] == 'POST') {
			if(empty($this->request->post['toplu_n11categoryid']) or empty($this->request->post['toplu_komisyon']) or empty($this->request->post['toplu_hazirlik']) or empty($this->request->post['toplu_teslimat']) or !isset($this->session->data['toplu_attr']) or !isset($this->request->post['selected'])){
				$this->session->data['error'] = 'Hata : Ürün seçmek, varsayılan toplu özellik tanımlamak, toplu n11 kategorisi seçmek, hazırlık süresi girmek ve teslimat bilgisi girmek zorunludur';
			} else {
				$this->model_trendyol_product->topluKaydet($this->request->post, $this->model_trendyol_general->actShopid());
				$this->session->data['success'] = 'Ürünler Başarıyla Eşleştirildi';
			}
		}
		
		// toplu eşleştirme kaydı bitti
		$url = '';
		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		} else {
			$filter_name = null;
		}
		if (isset($this->request->get['filter_model'])) {
			$filter_model = $this->request->get['filter_model'];
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		} else {
			$filter_model = null;
		}
		if (isset($this->request->get['filter_eslesme'])) {
			$filter_eslesme = $this->request->get['filter_eslesme'];
			$url .= '&filter_eslesme=' . $this->request->get['filter_eslesme'];
		} else {
			$filter_eslesme = null;
		}
		if (isset($this->request->get['filter_price'])) {
			$filter_price = $this->request->get['filter_price'];
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		} else {
			$filter_price = null;
		}
		if (isset($this->request->get['filter_quantity'])) {
			$filter_quantity = $this->request->get['filter_quantity'];
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		} else {
			$filter_quantity = null;
		}
		if (isset($this->request->get['filter_status'])) {
			$filter_status = $this->request->get['filter_status'];
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		} else {
			$filter_status = null;
		}
		if (isset($this->request->get['filter_trendstatus'])) {
			$filter_trendstatus = $this->request->get['filter_trendstatus'];
			$url .= '&filter_trendstatus=' . $this->request->get['filter_trendstatus'];
		} else {
			$filter_trendstatus = null;
		}
		if (isset($this->request->get['filter_category'])) {
			$filter_category = $this->request->get['filter_category'];
		} else {
			$filter_category = null;
		}
		if (isset($this->request->get['filter_category_id'])) {
			$filter_category_id = $this->request->get['filter_category_id'];
			$url .= '&filter_category_id=' . $this->request->get['filter_category_id'];
		} else {
			$filter_category_id = null;
		}
		if (isset($this->request->get['filter_manufacturer'])) {
			$filter_manufacturer = $this->request->get['filter_manufacturer'];
		} else {
			$filter_manufacturer = null;
		}
		if (isset($this->request->get['filter_manufacturer_id'])) {
			$filter_manufacturer_id = $this->request->get['filter_manufacturer_id'];
			$url .= '&filter_manufacturer_id=' . $this->request->get['filter_manufacturer_id'];
		} else {
			$filter_manufacturer_id = null;
		}
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'p.product_id';
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
						
		if (isset($this->request->get['sort'])){ $url .= '&sort=' . $this->request->get['sort']; }
		if (isset($this->request->get['order'])){ $url .= '&order=' . $this->request->get['order']; }
		//if (isset($this->request->get['page'])){ $url .= '&page=' . $this->request->get['page']; }
		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$data['filter_name'] = $filter_name;
		$data['filter_category'] = $filter_category;
		$data['filter_category_id'] = $filter_category_id;
		$data['filter_manufacturer'] = $filter_manufacturer;
		$data['filter_manufacturer_id'] = $filter_manufacturer_id;
		$data['filter_status'] = $filter_status;
		$data['filter_trendstatus'] = $filter_trendstatus;
		$data['filter_eslesme'] = $filter_eslesme;
		$data['filter_model'] = $filter_model;
		$data['filter_price'] = $filter_price;
		$data['filter_quantity'] = $filter_quantity;
		$data['sort'] = $sort;
		$data['order'] = $order;
		$data['products'] = array();
		$filter_data = array(
			'filter_name'	  => $filter_name,
			'filter_model'	  => $filter_model,
			'filter_price'	  => $filter_price,
			'filter_quantity' => $filter_quantity,
			'filter_status'   => $filter_status,
			'filter_trendstatus'   => $filter_trendstatus,
			'filter_eslesme'  => $filter_eslesme,
			'shop_id'  => $this->model_trendyol_general->actShopid(),
			'filter_category_id'   => $filter_category_id,
			'filter_manufacturer_id'   => $filter_manufacturer_id,
			'sort'            => $sort,
			'order'           => $order,
			'start'           => ($page - 1) * 20,
			'limit'           => 20
		);

		$product_total = $this->model_trendyol_product->getOptotalproduct($filter_data);
		$results = $this->model_trendyol_product->getOpproducts($filter_data);

		foreach ($results as $result) {
			$option = $result['option_data'];
			$trend_data = $result['trend_data'];
			$result = $result['product_data'];
			if (is_file(DIR_IMAGE . $result['image'])) {
				$image = $this->model_tool_image->resize($result['image'], 40, 40);
			} else {
				$image = $this->model_tool_image->resize('no_image.png', 40, 40);
			}
			$special = false;
			$product_specials = $this->model_catalog_product->getProductSpecials($result['product_id']);
			foreach ($product_specials  as $product_special) {
				if (($product_special['date_start'] == '0000-00-00' || strtotime($product_special['date_start']) < time()) && ($product_special['date_end'] == '0000-00-00' || strtotime($product_special['date_end']) > time())) {
					$special = $product_special['price'];
					break;
				}
			}

			$trendyol = $this->model_trendyol_product->getTrendyolprd($result['product_id']);
			if($trendyol == false){
				$data['products'][] = array(
					'product_id' => $result['product_id'],
					'trend_data' => $trend_data,
					'barcode'     => $option['barcode'],
					'setattr'	=> $result['setattr'],
					'beden'		=> $option['name'],
					'image'      => $image,
					'name'       => $result['name'],
					'model'      => $option['model'],
					'komisyon'   => false,
					'tcategory_id'   => false,
					'tcategory_name' => false,
					'tstatus'    => false,
					'price'      => $result['price'],
					'special'    => $special,
					'quantity'   => $option['quantity'],
					'status'     => ($result['status']) ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
					'edit'       => $this->url->link('catalog/product/edit', 'user_token=' . $this->session->data['user_token'] . '&product_id=' . $result['product_id'] . $url, 'SSL')
				);
			} else {
				$tc = $this->model_trendyol_product->getTrendCat($result['product_id']);
				$data['products'][] = array(
					'product_id' => $result['product_id'],
					'image'      => $image,
					'trend_data' => $trend_data,
					'name'       => $result['name'],
					'setattr'	=> $result['setattr'],
					'beden'		=> $option['name'],
					'model'      => $option['model'],
					'barcode'     => $option['barcode'],
					'tcategory_id'   => $tc['id'],
					'tcategory_name' => $tc['name'],
					'komisyon'   => $trendyol['komisyon'],
					'tstatus'   => $trendyol['status'],
					'price'      => $result['price'],
					'special'    => $special,
					'quantity'   => $option['quantity'],
					'status'     => ($result['status']) ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
					'edit'       => $this->url->link('catalog/product/edit', 'user_token=' . $this->session->data['user_token'] . '&product_id=' . $result['product_id'] . $url, 'SSL')
				);
			}
			
		}

		//print_R($data['products']);
		
		$pagination = new Pagination();
		$pagination->total = $product_total;
		$pagination->page = $page;
		$pagination->limit = 20;
		$pagination->url = $this->url->link('trendyol/products', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();
		$this->model_trendyol_general->gettheme($data, 'product');
	}

	public function delProduct(){
		$data = array();
		$this->load->model('n11/general');
		$this->load->model('n11/product');
		$this->load->model('n11/category');
		if(isset($this->request->get['product_id'])){
			$json = $this->model_trendyol_product->DeleteProductBySellerCode($this->model_trendyol_general->getAuth(), $this->request->get['product_id'], null, $this->model_trendyol_general->actShopid());
		} else {
			if(isset($this->request->get['page'])){
				$page = $this->request->get['page'];
			} else {
				$page = 0;
			}
			$json = $this->model_trendyol_product->DeleteProductBySellerCode($this->model_trendyol_general->getAuth(), null, $page, $this->model_trendyol_general->actShopid());
		}
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function sendProduct(){
		$data = array();
		$this->load->model('trendyol/general');
		$this->load->model('trendyol/product');
		$this->load->model('trendyol/category');
		if(isset($this->request->get['status'])){
			if(isset($this->request->get['page'])){
				$page = $this->request->get['page'];
			} else {
				$page = 0;
			}
			$json = $this->model_trendyol_product->SaveProduct(null, $page, 2);
		} else {
			if(isset($this->request->get['product_id'])){
				$json = $this->model_trendyol_product->SaveProduct($this->request->get['product_id'], null);
			} else {
				if(isset($this->request->get['page'])){
					$page = $this->request->get['page'];
				} else {
					$page = 0;
				}
				$json = $this->model_trendyol_product->SaveProduct(null, $page);
			}
		}

		if(isset($this->request->get['status'])){
			foreach ($json as $key => $value) {
				if($key == 'next'){
					$json[$key] = $value.'&status=1';
				} else {
					$json[$key] = $value;
 				}
			}
		}
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));

	}

	public function batchKontrol(){
		$data = array();
		$this->load->model('trendyol/general');
		$this->load->model('trendyol/product');
		$this->load->model('trendyol/category');
		if(isset($this->request->get['page'])){
			$page = $this->request->get['page'];
		} else {
			$page = 0;
		}
		$json = $this->model_trendyol_product->batchKontrol($page);
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));

	}

	/* yalnızca stok güncelle */
	public function updateStockPrice(){
		$data = array();
		$this->load->model('trendyol/general');
		$this->load->model('trendyol/product');
		$this->load->model('trendyol/category');
		if(isset($this->request->get['page'])){
			$page = $this->request->get['page'];
		} else {
			$page = 0;
		}
		$json = $this->model_trendyol_product->updateStockPrice($page);
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function cateslestir(){
		$this->load->model('trendyol/general');
		$this->load->model('trendyol/product');
		$this->load->model('trendyol/category');
		$tyc = explode('|', $this->request->post['value']);
		$checkprod = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_products WHERE product_id = '".$this->request->post['pk']."'");
		if($checkprod->num_rows > 0){
			$this->db->query("UPDATE ".DB_PREFIX."trendyol_products SET category = '".$tyc[0]."' WHERE product_id = '".$this->request->post['pk']."'");
		} else {
			$this->db->query("INSERT INTO ".DB_PREFIX."trendyol_products SET category = '".$tyc[0]."', product_id = '".$this->request->post['pk']."'");
		}
		//$this->model_trendyol_category->downloadCatattr($this->model_trendyol_general->getAuth(), null, $tyc[0]);
		$json = array('product_id' => $this->request->post['pk'], 'trendyolcategory' => $tyc[0]);
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/*
		ürün açıklamasını getirelim
	*/
	public function getdesc(){
		$this->load->model('n11/general');
		$this->load->model('n11/product');
		$this->load->model('n11/category');
		$check = $this->db->query("SELECT * FROM ".DB_PREFIX."n11product WHERE shop_id = '".$this->model_trendyol_general->actShopid()."' AND product_id = '".$this->request->get['product_id']."'");
		if($check->num_rows > 0){
			$title = $check->row['n11_title'];
			$subtitle = $check->row['n11_subtitle'];
			$price = $check->row['n11_price'];
			$description = $check->row['n11_description'];
			$option_rebate = json_decode($check->row['option_rebate']);
		} else {
			$title = '';
			$subtitle = '';
			$price = '';
			$description = '';
			$option_rebate = new stdClass;
		}


		$this->load->model('catalog/product');
		$product_options = $this->model_catalog_product->getProductOptions($this->request->get['product_id']);
		$html = '';
		$html .= '<form id="descform" method="post">';
		$html .= '<input type="hidden" name="product_id" value="'.$this->request->get['product_id'].'">';
		$html .='<div class="form-group"><label>Ürün Başlığı</label><input type="text" name="n11_title" class="form-control input-sm" value="'.$title.'"></div>';
		$html .='<div class="form-group"><label>Ürün Alt Başlığı</label><input type="text" name="n11_subtitle" class="form-control input-sm" value="'.$subtitle.'"></div>';
		$html .='<div class="form-group"><label>Ürün Fiyatı</label><input type="text" name="n11_price" class="form-control input-sm" value="'.$price.'"></div>';
		$html .='<div class="form-group"><label>Ürün Açıklaması</label><textarea name="n11_description" rows="25" placeholder="N11 Ürün Açıklaması" id="input-meta-n11description" class="form-control input-sm summernote">'.$description.'</textarea></div>';
		$html .= '<div class="form-group"><label>Seçenek Komisyon Değeri</label>';
		if($product_options){
		$html .= '<table class="table table-bordered">';
		$html .= '<thead>';
			foreach($product_options as $options){
				$html .= '<th>'.$options['name'].'</th>';
			}
		$html .= '</thead>';
		$html .= '<tbody>';
		$html .= '<tr>';
		foreach($product_options as $options){
			$html .= '<td style="padding:0px !important;">';
				$html .= '<table class="table" style="margin:0px;">';
				foreach ($options['product_option_value'] as $op_val){
					$povid = $op_val['product_option_value_id'];
					if(isset($option_rebate->{$povid})){
						$deger = $option_rebate->{$povid};
					} else {
						$deger = '0';
					}
					$html .= '<tr>';
					$option_value = $this->model_catalog_product->getProductOptionValue($this->request->get['product_id'], $op_val['product_option_value_id']);
					$html .= '<td>'.$option_value['name'].'</td>';
					$html .= '<td><input type="text" class="form-control input-sm" name="option_rebate['.$povid.']" value="'.$deger.'"></td>';
					$html .= '</tr>';
				}
				$html .= '</table>';
			$html .= '</td>';
		}
		$html .= '</tr>';
		$html .= '</tbody>';
		$html .= '</table>';
		}
		$html .= '</div>';
		$html .= '</form>';
		echo $html;
	}

	/*
		ürün detaylarını kaydedelim
	*/
	public function descsave(){
		$this->load->model('n11/general');
		$this->load->model('n11/product');
		$this->load->model('n11/category');
		$post = $this->request->post;
		$checkprod = $this->db->query("SELECT * FROM ".DB_PREFIX."n11product WHERE shop_id = '".$this->model_trendyol_general->actShopid()."' AND product_id = '".$post['product_id']."'");
		if($checkprod->num_rows > 0){
			$up = $this->db->query("UPDATE ".DB_PREFIX."n11product SET n11_title = '".$post['n11_title']."', n11_subtitle = '".$post['n11_subtitle']."', n11_description = '".$this->db->escape($post['n11_description'])."', n11_price = '".$post['n11_price']."', option_rebate = '".json_encode($post['option_rebate'])."' WHERE shop_id = '".$this->model_trendyol_general->actShopid()."' AND product_id = '".$post['product_id']."'");
		} else {
			$up = $this->db->query("INSERT INTO ".DB_PREFIX."n11product SET shop_id = '".$this->model_trendyol_general->actShopid()."', n11_title = '".$post['n11_title']."', n11_subtitle = '".$post['n11_subtitle']."', n11_description = '".$this->db->escape($post['n11_description'])."', n11_price = '".$post['n11_price']."', option_rebate = '".json_encode($post['option_rebate'])."'");
		}
		if($up){
			$json = array('status' => 1, 'msg' => 'Ürün bilgileri başarıyla düzenlendi');
		}
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	
	/* ürün komisyon değiştirme */
	public function changecomission(){
		$this->load->model('trendyol/general');
		$this->load->model('trendyol/product');
		$this->load->model('trendyol/category');
		$post = $this->request->post;
		$checkprod = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_products WHERE product_id = '".$post['pk']."'");
		if($checkprod->num_rows > 0){
			$this->db->query("UPDATE ".DB_PREFIX."trendyol_products SET komisyon = '".$post['value']."' WHERE product_id = '".$post['pk']."'");
		} else {
			$this->db->query("INSERT INTO ".DB_PREFIX."trendyol_products SET komisyon = '".$post['value']."', product_id = '".$post['pk']."'");
		}
	}


	/* ürün durumu değiştirme */
	public function changeprodstatus(){
		$this->load->model('trendyol/general');
		$this->load->model('trendyol/product');
		$this->load->model('trendyol/category');
		$post = $this->request->get;
		$checkprod = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_products WHERE product_id = '".$post['product_id']."'");
		if($checkprod->num_rows > 0){
			$up = $this->db->query("UPDATE ".DB_PREFIX."trendyol_products SET status = '".$post['status']."' WHERE product_id = '".$post['product_id']."'");
		} else {
			$up = $this->db->query("INSERT INTO ".DB_PREFIX."trendyol_products SET status = '".$post['status']."', product_id = '".$post['product_id']."'");
		}
		if(isset($up) and $up){
			$json = array('status' => 1, 'msg' => 'Ürün durumu başarıyla değiştirildi');
		} else {
			$json = array('status' => 0, 'msg' => 'Ürün durumu değiştirilemedi. '. $result['msg']);
		}
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function attrsave(){
		$post = $this->request->post;
		$checkprod = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_products WHERE product_id = '".$post['product_id']."'");
		if($checkprod->num_rows > 0){
			$up = $this->db->query("UPDATE ".DB_PREFIX."trendyol_products SET attr = '".$this->db->escape(json_encode($post['prdattr']))."' WHERE product_id = '".$post['product_id']."'");
			if($up){
				$json = array('status' => 1, 'msg' => 'Ürün özellikleri başarıyla kaydedildi', 'prodid' => $post['product_id']);
			} else {
				$json = array('status' => 0, 'msg' => 'Ürün özellikleri kaydedilirken bir sorun oluştu');
			}
		} else {
			$up = $this->db->query("INSERT INTO ".DB_PREFIX."trendyol_products SET attr = '".$this->db->escape(json_encode($post['prdattr']))."', product_id = '".$post['product_id']."'");
			if($up){
				$json = array('status' => 1, 'msg' => 'Ürün özellikleri başarıyla eklendi', 'prodid' => $post['product_id']);
			} else {
				$json = array('status' => 0, 'msg' => 'Ürün özellikleri eklenirken bir sorun oluştu');
			}
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	/*
		ürün kategorisine ait özellikleri ve özellik değerlerini çekiyoruz
	*/
	public function getattr(){
		$this->load->model('trendyol/general');
		$this->load->model('trendyol/category');
		$opattr = array();
		$html = '';
		if(!isset($this->request->get['product_id'])){
			$html .= '<div class="alert alert-danger">Ürün Bulunamadı!</div>';
			exit;
		}
		$product_id = $this->request->get['product_id'];
		$howcat = false;
		
		$product = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_products WHERE product_id = '".(int)$product_id."'");

		if($product->num_rows > 0){
			$opattr = json_decode($product->row['attr'], true);
			if($product->row['category'] != 0){
				$attr = $this->model_trendyol_category->getCategoryAttr($product->row['category']);
				$howcat = true;
			} else {
				$prod_tocat = $this->db->query("SELECT * FROM ".DB_PREFIX."product_to_category WHERE product_id = '".(int)$product_id."'");
				
				if($prod_tocat->num_rows > 0){
					foreach ($prod_tocat->rows as $cat) {
						
						$trendcat = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_toopcat WHERE opcat = '".$cat['category_id']."' ORDER BY id DESC");
						
						if($trendcat->num_rows > 0){
							$howcat = true;
							$attr = $this->model_trendyol_category->getCategoryAttr($trendcat->row['trendcat']);
						}
					}
				} else {
					$html .= '<div class="alert alert-danger">Bu Ürün Herhangi Bir Kategoriye Atanmamış</div>';
					exit;
				}
			}
		} else {
			$prod_tocat = $this->db->query("SELECT * FROM ".DB_PREFIX."product_to_category WHERE product_id = '".(int)$product_id."'");
			if($prod_tocat->num_rows > 0){
				foreach ($prod_tocat->rows as $cat) {
					$trendcat = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_toopcat WHERE opcat = '".$cat['category_id']."' ORDER BY id DESC");
					if($trendcat->num_rows > 0){
						$howcat = true;
						$attr = $this->model_trendyol_category->getCategoryAttr($trendcat->row['trendcat']);
					}
				}
			} else {
				$html .= '<div class="alert alert-danger">Bu Ürün Herhangi Bir Kategoriye Atanmamış</div>';
				exit;
			}
		}

		if($howcat == true){
			$html .= '<form id="attrform" method="post">';
			$html .= '<input type="hidden" name="product_id" value="'.$product_id.'">';
			foreach ($attr as $tatrr) {
				$atrid = $tatrr['attribute_id'];
				setlocale(LC_ALL,'TURKISH');
				
				if($tatrr['required'] == 1){
					$zorunlu = 'required="required"';
					$html .= '<div class="form-group"><label>'.$tatrr['name'].' (Zorunlu) ('.count($tatrr['val_list']).')</label>';
				} else {
					$html .= '<div class="form-group"><label>'.$tatrr['name'].' ('.count($tatrr['val_list']).')</label>';
					$zorunlu = '';
				}
				if(count($tatrr['val_list']) != 0){
					$html .= '<select name="prdattr['.$tatrr['attribute_id'].']" class="form-control input-sm" '.$zorunlu.'>';
					if($tatrr['required'] != 1){
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
					if($opattr){
						foreach ($opattr as $opk => $opv) {
							if($opk == $atrid){
								$ival = $opv;
							}
						}
					}
					$html .= '<input name="prdattr['.$tatrr['attribute_id'].']" value="'.$ival.'" class="form-control input-sm" '.$zorunlu.'></div>';
				}
			}
			$html .= '</form>';
		} else {
			$html .= '<div class="alert alert-danger">Bu Ürünün Kategorisi Eşleşmemiştir</div>';
		}
		echo $html;
	}
}
?>

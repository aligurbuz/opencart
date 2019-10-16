<?php
class ControllerTrendyolSales extends Controller {
	public function index(){
		// trendyol general dosyamızı alıyoruz
		$data = array();
		$this->load->model('trendyol/general');

		$this->model_trendyol_general->CreatePage('Trendyol Satışlarım', array('trendyol/sale', 'trendyol/category'));
		

		$data['heading_title'] = 'Trendyol Satışlarım';
		$data['heading_title2'] = '<img src="view/template/trendyol/asset/istn112.png">';
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'user_token=' . $this->session->data['user_token'], 'SSL'),
		);
		$data['breadcrumbs'][] = array(
			'text'      => 'Trendyol Satışlarım',
			'href'      => $this->url->link('trendyol/sales', 'user_token=' . $this->session->data['user_token'], 'SSL'),
		);
		$data['user_token'] = $this->session->data['user_token'];
		$data['links'] = $this->model_trendyol_general->getlinks();

		$store = $this->model_trendyol_general->getShop();

		$url = '';
		if(isset($this->request->get['status'])){
			$status = $this->request->get['status'];
			$url .= '&status='.$status;
		} else{
			$status = false;
		}

		if(isset($this->request->get['page'])){
			$page = $this->request->get['page'];
		} else{
			$page = 1;
		}

		$sales = $this->model_trendyol_sale->getSales($store, $page, $status);
		$data['sales'] = $sales;


		$pagination = new Pagination();
		$pagination->total = $sales->totalElements;
		$pagination->page = $page;
		$pagination->limit = 50;


		$pagination->url = $this->url->link('trendyol/sales', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', 'SSL');

		
		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($sales->totalElements) ? (($page - 1) * 50) + 1 : 0, ((($page - 1) * 50) > ($sales->totalElements - 50)) ? $sales->totalElements : ((($page - 1) * 50) + 50), $sales->totalElements, ceil($sales->totalElements / 50));



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

		$this->model_trendyol_general->gettheme($data, 'sales');
	}

	public function checknewsales(){
		error_reporting(E_ALL);
		$this->load->model('trendyol/general');
		$store = $this->model_trendyol_general->getShop();
		$this->model_trendyol_general->CreatePage('Trendyol Sipariş Çek', array('trendyol/sale', 'trendyol/category'));

		$login = $store['api_username'];
		$password = $store['api_password'];
		
		$url = 'https://api.trendyol.com/sapigw/suppliers/'.$store['supplier_id'].'/orders?orderByDirection=DESC&size=200&status=Picking';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
		$result = curl_exec($ch);
		curl_close($ch);  
		$orders = json_decode($result);
		
		if($orders->totalElements > 0){
			foreach ($orders->content as $sale) {
				$order_check = $this->db->query("SELECT * FROM ".DB_PREFIX."order WHERE trend_orderid = '".(int)$sale->orderNumber."'");
				if($order_check->num_rows < 1){
					// eğer sipariş daha önce çekilmemişse

					// müşteri bilgileri
					$name = $sale->customerFirstName;
					$surname = $sale->customerLastName;
					$email = $sale->customerEmail;
					$tck = $phone = $sale->tcIdentityNumber;

					// üye varsa id alındı yoksa eklendi
					$fatura_name = $sale->invoiceAddress->firstName;
					$fatura_surname = $sale->invoiceAddress->lastName;
					$fatura_adres = $sale->invoiceAddress->address1;
					$fatura_sehir = $sale->invoiceAddress->city;
					$fatura_ilce = $sale->invoiceAddress->district;
					$fatura_postakodu = $sale->invoiceAddress->postalCode;

					$fatura_zone = $this->db->query("SELECT * FROM ".DB_PREFIX."zone WHERE name LIKE '".$sale->invoiceAddress->city."'")->row;
					if(isset($fatura_zone['zone_id'])){
						$fatura_zone_id_result = $fatura_zone['zone_id'];
					} else {
						$fatura_zone_id_result = 0;
					}

					$kargo_name = $sale->shipmentAddress->firstName;
					$kargo_surname = $sale->shipmentAddress->lastName;
					$kargo_adres = $sale->shipmentAddress->address1;
					$kargo_sehir = $sale->shipmentAddress->city;
					$kargo_ilce = $sale->shipmentAddress->district;
					$kargo_postakodu = $sale->shipmentAddress->postalCode;


					$kargo_zone = $this->db->query("SELECT * FROM ".DB_PREFIX."zone WHERE name LIKE '".$sale->shipmentAddress->city."'")->row;
					if(isset($kargo_zone['zone_id'])){
						$kargo_zone_id_result = $kargo_zone['zone_id'];
					} else {
						$kargo_zone_id_result = 0;
					}

					$order_products = array();
					$taxxx = 0;
					$taxx = 0;
					$totaltax = 0;
					$total = 0;
					$totalkdv = 0;

					foreach ($sale->lines as $key => $item) {
						$for_option = $this->db->query("SELECT * FROM ".DB_PREFIX."product_option_value_data WHERE ean = '".$item->barcode."' ORDER BY product_option_value_data_id DESC");
						print_r($for_option);

						if($for_option->num_rows > 0){
							// bu bir seçenekli ürün
							$product_id = $for_option->row['product_id'];
							$product_option_value_id = $for_option->row['product_option_value_id'];
						} else {
							// bu bir seçenekli ürün değil
							$product_id = $for_option->row['product_id'];
						}

						$product = $this->db->query("SELECT * FROM ".DB_PREFIX."product WHERE product_id = '".$product_id."'")->row;

						$kdv = 0;
						$taxxx = 0;
						$taxx = 0;

						$tax_rate = $this->db->query("SELECT * FROM ".DB_PREFIX."tax_rule WHERE tax_class_id = '".$product['tax_class_id']."' ORDER BY priority DESC LIMIT 1");
						if($tax_rate->num_rows > 0){
							$tax = $this->db->query("SELECT * FROM ".DB_PREFIX."tax_rate WHERE tax_rate_id = '".$tax_rate->row['tax_rate_id']."'")->row;
							$kdv = ($item->price / 100) * $tax['rate'];
							if($tax['rate'] == 18){
								$taxxx += $kdv;
							}
							if($tax['rate'] == 8){
								$taxx += $kdv;
							}
						}

						$prod_option = array();
						if(isset($product_option_value_id)){
							$oc_product_option_value = $this->db->query("SELECT * FROM ".DB_PREFIX."product_option_value WHERE product_option_value_id = '".$product_option_value_id."' AND product_id = '".$product['product_id']."'");

							$option_id = $oc_product_option_value->row['option_id'];
							$option_value_id = $oc_product_option_value->row['option_value_id'];

							$product_option_id = $oc_product_option_value->row['product_option_id'];
							$product_option_value_id = $oc_product_option_value->row['product_option_value_id'];

							$option_desc = $this->db->query("SELECT * FROM ".DB_PREFIX."option_description WHERE option_id = '".(int)$option_id."'");
							$option_value_desc = $this->db->query("SELECT * FROM ".DB_PREFIX."option_value_description WHERE option_value_id = '".(int)$option_value_id."'");

							$prod_option[] = array(
								'product_option_id' => $product_option_id,
								'product_option_value_id' => $product_option_value_id,
								'name' => $option_desc->row['name'],
								'value' => $option_value_desc->row['name'],
								'type' => 'select'
							);
						}
						

						$totaltax += $kdv;
						$total += ($item->price - $kdv);
						$totalkdv += $item->price;
						$order_products[] = array(
							'product_id' => $product['product_id'],
							'name' => $item->productName,
							'model' => $item->merchantSku,
							'quantity' => $item->quantity,
							'price' => (($item->price - $kdv) / $item->quantity),
							'total' => ($item->price - $kdv),
							'tax' => $kdv,
							'option' => $prod_option,
							'reward' => ''
						);
					}

					$totals = array();
					if($taxx > 0){
						$totals[] = array(
							'code' => 'tax',
							'title' => 'KDV (%8)',
							'sort_order' => '8',
							'value' => $taxx
						);
					}
					if($taxxx > 0){
						$totals[] = array(
							'code' => 'tax',
							'title' => 'KDV (%18)',
							'sort_order' => '7',
							'value' => $taxxx
						);
					}
					$totals[] = array(
						'code' => 'sub_total',
						'title' => 'Ara Toplam',
						'sort_order' => 5,
						'value' => $total
					);
					$totals[] = array(
						'code' => 'total',
						'title' => 'Toplam',
						'sort_order' => '9',
						'value' => $totalkdv
					);
				

					$format = '{firstname} {lastname}' . "\n" . '{company}' . "\n" . '{address_1}' . "\n" . '{address_2}' . "\n" . '{city} {postcode}' . "\n" . '{zone}' . "\n" . '{country}';
					$order_data = array(
						'invoice_prefix' => $this->config->get('config_invoice_prefix'),
						'store_id' => $this->config->get('config_store_id'),
						'store_name' => 'trendyol.com',
						'trend_orderid' => (int)$sale->orderNumber,
						'store_url' =>  'trendyol.com',
						'customer_id' => 0,
						'customer_group_id' => (int)$this->config->get('config_customer_group_id'),
						'firstname' => $name,
						'lastname' => $surname,
						'email' => $email,
						'telephone' => $phone,
						'fax' => '',
						'custom_field' => '',
						'payment_firstname' => $fatura_name,
						'payment_lastname' => $fatura_surname,
						'payment_company' => '',
						'payment_address_1' => $fatura_adres,
						'payment_address_2' => $fatura_sehir.'/'.$fatura_ilce,
						'payment_city' => $fatura_sehir,
						'payment_postcode' => $fatura_postakodu,
						'payment_country' => 'Türkiye',
						'payment_country_id' => '215',
						'payment_zone' => $fatura_sehir,
						'payment_zone_id' => $fatura_zone_id_result,
						'payment_address_format' => $format,
						'payment_custom_field' => '',
						'payment_method' => 'trendyol.com',
						'payment_code' => 'trendyol',
						'shipping_firstname' => $kargo_name,
						'shipping_lastname' => $kargo_surname,
						'shipping_company' => '',
						'shipping_address_1' => $kargo_adres,
						'shipping_address_2' => $kargo_sehir.'/'.$kargo_ilce,
						'shipping_city' => $kargo_sehir,
						'shipping_postcode' => $kargo_postakodu,
						'shipping_country' => 'Türkiye',
						'shipping_country_id' => '215',
						'shipping_zone' => $kargo_sehir,
						'shipping_zone_id' => $kargo_zone_id_result,
						'shipping_address_format' => $format,
						'shipping_custom_field' => '',
						'shipping_method' => 'Trendyol',
						'shipping_code' => 'flat.flat',
						'comment' => $name.' '.$surname.' trendyol.com siparişi',
						'total' => $sale->totalPrice,
						'affiliate_id' => '',
						'commission' => '',
						'marketing_id' => '',
						'tracking' => '',
						'language_id' => $this->config->get('config_language_id'),
						'currency_id' => $this->currency->getId($this->config->get('config_currency')),
						'currency_code' => $this->config->get('config_currency'),
						'currency_value' => $this->currency->getValue($this->config->get('config_currency')),
						'ip' => '',
						'forwarded_ip' => '',
						'user_agent' => '',
						'accept_language' => '',
						'products' => $order_products,
						'vouchers' => '',
						'totals' => $totals
					);
					$order_id = $this->addOrder($order_data);
					$this->db->query("INSERT INTO " . DB_PREFIX . "order_history SET order_id = '" . (int)$order_id . "', order_status_id = '" . (int)$this->config->get('config_order_status_id') . "', notify = '0', comment = '".$name." trendyol.com siparişi', date_added = NOW()");
					$this->db->query("UPDATE ".DB_PREFIX."order SET order_status_id = '".$this->config->get('config_order_status_id')."' WHERE order_id = '".$order_id."'");

					echo $sale->orderNumber." Numaralı Trendyol Siparişi İçe Alındı<br>\n\r";
				}
			}
		} else {
			echo '<b>Yeni Sipariş Yok</b>';
		}
		
	}

	public function addOrder($data) {
		$this->db->query("INSERT INTO `" . DB_PREFIX . "order` SET trend_orderid = '".$data['trend_orderid']."', invoice_prefix = '" . $this->db->escape($data['invoice_prefix']) . "', store_id = '" . (int)$data['store_id'] . "', store_name = '" . $this->db->escape($data['store_name']) . "', store_url = '" . $this->db->escape($data['store_url']) . "', customer_id = '" . (int)$data['customer_id'] . "', customer_group_id = '" . (int)$data['customer_group_id'] . "', firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', email = '" . $this->db->escape($data['email']) . "', telephone = '" . $this->db->escape($data['telephone']) . "', fax = '" . $this->db->escape($data['fax']) . "', custom_field = '" . $this->db->escape(isset($data['custom_field']) ? json_encode($data['custom_field']) : '') . "', payment_firstname = '" . $this->db->escape($data['payment_firstname']) . "', payment_lastname = '" . $this->db->escape($data['payment_lastname']) . "', payment_company = '" . $this->db->escape($data['payment_company']) . "', payment_address_1 = '" . $this->db->escape($data['payment_address_1']) . "', payment_address_2 = '" . $this->db->escape($data['payment_address_2']) . "', payment_city = '" . $this->db->escape($data['payment_city']) . "', payment_postcode = '" . $this->db->escape($data['payment_postcode']) . "', payment_country = '" . $this->db->escape($data['payment_country']) . "', payment_country_id = '" . (int)$data['payment_country_id'] . "', payment_zone = '" . $this->db->escape($data['payment_zone']) . "', payment_zone_id = '" . (int)$data['payment_zone_id'] . "', payment_address_format = '" . $this->db->escape($data['payment_address_format']) . "', payment_custom_field = '" . $this->db->escape(isset($data['payment_custom_field']) ? json_encode($data['payment_custom_field']) : '') . "', payment_method = '" . $this->db->escape($data['payment_method']) . "', payment_code = '" . $this->db->escape($data['payment_code']) . "', shipping_firstname = '" . $this->db->escape($data['shipping_firstname']) . "', shipping_lastname = '" . $this->db->escape($data['shipping_lastname']) . "', shipping_company = '" . $this->db->escape($data['shipping_company']) . "', shipping_address_1 = '" . $this->db->escape($data['shipping_address_1']) . "', shipping_address_2 = '" . $this->db->escape($data['shipping_address_2']) . "', shipping_city = '" . $this->db->escape($data['shipping_city']) . "', shipping_postcode = '" . $this->db->escape($data['shipping_postcode']) . "', shipping_country = '" . $this->db->escape($data['shipping_country']) . "', shipping_country_id = '" . (int)$data['shipping_country_id'] . "', shipping_zone = '" . $this->db->escape($data['shipping_zone']) . "', shipping_zone_id = '" . (int)$data['shipping_zone_id'] . "', shipping_address_format = '" . $this->db->escape($data['shipping_address_format']) . "', shipping_custom_field = '" . $this->db->escape(isset($data['shipping_custom_field']) ? json_encode($data['shipping_custom_field']) : '') . "', shipping_method = '" . $this->db->escape($data['shipping_method']) . "', shipping_code = '" . $this->db->escape($data['shipping_code']) . "', comment = '" . $this->db->escape($data['comment']) . "', total = '" . (float)$data['total'] . "', affiliate_id = '" . (int)$data['affiliate_id'] . "', commission = '" . (float)$data['commission'] . "', marketing_id = '" . (int)$data['marketing_id'] . "', tracking = '" . $this->db->escape($data['tracking']) . "', language_id = '" . (int)$data['language_id'] . "', currency_id = '" . (int)$data['currency_id'] . "', currency_code = '" . $this->db->escape($data['currency_code']) . "', currency_value = '" . (float)$data['currency_value'] . "', ip = '" . $this->db->escape($data['ip']) . "', forwarded_ip = '" .  $this->db->escape($data['forwarded_ip']) . "', user_agent = '" . $this->db->escape($data['user_agent']) . "', accept_language = '" . $this->db->escape($data['accept_language']) . "', date_added = NOW(), date_modified = NOW()");

		$order_id = $this->db->getLastId();

		// Products
		if (isset($data['products'])) {
			foreach ($data['products'] as $product) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "order_product SET order_id = '" . (int)$order_id . "', product_id = '" . (int)$product['product_id'] . "', name = '" . $this->db->escape($product['name']) . "', model = '" . $this->db->escape($product['model']) . "', quantity = '" . (int)$product['quantity'] . "', price = '" . (float)$product['price'] . "', total = '" . (float)$product['total'] . "', tax = '" . (float)$product['tax'] . "', reward = '" . (int)$product['reward'] . "'");

				$order_product_id = $this->db->getLastId();

				foreach ($product['option'] as $option) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "order_option SET order_id = '" . (int)$order_id . "', order_product_id = '" . (int)$order_product_id . "', product_option_id = '" . (int)$option['product_option_id'] . "', product_option_value_id = '" . (int)$option['product_option_value_id'] . "', name = '" . $this->db->escape($option['name']) . "', `value` = '" . $this->db->escape($option['value']) . "', `type` = '" . $this->db->escape($option['type']) . "'");
				}
			}
		}

		// Totals
		if (isset($data['totals'])) {
			foreach ($data['totals'] as $total) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "order_total SET order_id = '" . (int)$order_id . "', code = '" . $this->db->escape($total['code']) . "', title = '" . $this->db->escape($total['title']) . "', `value` = '" . (float)$total['value'] . "', sort_order = '" . (int)$total['sort_order'] . "'");
			}
		}

		return $order_id;
	}
}
?>
<?php
class ModelTrendyolProduct extends Model {
	/* vergi hesapla */
	public function vergihesapla($value, $tax_class_id, $calculate = true){
		$amountm = 0;
		$tax_query = $this->db->query("SELECT tr1.tax_class_id, tr2.tax_rate_id, tr2.name, tr2.rate, tr2.type, tr1.priority FROM " . DB_PREFIX . "tax_rule tr1 LEFT JOIN " . DB_PREFIX . "tax_rate tr2 ON (tr1.tax_rate_id = tr2.tax_rate_id) INNER JOIN " . DB_PREFIX . "tax_rate_to_customer_group tr2cg ON (tr2.tax_rate_id = tr2cg.tax_rate_id) LEFT JOIN " . DB_PREFIX . "zone_to_geo_zone z2gz ON (tr2.geo_zone_id = z2gz.geo_zone_id) LEFT JOIN " . DB_PREFIX . "geo_zone gz ON (tr2.geo_zone_id = gz.geo_zone_id) WHERE tr1.based = 'store' AND tr2cg.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND z2gz.country_id = '" . (int)$this->config->get('config_country_id') . "' AND (z2gz.zone_id = '0' OR z2gz.zone_id = '" . (int)$this->config->get('config_zone_id') . "') ORDER BY tr1.priority ASC");
		foreach ($tax_query->rows as $result) {
			$tax_rates[$result['tax_class_id']][$result['tax_rate_id']] = array(
				'tax_rate_id' => $result['tax_rate_id'],
				'name'        => $result['name'],
				'rate'        => $result['rate'],
				'type'        => $result['type'],
				'priority'    => $result['priority']
			);
		}
		$tax_rate_data = array();
		if (isset($tax_rates[$tax_class_id])) {
			foreach ($tax_rates[$tax_class_id] as $tax_rate) {
				if (isset($tax_rate_data[$tax_rate['tax_rate_id']])) {
					$amount = $tax_rate_data[$tax_rate['tax_rate_id']]['amount'];
				} else {
					$amount = 0;
				}
				if ($tax_rate['type'] == 'F') {
					$amount += $tax_rate['rate'];
				} elseif ($tax_rate['type'] == 'P') {
					$amount += ($value / 100 * $tax_rate['rate']);

				}
				$tax_rate_data[$tax_rate['tax_rate_id']] = array(
					'tax_rate_id' => $tax_rate['tax_rate_id'],
					'name'        => $tax_rate['name'],
					'rate'        => $tax_rate['rate'],
					'type'        => $tax_rate['type'],
					'amount'      => $amount
				);
			}
		}
		foreach ($tax_rate_data as $tax_ratem) {
			if ($calculate != 'P' && $calculate != 'F') {
				$amountm += $tax_ratem['amount'];
			} elseif ($tax_ratem['type'] == $calculate) {
				$amountm += $tax_ratem['amount'];
			}
		}
		if(isset($amountm)){
			return $value + $amountm;
		} else {
			return $value;
		}
	}

	public function getTrendCat($product_id){
		$sql = "SELECT * FROM ".DB_PREFIX."trendyol_products tp INNER JOIN ".DB_PREFIX."trendyol_categories tc ON tp.category = tc.cid WHERE tp.product_id = '".$product_id."'";
		$trend = $this->db->query($sql);
		if($trend->num_rows > 0){
			return array(
				'id' => $trend->row['cid'],
				'name' => $trend->row['name']
			);
		} else {
			return array(
				'id' => false,
				'name' => false
			);
		}
	}


	public function getTrendyolprd($product_id){
		$product = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_products WHERE product_id = '".$product_id."'");
		if($product->num_rows > 0){
			return $product->row;
		} else {
			return false;
		}
	}


	public function batchKontrol($page, $product_id = false){
		$dosya_adi = DIR_LOGS."trendyol_log.txt"; // log dosyam
		$shop_query = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_store ORDER BY id DESC LIMIT 1");
		$supplier_id = $shop_query->row['supplier_id'];
		$api_username = $shop_query->row['api_username'];
		$api_password = $shop_query->row['api_password'];
		if($product_id != false){
			$products = $this->db->query("SELECT * FROM ".DB_PREFIX."product WHERE product_id = '".$product_id."' ORDER BY product_id DESC LIMIT  1");
		} else {
			$products = $this->db->query("SELECT * FROM ".DB_PREFIX."product ORDER BY product_id DESC LIMIT ".$page.", 1");
		}

		if($products->num_rows < 1){
			$dosya = fopen ($dosya_adi , 'a') or die ("Dosya açılamadı!"); 
			$metin = date('d.m.Y H:i:s')." Tüm Ürünler Kontrol Edildi\r\n"; 
			fputs($dosya , $metin); 
			fclose ($dosya);
			return array('status' => 1,  'msg' => $metin);
			exit;
		}
	
		$product = $products->row;
		$options = $this->getProductOptions($product['product_id']);
		//print_r($options[0]['product_option_value']);
		if(isset($options[0]) and count($options[0]['product_option_value']) > 0){
			foreach ($options[0]['product_option_value'] as $pov) {
				$pov_data = $this->db->query("SELECT ean FROM ".DB_PREFIX."product_option_value_data WHERE product_id = '".$product['product_id']."' AND product_option_value_id = '".$pov['product_option_value_id']."'");
				$ch = curl_init();
				$this->db->query("DELETE FROM ".DB_PREFIX."trendyol_products_sending WHERE product_option_value_id = '".$pov['product_option_value_id']."'");

				if(!empty($pov_data->row['ean'])){
					$url = 'https://api.trendyol.com/sapigw/suppliers/'.$supplier_id.'/products?barcode='.$pov_data->row['ean'];
					curl_setopt($ch, CURLOPT_URL,$url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
					curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
					curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
					curl_setopt($ch, CURLOPT_USERPWD, "$api_username:$api_password");
					$result = curl_exec($ch);
					curl_close($ch);  
					$batch_result = json_decode($result);

					if(isset($batch_result->totalElements) and $batch_result->totalElements > 0){
						
						$tdata = $batch_result->content[0];
						$this->db->query("INSERT INTO ".DB_PREFIX."trendyol_products_sending SET stockcode = '".$tdata->stockCode."', barcode = '".$tdata->barcode."', listprice = '".$tdata->listPrice."', saleprice = '".$tdata->salePrice."', quantity = '".$tdata->quantity."', product_option_value_id = '".$pov['product_option_value_id']."', product_id = '".$product['product_id']."', productcontentid = '".$tdata->productContentId."', createdatetime = '".$tdata->createDateTime."', lastupdatedate = '".$tdata->lastUpdateDate."', lastpricechangedate = '".$tdata->lastPriceChangeDate."', laststockchangedate = '".$tdata->lastStockChangeDate."', aproved = '".$tdata->approved."',onsale = '".$tdata->onsale."'");
					}
				}
				
			}
		}
		
		$dosya = fopen ($dosya_adi , 'a') or die ("Dosya açılamadı!"); 
		$metin = date('d.m.Y H:i:s')." - Model No : ".$product["model"]." Kontrol Edildi\r\n"; 
		fputs($dosya , $metin); 
		fclose ($dosya);
		return array('status' => 1,  'msg' => $metin, 'next' => 'index.php?route=trendyol/products/batchKontrol&user_token='.$this->session->data['user_token'].'&page='.($page+1));
	}

	public function updateStockPrice($page){
		$sure_baslangici = microtime(true);
		$dosya_adi = DIR_LOGS."trendyol_log.txt"; // log dosyam
		$shop_query = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_store ORDER BY id DESC LIMIT 1");
		$supplier_id = $shop_query->row['supplier_id'];
		$api_username = $shop_query->row['api_username'];
		$api_password = $shop_query->row['api_password'];
		$comission_type = $shop_query->row['difference_type'];

		// yeniden oluştur toplu işlem yap
		$allprod = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_products_sending");
		$guncellenen = 0;
		$guncellenemeyen = 0;
		$sendprod = array();
		$sendprod['items'] = array();

		if($allprod->num_rows > 0){
			foreach ($allprod->rows as $trdprod) {
				$product = $this->db->query("SELECT * FROM ".DB_PREFIX."product WHERE product_id = '".$trdprod['product_id']."'")->row;

				$product_option = $this->db->query("SELECT * FROM ".DB_PREFIX."product_option_value WHERE product_option_value_id = '".$trdprod['product_option_value_id']."'");
				if($product_option->num_rows > 0){
					$pov = $product_option->row;				
					// komisyon ayarlarını al
					$komisyon = 0;
					$prod_komisyon = $this->db->query("SELECT komisyon FROM ".DB_PREFIX."trendyol_products WHERE product_id = '".$product['product_id']."' AND komisyon != '0'");
					if($prod_komisyon->num_rows > 0){
						// ürüne özel komisyon var
						$komisyon = $prod_komisyon->row['komisyon'];
					}

					// ürünü özel komisyon yok kategorisinden bak
					if(!isset($komisyon) or $komisyon < 1){
						$prod_cat = $this->db->query("SELECT category_id FROM ".DB_PREFIX."product_to_category WHERE product_id = '".$product['product_id']."'");
						if($prod_cat->num_rows > 0){
							foreach ($prod_cat->rows as $cat) {
								$ckomisyon = $this->db->query("SELECT komisyon FROM ".DB_PREFIX."trendyol_toopcat WHERE opcat = '".$cat['category_id']."' AND komisyon != '0'");
								if($ckomisyon->num_rows > 0 or $komisyon > 0){
										$komisyon = $ckomisyon->row['komisyon'];
								}
							}
						}
					}

					// kategoriye özel komisyon yok markaya bak
					if(!isset($komisyon) or $komisyon < 1){
						$mkomisyon = $this->db->query("SELECT komisyon FROM ".DB_PREFIX."trendyol_toopbrand WHERE ocbrand = '".$product['manufacturer_id']."' AND komisyon != '0'");
						if($mkomisyon->num_rows > 0){
							$komisyon = $mkomisyon->row['komisyon'];
						}
					}

					// kategori komisyonu da yoksa mağaza komisyonuna bak
					if(isset($komisyon) or $komisyon < 1){
						$komisyon = $shop_query->row['difference_value'];
					}

					$listprice = $product['price'];
					$special_query = $this->db->query("SELECT price FROM ".DB_PREFIX."product_special WHERE product_id = '".$product['product_id']."' AND customer_group_id = '".$this->config->get('config_customer_group_id')."' ORDER BY priority DESC LIMIT 1");
					if($special_query->num_rows > 0){
						// indirimli fiyatı var
						$saleprice = $special_query->row['price'];
					}

						// fiyat komisyon ayarlamaları
					if($comission_type == 'yuzde'){
						// yüzde olarak arttır
						$listprice_yuzde = ($listprice / 100) * $komisyon;
						$listprice = (float)$listprice + (float)$listprice_yuzde;

						$saleprice_yuzde = ($saleprice / 100) * $komisyon;
						$saleprice = (float)$saleprice + (float)$saleprice_yuzde;
					} else if($comission_type == 'sabit'){
						// sabit arttır
						$listprice = (float)$listprice +  (float)$komisyon;

						$saleprice = (float)$saleprice +  (float)$komisyon;
					} else if($comission_type == 'yuzdeazalt'){
						// yüzde azalat
						$listprice_yuzde = ($listprice / 100) *  $komisyon;
						$listprice = (float)$listprice - (float)$listprice_yuzde;

						$saleprice_yuzde = ($saleprice / 100) * $komisyon;
						$saleprice = (float)$saleprice - (float)$saleprice_yuzde;
					} else if($comission_type == 'sabitazalt'){
						// sabit olarak azalt
						$listprice = (float)$listprice -  (float)$komisyon;

						$saleprice = (float)$saleprice -  (float)$komisyon;
					}

					// komisyon ayarları bitti
					$sendprod['items'][] = array(
						'barcode' => $trdprod['barcode'],
						'quantity' => $pov['quantity'],
						'salePrice' => $saleprice,
						'listPrice' => $listprice
					);

					//$this->batchKontrol(false, $product['product_id']);
					$guncellenen = $guncellenen + 1;
				}
			}
		}

		$update_url = 'https://api.trendyol.com/sapigw/suppliers/'.$supplier_id.'/products/price-and-inventory';
		$update_ch = curl_init();
		curl_setopt($update_ch, CURLOPT_URL,$update_url);
		curl_setopt($update_ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($update_ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($update_ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($update_ch, CURLOPT_USERPWD, "$api_username:$api_password");
		curl_setopt($update_ch, CURLOPT_POSTFIELDS, json_encode($sendprod));
		$result = curl_exec($update_ch);
		curl_close($update_ch);  
		$update_array = json_decode($result);

		$sure_bitimi = microtime(true);
		$sure = $sure_bitimi - $sure_baslangici;
		
		$gonderilemedi[] = '1';
		$dosya = fopen ($dosya_adi , 'a') or die ("Dosya açılamadı!"); 
		$metin = date('d.m.Y H:i:s')." ".$guncellenen." adet trendyol ürünü güncellendi ".$sure." Sn Sürdü ve ".round(memory_get_peak_usage()/1048576, 2)." MB Bellek Kullanıldı, Durum Kontrolü Yapılıyor\r\n"; 
		fputs($dosya , $metin); 
		fclose ($dosya);
		return array('msg' => $metin, 'status' => 1);
	}


	// ürün düzenlendiğinde stokları güncellemesi için
	public function updatespforproduct($product_id){
		$sure_baslangici = microtime(true);
		$dosya_adi = DIR_LOGS."trendyol_log.txt"; // log dosyam
		$shop_query = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_store ORDER BY id DESC LIMIT 1");
		$supplier_id = $shop_query->row['supplier_id'];
		$api_username = $shop_query->row['api_username'];
		$api_password = $shop_query->row['api_password'];
		$comission_type = $shop_query->row['difference_type'];

		// yeniden oluştur toplu işlem yap
		
		$guncellenen = 0;
		$guncellenemeyen = 0;
		$sendprod = array();
		$sendprod['items'] = array();

		$product = $this->db->query("SELECT * FROM ".DB_PREFIX."product WHERE product_id = '".$product_id."'")->row;
		$product_option = $this->db->query("SELECT * FROM ".DB_PREFIX."product_option_value WHERE product_id = '".$product_id."'");
		if($product_option->num_rows > 0){
			foreach ($product_option->rows as $pov) {
					$trdprod = $this->db->query("SELECT * FROM ".DB_PREFIX."product_option_value_data WHERE product_option_value_id = '".$pov['product_option_value_id']."'")->row;

						
					// komisyon ayarlarını al
					$komisyon = 0;
					$prod_komisyon = $this->db->query("SELECT komisyon FROM ".DB_PREFIX."trendyol_products WHERE product_id = '".$product['product_id']."' AND komisyon != '0'");
					if($prod_komisyon->num_rows > 0){
						// ürüne özel komisyon var
						$komisyon = $prod_komisyon->row['komisyon'];
					}

					// ürünü özel komisyon yok kategorisinden bak
					if(!isset($komisyon) or $komisyon < 1){
						$prod_cat = $this->db->query("SELECT category_id FROM ".DB_PREFIX."product_to_category WHERE product_id = '".$product['product_id']."'");
						if($prod_cat->num_rows > 0){
							foreach ($prod_cat->rows as $cat) {
								$ckomisyon = $this->db->query("SELECT komisyon FROM ".DB_PREFIX."trendyol_toopcat WHERE opcat = '".$cat['category_id']."' AND komisyon != '0'");
								if($ckomisyon->num_rows > 0 or $komisyon > 0){
										$komisyon = $ckomisyon->row['komisyon'];
								}
							}
						}
					}

					// kategoriye özel komisyon yok markaya bak
					if(!isset($komisyon) or $komisyon < 1){
						$mkomisyon = $this->db->query("SELECT komisyon FROM ".DB_PREFIX."trendyol_toopbrand WHERE ocbrand = '".$product['manufacturer_id']."' AND komisyon != '0'");
						if($mkomisyon->num_rows > 0){
							$komisyon = $mkomisyon->row['komisyon'];
						}
					}

					// kategori komisyonu da yoksa mağaza komisyonuna bak
					if(isset($komisyon) or $komisyon < 1){
						$komisyon = $shop_query->row['difference_value'];
					}

					$listprice = $product['price'];
					$special_query = $this->db->query("SELECT price FROM ".DB_PREFIX."product_special WHERE product_id = '".$product['product_id']."' AND customer_group_id = '".$this->config->get('config_customer_group_id')."' ORDER BY priority DESC LIMIT 1");
					if($special_query->num_rows > 0){
						// indirimli fiyatı var
						$saleprice = $special_query->row['price'];
					}

						// fiyat komisyon ayarlamaları
					if($comission_type == 'yuzde'){
						// yüzde olarak arttır
						$listprice_yuzde = ($listprice / 100) * $komisyon;
						$listprice = (float)$listprice + (float)$listprice_yuzde;

						$saleprice_yuzde = ($saleprice / 100) * $komisyon;
						$saleprice = (float)$saleprice + (float)$saleprice_yuzde;
					} else if($comission_type == 'sabit'){
						// sabit arttır
						$listprice = (float)$listprice +  (float)$komisyon;

						$saleprice = (float)$saleprice +  (float)$komisyon;
					} else if($comission_type == 'yuzdeazalt'){
						// yüzde azalat
						$listprice_yuzde = ($listprice / 100) *  $komisyon;
						$listprice = (float)$listprice - (float)$listprice_yuzde;

						$saleprice_yuzde = ($saleprice / 100) * $komisyon;
						$saleprice = (float)$saleprice - (float)$saleprice_yuzde;
					} else if($comission_type == 'sabitazalt'){
						// sabit olarak azalt
						$listprice = (float)$listprice -  (float)$komisyon;

						$saleprice = (float)$saleprice -  (float)$komisyon;
					}

					// komisyon ayarları bitti
					$sendprod['items'][] = array(
						'barcode' => $trdprod['ean'],
						'quantity' => $pov['quantity'],
						'salePrice' => $saleprice,
						'listPrice' => $listprice
					);

					//$this->batchKontrol(false, $product['product_id']);
				$guncellenen = $guncellenen + 1;
			}
		}

		
	
		$update_url = 'https://api.trendyol.com/sapigw/suppliers/'.$supplier_id.'/products/price-and-inventory';
		$update_ch = curl_init();
		curl_setopt($update_ch, CURLOPT_URL,$update_url);
		curl_setopt($update_ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($update_ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($update_ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($update_ch, CURLOPT_USERPWD, "$api_username:$api_password");
		curl_setopt($update_ch, CURLOPT_POSTFIELDS, json_encode($sendprod));
		$result = curl_exec($update_ch);
		curl_close($update_ch);  
		$update_array = json_decode($result);

		$sure_bitimi = microtime(true);
		$sure = $sure_bitimi - $sure_baslangici;
	
		$dosya = fopen ($dosya_adi , 'a') or die ("Dosya açılamadı!"); 
		$metin = date('d.m.Y H:i:s')." ".$product['model'].' Model Numaralı Ürüne Ait '.$guncellenen." adet trendyol ürünü güncellendi ".$sure." Sn Sürdü ve ".round(memory_get_peak_usage()/1048576, 2)." MB Bellek Kullanıldı\r\n"; 
		fputs($dosya , $metin); 
		fclose ($dosya);
	}

	/* 
		trendyol ürün gönderme fonksiyonu
	*/
	public function SaveProduct($product_id = null, $page, $stocksifirla = 0){

		/*
			ürün öncelik sırası
			1. ürün eşleşmesi
			2. kategori eşleşmesi
			3. global eşleşme
		*/
		error_reporting(E_ALL);
		ini_set("display_errors", 1);
		$connect_web = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml');
		$usd = $connect_web->Currency[0]->BanknoteBuying;
		$euro = $connect_web->Currency[3]->BanknoteBuying;
		$dosya_adi = DIR_LOGS."trendyol_log.txt"; // log dosyam
		if($product_id == null){
			$product_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) ORDER BY p.product_id DESC LIMIT ".$page.",1");
		} else {
			$product_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE p.product_id = '".$product_id."'");
		}

		if($product_query->num_rows > 0 or isset($product_query->row['product_id']) or !empty($product_query->row['product_id'])){
			// ürün varsa
			$trendyol_price = false;
			$shop_query = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_store ORDER BY id DESC LIMIT 1");
			$title = $product_query->row['name'];
			$price = $product_query->row['price'];
			$comission_type = $shop_query->row['difference_type'];
			$commission = $shop_query->row['difference_value'];
			$supplier_id = $shop_query->row['supplier_id'];
			$api_username = $shop_query->row['api_username'];
			$api_password = $shop_query->row['api_password'];
			$shipment_address_id = $shop_query->row['shipment_address_id'];
			$returning_address_id = $shop_query->row['returning_address_id'];
			$cargo_company_id = $shop_query->row['cargo_company_id'];
			$description = $product_query->row['description'];

			// kategori eşleştirmesini kontrol edelim
			$prodtocat = $this->db->query("SELECT * FROM ".DB_PREFIX."product_to_category WHERE product_id = '".$product_query->row['product_id']."'");
			foreach ($prodtocat->rows as $pcats) {
				$check_cat = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_toopcat WHERE opcat = '".$pcats['category_id']."' AND trendcat != '0'");
				if($check_cat->num_rows > 0){
					$catid = $check_cat->row['trendcat'];
					$commission = $check_cat->row['komisyon'];
					$attr = json_decode($check_cat->row['attr']);
				}
			}

		

			// fiyat komisyon ayarlamaları
			if($comission_type == 'yuzde'){
				// yüzde olarak arttır
				$yuzde = ($price / 100) * $commission;
				$price = (float)$price + (float)$yuzde;
			} else if($comission_type == 'sabit'){
				// sabit arttır
				$price = (float)$price +  (float)$commission;
			} else if($comission_type == 'yuzdeazalt'){
				// yüzde azalat
				$yuzde = ($price / 100) *  $commission;
				$price = (float)$price - (float)$yuzde;
			} else if($comission_type == 'sabitazalt'){
				// sabit olarak azalt
				$price = (float)$price -  (float)$commission;
			}

			// birebir eşleştirme
			$trendyol_product = $this->db->query("SELECT * FROM " . DB_PREFIX . "trendyol_products WHERE product_id = '".$product_query->row['product_id']."'");
			if($trendyol_product->num_rows > 0){
				// ürün satış statusu
				if(isset($trendyol_product->row['status']) and $trendyol_product->row['status'] != '0'){
					if($stocksifirla == 0){
						if($trendyol_product->row['status'] == 4){
							$status = 1;
						} else {
							$status = 0;
						}
					}
				}
				// ürün title
				if(isset($trendyol_product->row['status']) and $trendyol_product->row['status'] != ''){
					if(!empty($trendyol_product->row['title'])){
						$title = trim($trendyol_product->row['title']);
					}
				}
				
				// ürün fiyatı
				if(isset($trendyol_product->row['price']) and $trendyol_product->row['price'] != '0'){
					$trendyol_price = true;
					$price = $trendyol_product->row['price'];
				}
				// ürün açıklaması
				if(isset($trendyol_product->row['description']) and strip_tags($trendyol_product->row['description']) != ''){
					if(!empty($trendyol_product->row['description'])){
						$description = $trendyol_product->row['description'];
					}
				}
			
				// ürün kategorisi
				if(isset($trendyol_product->row['category']) and $trendyol_product->row['category'] != '' and $trendyol_product->row['category'] != '0'){
					$catid = $trendyol_product->row['category'];
				}
				
				// ürün komisyonu
				if(isset($trendyol_product->row['komisyon']) and $trendyol_product->row['komisyon'] != '0'){
					$commission = $trendyol_product->row['komisyon'];
				}
				if(isset($trendyol_product->row['attr']) and $trendyol_product->row['attr'] != '0'){
					$attr = json_decode($trendyol_product->row['attr']);
				}
			}


			// kategori eşleşmemişse atla
			if(!isset($catid)){
				if($product_id == null){
					return array('status' => 0, 'product_id' => $product_query->row['product_id'], 'msg' => $product_query->row['name'].' ürününün kategorisi eşleşmemiştir!', 'next' => 'index.php?route=trendyol/products/sendProduct&user_token='.$this->session->data['user_token'].'&page='.($page+1));
				} else {
					return array('status' => 0, 'product_id' => $product_query->row['product_id'], 'msg' =>  $product_query->row['name'].' ürününün kategorisi eşleşmemiştir!');
				}
				exit;
			} else {
				if($catid == 0 or empty($catid)){
					if($product_id == null){
						return array('status' => 0, 'product_id' => $product_query->row['product_id'], 'msg' => $product_query->row['name'].' ürününün kategorisi eşleşmemiştir!', 'next' => 'index.php?route=trend/products/sendProduct&user_token='.$this->session->data['user_token'].'&page='.($page+1));
					} else {
						return array('status' => 0, 'product_id' => $product_query->row['product_id'], 'msg' =>  $product_query->row['name'].' ürününün kategorisi eşleşmemiştir!');
					}
					exit;
				}
			}

			// stok sıfırlıyorsa status durumunu daima 1 yapsın
			if($stocksifirla == 1 or $stocksifirla == 2){ $status = 1; }

			// ürün gönderime kapalı ise
			if($status == 0){
				if($product_id == null){
					return array('status' => 0, 'product_id' => $product_query->row['product_id'], 'msg' => $product_query->row['name'].' Bu ürün gönderime kapalıdır!', 'next' => 'index.php?route=trendyol/products/sendProduct&user_token='.$this->session->data['user_token'].'&page='.($page+1));
				} else {
					return array('status' => 0, 'product_id' => $product_query->row['product_id'], 'msg' => $product_query->row['name'].' ürünü gönderime kapalıdır!');
				}
				exit;
			}

			// resim ve ek resimler

			$images = array();
			$images[] = 'http://'.$_SERVER['SERVER_NAME'].'/image/'.$product_query->row["image"];
			$additional_image = $this->db->query("SELECT * FROM  " . DB_PREFIX . "product_image WHERE product_id = '".$product_query->row['product_id']."'");
			foreach ($additional_image->rows as $ekresim) {
				$images[] = 'http://'.$_SERVER['SERVER_NAME'].'/image/'.$ekresim["image"];
			}


			$special_query = $this->db->query("SELECT * FROM ".DB_PREFIX."product_special WHERE product_id = '".$product_query->row['product_id']."' AND customer_group_id = '".$this->config->get("config_customer_group_id")."'");
			if($special_query->num_rows > 0 and $trendyol_price == false){
				$sp_price = $special_query->row['price'];
				// fiyat komisyon ayarlamaları
				if($comission_type == 'yuzde'){
					// yüzde olarak arttır
					$yuzde = ($sp_price / 100) * $commission;
					$sp_price = (float)$sp_price + (float)$yuzde;
				} else if($comission_type == 'sabit'){
					// sabit arttır
					$sp_price = (float)$sp_price +  (float)$commission;
				} else if($comission_type == 'yuzdeazalt'){
					// yüzde azalat
					$yuzde = ($sp_price / 100) *  $commission;
					$sp_price = (float)$sp_price - (float)$yuzde;
				} else if($comission_type == 'sabitazalt'){
					// sabit olarak azalt
					$sp_price = (float)$sp_price -  (float)$commission;
				}
			} else {
				$sp_price = $price;
				$price = (((float)$price / 100) * 20) + (float)$price;
			}

			// marka alalım
			$list_price = 0;
			if(isset($sp_price)){
				$list_price = (float)$price;
				$price = (float)$sp_price;
			}

			$brand_id = 0;
			$manufacturer = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_toopbrand WHERE ocbrand = '".$product_query->row['manufacturer_id']."'");
			if($manufacturer->num_rows > 0){
				$brand_id = $manufacturer->row['trendbrand'];
			}

			$vergi = 18;
			if(!empty($product_query->row['sku'])){
				$barcode = $product_query->row['sku'];
			} else {
				$barcode = $product_query->row['model'];
			}

			$prod_atrrbute = array();
			/*
			$ozellikler = $this->getProductAttributes($product_id);
			if(isset($ozellikler)){
				foreach ($ozellikler as $oz){
					foreach ($oz['attribute'] as $value) {
						$prod_atrrbute['attribute'][] = array('name' => $value['name'], 'value' => $value['text']);
					}
				}
			}
			*/

			// seçenekler
            $secenekler = array();
            $secenekler = $this->getProductOptions($product_query->row['product_id']);
            $secenek_ar = array();
            $options = array();
            if(isset($secenekler)){
	                foreach ($secenekler as $secenek){
	                    $secenek_deger = array();
	                    foreach ($secenek['product_option_value'] as $secenek_val){
	                        $povid = $secenek_val['product_option_value_id'];
	                        $secenk_degeri = $this->db->query("SELECT * FROM  " . DB_PREFIX . "option_value_description WHERE option_value_id = '".$secenek_val['option_value_id']."'");
	                        if($secenek_val['price'] == '0'){
	                            $sec_fiyat = '0';
	                        } else {
	                            if($shop_query->row['tax_option'] == 1){
	                                $sec_fiyat = $this->vergihesapla($secenek_val['price'], $product_query->row['tax_class_id']);
	                            } else {
	                                $sec_fiyat = $secenek_val['price'];
	                            }
	                            if(isset($option_rebate->{$povid})){
	                                $op_commission = $option_rebate->{$povid};
	                                // fiyat komisyon ayarlamaları
	                                if($comission_type == 'yuzde'){
	                                    // yüzde olarak arttır
	                                    $yuzde = ($sec_fiyat / 100) * $op_commission;
	                                    $sec_fiyat = $sec_fiyat + $yuzde;
	                                } else if($comission_type == 'sabit'){
	                                    // sabit arttır
	                                    $sec_fiyat = $sec_fiyat +  $op_commission;
	                                } else if($comission_type == 'yuzdeazalt'){
	                                    // yüzde azalat
	                                    $yuzde = ($s_fiyat / 100) *  $op_commission;
	                                    $sec_fiyat = $sec_fiyat - $yuzde;
	                                } else if($comission_type == 'sabitazalt'){
	                                    // sabit olarak azalt
	                                    $sec_fiyat = $sec_fiyat - $op_commission;
	                                }
	                            } else {
	                                // fiyat komisyon ayarlamaları
	                                if($comission_type == 'yuzde'){
	                                    // yüzde olarak arttır
	                                    $yuzde = ($sec_fiyat / 100) * $commission;
	                                    $sec_fiyat = $sec_fiyat + $yuzde;
	                                } else if($comission_type == 'sabit'){
	                                    // sabit arttır
	                                    $sec_fiyat = $sec_fiyat +  $commission;
	                                } else if($comission_type == 'yuzdeazalt'){
	                                    // yüzde azalat
	                                    $yuzde = ($sec_fiyat / 100) *  $commission;
	                                    $sec_fiyat = $sec_fiyat - $yuzde;
	                                } else if($comission_type == 'sabitazalt'){
	                                    // sabit olarak azalt
	                                    $sec_fiyat = $sec_fiyat - $commission;
	                                }
	                            }

	                        }

	                        $secenek_deger[$secenek['name']][] = $secenk_degeri->row['name'].'|'.$secenek['name'].'|'.$sec_fiyat.'|'.$secenek_val['quantity'].'|'.$secenek['option_id'].'|'.$secenek_val['option_value_id'];
	                    }
	                    if(isset($secenek_deger[$secenek['name']])){
	                        $secenek_ar[] = $secenek_deger[$secenek['name']];
	                }
	            }

	            $secenek_combine = $this->get_combinations($secenek_ar);
	          	
	        }
               
			$product['items'] = array();
			
			if($secenek_ar){
				foreach ($secenek_combine as $ocsecs) {

					foreach ($ocsecs as $ocsec){
						$attrib = $attrcheck = array();
						// seçenekleri ekliyoruz
						$exos = explode('|', $ocsec);
						$atrqry = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_tooption_value WHERE oc_opval_id = '".$exos[5]."' AND oc_optid = '".$exos[4]."'");
						$trendopid = $atrqry->row['trend_optid'];
						if($atrqry->num_rows > 0){
							$attrib[] = array(
								'attributeId' => $atrqry->row['trend_optid'],
								'attributeValueId' => $atrqry->row['trend_opval_id']
							);
							$attrcheck[] = $trendopid;
						}

						// varsa diğer özellikleri ekliyoruz
						if($attr){
							foreach ($attr as $key => $value) {
								if(in_array($key, $attrcheck)) {

								} else {
									if(!empty($value)){
										if((int)$key == 47){
											$attrib[] = array(
												'attributeId' => (int)$key,
												'customAttributeValue' => (string)$value
											);
										} else {
											$attrib[] = array(
												'attributeId' => (int)$key,
												'attributeValueId' => (int)$value
											);
										}
									}
								}
							}
						}

						$product['items'][] = array(
							'barcode'=> (string)$barcode.'-'.$atrqry->row['trend_opval_id'],
							'title'=> (string)$title,
							'productMainId' => (string)$product_query->row['model'],
							'brandId' => (int)$brand_id,
							'categoryId' => (int)$catid,
							'quantity' => (int)$product_query->row['quantity'],
							'stockCode' => (string)$product_query->row['model'],
							'dimensionalWeight' => 1,
							'description' => $description,
							'currencyType' => 'TRY',
							'listPrice' => number_format($list_price, 2, '.', ''),
							'salePrice' => number_format($price, 2, '.', ''),
							'vatRate' => (int)$vergi,
							'cargoCompanyId' => (int)$cargo_company_id,
							'images' => $images,
							'shipmentAddressId' => (int)$shipment_address_id,
							'returningAddressId' => (int)$returning_address_id,
							'attributes' => $attrib
						);
					}
				}

			} else {
				// varsa diğer özellikleri ekliyoruz
				if($attr){
					foreach ($attr as $key => $value) {
						if(!empty($value)){
							if((int)$key == 47){
								$attrib[] = array(
									'attributeId' => (int)$key,
									'customAttributeValue' => (string)$value
								);
							} else {
								$attrib[] = array(
									'attributeId' => (int)$key,
									'attributeValueId' => (int)$value
								);
							}
						}
					}
				}

				$product['items'][] = array(
					'barcode'=> (string)$barcode,
					'title'=> (string)$title,
					'productMainId' => (string)$product_query->row['model'],
					'brandId' => (int)$brand_id,
					'categoryId' => (int)$catid,
					'quantity' => (int)$product_query->row['quantity'],
					'stockCode' => (string)$product_query->row['model'],
					'dimensionalWeight' => 1,
					'description' => $description,
					'currencyType' => 'TRY',
					'listPrice' => number_format($list_price, 2, '.', ''),
					'salePrice' => number_format($price, 2, '.', ''),
					'vatRate' => (int)$vergi,
					'cargoCompanyId' => (int)$cargo_company_id,
					'images' => $images,
					'shipmentAddressId' => (int)$shipment_address_id,
					'returningAddressId' => (int)$returning_address_id,
					'attributes' => $attrib
				);
			}

			print_r($items);


			if($trendyol_product->num_rows > 0 and !empty($trendyol_product->row['batch_request_id'])){
				$ch = curl_init();
				$url = 'https://api.trendyol.com/sapigw/suppliers/'.$supplier_id.'/products/batch-requests/'.$trendyol_product->row['batch_request_id'];
				curl_setopt($ch, CURLOPT_URL,$url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
				curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
				curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($ch, CURLOPT_USERPWD, "$api_username:$api_password");
				$result = curl_exec($ch);
				curl_close($ch);  
				$batch_result = json_decode($result);
				if($product_id == null){
						$gonderilemedi[] = '1';
						$dosya = fopen ($dosya_adi , 'a') or die ("Dosya açılamadı!"); 
						$metin = date('d.m.Y H:i:s')." - Model No : ".$product_query->row["model"]."\r\n"; 
						fputs($dosya , $metin); 
						fclose ($dosya);
						return array('status' => 0, 'product_id' => $product_query->row['product_id'], 'msg' => $metin, 'next' => 'index.php?route=trendyol/products/sendProduct&user_token='.$this->session->data['user_token'].'&page='.($page+1));
				} else {
					$gonderilemedi[] = '1';
					$dosya = fopen ($dosya_adi , 'a') or die ("Dosya açılamadı!"); 
					$metin = date('d.m.Y H:i:s')." - Model No : ".$product_query->row["model"]."\r\n"; 
					fputs($dosya , $metin); 
					fclose ($dosya);
					return array('status' => 0, 'product_id' => $product_query->row['product_id'], 'msg' => $metin);
				}
			} else {
				$url = 'https://api.trendyol.com/sapigw/suppliers/'.$supplier_id.'/v2/products';
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
				curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($ch, CURLOPT_USERPWD, "$api_username:$api_password");
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($product));
				$result = curl_exec($ch);
				curl_close($ch);  
				$sonuc_array = json_decode($result);
				if(isset($sonuc_array->errors)){
					if($product_id == null){
						$gonderilemedi[] = '1';
						$dosya = fopen ($dosya_adi , 'a') or die ("Dosya açılamadı!"); 
						$metin = date('d.m.Y H:i:s')." - Model No : ".$product_query->row["model"]." - ".$sonuc_array->errors[0]->message."\r\n"; 
						fputs($dosya , $metin); 
						fclose ($dosya);
						return array('status' => 0, 'product_id' => $product_query->row['product_id'], 'msg' => $metin, 'next' => 'index.php?route=trendyol/products/sendProduct&user_token='.$this->session->data['user_token'].'&page='.($page+1));
					} else {
						$gonderilemedi[] = '1';
						$dosya = fopen ($dosya_adi , 'a') or die ("Dosya açılamadı!"); 
						$metin = date('d.m.Y H:i:s')." - Model No : ".$product_query->row["model"]." - ".$sonuc_array->errors[0]->message."\r\n"; 
						fputs($dosya , $metin); 
						fclose ($dosya);
						return array('status' => 0, 'product_id' => $product_query->row['product_id'], 'msg' => $metin);
					}
				} else {
					if($product_id == null){
						$url = 'https://api.trendyol.com/sapigw/suppliers/'.$supplier_id.'/products/batch-requests/'.$sonuc_array->batchRequestId;
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL,$url);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
						curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
						curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
						curl_setopt($ch, CURLOPT_USERPWD, "$api_username:$api_password");
						$result = curl_exec($ch);
						curl_close($ch);  
						$batch_result = json_decode($result);
						if($batch_result->failedItemCount > 0){
							$dosya = fopen ($dosya_adi , 'a') or die ("Dosya açılamadı!"); 
							$metin = date('d.m.Y H:i:s')." - Model No : ".$product_query->row["model"]." Gönderilemedi Hata : ".$batch_result->items[0]->failureReasons[0]." Sonuc json : ".$result."\r\n"; 
							fputs($dosya , $metin); 
							fclose ($dosya);
							return array('status' => 1, 'product_id' => $product_query->row['product_id'], 'msg' => $metin, 'next' => 'index.php?route=trendyol/products/sendProduct&user_token='.$this->session->data['user_token'].'&page='.($page+1));
						} else {
							$dosya = fopen ($dosya_adi , 'a') or die ("Dosya açılamadı!"); 
							$metin = date('d.m.Y H:i:s')." - Model No : ".$product_query->row["model"]." Başarıyla Gönderildi. Sonuc json : ".$result."\r\n"; 
							fputs($dosya , $metin); 
							fclose ($dosya);

							$checkp = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_products WHERE product_id = '".$product_query->row['product_id']."'");
							if($checkp->num_rows > 0){
								$this->db->query("UPDATE ".DB_PREFIX."trendyol_products SET batch_request_id = '".$sonuc_array->batchRequestId."' WHERE product_id = '".$product_query->row['product_id']."'");
							} else {
								$this->db->query("INSERT INTO ".DB_PREFIX."trendyol_products SET batch_request_id = '".$sonuc_array->batchRequestId."', product_id = '".$product_query->row['product_id']."'");
							}
							
							return array('status' => 1, 'product_id' => $product_query->row['product_id'], 'msg' => $metin, 'next' => 'index.php?route=trendyol/products/sendProduct&user_token='.$this->session->data['user_token'].'&page='.($page+1));
						}
					} else {
						$url = 'https://api.trendyol.com/sapigw/suppliers/'.$supplier_id.'/products/batch-requests/'.$sonuc_array->batchRequestId;
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL,$url);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
						curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
						curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
						curl_setopt($ch, CURLOPT_USERPWD, "$api_username:$api_password");
						$result = curl_exec($ch);
						curl_close($ch);  
						$batch_result = json_decode($result);
						if($batch_result->failedItemCount > 0){
							$dosya = fopen ($dosya_adi , 'a') or die ("Dosya açılamadı!"); 
							$metin = date('d.m.Y H:i:s')." - Model No : ".$product_query->row["model"]." Gönderilemedi Hata : ".$batch_result->items[0]->failureReasons[0]." Sonuc json : ".$result."\r\n"; 
							fputs($dosya , $metin); 
							fclose ($dosya);
							return array('status' => 1, 'product_id' => $product_query->row['product_id'], 'msg' => $metin);
						} else {
							$dosya = fopen ($dosya_adi , 'a') or die ("Dosya açılamadı!"); 
							$metin = date('d.m.Y H:i:s')." - Model No : ".$product_query->row["model"]." Başarıyla Gönderildi Sonuc json : ".$result."\r\n"; 
							fputs($dosya , $metin); 
							fclose ($dosya);

							$checkp = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_products WHERE product_id = '".$product_query->row['product_id']."'");
							if($checkp->num_rows > 0){
								$this->db->query("UPDATE ".DB_PREFIX."trendyol_products SET batch_request_id = '".$sonuc_array->batchRequestId."' WHERE product_id = '".$product_query->row['product_id']."'");
							} else {
								$this->db->query("INSERT INTO ".DB_PREFIX."trendyol_products SET batch_request_id = '".$sonuc_array->batchRequestId."', product_id = '".$product_query->row['product_id']."'");
							}
							return array('status' => 1, 'product_id' => $product_query->row['product_id'], 'msg' => $metin);
						}
						
					}
				}
			}
		} else {
			// ürün yoksa
			return array('status' => 0, 'product_id' => null, 'msg' => 'Tüm Gönderimler Tamamlandı');
		}
	}


	/* seçenek kombinasyonlarını oluşturuyoruz */
	public function get_combinations($arrays) {

		if(count($arrays) > 1){
			$result = array(array());
			foreach ($arrays as $property => $property_values) {
				$tmp = array();
				foreach ($result as $result_item) {
					foreach ($property_values as $property_value) {
						$tmp[] = array_merge($result_item, array($property => $property_value));
					}
				}
				$result = $tmp;
			}
			return $result;
		} else {
			return $arrays;
		}
	}

	/*  opencart total ürün sayısı */
	public function getOptotalproduct($data = array()){
		$sql = "SELECT COUNT(DISTINCT p.product_id) AS total FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id)";
		$sql .= " WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "'";
		if (isset($data['filter_n11status']) && !is_null($data['filter_n11status'])) {
			if($data['filter_n11status'] == 0){
				$sql .= " AND (p.product_id IN (SELECT product_id FROM " . DB_PREFIX . "n11product WHERE n11_salestatus = '".(int)$data['filter_n11status']."')) OR (p.product_id NOT IN (SELECT product_id FROM ".DB_PREFIX."n11product WHERE p.product_id = product_id))";
			} else if($data['filter_n11status'] == 4){
				$sql .= " AND p.product_id IN (SELECT product_id FROM " . DB_PREFIX . "n11product WHERE n11_salestatus = '".(int)$data['filter_n11status']."')";
			}
		}

		if (!empty($data['filter_category_id'])) {
             $sql .= " AND p.product_id IN (SELECT product_id FROM " . DB_PREFIX . "product_to_category WHERE category_id = " . intVal($data['filter_category_id']) . ")";
         }

        if(!empty($data['filter_eslesme'])){
            if($data['filter_eslesme'] == 1){
                // birebir eşleştirilenler
                $sql .= " AND p.product_id IN (SELECT product_id FROM " . DB_PREFIX . "n11product WHERE shop_id = '".$data['shop_id']."' AND n11_catid != '')";
            } else if($data['filter_eslesme'] == 3){
                // Birebir eşleştirilmemişler
                $sql .= " AND p.product_id NOT IN (SELECT product_id FROM " . DB_PREFIX . "n11product WHERE shop_id = '".$data['shop_id']."' AND  n11_catid != '')";
            }
        }

        if (!empty($data['filter_manufacturer_id'])) {
            $sql .= " AND p.manufacturer_id = " . intVal($data['filter_manufacturer_id']);
        }

		if (!empty($data['filter_name'])) {
			$sql .= " AND pd.name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

		if (!empty($data['filter_model'])) {
			$sql .= " AND p.model LIKE '" . $this->db->escape($data['filter_model']) . "%'";
		}

		if (isset($data['filter_price']) && !is_null($data['filter_price'])) {
			$sql .= " AND p.price LIKE '" . $this->db->escape($data['filter_price']) . "%'";
		}

		if (isset($data['filter_quantity']) && !is_null($data['filter_quantity'])) {
			$sql .= " AND p.quantity = '" . (int)$data['filter_quantity'] . "'";
		}

		if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
			$sql .= " AND p.status = '" . (int)$data['filter_status'] . "'";
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}

	/* opencart ürünleri alalım */
	public function getOpproducts($data=array()){
		$sql = "SELECT p.image, p.product_id, pd.name, p.model, p.price, p.quantity, p.status FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "'";

		if (isset($data['filter_trendstatus']) && !is_null($data['filter_trendstatus'])) {
			if($data['filter_trendstatus'] == 0){
				$sql .= " AND (p.product_id IN (SELECT product_id FROM " . DB_PREFIX . "trendyol_products WHERE status = '".(int)$data['filter_trendstatus']."')) OR (p.product_id NOT IN (SELECT product_id FROM ".DB_PREFIX."trendyol_products WHERE p.product_id = product_id))";
			} else if($data['filter_trendstatus'] == 4){
				$sql .= " AND p.product_id IN (SELECT product_id FROM " . DB_PREFIX . "trendyol_products WHERE status = '".(int)$data['filter_trendstatus']."')";
			}
		}

		if (!empty($data['filter_category_id'])) {
             $sql .= " AND p.product_id IN (SELECT product_id FROM " . DB_PREFIX . "product_to_category WHERE category_id = " . intVal($data['filter_category_id']) . ")";
         }

        if(!empty($data['filter_eslesme'])){
            if($data['filter_eslesme'] == 1){
                // birebir eşleştirilenler
                $sql .= " AND p.product_id IN (SELECT product_id FROM " . DB_PREFIX . "trendyol_products WHERE category != '' OR category != '0')";
            } else if($data['filter_eslesme'] == 3){
                // Birebir eşleştirilmemişler
                $sql .= " AND p.product_id NOT IN (SELECT product_id FROM " . DB_PREFIX . "trendyol_products WHERE category != '' OR category != '0')";
            }
        }

        if (!empty($data['filter_manufacturer_id'])) {
            $sql .= " AND p.manufacturer_id = " . intVal($data['filter_manufacturer_id']);
        }

		if (!empty($data['filter_name'])) {
			$sql .= " AND pd.name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

		if (!empty($data['filter_model'])) {
			$sql .= " AND p.model LIKE '" . $this->db->escape($data['filter_model']) . "%'";
		}

		if (isset($data['filter_price']) && !is_null($data['filter_price'])) {
			$sql .= " AND p.price LIKE '" . $this->db->escape($data['filter_price']) . "%'";
		}

		if (isset($data['filter_quantity']) && !is_null($data['filter_quantity'])) {
			$sql .= " AND p.quantity = '" . (int)$data['filter_quantity'] . "'";
		}

		if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
			$sql .= " AND p.status = '" . (int)$data['filter_status'] . "'";
		}


		$sql .= " GROUP BY p.product_id";

		$sort_data = array(
			'pd.name',
			'p.model',
			'p.price',
			'p.quantity',
			'p.status',
			'p.sort_order'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY p.product_id";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$query = $this->db->query($sql);
		$option_data = array();
		foreach ($query->rows as $product) {
			$prdattr = $this->db->query("SELECT attr FROM ".DB_PREFIX."trendyol_products WHERE product_id = '".$product['product_id']."'");
			if($prdattr->num_rows > 0 and !empty($prdattr->row['attr'])){
				$product['setattr'] = 1;
			} else {
				$product['setattr'] = 0;
			}
			$options = $this->getProductOptions($product['product_id']);
			//print_r($options[0]['product_option_value']);
			
			if(isset($options[0]) and count($options[0]['product_option_value']) > 0){
				foreach ($options[0]['product_option_value'] as $pov) {
					//$pov_data = $this->db->query("SELECT * FROM ".DB_PREFIX."product_option_value_data WHERE product_id = '".$product['product_id']."' AND product_option_value_id = '".$pov['product_option_value_id']."'");
					
					

						$pov_desc = $this->db->query("SELECT name FROM ".DB_PREFIX."option_value_description WHERE option_value_id = '".$pov['option_value_id']."'")->row;
						$pavid = $product['product_id'].$pov['product_option_value_id'];
						$trend_prod = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_products_sending WHERE product_option_value_id = '".$pov['product_option_value_id']."'");
						$barcode = '';
						$model = $product['model'].'-'.$pov['product_option_value_id'];
						$sku = '';
						if($trend_prod->num_rows > 0){
							$product_data[$pavid] = array(
								'product_data' => $product,
								'trend_data'  => $trend_prod->row,
								'option_data' => array(
									'name' => $pov_desc['name'],
									'quantity' => $pov['quantity'],
									'barcode' => $barcode,
									'model' => $model,
									'sku' => $sku
								)
							);
						} else {
							$product_data[$pavid] = array(
								'product_data' => $product,
								'trend_data'  => null,
								'option_data' => array(
									'name' => $pov_desc['name'],
									'quantity' => $pov['quantity'],
									'barcode' => $barcode,
									'model' => $model,
									'sku' => $sku
								)
							);
						}
					
				}
			}
		}

		return $product_data;
	}

	/* ürün özellikleri */
	public function getProductAttributes($product_id) {
		$product_attribute_group_data = array();
		$product_attribute_group_query = $this->db->query("SELECT ag.attribute_group_id, agd.name FROM " . DB_PREFIX . "product_attribute pa LEFT JOIN " . DB_PREFIX . "attribute a ON (pa.attribute_id = a.attribute_id) LEFT JOIN " . DB_PREFIX . "attribute_group ag ON (a.attribute_group_id = ag.attribute_group_id) LEFT JOIN " . DB_PREFIX . "attribute_group_description agd ON (ag.attribute_group_id = agd.attribute_group_id) WHERE pa.product_id = '" . (int)$product_id . "' AND agd.language_id = '" . (int)$this->config->get('config_language_id') . "' GROUP BY ag.attribute_group_id ORDER BY ag.sort_order, agd.name");
		foreach ($product_attribute_group_query->rows as $product_attribute_group) {
			$product_attribute_data = array();
			$product_attribute_query = $this->db->query("SELECT a.attribute_id, ad.name, pa.text FROM " . DB_PREFIX . "product_attribute pa LEFT JOIN " . DB_PREFIX . "attribute a ON (pa.attribute_id = a.attribute_id) LEFT JOIN " . DB_PREFIX . "attribute_description ad ON (a.attribute_id = ad.attribute_id) WHERE pa.product_id = '" . (int)$product_id . "' AND a.attribute_group_id = '" . (int)$product_attribute_group['attribute_group_id'] . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND pa.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY a.sort_order, ad.name");
			foreach ($product_attribute_query->rows as $product_attribute) {
				$product_attribute_data[] = array(
					'attribute_id' => $product_attribute['attribute_id'],
					'name'         => $product_attribute['name'],
					'text'         => $product_attribute['text']
				);
			}
			$product_attribute_group_data[] = array(
				'attribute_group_id' => $product_attribute_group['attribute_group_id'],
				'name'               => $product_attribute_group['name'],
				'attribute'          => $product_attribute_data
			);
		}

		return $product_attribute_group_data;
	}


	/*
	  ürün seçenekleri
	*/
	public function getProductOptions($product_id) {
		$product_option_data = array();

		$product_option_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_option` po LEFT JOIN `" . DB_PREFIX . "option` o ON (po.option_id = o.option_id) LEFT JOIN `" . DB_PREFIX . "option_description` od ON (o.option_id = od.option_id) WHERE po.product_id = '" . (int)$product_id . "' AND od.language_id = '" . (int)$this->config->get('config_language_id') . "'");

		foreach ($product_option_query->rows as $product_option) {
			$product_option_value_data = array();

			$product_option_value_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option_value WHERE product_option_id = '" . (int)$product_option['product_option_id'] . "'");

			foreach ($product_option_value_query->rows as $product_option_value) {
				$product_option_value_data[] = array(
					'product_option_value_id' => $product_option_value['product_option_value_id'],
					'option_value_id'         => $product_option_value['option_value_id'],
					'quantity'                => $product_option_value['quantity'],
					'subtract'                => $product_option_value['subtract'],
					'price'                   => $product_option_value['price'],
					'price_prefix'            => $product_option_value['price_prefix'],
					'points'                  => $product_option_value['points'],
					'points_prefix'           => $product_option_value['points_prefix'],
					'weight'                  => $product_option_value['weight'],
					'weight_prefix'           => $product_option_value['weight_prefix']
				);
			}

			$product_option_data[] = array(
				'product_option_id'    => $product_option['product_option_id'],
				'product_option_value' => $product_option_value_data,
				'option_id'            => $product_option['option_id'],
				'name'                 => $product_option['name'],
				'type'                 => $product_option['type'],
				'value'                => $product_option['value'],
				'required'             => $product_option['required']
			);
		}

		return $product_option_data;
	}

	public function dosya_indir($link, $name = null, $path){
		$link_info = pathinfo($link);
		if(isset($link_info['extension'])){
			$uzanti = strtolower($link_info['extension']);
			$file = ($name) ? $name.'.'.$uzanti : $link_info['basename'];
			$yolcuk = DIR_IMAGE."catalog/".$path."/".$file;
			if (!file_exists(DIR_IMAGE."catalog/".$path)) {
			    mkdir(DIR_IMAGE."catalog/".$path, 0777, true);
			}
			if(!file_exists($yolcuk)){
				$curl = curl_init($link);
				$fopen = fopen($yolcuk,'w');
				curl_setopt($curl, CURLOPT_HEADER,0);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
				curl_setopt($curl, CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_0);
				curl_setopt($curl, CURLOPT_FILE, $fopen);
				curl_exec($curl);
				curl_close($curl);
				fclose($fopen);
			}
			return str_replace(DIR_IMAGE, '',$yolcuk);
		} else {
			return 'placeholder.png';
		}
	}

}
?>
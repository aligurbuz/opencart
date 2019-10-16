<?php 
class ControllerProductLiveprice extends Controller {
	public function index() {
		$json = array();
		$options_makeup = 0;
		
		if (isset($this->request->post['product_id'])) {
			$product_id = (int)$this->request->post['product_id'];
		} else {
			$product_id = 0;
		}
				
		$this->language->load('product/product');
		$this->load->model('catalog/product');
							
		$product_info = $this->model_catalog_product->getProduct($product_id);
			
		// Prepare data
		if ($product_info) {
			if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                    $data['price'] = $product_info['price'];
                } else {
				$data['price'] = false;
			}
							
			if ((float)$product_info['special']) {
                    $data['special'] = $product_info['special'];
                } else {
				$data['special'] = false;
			}

			if (isset($this->request->post['option']) && $this->request->post['option']) {
                    foreach ($this->model_catalog_product->getProductOptions($product_id) as $option) {
                        foreach ($option['product_option_value'] as $option_value) {
                            //If options checkbox
                            if(isset($this->request->post['option'][$option['product_option_id']]) && is_array($this->request->post['option'][$option['product_option_id']])) {
                                array_filter($this->request->post['option'][$option['product_option_id']]);
                                foreach($this->request->post['option'][$option['product_option_id']] as $checked_option) {
                                    if ($checked_option == $option_value['product_option_value_id']) {
                                        if (!$option_value['subtract'] || ($option_value['quantity'] > 0)) {
                                            if ((($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) && (float)$option_value['price']) {
                                                $price = $option_value['price'];
                                            } else {
                                                $price = false;
                                            }
                                            if ($price) {
                                                if ($option_value['price_prefix'] === '+') {
                                                    $options_makeup = $options_makeup + (float)$price;
                                                } else {
                                                    $options_makeup = $options_makeup - (float)$price;
                                                }
                                            }
                                        }
                                    }
                                }
                            }

                            //If options not checkbox
                            if (isset($this->request->post['option'][$option['product_option_id']]) && $this->request->post['option'][$option['product_option_id']] == $option_value['product_option_value_id']) {
                                if (!$option_value['subtract'] || ($option_value['quantity'] > 0)) {
                                    if ((($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) && (float)$option_value['price']) {
                                        $price = $option_value['price'];
                                    } else {
                                        $price = false;
                                    }
                                    if ($price) {
                                        if ($option_value['price_prefix'] === '+') {
                                            $options_makeup = $options_makeup + (float)$price;
                                        } else {
                                            $options_makeup = $options_makeup - (float)$price;
                                        }
                                    }
                                }
                            }
                        }
                        unset($price);
                    }
			}
				
			if ($data['price']) {
				$json['new_price']['price'] = $this->currency->format($this->tax->calculate(($data['price'] + $options_makeup), $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
			} else {
				$json['new_price']['price'] = false;
			}
				
			if ($data['special']) {
				$json['new_price']['special'] = $this->currency->format($this->tax->calculate(($data['special'] + $options_makeup), $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
			} else {
				$json['new_price']['special'] = false;
			}
		
			if ($this->config->get('config_tax')) {
				$json['new_price']['tax'] = $this->currency->format(((float)$product_info['special'] ? ($product_info['special'] + $options_makeup) : ($product_info['price'] + $options_makeup))  , $this->session->data['currency']);
			} else {
				$json['new_price']['tax'] = false;
			}
			
			$json['success'] = true;
		} else {
			$json['success'] = false;
		}
				
		echo json_encode($json);
		exit;
  	}
}
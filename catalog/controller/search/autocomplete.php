<?php 
class ControllerSearchAutocomplete extends Controller {
	public function index() {
		$json = array();
		
		if (isset($this->request->get['filter_name'])) {
			$this->load->model('catalog/product');
			$this->load->model('tool/image');
			
			if (isset($this->request->get['filter_name'])) {
				$filter_name = $this->request->get['filter_name'];
			} else {
				$filter_name = '';
			}		
						
			$data = array(
				'filter_name'  => $filter_name,
				'start'        => 0,
				'limit'        => 6
			);
			
			$results = $this->model_catalog_product->getProducts($data);
			
			foreach ($results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], 930, 1163);
				} else {
					$image = false;
				}
				
				if ($this->config->get('config_review_status')) {
					$rating = $result['rating'];
				} else {
					$rating = false;
				}
				
					if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
						$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					} else {
						$price = false;
					}

					if ((float)$result['special']) {
						$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					} else {
						$special = false;
					}
					
				$json[] = array(
					'product_id' => $result['product_id'],
					'thumb'   	 => $image,
					'name'       => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8')),	
					'desc' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 45) . '..',
					'price'   	 => $price,
					'href'    	 => html_entity_decode($this->url->link('product/product', 'product_id=' . $result['product_id']), ENT_QUOTES, 'UTF-8'),
				);	
			}
		}

		$this->response->setOutput(json_encode($json));
	}
}
?>

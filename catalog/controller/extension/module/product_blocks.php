<?php  
/* 
Version: 1.0
Author: Artur Sułkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModuleProductBlocks extends Controller {
	public function index($setting) {
		if(isset($setting['html'][$this->config->get('config_language_id')])) {
			$data['text'] = html_entity_decode($setting['html'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
		} else {
			$data['text'] = 'You must set text in the module Custom Module!';
		}
		
		if(isset($setting['block_name'][$this->config->get('config_language_id')])) {
			$data['block_name'] = html_entity_decode($setting['block_name'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
		} else {
			$data['block_name'] = 'Request a qoute!';
		}
		
		if (isset($this->request->get['product_id'])) {
			$data['product_id'] = (int)$this->request->get['product_id'];
		} else {
			$data['product_id'] = 0;
		}
		
		$data['icon'] = $setting['icon'];
		$data['icon_position'] = $setting['icon_position'];
		if(!isset($setting['popup_module'])) $setting['popup_module'] = 0;
		$data['popup_module'] = $setting['popup_module'];
		$data['type'] = $setting['type'];
		$status = false;
		
		if($setting['show_on_products_from'] == 'all') $status = true;
				
		if($setting['show_on_products_from'] == 'products') {
		     if (isset($this->request->get['product_id'])) {
		     	$product_id = (int)$this->request->get['product_id'];
		     } else {
		     	$product_id = 0;
		     }
		
		     $products = explode(',', $setting['products']);
		     foreach ($products as $product) {
		          if($product == $product_id) $status = true;
		     }
		}
		
		if($setting['show_on_products_from'] == 'categories') {
		     if (isset($this->request->get['product_id'])) {
		     	$product_id = (int)$this->request->get['product_id'];
		     } else {
		     	$product_id = 0;
		     }
		     
		     $this->load->model('catalog/products');
		     $category_id = $this->model_catalog_products->getCategoryId($product_id);
		     
		     $categories = explode(',', $setting['categories']);
		     if(!isset($_GET['path'])) $_GET['path'] = 0;
		     foreach ($categories as $category) {
		          if($category == $category_id['category_id'] || $category == intval($_GET['path']) || strpos($_GET['path'], $category . '_') || strpos($_GET['path'], '_' . $category)) $status = true;
		     }
		}
		
		if($setting['show_on_products_from'] == 'out') {
		     if (isset($this->request->get['product_id'])) {
		     	$product_id = (int)$this->request->get['product_id'];
		     } else {
		     	$product_id = 0;
		     }
		     
		     $this->load->model('catalog/products');
		     $product_info = $this->model_catalog_products->getProduct($product_id);
		     if($product_info['quantity'] < 1) $status = true;
		}
		
		if($status) {
     		return $this->load->view('extension/module/product_blocks', $data);
		}
	}
}
?>
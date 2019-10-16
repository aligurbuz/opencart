<?php  
/* 
Version: 1.0
Author: Artur Sułkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModuleCategoryWall extends Controller {
	public function index($setting) {
		if(isset($setting['block_heading'][$this->config->get('config_language_id')])) {
			$data['block_heading'] = html_entity_decode($setting['block_heading'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
			if($data['block_heading'] == '') $data['block_heading'] = 'All categories';
		} else {
			$data['block_heading'] = 'All categories';
		}
		
		if(isset($setting['more'][$this->config->get('config_language_id')])) {
			$data['more_text'] = html_entity_decode($setting['more'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
			if($data['more_text'] == '') $data['more_text'] = 'More...';
		} else {
			$data['more_text'] = 'More...';
		}
		
		// Liczba kategorii w jednym rzędzie
		$data['category_number'] = $setting['category_number'];
		
		// Generate categories
		$data['categories'] = array();
		$categories = $this->model_catalog_category->getCategories(0);
		foreach($categories as $category) {
			$image = false;
			if($setting['status_category_icon'] != '2') {
				$image_width = 200;
				$image_height = 200;
				if($setting['category_icon_width'] > 0) $image_width = $setting['category_icon_width'];
				if($setting['category_icon_height'] > 0) $image_height = $setting['category_icon_height'];
				$image_url = 'no_image.jpg';
				if($category['image'] != '') $image_url = $category['image'];
				$image = $this->model_tool_image->resize($image_url, $image_width, $image_height);
			}
			
			$children_data = array();
			$children = $this->model_catalog_category->getCategories($category['category_id']);
			$i = 0;
			foreach($children as $child) {
				if($i < $setting['subcategory_number']) {
					$filter_data = array(
						'filter_category_id'  => $child['category_id'],
						'filter_sub_category' => true
					);
					
					$children_data[] = array(
						'name'  => $child['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
						'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'])
					);	
					
					$i++;
				}
			}
			
			$data['categories'][] = array(
				'name'     => $category['name'],
				'image'    => $image,
				'children' => $children_data,
				'href'     => $this->url->link('product/category', 'path=' . $category['category_id'])
			);
		}
		
		return $this->load->view('extension/module/category_wall', $data);
	}
}
?>
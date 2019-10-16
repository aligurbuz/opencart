<?php  
/* 
Version: 1.0
Author: Artur SuÅkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModuleBlogCategory extends Controller {
	public function index($setting) {
		
		$this->load->language('blog/blog');

		$this->load->model('blog/category');
                                
        $data['position'] = $setting['position'];
		
        if(isset($setting['heading_title'][$this->config->get('config_language_id')])){
            $data['heading_title'] = $setting['heading_title'][$this->config->get('config_language_id')];
        }else{
            $data['heading_title'] = $this->language->get('heading_category_title');
        }

		if (isset($this->request->get['path'])) {
			$parts = explode('_', (string)$this->request->get['path']);
		} else {
			$parts = array();
		}

		if (isset($parts[0])) {
			$data['category_id'] = $parts[0];
		} else {
			$data['category_id'] = 0;
		}

		if (isset($parts[1])) {
			$data['child_id'] = $parts[1];
		} else {
			$data['child_id'] = 0;
		}


		$data['categories'] = array();

		$categories = $this->model_blog_category->getCategories(0);

		foreach ($categories as $category) {
			$children_data = array();

            $children = $this->model_blog_category->getCategories($category['category_id']);

            foreach($children as $child) {
                $filter_data = array('filter_category_id' => $child['category_id'], 'filter_sub_category' => true);

                $children_data[] = array(
                    'category_id' => $child['category_id'],
                    'name' => $child['name'],
                    'href' => $this->url->link('blog/blog', 'path=' . $category['category_id'] . '_' . $child['category_id'])
                );
            }

			$filter_data = array(
				'filter_category_id'  => $category['category_id'],
				'filter_sub_category' => true
			);

			$data['categories'][] = array(
				'category_id' => $category['category_id'],
				'name'        => $category['name'],
				'children'    => $children_data,
				'href'        => $this->url->link('blog/blog', 'path=' . $category['category_id'])
			);
		}

		return $this->load->view('extension/module/blog_category', $data);
	}
}
?>
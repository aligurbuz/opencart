<?php  
/* 
Version: 1.0
Author: Artur Sułkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModuleBlogTags extends Controller {
	public function index($setting) {
		
		$this->load->language('blog/blog');

		$this->load->model('blog/article');
                                
        $data['position'] = $setting['position'];
		
        if(isset($setting['heading_title'][$this->config->get('config_language_id')])){
            $data['heading_title'] = $setting['heading_title'][$this->config->get('config_language_id')];
        }else{
            $data['heading_title'] = $this->language->get('heading_tags_title');
        }
        
        $data['config'] = $this->config;
	
		$data['tags'] = array();
		$tags = $this->model_blog_article->getPopularTags();
        if(!empty($tags)){
            foreach($tags as $tag => $value){
                
                $data['tags'][] = array(
                    'tag'  => trim($tag),
                    'value'  => $value,
                    'href' => $this->url->link('blog/blog', 'tag=' . trim(urlencode($tag)))
                );
            }
        }

		return $this->load->view('extension/module/blog_tags', $data);
	}
}
?>
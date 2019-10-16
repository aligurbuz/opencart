<?php  
/* 
Version: 1.0
Author: Kamil Hudecki
*/

class ControllerBlogArticle extends Controller {
	private $error = array();
	private $settings = array();

    public function __construct($registry) {
        parent::__construct($registry);
                        
        if (file_exists(DIR_TEMPLATE . $this->config->get('theme_' . $this->config->get('config_theme') . '_directory') . '/css/blog/article.css')) {
            $this->document->addStyle('catalog/view/theme/' . $this->config->get('theme_' . $this->config->get('config_theme') . '_directory') . '/css/blog/article.css');
        }
      
        $this->load->language('blog/blog');

		$this->load->model('blog/category');
		$this->load->model('blog/author');
		$this->load->model('blog/comment');
		$this->load->model('blog/settings');

		$this->load->model('blog/article');
                
        // load blog settings
        $this->settings = $this->model_blog_settings->getSettings();
        
    }
    
    public function index()
    {
				
		$this->load->model('tool/image');
		
	
        if(isset($this->request->get['article_id'])){
        
            
            $data['text_empty'] = $this->language->get('text_empty');
            $data['text_quantity'] = $this->language->get('text_quantity');
            $data['text_sort'] = $this->language->get('text_sort');
            $data['text_limit'] = $this->language->get('text_limit');
            $data['text_comments'] = $this->language->get('text_comments');
            $data['text_read_more'] = $this->language->get('text_read_more');
            $data['text_posted_by'] = $this->language->get('text_posted_by');
            $data['text_category'] = $this->language->get('text_category');
            $data['text_tags'] = $this->language->get('text_tags');
            $data['text_no_comments'] = $this->language->get('text_no_comments');
            $data['text_leave_reply'] = $this->language->get('text_leave_reply');
            $data['text_required_info'] = $this->language->get('text_required_info');
            $data['text_name'] = $this->language->get('text_name');
            $data['text_email'] = $this->language->get('text_email');
            $data['text_content'] = $this->language->get('text_content');
            $data['text_related_products'] = $this->language->get('text_related_products');
            $data['text_related_articles'] = $this->language->get('text_related_articles');

            $data['button_continue'] = $this->language->get('button_continue');
            $data['button_list'] = $this->language->get('button_list');
            $data['button_grid'] = $this->language->get('button_grid');
            $data['button_read_more'] = $this->language->get('button_read_more');
            $data['button_post_comment'] = $this->language->get('button_post_comment');
            $data['button_cart'] = $this->language->get('button_cart');
            
            $data['settings'] = $this->settings;
            
            $article_info = $this->model_blog_article->getArticle($this->request->get['article_id']);

            $article_categories = $this->model_blog_article->getArticleCategories($article_info['article_id']);
            $article_galleries = $this->model_blog_article->getArticleGalleries($article_info['article_id']);
            
            //prepare main image/video
            foreach($article_categories as &$category){
                $category['href'] = $this->url->link('blog/blog', 'path=' . $this->model_blog_category->getCategoryPath($category['category_id']));
            }

            $data['article'] = array(
                'article_id'  => $article_info['article_id'],
                'title'        => $article_info['title'],
                'description' => html_entity_decode($article_info['description'], ENT_QUOTES, 'UTF-8'),
                'content' => html_entity_decode($article_info['content'], ENT_QUOTES, 'UTF-8'),
                'date_published'   =>  $article_info['date_published'],
                'tags'   =>  $article_info['tags'],
                'status_comments'   =>  $article_info['status_comments'],
                'categories'   =>  $article_categories,
                'article_list_gallery_display'   =>  $article_info['article_list_gallery_display'],
                'gallery'   =>  $article_galleries,
                'comments_count'   =>  $this->model_blog_comment->getTotalCommentsForArticle($article_info['article_id']),
            );
            
			$data['tags'] = array();

			if ($article_info['tags']) {
				$tags = explode(',', $article_info['tags']);

				foreach ($tags as $tag) {
					$data['tags'][] = array(
						'tag'  => trim($tag),
						'href' => $this->url->link('blog/blog', 'tag=' . trim($tag))
					);
				}
			}
            
            // Author
            $data['author'] = $this->model_blog_author->getAuthor($article_info['author_id']);

            if(!empty($data['author'])){
                $data['author']['thumb'] = $this->model_tool_image->resize($data['author']['image'], 160, 160);
                $data['author']['description'] = html_entity_decode($data['author']['description'], ENT_QUOTES, 'UTF-8');
                $data['author']['href'] =  $this->url->link('blog/blog', 'author=' . $article_info['author_id']);
            }               
            // Comments
            $data['comments'] = $this->model_blog_comment->getComments($article_info['article_id']);
            foreach ($data['comments'] as &$comment){
                $comment['content'] = html_entity_decode($comment['content'], ENT_QUOTES, 'UTF-8');
            }
            
            // RELATED PRODUCT
            $this->load->model('catalog/product');
            
            $results = $this->model_blog_article->getProductRelated($article_info['article_id']);
            $data['products'] = array();
            
            if(!empty($results)){
                foreach ($results as $product_id) {
                    $result = $this->model_catalog_product->getProduct($product_id);

                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_height'));
                    } else {
                        $image = $this->model_tool_image->resize('placeholder.png', $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_height'));
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

					if ($this->config->get('config_tax')) {
						$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
					} else {
						$tax = false;
					}

                    if ($this->config->get('config_review_status')) {
                        $rating = (int)$result['rating'];
                    } else {
                        $rating = false;
                    }

                    $data['products'][] = array(
                        'product_id'  => $result['product_id'],
                        'thumb'       => $image,
                        'name'        => $result['name'],
					'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
                        'price'       => $price,
                        'special'     => $special,
                        'tax'         => $tax,
                        'minimum'     => $result['minimum'] > 0 ? $result['minimum'] : 1,
                        'rating'      => $rating,
                        'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id'])
                    );
                }
            }
            
            // RELATED ARTICLE
            
            $results = $this->model_blog_article->getArticleRelated($article_info['article_id']);
            
            $data['article_id'] = $article_info['article_id'];
            $data['articles'] = array();

            if(!empty($results)){
                foreach ($results as $article_id) {
                    $result = $this->model_blog_article->getArticle($article_id);
                    $thumb = false;
                    if(!empty($result['image'])){
                        $thumb = $result['image'];
                    }
                    if($thumb){
                        $this->load->model('tool/image');

                        $thumb = $this->model_tool_image->resize($thumb, $this->settings['gallery_related_article_width'], $this->settings['gallery_related_article_height']);
                    }
                    
                    $tags_array = array();
                    
                    if ($result['tags']) {
                         $tags = explode(',', $result['tags']);
                         foreach ($tags as $tag) {
                              $tags_array[] = array(
                                   'tag'  => trim($tag),
                                   'href' => $this->url->link('blog/blog', 'tag=' . trim($tag))
                              );
                         }
                    }

                    $data['articles'][] = array(
                        'article_id'  => $result['article_id'],
                        'title'        => $result['title'],
                        'description' => html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'),
                        'date_published'   =>  $result['date_published'],
                        'tags' => $tags_array,
                        'thumb'     => $thumb,
                        'href'        => $this->url->link('blog/article', (isset($this->request->get['path']) ? 'path=' . $this->request->get['path'] . '&' : '') .'article_id=' . $result['article_id'])
                    );
                }
            }
            
            $data['breadcrumbs'] = array();

            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('text_home'),
                'href' => $this->url->link('common/home')
            );
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('text_blog'),
                'href' => $this->url->link('blog/blog')
            );
            
            $path = '';
            if (isset($this->request->get['path'])) {
                $path = $this->request->get['path'];
            } else if(!empty ($article_categories)){
                $first_category = reset($article_categories);
                $path = $this->model_blog_category->getCategoryPath($first_category['category_id']);
            }
                

            if ($path) {
                $url = '';

                $path_new = '';

                $parts = explode('_', (string)$path);

                $category_id = (int)array_pop($parts);

                foreach ($parts as $path_id) {
                    if (!$path) {
                        $path_new = (int)$path_id;
                    } else {
                        $path_new .= '_' . (int)$path_id;
                    }

                    $category_info = $this->model_blog_category->getCategory($path_id);

                    if ($category_info) {
                        $data['breadcrumbs'][] = array(
                            'text' => $category_info['name'],
                            'href' => $this->url->link('blog/blog', 'path=' . $path_new . $url)
                        );
                    }
                }
                
                $category_info = $this->model_blog_category->getCategory($category_id);
                if ($category_info) {
                    // Set the last category breadcrumb
                    $data['breadcrumbs'][] = array(
                        'text' => $category_info['name'],
                        'href' => $this->url->link('blog/blog', 'path=' . $path)
                    );
                }
            } 
            
            $url = '';
            $this->document->setTitle($article_info['meta_title']);
            $this->document->setDescription($article_info['meta_description']);
            $this->document->setKeywords($article_info['meta_keyword']);

            $data['heading_title'] = $article_info['title'];


            // Set the last category breadcrumb
            $data['breadcrumbs'][] = array(
                'text' => $article_info['title'],
                'href' => $this->url->link('blog/article', 'article_id=' . $article_info['article_id'])
            );



            $data['continue'] = $this->url->link('common/home');

            $data['column_left'] = $this->load->controller('common/column_left');
            $data['column_right'] = $this->load->controller('common/column_right');
            $data['content_top'] = $this->load->controller('common/content_top');
            $data['content_bottom'] = $this->load->controller('common/content_bottom');
            $data['footer'] = $this->load->controller('common/footer');
            $data['header'] = $this->load->controller('common/header');

            if($this->settings['comments_engine'] == 'FACEBOOK'){
                $data['header'] = $this->injectFacebookMeta($data['header']);
            }

           $this->response->setOutput($this->load->view('blog/article_detail/' . str_replace(array('.tpl', '.twig'), '', $this->settings['article_detail_template']), $data));
            
            
		} else {
			$url = '';

			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_error'),
				'href' => $this->url->link('blog/blog', $url)
			);

			$this->document->setTitle($this->language->get('text_error'));

			$data['heading_title'] = $this->language->get('text_error');

			$data['text_error'] = $this->language->get('text_error');

			$data['button_continue'] = $this->language->get('button_continue');

			$data['continue'] = $this->url->link('common/home');

			$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view('error/not_found', $data));
		}
	}
    
    
	public function write() {
		$this->load->language('blog/blog');

		$json = array();

		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 55)) {
				$json['error'] = $this->language->get('error_name');
			}
			if ((utf8_strlen($this->request->post['email']) < 3) || (utf8_strlen($this->request->post['email']) > 55)) {
				$json['error'] = $this->language->get('error_email');
			}
            
			if ( !preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i', $this->request->post['email'])) {
				$json['error'] = $this->language->get('error_email_syntax');
			}
            

			if ((utf8_strlen($this->request->post['content']) < 10) || (utf8_strlen($this->request->post['content']) > 1000)) {
				$json['error'] = $this->language->get('error_content');
			}


			if (!isset($json['error'])) {
				$this->load->model('blog/comment');

                if($this->model_blog_settings->getSetting('comments_approval') == 1){
                    $this->request->post['status'] = 0;
                    $success = $this->language->get('text_success_approval');
                } else{
                    $this->request->post['status'] = 1;
                    $success = $this->language->get('text_success');
                }
                
                
                
				$this->model_blog_comment->addComment($this->request->get['article_id'], $this->request->post);

				$json['success'] = $success;
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
    
    private function injectFacebookMeta($header)
    {
        $meta = '<meta property="fb:admins" content="'.$this->settings['facebook_id'].'"/>
                ';
        $headers = explode('<head>', $header);
        $headers[0] .= $meta;
        return implode('', $headers);
    }
         
    
}
?>
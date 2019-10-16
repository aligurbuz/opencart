<?php  
/* 
Version: 1.0
Author: Kamil Hudecki
*/

class ControllerBlogBlog extends Controller {
	private $error = array();
    private $settings = array();

    public function __construct($registry) {
        parent::__construct($registry);
                        
        if (file_exists(DIR_TEMPLATE . $this->config->get('theme_' . $this->config->get('config_theme') . '_directory') . '/css/blog/blog.css')) {
            $this->document->addStyle('catalog/view/theme/' . $this->config->get('theme_' . $this->config->get('config_theme') . '_directory') . '/css/blog/blog.css');
        }
        if (file_exists(DIR_TEMPLATE . $this->config->get('theme_' . $this->config->get('config_theme') . '_directory') . '/js/masonry.pkgd.min.js')) {
            $this->document->addScript('catalog/view/theme/' . $this->config->get('theme_' . $this->config->get('config_theme') . '_directory') . '/js/masonry.pkgd.min.js');
        }
        if (file_exists(DIR_TEMPLATE . $this->config->get('theme_' . $this->config->get('config_theme') . '_directory') . '/js/imagesloaded.pkgd.min.js')) {
            $this->document->addScript('catalog/view/theme/' . $this->config->get('theme_' . $this->config->get('config_theme') . '_directory') . '/js/imagesloaded.pkgd.min.js');
        }
        $this->load->language('blog/blog');

		$this->load->model('blog/category');
		$this->load->model('blog/author');
		$this->load->model('blog/comment');
		$this->load->model('blog/settings');

		$this->load->model('blog/article');

		$this->load->model('tool/image');
        
        // load blog settings
        $this->settings = $this->model_blog_settings->getSettings();
        
    }
    
    public function index()
    {

        
		if (isset($this->request->get['filter'])) {
			$filter = $this->request->get['filter'];
		} else {
			$filter = '';
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'ba.date_published';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'DESC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		if (isset($this->request->get['limit'])) {
			$limit = $this->request->get['limit'];
		} else {
			$limit = $this->settings['article_page_limit'];
		}

		if (isset($this->request->get['author'])) {
			$author = $this->request->get['author'];
		} else {
			$author = 0;
		}
        
        
		if (isset($this->request->get['search'])) {
			$search = $this->request->get['search'];
		} else {
			$search = '';
		}

		if (isset($this->request->get['tag'])) {
			$tag = $this->request->get['tag'];
		} elseif (isset($this->request->get['search'])) {
			$tag = $this->request->get['search'];
		} else {
			$tag = '';
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
        
        if(isset($this->request->get['blog_path'])){
            $this->request->get['path'] = $this->request->get['blog_path'];
        }
        

		if (isset($this->request->get['path'])) {
			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			if (isset($this->request->get['author'])) {
				$url .= '&author=' . $this->request->get['author'];
			}
            
            if (isset($this->request->get['search'])) {
                $url .= '&search=' . urlencode(html_entity_decode($this->request->get['search'], ENT_QUOTES, 'UTF-8'));
            }

            if (isset($this->request->get['tag'])) {
                $url .= '&tag=' . urlencode(html_entity_decode($this->request->get['tag'], ENT_QUOTES, 'UTF-8'));
            }

			$path = '';

			$parts = explode('_', (string)$this->request->get['path']);

			$category_id = (int)array_pop($parts);

			foreach ($parts as $path_id) {
				if (!$path) {
					$path = (int)$path_id;
				} else {
					$path .= '_' . (int)$path_id;
				}

				$category_info = $this->model_blog_category->getCategory($path_id);

				if ($category_info) {
					$data['breadcrumbs'][] = array(
						'text' => $category_info['name'],
						'href' => $this->url->link('blog/blog', 'path=' . $path . $url)
					);
				}
			}
            
		} else {
			$category_id = 0;
		}

		$category_info = $this->model_blog_category->getCategory($category_id);
        $url = '';
        
        
		if ($category_info) {
			$this->document->setTitle($category_info['meta_title']);
			$this->document->setDescription($category_info['meta_description']);
			$this->document->setKeywords($category_info['meta_keyword']);
			$this->document->addLink($this->url->link('blog/blog', 'path=' . $this->request->get['path']), 'canonical');

			$data['heading_title'] = $category_info['name'];


			// Set the last category breadcrumb
			$data['breadcrumbs'][] = array(
				'text' => $category_info['name'],
				'href' => $this->url->link('blog/blog', 'path=' . $this->request->get['path'])
			);

			$data['description'] = html_entity_decode($category_info['description'], ENT_QUOTES, 'UTF-8');



			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

            if (isset($this->request->get['author'])) {
				$url .= '&author=' . $this->request->get['author'];
			}
            
            if (isset($this->request->get['search'])) {
                $url .= '&search=' . urlencode(html_entity_decode($this->request->get['search'], ENT_QUOTES, 'UTF-8'));
            }

            if (isset($this->request->get['tag'])) {
                $url .= '&tag=' . urlencode(html_entity_decode($this->request->get['tag'], ENT_QUOTES, 'UTF-8'));
            }

            if (isset($this->request->get['author'])) {
                $url .= '&author=' . $this->request->get['author'];
            }

			$data['categories'] = array();

			$results = $this->model_blog_category->getCategories($category_id);

			foreach ($results as $result) {
				$filter_data = array(
					'filter_category_id'  => $result['category_id'],
					'filter_sub_category' => true
				);

				$data['categories'][] = array(
					'name'  => $result['name'],
					'href'  => $this->url->link('blog/blog', 'path=' . $this->request->get['path'] . '_' . $result['category_id'] . $url)
				);
			}
        }else{
            $this->document->setTitle($this->language->get('meta_title_default'));
			$this->document->setDescription($this->language->get('meta_descripion_default'));
            $this->document->setKeywords($this->language->get('meta_keywords_default'));
            $data['heading_title'] = $this->language->get('heading_blog');
        }
        
        
        $data['text_empty'] = $this->language->get('text_empty');
        $data['text_quantity'] = $this->language->get('text_quantity');
        $data['text_sort'] = $this->language->get('text_sort');
        $data['text_limit'] = $this->language->get('text_limit');
        $data['text_comments'] = $this->language->get('text_comments');
        $data['text_read_more'] = $this->language->get('text_read_more');
        $data['text_posted_by'] = $this->language->get('text_posted_by');
        $data['text_category'] = $this->language->get('text_category');

        $data['button_continue'] = $this->language->get('button_continue');
        $data['button_list'] = $this->language->get('button_list');
        $data['button_grid'] = $this->language->get('button_grid');
        $data['button_read_more'] = $this->language->get('button_read_more');
        $data['button_load_more'] = $this->language->get('button_load_more');

        $data['settings'] = $this->settings;
        
        $data['articles'] = array();

        $filter_data = array(
            'filter_title'       => $search,
            'filter_tag'         => $tag,
            'filter_category_id' => $category_id,
            'filter_author'      => $author,
            'sort'               => $sort,
            'order'              => $order,
            'start'              => ($page - 1) * $limit,
            'limit'              => $limit
        );
        $article_total = $this->model_blog_article->getTotalArticles($filter_data);

        $results = $this->model_blog_article->getArticles($filter_data);

        if(!empty($results)){
            foreach ($results as $result) {
                $article_categories = $this->model_blog_article->getArticleCategories($result['article_id']);
                $article_galleries = $this->model_blog_article->getArticleGalleries($result['article_id']);
                $article_author = $this->model_blog_author->getAuthor($result['author_id']);
                if($article_author){
                    $article_author['href'] =  $this->url->link('blog/blog', 'author=' . $result['author_id']);
                }else{
                    $article_author = false;
                }
                
                //prepare main image/video
                foreach($article_categories as &$category){
                    $category['href'] = $this->url->link('blog/blog', 'path=' . $this->model_blog_category->getCategoryPath($category['category_id']));
                }
                
                $thumb = false;
                if(!empty($result['image'])) {
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
                    'tags'   =>  $tags_array,
                    'thumb' => $thumb,
                    'author'   =>  $article_author,
                    'categories'   =>  $article_categories,
                    'article_list_gallery_display'   =>  $result['article_list_gallery_display'],
                    'gallery'   =>  $article_galleries,
                    'comments_count'   =>  $this->model_blog_comment->getTotalCommentsForArticle($result['article_id']),
                    'href'        => $this->url->link('blog/article', (isset($this->request->get['path']) ? 'path=' . $this->request->get['path'] . '&' : '') .'article_id=' . $result['article_id'] . $url)
                );
            }


            $url = '';

            if (isset($this->request->get['limit'])) {
                $url .= '&limit=' . $this->request->get['limit'];
            }

            $data['sorts'] = array();

            $data['sorts'][] = array(
                'text'  => $this->language->get('text_default'),
                'value' => 'ba.sort_order-ASC',
                'href'  => $this->url->link('blog/blog', (isset($this->request->get['path']) ? 'path=' . $this->request->get['path'] . '&' : '') . 'sort=ba.sort_order&order=ASC' . $url)
            );

            $data['sorts'][] = array(
                'text'  => $this->language->get('text_title_asc'),
                'value' => 'bad.title-ASC',
                'href'  => $this->url->link('blog/blog', (isset($this->request->get['path']) ? 'path=' . $this->request->get['path'] . '&' : '') . 'sort=bad.title&order=ASC' . $url)
            );



            $url = '';

            if (isset($this->request->get['filter'])) {
                $url .= '&filter=' . $this->request->get['filter'];
            }

            if (isset($this->request->get['sort'])) {
                $url .= '&sort=' . $this->request->get['sort'];
            }

            if (isset($this->request->get['order'])) {
                $url .= '&order=' . $this->request->get['order'];
            }

            if (isset($this->request->get['author'])) {
                $url .= '&author=' . $this->request->get['author'];
            }

            if (isset($this->request->get['search'])) {
                $url .= '&search=' . urlencode(html_entity_decode($this->request->get['search'], ENT_QUOTES, 'UTF-8'));
            }

            if (isset($this->request->get['tag'])) {
                $url .= '&tag=' . urlencode(html_entity_decode($this->request->get['tag'], ENT_QUOTES, 'UTF-8'));
            }

            if (isset($this->request->get['search'])) {
                $data['heading_title'] = $this->language->get('heading_blog') .  ' - ' . $this->request->get['search'];
            }


            $data['limits'] = array();

            $limits = array_unique(array($this->config->get('config_article_limit'), 25, 50, 75, 100));

            sort($limits);

            foreach($limits as $value) {
                $data['limits'][] = array(
                    'text'  => $value,
                    'value' => $value,
                    'href'  => $this->url->link('blog/blog',  (isset($this->request->get['path']) ? 'path=' . $this->request->get['path'] : '') . $url . '&limit=' . $value)
                );
            }

            $url = '';

            if (isset($this->request->get['filter'])) {
                $url .= '&filter=' . $this->request->get['filter'];
            }

            if (isset($this->request->get['sort'])) {
                $url .= '&sort=' . $this->request->get['sort'];
            }

            if (isset($this->request->get['order'])) {
                $url .= '&order=' . $this->request->get['order'];
            }

            if (isset($this->request->get['limit'])) {
                $url .= '&limit=' . $this->request->get['limit'];
            }

            if (isset($this->request->get['author'])) {
                $url .= '&author=' . $this->request->get['author'];
            }

            if (isset($this->request->get['search'])) {
                $url .= '&search=' . urlencode(html_entity_decode($this->request->get['search'], ENT_QUOTES, 'UTF-8'));
            }

            if (isset($this->request->get['tag'])) {
                $url .= '&tag=' . urlencode(html_entity_decode($this->request->get['tag'], ENT_QUOTES, 'UTF-8'));
            }



            $pagination = new Pagination();
            $pagination->total = $article_total;
            $pagination->page = $page;
            $pagination->limit = $limit;
            $pagination->url = $this->url->link('blog/blog',  (isset($this->request->get['path']) ? 'path=' . $this->request->get['path'] : '') . $url . '&page={page}');

            $data['pagination'] = $pagination->render();

            $data['results'] = sprintf($this->language->get('text_pagination'), ($article_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($article_total - $limit)) ? $article_total : ((($page - 1) * $limit) + $limit), $article_total, ceil($article_total / $limit));

            $data['sort'] = $sort;
            $data['order'] = $order;
            $data['limit'] = $limit;
            
            $data['is_more'] =  $article_total >= $limit ? true : false;
            
            $data['template'] = $this->settings['article_list_template'];

            $data['continue'] = $this->url->link('common/home');

            $data['column_left'] = $this->load->controller('common/column_left');
            $data['column_right'] = $this->load->controller('common/column_right');
            $data['content_top'] = $this->load->controller('common/content_top');
            $data['content_bottom'] = $this->load->controller('common/content_bottom');
            $data['footer'] = $this->load->controller('common/footer');
            $data['header'] = $this->load->controller('common/header');

            // IF ajax request LOAD MORE
            if(isset($this->request->get['ajax_request']) && $this->request->get['ajax_request'] == 1){
                return $this->response->setOutput($this->load->view('blog/article_list/' . str_replace(array('.tpl', '.twig'), '', $this->settings['article_list_template']), $data));
            }

           $this->response->setOutput($this->load->view('blog/blog', $data));
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

			$data['continue'] = $this->url->link('blog/blog');

			$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

            // IF ajax request LOAD MORE
            if(isset($this->request->get['ajax_request']) && $this->request->get['ajax_request'] == 1){
                return '';
            }
            
			$this->response->setOutput($this->load->view('error/not_found', $data));
		}
	}
    
    

    
}
?>
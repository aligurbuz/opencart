<?php
/* 
Version: 1.0
Comment: Kamil Hudecki
*/

class ControllerExtensionModuleBlog extends Controller {
	private $error = array(); 
    
    public function __construct($registry) {
        parent::__construct($registry);
        
        $this->load->language('extension/module/blog');
		$this->load->model('setting/setting');
        $this->load->model('tool/image');
		// Dodawanie plików css i js do <head>
		$this->document->addStyle('view/stylesheet/blog/blog.css');
        
    }
    
    private function addBasicLang($array = array())
    {
        $data['text_blog_dashboard'] = $this->language->get('text_blog_dashboard');
        $data['text_add_edit_categories'] = $this->language->get('text_add_edit_categories');
        $data['text_add_edit_articles'] = $this->language->get('text_add_edit_articles');
        $data['text_add_edit_authors'] = $this->language->get('text_add_edit_authors');
        $data['text_add_edit_comments'] = $this->language->get('text_add_edit_comments');
        $data['text_general_settings'] = $this->language->get('text_general_settings');
        
        $data['text_modules'] = $this->language->get('text_modules');
        $data['text_blog_category'] = $this->language->get('text_blog_category');
        $data['text_blog_search'] = $this->language->get('text_blog_search');
        $data['text_blog_latest_post'] = $this->language->get('text_blog_latest_post');
        $data['text_blog_popular_post'] = $this->language->get('text_blog_popular_post');
        $data['text_blog_product_related_post'] = $this->language->get('text_blog_product_related_post');
        $data['text_blog_popular_tags'] = $this->language->get('text_blog_popular_tags');
        
        $data['link_blog_dashboard'] = $this->url->link('extension/module/blog', 'user_token=' . $this->session->data['user_token'], true);
        $data['link_add_edit_categories'] = $this->url->link('extension/module/blog/category_list', 'user_token=' . $this->session->data['user_token'], true);
        $data['link_add_edit_articles'] = $this->url->link('extension/module/blog/article_list', 'user_token=' . $this->session->data['user_token'], true);
        $data['link_add_edit_authors'] = $this->url->link('extension/module/blog/author_list', 'user_token=' . $this->session->data['user_token'], true);
        $data['link_add_edit_comments'] = $this->url->link('extension/module/blog/comment_list', 'user_token=' . $this->session->data['user_token'], true);
        $data['link_general_settings'] = $this->url->link('extension/module/blog/settings', 'user_token=' . $this->session->data['user_token'], true);
        
        $data['link_blog_category'] = $this->url->link('extension/module/blog_category', 'user_token=' . $this->session->data['user_token'], true);
        $data['link_blog_search'] = $this->url->link('extension/module/blog_search', 'user_token=' . $this->session->data['user_token'], true);
        $data['link_blog_latest_post'] = $this->url->link('extension/module/blog_latest', 'user_token=' . $this->session->data['user_token'], true);
        $data['link_blog_popular_post'] = $this->url->link('extension/module/blog_popular', 'user_token=' . $this->session->data['user_token'], true);
        $data['link_blog_product_related_post'] = $this->url->link('extension/module/blog_related_post', 'user_token=' . $this->session->data['user_token'], true);
        $data['link_blog_popular_tags'] = $this->url->link('extension/module/blog_tags', 'user_token=' . $this->session->data['user_token'], true);
        
        return array_merge($array, $data);
    }
    
	 
	public function index() {   

        $data = $this->addBasicLang();
        $front_url = new Url(HTTP_CATALOG, $this->config->get('config_secure') ? HTTP_CATALOG : HTTPS_CATALOG);
        $data['text_blog_front_information'] = sprintf($this->language->get('text_blog_front_information'), $front_url->link('blog/blog'));

        $this->document->setTitle($data['text_blog_dashboard']);
            
		// WyÅwietlanie powiadomieÅ
 		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
		    unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}
		
		$data['action'] = $this->url->link('extension/module/blog', 'user_token=' . $this->session->data['user_token'], true);
			
		$data['user_token'] = $this->session->data['user_token'];
		
		$data['breadcrumbs'] = array();
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => 'Modules',
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['breadcrumbs'][] = array(
			'text' => $data['text_blog_dashboard'],
			'href' => $this->url->link('extension/module/blog', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        $data['current_lang_id'] = $this->config->get('config_language_id');
        $data['handy_box'] = $this->load->view('extension/module/blog/partial/header', $data);
		$this->response->setOutput($this->load->view('extension/module/blog/blog', $data));
	}
    
    // Article
    
    public function article_list()
    {
        
		$this->load->language('extension/module/blog/article');

		$this->document->setTitle($this->language->get('heading_title'));
        

		$this->load->model('blog/article');
		$this->load->model('blog/comment');

		$this->getArticlesList();
	}

	public function article_add() {
		$this->load->language('extension/module/blog/article');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('blog/article');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateArticleForm()) {
			$this->model_blog_article->addArticle($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('extension/module/blog/article_list', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getArticleForm();
	}

	public function article_edit() {
        $data = $this->addBasicLang();
		$this->load->language('extension/module/blog/article');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('blog/article');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateArticleForm()) {

            $this->model_blog_article->editArticle($this->request->get['article_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('extension/module/blog/article_list', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getArticleForm();
	}

	public function article_delete() {
		$this->load->language('extension/module/blog/article');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('blog/article');

		if (isset($this->request->post['selected']) && $this->validateArticleDelete()) {
			foreach ($this->request->post['selected'] as $article_id) {
				$this->model_blog_article->deleteArticle($article_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('extension/module/blog/article_list', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getArticlesList();
	}

	protected function getArticlesList() {
        $data = $this->addBasicLang();
        
		if (isset($this->request->get['filter_title'])) {
			$filter_title = $this->request->get['filter_title'];
		} else {
			$filter_title = null;
		}
        
        
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'date_published';
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

		$url = '';
        
        
        if (isset($this->request->get['filter_title'])) {
			$url .= '&filter_title=' . urlencode(html_entity_decode($this->request->get['filter_title'], ENT_QUOTES, 'UTF-8'));
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

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => 'Modules',
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_blog_dashboard'),
			'href' => $this->url->link('extension/module/blog', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_articles'),
			'href' => $this->url->link('extension/module/blog/article_list', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['add'] = $this->url->link('extension/module/blog/article_add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['delete'] = $this->url->link('extension/module/blog/article_delete', 'user_token=' . $this->session->data['user_token'] . $url, true);

		$data['articles'] = array();

		$filter_data = array(
			'filter_title'  => $filter_title,
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$article_total = $this->model_blog_article->getTotalArticles($filter_data);

		$results = $this->model_blog_article->getArticles($filter_data);
        
		foreach ($results as $result) {
			$data['articles'][] = array(
				'article_id' => $result['article_id'],
				'title'        => $result['title'],
				'date_published'  => $result['date_published'],
				'author'  => '<a target="_blank" href="'.$this->url->link('extension/module/blog/author_list', 'user_token=' . $this->session->data['user_token'] . '&author_id=' . $result['author_id'] . $url, true).'">'.$result['author'] .'</a>',
                'comments'    => $this->model_blog_comment->getTotalArticleComments($result['article_id']),
				'edit'        => $this->url->link('extension/module/blog/article_edit', 'user_token=' . $this->session->data['user_token'] . '&article_id=' . $result['article_id'] . $url, true),
				'delete'      => $this->url->link('extension/module/blog/article_delete', 'user_token=' . $this->session->data['user_token'] . '&article_id=' . $result['article_id'] . $url, true)
			);
		}

		$data['heading_title'] = $this->language->get('heading_title');


		$data['text_list'] = $this->language->get('text_list');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');

		$data['column_title'] = $this->language->get('column_title');
		$data['column_author'] = $this->language->get('column_author');
		$data['column_date_published'] = $this->language->get('column_date_published');
		$data['column_comments'] = $this->language->get('column_comments');
		$data['column_action'] = $this->language->get('column_action');

		$data['entry_title'] = $this->language->get('entry_title');

		$data['button_filter'] = $this->language->get('button_filter');
		$data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';
        
        if (isset($this->request->get['filter_title'])) {
			$url .= '&filter_title=' . urlencode(html_entity_decode($this->request->get['filter_title'], ENT_QUOTES, 'UTF-8'));
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
        
        $data['user_token'] = $this->session->data['user_token'];

        $data['filter_title'] = $filter_title;
		$data['sort_title'] = $this->url->link('extension/module/blog/article_list', 'user_token=' . $this->session->data['user_token'] . '&sort=title' . $url, true);
		$data['sort_date_published'] = $this->url->link('extension/module/blog/article_list', 'user_token=' . $this->session->data['user_token'] . '&sort=date_published' . $url, true);
		$data['sort_author'] = $this->url->link('extension/module/blog/article_list', 'user_token=' . $this->session->data['user_token'] . '&sort=author' . $url, true);

		$url = '';

        if (isset($this->request->get['filter_title'])) {
			$url .= '&filter_title=' . urlencode(html_entity_decode($this->request->get['filter_title'], ENT_QUOTES, 'UTF-8'));
		}
        
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $article_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('extension/module/blog/article_list', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($article_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($article_total - $this->config->get('config_limit_admin'))) ? $article_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $article_total, ceil($article_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        $data['handy_box'] = $this->load->view('extension/module/blog/partial/header', $data);
		$this->response->setOutput($this->load->view('extension/module/blog/article_list', $data));
	}

	protected function getArticleForm() {
        $data = $this->addBasicLang();
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_form'] = !isset($this->request->get['article_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_default'] = $this->language->get('text_default');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_no_selected'] = $this->language->get('text_no_selected');
		$data['text_slider'] = $this->language->get('text_slider');
		$data['text_classic'] = $this->language->get('text_classic');

		$data['entry_title'] = $this->language->get('entry_title');
		$data['entry_description'] = $this->language->get('entry_description');
		$data['entry_content'] = $this->language->get('entry_content');
		$data['entry_meta_title'] = $this->language->get('entry_meta_title');
		$data['entry_meta_description'] = $this->language->get('entry_meta_description');
		$data['entry_meta_keyword'] = $this->language->get('entry_meta_keyword');
		$data['entry_keyword'] = $this->language->get('entry_keyword');
		$data['entry_parent'] = $this->language->get('entry_parent');
		$data['entry_store'] = $this->language->get('entry_store');
		$data['entry_image'] = $this->language->get('entry_image');
		$data['entry_thumbnail'] = $this->language->get('entry_thumbnail');
		$data['entry_youtube'] = $this->language->get('entry_youtube');
		$data['entry_soundcloud'] = $this->language->get('entry_soundcloud');
		$data['entry_type'] = $this->language->get('entry_type');
		$data['entry_link'] = $this->language->get('entry_link');
		$data['entry_width'] = $this->language->get('entry_width');
		$data['entry_height'] = $this->language->get('entry_height');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_allow_comments'] = $this->language->get('entry_allow_comments');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_category'] = $this->language->get('entry_category');
		$data['entry_author'] = $this->language->get('entry_author');
		$data['entry_tags'] = $this->language->get('entry_tags');
        $data['entry_related_products'] = $this->language->get('entry_related_products');
        $data['entry_related_articles'] = $this->language->get('entry_related_articles');
        $data['entry_date_added'] = $this->language->get('entry_date_added');
        $data['entry_date_updated'] = $this->language->get('entry_date_updated');
        $data['entry_date_published'] = $this->language->get('entry_date_published');
        $data['entry_article_list_gallery_display'] = $this->language->get('entry_article_list_gallery_display');

		$data['help_filter'] = $this->language->get('help_filter');
		$data['help_tags'] = $this->language->get('help_tags');
		$data['help_keyword'] = $this->language->get('help_keyword');
		$data['help_top'] = $this->language->get('help_top');
		$data['help_column'] = $this->language->get('help_column');
		$data['help_related_products'] = $this->language->get('help_related_products');
		$data['help_related_articles'] = $this->language->get('help_related_articles');
		$data['help_thumbnail'] = $this->language->get('help_thumbnail');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['button_image_add'] = $this->language->get('button_image_add');
		$data['button_remove'] = $this->language->get('button_remove');

		$data['tab_general'] = $this->language->get('tab_general');
		$data['tab_data'] = $this->language->get('tab_data');
		$data['tab_customization'] = $this->language->get('tab_customization');
		$data['tab_settings'] = $this->language->get('tab_settings');
		$data['tab_related'] = $this->language->get('tab_related');
		$data['tab_gallery'] = $this->language->get('tab_gallery');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['title'])) {
			$data['error_title'] = $this->error['title'];
		} else {
			$data['error_title'] = array();
		}

		if (isset($this->error['meta_title'])) {
			$data['error_meta_title'] = $this->error['meta_title'];
		} else {
			$data['error_meta_title'] = array();
		}

		if (isset($this->error['keyword'])) {
			$data['error_keyword'] = $this->error['keyword'];
		} else {
			$data['error_keyword'] = '';
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => 'Modules',
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_blog_dashboard'),
			'href' => $this->url->link('extension/module/blog', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_articles'),
			'href' => $this->url->link('extension/module/blog/article_list', 'user_token=' . $this->session->data['user_token'], true)
		);

		if (!isset($this->request->get['article_id'])) {
			$data['action'] = $this->url->link('extension/module/blog/article_add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('extension/module/blog/article_edit', 'user_token=' . $this->session->data['user_token'] . '&article_id=' . $this->request->get['article_id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('extension/module/blog/article_list', 'user_token=' . $this->session->data['user_token'] . $url, true);

		if (isset($this->request->get['article_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$article_info = $this->model_blog_article->getArticle($this->request->get['article_id']);
		}

		$data['user_token'] = $this->session->data['user_token'];

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();
        
		// Categories
        $this->load->model('blog/category');
        
		if (isset($this->request->post['article_category'])) {
			$categories = $this->request->post['article_category'];
		} elseif (isset($this->request->get['article_id'])) {
			$categories = $this->model_blog_article->getArticleCategories($this->request->get['article_id']);
		} else {
			$categories = array();
		}

		$data['article_categories'] = array();

		foreach ($categories as $category_id) {
			$category_info = $this->model_blog_category->getCategory($category_id);

			if ($category_info) {
				$data['article_categories'][] = array(
					'category_id' => $category_info['category_id'],
					'name' => ($category_info['path']) ? $category_info['path'] . ' &gt; ' . $category_info['name'] : $category_info['name']
				);
			}
		}
        
        //Author
        $this->load->model('blog/author');
        $data['authors'] = $this->model_blog_author->getAuthors();

		if (isset($this->request->post['article_description'])) {
			$data['article_description'] = $this->request->post['article_description'];
		} elseif (isset($this->request->get['article_id'])) {
			$data['article_description'] = $this->model_blog_article->getArticleDescriptions($this->request->get['article_id']);
		} else {
			$data['article_description'] = array();
		}

		$this->load->model('setting/store');

		$data['stores'] = array();
		
		$data['stores'][] = array(
			'store_id' => 0,
			'name'     => $this->language->get('text_default')
		);
		
		$stores = $this->model_setting_store->getStores();

		foreach ($stores as $store) {
			$data['stores'][] = array(
				'store_id' => $store['store_id'],
				'name'     => $store['name']
			);
		}

		if (isset($this->request->post['article_store'])) {
			$data['article_store'] = $this->request->post['article_store'];
		} elseif (isset($this->request->get['article_id'])) {
			$data['article_store'] = $this->model_blog_article->getArticleStores($this->request->get['article_id']);
		} else {
			$data['article_store'] = array(0);
		}

		if (isset($this->request->post['keyword'])) {
			$data['keyword'] = $this->request->post['keyword'];
		} else {
			$data['keyword'] = '';
		}

		if (isset($this->request->post['image'])) {
			$data['image'] = $this->request->post['image'];
		} elseif (!empty($article_info)) {
			$data['image'] = $article_info['image'];
		} else {
			$data['image'] = '';
		}


		if (isset($this->request->post['image']) && is_file(DIR_IMAGE . $this->request->post['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($category_info) && is_file(DIR_IMAGE . $article_info['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($article_info['image'], 100, 100);
		} else {
			$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}

		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);

		if (isset($this->request->post['author_id'])) {
			$data['author_id'] = $this->request->post['author_id'];
		} elseif (!empty($article_info)) {
			$data['author_id'] = $article_info['author_id'];
		} else {
			$data['author_id'] = 0;
		}

		if (isset($this->request->post['auhtor'])) {
			$data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($article_info)) {
			$data['sort_order'] = $article_info['sort_order'];
		} else {
			$data['sort_order'] = 0;
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($article_info)) {
			$data['status'] = $article_info['status'];
		} else {
			$data['status'] = true;
		}

		if (isset($this->request->post['status_comments'])) {
			$data['status_comments'] = $this->request->post['status_comments'];
		} elseif (!empty($article_info)) {
			$data['status_comments'] = $article_info['status_comments'];
		} else {
			$data['status_comments'] = true;
		}
        
		if (isset($this->request->post['article_list_gallery_display'])) {
			$data['article_list_gallery_display'] = $this->request->post['article_list_gallery_display'];
		} elseif (!empty($article_info)) {
			$data['article_list_gallery_display'] = $article_info['article_list_gallery_display'];
		} else {
			$data['article_list_gallery_display'] = true;
		}
        
		if (isset($this->request->post['date_added'])) {
			$data['date_added'] = $this->request->post['date_added'];
		} elseif (!empty($article_info)) {
			$data['date_added'] = $article_info['date_added'];
		} else {
			$data['date_added'] = date('Y-m-d H:i:s');
		}
        
		if (isset($this->request->post['date_updated'])) {
			$data['date_updated'] = $this->request->post['date_updated'];
		} elseif (!empty($article_info)) {
			$data['date_updated'] = $article_info['date_updated'];
		} else {
			$data['date_updated'] = date('Y-m-d H:i:s');
		}
        
		if (isset($this->request->post['date_published'])) {
			$data['date_published'] = $this->request->post['date_published'];
		} elseif (!empty($article_info)) {
			$data['date_published'] = $article_info['date_published'];
		} else {
			$data['date_published'] = date('Y-m-d H:i:s');
		}

        $this->load->model('tool/image');

		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);
        
        $this->load->model('catalog/product');
        
		if (isset($this->request->post['product_related'])) {
			$products = $this->request->post['product_related'];
		} elseif (isset($this->request->get['article_id'])) {
			$products = $this->model_blog_article->getProductRelated($this->request->get['article_id']);
		} else {
			$products = array();
		}
        
		$data['product_relateds'] = array();

		foreach ($products as $product_id) {
			$related_info = $this->model_catalog_product->getProduct($product_id);

			if ($related_info) {
				$data['product_relateds'][] = array(
					'product_id' => $related_info['product_id'],
					'name'       => $related_info['name']
				);
			}
		}
        
		if (isset($this->request->post['article_related'])) {
			$articles = $this->request->post['article_related'];
		} elseif (isset($this->request->get['article_id'])) {
			$articles = $this->model_blog_article->getArticleRelated($this->request->get['article_id']);
		} else {
			$articles = array();
		}
        
		$data['article_relateds'] = array();

		foreach ($articles as $article_id) {
			$related_info = $this->model_blog_article->getArticle($article_id);

			if ($related_info) {
				$data['article_relateds'][] = array(
					'article_id' => $related_info['article_id'],
					'title'       => $related_info['title']
				);
			}
		}
        
        // Images
		if (isset($this->request->post['article_gallery'])) {
			$article_galleries = $this->request->post['article_gallery'];
		} elseif (isset($this->request->get['article_id'])) {
			$article_galleries = $this->model_blog_article->getArticleGalleries($this->request->get['article_id']);
		} else {
			$article_galleries = array();
		}

		$data['article_galleries'] = array();

		foreach ($article_galleries as $article_gallery) {
			if ($article_gallery['path']) {
				$path = $article_gallery['path'];
				$thumb = $article_gallery['path'];
			} else {
				$path = '';
				$thumb = 'no_image.png';
			}

			$data['article_galleries'][] = array(
				'path'      => $path,
				'thumb'      => $article_gallery['type'] == 'IMG' ? $this->model_tool_image->resize($thumb, 100, 100) : null,
                'type'       => $article_gallery['type'],
                'width'       => $article_gallery['width'],
                'height'       => $article_gallery['height'],
  				'sort_order' => $article_gallery['sort_order']
			);
		}
		
		// Soe urls
		
		
		if (isset($this->request->post['article_seo_url'])) {
			$data['article_seo_url'] = $this->request->post['article_seo_url'];
		} elseif (isset($this->request->get['article_id'])) {
			$data['article_seo_url'] = $this->model_blog_article->getArticleSeoUrls($this->request->get['article_id']);
		} else {
			$data['article_seo_url'] = array();
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        $data['handy_box'] = $this->load->view('extension/module/blog/partial/header', $data);
		$this->response->setOutput($this->load->view('extension/module/blog/article_form', $data));
	}

	protected function validateArticleForm() {
		if (!$this->user->hasPermission('modify', 'extension/module/blog')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['article_description'] as $language_id => $value) {
			if ((utf8_strlen($value['title']) < 2) || (utf8_strlen($value['title']) > 255)) {
				$this->error['title'][$language_id] = $this->language->get('error_title');
			}

			if ((utf8_strlen($value['meta_title']) < 3) || (utf8_strlen($value['meta_title']) > 255)) {
				$this->error['meta_title'][$language_id] = $this->language->get('error_meta_title');
			}
		}
		
		if ($this->request->post['article_seo_url']) {
			$this->load->model('design/seo_url');
			
			foreach ($this->request->post['article_seo_url'] as $store_id => $language) {
				foreach ($language as $language_id => $keyword) {
					if (!empty($keyword)) {
						if (count(array_keys($language, $keyword)) > 1) {
							$this->error['keyword'][$store_id][$language_id] = $this->language->get('error_unique');
						}						
						
						$seo_urls = $this->model_design_seo_url->getSeoUrlsByKeyword($keyword);
						
						foreach ($seo_urls as $seo_url) {
							if (($seo_url['store_id'] == $store_id) && (!isset($this->request->get['article_id']) || (($seo_url['query'] != 'article_id=' . $this->request->get['article_id'])))) {
								$this->error['keyword'][$store_id][$language_id] = $this->language->get('error_keyword');
								
								break;
							}
						}
					}
				}
			}
		}
        
		return !$this->error;
	}

	protected function validateArticleDelete() {
		if (!$this->user->hasPermission('modify', 'extension/module/blog')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
    
    
    
	public function article_autocomplete() {
		$json = array();

		if (isset($this->request->get['filter_title'])) {
			$this->load->model('blog/article');

			$filter_data = array(
				'filter_title' => $this->request->get['filter_title'],
				'sort'        => 'title',
				'order'       => 'ASC',
				'start'       => 0,
				'limit'       => 5
			);

			$results = $this->model_blog_article->getArticles($filter_data);

			foreach ($results as $result) {
				$json[] = array(
					'article_id' => $result['article_id'],
					'title'        => strip_tags(html_entity_decode($result['title'], ENT_QUOTES, 'UTF-8'))
				);
			}
		}

		$sort_order = array();

		foreach ($json as $key => $value) {
			$sort_order[$key] = $value['title'];
		}

		array_multisort($sort_order, SORT_ASC, $json);

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
    
    
    
    // END ARTICLE
    
    
    
    // Category
    
    public function category_list()
    {
		$this->load->language('extension/module/blog/category');

		$this->document->setTitle($this->language->get('heading_title'));
        

		$this->load->model('blog/category');

		$this->getCategoriesList();
	}

	public function category_add() {
		$this->load->language('extension/module/blog/category');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('blog/category');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateCategoryForm()) {
			$this->model_blog_category->addCategory($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('extension/module/blog/category_list', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getCategoryForm();
	}

	public function category_edit() {
		$this->load->language('extension/module/blog/category');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('blog/category');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateCategoryForm()) {
			$this->model_blog_category->editCategory($this->request->get['category_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('extension/module/blog/category_list', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getCategoryForm();
	}

	public function category_delete() {
		$this->load->language('extension/module/blog/category');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('blog/category');

		if (isset($this->request->post['selected']) && $this->validateCategoryDelete()) {
			foreach ($this->request->post['selected'] as $category_id) {
				$this->model_blog_category->deleteCategory($category_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('extension/module/blog/category_list', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getCategoriesList();
	}

	protected function getCategoriesList() {
        $data = $this->addBasicLang();
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => 'Modules',
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_blog_dashboard'),
			'href' => $this->url->link('extension/module/blog', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_categories'),
			'href' => $this->url->link('extension/module/blog/category_list', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['add'] = $this->url->link('extension/module/blog/category_add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['delete'] = $this->url->link('extension/module/blog/category_delete', 'user_token=' . $this->session->data['user_token'] . $url, true);

		$data['categories'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$category_total = $this->model_blog_category->getTotalCategories();

		$results = $this->model_blog_category->getCategories($filter_data);

		foreach ($results as $result) {
			$data['categories'][] = array(
				'category_id' => $result['category_id'],
				'name'        => $result['name'],
				'sort_order'  => $result['sort_order'],
				'edit'        => $this->url->link('extension/module/blog/category_edit', 'user_token=' . $this->session->data['user_token'] . '&category_id=' . $result['category_id'] . $url, true),
				'delete'      => $this->url->link('extension/module/blog/category_delete', 'user_token=' . $this->session->data['user_token'] . '&category_id=' . $result['category_id'] . $url, true)
			);
		}

		$data['heading_title'] = $this->language->get('heading_title');


		$data['text_list'] = $this->language->get('text_list');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');

		$data['column_name'] = $this->language->get('column_name');
		$data['column_sort_order'] = $this->language->get('column_sort_order');
		$data['column_action'] = $this->language->get('column_action');

		$data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_name'] = $this->url->link('extension/module/blog/category_list', 'user_token=' . $this->session->data['user_token'] . '&sort=name' . $url, true);
		$data['sort_sort_order'] = $this->url->link('extension/module/blog/category_list', 'user_token=' . $this->session->data['user_token'] . '&sort=sort_order' . $url, true);

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $category_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('extension/module/blog/category_list', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($category_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($category_total - $this->config->get('config_limit_admin'))) ? $category_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $category_total, ceil($category_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        $data['handy_box'] = $this->load->view('extension/module/blog/partial/header', $data);
		$this->response->setOutput($this->load->view('extension/module/blog/category_list', $data));
	}

	protected function getCategoryForm() {
        $data = $this->addBasicLang();
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_form'] = !isset($this->request->get['category_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_default'] = $this->language->get('text_default');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');

		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_description'] = $this->language->get('entry_description');
		$data['entry_meta_title'] = $this->language->get('entry_meta_title');
		$data['entry_meta_description'] = $this->language->get('entry_meta_description');
		$data['entry_meta_keyword'] = $this->language->get('entry_meta_keyword');
		$data['entry_keyword'] = $this->language->get('entry_keyword');
		$data['entry_parent'] = $this->language->get('entry_parent');
		$data['entry_store'] = $this->language->get('entry_store');
		$data['entry_image'] = $this->language->get('entry_image');
		$data['entry_top'] = $this->language->get('entry_top');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_status'] = $this->language->get('entry_status');

		$data['help_filter'] = $this->language->get('help_filter');
		$data['help_keyword'] = $this->language->get('help_keyword');
		$data['help_top'] = $this->language->get('help_top');
		$data['help_column'] = $this->language->get('help_column');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		$data['tab_general'] = $this->language->get('tab_general');
		$data['tab_data'] = $this->language->get('tab_data');
		$data['tab_design'] = $this->language->get('tab_design');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = array();
		}

		if (isset($this->error['meta_title'])) {
			$data['error_meta_title'] = $this->error['meta_title'];
		} else {
			$data['error_meta_title'] = array();
		}

		if (isset($this->error['keyword'])) {
			$data['error_keyword'] = $this->error['keyword'];
		} else {
			$data['error_keyword'] = '';
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => 'Modules',
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_blog_dashboard'),
			'href' => $this->url->link('extension/module/blog', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_categories'),
			'href' => $this->url->link('extension/module/blog/category_list', 'user_token=' . $this->session->data['user_token'], true)
		);

		if (!isset($this->request->get['category_id'])) {
			$data['action'] = $this->url->link('extension/module/blog/category_add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('extension/module/blog/category_edit', 'user_token=' . $this->session->data['user_token'] . '&category_id=' . $this->request->get['category_id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('extension/module/blog/category_list', 'user_token=' . $this->session->data['user_token'] . $url, true);

		if (isset($this->request->get['category_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$category_info = $this->model_blog_category->getCategory($this->request->get['category_id']);
		}

		$data['user_token'] = $this->session->data['user_token'];

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['category_description'])) {
			$data['category_description'] = $this->request->post['category_description'];
		} elseif (isset($this->request->get['category_id'])) {
			$data['category_description'] = $this->model_blog_category->getCategoryDescriptions($this->request->get['category_id']);
		} else {
			$data['category_description'] = array();
		}

		if (isset($this->request->post['path'])) {
			$data['path'] = $this->request->post['path'];
		} elseif (!empty($category_info)) {
			$data['path'] = $category_info['path'];
		} else {
			$data['path'] = '';
		}

		if (isset($this->request->post['parent_id'])) {
			$data['parent_id'] = $this->request->post['parent_id'];
		} elseif (!empty($category_info)) {
			$data['parent_id'] = $category_info['parent_id'];
		} else {
			$data['parent_id'] = 0;
		}

        $this->load->model('setting/store');

		$data['stores'] = $this->model_setting_store->getStores();

		if (isset($this->request->post['category_store'])) {
			$data['category_store'] = $this->request->post['category_store'];
		} elseif (isset($this->request->get['category_id'])) {
			$data['category_store'] = $this->model_blog_category->getCategoryStores($this->request->get['category_id']);
		} else {
			$data['category_store'] = array(0);
		}


		if (isset($this->request->post['keyword'])) {
			$data['keyword'] = $this->request->post['keyword'];
		} else {
			$data['keyword'] = '';
		}

		if (isset($this->request->post['image'])) {
			$data['image'] = $this->request->post['image'];
		} elseif (!empty($category_info)) {
			$data['image'] = $category_info['image'];
		} else {
			$data['image'] = '';
		}

		$this->load->model('tool/image');

		if (isset($this->request->post['image']) && is_file(DIR_IMAGE . $this->request->post['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($category_info) && is_file(DIR_IMAGE . $category_info['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($category_info['image'], 100, 100);
		} else {
			$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}

		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);


		if (isset($this->request->post['sort_order'])) {
			$data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($category_info)) {
			$data['sort_order'] = $category_info['sort_order'];
		} else {
			$data['sort_order'] = 0;
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($category_info)) {
			$data['status'] = $category_info['status'];
		} else {
			$data['status'] = true;
		}


		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        $data['handy_box'] = $this->load->view('extension/module/blog/partial/header', $data);
		$this->response->setOutput($this->load->view('extension/module/blog/category_form', $data));
	}

	protected function validateCategoryForm() {
		if (!$this->user->hasPermission('modify', 'extension/module/blog')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['category_description'] as $language_id => $value) {
			if ((utf8_strlen($value['name']) < 2) || (utf8_strlen($value['name']) > 255)) {
				$this->error['name'][$language_id] = $this->language->get('error_name');
			}

			if ((utf8_strlen($value['meta_title']) < 3) || (utf8_strlen($value['meta_title']) > 255)) {
				$this->error['meta_title'][$language_id] = $this->language->get('error_meta_title');
			}
		}

		return !$this->error;
	}

	protected function validateCategoryDelete() {
		if (!$this->user->hasPermission('modify', 'extension/module/blog')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}


	public function category_autocomplete() {
		$json = array();

		if (isset($this->request->get['filter_name'])) {
			$this->load->model('blog/category');

			$filter_data = array(
				'filter_name' => $this->request->get['filter_name'],
				'sort'        => 'name',
				'order'       => 'ASC',
				'start'       => 0,
				'limit'       => 5
			);

			$results = $this->model_blog_category->getCategories($filter_data);

			foreach ($results as $result) {
				$json[] = array(
					'category_id' => $result['category_id'],
					'name'        => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
				);
			}
		}

		$sort_order = array();

		foreach ($json as $key => $value) {
			$sort_order[$key] = $value['name'];
		}

		array_multisort($sort_order, SORT_ASC, $json);

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
    
    
    // END CATEGORY
    
    
    // COMMENT

    public function comment_list() {
		$this->load->language('extension/module/blog/comment');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('blog/comment');

		$this->getCommentList();
	}

	public function comment_add() {
		$this->load->language('extension/module/blog/comment');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('blog/comment');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateCommentForm()) {
			$this->model_blog_comment->addComment($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('extension/module/blog/comment_list', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getCommentForm();
	}

	public function comment_edit() {
		$this->load->language('extension/module/blog/comment');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('blog/comment');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateCommentForm()) {
			$this->model_blog_comment->editComment($this->request->get['comment_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('extension/module/blog/comment_list', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getCommentForm();
	}

	public function comment_delete() {
		$this->load->language('extension/module/blog/comment');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('blog/comment');

		if (isset($this->request->post['selected']) && $this->validateCommentDelete()) {
			foreach ($this->request->post['selected'] as $comment_id) {
				$this->model_blog_comment->deleteComment($comment_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('extension/module/blog/comment_list', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getCommentList();
	}

	protected function getCommentList() {
        $data = $this->addBasicLang();
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'date_added';
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

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => 'Modules',
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_blog_dashboard'),
			'href' => $this->url->link('extension/module/blog', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_comments'),
			'href' => $this->url->link('extension/module/blog/comment_list', 'user_token=' . $this->session->data['user_token'], true)
		);
        
		$data['add'] = $this->url->link('extension/module/blog/comment_add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['delete'] = $this->url->link('extension/module/blog/comment_delete', 'user_token=' . $this->session->data['user_token'] . $url, true);

		$data['comments'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$comment_total = $this->model_blog_comment->getTotalComments();

		$results = $this->model_blog_comment->getComments($filter_data);

        // Article
        $this->load->model('blog/article');
        
		foreach ($results as $result) {
            $article_info = $this->model_blog_article->getArticle($result['article_id']);
			$data['comments'][] = array(
				'comment_id' => $result['comment_id'],
				'content'            => $result['content'],
				'name'            => $result['name'],
				'email'            => $result['email'],
				'status'      => $result['status'],
				'date_added'      => $result['date_added'],
                'article_title'     => $article_info['title'],
                'article_href'     => $this->url->link('extension/module/blog/article_edit', 'user_token=' . $this->session->data['user_token'] . '&article_id=' . $result['article_id'], true),
				'edit'            => $this->url->link('extension/module/blog/comment_edit', 'user_token=' . $this->session->data['user_token'] . '&comment_id=' . $result['comment_id'] . $url, true)
			);

		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_list'] = $this->language->get('text_list');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');

		$data['column_content'] = $this->language->get('column_content');
		$data['column_article'] = $this->language->get('column_article');
		$data['column_name'] = $this->language->get('column_name');
		$data['column_email'] = $this->language->get('column_email');
		$data['column_sort_order'] = $this->language->get('column_sort_order');
		$data['column_status'] = $this->language->get('column_status');
		$data['column_date_added'] = $this->language->get('column_date_added');
		$data['column_action'] = $this->language->get('column_action');

		$data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_name'] = $this->url->link('extension/module/blog/comment_list', 'user_token=' . $this->session->data['user_token'] . '&sort=name' . $url, true);
		$data['sort_email'] = $this->url->link('extension/module/blog/comment_list', 'user_token=' . $this->session->data['user_token'] . '&sort=email' . $url, true);
		$data['sort_date_added'] = $this->url->link('extension/module/blog/comment_list', 'user_token=' . $this->session->data['user_token'] . '&sort=date_added' . $url, true);
		$data['sort_status'] = $this->url->link('extension/module/blog/comment_list', 'user_token=' . $this->session->data['user_token'] . '&sort=status' . $url, true);

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		$pagination = new Pagination();
		$pagination->total = $comment_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('extension/module/blog/comment_list', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($comment_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($comment_total - $this->config->get('config_limit_admin'))) ? $comment_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $comment_total, ceil($comment_total / $this->config->get('config_limit_admin')));
        
		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        $data['handy_box'] = $this->load->view('extension/module/blog/partial/header', $data);
		$this->response->setOutput($this->load->view('extension/module/blog/comment_list', $data));
	}

	protected function getCommentForm() {
        $data = $this->addBasicLang();
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_form'] = !isset($this->request->get['comment_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_default'] = $this->language->get('text_default');
		$data['text_percent'] = $this->language->get('text_percent');
		$data['text_amount'] = $this->language->get('text_amount');

		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_email'] = $this->language->get('entry_email');
		$data['entry_article'] = $this->language->get('entry_article');
        $data['entry_content'] = $this->language->get('entry_content');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_customer_group'] = $this->language->get('entry_customer_group');


		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
		}
        
		if (isset($this->error['email'])) {
			$data['error_email'] = $this->error['email'];
		} else {
			$data['error_email'] = '';
		}


		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
        
        $this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();
        

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => 'Modules',
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_blog_dashboard'),
			'href' => $this->url->link('extension/module/blog', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_comments'),
			'href' => $this->url->link('extension/module/blog/comment_list', 'user_token=' . $this->session->data['user_token'], true)
		);

		if (!isset($this->request->get['comment_id'])) {
			$data['action'] = $this->url->link('extension/module/blog/comment_add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('extension/module/blog/comment_edit', 'user_token=' . $this->session->data['user_token'] . '&comment_id=' . $this->request->get['comment_id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('extension/module/blog/comment', 'user_token=' . $this->session->data['user_token'] . $url, true);

		if (isset($this->request->get['comment_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$comment_info = $this->model_blog_comment->getComment($this->request->get['comment_id']);
		}

		$data['user_token'] = $this->session->data['user_token'];

		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($comment_info)) {
			$data['name'] = $comment_info['name'];
		} else {
			$data['name'] = '';
		}

		if (isset($this->request->post['email'])) {
			$data['email'] = $this->request->post['email'];
		} elseif (!empty($comment_info)) {
			$data['email'] = $comment_info['email'];
		} else {
			$data['email'] = '';
		}

		if (isset($this->request->post['content'])) {
			$data['content'] = $this->request->post['content'];
		} elseif (!empty($comment_info)) {
			$data['content'] = $comment_info['content'];
		} else {
			$data['content'] = '';
		}
        
        if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($comment_info)) {
			$data['status'] = $comment_info['status'];
		} else {
			$data['status'] = true;
		}

        
        // Article
        $this->load->model('blog/article');
        $article_info = $this->model_blog_article->getArticle($comment_info['article_id']);
        $data['article_title'] = $article_info['title'];
        $data['article_href'] = $this->url->link('extension/module/blog/article_edit', 'user_token=' . $this->session->data['user_token'] . '&article_id=' . $comment_info['article_id'], true);

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        $data['handy_box'] = $this->load->view('extension/module/blog/partial/header', $data);
		$this->response->setOutput($this->load->view('extension/module/blog/comment_form', $data));
	}

	protected function validateCommentForm() {
		if (!$this->user->hasPermission('modify', 'extension/module/blog')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ((utf8_strlen($this->request->post['name']) < 2) || (utf8_strlen($this->request->post['name']) > 64)) {
			$this->error['name'] = $this->language->get('error_name');
		}


		return !$this->error;
	}

	protected function validateCommentDelete() {
		if (!$this->user->hasPermission('modify', 'extension/module/blog')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

    
    // END COMMENT
    
    
     // AUTHOR

    public function author_list() {
		$this->load->language('extension/module/blog/author');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('blog/author');

		$this->getAuthorList();
	}

	public function author_add() {
		$this->load->language('extension/module/blog/author');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('blog/author');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateAuthorForm()) {
			$this->model_blog_author->addAuthor($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('extension/module/blog/author_list', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getAuthorForm();
	}

	public function author_edit() {
		$this->load->language('extension/module/blog/author');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('blog/author');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateAuthorForm()) {
			$this->model_blog_author->editAuthor($this->request->get['author_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('extension/module/blog/author_list', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getAuthorForm();
	}

	public function author_delete() {
		$this->load->language('extension/module/blog/author');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('blog/author');

		if (isset($this->request->post['selected']) && $this->validateAuthorDelete()) {
			foreach ($this->request->post['selected'] as $author_id) {
				$this->model_blog_author->deleteAuthor($author_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('extension/module/blog/author_list', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getAuthorList();
	}

	protected function getAuthorList() {
        $data = $this->addBasicLang();
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => 'Modules',
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_blog_dashboard'),
			'href' => $this->url->link('extension/module/blog', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_authors'),
			'href' => $this->url->link('extension/module/blog/author_list', 'user_token=' . $this->session->data['user_token'], true)
		);
        
		$data['add'] = $this->url->link('extension/module/blog/author_add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['delete'] = $this->url->link('extension/module/blog/author_delete', 'user_token=' . $this->session->data['user_token'] . $url, true);

		$data['authors'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$author_total = $this->model_blog_author->getTotalAuthors();

		$results = $this->model_blog_author->getAuthors($filter_data);

		foreach ($results as $result) {
			$data['authors'][] = array(
				'author_id' => $result['author_id'],
				'name'            => $result['name'],
				'sort_order'      => $result['sort_order'],
				'edit'            => $this->url->link('extension/module/blog/author_edit', 'user_token=' . $this->session->data['user_token'] . '&author_id=' . $result['author_id'] . $url, true)
			);
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_list'] = $this->language->get('text_list');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');

		$data['column_name'] = $this->language->get('column_name');
		$data['column_sort_order'] = $this->language->get('column_sort_order');
		$data['column_action'] = $this->language->get('column_action');

		$data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_name'] = $this->url->link('extension/module/blog/author_list', 'user_token=' . $this->session->data['user_token'] . '&sort=name' . $url, true);
		$data['sort_sort_order'] = $this->url->link('extension/module/blog/author_list', 'user_token=' . $this->session->data['user_token'] . '&sort=sort_order' . $url, true);

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $author_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('extension/module/blog/author_list', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($author_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($author_total - $this->config->get('config_limit_admin'))) ? $author_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $author_total, ceil($author_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        $data['handy_box'] = $this->load->view('extension/module/blog/partial/header', $data);
		$this->response->setOutput($this->load->view('extension/module/blog/author_list', $data));
	}

	protected function getAuthorForm() {
        $data = $this->addBasicLang();
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_form'] = !isset($this->request->get['author_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_default'] = $this->language->get('text_default');
		$data['text_percent'] = $this->language->get('text_percent');
		$data['text_amount'] = $this->language->get('text_amount');

		$data['entry_name'] = $this->language->get('entry_name');
        $data['entry_description'] = $this->language->get('entry_description');
		$data['entry_image'] = $this->language->get('entry_image');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_customer_group'] = $this->language->get('entry_customer_group');


		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
        
        $this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();
        
        
        if (isset($this->request->post['author_description'])) {
			$data['author_description'] = $this->request->post['author_description'];
		} elseif (isset($this->request->get['author_id'])) {
			$data['author_description'] = $this->model_blog_author->getAuthorDescriptions($this->request->get['author_id']);
		} else {
			$data['author_description'] = array();
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => 'Modules',
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_blog_dashboard'),
			'href' => $this->url->link('extension/module/blog', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_authors'),
			'href' => $this->url->link('extension/module/blog/author_list', 'user_token=' . $this->session->data['user_token'], true)
		);

		if (!isset($this->request->get['author_id'])) {
			$data['action'] = $this->url->link('extension/module/blog/author_add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('extension/module/blog/author_edit', 'user_token=' . $this->session->data['user_token'] . '&author_id=' . $this->request->get['author_id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('extension/module/blog/author', 'user_token=' . $this->session->data['user_token'] . $url, true);

		if (isset($this->request->get['author_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$author_info = $this->model_blog_author->getAuthor($this->request->get['author_id']);
		}

		$data['user_token'] = $this->session->data['user_token'];

		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($author_info)) {
			$data['name'] = $author_info['name'];
		} else {
			$data['name'] = '';
		}


		if (isset($this->request->post['image'])) {
			$data['image'] = $this->request->post['image'];
		} elseif (!empty($author_info)) {
			$data['image'] = $author_info['image'];
		} else {
			$data['image'] = '';
		}

		$this->load->model('tool/image');

		if (isset($this->request->post['image']) && is_file(DIR_IMAGE . $this->request->post['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($author_info) && is_file(DIR_IMAGE . $author_info['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($author_info['image'], 100, 100);
		} else {
			$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}

		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);

		if (isset($this->request->post['sort_order'])) {
			$data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($author_info)) {
			$data['sort_order'] = $author_info['sort_order'];
		} else {
			$data['sort_order'] = '';
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        $data['handy_box'] = $this->load->view('extension/module/blog/partial/header', $data);
		$this->response->setOutput($this->load->view('extension/module/blog/author_form', $data));
	}

	protected function validateAuthorForm() {
		if (!$this->user->hasPermission('modify', 'extension/module/blog')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ((utf8_strlen($this->request->post['name']) < 2) || (utf8_strlen($this->request->post['name']) > 64)) {
			$this->error['name'] = $this->language->get('error_name');
		}


		return !$this->error;
	}

	protected function validateAuthorDelete() {
		if (!$this->user->hasPermission('modify', 'extension/module/blog')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

    
    // END AUTHOR
    
    // SETTIGNGS
    
    	public function settings() {
		$this->load->language('extension/module/blog/settings');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('blog/settings');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateSettingsForm()) {

            $this->model_blog_settings->editSettings($this->request->post);
            
			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';


			$this->response->redirect($this->url->link('extension/module/blog/settings', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getSettingsForm();
	}
    
	protected function getSettingsForm() {
        $data = $this->addBasicLang();
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_form'] = $this->language->get('text_edit');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_default'] = $this->language->get('text_default');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_settings'] = $this->language->get('text_settings');
		$data['text_standard'] = $this->language->get('text_standard');
		$data['text_ajax'] = $this->language->get('text_ajax');
		$data['text_local'] = $this->language->get('text_local');
		$data['text_facebook'] = $this->language->get('text_facebook');
		$data['text_disqus'] = $this->language->get('text_disqus');

		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_comments_approval'] = $this->language->get('entry_comments_approval');
		$data['entry_pagination_type'] = $this->language->get('entry_pagination_type');
		$data['entry_article_page_limit'] = $this->language->get('entry_article_page_limit');
		$data['entry_comments_engine'] = $this->language->get('entry_comments_engine');
		$data['entry_disqus_name'] = $this->language->get('entry_disqus_name');
		$data['entry_facebook_id'] = $this->language->get('entry_facebook_id');
		$data['entry_article_list_template'] = $this->language->get('entry_article_list_template');
		$data['entry_article_detail_template'] = $this->language->get('entry_article_detail_template');
		$data['entry_article_related_template'] = $this->language->get('entry_article_related_template');
		$data['entry_article_related'] = $this->language->get('entry_article_related');
		$data['entry_article_scroll_related'] = $this->language->get('entry_article_scroll_related');
		$data['entry_article_related_per_row'] = $this->language->get('entry_article_related_per_row');
		$data['entry_product_related'] = $this->language->get('entry_product_related');
		$data['entry_product_scroll_related'] = $this->language->get('entry_product_scroll_related');
		$data['entry_product_related_per_row'] = $this->language->get('entry_product_related_per_row');
          $data['entry_author_description'] = $this->language->get('entry_author_description');
          $data['entry_gallery_image_size'] = $this->language->get('entry_gallery_image_size');
          $data['entry_gallery_youtube_size'] = $this->language->get('entry_gallery_youtube_size');
          $data['entry_gallery_soundcloud_size'] = $this->language->get('entry_gallery_soundcloud_size');
          $data['entry_gallery_related_article_size'] = $this->language->get('entry_gallery_related_article_size');

                
		$data['help_filter'] = $this->language->get('help_filter');
		$data['help_facebook_id'] = $this->language->get('help_facebook_id');


		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		$data['tab_general'] = $this->language->get('tab_general');
		$data['tab_article'] = $this->language->get('tab_article');
		$data['tab_category'] = $this->language->get('tab_category');
		$data['tab_author'] = $this->language->get('tab_author');
		$data['tab_comment'] = $this->language->get('tab_comment');

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
		    unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}
        
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = array();
		}

		$url = '';


		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => 'Modules',
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_blog_dashboard'),
			'href' => $this->url->link('extension/module/blog', 'user_token=' . $this->session->data['user_token'], true)
		);
				
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_settings'),
			'href' => $this->url->link('extension/module/blog/settings', 'user_token=' . $this->session->data['user_token'], true)
		);

        $data['action'] = $this->url->link('extension/module/blog/settings', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['cancel'] = $this->url->link('extension/module/blog', 'user_token=' . $this->session->data['user_token'] . $url, true);

        $settings_info = $this->model_blog_settings->getSettings();

		$data['user_token'] = $this->session->data['user_token'];

		$this->load->model('localisation/language');
        
        
        // Ładowanie templatek modułów
		$data['article_list_templates'] = array();
		$data['article_detail_templates'] = array();
		$data['article_related_templates'] = array();
		
		$data['templates'] = array();

		$directories = glob(DIR_CATALOG . 'view/theme/*', GLOB_ONLYDIR);

		foreach ($directories as $directory) {
		     $directory = basename($directory);
			$data['templates'][] = $directory;
			$files_article_list = glob(DIR_CATALOG . 'view/theme/' . $directory . '/template/blog/article_list/*');
			$files_article_detail = glob(DIR_CATALOG . 'view/theme/' . $directory . '/template/blog/article_detail/*');
			$files_article_related = glob(DIR_CATALOG . 'view/theme/' . $directory . '/template/blog/article_related/*');

			if(!empty($files_article_list)) {
			     $data['article_list_templates'][$directory] = array();
			     foreach ($files_article_list as $file) {
			          $data['article_list_templates'][$directory][] = basename($file);
			     }
			}
			
			if(!empty($files_article_detail)) {
			     $data['article_detail_templates'][$directory] = array();
			     foreach ($files_article_detail as $file) {
			          $data['article_detail_templates'][$directory][] = basename($file);
			     }
			}
            
			if(!empty($files_article_related)) {
			     $data['article_related_templates'][$directory] = array();
			     foreach ($files_article_related as $file) {
			          $data['article_related_templates'][$directory][] = basename($file);
			     }
			}
		}
          

		if (isset($this->request->post['article_list_template'])) {
			$data['article_list_template'] = $this->request->post['article_list_template'];
		} elseif (!empty($settings_info)) {
			$data['article_list_template'] = $settings_info['article_list_template'];
		} else {
			$data['article_list_template'] = 'default.tpl';
		}
          

		if (isset($this->request->post['article_detail_template'])) {
			$data['article_detail_template'] = $this->request->post['article_detail_template'];
		} elseif (!empty($settings_info)) {
			$data['article_detail_template'] = $settings_info['article_detail_template'];
		} else {
			$data['article_detail_template'] = 'default.tpl';
		}

		if (isset($this->request->post['article_related_template'])) {
			$data['article_related_template'] = $this->request->post['article_related_template'];
		} elseif (!empty($settings_info)) {
			$data['article_related_template'] = $settings_info['article_related_template'];
		} else {
			$data['article_related_template'] = 'default.tpl';
		}

		if (isset($this->request->post['article_page_limit'])) {
			$data['article_page_limit'] = $this->request->post['article_page_limit'];
		} elseif (!empty($settings_info)) {
			$data['article_page_limit'] = $settings_info['article_page_limit'];
		} else {
			$data['article_page_limit'] = 5;
		}
        

		if (isset($this->request->post['article_related_status'])) {
			$data['article_related_status'] = $this->request->post['article_related_status'];
		} elseif (!empty($settings_info)) {
			$data['article_related_status'] = $settings_info['article_related_status'];
		} else {
			$data['article_related_status'] = 1;
		}
        

		if (isset($this->request->post['article_scroll_related'])) {
			$data['article_scroll_related'] = $this->request->post['article_scroll_related'];
		} elseif (!empty($settings_info)) {
			$data['article_scroll_related'] = $settings_info['article_scroll_related'];
		} else {
			$data['article_scroll_related'] = 1;
		}

		if (isset($this->request->post['article_related_per_row'])) {
			$data['article_related_per_row'] = $this->request->post['article_related_per_row'];
		} elseif (!empty($settings_info)) {
			$data['article_related_per_row'] = $settings_info['article_related_per_row'];
		} else {
			$data['article_related_per_row'] = 6;
		}

		if (isset($this->request->post['product_related_status'])) {
			$data['product_related_status'] = $this->request->post['product_related_status'];
		} elseif (!empty($settings_info)) {
			$data['product_related_status'] = $settings_info['product_related_status'];
		} else {
			$data['product_related_status'] = 1;
		}
        

		if (isset($this->request->post['product_scroll_related'])) {
			$data['product_scroll_related'] = $this->request->post['product_scroll_related'];
		} elseif (!empty($settings_info)) {
			$data['product_scroll_related'] = $settings_info['product_scroll_related'];
		} else {
			$data['product_scroll_related'] = 1;
		}

		if (isset($this->request->post['product_related_per_row'])) {
			$data['product_related_per_row'] = $this->request->post['product_related_per_row'];
		} elseif (!empty($settings_info)) {
			$data['product_related_per_row'] = $settings_info['product_related_per_row'];
		} else {
			$data['product_related_per_row'] = 6;
		}
        

		if (isset($this->request->post['pagination_type'])) {
			$data['pagination_type'] = $this->request->post['pagination_type'];
		} elseif (!empty($settings_info)) {
			$data['pagination_type'] = $settings_info['pagination_type'];
		} else {
			$data['pagination_type'] = "STANDARD";
		}
        

		if (isset($this->request->post['comments_engine'])) {
			$data['comments_engine'] = $this->request->post['comments_engine'];
		} elseif (!empty($settings_info)) {
			$data['comments_engine'] = $settings_info['comments_engine'];
		} else {
			$data['comments_engine'] = "LOCAL";
		}

		if (isset($this->request->post['disqus_name'])) {
			$data['disqus_name'] = $this->request->post['disqus_name'];
		} elseif (!empty($settings_info)) {
			$data['disqus_name'] = $settings_info['disqus_name'];
		} else {
			$data['disqus_name'] = '';
		}
        
		if (isset($this->request->post['facebook_id'])) {
			$data['facebook_id'] = $this->request->post['facebook_id'];
		} elseif (!empty($settings_info)) {
			$data['facebook_id'] = $settings_info['facebook_id'];
		} else {
			$data['facebook_id'] = '';
		}
        
		if (isset($this->request->post['comments_approval'])) {
			$data['comments_approval'] = $this->request->post['comments_approval'];
		} elseif (!empty($settings_info)) {
			$data['comments_approval'] = $settings_info['comments_approval'];
		} else {
			$data['comments_approval'] = 1;
		}
        
		if (isset($this->request->post['author_description'])) {
			$data['author_description'] = $this->request->post['author_description'];
		} elseif (!empty($settings_info)) {
			$data['author_description'] = $settings_info['author_description'];
		} else {
			$data['author_description'] = 1;
		}
        
		if (isset($this->request->post['gallery_image_width'])) {
			$data['gallery_image_width'] = $this->request->post['gallery_image_width'];
		} elseif (!empty($settings_info)) {
			$data['gallery_image_width'] = $settings_info['gallery_image_width'];
		} else {
			$data['gallery_image_width'] = 1000;
		}
		if (isset($this->request->post['gallery_image_height'])) {
			$data['gallery_image_height'] = $this->request->post['gallery_image_height'];
		} elseif (!empty($settings_info)) {
			$data['gallery_image_height'] = $settings_info['gallery_image_height'];
		} else {
			$data['gallery_image_height'] = 400;
		}
        
		if (isset($this->request->post['gallery_youtube_width'])) {
			$data['gallery_youtube_width'] = $this->request->post['gallery_youtube_width'];
		} elseif (!empty($settings_info)) {
			$data['gallery_youtube_width'] = $settings_info['gallery_youtube_width'];
		} else {
			$data['gallery_youtube_width'] = 1000;
		}
		if (isset($this->request->post['gallery_youtube_height'])) {
			$data['gallery_youtube_height'] = $this->request->post['gallery_youtube_height'];
		} elseif (!empty($settings_info)) {
			$data['gallery_youtube_height'] = $settings_info['gallery_youtube_height'];
		} else {
			$data['gallery_youtube_height'] = 400;
		}
        
		if (isset($this->request->post['gallery_soundcloud_width'])) {
			$data['gallery_soundcloud_width'] = $this->request->post['gallery_soundcloud_width'];
		} elseif (!empty($settings_info)) {
			$data['gallery_soundcloud_width'] = $settings_info['gallery_soundcloud_width'];
		} else {
			$data['gallery_soundcloud_width'] = 1000;
		}
		if (isset($this->request->post['gallery_soundcloud_height'])) {
			$data['gallery_soundcloud_height'] = $this->request->post['gallery_soundcloud_height'];
		} elseif (!empty($settings_info)) {
			$data['gallery_soundcloud_height'] = $settings_info['gallery_soundcloud_height'];
		} else {
			$data['gallery_soundcloud_height'] = 170;
		}
          
          if (isset($this->request->post['gallery_related_article_width'])) {
          	$data['gallery_related_article_width'] = $this->request->post['gallery_related_article_width'];
          } elseif (!empty($settings_info)) {
          	$data['gallery_related_article_width'] = $settings_info['gallery_related_article_width'];
          } else {
          	$data['gallery_related_article_width'] = 100;
          }
          
          if (isset($this->request->post['gallery_related_article_height'])) {
          	$data['gallery_related_article_height'] = $this->request->post['gallery_related_article_height'];
          } elseif (!empty($settings_info)) {
          	$data['gallery_related_article_height'] = $settings_info['gallery_related_article_height'];
          } else {
          	$data['gallery_related_article_height'] = 100;
          }

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
          $data['handy_box'] = $this->load->view('extension/module/blog/partial/header', $data);
		$this->response->setOutput($this->load->view('extension/module/blog/settings_form', $data));
	}
    
    
    protected function validateSettingsForm() {
		if (!$this->user->hasPermission('modify', 'extension/module/blog')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
    
    function install()
    {
        $this->load->model('blog/setup');
        $this->model_blog_setup->install();
    }
    
    function uninstall()
    {
        $this->load->model('blog/setup');
        $this->model_blog_setup->uninstall();
    }
}
?>
<?php  
/* 
Version: 1.0
Author: Artur Sułkowski
Website: http://artursulkowski.pl
*/

class ControllerExtensionModuleAdvancedGrid extends Controller {
	public function index($setting) {
	     $this->load->model('tool/image');
	     
		$this->load->language('extension/module/bestseller');
		$data['button_cart'] = $this->language->get('button_cart');
	     
		$data['position'] = $setting['position'];
		$data['disable_on_mobile'] = $setting['disable_on_mobile'];
		$data['custom_class'] = $setting['custom_class'];
		$data['margin_top'] = $setting['margin_top'];
		$data['margin_right'] = $setting['margin_right'];
		$data['margin_bottom'] = $setting['margin_bottom'];
		$data['margin_left'] = $setting['margin_left'];
		$data['padding_top'] = $setting['padding_top'];
		$data['padding_right'] = $setting['padding_right'];
		$data['padding_bottom'] = $setting['padding_bottom'];
		$data['padding_left'] = $setting['padding_left'];
		$data['force_full_width'] = $setting['force_full_width'];
		$data['background_color'] = $setting['background_color'];
		$data['background_image_type'] = $setting['background_image_type'];
		$data['background_image'] = $setting['background_image'];
		$data['background_image_position'] = $setting['background_image_position'];
		$data['background_image_repeat'] = $setting['background_image_repeat'];
		$data['background_image_attachment'] = $setting['background_image_attachment'];
		$data['id'] = rand(0, 5000)*rand(5000, 50000);

		$data['columns'] = array();
		foreach($setting['column'] as $column) {
		     if($column['status'] == 1) {
		          if(!isset($column['module'])) $column['module'] = array();	
		          $data['columns'][] = array(
		               'width' => $column['width'],
		               'disable_on_mobile' => $column['disable_on_mobile'],
		               'sort' => $column['sort'],
		               'width_xs' => $column['width_xs'],
		               'width_sm' => $column['width_sm'],
		               'width_md' => $column['width_md'],
		               'width_lg' => $column['width_lg'],
		               'modules' => $this->getModules($column['module'])
		          );
		     }
		}
				
		usort($data['columns'], "cmp_by_optionNumber");
		
		return $this->load->view('extension/module/advanced_grid/advanced_grid', $data);
	}
	
	public function getModules($modules) {     
	     $output = array();
	     
	     if(!is_array($modules)) $modules = array();
	     
	     foreach($modules as $module) {
	          if($module['status'] == 1) {
	               $content = array();

	               if($module['type'] == 'load_module') {
	               		$content = array(
	                         'module' => false
	                    );
	                    
	                    $part = explode('.', $module['load_module']['module']);
	                    
	                    if (isset($part[0])) {
	                    	$code = $part[0];
	                    }
	                    
	                    if ($code) { 
	                    	$setting = $this->config->get($code . '_module');
	                    	
	                    	if (isset($part[1]) && isset($setting[$part[1]])) {
	                    	     $content = array(
	                    	          'module' => $this->load->controller('extension/module/' . $code, $setting[$part[1]])
	                    	     );
	                    	} else {
	                    		$content = array(
	                    		     'module' => $this->load->controller('extension/module/' . $module['load_module']['module'])
	                    		);
	                    	}			
	                    }
	               }
	               
	               if($module['type'] == 'html') {
	                    if(isset($module['html'][$this->config->get('config_language_id')])) {
	                         $content = array(
	                              'html' => html_entity_decode($module['html'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8')
	                         );
	                    } else {
	                         $content = array(
	                              'html' => 'You must set text in the module Advanced Grid!'
	                         );
	                    }
	               }
	               
	               if($module['type'] == 'box') {
	                    if(isset($module['module']['title'][$this->config->get('config_language_id')])) {
	                         $content = array(
	                              'title' => html_entity_decode($module['module']['title'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8'),
	                              'text' => html_entity_decode($module['module']['text'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8')
	                         );
	                    } else {
	                         $content = array(
	                              'title' => 'Set name!',
	                              'text' => 'You must set text in the module Advanced Grid!'
	                         );
	                    }
	               }
	               
	               if($module['type'] == 'latest_blogs') {
	                    if(isset($module['latest_blogs']['title'][$this->config->get('config_language_id')])) {
	                         $title = html_entity_decode($module['latest_blogs']['title'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
	                    } else {
	                         $title = 'Set name!';
	                    }

                        $this->load->language('blog/blog');

                        $this->load->model('blog/article');
	                   
                        $data['articles'] = array();

                        $results = $this->model_blog_article->getLatestArticles($module['latest_blogs']['limit']);

                        foreach ($results as $result) {

                            $thumb = false;
                            if(!empty($result['image'])){
                                $thumb = $result['image'];
                            }
                            if($thumb){
                                $this->load->model('tool/image');

                                $thumb = $this->model_tool_image->resize($thumb, $module['latest_blogs']['width'], $module['latest_blogs']['height']);
                            }

                            $data['articles'][] = array(
                                'article_id'  => $result['article_id'],
                                'title'        => $result['title'],
                                'description' => strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')),
                                'date_published'   =>  $result['date_published'],
                                'thumb'     => $thumb,
                                'href'        => $this->url->link('blog/article', (isset($this->request->get['path']) ? 'path=' . $this->request->get['path'] . '&' : '') .'article_id=' . $result['article_id'])
                            );
                        }
	                    
	                    $content = array(
	                         'title' => $title,
	                         'limit' => $module['latest_blogs']['limit'],
	                         'width' => $module['latest_blogs']['width'],
	                         'height' => $module['latest_blogs']['height'],
	                         'articles' => $data['articles'],
	                         'module_template' => $module['latest_blogs']['module_layout']
	                    );
	               }
	               
	               if($module['type'] == 'newsletter') {
	                    if(!isset($module['newsletter']['module_layout'])) $module['newsletter']['module_layout'] = 'default.tpl';
	                    if(isset($module['newsletter']['title'][$this->config->get('config_language_id')])) {
	                         $content = array(
	                              'title' => html_entity_decode($module['newsletter']['title'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8'),
	                              'text' => html_entity_decode($module['newsletter']['text'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8'),
	                              'input_placeholder' => html_entity_decode($module['newsletter']['input_placeholder'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8'),
	                              'subscribe_text' => html_entity_decode($module['newsletter']['subscribe_text'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8'),
	                              'unsubscribe_text' => html_entity_decode($module['newsletter']['unsubscribe_text'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8'),
	                              'module_template' => $module['newsletter']['module_layout'],
	                              'subscribe_url' => $this->url->link('extension/module/newsletter/subscribe', '', true),
	                              'unsubscribe_url' => $this->url->link('extension/module/newsletter/unsubscribe', '', true)
	                         );
	                    } else {
	                         $content = array(
	                              'title' => 'Set name!',
	                              'text' => 'You must set text in the module Advanced Grid!',
	                              'input_placeholder' => 'your e-mail...',
	                              'subscribe_text' => 'Subscribe!',
	                              'unsubscribe_text' => '',
	                              'module_template' => $module['newsletter']['module_layout']
	                         );
	                    }
	               }
	               
	               if($module['type'] == 'links') {
	                    if(isset($module['links']['title'][$this->config->get('config_language_id')])) {
	                         $title = $module['links']['title'][$this->config->get('config_language_id')];
	                    } else {
	                         $title = 'Set name!';
	                    }
	                    
	                    $links = array();
	                    
	                    if(isset($module['links']['array'])) { foreach($module['links']['array'] as $link) {
	                         if(isset($link['name'][$this->config->get('config_language_id')])) {
	                              $name = $link['name'][$this->config->get('config_language_id')];
	                         } else {
	                              $name = 'Set name!';
	                         }
	                         
	                         $links[] = array(
	                              'name' => $name,
	                              'url' => $link['url'],
	                              'sort' => $link['sort']
	                         );
	                    } }
	                    
	                    usort($links, "cmp_by_optionNumber");
	                    
	                    if(!isset($module['links']['module_layout'])) $module['links']['module_layout'] = 'default.tpl';
	                    
	                    $content = array(
	                         'title' => $title,
	                         'limit' => $module['links']['limit'],
	                         'module_template' => $module['links']['module_layout'],
	                         'links' => $links
	                    );
	               }
	               
	               if($module['type'] == 'products') {
	                    if(isset($module['products']['title'][$this->config->get('config_language_id')])) {
	                         $title = $module['products']['title'][$this->config->get('config_language_id')];
	                    } else {
	                         $title = 'Set name!';
	                    }
	                    
	                    $products = array();
	                    
	                    // Najnowsze produkty, Specjalne produkty, Najlepiej sprzedajace się produkty, Wybrane produkty z kategorii
	                    if($module['products']['get_products_from'] == 'latest' || $module['products']['get_products_from'] == 'special' || $module['products']['get_products_from'] == 'bestsellers' || $module['products']['get_products_from'] == 'category' || $module['products']['get_products_from'] == 'random' || $module['products']['get_products_from'] == 'people_also_bought' || $module['products']['get_products_from'] == 'most_viewed' || $module['products']['get_products_from'] == 'related') {
          	     		if($module['products']['get_products_from'] == 'latest') {
          	     			$data_products = array(
          	     				'sort'  => 'p.date_added',
          	     				'order' => 'DESC',
          	     				'start' => 0,
          	     				'limit' => $module['products']['limit']
          	     			);
          	     
          	     			$results = $this->model_catalog_product->getProducts($data_products);
          	          	} elseif($module['products']['get_products_from'] == 'special') {
          	          			$data_products = array(
          	          				'sort'  => 'pd.name',
          	          				'order' => 'ASC',
          	          				'start' => 0,
          	          				'limit' => $module['products']['limit']
          	          			);
          	          	
          	          			$results = $this->model_catalog_product->getProductSpecials($data_products);
          	          	} elseif($module['products']['get_products_from'] == 'bestsellers') {
          	          			$results = $this->model_catalog_product->getBestSellerProducts($module['products']['limit']);
          	          	} elseif($module['products']['get_products_from'] == 'category') {
          	          			$select_categories = explode(',', $module['products']['categories']);	
          	          			$results = array();
          	          			foreach($select_categories as $category) {
          	          				$data_products = array(
          	          					'filter_category_id' => $category,
          	          					'start'              => 0,
          	          					'sort'               => 'p.date_added',
          	          					'order'              => 'DESC',
          	          					'limit'              => $module['products']['limit']
          	          				);
          	          				$results = array_merge($results, $this->model_catalog_product->getProducts($data_products));
          	          			}
          	          			$results = array_slice($results, 0, (int)$module['products']['limit']);	
          	          	} elseif($module['products']['get_products_from'] == 'random') {
          	          	          $this->load->model('catalog/products');
          	          			$results = $this->model_catalog_products->getRandomProducts($module['products']['limit']);
          	          	} elseif($module['products']['get_products_from'] == 'people_also_bought') {
          	          	          $this->load->model('catalog/products');
          	          			$results = $this->model_catalog_products->getAlsoBoughtProducts($module['products']['limit']);
          	          	} elseif($module['products']['get_products_from'] == 'most_viewed') {
          	          	          $this->load->model('catalog/products');
          	          			$results = $this->model_catalog_products->getMostViewedProducts($module['products']['limit']);
          	          	} elseif($module['products']['get_products_from'] == 'related') {
                                   $this->load->model('catalog/products');
                                   $results = $this->model_catalog_products->getProductsRelated($module['products']['limit']);
          	          	}
          	          
          	          	foreach ($results as $result) {
          	          			if ($result['image']) {
          	          				$image = $this->model_tool_image->resize($result['image'], $module['products']['width'], $module['products']['height']);
          	          			} else {
          	          				$image = false;
          	          			}
          	          						
          	          			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
          	          				$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
          	          			} else {
          	          				$price = false;
          	          			}
          	          					
          	          			if ((float)$result['special']) {
          	          				$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
          	          			} else {
          	          				$special = false;
          	          			}
          	          			
          	          			if ($this->config->get('config_review_status')) {
          	          				$rating = $result['rating'];
          	          			} else {
          	          				$rating = false;
          	          			}
          	          			
          	          			$products[] = array(
          	          				'product_id' => $result['product_id'],
          	          				'thumb'   	 => $image,
          	          				'name'    	 => $result['name'],
          	          				'price'   	 => $price,
          	          				'special' 	 => $special,
          	          				'rating'     => $rating,
          	          				'reviews'    => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
          	          				'href'    	 => $this->url->link('product/product', 'product_id=' . $result['product_id']),
          	          			);
          	          	}
     	     		}
     	     		
     	     		// Wybrane produkty
     	     		if($module['products']['get_products_from'] == 'products') {
     	     			$select_products = explode(',', $module['products']['products']);	
     	     			$select_products = array_slice($select_products, 0, (int)$module['products']['limit']);	
     	     			
     	     			foreach ($select_products as $product_id) {
     	     				$product_info = $this->model_catalog_product->getProduct($product_id);
     	     				
     	     				if ($product_info) {
     	     					if ($product_info['image']) {
     	     						$image = $this->model_tool_image->resize($product_info['image'], $module['products']['width'], $module['products']['height']);
     	     					} else {
     	     						$image = false;
     	     					}
     	     	
     	     					if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
     	     						$price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
     	     					} else {
     	     						$price = false;
     	     					}
     	     							
     	     					if ((float)$product_info['special']) {
     	     						$special = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
     	     					} else {
     	     						$special = false;
     	     					}
     	     					
     	     					if ($this->config->get('config_review_status')) {
     	     						$rating = $product_info['rating'];
     	     					} else {
     	     						$rating = false;
     	     					}
     	     						
     	     					$products[] = array(
     	     						'product_id' => $product_info['product_id'],
     	     						'thumb'   	 => $image,
     	     						'name'    	 => $product_info['name'],
     	     						'price'   	 => $price,
     	     						'special' 	 => $special,
     	     						'rating'     => $rating,
     	     						'reviews'    => sprintf($this->language->get('text_reviews'), (int)$product_info['reviews']),
     	     						'href'    	 => $this->url->link('product/product', 'product_id=' . $product_info['product_id'])
     	     					);
     	     				}
     	     			}
     	     		}
     	     		
     	     		$content = array(
     	     		     'title' => $title,
     	     		     'limit' => $module['products']['limit'],
     	     		     'module_template' => $module['products']['module_layout'],
     	     		     'products' => $products
     	     		);
	               }
	               
	               if($module['type'] == 'products_tabs') {
	                    if(isset($module['products_tabs']['title'][$this->config->get('config_language_id')])) {
	                         $title = html_entity_decode($module['products_tabs']['title'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
	                    } else {
	                         $title = 'Set name!';
	                    }
	                    
	                    if(isset($module['products_tabs']['description'][$this->config->get('config_language_id')])) {
	                         $description = html_entity_decode($module['products_tabs']['description'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
	                    } else {
	                         $description = 'Set name!';
	                    }
	                    
	                    $products_tabs = array();
	                    
	                    if(isset($module['products_tabs']['products'])) {
	                         if(is_array($module['products_tabs']['products'])) {
	                              foreach($module['products_tabs']['products'] as $product_tab) {
	                                   if(isset($product_tab['title'][$this->config->get('config_language_id')])) {
	                                        $name = html_entity_decode($product_tab['title'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
	                                   } else {
	                                        $name = 'Set name!';
	                                   }
	                                   
	                                   $products = array();
	                                   
	                                   // Najnowsze produkty, Specjalne produkty, Najlepiej sprzedajace się produkty, Wybrane produkty z kategorii
	                                   if($product_tab['get_products_from'] == 'latest' || $product_tab['get_products_from'] == 'special' || $product_tab['get_products_from'] == 'bestsellers' || $product_tab['get_products_from'] == 'category' || $product_tab['get_products_from'] == 'random' || $product_tab['get_products_from'] == 'people_also_bought' || $product_tab['get_products_from'] == 'most_viewed' || $product_tab['get_products_from'] == 'related') {
	                              		if($product_tab['get_products_from'] == 'latest') {
	                              			$data_products = array(
	                              				'sort'  => 'p.date_added',
	                              				'order' => 'DESC',
	                              				'start' => 0,
	                              				'limit' => $module['products_tabs']['limit']
	                              			);
	                              
	                              			$results = $this->model_catalog_product->getProducts($data_products);
	                                   	} elseif($product_tab['get_products_from'] == 'special') {
	                                   			$data_products = array(
	                                   				'sort'  => 'pd.name',
	                                   				'order' => 'ASC',
	                                   				'start' => 0,
	                                   				'limit' => $module['products_tabs']['limit']
	                                   			);
	                                   	
	                                   			$results = $this->model_catalog_product->getProductSpecials($data_products);
	                                   	} elseif($product_tab['get_products_from'] == 'bestsellers') {
	                                   			$results = $this->model_catalog_product->getBestSellerProducts($module['products_tabs']['limit']);
	                                   	} elseif($product_tab['get_products_from'] == 'category') {
	                                   			$select_categories = explode(',', $product_tab['categories']);	
	                                   			$results = array();
	                                   			foreach($select_categories as $category) {
	                                   				$data_products = array(
	                                   					'filter_category_id' => $category,
	                                   					'start'              => 0,
	                                   					'sort'               => 'p.date_added',
	                                   					'order'              => 'DESC',
	                                   					'limit'              => $module['products_tabs']['limit']
	                                   				);
	                                   				$results = array_merge($results, $this->model_catalog_product->getProducts($data_products));
	                                   			}
	                                   			$results = array_slice($results, 0, (int)$module['products_tabs']['limit']);	
	                                   	} elseif($product_tab['get_products_from'] == 'random') {
	                                   	          $this->load->model('catalog/products');
	                                   			$results = $this->model_catalog_products->getRandomProducts($module['products_tabs']['limit']);
	                                   	} elseif($product_tab['get_products_from'] == 'people_also_bought') {
	                                   	          $this->load->model('catalog/products');
	                                   			$results = $this->model_catalog_products->getAlsoBoughtProducts($module['products_tabs']['limit']);
	                                   	} elseif($product_tab['get_products_from'] == 'most_viewed') {
	                                   	          $this->load->model('catalog/products');
	                                   			$results = $this->model_catalog_products->getMostViewedProducts($module['products_tabs']['limit']);
	                                   	} elseif($product_tab['get_products_from'] == 'related') {
	                                             $this->load->model('catalog/products');
	                                             $results = $this->model_catalog_products->getProductsRelated($module['products_tabs']['limit']);
	                                   	}
	                                   
	                                   	foreach ($results as $result) {
	                                   			if ($result['image']) {
	                                   				$image = $this->model_tool_image->resize($result['image'], $module['products_tabs']['width'], $module['products_tabs']['height']);
	                                   			} else {
	                                   				$image = false;
	                                   			}
	                                   						
	                                   			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
	                                   				$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
	                                   			} else {
	                                   				$price = false;
	                                   			}
	                                   					
	                                   			if ((float)$result['special']) {
	                                   				$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
	                                   			} else {
	                                   				$special = false;
	                                   			}
	                                   			
	                                   			if ($this->config->get('config_review_status')) {
	                                   				$rating = $result['rating'];
	                                   			} else {
	                                   				$rating = false;
	                                   			}
	                                   			
	                                   			$products[] = array(
	                                   				'product_id' => $result['product_id'],
	                                   				'thumb'   	 => $image,
	                                   				'name'    	 => $result['name'],
	                                   				'price'   	 => $price,
	                                   				'special' 	 => $special,
	                                   				'rating'     => $rating,
	                                   				'reviews'    => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
	                                   				'href'    	 => $this->url->link('product/product', 'product_id=' . $result['product_id']),
	                                   			);
	                                   	}
	                              	}
	                              	
	                              	// Wybrane produkty
	                              	if($product_tab['get_products_from'] == 'products') {
	                              		$select_products = explode(',', $product_tab['products']);	
	                              		$select_products = array_slice($select_products, 0, (int)$module['products_tabs']['limit']);	
	                              		
	                              		foreach ($select_products as $product_id) {
	                              			$product_info = $this->model_catalog_product->getProduct($product_id);
	                              			
	                              			if ($product_info) {
	                              				if ($product_info['image']) {
	                              					$image = $this->model_tool_image->resize($product_info['image'], $module['products_tabs']['width'], $module['products_tabs']['height']);
	                              				} else {
	                              					$image = false;
	                              				}
	                              
	                              				if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
	                              					$price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
	                              				} else {
	                              					$price = false;
	                              				}
	                              						
	                              				if ((float)$product_info['special']) {
	                              					$special = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
	                              				} else {
	                              					$special = false;
	                              				}
	                              				
	                              				if ($this->config->get('config_review_status')) {
	                              					$rating = $product_info['rating'];
	                              				} else {
	                              					$rating = false;
	                              				}
	                              					
	                              				$products[] = array(
	                              					'product_id' => $product_info['product_id'],
	                              					'thumb'   	 => $image,
	                              					'name'    	 => $product_info['name'],
	                              					'price'   	 => $price,
	                              					'special' 	 => $special,
	                              					'rating'     => $rating,
	                              					'reviews'    => sprintf($this->language->get('text_reviews'), (int)$product_info['reviews']),
	                              					'href'    	 => $this->url->link('product/product', 'product_id=' . $product_info['product_id'])
	                              				);
	                              			}
	                              		}
	                              	}
	                                   
	                                   $products_tabs[] = array(
	                                        'name' => $name,
	                                        'products' => $products
	                                   );
	                              }     
	                         }
	                    }
	               	
	               	$content = array(
	               	     'title' => $title,
	               	     'description' => $description,
	               	     'limit' => $module['products_tabs']['limit'],
	               	     'module_template' => $module['products_tabs']['module_layout'],
	               	     'products_tabs' => $products_tabs
	               	);
	               }
	               
	               $output[] = array(
	                    'sort' => $module['sort'],
	                    'type' => $module['type'],
	                    'content' => $content
	               );
	          }
	     }
	     
	     usort($output, "cmp_by_optionNumber");
	     
	     return $output;
	}
}
?>
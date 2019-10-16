<?php
/* 
Version: 1.0
Author: Artur SuÅkowski
Website: http://artursulkowski.pl
*/

class ModelMenuMegamenu extends Model {		
	public function getMenu($module_id = 0) {
		$output = array();
		$lang_id = $this->config->get('config_language_id');
		$query = $this->db->query("SELECT * FROM ".DB_PREFIX."mega_menu WHERE parent_id='0' AND status='0' AND module_id='" . $module_id . "' ORDER BY rang");
		foreach ($query->rows as $row) {
			$icon = false;
			if($row['icon'] != '') {
				if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
					$link = $this->config->get('config_ssl') . 'image/' . $row['icon'];
				} else {
					$link = $this->config->get('config_url') . 'image/' . $row['icon'];
				}
				$icon = '<img src="'.$link.'" alt="">';
			}
			$description = false;
			$description_array = unserialize($row['description']);
			if(isset($description_array[$lang_id])) {
				if(!empty($description_array[$lang_id])) {
					$icon = $icon.'<div class="description-left">';
					$description = '<br><span class="description">'.$description_array[$lang_id].'</span></div>';
				}
			}
			
			$label = false;
			$label_array = unserialize($row['label']);
			if(isset($label_array[$lang_id])) {
				if(!empty($label_array[$lang_id])) $label = $label_array[$lang_id];
			}
			
			if(@unserialize($row['link'])) {
				$row['link'] = unserialize($row['link']);
				if(isset($row['link'][$lang_id])) {
					$row['link'] = $row['link'][$lang_id];
				} else {
					$row['link'] = false;
				}
			}
			
			$output[] = array(
				'icon' => $icon,
				'name' => unserialize($row['name']),
				'link' => $row['link'],
				'description' => $description,
				'label' => $label,
				'label_text_color' => $row['label_text_color'],
				'label_background_color' => $row['label_background_color'],
				'custom_class' => $row['custom_class'],
				'new_window' => $row['new_window'],
				'display_on_mobile' => $row['display_on_mobile'],
				'position' => $row['position'],
				'submenu_width' => $row['submenu_width'],
				'submenu_type' => $row['submenu_type'],
				'submenu_background' => $row['submenu_background'],
				'submenu_background_position' => $row['submenu_background_position'],
				'submenu_background_repeat' => $row['submenu_background_repeat'],
				'submenu' => $this->getSubmenu($row['id'], $module_id)
			);
		}
		return $output;
	}

	public function getSubmenu($id, $module_id = 0) {
		global $loader, $registry;
		$output = array();
		$lang_id = $this->config->get('config_language_id');
		
		// Product model
		$model = $this->registry->get('model_catalog_product');

		// Tool model
		$model_image = $this->registry->get('model_tool_image');
				
		$query = $this->db->query("SELECT * FROM ".DB_PREFIX."mega_menu WHERE parent_id='".$id."' AND status='0' AND module_id='" . $module_id . "' ORDER BY rang");
		foreach ($query->rows as $row) {

			$content = unserialize($row['content']);
			if(isset($content['html']['text'][$lang_id])) {
				$html = htmlspecialchars_decode($content['html']['text'][$lang_id]);
			} else {
				$html = false;
			}
			
			if(isset($content['categories'])) {
				if(is_array($content['categories'])) {
					$categories = $this->getCategories($content['categories']);
				} else {
					$categories = false;
				}
			} else {
				$categories = false;
			}
			
			if(isset($content['categories'])) {
				if(is_array($content['categories'])) {
					$mobile_categories = $this->getMobileCategories($content['categories']);
				} else {
					$mobile_categories = false;
				}
			} else {
				$mobile_categories = false;
			}
			
			if(isset($content['product']['id'])) {
				$product = $model->getProduct($content['product']['id']);
				if(is_array($product)) {
					$product_link = $this->url->link('product/product', 'product_id=' . $content['product']['id']);
					
					if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
						$price = $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					} else {
						$price = false;
					}
					
					if ((float)$product['special']) {
						$special = $this->currency->format($this->tax->calculate($product['special'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					} else {
						$special = false;
					}
				} else {
					$product['name'] = false;
					$product_link = false;
					$price = false;
					$special = false;
				}
			} else {	
				$product['name'] = false;
				$product_link = false;
				$price = false;
				$special = false;
			}

			if(isset($product['image'])) {
				if(!isset($content['product']['width'])) $content['product']['width'] = 400;
				if(!isset($content['product']['height'])) $content['product']['height'] = 400;
				if($content['product']['width'] < 1) $content['product']['width'] = 400;
				if($content['product']['height'] < 1) $content['product']['height'] = 400;
				$product_image = $model_image->resize($product['image'], $content['product']['width'], $content['product']['height']);
			} else {	
				$product_image = false;
			}
			
			$products = array();
			$column = 1;
			$heading = array();
			if(isset($content['products']['products'])) {
			     if(is_array($content['products']['products'])) {
			          if($content['products']['image_width'] < 1) $content['products']['image_width'] = 150;
			          if($content['products']['image_height'] < 1) $content['products']['image_height'] = 150;
			          $products = $this->getProducts($content['products']['products'], $content['products']['image_width'], $content['products']['image_height']);
			          $column = $content['products']['columns'];
			          $heading = $content['products']['heading'];
			     }
			}
			
			$output[] = array(
				'content_width' => intval($row['content_width']),
				'content_type' => $row['content_type'],
				'display_on_mobile' => $row['display_on_mobile'],
				'html' => $html,
				'product' => array(
					'name' => $product['name'],
					'link' => $product_link,
					'image' => $product_image,
					'price' => $price,
					'special' => $special
				),
				'products' => $products,
				'column' => $column,
				'heading' => $heading,
				'categories' => $categories,
				'mobile_categories' => $mobile_categories,
				'submenu' => $this->getSubmenu($row['id'], $module_id)
			);
		}
		return $output;
	}
	
	public function getProducts($products = array(), $image_width, $image_height) {
	     global $loader, $registry;
	     $output = array();
	     $lang_id = $this->config->get('config_language_id');
	     
	     // Product model
	     $model = $this->registry->get('model_catalog_product');
	     
	     // Tool model
	     $model_image = $this->registry->get('model_tool_image');
	     
	     foreach($products as $product) {
	          $product = $model->getProduct($product['id']);
	          if(is_array($product)) {
     	          if(isset($product['product_id'])) {
     	               $product_link = $this->url->link('product/product', 'product_id=' . $product['product_id']);
     	          } else {
     	               $product_link = false;
     	          }
     	          
     	          if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
     	          	$price = $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
     	          } else {
     	          	$price = false;
     	          }
     	          
     	          if ((float)$product['special']) {
     	          	$special = $this->currency->format($this->tax->calculate($product['special'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
     	          } else {
     	          	$special = false;
     	          }
     	          
     	          if(isset($product['image'])) {
     	          	$product_image = $model_image->resize($product['image'], $image_width, $image_height);
     	          } else {	
     	          	$product_image = false;
     	          }
     	          
     	          if(isset($product['name'])) {
     	               $product_name = $product['name'];
     	          } else {
     	               $product_name = false;
     	          }
     	          
     	          $output[] = array(
     	               'id' => $product['product_id'],
     	               'name' => $product_name,
     	               'link' => $product_link,
     	               'image' => $product_image,
     	               'price' => $price,
     	               'special' => $special
     	          );
	          }
	     }
	     
	     return $output;
	}

	public function getMobileCategories($array = array()) {
		global $loader, $registry;
		
		$output = false;
		$lang_id = $this->config->get('config_language_id');
		
		// Category model
		$model = $this->registry->get('model_catalog_category');
	
		for ($i = 0; $i < count($array['categories']);) {
			if(isset($array['categories'][$i]['id'])) {
				$info_category = $model->getCategory($array['categories'][$i]['id']);
				if(isset($info_category['category_id']) || isset($array['categories'][$i]['type'])) {     				     
				     if(isset($info_category['category_id'])) {
						$path = '';
						
						if(@$info_category['parent_id'] > 0) {
							$path = $info_category['parent_id'];
							$info_category2 = $model->getCategory($info_category['parent_id']);
							if(@$info_category2['parent_id'] > 0) {
								$path = $info_category2['parent_id'] . '_' . $path;
								$info_category3 = $model->getCategory($info_category2['parent_id']);
								if(@$info_category3['parent_id'] > 0) {
									$path = $info_category3['parent_id'] . '_' . $path;
								}
							}
						}
						
						if($path != '') {
							$path = $path . '_';
						}
					}
					
					if(is_array($info_category) || isset($array['categories'][$i]['type'])) {
						if(isset($info_category['category_id'])) $link = $this->url->link('product/category', 'path=' . $path . $info_category['category_id']);
						
						if(isset($array['categories'][$i]['type'])) {
						     if($array['categories'][$i]['type'] == 'link') {
						          $info_link = $this->getLink($array['categories'][$i]['id']);
						          if(isset($info_link['url']) ) {
						          	if(@unserialize($info_link['url'])) {
						          		$newlink = unserialize($info_link['url']);
						          		if(isset($newlink[$lang_id])) {
						          			$link = $newlink[$lang_id];
						          		} else {
						          			$link = '';
						          		}
						          	} else {
								          $link = $info_link['url'];
								    }

							        $name_array = unserialize($info_link['name']);
							        $label_array = unserialize($info_link['label']);
							        if(isset($name_array[$lang_id])) {
							          	if(!empty($name_array[$lang_id])) {
							          	     $info_category['name'] = htmlspecialchars_decode($name_array[$lang_id]);								          	     
							          	}
							        }
						        }
						    }
						}
						
						if(isset($info_category['name'])) {
							$output .= '<li>';
								$output .= '<a href="' . $link . '">' . $info_category['name'] . '</a>';
								if(isset($array['categories'][$i]['children'])) {
									if(!empty($array['categories'][$i]['children'])) {
										$output .= $this->getMobileCategoriesChildren($array['categories'][$i]['children'], $array['categories'][$i]['id'], $array['submenu_columns'], $array['submenu'], false);
									}
								}
							$output .= '</li>';
						}
					}
				}
			}
			$i++;
		}
		return $output;
	}

	public function getMobileCategoriesChildren($array = array(), $path, $columns, $type, $submenu = false, $width = false, $height = false) {
		global $loader, $registry;
		
		$output = false;
		$lang_id = $this->config->get('config_language_id');

		// Category model
		$model = $this->registry->get('model_catalog_category');

		$output .= '<ul>';
			foreach($array as $row) {
				$info_category = $model->getCategory($row['id']);
				if(isset($info_category['category_id']) || isset($row['type'])) {
					if(isset($info_category['category_id'])) {
						$path = '';
						
						if(@$info_category['parent_id'] > 0) {
							$path = $info_category['parent_id'];
							$info_category2 = $model->getCategory($info_category['parent_id']);
							if(@$info_category2['parent_id'] > 0) {
								$path = $info_category2['parent_id'] . '_' . $path;
								$info_category3 = $model->getCategory($info_category2['parent_id']);
								if(@$info_category3['parent_id'] > 0) {
									$path = $info_category3['parent_id'] . '_' . $path;
								}
							}
						}
						
						if($path != '') {
							$path = $path . '_';
						}
					}
					
					if(is_array($info_category) || isset($row['type'])) {
						if(isset($info_category['category_id'])) $link = $this->url->link('product/category', 'path=' . $path . $info_category['category_id']);
						if(isset($row['type'])) {
						     if($row['type'] == 'link') {
						          $info_link = $this->getLink($row['id']);
						          if(isset($info_link['url']) ) {
							          	if(@unserialize($info_link['url'])) {
							          		$newlink = unserialize($info_link['url']);
							          		if(isset($newlink[$lang_id])) {
							          			$link = $newlink[$lang_id];
							          		} else {
							          			$link = '';
							          		}
							          	} else {
							             $link = $info_link['url'];
							           }
							          $name_array = unserialize($info_link['name']);
							          $label_array = unserialize($info_link['label']);
							          if(isset($name_array[$lang_id])) {
							          	if(!empty($name_array[$lang_id])) {
							          	     $info_category['name'] = htmlspecialchars_decode($name_array[$lang_id]);
							          	}
							          }
						          }
						     }
						}
						
						if(!isset($info_category['name'])) $info_category['name'] = 'Set name';
						
						$output .= '<li><a href="'.$link.'">'.$info_category['name'].'</a>';
							if(isset($row['children'])) {
								if(!empty($row['children'])) {
								     if(!isset($info_category['category_id'])) $info_category['category_id'] = 0;
									$output .= $this->getCategoriesChildren($row['children'], $path.'_'.$info_category['category_id'], $columns, $type);
								}
							}
						$output .= '</li>';
					}
				}
			}
		$output .= '</ul>';
		
		return $output;
	}
	
	public function getCategories($array = array()) {
		global $loader, $registry;
		
		$output = false;
		$lang_id = $this->config->get('config_language_id');
		
		// Category model
		$model = $this->registry->get('model_catalog_category');
		
		$output .= '<div class="row">';
			$row_fluid = 12;
			if($array['columns'] == 2) { $row_fluid = 6; }
			if($array['columns'] == 3) { $row_fluid = 4; }
			if($array['columns'] == 4) { $row_fluid = 3; }
			if($array['columns'] == 5) { $row_fluid = 25; }
			if($array['columns'] == 6) { $row_fluid = 2; }
			if(!($array['columns'] > 0 && $array['columns'] < 7)) { $array['columns'] = 1; }
			$menu_class = 'hover-menu';
			if($array['submenu'] == 2) { $menu_class = 'static-menu'; }
			
			for ($i = 0; $i < count($array['categories']);) {
				$output .= '<div class="col-sm-'.$row_fluid.' '.$menu_class.'">';
					$output .= '<div class="menu">';
						$output .= '<ul class="'; if($array['submenu'] == 1) { $output .= 'tt-megamenu-submenu'; } $output .= '">';
							$j = $i + ceil(count($array['categories']) / $array['columns']);
							for (; $i < $j; $i++) { 
								if(isset($array['categories'][$i]['id'])) {
									$info_category = $model->getCategory($array['categories'][$i]['id']);
									if(isset($info_category['category_id']) || isset($array['categories'][$i]['type'])) {     
									     $image_url = false;
									     
									     if(isset($info_category['category_id'])) {
     										$path = '';
     										
     										if(@$info_category['parent_id'] > 0) {
     											$path = $info_category['parent_id'];
     											$info_category2 = $model->getCategory($info_category['parent_id']);
     											if(@$info_category2['parent_id'] > 0) {
     												$path = $info_category2['parent_id'] . '_' . $path;
     												$info_category3 = $model->getCategory($info_category2['parent_id']);
     												if(@$info_category3['parent_id'] > 0) {
     													$path = $info_category3['parent_id'] . '_' . $path;
     												}
     											}
     										}
     										
     										if($path != '') {
     											$path = $path . '_';
     										}
     										
     										if($info_category['image'] != '') $image_url = $info_category['image'];
										}
										
										if(is_array($info_category) || isset($array['categories'][$i]['type'])) {
											$class_link = false;
											if(isset($array['categories'][$i]['children'])) { if(!empty($array['categories'][$i]['children'])) { $class_link = 'with-submenu'; } }
											if(isset($info_category['category_id'])) $link = $this->url->link('product/category', 'path=' . $path . $info_category['category_id']);
											
											if(isset($array['categories'][$i]['type'])) {
											     if($array['categories'][$i]['type'] == 'link') {
											          $info_link = $this->getLink($array['categories'][$i]['id']);
											          if(isset($info_link['url']) ) {
											          	if(@unserialize($info_link['url'])) {
											          		$newlink = unserialize($info_link['url']);
											          		if(isset($newlink[$lang_id])) {
											          			$link = $newlink[$lang_id];
											          		} else {
											          			$link = '';
											          		}
											          	} else {
     											          $link = $info_link['url'];
     											        }
     											          $name_array = unserialize($info_link['name']);
     											          $label_array = unserialize($info_link['label']);
     											          if(isset($name_array[$lang_id])) {
     											          	if(!empty($name_array[$lang_id])) {
     											          	     $info_category['name'] = htmlspecialchars_decode($name_array[$lang_id]);
     											          	     if($info_link['image'] != '') $image_url = $info_link['image'];
     											          	     
     											          	     if($label_array[$lang_id] != '') { $info_category['name'] .= ' <span class="tt-badge" style="background: ' . $info_link['label_background'] . ';color: ' . $info_link['label_text'] . '"><span style="background: ' . $info_link['label_background'] . ';border-color: ' . $info_link['label_background'] . '"></span>' . $label_array[$lang_id] . '</span>'; }
     											          	}
     											          }
											          }
											     }
											}
											
											if(isset($info_category['name'])) {
     											$output .= '<li>';
     											if(!isset($array['image_position'])) $array['image_position'] = false;
     											if($array['submenu'] == 2) {
     												$output .= '<h6 class="tt-title-submenu">';
     											}
     											$output .= '<a href="'.$link.'" onclick="window.location = \''.$link.'\';" class="main-menu ' . $class_link . '">'.$info_category['name'].'</a>';
     											if($array['submenu'] == 2 && $array['image_position'] == 2 && $image_url) {
     											     $model_tool_image = $this->registry->get('model_tool_image');
     											     $image = $model_tool_image->resize($image_url, $array['image_width'], $array['image_height']);
     											     $output .= '<div class="categories-image-top"><a href="'.$link.'"><img src="' . $image . '" alt="'.$info_category['name'].'"></a></div>';
     											}
     											if($array['submenu'] == 2) {
     												$output .= '</h6>';
     											}
     												if(isset($array['categories'][$i]['children'])) {
     													if(!empty($array['categories'][$i]['children'])) {
     													     $width = false;
     													     $height = false;
     													     if($array['submenu'] == 2 && $array['image_position'] == 3 && $image_url) {
     													          if($array['image_width'] < 1) $array['image_width'] = 100;
     													          if($array['image_height'] < 1) $array['image_height'] = 100;
     													          $model_tool_image = $this->registry->get('model_tool_image');
     													          $image = $model_tool_image->resize($image_url, $array['image_width'], $array['image_height']); 
     													          $width = $array['image_width'];
     													          $height = $array['image_height'];
     													          $output .= '<div class="open-categories"></div><div class="close-categories"></div><div class="clearfix categories-image-right" data-image="' . $image . '"><div class="left-categories-image-right">';
     													     }
     													     
     													     if($array['submenu'] == 2 && $array['image_position'] == 4 && $image_url) {
     													          if($array['image_width'] < 1) $array['image_width'] = 100;
     													          if($array['image_height'] < 1) $array['image_height'] = 100;
     													          $model_tool_image = $this->registry->get('model_tool_image');
     													          $image = $model_tool_image->resize($image_url, $array['image_width'], $array['image_height']); 
     													          $width = $array['image_width'];
     													          $height = $array['image_height'];
     													          $output .= '<div class="open-categories"></div><div class="close-categories"></div><div class="clearfix categories-image-right" data-image="' . $image . '"><div class="left-categories-image-left"><a href="'.$link.'"><img src="' . $image . '" class="image-right" alt="'.$info_category['name'].'"></a></div><div class="right-categories-image-left">';
     													     }
     													     
     														$output .= $this->getCategoriesChildren($array['categories'][$i]['children'], $array['categories'][$i]['id'], $array['submenu_columns'], $array['submenu'], false, $width, $height);
     														if($array['submenu'] == 2 && $array['image_position'] == 3 && $image_url) {
     														     $output .= '</div><div class="right-categories-image-right"><a href="'.$link.'"><img src="' . $image . '" class="image-right" alt="'.$info_category['name'].'"></a></div></div>';
     														}
     														
     														if($array['submenu'] == 2 && $array['image_position'] == 4 && $image_url) {
     														     $output .= '</div>';
     														}
     													}
     												}
     											$output .= '</li>';
											}
										}
									}
								}
							}
						$output .= '</ul>';
					$output .= '</div>';
				$output .= '</div>';
			}
		$output .= '</div>';
		return $output;
	}
	
	public function getCategoriesChildren($array = array(), $path, $columns, $type, $submenu = false, $width = false, $height = false) {
		global $loader, $registry;
		
		$output = false;
		$lang_id = $this->config->get('config_language_id');

		// Category model
		$model = $this->registry->get('model_catalog_category');
				
		if($type == 2) {
			$row_fluid = 12;
			if($columns == 2) { $row_fluid = 6; }
			if($columns == 3) { $row_fluid = 4; }
			if($columns == 4) { $row_fluid = 3; }
			if($columns == 5) { $row_fluid = 25; }
			if($columns == 6) { $row_fluid = 2; }
			if(!($columns > 0 && $columns < 7)) { $columns = 1; }
			if($submenu == true) { $columns = 1; $row_fluid = 12; }
			
			if(!($width > 0 && $height > 0)) { $output .= '<div class="open-categories"></div><div class="close-categories"></div>'; }
			if($columns != 1) {
				$output .= '<div class="row visible">';
			}
				for ($i = 0; $i < count($array);) {
					if($columns != 1) {
						$output .= '<div class="col-sm-'.$row_fluid.'">';
					}
						$output .= '<ul class="tt-megamenu-submenu">';
							$j = $i + ceil(count($array) / $columns);
							for (; $i < $j; $i++) { 
								if(isset($array[$i]['id'])) {
									$info_category = $model->getCategory($array[$i]['id']);
									if(isset($info_category['category_id']) || isset($array[$i]['type'])) {
									     $data_image = false;
										if(isset($info_category['category_id'])) {
											$path = '';
											
											if($info_category['parent_id'] > 0) {
												$path = $info_category['parent_id'];
												$info_category2 = $model->getCategory($info_category['parent_id']);
												if(@$info_category2['parent_id'] > 0) {
													$path = $info_category2['parent_id'] . '_' . $path;
													$info_category3 = $model->getCategory($info_category2['parent_id']);
													if($info_category3['parent_id'] > 0) {
														$path = $info_category3['parent_id'] . '_' . $path;
													}
												}
											}
											
											if($path != '') {
												$path = $path . '_';
											}
											
											if($info_category['image'] != '' && $width > 0 && $height > 0) {
											     $model_tool_image = $this->registry->get('model_tool_image');
											     $image = $model_tool_image->resize($info_category['image'], $width, $height); 
											     $data_image = ' data-image="' . $image . '"';
											}
										}
										
										if(is_array($info_category) || isset($array[$i]['type'])) {
											if(isset($info_category['category_id'])) $link = $this->url->link('product/category', 'path=' . $path . $info_category['category_id']);
											if(isset($array[$i]['type'])) {
											     if($array[$i]['type'] == 'link') {
											          $info_link = $this->getLink($array[$i]['id']);
											          if(isset($info_link['url']) ) {
												          	if(@unserialize($info_link['url'])) {
												          		$newlink = unserialize($info_link['url']);
												          		if(isset($newlink[$lang_id])) {
												          			$link = $newlink[$lang_id];
												          		} else {
												          			$link = '';
												          		}
												          	} else {
												             $link = $info_link['url'];
												           }
												          $name_array = unserialize($info_link['name']);
												          $label_array = unserialize($info_link['label']);
												          if(isset($name_array[$lang_id])) {
												          	if(!empty($name_array[$lang_id])) {
												          	     $info_category['name'] = htmlspecialchars_decode($name_array[$lang_id]);
												          	     if($info_link['image'] != '' && $width > 0 && $height > 0) {
												          	          $model_tool_image = $this->registry->get('model_tool_image');
												          	          $image = $model_tool_image->resize($info_link['image'], $width, $height); 
												          	          $data_image = ' data-image="' . $image . '"';
												          	     }
												          	     
     											          	     if($label_array[$lang_id] != '') { $info_category['name'] .= ' <span class="tt-badge" style="background: ' . $info_link['label_background'] . ';color: ' . $info_link['label_text'] . '"><span style="background: ' . $info_link['label_background'] . ';border-color: ' . $info_link['label_background'] . '"></span>' . $label_array[$lang_id] . '</span>'; }
												          	}
												          }
											          }
											     }
											}
											
											if(!isset($info_category['name'])) $info_category['name'] = 'Set name';
											
											$output .= '<li><a href="'.$link.'" onclick="window.location = \''.$link.'\';"' . $data_image . '>'.$info_category['name'].'</a>';
												if(isset($array[$i]['children'])) {
													if(!empty($array[$i]['children'])) {
													     if(!isset($info_category['category_id'])) $info_category['category_id'] = 0;
														$output .= $this->getCategoriesChildren($array[$i]['children'], $path.'_'.$info_category['category_id'], $columns, $type, true);
													}
												}
											$output .= '</li>';
										}
									}
								}
							}
						$output .= '</ul>';
					if($columns != 1) {
						$output .= '</div>';
					}
				}
			if($columns != 1) {
				$output .= '</div>';
			}
		} else {
			$output .= '<div class="open-categories"></div><div class="close-categories"></div>';
			$output .= '<ul>';
				foreach($array as $row) {
					$info_category = $model->getCategory($row['id']);
					if(isset($info_category['category_id']) || isset($row['type'])) {
						if(isset($info_category['category_id'])) {
							$path = '';
							
							if(@$info_category['parent_id'] > 0) {
								$path = $info_category['parent_id'];
								$info_category2 = $model->getCategory($info_category['parent_id']);
								if(@$info_category2['parent_id'] > 0) {
									$path = $info_category2['parent_id'] . '_' . $path;
									$info_category3 = $model->getCategory($info_category2['parent_id']);
									if(@$info_category3['parent_id'] > 0) {
										$path = $info_category3['parent_id'] . '_' . $path;
									}
								}
							}
							
							if($path != '') {
								$path = $path . '_';
							}
						}
						
						$class_link = false;
						if(isset($row['children'])) { 
							if(!empty($row['children'])) $class_link = 'with-submenu';
						}
						
						if(is_array($info_category) || isset($row['type'])) {
							if(isset($info_category['category_id'])) $link = $this->url->link('product/category', 'path=' . $path . $info_category['category_id']);
							if(isset($row['type'])) {
							     if($row['type'] == 'link') {
							          $info_link = $this->getLink($row['id']);
							          if(isset($info_link['url']) ) {
								          	if(@unserialize($info_link['url'])) {
								          		$newlink = unserialize($info_link['url']);
								          		if(isset($newlink[$lang_id])) {
								          			$link = $newlink[$lang_id];
								          		} else {
								          			$link = '';
								          		}
								          	} else {
								             $link = $info_link['url'];
								           }
								          $name_array = unserialize($info_link['name']);
								          $label_array = unserialize($info_link['label']);
								          if(isset($name_array[$lang_id])) {
								          	if(!empty($name_array[$lang_id])) {
								          	     $info_category['name'] = htmlspecialchars_decode($name_array[$lang_id]);
								          	     
								          	     if($label_array[$lang_id] != '') { $info_category['name'] .= ' <span class="tt-badge" style="background: ' . $info_link['label_background'] . ';color: ' . $info_link['label_text'] . '"><span style="background: ' . $info_link['label_background'] . ';border-color: ' . $info_link['label_background'] . '"></span>' . $label_array[$lang_id] . '</span>'; }
								          	}
								          }
							          }
							     }
							}
							
							if(!isset($info_category['name'])) $info_category['name'] = 'Set name';
							
							$output .= '<li><a href="'.$link.'" onclick="window.location = \''.$link.'\';" class="' . $class_link . '">'.$info_category['name'].'</a>';
								if(isset($row['children'])) {
									if(!empty($row['children'])) {
									     if(!isset($info_category['category_id'])) $info_category['category_id'] = 0;
										$output .= $this->getCategoriesChildren($row['children'], $path.'_'.$info_category['category_id'], $columns, $type);
									}
								}
							$output .= '</li>';
						}
					}
				}
			$output .= '</ul>';
		}
		return $output;
	}
	
	public function getLink($id) {
		$sql = "SELECT * FROM " . DB_PREFIX . "mega_menu_links WHERE id = " . $id;
		$query = $this->db->query($sql);
	
		return $query->row;
	}
}
?>
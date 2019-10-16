<?php
class ModelBlogArticle extends Model {
    
	public function addArticle($data) {

		$this->db->query("INSERT INTO " . DB_PREFIX . "blog_article
                SET
                author_id = '" . (int)$data['author_id'] . "',
                article_list_gallery_display = '" . $data['article_list_gallery_display'] . "',
                sort_order = '" . (int)$data['sort_order'] . "',
                status = '" . (int)$data['status'] . "',
                status_comments = '" . (int)$data['status_comments'] . "',
                date_updated = '".$data['date_updated']."',
                date_published = '".$data['date_published']."',
                date_added = '".$data['date_added']."'");

		$article_id = $this->db->getLastId();

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "blog_article SET image = '" . $this->db->escape($data['image']) . "' WHERE article_id = '" . (int)$article_id . "'");
		}

		foreach ($data['article_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "blog_article_description
                    SET
                    article_id = '" . (int)$article_id . "',
                    language_id = '" . (int)$language_id . "',
                    title = '" . $this->db->escape($value['title']) . "',
                    description = '" . $this->db->escape($value['description']) . "',
                    content = '" . $this->db->escape($value['content']) . "',
                    tags = '" . $this->db->escape($value['tags']) . "',
                    meta_title = '" . $this->db->escape($value['meta_title']) . "',
                    meta_description = '" . $this->db->escape($value['meta_description']) . "',
                    meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "'");
		}
        

		if (isset($data['article_category'])) {
			foreach ($data['article_category'] as $category_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "blog_article_to_category SET article_id = '" . (int)$article_id . "', category_id = '" . (int)$category_id . "'");
			}
		}
        
        $sql = "SELECT DISTINCT *  FROM " . DB_PREFIX . "blog_settings";
    
		$settings = $this->db->query($sql)->row;
		if (isset($data['article_gallery'])) {
			foreach ($data['article_gallery'] as $article_gallery) {
                
                //prepare main image/video
                switch($article_gallery['type']){
                    case 'IMG':
                        if(!$article_gallery['width']){
                            $article_gallery['width'] = $settings['gallery_image_width'];
                        }
                        if(!$article_gallery['height']){
                            $article_gallery['height'] = $settings['gallery_image_height'];
                        }
                        $article_gallery['output'] = $this->prepareImage($article_gallery['path'], $article_gallery['width'], $article_gallery['height']);
                        break;
                    case 'YOUTUBE':
                        if(!$article_gallery['width']){
                            $article_gallery['width'] = $settings['gallery_youtube_width'];
                        }
                        if(!$article_gallery['height']){
                            $article_gallery['height'] = $settings['gallery_youtube_height'];
                        }
                        $article_gallery['output'] = $this->prepareYoutube($article_gallery['path'], $article_gallery['width'], $article_gallery['height']);
                        break;
                    case 'SOUNDCLOUD':
                        if(!$article_gallery['width']){
                            $article_gallery['width'] = $settings['gallery_soundcloud_width'];
                        }
                        if(!$article_gallery['height']){
                            $article_gallery['height'] = $settings['gallery_soundcloud_height'];
                        }
                        $article_gallery['output'] = $this->prepareSoundCloud($article_gallery['path'], $article_gallery['width'], $article_gallery['height']);
                        break;
                }
                
				$this->db->query("INSERT INTO " . DB_PREFIX . "blog_article_gallery
                         SET article_id = '" . (int)$article_id . "',
                         path = '" . $this->db->escape($article_gallery['path']) . "',
                         width = '" . $this->db->escape($article_gallery['width']) . "',
                         height = '" . $this->db->escape($article_gallery['height']) . "',
                         type = '" . $this->db->escape($article_gallery['type']) . "',
                         output = '" . $this->db->escape($article_gallery['output']) . "',
                         sort_order = '" . (int)$article_gallery['sort_order'] . "'");
			}
		}
        
        if (isset($data['product_related'])) {
			foreach ($data['product_related'] as $related_id) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "blog_product_related WHERE article_id = '" . (int)$article_id . "' AND related_id = '" . (int)$related_id . "'");
				$this->db->query("INSERT INTO " . DB_PREFIX . "blog_product_related SET article_id = '" . (int)$article_id . "', related_id = '" . (int)$related_id . "'");
			}
		}

        if (isset($data['article_related'])) {
			foreach ($data['article_related'] as $related_id) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "blog_article_related WHERE article_id = '" . (int)$article_id . "' AND related_id = '" . (int)$related_id . "'");
				$this->db->query("INSERT INTO " . DB_PREFIX . "blog_article_related SET article_id = '" . (int)$article_id . "', related_id = '" . (int)$related_id . "'");
			}
		}

		if (isset($data['article_store'])) {
			foreach ($data['article_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "blog_article_to_store SET article_id = '" . (int)$article_id . "', store_id = '" . (int)$store_id . "'");
			}
		}   
		
		// SEO URL
		if (isset($data['article_seo_url'])) {
			foreach ($data['article_seo_url'] as $store_id => $language) {
				foreach ($language as $language_id => $keyword) {
					if (!empty($keyword)) {
						$this->db->query("INSERT INTO " . DB_PREFIX . "seo_url SET store_id = '" . (int)$store_id . "', language_id = '" . (int)$language_id . "', query = 'article_id=" . (int)$product_id . "', keyword = '" . $this->db->escape($keyword) . "'");
					}
				}
			}
		}

		return $article_id;
	}

	public function editArticle($article_id, $data) {

        $this->db->query("UPDATE " . DB_PREFIX . "blog_article
               SET
                author_id = '" . (int)$data['author_id'] . "',
                article_list_gallery_display = '" . $data['article_list_gallery_display'] . "',
                sort_order = '" . (int)$data['sort_order'] . "',
                status = '" . (int)$data['status'] . "',
                status_comments = '" . (int)$data['status_comments'] . "',
                date_updated = '".$data['date_updated']."',
                date_published = '".$data['date_published']."',
                date_added = '".$data['date_added']."'
                WHERE article_id = '" . (int)$article_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "blog_article SET image = '" . $this->db->escape($data['image']) . "' WHERE article_id = '" . (int)$article_id . "'");
		}
        
		$this->db->query("DELETE FROM " . DB_PREFIX . "blog_article_description WHERE article_id = '" . (int)$article_id . "'");

		foreach ($data['article_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "blog_article_description
                    SET 
                    article_id = '" . (int)$article_id . "',
                    language_id = '" . (int)$language_id . "',
                    title = '" . $this->db->escape($value['title']) . "',
                    description = '" . $this->db->escape($value['description']) . "',
                    content = '" . $this->db->escape($value['content']) . "',
                    tags = '" . $this->db->escape($value['tags']) . "',
                    meta_title = '" . $this->db->escape($value['meta_title']) . "',
                    meta_description = '" . $this->db->escape($value['meta_description']) . "',
                    meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "'");
		}
        
        $this->db->query("DELETE FROM " . DB_PREFIX . "blog_article_to_category WHERE article_id = '" . (int)$article_id . "'");

		if (isset($data['article_category'])) {
			foreach ($data['article_category'] as $category_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "blog_article_to_category SET article_id = '" . (int)$article_id . "', category_id = '" . (int)$category_id . "'");
			}
		}
        
        $this->db->query("DELETE FROM " . DB_PREFIX . "blog_article_gallery WHERE article_id = '" . (int)$article_id . "'");
       
        $sql = "SELECT DISTINCT *  FROM " . DB_PREFIX . "blog_settings";
    
		$settings = $this->db->query($sql)->row;
		if (isset($data['article_gallery'])) {
			foreach ($data['article_gallery'] as $article_gallery) {
                
                //prepare main image/video
                switch($article_gallery['type']){
                    case 'IMG':
                        if(!$article_gallery['width']){
                            $article_gallery['width'] = $settings['gallery_image_width'];
                        }
                        if(!$article_gallery['height']){
                            $article_gallery['height'] = $settings['gallery_image_height'];
                        }
                        $article_gallery['output'] = $this->prepareImage($article_gallery['path'], $article_gallery['width'], $article_gallery['height']);
                        break;
                    case 'YOUTUBE':
                        if(!$article_gallery['width']){
                            $article_gallery['width'] = $settings['gallery_youtube_width'];
                        }
                        if(!$article_gallery['height']){
                            $article_gallery['height'] = $settings['gallery_youtube_height'];
                        }
                        $article_gallery['output'] = $this->prepareYoutube($article_gallery['path'], $article_gallery['width'], $article_gallery['height']);
                        break;
                    case 'SOUNDCLOUD':
                        if(!$article_gallery['width']){
                            $article_gallery['width'] = $settings['gallery_soundcloud_width'];
                        }
                        if(!$article_gallery['height']){
                            $article_gallery['height'] = $settings['gallery_soundcloud_height'];
                        }
                        $article_gallery['output'] = $this->prepareSoundCloud($article_gallery['path'], $article_gallery['width'], $article_gallery['height']);
                        break;
                }
                
				$this->db->query("INSERT INTO " . DB_PREFIX . "blog_article_gallery
                         SET article_id = '" . (int)$article_id . "',
                         path = '" . $this->db->escape($article_gallery['path']) . "',
                         width = '" . $this->db->escape($article_gallery['width']) . "',
                         height = '" . $this->db->escape($article_gallery['height']) . "',
                         type = '" . $this->db->escape($article_gallery['type']) . "',
                         output = '" . $this->db->escape($article_gallery['output']) . "',
                         sort_order = '" . (int)$article_gallery['sort_order'] . "'");
			}
		}

        
        $this->db->query("DELETE FROM " . DB_PREFIX . "blog_product_related WHERE article_id = '" . (int)$article_id . "'");

		if (isset($data['product_related'])) {
			foreach ($data['product_related'] as $related_id) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "blog_product_related WHERE article_id = '" . (int)$article_id . "' AND related_id = '" . (int)$related_id . "'");
				$this->db->query("INSERT INTO " . DB_PREFIX . "blog_product_related SET article_id = '" . (int)$article_id . "', related_id = '" . (int)$related_id . "'");
			}
		}
        
        $this->db->query("DELETE FROM " . DB_PREFIX . "blog_article_related WHERE article_id = '" . (int)$article_id . "'");

		if (isset($data['article_related'])) {
			foreach ($data['article_related'] as $related_id) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "blog_article_related WHERE article_id = '" . (int)$article_id . "' AND related_id = '" . (int)$related_id . "'");
				$this->db->query("INSERT INTO " . DB_PREFIX . "blog_article_related SET article_id = '" . (int)$article_id . "', related_id = '" . (int)$related_id . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "blog_article_to_store WHERE article_id = '" . (int)$article_id . "'");

		if (isset($data['article_store'])) {
			foreach ($data['article_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "blog_article_to_store SET article_id = '" . (int)$article_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
		        
        // SEO URL
        $this->db->query("DELETE FROM " . DB_PREFIX . "seo_url WHERE query = 'article_id=" . (int)$article_id . "'");
        
        if (isset($data['article_seo_url'])) {
        	foreach ($data['article_seo_url']as $store_id => $language) {
        		foreach ($language as $language_id => $keyword) {
        			if (!empty($keyword)) {
        				$this->db->query("INSERT INTO " . DB_PREFIX . "seo_url SET store_id = '" . (int)$store_id . "', language_id = '" . (int)$language_id . "', query = 'article_id=" . (int)$article_id . "', keyword = '" . $this->db->escape($keyword) . "'");
        			}
        		}
        	}
        }

	}

	public function deleteArticle($article_id) {
	        try{
	            $this->db->query('START TRANSACTION');
	            $this->db->query("DELETE FROM " . DB_PREFIX . "blog_article WHERE article_id = '" . (int)$article_id . "'");
	            $this->db->query("DELETE FROM " . DB_PREFIX . "blog_article_description WHERE article_id = '" . (int)$article_id . "'");
	            $this->db->query("DELETE FROM " . DB_PREFIX . "blog_article_to_category WHERE article = '" . (int)$article_id . "'");
	            $this->db->query("DELETE FROM " . DB_PREFIX . "blog_product_related WHERE article_id = '" . (int)$article_id . "'");
	            $this->db->query("DELETE FROM " . DB_PREFIX . "blog_product_related WHERE related_id = '" . (int)$article_id . "'");
	            $this->db->query("DELETE FROM " . DB_PREFIX . "blog_article_related WHERE article_id = '" . (int)$article_id . "'");
	            $this->db->query("DELETE FROM " . DB_PREFIX . "blog_article_related WHERE related_id = '" . (int)$article_id . "'");
	            $this->db->query("DELETE FROM " . DB_PREFIX . "blog_article_gallery WHERE article_id = '" . (int)$article_id . "'");
	            $this->db->query("DELETE FROM " . DB_PREFIX . "blog_comment WHERE article_id = '" . (int)$article_id . "'");
	            $this->db->query("DELETE FROM " . DB_PREFIX . "seo_url WHERE query = 'article_id=" . (int)$article_id . "'");
	            $this->db->query('COMMIT');
	        } catch (Exception $ex) {
	            $this->db->query('ROLLBACK');
	            return false;
	        }
	        
	        return true;
	}

	public function getArticle($article_id) {
		$query = $this->db->query("SELECT *
                FROM " . DB_PREFIX . "blog_article ba   
                LEFT JOIN " . DB_PREFIX . "blog_article_description bad ON (ba.article_id = bad.article_id)
                WHERE ba.article_id = '{$article_id}' AND bad.language_id = '" . (int)$this->config->get('config_language_id') . "' ");

        return $query->row;
	}
    
    
	public function getArticleCategories($article_id) {
		$article_category_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "blog_article_to_category WHERE article_id = '" . (int)$article_id . "'");

		foreach ($query->rows as $result) {
			$article_category_data[] = $result['category_id'];
		}

		return $article_category_data;
	}
    
    
    public function getProductRelated($article_id) {
		$product_related_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "blog_product_related WHERE article_id = '" . (int)$article_id . "'");

		foreach ($query->rows as $result) {
			$product_related_data[] = $result['related_id'];
		}

		return $product_related_data;
	}
    
    public function getArticleRelated($article_id) {
		$article_related_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "blog_article_related WHERE article_id = '" . (int)$article_id . "'");

		foreach ($query->rows as $result) {
			$article_related_data[] = $result['related_id'];
		}

		return $article_related_data;
	}

    
	public function getArticleGalleries($article_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "blog_article_gallery
                 WHERE article_id = '" . (int)$article_id . "' ORDER BY sort_order ASC");

		return $query->rows;
	}
    
	public function getArticles($data = array()) {
		$sql = "SELECT ba.*, bad.*, a.name as author FROM " . DB_PREFIX . "blog_article ba
                LEFT JOIN " . DB_PREFIX . "blog_article_description bad ON (ba.article_id = bad.article_id)
                LEFT JOIN " . DB_PREFIX . "blog_author a ON (ba.author_id = a.author_id)
                WHERE bad.language_id = '" . (int)$this->config->get('config_language_id') . "'";

		if (!empty($data['filter_title'])) {
			$sql .= " AND bad.title LIKE '%" . $this->db->escape($data['filter_title']) . "%'";
		}

		$sql .= " GROUP BY ba.article_id";

		$sort_data = array(
			'title',
			'date_published',
			'author'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            if($data['sort'] == 'author'){
                $data['sort'] = 'a.name';
            }
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY date_published";
		}

		if (isset($data['order']) && ($data['order'] == 'ASC')) {
			$sql .= " ASC";
		} else {
			$sql .= " DESC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function getArticleDescriptions($article_id) {
		$article_description_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "blog_article_description WHERE article_id = '" . (int)$article_id . "'");

		foreach ($query->rows as $result) {
			$article_description_data[$result['language_id']] = array(
				'title'            => $result['title'],
				'tags'             => $result['tags'],
				'meta_title'       => $result['meta_title'],
				'meta_description' => $result['meta_description'],
				'meta_keyword'     => $result['meta_keyword'],
				'description'      => $result['description'],
				'content'      => $result['content']
			);
		}

		return $article_description_data;
	}

    
	public function getArticleStores($article_id) {
		$article_store_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "blog_article_to_store WHERE article_id = '" . (int)$article_id . "'");

		foreach ($query->rows as $result) {
			$article_store_data[] = $result['store_id'];
		}

		return $article_store_data;
	}

	public function getTotalArticles($data) {
		$sql = "SELECT COUNT(DISTINCT ba.article_id) AS total FROM " . DB_PREFIX . "blog_article ba
                LEFT JOIN " . DB_PREFIX . "blog_article_description bad ON (ba.article_id = bad.article_id)
                WHERE bad.language_id = '" . (int)$this->config->get('config_language_id') . "'";

		if (!empty($data['filter_title'])) {
			$sql .= " AND bad.title LIKE '%" . $this->db->escape($data['filter_title']) . "%'";
		}

        $query = $this->db->query($sql);
        
		return $query->row['total'];
	}
	
	public function getArticleSeoUrls($article_id) {
		$article_seo_url_data = array();
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_url WHERE query = 'article_id=" . (int)$article_id . "'");

		foreach ($query->rows as $result) {
			$article_seo_url_data[$result['store_id']][$result['language_id']] = $result['keyword'];
		}

		return $article_seo_url_data;
	}
 
        
    private function prepareImage($path, $width, $height)
    {
        if(!$width) $width = 1000;
        if(!$height) $height = 400;
        $path = $this->model_tool_image->resize($path, $width, $height);
        return  '<img src="'. $path . '" alt="media" />';

    }
    
    private function prepareYoutube($path, $width, $height)
    {
        if(!$width) $width = '100%';
        if(!$height) $height = 400;
        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $path, $matches);
        $id = isset($matches[1]) ? $matches[1] : 0;
        $path = "https://www.youtube.com/embed/". $id ."?rel=0&showinfo=0&color=white&iv_load_policy=3";
    
        return '<iframe id="ytplayer" type="text/html" width="'.$width.'" height="'.$height.'"
                                src="'. $path.'"
                                frameborder="0" allowfullscreen></iframe> ';
    }
    
    private function prepareSoundCloud($path, $width, $height)
    {
        if(!$width) $width = '100%';
        if(!$height) $height = 170;
        
        if(!@file_get_contents('http://soundcloud.com/oembed?format=js&url='.$path.'&iframe=true')) return false;
        $getValues=file_get_contents('http://soundcloud.com/oembed?format=js&url='.$path.'&iframe=true');
        $decodeiFrame=substr($getValues, 1, -2);
        $jsonObj = json_decode($decodeiFrame);
        return str_replace(array( 'height="400"', 'width="100%"'),array('height="'.$height.'"', 'width="'.$width.'"'), $jsonObj->html);
        
    }
	
}

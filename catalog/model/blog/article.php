<?php
class ModelBlogArticle extends Model {
    
	

	public function getArticle($article_id) {
		$query = $this->db->query("SELECT *
                FROM " . DB_PREFIX . "blog_article ba   
                LEFT JOIN " . DB_PREFIX . "blog_article_description bad ON (ba.article_id = bad.article_id)
                LEFT JOIN " . DB_PREFIX . "blog_article_to_store ba2s ON (ba.article_id = ba2s.article_id)
                WHERE ba.article_id = '" . (int)$article_id . "' AND bad.language_id = '" . (int)$this->config->get('config_language_id') . "'
                      AND ba2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND ba.date_published < NOW()");

        return $query->row;
	}
    
    
	public function getArticleCategories($article_id) {
		$article_category_data = array();

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "blog_article_to_category batc
                LEFT JOIN " . DB_PREFIX . "blog_category bc ON bc.category_id = batc.category_id
                LEFT JOIN " . DB_PREFIX . "blog_category_description bcd ON bcd.category_id = bc.category_id
                LEFT JOIN " . DB_PREFIX . "blog_category_to_store bc2s ON (bc.category_id = bc2s.category_id)
                WHERE batc.article_id = '" . (int)$article_id . "' AND bcd.language_id = '" . (int)$this->config->get('config_language_id') . "'
                    AND bc2s.store_id = '" . (int)$this->config->get('config_store_id') . "'") or die(mysql_error());

		foreach ($query->rows as $result) {
			$article_category_data[$result['category_id']]['category_id'] = $result['category_id'];
			$article_category_data[$result['category_id']]['name'] = $result['name'];
		}

		return $article_category_data;
	}
    
    
    public function getProductRelated($article_id, $limit = null) {
		$product_related_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "blog_product_related WHERE article_id = '" . (int)$article_id . "'" . ($limit ? " LIMIT " . (int)$limit : ''));

		foreach ($query->rows as $result) {
			$product_related_data[] = $result['related_id'];
		}

		return $product_related_data;
	}
    
    public function getArticleRelated($article_id, $limit = null) {
		$article_related_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "blog_article_related WHERE article_id = '" . (int)$article_id . "'" . ($limit ? " LIMIT " . (int)$limit : ''));

		foreach ($query->rows as $result) {
			$article_related_data[] = $result['related_id'];
		}

		return $article_related_data;
	}
    public function getArticleToProductRelated($product_id, $limit = null) {
		$article_related_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "blog_product_related WHERE related_id = '" . (int)$product_id . "'" . ($limit ? " LIMIT " . (int)$limit : ''));

		foreach ($query->rows as $result) {
			$article_related_data[] = $result['article_id'];
		}

		return $article_related_data;
	}

    
    public function getArticleGalleries($article_id) {
        $galleries = array();
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "blog_article_gallery
                 WHERE article_id = '" . (int)$article_id . "' ORDER BY sort_order ASC");

        if(!empty($query->rows)){
            foreach($query->rows as $row){
                if($row['type'] == 'IMG'){
                    $row['output'] = $this->prepareImage($row['path'], $row['width'], $row['height']);
                    $galleries[] = $row;
                }
                
                if($row['type'] == 'YOUTUBE'){
                    $row['output'] = $this->prepareYoutube($row['path'], $row['width'], $row['height']);
                    $galleries[] = $row;
                }
                
                if($row['type'] == 'SOUNDCLOUD'){
                    $row['output'] = $this->prepareSoundCloud($row['path'], $row['width'], $row['height']);
                    $galleries[] = $row;
                }
            }
        }
		return $galleries;
	}
    
    public function getArticleAuthor($article_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "blog_article_author
                 WHERE article_id = '" . (int)$article_id . "' ORDER BY sort_order ASC");

		return $query->rows;
	}
    
    
	public function getArticles($data = array()) {
		$sql = "SELECT *, ba.article_id FROM " . DB_PREFIX . "blog_article ba
                LEFT JOIN " . DB_PREFIX . "blog_article_description bad ON (ba.article_id = bad.article_id)
                LEFT JOIN " . DB_PREFIX . "blog_article_to_category bctc ON bctc.article_id = ba.article_id
                LEFT JOIN " . DB_PREFIX . "blog_article_to_store ba2s ON (ba.article_id = ba2s.article_id)
                WHERE bad.language_id = '" . (int)$this->config->get('config_language_id') . "' 
                AND ba.status = 1 AND ba2s.store_id = '" . (int)$this->config->get('config_store_id') . "'  AND ba.date_published < NOW()";

        if (!empty($data['filter_category_id']) && $data['filter_category_id'] != 0) {
			$sql .= " AND bctc.category_id = " . $this->db->escape($data['filter_category_id']) . "";
		}
        
        if (!empty($data['filter_author']) && $data['filter_author'] != 0) {
			$sql .= " AND ba.author_id = " . $this->db->escape($data['filter_author']) . "";
		}
        

		if (!empty($data['filter_title']) || !empty($data['filter_tag'])) {
			$sql .= " AND (";

			if (!empty($data['filter_title'])) {
				$implode = array();

				$words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_title'])));

				foreach ($words as $word) {
					$implode[] = "bad.title LIKE '%" . $this->db->escape($word) . "%'";
				}

				if ($implode) {
					$sql .= " " . implode(" AND ", $implode) . "";
				}

			}

			if (!empty($data['filter_title']) && !empty($data['filter_tag'])) {
				$sql .= " OR ";
			}

			if (!empty($data['filter_tag'])) {
				$sql .= "bad.tags LIKE '%" . $this->db->escape($data['filter_tag']) . "%'";
			}

			$sql .= ")";
		}
        
        
		$sql .= " GROUP BY ba.article_id";

		$sort_data = array(
			'title',
			'sort_order',
			'date_published'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
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
    
	public function getPopularArticles($limit) {
		$sql = "SELECT *, ba.article_id FROM " . DB_PREFIX . "blog_article ba
                LEFT JOIN " . DB_PREFIX . "blog_article_description bad ON (ba.article_id = bad.article_id)
                LEFT JOIN " . DB_PREFIX . "blog_article_to_category bctc ON bctc.article_id = ba.article_id
                LEFT JOIN " . DB_PREFIX . "blog_article_to_store ba2s ON (ba.article_id = ba2s.article_id)
                WHERE bad.language_id = '" . (int)$this->config->get('config_language_id') . "'
                    AND ba.status = 1 AND ba2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND ba.date_published < NOW()
                GROUP BY ba.article_id
                ORDER BY (SELECT count(*) FROM " . DB_PREFIX . "blog_comment bc WHERE bc.article_id = ba.article_id) DESC, ba.date_published  DESC
                LIMIT " . (int)$limit . "
                ";

		$query = $this->db->query($sql);

		return $query->rows;
	}
    
	public function getLatestArticles($limit) {
		$sql = "SELECT *, ba.article_id FROM " . DB_PREFIX . "blog_article ba
                LEFT JOIN " . DB_PREFIX . "blog_article_description bad ON (ba.article_id = bad.article_id)
                LEFT JOIN " . DB_PREFIX . "blog_article_to_category bctc ON bctc.article_id = ba.article_id
                LEFT JOIN " . DB_PREFIX . "blog_article_to_store ba2s ON (ba.article_id = ba2s.article_id)
                WHERE bad.language_id = '" . (int)$this->config->get('config_language_id') . "' 
                    AND ba.status = 1 AND ba2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND ba.date_published < NOW() 
                GROUP BY ba.article_id
                ORDER BY ba.date_published DESC
                LIMIT " . (int)$limit . "
                ";

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

	public function getPopularTags() {
		$tags_data = array();

		$query = $this->db->query("SELECT tags FROM " . DB_PREFIX . "blog_article_description WHERE language_id = '" . (int)$this->config->get('config_language_id') . "'");

		foreach ($query->rows as $result) {
            $tags = array_filter(array_map('trim', explode(',', $result['tags'])));
			if(!empty($tags)){
                foreach($tags as $tag){
                    if(!isset($tags_data[$tag])){
                        $tags_data[$tag] = 1;
                    }else{
                        $tags_data[$tag]++;
                    }
                }
            }
		}

		return $tags_data;
	}



	public function getTotalArticles($data) {
        $sql = "SELECT COUNT(DISTINCT ba.article_id) AS total FROM " . DB_PREFIX . "blog_article ba
                LEFT JOIN " . DB_PREFIX . "blog_article_description bad ON (ba.article_id = bad.article_id)
                LEFT JOIN " . DB_PREFIX . "blog_article_to_category bctc ON bctc.article_id = ba.article_id
                LEFT JOIN " . DB_PREFIX . "blog_article_to_store ba2s ON (ba.article_id = ba2s.article_id)
                WHERE bad.language_id = '" . (int)$this->config->get('config_language_id') . "'
                    AND ba.status = 1 AND ba2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND ba.date_published < NOW() ";

        if (!empty($data['filter_category_id']) && $data['filter_category_id'] != 0) {
			$sql .= " AND bctc.category_id = " . $this->db->escape($data['filter_category_id']) . "";
		}

        if (!empty($data['filter_author']) && $data['filter_author'] != 0) {
			$sql .= " AND ba.author_id = " . $this->db->escape($data['filter_author']) . "";
		}
        
		$sort_data = array(
			'title',
			'sort_order',
			'date_added'
		);


		if (!empty($data['filter_title']) || !empty($data['filter_tag'])) {
			$sql .= " AND (";

			if (!empty($data['filter_title'])) {
				$implode = array();

				$words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_title'])));

				foreach ($words as $word) {
					$implode[] = "bad.title LIKE '%" . $this->db->escape($word) . "%'";
				}

				if ($implode) {
					$sql .= " " . implode(" AND ", $implode) . "";
				}

			}

			if (!empty($data['filter_title']) && !empty($data['filter_tag'])) {
				$sql .= " OR ";
			}

			if (!empty($data['filter_tag'])) {
				$sql .= "bad.tags LIKE '%" . $this->db->escape($data['filter_tag']) . "%'";
			}

			$sql .= ")";
		}     
        
        
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY sort_order";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

        $query = $this->db->query($sql);

        return isset($query->row['total']) ? $query->row['total'] : 0;
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

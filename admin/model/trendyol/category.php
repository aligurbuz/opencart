<?php
class ModelTrendyolCategory extends Model {
	public function getTrendCat($op_category){
		$sql = "SELECT * FROM ".DB_PREFIX."trendyol_toopcat e INNER JOIN ".DB_PREFIX."trendyol_categories c ON e.trendcat = c.cid WHERE e.opcat = '".$op_category."'";
		$trend = $this->db->query($sql);
		if($trend->num_rows > 0){
			return array(
				'id' => $trend->row['trendcat'],
				'name' => $trend->row['name'],
				'komisyon' => $trend->row['komisyon']
			);
		} else {
			return array(
				'id' => false,
				'name' => false,
				'komisyon' => false
			);
		}
	}

	public function getCategoryAttr($categoryid){
        $attr = new stdClass();
		set_time_limit(0);
		ini_set("memory_limit", '-1');
		ini_set('max_execution_time', 118000);
		$attr = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_categoryattr WHERE cid = '".$categoryid."'");
		$ttr = array();
		if($mode == 'test'){
			$surl = 'https://api.trendyol.com/sapigw/product-categories/'.$categoryid.'/attributes';
		} else {
			$surl = 'https://api.trendyol.com/sapigw/product-categories/'.$categoryid.'/attributes';
		}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$surl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		$attributes = json_decode(curl_exec($ch), true);
		curl_close($ch);  
		$ix = 0;
		foreach ($attributes['categoryAttributes'] as $attr) {
			$attrs = array();
			if($attr['attributeValues']){
				foreach ($attr['attributeValues'] as $attrval) {
					$attrs[] = array(
						'attr_id' => $attr['attribute']['id'],
						'value_id' => $attrval['id'],
						'value_name' => $attrval['name']
					);
				}
			}
			$ttr[] = array('cid' => $categoryid, 'name' => $attr['attribute']['name'], 'required' => $attr['required'], 'attribute_id' => $attr['attribute']['id'], 'allowCustom' => $attr['allowCustom'], 'varianter' => $attr['varianter'], 'val_list' => $attrs);
		}		
		return $ttr;
	}


	public function trendcheck($cid){
		$check = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_categories WHERE cid = '".$cid."'");
		return $check->num_rows;
	}



	public function downloadcatAttr($mode, $page){
		

		$categories = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_categories ORDER BY id DESC LIMIT ".$page.", 1");
		if($categories->num_rows > 0){
			foreach ($categories->rows as $category) {
				if($mode == 'test'){
					$surl = 'https://api.trendyol.com/sapigw/product-categories/'.$category['cid'].'/attributes';
				} else {
					$surl = 'https://api.trendyol.com/sapigw/product-categories/'.$category['cid'].'/attributes';
				}

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$surl);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
				$attributes = json_decode(curl_exec($ch), true);
				curl_close($ch);  
				if(isset($attributes['categoryAttributes'])){
					$ix = 0;
					foreach ($attributes['categoryAttributes'] as $attr) {
						$check = $this->db->query("SELECT id FROM ".DB_PREFIX."trendyol_categoryattr WHERE cid = '".$attr['categoryId']."' AND attribute_id = '".$attr['attribute']['id']."'");
						$attr_id = $attr['attribute']['id'];
						if($check->num_rows < 1){
							$this->db->query("INSERT INTO ".DB_PREFIX."trendyol_categoryattr SET cid = '".$attr['categoryId']."', attribute_id = '".$attr['attribute']['id']."', attribute_name = '".$this->db->escape($attr['attribute']['name'])."', required = '".$attr['required']."', allowCustom = '".$attr['allowCustom']."', varianter = '".$attr['varianter']."'");
							if($attr['attributeValues']){
								foreach ($attr['attributeValues'] as $atr_val) {
									$checkval = $this->db->query("SELECT id FROM ".DB_PREFIX."trendyol_categoryattr_value WHERE attr_id = '".$attr_id."' AND value_id = '".$atr_val['id']."'");
									if($checkval->num_rows < 1){
										$this->db->query("INSERT INTO ".DB_PREFIX."trendyol_categoryattr_value SET attr_id = '".$attr_id."', value_id = '".$atr_val['id']."', value_name = '".$this->db->escape($atr_val['name'])."'");
									}
								}
							}
							$ix++;
						}
					}
					return array('status' => 1, 'msg' => $category['name']. ' Kategorisine Ait '.$ix.' Adet Özellik İndirildi', 'next' => 'index.php?route=trendyol/category/downloadcatAttr&user_token='.$this->session->data['user_token'].'&page='.($page+1));
				} else {
					return array('status' => 1, 'msg' => $category['name'].' Kategorisine Ait Bir Özellik Bulunamadı', 'next' => 'index.php?route=trendyol/category/downloadcatAttr&user_token='.$this->session->data['user_token'].'&page='.($page+1));
				}
			}
		} else {
			return array('status' => 0, 'msg' => 'Tüm Kategori Özelliklerini İndirdin');
		}
		
	}

	public function downloadCategory($mode){
		if($mode == 'test'){
			$surl = 'https://api.trendyol.com/sapigw/product-categories';
		} else {
			$surl = 'https://api.trendyol.com/sapigw/product-categories';
		}

		$categories = json_decode(file_get_contents($surl), true);
		$ix = 0;
		foreach ($categories['categories'] as $trendcat){
			$name = $trendcat['name'];
			if($trendcat['subCategories']){
				foreach ($trendcat['subCategories'] as $trend_1) {
					$name = $name.' > '.$trend_1['name'];
					if($trend_1['subCategories']){
						foreach ($trend_1['subCategories'] as $trend_2) {
							$name = $name.' > '.$trend_2['name'];
							if($trend_2['subCategories']){
								foreach ($trend_2['subCategories'] as $trend_3) {
									$name = $name.' > '.$trend_3['name'];
									if($trend_3['subCategories']){
										foreach ($trend_3['subCategories'] as $trend_4) {
											$name = $name.' > '.$trend_4['name'];
											if($trend_4['subCategories']){
												foreach ($trend_4['subCategories'] as $trend_5) {
													if($trend_5['subCategories']){
														foreach ($trend_5['subCategories'] as $trend_6) {
															if($this->trendcheck($trend_6['id']) < 1){
																$ix++;
																$name = $trendcat['name'].' > '.$trend_1['name'].' > '.$trend_2['name'].' > '.$trend_3['name'].' > '.$trend_4['name'].' > '.$trend_5['name'].' > '.$trend_6['name'];
																if(isset($trend_6['parentId'])){ $parentid = $trend_6['parentId']; } else { $parentid = 0;}
																$this->db->query("INSERT INTO ".DB_PREFIX."trendyol_categories SET cid = '".$trend_6['id']."', parent_id = '".$parentid."', name = '".$name."'");
															}
														}
													} else {
														if($this->trendcheck($trend_5['id']) < 1){
															$ix++;
															$name = $trendcat['name'].' > '.$trend_1['name'].' > '.$trend_2['name'].' > '.$trend_3['name'].' > '.$trend_4['name'].' > '.$trend_5['name'];
															if(isset($trend_5['parentId'])){ $parentid = $trend_5['parentId']; } else { $parentid = 0;}
															$this->db->query("INSERT INTO ".DB_PREFIX."trendyol_categories SET cid = '".$trend_5['id']."', parent_id = '".$parentid."', name = '".$name."'");
														}
													}
												}
											} else {
												if($this->trendcheck($trend_4['id']) < 1){
													$ix++;
													$name = $trendcat['name'].' > '.$trend_1['name'].' > '.$trend_2['name'].' > '.$trend_3['name'].' > '.$trend_4['name'];
													if(isset($trend_4['parentId'])){ $parentid = $trend_4['parentId']; } else { $parentid = 0;}
													$this->db->query("INSERT INTO ".DB_PREFIX."trendyol_categories SET cid = '".$trend_4['id']."', parent_id = '".$parentid."', name = '".$name."'");
												}
											}
										}
									} else {
										if($this->trendcheck($trend_3['id']) < 1){
											$ix++;
											$name = $trendcat['name'].' > '.$trend_1['name'].' > '.$trend_2['name'].' > '.$trend_3['name'];
											if(isset($trend_3['parentId'])){ $parentid = $trend_3['parentId']; } else { $parentid = 0;}
											$this->db->query("INSERT INTO ".DB_PREFIX."trendyol_categories SET cid = '".$trend_3['id']."', parent_id = '".$parentid."', name = '".$name."'");
										}
									}
								}
							} else {
								if($this->trendcheck($trend_2['id']) < 1){
									$ix++;
									$name = $trendcat['name'].' > '.$trend_1['name'].' > '.$trend_2['name'];
									if(isset($trend_2['parentId'])){ $parentid = $trend_2['parentId']; } else { $parentid = 0;}
									$this->db->query("INSERT INTO ".DB_PREFIX."trendyol_categories SET cid = '".$trend_2['id']."', parent_id = '".$parentid."', name = '".$name."'");
								}
							}
						}
					} else {
						if($this->trendcheck($trend_1['id']) < 1){
							$ix++;
							$name = $trendcat['name'].' > '.$trend_1['name'];
							if(isset($trend_1['parentId'])){ $parentid = $trend_1['parentId']; } else { $parentid = 0;}
							$this->db->query("INSERT INTO ".DB_PREFIX."trendyol_categories SET cid = '".$trend_1['id']."', parent_id = '".$parentid."', name = '".$name."'");
						}
					}
				}
			} else {
				if($this->trendcheck($trendcat['id']) < 1){
					$ix++;
					$name = $trendcat['name'];
					if(isset($trendcat['parentId'])){ $parentid = $trendcat['parentId']; } else { $parentid = 0;}
					$this->db->query("INSERT INTO ".DB_PREFIX."trendyol_categories SET cid = '".$trendcat['id']."', parent_id = '".$parentid."', name = '".$name."'");
				}
			}
		}
		return array('status' => 1, 'msg' => $ix.' Adet Kategori Başarıyla İndirildi');
	}

	public function getTrendyolcategories($data){
		$sql = "SELECT *  FROM " . DB_PREFIX . "trendyol_categories";

		$sort_data = array(
			'name',
			'category_id'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY name";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

		$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		$query = $this->db->query($sql);
		return $query->rows;
	}

	// total kategorimiz
	public function getTotalTrendyolcategories(){
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "trendyol_categories");
		return $query->row['total'];
	}

	// total kategorimiz
	public function getTotalopcategories($data){
		$sql = "SELECT cp.category_id AS category_id, GROUP_CONCAT(cd1.name ORDER BY cp.level SEPARATOR '&nbsp;&nbsp;&gt;&nbsp;&nbsp;') AS name, c1.parent_id, c1.sort_order FROM " . DB_PREFIX . "category_path cp LEFT JOIN " . DB_PREFIX . "category c1 ON (cp.category_id = c1.category_id) LEFT JOIN " . DB_PREFIX . "category c2 ON (cp.path_id = c2.category_id) LEFT JOIN " . DB_PREFIX . "category_description cd1 ON (cp.path_id = cd1.category_id) LEFT JOIN " . DB_PREFIX . "category_description cd2 ON (cp.category_id = cd2.category_id) WHERE cd1.language_id = '" . (int)$this->config->get('config_language_id') . "' AND cd2.language_id = '" . (int)$this->config->get('config_language_id') . "'";

		if (!empty($data['filter_name'])) {
			$sql .= " AND cd2.name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

		if (isset($data['filter_status'])) {
			$sql .= " AND c2.ncatstatus = '" . $data['filter_status'] . "'";
		}

		if (isset($data['filter_eslesme'])) {
			if($data['filter_eslesme'] == 1){
				$sql .= " AND c1.n11_id != 0";
			} else {
				$sql .= " AND c1.n11_id = 0";
			}
		}

		if (isset($data['filter_komisyon'])) {
			if($data['filter_komisyon'] == 1){
				$sql .= " AND c1.n11comission != 0";
			} else {
				$sql .= " AND c1.n11comission = 0";
			}
		}

		if (!empty($data['filter_category_id'])) {
			$sql .= " AND cp.category_id LIKE '" . $this->db->escape($data['filter_category_id']) . "%'";
		}

		$sql .= " GROUP BY cp.category_id";

		$sort_data = array(
			'name',
			'sort_order'
		);

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

		return $query->num_rows;
	}

	/* n11 kategori adını getir */
	public function getn11namebyid($id){
		if($id == 0){
			return false;
		} else {
			$c_query = $this->db->query("SELECT name FROM ".DB_PREFIX."n11categories WHERE category_id = '".$id."'");
			return $c_query->row['name'];
		}
	}

	/*	
		opencart kategorileri çekiyoruz
	*/

	public function getOpcategories($data = array()){
		$sql = "SELECT cp.category_id AS category_id, GROUP_CONCAT(cd1.name ORDER BY cp.level SEPARATOR '&nbsp;&nbsp;&gt;&nbsp;&nbsp;') AS name, c1.parent_id, c1.sort_order FROM " . DB_PREFIX . "category_path cp LEFT JOIN " . DB_PREFIX . "category c1 ON (cp.category_id = c1.category_id) LEFT JOIN " . DB_PREFIX . "category c2 ON (cp.path_id = c2.category_id) LEFT JOIN " . DB_PREFIX . "category_description cd1 ON (cp.path_id = cd1.category_id) LEFT JOIN " . DB_PREFIX . "category_description cd2 ON (cp.category_id = cd2.category_id) WHERE cd1.language_id = '" . (int)$this->config->get('config_language_id') . "' AND cd2.language_id = '" . (int)$this->config->get('config_language_id') . "'";

		if (!empty($data['filter_name'])) {
			$sql .= " AND cd2.name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

		if (isset($data['filter_status'])) {
			$sql .= " AND c2.ncatstatus = '" . $data['filter_status'] . "'";
		}

		if (isset($data['filter_eslesme'])) {
			if($data['filter_eslesme'] == 1){
				$sql .= " AND c1.n11_id != 0";
			} else {
				$sql .= " AND c1.n11_id = 0";
			}
		}

		if (isset($data['filter_komisyon'])) {
			if($data['filter_komisyon'] == 1){
				$sql .= " AND c1.n11comission != 0";
			} else {
				$sql .= " AND c1.n11comission = 0";
			}
		}

		if (!empty($data['filter_category_id'])) {
			$sql .= " AND cp.category_id LIKE '" . $this->db->escape($data['filter_category_id']) . "%'";
		}

		$sql .= " GROUP BY cp.category_id";

		$sort_data = array(
			'name',
			'sort_order'
		);

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
}
?>
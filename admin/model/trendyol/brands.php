<?php
class ModelTrendyolBrands extends Model {
	public function getTrendBrand($op_brands){
		$sql = "SELECT * FROM ".DB_PREFIX."trendyol_toopbrand e INNER JOIN ".DB_PREFIX."trendyol_brands c ON e.trendbrand = c.mid WHERE e.ocbrand = '".$op_brands."'";
		$trend = $this->db->query($sql);
		if($trend->num_rows > 0){
			return array(
				'id' => $trend->row['trendbrand'],
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

	public function downloadbrands($mode, $page){
		if($mode == 'test'){
			$surl = 'https://api.trendyol.com/sapigw/brands?size=500';
		} else {
			$surl = 'https://api.trendyol.com/sapigw/brands?size=500';
		}
		
		$brands = json_decode(file_get_contents($surl.'&page='.$page), true);
		if($brands['brands']){
			$ix = 0;
			foreach ($brands['brands'] as $brand){
				$check = $this->db->query("SELECT * FROM ".DB_PREFIX."trendyol_brands WHERE mid = '".(int)$brand['id']."'");
				if($check->num_rows < 1){
					$ix++;
					$this->db->query("INSERT INTO ".DB_PREFIX."trendyol_brands SET mid = '".(int)$brand['id']."', name = '".$this->db->escape($brand['name'])."'");
				}
			}
			return array('status' => 1, 'msg' => ($page+1).' Sayfada '.$ix.' Adet Trendyol Markası İndirildi', 'next' => 'index.php?route=trendyol/brands/downloadbrands&user_token='.$this->session->data['user_token'].'&page='.($page+1));
		} else {
			return array('status' => 0, 'msg' => 'Tüm markalar indirildi');
		}
	}

	public function getTrendyolbrands($data){
		$sql = "SELECT *  FROM " . DB_PREFIX . "trendyol_brands";

		$sort_data = array(
			'name',
			'mid'
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
	public function getTotalTrendyolbrands(){
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "trendyol_brands");
		return $query->row['total'];
	}

	// total opencart markaları
	public function getTotalopBrands($data){
		$sql = "SELECT COUNT(*) AS total FROM " . DB_PREFIX . "manufacturer WHERE manufacturer_id != ''";
		

		if (!empty($data['filter_name'])) {
			$sql .= " AND name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

		if (!empty($data['filter_manufacturer_id'])) {
			$sql .= " AND manufacturer_id = '" . $this->db->escape($data['filter_manufacturer_id']) . "'";
		}

		 if(isset($data['filter_eslesme'])){
            if($data['filter_eslesme'] == '1'){
                // birebir eşleştirilenler
                $sql .= " AND manufacturer_id IN (SELECT ocbrand FROM " . DB_PREFIX . "trendyol_toopbrand WHERE trendbrand != '' OR trendbrand != '0')";
            } else if($data['filter_eslesme'] == '0'){
                // Birebir eşleştirilmemişler
                $sql .= " AND manufacturer_id NOT IN (SELECT ocbrand FROM " . DB_PREFIX . "trendyol_toopbrand WHERE trendbrand != '' OR trendbrand != '0')";
            }
        }

        if (isset($data['filter_komisyon'])) {
			 if($data['filter_komisyon'] == '1'){
                // birebir eşleştirilenler
                $sql .= " AND manufacturer_id IN (SELECT ocbrand FROM " . DB_PREFIX . "trendyol_toopbrand WHERE komisyon != '' OR komisyon != '0')";
            } else {
                // Birebir eşleştirilmemişler
                $sql .= " AND manufacturer_id NOT IN (SELECT ocbrand FROM " . DB_PREFIX . "trendyol_toopbrand WHERE komisyon != '' OR komisyon != '0')";
            }
		}

		$query = $this->db->query($sql);
		return $query->row['total'];
	}

	// markalar
	public function getOpBrands($data){
		$sql = "SELECT * FROM ".DB_PREFIX."manufacturer WHERE manufacturer_id != ''";
		if (!empty($data['filter_name'])) {
			$sql .= " AND name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

		if (!empty($data['filter_manufacturer_id'])) {
			$sql .= " AND manufacturer_id = '" . $this->db->escape($data['filter_manufacturer_id']) . "'";
		}

		 if(isset($data['filter_eslesme'])){
            if($data['filter_eslesme'] == '1'){
                // birebir eşleştirilenler
                $sql .= " AND manufacturer_id IN (SELECT ocbrand FROM " . DB_PREFIX . "trendyol_toopbrand WHERE trendbrand != '' OR trendbrand != '0')";
            } else if($data['filter_eslesme'] == '0'){
                // Birebir eşleştirilmemişler
                $sql .= " AND manufacturer_id NOT IN (SELECT ocbrand FROM " . DB_PREFIX . "trendyol_toopbrand WHERE trendbrand != '' OR trendbrand != '0')";
            }
        }

        if (isset($data['filter_komisyon'])) {
			 if($data['filter_komisyon'] == '1'){
                // birebir eşleştirilenler
                $sql .= " AND manufacturer_id IN (SELECT ocbrand FROM " . DB_PREFIX . "trendyol_toopbrand WHERE komisyon != '' OR komisyon != '0')";
            } else {
                // Birebir eşleştirilmemişler
                $sql .= " AND manufacturer_id NOT IN (SELECT ocbrand FROM " . DB_PREFIX . "trendyol_toopbrand WHERE komisyon != '' OR komisyon != '0')";
            }
		}

		$sort_data = array(
			'name',
			'manufacturer_id'
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
}
?>
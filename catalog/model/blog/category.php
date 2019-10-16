<?php
class ModelBlogCategory extends Model {
    
    
    public function getCategory($blog_category_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "blog_category bc
                LEFT JOIN " . DB_PREFIX . "blog_category_description bcd ON (bc.category_id = bcd.category_id)
                LEFT JOIN " . DB_PREFIX . "blog_category_to_store bc2s ON (bc.category_id = bc2s.category_id)
                WHERE bc.category_id = '" . (int)$blog_category_id . "' AND bcd.language_id = '" . (int)$this->config->get('config_language_id') . "'"
                . " AND bc.status = '1' AND bc2s.store_id = '" . (int)$this->config->get('config_store_id') . "' ");

		return $query->row;
	}

	public function getCategories($parent_id = 0) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "blog_category bc
                LEFT JOIN " . DB_PREFIX . "blog_category_description bcd ON (bc.category_id = bcd.category_id)
                LEFT JOIN " . DB_PREFIX . "blog_category_to_store bc2s ON (bc.category_id = bc2s.category_id)
                WHERE bc.parent_id = '" . (int)$parent_id . "' AND bcd.language_id = '" . (int)$this->config->get('config_language_id') . "'
                    AND bc.status = '1' AND bc2s.store_id = '" . (int)$this->config->get('config_store_id') . "' 
                ORDER BY bc.sort_order, LCASE(bcd.name)");

		return $query->rows;
	}



	public function getTotalCategoriesByCategoryId($parent_id = 0) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "blog_category bc
                LEFT JOIN " . DB_PREFIX . "blog_category_to_store bc2s ON (bc.category_id = bc2s.category_id)
                WHERE bc.parent_id = '" . (int)$parent_id . "' AND bc.status = '1' AND bc2s.store_id = '" . (int)$this->config->get('config_store_id') . "'");

		return $query->row['total'];
	}
    
    public function getCategoryPath($category_id){
        
        $category = $this->db->query("SELECT * FROM " . DB_PREFIX . "blog_category bc WHERE bc.category_id = " .(int)($category_id));
        if($category->row['parent_id'] != 0){
               return $this->getCategoryPath($category->row['parent_id']) . '_' . $category_id;
        }
        return $category_id;
   }
    
	
}

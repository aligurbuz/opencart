<?php
class ModelBlogSettings extends Model {
    

	public function getSetting($property) {
		$settings = $this->getSettings();

        return isset($settings[$property]) ? $settings[$property] : null;
	}

	public function getSettings() {
		$sql = "SELECT DISTINCT *  FROM " . DB_PREFIX . "blog_settings";
        
		$query = $this->db->query($sql);

		return $query->row;
	}



}

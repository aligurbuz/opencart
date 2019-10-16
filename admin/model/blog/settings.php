<?php
class ModelBlogSettings extends Model {
    

	public function editSettings($data) {

        $this->db->query("UPDATE " . DB_PREFIX . "blog_settings
                SET
                gallery_image_width = '".$data['gallery_image_width']."',
                gallery_image_height = '".$data['gallery_image_height']."',
                gallery_youtube_width = '".$data['gallery_youtube_width']."',
                gallery_youtube_height = '".$data['gallery_youtube_height']."',
                gallery_soundcloud_width = '".$data['gallery_soundcloud_width']."',
                gallery_soundcloud_height = '".$data['gallery_soundcloud_height']."',
                gallery_related_article_width = '".$data['gallery_related_article_width']."',
                gallery_related_article_height = '".$data['gallery_related_article_height']."',
                article_list_template = '".$data['article_list_template']."',
                article_detail_template = '".$data['article_detail_template']."',
                article_related_template = '".$data['article_related_template']."',
                article_page_limit = '".$data['article_page_limit']."',
                article_related_status = '".$data['article_related_status']."',
                article_scroll_related = '".$data['article_scroll_related']."',
                article_related_per_row = '".$data['article_related_per_row']."',
                product_related_status = '".$data['product_related_status']."',
                product_scroll_related = '".$data['product_scroll_related']."',
                product_related_per_row = '".$data['product_related_per_row']."',
                pagination_type = '".$data['pagination_type']."',
                comments_approval = '".$data['comments_approval']."',
                comments_engine = '".$data['comments_engine']."',
                disqus_name = '".$data['disqus_name']."',
                facebook_id = '".$data['facebook_id']."',
                author_description = '".$data['author_description']."'
                ") or die(mysql_error());
        

	}

	public function getSetting($property) {
		$settings = $this->getSettings();
		return $settings[$property] ? $settings[$property] : null;
	}

	public function getSettings() {
		$sql = "SELECT DISTINCT *  FROM " . DB_PREFIX . "blog_settings";
        
		$query = $this->db->query($sql);

		return $query->row;
	}


}

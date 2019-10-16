<?php
class ModelBlogComment extends Model {
    
	public function addComment($article_id, $data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "blog_comment
                SET
                article_id = '" . (int)$article_id . "',
                name = '" . $this->db->escape($data['name']) . "',
                email = '" . $this->db->escape($data['email']) . "',
                content = '" . $this->db->escape($data['content']) . "',
                status = '" . $this->db->escape($data['status']) . "',
                date_added = NOW()");
        

    }

	public function getComment($comment_id) {
		$query = $this->db->query("SELECT DISTINCT *  FROM " . DB_PREFIX . "blog_comment bc
                 WHERE bc.comment_id = '" . (int)$comment_id . "'");

		return $query->row;
	}

	public function getComments($article_id, $data = array()) {
		$sql = "SELECT DISTINCT *  FROM " . DB_PREFIX . "blog_comment bc
                 WHERE bc.article_id = ".(int)$article_id." AND bc.status = 1";

		if (!empty($data['filter_name'])) {
			$sql .= " WHERE name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}
		if (!empty($data['filter_email'])) {
			$sql .= " WHERE email LIKE '" . $this->db->escape($data['filter_email']) . "%'";
		}
		if (!empty($data['filter_date_added'])) {
			$sql .= " WHERE date_added LIKE '" . $this->db->escape($data['date_added']) . "%'";
		}

		$sort_data = array(
			'name',
			'email',
			'date_added',
			'status'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY date_added";
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


	public function getTotalComments() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "blog_comment");

		return $query->row['total'];
	}

	public function getTotalCommentsForArticle($article_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "blog_comment WHERE article_id = " . (int)$article_id . " AND status = 1");

        return $query->row['total'];
	}
}

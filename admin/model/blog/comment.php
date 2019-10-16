<?php
class ModelBlogComment extends Model {
    
	public function addComment($data) {

		$this->db->query("INSERT INTO " . DB_PREFIX . "blog_comment
                SET
                name = '" . $this->db->escape($data['name']) . "',
                email = '" . $this->db->escape($data['email']) . "',
                content = '" . $this->db->escape($data['content']) . "',
                status = '" . $this->db->escape($data['status']) . "'");

		$comment_id = $this->db->getLastId();

		return $comment_id;
	}

	public function editComment($comment_id, $data) {

        $this->db->query("UPDATE " . DB_PREFIX . "blog_comment
                SET
                name = '" . $this->db->escape($data['name']) . "',
                email = '" . $this->db->escape($data['email']) . "',
                content = '" . $this->db->escape($data['content']) . "',
                status = '" . $this->db->escape($data['status']) . "'
                WHERE comment_id = '" . (int)$comment_id . "'");


	}

	public function deleteComment($comment_id) {

		$this->db->query("DELETE FROM " . DB_PREFIX . "blog_comment WHERE comment_id = '" . (int)$comment_id . "'");

	}

	public function getComment($comment_id) {
		$query = $this->db->query("SELECT DISTINCT *  FROM " . DB_PREFIX . "blog_comment bc
                 WHERE bc.comment_id = '" . (int)$comment_id . "'");

		return $query->row;
	}

	public function getComments($data = array()) {
		$sql = "SELECT DISTINCT *  FROM " . DB_PREFIX . "blog_comment bc";

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

	public function getTotalArticleComments($article_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "blog_comment WHERE article_id = " . (int)$article_id);

		return $query->row['total'];
	}
}

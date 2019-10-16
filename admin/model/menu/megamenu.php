<?php
/* 
Version: 1.0
Author: Artur Sułkowski
Website: http://artursulkowski.pl
*/

class ModelMenuMegamenu extends Model {
	private $errors = array();
	
	public function generate_nestable_list($lang_id, $module_id) {
		$query = $this->db->query("SELECT * FROM ".DB_PREFIX."mega_menu WHERE parent_id='0' AND module_id='" . $module_id . "' ORDER BY rang");
		$action = $this->url->link('extension/module/megamenu&module_id=' . $module_id, 'user_token=' . $this->session->data['user_token'], 'SSL');
		$output = '<div class="cf nestable-lists">';
			$output .= '<div class="dd" id="nestable">';
				$output .= '<ol class="dd-list">';
					foreach ($query->rows as $row) {
						$json = unserialize($row['name']);
						if(isset($json[$lang_id])) {
							$name = $this->skrut($json[$lang_id], 10);
						} else {
							$name = 'Set name';
						}
						$output .= '<li class="dd-item" data-id="'.$row['id'].'">';
							$output .= '<a href="'.$action.'&delete='.$row['id'].'" onclick="return confirm(\'Are you sure you want to delete?\')" class="icon-delete"></a><a href="'.$action.'&edit='.$row['id'].'" class="icon-edit"></a>';
							$output .= '<div class="dd-handle">'.$name.' (ID: '.$row['id'].')</div>';
							$output .= $this->menu_showNested($row['id'], $lang_id, $module_id);
						$output .= '</li>';
					}
				$output .= '</ol>';
			$output .= '</div>';
		$output .= '</div>';
		return $output;
	}
	
	public function menu_showNested($parentID, $lang_id, $module_id) {	
		$query = $this->db->query("SELECT * FROM ".DB_PREFIX."mega_menu WHERE parent_id='".$parentID."' AND module_id='" . $module_id . "' ORDER BY rang");
		$action = $this->url->link('extension/module/megamenu&module_id=' . $module_id, 'user_token=' . $this->session->data['user_token'], 'SSL');
		$output = false;		
		if (count($query->rows) > 0) {
			$output .= "<ol class='dd-list'>\n";
				foreach ($query->rows as $row) {
					$output .= "\n";
					$json = unserialize($row['name']);
					if(isset($json[$lang_id])) {
						$name = $this->skrut($json[$lang_id], 10);
					} else {
						$name = 'Set name';
					}
					$output .= "<li class='dd-item' data-id='{$row['id']}'>\n";
						$output .= '<a href="'.$action.'&delete='.$row['id'].'" onclick="return confirm(\'Are you sure you want to delete?\')" class="icon-delete"></a><a href="'.$action.'&edit='.$row['id'].'" class="icon-edit"></a>';
						$output .= "<a href='".$action."&edit=".$row['id']."' class='icon-edit'></a><div class='dd-handle'>{$name} (ID: {$row['id']})</div>\n";
					
						$output .= $this->menu_showNested($row['id'], $lang_id, $module_id);
					
					$output .= "</li>\n";
				}
			$output .= "</ol>\n";
		}
		return $output;
	}
	
	public function save_rang($parent_id, $id, $rang, $module_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "mega_menu SET parent_id = '" . $parent_id . "', rang = '" . $rang . "' WHERE id = '" . $id . "' AND module_id = '" . $module_id . "'");
	}
	
	public function addMenu($data, $module_id) {
		$data['content']['categories']['categories'] = json_decode(html_entity_decode($data['content']['categories']['categories']), true);
		$data['content']['products']['products'] = json_decode(html_entity_decode($data['content']['products']['products']), true);
		if(is_array($data['link'])) { $data['link'] = $this->db->escape(serialize($data['link'])); }
		$this->db->query("INSERT INTO " . DB_PREFIX . "mega_menu SET name = '" . $this->db->escape(serialize($data['name'])) . "', module_id = '" . $module_id . "', description = '" . $this->db->escape(serialize($data['description'])) . "', label = '" . $this->db->escape(serialize($data['label'])) . "', label_background_color = '" . $data['label_background_color'] . "', label_text_color = '" . $data['label_text_color'] . "', icon = '" . $data['icon'] . "', link = '" . $data['link'] . "', new_window = '" . $data['new_window'] . "', status = '" . $data['status'] . "', display_on_mobile = '" . $data['display_on_mobile'] . "', position = '" . $data['position'] . "', submenu_width = '" . $data['submenu_width'] . "', submenu_type = '" . $data['display_submenu'] . "', submenu_background = '" . $data['submenu_background'] . "', submenu_background_position = '" . $data['submenu_background_position'] . "', submenu_background_repeat = '" . $data['submenu_background_repeat'] . "', rang='1000', content_width='" . $data['content_width'] . "', content_type='" . $data['content_type'] . "', custom_class = '" . $data['custom_class'] . "', content='" . $this->db->escape(serialize($data['content'])) . "'");
	}
	
	public function saveMenu($data, $module_id) {
		$data['content']['categories']['categories'] = json_decode(html_entity_decode($data['content']['categories']['categories']), true);
		$data['content']['products']['products'] = json_decode(html_entity_decode($data['content']['products']['products']), true);
		if(is_array($data['link'])) { $data['link'] = $this->db->escape(serialize($data['link'])); }
		$this->db->query("UPDATE " . DB_PREFIX . "mega_menu SET name = '" . $this->db->escape(serialize($data['name'])) . "', custom_class = '" . $data['custom_class'] . "', module_id = '" . $module_id . "', description = '" . $this->db->escape(serialize($data['description'])) . "', label = '" . $this->db->escape(serialize($data['label'])) . "', label_background_color = '" . $data['label_background_color'] ."', label_text_color = '" . $data['label_text_color'] ."', icon = '" . $data['icon'] ."', link = '" . $data['link'] ."', new_window = '" . $data['new_window'] ."', status = '" . $data['status'] ."', display_on_mobile = '" . $data['display_on_mobile'] ."', position = '" . $data['position'] ."', submenu_width = '" . $data['submenu_width'] ."', submenu_type = '" . $data['display_submenu'] ."', submenu_background = '" . $data['submenu_background'] . "', submenu_background_position = '" . $data['submenu_background_position'] . "', submenu_background_repeat = '" . $data['submenu_background_repeat'] . "', content_width = '" . $data['content_width'] ."', content_type = '" . $data['content_type'] ."', content = '" . $this->db->escape(serialize($data['content'])) . "' WHERE id = '" . $data['id'] . "'");
	}
	
	public function deleteMenu($id) {
		$query = $this->db->query("SELECT * FROM ".DB_PREFIX."mega_menu WHERE id='".$id."'");
		if(count($query->rows) > 0) {
			$query = $this->db->query("SELECT * FROM ".DB_PREFIX."mega_menu WHERE parent_id='".$id."'");
			if(count($query->rows) > 0) {
				$this->errors[] = "Menu wasn't removed because contains submenu.";
			} else {
				$this->db->query("DELETE FROM " . DB_PREFIX . "mega_menu WHERE id = '" . $id . "'");
				return true;
			}
		} else {
			$this->errors[] = 'This menu does not exist!';
		}
		return false;
	}
	
	public function getMenu($id) {
		$query = $this->db->query("SELECT * FROM ".DB_PREFIX."mega_menu WHERE id='".$id."'");
		if(count($query->rows) > 0) { 
			$data = array();
			foreach ($query->rows as $result) {
				if(@unserialize($result['link'])) {
					$result['link'] = unserialize($result['link']);
				}
				$data = array(
					'name' => unserialize($result['name']),
					'description' => unserialize($result['description']),
					'label' => unserialize($result['label']),
					'label_text_color' => $result['label_text_color'],
					'label_background_color' => $result['label_background_color'],
					'icon' => $result['icon'],
					'link' => $result['link'],
					'new_window' => $result['new_window'],
					'custom_class' => $result['custom_class'],
					'status' => $result['status'],
					'display_on_mobile' => $result['display_on_mobile'],
					'position' => $result['position'],
					'submenu_width' => $result['submenu_width'],
					'display_submenu' => $result['submenu_type'],
					'submenu_background' => $result['submenu_background'],
					'submenu_background_position' => $result['submenu_background_position'],
					'submenu_background_repeat' => $result['submenu_background_repeat'],
					'content_width' => $result['content_width'],
					'content_type' => $result['content_type'],
					'content' => unserialize($result['content'])
				);
			}
			return $data;
		}
		return false;
	}
	
	public function getCategories($array = array()) {
		$output = '';
		if(!empty($array)) {
			foreach($array as $row) {
				$output .= '<li class="dd-item" data-id="'.$row['id'].'" data-name="'.$row['name'].'"';
				if(isset($row['type'])) $output .= ' data-type="'.$row['type'].'"';
				$output .= '>';
					$output .= '<a class="icon-delete"></a>';
					$output .= '<div class="dd-handle">'.$row['name'].'</div>';
					if(isset($row['children'])) {
						if(!empty($row['children'])) {
							$output .= $this->getCategoriesChildren($row['children']);
						}
					}
				$output .= '</li>';
			}
		}
		return $output;
	}
	
	public function getCategoriesChildren($array = array()) {
		$output = '';
		$output .= '<ol class="dd-list">';
			foreach($array as $row) {
				$output .= '<li class="dd-item" data-id="'.$row['id'].'" data-name="'.$row['name'].'"';
				if(isset($row['type'])) $output .= ' data-type="'.$row['type'].'"';
				$output .= '>';
					$output .= '<a class="icon-delete"></a>';
					$output .= '<div class="dd-handle">'.$row['name'].'</div>';
					if(isset($row['children'])) {
						if(!empty($row['children'])) {
							$output .= $this->getCategoriesChildren($row['children']);
						}
					}
				$output .= '</li>';
			}
		$output .= '</ol>';
		return $output;
	}
	
	public function displayError() {
		$errors = '';
		foreach ($this->errors as $error) {
			$errors .= '<div>'.$error.'</div>';
		}
		return $errors;
	}
	
	public function addModule($data) {
		$query = $this->db->query("SELECT * FROM ".DB_PREFIX."mega_menu_modules WHERE name='" . $data['add-module-name'] . "'");
		if(count($query->rows) < 1) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "mega_menu_modules SET name = '" . $data['add-module-name'] . "'");
			return true;
		}
		return false;
	}
	
	public function deleteModule($data) {
		$query = $this->db->query("SELECT * FROM ".DB_PREFIX."mega_menu_modules WHERE id='" . $data['megamenu_modules'] . "'");
		if(count($query->rows) > 0) {
			$this->db->query("DELETE FROM " . DB_PREFIX . "mega_menu_modules WHERE id = '" . $data['megamenu_modules'] . "'");
			$this->db->query("DELETE FROM " . DB_PREFIX . "mega_menu WHERE module_id = '" . $data['megamenu_modules'] . "'");
			return true;
		}
		return false;
	}
	
	public function getModules($module_id = 'false') {
		if($module_id != 'false') {
			$query = $this->db->query("SELECT * FROM ".DB_PREFIX."mega_menu_modules WHERE id = '" . $module_id . "'");
		} else {
			$query = $this->db->query("SELECT * FROM ".DB_PREFIX."mega_menu_modules");
		}
		if(count($query->rows) > 0) { 
			$data = array();
			foreach ($query->rows as $result) {
				$data[] = array(
					'id'   => $result['id'],
					'name' => $result['name']
				);
			}
			return $data;
		}
		return array();
	}
	
	public function getLinks($filter_name = '') {
	     if($filter_name) {
     	     if(!$this->is_table_exist(DB_PREFIX . "mega_menu_links")) {
          		$sql = "SELECT * FROM " . DB_PREFIX . "mega_menu_links WHERE LOWER(name_for_autocomplete) LIKE '" . $this->db->escape(strtolower($filter_name)) . "%' ORDER BY name ASC LIMIT 0,10";
          		$query = $this->db->query($sql);
          
          		return $query->rows;
     	     } else {
     	          return array();
     	     }
	     } else {
     		$sql = "SELECT * FROM " . DB_PREFIX . "mega_menu_links ORDER BY name ASC";
     		$query = $this->db->query($sql);
     
     		return $query->rows;     
	     }
	}
	
	public function getDataLink($id) {
		$query = $this->db->query("SELECT * FROM ".DB_PREFIX."mega_menu_links WHERE id='".$id."'");
		if(count($query->rows) > 0) { 
			$data = array();
			foreach ($query->rows as $result) {
				if(@unserialize($result['url'])) {
					$result['url'] = unserialize($result['url']);
				}
				$data = array(
					'name' => unserialize($result['name']),
					'label' => unserialize($result['label']),
					'url' => $result['url'],
					'label_text' => $result['label_text'],
					'label_background' => $result['label_background'],
					'image' => $result['image']
				);
			}
			return $data;
		}
		return false;
	}
	
	public function addLink($data, $lang_id) {
	     if($data['name'][$lang_id] != '') {
	     	if(is_array($data['url'])) {
	     		$data['url'] = $this->db->escape(serialize($data['url']));
	     	}
     		$this->db->query("INSERT INTO " . DB_PREFIX . "mega_menu_links SET name = '" . $this->db->escape(serialize($data['name'])) . "', name_for_autocomplete = '" . $data['name'][$lang_id] . "', label = '" . $this->db->escape(serialize($data['label'])) . "', url = '" . $data['url'] . "', label_background = '" . $data['label_background'] . "', label_text = '" . $data['label_text'] . "', image = '" . $data['image'] . "'");
     		
     		return true;
		} else {
		     $this->errors[] = 'Please set the name of the link!';
		     return false;			
		}
	}
	
	public function deleteLink($id) {
		$query = $this->db->query("SELECT * FROM ".DB_PREFIX."mega_menu_links WHERE id='".$id."'");
		if(count($query->rows) > 0) {
			$this->db->query("DELETE FROM " . DB_PREFIX . "mega_menu_links WHERE id = '" . $id . "'");
			return true;
		} else {
			$this->errors[] = 'This link does not exist!';
		}
		return false;
	}
	
	public function saveLink($data, $lang_id) {
		$query = $this->db->query("SELECT * FROM ".DB_PREFIX."mega_menu_links WHERE id='".$data['link_id']."'");
		if(count($query->rows) > 0) {
		     if($data['name'][$lang_id] != '') {
	     		if(is_array($data['url'])) {
	     			$data['url'] = $this->db->escape(serialize($data['url']));
	     		}
     			$this->db->query("UPDATE " . DB_PREFIX . "mega_menu_links SET name = '" . $this->db->escape(serialize($data['name'])) . "', name_for_autocomplete = '" . $data['name'][$lang_id] . "', label = '" . $this->db->escape(serialize($data['label'])) . "', url = '" . $data['url'] . "', label_background = '" . $data['label_background'] . "', label_text = '" . $data['label_text'] . "', image = '" . $data['image'] . "' WHERE id='".$data['link_id']."'");
     			return true;
			} else {
                    $this->errors[] = 'Please set the name of the link!';
                    return false;			
			}
		}
		$this->errors[] = 'This link does not exist!';
		return false;
	}

	public function install() {
		if($this->is_table_exist(DB_PREFIX . "mega_menu")) {
			$query = $this->db->query("
				CREATE TABLE IF NOT EXISTS `".DB_PREFIX."mega_menu` (
					`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
					`module_id` int(11) NOT NULL DEFAULT '0',
					`parent_id` int(11) NOT NULL,
					`rang` int(11) NOT NULL,
					`icon` varchar(255) NOT NULL DEFAULT '',
					`name` text,
					`link` text,
					`description` text,
					`label` text,
					`label_text_color` text,
					`label_background_color` text,
					`new_window` int(11) NOT NULL DEFAULT '0',
					`status` int(11) NOT NULL DEFAULT '0',
					`display_on_mobile` int(11) NOT NULL DEFAULT '0',
					`position` int(11) NOT NULL DEFAULT '0',
					`custom_class` text,
					`submenu_width` text,
					`submenu_type` int(11) NOT NULL DEFAULT '0',
					`submenu_background` text,
					`submenu_background_position` text,
					`submenu_background_repeat` text,
					`content_width` int(11) NOT NULL DEFAULT '12',
					`content_type` int(11) NOT NULL DEFAULT '0',
					`content` text,
					PRIMARY KEY (`id`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1
			");
			
			$query = $this->db->query("
				CREATE TABLE IF NOT EXISTS `".DB_PREFIX."mega_menu_modules` (
					`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
					`name` text,
					PRIMARY KEY (`id`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1
			");
			
			$query = $this->db->query("
				CREATE TABLE IF NOT EXISTS `".DB_PREFIX."mega_menu_links` (
					`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
					`name` text,
					`name_for_autocomplete` text,
					`url` text,
					`label` text,
					`label_text` text,
					`label_background` text,
					`image` text,
					PRIMARY KEY (`id`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1
			");
		}
		return false;
	}
	
	public function skrut($c,$d) {
		if(strlen($c) > $d) {
			$ciag = substr($c,0,$d);
			$ciag .="...";               
			return $ciag; 
		} else {
			return $c;	 
		}
	}
	
	public function is_table_exist($table){
		$query = $this->db->query("SHOW TABLES LIKE '".$table."'");
		if( count($query->rows) <= 0 ) { 
			return true;
		}
	  	return false;
	}
}
?>
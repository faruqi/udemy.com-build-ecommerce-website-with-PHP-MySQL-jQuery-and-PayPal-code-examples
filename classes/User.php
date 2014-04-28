<?php
class User extends Application {
	
	private $_table = "clients";
	public $_id;
	
	
	
	
	
	
	
	
	
	public function isUser($email, $password) {
		$password = Login::string2hash($password);
		$sql = "SELECT * FROM `{$this->_table}`
				WHERE `email` = '".$this->db->escape($email)."'
				AND `password` = '".$this->db->escape($password)."'
				AND `active` = 1";
		$result = $this->db->fetchOne($sql);
		if (!empty($result)) {
			$this->_id = $result['id'];
			return true;
		}
		return false;
	}
	
	
	
	
	
	
	
	
	
	
	public function addUser($params = null, $password = null) {
	
		if (!empty($params) && !empty($password)) {
			$this->db->prepareInsert($params);
			if ($this->db->insert($this->_table)) {
				
				// send email
				$objEmail = new Email();
				if ($objEmail->process(1, array(
					'email'			=> $params['email'],
					'first_name'	=> $params['first_name'],
					'last_name'		=> $params['last_name'],
					'password'		=> $password,
					'hash'			=> $params['hash']
				))) {
					return true;
				}
				return false;
				
			}
			return false;
		}
		return false;
	
	}
	
	
	
	
	
	
	
	
	
	public function getUserByHash($hash = null) {
		if (!empty($hash)) {
			$sql  = "SELECT * FROM `{$this->_table}`
					WHERE `hash` = '";
			$sql .= $this->db->escape($hash)."'";
			return $this->db->fetchOne($sql);
		}
	}
	
	
	
	
	
	
	
	public function makeActive($id = null) {
		if (!empty($id)) {
			$sql = "UPDATE `{$this->_table}`
					SET `active` = 1
					WHERE `id` = '".$this->db->escape($id)."'";
			return $this->db->query($sql);
		}
	}
	
	
	
	
	
	
	
	public function getByEmail($email = null) {
		if (!empty($email)) {
			$sql = "SELECT `id` FROM `{$this->_table}`
					WHERE `email` = '".$this->db->escape($email)."'
					AND `active` = 1";
			return $this->db->fetchOne($sql);
		}
	}
	
	
	
	
	
	
	
	public function getUser($id = null) {
		if (!empty($id)) {
			$sql = "SELECT * FROM `{$this->_table}`
					WHERE `id` = '".$this->db->escape($id)."'";
			return $this->db->fetchOne($sql);
		}
	}
	
	
	
	
	
	
	
	
	
	public function updateUser($array = null, $id = null) {
		if (!empty($array) && !empty($id)) {
			$this->db->prepareUpdate($array);
			if ($this->db->update($this->_table, $id)) {
				return true;
			}
			return false;
		}
	}
	
	
	
	
	
	
	
	
	public function getUsers($srch = null) {
		$sql = "SELECT * FROM `{$this->_table}`
				WHERE `active` = 1";
		if (!empty($srch)) {
			$srch = $this->db->escape($srch);
			$sql .= " AND (`first_name` LIKE '%{$srch}%' || `last_name` LIKE '%{$srch}%')";
		}
		$sql .= " ORDER BY `last_name`, `first_name` ASC";
		return $this->db->fetchAll($sql);
	}
	
	
	
	
	
	
	
	public function removeUser($id = null) {
		if (!empty($id)) {
			$sql = "DELETE FROM `{$this->_table}`
					WHERE `id` = '".$this->db->escape($id)."'";
			return $this->db->query($sql);
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	

}
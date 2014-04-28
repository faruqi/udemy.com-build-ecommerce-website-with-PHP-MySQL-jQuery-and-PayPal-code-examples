<?php
class Order extends Application {

	private $_table = 'orders';
	private $_table_2 = 'orders_items';
	private $_table_3 = 'statuses';
	
	private $_basket = array();
	
	private $_items = array();
	
	private $_fields = array();
	private $_values = array();
	
	private $_id = null;
	
	
	
	
	
	
	public function getItems() {
	
		$this->_basket = Session::getSession('basket');
		if (!empty($this->_basket)) {
			$objCatalogue = new Catalogue();
			foreach($this->_basket as $key => $value) {
				$this->_items[$key] = $objCatalogue->getProduct($key);
			}
		}
	
	}
	
	
	
	
	
	
	
	
	
	
	public function createOrder() {
	
		$this->getItems();
		
		if (!empty($this->_items)) {
			
			$objUser = new User();
			$user = $objUser->getUser(Session::getSession(Login::$_login_front));
			
			if (!empty($user)) {
			
				$objBasket = new Basket();
				
				$this->_fields[] = 'client';
				$this->_values[] = $this->db->escape($user['id']);
				
				$this->_fields[] = 'vat_rate';
				$this->_values[] = $this->db->escape($objBasket->_vat_rate);
				
				$this->_fields[] = 'vat';
				$this->_values[] = $this->db->escape($objBasket->_vat);
				
				$this->_fields[] = 'subtotal';
				$this->_values[] = $this->db->escape($objBasket->_sub_total);
				
				$this->_fields[] = 'total';
				$this->_values[] = $this->db->escape($objBasket->_total);
				
				$this->_fields[] = 'date';
				$this->_values[] = Helper::setDate();
				
				$sql  = "INSERT INTO `{$this->_table}` (`";
				$sql .= implode("`, `", $this->_fields);
				$sql .= "`) VALUES ('";
				$sql .= implode("', '", $this->_values);
				$sql .= "')";
				
				$this->db->query($sql);
				$this->_id = $this->db->lastId();
				
				if (!empty($this->_id)) {
					$this->_fields = array();
					$this->_values = array();
					return $this->addItems($this->_id);
				}
				
			}
			
			return false;
			
		}
		
		return false;
	
	}
	
	
	
	
	
	
	
	
	
	private function addItems($order_id = null) {
		if (!empty($order_id)) {
			
			$error = array();
			foreach($this->_items as $item) {
				$sql = "INSERT INTO `{$this->_table_2}`
						(`order`, `product`, `price`, `qty`)
						VALUES ('{$order_id}', '".$item['id']."', '".$item['price']."', '".$this->_basket[$item['id']]['qty']."')";
				if (!$this->db->query($sql)) {
					$error[] = $sql;
				}
			}
			
			return empty($error) ? true : false;
			
		}
		return false;
	}
	
	
	
	
	
	
	
	
	
	
	public function getOrder($id = null) {
	
		$id = !empty($id) ? $id : $this->_id;
		
		$sql = "SELECT * FROM `{$this->_table}`
				WHERE `id` = '".$this->db->escape($id)."'";
		return $this->db->fetchOne($sql);
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	public function getOrderItems($id = null) {
		
		$id = !empty($id) ? $id : $this->_id;
		
		$sql = "SELECT * FROM `{$this->_table_2}`
				WHERE `order` = '".$this->db->escape($id)."'";
		return $this->db->fetchAll($sql);
		
	}
	
	
	
	
	
	
	
	
	
	
	
	public function approve($array = null, $result = null) {
		if (!empty($array) && !empty($result)) {
			if (
				array_key_exists('txn_id', $array) &&
				array_key_exists('payment_status', $array) &&
				array_key_exists('custom', $array)
			) {
				$active = $array['payment_status'] == 'Completed' ? 1 : 0;
				
				$out = array();
				
				foreach($array as $key => $value) {
					$out[] = "{$key} : {$value}";
				}
				
				$out = implode("\n", $out);
				
				$sql = "UPDATE `{$this->_table}`
						SET `pp_status` = '".$this->db->escape($active)."',
						`txn_id` = '".$this->db->escape($array['txn_id'])."',
						`payment_status` = '".$this->db->escape($array['payment_status'])."',
						`ipn` = '".$this->db->escape($out)."',
						`response` = '".$this->db->escape($result)."'
						WHERE `id` = '".$this->db->escape($array['custom'])."'";
				$this->db->query($sql);
			}			
		}
	}
	
	
	
	
	
	
	
	
	
	public function getClientOrders($client_id = null) {
		if (!empty($client_id)) {
			$sql = "SELECT * FROM `{$this->_table}`
					WHERE `client` = '".$this->db->escape($client_id)."'
					ORDER BY `date` DESC";
			return $this->db->fetchAll($sql);
		}
	}
	
	
	
	
	
	
	
	
	
	public function getStatus($id = null) {
		if (!empty($id)) {
			$sql = "SELECT * FROM `{$this->_table_3}`
					WHERE `id` = '".$this->db->escape($id)."'";
			return $this->db->fetchOne($sql);
		}
	}
	
	
	
	
	
	
	
	
	
	public function getOrders($srch = null) {
		$sql  = "SELECT * FROM `{$this->_table}`";
		$sql .= !empty($srch) ?
				" WHERE `id` = '".$this->db->escape($srch)."'" :
				null;
		$sql .= " ORDER BY `date` DESC";
		return $this->db->fetchAll($sql);
	}
	
	
	
	
	
	
	
	
	public function getStatuses() {
		$sql = "SELECT * FROM `{$this->_table_3}`
				ORDER BY `id` ASC";
		return $this->db->fetchAll($sql);
	}
	
	
	
	
	
	
	
	public function updateOrder($id = null, $array = null) {
		if (!empty($id) && !empty($array) && is_array($array) && array_key_exists('status', $array) && array_key_exists('notes', $array)) {
			$sql = "UPDATE `{$this->_table}`
					SET `status` = '".$this->db->escape($array['status'])."',
					`notes` = '".$this->db->escape($array['notes'])."'
					WHERE `id` = '".$this->db->escape($id)."'";
			return $this->db->query($sql);
		}
	}
	
	
	
	
	
	
	
	
	
	public function removeOrder($id = null) {
		if (!empty($id)) {
			$sql = "DELETE FROM `{$this->_table}`
					WHERE `id` = '".$this->db->escape($id)."'";
			return $this->db->query($sql);
		}
	}
	
	
	
	
	
	
	
	
	
	
	





}
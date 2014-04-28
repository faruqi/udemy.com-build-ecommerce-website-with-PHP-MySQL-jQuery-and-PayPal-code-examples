<?php
class Basket {
	
	public $_inst_catalogue;
	public $_empty_basket;
	public $_vat_rate;
	public $_number_of_items;
	public $_sub_total;
	public $_vat;
	public $_total;
	
	
	
	
	public function __construct() {
	
		$this->_inst_catalogue = new Catalogue();
		$this->_empty_basket = empty($_SESSION['basket']) ? true : false;
		
		$objBusiness = new Business();
		$this->_vat_rate = $objBusiness->getVatRate();
		
		$this->noItems();
		$this->subtotal();
		$this->vat();
		$this->total();
		
	}
	
	
	
	
	public function noItems() {
		$value = 0;
		if (!$this->_empty_basket) {
			foreach($_SESSION['basket'] as $key => $basket) {
				$value += $basket['qty'];
			}
		}
		$this->_number_of_items = $value;
	}
	
	
	
	
	public function subtotal() {
		$value = 0;
		if (!$this->_empty_basket) {
			foreach($_SESSION['basket'] as $key => $basket) {
				$product = $this->_inst_catalogue->getProduct($key);
				$value += ($basket['qty'] * $product['price']);	
			}
		}		
		$this->_sub_total = round($value, 2);
	}
	
	
	
	
	public function vat() {
		$value = 0;
		if (!$this->_empty_basket) {
			$value = ($this->_vat_rate * ($this->_sub_total / 100));
		}		
		$this->_vat = round($value, 2);	
	}
	
	
	
	
	public function total() {
		$this->_total = round(($this->_sub_total + $this->_vat), 2);	
	}
	
	
	

	public static function activeButton($sess_id) {
		if(isset($_SESSION['basket'][$sess_id])) {
			$id = 0;
			$label = "Remove from basket";
		} else {
			$id = 1;
			$label = "Add to basket";
		}
		
		$out  = "<a href=\"#\" class=\"add_to_basket";
		$out .= $id == 0 ? " red" : null;
		$out .= "\" rel=\"";
		$out .= $sess_id."_".$id;
		$out .= "\">{$label}</a>";
		return $out;
	}
	
	
	
	
	
	public function itemTotal($price = null, $qty = null) {
		if (!empty($price) && !empty($qty)) {
			return round(($price * $qty), 2);
		}
	}
	
	
	
	
	
	public static function removeButton($id = null) {
		if (!empty($id)) {
			if (isset($_SESSION['basket'][$id])) {
				$out  = "<a href=\"#\" class=\"remove_basket red";
				$out .= "\" rel=\"{$id}\">Remove</a>";
				return $out;
			}
		}
	}
	
	
	
	
	
	

}
<?php
class Application {

	public $db;
	
	public function __construct() {
		$this->db = new Dbase();
	}
	
}
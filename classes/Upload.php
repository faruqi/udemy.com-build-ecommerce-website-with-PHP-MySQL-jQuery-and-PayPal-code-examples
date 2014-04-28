<?php
class Upload {
	
	public $_files = array();
	public $_overwrite = false;
	public $_errors = array();
	public $_names = array();
	
	
	
	
	
	
	
	
	public function __construct() {
		$this->getUploads();
	}
	
	
	
	
	
	
	
	
	
	public function getUploads() {
		if (!empty($_FILES)) {
			foreach($_FILES as $key => $value) {
				$this->_files[$key] = $value;
			}
		}
	}
	
	
	
	
	
	
	
	
	public function upload($path = null) {
	
		if (!empty($path) && is_dir($path) && !empty($this->_files)) {
		
			foreach($this->_files as $key => $value) {
			
				$name = Helper::cleanString($value['name']);
				
				if ($this->_overwrite == false && is_file($path.DS.$name)) {
					$prefix = date('YmdHis', time());
					$name = $prefix."-".$name;
				}
				
				if (!move_uploaded_file($value['tmp_name'], $path.DS.$name)) {
					$this->_errors[] = $key;
				}
				
				$this->_names[] = $name;
			
			}
			
			return empty($this->_errors) ? true : false;
		
		}
		return false;
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	



}
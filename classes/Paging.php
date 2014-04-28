<?php
class Paging {


	private $_records;
	private $_max_pp;
	private $_numb_of_pages;
	private $_numb_of_records;
	private $_current;
	private $_offset = 0;
	public static $_key = 'pg';
	public $_url;
	
	
	
	public function __construct($rows, $max = 10) {
		$this->_records = $rows;
		$this->_numb_of_records = count($this->_records);
		$this->_max_pp = $max;
		$this->_url = Url::getCurrentUrl(self::$_key);
		$current = Url::getParam(self::$_key);
		$this->_current = !empty($current) ? $current : 1;
		$this->numberOfPages();
		$this->getOffset();
	}
	
	
	private function numberOfPages() {
		$this->_numb_of_pages = ceil($this->_numb_of_records / $this->_max_pp);
	}
	
	
	private function getOffset() {
		$this->_offset = ($this->_current - 1) * $this->_max_pp;
	}
	
	
	
	public function getRecords() {
		$out = array();
		if ($this->_numb_of_pages > 1) {
			$last = ($this->_offset + $this->_max_pp);
			
			for($i = $this->_offset; $i < $last; $i++) {
				if ($i < $this->_numb_of_records) {
					$out[] = $this->_records[$i];
				}
			}
		} else {
			$out = $this->_records;
		}
		return $out;
	}
	
	
	private function getLinks() {
		if ($this->_numb_of_pages > 1) {
			
			$out = array();
			
			// first link
			if ($this->_current > 1) {
				$out[] = "<a href=\"".$this->_url."\">First</a>";
			} else {
				$out[] = "<span>First</span>";
			}
			
			
			// previous link
			if ($this->_current > 1) {
				
				// previous page number
				$id = ($this->_current - 1);
				
				$url = $id > 1 ? 
					$this->_url."&amp;".self::$_key."=".$id :
					$this->_url;
				$out[] = "<a href=\"{$url}\">Previous</a>";
				
			} else {
				$out[] = "<span>Previous</span>";
			}
			
			
			// next link
			if ($this->_current != $this->_numb_of_pages) {
				// next page number
				$id = ($this->_current + 1);
				
				$url = $this->_url."&amp;".self::$_key."=".$id;
				$out[] = "<a href=\"{$url}\">Next</a>";
				
			} else {
				$out[] = "<span>Next</span>";
			}
			
			
			// last link
			if ($this->_current != $this->_numb_of_pages) {
				$url = $this->_url."&amp;".self::$_key."=".$this->_numb_of_pages;
				$out[] = "<a href=\"{$url}\">Last</a>";
			} else {
				$out[] = "<span>Last</span>";
			}
			
			return "<li>".implode("</li><li>", $out)."</li>";
			
		}	
	}
	
	
	public function getPaging() {
		$links = $this->getLinks();
		if (!empty($links)) {
			$out  = "<ul class=\"paging\">";
			$out .= $links;
			$out .= "</ul>";
			return $out;
		}
	}
	
	
	
	

}
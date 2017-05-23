<?php

class BlogPost {
	private $_blog_id;
	private $_title;
	private $_content;
	private $_word_counter;
	private $_date_created;
	
	public function __construct($blogId = 0, $title="", $content="",$dateCreated="") {
		$this->_id = $blogId;
		$this->_title = $title;
		$this->_content = $content;
		$this->_date_created = $dateCreated;
		$this->_word_counter = str_word_count($content);
	}
	
	public function getBlogId() {
		return $this->_blogId;
	}
	
	public function setBlogId() {
		$this->_blog_id = $blogID;
	}
	
	public function getTitle() {
		return $this->_title;
	}
	
	public function setTitle($title) {
		$this->_title = $title;
	}
	
	public function getContent() {
		return $this->_content;
	}
	
	public function setContent($content) {
		$this->_content = $content;
	}
	
	public function getWordCounter() {
		return $counter;
	}
	
	public function getDateCreated() {
		return $this->_date_created;
	}
	
	public function setDateCreated($date) {
		$this->_date_created = $date;
	}
}

?>
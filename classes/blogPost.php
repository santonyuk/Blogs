<?php

class BlogPost {
	private $_blog_id;
	private $_title;
	private $_blog_post;
	private $_word_counter;
	private $_date_created;
	
	public function __construct($blogId = 0, $title="", $blogPost="",$dateCreated="") {
		$this->_id = $blogId;
		$this->_title = $title;
		$this->_blog_post = $blogPost;
		$this->_date_created = $dateCreated;
		$this->_word_counter = $wordCounter;
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
	
	public function getBlogPost() {
		return $this->_blog_post;
	}
	
	public function setBlogPost($blogPost) {
		$this->_blog_post = $blogPost;
	}
	
	public function getWordCounter() {
		return 10;
	}
	
	public function setWordCounter($counter) {
		$this->_word_counter = $counter;
	}
	
	public function getDateCreated() {
		return $this->_date_created;
	}
	
	public function setDateCreated($date) {
		$this->_date_created = $date;
	}
}

?>
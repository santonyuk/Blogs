<?php

class Blogger {
	private $_bloggerId;
	private $_username;
	private $_name;
	private $_portrait;
	private $_bio;
	private $_blog_counter;
	
	public function __construct($bloggerId=0, $username="",
								$portrait="", $bio="", $counter="") {
		$this->_bloggerId = $bloggerId;
		$this->_username = $username;
		$this->_name = $name;
		$this->_password = $password;
		$this->_portrait = $portrait;
		$this->_bio = $bio;
		$this->_blog_counter = $counter;
	}
	
	public function getBloggerId() {
	return $this->_bloggerId;
	}

	public function setBloggerId() {
		$this->_blogger_id = $bloggerID;
	}
	
	public function getUsername() {
		return $this->_username;
	}
	
	public function setUsername() {
		$this->_username = $username;
	}
	
	public function getEmail() {
		return $this->_email;
	}
	
	public function setEmail($email) {
		$this->_email = $email;
	}
	
	public function getPassword() {
		return $this->_password;
	}
	
	public function setPassword($password) {
		$this->_password = $password;
	}
	
	public function getPortrait() {
		return $this->_portrait;
	}
	
	public function setPortrait($portrait) {
		$this->_portrait = $portrait;
	}
	
	public function getBio() {
		return $this->_bio;
	}
	
	public function setBio($bio) {
		$this->_bio = $bio;
	}
	
	public function getBlogCounter() {
		return $this->_blog_count;
	}
	
	public function setBlogCounter($counter) {
		$this->setBlogCounter = $counter;
	}
}

?>
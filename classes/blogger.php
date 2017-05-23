<?php

class Blogger {
	private $_bloggerId;
	private $_username;
	private $_portrait;
	private $_bio;
	private $_blogCounter;
	private $_mostRecent;
	
	public function __construct($bloggerId=0, $username="", $portrait="",
								$bio="", $counter="", $mostRecent=0) {
		$this->_bloggerId = $bloggerId;
		$this->_username = $username;
		$this->_portrait = $portrait;
		$this->_bio = $bio;
		$this->_blogCounter = $counter;
		$this->_mostRecent = $mostRecent;
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
		return $this->_blogCounter;
	}
	
	public function setBlogCounter($counter) {
		$this->_blogCounter = $counter;
	}
	
	public function getMostRecent() {
		return $this->_mostRecent;
	}
	
	public function setMostRecent($mostRecent) {
		$this->_mostRecent = $mostRecent;
	}
}

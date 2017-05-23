<?php

/**
   * File defines the class for creating Blogger objects
   *
   * The class for creating Blogger objects contains
   * the bloggerId, username, blog counter, most recent blog id,
   * the most recent blog date/time and the biog.
   *
   * PHP version 5
   *
   * @category   CategoryName
   * @package    PackageName
   * @author     Sofiya Antonyuk <santonyuk2@mail.greenriver.edu>
   * @copyright  2017
   * @version    1.0
   */
  
  /**
   * Class for creating Blogger objects
   *
   * Class for creating Blogger objects containing
   * the bloggerId, username, blog counter, most recent blog id,
   * the most recent blog date/time, and the bio.
   *
   * @category   CategoryName
   * @package    PackageName
   * @author     Sofiya Antonyuk <santonyuk2@mail.greenriver.edu>
   * @copyright  2017
   * @version    1.0
   */

class Blogger {
	//{{{properties 
	private $_bloggerId;
	private $_username;
	private $_portrait;
	private $_bio;
	private $_blogCounter;
	private $_mostRecent;
	//}}}
	
	//{{{ __construct()
	/**
     * Constructor for Blogger Class.
     * @param int     $bloggerId            Blogger Id from database
     * @param string  $username             Blogger username
     * @param string  $portrait          	The path name for the profile picture
     * @param bio     $bio                  The biography of the blogger
     * @param int     $counter            	How many blogs the Blogger has made
     * @param string  $mostRecent   		The date the most recent blog was made
     * @access public
     */ 
	public function __construct($bloggerId=0, $username="", $portrait="",
								$bio="", $counter="", $mostRecent="0000-00-00") {
		$this->_bloggerId = $bloggerId;
		$this->_username = $username;
		$this->_portrait = $portrait;
		$this->_bio = $bio;
		$this->_blogCounter = $counter;
		$this->_mostRecent = $mostRecent;
	}
	//}}}
	
	//{{{ getBloggerId()
	/**
     * Getter for bloggerId.
     *
     * @return int  Blogger Id from database
     * @access public
     */
	public function getBloggerId() {
	return $this->_bloggerId;
	}
	//}}}
	
	//{{{getUsername() 
	/**
     * Getter for username
     *
     * @return string   Blogger username.
     * @access public
     */
	public function getUsername() {
		return $this->_username;
	}
	//}}}
	
	//{{{ getEmail() 
	/**
     * Getter for email
     *
     * @return string   Blogger email.
     * @access public
     */
	public function getEmail() {
		return $this->_email;
	}
	//}}}
	
	//{{{ setEmail()
	/**
     * Setter for email
     *
     * @return string   Blogger email.
     * @access public
     */
	public function setEmail($email) {
		$this->_email = $email;
	}
	//}}}
	
	//{{{setPassword()
	/**
     * Setter for password
     *
     * @return string   Blogger password.
     * @access public
     */
	public function setPassword($password) {
		$this->_password = $password;
	}
	//}}}
	
	//{{{ setPortrait()
	/**
     * Setter for the blogger profile picture
     *
     * @param string  $portrait     the blogger's profile picture
     * @access public
     */
	public function setPortrait($portrait) {
		$this->_portrait = $portrait;
	}
	//}}}
	
	//{{{ getBio()
	/**
     * Getter for the blogger bio.
     *
     * @return  string    The blogger bio
     * @access public
     */
	public function getBio() {
		return $this->_bio;
	}
	//}}}
	
	//{{{ setBio()
	/**
     * Setter for the blogger bio
     *
     * @param string   $bio   The new blogger bio
     */
	public function setBio($bio) {
		$this->_bio = $bio;
	}
	//}}}
	
	//{{{ getBlogCounter()
	/**
     * Getter for blog count.
     *
     * @return int    Counter for how many blogs created
     * @access public
     */
	public function getBlogCounter() {
		return $this->_blogCounter;
	}
	//}}}
	
	//{{{ getMostRecent() 
	/**
     * Getter for blogId for the most recent post made by blogger.
     *
     * @return int    Blog id for the most recent post created
     * @access public
     */
	public function getMostRecent() {
		return $this->_mostRecent;
	}
	//}}}
	
	//{{{ setMostRecent() 
	/**
     * Setter for blogId for the most recent post made by blogger.
     *
     * @param int   $mostRecent   Blog id for the most recent post created
     * @access public
     */
	public function setMostRecent($mostRecent) {
		$this->_mostRecent = $mostRecent;
	}
	//}}}
}

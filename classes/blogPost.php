<?php

/**
   * File defines the class for creating Blog Post objects that contain
   * the id, title, content, word counter and date created.
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
   * Class for creating a Blog Post
   *
   * Blog Posts will consist of the blog Id, the title of Blog, the
   * content of blog post, the word counter and the
   * date the blog was created which is populated on creation of a BlogPost object.
   *
   * @category   CategoryName
   * @package    PackageName
   * @author     Sofiya Antonyuk <santonyuk2@mail.greenriver.edu>
   * @copyright  2017
   * @version    1.0
   */

class BlogPost {
	//{{{ properties 
	private $_blog_id;
	private $_title;
	private $_content;
	private $_word_counter;
	private $_date_created;
	//}}}
	
	//{{{ __construct()
	/**
     * Constructor for the BlogPost Class.
     *
     * @param int     $blogId     Blog Id Post in database
     * @param string  $title      Blog title
     * @param string  $content	  The blog content
     * @param string  $datePosted Date when blog post created
     *
     * @access public
     */
	public function __construct($blogId = 0, $title="", $content="",$dateCreated="") {
		$this->_id = $blogId;
		$this->_title = $title;
		$this->_content = $content;
		$this->_date_created = $dateCreated;
		$this->_word_counter = str_word_count($content);
	}
	//}}}
	
	//{{{ getBlogId()
    /**
     * Getter for the Blog Id number.
     *
     @return int  The blog Id in database
     @access public
     */
	public function getBlogId() {
		return $this->_blogId;
	}
	//}}}
	
	//{{{ getTitle()
    /**
     *  Getter for the title.
     *  
     * @return string  Blog title
     * @access public
     */
	public function getTitle() {
		return $this->_title;
	}
	//}}}
	
	//{{{ setTitle()
    /**
     * Setter for the title.
     *
     * @param string  $title for new title
     * @access public
     */
	public function setTitle($title) {
		$this->_title = $title;
	}
	//}}}
	
	//{{{ getContent()
    /**
     * Getter for the blog content
     *
     * @return  string  the blog's content
     * @access public
     */ 
	public function getContent() {
		return $this->_content;
	}
	//}}}
	
	//{{{ setContent()
    
    /**
     * Setter for the blog content
     *
     * @param  string  $content  New content for blog post
     * @access public
     */
	public function setContent($content) {
		$this->_content = $content;
	}
	
	//{{{ getWordCounter
    
    /**
     * Getter for Word Counter.
     *
     @return  int returns the words counted in the blog post
     @access public
     */
	public function getWordCounter() {
		return $counter;
	}
	//}}}
	
	//{{{ getDateCreated()
    
    /**
     * Getter for the date blog was created.
     *
     * @return  string  Date created
     * @access public
     */
	public function getDateCreated() {
		return $this->_date_created;
	}
	//}}}
	
	//{{{ setDateCreated()
    
    /**
     * Setter for the date blog was created.
     *
     * @param string  $dateCreated   New date created.
     * @access public
     */
	public function setDateCreated($date) {
		$this->_date_created = $date;
	}
}

?>
<?php
/**
   * Provides CRUD access to Blogs
   *
   * PHP version 5
   *
   * Table creation for sql query:
   *
   * @category   CategoryName
   * @package    PackageName
   * @author     Sofiya Antonyuk<santonyuk2@mail.greenriver.edu>
   * @copyright  2017
   * @version    1.0
   */

//Connect to DB
class BlogsDB
{
	/**
     * PHP Data Object
     */
	private $_pdo;
	
	// {{{ __construct()
    /**
     * Constructor for the BlogsDB Class
     *
     * @access public
     */
	function __construct()
	{
		//Require config file may need to change to absolute path in future
		require_once("../../../blogsconfig.php");
		try
		{
			//Establish DB connection
			$this->_pdo = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            
			//Keep connection open for reuse to improve performance
			$this->_pdo->setAttribute(PDO::ATTR_PERSISTENT, true);
			
			//Throw an exception whenever a DB error occurs
            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         }
         catch(PDOException $e)
		 {
             die("Error!: ". $e->getMessage());
         } 	
	}
	//}}}

	//{{{ getDBContents()    
    /**
     * Retrieve the bloggers from the database with
     * most recent posting date order
     *
     * @return Array  Returns all the bloggers from the database with
     * most recent posting date order
     * @access public
     */
	public function getContents()
	{
		//create query
		$query = "SELECT * FROM blogger ORDER BY mostRecent DESC";
           
		//prepare statement
		$statement = $this->_pdo->prepare($query);
		
		//bind param
		
		//execute
		$statement->execute();
		
		//retrieve results
		$results = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		
		//Return ID of inserted row
		 return $results;
	 }
	 //}}}
	 
	 //{{{ getUserByUsername()
    /**
     * Gets user from user DB
     *
     * 
     * @param   string    $username    the username to search the database for
     */
	public function getUserByUsername($username)
	{
		//create query
		$query = "SELECT id FROM users WHERE username = :username";
		
		//prepare statement
		$statement = $this->_pdo->prepare($query);
		
		//bind parameter
		$statement->bindValue(':username', $username, PDO::PARAM_STR);
		
		//bind param
		
		//execute
		$statement->execute();
		
		//retrieve results
		$results = $statement->fetch(PDO::FETCH_ASSOC);
		
		//create query
		$query = "SELECT * FROM blogger WHERE id = :id";
           
		//prepare statement
		$statement = $this->_pdo->prepare($query);
		
		//bind parameter
		$statement->bindValue(':id', $results['id'], PDO::PARAM_STR);
		//execute
		
		$statement->execute();
		
		//retrieve results
		$results = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		return $results;
	}
	//}}}
	
	//{{{ verifyUsername()
    
    /**
     * Check that the username is not blank or NULL. If username is blank or null,
     * return an array with the username.
     *
     * Then check if the username equals one in the database. If this check returns true,
     * return an array with the username.
     *
     * @param   string    $username    the username to search the database for
     * @param 	string	$password	the password
     * @access public
     */
	public function verifyUser($username, $password)
	{
		//create query
		$query = "SELECT * FROM users";
           
		//prepare statement
		$statement = $this->_pdo->prepare($query);
		
		//bind param
		
		//execute
		$statement->execute();
		
		//retrieve results
		$results = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		//loop through all the results and compare
		$found = false;
		
		foreach($results as $row)
		{
			if ($username == $row['username'])
			{
				if ($password == $row['password'])
				{
					$found = true;
					break;
				}
				break;
			}
		}
		if ($found = false)
		{
			return array(false, "Location: http://sofiya.greenrivertech.net/328/Blogs/signin");
		}
		return array(true, "Location: http://sofiya.greenrivertech.net/328/Blogs/user-blogs");
	}
	
	//{{{ createUser()
    /**
     * Adds a new user to the users table and inserts a new Blogger into
     * bloggers table
     *
     * @param  Blogger   $newUser      Blogger object with the necessary data
     * @param  string    $email        Email address for the user
     * @param  string    $password     password
     * @return int       The ID created by the database for the new Blogger
     * @access public
     */
	public function createUser($newUser, $email, $password)
	{
		
		
		//create query
		$query = "INSERT INTO users
					(username, email, password)
					VALUES
					(:username, :email, :password)";
           
		//prepare statement
		$statement = $this->_pdo->prepare($query);
		
		//bind param
		$statement->bindValue(':username', $newUser->getUsername(), PDO::PARAM_STR);
		$statement->bindValue(':email', $email, PDO::PARAM_STR);
		$statement->bindValue(':password', $password, PDO::PARAM_STR);
		
		//execute
		$statement->execute();
		
		//get the id of the last entry
		$id = $this->_pdo->lastInsertId();
		
		//create query
		$query = "INSERT INTO blogger
					(id, username, mostRecent, bio, portrait, blogCounter)
					VALUES
					(:id, :username, :mostRecent, :bio, :portrait, :blogCounter)";
           
		//prepare statement
		$statement = $this->_pdo->prepare($query);
		
		//bind param
		$statement->bindValue(':id', $id, PDO::PARAM_INT);
		$statement->bindValue(':username', $newUser->getUsername(), PDO::PARAM_STR);
		$statement->bindValue(':mostRecent', $newUser->getMostRecent(), PDO::PARAM_STR);
		$statement->bindValue(':bio', $newUser->getBio(), PDO::PARAM_STR);
		$statement->bindValue(':portrait', $newUser->getPortrait(), PDO::PARAM_STR);
		$statement->bindValue(':blogCounter', $newUser->getBlogCounter(), PDO::PARAM_INT);
		
		//execute
		$statement->execute();
	}
	//}}}
	
	//{{{ getMostRecentPost
    /**
     * Get most recent post
     *
     * @param     int     $user      The BlogPost's Id
     * @return    Array   			Most recent post
     * @access public
     */ 
	public function getMostRecentPost($user)
	{
		//query
		$query = "SELECT blogpost.postId, title, content, dateCreated FROM blogpost
			JOIN blogger_to_blogpost_junct
				ON blogpost.postId = blogger_to_blogpost_junct.postId
				WHERE id = :id ORDER BY postId DESC LIMIT 1";
		
		//prepare statement
		$statement = $this->_pdo->prepare($query);
		
		//bind parameters
		$statement->bindValue(':id', $user->getBloggerId(), PDO::PARAM_INT);
		
		//execute
		$statement->execute();
		
		//retrieve results
		$results = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		return $results;
	}
	//}}}
}

<?php
/*
 * Sofiya Antonyuk
 * IT 328
 * Blogs Website
 * http://sofiya.greenrivertech.net/328/Blogs
 */

/**
*CREATE TABLE `Members`
*   ( `member_id` INT NOT NULL AUTO_INCREMENT , `fname` TEXT NOT NULL ,
*    `lname` TEXT NOT NULL , `age` TINYINT NOT NULL ,
*    `gender` TEXT , `phone` VARCHAR(14),
*    `email` VARCHAR(30), `state` TEXT, `seeking` TEXT,
*    `bio` VARCHAR(255), `premium` TINYINT(1) NOT NULL , `image` VARCHAR(100),
*    `interests` VARCHAR(255), PRIMARY KEY (`member_id`) ) ENGINE = MyISAM;
*
*    Class provides access to member names in our database
*    @author Sofiya Antonyuk <santonyuk2@mail.greenriver.edu>
*    @version 1.0
*    @copyright 2017
*/

//Connect to DB
class BlogsDB
{
	private $_pdo;
	
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
	
	public function createUser($newUser, $email, $password)
	{
		
		echo "<pre>";
		var_dump($newUser);
		echo "</pre>";
		
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
}

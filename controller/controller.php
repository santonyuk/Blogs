<?php

// Require autoload file
require_once('vendor/autoload.php');

session_start();

// Create an instance of the base class
$f3 = Base::instance();

//Set debug level
$f3->set('DEBUG', 3);

// Default route
$blogsDB = new BlogsDB();

//include("../include/nav.html");

$f3->route('GET /',
	function($f3) {
		$contents = $GLOBALS['blogsDB']->getContents();
		$bloggers = array();
		
		
		foreach($contents as $key)
		{
			$blogger = new Blogger($key['id'], $key['username'], $key['portrait'],
								   $key['bio'], $key['blogCounter']);
			
			array_push($bloggers, $blogger);
			
			$mostRecent = $GLOBALS['blogsDB']->getMostRecentPost($blogger);
			
			if($mostRecent == null) {
				$blogger->setMostRecent("No posts yet.");
			}
			else {
				$blogger->setMostRecent($mostRecent[0]['content']);
			}
		}
		
		$f3->set('content', $bloggers);
		
		echo Template::instance()->render('pages/home.html');
	});

$f3->route('GET /about',
	function() {
		$view = new View;
		echo $view->render('pages/about.html');
	});

$f3->route('GET /user-blogs',
	function($f3) {
		$f3->set('user', $_SESSION['user']);
		
		echo Template::instance()->render('pages/user-blogs.html');
	});

$f3->route('GET /signin',
	function() {
		
		echo Template::instance()->render('pages/signin.html');
	});

$f3->route('POST /verify-user',
	function(){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password = sha1($password);
		
		$results = $GLOBALS['blogsDB']->verifyUser($username, $password);
		$route = $results[1];
		
		if ($results[0])
		{
			$userData = $GLOBALS['blogsDB']->getUserByUsername($username);
			$blogger = new Blogger($userData[0]['id'], $userData[0]['username'], $userData[0]['portrait'],
								   $userData[0]['bio'], $userData[0]['blogCounter'], $userData[0]['mostRecent']);
			$_SESSION['user'] = $blogger;
		}
		
		header("$route");
	});

$f3->route('POST /',
	function() {
		$view = new View;
		echo $view->render('pages/signin.html');
	});
	
$f3->route('GET /signup',
	function() {
		
		echo Template::instance()->render('pages/signup.html');
	});

$f3->route('POST /create-user',
	function() {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$verify = $_POST['verify'];
		$portrait = $_POST['portrait'];
		$bio = $_POST['bio'];
		
		if($password == $verify)
		{
			$password = sha1($password);
			$newUser = new Blogger(0, $username, $portrait, $bio, 0, "0000-00-00");
			$GLOBALS['blogsDB']->createUser($newUser, $email, $password);
			$route = "Location: http://sofiya.greenrivertech.net/328/Blogs/user-blogs";
		}
		else{
			$route = "Location: http://sofiya.greenrivertech.net/328/Blogs/";
		}
		
		header("$route");
	});

$f3->route('POST /',
	function() {
		$view = new View;
		echo $view->render('pages/signup.html');
	});
	

$f3->run();
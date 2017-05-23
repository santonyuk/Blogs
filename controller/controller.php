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
			$blogger = new Blogger(0, $key['username'],
								   $key['name'], $key['portrait'],
								   $key['bio'], $key['blogCounter']);
			
			array_push($bloggers, $blogger);
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
	function() {
		
		
		echo Template::instance()->render('pages/user-blogs.html');
	});

$f3->route('GET /signin',
	function() {
		
		echo Template::instance()->render('pages/signin.html');
	});

$f3->route('POST /verify-user',
	function(){
		
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
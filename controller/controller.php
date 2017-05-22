<?php

// Require autoload file
require_once('vendor/autoload.php');

session_start();

// Create an instance of the base class
$f3 = Base::instance();

//Set debug level
$f3->set('DEBUG', 3);

// Default route
//$blogsDB = new BlogsDB();

//include("../include/nav.html");

$f3->route('GET /',
	function() {
		$view = new View;
		echo $view->render('pages/home.html');
	});
$f3->route('GET /about',
	function() {
		$view = new View;
		echo $view->render('pages/about.html');
	});

$f3->route('POST /',
	function() {
		$view = new View;
		echo $view->render('pages/about.html');
	});

$f3->route('GET /signin',
	function() {
		$view = new View;
		echo $view->render('pages/signin.html');
	});

$f3->route('POST /',
	function() {
		$view = new View;
		echo $view->render('pages/signin.html');
	});
	
$f3->route('GET /signup',
	function() {
		$view = new View;
		echo $view->render('pages/signup.html');
	});

$f3->route('POST /',
	function() {
		$view = new View;
		echo $view->render('pages/signup.html');
	});
	

$f3->run();
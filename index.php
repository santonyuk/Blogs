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

$f3->run();


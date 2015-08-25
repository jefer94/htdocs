<?php 
	// loader
	require_once 'lib/Twig/lib/Twig/Autoloader.php';
	Twig_Autoloader::register();

	$view = new Twig_Loader_Filesystem('view/');
	$twig = new Twig_Environment($view);
?>
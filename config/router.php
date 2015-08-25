<?php 
	// path of url
	$router=$_SERVER["REQUEST_URI"];

	// load models after of $router, for know $router
	require_once 'config/models.php';

	switch ($router) {
		case '/': // path of url
			require_once "controller/index.php"; // controller listening
		break;

		case '/login': // path of url
			require_once "controller/login.php"; // controller listening
		break;

		case '/logout': // path of url
			require_once "controller/logout.php"; // controller listening
		break;

		case '/ad/new': // path of url
			require_once "controller/new.php"; // controller listening
		break;

		default:
			if (ereg("^/ad/[0-9]{1,11}$", $router)) { // path with parameter
				require_once "controller/ad.php"; // controller listening
			}
			else
				require_once "controller/404.php"; // controller listening
		break;
	}
?>
<?php 
	if (isset($_SESSION["user"])) {
		if (isset($comments)) 
			echo $twig->render('index.html.twig', Array('ads' => $ads->get_array(),
							   'user' => $_SESSION["user"]));
		else {
			echo $twig->render('index.html.twig', Array('user' => $_SESSION["user"]));
		}
	}
	else {
		if (isset($comments)) 
			echo $twig->render('index.html.twig', Array('ads' => $ads->get_array()));
		else {
			echo $twig->render('index.html.twig');
		}
	}
?>
<?php 
	
	if (isset($_SESSION["user"])) {
		echo $twig->render('new.html.twig', Array('user' => $_SESSION["user"]));
	}
	else {
		header("location: /");
	}
?>
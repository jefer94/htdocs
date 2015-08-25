<?php 
	if (isset($_SESSION["user"])) echo $twig->render('login.html.twig', Array('user' => $_SESSION["user"]));
	else echo $twig->render('login.html.twig');
	
?>
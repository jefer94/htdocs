<?php 
	$user= ['name' => 'Jeferson De Freitas', 'username' => 'jefer94'];
	echo $twig->render('404.html.twig', Array('user' => $user));
?>
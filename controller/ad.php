<?php 
	if (isset($_SESSION["user"])) {
		if (isset($comments)) 
			echo $twig->render('ad.html.twig', Array('ads' => $ads->view(iconv_substr( $router , 4, 11,'utf-8' )),
													 'comments' => $comments->get_array(iconv_substr( $router , 4, 11,'utf-8' )),
													 'user' => $_SESSION["user"],
													 'ref' => iconv_substr( $router , 4, 11,'utf-8' )));
		else {
			echo $twig->render('ad.html.twig', Array('ads' => $ads->view(iconv_substr( $router , 4, 11,'utf-8' )),
													 'user' => $_SESSION["user"],
													 'ref' => iconv_substr( $router , 4, 11,'utf-8' )));
		}
	}
	else {
		if (isset($comments)) 
			echo $twig->render('ad.html.twig', Array('ads' => $ads->view(iconv_substr( $router , 4, 11,'utf-8' )),
													 'comments' => $comments->get_array(iconv_substr( $router , 4, 11,'utf-8' )),
													 'ref' => iconv_substr( $router , 4, 11,'utf-8' )));
		else {
			echo $twig->render('ad.html.twig', Array('ads' => $ads->view(iconv_substr( $router , 4, 11,'utf-8' )),
													 'ref' => iconv_substr( $router , 4, 11,'utf-8' )));
		}
	}
?>
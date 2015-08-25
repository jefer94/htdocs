<?php 
	// load models only once
	require_once "model/db.php"; 
	DB::init();

	require_once "model/users.php"; 
	$users=new Users;

	require_once "model/ads.php"; 
	$ads=new Ads;

	require_once "model/comments.php"; 
	$comments=new Comments;
?>
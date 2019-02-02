<?php
	session_start();
	include_once("auth.php");
	root_toggle($_GET['login']);
	header('Location: ../../admin.php');
?>
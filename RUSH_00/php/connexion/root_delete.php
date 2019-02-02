<?php
	session_start();
	include_once("auth.php");
	root_delete_acc($_GET['login']);
	header('Location: ../../admin.php');
?>
<?php

$AT_FILE = "passwd";
$AT_PATH = "../private/";
$FAILURE = "ERROR\n";
$SUCCESS = "OK\n";

function c_request()
{
	if (isset($_POST["submit"]) && $_POST["submit"] === "OK"
		&& isset($_POST["login"]) && !empty($_POST["login"])
		&& isset($_POST["oldpw"]) && !empty($_POST["oldpw"])
		&& isset($_POST["newpw"]) && !empty($_POST["newpw"]))
		return (true);
	else
		return (false);
}
?>

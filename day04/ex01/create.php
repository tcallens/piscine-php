<?php
$AT_PATH = "../private/";
$AT_FILE = "passwd";
$FAILURE = "ERROR\n";
$SUCCESS = "OK\n";

function c_request()
{
	if (isset($_POST["submit"]) && $_POST["submit"] === "OK"
		&& isset($_POST["login"]) && !empty($_POST["login"])
		&& isset($_POST["passwd"]) && !empty($_POST["passwd"]))
		return (true);
	else
		return (false);
}

function at_init($path, $file)
{
	if (!file_exists($path))
		mkdir($path);
	if (!file_exists($path . $file))
		file_put_contents($path . $file, null);
}

function c_login($at, $login)
{
	if ($at)
		foreach($at as $user)
			if ($user["login"] === $login)
				return (false);
	return (true);
}

function a_new($at, $file, $post)
{
	$hash = hash("whirlpool", $post["passwd"]);
	$new = array("login" => $post["login"], "passwd" => $hash);
	$at[] = $new;
	if (file_put_contents($file, serialize($at)) === false)
		return (false);
	return (true);
}

if (c_request() === true)
{
	at_init($AT_PATH, $AT_FILE);
	$at = unserialize(file_get_contents($AT_PATH . $AT_FILE));
	if (c_login($at, $_POST["login"]) === false)
		exit ($FAILURE);
	if (a_new($at, $AT_PATH . $AT_FILE, $_POST) === false)
		exit ($FAILURE);
	exit($SUCCESS);
}
else
	exit($FAILURE);
?>

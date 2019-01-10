<?php
if (isset($_GET["action"]))
{
	if ($_GET["action"] === "set")
		if (!empty($_GET["name"]) && !empty($_GET["value"]))
			setcookie($_GET["name"], $_GET["value"]);
	if ($_GET["action"] === "get")
		if (!empty($_GET["name"]))
			echo $_COOKIE[$_GET["name"]]."\n";
	if ($_GET["action"] === "del")
		if (!empty($_GET["name"]))
			setcookie($_GET["name"], "", time() - 3600);
}
?>

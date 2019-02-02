<?php
if (!isset($_SESSION))
	session_start();
if (isset($_POST["id"]) && is_numeric($_POST["id"]))
{
	if(isset($_SESSION["cart"])) {
		foreach ($_SESSION["cart"] as $key => $value)
		{
			if ($value["id"] === $_POST["id"])
			{
				unset($_SESSION["cart"][$key]);
			}
		}
	}
}
?>

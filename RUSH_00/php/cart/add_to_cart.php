<?php
session_start();
function id_exist()
{
	$tmp = $_SESSION["cart"];
	if ($_SESSION["cart"])
	{
		foreach ($_SESSION["cart"] as $key => $value)
		{
			if ($value["id"] === $_POST["id"])
				return (true);
		}
	}
	return (false);
}	
if (is_numeric($_POST["id"]) && isset($_POST["submit"]))
{
	$tmp = $_SESSION["cart"];
	if (id_exist() === true)
	{
		foreach ($_SESSION["cart"] as $key => $value)
		{
			if ($value["id"] === $_POST["id"])
				$_SESSION["cart"][$key]["quantity"] = $value["quantity"] + 1;
		}
	}
	else
	{
		$new_article = array("id" => $_POST["id"], "quantity" => 1);
		$_SESSION["cart"][] = $new_article;
	}
}
?>

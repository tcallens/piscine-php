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

function modifPassword($db, $path, $req)
{
	if ($db)
	{
		foreach ($db as $k => $v)
		{
			if ($db[$k]["login"] === $req["login"])
			{
				$oldpw_hash = hash("whirlpool", $req["oldpw"]);
				if ($db[$k]["passwd"] === $oldpw_hash)
				{
					$newpw_hash = hash("whirlpool", $req["newpw"]);
					$db[$k]["passwd"] = $newpw_hash;
					if (file_put_contents($path, serialize($db)) === false)
						return (false);
					return (true);
				}
				else
					return (false);
			}
		}
	}
	return (false);
}
if (c_request() == true)
{
	$db = unserialize(file_get_contents($DB_PATH.$DB_FILE));
	if (modifPassword($db, $DB_PATH.$DB_FILE, $_POST) === false)
		exit($FAILURE);
	exit($SUCCESS);
}
else
	exit($FAILURE);
?>

<?php
session_start();
if (isset($_GET["login"]) && isset($_GET["passwd"])
	&& isset($_GET["submit"]) && $_GET["submit"] === "OK")
{
	$_SESSION["login"] = $_GET["login"];
	$_SESSIO["passwd"] = $_GET["passwd"];
}
?>
<html><body>
	<form action="index.php" method="GET">
		Identifiant: <input type="text" name="login" value="<?php echo $_SESSION["login"]; ?>" /><br />
		Mot de passe: <input type="password" name="passwd" value="<?php echo $_SESSION["passwd"]; ?>" /><br />
		<input type="submit" name="submit" value="OK" />
	</form>
</body></html>

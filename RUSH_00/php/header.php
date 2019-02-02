<?php
	session_start();
	include_once("connexion/auth.php");
?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Mister Sandman</title>
	<link rel="icon" href="/img/icon.png">
	<link rel="stylesheet" href="/css/index.css" type="text/css" media="screen">
</head>
<body>
	<header>
<ul>
		<li><a href="/php/sources/home.php">Home</a></li>
		<li class="dropdown">
			<a href="/php/sources/dreams.php" class="dropbtn">Dreams</a>
		</li>
		<li class="dropdown">
			<a href="/php/sources/nightmares.php" class="dropbtn">Nightmares</a>
		</li>
		<li class="dropdown">
			<a href="/php/sources/merchandise.php" class="dropbtn">Merchandise</a>
		<li><a href="/php/sources/contact.php">Contact</a></li>
<?php
if ($_SESSION['loggued_on_user'] === "" || !isset($_SESSION["loggued_on_user"])) {
?>
	<li class="dropdown" style="float:right">
		<a href="/php/connexion/signup.php">Sign Up</a>

		<li class="dropdown" style="float:right">
		<a href="/php/connexion/signin.php">Sign In</a>
<?php
} else {
	if (is_admin($_SESSION['loggued_on_user'] )){
		?>
		<li class="dropdown" style="float:right">
		<a href="../../admin.php">Admin</a>
<?php
	}
?>
	<li class="dropdown" style="float:right">
		<a href="/php/connexion/logout.php">Logout</a>
	<li class="dropdown" style="float:right">
		<a href="/php/connexion/edit.php">Hello <?php echo $_SESSION['loggued_on_user'];?> </a>
<?php
}
?>
		<li class="dropdown" style="float:right">
			<a href="/php/cart/cart.php">Cart</a>
			<div class="dropdown-content">
			<a href="/php/cart/cart.php">
<?php
$item = 0;
if (!empty($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $key => $value) {
        $item = $item + $value["quantity"];
	}
}
echo $item;
?>
	items</a>
		</li>
</ul>
<div class='copyright'><p>Mister Sandman's E-Shop</p></div>
</header>

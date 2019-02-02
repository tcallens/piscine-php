<?php
session_start();
include_once "delete_from_cart.php";
include_once "../header.php";
include_once "../../data_base/db_lib.php";
function get_product($id) {
	$products = db_get('../../data_base/article.json');
	foreach($products as $product) {
		if ($product["id"] === $id)
			return($product);
	}
	return null;
}
?>
<html>
	<head>
	  <link rel="stylesheet" type="text/css" href="../css/cart.css">
	</head>
	<body>
<?php
	if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) {
		$total = 0;
		foreach($_SESSION["cart"] as $key => $value) {
			$product = get_product($_SESSION["cart"][$key]["id"]);
			$total += $_SESSION["cart"][$key]["quantity"] * $product["price"];
?>
<div class="container1">
	<h1 class="title"><?=$product["name"]?></h1>
	<hr>
	<div class="product"><img src="<?= $product["img_url"] ?>"/></div>
	<hr>
		<div class='cta'>
			<div class="price"><?=$_SESSION["cart"][$key]["quantity"]?>x</div>
	<form action="#" method="post">
			<input type="hidden" name="id" value="<?= $product["id"] ?>">
			<input type="submit" class="button" name="submit" value="DELETE FROM CART">
	</form>
	
		</div>
	</div>
</div>

<?php
		}
		echo '<br/></br><center><h1>Total: ' . $total . '$ USD</h1></center>';
?>
	<center><form action='checkout.php' method='post'>
			<input type='submit' class='button' name='checkout' value='CHECKOUT'>
		</form> </center>
<?php
	}
	else
		echo "<br/></br><h1 align='center'>Your cart is empty :/<h1>";
?>

<?php
	include_once "../footer.php";
?>

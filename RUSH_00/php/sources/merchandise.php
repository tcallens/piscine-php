<?php
session_start();
include_once "../cart/add_to_cart.php";
include_once "../../data_base/db_lib.php";
include_once "../header.php";
?>
<div class='products-container'>
<?php
$products = db_get("../../data_base/article.json");
foreach ($products as $product) {
	if ($product["category"] == "merchandise")
	{
?>
<div class="container1">
	<h1 class="title"><?=$product["name"]?></h1>
	<hr>
	<div class="product"><img src="<?=$product["img_url"]?>"/></div>
	<hr>
		<div class='cta'>
			<div class="price"><?=$product["price"]?>$</div>
	<form action="#" method="post">
			<input type="hidden" name="id" value="<?=$product["id"]?>">
			<input type="submit" class="button" name="submit" value="ADD TO CART">
	</form>
		</div>
	</div>
</div>

<?php
	}
}
?>
</div>
<?php
include_once "../footer.php";
?>

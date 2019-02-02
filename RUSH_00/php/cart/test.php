<html>
	<body>
		<form action='add_to_cart.php' method='post'>
			add something
			<input type='text' name='ID'>
			<input type='text' name='quantity'>
			<input type='submit' name='SUBMIT' value='ADD TO CART'>
		</form>
	<body>
		<form action='delete_from_cart.php' method='post'>
			delete something
			<input type='text' name='ID'>
			<input type='submit' name='SUBMIT' value='DELETE FROM CART'>
		</form>

	<?php 
		session_start();
		print_r($_SESSION["cart"]);
	?>
	</body>
</html>

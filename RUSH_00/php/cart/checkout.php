<?php
	session_start();
	$_SESSION['checkout'] = "yoyo";
	if (!isset($_SESSION['loggued_on_user']))
		header('Location: ../connexion/signin.php');
	else
		include_once "../header.php";
?>
<div class="yolo"><h3>Thank you.</h3></div>
<div class="yolo"><h3>Your order has been placed.</h3></div>
<div><form action="../sources/home.php" method="post">
	<input type="submit" class="button2" name="submit" value="Return to Home Page">
</form></div>
<?php include_once "../footer.php"; ?>
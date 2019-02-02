<?php
	include ('auth.php');
	session_start();
	$error_msg = "";
	if ($_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === "OK")
	{
		echo $_SESSION['loggued_on_user'].$_POST['passwd'].PHP_EOL;
		if (delete_account($_SESSION['loggued_on_user'], $_POST['passwd']))
		{
			$error_msg = "Account delete".PHP_EOL;
			header('Location: logout.php');
		}
		else
			$error_msg = "Unable to delete the account (wrong password)".PHP_EOL;
	}
	include_once "../header.php";
?>
<html><body>
    <form method="POST" action="delete.php">
           <div class="container1">
               <h1 class="title">Delete Account</h1>
			   <?php echo $error_msg ?>
                <hr>
				<input type="password" placeholder="Enter Password" name="passwd" required>
                <hr>
               <p><a href="/php/connexion/edit.php">Come back to edit profile</a></p>
                <button type="submit" class="registerbtn" name="submit" value="OK">OK</button>
           </div>
      </form>
</body></html>
<?php include_once "../footer.php";?>
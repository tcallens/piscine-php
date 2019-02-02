<?php
	include ('auth.php');
	session_start();
	$error_msg = "";
	if ($_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] === "OK")
	{
		if (change_passwd($_SESSION['loggued_on_user'], $_POST['oldpw'], $_POST['newpw']) == TRUE)
		{
			$error_msg = "Password change".PHP_EOL;
			header('Location: ../../index.php');
		}
		else
			$error_msg = "Error".PHP_EOL;
	}
	include_once "../header.php";
?>
<html><body>
    <form method="POST" action="edit.php">
           <div class="container1">
               <h1 class="title">Edit Profile</h1>
			   <?php echo $error_msg ?>
                <hr>
               <input type="password" placeholder="Enter Old Password" name="oldpw" required>
                <input type="password" placeholder="Enter New Password" name="newpw" required>
                <hr>
				<p><a href="/php/connexion/delete.php">Delete account here</a></p>
                <button type="submit" class="registerbtn" name="submit" value="OK">OK</button>
           </div>
      </form>
</body></html>
<?php include_once "../footer.php"; ?>
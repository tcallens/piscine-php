<?php
	include ('auth.php');
	session_start();
	$error_msg = "";
	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === "OK")
	{
		$login = $_POST['login'];
		$passwd = $_POST['passwd'];
		if (login_used($login))
			$error_msg = "Login is already used".PHP_EOL;
		else
		{
			if (create_account($login, $passwd))
			{
				$error_msg = "Account created".PHP_EOL;
				$_SESSION['loggued_on_user'] = $_POST['login'];
				header('Location: ../../index.php');
			}
			else
				$error_msg = "Error during account creation".PHP_EOL;
		}
	}
?>
<?php
include_once "../header.php";
?>
<html><body>
    <form method="POST" action="signup.php">
           <div class="container1">
               <h1 class="title">Sign Up</h1>
			   <h4><?php echo $error_msg ?> </h4>
                <hr>
               <input type="text" placeholder="Enter Login" name="login" required>
                <input type="password" placeholder="Enter Password" name="passwd" required>
                <hr>
               <p><a href="/php/connexion/signin.php">Already have an account ?</a></p>
                <button type="submit" class="registerbtn" name="submit" value="OK">OK</button>
           </div>
      </form>
</body></html>
<?php
include_once "../footer.php";
?>

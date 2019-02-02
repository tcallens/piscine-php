<?php
    include 'auth.php';
    session_start();
    $error_msg = "";
    if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === "OK")
    {
        if (auth($_POST['login'], $_POST['passwd']) == true)
        {
            $error_msg = "Login success" . PHP_EOL;
            $_SESSION['loggued_on_user'] = $_POST['login'];
            if ($_SESSION['checkout'] === "yoyo")
                header('Location: ../cart/checkout.php');
            else
                header('Location: ../../index.php');
        }
        else
        {
            $error_msg = "Wrong password" . PHP_EOL;
            $_SESSION['loggued_on_user'] = "";
        }
    }
    include_once "../header.php";
?>
<html><body>
    <form method="POST" action="signin.php">
           <div class="container1">
               <h1 class="title">Sign In</h1>
			   <h4><?php echo $error_msg ?> </h4>
                <hr>
               <input type="text" placeholder="Enter Login" name="login" required>
                <input type="password" placeholder="Enter Password" name="passwd" required>
                <hr>
               <p><a href="/php/connexion/signup.php">Create an account here</a></p>
                <button type="submit" class="registerbtn" name="submit" value="OK">OK</button>
           </div>
    </form>
</body></html>
<?php include_once "../footer.php";?>
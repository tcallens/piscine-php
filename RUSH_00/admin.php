<?php
    include_once("php/connexion/auth.php");
    session_start();
    if (is_admin($_SESSION['loggued_on_user']))
        echo "Hello".$_SESSION['loggued_on_user'];
    else
        header('Location: ../../index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        table   {border-collapse: collapse;}
        td      {border: 1px solid black;}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    <h1>main page</h1>
    <h2>Users</h2>
    <?php user_list() ?>
    <h2>Orders</h2>
    <h2>Data</h2>
    <form action="../php/info.php">
        <input type="submit" value="php_info" />
    </form>
    <form action="../php/dump.php">
        <input type="submit" value="Dump" />
    </form>
</body>
</html>
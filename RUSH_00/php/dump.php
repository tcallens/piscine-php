<?php
	session_start();
	echo "The user is : ".$_SESSION['loggued_on_user'].PHP_EOL;
	$pass_file  = '../private/passwd';
	$accounts = unserialize(file_get_contents($pass_file));
	if ($accounts) {
		foreach ($accounts as $val) {
			print_r($val);
			echo PHP_EOL;
		}
	}
?>
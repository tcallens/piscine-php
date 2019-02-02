<?php
	function root_create()
	{
		$login = "root";
		$passwd = "root";
		$pass_file = './private/passwd';
		if (!file_exists('./private'))
			mkdir('./private', 0777, true);
		$accounts[] = [
				"login" => $login,
				"passwd" => hash('sha256', $passwd, false),
				"order" => 0,
				"admin" => 1
			];
			file_put_contents($pass_file, serialize($accounts));
	}
	root_create();
?>
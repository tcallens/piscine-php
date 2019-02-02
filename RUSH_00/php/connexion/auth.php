<?php
	function login_used($login)
	{
		$pass_file = $_SERVER["DOCUMENT_ROOT"].'/private/passwd';
		if (!file_exists($_SERVER["DOCUMENT_ROOT"].'/private'))
			mkdir($_SERVER["DOCUMENT_ROOT"].'/private', 0777, true);
		$accounts = unserialize(file_get_contents($pass_file));
		if ($accounts)
		{
			foreach ($accounts as $val)
			{
				if ($val['login'] === $login)
					return (TRUE);
			}
		}
		return (FALSE);
	}
	function auth($login, $passwd)
	{
		$pass_file = $_SERVER["DOCUMENT_ROOT"].'/private/passwd';
		if (!file_exists($_SERVER["DOCUMENT_ROOT"].'/private'))
			mkdir($_SERVER["DOCUMENT_ROOT"].'/private', 0777, true);
		$pass_hash = hash('sha256', $passwd, false);
		$accounts = unserialize(file_get_contents($pass_file));
		if ($accounts)
		{
			foreach ($accounts as $val)
			{
				if ($val['login'] === $login && $val['passwd'] === $pass_hash)
					return (TRUE);
			}
		}
		return (FALSE);
	}
	function create_account($login, $passwd)
	{
		$pass_file = $_SERVER["DOCUMENT_ROOT"].'/private/passwd';
		if (!file_exists($_SERVER["DOCUMENT_ROOT"].'/private'))
			mkdir($_SERVER["DOCUMENT_ROOT"].'/private', 0777, true);
		if ($login === "" || $passwd === "" || login_used($login))
			return (FALSE);
		else
		{
			$accounts = unserialize(file_get_contents($pass_file));
			$accounts[] = [
				"login" => $login,
				"passwd" => hash('sha256', $passwd, false),
				"order" => 0,
				"admin" => 0
			];
			file_put_contents($pass_file, serialize($accounts));
			return (TRUE);
		}
	}
	function change_passwd($login, $oldpw, $newpw)
	{
		$idx = 0;
		$pass_file = $_SERVER["DOCUMENT_ROOT"].'/private/passwd';
		if (!file_exists($_SERVER["DOCUMENT_ROOT"].'/private'))
			mkdir($_SERVER["DOCUMENT_ROOT"].'/private', 0777, true);
		if ($oldpw === "" || $newpw === "" || $oldpw === $newpw)
			return (FALSE);
		else {
			if (auth($login, $oldpw))
			{
				$newhash = hash('sha256', $newpw, false);
				$accounts = unserialize(file_get_contents($pass_file));
				foreach ($accounts as $val)
				{
					if ($val['login'] === $login)
					{
						$accounts[$idx]['passwd'] = $newhash;
						file_put_contents($pass_file, serialize($accounts));
						return (TRUE);
					}
					$idx++;
				}
			}
			else
				return (FALSE);
		}
	}
	function delete_account($login, $passwd)
	{
		$idx = 0;
		$pass_file = $_SERVER["DOCUMENT_ROOT"].'/private/passwd';
		if (!file_exists($_SERVER["DOCUMENT_ROOT"].'/private'))
			mkdir($_SERVER["DOCUMENT_ROOT"].'/private', 0777, true);
		if ($passwd === "")
			return (FALSE);
		else
		{
			if (auth($login, $passwd))
			{
				$accounts = unserialize(file_get_contents($pass_file));
				foreach ($accounts as $val)
				{
					if ($val['login'] === $login)
					{
						array_splice($accounts, $idx, 1);
						file_put_contents($pass_file, serialize($accounts));
						return (TRUE);
					}
					$idx++;
				}
			}
			else
				return (FALSE);
		}
	}
	function user_list()
	{
		echo "<table>";
		$pass_file = $_SERVER["DOCUMENT_ROOT"].'/private/passwd';
		if (!file_exists($_SERVER["DOCUMENT_ROOT"].'/private'))
			mkdir($_SERVER["DOCUMENT_ROOT"].'/private', 0777, true);
		echo "<tr><td>Login</td><td>Orders</td><td>Admin</td><td>Delete</td><td>Set Admin</td></tr>";
		$accounts = unserialize(file_get_contents($pass_file));
		foreach ($accounts as $val)
			echo "<tr>
			<td>".$val['login']."</td>
			<td>".$val['order']."</td>
			<td>".$val['admin']."</td>
			<td><a href= 'php/connexion/root_delete.php?login=".$val['login']."'>Delete</a></td>
			<td><a href= 'php/connexion/root_toggle.php?login=".$val['login']."'>Set Admin</a></td>
			</tr>";
		echo "</table>";
	}

    function root_delete_acc($login)
    {
		$idx = 0;
		$pass_file = $_SERVER["DOCUMENT_ROOT"].'/private/passwd';
		if (!file_exists($_SERVER["DOCUMENT_ROOT"].'/private'))
			mkdir($_SERVER["DOCUMENT_ROOT"].'/private', 0777, true);
		$accounts = unserialize(file_get_contents($pass_file));
		foreach ($accounts as $val)
		{
			if ($val['login'] === $login)
			{
				array_splice($accounts, $idx, 1);
				file_put_contents($pass_file, serialize($accounts));
			}
			$idx++;
		}
	}
    function root_toggle($login)
    {
		$idx = 0;
		$pass_file = $_SERVER["DOCUMENT_ROOT"].'/private/passwd';
		if (!file_exists($_SERVER["DOCUMENT_ROOT"].'/private'))
			mkdir($_SERVER["DOCUMENT_ROOT"].'/private', 0777, true);
		$accounts = unserialize(file_get_contents($pass_file));
		foreach ($accounts as $val)
		{
			if ($val['login'] === $login)
			{
				if ($val['admin'])
					$accounts[$idx]['admin'] = 0;
				else
					$accounts[$idx]['admin'] = 1;
				file_put_contents($pass_file, serialize($accounts));
				return (TRUE);
			}
			$idx++;
		}
	}
	function is_admin($login)
	{
		$pass_file = $_SERVER["DOCUMENT_ROOT"].'/private/passwd';
		if (!file_exists($_SERVER["DOCUMENT_ROOT"].'/private'))
			mkdir($_SERVER["DOCUMENT_ROOT"].'/private', 0777, true);
		$accounts = unserialize(file_get_contents($pass_file));
		if ($accounts)
		{
			foreach ($accounts as $val)
			{
				if ($val['login'] === $login)
				{
					if ($val['admin'])
						return (TRUE);
					else
						return (FALSE);
				}
			}
		}
		return (FALSE);
	}
?>
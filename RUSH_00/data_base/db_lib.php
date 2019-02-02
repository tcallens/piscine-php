<?php
$db_users = '../private/users';
$db_articles = '../private/articles';

function init_db() {
	if (!file_exists('../private/'))
		mkdir('../private/');
	if (!file_exists($GLOBALS['db_users']))
		file_put_contents($GLOBALS['db_users'], null);
	if (!file_exists($GLOBALS['db_articles']))
		file_put_contents($GLOBALS['db_articles'], null);
}

function db_check($db_file, $field, $value) {
	if (!file_exists($db_file))
		return false;
	if (($data = unserialize(file_get_contents($db_file))) === false)
		return false;
	foreach($data as $line)
		if($line[$field] === $value)
			return true;
		return false;
}

function db_get($file) {
	$data = file_get_contents($file);
	$ret = json_decode($data, true);
	return $ret;
}
?>

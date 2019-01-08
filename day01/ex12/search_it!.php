#!/usr/bin/php
<?php
for ($a = 2; $a < $argc; $a++)
{
	$val = explode(":", $argv[$a]);
	if ($val[0] === $argv[1])
		$pass = $val[1];
}

if (empty($pass))
	exit();
echo $pass . "\n";


?>

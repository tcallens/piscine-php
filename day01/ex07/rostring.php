#!/usr/bin/php
<?php

$end = [];
$tab = explode(" ", $argv[1]);

for ($a = 0; $a < count($tab); $a++)
	if (!empty($tab[$a]))
		array_push($end, $tab[$a]);

if (count($end) == 0)
	exit();

$tmp = $end[0];
array_shift($end);
array_push($end, $tmp);

for ($b = 0; $b < count($end); $b++)
{
	echo $end[$b];
	if ($b == count($end) - 1)
		echo "\n";
	else
		echo " ";
}
?>

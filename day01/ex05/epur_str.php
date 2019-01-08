#!/usr/bin/php
<?php

function ft_split($str)
{
	$tab = explode(" ", $str);
	$end = [];

	for ($a = 0; $a < count($tab); $a++)
		if (!empty($tab[$a]))
			array_push($end, $tab[$a]);
	return ($end);
}

$tab = ft_split($argv[1]);
for ($a = 0; $a < count($tab); $a++)
{
	echo $tab[$a];
	if ($a == count($tab) - 1)
		echo "\n";
	else
		echo " ";
}

?>

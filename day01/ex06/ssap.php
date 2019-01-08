#!/usr/bin/php
<?php

$end = [];

for ($a = 1; $a < $argc; $a++)
{
	$tab = explode(" ", $argv[$a]);
	for ($b	= 0; $b < count($tab); $b++)
		if (!empty($tab[$b]))
			array_push($end, $tab[$b]);
}
sort($end, SORT_STRING);
for ($i = 0; $i < count($end); $i++)
	echo $end[$i] . "\n";

?>

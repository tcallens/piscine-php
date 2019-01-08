#!/usr/bin/php
<?php
function is_alpha($st)
{
	for ($y = 0; $st[$y]; $y++)
		if (!($st[$y] >= 'A' && $st[$y] <= 'Z') && !($st[$y] >= 'a' && $st[$y] <= 'z'))
			return (false);
	return (true);
}

$al = [];
$nu = [];
$ot = [];

for ($a = 1; $a < $argc; $a++)
{
	$tab = explode(" ", $argv[$a]);
	for ($b = 0; $b < count($tab); $b++)
	{
		if (!empty($tab[$b]))
		{
			if (is_numeric($tab[$b]))
				array_push($nu, $tab[$b]);
			else if (is_alpha($tab[$b]))
				array_push($al, $tab[$b]);
			else
				array_push($ot, $tab[$b]);
		}
	}
}


sort($al,  SORT_STRING | SORT_FLAG_CASE);
sort($nu,  SORT_STRING | SORT_FLAG_CASE);
sort($ot,  SORT_STRING | SORT_FLAG_CASE);
$end = array_merge($al, $nu, $ot);

for ($c = 0; $c < count($end); $c++)
	echo $end[$c] . "\n";
?>

#!/usr/bin/php
<?php

if ($argc != 2)
	exit("Incorrect Parameters\n");

$poss = array("+", "-", "*", "/", "%");

for ($a = 0; $a < count($poss); $a++)
{
	$tab = explode($poss[$a], $argv[1]);
	if (count($tab) > 1)
	{
		$ope = $poss[$a];
		break;
	}
}

if (count($tab) != 2)
	exit("Syntax Error\n");
else
{
	$nb1 = str_replace(' ', '', $tab[0]);
	$nb2 = str_replace(' ', '', $tab[1]);
	if (!(is_numeric($nb1)) || !(is_numeric($nb2)))
		exit("Syntax Error\n");
}

if ($ope == '+')
	$end = ($nb1 + $nb2);
else if ($ope == '-')
	$end = ($nb1 - $nb2);
else if ($ope == '/')
	$end = ($nb1 / $nb2);
else if ($ope == '*')
	$end = ($nb1 * $nb2);
else if ($ope == '%')
	$end = ($nb1 % $nb2);
else
	exit("Syntax Error\n");

echo $end . "\n";
?>

#!/usr/bin/php
<?php

if ($argc != 4)
	exit("Incorrect Parameters\n");

for ($a = 1; $a < $argc; $a++)
{
	$argv[$a] = str_replace(' ', '', $argv[$a]);
	$argv[$a] = str_replace('\t', '', $argv[$a]);
}

if ($argv[2] == '-')
	$end = ($argv[1] - $argv[3]);
else if ($argv[2] == '+')
	$end = ($argv[1] + $argv[3]);
else if ($argv[2] == '*')
	$end = ($argv[1] * $argv[3]);
else if ($argv[2] == '/')
	$end = ($argv[1] / $argv[3]);
else if ($argv[2] == '%')
	$end = ($argv[1] % $argv[3]);

echo $end . "\n";
?>

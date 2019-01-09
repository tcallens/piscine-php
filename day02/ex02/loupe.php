#!/usr/bin/php
<?php
function find_line($st)
{
	$st = preg_replace_callback("/(<a )(.*?)(>)(.*)(<\/a>)/i", function($match)
	{
		$match[0] = preg_replace_callback("/( title=\")(.*?)(\")/i", function($match)
		{
			return ($match[1].strtoupper($match[2]).$match[3]);
		}, $match[0]);
		$match[0] = preg_replace_callback("/(>)(.*?)(<)/i", function($match)
		{
			return ($match[1].strtoupper($match[2]).$match[3]);
		}, $match[0]);
		return ($match[0]);
	}, $st);
	echo $st;
}

if ($argc < 2 || !file_exists($argv[1]))
	exit();

$end = file($argv[1]) or die;
foreach ($end as $st)
	find_line($st);
?>

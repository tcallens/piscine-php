#!/usr/bin/php
<?php
$file = fopen("/var/run/utmpx", "rb");
date_default_timezone_set("Europe/Paris");
fseek($file, 628);
while (!feof($file))
{
	$data = fread($file, 628);
	if (strlen($data) == 628)
	{
		$data = unpack("a256user/a4id/a32line/ipid/itype/itime", $data);
		if ($data['type'] == 7)
		{
			echo str_pad((trim($data['user']) . " "), 9);
			echo str_pad((trim($data['line']) . "  "), 9);
			$time = date("M  j H:i", $data['time']);
			echo $time . " \n";
		}
	}
}
?>

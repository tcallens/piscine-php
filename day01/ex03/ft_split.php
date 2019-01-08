<?php
function ft_split($st)
{
	$tab = explode(" ", $st);
	$tend = [];

	for ($a = 0; $a < count($tab); $a++)
	{
		if (!empty($tab[$a]))
			array_push($tend, $tab[$a]);
	}
	sort($tend, SORT_STRING);
	return ($tend);
}
?>

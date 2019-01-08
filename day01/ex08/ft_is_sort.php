<?php
function ft_is_sort($tab1)
{
	$tab2 = $tab1;

	sort($tab2);
	for ($a = 0; $a < count($tab2); $a++)
		if ($tab1[$a] != $tab2[$a])
			return (false);
	return (true);
}
?>

#!/usr/bin/php
<?php
$st = fopen("php://stdin", "r");
while (!feof($st))
{
	echo "Entrez un nombre: ";
	$nb = fgets($st);
	if (empty($nb))
		exit("^D\n");
	$nb = str_replace("\n", "", $nb);
	if (is_numeric($nb))
	{
		if ($nb % 2 == 0)
			echo "Le chiffre $nb est Pair\n";
		else
			echo "Le chiffre $nb est Impair\n";
	}
	else
		echo "'$nb' n'est pas un chiffre\n";
}
fclose($st);
?>

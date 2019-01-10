<?php
$image = "../img/42.png";
header("content-Type: image/png");
readfile($image);
?>

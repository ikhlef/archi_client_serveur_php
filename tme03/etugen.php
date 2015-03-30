<?php
$file =fopen("db.csv", "w") or exit ("error file io");
for ($i=0; $i < 200; $i++) {
	$etu=rand(1000000,9999999);
	$gp=rand(1,9);
	fwrite($file, "$etu,$gp\n");
}

?>

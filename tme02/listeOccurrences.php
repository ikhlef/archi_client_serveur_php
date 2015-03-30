<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN"
	"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html xml:lang="fr" lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>listeOccurences</title>
</head>
<body>
<?php

$regex_secu='/[12][0-9]{13} /';
$regex_time='/(1[0-9]|2[0-3])h[0-5][0-9] /';
$regex_mail='/[[:alpha:]]+.[[:alpha:]]+@etu.upmc.fr /';
$regex_notes='/\b([0-9]|1[0-9]|20)\b/';
$string_secu='14854665146545 24854664546545 04855555546545 ';
$string_time='00h00 23h59 12h12 33h33 66h52 ';
$string_mail='nom.prenom@etu.upmc.fr toto@hotmail.fr tutu.tata@etu.fr ';
$string_notes='0 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 16 17 18 19 20 21 ';
preg_match_all($regex_secu, $string_secu, $regs);
echo "<ul>";
foreach ($regs[0] as $key => $value) {
	echo "<li>$value</li>";
}
echo "</ul>";

preg_match_all($regex_time, $string_time, $regs);
echo "<ul>";
foreach ($regs[0] as $key => $value) {
	echo "<li>$value</li>";
}
echo "</ul>";

preg_match_all($regex_mail, $string_mail, $regs);
echo "<ul>";
foreach ($regs[0] as $key => $value) {
	echo "<li>$value</li>";
}
echo "</ul>";

preg_match_all($regex_notes, $string_notes, $regs);
echo "<ul>";
foreach ($regs[0] as $key => $value) {
	echo "<li>$value</li>";
}
echo "</ul>";
?>
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN"
	"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html xml:lang="fr" lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Fruits</title>
</head>
<body>
<table>
<?php
$tab=array("banane","pomme","litchie");

echo "<ul>";
foreach ($tab as $key => $value) {
	echo "<li>$value</li>";
}
echo "</ul>";

echo "<ul>";
for ($i=0; $i < count($tab); $i++) {
	echo "<li>$tab[$i]</li>";
}
echo "</ul>";

echo "<ul>";
$i=0;
while ($i < count($tab)) {
	echo "<li>$tab[$i]</li>";
	$i++;
}
echo "</ul>";

?>
</table>
</body>
</html>

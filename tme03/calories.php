<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN"
	"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html xml:lang="fr" lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Calories</title>
</head>
<body>
<table>
<?php
$tab=array();
$tab["banane"]=130;
$tab["pomme"]=300;
$tab["litchie"]=30;
#asort($tab);
ksort($tab);
echo "<ul>";
foreach ($tab as $key => $value) {
	echo "<li>$key : $value</li>";
}
echo "</ul>";
?>
</table>
</body>
</html>

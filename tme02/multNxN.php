<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN"
	"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html xml:lang="fr" lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Multiplication NxN</title>
</head>
<body>
<table summary="Table de multiplication">
	<caption>Table de multiplication</caption>
<?php
	define ("N", "10");
	for ($i=1; $i <= N; $i++) {
		echo "<tr>";
		for ($j=1; $j <= N; $j++) {
			echo "<td>" . $i*$j . "</td>";
		}
		echo "</tr>";
	}
?>
</table>
</body>
</html>

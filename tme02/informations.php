<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN"
	"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html xml:lang="fr" lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Informations</title>
</head>
<body>
	<ul>
<?php
foreach ($_SERVER as $key => $value) {
	echo "<li>$key : $value</li>";
}
?>
</ul>
</body>
</html>

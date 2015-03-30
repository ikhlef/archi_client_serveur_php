<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN"
	"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html xml:lang="fr" lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>ShowForm</title>
</head>
<body>
<table>
<?php
function arrayEnTableHTML($array){
	echo "<ul>";
	foreach ($array as $key => $value) {
			echo "<li>" . htmlspecialchars($key) . " : " . htmlspecialchars($value) . "</li>";
		}
	echo "</ul>";
}
echo $_SERVER["QUERY_STRING"];

arrayEnTableHTML($_GET);

arrayEnTableHTML($_POST);

?>
</table>
</body>
</html>

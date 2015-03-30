<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN"
	"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html xml:lang="fr" lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Entrer notes</title>
</head>
<body>
<table>

<?php
$avg=0;
$bad_input=0;

function noteValide1($val){
	return preg_match('/^([0-1][0-9](,(5|50|25|75))?|20)$/', $val)==1;
}
echo "<table summary='Liste des étudiants et leur note'>";
foreach ($_POST as $key => $value) {
	echo "<tr><td>$key</td><td>";
	if(noteValide1($value)){
		echo "$value";
		$avg+=$value;
	}else{
		echo "bad input";
		$bad_input++;
	}
	echo "</td></tr>";
}
echo "</table>";
$avg/=count($_POST)-$bad_input;
echo "<p>Moyenne : $avg</p>";
?>

</table>
</body>
</html>

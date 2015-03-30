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

$etudiants=array("toto", "tata", "titi", "tutu");

define("GRP", 20);
if (isset($_GET['grp']) && is_numeric($_GET['grp']) && $_GET['grp'] >=0 && $_GET['grp'] < GRP){
	echo "<p>Groupe numéro : ".$_GET['grp']."</p>";
	echo "<form action='notesEntrees.php' method='post'>";
	echo "<fieldset><legend>Saisie des notes</legend>";
	for ($i=0; $i < count($etudiants); $i++) {
		echo "<label for='".$etudiants[$i]."'>$etudiants[$i]</label>";
		echo "<input type='text' name=".$etudiants[$i]." id=".$etudiants[$i].">";
	}

	echo "<input value='submit' type=submit>";
	echo "</fieldset>";
}else{
	if(isset($_GET['grp'])){
		echo "<p>Erreur : numéro de groupe incorrect</p>";
	}
	echo "<form action='".$_SERVER["PHP_SELF"]."'' method='get'>";
	echo "<fieldset><legend>Saisie du groupe</legend>";
	echo "<label for='grp'>Groupe</label>";
	echo "<input type='text' name='grp' id='grp'>";
	echo "<input value='submit' type=submit>";
	echo "</fieldset>";
}

?>

</table>
</body>
</html>

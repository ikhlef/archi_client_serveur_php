<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN"
	"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html xml:lang="fr" lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Inscrire etudiant</title>
</head>
<body>
<table>

<?php
function tabFromFich($file){
	$fh=fopen($file, "r") or exit ("error file io");
	while(!feof($fh)){
		$matches=fPOSTcsv($fh);
		$hash[$matches[0]]=$matches[1];
	}
	return $hash;
}

function TDdeEtudiant($file, $numero){
	$tmp=tabFromFich($file);
	if(isset($tmp[$numero])){
		return $tmp[$numero];
	}else{
		return "O";
	}
}

function ajoutEnFinFile($file, $etu, $gp){
	$fh=fopen($file, "a") or exit ("error file io");
	fwrite($fh, "$etu,$gp\n");
}

#ajoutEnFinFile('db.csv', 3000000, 9);

if(isset($_POST['etu']) && isset($_POST['td']) && is_numeric($_POST['etu']) && is_numeric($_POST['td'])){
	echo "<atable>";
	foreach ($_POST as $key => $value) {
		echo "<tr><td>$key</td><td>$value</td></tr>";
	}
	echo "</table>";
	if(TDdeEtudiant('db.csv', $_POST['etu'])=="O"){
		ajoutEnFinFile('db.csv', $_POST['etu'], $_POST['td']);
		echo "<p>Ajout OK.</p>";
	}else{
		echo "<p>Déjà inscrit.</p>";
	}
}else{
	echo "<form action='".$_SERVER["PHP_SELF"]."'' method='POST'>";
	echo "<fieldset><legend>Inscription étudiant</legend>";
	echo "<label for='etu'>Numéro étudiant</label>";
	echo "<input type='text' name='etu' id='etu'>";
	echo "<label for='td'>Numéro de TD</label>";
	echo "<input type='text' name='td' id='td'>";
	echo "<label for='file'>Fichier</label>";
	echo "<input type='file' name='file' id='file'>";
	echo "<label for='checkboxFS'>Fichier à soumettre</label>";
	echo "<input type='checkbox' name='checkboxFS' id='checkboxFS'>";
	echo "<label for='checkboxFM'>Fichier à envoyer par mail</label>";
	echo "<input type='checkbox' name='checkboxFM' id='checkboxFM'>";
	echo "<input value='submit' type=submit>";
	echo "</fieldset>";
}

?>

</table>
</body>
</html>

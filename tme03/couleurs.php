<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN"
	"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html xml:lang="fr" lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Couleurs</title>
</head>
<body>

<?php

$colors=array("rouge", "vert", "bleu", "blanc", "noir", "gris");
function afficheCouleurs($couleur){
	foreach ($couleur as $key => $value) {
		afficheCouleur($value);
	}
}
function afficheCouleur($couleur){
	echo "<div style='width:100px; height:100px; background-color:";
	switch($couleur){
		case 'rouge':
		echo "#dc143c";
		break;
		case 'vert':
		echo "#9acd32";
		break;
		case 'bleu':
		echo "#87cefa";
		break;
		case 'blanc':
		echo "#f8f8ff";
		break;
		case 'noir':
		echo "#808080";
		break;
		case 'gris':
		echo "#dcdcdc";
		break;
	}
	echo "'></div>";
}
if(!empty($_POST) && isset($_POST['couleurs'])){
	afficheCouleurs($_POST['couleurs']);
}else{
	echo "<form action='".$_SERVER["PHP_SELF"]."'' method='POST'>";
	echo "<fieldset><legend>Couleurs</legend>";
	echo "<select  name='couleurs[]' multiple size='5'>";
		echo "<option value=rouge>rouge</option>";
		echo "<option value=vert selected=selected>vert</option>";
		echo "<option value=bleu>bleu</option>";
		echo "<option value=blanc>blanc</option>";
		echo "<option value=noir disabled>noir</option>";
		echo "<option value=gris>gris</option>";

	echo "</select>";
	echo "<input value='submit' type=submit>";
	echo "</fieldset>";
}

?>
</body>
</html>

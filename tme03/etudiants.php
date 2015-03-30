<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN"
	"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html xml:lang="fr" lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Etudiants</title>
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
function validerNuEtudiant($id){
	return preg_match('/[0-9]{7}/', $id)==1;
}
function validerMail($mail){
	return preg_match('/[[:alpha:]-]+\.[[:alpha:]-]+@etu\.upmc\.fr/', $mail)==1;
}
$mail_default="";
$id_default="";

if(isset($_POST['mail']) && isset($_POST['id'])
	&& (
		(validerNuEtudiant($_POST['id']) && $id_default=$_POST['id'])
		|| (validerMail($_POST['mail']) && $mail_default=$_POST['mail'])
		)
	&&	(validerNuEtudiant($_POST['id']) && validerMail($_POST['mail']))) {
	arrayEnTableHTML($_POST);
	echo "with post";
}elseif (isset($_GET['mail']) && isset($_GET['id'])
	&& (
		(validerNuEtudiant($_GET['id']) && $id_default=$_GET['id'])
		|| (validerMail($_GET['mail']) && $mail_default=$_GET['mail'])
		)
	&&	(validerNuEtudiant($_GET['id']) && validerMail($_GET['mail']))) {
	arrayEnTableHTML($_GET);
	echo "with get";
}else{
	echo "<form action='etudiants.php' method='post'>";
	echo "<fieldset>";
	echo "<label for='mail'>Mail</label>";
	echo "<input id='mail' name='mail' type=text value=$mail_default>";
	echo "<label for='id'>Numéro étudiant</label>";
	echo "<input id='id' name='id' type=text value=$id_default>";
	echo "<input value='submit' type=submit>";
	echo "</fieldset>";
}

?>

</table>
</body>
</html>

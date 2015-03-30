<?php
error_reporting(E_ALL);

if (isset($_GET["nom"]) && isset($_GET["valeur"])){
	if (isset($_GET['rappel'])){
		// memoriser
		if ($_GET["rappel"] == "Mémoriser"){
			setcookie($_GET["nom"], $_GET["valeur"]);
		}
		// oublier
		if ($_GET["rappel"] == "Oublier"){
			setcookie($_GET["nom"]);
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN"
	"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html xml:lang="fr" lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<title>Cookie</title>
</head>
<body>
	<p>
		<form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input name='nom' type='textbox' value="<?php isset($_GET[nom]) ? $r="$_GET[nom]" : $r=""; echo $r; ?>"/><br />
			<input name='valeur' type='textbox'/><br />
			<input type='submit' name='rappel' value='Montrer'/>
			<input type='submit' name='rappel' value='Mémoriser'/>
			<input type='submit' name='rappel' value='Oublier'/>

			<?php
			if (isset($_GET["rappel"]) && $_GET["rappel"] == "Montrer" && isset($_GET['nom']) && isset($_COOKIE[$_GET['nom']])) {
				echo "<p>La valeur du cookie $_GET[nom] est : ";
				echo $_COOKIE["$_GET[nom]"];
				echo "</p>";
			}
			?>
		</form>
	</p>
</body>
</html>

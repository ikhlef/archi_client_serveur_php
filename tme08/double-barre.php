<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" 
	"http://www.w3.org/td/xhtml-basic/xhtml-basic11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
	<title>Exo2</title>
	<link rel='stylesheet' media='screen' href='<?php echo (isset($_GET) && isset($_GET['style']))?htmlspecialchars($_GET['style']):"style.css";?>' />
</head>
<body>
	<h1>Nom Prénom</h1>
	<h2>Barre de navigation en tableau</h2>
	<table>
		<tr>
			<td><a href="#">Home</a></td>
			<td><a href="#">Mon CV</a></td>
			<td><a href="#">Nouvelles</a></td>
			<td><a href="#">Liens</a></td>
		</tr>
	</table>
	<h2>Barre de navigation en liste</h2>
	<ul>
		<li><a href="#">Home</a></li>
		<li><a href="#">Mon CV</a></li>
		<li><a href="#">Nouvelles</a></li>
		<li><a href="#">Liens</a></li>
	</ul>
	</body>
</html>

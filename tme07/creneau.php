<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" 
	"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd"> 
<html xml:lang="fr" lang="fr" xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> 
<title></title>
</head>
<body>
<?php
echo $_SERVER['REQUEST_METHOD'];
/* si méthode GET */
/* affichage du formulaire de rdv */

/* si méthode POST */
/* parcours du fichier ICS et vérification collision rdv */
/* e1 et e2 (e2 à ajouter) */
/* if (e1.d < e2.f && e1.f > e2.d) => collision */


?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
   <label>Jour</label>
   <input type="jour" value="20130311"/>
   <br />
   <label>Heure début</label>
   <input type="debut" value="080000"/>
   <br />
   <label>Heure fin</label>
   <input type="fin" value="200000"/>
   <br />
   <input type="submit" value="Prendre RDV"/>
</form>
</body> 
</html> 

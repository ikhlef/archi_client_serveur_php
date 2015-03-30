<?php
include("fusionne_ics.php");
if(isset($_FILES) && isset ($_FILES["file1"]) && isset ($_FILES["file2"])){
  envoi_ics(fusionneics($_FILES["file1"]["tmp_name"],$_FILES["file2"]["tmp_name"]), "fusion.ics");
  return 0;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" 
	"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd"> 
<html xml:lang="fr" lang="fr" xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> 
<title>Fournir ICS</title>
</head>
<body>
<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<label for="file1">Fichier 1</label>
<input name="file1" type="file"><br />
<label for="file2">Fichier 2</label>
<input name="file2" type="file"><br />
<input value="Fusion" type="submit">
</form>

</body>
</html>
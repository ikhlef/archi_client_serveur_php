<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" 
	"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd"> 
<html xml:lang="fr" lang="fr" xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> 
<title>blabla</title>
</head>
<body>
<?php


include("deconnexion.php");
// protocole://serveur:port/chemin
// http : 80
// https : 443
$chaine="protocole://serveur:80/chemin";

$chaine2="http://serveur/chemin";
function get_entetes($chaine){
  preg_match_all("/([^:]+):\/\/([^:\/]+)(:([\d]+)){0,1}\/(.*)/", $chaine, $matches);
  $protocol=$matches[1][0];
  $server=$matches[2][0];
  $port=$matches[4][0];
  $path=$matches[5][0];
 
  if(strcmp($protocol, "http")==0){
    $port=80;
  }
  if(strcmp($protocol, "https")==0){
    $port=443;
  }
  $sock=fsockopen($server, $port);
  if(!$sock){
    echo "Erreur établissement de connexion socket\n";
    return;
  }
 
  $request="GET /$path HTTP/1.1\r\nHost: $server\r\n\r\n";
  fwrite($sock, $request);
  $res=fgets($sock);
  $tab["exit code"]=$res;

  do{
    $res=fgets($sock);
    if(preg_match("/^(.*):(.*)\r\n$/", $res, $matches)){
      $tab[$matches[0]]=$matches[1];
    }
  }while($res!=".\r\n" && !feof($sock));
  deconnexion($sock);
  return $tab;
}

function print_array($tab){
  echo "<table summary='En-tête reçus'>";
  echo "<caption>En-tête reçus</caption>";
  echo "<tr><th>Clef</th><th>Valeur</th></tr>";
  foreach($tab as $key=>$value){
    echo "<tr><td>$key</td><td>$value</td></tr>";
  }
  echo "</table>";
}

//print_array(get_entetes("http://127.0.0.1/~3000211/index.html"));
if(isset($_GET['url'])){
  print_array(get_entetes($_GET["url"]));
}
?>

</body>
</html>
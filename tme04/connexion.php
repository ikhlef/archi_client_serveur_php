<?php
function commande($sock, $request)
{
  fwrite($sock, $request . "\r\n");
  
  $res=fgets($sock);
  $ok="+OK";
  if(!strncmp($res, $ok, strlen($ok))){
    return $res;
  }else{
    return false;
  }
}
function commande_multiline($sock, $request)
{
  fwrite($sock, $request . "\r\n");
  $res="";
  do{
    $res.=fgets($sock);
  }while($res!=".\r\n");
  return $res;
}
function connexion($hostname, $user, $passwd)
{
  $fp=fsockopen($hostname, 110);
  if(!$fp){
    return false;
  }
  if(commande($fp, "USER $user\r\n") && commande($fp, "PASS $passwd\r\n")){
    return $fp;
  }
  commande($sock, "QUIT\r\n");
  fclose($sock);
  return false;
}
?>

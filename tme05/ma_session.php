<?php
if(!isset($_COOKIE) || !isset($_COOKIE["ma_session"])){
  $file='../sessions/'.time();
  setcookie("ma_session", $file);
  $f=fopen($file, "w");
  echo "Cookie ma_session posé pour le fichier ".$file."\n";
  fwrite($f, "0\n");
  fwrite($f, $_SERVER['HTTP_USER_AGENT']."\n");
  fwrite($f, $_SERVER["REMOTE_ADDR"]."\n");
}

if (isset($_COOKIE) && isset($_COOKIE["ma_session"]) && isset($_GET['envoi'])){
  if ($_GET["envoi"] == "Incrémenter"){

    $content=file($_COOKIE["ma_session"]);
    $str=$content[0];
    $id=intval($str);
    $id++;
    echo $id."<br />";
    echo $content[1]."<br />";
    echo $content[2]."<br />";
    $f=fopen($_COOKIE["ma_session"],"w");
    fwrite($f, $id."\r\n");
    fwrite($f, $content[1]);
    fwrite($f, $content[2]."\r\n");
  }
  if ($_GET["envoi"] == "Terminer"){
    unlink($_COOKIE["ma_session"]);
    setcookie("ma_session", "", time()-3600);

  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN"
  "http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html xml:lang="fr" lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <title>Ma session</title>
</head>
<body>
  <p>
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input type='submit' name='envoi' value='Incrémenter'/>
      <input type='submit' name='envoi' value='Terminer'/>
    </form>
  </p>
</body>
</html>

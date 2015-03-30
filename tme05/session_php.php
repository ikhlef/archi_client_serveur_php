<?php
session_start();

if(!isset($_SESSION) || !isset($_SESSION['count'])){
  $_SESSION['count']=0;
  $_SESSION['ua']=$_SERVER['HTTP_USER_AGENT'];
  $_SESSION['addr']=$_SERVER["REMOTE_ADDR"];
}

if (isset($_SESSION) && isset($_SESSION['count']) && isset($_GET['envoi'])){
  if ($_GET["envoi"] == "Incrémenter"){
    $_SESSION['count']=$_SESSION['count']+1;
    echo "Count : " . $_SESSION['count'] . "</br>";
    echo "User-Agent : " . $_SESSION['ua'] . "</br>";
    echo "Remote Address : " . $_SESSION['addr'] . "</br>";
  }
  if ($_GET["envoi"] == "Terminer"){
    session_destroy();
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

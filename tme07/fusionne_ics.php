<?php

function fusionneics($file1, $file2){
  $arr1=file($file1);  
  $arr2=file($file2);  

  array_pop($arr1);
  while(! preg_match('/^BEGIN:VEVENT/', $arr2[0])){
    array_shift($arr2);
  }

  /* tests */
  /*
  print_r($arr1);
  echo "<br/>";  echo "<br/>";
  print_r($arr2);
  */
  return array_merge($arr1, $arr2);
}

/* test */
/*
$arrayics=fusionneics("cal1.ics", "cal2.ics");
*/
function envoi_ics($array, $nom){
  header('Content-Type: text/calendar; charset=utf-8');
  header('Content-Transfer-Encoding: 8bit');
  header("Content-Disposition: inline ; filename=\"".$nom."\" ; creation-date=".gmdate("Ymd\THis", time()));

  foreach($array as $line){
    echo "$line";
  }
}

/* test */
/*
envoi_ics($arrayics, "fusioncal.ics");
*/
?>
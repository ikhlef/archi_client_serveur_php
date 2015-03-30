<?php


function table2svg($file, $fonction){
  global $width, $height, $table;
  $parser = xml_parser_create();
  xml_set_element_handler($parser, "ouvrante", "fermante");
  xml_set_character_data_handler($parser, "texte");
  xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, false);
  if (!($f = fopen($file, "r"))) {
    die("Impossible d'ouvrir le fichier '$file'");
  }

  while ($data = fread($f, 1024)) {
    if (!xml_parse($parser, $data, feof($f))) {
      die(sprintf("erreur XML : %s ligne %d",
        xml_error_string(xml_get_error_code($parser)),
        xml_get_current_line_number($parser)));
    }
  }
  xml_parser_free($parser);
  if (function_exists($fonction))
    $fonction($table, $width, $height);
  else echo "Mode inconnu: $mode";
}

global $width, $height, $table, $last;
$table = $last = array();
// balise ouvrante et attributs associés
function ouvrante($parser, $name, $attribs){
  global $width, $height, $table, $last;
  $last['contenu']=$name;
  switch ($name){
    case "table":
      $width = $attribs['width'];
      $height = $attribs['height'];
      break;
    case "tr":
      $table[] = array();
      break;
    case "td":
      $last['colspan'] = isset($attribs['colspan']) ? $attribs['colspan'] : 1;
      $last['style'] = isset($attribs['style']) ? $attribs['style'] : '';
      break;
  }
}

// balise fermante et attributs associés
function fermante($parser, $name){

}


// contenu intra-balises
function texte($parser, $data){
  global $last, $table;
  if ($last['contenu'] == 'td'){
    $last['contenu'] = 0+trim($data);
    end($table);
    $table[key($table)][] = $last;
  }
  $last=array();
}

define("HAUTEUR", 128);
define("EPAISSEUR", 16);

function rectangle($matrix, $width, $height){
  $res=array();
  $y=1;
  foreach ($matrix as $line){
    $x=0;
    foreach ($line as $case){
      preg_match('/background-color:\s*([^;]+)/', $case['style'], $matches);
      $res[]=sprintf("\n<rect x='%d' y='-%d' width='%d' height='%d' fill='%s' />",
        $x,
        $y * HAUTEUR,
        $case['colspan'] * EPAISSEUR,
        $case['contenu'],
        $matches[1]);
    $x+= $case['colspan'] +1* EPAISSEUR;
    }
    $y++;
  }

  return $res;
}

function rectangles($matrix, $width, $height){
  $svg = rectangle($matrix, $width, $height);
  header("Content-Type: image/svg+xml");
  echo "<!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN'
  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>";
  echo "\n<svg xmlns='http://www.w3.org/2000/svg' width='$width' height='$height'>";
  echo "<g transform='translate(10,10),scale(1,-1)'>";
  echo join("\n", $svg);
  echo "</g></svg>";
}

//table2svg("test-svg.html", rectangles);
?>

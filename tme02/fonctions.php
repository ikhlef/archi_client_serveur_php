<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN"
	"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html xml:lang="fr" lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Fonctions</title>
</head>
<body>
<table>
<?php
$max=3;
function vect_to_string($array){
	$res="";
	foreach ($array as $key => $value) {
		$res+="$value ";
	}
	return $res;
}

function vect_to_tableHTML($array){
	echo "<table summary=\"Contenu du tableau\">";
	echo "<caption>content</caption>";
	echo "<tr>";
	global $max;
	$cpt=1;
	foreach ($array as $key => $value) {
		if($cpt > $max){
			echo "</tr>\n<tr>";
			$cpt=0;
		}
		echo "<td>$value</td>";
		$cpt++;
	};
	echo "</tr>";
	echo "</table>";
}

function add_vect(&$array, $val="1"){
	for ($i=0; $i < count($array); $i++) {
		$array[$i]=$array[$i]+$val;
	}

}

function mult_vect(&$array, $other){
	$res = array();
	$val=0;
	if(is_array($other)){
		for ($i=0; $i < count($array); $i++) {
			for ($j=0; $j < count($other); $j++) {
				$val+=$array[$i]*$other[$j];
			}
		}
		return $val;
	} else {
		for ($i=0; $i < count($array); $i++){
			$res[$i]=$array[$i]*$other;
		}
		return $res;
	}
}

$tab = array (1,2,3);

//add_vect($tab, "4");

vect_to_tableHTML($tab);
add_vect($tab);
vect_to_tableHTML($tab);

$matrix = array (5, 1, 2, 3);
$matrix2 = mult_vect($matrix, 2);
$number = mult_vect($matrix, $matrix2);

vect_to_tableHTML($matrix);
vect_to_tableHTML($matrix2);
echo "$number";
?>
</table>
</body>
</html>

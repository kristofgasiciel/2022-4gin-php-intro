<?php
$content = file_get_contents('http://loripsum.net/api');
$array = explode(" ", $content);
#var_dump($test);
$znaki=$_POST["znaki"];
function alfabetycznie($array, $test){
$i = 1;
sort($array, SORT_NATURAL | SORT_FLAG_CASE);
foreach($array as $slowo){
    if(preg_match("/\b(\w*$test\w*)\b/", $slowo, $match) == true){
    echo "[$i] $match[0] </br>";
    $i ++;
    }
}
}
alfabetycznie($array, $znaki);
?>
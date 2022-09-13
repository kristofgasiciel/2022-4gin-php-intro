<?php
$content = file_get_contents('http://loripsum.net/api');
$test = explode(" ", $content);
#var_dump($test);
$i = 1;
foreach($test as $slowo){
    echo "[$i] $slowo </br>";
    if(preg_match('/\b(\w*e\w*)\b/', $slowo, $match) == true){
    echo "[$i] $match[0] </br>";
    $i ++;
    }
}

#$znaki=$_POST["znaki"];
#function sortowanie($znaki, $test){
#    natcasesort($test): bool
#};
?>
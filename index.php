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
//alfabetycznie($array, $znaki);
function renderHTML($ilosc, $tak){ 
    $slowa = explode(" ", $tak);
$liczba = 1;
$tabela = '<table>';
foreach ($slowa as $wyraz){
    if ($liczba <= $ilosc){
        if($liczba % $ilosc == 1){
            $tabela .= "<tr><th>".$wyraz."</th>";
        }
        else if ($liczba % $ilosc == 0){
            $tabela .= "<th>".$wyraz."</th></tr>";
        }
        else {
            $tabela .= "<th>".$wyraz."</th>";
        }
     } else {
            if($liczba % $ilosc == 1){
                $tabela .= "<tr><td>".$wyraz."</td>";
            }
            else if ($liczba % $ilosc == 0){
                $tabela .= "<td>".$wyraz."</td></tr>";
            }
            else {
                $tabela .= "<td>".$wyraz."</td>";
            }
        }
        $liczba++;
    }
    $tabela .= "</table>";
    return $tabela;
}
$kolumna = "10";
echo renderHTML ($kolumna, $content);
function renderCSV($ilosc, $tak){ 
    $slowa = explode(" ", $tak);
$liczba = 1;
$tabela = '<table>';
foreach ($slowa as $wyraz){
    if ($liczba <= $ilosc){
        if($liczba % $ilosc == 1){
            $tabela .= "/n".$wyraz."";
        }
        else if ($liczba % $ilosc == 0){
            $tabela .= "/n".$wyraz.";";
        }
        else {
            $tabela .= "<th>".$wyraz."</th>";
        }
     } else {
            if($liczba % $ilosc == 1){
                $tabela .= "<tr><td>".$wyraz."</td>";
            }
            else if ($liczba % $ilosc == 0){
                $tabela .= "<td>".$wyraz."</td></tr>";
            }
            else {
                $tabela .= "<td>".$wyraz."</td>";
            }
        }
        $liczba++;
    }
    $tabela .= "</table>";
    return $tabela;
}
function renderMD($ilosc, $tak){ 
    $slowa = explode(" ", $tak);
$liczba = 1;
$tabela = '<table>';
foreach ($slowa as $wyraz){
    if ($liczba <= $ilosc){
        if($liczba % $ilosc == 1){
            $tabela .= "/n".$wyraz."";
        }
        else if ($liczba % $ilosc == 0){
            $tabela .= "/n".$wyraz.";";
        }
        else {
            $tabela .= "<th>".$wyraz."</th>";
        }
     } else {
            if($liczba % $ilosc == 1){
                $tabela .= "<tr><td>".$wyraz."</td>";
            }
            else if ($liczba % $ilosc == 0){
                $tabela .= "<td>".$wyraz."</td></tr>";
            }
            else {
                $tabela .= "<td>".$wyraz."</td>";
            }
        }
        $liczba++;
    }
    $tabela .= "</table>";
    return $tabela;
}
?>
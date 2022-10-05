<?php
require_once "tableTool.interface.php";

class tableTool implements tableToolInterface
{
    var $table_data;
    public function __construct($data)
    {
        $this->table_data=$data;
    }
    private function sortowanie($szukana)
    {
        sort($this->table_data);
        $sortRes=array();
        foreach ($this->table_data as $wyrazy) {
            if(preg_match("/{$szukana}/i", $wyrazy)) {
                $sortRes[]= $wyrazy;
            }
        }
        return $sortRes;
    }
    public function renderHTML($cols, $filterString=''){ 
        $slowa=$this->sortowanie($filterString);
        $liczba = 1;
        $tabela = '<table>';
        foreach ($slowa as $wyraz){
            if ($liczba <= $cols){
                if($liczba % $cols == 1){
                    $tabela .= "<tr><th>".$wyraz."</th>";
                }
                else if ($liczba % $cols == 0){
                    $tabela .= "<th>".$wyraz."</th></tr>";
                }
                else {
                    $tabela .= "<th>".$wyraz."</th>";
                }
            } else {
                    if($liczba % $cols == 1){
                        $tabela .= "<tr><td>".$wyraz."</td>";
                    }
                    else if ($liczba % $cols == 0){
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

    public function renderCSV($cols, $filterString=''){}
    public function renderMD($cols, $filterString=''){}

}

// NIE DOTYKAĆ KODU PONIŻEJ TEJ LINIJKI

$array = explode(' ', file_get_contents('lorem.txt'));

$table = new tableTool($array);

// Tests
echo $array->renderHTML(3);
echo $array->renderHTML(10);
echo $array->renderHTML(5,'id');
echo $array->renderCSV(3);
echo $array->renderCSV(10);
echo $array->renderCSV(5,'id');
echo $array->renderMD(3);
echo $array->renderMD(10);
echo $array->renderMD(5,'id');
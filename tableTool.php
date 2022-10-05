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
echo $table->renderHTML(3);
echo $table->renderHTML(10);
echo $table->renderHTML(5,'id');
echo $table->renderCSV(3);
echo $table->renderCSV(10);
echo $table->renderCSV(5,'id');
echo $table->renderMD(3);
echo $table->renderMD(10);
echo $table->renderMD(5,'id');
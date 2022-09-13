<?php
$content = file_get_contents('http://loripsum.net/api');
$test = explode(" ", $content);
var_dump($test);
?>
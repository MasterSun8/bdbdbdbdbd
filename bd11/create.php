<?php
$name = $_POST["name"];

if(!file_exists($name)){
    $file = fopen($name, 'w');
}
?>
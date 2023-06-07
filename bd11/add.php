<?php
$name = $_POST["name"];
$namee = $_POST["namee"];

if(!file_exists($name)){
    mkdir($name);
}

if(!file_exists($namee)){
    mkdir($namee);
}
?>
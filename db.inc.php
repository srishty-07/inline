<?php

try{
    $db=new pdo('mysql:host=localhost;dbname=test;charset=utf8','root','');
}
catch(PDOException $e){
    die($e->getMessage());
}
?>
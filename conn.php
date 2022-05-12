<?php

$dsn = "mysql:dbname=contatos_teste;host=localhost";
$dbuser = "root";
$dbpass = "adm123**";

try{
    $pdo = new PDO($dsn, $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Falhou".$e->getMessage();
}
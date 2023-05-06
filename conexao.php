<?php
$host = "localhost";
$user = "root";
$pass = "root";
$dbname = "meu_banco";

try{
    
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    
}catch(PDOException $err){
    
}
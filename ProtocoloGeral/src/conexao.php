<?php

// Credenciais do banco de dados
$host = "localhost";
$user = "root";
$pass = "root";
$dbname = "protocologeral";
$port = 3306;

try {
    //Conexão php com banco dados usando a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexão php com banco dados usando sem a porta
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    //echo "Conexão com banco de dados realizado com sucesso!";
} catch (PDOException $err) {
    echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $err->getMessage();
}

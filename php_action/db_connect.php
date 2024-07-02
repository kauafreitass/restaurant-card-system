<?php

// Conexao com banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sanvi";

$connect = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($connect, 'utf8');

if (mysqli_connect_error()) {
    echo "Erro ao conectar ao banco de dados: " . mysqli_connect_error();
}
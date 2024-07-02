<?php
// Sessao
session_start();
// Conexao
require_once './db_connect.php';
// Clear
function clear($input)
{
    global $connect;
    $var = mysqli_real_escape_string($connect, $input);
    $var = htmlspecialchars($var);
    return $var;
    }

if(isset($_POST['btn-cadastrar'])){
    $nome = clear($_POST['nome']);
    $nome = clear($_POST['sobrenome']);
    $email = clear($_POST['email']);
    $idade = clear($_POST['idade']);


    $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";


    if (mysqli_query($connect, $sql)) {
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../index.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar";
        header('Location: ../index.php');
    }
}
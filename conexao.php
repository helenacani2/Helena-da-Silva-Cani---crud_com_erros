<?php
// conexão com o banco (contém erro de variável e de conexão)
$host = "localhost";
$user = "root";
$password = "root"; //estava vazio
$db = "crud_exemplo";

$conn = new mysqli($host, $user, $password, $bd); //tava escrito $hot

if ($conn->connect_error) { //ele tava verificando de um jeito todo esquisito, errado e não parava se achasse erro
    die("Falha na conexão: " . $conn->connect_error);
}

// força charset utf8 para acentuação
$conn->set_charset("utf8");

// opcional: define timezone (se for importante para consultas/datas) - usei do outro crud desenvolvido essa boa prática
date_default_timezone_set("America/Sao_Paulo");
?>
<?php
// conexão com o banco (contém erro de variável e de conexão)
$host = "localhost";
$user = "root";
$password = "root"; //estava vazio
$db = "crud_exemplo";

$conn = new mysqli($host, $user, $password, $bd);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// força charset utf8 para acentuação
$conn->set_charset("utf8");

// opcional: define timezone (se for importante para consultas/datas) - usei do outro crud desenvolvido essa boa prática
date_default_timezone_set("America/Sao_Paulo");
?>
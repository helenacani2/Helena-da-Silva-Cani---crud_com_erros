<?php
// Edição com erro de lógica (não busca o ID corretamente)
include("conexao.php");

$id = $_GET["id"];
$sql = "SELECT * FROM usuarios WHERE id = $id";
$res = mysqli_query($conn, $sql);
$dado = mysqli_fetch_assoc($res);

if ($_SERVER["REQUEST_METHOD"] == "POST") { //não consegui fazer funcionar socorro
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    $sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id= ?";
    mysqli_query($conn, $sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html> <!-- não tinha o html -->
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    
    <form method="POST">
    Nome: <input type="text" name="nome" value="<?= $dado['nome'] ?>"><br>
    Email: <input type="email" name="email" value="<?= $dado['email'] ?>"><br>
    <input type="submit" value="Salvar">
    </form>

</body>
</html>

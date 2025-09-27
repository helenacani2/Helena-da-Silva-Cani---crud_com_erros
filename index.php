<?php
// Listagem com erro de lógica (ordem incorreta e falta de conexão)
require_once("conexao.php");

$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conn, $sql);

if (!$resultado) {
    // se falhar, exibe o erro e interrompe
    die("Erro na consulta SQL: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Lista de Usuários</h1>

    <?php
    if (mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_array($resultado)) {
            echo "Usuário " . $linha['id'] . "<br>";
            echo "Nome: " . ($linha['nome']) . "<br>"; 
            echo "Email: " . ($linha['email']) . "<br><br>";
        }
    } else {
        echo "Nenhum usuário encontrado";
    }

    // fecha a conexão, boa prática
    mysqli_close($conn); 
    ?>

    <br>
    <a href='cadastrar.php'>Cadastrar novo</a>
    <br>
</body>
</html>
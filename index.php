<?php
// Listagem com erro de lógica (ordem incorreta e falta de conexão)
require_once("conexao.php");

$sql = "SELECT * FROM usuarios"; // Erro de SQL: FORM ao invés de FROM
$resultado = mysqli_query($conn, $sql);

if (!$resultado) {
    // se falhar, exibe o erro e interrompe
    die("Erro na consulta SQL: " . mysqli_error($conn));
}

echo "<h1>Lista de Usuários</h1>";

if (mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_array($resultado)) {
        echo "Nome: " . ($linha['nome']) . "<br>"; 
        echo "Email: " . ($linha['email']) . "<br><br>";
    }
} else {
    echo "Nenhum usuário encontrado";
}

// fecha a conexão, boa prática
mysqli_close($conn); 

?>

<a href='cadastrar.php'>Cadastrar novo</a>
<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    
    // validações básicas
    if (empty($nome) or empty($email)) {
        $erro = "Preencha todos os campos!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "E-mail inválido!";
    } else {
        // prevenir sql injection
        $sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $nome, $email);
        
        if ($stmt->execute()) {
            $sucesso = "Usuário cadastrado com sucesso!";
        } else {
            $erro = "Erro ao cadastrar: " . $conn->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastrar usuário</h1>
    
    <?php if (isset($sucesso)) echo "<p>$sucesso</p>"; ?>
    <?php if (isset($erro)) echo "<p>$erro</p>"; ?>
    
    <form method="POST">
        Nome: <input type="text" name="nome" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        <input type="submit" value="Cadastrar">
    </form>
    
    <br>
    <a href="index.php">Voltar para lista</a>
</body>
</html>
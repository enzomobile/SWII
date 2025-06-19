<?php
// Destrói os dados de session anterior.

session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/estilos.css">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="../App/processa_login.php">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <span id="emailMsg"></span>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <span id="senhaMsg"></span>

        <button type="submit">Entrar</button>
        <p>Ainda não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
    </form>

    <!-- Máscara para o e-mail. -->
    <script src="../JS/mascaras.js"></script>
</body>
</html>
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
    <link rel="stylesheet" href="../Style/telasForm.css">
    <title>Cadastro</title>
</head>
<body>
    
    <h1>Se Cadastre</h1>
    <form id="formCadastro" method="POST" action="../App/processa_cadastro.php">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <span id="emailMsg"></span>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" placeholder="(xx) 00000-0000" required>
        <span id="telefoneMsg"></span>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" placeholder="00000000000" required>
        <span id="cpfMsg"></span>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <span id="senhaMsg"></span>

        <label for="confirmaSenha">Confirmar Senha:</label>
        <input type="password" id="confirmaSenha" name="confirmaSenha" required>
        <span id="confirmaSenhaMsg"></span>

        <button type="submit">Cadastrar</button>
        <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
    </form>

    <!-- Máscara de input com javascript, para cpf, e-mail e telefone. -->
    <script src="../JS/mascarasCadastro.js"></script>
</body>
</html>
<?php

session_start();

if (!isset($_SESSION['logado'])) {
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo!</title>
</head>
<body>
    <p>Você está logado.</p>
</body>
</html>
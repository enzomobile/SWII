<?php

// Conexão com o banco.
require_once '../Config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $senha = isset($_POST['senha']) ? trim($_POST['senha']) : '';

    if (empty($email) || empty($senha)) {
        header('Location: ../Views/login.php?erro=preenchimento');
        exit();
    }

    $sql = "SELECT * FROM tb_usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user || !password_verify($senha, $user['senha'])) {
        header('Location: ../Views/login.php?erro=usuario_ou_senha_incorretos');
        exit();
    }
    
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['logado'] = true;

    header('Location: ../Views/home.php');
    exit();
}

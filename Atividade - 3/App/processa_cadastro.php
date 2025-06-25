<?php

// Conexão com o banco.
require_once '../Config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $confirmaSenha = $_POST['confirmaSenha'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $cpf = $_POST['cpf'] ?? '';

    // Verificações dos valores.

    if (empty($email) || empty($senha) || empty($confirmaSenha) || empty($telefone) || empty($cpf)) {
        header('Location: ../Views/cadastro.php?erro=campos_vazios');
        exit();
    }

    if ($senha !== $confirmaSenha) {
        header('Location: ../Views/cadastro.php?erro=senhas_nao_correspondem');
        exit();
    }

    // Verificação extensa de e-mail, telefone e CPF.

    $query = "SELECT email, cpf, telefone FROM tb_usuarios WHERE email = ? OR cpf = ? OR telefone = ?";
    $verifica = $conn->prepare($query);
    $verifica->bind_param('sss', $email, $cpf, $telefone);
    $verifica->execute();
    $verifica->store_result();

    if ($verifica->num_rows > 0) {
        $verifica->bind_result($e, $c, $t);
        while ($verifica->fetch()) {
            if ($email === $e) {
                header('Location: ../Views/cadastro.php?erro=email_ja_utilizado');
                exit();
            }
            if ($cpf === $c) {
                header('Location: ../Views/cadastro.php?erro=cpf_ja_utilizado');
                exit();
            }
            if ($telefone === $t) {
                header('Location: ../Views/cadastro.php?erro=telefone_ja_utilizado');
                exit();
            }
        }
    }
    $verifica->close();

    // Hashing da senha.

    $senha = password_hash($senha, PASSWORD_DEFAULT);

    // Try e Catch para inserir os dados no banco de dados.

    try {
        $insert = "INSERT INTO tb_usuarios (email, senha, cpf, telefone) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insert);
        $stmt->bind_param('ssss', $email, $senha, $cpf, $telefone);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        header('Location: ../Views/login.php');
        exit();
    } catch (mysqli_sql_exception $e) {

        error_log("Erro no cadastro: " . $e->getMessage());

        if (isset($stmt)) {
            $stmt->close();
        }
        $conn->close();

        header('Location: ../Views/cadastro.php?erro=cadastro_erro');
        exit();
    }
}

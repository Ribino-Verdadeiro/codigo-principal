<?php
session_start(); // Inicia a sessão

// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "clientes";

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $db_name);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Captura os dados do formulário
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

// Prepara a declaração para buscar o usuário
if ($stmt = $conn->prepare("SELECT senha FROM login_clientes WHERE email = ?")) {
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($senha_cadastrada);
    $stmt->fetch();
    $stmt->close();
        
    // Verifica se a senha é válida
    if (password_verify($senha, $senha_cadastrada)) {
        $_SESSION['autenticado'] = 'SIM';
        header('Location: index.php');
    } else {
        header('Location: login.php?login=erro');
    }
} else {
    die("Erro na preparação da declaração: " . $conn->error);
}

exit();
$conn->close();
?>
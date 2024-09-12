<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

include 'db.php';

// Configura o relatório de erros para não exibir erros diretamente
ini_set('display_errors', 0);
error_reporting(0);

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Valida o formato do e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: login.php?status=email_incorreto"); // Redireciona para a página de login com status de e-mail incorreto
        exit();
    }

    // Prepara e executa a consulta para verificar se o e-mail existe no banco de dados
    $email = $conn->real_escape_string($email);
    $sql_code = "SELECT senha, is_admin FROM login_clientes WHERE email = ?";
    if ($stmt = $conn->prepare($sql_code)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($senha_cadastrada, $is_admin);
        $stmt->fetch();

        if ($senha_cadastrada === null) {
            header("Location: login.php?status=email_nao_existe"); // Redireciona para a página de login com status de e-mail não existente
            exit();
        }
        $stmt->close();
    } else {
        error_log("Erro na preparação da declaração: " . $conn->error);
        header("Location: login.php?status=erro"); // Redireciona para a página de login com status de erro
        exit();
    }

    // Verifica se a conta é uma conta protegida (admin)
    if ($is_admin) {
        header("Location: login.php?status=conta_protegida"); // Redireciona para a página de login com status de conta protegida
        exit();
    }

    // Gera uma nova senha
    $novasenha = substr(md5(time()), 0, 8);
    $nscriptografada = password_hash($novasenha, PASSWORD_DEFAULT);

    // Prepara e executa a consulta para atualizar a senha no banco de dados
    $sql_code = "UPDATE login_clientes SET senha = ? WHERE email = ?";
    if ($stmt = $conn->prepare($sql_code)) {
        $stmt->bind_param("ss", $nscriptografada, $email);
        if ($stmt->execute()) {
            // Configura PHPMailer para enviar o e-mail com a nova senha
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'alinenacuratelie@gmail.com';
                $mail->Password = 'igyd oany hipx mpct'; // Senha de aplicativo para Gmail
                $mail->SMTPSecure = 'TLS';
                $mail->Port = 587;

                $mail->setFrom('alinenacuratelie@gmail.com', 'Your Name');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Sua nova senha';
                $mail->Body    = 'Sua nova senha: <b>' . $novasenha . '</b>';
                $mail->AltBody = 'Sua nova senha: ' . $novasenha;

                $mail->send();
                header("Location: login.php?status=senha_enviada"); // Redireciona para a página de login com status de senha enviada
            } catch (Exception $e) {
                error_log("Falha ao enviar o e-mail. Erro: {$mail->ErrorInfo}");
                header("Location: login.php?status=erro"); // Redireciona para a página de login com status de erro
            }
        } else {
            error_log("Erro ao atualizar a senha: " . $stmt->error);
            header("Location: login.php?status=erro"); // Redireciona para a página de login com status de erro
        }
        $stmt->close();
    } else {
        error_log("Erro na preparação da declaração: " . $conn->error);
        header("Location: login.php?status=erro"); // Redireciona para a página de login com status de erro
    }
} else {
    header("Location: login.php?status=email_nao_fornecido"); // Redireciona para a página de login com status de e-mail não fornecido
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
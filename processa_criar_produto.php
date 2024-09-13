<?php
include 'validatoradmin.php';

include 'db.php';
    /*A função "trim" é usado para limpar espaços brancos/vazios.
    
    A função isset verifica se uma variável está definida e não é null.
    Costuma ser usado para ter certeza que o valor realmente exista.*/

    /* Signficado do "s" e "d". 
    "D" = é um parâmentro que é usado para valores numéricos que tenham casas decimais.
    "S" = é um string, sendo assim, é aonde que está pegando as informações do script.
    */ 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $preco = isset($_POST['preco']);
    $altura = isset($_POST['altura']);
    $largura = isset($_POST['largura']);
    $comprimento = isset($_POST['comprimento']);


    $foto = $_FILES['foto']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);

    $foto2 = $_FILES['foto2']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["foto2"]["name"]);

    $foto3 = $_FILES['foto3']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["foto3"]["name"]);

    $foto4 = $_FILES['foto4']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["foto4"]["name"]);

    $foto5 = $_FILES['foto5']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["foto5"]["name"]);

    $foto6 = $_FILES['foto6']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["foto6"]["name"]);


    // Verifica se o diretório 'uploads/' existe
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    // Tenta mover o arquivo para o diretório de uploads
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["foto2"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["foto3"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["foto4"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["foto5"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["foto6"]["tmp_name"], $target_file) ) {
        // Preparar e executar a consulta SQL
        $stmt = $conn->prepare("INSERT INTO produtos (nome, descricao, preco, altura, largura, comprimento, foto, foto2, foto3, foto4, foto5, foto6) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Verifique se a preparação da consulta foi bem-sucedida
        if ($stmt === false) {
            die("Erro ao preparar a consulta: " . $conn->error);
        }

        $stmt->bind_param("ssidddssssss", $nome, $descricao, $preco, $altura, $largura, $comprimento, $foto, $foto2, $foto3, $foto4, $foto5, $foto6);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit;
        } else {
            echo "Erro ao inserir produto: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro ao fazer upload da foto.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <a href="logoff.php">Sair</a>
</body>
</html>

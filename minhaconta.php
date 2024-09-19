<?php
include 'validator.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Conta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="assets/corujinha.png"/>

</head>

<body>
    <?php 
        include 'cabecalho.php'; 
    ?>


    <div class="tudo">

        <div class="menuzin">

            <a href='meusdados.php' class='fav'> <div class="parte1 parte"> MEUS DADOS </div> </a>
            <a href='#' class='fav'> <div class="parte2 parte"> MEUS PEDIDOS </div> </a>
            <a href='listadedesejos.php' class='fav'> <div class="parte3 parte"> MEUS FAVORITOS </div> </a>
            <a href='#' class='fav'> <div class="parte4 parte"> ENDEREÇOS </div> </a>
          </div>
    </div>


        




















        <a class="logoffgg" href="logoff.php">Sair</a>




    <?php
        include 'rodape.html'; 
    ?>
</body>
</html>

<?php

include 'db.php';

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
    header('Location: login.php?login=erro2');
    exit();
}

$user_id = $_SESSION['autenticado'];
$sql = "SELECT * FROM pedidos WHERE id = ? ORDER BY data_pedido DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $pedidos);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pedidos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>


<?php include 'cabecalho.php'; ?>

<div class="tudo">


    <div class="menuzin">

        <a href='meusdados.php' class='fav'> <div class="parte1 parte"> MEUS DADOS </div> </a>
        <a href='meus_pedidos.php' class='fav'> <div class="parte2 parte"> MEUS PEDIDOS </div> </a>
        <a href='listadedesejos.php' class='fav'> <div class="parte3 parte"> MEUS FAVORITOS </div> </a>
        <a href='#' class='fav'> <div class="parte4 parte"> ENDEREÇOS </div> </a>

    </div>



    <div class="pedidos">

        <div class="container mt-4">
            <h2>Meus Pedidos</h2>
            <?php if ($result->num_rows > 0): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID do Pedido</th>
                                <th>Data do Pedido</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($pedido = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($pedido['id']); ?></td>
                                    <td><?php echo htmlspecialchars($pedido['data_pedido']); ?></td>
                                    <td>R$ <?php echo number_format($pedido['total'], 2, ',', '.'); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Você ainda não fez nenhum pedido.</p>
                <?php endif; ?>
         </div>
         
    </div>
</div>
<?php include 'rodape.html'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
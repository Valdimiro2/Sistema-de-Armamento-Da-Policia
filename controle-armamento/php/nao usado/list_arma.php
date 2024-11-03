<?php
require_once("src/connection.php");

// Consulta para obter todas as armas
$sql = "SELECT * FROM armas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Armas</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

    <div class="container">
        <h2>Lista de Armas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Modelo</th>
                    <th>Número de Série</th>
                    <th>Estado</th>
                    <th>Data de Aquisição</th>
                    <th>Localização Atual</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($arma = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $arma['arma_id'] ?></td>
                        <td><?= $arma['tipo'] ?></td>
                        <td><?= $arma['modelo'] ?></td>
                        <td><?= $arma['numero_serie'] ?></td>
                        <td><?= $arma['estado'] ?></td>
                        <td><?= $arma['data_aquisicao'] ?></td>
                        <td><?= $arma['localizacao_atual'] ?></td>
                        <td>
                            <a href="edit_arma.php?id=<?= $arma['arma_id'] ?>">Editar</a>
                            <a href="delete_arma.php?id=<?= $arma['arma_id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>
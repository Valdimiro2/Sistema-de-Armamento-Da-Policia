<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("src/connection.php");
$conn = DataBase::getConnection();
$query = "
SELECT Atribuicoes.atribuicao_id, Oficiais.nome AS oficial, Armas.modelo AS arma, Atribuicoes.data_recebimento, Atribuicoes.data_entrega
FROM Atribuicoes
JOIN Oficiais ON Atribuicoes.oficial_id = Oficiais.oficial_id
JOIN Armas ON Atribuicoes.arma_id = Armas.arma_id";
$result = $conn->query($query);
?>

<h2>Histórico de Atribuições de Armas</h2>
<table class="table table-sm table-striped table-hover table-bordered w-100">
    <tr>
        <th>ID</th>
        <th>Oficial</th>
        <th>Arma</th>
        <th>Data de Atribuição</th>
        <th>Data de Devolução</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['oficial'] ?></td>
            <td><?= $row['arma']  ?></td>
            <td><?=$row['data_atribuicao']  ?></td>
            <td><?= $row['data_devolucao'] ? $row['data_devolucao'] : 'Ainda em uso'; ?></td>
        </tr>
    <?php endwhile; ?>
</table>
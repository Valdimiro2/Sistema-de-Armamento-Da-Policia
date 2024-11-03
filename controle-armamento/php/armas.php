<?php
// Listar todas as armas cadastradas no banco de dados
require_once("src/connection.php");
$result = DataBase::obterArmas();
?>
<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Modelo</th>
            <th>Número de Série</th>
            <th>Estado</th>
            <th>Acoes</th>
        </tr>
    </thead>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
        <td>{$row['arma_id']}</td>
        <td>{$row['tipo']}</td>
        <td>{$row['modelo']}</td>
        <td>{$row['numero_serie']}</td>
        <td>{$row['estado']}</td>
        <td>
        <a href='?page=edit_arma?id={$row['arma_id']}'>Editar</a> |
        <a href='?page=delete_arma?id={$row['arma_id']}'>Deletar</a>
        </td>
        </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Nenhuma arma encontrada</td></tr>";
    }
    $conn->close();
    ?>
</table>
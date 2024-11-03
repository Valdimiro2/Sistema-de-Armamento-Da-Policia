<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

// Listar todas as atribuições de armas para oficiais
require_once("src/connection.php");
$conn = DataBase::getConnection();
$sql = "SELECT * FROM atribuicoes";
$result = $conn->query($sql);

?><div class="container" style="max-width: 1200px;">

    <table class="table table-sm table-striped table-hover table-bordered w-100">
        <tr>
            <th>ID</th>
            <th>ID do oficial</th>
            <th>ID da Arma</th>
            <th>Data de Atribuicao</th>
            <th>Data de Entrega</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
            <td>{$row['atribuicao_id']}</td>
            <td>{$row['oficial_id']}</td>
            <td>{$row['arma_id']}</td>
            <td>{$row['data_recebimento']}</td>
            <td>{$row['data_entrega']}</td>
            </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Nenhuma atribuição encontrada</td></tr>";
        }
        $conn->close();
        ?>

    </table>
</div>
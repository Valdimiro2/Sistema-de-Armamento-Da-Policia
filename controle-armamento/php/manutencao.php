<?php
// Listar todas as armas em manutenção
require_once("src/connection.php");
$conn = DataBase::getConnection();
$sql = "SELECT * FROM Armas WHERE estado='em manutenção'";

$sql2 = "SELECT COUNT(*) AS cont from armas WHERE estado='em manutenção'";
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
?>
<table class="table table-sm table-striped table-hover table-bordered w-100">
    <tr>
        <th>id da arma</th>
        <th>tipo da arma</th>
        <th>modelo da arma</th>
        <th>número de série da arma</th>
        <th>estado da arma</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>{$row['arma_id']}</td>
            <td>{$row['tipo']}</td>
            <td>{$row['modelo']}</td>
            <td>{$row['numero_serie']}</td>
            <td>{$row['estado']}</td>
            </tr>";
        }
    ?>
</table>
<?php
        echo "<tr><td colspan='5'>Numero de Armas em manutencao:" . $result2->fetch_assoc()['cont'] . "</td></tr>";
    } else {
        echo "<tr><td colspan='5'>Nenhuma arma em manutenção</td></tr>";
    }

    $conn->close();

<?php
// Listar todos os oficiais cadastrados
require_once("src/connection.php");
$conn = DataBase::getConnection();
$sql = "SELECT * FROM oficiais";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['oficial_id']}</td>
                <td>{$row['nome']}</td>
                <td>{$row['patente']}</td>
                <td>{$row['unidade']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>Nenhum oficial encontrado</td></tr>";
}

$conn->close();

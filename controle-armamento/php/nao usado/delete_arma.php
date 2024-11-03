<?php
require_once("src/connection.php");
$conn = DataBase::getConnection();

if (isset($_GET['id'])) {
    $arma_id = $_GET['id'];

    // Query para deletar a arma
    $sql = "DELETE FROM armas WHERE arma_id = $arma_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Arma excluída com sucesso!'); window.location.href = 'list_arma.php';</script>";
    } else {
        echo "Erro ao excluir arma: " . $conn->error;
    }
}

$conn->close();

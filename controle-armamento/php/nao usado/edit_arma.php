<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// // Conexão com o banco de dados
// require_once("src/connection.php");
// $conn=DataBase::getConnection();
// // Verificar se um ID foi passado e buscar a arma para edição
// if (isset($_GET['id'])) {
//     $arma_id = $_GET['id'];
//     $sql = "SELECT * FROM armas WHERE arma_id =".$_GET['id'];
//     $result = $conn->query($sql);

//     if ($result->num_rows > 0) {
//         $arma = $result->fetch_assoc();
//     } else {
//         echo "Arma não encontrada.";
//         exit;
//     }
// }

// // Verificar se o formulário foi enviado para atualizar os dados
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $arma_id = $_POST['arma_id'];
//     $tipo = $_POST['tipo'];
//     $modelo = $_POST['modelo'];
//     $numero_serie = $_POST['numero_serie'];
//     $estado = $_POST['estado'];
//     $data_aquisicao = $_POST['data_aquisicao'];
//     $localizacao_atual = $_POST['localizacao_atual'];

//     // // Query de atualização
//     // $sql = "UPDATE armas SET 
//     //             tipo = '$tipo', 
//     //             modelo = '$modelo', 
//     //             numero_serie = '$numero_serie', 
//     //             estado = '$estado', 
//     //             data_aquisicao = '$data_aquisicao', 
//     //             localizacao_atual = '$localizacao_atual' 
//     //         WHERE arma_id = $arma_id";

//     // if ($conn->query($sql) === TRUE) {
//     //     echo "<script>alert('Arma atualizada com sucesso!'); window.location.href = 'list_arma.php';</script>";
//     // } else {
//     //     echo "Erro ao atualizar arma: " . $conn->error;
//     // }
// }
// $conn->close();
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Arma</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

    <div class="container">
        <h2>Editar Arma</h2>
        <form action="edit_arma.php" method="POST">
            <input type="hidden" name="arma_id" >

            <label for="tipo">Tipo de Arma:</label>
            <input type="text" id="tipo" name="tipo" required><br>

            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo"  required><br>

            <label for="numero_serie">Número de Série:</label>
            <input type="text" id="numero_serie" name="numero_serie" required><br>

            <label for="estado">Estado:</label>
    

            <label for="data_aquisicao">Data de Aquisição:</label>
            <input type="date" id="data_aquisicao" name="data_aquisicao"  required><br>

            <label for="localizacao_atual">Localização Atual:</label>
            <input type="text" id="localizacao_atual" name="localizacao_atual"required><br>

            <button type="submit">Atualizar Arma</button>
        </form>
    </div>

</body>

</html>
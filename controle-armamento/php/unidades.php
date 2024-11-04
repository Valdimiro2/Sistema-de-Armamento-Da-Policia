<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("src/connection.php");
$conn=DataBase::getConnection();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
try{
    $nome_unidade = $_POST['nome_unidade'];
    $localizacao = $_POST['localizacao'];

    $sql = "INSERT INTO Unidades (nome_unidade, localizacao) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nome_unidade, $localizacao);

    if ($stmt->execute()) {
        // header("Location: list_unidades.php");
        // echo "<script>showMessage('Erro ao adicionar arma: " . $conn->connect_error . "', 'error');</script>";
        $mensagem = "A unidade foi cadastrada com sucesso!";

        // Usa o `echo` para imprimir o código JavaScript que exibirá a mensagem
        echo "<script type='text/javascript'>
        Swal.fire({
            title: 'Mensagem',
            text: '$mensagem',
            icon: 'info',
            confirmButtonText: 'OK'
        });
      </script>";
    } else {
        echo "<script type='text/javascript'>
        Swal.fire({
            title: 'Mensagem',
            text: 'Erro ao adicionar unidade $stmt->error',
            icon: 'info',
            confirmButtonText: 'OK'
        });
      </script>";
    }

    $stmt->close();
}catch(Exception $erro){
echo"$erro";

}
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Adicionar Unidade</title>
</head>

<body>

    <h2>Adicionar Nova Unidade</h2>
    <div class="container d-flex align-items-center" style="max-width: 800px;">
        <form action="#" class="form-control " method="POST">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label" for="nome_unidade">Nome da Unidade:</label>
                    <input class="form-control" type="text" id="nome_unidade" name="nome_unidade" required><br>
                </div>

                <div class="col-md-6 ">
                    <label class="form-label" for="localizacao">Localização:</label>
                    <input class="form-control" type="text" id="localizacao" name="localizacao" required><br>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Adicionar Unidade</button>
        </form>
    </div>

</body>

</html>
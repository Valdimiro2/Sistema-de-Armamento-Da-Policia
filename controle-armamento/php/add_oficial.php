<?php
// Exibir erros para depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexão com o banco de dados
require_once("src/connection.php");
$conn = DataBase::getConnection();

$sql = "SELECT * FROM unidades";

$result1 = $conn->query($sql);
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Receber dados do formulário
    try {
        $numero_agente = $_POST['numero_agente'];
        $nome_agente = $_POST['nome'];
        $posto = $_POST['posto'];
        $unidade = $_POST['unidade'];

        $conn = DataBase::getConnection();
        $checkSql = "SELECT * FROM armas WHERE numero_serie = ?";

        $stmt = $conn->prepare($checkSql);
        $stmt->bind_param("s", $numero_agente);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $mensagem = "Já existe um Agente com este número de Agente";
            echo "<script type='text/javascript'>
            Swal.fire({
                title: 'Alert',
                text: '$mensagem',
                icon: 'info',
                confirmButtonText: 'OK'
            }); 
            </script>";
        } else {
            // Inserir dados no banco de dados
            $sql = "INSERT INTO oficiais (nome, posto, matricula, unidade_atual) 
            VALUES ('$nome_agente', '$posto', '$numero_agente', '$unidade')";

            if ($conn->query($sql)) {
                $mensagem = "Oficial Cadastrado com successo";

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
                echo "<script>showMessage('Erro ao adicionar arma: " . $conn->connect_error . "', 'error');</script>";
            }
        }
    } catch (Exception $erro) {
        if (stripos($erro->getMessage(), 'Duplicate entry')) {
            echo "<script type='text/javascript'>showMessage('Ja existe um usuario com esses dados, por favor corrija', 'error');</script>";
        }
    }
}
?>
<div class="container">
    <h2>Adicionar Novo Oficial</h2>
    <form id="addArmaForm" class="form-control" action="#" method="POST">
        <div class="container mt-5">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="numero_agente" class="form-label">Número de Agente:</label>
                    <input type="text" class="form-control" id="numero_agente" name="numero_agente" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="nome">Nome do Agente:</label>
                    <input class="form-control" type="text" id="nome" name="nome" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="posto">Posto:</label>
                    <input class="form-control" type="text" id="posto" name="posto" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label" for="unidade">Unidade Atual:</label>
                    <select class="form-control" id="unidade" name="unidade" required>
                        <?php
                        while ($row = $result1->fetch_assoc()):
                        ?>
                            <option value="<?= $row['unidade_id'] ?>"><?= $row['nome_unidade'] ?></option>
                        <?php endwhile ?>
                    </select><br>
                </div>
            </div>

            <div class="row">
                <div class="col-md-13">
                    <button class="btn btn-primary btn-lg" type="submit">Adicionar Oficial</button>

                </div>

            </div>





    </form>

    <div id="message" class="message"></div>
</div>
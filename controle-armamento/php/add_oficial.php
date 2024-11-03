<?php
// Exibir erros para depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexão com o banco de dados
require_once("src/connection.php");
$conn = DataBase::getConnection();

$sql = "SELECT * FROM unidades";

$result = $conn->query($sql);
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
    } catch (Exception $erro) {
        if (stripos($erro->getMessage(), 'Duplicate entry')) {
            echo "<script type='text/javascript'>showMessage('Ja existe um usuario com esses dados, por favor corrija', 'error');</script>";
        }
    }
}
?>
<div class="container">
    <h2>Adicionar Nova Arma</h2>
    <form id="addArmaForm" class="form-control" action="#" method="POST">
        <div class="container mt-5">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="tipo_arma" class="form-label">Tipo de Arma:</label>
                    <input type="text" class="form-control" id="tipo_arma" name="tipo_arma" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="numero_serie">Número de Série:</label>
                    <input class="form-control" type="text" id="numero_serie" name="numero_serie" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="modelo">Modelo:</label>
                    <input class="form-control" type="text" id="modelo" name="modelo" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label" for="data_aquisicao">Data de Aquisição:</label>
                    <input class="form-control" type="date" id="data_aquisicao" name="data_aquisicao" required><br>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="estado_arma">Estado:</label>
                    <select class="form-control" id="estado_arma" name="estado_arma" required>
                        <option value="disponível">Disponível</option>
                        <option value="em manutenção">Em Manutenção</option>
                        <option value="danificada">Danificada</option>
                    </select><br>
                </div>

                <div class="col-md-4">
                    <label class="form-label" for="localizacao_atual">Localização Atual:</label>
                    <select class="form-control" id="localizacao_atual" name="localizacao_atual" required>
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
                    <button class="btn btn-primary btn-lg" type="submit">Adicionar Arma</button>

                </div>

            </div>





    </form>

    <div id="message" class="message"></div>
</div>
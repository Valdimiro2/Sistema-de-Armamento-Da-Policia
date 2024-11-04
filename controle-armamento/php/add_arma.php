<?php
// Exibir erros para depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$mensagem;
$mensagemTipo;
// Conexão com o banco de dados
require_once("src/connection.php");
$conn = DataBase::getConnection();

if (!$conn) {
    die("Erro na conexão com o banco de dados");
}

$sql = "SELECT * FROM unidades";
$result1 = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Receber dados do formulário
        $tipo_arma = $_POST['tipo_arma'];
        $modelo = $_POST['modelo'];
        $numero_serie = $_POST['numero_serie'];
        $estado_arma = $_POST['estado_arma'];
        $data_aquisicao = $_POST['data_aquisicao'];
        $localizacao_atual = $_POST['localizacao_atual'];

        // Inserir dados no banco de dados com prepared statements
        $stmt = $conn->prepare("INSERT INTO armas (tipo, modelo, numero_serie, estado, data_aquisicao, localizacao_atual) 
                                VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $tipo_arma, $modelo, $numero_serie, $estado_arma, $data_aquisicao, $localizacao_atual);

        if ($stmt->execute()) {
            $mensagem = "Arma adicionada com sucesso";
            $mensagemTipo = 'success';
        } else {
            // Verificar se o erro é de duplicidade (código 1062)
            if ($conn->errno == 1062) {
                $mensagem = "Erro: Número de série já existe. Por favor, insira um número de série único.";
            } else {
                $mensagem = "Erro ao adicionar arma: " . $conn->error;
            }
            $mensagemTipo = 'error';
        }

        $stmt->close();

        // Exibir a mensagem com SweetAlert
        echo "<script type='text/javascript'>
            Swal.fire({
                title: 'Mensagem',
                text: '$mensagem',
                icon: '$mensagemTipo',
                confirmButtonText: 'OK'
            });
        </script>";

    } catch (Exception $erro) {
        $mensagem = $erro->getMessage();
        echo "<script type='text/javascript'>
            Swal.fire({
                title: 'Erro',
                text: '$mensagem',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>";
    }
}
?>

<div class="container">
    <h2>Adicionar Novas Armas</h2>
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
                        <?php while ($row = $result1->fetch_assoc()): ?>
                            <option value="<?= $row['unidade_id'] ?>"><?= $row['nome_unidade'] ?></option>
                        <?php endwhile; ?>
                    </select><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary btn-lg" type="submit">Adicionar Arma</button>
                </div>
            </div>
        </div>
    </form>
</div>

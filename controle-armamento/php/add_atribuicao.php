<?php
require_once("src/connection.php");
$conn = DataBase::getConnection();

$result = DataBase::obterOficiais();
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
                <div class="col-md-6">
                    <label class="form-label" for="localizacao_atual">Número de agente:</label>
                    <select class="form-control" id="localizacao_atual" name="localizacao_atual" required>
                        <?php
                        while ($row = $result->fetch_assoc()):
                        ?>
                            <option value="<?= $row['matricula'] ?>"><?= $row['nome'] . "===" . $row['matricula'] ?></option>
                        <?php endwhile ?>
                    </select><br>
                </div>
            </div>

            <div class="row">
                <div class="col-md-13">
                    <button class="btn btn-primary btn-lg" type="submit">Adicionar Arma</button>

                </div>

            </div>
        </div>
    </form>

    <div id="message" class="message"></div>
</div>
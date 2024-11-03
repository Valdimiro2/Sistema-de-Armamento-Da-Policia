<?php
// Listar todas as armas em manutenção
require_once("src/connection.php");
$conn = DataBase::getConnection();
$sql2 = "SELECT COUNT(*) AS cont from armas WHERE estado='danificada'";

$result2 = $conn->query($sql2);


$conn->close();
?>
<div class="summary-box bg-danger text-white d-flex align-items-center m-2 justify-content-center rounded float-end" style="height: 6rem; width: 350px; font-size: 1.5rem;" style="width: 200px; margin-left: auto;">
    <i class="bi bi-tools"></i> <!-- Adiciona margem à direita do ícone -->
    <div>
        <p class="titulo mb-0">Armas Danificadas</p>
        <h3 class="value mb-0"><?= $result2->fetch_assoc()['cont'] ?></h3>
    </div>
</div>
<?php
// Listar todas as armas em manutenção
require_once("src/connection.php");
$conn = DataBase::getConnection();

$sql2 = "SELECT COUNT(*) AS cont from armas WHERE estado='em manutenção'";


$result2 = $conn->query($sql2);


$conn->close();
?>
<div class="summary-box bg-warning text-white d-flex align-items-center m-2 justify-content-center rounded float-end" style="height: 6rem; width: 350px; font-size: 1.5rem;" style="width: 200px; margin-left: auto;">
    <i class="bi bi-tools"></i> <!-- Adiciona margem à direita do ícone -->
    <div>
        <p class="titulo mb-0">Armas em manutencao</p>
        <h3 class="value mb-0"><?= $result2->fetch_assoc()['cont'] ?></h3>
    </div>
</div>
<?php
// Listar todas as armas em manutenção
require_once("src/connection.php");
$conn = DataBase::getConnection();

$sql2 = "SELECT COUNT(*) AS cont from armas WHERE estado='disponível' and ocupada='nao'";

$result2 = $conn->query($sql2);


$conn->close();
?>


<div class="summary-box bg-success text-white d-flex align-items-center m-2 justify-content-center rounded float-end" style="height: 6rem; width: 350px; font-size: 1.5rem;" style="width: 200px; margin-left: auto;">
    <i class="bi bi-tools"></i> <!-- Adiciona margem à direita do ícone -->
    <div>
        <p class="titulo mb-0">Armas Disponiveis</p>
        <h3 class="value mb-0"><?= $result2->fetch_assoc()['cont'] ?></h3>
    </div>
</div>

<?php
// Listar todas as armas em manutenção
require_once("src/connection.php");
$conn = DataBase::getConnection();

$sql2 = "SELECT COUNT(*) AS cont from atribuicoes WHERE data_entrega IS NULL";

$result2 = $conn->query($sql2);


$conn->close();
?>


<div class="summary-box bg-primary text-white d-flex align-items-center m-2 justify-content-center rounded float-end" style="height: 6rem; width: 350px; font-size: 1.5rem;" style="width: 200px; margin-left: auto;">
    <i class="bi bi-tools"></i> <!-- Adiciona margem à direita do ícone -->
    <div>
        <p class="titulo mb-0">Armas Atribuidas</p>
        <h3 class="value mb-0"><?= $result2->fetch_assoc()['cont'] ?></h3>
    </div>
</div>
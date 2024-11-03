<?php
require_once("src/connection.php");
$conn = DataBase::getConnection();
$query = "
SELECT Oficiais.oficial_id, Oficiais.nome, Oficiais.unidade_atual
FROM Oficiais
LEFT JOIN Atribuicoes ON Oficiais.oficial_id = Atribuicoes.oficial_id
WHERE Atribuicoes.oficial_id IS NULL";
$result = $conn->query($query);

?>

<h2>Oficiais sem Armas</h2>
<center>

    <table class="table table-sm table-striped table-hover table-bordered w-50">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Unidade</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)):
        $result2 = $conn->query("SELECT nome_unidade from unidades where unidade_id='" . $row['unidade_atual'] . "'"); ?>
        <tr>
            <td><?php echo $row['oficial_id']; ?></td>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $result2->fetch_assoc()['nome_unidade']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</center>
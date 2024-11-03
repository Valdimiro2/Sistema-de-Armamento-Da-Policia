<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQvqP5EgUEmSnVt+JUVPQh1pka1PtF6UJgD8vOmFbQ1o2u5AxD2WAMj9U" crossorigin="anonymous">

<?php
require_once("src/connection.php");
$conn = DataBase::getConnection();
$query = "SELECT * FROM Armas WHERE estado = 'disponível' and ocupada='nao'";
$result = $conn->query($query);
?>

<div class="container my-4">
    <h2 class="text-center mb-4">Armas Disponíveis</h2>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Modelo</th>
                <th>Número de Série</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['arma_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['tipo']); ?></td>
                    <td><?php echo htmlspecialchars($row['modelo']); ?></td>
                    <td><?php echo htmlspecialchars($row['numero_serie']); ?></td>
                    <td><?php echo htmlspecialchars($row['estado']); ?></td>
                    
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
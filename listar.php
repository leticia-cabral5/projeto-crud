<?php
$host = "localhost";
$banco = "projeto_crud";
$usuario = "postgres";
$senha = "SUA_SENHA";

try {
    $pdo = new PDO(
        "pgsql:host=$host;dbname=$banco",
        $usuario,
        $senha
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM tarefas ORDER BY id";
    $stmt = $pdo->query($sql);

    $tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    $erro = "Erro ao conectar ao banco de dados.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de tarefas</title>
</head>
<body>

    <h1>Lista de tarefas</h1>

    <?php if (isset($erro)): ?>
        <p><?= htmlspecialchars($erro) ?></p>
    <?php else: ?>

        <table border="1" cellpadding="8">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Status</th>
            </tr>

            <?php foreach ($tarefas as $tarefa): ?>
                <tr>
                    <td><?= htmlspecialchars($tarefa["id"]) ?></td>
                    <td><?= htmlspecialchars($tarefa["titulo"]) ?></td>
                    <td><?= htmlspecialchars($tarefa["descricao"] ?? "") ?></td>
                    <td><?= htmlspecialchars($tarefa["status"]) ?></td>
                </tr>
            <?php endforeach; ?>

        </table>

    <?php endif; ?>

</body>
</html>
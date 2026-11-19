<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST["nome"]);
    $mensagem = htmlspecialchars($_POST["mensagem"]);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contato</title>
</head>
<body>

    <h1>Formulário de contato</h1>

    <form method="POST" action="">
        <label>Nome:</label>
        <input type="text" name="nome" required>

        <br><br>

        <label>Mensagem:</label>
        <textarea name="mensagem" required></textarea>

        <br><br>

        <button type="submit">Enviar</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h2>Dados enviados:</h2>
        <p>Nome: <?= $nome ?></p>
        <p>Mensagem: <?= $mensagem ?></p>
    <?php endif; ?>

</body>
</html>
<?php include 'banco.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Cadastrar Usuário</h2>

<form method="POST">
    <label>Nome:</label><br>
    <input type="text" name="nome" required><br><br>

    <label>E-mail:</label><br>
    <input type="email" name="email" required><br><br>

    <button type="submit" name="gravar">Gravar</button>
    <a href="index.php" class="cancelar">Cancelar</a>
</form>

<?php
if (isset($_POST['gravar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";
    if ($conn->query($sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

</body>
</html>
<?php
include 'banco.php';
$id = $_GET['id'];

$sql = "SELECT * FROM usuarios WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Editar Usuário: <?= $row['nome'] ?></h2>

<form method="POST">
    <label>Nome:</label><br>
    <input type="text" name="nome" value="<?= $row['nome'] ?>" required><br><br>

    <label>E-mail:</label><br>
    <input type="email" name="email" value="<?= $row['email'] ?>" required><br><br>

    <button type="submit" name="salvar">Salvar Alterações</button>
    <a href="index.php" class="cancelar">Cancelar</a>
</form>

<?php
if (isset($_POST['salvar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}
?>

</body>
</html>
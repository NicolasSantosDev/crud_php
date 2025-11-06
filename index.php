<?php include 'banco.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Lista de Usuários</h1>
<a href="add.php" class="cadastro">Cadastro</a>

<table>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Ação</th>
    </tr>

    <?php
    $sql = "SELECT * FROM usuarios ORDER BY id ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0):
        while($row = $result->fetch_assoc()):
    ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["nome"] ?></td>
            <td><?= $row["email"] ?></td>
            <td>
                <a href="delete.php?id=<?= $row['id'] ?>" class="del">Deletar</a>
                <a href="edit.php?id=<?= $row['id'] ?>" class="edit">Editar</a>
            </td>
        </tr>
    <?php endwhile; endif; ?>
</table>

</body>
</html>
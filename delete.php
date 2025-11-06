<?php
include 'banco.php';

$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id=$id";

if ($conn->query($sql)) {
    header("Location: index.php");
    exit;
} else {
    echo "Erro ao deletar: " . $conn->error;
}
?>
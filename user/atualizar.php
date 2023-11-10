<?php
// Certifique-se de receber o ID do usuário corretamente
$id = $_GET['id'];

// Conecta ao banco de dados
$conexao = new PDO('mysql:host=127.0.0.1;dbname=volta-ao-mundo', 'root', '');

// Atualiza o status para "Lido" (1)
$sql = "UPDATE tb_usuarios SET status = 1 WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

// Redireciona de volta para a página listar.php após a atualização
header('Location: listar.php');
?>

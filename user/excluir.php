<?php
// Inclui o arquivo que contém a definição da classe Usuário
require_once '../classes/Usuario.php';

// Obtém o valor do parâmetro "id" da URL e armazena em variável
$id = $_GET['id'];

// Cria um novo objeto Usuário
$usuario = new Usuario($id);

// Chama o método "excluir" do objeto Usuário
$usuario->excluir();

// Redireciona o usuário para a página "listar.php"
header('Location: listar.php');
?>
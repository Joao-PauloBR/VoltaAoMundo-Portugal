<?php
// Inclui o arquivo que contém a definição da classe Usuário
require_once "../classes/Usuario.php";

// Cria um novo objeto Usuário
$usuario = new Usuario();

// Define as propriedades Nome, Sobrenome, E-mail e Mensagem e Status do objeto Usuário com os valores enviados pelo formulário
$usuario->nome = $_POST['nome'];
$usuario->sobrenome = $_POST['sobrenome'];
$usuario->email = $_POST['email'];
$usuario->mensagem = $_POST['mensagem'];

// Chama o método inserir() no objeto Turma para inserir os dados da nova turma no banco de dados
$usuario->inserir();

?>
<?php
$email = $_POST["email"];
$senhaLimpa = $_POST["senha"];
$senha = hash("sha256", $senhaLimpa);;

$sql = "SELECT * FROM tb_adm WHERE email = :email AND senha = :passwd";
$conexao = new PDO('mysql:host=127.0.0.1;dbname=volta-ao-mundo', 'root', '');

$resultado = $conexao->prepare($sql);
$resultado->bindParam(':email', $email);
$resultado->bindParam(':passwd', $senha);
$resultado->execute();

$linha = $resultado->fetch();

$usuario_logado = $linha['email'];
if ($usuario_logado == null) {
	// Usuário ou senha inválida
	header('Location: erro.php');
}
else {
	session_start();
	$_SESSION['usuario_logado'] = $usuario_logado;
	header('Location: ../user/listar.php');
}
?>

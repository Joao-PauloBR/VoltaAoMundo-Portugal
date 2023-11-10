<?php
try {
    $email = $_POST['email'];  // Corrigido para usar a variável correta

    // Gera um hash SHA-256 da senha recebida pelo formulário
    $senha = hash("sha256", $_POST["senha"]);

    // Cria uma nova instância da classe DateTime e obtém a data atual no formato "dia-mês-ano"
    $now = new DateTime();
    $date = $now->format('d-m-Y');

    $sql = "INSERT INTO tb_adm (email, senha, datacad) VALUES ('{$email}','{$senha}', '{$date}')";

    include_once "../classes/conexao.php";
    $conexao->exec($sql);
    echo "<h2>Registro gravado com sucesso!</h2>";
    echo "<h3><a href='login.html'>Fazer login</a></h3>";
} catch (Exception $erro) {
    // Habilitar o código abaixo para depurar o erro
    echo $erro->getMessage();
    echo "<h2>Ocorreu um erro. Por favor, tente novamente mais tarde.</h2>";
}
?>

<?php
require 'conexao.php';

class Usuario {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }
    public function buscarMensagens() {
        $sql = "SELECT id, nome, email, mensagem, data_envio, respondida, resposta FROM mensagens";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function autenticarUsuario($nomeUsuario, $senha) {
        $sql = "SELECT id, nome, senha FROM usuarios WHERE nome = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$nomeUsuario]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && password_verify($senha, $row['senha'])) {
            return $row;
        }
        return null;
    }
}
?>
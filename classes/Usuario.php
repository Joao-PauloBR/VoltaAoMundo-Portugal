<?php
class Usuario
{
    public $id;
    public $nome;
    public $sobrenome;
    public $email;
    public $mensagem;
    public $status = 0; // Definindo status como não respondido (falso) por padrão

    // define um método construtor na classe e recebe um parâmetro opcional $id
    public function __construct($id = false)
	{
        // verifica se a variável $id foi definida
		if ($id){
            // atribui o valor de $id à propriedade $id do objeto
            $this->id = $id;                
            // chama o método carregar() para carregar as informações do Usuário correspondente ao id
            $this->carregar();
        }
	}

    public function inserir()
    {
        // Define a string SQL de inserção de dados na tabela "tb_usuarios"
        $sql = "INSERT INTO tb_usuarios (nome, sobrenome, email, mensagem, `status`) VALUES (
            '" .$this->nome. "' ,
            '" .$this->sobrenome. " ',
            '" .$this->email. "' ,
            '" .$this->mensagem. "',
            " .$this->status. "
        )";

        // Cria uma nova conexão PDO com o banco de dados "volta-ao-mundo"
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=volta-ao-mundo','root','');

        // Executa a string SQL na conexão, inserindo os dados na tabela "tb_usuarios"
        $conexao->exec($sql);

        echo "<h2>Registro gravado com sucesso!</h2>";
        echo "<h3><a href='../index.html'>Voltar para o Início</a></h3>";
    }

    public function listar()
	{
        // Define a string SQL para selecionar todos os registros da tabela
        $sql = "SELECT * FROM tb_usuarios";

        // Cria uma nova conexão PDO com o banco de dados "volta-ao-mundo"
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=volta-ao-mundo','root','');

        // Executa a string SQL na conexão retornando um objeto de resultado
        $resultado = $conexao->query($sql);

        // Extrai todos os registros do objeto e os armazena em um array
        $lista = $resultado->fetchAll();

        // Retorna o array contendo todos os registros da tabela "tb_usuarios"
        return $lista;
	}

    public function excluir()
	{
        // Define a string de consulta SQL para deletar um registro da tabela "tb_usuarios" com base no seu ID
        $sql = "DELETE FROM tb_usuarios WHERE id=".$this->id;

        // Cria uma nova conexão PDO com o banco de dados "volta-ao-mundo" localizado
        // no servidor "127.0.0.1" e autentica com o usuário "root" (sem senha)
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=volta-ao-mundo','root','');

        // Executa a instrução SQL de exclusão utilizando o método "exec" do objeto de conexão PDO criado acima
        $conexao->exec($sql);
	}

    public function carregar()
    {
        // Query SQL para buscar um Usuário no banco de dados pelo id
        $sql = "SELECT * FROM tb_usuarios WHERE id=" . $this->id;
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=volta-ao-mundo', 'root', '');

        // Execução da query e armazenamento do resultado em uma variável
        $resultado = $conexao->query($sql);
        // Recuperação da primeira linha do resultado como um array associativo
        $linha = $resultado->fetch();

        // Atribuição dos valores dos campos do Usuário recuperados do banco às propriedades do objeto
        $this->nome = $linha['nome'];
        $this->sobrenome = $linha['sobrenome'];
        $this->email = $linha['email'];
        $this->mensagem = $linha['mensagem'];
        $this->status = $linha['status'];
    }

    public function atualizar()
    {
        // Query SQL para atualizar um usuário no banco de dados pelo id
        $sql = "UPDATE tb_usuarios SET 
                    nome = '$this->nome' ,
                    sobrenome = '$this->sobrenome' ,
                    email = '$this->email' ,
                    mensagem = '$this->mensagem' ,
                    `status` = '$this->status'                   
                WHERE id = $this->id ";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=volta-ao-mundo', 'root', '');
        $conexao->exec($sql);
    }

    public function atualizarStatus()
    {
        // Verifica se o status atual é "Não respondida" antes de atualizar para "Respondida"
        if ($this->status === 'Não respondida') {
            $this->status = 'Respondida';
        }
    }
}

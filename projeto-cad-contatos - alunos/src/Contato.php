<?php

require_once 'Conexao.php';


class Contato
{
    //criar variáveis para manipular os dados a serem salvos
    private $id;
    private $nome;
    private $endereco;
    private $email;
    private $conectar;

    public function __construct()
    {
        //instancia (permite usar) a classe de conexão
        $this->conectar = new Conexao();
    }

    //recebe os dados da tela, e armazena no banco de dados
    public function insert($dados): bool
    {
        try {
            $this->nome = $dados['nome'];
            $this->endereco = $dados['endereco'];
            $this->email = $dados['email'];
            $stmt = $this->conectar->conectar()->prepare("INSERT INTO contato (NOME,ENDERECO, EMAIL) VALUES (:nome, :endereco, :email)");
            $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $stmt->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
            $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    //lista todos os dados da tabela contatos
    public function select()
    {
        try {
            $stmt = $this->conectar->conectar()->prepare("SELECT * FROM contato");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    //lista somente um contato da tabela contato
    public function selectOne($id)
    {
        try {
            $stmt = $this->conectar->conectar()->prepare("SELECT ID, NOME, ENDERECO, EMAIL FROM contato WHERE ID = ? LIMIT 1");
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $result = [];
            $result = $stmt->fetchall();
            return $result;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    //atualiza os dados da tabela contatos, através de dados enviados da tela
    public function updade($dados)
    {
        try {
            //var_dump($dados);
            $this->id = $dados['id'];
            $this->nome = $dados['nome'];
            $this->endereco = $dados['endereco'];
            $this->email = $dados['email'];
            $stmt = $this->conectar->conectar()->prepare("UPDATE contato SET NOME = :nome, ENDERECO = :endereco, EMAIL = :email WHERE ID = :id;");
            $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
            $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $stmt->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
            $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
            $stmt->execute();
            header('location: Index.php');
            return $stmt;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    //deleta os dados da tabela através de identificados informado
    public function delete($dado)
    {
        try {
            $this->id = $dado['id'];
            $stmt = $this->conectar->conectar()->prepare("DELETE FROM contato WHERE ID = :id;");
            $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
            $stmt->execute();
            header('location: Index.php');
            return $stmt;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}
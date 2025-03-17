<?php


class Conexao
{
    private $usuario;//usuario do banco de dados
    private $senha;//senha do usuario do bd
    private $banco;//nome do bd
    private $servidor;//endereço do servidor web
    private static $pdo;//varável para manipular as informações


    public function __construct()//recebe as informações e as configura
    {
        $this->usuario = "vinicius";
        $this->senha = "4!zUH59s&I9A";
        $this->banco = "projetoSemMvc";
        $this->servidor = "localhost";
    }

    public function conectar()
    {//tenta conectar ao banco com as infos se der ok, se não retorna erro
        try{
            if(is_null(self:: $pdo)){
                self::$pdo = new PDO("mysql:host=".$this->servidor.";dbname=".$this->banco, $this->usuario, $this->senha);
                // echo "conectado";
            }
            return self::$pdo;
        }catch (PDOException $e){
            echo 'Erro: '. $e->getMessage();
        }
    }

}

// $conecta = new Conexao();
// $conecta->conectar();
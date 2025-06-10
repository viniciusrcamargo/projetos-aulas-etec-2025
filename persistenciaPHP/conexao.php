<?php

//Configuração do banco de dados
define('DB_SERVER', 'localhost');//define local do servidor
define('DB_USERNAME', 'root');//usuário do banco de dados
define('DB_PASSWORD', '%vBV6c4B7$');//senha do banco de dados
define('DB_NAME', 'banco_persistencia_php');//nome do banco de dados

//try catch tratamento de erros ou excessões
try {
    $conexao = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
    $conexao->set_charset("utf8");
    //echo 'Conexão feita com sucesso!';
} catch (\Throwable $erro) {
    echo "Erro na conexão com o banco de dados " . $erro;
}
//cria conexão com banco de dados





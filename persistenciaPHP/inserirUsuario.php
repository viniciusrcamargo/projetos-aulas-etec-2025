<?php
//inclui arquivo de conexão
require_once 'conexao.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $conexao->real_escape_string(trim($_POST['nome']));
    $email = $conexao->real_escape_string(trim($_POST['email']));

    if(empty($nome) || empty($email)){
        echo "Preencha os dados necessários";
    }else{
        try {
            $sql = "INSERT INTO usuarios (nome,email) VALUES (?, ?)";
    
            if($stmt = $conexao->prepare($sql)){
                $stmt->bind_param("ss", $param_nome, $param_email);
                $param_nome = $nome;
                $param_email = $email;
            }
    
            $stmt->execute();
        } catch (\Throwable $erro) {
            echo "Erro ao inserir os dados " . $erro;
        }

    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
</head>
<body>
    <h1>Cadastro de Usuários</h1>
    <form action="" method="POST">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome"/>
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email"/>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>


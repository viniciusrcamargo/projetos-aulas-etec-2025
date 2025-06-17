<?php

require_once 'conexao.php';

$id = $_GET['id'] ?? null;
$nome = '';
$email = '';
$mensagem = '';

if($id){
     try {
        $sql = "SELECT NOME, EMAIL FROM usuarios WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $param_id);
        $param_id = $id;
        $stmt->execute();
        $stmt->bind_result($nome,$email);
        $stmt->fetch();
        $stmt->close();
     } catch (\Throwable $erro) {
        echo "Erro ao recuperar usuário " . $erro; 
     }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $nome = $conexao->real_escape_string(trim($_POST['nome']));
    $email = $conexao->real_escape_string(trim($_POST['email']));

    if(!empty($nome) || !empty($email)){
        try {
            $sql = "UPDATE usuarios SET nome = ?, email = ? WHERE id = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("ssi", $param_nome, $param_email, $param_id);
            $param_nome = $nome;
            $param_email = $email;
            $param_id = $id;
            if($stmt->execute()){
                $mensagem = "Usuário atualizado com sucesso";
                header("location: index.php");
                exit();
            }else{
                $mensagem = "Erro ao atualizar o usuario";
            }

        } catch (\Throwable $erro) {
             $mensagem = "Erro ao atualizar o usuario" . $erro;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Edição de Usuários</h1>
    <?php if(!empty($mensagem)) echo "<p style='color: green'>$mensagem</p>"; ?>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id);?>"/>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($nome);?>"/>
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email);?>"/>
        <button type="submit">Atualizar</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>
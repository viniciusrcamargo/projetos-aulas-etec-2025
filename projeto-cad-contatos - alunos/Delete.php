<?php 
  
  require_once './src/contato.php';

  $contato = new Contato();

  if(!empty($_GET['id'])){//não está vazio o id
    $listClients = [];
    $listClients = $contato->selectOne( $_GET['id']);
  }

  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($contato->delete($_POST) === true){
        header('location: Index.php');
    }
  }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Edição de Contatos</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<fieldset class="formulario container">
    <form action="Delete.php" method="post">
        <?php if(!empty($listClients)) { foreach($listClients as $list) {?>
        <input type="hidden" name="id" value="<?php echo $list['ID'];?>">
        <label for="nome">Nome</label>
        <input type="text" class="input-padrao" id="nome" name="nome" value="<?php echo $list['NOME']; ?>" required>

        <label for="endereco">Endereço</label>
        <input type="text" class="input-padrao" id="endereco" name="endereco" value="<?php echo $list['ENDERECO']; ?>" required>

        <label for="endereco">E-mail</label>
        <input type="email" class="input-padrao" id="endereco" name="email" value="<?php echo $list['EMAIL']; ?>" required>
        <?php }}?>
        <button type="submit" class="botao-padrao botao-deletar">Deletar</button>

    </form>
</fieldset>
</body>
</html>
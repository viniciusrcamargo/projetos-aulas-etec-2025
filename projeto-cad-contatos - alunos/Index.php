<?php

require './src/Contato.php';

$contato = new Contato();//instancia da Classe Contato

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $contato->insert($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/Style.css">
    <title>Cadastro de Contatos</title>
</head>
<body>
<header>
    <h1 class="titulo">Cadastro de Contatos</h1>
</header>
<main>
    <fieldset class="formulario container">
        <form action="Index.php" method="POST" class="formulario container">
            <label for="nome" >Nome</label>
            <input type="text" id="nome" class="input-padrao" name="nome" required>

            <label for="endereco" >Endereço</label>
            <input type="text" id="endereco" class="input-padrao" name="endereco" required>

            <label for="email" >E-mail</label>
            <input type="text" id="email" class="input-padrao" name="email" required>

            <button type="submit" class="botao-padrao">Salvar</button>
        </form>
    </fieldset>

    <fieldset class="formulario container">
        <form action="" class="formLista" >
            <table>
                <?php foreach($contato->select() as $contato) {?>
                    <tr>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>E-mail</th>
                    </tr>
                    <tr>
                        <td class="coluna"><?php echo $contato[1];?></td>
                        <td class="coluna"><?php echo $contato[2];?></td>
                        <td class="coluna"><?php echo $contato[3];?></td>
                        <td ><a class="botao-editar" href="Edit.php?id=<?php echo $contato[0];?>">Editar</a></td>
                        <td ><a class="botao-excluir" href="Delete.php?id=<?php echo $contato[0];?>">Excluir</a></td>
                    </tr>
                    <?php }?>
            </table>
        </form>
    </fieldset>
</main>
</body>
</html>
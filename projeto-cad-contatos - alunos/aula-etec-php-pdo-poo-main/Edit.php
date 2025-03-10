<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edição de Contatos</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<fieldset class="formulario container">
    <form action="Edit.php" method="post">

        <label for="nome">Nome</label>
        <input type="text" class="input-padrao" id="nome" name="nome" value="" required>

        <label for="endereco">Endereço</label>
        <input type="text" class="input-padrao" id="endereco" name="endereco" value="" required>

        <label for="endereco">E-mail</label>
        <input type="email" class="input-padrao" id="endereco" name="email" value="" required>

        <button type="submit" class="botao-padrao botao-editar">Editar</button>

    </form>
</fieldset>
</body>
</html>
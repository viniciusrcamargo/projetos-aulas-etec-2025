<?php

require_once 'conexao.php';

try {
    $sql = "SELECT * FROM usuarios";
    $resultado = $conexao->query($sql);
} catch (\Throwable $erro) {
    echo 'Erro ao realizar a consulta, ' . $erro;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Usuários</title>
</head>
<body>
    <h1>Lista de Usuários</h1>

    <p><a href="inserirUsuario.php">Add Usuário</a></p>

    <?php 
        if($resultado->num_rows > 0){
            echo "<table>";
            echo "<thead>";
                echo "<tr>";
                    echo "<td>ID</td>";
                    echo "<td>NOME</td>";
                    echo "<td>E-MAIL</td>";
                    echo "<td>AÇÕES</td>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
                while($linha = $resultado->fetch_assoc()){
                    echo "<tr>";
                        echo "<td>" .$linha['id'] ."</td>";
                        echo "<td>" .$linha['nome'] ."</td>";
                        echo "<td>" .$linha['email'] ."</td>";
                        echo "<td>";
                            echo "<a href='editar.php?id=" . $linha['id'] . "'>Editar</a>";
                            echo "<a href='excluir.php?id=" . $linha['id'] . "' onclick='return confirm(\"Tem certeza que deseja excluir este usuário?\")' >Excluir</a>";
                        echo "/<td>";
                    echo "</tr>";
            }
            echo "</tbody>";

            echo "</table>";
        }else{
            echo "<p>Nenhum usuário cadastrado</p>";
        }
    ?>
</body>
</html>
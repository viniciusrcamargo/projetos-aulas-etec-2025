<?php

require_once 'conexao.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];

    try {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $param_id);
        $param_id = $id;

        if($stmt->execute()){
            header("location:index.php");
            exit();
        }
    } catch (\Throwable $erro) {
        echo "Erro ao excluir usuário " . $erro;
    }
}else{
    header("location: index.php");
    exit();
} 
?>
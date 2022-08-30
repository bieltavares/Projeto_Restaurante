<?php
    include('../includes/conexao.php');

        //captura o id enviado via get e armazena em uma variavel
        $id = $_GET['idsobre']; 

        $sql = "DELETE FROM tb_sobre WHERE id= $id";

        $conexao->query($sql);

        $conexao->close();

        // header location para direcionar ao inves de ficar no deletar ele voltar no pagina que gerencia a lista 
        header('location: listar-sobre.php');
    exit;
    
?>
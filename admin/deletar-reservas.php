<?php
    include('../includes/conexao.php');

        //captura o id enviado via get e armazena em uma variavel
        $id = $_GET['idreserva']; 

        $sql = "DELETE FROM tb_reserva WHERE id= $id";

        $conexao->query($sql);

        $conexao->close();

        // header location para direcionar ao inves de ficar no deletar ele voltar no pagina que gerencia a lista 
        header('location: listar-reservas.php');
    exit;
    
?>
<?php
    include('../includes/conexao.php');
   
session_start();

echo "Usuario: ". $_SESSION['usuarioNome'];

if($_SESSION['usuarioNome'] == ""){
    header('location: index.php');

    $_SESSION['loginErro'] = "Você não efetuou o login!";
}
    
        //captura o id enviado via get e armazena em uma variavel
        $id = $_GET['idprato']; 

        $sql = "DELETE FROM tb_pratos WHERE id= $id";

        $conexao->query($sql);

        $conexao->close();

        // header location para direcionar ao inves de ficar no deletar ele voltar no pagina que gerencia a lista 
        header('location: listar-pratos.php');
    exit;
    
?>
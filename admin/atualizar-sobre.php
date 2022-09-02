<?php
    include('../includes/conexao.php');
  
session_start();

echo "Usuario: ". $_SESSION['usuarioNome'];

if($_SESSION['usuarioNome'] == ""){
    header('location: index.php');

    $_SESSION['loginErro'] = "Você não efetuou o login!";
}
    


    $id = $_GET['idsobre'];

    $imagem = $_POST ['imagem'];
    $descricao = $_POST['descricao'];
  
    

    $sql = "UPDATE tb_sobre set imagem = '$imagem', descricao = '$descricao'
     WHERE id = $id";

    $conexao ->query($sql);

    $conexao ->close();

    header('location: listar-sobre.php');
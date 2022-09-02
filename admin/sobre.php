<?php
    include('../includes/conexao.php');
    
session_start();

echo "Usuario: ". $_SESSION['usuarioNome'];

if($_SESSION['usuarioNome'] == ""){
    header('location: index.php');

    $_SESSION['loginErro'] = "Você não efetuou o login!";
}
   


    $id = $_GET['idsobre'];

    $imagem = $_FILES ['imagem'];
    $descricao = $_POST['descricao'];
    
    

    $sql = "INSERT INTO tb_sobre (imagem,descricao)
    VALUES ('$imagem','$descricao')";


    $conexao ->query($sql);

    $conexao ->close();

    header('location: listar-sobre.php');

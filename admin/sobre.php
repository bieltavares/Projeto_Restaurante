<?php
    include('../includes/conexao.php');

    $id = $_GET['idsobre'];

    $imagem = $_FILES ['imagem'];
    $descricao = $_POST['descricao'];
    
    

    $sql = "INSERT INTO tb_sobre (imagem,descricao)
    VALUES ('$imagem','$descricao')";


    $conexao ->query($sql);

    $conexao ->close();

    header('location: listar-sobre.php');

<?php
    include('../includes/conexao.php');

    $id = $_GET['idsobre'];

    $imagem = $_POST ['imagem'];
    $descricao = $_POST['descricao'];
  
    

    $sql = "UPDATE tb_sobre set imagem = '$imagem', descricao = '$descricao'
     WHERE id = $id";

    $conexao ->query($sql);

    $conexao ->close();

    header('location: listar-sobre.php');
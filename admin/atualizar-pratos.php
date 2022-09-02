<?php
    include('../includes/conexao.php');
  
session_start();

echo "Usuario: ". $_SESSION['usuarioNome'];

if($_SESSION['usuarioNome'] == ""){
    header('location: index.php');

    $_SESSION['loginErro'] = "Você não efetuou o login!";
}
   


    $id = $_GET['idprato'];

    $nome = $_POST ['nome'];
    $codigo = $_POST['codigo'];
    $categoria = $_POST['categoria'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $calorias = $_POST['calorias'];
    $destaque = $_POST['destaque'];

    $sql = "UPDATE tb_pratos set nome = '$nome', codigo = '$codigo', categoria = '$categoria', 
    preco = '$preco', descricao = '$descricao', calorias = '$calorias', destaque = '$destaque' WHERE id = $id";

    $conexao ->query($sql);

    $conexao ->close();

    header('location: listar-pratos.php');

   
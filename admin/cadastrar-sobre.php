<?php
    include('../includes/conexao.php');
   
session_start();

echo "Usuario: ". $_SESSION['usuarioNome'];

if($_SESSION['usuarioNome'] == ""){
    header('location: index.php');

    $_SESSION['loginErro'] = "Você não efetuou o login!";
}
    


    // files é metodo para enviar imagem e POST é emcapissolado
    $imagem = $_POST ['imagem'];
    $nome = $_POST ['descricao'];
    

    $dir = "../img/descricao/";

    // o . apos codigo. é para juntar (concatenar) codigo+jpg
    $imagem["name"] = $codigo. ".jpg";

    if(move_uploaded_file($imagem["tmp_name"], "$dir" .$imagem["name"])) {
        echo "Arquivo enviado com Sucesso";
    }
    else {
        echo "Erro ao enviar imagem";
    }



    $sql = "INSERT INTO tb_sobre (imagem, descricao) 
    VALUES ('$imagem','$descricao')";

    $conexao->query($sql);

    $conexao ->close();

    header('location: listar-sobre.php');
<?php
    include('../includes/conexao.php');

    // files é metodo para enviar imagem e POST é emcapissolado
    $imagem = $_FILES ['imagem'];
    $nome = $_POST ['nome'];
    $codigo = $_POST['codigo'];
    $categoria = $_POST['categoria'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $calorias = $_POST['calorias'];
    $destaque = $_POST['destaque'];

    $dir = "../img/cardapio/";

    // o . apos codigo. é para juntar (concatenar) codigo+jpg
    $imagem["name"] = $codigo. ".jpg";

    if(move_uploaded_file($imagem["tmp_name"], "$dir" .$imagem["name"])) {
        echo "Arquivo enviado com Sucesso";
    }
    else {
        echo "Erro ao enviar imagem";
    }



    $sql = "INSERT INTO tb_pratos (nome,codigo,categoria,preco,descricao,calorias,destaque) 
    VALUES ('$nome','$codigo','$categoria','$preco','$descricao','$calorias','$destaque')";

    $conexao->query($sql);

    $conexao ->close();

    header('location: listar-pratos.php');


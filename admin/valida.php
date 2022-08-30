<?php
session_start();
// incluindo a conexao com o banco de dados 
include('../includes/conexao.php');

// o campo usuario e senha preenchido entra no if para validar
if((isset($_POST['email'])) && (isset($_POST['senha']))){
    $usuario = mysqli_real_escape_string($conexao, $_POST['email']);
    // escape de caracteres especiais,como aspas,prevenindo SQL injection 
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    
    $result_usuario = "SELECT * FROM tb_usuarios WHERE email ='$usuario' && senha = '$senha' LIMIT 1";
    $resultado_usuario = mysqli_query($conexao, $result_usuario);
    $resultado = mysqli_fetch_assoc($resultado_usuario);
    
// encontrado um usuario na tabela usuário com os mesmos 
// dados digitado no formulário
if(isset($resultado)){
    $_SESSION['usuarioId'] = $resultado['id'];
    $_SESSION['usuarioNome'] = $resultado['nome'];
    $_SESSION['usuarioNiveisAcessoId'] = $resultado['niveis_acesso_id'];
    $_SESSION['usuarioEmail'] = $resultado['email'];
    if($_SESSION['usuarioNiveisAcessoId'] == "1"){
        header("location: administrativo.php");
    }elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){
        header("location: colaborador.php");
    }else{
        header("location: cliente.php");
    }

    // não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
    // redireciona o usuário para a pagina de login 

}else{
    // variavel global recebendo a mensagem de erro 
    $_SESSION['loginErro'] = "Usuário ou senha Inválido";
    header("location: index.php");
}

}else{
    $_SESSION['loginErro'] = "Usuário ou senha inválido";
    header("Location: index.php");
}


if(isset($resultado)){
    $_SESSION['usuarioID'] = $resultado['id'];
    $_SESSION['usuarioNome'] = $resultado['nome'];

}





?>
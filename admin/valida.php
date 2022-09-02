<?php
// Inicia a sessão session_start 
    
session_start();


    // incluindo a conexao com o banco de dados 
    include_once("../includes/conexao.php");
 // o campo usuario e senha preenchido entra no if para validar
    if(isset($_POST['email']) && isset($_POST['senha'])){
        $usuario = mysqli_real_escape_string($conexao, $_POST['email']);
         
        $senha = mysqli_real_escape_string($conexao, $_POST['senha']);




        $result_usuario = "SELECT * FROM tb_usuarios WHERE email = '$usuario' && senha = '$senha' LIMIT 1";
        $result_usuario = mysqli_query($conexao, $result_usuario);
        $resultado = mysqli_fetch_assoc($result_usuario);

// encontrado um usuario na tabela usuário com os mesmos 
// dados digitado no formulário

        if(isset($resultado)){
            $_SESSION['usuarioId'] = $resultado['id'];
            $_SESSION['usuarioNome'] = $resultado['nome'];
            $_SESSION['usuarioNiveisAcessoId'] = $resultado['niveis_acesso_id'];
            $_SESSION['usuarioEmail'] = $resultado['email'];
            if($_SESSION['usuarioNiveisAcessoId'] == "1"){
                header("Location: administrativo.php");
            }elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){
                header("Location: colaborador.php");
            }else{
                header("Location: cliente.php");
            }


    // não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
    // redireciona o usuário para a pagina de login 

        }else{
            // variavel global recebendo a mensagem de erro 
            $_SESSION['loginErro'] = "Usuário ou senha inválido";
            header("Location: index.php");
        }

    }else{
            $_SESSION['loginErro'] = "Usuário ou senha inválido";
            header("Location: index.php");
    }
?>
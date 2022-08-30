<?php
    include('includes/cabecalho.php');
    include('includes/conexao.php');

    $idsobre = $_GET['idsobre'];

    $sql = "SELECT  * FROM tb_sobre WHERE codigo = '$idsobre'";

    $result = $conexao->query($sql);

    $dados = $result->fetch_assoc();


?>

		<div class="ghost-element">
		</div>
           
        <div class="product-page small-11 large-12 columns no-padding small-centered">
            
            <div class="global-page-container">

                <div class="product-section">
                    <div class="product-info small-12 large-5 columns no-padding">
                        <h3><?php echo $dados['imagem'] ?></h3>
                        <p><?php echo $dados['descricao'] ?></p>

                    </div>

                    <div class="product-picture small-12 large-7 columns no-padding">
                        <img src="img/sobre/<?php echo $dados['imagem'] ?>.jpg" alt="<?php echo $dados['descricao'] ?>">
                    </div>

                </div>

                <div class="go-back small-12 columns no-padding">
                    <a href="index.php"><< Voltar ao Inicio</a>
                </div>

            </div>
        </div>
            
<?php
    include_once('includes/rodape.php')
?>
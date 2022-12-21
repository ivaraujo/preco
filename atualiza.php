<?php
    include("protect.php");
    
    $barcode = NULL;

    //Váriaveis
    $barcode = $_POST["barcode"];
    $mercado = $_POST["mercado"];
    $produto = $_POST["produto"];
    $marca = $_POST["marca"];
    $quant = $_POST["quantidade"];
    $preco = $_POST["preco"];
	  
	  
	
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar produtos</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/atualiza.css">
</head>
<body>
    <header></header>
    <main>
        <section>
            
            <form action="" method="post">                
                <input type="text" name="barcode" placeholder="Código de barra">                
                <input type="text" name="barcode" placeholder="Código de barra">
                <input type="text" name="produto" placeholder="Nome do produto">
                <input type="text" name="marca" placeholder="Nome da marca">
                <input type="text" name="quantidade" placeholder="Quantidade da mercadoria">
                <input type="text" name="preco" placeholder="Valor da mercadoria">
                <button>Cadastrar</button>
            </form>
        </section>
        <section>
            <?php
                echo"Supermercado: <br>";
                echo $mercado;
                echo $barcode;
            ?>
            <p><a href="painel.php">Voltar</a></p>
        </section>        
    </main>
    <footer></footer>    
</body>
</html>
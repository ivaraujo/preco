<?php
    include("protect.php");
    
    //Váriaveis
    $barcode = $_POST["barcode"];
    $mercado = $_POST["mercado"];
    $produto = $_POST["produto"];
    $marca = $_POST["marca"];
    $quant = $_POST["quantidade"];
    $preco = $_POST["preco"];
	  
	  
	  //Introduzindo os dados no BD
	 $sql = "INSERT INTO mercadorias (barcode,mercado,produto,marca,quantidade,preco) VALUES ('$barcode','$mercado','$produto','$marca','$quant','$preco')";  
	
	  
	  if(!mysqli_query($mysqli,$sql)){
		  
		  echo 'Dados não inseridos';
		
		  }
	  else{
		  echo "Cadastro realizado!";
		  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar produtos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header></header>
    <main>
        <section>
            <?php
                echo"Supermercado: <br>";
                echo $mercado;
            ?>
            <p><a href="painel.php">Voltar</a></p>
        </section>        
    </main>    
</body>
</html>
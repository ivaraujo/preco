<?php
    include("protect.php");
    include("conexao.php");    
    
    
    //Váriaveis
    $mercado = $_GET["mercado"];

    if(isset($_POST["cadastrar"])){
        $barcode = $_POST["barcode"];    
        $produto = $_POST["produto"];
        $marca = $_POST["marca"];
        $quant = $_POST["quantidade"];
        $preco = $_POST["preco"];
    }  
	  
	/*
    $sql_cadastro = "INSERT INTO mercadorias (barcode, mercado, produto, marca, quantidade, preco) VALUES ('$barcode', '$mercado', '$produto', '$marca', '$quant', '$preco' )";
    $confirma = $mysqli->query($sql_cadastro) or die($mysqli->error);

    if($confirma){
        echo "Cadastrado"; 
    }
    else{
        echo"Erro no cadastro";
    }
    */

    
    //VALIDAR PRODUTO
    //$validar = "SELECT count(*) as barcode FROM mercadorias WHERE barcode = '$barcode'";
    //$resultado = mysqli_query($validar);
    //$row = mysqli_fetch_assoc($resultado); 
    $validar = "SELECT * FROM mercadorias WHERE barcode = '$barcode'";
    $resultado = $mysqli->query($validar) or die("<p>Falha na execução do código SQL: </p>" . $mysqli->error);
    $row = $resultado->num_rows;
    
    if($row == 1){
        echo "TEM SIM";
        $sql_cadastro = "UPDATE mercadorias SET mercado='$mercado', produto='$produto', marca='$marca', quantidade='$quant', preco='$preco' WHERE barcode='$barcode'";
        $confirma = $mysqli->query($sql_cadastro) or die($mysqli->error);

        if($confirma){
            echo "Foi atualizado"; 
        }
        else{
            echo"Erro ao atualizar";
        }
    }
    else{
        echo "NAO TEM";
        $sql_cadastro = "INSERT INTO mercadorias (barcode, mercado, produto, marca, quantidade, preco) VALUES ('$barcode', '$mercado', '$produto', '$marca', '$quant', '$preco' )";
        $confirma = $mysqli->query($sql_cadastro) or die($mysqli->error);

        if($confirma){
            echo "Cadastrado"; 
        }
        else{
            echo"Erro no cadastro";
        }
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
    <link rel="stylesheet" href="css/atualiza.css">
</head>
<body>
    <header></header>
    <main>
        <section>
            
            <form action="" method="post">                
                <input type="text" name="barcode" placeholder="Código de barra" required autocomplete="off"> 
                <input type="text" name="produto" placeholder="Nome do produto" required>
                <input type="text" name="marca" placeholder="Nome da marca" required>
                <input type="text" name="quantidade" placeholder="500g" required>
                <input type="text" name="preco" placeholder="0.00" required>
                <button type="submit" name="cadastrar">Cadastrar</button>
            </form>
        </section>
        <section>
            <p><a href="painel.php">Voltar</a></p>
        </section>        
    </main>
    <footer></footer>    
</body>
</html>
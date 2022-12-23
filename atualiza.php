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
    
        $validar_barcode = "SELECT * FROM mercadorias WHERE barcode = '$barcode'";
        $resultado_barcode = $mysqli->query($validar_barcode) or die("<p>Falha na execução do código SQL: </p>" . $mysqli->error);
        $row_barcode = $resultado_barcode->num_rows;

        $validar_mercado = "SELECT * FROM mercadorias WHERE mercado = '$mercado'";
        $resultado_mercado = $mysqli->query($validar_mercado) or die("<p>Falha na execução do código SQL: </p>" . $mysqli->error);
        $row_mercado = $resultado_mercado->num_rows;
        
        if($row_barcode == 1){
            echo "TEM SIM ";      
            

            if($row_mercado == 1){
                echo "Mesmo mercado";
                $sql_cadastro = "UPDATE mercadorias SET mercado='$mercado', produto='$produto', marca='$marca', quantidade='$quant', preco='$preco' WHERE barcode='$barcode'";
                $confirma = $mysqli->query($sql_cadastro) or die($mysqli->error);

                if($confirma){
                    echo "Cadastrado"; 
                }
                else{
                    echo"Erro no cadastro";
                }
            }
            else{
                echo"Mercado diferente";
                $sql_cadastro = "INSERT INTO mercadorias (barcode, mercado, produto, marca, quantidade, preco) VALUES ('$barcode', '$mercado', '$produto', '$marca', '$quant', '$preco' )";
                $confirma = $mysqli->query($sql_cadastro) or die($mysqli->error);

                if($confirma){
                    echo "Cadastrado"; 
                }
                else{
                    echo"Erro no cadastro";
                }
            }
        }
        else{
            echo "NAO TEM ";
            $sql_cadastro = "INSERT INTO mercadorias (barcode, mercado, produto, marca, quantidade, preco) VALUES ('$barcode', '$mercado', '$produto', '$marca', '$quant', '$preco' )";
            $confirma = $mysqli->query($sql_cadastro) or die($mysqli->error);

            if($confirma){
                echo "Cadastrado"; 
            }
            else{
                echo"Erro no cadastro";
            }
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
            <div id="camera"></div>
            <div id="resultado_scan"></div>

            <script src="quagga.min.js"></script>
            <script>
                Quagga.init({
                inputStream : {
                    name : "Live",
                    type : "LiveStream",
                    target: document.querySelector('#camera')    // Or '#yourElement' (optional)
                },
                decoder : {
                readers : ["code_128_reader"]
                }
                }, function(err) {
                    if (err) {
                        console.log(err);
                        return
                    }
                    console.log("Initialization finished. Ready to start");
                    Quagga.start();
                });

                Quagga.onDetected(funtion(data){
                    console.log(data);
                });
            </script>

        </section>
        <section>
            <h2>Cadastrar/Atualizar</h2>            
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
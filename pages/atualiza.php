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

        
        
        if($row_barcode == 1){
            echo "TEM SIM "; 
            $validar_mercado = "SELECT * FROM mercadorias WHERE barcode = '$barcode' AND mercado = '$mercado'";
            $resultado_mercado = $mysqli->query($validar_mercado) or die("<p>Falha na execução do código SQL: </p>" . $mysqli->error);
            $row_mercado = $resultado_mercado->num_rows;     
            

            if($row_mercado == 1){
                echo "Mesmo mercado";
                $sql_cadastro = "UPDATE mercadorias SET mercado='$mercado', produto='$produto', marca='$marca', quantidade='$quant', preco='$preco' WHERE barcode='$barcode'";
                $confirma = $mysqli->query($sql_cadastro) or die($mysqli->error);

                if($confirma){
                    echo "Atualizado!"; 
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
                    echo "Cadastrado no novo mercado"; 
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
                echo "Cadastrado novo item"; 
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/atualiza.css">
    <link rel="stylesheet" href="../css/mobile-atualiza.css">
    <script src="https://cdn.rawgit.com/serratus/quaggaJS/0420d5e0/dist/quagga.min.js"></script>
</head>
<body>
    <header></header>
    <main>
    <section>
            
            <button onclick="capturar()" id="camera-captura">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
                <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
                <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                </svg>        
            </button>
            <div class="modal">
                <div class="modal-container">
                    <div id="botao-fechar">
                        <span class="btn-fechar" onclick="fechar()">&times;</span>
                    </div>                    
                    <div id="camera"></div>
                </div>
            </div>
            <script src="../js/qr-code.js"></script> 
        </section>

        <section>            
            <h2>Cadastrar/Atualizar</h2>            
            <form action="" method="post">                
                <input type="number" name="barcode" id="barcode" placeholder="Código de barra" required autocomplete="off">                                     
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
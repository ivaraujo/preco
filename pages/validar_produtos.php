<?php

include("conexao.php");

function retorna($barcode, $mysqli){
    $validar_produtos = "SELECT * FROM mercadorias WHERE barcode = '$barcode' LIMIT 1";
    $resultado_produtos = mysqli_query($mysqli, $validar_produtos) or die("<p>Falha na execução do código SQL: </p>" . $mysqli->error);
    if($resultado_produtos->num_rows){
        $row_produtos = mysqli_fetch_assoc($resultado_produtos);
        $valores['produto'] = $row_produtos['produto'];
        $valores['marca'] = $row_produtos['marca'];
        $valores['quantidade'] = $row_produtos['quantidade'];
        
    }
    else{
        $valores['produto'] = 'ERRO!';
    }
    return json_encode($valores);
}

if(isset($_GET['barcode'])){
    echo retorna($_GET['barcode'], $mysqli);
}
?>
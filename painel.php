<?php
    include("protect.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header></header>
    <main>
        <section>
            <?php
            echo "Sucesso em logar!";            
            ?>
            <p><a href="atualiza.php">Novo</a></p>
            <p><a href="logout.php">Sair</a></p>
        </section>
    </main>
    <footer></footer>
    
    
</body>
</html>
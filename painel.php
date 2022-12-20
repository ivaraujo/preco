<?php
    include("protect.php");
    $opcao = "mercado1"; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/painel.css">
</head>
<body>
    <header></header>
    <main>
        <section id="novo">  
            <article>
                <div class="caixa">
                    <form action="" method="get">   
                        <input type="radio" name="mercado" id="imercado" value="<?php echo $opcao ?>" checked>                                         
                        <label for="imercado">Mercado 1</label>
                        <button type="submit">Cadastrar</button>                   
                    </form>
                </div>
                <div class="caixa">
                    <form action="" method="get">   
                        <input type="radio" name="mercado" id="imercado" value="<?php echo $opcao ?>" checked>                                         
                        <label for="imercado">Mercado 1</label>
                        <button type="submit">Cadastrar</button>                   
                    </form>
                </div>
                <div class="caixa">
                    <form action="" method="get">   
                        <input type="radio" name="mercado" id="imercado" value="<?php echo $opcao ?>" checked>                                         
                        <label for="imercado">Mercado 1</label>
                        <button type="submit">Cadastrar</button>                   
                    </form>
                </div>
                <div class="caixa">
                    <form action="" method="get">   
                        <input type="radio" name="mercado" id="imercado" value="<?php echo $opcao ?>" checked>                                         
                        <label for="imercado">Mercado 1</label>
                        <button type="submit">Cadastrar</button>                   
                    </form>
                </div>
            </article>
            <article>
                <div class="caixa">5</div>
                <div class="caixa">6</div>
                <div class="caixa">7</div>
                <div class="caixa">8</div>
            </article>             
        </section>
        <section id="deletar">
            <form action="" method="post">

            </form>
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
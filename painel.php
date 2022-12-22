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
    <link rel="stylesheet" href="css/painel.css">
</head>
<body>
    <header></header>
    <main>
        <section id="novo">
            <div id="login">
                <p>Bem vindo, <?php echo $_SESSION['name'];  ?></p>
                <p><a href="logout.php">Sair</a></p>
            </div>  
            <article>                
                <div class="caixa">
                    <form action="atualiza.php" method="get" class="botao">   
                        <input type="radio" name="mercado" id="imercado" value="Gbarbosa" checked>                                         
                        <label for="imercado">Gbarbosa</label>
                        <button type="submit">Cadastrar</button>                   
                    </form>
                </div>
                <div class="caixa">
                    <form action="atualiza.php" method="get" class="botao">   
                        <input type="radio" name="mercado" id="imercado" value="Cesta" checked>                                         
                        <label for="imercado">Cesta do Povo</label>
                        <button type="submit">Cadastrar</button>                   
                    </form>
                </div>
                <div class="caixa">
                    <form action="atualiza.php" method="get" class="botao">   
                        <input type="radio" name="mercado" id="imercado" value="Medeiros" checked>                                         
                        <label for="imercado">Medeiros</label>
                        <button type="submit">Cadastrar</button>                   
                    </form>
                </div>
                <div class="caixa">
                    <form action="atualiza.php" method="get" class="botao">   
                        <input type="radio" name="mercado" id="imercado" value="Sta. Teresinha" checked>                                         
                        <label for="imercado">Sta. Teresinha</label>
                        <button type="submit">Cadastrar</button>                   
                    </form>
                </div>
            </article>
            <article>
                <div class="caixa">
                    <form action="atualiza.php" method="get" class="botao">   
                        <input type="radio" name="mercado" id="imercado" value="Compre Bem" checked>                                         
                        <label for="imercado">Compre Bem</label>
                        <button type="submit">Cadastrar</button>                   
                    </form>
                </div>
                <div class="caixa">
                    <form action="atualiza.php" method="get" class="botao">   
                        <input type="radio" name="mercado" id="imercado" value="Economia" checked>                                         
                        <label for="imercado">Economia da Praça</label>
                        <button type="submit">Cadastrar</button>                   
                    </form>
                </div>
                <div class="caixa">
                    <form action="atualiza.php" method="get" class="botao">   
                        <input type="radio" name="mercado" id="imercado" value="Atakarejo" checked>                                         
                        <label for="imercado">Atakarejo</label>
                        <button type="submit">Cadastrar</button>                   
                    </form>
                </div>
                <div class="caixa">
                    <form action="atualiza.php" method="get" class="botao">   
                        <input type="radio" name="mercado" id="imercado" value="Rua do Catu" checked>                                         
                        <label for="imercado">Rua do Catu</label>
                        <button type="submit">Cadastrar</button>                   
                    </form>
                </div>
            </article>             
        </section>
        <section id="deletar">
            <form action="" method="post">

            </form>
            
        </section>
    </main>
    <footer></footer>
    
    
</body>
</html>
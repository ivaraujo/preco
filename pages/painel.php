<?php
    include("protect.php");
    include("conexao.php");

    $consulta = "SELECT * FROM mercadorias LIMIT 20";
    $lista_geral = $mysqli->query($consulta) or die ($mysqli->error);
    
    $usuario = $_SESSION['name'];
    $cargos = "SELECT cargo FROM usuarios WHERE nome ='$usuario'";
    $lista_cargos = $mysqli->query($cargos) or die ($mysqli->error);
    $cargo = $lista_cargos->fetch_assoc();

    $usuarios = "SELECT * FROM usuarios";
    $lista_usuarios = $mysqli->query($usuarios) or die ($mysqli->error);


//cadastro usuarios
    if(isset($_POST["cadastro"])){
        $n_nome = $_POST["nome"];    
        $n_email = $_POST["email"];
        $n_senha = $_POST["senha"];
        $n_cargo = $_POST["cargo"];
      
        $sql_cadastro_usuario = "INSERT INTO usuarios (nome, email, senha, cargo) VALUES ('$n_nome', '$n_email', '$n_senha', '$n_cargo')";
        $confirma_cadastro = $mysqli->query($sql_cadastro_usuario) or die($mysqli->error);
        header('Location: painel.php');
    } 
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/painel.css">
    <link rel="stylesheet" href="../css/mobile-painel.css">
</head>
<body>
    <header></header>
    <main>
        <section id="novo">
            <div id="login">
                <p>Bem vindo, <?php echo $_SESSION['name'];  ?></p>
                <p><a href="logout.php">Sair</a></p>
            </div>
            <h2>Cadastro de produtos</h2>   
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
            <h2>Produtos para apagar</h2>
            <table>
                <tr>
                    <th>Produto</th>
                    <th>Mercado</th>
                    <th>Marca</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                    <th></th>
                </tr>
                <?php while($dado_geral = $lista_geral->fetch_array()){ ?>
                    <tr>
                        <td><?php echo $dado_geral["produto"];?></td>
                        <td><?php echo $dado_geral["mercado"];?></td>
                        <td><?php echo $dado_geral["marca"];?></td>
                        <td><?php echo $dado_geral["quantidade"];?></td>
                        <td><?php echo 'R$ '.number_format($dado_geral["preco"], 2, ',', '.');?></td>
                        <td><a href='delete.php?id=<?php echo $dado_geral["id"];?>' id="deleta">Apagar</a></td>
                    </tr>                                          			
                <?php }?>
            </table>
        </section>
        <?php
        if($cargo['cargo'] == 'administrador'){             
            
        ?>
        <section id="usuarios">
            <h2>Usuários</h2>
            <div>
                <article id="usuarios-cadastro">
                    <form action="" method="post">
                        <input type="text" name="nome" placeholder="Usuário">
                        <input type="email" name="email" placeholder="email@email.com.br">
                        <input type="password" name="senha" placeholder="Senha">
                        <div id="form-radio">                            
                            <input type="radio" name="cargo" value="administrador">
                            <label for="admin">Administrador</label>
                            <input type="radio" name="cargo" value="coletor" checked>
                            <label for="coletor">Coletor</label>
                        </div>                        
                        <button type="submit" name="cadastro">Cadastrar</button>
                    </form>
                </article>
                <article id="usuarios-lista">
                    <table>
                        <tr>
                            <th>Usuario</th>
                            <th>Categoria</th>
                            <th></th>
                        </tr>
                        <?php while($dado_usuarios = $lista_usuarios->fetch_array()){ ?>
                            <tr>
                                <td><?php echo $dado_usuarios["nome"];?></td>
                                <td><?php echo $dado_usuarios["cargo"];?></td>
                                <td><a href='delete_user.php?id=<?php echo $dado_usuarios["id"];?>' id="deleta">Apagar</a></td>
                            </tr>                                          			
                        <?php }?>
                    </table>                    
                </article>
            </div>             
        </section>
        <?php } ?>
    </main>
    <footer></footer>
    
    
</body>
</html>
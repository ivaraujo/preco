<div id="php">
    <?php
    include("conexao.php");

    //FILTROS
    $filtro_produtos = "SELECT * FROM mercadorias";
    $menu_mercados = $mysqli->query($filtro_produtos) or die ($mysqli->error);
    $menu_produto = $mysqli->query($filtro_produtos) or die ($mysqli->error);

    //BUSCAR
   
    $busca_mercado = "0";
	$busca_produto = "0";

    $busca_mercado = $_POST["loja"];
	$busca_produto = $_POST["mercadoria"];

    //$consulta = "SELECT * FROM mercadorias";
    //$lista_geral = $mysqli->query($consulta) or die ($mysqli->error);
    if($busca_mercado=="todos" && $busca_produto==""){
        $consulta = "SELECT * FROM mercadorias ORDER BY produto ASC";
        $lista_geral = $mysqli->query($consulta) or die ($mysqli->error);
    }
    else if($busca_produto != ""){
        $consulta = "SELECT * FROM mercadorias WHERE produto = '$busca_produto'  ORDER BY produto DESC";
        $lista_geral = $mysqli->query($consulta) or die ($mysqli->error);
    }                
    else{
        $consulta = "SELECT * FROM mercadorias WHERE mercado = '$busca_mercado' ORDER BY mercado ASC";
        $lista_geral = $mysqli->query($consulta) or die ($mysqli->error);
    }
                
            

    //LOGIN
    if(isset($_POST['nome']) || isset($_POST['senha'])){
        if(strlen($_POST['nome']) == 0){
            echo "<p>Preencha o seu usuário</p>";
        }
        else if(strlen($_POST['senha']) == 0){
            echo "<p>Preencha a sua senha</p>";
        }
        else{
            $nome = $mysqli->real_escape_string($_POST['nome']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code =  "SELECT * FROM usuarios WHERE nome = '$nome' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("<p>Falha na execução do código SQL: </p>" . $mysqli->error);

            $quantidade = $sql_query->num_rows;

            if($quantidade == 1){
                $usuario = $sql_query->fetch_assoc();
                if(!isset($_SESSION)){
                    session_start();
                }

                $_SESSION['id'] =  $usuario['id'];
                $_SESSION['name'] =  $usuario['nome'];

                header("Location: painel.php");
            }
            else{
                echo "<p>Falha ao logar! E-mail ou senha incorretos</p>";
            }
            
        }
    }
    ?>
</div>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preços</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <form action="" method="post">
            <input type="text" name="nome" placeholder="Usuário" checked autocomplete="off">
            <input type="password" name="senha" placeholder="Senha" checked autocomplete="off">
            <button type="submit">Logar</button>
        </form>
    </header>
    <main>
        <section>
            <img src="img/Logo App.png" alt="Logo Alagoinhas Mais"/>
            <?php 
            echo "Mercado: $busca_mercado <br>";
            echo "Produto: $busca_produto";
            
            ?>
            <div id="container-pesquisa">
                <form method="post" action="" id="formulario">
                                    
                    <select name="loja">
                        <option value="todos">Todos</option>
                        <?php while($dado_loja = $menu_mercados->fetch_array()){?>
                        <option value="<?php echo $dado_loja["mercado"]; ?>"><?php echo $dado_loja["mercado"]; ?></option>
                        <?php }?>
                    </select>

                    <select name="mercadoria">
                            <option value="">Selecione um produto</option>
                            <?php while($dado_produto = $menu_produto->fetch_array()){?>
                            <option value="<?php echo $dado_produto["produto"]; ?>"><?php echo $dado_produto["produto"]; ?></option>
                            <?php }?>
                    </select>
                    
                    <input type="submit" value="Pesquisar" />		
                    
                </form>
                <table id="tabela">
                    <tr>
                        <th>Produto</th>
                        <th>Mercado</th>
                        <th>Marca</th>
                        <th>Valor</th>
                    </tr>
                    <?php while($dado_geral = $lista_geral->fetch_array()){ ?>
                        <tr>
                            <td><?php echo $dado_geral["produto"];?></td>
                            <td><?php echo $dado_geral["mercado"];?></td>
                            <td><?php echo $dado_geral["marca"];?></td>
                            <td><?php echo $dado_geral["preco"];?></td>
                        </tr>                                          			
                    <?php }?>
                </table>
                
            </div>
        </section>
    </main>
    <footer>
        <p>Desenvolvido por <a href="https://ivanviana.com.br">Ivan Viana</a></p>
    </footer>
</body>
</html>
<div id="php">
    <?php
    include("conexao.php");

    //FILTROS
    $filtro_produtos = "SELECT * FROM mercadorias";
    $con = $mysqli->query($filtro_produtos) or die ($mysqli->error);
    $con2 = $mysqli->query($filtro_produtos) or die ($mysqli->error);

    //BUSCAR

    $busca = $_POST["loja"];
	$prod = $_POST["prod"];

    $consulta = "SELECT * FROM mercadorias";
    $con3 = $mysqli->query($consulta) or die ($mysqli->error);
			if($busca=='todos' && $prod=='null'){
						$consulta = "SELECT * FROM mercadorias ORDER BY produto ASC";
						
						}
						else{
							
							if($prod!='null'){	
								
								$consulta = "SELECT * FROM mercadorias WHERE produto LIKE '$prod' ORDER BY produto ASC";
									
								}
							
							else{
									$consulta = "SELECT * FROM mercadorias WHERE $busca ORDER BY $busca ASC";
									
								}
							
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
            <div id="container-pesquisa">
                <form method="post" action="">
                                    
                    <select name="loja">
                        <option value="todos">Todos</option>
                        <?php while($dado_loja = $con->fetch_array()){?>
                        <option value="mercum"><?php echo $dado_loja["mercado"]; ?></option>
                        <?php }?>
                    </select>

                    <select name="prod">
                            <option value="null">Selecione um produto</option>
                            <?php while($dado_produto = $con2->fetch_array()){?>
                            <option value="item"><?php echo $dado_produto["produto"]; ?></option>
                            <?php }?>
                    </select>
                    
                    <input type="submit" value="Pesquisar" />		
                    
                </form>
                <?php while($dado_geral = $con3->fetch_array()){ ?>
                    <td><?php echo $dado_geral["mercado"];?></td>
                    <td><?php echo $dado_geral["produto"];?></td>                      			
                <?php }?>
            </div>
           <!-- <div id="tabela">
                <?php 
                    
                ?>
                <table id="produtos">
                    <tr>
                        <th>Produto</th>
                        <th>Marca</th>
                        <th>Gbarbosa</th>
                        <th>Medeiros</th>
                        <th>S.Teresinha</th>
                        <th>Extra</th>
                        <th>Economia</th>
                        <th>Bomjesus</th>
                    </tr>
                    
                    <tr class="coluna">
                        <td class="titulo"></td>
                        <td class="titulo"></td>
                        <td></td>
                        <td class="zebra"></td>
                        <td></td>
                        <td class="zebra"></td>
                        <td></td>
                        <td class="zebra"></td>
                    </tr>
                    
                </table>
            </div>-->
        </section>
    </main>
    <footer>
        <p>Desenvolvido por <a href="https://ivanviana.com.br">Ivan Viana</a></p>
    </footer>
</body>
</html>
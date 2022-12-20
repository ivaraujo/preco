<?php
 include("conexao.php");

 if(isset($_POST['nome']) || isset($_POST['senha'])){
    if(strlen($_POST['nome']) == 0){
        echo "Preencha o seu usuário";
    }
    else if(strlen($_POST['senha']) == 0){
        echo "Preencha a sua senha";
    }
    else{
        $nome = $mysqli->real_escape_string($_POST['nome']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code =  "SELECT * FROM usuarios WHERE nome = '$nome' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

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
            echo "Falha ao logar! E-mail ou senha incorretos";
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
            <div id="pesquisa">
                <form method="post" action="busca.php">                    
                    <select name="loja">
                        <option value="todos">Todos</option>
                        <option value="mercum">Gbarbosa</option>
                        <option value="mercdois">Medeiros</option>
                        <option value="merctres">S.Teresinha</option>
                        <option value="merccinco">Economia</option>
                        <option value="mercseis">Bom Jesus</option>
                    </select>
                    
                    <select name="prod" id="prod">
                            <option value="null">Selecione um produto</option>
                            <?php/*
                                $consulta = "SELECT DISTINCT produto FROM itens ORDER BY produto";
                                $consult = mysqli_query($conexao,$consulta) or die ('Erro na consulta!');
                                while($dado = mysqli_fetch_array($consult)){
                                    
                                        $seleciona = $dado['produto'];							
                                        echo "<option value='$seleciona'>$seleciona</option>";			
                                } */
                            ?>
                    </select>
                    <input type="submit" value="Pesquisar" />		
                    
                </form>
            </div>
            
        </section>
    </main>
    <footer>
        <p>Desenvolvido por<a href="https://ivanviana.com.br">Ivan Viana</a></p>
    </footer>
</body>
</html>
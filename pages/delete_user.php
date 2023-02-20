<?php
    include("conexao.php");

    if(!empty($_GET['id'])){
        $id = $_GET['id'];
        $sql_delete = "SELECT * FROM usuarios WHERE id=$id";
        $busca_delete = $mysqli->query($sql_delete) or die ($mysqli->error);

        if($busca_delete->num_rows > 0){
            $delete = "DELETE FROM usuarios WHERE id=$id";
            $resultado_delete = $mysqli->query($delete) or die ($mysqli->error);
        }
    }
    header('Location: painel.php');

?>
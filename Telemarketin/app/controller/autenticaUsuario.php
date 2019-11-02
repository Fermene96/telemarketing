<?php

require_once 'ClienteController.php';

$manterCliente = new ClienteController();

$cliente = $_POST["email"];
$cliente = $_POST["senha1"];
//echo "----1Estou no autentica user---";
$manterCliente->logar($cliente);
if($manterCliente->logar($cliente)){

        session_start();
        
        $_SESSION["usuario"] = $_POST["email"];
        
        header("location: ../view/paginas/menuUsuario.php");
}else{
            echo "Erro ao logar usuario";
        
    }




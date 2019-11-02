<?php

require_once 'AtendenteController.php';

$manterAtendente = new AtendenteController();

$atendente = $_POST["email"];
$atendente = $_POST["senha1"];

$manterAtendente->logar($atendente);
if($manterAtendente->logar($atendente)){
    session_start();
        
        $_SESSION["atendente"] = $_POST["email"];
        
        header("location: ../view/paginas/menuAtendente.php");

    }else{
        echo "Erro ao logar usuario";
        
    }



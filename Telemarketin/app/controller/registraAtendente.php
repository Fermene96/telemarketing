<?php

require_once 'AtendenteController.php';

$manterAtendente = new AtendenteController();
echo "Estou no autentica atendente";

$atendente = array();
$atendente["dados"] = $_POST["nome"];
$atendente["dados"] = $_POST["email"];
$atendente["dados"] = $_POST["senha1"];
$atendente["dados"] = $_POST["senha2"];

if($_POST["senha1"] != $_POST["senha2"]){
    echo "As senhas não são iguais";
} else {
    if($manterAtendente->verificaEmail($atendente) == FALSE){
        $manterAtendente->cadastrar($atendente);
    } else {
        echo "email já cadastrado";
    }
}

<?php
//namespace app\controller\autenticaUsuario;

require_once 'ClienteController.php';
/*use app\controller\ClienteController;
use app\model\Cliente;*/
                                
$manterCliente = new ClienteController();
//echo "Estou no autentica user";
                                
$cliente = array();
$cliente["dados"] = $_POST["nome"];
$cliente["dados"] = $_POST["email"];
$cliente["dados"] = $_POST["senha1"];
$cliente["dados"] = $_POST["senha2"];

/*$cliente = new Cliente();
$manterCliente = new ClienteController();

$cliente->setNome($_POST["nome"]);
$cliente->setEmail($_POST["email"]);
$cliente->setNome($_POST["nome"]);
$cliente->setNome($_POST["nome"]);*/
                                
if($_POST["senha1"] != $_POST["senha2"]){
    echo "As senhas não são iguais";
} else {
    //$manterCliente->verificaEmail($cliente);
    if($manterCliente->verificaEmail($cliente) == FALSE){
        $manterCliente->cadastrar($cliente);
    } else {
        echo "Email já cadastrado";
    }
        
}
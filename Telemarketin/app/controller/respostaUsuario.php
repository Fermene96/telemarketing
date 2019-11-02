<?php

require_once 'ClienteController.php';

$manterCliente = new ClienteController();

$idSolicitacao = $_POST["id"];
echo $idSolicitacao;
$respostaUsuario = $_POST["resposta"];
echo $respostaUsuario;
$descricao = $_POST["descricao"];
echo $descricao;

$manterCliente->resposta($idSolicitacao, $descricao, $respostaUsuario);



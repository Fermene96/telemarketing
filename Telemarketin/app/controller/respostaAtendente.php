<?php

require_once 'AtendenteController.php';

$manterAtendente = new AtendenteController();

$idSolicitacao = $_POST["id"];
echo $idSolicitacao;
$respostaAtendente = $_POST["resposta"];
echo $respostaAtendente;
$descricao = $_POST["descricao"];
echo $descricao;

$manterAtendente->resposta($idSolicitacao, $descricao, $respostaAtendente);


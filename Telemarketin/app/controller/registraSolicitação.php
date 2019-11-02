<?php

require 'ClienteController.php';

$manterSolicitacao = new ClienteController();

if (!isset($_SESSION)){ session_start();}
    
  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION["usuario"])) {
      // Destrói a sessão por segurança
      session_destroy();
      // Redireciona o visitante de volta pro login
      header("location: ../../index.php"); exit;

      
  }
$email = $_SESSION["usuario"];
//echo $email;

//echo "Estou noregistra soli";
//$solicitacao = array();
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$data = date('d/m/y H:i:s');


if(strlen($_POST["descricao"]) > 400){
    echo "Solicitação muito grande! Economize um pouco nas palavras.";
    }if(strlen($_POST["titulo"]) > 45) {
        echo "Titulo muito grande! Economize um pouco nas palavras.";
    } else {
        $id = $manterSolicitacao->recuperaId($email);
        $nome = $manterSolicitacao->recuperaNome($email);

        $manterSolicitacao->cadastraSolicitacao($titulo, $descricao, $nome, $id, $data);
    }





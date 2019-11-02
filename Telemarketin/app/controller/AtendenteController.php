<?php

require_once (__DIR__.'/../model/Atendente.php');
require_once (__DIR__.'/../model/Config.php');

class AtendenteController{
    
    public function cadastrar($atendente){
        
        $atendente = new Atendente();
        
        $id_atendente = isset($_POST["id_atendente"]) ? strip_tags(filter_input(INPUT_POST, "id_atendente")): NULL;
        $nome = isset($_POST["nome"]) ? strip_tags(filter_input(INPUT_POST, "nome")): NULL;
        $email = isset($_POST["email"]) ? strip_tags(filter_input(INPUT_POST, "email")): NULL;
        $senha = isset($_POST["senha1"]) ? strip_tags(filter_input(INPUT_POST, "senha1")): NULL;
        
        if($id_atendente){
            $atendente->editar($id_atendente, $nome, $email, $senha);
        }else{
            $atendente->novo($nome, $email, $senha);
        }
        
        //Redireciona a pagina depois de salvar no banco
        header("location:". URL_BASE);
    }
    
    public function verificaEmail($atendente){
        $atendente = new Atendente();
        $email = isset($_POST["email"]) ? strip_tags(filter_input(INPUT_POST, "email")) : NULL;
        
        if ($atendente->verificar($email) == TRUE){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function logar($atendente){
        $atendente = new Atendente();
        $email = isset($_POST["email"]) ? strip_tags(filter_input(INPUT_POST, "email")): NULL;
        $senha = isset($_POST["senha1"]) ? strip_tags(filter_input(INPUT_POST, "senha1")): NULL;
        
        $atendente->login($email, $senha);
        if($atendente->login($email, $senha)){
            return $atendente->login($email, $senha);
        }
    }
    
    public function listar(){
        $atendente = new Atendente();
        
        $dado = $atendente->lista();
        return $dado;

    }
    
    public function resposta($idSolicitacao, $descricao, $respostaAtendente){
        $atendente = new Atendente();
        
        $idSolicitacao = isset($_POST["id"]) ? strip_tags(filter_input(INPUT_POST, "id")): NULL;
        $descricao = isset($_POST["descricao"]) ? strip_tags(filter_input(INPUT_POST, "descricao")): NULL;
        $respostaAtendente = isset($_POST["resposta"]) ? strip_tags(filter_input(INPUT_POST, "resposta")): NULL;
        echo "Estou no controller". $idSolicitacao;
        echo $descricao;
        echo $respostaAtendente;
        
        $atendente->responde($idSolicitacao, $descricao, $respostaAtendente);
        $atendente->respondido($idSolicitacao);
        
        header("location: ../view/paginas/menuAtendente.php");
    }
    
    public function acessa($id){
        $atendente = new Atendente();
        
        $idSolicitacao = $atendente->recuperaPorId($id);
        return $idSolicitacao;
    }
}




<?php

/*namespace app\controller\ClienteController;
use app\model\Cliente;*/
require_once (__DIR__.'/../model/Cliente.php');
require_once (__DIR__.'/../model/Config.php');

class ClienteController{
    
    public function cadastrar($cliente){
        
        $cliente = new Cliente();
        $id_cliente = isset($_POST["id_cliente"]) ? strip_tags(filter_input(INPUT_POST, "id_cliente")): NULL;
        $nome = isset($_POST["nome"]) ? strip_tags(filter_input(INPUT_POST, "nome")): NULL;
        $email = isset($_POST["email"]) ? strip_tags(filter_input(INPUT_POST, "email")): NULL;
        $senha = isset($_POST["senha1"]) ? strip_tags(filter_input(INPUT_POST, "senha1")): NULL;
        
        if($id_cliente){
            $cliente->editar($id_cliente, $nome, $email, $senha);
        }else{
            $cliente->novo($nome, $email, $senha);
        }
        //Redireciona a pagina depois de salvar no banco
        header("location:". URL_BASE);
    }
    
    public function verificaEmail($cliente){
        $cliente = new Cliente();
        $email = isset($_POST["email"]) ? strip_tags(filter_input(INPUT_POST, "email")): NULL;
        //$cliente->verificar($email);
        if($cliente->verificar($email) == TRUE){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function logar($cliente){
        $cliente = new Cliente();
        $email = isset($_POST["email"]) ? strip_tags(filter_input(INPUT_POST, "email")): NULL;
        $senha = isset($_POST["senha1"]) ? strip_tags(filter_input(INPUT_POST, "senha1")): NULL;
        
        $cliente->login($email, $senha);
        //echo "-----2  Cliente controler-----";
        if($cliente->login($email, $senha)){
            return $cliente->login($email, $senha);
        }
    }
    
    public function cadastraSolicitacao($titulo, $descricao, $nome, $id, $data){
        $solicitacao = new Cliente();
        
        /*$titulo = isset($_POST["titulo"]) ? strip_tags(filter_input(INPUT_POST, "titulo")): NULL;
        $descricao = isset($_POST["descricao"]) ? strip_tags(filter_input(INPUT_POST, "descricao")): NULL;
        $nome = isset($_POST["nome"]) ? strip_tags(filter_input(INPUT_POST, "nome")): NULL;
        $id = isset($_POST["id"]) ? strip_tags(filter_input(INPUT_POST, "id")): NULL;
        $data = isset($_POST["data"]) ? strip_tags(filter_input(INPUT_POST, "data")): NULL;
        echo "estou no controller ", $data, $nome, $id;*/
        
        
        $solicitacao->insereSolicitação($titulo, $descricao, $nome, $id, $data);
        
        header("location: ../view/paginas/menuUsuario.php");
    }
    
    public function recuperaNome($email){
        $solicitacao = new Cliente();
        $nome = $solicitacao->recuperarNomePorEmail($email);
        return $nome;
    }
    
    public function recuperaId($email){
        $solicitacao = new Cliente();
        
        $id = $solicitacao->recuperarIdPorEmail($email);
        return $id;
    }
    
    public function listar($id){
        $cliente = new Cliente();
        
        $dados = $cliente->lista($id);
        return $dados;
    }
    
    public function acessa($id){
        $cliente = new Cliente();
        
        $idSolicitacao = $cliente->recuperaPorId($id);
        return $idSolicitacao;
    }
    
    public function resposta($idSolicitacao, $descricao, $respostaUsuario){
        $cliente = new Cliente();
        
        $idSolicitacao = isset($_POST["id"]) ? strip_tags(filter_input(INPUT_POST, "id")): NULL;
        $descricao = isset($_POST["descricao"]) ? strip_tags(filter_input(INPUT_POST, "descricao")): NULL;
        $respostaUsuario = isset($_POST["resposta"]) ? strip_tags(filter_input(INPUT_POST, "resposta")): NULL;
        
        $cliente->responde($idSolicitacao, $descricao, $respostaUsuario);
        $cliente->respondido($idSolicitacao);
        
        header("location: ../view/paginas/menuUsuario.php");
    }
}

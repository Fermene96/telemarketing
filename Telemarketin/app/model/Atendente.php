<?php

require_once 'Model.php';
require_once 'Solicitacao.php';

class Atendente extends Model{
    
    public function __construct() {
        parent::__construct();
    }

    
    
    public function novo($nome, $email, $senha){
        $sql = "INSERT INTO atendente SET nome = :nome, email = :email, senha = :senha";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":nome", $nome);
        $qry->bindValue(":email", $email);
        $qry->bindValue(":senha", $senha);
        $qry->execute();
        
        return $this->db->lastInsertId();
    }

    public function responde($idSolicitacao, $descricao, $respostaAtendente){
        $sql = "UPDATE solicitacao SET descricao = CONCAT(:descricao, '||' ,' Atendente: ||' ,:respostaAtendente) WHERE idSolicitacao = :idSolicitacao";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":descricao", $descricao);
        $qry->bindValue(":respostaAtendente", $respostaAtendente);
        $qry->bindValue(":idSolicitacao", $idSolicitacao);
        $qry->execute();
        
        return $this->db->lastInsertId();
    }
    
    public function respondido($idSolicitacao){
        $sql = "UPDATE solicitacao SET pendente = '0' WHERE idSolicitacao = :idSolicitacao ";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":idSolicitacao", $idSolicitacao);
        $qry->execute();
        
        return $this->db->lastInsertId();
    }

    



    public function lista(){
        $pdo = new PDO('mysql:host=localhost;dbname=telemarketing', "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $consulta = $pdo->query('SELECT * FROM solicitacao WHERE pendente = 1');
        
        $solicitacoes = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $solicitacao = new Solicitacao();
                $solicitacao->setId($linha["idSolicitacao"]);
                $solicitacao->setTitulo($linha["titulo"]);
                $solicitacao->setDescricao($linha["descricao"]);
                $solicitacao->setData($linha["data"]);
                $solicitacao->setAutor($linha["autor"]);
                array_push($solicitacoes, $solicitacao);
            }
            return $solicitacoes;
    }
    
    public function recuperaPorId($id){
        $pdo = new PDO('mysql:host=localhost;dbname=telemarketing', "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $consulta = $pdo->query("SELECT * FROM solicitacao WHERE idSolicitacao = '".$id."'");
        
        $solicitacoes = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $solicitacao = new Solicitacao();
                $solicitacao->setId($linha["idSolicitacao"]);
                $solicitacao->setTitulo($linha["titulo"]);
                $solicitacao->setDescricao($linha["descricao"]);
                $solicitacao->setData($linha["data"]);
                $solicitacao->setAutor($linha["autor"]);
                array_push($solicitacoes, $solicitacao);
            }
            return $solicitacoes;
    }
    


            public function login($email, $senha){
        $resultado = array();
        
        $sql = "SELECT * FROM atendente WHERE email='".$email."'AND senha='".$senha."'";
        $qry = $this->db->prepare($sql);
        $qry->execute();
        
        if($qry->rowCount() == 1){
            $resultado = $qry->fetchAll(\PDO::FETCH_OBJ);
        }
        return $resultado;
    }

        public function verificar($email){
        $sql = "SELECT email FROM atendente WHERE email = '". $email ."'";
        $qry = $this->db->prepare($sql);
        $qry->execute();
        
        if($qry->rowCount() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
}


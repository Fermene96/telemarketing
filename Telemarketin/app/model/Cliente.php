<?php

/*namespace app\model;
use app\model\Model;*/
require_once 'Model.php';
require_once 'Solicitacao.php';

class Cliente extends Model{
    
    public function __construct() {
        parent::__construct();
    }

    public function insereSolicitação($titulo, $descricao, $nome, $id, $data){
        //$sql = "INSERT INTO solicitação SET titulo = :titulo, descricao = :descricao, autor= :nome, usuario_idusuario= :id, data= :data";
        //$sql = "INSERT INTO solicitacao (titulo, descricao, autor, usuario_idusuario, data, pendente) VALUES (:titulo ,:descricao ,:nome ,:usuario_idusuario ,:data, 1)";
        //$sql = "INSERT INTO solicitação (idSolicitação, data, descricao, pendente, autor, usuario_idusuario, respostaAutor, respostaAtendente, titulo) VALUES (NULL, :data, :descricao, 1, :nome, :id, NULL, NULL, :titulo);";
        $sql = "INSERT INTO solicitacao (idSolicitacao, data, descricao, pendente, autor, usuario_idusuario, respostaAutor, respostaAtendente, titulo) VALUES (NULL, '$data', '$descricao', '1', '$nome', '$id', NULL, NULL, '$titulo')";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":titulo", $titulo);
        $qry->bindValue(":descricao", $descricao);
        $qry->bindValue(":autor", $nome);
        $qry->bindValue(":usuario_idusuario", $id);
        $qry->bindValue(":data", $data);
        $qry->bindValue(":idSolicitacao", NULL);
        $qry->bindValue(":pendente", 1);
        $qry->bindValue(":respostaAutor", NULL);
        $qry->bindValue(":respostaAtendente", NULL);
        $qry->execute();
        /*array(
            ':titulo' => $titulo,
            ':descricao' => $descricao,
            ':autor' => $nome,
            ':usuario_idusuario' => $id,
            'data' => $data,
            'pendente' => 1,
            'idSolicitacao' => NULL,
            'respostausuario' => NULL,
            'respostaAtendente' => NULL
        )*/
        //echo $data, $titulo, $descricao, $nome, $id;
        
        return $this->db->lastInsertId();
    }
    
    public function novo($nome, $email, $senha){
        $sql = "INSERT INTO usuario SET nome = :nome, email = :email, senha = :senha";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":nome", $nome);
        $qry->bindValue(":email", $email);
        $qry->bindValue(":senha", $senha);
        $qry->execute();
        
        return $this->db->lastInsertId();
    }
    
    public function recuperarNomePorEmail($email){
        $resultado = array();
        
        $sql = "SELECT * FROM usuario WHERE email='".$email."'";
        $qry = $this->db->prepare($sql);
        $qry->execute();
        
        /*if($qry->rowCount() == 1){
            $resultado = $qry->fetchAll(\PDO::FETCH_OBJ);
        }
        return $resultado;*/
        while ($linha = $qry->fetch(PDO::FETCH_ASSOC)){
            //$id = $linha["idusuario"];
            $nome = $linha["nome"];
        }
        return $nome;
        
    }
    
    public function recuperarIdPorEmail($email){
        $resultado = array();
        
        $sql = "SELECT * FROM usuario WHERE email='".$email."'";
        $qry = $this->db->prepare($sql);
        $qry->execute();
        
        /*if($qry->rowCount() == 1){
            $resultado = $qry->fetchAll(\PDO::FETCH_OBJ);
        }
        return $resultado;*/
        while ($linha = $qry->fetch(PDO::FETCH_ASSOC)){
            $id = $linha["idusuario"];
            //$nome = $linha["nome"];
        }
        return $id;
        
    }


    public function login($email, $senha){
        $resultado = array();
        
        $sql = "SELECT * FROM usuario WHERE email='".$email."'AND senha ='".$senha."'";
        $qry = $this->db->prepare($sql);

        $qry->execute();
        //echo "----3 model----";
        
        if($qry->rowCount() == 1){
            $resultado = $qry->fetchAll(\PDO::FETCH_OBJ);
        }//print_r($resultado); 
        return $resultado;
        
        
    }
    
    public function lista($id){
        $pdo = new PDO('mysql:host=localhost;dbname=telemarketing', "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $consulta = $pdo->query("SELECT * FROM solicitacao WHERE usuario_idusuario = '".$id."' AND pendente = 0");
        
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

    public function responde($idSolicitacao, $descricao, $respostaUsuario){
        $sql = "UPDATE solicitacao SET descricao = CONCAT(:descricao, '||', ' Usuario : ||' ,:respostaUsuario) WHERE idSolicitacao = :idSolicitacao";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":descricao", $descricao);
        $qry->bindValue(":respostaUsuario", $respostaUsuario);
        $qry->bindValue(":idSolicitacao", $idSolicitacao);
        $qry->execute();
        
        return $this->db->lastInsertId();
    }
    
    public function respondido($idSolicitacao){
        $sql = "UPDATE solicitacao SET pendente = '1' WHERE idSolicitacao = :idSolicitacao ";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":idSolicitacao", $idSolicitacao);
        $qry->execute();
        
        return $this->db->lastInsertId();
    }

        public function verificar($email){
        $sql = "SELECT email FROM usuario WHERE email = '". $email ."'";
        $qry = $this->db->prepare($sql);
        $qry->execute();

        
        if($qry->rowCount() > 0){
            return TRUE;
        } else {
            echo FALSE;
        }
      
        
    }
}
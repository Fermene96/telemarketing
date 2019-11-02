<?php

class Solicitacao{
    
    private $id;
    private $titulo;
    private $descricao;
    private $autor;
    private $data;
    private $idUsuario;
    private $respostaAutor;
    private $respostaAtendente;
    private $pendente;
    
    function getId() {
        return $this->id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getAutor() {
        return $this->autor;
    }

    function getData() {
        return $this->data;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getRespostaAutor() {
        return $this->respostaAutor;
    }

    function getRespostaAtendente() {
        return $this->respostaAtendente;
    }

    function getPendente() {
        return $this->pendente;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setRespostaAutor($respostaAutor) {
        $this->respostaAutor = $respostaAutor;
    }

    function setRespostaAtendente($respostaAtendente) {
        $this->respostaAtendente = $respostaAtendente;
    }

    function setPendente($pendente) {
        $this->pendente = $pendente;
    }


}


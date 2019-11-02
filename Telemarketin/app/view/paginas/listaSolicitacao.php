<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    require_once (__DIR__.'/../../controller/AtendenteController.php');
    require_once (__DIR__.'/../../model/Solicitacao.php');
    //require_once (__DIR__.'/../../model/Model.php');
  // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)){ session_start();}
    
  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION["atendente"])) {
      // Destrói a sessão por segurança
      session_destroy();
      // Redireciona o visitante de volta pro login
      header("location: ../../index.php"); exit;

      
  }
  
  
    
  ?>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" type="text/css" href="../../view/css/estilos.css">
        <meta charset="UTF-8">
        <script type="text/javascript" src="../js/jquery-min.js"></script>
        <script type="text/javascript" src="../js/js.js"></script>
        <title>Pagina Inicial</title>
    </head>
    <body>
        <div class="conteudo">
            <div class="base-central">
                <div class="base-topo">
                    <a href="index.php" class="logo"></a>
                    <form action="" method="" class="busca">
                        <input type="text" name="" placeholder="Pesquisa">
                        <input type="submit" value="" class="but">
                    </form>
                </div>
                <nav class="menu">
                    <ul>
                        <li><a href="../../controller/sair.php">Home</a></li>
                        <li><a href="">Cadastrar novo</a></li>
                        <li><a href="">Lista de Contatos</a></li>
                    </ul>
                </nav>
                
                <div class="base-home">
                    <h1 class="titulo"><span>Lista de Solicitações</span></h1>
                    <div class="base-lista">
                        <span class="qtde"><b></b>Solicitações</span>
                        <div class="tabela">
                            
                            <table cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th></th>
                                        <th>Autor</th>
                                        <th>Data de Criação</th>
                                        <th>Titulo</th>
                                        <th colspan="2">Descricao</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php 
                                    $manterAtendente = new AtendenteController();
                                    $dados = $manterAtendente->listar();
                                    /*$a = implode(",", $solicitacoes);
                                    echo $a;*/
                                    //$solicitacao = array();
                                    foreach ($dados as $solicitacao){
                                        $id = $solicitacao->getId();
                                        $autor = $solicitacao->getAutor();
                                        $titulo = $solicitacao->getTitulo();
                                        $descricao = $solicitacao->getDescricao();
                                        $data = $solicitacao->getData();
                                    echo <<<HTML
                                    
                                    <tr><form action="acesso.php" method="POST">
                                        <td><input type="radio"  value="$id" name="id"></td>
                                        <td>$id</td>
                                        <td>$autor</td>
                                        <td>$data</td>
                                        <td>$titulo</td>
                                        <td>$descricao</td>
<td><a><input type="submit" class="btn acessar" value="acessar"></a></td>
                                        <form action="acesso.php" method="POST">
                                    </tr>
                                    
                                    </form>
                                            
                                            
        
HTML;
                                    } ?>


                                      
                                    
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                
                <div class="base-rodape">
                    <p>Direitos reservados fernandomenegon@gmail.com</p>
                </div>
                
            </div>
        </div>
    </body>
</html>
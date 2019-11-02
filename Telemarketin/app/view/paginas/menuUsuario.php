<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    
  // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)){ session_start();}
    
  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION["usuario"])) {
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
                    <a href="" class="logo"></a>
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
                    <div class="base-colunas">
                        <h1 class="titulo"><span>Seja bem vindo</span></h1>
                        <div>
                            <a href="novaSolicitacao.php" class="col">
                                <i class="icone i1"></i>
                                <span><b>Nova</b> solicitação</span>
                            </a>
                            
                            <a href="../../controller/sair.php" class="col">
                                <i class="icone i5"></i>
                                <span><b>Sair</b> da sessão</span>
                            </a>
                            
                            <a href="respondidaSolicitacao.php" class="col">
                                <i class="icone i2"></i>
                                <span><b>Solicitações</b> Respondidas</span>
                            </a>
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
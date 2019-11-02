<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    
  require_once (__DIR__.'/../../controller/AtendenteController.php');
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

                                        <th>Autor</th>
                                        <th>Titulo</th>
                                        <th>Data</th>
                                    </tr>
                                    
                                </thead>
                                
                                <tbody>
                                    <?php 
                                    $id = $_POST["id"];
                                    //echo $id;
                                    /*$autor = $_POST["autor"];
                                    $titulo = $_POST["titulo"];
                                    $descricao = $_POST["descricao"];
                                    $data = $_POST["data"];*/
                                    $manterAtendente = new AtendenteController();
                                    $dados = $manterAtendente->acessa($id);
                                    
                                    foreach ($dados as $solicitacao){
                                        
                                        $autor = $solicitacao->getAutor();
                                        $titulo = $solicitacao->getTitulo();
                                        $descricao = $solicitacao->getDescricao();
                                        $data = $solicitacao->getData();
                                    echo <<<HTML
                                        
                                    <tr>
                                        <th>$autor</th>
                                        <th>$titulo</th>
                                        <th>$data</th>
                                    </tr>
                                    <tr>
                                        
                                    </tr>
                                    <tr>
                                        
                                    </tr>
                                            
                                           
HTML;
                                    } ?>
                                    <tr>
                                <form action="../../controller/respostaAtendente.php" method="POST">
                                <td>
                                    <label>ID da Solicitação: </label>
                                    <input  type="text" name="id" value="<?php echo "$id";?>"/>
                                    <label>Descrição: </label>
                                    <textarea type="text" cols="30" rows="30" name="descricao" value=""><?php echo "$descricao";?></textarea>
                                    <label>Resposta: </label>
                                    <textarea rows="20" cols="40" name="resposta" placeholder="Dê uma resposta ao usuario" required></textarea>
                                </td>
                                <td>
                                    
                                    <input type="submit" value="Enviar" class="btn cad">
                                    
                                </td>
                                <td>
                                    <input type="reset" value="Limpar" class="btn limpar">
                                </td>
                                </form></tr>
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
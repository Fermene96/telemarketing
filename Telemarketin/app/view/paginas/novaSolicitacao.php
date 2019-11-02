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
                    <a href="index.php" class="logo"></a>
                    <form action="" method="" class="busca">
                        <input type="text" name="" placeholder="Pesquisa">
                        <input type="submit" value="" class="but">
                    </form>
                </div>
                <nav class="menu">
                    <ul>
                        <li><a href="../../controller/sair.php">Home</a></li>
                        <li><a href="">Login de Atendente</a></li>
                        <li><a href="">Novo Usuario</a></li>
                    </ul>
                </nav>
                
                <div class="base-home">
                    <h1 class="titulo"><span>Nova solicitação</span></h1>
                    <div class="base-formulario">
                        <form action="../../controller/registraSolicitação.php" method="POST">
                            <label>Qual o assunto desta solicitação?</label>
                            <input type="text" name="titulo" placeholder="Digite o título da solicitação" required>
                            <label >Descreva seu problema</label>
                            <textarea rows="30" cols="50" name="descricao" placeholder="Dê uma breve descricao do seu problema" required></textarea>
                            <input type="submit" value="Enviar" class="btn cad">
                            <input type="reset" value="Limpar" class="btn limpar">

                        </form>
                    </div>
                </div>
                
                <div class="base-rodape">
                    <p>Direitos reservados fernandomenegon@gmail.com</p>
                </div>
                
            </div>
        </div>
    </body>
</html>

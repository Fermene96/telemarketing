<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="pt-br">
    <head>
        <link rel="stylesheet" type="text/css" href="view/css/estilos.css">
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/jquery-min.js"></script>
        <script type="text/javascript" src="js/js.js"></script>
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
                        <li><a href="view/paginas/novoAtendente.php">Cadastrar novo Atendente</a></li>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="view/paginas/novoUsuario.php">Cadastrar novo Usuario</a></li>
                    </ul>
                </nav>
                
                <div class="base-home">
                    <div class="base-colunas">
                        <h1 class="titulo"><span>Seja bem vindo</span></h1>
                        <div>
                            
                            <a href="view/paginas/loginAtendente.php" class="col">
                                <i class="icone i3"></i>
                                <span><b>Login</b> Atendente</span>
                            </a>
                            
                            <a href="view/paginas/loginUsuario.php" class="col">
                                <i class="icone i4"></i>
                                <span><b>Login</b> Usuário</span>
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

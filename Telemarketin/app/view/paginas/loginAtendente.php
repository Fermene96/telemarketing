<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
                        <li><a href="">Home</a></li>
                        <li><a href="novoAtendente.php">Cadastrar novo Atendente</a></li>
                        <li><a href="novoUsuario.php">Cadastrar novo Usuario</a></li>
                    </ul>
                </nav>
                
                <div class="base-home">
                    <div class="base-colunas">
                        <h1 class="titulo"><span>Seja bem vindo</span></h1>
                        <div class="base-formulario">
                            <form action="../../controller/autenticaAtendente.php" method="POST">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Digite seu email" required>
                            
                            <div>
                                <label>Senha</label>
                            <input type="text" name="senha1" placeholder="Digite sua senha" required>
                            </div>
                            
                            <input type="submit" value="Cadastrar" class="btn cad">
                            <input type="reset" value="Limpar" class="btn limpar">

                        </form>
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


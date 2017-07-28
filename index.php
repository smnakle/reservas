<?php
header('Content-Type: text/html; charset=utf-8', true);

function __autoload($class_name){
        require_once 'classes/' . $class_name . '.php';
    }

$mensagem = "";

if (isset($_GET['error']) && !empty($_GET['error'])) {
    switch ((int) $_GET['error']) {
        case 1:
            $mensagem = "Algum campo obrigatório não foi preenchido.";
            break;
        case 2:
            $mensagem = "Já existe um usuário cadastrado com essas informações. Por favor, escolha outro nome de usuário.";
            break;
        case 3:
            $mensagem = 'Dados inseridos com sucesso!<br />Cadastro sujeito a aprovação, por favor agurade a liberação do seu acesso.';
            break;
        case 4:
            $mensagem = "Ocorreu algum erro, tente se cadastrar novamente em instantes.";
            break;
        case 5:
            $mensagem = 'Seu acesso ainda não foi liberado, aguarde.';
            break;
        case 6:
            $mensagem = 'Usuário/senha inválidos.';
            break;
        case 7:
            $mensagem = 'Você não está logado.';
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="images/favicon.ico" />
        <title>TeCoordena</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/estilo.css" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-sm-offset-3 col-md-offset-4 col-lg-offset-4">

                    <?php if (!empty($mensagem)) { ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo $mensagem; ?>
                        </div>
                    <?php } ?>

                    <h1 class="form-signin-heading">Reserva de Salas </h1>
                    <h4 class="form-signin-heading">Faça seu login  </h4>

                    <form action="internos/login.php" method="post">
                        <div class="form-group">
                            <input id="inputUser" name="username" type="text" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
                        </div>
                        <div class="form-group">
                            <input id="inputPassword" name="password" type="password" class="form-control" placeholder="Senha" required="required" >
                        </div>
                        <button id="button-login" class="btn btn-success btn-block">Entrar</button>
                    </form>

                    <h3>Não tem usuário?</h3>
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalCadastro">Cadastre-se</button>
                </div>

            </div>
        </div>


        <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="internos/cadastro_usuario.php" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Cadastro de Novo Usuário</h4>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input id="nome" name="nome" type="text" class="form-control" required="required" autofocus="autofocus" />
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" name="username" type="text" class="form-control" maxlength="30" required="required" />
                            </div>

                            <div class="row">

                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label for="senha">Senha</label>
                                    <input id="senha" name="password" type="password" class="form-control" maxlength="30" required="required" />
                                </div>

                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label for="confirmaSenha">Confirmar Senha</label>
                                    <input id="confirmaSenha" onKeyUp="validarSenha('senha', 'validarsenha', 'resultadoCadastro');" name="password" type="password" class="form-control" maxlength="30" required="required" />
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">                            
                            <button type="submit" class="btn btn-success">Salvar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script> 
        <script src="js/meuscript.js"></script>

    </body>
</html>
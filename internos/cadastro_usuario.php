<?php
function __autoload($class_name){
        require_once '../classes/' . $class_name . '.php';
    }

// require_once '../classes/Usuarios.php';


if ($_POST) {

    $mensagem = false;

    if (isset($_POST['nome']) && empty($_POST['nome'])) {
        $mensagem = true;
    }
    if (isset($_POST['username']) && empty($_POST['username'])) {
        $mensagem = true;
    }
    if (isset($_POST['password']) && empty($_POST['password'])) {
        $mensagem = true;
    }

    if ($mensagem) {

        header("Refresh:0; url=http://" . $_SERVER['SERVER_NAME'] .  $_SERVER['CONTEXT_PREFIX'] . "/" . $scriptnames[2] . "/index.php?error=1");
    } else {

        $usuario = new Usuarios();
        $user = new \stdClass();


        $user->nome = addslashes($_POST['nome']);
        $user->username = addslashes($_POST['username']);
        $user->password = md5(addslashes($_POST['password']));


        $usuario->setNome($user->nome);
        $usuario->setUserName($user->username);
        $usuario->setSenha($user->password);

        
        if ($usuario->inserir()) {
            echo "Inserido com sucesso!";
            
        } else {
            header("Refresh:0; url=http://" . $_SERVER['SERVER_NAME'] .  $_SERVER['CONTEXT_PREFIX'] . "/" . $scriptnames[2] . "/index.php?error=2");
          
        }
    }
}else{
    header("Refresh:0; url=http://" . $_SERVER['SERVER_NAME'] .  $_SERVER['CONTEXT_PREFIX'] . "/" . $scriptnames[2] . "/index.php?error=99");
}

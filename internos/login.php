<?php
function __autoload($class_name){
        require_once '../classes/' . $class_name . '.php';
    }

$scriptnames = explode("/", $_SERVER['SCRIPT_NAME']);

if ($_POST) {

    $usuario = new \stdClass();
    $usuario->username = addslashes($_POST['username']);
    $usuario->password = md5(addslashes($_POST['password']));

    $controller = new Usuarios();

    $existe = $controller->find($usuario);
    
    if (is_array($existe) && count($existe) == 1) {

        $_SESSION['usuarioLogado'] = $existe[0];

                header('Location: ../views/salas.php');
               
        }
    } else {
        header("Refresh:0; url=http://" . $_SERVER['SERVER_NAME'] .  $_SERVER['CONTEXT_PREFIX'] . "/" . $scriptnames[2] . "/index.php?error=6");
    }
} else {
    header("Refresh:0; url=http://" . $_SERVER['SERVER_NAME'] .  $_SERVER['CONTEXT_PREFIX'] . "/" . $scriptnames[2] . "/index.php?error=99");
}
?>
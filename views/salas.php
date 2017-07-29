<?php
function __autoload($class_name){
        require_once '../classes/' . $class_name . '.php';
    }

// require_once '../classes/Usuarios.php';
include_once 'header.php';

if (!empty($_SESSION['usuarioLogado'])) {

    $controllerUsuario = new Usuarios();
    $controllerCrud= new Crud();
    ?>
   
} else {
    header("Refresh:0; url= http://" . $_SERVER['SERVER_NAME'] . ":8080/reservas/index.php?error=7");
}
?>
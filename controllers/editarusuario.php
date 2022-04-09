<?php
//controllers/editarusuario.php

require '../fw/fw.php';
require '../models/Usuario.php';
require '../views/editarUsuario.php';
require '../models/Rol.php';
require 'verisesion.php';

if($_SESSION['rol']){
if(COUNT($_GET)>0){
    
    if(!isset($_GET['id'])) die("error 1");

    $u = new Usuario();
    $r = new Rol();

    $uno = $u->getUno($_GET['id']);
    $todosr = $r->getTodos($_GET['id']);
    $v = new editarUsuario();
    $v->usuario= $uno;
    $v->rol2= $todosr;
    $v->rol = $_SESSION['rol'];

    if(COUNT($_POST)>0){
        if(!isset($_POST['nombre'])) die("error 1");
        if(!isset($_POST['rol'])) die("error 2");
    
        $u->editarUsuario($_POST['nombre'],$_POST['rol'],$_GET['id']);

        $uno = $u->getUno($_GET['id']);
        $todosr = $r->getTodos($_GET['id']);
        $v = new editarUsuario();
        $v->usuario = $uno; //SE TENDRIA QUE HACER UN LOCATION HACIA EL LISTADO
        $v->rol2= $todosr;
        $v->rol = $_SESSION['rol'];
    }
}
$v->render();
}else{
    header("Location:login");
}
?>
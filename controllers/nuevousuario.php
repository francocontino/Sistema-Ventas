<?php
//controllers//nuevousuario.php

require '../fw/fw.php';
require '../models/Usuario.php';
require '../views/nuevoUsuario.php';
require '../models/Rol.php';
require 'verisesion.php';

if($_SESSION['rol']==1){
$r = new Rol();

if(COUNT($_POST)>0){
    $u = new Usuario();

    if(!isset($_POST['nombre'])) die("error 1");
    if(!isset($_POST['clave'])) die("error 2");
    if(!isset($_POST['rol'])) die("error 3");

    $u->nuevoUsuario($_POST['nombre'],$_POST['clave'],$_POST['rol']);

}
$todosr = $r->getTodos();
$v = new nuevoUsuario();
$v->rol = $_SESSION['rol'];
$v->rol2 = $todosr;
$v->render();
}else{
    header("Location:login");
}
?>
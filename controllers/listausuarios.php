<?php
//controllers/listausuarios.php

require '../fw/fw.php';
require '../models/Usuario.php';
require '../views/listadoUsuarios.php';
require '../models/Rol.php';
require 'verisesion.php';


$u = new Usuario();
$r = new Rol();

if(COUNT($_GET)>0){
    if(!isset($_GET['id'])) die("error 1");

    $u->eliminarUsuario($_GET['id']);
}

$todos = $u->getTodos();
$todosr = $r->getTodos();

$v = new listadoUsuarios();
$v->usuario = $todos;
$v->rol2 = $todosr;
$v->rol = $_SESSION['rol'];
$v->render();
?>
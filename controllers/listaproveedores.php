<?php
//controllers/listaproveedores.php

require '../fw/fw.php';
require '../models/Proveedor.php';
require '../views/listadoProveedores.php';
require 'verisesion.php';

if($_SESSION['rol']!=2){
$p = new Proveedor();


if(COUNT($_GET)>0){
    if(!isset($_GET['id'])) die("error 1");

    $p->eliminarProveedor($_GET['id']);
}

$todos = $p->getTodos();

$v = new listadoProveedores();
$v->proveedor = $todos;
$v->rol = $_SESSION['rol'];
$v->render();
}else{
    header("Location:login");
}
?>
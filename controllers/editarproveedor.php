<?php
//controllers/editarproveedor.php

require '../fw/fw.php';
require '../models/Proveedor.php';
require '../views/editarProveedor.php';
require 'verisesion.php';

if($_SESSION['rol']!=2){
if(COUNT($_GET)>0){
    
    if(!isset($_GET['id'])) die("error 1");

    $p = new Proveedor();

    $uno = $p->getUno($_GET['id']);
    $v = new editarProveedor();
    $v->proveedor = $uno;
    $v->rol = $_SESSION['rol'];

    if(COUNT($_POST)>0){
        if(!isset($_POST['razon_social'])) die("error 1");
        if(!isset($_POST['telefono'])) die("error 2");
        if(!isset($_POST['direccion'])) die("error 3");
    
        $p->editarProveedor($_POST['razon_social'],$_POST['telefono'],$_POST['direccion'],$_GET['id']);

        $uno = $p->getUno($_GET['id']);
        $v = new editarProveedor();
        $v->proveedor = $uno; //SE TENDRIA QUE HACER UN LOCATION HACIA EL LISTADO
        $v->rol = $_SESSION['rol'];
    }
}
$v->render();
}else{
    header("Location:login");
}
?>
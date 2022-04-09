<?php
//controllers//nuevoproveedor.php

require '../fw/fw.php';
require '../models/Proveedor.php';
require '../views/nuevoProveedor.php';
require 'verisesion.php';

if($_SESSION['rol']!=2){
if(COUNT($_POST)>0){
    $p = new Proveedor();

    if(!isset($_POST['razon_social'])) die("error 1");
    if(!isset($_POST['telefono'])) die("error 2");
    if(!isset($_POST['direccion'])) die("error 3");

    $p->nuevoProveedor($_POST['razon_social'],$_POST['telefono'],$_POST['direccion']);

}
$v = new nuevoProveedor();
$v->rol = $_SESSION['rol'];
$v->render();
}else{
    header("Location:login.php");
}
?>
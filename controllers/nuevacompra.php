<?php
//controllers/nuevacompra.php

require '../fw/fw.php';
require '../models/Compra.php';
require '../models/Proveedor.php';
require '../views/nuevaCompra.php';
require 'verisesion.php';

if($_SESSION['rol']!=2){
$c = new Compra();


if(COUNT($_POST)>0){
    if(!isset($_POST['id_prove'])) die("error 1");
    if(!isset($_POST['descripcion'])) die("error 2");
    if(!isset($_POST['cantidad'])) die("error 3");
    if(!isset($_POST['precio'])) die("error 4");
    if(!isset($_POST['compra_repo'])) die("error 5");

    $c->nuevaCompra($_POST['id_prove'],$_POST['descripcion'],$_POST['cantidad'],$_POST['precio'],$_POST['compra_repo']);
}

$v = new nuevaCompra();
$v->rol = $_SESSION['rol'];
$v->render();
}else{
    header("Location:login");
}
?>
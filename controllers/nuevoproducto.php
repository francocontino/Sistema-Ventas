<?php
//controllers//nuevoproducto.php

require '../fw/fw.php';
require '../models/Producto.php';
require '../views/nuevoProducto.php';
require 'verisesion.php';

if($_SESSION['rol']!=2){
if(COUNT($_POST)>0){
    $p = new Producto();

    if(!isset($_POST['descripcion'])) die("error 1");
    if(!isset($_POST['precio'])) die("error 2");
    if(!isset($_POST['stock'])) die("error 3");
    if(!isset($_POST['pto_repo'])) die("error 4");

    $p->nuevoProducto($_POST['descripcion'],$_POST['precio'],$_POST['stock'],$_POST['pto_repo']);

}
$v = new nuevoProducto();
$v->rol = $_SESSION['rol'];
$v->render();
}else{
    header("Location:login");
}
?>
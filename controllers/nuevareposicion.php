<?php
//controllers/nuevareposicion.php

require '../fw/fw.php';
require '../models/Compra.php';
require '../models/Producto.php';
require '../models/Proveedor.php';
require '../views/nuevaReposicion.php';
require 'verisesion.php';

if($_SESSION['rol']!=2){
$c = new Compra();


if(COUNT($_POST)>0){
    if(!isset($_POST['id_prove'])) die("error 1");
    if(!isset($_POST['id_produ2'])) die("error 2");
    if(!isset($_POST['cant'])) die("error 3");
    if(!isset($_POST['precio'])) die("error 4");
    if(!isset($_POST['compra_repo'])) die("error 5");

    $p = new Producto();

    $producto = $p->getUno($_POST['id_produ2']);

    if($producto != null){
        foreach($producto as $p){
            $descripcion = $p['descripcion'];
        }
    }

    $c->nuevaCompra($_POST['id_prove'],$descripcion,$_POST['cant'],$_POST['precio'],$_POST['compra_repo']);
}

$v = new nuevaReposicion();
$v->rol = $_SESSION['rol'];
$v->render();
}else{
    header("Location:login");
}
?>
<?php
//controllers/editarproducto.php

require '../fw/fw.php';
require '../models/Producto.php';
require '../views/editarProducto.php';
require 'verisesion.php';

if(COUNT($_GET)>0){
    
    if(!isset($_GET['id'])) die("error 1");

    $p = new Producto();

    $uno = $p->getUno($_GET['id']);
    $v = new editarProducto();
    $v->producto= $uno;
    $v->rol = $_SESSION['rol'];

    if(COUNT($_POST)>0){
        if(!isset($_POST['descripcion'])) die("error 1");
        if(!isset($_POST['precio'])) die("error 2");
        if(!isset($_POST['stock'])) die("error 3");
        if(!isset($_POST['pto_repo'])) die("error 4");
    
        $p->editarProducto($_POST['descripcion'],$_POST['precio'],$_POST['stock'],$_POST['pto_repo'],$_GET['id']);

        $uno = $p->getUno($_GET['id']);
        $v = new editarProducto();
        $v->producto = $uno; //SE TENDRIA QUE HACER UN LOCATION HACIA EL LISTADO
        $v->rol = $_SESSION['rol'];
    }
}
$v->render();

?>
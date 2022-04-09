<?php
//controllers/listaproductos.php

require '../fw/fw.php';
require '../models/Producto.php';
require '../views/listadoProductos.php';
require 'verisesion.php';

$p = new Producto();


if(COUNT($_GET)>0){
    if(!isset($_GET['id'])) die("error 1");

    $p->eliminarProducto($_GET['id']);
}

$todos = $p->getTodos();

$v = new listadoProductos();
$v->producto = $todos;
$v->rol = $_SESSION['rol'];
$v->render();
?>
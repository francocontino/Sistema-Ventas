<?php
//controllers/listanueva.php

require '../fw/fw.php';
require '../models/Producto.php';
require '../views/listadoProductos.php';
require 'verisesion.php';

$p = new Producto();

$todos = $p->getProdRepo();

$v = new listadoProductos();
$v->producto = $todos;
$v->rol = $_SESSION['rol'];
$v->render();
?>
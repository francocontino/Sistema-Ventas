<?php
//controllers/listarepo.php

require '../fw/fw.php';
require '../models/Compra.php';
require '../models/Proveedor.php';
require '../views/listadoCompras.php';
require 'verisesion.php';

if($_SESSION['rol']!=2){
$c = new Compra();
$p = new Proveedor();


$registros = $c->cantpedp(2);
foreach($registros as $r){
    $total_reg = $r['total_reg'];
}
$pag = 7;

if(empty($_GET['pagina'])){
    $pagina = 1;
}else{
    $pagina = $_GET['pagina'];
}

$desde = ($pagina-1)*$pag;
$total_paginas = ceil($total_reg/$pag);

$todos = $c->getEspe($desde,$pag,2);

/*$todos = $c->getEspe(2);*/
$todosp = $p->getTodos();

$v = new listadoCompras();
$v->compra = $todos;
$v->proveedores = $todosp;
$v->total_paginas = $total_paginas;
$v->pagina = $pagina;
$v->estado = 2;
$v->rol = $_SESSION['rol'];
$v->render();
}else{
    header("Location:login.php");
}
?>
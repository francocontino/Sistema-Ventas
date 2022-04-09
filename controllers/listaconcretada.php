<?php
//controllers/listanueva.php

require '../fw/fw.php';
require '../models/Pedido.php';
require '../views/listadoPedidos.php';
require 'verisesion.php';

if($_SESSION['rol']!=3){
$p = new Pedido();

$registros = $p->cantpedest(1);
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

$todos = $p->getEstado($desde,$pag,1);

/*$todos = $p->getEstado(1);*/

$v = new listadoPedidos();
$v->pedido = $todos;
$v->total_paginas = $total_paginas;
$v->pagina = $pagina;
$v->estado = 1;
$v->rol = $_SESSION['rol'];
$v->render();

}else{
    header("Location:login");
}
?>
<?php
//controllers/listapedidos.php

require '../fw/fw.php';
require '../models/Pedido.php';
require '../views/listadoPedidos.php';
require 'verisesion.php';

if($_SESSION['rol']!=3){
$p = new Pedido();
    
if(COUNT($_POST)>0){
    if($_POST['action']=='anularPedido'){
        if(!isset($_POST['no_factu']))die("error 1");

        $result = $p->setAnular($_POST['no_factu']);

        if($result != null){
            echo json_encode($result,JSON_UNESCAPED_UNICODE);
        }
        else{
            echo 'error';
        }
    }else{
        echo 'error';
    }
   
    
    exit;
}

$registros = $p->cantped();
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

$todos = $p->paginador($desde,$pag);
/*$todos = $p->getTodos();*/

$v = new listadoPedidos();
$v->pedido = $todos;
$v->total_paginas = $total_paginas;
$v->pagina = $pagina;
$v->estado = 3;
$v->rol = $_SESSION['rol'];
$v->render();
}else{
    header("Location:login");
}

?>
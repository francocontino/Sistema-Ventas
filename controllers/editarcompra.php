<?php
//controllers/editarcompra.php

require '../fw/fw.php';
require '../models/Compra.php';
require '../models/Proveedor.php';
require '../models/Producto.php';
require '../views/editarCompra.php';
require 'verisesion.php';

if($_SESSION['rol']!=2){
if(COUNT($_GET)>0){

    if(!isset($_GET['ec']))die('error 1');
    if(!isset($_GET['nc']))die('error 2');

    $c = new Compra();
    $pr = new Producto();
    $p = new Proveedor();

    $result = $c->getUno($_GET['nc']);
    $resultprov = $p->getTodos();

    $v = new editarCompra();
    $v->compra = $result;
    $v->proveedores = $resultprov;
    $v->rol = $_SESSION['rol'];

    if(COUNT($_POST)>0){
        if(!isset($_GET['nc']))die('error 1');
        if(!isset($_POST['estado']))die('error 2');

        $estatus = $c->getEstatus($_GET['nc']);

        $c->actualizarEstado($_GET['nc'],$_POST['estado']);
        
        foreach($estatus as $e){
            $estatu = $e['estatus'];
            $estatuscompra = $e['estatuscompra'];
        }
        if($estatu == 1){
            if($_POST['estado']==2){
                $pr->nuevoProducto($_POST['descripcionh'],0,$_POST['cantidadh'],0);
            }
        }
        if($estatu == 2){
            if($_POST['estado']==2){
                $pr->actualizarProducto($_POST["descripcionh"],$_POST['cantidadh']);
            }
        }

        header("Location:compras");
        
        /*$result = $c->getUno($_GET['nc']);

        $v = new editarCompra();
        $v->compra= $result;
        $v->proveedores = $resultprov;*/
    }

    
}

$v->render();
}else{
    header("Location:login");
}
?>
<?php
//controllers//nuevopedido.php

require '../fw/fw.php';
require '../models/Detalle_temp.php';
require '../models/Pedido.php';
require '../models/Configuracion.php';
require '../models/Clientes.php';
require '../models/Producto.php';
require '../views/nuevoPedido.php';
require 'verisesion.php';

if($_SESSION['rol']!=3){
$v = new nuevoPedido();

if(COUNT($_GET)>0){

    if($_GET['eliminar']){
        if(!isset($_GET['id-detalle']))die("error1");
        if(!isset($_GET['cliente']))die("error2");
        if(!isset($_GET['dni-cliente']))die("error2");

        $c = new Configuracion();
        $resultado_iva = $c->getIva();
        
        $p = new Detalle_temp();
        $resultado = $p->delAlmacenado($_GET['id-detalle'],$_GET['cliente']);

        $v->resultado_iva = $resultado_iva;
        $v->resultado = $resultado;
        $v->dni_cliente = $_GET['dni-cliente'];
        $v->id_cliente = $_GET['cliente'];
    }

}
$v->render();
}else{
    header("Location:login");
}
?>
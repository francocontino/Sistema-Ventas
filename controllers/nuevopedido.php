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

/*if(COUNT($_GET)>0){

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

}*/


if(COUNT($_GET)>0 ){
    if($_GET['agregar']){
        if(!isset($_GET['cod-produ2']))die("error cod");
        if(!isset($_GET['cant']))die("error");
        if(!isset($_GET['id-cliente']))die("error");
        if(!isset($_GET['dni-cliente']))die("error");

        $c = new Configuracion();
        $resultado_iva = $c->getIva();
        
        $p = new Detalle_temp();
        $resultado = $p->setAlmacenado($_GET['cod-produ2'],$_GET['cant'],$_GET['id-cliente']);

        //$v = new nuevoPedido();
        $v->resultado_iva = $resultado_iva;
        $v->resultado = $resultado;
        $v->dni_cliente = $_GET['dni-cliente'];
        $v->id_cliente = $_GET['id-cliente'];
        //$v->render();
    }
}

if(COUNT($_POST)>0){
    if($_POST['action']=='procesarVenta'){
        
        if(!isset($_POST['cliente'])) die("error 1");

            $d = new Detalle_temp();

            $resultado = $d->infoDettmp($_POST['cliente']);

            if($resultado != null){

                $p = new Pedido();

                $resu_proc = $p->setPedido($_POST['cliente']);

                echo json_encode($resu_proc,JSON_UNESCAPED_UNICODE);
            }
            else{
                echo "error";
            }
        
    }else{
        echo "error";
    }
    
    exit;
}
$v->rol = $_SESSION['rol'];
$v->render();
}else{
    header("Location:login");
}
?>
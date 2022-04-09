<?php
//controllers//index.php
require '../fw/fw.php';
require '../models/Clientes.php';
require '../models/Proveedor.php';
require '../models/Producto.php';
require '../models/Compra.php';
require '../models/Pedido.php';
require '../models/Usuario.php';
require '../views/inicioDinamic.php';
//require '../views/inicio.php';

session_start();

if($_SESSION['logueado']){

    $cli = new Clientes();
    $prov = new Proveedor();
    $prod = new Producto();
    $com = new Compra();
    $ped = new Pedido();
    $usu = new Usuario();

    $clicant = $cli->getCant();
    $provcant = $prov->getCant();
    $prodcant = $prod->getCant();
    $comcant = $com->getCant();
    $pedcant = $ped->getCant();
    $repcant = $com->getRep();
    $usucant = $usu->getCant();
    $pedtot = $ped->getTotal();

    /*$h = new inicio();
    $h->log = $_SESSION['logueado'];
    $h->rol = $_SESSION['rol'];*/

    $v = new inicioDinamic();

    $v->clicant = $clicant;
    $v->provcant = $provcant;
    $v->prodcant = $prodcant;
    $v->comcant = $comcant;
    $v->pedcant = $pedcant;
    $v->repcant = $repcant;
    $v->usucant = $usucant;
    $v->pedtot = $pedtot;
    $v->rol = $_SESSION['rol'];

    $v->render();
}else{
    header("Location:login");
}


?>

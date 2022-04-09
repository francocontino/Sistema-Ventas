<?php
//controllers//veriproducto.php

require '../fw/fw.php';
require '../models/Producto.php';
require 'verisesion.php';

if($_POST['action']=='searchProducto'){
    
    if(!isset($_POST['producto']))die("error 1");

    $p = new Producto();

    $producto = $p->getcod($_POST['producto']);

    $data = '';
    if($producto != null){
        $data = $producto;
    }
    else{
        $data = 0;
    }
    echo  json_encode($data); 
    //print_r($_POST);
    //echo "Buscar Cliente";
    exit;
}
?>
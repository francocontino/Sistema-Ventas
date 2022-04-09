<?php
//controllers//veriproveedor.php

require '../fw/fw.php';
require '../models/Proveedor.php';
require 'verisesion.php';

if($_POST['action']=='searchProveedor'){
    if(!isset($_POST['proveedor']))die("error 1");

    $p = new Proveedor();

    $proveedor = $p->getProv($_POST['proveedor']);

    $data = '';
    if($proveedor != null){
        $data = $proveedor;
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
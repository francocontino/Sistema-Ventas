<?php
//controllers//vericliente.php

require '../fw/fw.php';
require '../models/Clientes.php';
require 'verisesion.php';

if($_POST['action']=='searchCliente'){
    if(!isset($_POST['cliente']))die("error 1");

    $c = new Clientes();

    $cliente = $c->getdni($_POST['cliente']);

    $data = '';
    if($cliente != null){
        $data = $cliente;
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
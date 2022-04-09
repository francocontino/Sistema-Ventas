<?php
//controllers/editarcliente.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../views/editarCliente.php';
require 'verisesion.php';

if($_SESSION['rol']!=3){
if(COUNT($_GET)>0){
    
    if(!isset($_GET['id'])) die("error 1");

    $c = new Clientes();

    $uno = $c->getUno($_GET['id']);
    $v = new editarCliente();
    $v->cliente = $uno;
    $v->rol = $_SESSION['rol'];

    if(COUNT($_POST)>0){
        if(!isset($_POST['nombre'])) die("error 1");
        if(!isset($_POST['DNI'])) die("error 2");
        if(!isset($_POST['telefono'])) die("error 3");
        if(!isset($_POST['direccion'])) die("error 4");
    
        $c->editarCliente($_POST['nombre'],$_POST['DNI'],$_POST['telefono'],$_POST['direccion'],$_GET['id']);

        $uno = $c->getUno($_GET['id']);
        $v = new editarCliente();
        $v->cliente = $uno; //SE TENDRIA QUE HACER UN LOCATION HACIA EL LISTADO
        $v->rol = $_SESSION['rol'];
    }

}
$v->render();
}else{
    header("Location:login");
}
?>
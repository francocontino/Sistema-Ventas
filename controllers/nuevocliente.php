<?php
//controllers//nuevocliente.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../views/nuevoCliente.php';
require 'verisesion.php';

if($_SESSION['rol']!=3){
if(COUNT($_POST)>0){
    $c = new Clientes();

    if(!isset($_POST['nombre'])) die("error 1");
    if(!isset($_POST['DNI'])) die("error 2");
    if(!isset($_POST['telefono'])) die("error 3");
    if(!isset($_POST['direccion'])) die("error 4");

    $c->nuevoCliente($_POST['nombre'],$_POST['DNI'],$_POST['telefono'],$_POST['direccion']);

}
$v = new nuevoCliente();
$v->rol = $_SESSION['rol'];
$v->render();
}else{
    header("Location:login");
}
?>
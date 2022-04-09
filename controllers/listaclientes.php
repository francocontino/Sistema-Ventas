<?php
//controllers//listaclientes.php
require '../fw/fw.php';
require '../models/Clientes.php';
require '../views/listadoClientes.php';
require 'verisesion.php';
if($_SESSION['rol']!=3){

$c = new Clientes();


if(COUNT($_GET)>0){
    if(!isset($_GET['id'])) die("error 1");

    $c->eliminarCliente($_GET['id']);
}

$todos = $c->getTodos();

$v = new listadoClientes();
$v->clientes = $todos;
$v->rol = $_SESSION['rol'];
$v->render();
}else{
    header("Location:login");
}
?>
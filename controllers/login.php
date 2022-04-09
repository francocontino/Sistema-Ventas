<?php
//controllers/login.php

require '../fw/fw.php';
require '../models/Usuario.php';
require '../models/Rol.php';
require '../views/Login.php';

session_start();

if(count($_POST)>0){
    if(!isset($_POST['nombre']))die('error 1');
    if(!isset($_POST['passw']))die('error 1');

    //$passw = sha1($_POST['passw']);
    $u = new Usuario();

    $result = $u->login($_POST['nombre'],$_POST['passw']);

    if($result != null){
        $_SESSION['logueado'] = true;
        $fila = $result;
        foreach($result as $r){
            $_SESSION['nombre']= $r['nombre'];
            $_SESSION['rol']= $r['id_rol'];
            $_SESSION['id']= $r['id_usuario'];
            $rol = $r['id_rol'];
        }
        if($rol != null){
            header("Location: inicio");
        }  
        exit;
    }
}

$v = new Login();
$v->render();

?>
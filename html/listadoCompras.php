<!--html//listadoCompras.php-->
<?php
require '../controllers/verisesion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
</head>
<style>
    .pend{background-color:#fcf75b;}
    .reg{background-color: #4CAF50;}
    .nocoin{background-color:#f5b649;}
    .anu{background-color: #f44336;}
    .pad{padding:10px;}

    .paginador{
        padding: 15px;
        list-style: none;
        background: #fff;
        margin-top: 15px;
        display:flex;
        justify-content: flex-end;
        }
    
    .paginador ul li{
        display: inline;
    }

    .paginador a{
        color: #428bca;
        border: 1px solid #ddd;
        padding: 5px;
        display: inline-block;
        font-size: 14px;
        text-align: center;
        width: 25px;
    }
    .paginador a:hover{
        background: #ddd;
    }

    .pageSelected{
        color: #fff;
        background: #428bca;
        border: 1px solid #428bca;
        padding: 5px;

    }
</style>
<body>
<?php include '../html/inicio.php' ?>
<div class="main-content">
    <main>
        <a class="button btn-new" href="nueva-compra"><span class="la la-plus"></span>Nueva Compra</a> 
        <a class="button btn-new" href="nueva-reposicion"><span class="la la-plus"></span>Nueva Repo</a>
        <a class="button btn-neww" style="margin-left:42.5%" href="nuevo">Mostrar Nuevas</a>
        <a class="button btn-neww" href="reposicion">Mostrar Repo</a>
        <a class="button btn-neww" href="compras">Mostrar Todo</a>
        <br><br> 
        <div class="card">
            <div class="card-header">
                <h3>Listado Compras</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">      
                    <table width="100%">
                        <thead>
                            <tr><td>ID</td><td>Descripcion</td><td>Cantidad</td><td>Precio</td><td>Fecha</td><td>Proveedor</td><td>Tipo de Compra</td><td>Estado</td></tr>
                        </thead>

                        <tbody>
                            <form action="" method=POST>
                                <?php foreach($this->compra as $c) {?>
                                    <?php foreach($this->proveedores as $p) {?>
                                        <?php if($c['id_prove']==$p['id_prove']) {?>
                                            <tr><td><?=$c['id_compra']?></td>
                                                <td><?=$c['descripcion']?></td>
                                                <td><?=$c['cantidad']?></td>
                                                <td><?=$c['precio']?>$</td>
                                                <td><?=$c['fecha']?></td>
                                                <td><?=$p['razon_social']?></td>
                                                <?php if($c['compra_repo'] == 1){
                                                    echo '<td>Nuevo</td>';
                                                    }
                                                    if($c['compra_repo'] == 2){
                                                        echo'<td>Reposicion</td>';
                                                    } ?>

                                                <?php if($c['estatus_compra']==1){
                                                        echo'<td class="pend">Pendiente</td>'; 
                                                    }
                                                    if($c['estatus_compra']==2){
                                                        echo'<td class="reg">Registrado</td>';
                                                    } 
                                                    
                                                    if($c['estatus_compra']==3){
                                                        echo'<td class="nocoin">NoCoincidente</td>';
                                                    } 
                                                    
                                                    if($c['estatus_compra']==4){
                                                        echo'<td class="anu">Anulado</td>';
                                                    }
                                                ?>
                                                <?php if($c['estatus_compra']==1 || $c['estatus_compra']==3){?>
                                                    <td><a class="button btn-edit"href="editar-compra-<?=$c['estatus_compra']?>-<?=$c['id_compra']?>">Editar</a></td>
                                                <?php }else{?>
                                                        <td><button class="button btn-edit disabled" disabled>Editar</button></td>
                                                    <?php } ?>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            </form>
                        </tbody>
                    </table>
                    <?php if($this->estado == 3) {?>
                    <table>
                                <div class="paginador">
                                    <ul>

                                        <li><a href="compras-1">|<</a></li>
                                        <li><a href="compras-<?= $this->pagina-1?>"><<</a></li>

                                        <?php for($i=1 ; $i <= $this->total_paginas ; $i++) {
                                            if($i == $this->pagina) { 
                                                echo '<li class="pageSelected">'.$i.'</li>';
                                             }else{
                                                echo '<li><a href="compras-'.$i.'">'.$i.'</a></li>';
                                            }
                                         }?>

                                        <li><a href="compras-<?= $this->pagina+1 ?>">>></a></li>
                                        <li><a href="compras-<?=$this->total_paginas ?>">>|</a></li>

                                    </ul>
                                </div>
                            </table>
                    <?php }?>

                    <?php if($this->estado == 1) {?>
                    <table>
                                <div class="paginador">
                                    <ul>

                                        <li><a href="nuevo-1">|<</a></li>
                                        <li><a href="nuevo-<?= $this->pagina-1?>"><<</a></li>

                                        <?php for($i=1 ; $i <= $this->total_paginas ; $i++) {
                                            if($i == $this->pagina) { 
                                                echo '<li class="pageSelected">'.$i.'</li>';
                                             }else{
                                                echo '<li><a href="nuevo-'.$i.'">'.$i.'</a></li>';
                                            }
                                         }?>

                                        <li><a href="nuevo-<?= $this->pagina+1 ?>">>></a></li>
                                        <li><a href="nuevo-<?=$this->total_paginas ?>">>|</a></li>

                                    </ul>
                                </div>
                            </table>
                    <?php }?>

                    <?php if($this->estado == 2) {?>
                    <table>
                                <div class="paginador">
                                    <ul>

                                        <li><a href="reposicion-1">|<</a></li>
                                        <li><a href="reposicion-<?= $this->pagina-1?>"><<</a></li>

                                        <?php for($i=1 ; $i <= $this->total_paginas ; $i++) {
                                            if($i == $this->pagina) { 
                                                echo '<li class="pageSelected">'.$i.'</li>';
                                             }else{
                                                echo '<li><a href="reposicion-'.$i.'">'.$i.'</a></li>';
                                            }
                                         }?>

                                        <li><a href="reposicion-<?= $this->pagina+1 ?>">>></a></li>
                                        <li><a href="reposicion-<?=$this->total_paginas ?>">>|</a></li>

                                    </ul>
                                </div>
                            </table>
                    <?php }?>
                </div>
            </div>
        </div>
    </main>
</div> 

</body>
</html>
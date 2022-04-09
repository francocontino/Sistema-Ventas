<!--html//listadoProductos.php-->
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
</head>
<style>
    .pad{padding:15px;}
</style>
<body>
<?php include '../html/inicio.php' ?>
<div class="main-content">
    <main>
        <a class="pad button btn-new" href="nuevo-producto"><span class="la la-plus"></span>Nuevo</a>
        <a class="pad button btn-neww" style="margin-left:50%" href="productos-repo">Bajo Reposicion</a>
        <a class="pad button btn-new" href="productos">Mostrar Todo</a>
        <br><br>
        <div class="card">
            <div class="card-header"> 
                <h3>Listado Productos</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">    
                    <table  width="100%">
                        <thead>
                            <tr><td>ID</td><td>Descripcion</td><td>Precio</td><td>Stock</td><td>Punto Reposicion</td></tr>
                        </thead>
                        <tbody>
                            <?php foreach($this->producto as $p) {?>
                                <tr><td><?=$p['id_produ']?></td>
                                    <td><?=$p['descripcion']?></td>
                                    <td><?=$p['precio']?></td>
                                    <td><?=$p['stock']?></td>
                                    <td><?=$p['pto_repo']?></td>
                                    <td><a class="button btn-edit" href="editar-producto-<?=$p['id_produ']?>">Editar</a></td>
                                    <td><a class="button btn-delete" href="productos-<?=$p['id_produ']?>">Eliminar</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
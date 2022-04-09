<!--html//listaoProveedores.php-->
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
<body>
<?php include '../html/inicio.php' ?>
<div class="main-content">
    <main> 
        <a class="button btn-new" href="nuevo-proveedor"><span class="la la-plus"></span>Nuevo</a>
        <br><br>
        <div class="card">
            <div class="card-header">
                <h3>Listado Proveedores</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%">
                        <thead>
                            <tr><td>ID</td><td>Razon Social</td><td>Telefono</td><td>Direccion</td></tr>
                        </thead>

                        <tbody>
                            <?php foreach($this->proveedor as $p) {?>
                        
                                <tr><td><?=$p['id_prove']?></td>
                                    <td><?=$p['razon_social']?></td>
                                    <td><?=$p['telefono']?></td>
                                    <td><?=$p['direccion']?></td>
                                    <td><a class="button btn-edit" href="editar-proveedor-<?=$p['id_prove']?>">Editar</a></td>
                                    <td><a class="button btn-delete" href="proveedores-<?=$p['id_prove']?>">Eliminar</a></td>
                                </tr>

                            <?php } ?>
                        <tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </main>
</div> 
</body>
</html>
<!--html//listaoClientes.php-->
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
        <a class="button btn-new" href="nuevo-cliente"><span class="la la-plus"></span>Nuevo</a>
        <br><br>
        <div class="card">
            <div class="card-header">
                <h3>Listado Clientes</h3>
            </div>  
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Nombre</td>
                                <td>DNI</td>
                                <td>Telefono</td>
                                <td>Direccion</td>
                            </tr>
                        </thead> 
                        <tbody> 
                            <?php foreach($this->clientes as $c) {?>
                                <tr><td><?=$c['id_cliente']?></td>
                                    <td><?=$c['nombre']?></td>
                                    <td><?=$c['dni']?></td>
                                    <td><?=$c['telefono']?></td>
                                    <td><?=$c['direccion']?></td>
                                    <td><a class="button btn-edit" href="editar-cliente-<?=$c['id_cliente']?>">Editar</a></td>
                                    <td><a class="button btn-delete" href="clientes-<?=$c['id_cliente']?>">Eliminar</a></td>
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

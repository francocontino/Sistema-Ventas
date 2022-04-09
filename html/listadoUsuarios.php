<!--html//listadoUsuarios.php-->
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
    <a class="button btn-new" href="nuevo-usuario"><span class="la la-plus"></span>Nuevo</a>
    <br><br>
    <div class="card">
            <div class="card-header">
                <h3>Listado Usuario</h3>
                </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%">
                        <thead><tr><td>ID</td><td>Nombre</td><td>Rol</td></tr></thead>
                        
                        <tbody>
                            <?php foreach($this->usuario as $u) {?>
                                <?php foreach($this->rol2 as $r) {?>
                                    <?php if($u['id_rol']==$r['id_rol']) {?>
                                            <tr>
                                                <td><?=$u['id_usuario']?></td>
                                                <td><?=$u['nombre']?></td>
                                                <td><?=$r['rol']?></td>
                                                
                                            
                                                <?php if($_SESSION['id']==1 && $u['id_usuario'] == 1){
                                                    echo'<td><a class="button btn-edit" href="editar-usuario-'.$u['id_usuario'].'">Editar</a></td>';
                                                }
                                                if($_SESSION['id']==1 && $u['id_usuario'] != 1){
                                                    echo'<td><a class="button btn-edit" href="editar-usuario-'.$u['id_usuario'].'">Editar</a></td>';
                                                    echo'<td><a class="button btn-delete" href="usuarios-'.$u['id_usuario'].'">Eliminar</a></td>';
                                                }?>

                                                <?php if($_SESSION['id'] !=1 && $u['id_usuario'] != 1 && $_SESSION['id']==$u['id_usuario'] && $_SESSION['rol'] ==1){
                                                    echo'<td><a class="button btn-edit" href="editar-usuario-'.$u['id_usuario'].'">Editar</a></td>';
                                                }
                                                if($_SESSION['id']!=1 && $u['id_usuario'] != 1 && $_SESSION['id']!=$u['id_usuario'] && $u['id_rol']!=1 && $_SESSION['rol'] ==1){
                                                    echo'<td><a class="button btn-edit" href="editar-usuario-'.$u['id_usuario'].'">Editar</a></td>';
                                                    echo'<td><a class="button btn-delete" href="usuarios-'.$u['id_usuario'].'">Eliminar</a></td>';
                                                }?>

                                                <?php if($_SESSION['id'] !=1 && $u['id_usuario'] != 1 && $_SESSION['id']==$u['id_usuario'] && $_SESSION['rol'] !=1){
                                                    echo'<td><a class="button btn-edit" href="editar-usuario-'.$u['id_usuario'].'">Editar</a></td>';
                                                }
                                                ?>
                                            </tr>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?></tbody>
                        
                        
                    </table>
                    
                </div>
            </div>
        </main>
    </div> 
</body>
</html>
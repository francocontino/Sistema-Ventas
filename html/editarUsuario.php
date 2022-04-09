<!--html/editarProducto.php-->
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
            <h3>Editar Usuario</h3>
            <br><br>
            <div class="form-nuevo">
            <form action="" method="post">

                <?php foreach($this->usuario as $u) {?>
                    <div>
                    <label for="nombre">Nombre: </label>
                    <input type="text" id="nombre" name="nombre" placeholder="Ingrese el Nombre" value="<?=$u['nombre']?>" required>
                    </div>
                        <div>
                    <?php if($_SESSION['id'] != $u['id_usuario']) {?>
                        <label for="rol">Rol: </label>
                        <select name="rol" id="rol">
                            <?php foreach($this->rol2 as $r) {?>
                                <option value="<?=$r['id_rol']?>">
                                <?=$r['rol']?></option>
                            <?php }?>
                        </select>
                    <?php } ?>
                    </div>
                        <div class="btn">
                    <a class="button btn-back" href="usuarios">Volver</a>
                    <input class="button btn-new" type="submit" value="Guardar">
                    </div>
                <?php }?>          
            </form>
            </div>
            
            
        </main>    
    </div>

</body>
</html>
<!--html/nuevoUsuario.php-->
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
            <h3>Nuevo Usuario</h3>
            <br><br>
            <div class="form-nuevo">
            <form action="" method="post">
                <div>
                <label for="nombre">Nombre: </label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingrese el Nombre" required>
                </div>
                <div>
                <label for="clave">Contraseña: </label>
                <input type="number" id="clave" name="clave" placeholder="Ingrese la contraseña" required>
                </div>
                <div>
                <label for="rol">Rol: </label>
                <select name="rol" id="rol">
                    <?php foreach($this->rol2 as $r) {?>
                        <option value="<?=$r['id_rol']?>">
                        <?=$r['rol']?></option>
                    <?php }?>
                </select>
                </div>
                <div class="btn">     
                <a class="button btn-back" href="usuarios">Volver</a>
                <input class="button btn-new" type="submit" value="Guardar">
                </div>
            </form>
            </div>
            
    </main>    
</div>
</body>
</html>
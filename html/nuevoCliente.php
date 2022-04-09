<!--html/nuevoCliente.php-->
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
            <h3>Nuevo Cliente</h3>
            <br><br>
            <div class="form-nuevo">
                    <form action="" method="post">
                        <div>
                            <label for="nombre">Nombre: </label>
                            <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre" required>
                        </div>
                        <div>
                            <label for="DNI">DNI: </label>
                            <input type="number" id="DNI" name="DNI" placeholder="Ingrese el DNI" required>
                        </div>

                        <div>
                            <label for="telefono">Telefono: </label>
                            <input type="number" id="telefono" name="telefono" placeholder="Ingrese el Telefono" required>
                        </div>
                        
                        <div>
                            <label for="direccion">Direccion: </label>
                            <input type="text" id="direccion" name="direccion" placeholder="Ingrese la Direccion" required>
                        </div>

                        <div class="btn">
                            <a  class="button btn-back" href="clientes">Volver</a>
                            <input class="button btn-new" type="submit" value="Guardar">
                        </div>

                    </form>
            
            </div>     
        </main>    
    </div>
</body>
</html>
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
            <h3>Editar Producto</h3>
            <br><br>
            <div class="form-nuevo">

            <form action="" method="post">

                <?php foreach($this->producto as $p) {?>
                    <div>
                    <label for="descripcion">Descripcion: </label>
                    <input type="text" id="descripcion" name="descripcion" placeholder="Ingrese la Descripcion" value="<?=$p['descripcion']?>">
                    </div>
                        <div>
                    <label for="precio">Precio: </label>
                    <input type="number" id="precio" name="precio" placeholder="Ingrese el Precio" value="<?=$p['precio']?>">
                    </div>
                        <div>
                    <label for="stock">Stock: </label>
                    <input type="number" id="stock" name="stock" placeholder="Ingrese el Stock" value="<?=$p['stock']?>">
                    </div>
                        <div>
                    <label for="pto_repo">Reposicion: </label>
                    <input type="text" id="pto_repo" name="pto_repo" placeholder="Ingrese el Punto Reposicion" value="<?=$p['pto_repo']?>">
                    </div>
                        <div class="btn">
                    <a class="button btn-back" href="productos">Volver</a>
                    <input class="button btn-new" type="submit" value="Guardar">
                </div>
                <?php }?>
                
            </form>
            </div>
            <br>
            
        </main>    
    </div>
</body>
</html>
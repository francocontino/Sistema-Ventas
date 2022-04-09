<!--html/editarCompra.php-->
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
            <h3>Editar Estado</h3>
            <br></br>
            <div class="form-nuevo">

            <form action="" method="post">

                <?php foreach($this->compra as $c) {?>
                    <?php foreach($this->proveedores as $p) {?>
                            <?php if($c['id_prove']==$p['id_prove']) {?>
                                <div>
                                <label for="descripcion">Descripcion: </label>
                                <input type="hidden" id="descripcionh" name="descripcionh" value="<?=$c['descripcion']?>">
                                <input type="text" id="descripcion" name="descripcion" value="<?=$c['descripcion']?>" disabled>
                                </div>
                        <div>
                                <label for="cantidad">Cantidad: </label>
                                <input type="hidden" id="cantidadh" name="cantidadh" value="<?=$c['cantidad']?>">
                                <input type="number" id="cantidad" name="stock" value="<?=$c['cantidad']?>" disabled>
                                </div>
                        <div>
                                <label for="precio">Precio: </label>
                                <input type="hidden" id="precioh" name="precioh" value="<?=$c['precio']?>">
                                <input type="number" id="precio" name="precio" value="<?=$c['precio']?>" disabled>
                                </div>
                        <div>
                                <label for="proveedor">Proveedor: </label>
                                <input type="text" id="proveedor" name="proveedor" value="<?=$p['razon_social']?>" disabled>
                                </div>
                        <div>
                                <label for="estado">Estado: </label>
                                <select name="estado" id="estado">
                                        <?php if($c['estatus_compra']== 1) {?>                      
                                            <option class="pend" value="1"  selected>Pendiente</option>
                                            <option class="reg" value="2" >Registrado</option>
                                            <option class="nocoin" value="3" >No Coincidente</option>
                                            <option class="anu" value="4" >Anulado</option>                   
                                        <?php } ?>
                                        <?php if($c['estatus_compra']== 2) {?>
                                            <option class="pend" value="1" >Pendiente</option>
                                            <option class="reg" value="2"  selected>Registrado</option>
                                            <option class="nocoin" value="3" >No Coincidente</option>
                                            <option class="anu" value="4" >Anulado</option>                   
                                        <?php } ?>
                                        <?php if($c['estatus_compra']== 3) {?>
                                            <option class="pend" value="1" >Pendiente</option>
                                            <option class="reg" value="2" >Registrado</option>
                                            <option class="nocoin" value="3"  selected>No Coincidente</option>
                                            <option class="anu" value="4" >Anulado</option>               
                                        <?php } ?>
                                        <?php if($c['estatus_compra']== 4) {?>
                                            <option class="pend" value="1" >Pendiente</option>
                                            <option class="reg" value="2" >Registrado</option>
                                            <option class="nocoin" value="3" >No Coincidente</option>
                                            <option class="anu" value="4" selected>Anulado</option>               
                                        <?php } ?>
                                    </select>
                                    </div>
                        <div class="btn">
                                <a class="button btn-back" href="compras">Volver</a>
                                <input class="button btn-new" type="submit" value="Guardar">
                                </div>
                            <?php }?>
                        <?php }?>
                <?php }?>
                
            </form>
            </div>
        </main>    
    </div>
</body>
</html>
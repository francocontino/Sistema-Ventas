<!--html/nuevoPedido.php-->
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
<body>
    <style>
        #agregar,#agregar2,#procesar{display:none};
    </style>

<?php include '../html/inicio.php' ?>
    <div class="main-content">
        <main>

    <h3>Nueva Venta</h3>

    
    <div>
        
        <form action="" metdod="GET">
                <div class="form-nuevop"><h3>Datos Cliente</h3>
                    <?php if($this->id_cliente != null){?>
                        <input type="hidden" name="id-cliente" id="id-cliente"  value="<?= $this->id_cliente ?>" required>
                    <?php } else {?>
                        <input type="hidden" name="id-cliente" id="id-cliente" required>
                    <?php }?>
                    <div>
                    <label for="dni-cliente">DNI: </label>
                    <?php if($this->dni_cliente != null){?>
                        <input type="number" id="dni-cliente" name="dni-cliente" value="<?= $this->dni_cliente ?>" required>
                    <?php } else {?>
                        <input type="number" id="dni-cliente" name="dni-cliente" required placeholder="Ingrese el dni">
                    <?php }?>
                    </div>
                    <div>
                    <label for="nombre">Nombre: </label>
                    <input type="text" id="nombre" name="nombre" disabled required>
                    </div>
                    <div>
                    <label for="telefono">Telefono: </label>
                    <input type="text" id="telefono" name="telefono" disabled required>
                    </div>
                    <div>
                    <label for="direccion">Direccion: </label>
                    <input type="text" id="direccion" name="direccion" disabled required>
                    </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <h3>Datos Venta</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="tbl_venta" width="100%">
                            <thead>
                                <tr>
                                    <td width="100px">Descripcion</td>
                                    <td>Codigo</td>
                                    <td>Stock</td>
                                    <td width="100px">Cnatidad</td>
                                    <td>Precio</td>
                                    <td>Precio Total</td>
                                </tr>
                                <tr>
                                    <td><input type="text" id="descripcion" name="descripcion" placeholder="Ingrese la descripcion"></td>
                                    <input  type="hidden" id="cod-produ2" name="cod-produ2">
                                    <td id="cod-produ" name="cod-produ">-</td>
                                    <td id="stock" name="stock">-</td>
                                    <td><input type="number" id="cant" name="cant" value=0 min=1 disabled></td>
                                    <td id="precio" name="precio">0.00</td>
                                    <td id="precio_tot" name="">0.00</td>
                                    <td id="agregar2"> <input class="button btn-new" type="submit" id="agregar" name="agregar" class="agregar" value="Agregar"></td>
                                </tr>
                                <tr>
                                    <td>Codigo</td>
                                    <td colspan="2">Descripcion</td>
                                    <td>Cantidad</td>
                                    <td>Precio</td>
                                    <td>Precio Total</td>
                                </tr>
                            </thead>
                            <tbody id="detalle">
                            <?php
                            $sub_total = 0;
                            $total = 0;
                            if($this->resultado != null){
                                if($this->resultado_iva != null){
                                    foreach($this->resultado_iva as $ri){
                                        $iva = $ri['iva'];
                                    }
                                }
                                foreach($this->resultado as $r){
                                    $precioTotal = round($r['cantidad'] * $r['precio_venta'],2);
                                    $sub_total = round($sub_total + $precioTotal,2);
                                    $total = round($total + $precioTotal,2);
                        
                                    echo'        <tr>
                                                                <td>'.$r['id_produ'].'</td>
                                                                <td colspan="2">'.$r['descripcion'].'</td>
                                                                <td>'.$r['cantidad'].'</td>
                                                                <td>'.$r['precio_venta'].'$</td>
                                                                <td>'.$precioTotal.'$</td>
                                                                <td><a class="button btn-delete" href="eliminar-pedido2-'.$r['id_detalletemp'].'-'.$this->id_cliente.'-eliminar-'.$this->dni_cliente.'">Eliminar</a></td>
                                                            </tr>';
                                }
                                //onclick= "event.preventDefault();
                                //<a href="" onclick= "event.preventDefault(); productoDetalle('.$r['id_detalletemp'].');">Eliminar</a>
                                //id="eliminar" value='.$r['id_detalletemp'].'
                                //onclick="event.preventDefault(); producto_detalle('.$r['id_detalletemp'].');"
                                $impuesto = round($sub_total * ($iva/100),2);
                                $tl_siva = round($sub_total - $impuesto,2);
                                $total = round($tl_siva + $impuesto,2);
                        
                                echo '<tr>
                                                    <td colspan="5">SUBTOTAL</td>
                                                    <td>'.$tl_siva .'$</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">IVA ('.$iva.'%)</td>
                                                    <td>'.$impuesto.'$</td>
                                                </tr>
                                                <tr>
                                                <td 
                                                    colspan="5">TOTAL</td>
                                                    <td>'.$total.'$</td>
                                                </tr>';
                            }?>
                                <!--<tr>
                                    <td>1</td>
                                    <td colspan="2">Mouse</td>
                                    <td>1</td>
                                    <td>100.00</td>
                                    <td>100.00</td>
                                    <td><a href="#" onclick="event.preventDefault(); del_producto_detalle(1);">Eliminar</a></td>
                                </tr>-->
                            </tbody>
                            <tbody id="totales">
                                <!--<tr>
                                    <td colspan="5">SUBTOTAL</td>
                                    <td>1000.00</td>
                                </tr>
                                <tr>
                                    <td colspan="5">IVA (10%)</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                <td 
                                    colspan="5">TOTAL</td>
                                    <td>1100.00</td>
                                </tr>-->    
                            </tbody>
                        </table>
                        <br><br>
                        <a class="buttonp btn-back end" href="pedidos">Volver</a>
                        <input class="buttonp btn-new" type="submit" value="Procesar" id="procesar">
                        <a class="buttonp btn-delete" href="" id="anular">Anular</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </main>    
</div>

    
<script src="pedido"></script>
<script>
    $('#descripcion').keyup(function(e){
        e.preventDefault();
        console.log('hola');
        var pr =$(this).val();
        var action = 'searchProducto';
        console.log(pr);
        $.ajax({
            url: 'veri-producto',
            type: "POST",
            async: true,
            data: {action:action,producto:pr},
    
            success: function(response){
                console.log(JSON.parse(response));
                
                if(response==0){
                    $('#cod-produ').html('-');
                    $('#cod-produ2').val('0');
                    $('#stock').html('-');
                    $('#cant').val('0');
                    $('#precio').html('0.00');
                    $('#precio_tot').html('0.00');

                    $('#cant').attr('disabled','disabled');

                    $('#agregar').slideUp();
                    $('#agregar2').slideUp();
                }
                else{
                    //console.log(JSON.parse(response));
                    var data = JSON.parse(response);
                    //console.log(JSON.parse(response.nombre));
                    $('#cod-produ').html(data[0].id_produ);
                    $('#cod-produ2').val(data[0].id_produ);
                    $('#stock').html(data[0].stock);
                    $('#cant').val('1');
                    $('#precio').html(data[0].precio);
                    $('#precio_tot').html(data[0].precio);

                    $('#cant').removeAttr('disabled');

                    $('#agregar').slideDown();
                    $('#agregar2').slideDown();
                }
            },
            error: function(error) {
            }
        });
    });
</script>
<script>
    Procesar();
</script>

</body>
</html> 
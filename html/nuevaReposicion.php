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
<?php include '../html/inicio.php' ?>
    <div class="main-content">
        <main>
            <h3>Nueva Reposicion</h3>
            <div>
            <div class="form-nuevor">
                <form action="" method="POST">
                    <h3>Datos Proveedor</h3>
                    <div>
                        <input type="hidden" name="id_prove" id="id_prove" required>
                        <label for="razon_social">Razon Social: </label>
                        <input type="text" id="razon_social" name="razon_social" required placeholder="Ingrese la razon social">
                    </div>
                    <div>
                        <label for="telefono">Telefono: </label>
                        <input type="text" id="telefono" name="telefono" disabled required>
                    </div>
                    <div>
                        <label for="direccion">Direccion: </label>
                        <input type="text" id="direccion" name="direccion" disabled required>
                    </div>
                    <h3>Datos Producto</h3>
                        <div>
                            <label for="descripcion">Descripcion: </label>
                            <input type="text" id="descripcion" name="descripcion" required placeholder="Ingrese la descripcion">
                        </div>
                        <div>
                            <label for="id_produ">Codigo: </label>
                            <input type="number" id="id_produ" name="id_produ" disabled required>
                            <input type="hidden" id="id_produ2" name="id_produ2">
                        </div>
                        <div>
                            <label for="stock">Stock Actual: </label>
                            <input type="number" id="stock" name="stock" disabled required>
                        </div>
                        <div>
                            <label for="cant">Cantidad: </label>
                            <input type="number" id="cant" name="cant" disabled required>
                        </div>
                        <div>
                            <label for="precio">Precio: </label>
                            <input type="number" id="precio" name="precio" disabled required>
                        </div>
                        <div class="btn">
                            <a class="button btn-back" href="compras">Volver</a>
                            <input class="button btn-new" type="submit" value="Procesar" id="procesar2">
                            <input type="hidden" value="2" id="compra_repo" name="compra_repo">
                        </div>
                </form>
            </div>
            </div>
        </main>    
    </div>

<!--<script src="compra"></script>-->
<script>
$('#razon_social').keyup(function(e){
        e.preventDefault();
    
        var prov =$(this).val();
        var action = 'searchProveedor';

        $.ajax({
            url: 'veri-prov',
            type: "POST",
            async: true,
            data: {action:action,proveedor:prov},
    
            success: function(response){
                
                if(response==0){
                    $('#id_prove').val('');
                    $('#telefono').val('');
                    $('#direccion').val('');
                }
                else{
                    var data = JSON.parse(response);
                    $('#id_prove').val(data[0].id_prove);
                    //$('#razon_social').val(data[0].razon_social);
                    $('#telefono').val(data[0].telefono);
                    $('#direccion').val(data[0].direccion);
                }
            },
            error: function(error) {
            }
        });
    });

//AJAX searchProducto
$('#descripcion').keyup(function(e){
    e.preventDefault();

    var pr =$(this).val();
    console.log(pr);
    var action = 'searchProducto';
    $.ajax({
        url: 'veri-producto',
        type: "POST",
        async: true,
        data: {action:action,producto:pr},

        success: function(response){
            //console.log(JSON.parse(response));
            
            if(response==0){
                $('#id_produ').val('');
                $('#id_produ2').val('');
                $('#stock').val('');
                $('#cant').val('');
                $('#precio').val('');

                $('#cant').attr('disabled','disabled');
                $('#precio').attr('disabled','disabled');

                //$('#agregar').slideUp();
                //$('#agregar2').slideUp();
            }
            else{
                //console.log(JSON.parse(response));
                var data = JSON.parse(response);
                //console.log(JSON.parse(response.nombre));
                $('#id_produ').val(data[0].id_produ);
                $('#id_produ2').val(data[0].id_produ);
                $('#stock').val(data[0].stock);
                $('#cant').val('1');
                $('#precio').val('0.00');

                $('#cant').removeAttr('disabled');
                $('#precio').removeAttr('disabled');

                //$('#agregar').slideDown();
                //$('#agregar2').slideDown();
            }
        },
        error: function(error) {
        }
    });
});
</script>

</body>
</html>
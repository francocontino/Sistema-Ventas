//AJAX searchCliente
$('#dni-cliente').keyup(function(e){

    e.preventDefault();

    var cl =$(this).val();
    var action = 'searchCliente';
    //console.log(this.value);
    $.ajax({
        url: 'veri-cliente',
        type: "POST",
        async: true,
        data: {action:action,cliente:cl},

        success: function(response){
            //console.log(JSON.parse(response));
            
            if(response==0){
                $('#id-cliente').val('');
                $('#nombre').val('');
                $('#telefono').val('');
                $('#direccion').val('');
            }
            else{
                //console.log(JSON.parse(response));
                var data = JSON.parse(response);
                //console.log(JSON.parse(response.nombre));
                $('#id-cliente').val(data[0].id_cliente);
                $('#nombre').val(data[0].nombre);
                $('#telefono').val(data[0].telefono);
                $('#direccion').val(data[0].direccion);
            }
        },
        error: function(error) {
        }
    });
});

//AJAX searchProducto BUSQUEDA DE PRODUCTO CON CODIGO
/*$('#cod-produ').keyup(function(e){
        e.preventDefault();
    
        var pr =$(this).val();
        var action = 'searchProducto';
        $.ajax({
            url: 'veri-producto',
            type: "POST",
            async: true,
            data: {action:action,producto:pr},
    
            success: function(response){
                //console.log(JSON.parse(response));
                
                if(response==0){
                    $('#descripcion').html('-');
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
                    $('#descripcion').html(data[0].descripcion);
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
    });*/

    /*BUSQUEDA DE PRODUCTO CON NOMBRE
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
                    $('#stock').html('-');
                    $('#cant').val('0');
                    $('#precio').html('0.00');
                    $('#precio_tot').html('0.00');

                    $('#cant').attr('disabled','disabled');

                    $('#agregar').slideUp();
                    $('#agregar2').slideUp();
                }
                else{
                    console.log(JSON.parse(response));
                    var data = JSON.parse(response);
                    //console.log(JSON.parse(response.nombre));
                    $('#cod-produ').html(data[0].id_produ);
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
    });*/

$('#cant').keyup(function(e){
    e.preventDefault();

    var precio_total = $(this).val()*$('#precio').html();
    var stock = parseInt($('#stock').html());

    $('#precio_tot').html(precio_total);

    if( $(this).val() < 1 || isNaN($(this).val()) || $(this).val()%1!=0 || $(this).val() > stock){
        $('#agregar').slideUp();
        $('#agregar2').slideUp();
    }else{
        $('#agregar').slideDown();
        $('#agregar2').slideDown();
    }
});



//AJAX agergar produ al detalle
/*$('#agregar').click(function(e){
    e.preventDefault();
    if($('#cant').val()>0){
        

        var codproducto = $('#cod-produ').val();
        var cantidad = $('#cant').val();
        var cliente = $('#id-cliente').val();
        var action = 'addProductoDetalle';
        //console.log(cliente);
        $.ajax({
            url: 'veridetalle.php',
            type: "POST",
            async: true,
            data: {action:action,producto:codproducto,cantidad:cantidad,cliente:cliente},

            success: function(response){
                //console.log(response);
                
                if(response != 'error'){
                    var info = JSON.parse(response);
                    $('#detalle').html(info.detalle);
                    $('#totales').html(info.totales);

                    $('#cod-produ').val('');
                    $('#descripcion').html('-');
                    $('#stock').html('-');
                    $('#cant').val('0');
                    $('#precio').html('0.00');
                    $('#precio_tot').html('0.00');

                    $('#cant').attr('disabled','disabled');

                    $('#agregar').slideUp();
                    $('#agregar2').slideUp();
                }
                else{
                    console.log("sin inforamcaion");
                }
                Procesar(); 
            },
            error: function(error) {
            }
        });
    }
});*/


//AJAX anular venta
$('#anular').click(function(e){
    e.preventDefault();
    
    var filas = $('#detalle tr').length;

    if(filas > 0){

        var action = 'anularVenta';
        var cliente = $('#id-cliente').val();
        console.log(cliente);

        $.ajax({
            url: 'veri-eliminar',
            type: "POST",
            async: true,
            data: {action:action,cliente:cliente},

            success: function(response){

                if(response != 'error'){
                    window.location.href = "nuevo-pedido";
                }
            },
            error: function(error) {
            }
        });
    }
});

$('#procesar').click(function(e){
    e.preventDefault();

    var filas = $('#detalle tr').length;

    if(filas > 0){
        var action = 'procesarVenta';
        var cliente = $('#id-cliente').val();
        console.log(cliente);
        $.ajax({
            url: 'nuevo-pedido',
            type: "POST",
            async: true,
            data: {action:action,cliente:cliente},

            success: function(response){

                if(response != 'error'){
                    //console.log(JSON.parse(response));
                    var info = JSON.parse(response);
                    generarPDF(info[0].id_cliente,info[0].id_pedido);
                    window.location.href = "nuevo-pedido";
                }
            },
            error: function(error) {
            }
        });
    }
});



//});

function generarPDF(cliente,factura){
    var width = 1000;
    var height = 800;
    
    var x = parseInt((window.screen.width/2) - (width/2));
    var y = parseInt((window.screen.height/2) - (height/2));

    $url = 'genera-factura-'+cliente+'-'+factura;
    window.open($url,"Factura","left="+x+",top="+y+",height="+height+",width="+width+",scrollbar=si,location=no,resizable=si,menubar=no");

}

/*function productoDetalle(id_detalle){
    //e.preventDefault();
    var id_detalle = id_detalle;
    var action = 'productoDetalle';
    var cliente = $('#id-cliente').val();

    //console.log(id_detalle);
    $.ajax({
    url: 'nuevopedido.php',
    type: "POST",
    async: true,
    data: {action:action,id_detalle:id_detalle,cliente:cliente},

    success: function(response){
        //console.log(response);
                
            if(response != 'error'){
                //var info = JSON.parse(response);
                //$('#detalle').html(info.detalle);
                //$('#totales').html(info.totales);

                $('#cod-produ').val('');
                $('#descripcion').html('-');
                $('#stock').html('-');
                $('#cant').val('0');
                $('#precio').html('0.00');
                $('#precio_tot').html('0.00');

                $('#cant').attr('disabled','disabled');

                $('#agregar').slideUp();
                $('#agregar2').slideUp();
            }
            else{
                $('#detalle').html('');
                $('#totales').html('');
            }
            Procesar();
        },
        error: function(error) {
            }
    });
};*/

function Procesar(){
    if($('#detalle tr').length > 0){
        $('#procesar').show();
    }
    else{
        $('#procesar').hide();
    }
};

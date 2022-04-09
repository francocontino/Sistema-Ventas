//AJAX searchProveedor
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
$('#id_produ').keyup(function(e){
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
                $('#descripcion').val('');
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
                $('#descripcion').val(data[0].descripcion);
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
$('.anular_factura').click(function(e){
    e.preventDefault();

    var no_factu = $(this).attr('fac');
    console.log(no_factu);

    if(no_factu > 0){
        var action = 'anularPedido';
        $.ajax({
            url: 'pedidos',
            type: "POST",
            async: true,
            data: {action:action,no_factu:no_factu},

            success: function(response){

                if(response != 'error'){
                    //console.log(response);
                    location.reload();
                }
            },
            error: function(error) {
            }
        });
    }
});

$('.view_factura').click(function(e){
    e.preventDefault();

    var no_factu = $(this).attr('p');
    var id_cliente = $(this).attr('c');
    generarPDF(id_cliente,no_factu);

});

function generarPDF(cliente,factura){
    var width = 1000;
    var height = 800;
    
    var x = parseInt((window.screen.width/2) - (width/2));
    var y = parseInt((window.screen.height/2) - (height/2));

    //$url = '../controllers/generaFactura.php?cl='+cliente+'&f='+factura;
    $url = 'genera-factura-'+cliente+'-'+factura;
    window.open($url,"Factura","left="+x+",top="+y+",height="+height+",width="+width+",scrollbar=si,location=no,resizable=si,menubar=no");

};
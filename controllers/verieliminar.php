<?php
//controllers//veridetalle.php
//detalle temporal 
require '../fw/fw.php';
require '../models/Detalle_temp.php';
require '../models/Configuracion.php';
require '../models/Clientes.php';
require 'verisesion.php';

if($_POST['action']=='anularVenta'){
    if(!isset($_POST['cliente'])) die("error");
    //print_r($_POST);
    $p = new Detalle_temp();

    $resultado = $p->deleteCliente($_POST['cliente']);

    if($resultado != null){
        echo 'ok';
    }else{
        echo 'error';
    }
    exit;
}

/*if($_POST['action']=='productoDetalle'){

    if(!isset($_POST['id_detalle']))die("error");
    if(!isset($_POST['cliente']))die("error");

    $c = new Configuracion();
    $resultado_iva = $c->getIva();
      
    $p = new Detalle_temp();
    $resultado = $p->delAlmacenado($_POST['id_detalle'],$_POST['cliente']);

    $detalleTabla = '';
    $detalleTotales = '';
    $sub_total = 0;
    $iva = 0;
    $total = 0;
    $arrayData = array();

    if($resultado != null){
        if($resultado_iva != null){
            foreach($resultado_iva as $ri){
                $iva = $ri['iva'];
            }
        }
        foreach($resultado as $r){
            $precioTotal = round($r['cantidad'] * $r['precio_venta'],2);
            $sub_total = round($sub_total + $precioTotal,2);
            $total = round($total + $precioTotal,2);

            $detalleTabla .='        <tr>
                                        <td>'.$r['id_produ'].'</td>
                                        <td colspan="2">'.$r['descripcion'].'</td>
                                        <td>'.$r['cantidad'].'</td>
                                        <td>'.$r['precio_venta'].'$</td>
                                        <td>'.$precioTotal.'$</td>
                                        <td><a href="#" onclick="event.preventDefault(); productoDetalle('.$r['id_detalletemp'].');">Eliminar</a></td>
                                    </tr>';
        }
        $impuesto = round($sub_total * ($iva/100),2);
        $tl_siva = round($sub_total - $impuesto,2);
        $total = round($tl_siva + $impuesto,2);

        $detalleTotales = '<tr>
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

        $arrayData['detalle'] = $detalleTabla;
        $arrayData['totales'] = $detalleTotales;

        echo json_encode($arrayData,JSON_UNESCAPED_UNICODE);
    }else{
        echo 'error';
    }

    
    //print_r($_POST);
    exit;
}*/
?>
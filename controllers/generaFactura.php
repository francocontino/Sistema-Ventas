<?php

	//print_r($_REQUEST);
	//exit;
	//echo base64_encode('2');
	//exit;

	require '../fw/fw.php';
	require_once '../pdf/vendor/autoload.php';
	require '../models/Detalle_temp.php';
	require '../models/Pedido.php';
	require '../models/Clientes.php';
	require '../models/Configuracion.php';
	require 'verisesion.php';
	use Dompdf\Dompdf;

	
if($_SESSION['rol']!=3){
	if(!isset($_GET['cl']) || !isset($_GET['f']))
	{
		echo "No es posible generar la factura.";
	}else{
		$codCliente = $_REQUEST['cl'];
		$noFactura = $_REQUEST['f'];
		$anulada = '';

		$c = new Configuracion();
		$result_config = $c->getTodo();

		if($result_config != null){
			$configuracion = $result_config;
		}

		$p = new Pedido();
		$result = $p->getPedido($codCliente,$noFactura);

		if($result != null){
			$factura = $result;
			foreach($factura as $f){
				$no_factura = $f['id_pedido'];

				if($f['estatus'] == 2){
					//$anulada = '<img class="anulada" src="../factura/img/anulado.png" alt="Anulada">';
					$anulada = 'Anulada';
				}
			}

			$result_detalle = $p->getDetalle($no_factura);


			ob_start();
		    include(dirname('__FILE__').'./html/factura.php');
		    $html = ob_get_clean();

			// instantiate and use the dompdf class
			$dompdf = new Dompdf();

			$dompdf->loadHtml($html);
			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('letter', 'portrait');
			// Render the HTML as PDF
			$dompdf->render();
			// Output the generated PDF to Browser
			ob_get_clean();
			$dompdf->stream('factura_'.$noFactura.'.pdf',array('Attachment'=>0));
			exit;
		}
	}
}else{
    header("Location:login");
}
?>
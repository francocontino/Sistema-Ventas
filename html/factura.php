<?php
	$subtotal 	= 0;
	$iva 	 	= 0;
	$impuesto 	= 0;
	$tl_sniva   = 0;
	$total 		= 0;
 ?>
 <br><br>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura</title>
</head>
<body>
<style>

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
p, label, span, table{
	font-family: 'BrixSansRegular';
	font-size: 9pt;
}
.h2{
	font-family: 'BrixSansBlack';
	font-size: 16pt;
}
.h3{
	font-family: 'BrixSansBlack';
	font-size: 12pt;
	display: block;
	background: #0a4661;
	color: #FFF;
	text-align: center;
	padding: 3px;
	margin-bottom: 5px;
}
#page_pdf{
	width: 95%;
	margin: 15px auto 10px auto;
}

#factura_head, #factura_cliente, #factura_detalle{
	width: 100%;
	margin-bottom: 10px;
}

#factura_detalle{
	border-collapse: collapse;
}
#factura_detalle thead th{
	background: #1f8fc3;
	color: #FFF;
	padding: 5px;
}
#detalle_productos tr:nth-child(even) {
    background: #ededed;
}
#detalle_totales span{
	font-family: 'BrixSansBlack';
}
.nota{
	font-size: 8pt;
}
.label_gracias{
	font-family: verdana;
	font-weight: bold;
	font-style: italic;
	text-align: center;
	margin-top: 20px;
}
.anulada{
	color:red;
	text-align: center;
	font-size: 30pt;
}
</style>

<?php echo '<div class="anulada">'.$anulada.'</div>';?>
<div id="page_pdf">
					<?php
							foreach($configuracion as $c){	
								echo '<span class="h2">'.$c['nombre'].'</span><br>
								<p>Direccion: '. $c['direccion'].'</p><br>
								<p>Teléfono: '. $c['telefono'].'</p><br>
								<p>Email: '.$c['email'].'</p><br>';
								$iva = $c['iva']; 
							}
						?>
	<br><br><br>
						<?php foreach($factura as $f) {
								echo '<h3>Factura</h3><br><br>
								<p>No. Factura: <strong>'.$f['id_pedido'].'</strong></p><br>
								<p>Fecha: '.$f['fecha'].'</p><br>
								<p>Hora: '.$f['hora'].'</p><br>';
							}
						?>
<br><br><br>
						<?php foreach($factura as $f) {
							echo ' <h3>Cliente</h3><br><br><table><tr>
									<td><label>DNI:</label><p>'.$f['dni'].'</p></td><br>
									<td><label>Teléfono:</label> <p>'.$f['telefono'].'</p></td><br>
									<td><label>Nombre:</label> <p>'.$f['nombre'].'</p></td><br>
									<td><label>Dirección:</label> <p>'.$f['direccion'].'</p></td><br>
								</tr></table>';
							}
						?>
<br><br><br>
		<table id="factura_detalle">
			<thead>
				<tr>
					<th width="50px">Cant.</th>
					<th class="textleft">Descripción</th>
					<th class="textright" width="150px">Precio Unitario.</th>
					<th class="textright" width="150px"> Precio Total</th>
				</tr>
			</thead>
			<tbody id="detalle_productos">
				<?php
					foreach($result_detalle as $rd){
			 
						echo '<tr>
								<td class="textcenter">'.$rd['cantidad'].'</td>
								<td>'.$rd['descripcion'].'</td>
								<td class="textright">'.$rd['precio_venta'].'</td>
								<td class="textright">'.$rd['precio_total'].'</td>
							</tr>';
					
								$precio_total = $rd['precio_total'];
								$subtotal = round($subtotal + $precio_total, 2);
					}
				?>
			<?php
				$impuesto 	= round($subtotal * ($iva / 100), 2);
				$tl_sniva 	= round($subtotal - $impuesto,2 );
				$total 		= round($tl_sniva + $impuesto,2);
			?>
			</tbody>
			<tfoot id="detalle_totales">
				<tr>
					<td colspan="3" class="textright"><span>SUBTOTAL Q.</span></td>
					<td class="textright"><span><?php echo $tl_sniva; ?></span></td>
				</tr>
				<tr>
					<td colspan="3" class="textright"><span>IVA (<?php echo $iva; ?> %)</span></td>
					<td class="textright"><span><?php echo $impuesto; ?></span></td>
				</tr>
				<tr>
					<td colspan="3" class="textright"><span>TOTAL Q.</span></td>
					<td class="textright"><span><?php echo $total; ?></span></td>
				</tr>
		</tfoot>
	</table>
	<div>
		<h4 class="label_gracias">¡Gracias por su compra!</h4>
	</div>

</div>

</body>
</html>
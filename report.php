<?php
session_start();
require_once 'MyConekta.php';

//Filter all the GET[] variables
$token_url      = filter_input(INPUT_GET, 'token');
$type           = filter_input(INPUT_GET, 'type');
$description    = filter_input(INPUT_GET, 'description');
$expiry_date    = filter_input(INPUT_GET, 'expiry_date');
$amount         = filter_input(INPUT_GET, 'amount');
$currency       = filter_input(INPUT_GET, 'currency');
$service_name   = filter_input(INPUT_GET, 'service_name');
$service_number = filter_input(INPUT_GET, 'service_number');
$reference      = filter_input(INPUT_GET, 'reference');
$barcode        = filter_input(INPUT_GET, 'barcode');
$barcode_url    = filter_input(INPUT_GET, 'barcode_url');

if(!isset($token_url) || !MyConekta::check_token($token_url))
    die('Reporte Invalido. Solo puede imprimir el reporte UNA vez, 
        vuelva a generar el donativo');

//Regenerate the token value to avoid repeat the report
$_SESSION['token'] = MyConekta::tokengenerator();
?>

<!DOCTYPE html>
<html>
    <head>
	    <title>Deposito en efectivo en <?=ucfirst($type)?></title>
    </head>
    <body>     
    	<h1>Resumen del Deposito</h1>
    	<div id="resumen">
    		<table>
    			<tr>
    				<td>Descripcion</td>
    				<td><?=$description?></td>
    			</tr>
    			<tr>
    				<td>Fecha <?=($type=='oxxo')?'de expiracion':''?></td>
    				<td>
    					<?php    						 
    						 if ($type == 'oxxo')
    							echo substr($expiry_date, 0, 2).'/'.substr($expiry_date, 2, 2).'/20'.substr($expiry_date, 4, 2);
    						else
    							echo $expiry_date;
    					?>
    				</td>
    			</tr>
    			<tr>
    				<td>Metodo de pago</td>
    				<td>Deposito en <?=ucfirst($type)?></td>
    			</tr>
    			<tr>
    				<td>Monto</td>
    				<td>$<?=substr($amount, 0, -2)?>.00 <?=strtoupper($currency)?></td>
    			</tr>
    		</table>
    	</div>

    	<h1>Informacion de la Ficha</h1>
    	<div id="informacion">
    		<?php if ($type != 'oxxo') : ?>
    		<table>
    			<tr>
    				<td>Banco</td>
    				<td><?=ucfirst($type)?></td>
    			</tr>
    			<tr>
    				<td>Nombre de Servicio</td>
    				<td><?=$service_name?></td>
    			</tr>
    			<tr>
    				<td>Numero de Servicio</td>
    				<td><?=$service_number?></td>
    			</tr>
    			<tr>
    				<td>Numero de Referencia</td>
    				<td><?=$reference?></td>
    				<td><img src="logos/<?=$type?>.png"></td>
    			</tr>
    			
    		</table>
    		<?php else :?>
			<table>
    			<tr>
    				<td><img src="<?=$barcode_url?>&height=50&width=1"></td>
    				<td><img src="logos/<?=$type?>.png"></td>
    			</tr>
    			<tr>
    				<td><?='<span class="txt-left">'.$barcode.'</span><span class="txt-right">EXP.'.$expiry_date.'</span>'?></td>
    				<td></td>
    			</tr>    			
    		</table>

    		<?php endif; ?>
    	</div>

    </body>    
</html>


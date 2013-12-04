<?php
session_start();
require_once 'MyConekta.php';

if(!isset($_GET['token']) || !MyConekta::check_token($_GET['token']))
    die('Reporte Invalido. Solo puede imprimir el reporte UNA vez, 
        vuelva a generar el donativo');

//Regenerate the token value to avoid repeat the report
$_SESSION['token'] = MyConekta::tokengenerator();
?>

<!DOCTYPE html>
<html>
    <head>
	    <title>Deposito en efectivo en <?=ucfirst($_GET['type'])?></title>
    </head>
    <body>     
    	<h1>Resumen del Deposito</h1>
    	<div id="resumen">
    		<table>
    			<tr>
    				<td>Descripcion</td>
    				<td><?=$_GET['description']?></td>
    			</tr>
    			<tr>
    				<td>Fecha <?=($_GET['type']=='oxxo')?'de expiracion':''?></td>
    				<td>
    					<?php    						 
    						 if ($_GET['type'] == 'oxxo')
    							echo substr($_GET['expiry_date'], 0, 2).'/'.substr($_GET['expiry_date'], 2, 2).'/20'.substr($_GET['expiry_date'], 4, 2);
    						else
    							echo $_GET['expiry_date'];
    					?>
    				</td>
    			</tr>
    			<tr>
    				<td>Metodo de pago</td>
    				<td>Deposito en <?=ucfirst($_GET['type'])?></td>
    			</tr>
    			<tr>
    				<td>Monto</td>
    				<td>$<?=substr($_GET['amount'], 0, -2)?>.00 <?=strtoupper($_GET['currency'])?></td>
    			</tr>
    		</table>
    	</div>

    	<h1>Informacion de la Ficha</h1>
    	<div id="informacion">
    		<?php if ($_GET['type'] != 'oxxo') : ?>
    		<table>
    			<tr>
    				<td>Banco</td>
    				<td><?=ucfirst($_GET['type'])?></td>
    			</tr>
    			<tr>
    				<td>Nombre de Servicio</td>
    				<td><?=$_GET['service_name']?></td>
    			</tr>
    			<tr>
    				<td>Numero de Servicio</td>
    				<td><?=$_GET['service_number']?></td>
    			</tr>
    			<tr>
    				<td>Numero de Referencia</td>
    				<td><?=$_GET['reference']?></td>
    				<td><img src="logos/<?=$_GET['type']?>.png"></td>
    			</tr>
    			
    		</table>
    		<?php else :?>
			<table>
    			<tr>
    				<td><img src="<?=$_GET['barcode_url']?>&height=50&width=1"></td>
    				<td><img src="logos/<?=$_GET['type']?>.png"></td>
    			</tr>
    			<tr>
    				<td><?='<span class="txt-left">'.$_GET['barcode'].'</span><span class="txt-right">EXP.'.$_GET['expiry_date'].'</span>'?></td>
    				<td></td>
    			</tr>    			
    		</table>

    		<?php endif; ?>
    	</div>

    </body>    
</html>


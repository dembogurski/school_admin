<?php
 

/** Report prg file (ventas_cred_cuo) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  

// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 

/*
$T = new Y_Template( $file_tpl ); 
// Superior Variables
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_desde', '2012-03-01');
$T->Set( 'sup_hasta', '2012-05-06');
$T->Set( 'sup_buscar', 'CLAY%');
$T->Set( 'sup_cli_ci', '6534589-4');
$T->Set( 'sup_suc', '%');
$T->Set( 'sup_estado', '%');
$T->Set( 'sup_gen_rep', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT f.fact_nro AS FACTURA,f.fact_nom_cli AS CLIENTE,  date_format(f.fact_fecha,"%d-%m-%Y") AS FECHA_FACTURA,f.fact_total AS TOTAL,c.ct_nro AS CUOTA_NRO, date_format(c.ct_fecha_venc,"%d-%m-%Y") AS VENC,c.ct_total AS VALOR_CUOTA,c.ct_estado AS ESTADO   FROM factura f, cuotas c WHERE f.fact_nro = c.ct_ref AND f.fact_cli_ci LIKE '6534589-4' AND f.fact_fecha BETWEEN '2012-03-01'  AND '2012-05-06' AND f.fact_localidad LIKE '%'AND c.ct_estado LIKE '%' ORDER BY f.fact_fecha ASC  ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$db = new Y_DB();
$db->Database = $Global['project'];

$detallado = $sup['det_pago'];


$desde = $sup['desde'];
$hasta = $sup['hasta'];  
$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4); 
$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);
$cliente = $sup['cli_ci'];
if($cliente == '%'){
  $T->Set('cliente', $sup['cli_ci']);  
  $T->Set('cab_cli', '<th>CLIENTE</th>');  
  $T->Set('foot_cli', ' <td></td>');  
}

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables
$subtotal0_TOTAL = 0;
$subtotal0_VALOR_CUOTA = 0;


//Define a Old Values Variables
$old['FACTURA'] = '';
$old['CLIENTE'] = '';
$old['FECHA_FACTURA'] = '';
$old['TOTAL'] = '';
$old['CUOTA_NRO'] = '';
$old['VENC'] = '';
$old['VALOR_CUOTA'] = '';
$old['ESTADO'] = '';

$z_entrega = 0;

$titulo_detalle = '<th colspan="5" align="center" style="background:#ffffcc">Detalle de Amortizaciones</th> ';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FACTURA'] = $Q0->Record['FACTURA'];
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['FECHA_FACTURA'] = $Q0->Record['FECHA_FACTURA'];
    $el['TOTAL'] = $Q0->Record['TOTAL'];
    $el['CUOTA_NRO'] = $Q0->Record['CUOTA_NRO'];
    $el['VENC'] = $Q0->Record['VENC'];
    $el['VALOR_CUOTA'] = $Q0->Record['VALOR_CUOTA'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];
    
    $ref = $el['FACTURA'];
    $nro_cuota = $el['CUOTA_NRO'];
          
    // Preparing a template variables
    
    
    if($sup['cli_ci'] == '%'){
        $T->Set('query0_CLIENTE', '<td class="item">'.$el['CLIENTE'].'</td>');
    }
    
    if($el['FACTURA'] != $old['FACTURA']){
        $T->Set('query0_FACTURA', $el['FACTURA']);
        $T->Set('query0_FECHA_FACTURA', $el['FECHA_FACTURA']);
        $T->Set('query0_TOTAL', number_format($el['TOTAL'],0,',','.'));
    }else{
        $T->Set('query0_FACTURA', '');
        $T->Set('query0_FECHA_FACTURA', '');
        $T->Set('query0_TOTAL', '');
    }
    
    
    $T->Set('query0_CUOTA_NRO', $el['CUOTA_NRO']);
    $T->Set('query0_VENC', $el['VENC']);
    $T->Set('query0_VALOR_CUOTA', number_format($el['VALOR_CUOTA'],0,',','.'));
    $T->Set('query0_ESTADO', $el['ESTADO']);
    if($el['ESTADO'] == 'Cancelada'){
       $T->Set('fondo', '#999933'); 
    }else{
       $T->Set('fondo', '#ffcc33');  
    }
    // Calculating a total

    // Calculating a subtotal
    $subtotal0_TOTAL += 0 + $el['TOTAL'];
    $subtotal0_VALOR_CUOTA += 0 + $el['VALOR_CUOTA'];

    
    
    
    // Detalle
    if($detallado == 'Si'){
       $db->Query("
       SELECT date_format(d_fecha,'%d-%m-%Y') AS fecha, d_concepto AS conc,d_comp AS comp, d_monto AS monto, d_saldo AS saldo  FROM cuotas_det_pago 
       WHERE d_ref = $ref AND d_ct = $nro_cuota ORDER BY id ASC");
       
       if($db->NumRows()>0){
          $T->Set('titulo_detalle',$titulo_detalle);   
        
       }else{
         $T->Set('titulo_detalle','');     
       }
       $T->Show('query0_data_row');
       
       if($db->NumRows()>0){
         $T->Show('cab_detalle_pago');
       }
       $i = 0;
       while($db->NextRecord()){
         $i++;
         $fecha = $db->Record['fecha'];
         $conc = $db->Record['conc']; 
         $comp = $db->Record['comp']; 
         if($comp == ''){ $comp = 'N/A'; }
         $monto = $db->Record['monto']; 
         $saldo = $db->Record['saldo']; 
         
         $z_entrega += 0 + $monto;
         
         $T->Set('fecha', $fecha);
         $T->Set('conc', $conc);      
         $T->Set('comp', $comp); 
         $T->Set('monto',  number_format($monto,0,',','.'));   
         $T->Set('saldo',  number_format($saldo,0,',','.'));   
         $T->Show('detalle_pago');
        
       }  
       if($i > 0 ){
          $T->Show('linea_vacia');
       }
       
    }else{
        $T->Show('query0_data_row');
    }   
    
    
    // Show Subtotal
    $T->Set('subtotal0_TOTAL', number_format($subtotal0_TOTAL,0,',','.'));
    $T->Set('subtotal0_VALOR_CUOTA', number_format($subtotal0_VALOR_CUOTA,0,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_TOTAL = 0;
        $subtotal0_VALOR_CUOTA = 0;
    }
    
    //Actualize Old Values Variables
    $old['FACTURA'] = $el['FACTURA'];
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['FECHA_FACTURA'] = $el['FECHA_FACTURA'];
    $old['TOTAL'] = $el['TOTAL'];
    $old['CUOTA_NRO'] = $el['CUOTA_NRO'];
    $old['VENC'] = $el['VENC'];
    $old['VALOR_CUOTA'] = $el['VALOR_CUOTA'];
    $old['ESTADO'] = $el['ESTADO'];
    $firstRow=false;
}

$endConsult = true;
if( $endConsult ){
    
     if($detallado == 'Si'){
        $T->Set('z_entrega', "<td><b>T. Entrega: </b></td><td><b>".number_format($z_entrega,0,',','.')."</b></td>" ); 
        $saldo_total = $subtotal0_VALOR_CUOTA - $z_entrega;
        $T->Set('z_saldo', "<td><b>T. Saldo: </b></td><td><b>".number_format($saldo_total,0,',','.')."</b></td>" );
    }
    
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}

if($cliente != '%'){
  $db->Query("select cli_fullname from mnt_cli where cli_ci = '$cliente' limit 1");  
  $db->NextRecord();
  $cl = $db->Record['cli_fullname'];
  echo '<script>
          $("#cliente").text("Cliente: '.$cl.' ");
       </script>';
}  
$T->Show('end_query0');				// Ends a Table 

   
?>

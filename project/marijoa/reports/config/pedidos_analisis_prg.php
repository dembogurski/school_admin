<?php

/** Report prg file (pedidos_urg_suc) 
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
$T->Set( 'sup___local', '02');
$T->Set( 'sup___suc', 'AVENIDA');
$T->Set( 'sup_ped_pend', '');
$T->Set( 'sup_origen', '01');
$T->Set( 'sup_destino', '05');
$T->Set( 'sup_desde', '2012-01-01');
$T->Set( 'sup_hasta', '2012-04-17');
$T->Set( 'sup_estado', '%');
$T->Set( 'sup_urge', '%');
$T->Set( 'sup_pedidos_urg', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p.nro AS NRO,p.__locald AS DESTINO, p.fecha AS FECHA, p.__user AS USURIO,d.codigo AS CODIGO, d.grupo AS GRUPO, d.tipo AS TIPO, d.color AS COLOR, d.cantidad AS CANTIDAD, d.urge AS URGE FROM nota_pedido p, nota_pedido_det d WHERE p.nro = d.nro_pedido AND  p.__local LIKE '01' AND p.__locald = '05'  AND d.urge LIKE '%'  AND p.estado LIKE '%' AND p.fecha BETWEEN '2012-01-01' AND '2012-04-17'  ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

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
$subtotal0_CANTIDAD = 0;

$suc_origen = $sup['origen'];
$T->Set('suc', $suc_origen);


//Define a Old Values Variables
$old['NRO'] = '';
$old['DESTINO'] = ''; $old['ORIGEN'] = '';
$old['FECHA'] = '';
$old['USURIO'] = '';
$old['CODIGO'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COLOR'] = '';
$old['CANTIDAD'] = '';
$old['URGE'] = '';
$old['ESTADO'] = '';
$old['REM'] = '';
$old['ESTADO_CODIGO'] = '';
$old['OBS'] = '';

$i = 0;

// Making a rows of consult
while( $Q0->NextRecord() ){
    $i++;
    // Define a elements
    $el['NRO'] = $Q0->Record['NRO'];
    $el['DESTINO'] = $Q0->Record['DESTINO'];$el['ORIGEN'] = $Q0->Record['ORIGEN'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['USURIO'] = $Q0->Record['USURIO'];
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $el['URGE'] = $Q0->Record['URGE'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];
    $el['ESTADO_CODIGO'] = $Q0->Record['ESTADO_CODIGO'];
    $el['REM'] = $Q0->Record['REM'];
    $el['OBS'] = $Q0->Record['OBS'];
    
    
    // Preparing a template variables
    $T->Set('query0_NRO', $el['NRO']);
    $T->Set('query0_DESTINO', $el['DESTINO']);$T->Set('query0_ORIGEN', $el['ORIGEN']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_USURIO', $el['USURIO']);
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_CANTIDAD', number_format($el['CANTIDAD'],0,',','.'));
    $T->Set('query0_URGE', $el['URGE']);
    $T->Set('query0_ESTADO', $el['ESTADO']);
    $T->Set('query0_REM', $el['REM']);
    $T->Set('query0_ESTADO_CODIGO', $el['ESTADO_CODIGO']);
    
    if($el['OBS'] !=""){
       $T->Set('query0_OBS',"<b><i>Obs:</i></b>&nbsp;&nbsp;<em>". $el['OBS']);  
    }else{
        $T->Set('query0_OBS',""); 
    }
    
     
    $codigo = $el['CODIGO'];
    $remplazo = $el['REM'];
     
    
    
    if($el['DESTINO']=="PR"){
      $T->Set('destino','pr');
    }else{
      $T->Set('destino','');
    }
    if($el['URGE']==='Si'){
      $T->Set('urge','urge');
    }else{
      $T->Set('urge','');
    }
    
    if($el['ESTADO_CODIGO'] == "En Proceso"){
      $T->Set('color_codigo','style="background:#999900"');
    }else if ($el['ESTADO_CODIGO'] == "Enviado") {
         $T->Set('color_codigo','style="background:#99ff00"');
    }else{
       $T->Set('color_codigo',''); 
    } 
    
    // CSS Colores de las Filas
    if($el['ESTADO']=="Abierta"){
        $T->Set('estado','abierta');
    }else if($el['ESTADO']=="Cerrada"){
         $T->Set('estado','cerrada');
    }else if($el['ESTADO']=="Pendiente"){
         $T->Set('estado','pendiente');
    }else if($el['ESTADO']=="En Deposito"){
     	 $T->Set('estado','deposito');
    }else{
         $T->Set('estado','abierta');
    }
    
    $f = $el['FECHA'];
    $fecha_inv = substr($f,6,10).'-'.substr($f,3,2).'-'.substr($f,0,2);
    $T->Set('fecha_inv',$fecha_inv);
    
   
    
    $subtotal0_CANTIDAD += 0 + $el['CANTIDAD'];
    
    if($remplazo != ''){
      $T->Set('resultado_ventas',"<tr><td id='ventas_$remplazo' colspan='12' ></td></tr>");
    }else{
      $T->Set('resultado_ventas',"<tr><td id='ventas_$codigo' colspan='12' ></td></tr>");  
    }
        
    

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANTIDAD', number_format($subtotal0_CANTIDAD,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANTIDAD = 0;
    }
    
    //Actualize Old Values Variables
    $old['NRO'] = $el['NRO'];
    $old['DESTINO'] = $el['DESTINO']; $old['ORIGEN'] = $el['ORIGEN'];
    $old['FECHA'] = $el['FECHA'];
    $old['USURIO'] = $el['USURIO'];
    $old['CODIGO'] = $el['CODIGO'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COLOR'] = $el['COLOR'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['URGE'] = $el['URGE'];  $old['REM'] = $el['REM'];
    $old['ESTADO'] = $el['ESTADO'];  
    $old['ESTADO_CODIGO'] = $el['ESTADO_CODIGO']; 
    $old['OBS'] = $el['OBS'];
    $firstRow=false;

}
$T->Set('i', $i);
$endConsult = true;
if( $endConsult ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

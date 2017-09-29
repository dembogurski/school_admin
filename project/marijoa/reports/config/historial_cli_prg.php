<?php

/** Report prg file (historial_cli) 
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
$T->Set( 'sup_msg', 'Filtre Cuotas, Pagares y Cheques acotando las fechas de y a.');
$T->Set( 'sup_nro_cobro', '');
$T->Set( 'sup_dp_conv', 'No');
$T->Set( 'sup_cta', '');
$T->Set( 'sup_proc', 'false');
$T->Set( 'sup_fecha', '2011-03-22');
$T->Set( 'sup_fecha_a', '2012-03-22');
$T->Set( 'sup_fecha_inv', '2011-03-22');
$T->Set( 'sup_fecha_inva', '2012-03-22');
$T->Set( 'sup_deudor', 'MIRTHA');
$T->Set( 'sup_n_deudor', '63');
$T->Set( 'sup_estado', 'Pendiente');
$T->Set( 'sup_suc', '%');
$T->Set( 'sup_print0', '');
$T->Set( 'sup_limite_credito', '40000000');
$T->Set( 'sup_deuda_actual', '20682403.00');
$T->Set( 'sup_print', '');
$T->Set( 'sup_cuotas', '');
$T->Set( 'sup_pagares', '');
$T->Set( 'sup_cheques_ter', '');
$T->Set( 'sup_cuenta', '');
$T->Set( 'sup_depositos', '');
$T->Set( 'sup_conv', '');
$T->Set( 'sup___msg', '( ! )  Para pagar multiples cuotas genera un nuevo cobro arriba... ');
$T->Set( 'sup_cobro_mult_cuot', '');
$T->Set( 'sup_fin', 'No');
$T->Set( 'sup__confirmar', 'false');
$T->Set( 'sup___goBack', '');
$T->Set( 'sup_cheques_ter_pen', '');
$T->Set( 'sup_cliente', 'Mirtha Afara');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select ct_ref AS FACTURA,ct_nro AS NRO_CTA,DATE_FORMAT(ct_fecha_venc,"%d-%m-%Y")  AS VENCIMIENTO,ct_monto AS MONTO ,ct_entrega AS MONTO_ENTREGA,ct_estado AS ESTADO,rest as RESTANTE FROM cuotas WHERE  ct_estado  like 'Pendiente' AND ct_ci like '63' and ct_fecha_venc between '2011-03-22' and '2012-03-22' order by ct_fecha_venc asc";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$amor_de = $sup['amor_de'];
$amor_a = $sup['amor_a'];
$suc = $sup['empr'];


$data_ini = substr($sup['fecha'],8,2).'-'.substr($sup['fecha'],5,2).'-'.substr($sup['fecha'],0,4);
$data_fin = substr($sup['fecha_a'],8,2).'-'.substr($sup['fecha_a'],5,2).'-'.substr($sup['fecha_a'],0,4);
$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);


$db = new Y_DB();
$db->Database = $Global['project'];

$db2 = new Y_DB();
$db2->Database = $Global['project'];

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
$total0_MONTO = 0;
$total0_MONTO_ENTREGA = 0;
$total0_RESTANTE = 0;

//Define a Subtotal Variables
$subtotal0_MONTO = 0;
$subtotal0_MONTO_ENTREGA = 0;
$subtotal0_RESTANTE = 0;


//Define a Old Values Variables
$old['FACTURA'] = '';
$old['NRO_CTA'] = '';
$old['VENCIMIENTO'] = '';
$old['MONTO'] = '';
$old['MONTO_ENTREGA'] = '';
$old['ESTADO'] = '';
$old['RESTANTE'] = '';
$old['RET'] = '';
$old['FECHA_EMISION'] = '';
$old['SUC'] = '';


// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FACTURA'] = $Q0->Record['FACTURA'];
    $el['NRO_CTA'] = $Q0->Record['NRO_CTA'];
    $el['VENCIMIENTO'] = $Q0->Record['VENCIMIENTO'];
    $el['MONTO'] = $Q0->Record['MONTO'];
    $el['MONTO_ENTREGA'] = $Q0->Record['MONTO_ENTREGA'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];
    $el['RESTANTE'] = $Q0->Record['RESTANTE'];
    $el['RET'] = $Q0->Record['RET'];
    $el['FECHA_EMISION'] = $Q0->Record['FECHA_EMISION']; 
     $el['SUC'] = $Q0->Record['SUC'];
     
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_MONTO = 0;
        $subtotal0_MONTO_ENTREGA = 0;
        $subtotal0_RESTANTE = 0;
    }

    // Preparing a template variables
    $T->Set('query0_FACTURA', $el['FACTURA']);
    $T->Set('query0_NRO_CTA', $el['NRO_CTA']);
    $T->Set('query0_VENCIMIENTO', $el['VENCIMIENTO']);
    $T->Set('query0_MONTO', number_format($el['MONTO'],0,',','.'));
    $T->Set('query0_MONTO_ENTREGA', number_format($el['MONTO_ENTREGA'],0,',','.'));
    $T->Set('query0_ESTADO', $el['ESTADO']);
    $T->Set('query0_RESTANTE', number_format($el['RESTANTE'],0,',','.'));
    $T->Set('query0_RET', number_format($el['RET'],0,',','.')); 
    $T->Set('query0_FECHA_EMISION', $el['FECHA_EMISION'] );   
     $T->Set('query0_SUC', $el['SUC'] );  

    // Calculating a total
    $total0_MONTO += 0 + $el['MONTO'];
    $total0_MONTO_ENTREGA += 0 + $el['MONTO_ENTREGA'];
    $total0_RESTANTE += 0 + $el['RESTANTE'];

    // Calculating a subtotal
    $subtotal0_MONTO += 0 + $el['MONTO'];
    $subtotal0_MONTO_ENTREGA += 0 + $el['MONTO_ENTREGA'];
    $subtotal0_RESTANTE += 0 + $el['RESTANTE'];

    $factura = $el['FACTURA'];
    $cuota = $el['NRO_CTA'];
    $estado = $el['ESTADO'];
    // Modified on 10/12/2012 order by d_fecha asc to id asc
    
    $sqla = 'SELECT  DATE_FORMAT(d_fecha,"%d-%m-%Y") as a_fecha, d_comp, d_concepto,d_monto, d_saldo FROM cuotas_det_pago d  WHERE d_ref = '.$factura.' AND d_ct = '.$cuota.' and d_fecha between "'.$amor_de.'" and "'.$amor_a.'" order by d_fecha asc, d.id asc ';
    //echo $sqla;

    $db->Query( $sqla ); 
    $db2->Query("SELECT group_concat(f_nro) AS facturas FROM fact_cont WHERE f_ref = $factura" );
    $facturas = "";
    if($db2->NumRows()>0){
         $db2->NextRecord();
         $facturas = $db2->Record['facturas'];
         $T->Set('facturas',"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style='font-weight:bolder;font-size:11px'>Facturas:</label>&nbsp;&nbsp;".$facturas);
    }else{
        $T->Set('facturas',''); 
        $facturas = "";
    }

    $flag =0;
    if($db->NumRows()>0){
       $flag=1;
       $T->Set('cabecera','<th class="cab">FECHA</th><th>CONCEPTO</th><th>COMPROBANTE</th><th align="center">MONTO</th><th align="center" class="fin">SALDO</th> ');
       $T->Set('estado','estado');
    }else{
       $flag=0;
       if($estado === 'Cancelada'){
         $T->Set('cabecera','<td align="center" colspan="5">No se tiene detalle de Amortizaciones</td>');
       }else{
         $T->Set('cabecera','');
       }
    }
    $T->Show('query0_data_row');
    
    

    while( $db->NextRecord() ){
        $d_fecha = $db->Record['a_fecha'];
        $d_comp= $db->Record['d_comp'];
        $d_concepto= $db->Record['d_concepto'];
        $d_monto = $db->Record['d_monto'];
        $d_saldo = $db->Record['d_saldo'];
        $T->Set('fecha',$d_fecha);
        $T->Set('comp',$d_comp);
        $T->Set('concepto',$d_concepto);
        $T->Set('monto',number_format($d_monto,0,',','.'));
        $T->Set('saldo',number_format($d_saldo,0,',','.'));
        $T->Show("detalle"); 
        $T->Set('facturas',''); 
        $facturas = "";
    }
    if($flag==1){
       echo "<td colspan='5' class='vacio'>    </td>  " ;
    }
    if($db->NumRows()>0){
        
    }else{
       $T->Show("sin_detalle");  
    }

    // Show Subtotal
    $T->Set('subtotal0_MONTO', number_format($subtotal0_MONTO,0,',','.'));
    $T->Set('subtotal0_MONTO_ENTREGA', number_format($subtotal0_MONTO_ENTREGA,0,',','.'));
    $T->Set('subtotal0_RESTANTE', number_format($subtotal0_RESTANTE,0,',','.'));
    $PAGADO = $total0_MONTO - $subtotal0_RESTANTE;

    $T->Set('total0_PAGADO', number_format($PAGADO,0,',','.'));
    
    //Actualize Old Values Variables
    $old['FACTURA'] = $el['FACTURA'];
    $old['NRO_CTA'] = $el['NRO_CTA'];
    $old['VENCIMIENTO'] = $el['VENCIMIENTO'];
    $old['MONTO'] = $el['MONTO'];
    $old['MONTO_ENTREGA'] = $el['MONTO_ENTREGA'];
    $old['ESTADO'] = $el['ESTADO'];
    $old['RESTANTE'] = $el['RESTANTE'];    
    $old['RET'] = $el['RET']; 
    $old['FECHA_EMISION'] = $el['FECHA_EMISION'];    
    $old['SUC'] = $el['SUC']; 
    $firstRow=false;

}

$endConsult = true;
if( $endConsult ){
     
    $T->Show('query0_subtotal_row');
}
// Show total
$T->Set('total0_MONTO', number_format($total0_MONTO,0,',','.'));

$T->Set('total0_MONTO_ENTREGA', number_format($total0_MONTO_ENTREGA,0,',','.'));
$T->Set('total0_RESTANTE', number_format($total0_RESTANTE,0,',','.'));
if( endConsult ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

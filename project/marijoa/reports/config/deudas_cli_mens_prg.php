<?php

/** Report prg file (deudas_cli_mens) 
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
$T->Set( 'sup_suc', '02');
$T->Set( 'sup_fecha', '2014-12-22');
$T->Set( 'sup_fecha_a', '2015-12-22');
$T->Set( 'sup_fecha_inv', '2014-12-22');
$T->Set( 'sup_fecha_inva', '2015-12-22');
$T->Set( 'sup_estado', 'Pendiente');
$T->Set( 'sup_deudor', '');
$T->Set( 'sup_n_deudor', '');
$T->Set( 'sup_limite_credito', '');
$T->Set( 'sup_deuda_actual', '');
$T->Set( 'sup_print', '');
$T->Set( 'sup_ct_tipo', '');
$T->Set( 'sup_g_rep', '');
$T->Set( 'sup_g_rep_hist', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT DISTINCT DATE_FORMAT(ct_fecha_venc,"%m-%Y") AS MES  FROM cuotas  WHERE ct_estado = "Pendiente" AND ct_fecha_venc BETWEEN '2014-12-22' AND '2015-12-22' and __local = '02'  ORDER BY MES  ASC ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$desde = $sup['fecha'];
$hasta = $sup['fecha_a'];
$suc = $sup['suc'];

$data_ini = substr($sup['fecha'],8,2).'-'.substr($sup['fecha'],5,2).'-'.substr($sup['fecha'],0,4);
$data_fin = substr($sup['fecha_a'],8,2).'-'.substr($sup['fecha_a'],5,2).'-'.substr($sup['fecha_a'],0,4); 
$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

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


//Define a Old Values Variables
$old['MES'] = '';

echo "<tr class='item'> <th>CLIENTE</th><th>SUC</th>";


$meses = array();

$deudas = array();

// Making a rows of consult
while( $Q0->NextRecord() ){

     
    $el['MES'] = $Q0->Record['MES'];
    
    array_push($meses, $el['MES']);
    
    $T->Set('query0_MES', $el['MES']);
 

    $T->Show('query0_data_row');
     
    $old['MES'] = $el['MES'];
    $firstRow=false;

}
echo "<th>Totales</th>";
echo "</tr>";
 
$Q0->Query("SELECT __local as Suc,DATE_FORMAT(ct_fecha_venc,'%m-%Y') AS MES,ct_ci AS RUC,ct_deudor AS CLIENTE, SUM(rest) AS VALOR_DEUDA FROM cuotas 
 WHERE ct_estado = 'Pendiente' AND ct_fecha_venc BETWEEN '$desde' AND '$hasta' and  __local LIKE '$suc'  GROUP BY MES, CLIENTE, __local ORDER BY CLIENTE ASC" );

while( $Q0->NextRecord() ){ 
    $MES = $Q0->Record['MES'];
    $RUC = $Q0->Record['RUC'];
	$local = $Q0->Record['Suc'];
    $VALOR_DEUDA = $Q0->Record['VALOR_DEUDA'];    
    $CLAVE = $MES."_".$RUC."_".$local;    
    $deudas[$CLAVE] = $VALOR_DEUDA;
}


$Q0->Query("SELECT __local as Suc,ct_ci as CI, ct_deudor AS CLIENTE  FROM cuotas WHERE ct_estado = 'Pendiente' AND ct_fecha_venc BETWEEN '$desde' AND '$hasta' and  __local LIKE '$suc' GROUP BY CI,__local ORDER BY CLIENTE  ASC" );
while( $Q0->NextRecord() ){ 
    $ci = $Q0->Record['CI'];
    $cliente = strtoupper( $Q0->Record['CLIENTE']);
	$local = $Q0->Record['Suc'];
	$total_x_cliente = 0;
    echo "<tr>";
    
    echo "<td class='item'>$cliente</td><td class='item'>$local</td>";
    
    foreach ($meses as $mes) {
        $key = $mes."_".$ci."_".$local;         
        $valor = number_format($deudas[$key],0,',','.');
        echo "<td class='num'>$valor</td>";
		$total_x_cliente += $deudas[$key];
    }
    echo "<td class='num'>".number_format($total_x_cliente,0,',','.')."</td>";
    echo "</tr>";
}

$Q0->Query("SELECT DATE_FORMAT(ct_fecha_venc,'%m-%Y') AS MES, SUM(rest) AS VALOR_TOTAL FROM cuotas WHERE ct_estado = 'Pendiente' AND ct_fecha_venc BETWEEN  '$desde' AND '$hasta' and  __local LIKE '$suc' GROUP BY MES ORDER BY ct_fecha_venc  ASC" );
echo "<tr>"
. "<td class='item'> </td><td class='item'> </td>";
while( $Q0->NextRecord() ){ 
    $MES = $Q0->Record['MES'];
    $VALOR_TOTAL = number_format($Q0->Record['VALOR_TOTAL'],0,',','.');  
    echo "<td class='num' style='font-weight:bolder'>$VALOR_TOTAL</td>";
}
echo "</tr>";
$endConsult = true;
 
$T->Show('end_query0');				// Ends a Table 
 

?>

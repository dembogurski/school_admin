<?php

/** Report prg file (alta_clientes) 
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
$T->Set( 'sup_desde', '2010-04-16');
$T->Set( 'sup_hasta', '2010-04-16');
$T->Set( 'sup_suc_', '%');
$T->Set( 'sup_vend', '%');
$T->Set( 'sup_desdeinv', '2010-04-16');
$T->Set( 'sup_hastainv', '2010-04-16');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup___rep', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT cli_fullname AS CLIENTE, cli_cat AS CATEGORIA, cli_fecha_ins AS FECHA_ALTA, cli_suc AS SUC, cli_vend AS VENDEDOR FROM mnt_cli WHERE cli_fecha_ins BETWEEN '2010-04-16' AND  '2010-04-16' AND cli_vend like '%' AND cli_suc like  '%'  ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$desde = $sup['desdeinv'];
$hasta = $sup['hastainv'];

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);
$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables


//Define a Old Values Variables
$old['CLIENTE'] = '';
$old['CATEGORIA'] = '';
$old['FECHA_ALTA'] = '';
$old['SUC'] = '';
$old['VENDEDOR'] = '';

	$Q = new Y_DB();
	$Q->Database = $Global['project'];

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['CATEGORIA'] = $Q0->Record['CATEGORIA'];
    $el['FECHA_ALTA'] = $Q0->Record['FECHA_ALTA'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['VENDEDOR'] = $Q0->Record['VENDEDOR'];

    // Preparing a template variables
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_CATEGORIA', $el['CATEGORIA']);
    $T->Set('query0_FECHA_ALTA', $el['FECHA_ALTA']);
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_VENDEDOR', $el['VENDEDOR']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    
    
    /*#########################  Facturas vendidas en este lapso de tiempo ######################33*/
    
     $cli = $el['CLIENTE'];
     $Q->Query("SELECT fact_nom_cli, fact_cli_cat,fact_vend_cod, date_format(fact_fecha,'%d-%m-%Y') as fact_fecha, fact_total   FROM factura where fact_fecha BETWEEN '$desde'  and  '$hasta' AND fact_nom_cli = '$cli' and fact_estado = 'Cerrada';");
     
     if ($Q->NumRows() > 0) {
     	echo "<tr style='font-size:11px; background-color:lightgray;' >   <td  align='left'> <b><i>&nbsp; VENTAS EN EL PERIODO &nbsp;&nbsp; $data_ini &nbsp;-&nbsp; $data_fin</i> </b> </td> </tr>";
        echo "<tr  style='font-size:11px;font-weight:bolder;' >  <td>&nbsp;VENDEDOR  </td> <td>&nbsp; CATEGORIA  </td>    <td>&nbsp;FECHA  </td>    <td> &nbsp;TOTAL </td> </tr>";
     }else{
     	 echo "<tr style='font-size:12px;background-color:lightgray;' >   <td COLSPAN='5' align='center'> <B> SIN VENTAS EN ESTE LAPSO </B> </td> </tr>";
     }
     
     while ($Q->NextRecord() ){
	    $cliente  = $Q->Record['fact_nom_cli'];
	    $cat  = $Q->Record['fact_cli_cat'];
		$vendedor  = $Q->Record['fact_vend_cod'];
		$fecha  = $Q->Record['fact_fecha'];
		$ftotal = $Q->Record['fact_total']; 
	    echo "<tr style='font-size:12px;'>    <td>&nbsp;$vendedor </td> <td> &nbsp; $cat  </td>    <td>&nbsp;$fecha  </td>    <td>&nbsp; $ftotal </td> </tr>";
     }

     echo "<tr> <td colspan='5' style='height:50px;'>&nbsp; </td> </tr> ";
    
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['CATEGORIA'] = $el['CATEGORIA'];
    $old['FECHA_ALTA'] = $el['FECHA_ALTA'];
    $old['SUC'] = $el['SUC'];
    $old['VENDEDOR'] = $el['VENDEDOR'];
    $firstRow=false;

}

$endConsult = true;
if( true ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

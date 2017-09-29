<?php

/** Report prg file (tot_ven_func) 
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
$T->Set( 'sup_desde', '2011-06-25');
$T->Set( 'sup_hasta', '2011-07-25');
$T->Set( 'sup_empr', '01');
$T->Set( 'sup_rep_total_suc', '');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_rep_func', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT DISTINCT func_nombre  AS FUNCIONARIO  FROM  factura WHERE fact_fecha BETWEEN  '2011-06-25' AND '2011-07-25'  AND   fact_localidad like '01'  AND fact_estado = "Cerrada"  ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$data_ini = substr($sup['desde'],8,2).'-'.
			substr($sup['desde'],5,2).'-'.
			substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.
			substr($sup['hasta'],5,2).'-'.
			substr($sup['hasta'],0,4);
$T->Set('data_ini',$data_ini);
$T->Set('data_fin',$data_fin);

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

$des = $sup['desde'];
$has = $sup['hasta'];
$empr = $sup['empr'];


    $Q1 = new Y_DB();
	$Q1->Database = $Global['project'];	
			 
  	  

//Define a Old Values Variables
$old['FUNCIONARIO'] = '';
$old['CODE_FUNC'] = '';
$Z_TOTAL = 0;

$Z_MONTO_DEVOLUCION = 0;
$Z_NETO = 0;

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FUNCIONARIO'] = $Q0->Record['FUNCIONARIO'];
    $el['CODE_FUNC'] = $Q0->Record['CODE_FUNC'];
    $vendedor = $el['CODE_FUNC'];

    // Preparing a template variables
    $T->Set('query0_FUNCIONARIO', $el['FUNCIONARIO']);

    // Calculating a total

    // Calculating a subtotal
	$func = $el['FUNCIONARIO'];
	$Q1->Query("SELECT sum(df_subtotal) AS  TOTAL   FROM  factura f, det_factura d  WHERE  f.fact_nro = d.df_fact_num AND fact_vend_cod  = '$vendedor'  AND  fact_fecha BETWEEN  '$des' AND '$has' AND fact_localidad LIKE '$empr'  AND fact_estado = 'Cerrada' AND df_cod_prod <> 1000 AND df_cod_prod <> 1001 AND df_cod_prod <> 1002 ORDER BY f.id ASC");
	$Q1->NextRecord();
	$TOTAL = $Q1->Record['TOTAL'];
	$Z_TOTAL  += 0 + $TOTAL; 
	$T->Set('total',number_format( $TOTAL ,0,',','.') );


    // Devoluciones
    $Q1->Query("SELECT SUM(d.monto_dev) AS MONTO_DEVOLUCION FROM factura f,  devoluciones d  WHERE f.fact_nro = d.fact_nro AND  forma LIKE 'Efectivo' AND dv_hoy  BETWEEN '$des' AND '$has' AND  f.fact_vend_cod LIKE '$vendedor'");
    $Q1->NextRecord();
    $MONTO_DEVOLUCION = $Q1->Record['MONTO_DEVOLUCION'];
    $T->Set('MONTO_DEVOLUCION', number_format($MONTO_DEVOLUCION,0,',','.'));
    $Z_MONTO_DEVOLUCION +=0+$MONTO_DEVOLUCION;

    $NETO = $TOTAL - $MONTO_DEVOLUCION;
    $T->Set('NETO', number_format($NETO,0,',','.'));



    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['FUNCIONARIO'] = $el['FUNCIONARIO'];
    $old['CODE_FUNC'] = $el['CODE_FUNC'];

    $firstRow=false;

}
$T->Set('Z_TOTAL', number_format( $Z_TOTAL ,0,',','.') );
$Z_NETO =0+ $Z_TOTAL - $Z_MONTO_DEVOLUCION;
$T->Set('Z_NETO', number_format($Z_NETO,0,',','.'));
$T->Set('Z_DEV', number_format($Z_MONTO_DEVOLUCION,0,',','.'));
 

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

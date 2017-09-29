<?php

/** Report prg file (control_empaque) 
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
$T->Set( 'sup_aut_lock', 'true');
$T->Set( 'sup_suc', '%');
$T->Set( 'sup_desde', '2012-12-06');
$T->Set( 'sup_hasta', '2012-12-06');
$T->Set( 'sup_rep', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT count(*) AS CANT_FACTURAS FROM factura f WHERE f.fact_fecha BETWEEN '2012-12-06' AND '2012-12-06'  AND fact_estado = "Cerrada" AND fact_localidad = '%'";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4); 
$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

$desde = $sup['desde'];
$hasta = $sup['hasta'];

$suc = $sup['suc'];

$db = new Y_DB();
$db->Database = $Global['project']; 

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
$old['CANT_FACTURAS'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CANT_FACTURAS'] = $Q0->Record['CANT_FACTURAS'];

    // Preparing a template variables
    $T->Set('query0_CANT_FACTURAS', number_format($el['CANT_FACTURAS'],0,',','.'));  
    
    
    $db->Query("SELECT count(*) as CANT FROM factura f WHERE f.fact_fecha BETWEEN '$desde' AND '$hasta'   AND fact_estado = 'Cerrada' AND fact_localidad = '$suc' AND fact_empaque = 'No'");
    $db->NextRecord();
    $NO = $db->Record['CANT'];
    $T->Set('SIN_CONTROL', number_format($NO,0,',','.'));   
    
    if($NO > 0){
        $T->Set('color', 'red');   
    }else{
         $T->Set('color', 'green');   
    }
    
    $DIFF = $el['CANT_FACTURAS'] - $NO; 
    $T->Set('DIFF', number_format($DIFF,0,',','.'));   
    
    
    $porc = $DIFF * 100 / $el['CANT_FACTURAS'];   
    $T->Set('porc', number_format($porc,1,',','.'));   
    
    //$ajustados = "SELECT count(*) AS AJUSTADOS FROM factura f, det_factura d, mnt_ajustes a WHERE f.fact_nro = d.df_fact_num AND d.df_cod_prod = a.aj_prod AND  fact_empaque = 'Si' AND 
     // fact_localidad = '$suc' AND fact_fecha BETWEEN '$desde' AND '$hasta'  AND fact_estado = 'Cerrada' AND aj_usuario <> 'Sistema' ";
    
    /*$db->Query($ajustados);
    
    if($db->NumRows()>0){ 
        $db->NextRecord();
        $ajust = $db->Record['AJUSTADOS'];
        $T->Set('AJUSTADOS', number_format($ajust,0,',','.'));   
    }else{
        $T->Set('AJUSTADOS', number_format(0,0,',','.'));    
    }*/
    
    $T->Show('query0_data_row');
 
    
    //Actualize Old Values Variables
    $old['CANT_FACTURAS'] = $el['CANT_FACTURAS'];
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

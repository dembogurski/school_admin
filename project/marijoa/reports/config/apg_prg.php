<?php

/** Report prg file (apg) 
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
$T->Set( 'sup_busc_conc', '%');
$T->Set( 'sup_con', '%');
$T->Set( 'sup_sub', '%');
$T->Set( 'sup_sub_form', '%-%');
$T->Set( 'sup_desde', '2012-06-31');
$T->Set( 'sup_hasta', '2012-07-31');
$T->Set( 'sup_local', '%');
$T->Set( 'sup_user', '%');
$T->Set( 'sup_conp', '');
$T->Set( 'sup_detallado', 'Si');
$T->Set( 'sup_compl_tot', 'No');
$T->Set( 'sup_gen', '');
$T->Set( 'sup_gen_apg', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT c.cjc_ap AS APG, DATE_FORMAT(g.g_fecha, "%d-%m-%Y") AS FECHA, g.g_user AS USUARIO, g.g_empr AS SUC, c.cjc_cod AS COD, c.cjc_descri AS CONCEPTO, g.g_compl AS COMPLEMENTO,g.g_monto AS MONTO FROM caja_con c, gastos g WHERE c.cjc_cod = g.g_con AND  c.cjc_cod LIKE '%' AND  g.g_fecha BETWEEN '2012-06-31' AND '2012-07-31'AND g.g_empr LIKE '%' AND g.g_user LIKE '%' ORDER BY c.cjc_ap ASC, FECHA  ASC ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$desde = $sup['desde'];
$hasta = $sup['hasta'];
$suc = $sup['local'];
$user = $sup['user'];
 
$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);
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
$total0_MONTO = 0;

//Define a Subtotal Variables
$subtotal0_MONTO = 0;
$subtotal0_CONCEPTO = 0;


//Define a Old Values Variables
$old['APG'] = '';
$old['FECHA'] = '';
$old['USUARIO'] = '';
$old['SUC'] = '';
$old['COD'] = '';
$old['CONCEPTO'] = '';
$old['COMPLEMENTO'] = '';
$old['MONTO'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['APG'] = $Q0->Record['APG'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['USUARIO'] = $Q0->Record['USUARIO'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['COD'] = $Q0->Record['COD'];
    $el['CONCEPTO'] = $Q0->Record['CONCEPTO'];
    $el['COMPLEMENTO'] = $Q0->Record['COMPLEMENTO'];
    $el['MONTO'] = $Q0->Record['MONTO'];
    
    if( $el['CONCEPTO']!=$old['CONCEPTO'] ){
        if($old['CONCEPTO'] !=""){
          $T->Show('query0_subtotal_con');
        }
        //Reset a Subtotal Variables
        $subtotal0_CONCEPTO = 0;
    }
    
    if( $el['APG']!=$old['APG'] ){
        
        if($old['APG']==""){
          $T->Set('tipo', 'ACTIVOS');  
        }else{
           if($el['APG']=="G"){
              $T->Set('tipo',"GASTOS" );     
           }else{
              $T->Set('tipo',"PASIVOS" );       
           } 
          
        }
        
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_MONTO = 0;
    }

    // Preparing a template variables
    $T->Set('query0_APG', $el['APG']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_USUARIO', $el['USUARIO']);
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_COD', $el['COD']);
    $T->Set('query0_CONCEPTO', $el['CONCEPTO']);
    $T->Set('query0_COMPLEMENTO', $el['COMPLEMENTO']);
    $T->Set('query0_MONTO', number_format($el['MONTO'],0,',','.'));

    // Calculating a total
    $total0_MONTO += 0 + $el['MONTO'];

    // Calculating a subtotal
    $subtotal0_MONTO += 0 + $el['MONTO'];
    $subtotal0_CONCEPTO += 0 + $el['MONTO'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_MONTO', number_format($subtotal0_MONTO,0,',','.'));
    $T->Set('subtotal0_CONCEPTO', number_format($subtotal0_CONCEPTO,0,',','.'));
    
    //Actualize Old Values Variables
    $old['APG'] = $el['APG'];
    $old['FECHA'] = $el['FECHA'];
    $old['USUARIO'] = $el['USUARIO'];
    $old['SUC'] = $el['SUC'];
    $old['COD'] = $el['COD'];
    $old['CONCEPTO'] = $el['CONCEPTO'];
    $old['COMPLEMENTO'] = $el['COMPLEMENTO'];
    $old['MONTO'] = $el['MONTO'];
    $firstRow=false;

}

$endConsult = true;
if( $el['CONCEPTO']!=$old['CONCEPTO'] ){
    $T->Show('query0_subtotal_con');
}
if( $el['APG']!=$old['APG'] ){
    $T->Show('query0_subtotal_row');
}
// Show total
$T->Set('total0_MONTO', number_format($total0_MONTO,0,',','.'));
if( endConsult ){
    
    $T->Show('query0_subtotal_con');
    $T->Show('query0_subtotal_row2');
    $T->Show('query0_total_row');
}

$T->Show('end_query0');				// Ends a Table 

?>

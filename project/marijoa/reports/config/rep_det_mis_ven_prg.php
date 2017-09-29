<?php

/** Report prg file (rep_det_mis_ven) 
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
$T->Set( 'sup___user', 'graciela');
$T->Set( 'sup_func_nombre', 'Juana Graciela Cabeza Schubert');
$T->Set( 'sup_desde', '2008-07-02');
$T->Set( 'sup_hasta', '2008-07-03');
$T->Set( 'sup_gen', '');
$T->Set( 'sup_rep_hoy', ''); */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select fact_nro as Nro, fact_nom_cli as CLIENTE, fact_comi_vend AS COMISION, fact_total as TOTAL from factura where fact_vend_cod =  'graciela' and fact_fecha between  '2008-07-02'and '2008-07-03' limit 100";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$T->Set( 'sup_func_nombre',$el['func_nombre']);
$T->Set( 'sup_desde', $el['desde']);
$T->Set( 'sup_hasta', $el['hasta']);

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );


$user = $sup['__user'];
$Q1 = new Y_DB();
$Q1->Database = $Global['project'];

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables
$subtotal0_COMISION = 0;
$subtotal0_TOTAL = 0;


//Define a Old Values Variables
$old['Nro'] = '';
$old['CLIENTE'] = '';
$old['COMISION'] = '';
$old['TOTAL'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['Nro'] = $Q0->Record['Nro'];
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['COMISION'] = $Q0->Record['COMISION'];
    $el['TOTAL'] = $Q0->Record['TOTAL'];

    // Preparing a template variables
    $T->Set('query0_Nro', $el['Nro']);
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_COMISION', number_format($el['COMISION'],2,'.',','));
    $T->Set('query0_TOTAL', number_format($el['TOTAL'],2,'.',','));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_COMISION += 0 + $el['COMISION'];
    $subtotal0_TOTAL += 0 + $el['TOTAL'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_COMISION', number_format($subtotal0_COMISION,2,'.',','));
    $T->Set('subtotal0_TOTAL', number_format($subtotal0_TOTAL,2,'.',','));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_COMISION = 0;
        $subtotal0_TOTAL = 0;
    }
    
    //Actualize Old Values Variables
    $old['Nro'] = $el['Nro'];
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['COMISION'] = $el['COMISION'];
    $old['TOTAL'] = $el['TOTAL'];
    $firstRow=false;

}

$endConsult = true;
if( $endConsult ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 


$Q1->Query("SELECT id AS ID, desc_func_cod AS COD_FUNC, desc_func_nomb AS VENDEDOR, desc_monto AS MONTO, desc_motivo AS MOTIVO,desc_estado AS ESTADO,DATE_FORMAT(fecha,'%d-%m-%Y') AS FECHA
FROM sue_descuentos WHERE desc_func_cod = '$user' AND desc_estado = 'Pendiente'");

if($Q1->NumRows()>0){
  $T->Show('cab_des');
while($Q1->NextRecord()){
    $ID = $Q1->Record['ID'];
    $COD_FUNC = $Q1->Record['COD_FUNC'];
    $VENDEDOR = $Q1->Record['VENDEDOR'];
    $MONTO = $Q1->Record['MONTO'];
    $MOTIVO = $Q1->Record['MOTIVO'];
    $FECHA = $Q1->Record['FECHA'];
    $ESTADO = $Q1->Record['ESTADO'];
    $T->Set('ID',$ID);
    $T->Set('COD_FUNC',$COD_FUNC);
    $T->Set('MONTO',$MONTO);
    $T->Set('VENDEDOR',$VENDEDOR);
    $T->Set('MOTIVO',$MOTIVO);
    $T->Set('FECHA',$FECHA);
    $T->Set('ESTADO',$ESTADO);

    $T->Show('body_desc');
}
 $T->Show('pie_desc');
}

?>

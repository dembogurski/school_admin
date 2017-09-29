<?php

/** Report prg file (libro_mayor) 
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
$T->Set( 'sup_suc', '%');
$T->Set( 'sup_desde', '2011-10-24');
$T->Set( 'sup_hasta', '2012-10-24');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_emp_bus', 'rec');
$T->Set( 'sup_emp_cta_cont', '1.01.01.02.03');
$T->Set( 'sup_gen_mayor', '');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_as_huerfanos', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT a.nro_as AS NRO, date_format(a.fecha,"%d-%m-%y") AS FECHA, suc AS SUC,codigo AS CODIGO,c_descrip AS DESCRIP,saldo_ant AS S_ANT,debe AS DEBE, haber AS HABER,saldo AS SALDO  FROM asientos_cont a, asientos_det d, plan_cuentas p WHERE a.nro_as = d.nro_as AND p.c_cod =  d.codigo  AND a.fecha BETWEEN '2011-10-24' AND   '2012-10-24' AND d.codigo like '1.01.01.02.03' AND suc LIKE '%' ORDER BY d.codigo ASC,a.fecha ASC";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );


$db = new Y_DB();
$db->Database = 'marijoa';
 

//$cuenta = $sup['emp_cta_cont'];

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);
$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);


$general = false;

if($sup['suc']=='%'){
    $general = true;
    $T->Set('display_suc','none');
    $T->Set('display_all','block');
}else{
    $T->Set('display_suc','block');
    $T->Set('display_all','none');
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
$subtotal0_DEBE = 0;
$subtotal0_HABER = 0;
$subtotal0_SALDO = 0;

$subtotal0_SALDO_SUC = 0;


$total0_DEBE = 0;
$total0_HABER = 0;
$total0_SALDO = 0;
$total0_SALDO_SUC = 0;


//Define a Old Values Variables
$old['NRO'] = '';
$old['FECHA'] = '';
$old['SUC'] = '';
$old['CODIGO'] = '';
$old['DESCRIP'] = '';
$old['S_ANT'] = '';
$old['DEBE'] = '';
$old['HABER'] = '';
$old['SALDO'] = '';

$old['S_ANT_SUC'] = '';
$old['SALDO_SUC'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['NRO'] = $Q0->Record['NRO'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['DESCRIP'] = $Q0->Record['DESCRIP'];
    $el['S_ANT'] = $Q0->Record['S_ANT'];
    $el['DEBE'] = $Q0->Record['DEBE'];
    $el['HABER'] = $Q0->Record['HABER'];
    $el['SALDO'] = $Q0->Record['SALDO'];
    
    $el['S_ANT_SUC'] = $Q0->Record['S_ANT_SUC'];
    $el['SALDO_SUC'] = $Q0->Record['SALDO_SUC'];
    
    if ($el['CODIGO'] != $old['CODIGO'] && $old['CODIGO'] != '') {
         $T->Show('query0_subtotal_row');
         $subtotal0_DEBE = 0;
         $subtotal0_HABER = 0;
         $subtotal0_SALDO = 0;
         $subtotal0_SALDO_SUC = 0;
    }

    // Preparing a template variables
    $T->Set('query0_NRO', $el['NRO']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_DESCRIP', $el['DESCRIP']);
    $T->Set('query0_S_ANT', number_format($el['S_ANT'],0,',','.'));  
    $T->Set('query0_DEBE', number_format($el['DEBE'],0,',','.'));
    $T->Set('query0_HABER', number_format($el['HABER'],0,',','.'));
    $T->Set('query0_SALDO', number_format($el['SALDO'],0,',','.'));
    
    $T->Set('query0_S_ANT_SUC', number_format($el['S_ANT_SUC'],0,',','.'));
    $T->Set('query0_SALDO_SUC', number_format($el['SALDO_SUC'],0,',','.'));

    // Calculating a total
    
    $total0_SALDO += 0 + $el['SALDO'];
    $total0_SALDO_SUC += 0 + $el['SALDO_SUC'];
    $total0_DEBE += 0 + $el['DEBE'];
    $total0_HABER += 0 + $el['HABER'];

    // Calculating a subtotal
    $subtotal0_DEBE += 0 + $el['DEBE'];
    $subtotal0_HABER += 0 + $el['HABER'];
    $subtotal0_SALDO  =  $el['SALDO'];
    $subtotal0_SALDO_SUC  =  $el['SALDO_SUC'];

    $T->Show('query0_data_row');
    
    // Show Subtotal
    $T->Set('subtotal0_DEBE', number_format($subtotal0_DEBE,0,',','.'));
    $T->Set('subtotal0_HABER', number_format($subtotal0_HABER,0,',','.'));
    $T->Set('subtotal0_SALDO', number_format($subtotal0_SALDO,0,',','.'));
    $T->Set('subtotal0_SALDO_SUC', number_format($subtotal0_SALDO_SUC,0,',','.'));
    
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_DEBE = 0;
        $subtotal0_HABER = 0;
        $subtotal0_SALDO = 0;
        $subtotal0_SALDO_SUC = 0;
    }
    
    //Actualize Old Values Variables
    $old['NRO'] = $el['NRO'];
    $old['FECHA'] = $el['FECHA'];
    $old['SUC'] = $el['SUC'];
    $old['CODIGO'] = $el['CODIGO'];
    $old['DESCRIP'] = $el['DESCRIP'];
    $old['S_ANT'] = $el['S_ANT'];
    $old['DEBE'] = $el['DEBE'];
    $old['HABER'] = $el['HABER'];
    $old['SALDO'] = $el['SALDO'];
    
    $old['S_ANT_SUC'] = $el['S_ANT_SUC'];
    $old['SALDO_SUC'] = $el['SALDO_SUC'];
    
    $firstRow=false;

}

$endConsult = true;
if( $endConsult ){
    
    $T->Show('query0_subtotal_row');
}
// Show total    
 $T->Set('total0_DEBE', number_format($total0_DEBE,0,',','.'));
 $T->Set('total0_HABER', number_format($total0_HABER,0,',','.'));
 $T->Set('total0_SALDO', number_format($total0_SALDO,0,',','.'));
 $T->Set('total0_SALDO_SUC', number_format($total0_SALDO_SUC,0,',','.'));

 if( true ){
        
    $T->Show('query0_total_row');
}



$T->Show('end_query0');				// Ends a Table 

?>

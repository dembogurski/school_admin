<?php

/** Report prg file (retazos) 
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
$T->Set( 'sup_desde', '2012-09-27');
$T->Set( 'sup_hasta', '2012-09-27');
$T->Set( 'sup_usuario', '%');
$T->Set( 'sup_cod', '%');
$T->Set( 'sup_suc_', '%');
$T->Set( 'sup_genre', '');
$T->Set( 'sup_grupo', '%');
$T->Set( 'sup_tipo', '%');
$T->Set( 'sup_canti', '');
$T->Set( 'sup_gen', '');
 * 
 */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT usuario AS USUARIO,date_format(fecha,"%d-%m-%Y") AS FECHA, suc AS SUC, codigo AS CODIGO,cant AS CANT, p_compra AS P_COMPRA,descrip AS DESCRIP  FROM mnt_retazos WHERE fecha BETWEEN '2012-09-27' AND '2012-09-27' AND usuario LIKE '%' AND codigo LIKE '%' ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

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

//Define a Subtotal Variables
$subtotal0_CANT = 0;


//Define a Old Values Variables
$old['USUARIO'] = '';
$old['FECHA'] = '';
$old['SUC'] = '';
$old['CODIGO'] = '';
$old['CANT'] = '';
$old['P_COMPRA'] = '';
 
$old['DESCRIP'] = '';

$i = 1;
$z_valor = 0;

// Making a rows of consult
while( $Q0->NextRecord() ){
     $T->Set('cant', $i);
    // Define a elements
    $el['USUARIO'] = $Q0->Record['USUARIO'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['CANT'] = $Q0->Record['CANT'];
    $el['P_COMPRA'] = $Q0->Record['P_COMPRA'];
    $el['DESCRIP'] = $Q0->Record['DESCRIP'];
    
    $valor = $el['CANT'] * $Q0->Record['P_COMPRA'];
    $T->Set('valor', number_format($valor,0,',','.'));
    $z_valor +=0+$valor;
    // Preparing a template variables
    $T->Set('query0_USUARIO', $el['USUARIO']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_CANT', number_format($el['CANT'],2,',','.'));
    $T->Set('query0_P_COMPRA',number_format($el['P_COMPRA'],0,',','.'));   
    $T->Set('query0_DESCRIP', $el['DESCRIP']);

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CANT += 0 + $el['CANT'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANT', number_format($subtotal0_CANT,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANT = 0;
    }
    
    //Actualize Old Values Variables
    $old['USUARIO'] = $el['USUARIO'];
    $old['FECHA'] = $el['FECHA'];
    $old['SUC'] = $el['SUC'];
    $old['CODIGO'] = $el['CODIGO'];
    $old['CANT'] = $el['CANT'];
    $old['P_COMPRA'] = $el['P_COMPRA'];
    $old['DESCRIP'] = $el['DESCRIP'];
    $firstRow=false;
    $i++;
}

$endConsult = true;
if( $endConsult ){
    $T->Set('z_valor', number_format($z_valor,0,',','.'));
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

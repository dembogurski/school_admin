<?php

/** Report prg file (caJa_chica) 
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
$T->Set( 'sup_empr', '%');
$T->Set( 'sup_moneda', '%');
$T->Set( 'sup_es', '%');
$T->Set( 'sup_mov_cons', 'No');
$T->Set( 'sup_m_cons', '5');
$T->Set( 'sup_fecha', '2010-03-10');
$T->Set( 'sup_fechah', '2010-04-12');
$T->Set( 'sup_rep_mov', '');
$T->Set( 'sup_rep_caja_chica', '');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_fecha_inv', '2010-03-10');
$T->Set( 'sup_fechah_inv', '2010-04-12');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "  select  cj_ref_chi as Nro, __user as USUARIO, __local AS SUC, entrada_ref AS ENTRADA, salida_ref AS SALIDA,  compl AS INFO_COMPL , __date AS FECHA,  con_nombre, subc_nombre, depar  from  caja_chica_mov where __date BETWEEN '2010-03-10' and '2010-04-12' order by __date asc";

$T->Set( 'time', daytime() );

$T->Set( 'user', $Global['username'] );

$T->Set( 'year', date("Y") );




$desde = $sup['cj_fecha'];
$hasta = $sup['fechah']; 

$data_ini = substr($sup['cj_fecha'],8,2).'-'.substr($sup['cj_fecha'],5,2).'-'.substr($sup['cj_fecha'],0,4);
$data_fin = substr($sup['fechah'],8,2).'-'.substr($sup['fechah'],5,2).'-'.substr($sup['fechah'],0,4);

$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);
$T->Set('empr',$sup['cj_empr']);

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
$subtotal0_ENTRADA = 0;
$subtotal0_SALIDA = 0;


//Define a Old Values Variables
$old['Nro'] = '';
$old['USUARIO'] = '';
$old['SUC'] = '';
$old['ENTRADA'] = '';
$old['SALIDA'] = '';
$old['INFO_COMPL'] = '';
$old['FECHA'] = '';
$old['con_nombre'] = '';
$old['subc_nombre'] = '';
$old['depar'] = '';
$old['tipo_iva'] = '';


$TOTAL_EXCENTAS = 0;
$TOTAL_IVA5 = 0;
$TOTAL_IVA10 = 0;


// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['Nro'] = $Q0->Record['Nro'];
    $el['USUARIO'] = $Q0->Record['USUARIO'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['ENTRADA'] = $Q0->Record['ENTRADA'];
    $el['SALIDA'] = $Q0->Record['SALIDA'];
    $el['INFO_COMPL'] = $Q0->Record['INFO_COMPL'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['con_nombre'] = $Q0->Record['con_nombre'];
    $el['subc_nombre'] = $Q0->Record['subc_nombre'];
    $el['depar'] = $Q0->Record['depar'];
    $el['tipo_iva'] = $Q0->Record['tipo_iva'];

    $tipo_iva = $el['tipo_iva'];
    
    if($tipo_iva == 'Exenta' && $el['SALIDA'] > 0){
        $TOTAL_EXCENTAS += 0 +$el['SALIDA'];
    }else if($tipo_iva == '5%'){
        $TOTAL_IVA5  += 0 +$el['SALIDA'];
    }else if($tipo_iva == '10%'){
        $TOTAL_IVA10 += 0 +$el['SALIDA'];
    } 
    
    // Preparing a template variables
    $T->Set('query0_Nro', $el['Nro']);
    $T->Set('query0_USUARIO', $el['USUARIO']);
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_ENTRADA', number_format($el['ENTRADA'],0,',','.'));
    $T->Set('query0_SALIDA', number_format($el['SALIDA'],0,',','.'));
    $T->Set('query0_INFO_COMPL', $el['INFO_COMPL']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_con_nombre', $el['con_nombre']);
    $T->Set('query0_subc_nombre', $el['subc_nombre']);
    $T->Set('query0_depar', $el['depar']);
    $T->Set('query0_tipo_iva', $el['tipo_iva']);
    
        
    // Calculating a total

    // Calculating a subtotal
    $subtotal0_ENTRADA += 0 + $el['ENTRADA'];
    $subtotal0_SALIDA += 0 + $el['SALIDA'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_ENTRADA', number_format($subtotal0_ENTRADA,0,',','.'));
    $T->Set('subtotal0_SALIDA', number_format($subtotal0_SALIDA,0,',','.'));
    $DIFF = $subtotal0_ENTRADA - $subtotal0_SALIDA;
     $T->Set('DIFF', number_format($DIFF,0,',','.'));

    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_ENTRADA = 0;
        $subtotal0_SALIDA = 0;
    }
    
    //Actualize Old Values Variables
    $old['Nro'] = $el['Nro'];
    $old['USUARIO'] = $el['USUARIO'];
    $old['SUC'] = $el['SUC'];
    $old['ENTRADA'] = $el['ENTRADA'];
    $old['SALIDA'] = $el['SALIDA'];
    $old['INFO_COMPL'] = $el['INFO_COMPL'];
    $old['FECHA'] = $el['FECHA'];
    $old['con_nombre'] = $el['con_nombre'];
    $old['subc_nombre'] = $el['subc_nombre']; 
    $old['depar'] = $el['depar'];
    $old['tipo_iva'] = $el['tipo_iva'];
    $firstRow=false;
}

$endConsult = true;
if( $endConsult ){
    
    $T->Set('excentas', number_format($TOTAL_EXCENTAS,0,',','.'));
    $T->Set('iva5', number_format($TOTAL_IVA5,0,',','.'));
    $T->Set('iva10', number_format($TOTAL_IVA10,0,',','.'));
    
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

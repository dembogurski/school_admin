<?php

/** Report prg file (liquid_sueldo) 
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
$T->Set( 'sup___user', 'Hugo');
$T->Set( 'sup_nro_liquid', '4549');
$T->Set( 'sup_sue_inprimir', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT sue_mes,anio,  s.sue_nro_liquid AS Nro,date_format(s.sue_fecha,"%d-%m-%Y")  AS FECHA,f.func_fullname AS FUNCIONARIO,s.sue_sueldo_r AS SUELDO,s.sue_sum_comi AS VARIABLE,s.agui AS AGUINALDO, s.ind AS INDEMNIZACION,s.vac AS VACACIONES,s.sue_feriado_r AS FERIADOS,sue_mo as MALAS_OPERACIONES,asociaciones as ASOCIACIONES,s.sue_extras_r AS EXTRAS,  s.sue_ips   AS IPS,s.TEL AS TELEFONIA,lc as LINEAS_CREDITO,aportes as APORTES,s.sue_reposo AS REPOSO,sue_sanciones as SANCIONES, sue_ausencia as AUSENCIAS ,reembolso as REEMBOLSOS,ajuste as AJUSTES FROM sueldos_func s, mnt_func f WHERE  s.sue_nro_liquid =  '4549' and s.sue_cod_func = f.func_cod   ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

// Starting a HTML


//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables


//Define a Old Values Variables
$old['sue_mes'] = '';
$old['anio'] = '';
$old['Nro'] = '';
$old['FECHA'] = '';
$old['FUNCIONARIO'] = '';
$old['SUELDO'] = '';
$old['VARIABLE'] = '';
$old['AGUINALDO'] = '';
$old['INDEMNIZACION'] = '';
$old['VACACIONES'] = '';
$old['FERIADOS'] = '';
$old['MALAS_OPERACIONES'] = '';
$old['ASOCIACIONES'] = '';
$old['EXTRAS'] = '';
$old['IPS'] = '';
$old['TELEFONIA'] = '';
$old['LINEAS_CREDITO'] = '';
$old['APORTES'] = '';
$old['REPOSO'] = '';
$old['SANCIONES'] = '';
$old['AUSENCIAS'] = '';
$old['REEMBOLSOS'] = '';
$old['AJUSTES'] = '';
$old['ADELANTOS'] = '';
$old['UNIFORME'] = '';
$old['TOTAL'] = '';


// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['sue_mes'] = $Q0->Record['sue_mes'];
    $el['anio'] = $Q0->Record['anio'];
    $el['Nro'] = $Q0->Record['Nro'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['FUNCIONARIO'] = $Q0->Record['FUNCIONARIO'];
    $el['SUELDO'] = $Q0->Record['SUELDO'];
    $el['VARIABLE'] = $Q0->Record['VARIABLE'];
    $el['AGUINALDO'] = $Q0->Record['AGUINALDO'];
    $el['INDEMNIZACION'] = $Q0->Record['INDEMNIZACION'];
    $el['VACACIONES'] = $Q0->Record['VACACIONES'];
    $el['FERIADOS'] = $Q0->Record['FERIADOS'];
    $el['REEMBOLSOS'] = $Q0->Record['REEMBOLSOS'];
    
    $el['MALAS_OPERACIONES'] = $Q0->Record['MALAS_OPERACIONES'];
    $el['ASOCIACIONES'] = $Q0->Record['ASOCIACIONES'];
    $el['EXTRAS'] = $Q0->Record['EXTRAS'];
    $el['IPS'] = $Q0->Record['IPS'];
    $el['TELEFONIA'] = $Q0->Record['TELEFONIA'];
    $el['LINEAS_CREDITO'] = $Q0->Record['LINEAS_CREDITO'];
    $el['APORTES'] = $Q0->Record['APORTES'];
    $el['REPOSO'] = $Q0->Record['REPOSO'];
    $el['SANCIONES'] = $Q0->Record['SANCIONES'];
    $el['AUSENCIAS'] = $Q0->Record['AUSENCIAS'];
    $el['UNIFORME'] = $Q0->Record['UNIFORME'];
    
    $el['AJUSTES'] = $Q0->Record['AJUSTES'];
    $el['ADELANTOS'] = $Q0->Record['ADELANTOS'];
    $el['TOTAL'] = $Q0->Record['TOTAL'];
    
    $HABERES = $el['SUELDO'] + $el['VARIABLE'] + $el['AGUINALDO'] + $el['INDEMNIZACION'] +  $el['VACACIONES']+ $el['VACACIONES'] +$el['EXTRAS'] +$el['REEMBOLSOS'];
    
    $DESCUENTOS = $el['MALAS_OPERACIONES'] +   $el['ASOCIACIONES'] +   $el['IPS'] +  $el['TELEFONIA'] +   $el['LINEAS_CREDITO'] + $el['APORTES'] + $el['REPOSO'] + $el['SANCIONES'] + $el['AUSENCIAS'] + $el['AJUSTES'] + $el['ADELANTOS'] + $el['UNIFORME'] ;
    
    $T->Set('TOTAL_HABERES',number_format( $HABERES,0,',','.'));
    $T->Set('TOTAL_DESCUENTOS',number_format( $DESCUENTOS,0,',','.'));
            
    // Preparing a template variables
    $T->Set('query0_sue_mes', $el['sue_mes']);
    $T->Set('query0_anio', $el['anio']);
    $T->Set('query0_Nro', $el['Nro']);
    $T->Set('query0_FECHA', $el['FECHA']);
    
    $func = str_replace("Ñ","&ntilde;", $el['FUNCIONARIO']);
     
    $T->Set('query0_FUNCIONARIO', $func);
    
    
    $T->Set('query0_SUELDO', number_format($el['SUELDO'],0,',','.'));
    $T->Set('query0_VARIABLE', number_format($el['VARIABLE'],0,',','.'));
    $T->Set('query0_AGUINALDO',number_format( $el['AGUINALDO'],0,',','.'));
    $T->Set('query0_INDEMNIZACION',number_format( $el['INDEMNIZACION'],0,',','.'));
    $T->Set('query0_VACACIONES',number_format( $el['VACACIONES'],0,',','.'));
    $T->Set('query0_FERIADOS',number_format( $el['FERIADOS'],0,',','.'));
    $T->Set('query0_MALAS_OPERACIONES',number_format( $el['MALAS_OPERACIONES'],0,',','.'));
    $T->Set('query0_ASOCIACIONES',number_format( $el['ASOCIACIONES'],0,',','.'));
    $T->Set('query0_EXTRAS', number_format($el['EXTRAS'],0,',','.'));
    $T->Set('query0_IPS', number_format($el['IPS'],0,',','.'));
    $T->Set('query0_TELEFONIA', number_format($el['TELEFONIA'],0,',','.'));
    $T->Set('query0_LINEAS_CREDITO',number_format( $el['LINEAS_CREDITO'],0,',','.'));
    $T->Set('query0_APORTES', number_format($el['APORTES'],0,',','.'));
    $T->Set('query0_REPOSO',number_format( $el['REPOSO'],0,',','.'));
    $T->Set('query0_SANCIONES',number_format( $el['SANCIONES'],0,',','.'));
    $T->Set('query0_AUSENCIAS', number_format($el['AUSENCIAS'],0,',','.'));
    $T->Set('query0_REEMBOLSOS',number_format( $el['REEMBOLSOS'],0,',','.'));
    $T->Set('query0_AJUSTES',number_format( $el['AJUSTES'],0,',','.'));
    $T->Set('query0_ADELANTOS',number_format( $el['ADELANTOS'],0,',','.'));
    $T->Set('query0_UNIFORME',number_format( $el['UNIFORME'],0,',','.'));
    $T->Set('TOTAL',number_format( $el['TOTAL'],0,',','.'));
    
    $T->Show('general_header');			// Principal Header
    $T->Show('start_query0');			// Start a Table 
    $T->Show('header0');				// Show Header

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['sue_mes'] = $el['sue_mes'];
    $old['anio'] = $el['anio'];
    $old['Nro'] = $el['Nro'];
    $old['FECHA'] = $el['FECHA'];
    $old['FUNCIONARIO'] = $el['FUNCIONARIO'];
    $old['SUELDO'] = $el['SUELDO'];
    $old['VARIABLE'] = $el['VARIABLE'];
    $old['AGUINALDO'] = $el['AGUINALDO'];
    $old['INDEMNIZACION'] = $el['INDEMNIZACION'];
    $old['VACACIONES'] = $el['VACACIONES'];
    $old['FERIADOS'] = $el['FERIADOS'];
    $old['MALAS_OPERACIONES'] = $el['MALAS_OPERACIONES'];
    $old['ASOCIACIONES'] = $el['ASOCIACIONES'];
    $old['EXTRAS'] = $el['EXTRAS'];
    $old['IPS'] = $el['IPS'];
    $old['TELEFONIA'] = $el['TELEFONIA'];
    $old['LINEAS_CREDITO'] = $el['LINEAS_CREDITO'];
    $old['APORTES'] = $el['APORTES'];
    $old['REPOSO'] = $el['REPOSO'];
    $old['SANCIONES'] = $el['SANCIONES'];
    $old['AUSENCIAS'] = $el['AUSENCIAS'];
    $old['REEMBOLSOS'] = $el['REEMBOLSOS'];
    $old['AJUSTES'] = $el['AJUSTES']; 
    $old['ADELANTOS'] = $el['ADELANTOS'];
    $old['UNIFORME'] = $el['UNIFORME'];
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

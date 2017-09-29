<?php

/** Report prg file (translado_prod) 
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
$T->Set( 'sup_cod_prod', '15308');
$T->Set( 'sup_ver_ajustes', '');
$T->Set( 'sup_mov_ventas', '');
$T->Set( 'sup_info_trans', ''); */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT n.rem_nro AS Nro, n.rem_fecha AS FECHA,   n.rem_dir_origen AS ORIGEN,       n.rem_dir_destino AS DESTINO,    n.rem_receptor AS RECEPTOR,  r.df_disponible AS CANTDISPONIBLE,  p.p_cant_compra AS CANTINICIAL,  p.p_padre as CODIGOPADRE   FROM nota_remision n, remito_det r, mnt_prod p  WHERE n.rem_nro = r.rem_nro AND r.df_cod_prod = '15308' and p.p_cod = '15308' and p.p_cod = r.df_cod_prod";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

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
$old['Nro'] = '';
$old['FECHA'] = '';
$old['ORIGEN'] = '';
$old['DESTINO'] = '';
$old['RECEPTOR'] = '';
$old['CANTDISPONIBLE'] = '';
$old['CANTINICIAL'] = '';
$old['CODIGOPADRE'] = '';  
$old['ESTADO'] = '';
$old['FECHA_CIERRE'] = '';
$old['RESPONSABLE'] = '';

$RESUMEN = '';
$esp = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['Nro'] = $Q0->Record['Nro'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['ORIGEN'] = $Q0->Record['ORIGEN'];
    $el['DESTINO'] = $Q0->Record['DESTINO'];
    $el['RECEPTOR'] = $Q0->Record['RECEPTOR'];
    $el['CANTDISPONIBLE'] = $Q0->Record['CANTDISPONIBLE'];
    $el['CANTINICIAL'] = $Q0->Record['CANTINICIAL'];
    $el['CODIGOPADRE'] = $Q0->Record['CODIGOPADRE'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];   
     $el['FECHA_CIERRE'] = $Q0->Record['FECHA_CIERRE']; 
     $el['RESPONSABLE'] = $Q0->Record['RESPONSABLE']; 
    
    $RESUMEN = $RESUMEN."".$el['ORIGEN']." &rarr; ".$el['DESTINO'];
    
    for($i = 0;$i < 26;$i++){
        $esp = $esp."&nbsp;";
    }
    $RESUMEN = $RESUMEN."<br>$esp";
   
    // Preparing a template variables
    $T->Set('query0_Nro', $el['Nro']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_ORIGEN', $el['ORIGEN']);
    $T->Set('query0_DESTINO', $el['DESTINO']);
    $T->Set('query0_RECEPTOR', $el['RECEPTOR']);
    $T->Set('query0_CANTDISPONIBLE',number_format($el['CANTDISPONIBLE'],2,',','.'));  
    $T->Set('query0_CANTINICIAL', $el['CANTINICIAL']);
    $T->Set('query0_CODIGOPADRE', $el['CODIGOPADRE']);
    $T->Set('query0_ESTADO', $el['ESTADO']);  
    $T->Set('query0_FECHA_CIERRE', $el['FECHA_CIERRE']);
    
    $T->Set('query0_RESPONSABLE', $el['RESPONSABLE']);  
    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['Nro'] = $el['Nro'];
    $old['FECHA'] = $el['FECHA'];
    $old['ORIGEN'] = $el['ORIGEN'];
    $old['DESTINO'] = $el['DESTINO'];
    $old['RECEPTOR'] = $el['RECEPTOR'];
    $old['CANTDISPONIBLE'] = $el['CANTDISPONIBLE'];
    $old['CANTINICIAL'] = $el['CANTINICIAL'];
    $old['CODIGOPADRE'] = $el['CODIGOPADRE'];
    $old['ESTADO'] = $el['ESTADO']; 
    $old['FECHA_CIERRE'] = $el['FECHA_CIERRE'];  
    $old['RESPONSABLE'] = $el['RESPONSABLE'];
    
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

echo  "<b>Resumen</b><br><small><small><b> <i> $RESUMEN </i></b> </small></small>";

?>

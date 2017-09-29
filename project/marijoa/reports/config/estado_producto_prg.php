<?php

/** Report prg file (estado_producto) 
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
$T->Set( 'sup_f_cod', '574508');
$T->Set( 'sup_f_proveedor', '__NO DATA__');
$T->Set( 'sup_f_fecha', '2010-12-21');
$T->Set( 'sup_f_sql', 'retazos menos de 1.mts.');
$T->Set( 'sup_descrip', 'JEANS-JEANS --Polyester-Permanente-Elastizado-Liso-VARIOS');
$T->Set( 'sup_f_cant', '73.33');
$T->Set( 'sup_suc', '06');
$T->Set( 'sup_nombre_suc', 'CDE');
$T->Set( 'sup_fdp_r', 'No');
$T->Set( 'sup_f_bloqueo', 'true');
$T->Set( 'sup_sub_ajuste', '');
$T->Set( 'sup___aux', '( ! ) Calculos auxiliares');
$T->Set( 'sup_f_cant_comp', '607.41');
$T->Set( 'sup_transfp', '2214.04');
$T->Set( 'sup_ajp', '');
$T->Set( 'sup_totp', '2821.45');
$T->Set( 'sup_vtas', '2755.16');
$T->Set( 'sup_transf', '');
$T->Set( 'sup_frac', '');
$T->Set( 'sup_ajn', '0.61');
$T->Set( 'sup_totn', '2755.77');
$T->Set( 'sup_st', '65.67999999999984');
$T->Set( 'sup_corregir', 'No');
$T->Set( 'sup_updt', 'false');
$T->Set( 'sup_ver_estado_prod', '');  */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select f.fact_nro as NRO, f.fact_localidad as SUC,f.fact_estado as ESTADO,f.func_nombre as VENDEDOR,d.df_cod_prod as CODIGO,d.df_precio as PRECIO, d.df_cantidad as CANTIDAD   from factura f, det_factura d where f.fact_nro = d.df_fact_num and d.df_cod_prod = '574508' and f.fact_estado <> "Cerrada"  ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$codigo = $sup['f_cod'];

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
$subtotal0_CANTIDAD = 0;


//Define a Old Values Variables
$old['NRO'] = '';
$old['SUC'] = '';
$old['ESTADO'] = '';
$old['VENDEDOR'] = '';
$old['CODIGO'] = '';
$old['PRECIO'] = '';
$old['CANTIDAD'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['NRO'] = $Q0->Record['NRO'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];
    $el['VENDEDOR'] = $Q0->Record['VENDEDOR'];
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['PRECIO'] = $Q0->Record['PRECIO'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];

    // Preparing a template variables
    $T->Set('query0_NRO', $el['NRO']);
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_ESTADO', $el['ESTADO']);
    $T->Set('query0_VENDEDOR', $el['VENDEDOR']);
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_PRECIO', $el['PRECIO']);
    $T->Set('query0_CANTIDAD', number_format($el['CANTIDAD'],0,',','.'));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CANTIDAD += 0 + $el['CANTIDAD'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANTIDAD', number_format($subtotal0_CANTIDAD,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANTIDAD = 0;
    }
    
    //Actualize Old Values Variables
    $old['NRO'] = $el['NRO'];
    $old['SUC'] = $el['SUC'];
    $old['ESTADO'] = $el['ESTADO'];
    $old['VENDEDOR'] = $el['VENDEDOR'];
    $old['CODIGO'] = $el['CODIGO'];
    $old['PRECIO'] = $el['PRECIO'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
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


$db = new Y_DB(); 
$db->Database = 'marijoa'; 
$sql = "SELECT codigo,usuario,date_format(fecha,'%d-%m-%Y') AS fecha,hora,descrip,suc,stockf FROM prod_fdp WHERE codigo =  $codigo; "; 
$db->Query($sql);

$T->Show("cab");


while( $db->NextRecord() ){
    $cod  = $db->Record['codigo'];
    $usuario = $db->Record['usuario'];
    $fecha = $db->Record['fecha'];
    $hora = $db->Record['hora'];
    $descrip = $db->Record['descrip'];
    $suc = $db->Record['suc'];
    $stockf = $db->Record['stockf'];
    
    $T->Set("codigo",$cod);
    $T->Set("usuario",$usuario);
    $T->Set("fecha",$fecha);
    $T->Set("hora",$hora);
    $T->Set("descrip",$descrip);
    $T->Set("suc",$suc);
    $T->Set("stockf",$stockf);
    $T->Show("fin_pieza");
    
}

$T->Show('end_query0');				// Ends a Table 

?>

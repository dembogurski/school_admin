<?php

/** Report prg file (diff_cambio) 
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
$T->Set( 'sup_msg', 'Seleccione el tipo de reporte que desea hacer... El simbolo % indica todos!!!');
$T->Set( 'sup_msg_2', '( ! ) ATENCION!!!  No haga reportes en horas pico de trabajo o dejara inabilitadas las demas terminales.');
$T->Set( 'sup_msg_3', '( ! ) Los reportes hacen consulas complejas pueden causar inestabilidad en el sistema.');
$T->Set( 'sup_tipo_rep', 'Compras');
$T->Set( 'sup_busc', '');
$T->Set( 'sup_prov', '');
$T->Set( 'sup_rep_cli', '');
$T->Set( 'sup_moneda', '%');
$T->Set( 'sup_rep_cont_cred', '');
$T->Set( 'sup_cat', '%');
$T->Set( 'sup_rep_vend_cod', '%');
$T->Set( 'sup_rep_localidad', '%');
$T->Set( 'sup_desde', '2014-11-25');
$T->Set( 'sup_hasta', '2014-11-25');
$T->Set( 'sup_rep_ventas', '');
$T->Set( 'sup_rep_ventas_csv', '');
$T->Set( 'sup_rep_ventas_sim', '');
$T->Set( 'sup_rep_cant_fact', '');
$T->Set( 'sup_rep_compras', '');
$T->Set( 'sup_rep_compras_csv', '');
$T->Set( 'sup_desdeinv', '2014-11-25');
$T->Set( 'sup_hastainv', '2014-11-25');
$T->Set( 'sup_rep_margenes', '');
$T->Set( 'sup_rep_diff_cambio', '');
$T->Set( 'sup_r1', '0');
$T->Set( 'sup_r2', '0');
$T->Set( 'sup_rep_ventas_cont', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:

$db = new Y_DB();
$db->Database = 'marijoa';

$desde = $sup['desde'];
$hasta = $sup['hasta'];


$query0 = "SELECT c_ref,c_factura,c_nac_int,p.prov_nombre, p.prov_pais , c_fecha,c_fechafac,c_fecha_cierre, c_estado , c_valor_total, c_cambio,c_moneda,c_cambio_merc,c_iva, "
        . "c_sobre_costo,ROUND( (c_valor_total + (c_valor_total * c_sobre_costo / 100)) * c_cambio,2) as VALOR_STOCK  , "
        . "round((c_valor_total + (c_valor_total * c_sobre_costo / 100)) * c_cambio_merc,2) AS VALOR_STOCK_TIPO_ESPEC ,"
        . "round(((c_valor_total + (c_valor_total * c_sobre_costo / 100)) * c_cambio ) - ((c_valor_total + (c_valor_total * c_sobre_costo / 100)) * c_cambio_merc),2) as DIFF "
        . "FROM mov_compras c, mnt_prov p WHERE c.c_prov = p.prov_cod  and c_fechafac between '2006-01-01' and '$hasta' ";


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
$subtotal0_DIFF = 0;


//Define a Old Values Variables
$old['c_ref'] = '';
$old['c_factura'] = '';
$old['c_nac_int'] = '';
$old['prov_nombre'] = '';
$old['prov_pais'] = '';
$old['c_fecha'] = '';
$old['c_fechafac'] = '';
$old['c_fecha_cierre'] = '';
$old['c_estado'] = '';
$old['c_valor_total'] = '';
$old['c_cambio'] = '';
$old['c_iva'] = '';
$old['c_moneda'] = '';
$old['c_cambio_merc'] = '';
$old['c_sobre_costo'] = '';
$old['VALOR_STOCK'] = '';
$old['VALOR_STOCK_TIPO_ESPEC'] = '';
$old['DIFF'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['c_ref'] = $Q0->Record['c_ref'];
    $el['c_factura'] = $Q0->Record['c_factura'];
    $el['c_nac_int'] = $Q0->Record['c_nac_int'];
    $el['prov_nombre'] = $Q0->Record['prov_nombre'];
    $el['prov_pais'] = $Q0->Record['prov_pais'];
    $el['c_fecha'] = $Q0->Record['c_fecha'];
    $el['c_fechafac'] = $Q0->Record['c_fechafac'];
    $el['c_fecha_cierre'] = $Q0->Record['c_fecha_cierre'];
    $el['c_estado'] = $Q0->Record['c_estado'];
    $el['c_valor_total'] = $Q0->Record['c_valor_total'];
    $el['c_cambio'] = $Q0->Record['c_cambio'];
    $el['c_moneda'] = $Q0->Record['c_moneda']; 
    $el['c_iva'] = $Q0->Record['c_iva']; 
    $el['c_cambio_merc'] = $Q0->Record['c_cambio_merc'];    
    $el['c_sobre_costo'] = $Q0->Record['c_sobre_costo'];
    $el['VALOR_STOCK'] = $Q0->Record['VALOR_STOCK'];
    $el['VALOR_STOCK_TIPO_ESPEC'] = $Q0->Record['VALOR_STOCK_TIPO_ESPEC'];
    $el['DIFF'] = $Q0->Record['DIFF'];

    // Preparing a template variables
    $T->Set('query0_c_ref', $el['c_ref']);
    $T->Set('query0_c_factura', $el['c_factura']);
    $T->Set('query0_c_nac_int', $el['c_nac_int']);
    $T->Set('query0_prov_nombre', $el['prov_nombre']);
    $T->Set('query0_prov_pais', $el['prov_pais']);
    $T->Set('query0_c_fecha', $el['c_fecha']);
    $T->Set('query0_c_fechafac', $el['c_fechafac']);
    $T->Set('query0_c_fecha_cierre', $el['c_fecha_cierre']);
    $T->Set('query0_c_estado', $el['c_estado']);
    $T->Set('query0_c_moneda', $el['c_moneda']);
    $T->Set('query0_c_iva', number_format($el['c_iva'],2,',','.'));  
    $T->Set('query0_c_valor_total', number_format($el['c_valor_total'],2,',','.'));  
    $T->Set('query0_c_cambio', number_format($el['c_cambio'],2,',','.'));    
    $T->Set('query0_c_cambio_merc',number_format($el['c_cambio_merc'],2,',','.'));    
    $T->Set('query0_c_sobre_costo', number_format($el['c_sobre_costo'],2,',','.'));  
    $T->Set('query0_VALOR_STOCK',number_format($el['VALOR_STOCK'],2,',','.'));    
    $T->Set('query0_VALOR_STOCK_TIPO_ESPEC',number_format($el['VALOR_STOCK_TIPO_ESPEC'],2,',','.'));    
    $T->Set('query0_DIFF', number_format($el['DIFF'],2,',','.'));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_DIFF += 0 + $el['DIFF'];
    
    
    // Calculo de Metros vendidos y subtotales de ventas
    $ref = $el['c_ref'];
    $cotiz = $el['c_cambio'];
    $cotiz_merc = $el['c_cambio_merc'];
    
    $sql = "SELECT SUM(df_cantidad) AS mts_vendido, SUM(df_subtotal) AS valor_venta  FROM factura f , det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num AND f.fact_estado = 'Cerrada' and f.fact_fecha between '$desde' and '$hasta'  AND d.df_cod_prod = p.p_cod AND p.p_ref = '$ref'";
    $db->Query($sql);
    if($db->NumRows()){
        $db->NextRecord();
        $mts_vendido = $db->Record['mts_vendido'];
        $valor_venta = $db->Record['valor_venta'];
    }else{
       $mts_vendido = 0; $valor_venta = 0;
    }
    $T->Set('mts_vendidos', number_format($mts_vendido,2,',','.'));
    
    $XCostoXTCMarijoa = $mts_vendido * $cotiz;
    $XCostoXTCMercado = $mts_vendido * $cotiz_merc;
    $XCostoDiff = $XCostoXTCMarijoa - $XCostoXTCMercado;
    
    $T->Set('XCostoXTCMarijoa', number_format($XCostoXTCMarijoa,2,',','.'));
    $T->Set('XCostoXTCMercado', number_format($XCostoXTCMercado,2,',','.'));
    $T->Set('XCostoDiff', number_format($XCostoDiff,2,',','.'));
    if($mts_vendido > 0){ 
       $T->Show('query0_data_row');
    }
    // Show Subtotal
    $T->Set('subtotal0_DIFF', number_format($subtotal0_DIFF,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_DIFF = 0;
    }
    
    //Actualize Old Values Variables
    $old['c_ref'] = $el['c_ref'];
    $old['c_factura'] = $el['c_factura'];
    $old['c_nac_int'] = $el['c_nac_int'];
    $old['prov_nombre'] = $el['prov_nombre'];
    $old['prov_pais'] = $el['prov_pais'];
    $old['c_fecha'] = $el['c_fecha'];
    $old['c_fechafac'] = $el['c_fechafac'];
    $old['c_fecha_cierre'] = $el['c_fecha_cierre'];
    $old['c_estado'] = $el['c_estado'];
	$old['c_iva'] = $el['c_iva'];
    $old['c_valor_total'] = $el['c_valor_total'];
    $old['c_cambio'] = $el['c_cambio'];
    $old['c_moneda'] = $el['c_moneda'];
    $old['c_cambio_merc'] = $el['c_cambio_merc'];
    $old['c_sobre_costo'] = $el['c_sobre_costo'];
    $old['VALOR_STOCK'] = $el['VALOR_STOCK'];
    $old['VALOR_STOCK_TIPO_ESPEC'] = $el['VALOR_STOCK_TIPO_ESPEC'];
    $old['DIFF'] = $el['DIFF'];
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

?>

<?php

/** Report prg file (precarga) 
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
$T->Set( 'sup_c_ref', '6425');
$T->Set( 'sup_c_bloq_ins', '');
$T->Set( 'sup_c_empr', '00');
$T->Set( 'sup_c_busc', '');
$T->Set( 'sup_c_prov', '115');
$T->Set( 'sup_c_cta_prov', '2.01.01.01.26');
$T->Set( 'sup_c_fecha', '2012-03-27');
$T->Set( 'sup_c_fechafac', '2012-03-26');
$T->Set( 'sup_c_msg', 'ATENCION!!! Proveedor sin Codigo de Contabilidad!!!');
$T->Set( 'sup_c_style', '');
$T->Set( 'sup_c_n_prov', 'Kadima S.A');
$T->Set( 'sup_c_c_fact', 'Si');
$T->Set( 'sup_c_factura', '4031');
$T->Set( 'sup_c_c_int', 'Si');
$T->Set( 'sup_c_interno', 'N/A');
$T->Set( 'sup_c_moneda', 'G$');
$T->Set( 'sup_c_cambio', '1');
$T->Set( 'sup_c_nac_int', 'Nacional');
$T->Set( 'sup_c_ant', 'No');
$T->Set( 'sup_c_cta_ant', '');
$T->Set( 'sup_c_fi', '0.00');
$T->Set( 'sup_c_fn', '0.00');
$T->Set( 'sup_c_di', '0.00');
$T->Set( 'sup_c_otros', '0.00');
$T->Set( 'sup_c_valor_total', '840000.00');
$T->Set( 'sup_c_valor_factl', '840000.00');
$T->Set( 'sup_c_sobre_costo', '0');
$T->Set( 'sup_c_tipo', 'Credito');
$T->Set( 'sup_c_aut_gen', 'No');
$T->Set( 'sup_c_gen', '');
$T->Set( 'sup_c_change', '');
$T->Set( 'sup_c_estado', 'Abierta');
$T->Set( 'sup_c_dev', '*');
$T->Set( 'sup_c_descuento', '0.00');
$T->Set( 'sup_imprimir', '');
$T->Set( 'sup_p_filter', '');
$T->Set( 'sup_c_obs', 'COMUNIADO POR ABELARDO AQUINO A GLORIA DE KADIMA');
$T->Set( 'sup_imprimir_dev', '');
$T->Set( 'sup_c_type', 'Nuevo');
$T->Set( 'sup_subir_archivo', '');
$T->Set( 'sup_c_compras_det', '');
$T->Set( 'sup_c_compras_detc', '');
$T->Set( 'sup_c_pagos_det', '');
$T->Set( 'sup_c_devoluciones', '');
$T->Set( 'sup_c_lib_ins', 'true');
$T->Set( 'sup_monto_abonado', '0.00');
$T->Set( 'sup___disableDel', 'true');
$T->Set( 'sup___disableChange', '');
*/
 

// THIS IS YOUR FIRST QUERY:
//$query0 = "select 555";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
//$Q0->Query( $query0 );

 
$ref = $sup['c_ref'];
 

$T->Set('ref',$ref);
 

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

$T->Show('query0_data_row');
 
$T->Show('end_query0');				// Ends a Table 

?>

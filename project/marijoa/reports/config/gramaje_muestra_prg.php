<?php

/** Report prg file (recib_laser) 
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
$T->Set( 'sup_c_ref', '5335');
$T->Set( 'sup_c_empr', '00');
$T->Set( 'sup_c_busc', '');
$T->Set( 'sup_c_prov', '42');
$T->Set( 'sup_c_cta_prov', '2.01.01.01');
$T->Set( 'sup_c_fecha', '2011-05-19');
$T->Set( 'sup_c_fechafac', '2010-12-23');
$T->Set( 'sup_c_msg', 'ATENCION!!! Proveedor sin Codigo de Contabilidad!!!');
$T->Set( 'sup_c_style', '');
$T->Set( 'sup_c_n_prov', 'TEX TELA');
$T->Set( 'sup_c_c_fact', 'Si');
$T->Set( 'sup_c_factura', '33192');
$T->Set( 'sup_c_c_int', 'Si');
$T->Set( 'sup_c_interno', '');
$T->Set( 'sup_c_moneda', 'U$');
$T->Set( 'sup_c_cambio', '4800');
$T->Set( 'sup_c_nac_int', 'Internacional');
$T->Set( 'sup_c_ant', 'No');
$T->Set( 'sup_c_cta_ant', '');
$T->Set( 'sup_c_fi', '2000.00');
$T->Set( 'sup_c_fn', '0.00');
$T->Set( 'sup_c_di', '7200.00');
$T->Set( 'sup_c_otros', '120.00');
$T->Set( 'sup_c_valor_total', '31303.02');
$T->Set( 'sup_c_valor_factl', '0.00');
$T->Set( 'sup_c_sobre_costo', '29.77');
$T->Set( 'sup_c_tipo', 'Contado');
$T->Set( 'sup_c_aut_gen', 'No');
$T->Set( 'sup_c_gen', '');
$T->Set( 'sup_c_change', '');
$T->Set( 'sup_c_estado', 'Abierta');
$T->Set( 'sup_c_dev', '');
$T->Set( 'sup_c_descuento', '0.00');
$T->Set( 'sup_imprimir', '');
$T->Set( 'sup_c_obs', '');
$T->Set( 'sup_imprimir_dev', '');
$T->Set( 'sup_c_type', 'Nuevo');
$T->Set( 'sup_subir_archivo', '');
$T->Set( 'sup_packing_list', '');
$T->Set( 'sup_frac_x_color', '');
$T->Set( 'sup_frac_x_fgt', '');
$T->Set( 'sup_recib_rollos', '');
$T->Set( 'sup_c_cant_trs', '');
$T->Set( 'sup_c_filtrar', 'Padre');
$T->Set( 'sup_p_filter', '');
$T->Set( 'sup_c_filtro', 'p_padre');
$T->Set( 'sup_c_compras_det', '');
$T->Set( 'sup_c_compras_detc', '');
$T->Set( 'sup_c_pagos_det', '');
$T->Set( 'sup_c_devoluciones', '');
$T->Set( 'sup_c_lib_ins', 'true');
$T->Set( 'sup_monto_abonado', '0.00');
$T->Set( 'sup___disableDel', 'true');
$T->Set( 'sup___disableChange', '');
$T->Set( 'sup___msg', '');
$T->Set( 'sup_c_bloq_ins', '');
$T->Set( 'sup_c_lib_tr', 'false');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "Select 1";

echo getcwd();

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header
 		// Ends a Table 
 
$T->Show('query0_data_row');
 
$T->Show('end_query0');

 

?>

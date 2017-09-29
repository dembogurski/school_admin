<?php

/** Report prg file (packing_res_mts) 
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
$T->Set( 'sup_c_empr', '00');
$T->Set( 'sup_c_ref', '8240');
$T->Set( 'sup_c_busc', '');
$T->Set( 'sup_c_prov', '731');
$T->Set( 'sup_c_fecha', '2014-07-31');
$T->Set( 'sup_c_fechafac', '2014-05-02');
$T->Set( 'sup_c_n_prov', 'RICHATEX LIMITED HONGKONG ');
$T->Set( 'sup_c_c_fact', 'Si');
$T->Set( 'sup_c_factura', '2ND-CNTR-14S');
$T->Set( 'sup_c_c_int', 'Si');
$T->Set( 'sup_c_interno', 'N/A');
$T->Set( 'sup_c_moneda', 'U$');
$T->Set( 'sup_c_cambio', '4700');
$T->Set( 'sup_c_nac_int', 'Internacional');
$T->Set( 'sup_c_ant', 'No');
$T->Set( 'sup_c_cta_ant', '');
$T->Set( 'sup_c_valor_total', '136148.09');
$T->Set( 'sup_c_valor_factl', '136148.09');
$T->Set( 'sup_c_desglosar', 'No');
$T->Set( 'sup_c_fi', '4174.00');
$T->Set( 'sup_c_iva', '8498.00');
$T->Set( 'sup_c_conf_comb', '0.00');
$T->Set( 'sup_c_fif', '0.00');
$T->Set( 'sup_c_seg', '0.00');
$T->Set( 'sup_c_mant_vehic', '0.00');
$T->Set( 'sup_c_fit', '0.00');
$T->Set( 'sup_c_comis_rem', '50.00');
$T->Set( 'sup_c_conf_sueldos', '0.00');
$T->Set( 'sup_c_fn', '0.00');
$T->Set( 'sup_c_di', '15000.00');
$T->Set( 'sup_c_conf_frac', '0.00');
$T->Set( 'sup_c_cp', '1834.00');
$T->Set( 'sup_c_viatico', '0.00');
$T->Set( 'sup_c_conf_cost', '0.00');
$T->Set( 'sup_c_manip', '0.00');
$T->Set( 'sup_c_comis_forw', '5358.00');
$T->Set( 'sup_c_multas', '0.00');
$T->Set( 'sup_c_otros', '0.00');
$T->Set( 'sup_c_sobre_costo', '25.64');
$T->Set( 'sup_c_tipo', 'Contado');
$T->Set( 'sup_c_aut_gen', 'No');
$T->Set( 'sup_c_gen', '');
$T->Set( 'sup_c_change', '');
$T->Set( 'sup_c_estado', 'Controlada');
$T->Set( 'sup_c_dev', '');
$T->Set( 'sup_c_descuento', '0.00');
$T->Set( 'sup_imprimir', '');
$T->Set( 'sup_pack_type', 'Todos');
$T->Set( 'sup_packing_result', '');
$T->Set( 'sup_packing_res_mts', '');
$T->Set( 'sup_c_obs', '');
$T->Set( 'sup_imprimir_dev', '');
$T->Set( 'sup_subir_archivo', '');
$T->Set( 'sup_subir_packing', '');
$T->Set( 'sup_c_limite', '');
$T->Set( 'sup_packing_list', '');
$T->Set( 'sup_update_data', '');
$T->Set( 'sup_frac_x_color', '');
$T->Set( 'sup_frac_x_fgt', '');
$T->Set( 'sup_remitir', '');
$T->Set( 'sup_recib_rollos', '');
$T->Set( 'sup_c_cant_trs', '251');
$T->Set( 'sup_c_type', 'Nuevo');
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
//$query0 = "SELECT p_mar AS Mar,c.p_cod AS Codigo,c.p_fam AS Sector,c.p_grupo AS Grupo,c.p_tipo AS tipo,c.p_color AS Color, c.p_cant_compra AS Cant_compra, p.p_precio AS Precio_x_UM, c.p_compra AS P_Compra_Gs, c.p_porc_recargo AS Por_Rec,p_unit AS UM, p.p_each_quty AS Each_Quty, p.p_qty_ticket AS Quty_Ticket,p.p_kg_real AS KG, p.p_ancho AS Ancho, p.p_gram AS Gramaje,p.p_equiv AS Equiv, p.p_mts AS Metros FROM packing_list p, mnt_prod c WHERE p.pack_ref = c.p_ref AND p.p_cod = c.p_cod AND pack_ref = '8240' ORDER BY p_unit ASC";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$c_fecha = substr($sup['c_fecha'],8,2).'-'.substr($sup['c_fecha'],5,2).'-'.substr($sup['c_fecha'],0,4);
$c_fechafac = substr($sup['c_fechafac'],8,2).'-'.substr($sup['c_fechafac'],5,2).'-'.substr($sup['c_fechafac'],0,4);

$T->Set( 'ref', $sup['c_ref']); 
$T->Set( 'empr', $sup['c_empr']); 
$T->Set( 'fecha', $c_fecha);
$T->Set( 'fechafac',$c_fechafac); 
$T->Set( 'n_prov', $sup['c_n_prov']);
$T->Set( 'factura', $sup['c_factura']);
$T->Set( 'interno', $sup['c_interno']);
$T->Set( 'moneda',$sup['c_moneda']);
$T->Set( 'cambio', $sup['c_cambio']);
$T->Set( 'nac_int', $sup['c_nac_int']);  
$T->Set( 'tipo', $sup['c_tipo']); 
$T->Set( 'estado', $sup['c_estado']);


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
$subtotal0_Metros = 0;
$totalMetros = 0;

$subtotal_valor = 0;
$total_valor = 0;


$db = new Y_DB();
$db->Database = 'marijoa';

//Define a Old Values Variables
$old['Mar'] = '';
$old['Codigo'] = '';
$old['Sector'] = '';
$old['Grupo'] = '';
$old['tipo'] = '';
$old['Color'] = '';
$old['Cant_compra'] = '';
$old['Precio_x_UM'] = '';
$old['P_Compra_Gs'] = '';
$old['Por_Rec'] = '';
$old['UM'] = '';
$old['Each_Quty'] = '';
$old['Quty_Ticket'] = '';
$old['KG'] = '';
$old['Ancho'] = '';
$old['Gramaje'] = '';
$old['Equiv'] = '';
$old['Metros'] = '';
 
// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['Mar'] = $Q0->Record['Mar'];
    $el['Codigo'] = $Q0->Record['Codigo'];
    $el['Sector'] = $Q0->Record['Sector'];
    $el['Grupo'] = $Q0->Record['Grupo'];
    $el['tipo'] = $Q0->Record['tipo'];
    $el['Color'] = $Q0->Record['Color'];
    $el['Cant_compra'] = $Q0->Record['Cant_compra'];
    $el['Precio_x_UM'] = $Q0->Record['Precio_x_UM'];
    $el['P_Compra_Gs'] = $Q0->Record['P_Compra_Gs'];
    $el['Por_Rec'] = $Q0->Record['Por_Rec'];
    $el['UM'] = $Q0->Record['UM'];
    $el['Each_Quty'] = $Q0->Record['Each_Quty'];
    $el['Quty_Ticket'] = $Q0->Record['Quty_Ticket'];
    $el['KG'] = $Q0->Record['KG'];
    $el['Ancho'] = $Q0->Record['Ancho'];
    $el['Gramaje'] = $Q0->Record['Gramaje'];
    $el['Equiv'] = $Q0->Record['Equiv'];
    $el['Metros'] = $Q0->Record['Metros'];
    if( $old['Mar']!=$el['Mar'] ||  $old['UM']!=$el['UM'] ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_Metros = 0;
        $subtotal_valor = 0;
    }

    // Preparing a template variables
    $T->Set('query0_Mar', $el['Mar']);
    $T->Set('query0_Codigo', $el['Codigo']);
    $T->Set('query0_Sector', $el['Sector']);
    $T->Set('query0_Grupo', $el['Grupo']);
    $T->Set('query0_tipo', $el['tipo']);
    $T->Set('query0_Color', $el['Color']);
    $T->Set('query0_Cant_compra', $el['Cant_compra']);
    $T->Set('query0_Precio_x_UM', $el['Precio_x_UM']);
    $T->Set('query0_P_Compra_Gs', $el['P_Compra_Gs']);
    $T->Set('query0_Por_Rec', $el['Por_Rec']);
    $T->Set('query0_UM', $el['UM']);
    $T->Set('query0_Each_Quty', $el['Each_Quty']);
    $T->Set('query0_Quty_Ticket', $el['Quty_Ticket']);
    $T->Set('query0_KG', $el['KG']);
    $T->Set('query0_Ancho', $el['Ancho']);
    $T->Set('query0_Gramaje', $el['Gramaje']);
    $T->Set('query0_Equiv',  ($el['Equiv']=="")?"1":$el['Equiv'] );
    $T->Set('query0_Metros', number_format($el['Metros'],2,',','.'));
    
    
    
    
    $codigo = $el['Codigo'];

    $db->Query("SELECT  SUM(a.aj_final) AS Ajustes FROM mnt_ajustes a, mnt_prod p WHERE a.aj_prod = p.p_cod AND aj_motivo = 'Ajuste en metraje original' AND ( p.p_cod = $codigo  OR  p.p_padre = $codigo) ");
    $ajustes = 0;
    if($db->NumRows()>0){
        $db->NextRecord();
        $ajustes = $db->Record['Ajustes'];  
    }  
    
    $p_compra_con_rec = $el['P_Compra_Gs']   + ( ($el['P_Compra_Gs'] * $el['Por_Rec']) / 100);
    $T->Set('p_compra_con_rec',number_format($p_compra_con_rec,2,',','.'));  
    
    if($ajustes != null){
       $T->Set('ajustes',number_format($ajustes,2,',','.')); 
       $diff = $ajustes - $el['Cant_compra']; 
       $T->Set('fondo_metros', "white"); 
       $T->Set('fondo_ajuste', "lightblue"); 
    }else{
       $diff = $el['Metros'] - $el['Cant_compra'];   
       $T->Set('ajustes',"0"); 
       $T->Set('fondo_metros', "lightblue"); 
       $T->Set('fondo_ajuste', "white");
    }
    
   
    $valor = $diff * $p_compra_con_rec;
    $T->Set('diff_mts', number_format($diff,2,',','.'));
    
    if($valor < 0){
       $T->Set('color',  "red");
    }else{
       $T->Set('color',"green"); 
    }
        
  
     
    $subtotal_valor += 0 +$valor;
    $total_valor += 0 +$valor;
    $T->Set('subtotal_valor', number_format($subtotal_valor,2,',','.'));
    
    $T->Set('valor', number_format($valor,2,',','.'));
    
    // Calculating a total

    // Calculating a subtotal
    $subtotal0_Metros += 0 + $el['Metros'];
    $totalMetros += 0 + $el['Metros'];;
    
    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_Metros', number_format($subtotal0_Metros,2,',','.'));
    
    //Actualize Old Values Variables
    $old['Mar'] = $el['Mar'];
    $old['Codigo'] = $el['Codigo'];
    $old['Sector'] = $el['Sector'];
    $old['Grupo'] = $el['Grupo'];
    $old['tipo'] = $el['tipo'];
    $old['Color'] = $el['Color'];
    $old['Cant_compra'] = $el['Cant_compra'];
    $old['Precio_x_UM'] = $el['Precio_x_UM'];
    $old['P_Compra_Gs'] = $el['P_Compra_Gs'];
    $old['Por_Rec'] = $el['Por_Rec'];
    $old['UM'] = $el['UM'];
    $old['Each_Quty'] = $el['Each_Quty'];
    $old['Quty_Ticket'] = $el['Quty_Ticket'];
    $old['KG'] = $el['KG'];
    $old['Ancho'] = $el['Ancho'];
    $old['Gramaje'] = $el['Gramaje'];
    $old['Equiv'] = $el['Equiv'];
    $old['Metros'] = $el['Metros'];
    $firstRow=false;

}

$endConsult = true;
if( $old['Mar']!=$el['Mar'] ||  $old['UM']!=$el['UM'] ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Set('subtotal_Metros', number_format($totalMetros,2,',','.'));
    $T->Set('total_valor', number_format($total_valor,2,',','.'));
    $T->Show('query0_subtotal_row');
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

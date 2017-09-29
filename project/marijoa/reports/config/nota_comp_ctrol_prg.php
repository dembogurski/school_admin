<?php

/** Report prg file (nota_comp_ctrol) 
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
$T->Set( 'sup___user', 'Developer');
$T->Set( 'sup___lock', '');
$T->Set( 'sup_n_nro', '4');
$T->Set( 'sup_n_invoice', 'PYASDCASD1212');
$T->Set( 'sup_n_nac_int', 'Internacional');
$T->Set( 'sup_n_b_mar', '');
$T->Set( 'sup_n_pr', '');
$T->Set( 'sup_n_mar', 'W121211');
$T->Set( 'sup_n_fecha', '2012-07-10');
$T->Set( 'sup_n_fecha_prev', '2012-12-15');
$T->Set( 'sup_n_gen', 'No');
$T->Set( 'sup___change', '');
$T->Set( 'sup_n_det', '');
$T->Set( 'sup_msg', '');
$T->Set( 'sup_n_sucia', '0.00');
$T->Set( 'sup_n_lav', '');
$T->Set( 'sup_n_falla', '0.00');
$T->Set( 'sup_n_tipo_falla', '');
$T->Set( 'sup_n_frac_orig', '');
$T->Set( 'sup_n_obs', '');
$T->Set( 'sup_n_estado', 'Abierta');
$T->Set( 'sup_n_print', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT id,d_nro,d_nom_orig,p_fam,p_grupo,p_tipo,p_color,descrip,paq,unid,ancho,cant,gramage,metros,origen,realmts,moneda,subtotal,subtotal_ref,cotiz,tipo_med,p_compra FROM nota_compra_det WHERE d_nro = '4'";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );
$today = date("d-m-Y H:i");                        
$T->Set( 'fecha', $today);

$NRO = $sup['n_nro'];
$db = new Y_DB();
$db->Database = $Global['project'];

$inac_int = $sup['n_nac_int'];
$invoice = $sup['n_invoice'];
$mar = $sup['n_mar'];
$cotiz = $sup['n_cotiz'];
$moneda = $sup['n_moneda'];

$T->Set( 'invoice', strtoupper( $invoice ));
$T->Set( 'mar', strtoupper($mar));
$T->Set( 'nac_int', $inac_int);
$T->Set( 'moneda', $moneda);
$T->Set( 'cotiz', $cotiz);

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
$subtotal0_metros = 0;
$subtotal0_origen = 0;
$subtotal0_realmts = 0;
$subtotal0_subtotal = 0;
$subtotal0_subtotal_ref = 0;


//Define a Old Values Variables
$old['id'] = '';
$old['d_nro'] = '';
$old['d_nom_orig'] = '';
$old['p_fam'] = '';
$old['p_grupo'] = '';
$old['p_tipo'] = '';
$old['p_color'] = '';
$old['descrip'] = '';
$old['paq'] = '';
$old['unid'] = '';
$old['ancho'] = '';
$old['cant'] = '';
$old['gramage'] = '';
$old['metros'] = '';
$old['origen'] = '';
$old['realmts'] = '';
$old['moneda'] = '';
$old['subtotal'] = '';
$old['subtotal_ref'] = '';
$old['cotiz'] = '';
$old['tipo_med'] = '';
$old['p_compra'] = '';

$i = 0;

// Making a rows of consult
while( $Q0->NextRecord() ){
    $i++;
    // Define a elements
    $el['id'] = $Q0->Record['id'];
    $el['d_nro'] = $Q0->Record['d_nro'];
    $el['d_nom_orig'] = $Q0->Record['d_nom_orig'];
    $el['p_fam'] = $Q0->Record['p_fam'];
    $el['p_grupo'] = $Q0->Record['p_grupo'];
    $el['p_tipo'] = $Q0->Record['p_tipo'];
    $el['p_color'] = $Q0->Record['p_color'];
    $el['descrip'] = $Q0->Record['descrip'];
    $el['paq'] = $Q0->Record['paq'];
    $el['unid'] = $Q0->Record['unid'];
    $el['ancho'] = $Q0->Record['ancho'];
    $el['cant'] = $Q0->Record['cant'];
    $el['gramage'] = $Q0->Record['gramage'];
    $el['metros'] = $Q0->Record['metros'];
    $el['origen'] = $Q0->Record['origen'];
    $el['realmts'] = $Q0->Record['realmts'];
    $el['moneda'] = $Q0->Record['moneda'];
    $el['subtotal'] = $Q0->Record['subtotal'];
    $el['subtotal_ref'] = $Q0->Record['subtotal_ref'];
    $el['cotiz'] = $Q0->Record['cotiz'];
    $el['tipo_med'] = $Q0->Record['tipo_med'];
    $el['p_compra'] = $Q0->Record['p_compra'];
    
    if($el['realmts']=="0"){
      $precio_prorateado = 0;  
    }else{
      $precio_prorateado = $el['subtotal_ref'] / $el['realmts'];
    }
    
    // Preparing a template variables
    $T->Set('query0_id', $el['id']);
    $T->Set('query0_d_nro', $el['d_nro']);
    $T->Set('query0_d_nom_orig', strtoupper( $el['d_nom_orig']) );
    $T->Set('query0_p_fam', $el['p_fam']);
    $T->Set('query0_p_grupo', $el['p_grupo']);
    $T->Set('query0_p_tipo', $el['p_tipo']);
    $T->Set('query0_p_color', $el['p_color']);
    $T->Set('query0_descrip', $el['descrip']);
    $T->Set('query0_paq', $el['paq']);
    $T->Set('query0_unid', $el['unid']);
    $T->Set('query0_ancho', $el['ancho']);
    $T->Set('query0_cant', $el['cant']);
    $T->Set('query0_gramage', $el['gramage']);
    $T->Set('query0_metros', number_format($el['metros'],0,',','.'));
    $T->Set('query0_origen', number_format($el['origen'],0,',','.'));
    $T->Set('query0_realmts', number_format($el['realmts'],0,',','.'));
    $T->Set('query0_moneda', $el['moneda']);
    $T->Set('query0_subtotal', number_format($el['subtotal'],0,',','.'));
    $T->Set('query0_subtotal_ref', number_format($el['subtotal_ref'],0,',','.'));
    $T->Set('query0_cotiz', $el['cotiz']);
    $T->Set('query0_tipo_med', $el['tipo_med']);
    $T->Set('query0_p_compra',number_format( $el['p_compra'],0,',','.'));
    $T->Set('query0_precio_prorat', number_format($precio_prorateado,0,',','.'));
    $T->Set('i', $i);
    
    
    
    // Calculating a total

    // Calculating a subtotal
    $subtotal0_metros += 0 + $el['metros'];
    $subtotal0_origen += 0 + $el['origen'];
    $subtotal0_realmts += 0 + $el['realmts'];
    $subtotal0_subtotal += 0 + $el['subtotal'];
    $subtotal0_subtotal_ref += 0 + $el['subtotal_ref'];
    
    

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_metros', number_format($subtotal0_metros,2,',','.'));
    $T->Set('subtotal0_origen', number_format($subtotal0_origen,2,',','.'));
    $T->Set('subtotal0_realmts', number_format($subtotal0_realmts,2,',','.'));
    $T->Set('subtotal0_subtotal', number_format($subtotal0_subtotal,0,',','.'));
    $T->Set('subtotal0_subtotal_ref', number_format($subtotal0_subtotal_ref,0,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_metros = 0;
        $subtotal0_origen = 0;
        $subtotal0_realmts = 0;
        $subtotal0_subtotal = 0;
        $subtotal0_subtotal_ref = 0;
    }
    
    //Actualize Old Values Variables
    $old['id'] = $el['id'];
    $old['d_nro'] = $el['d_nro'];
    $old['d_nom_orig'] = $el['d_nom_orig'];
    $old['p_fam'] = $el['p_fam'];
    $old['p_grupo'] = $el['p_grupo'];
    $old['p_tipo'] = $el['p_tipo'];
    $old['p_color'] = $el['p_color'];
    $old['descrip'] = $el['descrip'];
    $old['paq'] = $el['paq'];
    $old['unid'] = $el['unid'];
    $old['ancho'] = $el['ancho'];
    $old['cant'] = $el['cant'];
    $old['gramage'] = $el['gramage'];
    $old['metros'] = $el['metros'];
    $old['origen'] = $el['origen'];
    $old['realmts'] = $el['realmts'];
    $old['moneda'] = $el['moneda'];
    $old['subtotal'] = $el['subtotal'];
    $old['subtotal_ref'] = $el['subtotal_ref'];
    $old['cotiz'] = $el['cotiz'];
    $old['tipo_med'] = $el['tipo_med'];
    $old['p_compra'] = $el['p_compra'];
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



$db->Query("select * from notas_compras where n_nro = $NRO limit 1");
if($db->NumRows()>0){
    $db->NextRecord();
    $sucia = $db->Record['n_sucia'];
    $frac = $db->Record['n_frac_orig'];
    $falla = $db->Record['n_falla'];
    $obs = $db->Record['n_obs'];
    
        
    $T->Set('sucia', $sucia);
    $T->Set('fracionada', $frac);
    $T->Set('falla', $falla);
    $T->Set('obs', $obs);
}

$T->Show('control_calidad');	


?>

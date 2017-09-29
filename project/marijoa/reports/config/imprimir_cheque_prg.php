<?php

/** Report prg file (imprimir_cheque) 
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
$T->Set( 'sup_msg', 'Filtre Cuotas, Pagares y Cheques acotando las fechas de y a.');
$T->Set( 'sup_prov', '%');
$T->Set( 'sup_dp_prov', '__NO DATA__');
$T->Set( 'sup_fecha', '2008-02-20');
$T->Set( 'sup_fecha_a', '2008-02-20');
$T->Set( 'sup_fecha_inv', '2008-02-20');
$T->Set( 'sup_fecha_inva', '2008-02-20');
$T->Set( 'sup_ct_estado', 'Pendiente');
$T->Set( 'sup_cuotas_pagar', '');
$T->Set( 'sup_chq_ab', '');
$T->Set( 'sup_chq_prov', '');
$T->Set( 'sup_pg_estado', 'Pendiente');
$T->Set( 'sup_pagares_pagar', '');
$T->Set( 'sup_imprimir_chq', '');
$T->Set( 'sup_conf', 'No');
$T->Set( 'sup_terminar', 'false');  */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT  chq_cta , chq_num, chq_estado, chq_fecha_emis, chq_fecha_pag, chq_valor, chq_benef, chq_bco, chq_moneda, chq_mot_anul, chq_ref, chq_conc, chq_formato, chq_mult FROM bcos_chq where chq_mult = "Si"";

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
$old['chq_cta'] = '';
$old['chq_num'] = '';
$old['chq_estado'] = '';
$old['chq_fecha_emis'] = '';
$old['chq_fecha_pag'] = '';
$old['chq_valor'] = '';
$old['chq_benef'] = '';
$old['chq_bco'] = '';
$old['chq_moneda'] = '';
$old['chq_mot_anul'] = '';
$old['chq_ref'] = '';
$old['chq_conc'] = '';
$old['chq_formato'] = '';
$old['chq_mult'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['chq_cta'] = $Q0->Record['chq_cta'];
    $el['chq_num'] = $Q0->Record['chq_num'];
    $el['chq_estado'] = $Q0->Record['chq_estado'];
    $el['chq_fecha_emis'] = $Q0->Record['chq_fecha_emis'];
    $el['chq_fecha_pag'] = $Q0->Record['chq_fecha_pag'];
    $el['chq_valor'] = $Q0->Record['chq_valor'];
    $el['chq_benef'] = $Q0->Record['chq_benef'];
    $el['chq_bco'] = $Q0->Record['chq_bco'];
    $el['chq_moneda'] = $Q0->Record['chq_moneda'];
    $el['chq_mot_anul'] = $Q0->Record['chq_mot_anul'];
    $el['chq_ref'] = $Q0->Record['chq_ref'];
    $el['chq_conc'] = $Q0->Record['chq_conc'];
    $el['chq_formato'] = $Q0->Record['chq_formato'];
    $el['chq_mult'] = $Q0->Record['chq_mult'];

    // Preparing a template variables
    $T->Set('query0_chq_cta', $el['chq_cta']);
    $T->Set('query0_chq_num', $el['chq_num']);
    $T->Set('query0_chq_estado', $el['chq_estado']);
    $T->Set('query0_chq_fecha_emis', $el['chq_fecha_emis']);
    $T->Set('query0_chq_fecha_pag', $el['chq_fecha_pag']);
    $T->Set('query0_chq_valor', $el['chq_valor']);
    $T->Set('query0_chq_benef', $el['chq_benef']);
    $T->Set('query0_chq_bco', $el['chq_bco']);
    $T->Set('query0_chq_moneda', $el['chq_moneda']);
    $T->Set('query0_chq_mot_anul', $el['chq_mot_anul']);
    $T->Set('query0_chq_ref', $el['chq_ref']);
    $T->Set('query0_chq_conc', $el['chq_conc']);
    $T->Set('query0_chq_formato', $el['chq_formato']);
    $T->Set('query0_chq_mult', $el['chq_mult']);
    
   

    
    /*Extraigo dia mes y año */
    $T->Set('dia',substr($el['chq_fecha_emis'],8,2) );
    			  
        $Amonth = array( 'enero','febrero','marzo','abril','mayo','junio',
			'julio','agosto','setiembre','octubre','noviembre','diciembre');  
			
    $mes = 	substr($el['chq_fecha_emis'],5,2);	  
    
 
       
    $T->Set('mes', $Amonth[ $mes + 0  ]  );
      
    $T->Set('anio',substr($el['chq_fecha_emis'],0,4) );    
    
    /*Extraido dia, mes y anio de pago*/
    
	$T->Set('query0_chq_fecha_pag', $el['chq_fecha_pag']);
    $T->Set('diap',substr($el['chq_fecha_pag'],8,2) );
     			
	$mesp =  substr($el['chq_fecha_pag'],5,2);	   
    $T->Set('mesp',  $Amonth[ $mesp + 0] );
        
    $T->Set('aniop',substr($el['chq_fecha_pag'],0,4) );     
    
    // Monto en letras
    
    $cadena = extense($el['chq_valor'],1,1);        
    
    $T->Set('letras', substr($cadena,0,strlen($cadena)-9).'');
    $T->Set('__','&nbsp;&nbsp;');
    $T->Set('____','&nbsp;&nbsp;&nbsp;&nbsp;');
    $T->Set('________','&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
    
    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row'.$el['chq_formato']);
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['chq_cta'] = $el['chq_cta'];
    $old['chq_num'] = $el['chq_num'];
    $old['chq_estado'] = $el['chq_estado'];
    $old['chq_fecha_emis'] = $el['chq_fecha_emis'];
    $old['chq_fecha_pag'] = $el['chq_fecha_pag'];
    $old['chq_valor'] = $el['chq_valor'];
    $old['chq_benef'] = $el['chq_benef'];
    $old['chq_bco'] = $el['chq_bco'];
    $old['chq_moneda'] = $el['chq_moneda'];
    $old['chq_mot_anul'] = $el['chq_mot_anul'];
    $old['chq_ref'] = $el['chq_ref'];
    $old['chq_conc'] = $el['chq_conc'];
    $old['chq_formato'] = $el['chq_formato'];
    $old['chq_mult'] = $el['chq_mult'];
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

<?php

/** Report prg file (imp_chq_bco_reg) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  

// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 
$T = new Y_Template( $file_tpl ); 
// Superior Variables
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_cta_bco', '1');
$T->Set( 'sup_serie', 'y-');
$T->Set( 'sup_nro_ini', '258374');
$T->Set( 'sup_nro_fin', '');
$T->Set( 'sup_ini', 'y-258374');
$T->Set( 'sup_final', 'y-258374');
$T->Set( 'sup_cheques', '');
$T->Set( 'sup_imprimir', '');
$T->Set( 'sup_imprimir_cont', '');
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT chq_cta, chq_num, chq_estado, chq_fecha_emis, chq_fecha_pag, chq_valor, chq_benef, chq_bco, chq_moneda  FROM bcos_chq WHERE  chq_num >= 'y-258374' and chq_num <= 'y-258374' and chq_estado = "Emitido" and chq_bco = '1'";

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

    // Preparing a template variables
    $T->Set('query0_chq_cta', $el['chq_cta']);
    $T->Set('query0_chq_num', $el['chq_num']);
    $T->Set('query0_chq_estado', $el['chq_estado']);
    $T->Set('query0_chq_fecha_emis', $el['chq_fecha_emis']);
    $T->Set('dia',substr($el['chq_fecha_emis'],8,2) );
    
	$Amonth = array( 'enero','febrero','marzo','abril','mayo','junio',
			'julio','agosto','setiembre','octubre','noviembre','diciembre');    
    $mes = 	substr($el['chq_fecha_emis'],5,2);	    
    
    $T->Set('mes',$Amonth[ $mes ]  );
    
    $T->Set('anio',substr($el['chq_fecha_emis'],0,4) );
    
    $T->Set('query0_chq_fecha_pag', $el['chq_fecha_pag']);
    $T->Set('diap',substr($el['chq_fecha_pag'],8,2) );

	$Amonth = array( 'enero','febrero','marzo','abril','mayo','junio',
			'julio','agosto','setiembre','octubre','noviembre','diciembre');
			
	$mesp = 	substr($el['chq_fecha_pag'],5,2);	    
    
    $T->Set('mesp',  $Amonth[ $mesp ] );    
    $T->Set('aniop',substr($el['chq_fecha_pag'],0,4) ); 
    
    $T->Set('query0_chq_valor', $el['chq_valor']);
    $T->Set('query0_chq_benef', $el['chq_benef']);
    $T->Set('query0_chq_bco', $el['chq_bco']);
    $T->Set('query0_chq_moneda', $el['chq_moneda']);
      
    $T->Set('letras',extense($el['chq_valor'],1,1));

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
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

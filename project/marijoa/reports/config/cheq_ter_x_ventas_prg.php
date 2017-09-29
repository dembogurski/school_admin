<?php

/** Report prg file (cheq_terceros) 
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
$T->Set( 'sup_chq_bco', '');
$T->Set( 'sup_chq_cta', '');
$T->Set( 'sup_chq_num', '');
$T->Set( 'sup_chq_nombre_de', '');
$T->Set( 'sup_desde', '2012-01-01');
$T->Set( 'sup_hasta', '2012-01-18');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_rep', '');
 * 
 */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT  chq_ref AS REF, chq_bco AS BANCO, chq_cta AS CUENTA, chq_num AS NRO,date_format(chq_fecha_pag,"%d-%m-%Y") AS FECHA_PAG,chq_valor AS VALOR, chq_moneda AS MON,chq_cotiz AS COTIZ, chq_moneda_ref AS VALOR_GS,chq_estado AS ESTADO,chq_nombre_de AS NOMBRE_DE,date_format(chq_fecha_emis,"%d-%m-%Y") AS FECHA_EMIS,chq_fecha_ins AS FECHA_INS,chq_docs AS DOCS FROM cheq_terceros WHERE  chq_fecha_ins BETWEEN '2012-01-01' AND '2012-01-18' and chq_bco LIKE '%' and chq_cta LIKE '%' and chq_num LIKE '%' and chq_nombre_de LIKE '%' ";

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
$subtotal0_VALOR = 0;
$subtotal0_VALOR_GS = 0;


//Define a Old Values Variables
$old['REF'] = '';
$old['BANCO'] = '';
$old['CUENTA'] = '';
$old['NRO'] = '';
$old['FECHA_PAG'] = '';
$old['VALOR'] = '';
$old['MON'] = '';
$old['COTIZ'] = '';
$old['VALOR_GS'] = '';
$old['ESTADO'] = '';
$old['NOMBRE_DE'] = '';
$old['FECHA_EMIS'] = '';
$old['FECHA_INS'] = '';
$old['DOCS'] = '';
$old['ADMIN'] = '';
$old['GERENCIA'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['REF'] = $Q0->Record['REF'];
    $el['BANCO'] = $Q0->Record['BANCO'];
    $el['CUENTA'] = $Q0->Record['CUENTA'];
    $el['NRO'] = $Q0->Record['NRO'];
    $el['FECHA_PAG'] = $Q0->Record['FECHA_PAG'];
    $el['VALOR'] = $Q0->Record['VALOR'];
    $el['MON'] = $Q0->Record['MON'];
    $el['COTIZ'] = $Q0->Record['COTIZ'];
    $el['VALOR_GS'] = $Q0->Record['VALOR_GS'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];
    $el['NOMBRE_DE'] = $Q0->Record['NOMBRE_DE'];
    $el['FECHA_EMIS'] = $Q0->Record['FECHA_EMIS'];
    $el['FECHA_INS'] = $Q0->Record['FECHA_INS'];
    $el['DOCS'] = $Q0->Record['DOCS'];
     $el['ADMIN'] = $Q0->Record['ADMIN'];
      $el['GERENCIA'] = $Q0->Record['GERENCIA'];

    // Preparing a template variables
    $T->Set('query0_REF', $el['REF']);
    $T->Set('query0_BANCO', $el['BANCO']);
    $T->Set('query0_CUENTA', $el['CUENTA']);
    $T->Set('query0_NRO', $el['NRO']);
    $T->Set('query0_FECHA_PAG', $el['FECHA_PAG']);
    $T->Set('query0_VALOR', number_format($el['VALOR'],0,',','.'));
    $T->Set('query0_MON', $el['MON']);
    $T->Set('query0_COTIZ', $el['COTIZ']);
    $T->Set('query0_VALOR_GS', number_format($el['VALOR_GS'],0,',','.'));
    $T->Set('query0_ESTADO', $el['ESTADO']);
    $T->Set('query0_NOMBRE_DE', $el['NOMBRE_DE']);
    $T->Set('query0_FECHA_EMIS', $el['FECHA_EMIS']);
    $T->Set('query0_FECHA_INS', $el['FECHA_INS']);
    $T->Set('query0_DOCS', $el['DOCS']);
     $T->Set('query0_ADMIN', $el['ADMIN']);
    $T->Set('query0_GERENCIA', $el['GERENCIA']);
    
    if($el['ESTADO']==='Pendiente'){
       $T->Set('color', 'red');
    }else if ($el['ESTADO']==='Cobrado') {
       $T->Set('color', 'green');
    }else{
       $T->Set('color', 'blue');
    }

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_VALOR += 0 + $el['VALOR'];
    $subtotal0_VALOR_GS += 0 + $el['VALOR_GS'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_VALOR', number_format($subtotal0_VALOR,0,',','.'));
    $T->Set('subtotal0_VALOR_GS', number_format($subtotal0_VALOR_GS,0,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_VALOR = 0;
        $subtotal0_VALOR_GS = 0;
    }
    
    //Actualize Old Values Variables
    $old['REF'] = $el['REF'];
    $old['BANCO'] = $el['BANCO'];
    $old['CUENTA'] = $el['CUENTA'];
    $old['NRO'] = $el['NRO'];
    $old['FECHA_PAG'] = $el['FECHA_PAG'];
    $old['VALOR'] = $el['VALOR'];
    $old['MON'] = $el['MON'];
    $old['COTIZ'] = $el['COTIZ'];
    $old['VALOR_GS'] = $el['VALOR_GS'];
    $old['ESTADO'] = $el['ESTADO'];
    $old['NOMBRE_DE'] = $el['NOMBRE_DE'];
    $old['FECHA_EMIS'] = $el['FECHA_EMIS'];
    $old['FECHA_INS'] = $el['FECHA_INS'];
    $old['DOCS'] = $el['DOCS'];
        $old['ADMIN'] = $el['ADMIN'];
    $old['GERENCIA'] = $el['GERENCIA'];
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
  /**
   *  A veces creo que el compilador ignora todos mis comentarios
   */
?>

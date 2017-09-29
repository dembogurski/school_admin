<?php

/** Report prg file (stock_FGT) 
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
$T->Set( 'sup_rep_localidad', '%');
$T->Set( 'sup_p_fam', 'CORTINADOS');
$T->Set( 'sup_p_grupo', 'BOAL');
$T->Set( 'sup_p_tipo', '%%');
$T->Set( 'sup_p_color', '%');
$T->Set( 'sup___term', '%');
$T->Set( 'sup_rep_ventas', '');
$T->Set( 'sup_rep_stockFG', '');
$T->Set( 'sup_rep_stockGt', '');
$T->Set( 'sup_fp', 'No');
$T->Set( 'sup_rep_GTC', '');
$T->Set( 'sup_resumido', 'Si');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT  p.p_fam as FAM, p.p_grupo as GRUPO,p.p_tipo as TIPO,  p.p_cant as CANT, (p.p_cant * p.p_compra) as VALOR_AL_COSTO  FROM  mnt_prod p WHERE  p.p_local LIKE  '%' and p.p_fam like 'CORTINADOS' and p.p_grupo like  'BOAL' and p.p_tipo like '%%' and p.p_cant > 0  and p.p_cod like '%' AND prod_fin_pieza LIKE 'No' GROUP BY p.p_fam , p.p_grupo,p.p_tipo  ORDER BY p.p_fam , p.p_grupo , p.p_tipo,p.p_cant DESC";

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
$total0_CANT = 0;
$total0_VALOR_AL_COSTO = 0;

//Define a Subtotal Variables


//Define a Old Values Variables
$old['FAM'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['CANT'] = '';
$old['VALOR_AL_COSTO'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FAM'] = $Q0->Record['FAM'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['CANT'] = $Q0->Record['CANT'];
    $el['VALOR_AL_COSTO'] = $Q0->Record['VALOR_AL_COSTO'];
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }

    // Preparing a template variables
    $T->Set('query0_FAM', $el['FAM']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_CANT', number_format($el['CANT'],2,',','.'));
    $T->Set('query0_VALOR_AL_COSTO', number_format($el['VALOR_AL_COSTO'],2,',','.'));

    // Calculating a total
    $total0_CANT += 0 + $el['CANT'];
    $total0_VALOR_AL_COSTO += 0 + $el['VALOR_AL_COSTO'];

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    
    //Actualize Old Values Variables
    $old['FAM'] = $el['FAM'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['CANT'] = $el['CANT'];
    $old['VALOR_AL_COSTO'] = $el['VALOR_AL_COSTO'];
    $firstRow=false;

}

$endConsult = true;
if( true ){
    $T->Show('query0_subtotal_row');
}
// Show total
$T->Set('total0_CANT', number_format($total0_CANT,2,',','.'));
$T->Set('total0_VALOR_AL_COSTO', number_format($total0_VALOR_AL_COSTO,2,',','.'));
if( endConsult ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

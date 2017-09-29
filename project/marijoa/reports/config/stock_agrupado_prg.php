<?php

/** Report prg file (stock_agrupado) 
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
$T->Set( 'sup_msg', 'El simbolo % indica todos!!!');
$T->Set( 'sup_aut_lock', 'true');
$T->Set( 'sup_rep_localidad', '%');
$T->Set( 'sup_msg2', 'Filtre  aqui los datos del Producto!!!');
$T->Set( 'sup_p_fam', '%');
$T->Set( 'sup_p_grupo', '%');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_p_comp', '');
$T->Set( 'sup_p_temp', '');
$T->Set( 'sup_p_estruc', '');
$T->Set( 'sup_p_clasif', '');
$T->Set( 'sup_p_color', '%');
$T->Set( 'sup_p_lisoest', '');
$T->Set( 'sup_rep_cantidad', '0.0');
$T->Set( 'sup_fdp', 'No');
$T->Set( 'sup_rep_stock_min', '');
$T->Set( 'sup_stock_group_by', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT  p.p_local AS SUC,count(*) AS CANT, sum(p_cant) AS METROS  FROM  mnt_prod p WHERE  p.p_local LIKE '%' AND p.p_fam LIKE '%' AND p.p_grupo LIKE  '%' AND p.p_tipo LIKE '%'    AND p.p_color LIKE '%'  AND p.p_cant >  '0.0' AND prod_fin_pieza LIKE 'No' AND p.p_cant > 0 GROUP BY SUC   order by SUC ASC";

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
$subtotal0_CANT = 0;
$subtotal0_METROS = 0;


//Define a Old Values Variables
$old['SUC'] = '';
$old['CANT'] = '';
$old['METROS'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['SUC'] = $Q0->Record['SUC'];
    $el['CANT'] = $Q0->Record['CANT'];
    $el['METROS'] = $Q0->Record['METROS'];

    // Preparing a template variables
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_CANT', number_format($el['CANT'],0,',','.'));
    $T->Set('query0_METROS', number_format($el['METROS'],2,',','.'));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CANT += 0 + $el['CANT'];
    $subtotal0_METROS += 0 + $el['METROS'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANT', number_format($subtotal0_CANT,0,',','.'));
    $T->Set('subtotal0_METROS', number_format($subtotal0_METROS,0,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANT = 0;
        $subtotal0_METROS = 0;
    }
    
    //Actualize Old Values Variables
    $old['SUC'] = $el['SUC'];
    $old['CANT'] = $el['CANT'];
    $old['METROS'] = $el['METROS'];
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

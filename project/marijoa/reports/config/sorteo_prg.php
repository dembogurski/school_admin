<?php

/** Report prg file (sorteo) 
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
$T->Set( 'sup_desde', '2012-01-01');
$T->Set( 'sup_hasta', '2012-03-14');
$T->Set( 'sup_categ', '%');
$T->Set( 'sup_totalv', '15000');
$T->Set( 'sup_ver_part', '');
$T->Set( 'sup___lock', 'true');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT c.id AS ID, c.cli_ci AS CI, UPPER(c.cli_fullname) AS CLIENTE,c.cli_cat AS CAT, CONCAT(cli_tel1," - ",cli_tel2) AS TELEFONOS,CONCAT(c.cli_dir,"  ",c.ciudad," - ",c.dep_estado," - ",c.pais) AS DIR,c.cli_fecha_ins AS REGISTRADO_EN, f.fact_total AS TOTAL FROM mnt_cli c, factura f WHERE f.fact_cli_ci <> "1" AND c.cli_ci = f.fact_cli_ci AND f.fact_fecha BETWEEN '2012-01-01' AND '2012-03-14' and f.fact_cli_cat like '%'  AND f.fact_estado = "Cerrada" AND f.fact_total > '15000'";

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
$old['ID'] = '';
$old['CI'] = '';
$old['CLIENTE'] = '';
$old['CAT'] = '';
$old['TELEFONOS'] = '';
$old['DIR'] = '';
$old['REGISTRADO_EN'] = '';
$old['TOTAL'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['ID'] = $Q0->Record['ID'];
    $el['CI'] = $Q0->Record['CI'];
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['CAT'] = $Q0->Record['CAT'];
    $el['TELEFONOS'] = $Q0->Record['TELEFONOS'];
    $el['DIR'] = $Q0->Record['DIR'];
    $el['REGISTRADO_EN'] = $Q0->Record['REGISTRADO_EN'];
    $el['TOTAL'] = $Q0->Record['TOTAL'];
    $id = $el['ID'] ;
    echo "<script>  add($id); </script> ";

    // Preparing a template variables
    $T->Set('query0_ID', $el['ID']);
    $T->Set('query0_CI', $el['CI']);
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_CAT', $el['CAT']);
    $T->Set('query0_TELEFONOS', $el['TELEFONOS']);
    $T->Set('query0_DIR', $el['DIR']);
    $T->Set('query0_REGISTRADO_EN', $el['REGISTRADO_EN']);
    $T->Set('query0_TOTAL', $el['TOTAL']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['ID'] = $el['ID'];
    $old['CI'] = $el['CI'];
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['CAT'] = $el['CAT'];
    $old['TELEFONOS'] = $el['TELEFONOS'];
    $old['DIR'] = $el['DIR'];
    $old['REGISTRADO_EN'] = $el['REGISTRADO_EN'];
    $old['TOTAL'] = $el['TOTAL'];
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

//echo "<script>  alert(array); </script> ";

?>

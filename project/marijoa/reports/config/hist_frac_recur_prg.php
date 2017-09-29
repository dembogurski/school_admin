<?php

/** Report prg file (hist_frac_recur) 
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
$T->Set( 'sup___local', '02');
$T->Set( 'sup_cod_prod', '7292514');
$T->Set( 'sup_padre', '6097914');
$T->Set( 'sup_creador', '__NO DATA__');
$T->Set( 'sup_remito', '__NO DATA__');
$T->Set( 'sup_df_confirmar', 'No');
$T->Set( 'sup_df_fin_pieza', 'false');
$T->Set( 'sup_cant_actual', '7.45');
$T->Set( 'sup_desc', 'LYCRA - MODAL DE ALGODON ESTAMPADO - MARFIL');
$T->Set( 'sup_descripcion', '10-12-66-(f1)');
$T->Set( 'sup_cant_compra', '25.00');
$T->Set( 'sup_fdp_r', 'No');
$T->Set( 'sup_p_local_prod', '02');
$T->Set( 'sup_p_ancho', '1.55');
$T->Set( 'sup_p_gram', '147.00');
$T->Set( 'sup_p_kg_actual', '1.697');
$T->Set( 'sup_p_cant_aj', '1');
$T->Set( 'sup_p_kg_desc', '__NO DATA__');
$T->Set( 'sup_ver_ajustes', '');
$T->Set( 'sup_mov_ventas', '');
$T->Set( 'sup_mov_ventas2', '');
$T->Set( 'sup_info_trans', '');
$T->Set( 'sup_fracs', '');
$T->Set( 'sup_fracss', '');
$T->Set( 'sup_hist_frag_frac', '');
$T->Set( 'sup_gen_punteo', '');
$T->Set( 'sup_transf_positiva', '');
$T->Set( 'sup_ubic_hist', '');
$T->Set( 'sup_editar', '');
$T->Set( 'sup_cod', '7292514');
$T->Set( 'sup_codigo', '7292514');
 * */
 
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select p_cod, p_cant_compra,p_cant,prod_fin_pieza from mnt_prod where p_cod = '7292514' ";

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
$old['p_cod'] = '';
$old['p_cant_compra'] = '';
$old['p_cant'] = '';
$old['prod_fin_pieza'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['p_cod'] = $Q0->Record['p_cod'];
    $el['p_cant_compra'] = $Q0->Record['p_cant_compra'];
    $el['p_cant'] = $Q0->Record['p_cant'];
    $el['prod_fin_pieza'] = $Q0->Record['prod_fin_pieza'];

    // Preparing a template variables
    $T->Set('query0_p_cod', $el['p_cod']);
    $T->Set('query0_p_cant_compra', $el['p_cant_compra']);
    $T->Set('query0_p_cant', $el['p_cant']);
    $T->Set('query0_prod_fin_pieza', $el['prod_fin_pieza']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    $c = $el['p_cod'];
    recursiveFracc($c, 0);
    
    //Actualize Old Values Variables
    $old['p_cod'] = $el['p_cod'];
    $old['p_cant_compra'] = $el['p_cant_compra'];
    $old['p_cant'] = $el['p_cant'];
    $old['prod_fin_pieza'] = $el['prod_fin_pieza'];
    $firstRow=false;

}

function recursiveFracc($codigo, $nivel){
       $db2 = new Y_DB(); 
       $db2->Database = 'marijoa';  
       $q = "select p_cod, p_cant_compra,p_cant,prod_fin_pieza from mnt_prod where p_padre = '$codigo'";
       $db2->Query($q);
       $nivel++;
       while($db2->NextRecord()){
          $cod = $db2->Record['p_cod']; $p_cant_compra = $db2->Record['p_cant_compra']; $p_cant =  $db2->Record['p_cant']; $fp= $db2->Record['prod_fin_pieza'];
          $espacios = '';
          for ($i = 0; $i < $nivel * 10; $i++) {
               $espacios.="&nbsp;";
          }
          
          echo "<tr>
            <td>$espacios  $cod</td>
            <td>$p_cant_compra</td>
            <td>$p_cant</td>
            <td>$fp</td>
          </tr>";
          recursiveFracc($cod, $nivel);
       }
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

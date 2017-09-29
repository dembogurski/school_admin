<?php

/** Report prg file (gram_altern) 
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
$T->Set( 'sup_codigo', '66613');
$T->Set( 'sup___local', '02');
$T->Set( 'sup_p_ref', '6832');
$T->Set( 'sup_cant_aj', '1');
$T->Set( 'sup_style', '');
$T->Set( 'sup_tab0', '');
$T->Set( 'sup_hfocus', 'false');
$T->Set( 'sup_f_sql', '16* (16)');
$T->Set( 'sup_f_fecha', '2013-10-23');
$T->Set( 'sup_descrip', 'FORROS-DIOLEN--Polyester-Permanente-Rigido-Liso-SALMON');
$T->Set( 'sup_f_cant_comp', '140.00');
$T->Set( 'sup_p_suc', '02');
$T->Set( 'sup_mover', 'No');
$T->Set( 'sup_conf', 'false');
$T->Set( 'sup_log_inventario', '');
$T->Set( 'sup_msgsuc', 'El producto no figura en esta sucursal!!!');
$T->Set( 'sup_style0', '');
$T->Set( 'sup_f_cant', '1.50');
$T->Set( 'sup_gram_grab', '273.81');
$T->Set( 'sup_diff', '0.10000000000000009');
$T->Set( 'sup_cant_real', '1.40');
$T->Set( 'sup_ancho', '1.20');
$T->Set( 'sup_kilos', '0.90');
$T->Set( 'sup_tara_tipo', 'Tablita Terciada 50');
$T->Set( 'sup_cm_tara', '50.00');
$T->Set( 'sup_tara', '140.00');
$T->Set( 'sup_gramaje', '452.3809523809524');
$T->Set( 'sup_espacio', '');
$T->Set( 'sup_set_gram', 'false');
$T->Set( 'sup_style1', '');
$T->Set( 'sup_select_text', '');
$T->Set( 'sup_f_bloqueo', 'true');
$T->Set( 'sup_style2', '');
$T->Set( 'sup_success', '');
$T->Set( 'sup_style3', '');
$T->Set( 'sup_styletaratipo', '');
$T->Set( 'sup_stylecmtara', '');
$T->Set( 'sup_stylemsgsuc', '');
$T->Set( 'sup___reload', '');
$T->Set( 'sup_altern', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p_ref as REF,p_fam AS FAMILIA,p_grupo AS GRUPO, p_tipo AS TIPO FROM mnt_prod WHERE p_cod = '66613'";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$codigo = $sup['codigo'];

$p_suc = $sup['suc_alt'];

$local = $sup['__local'];



$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

$db = new Y_DB();
$db->Database = $Global['project'];

//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables


//Define a Old Values Variables
$old['REF'] = '';
$old['FAMILIA'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['REF'] = $Q0->Record['REF'];
    $el['FAMILIA'] = $Q0->Record['FAMILIA'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    
      
    $ref = $el['REF'];
    $fam = $el['FAMILIA'];
    $grupo = $el['GRUPO'];
    $tipo = $el['TIPO'];
    $sql = "SELECT p_local AS SUC, p_cod AS CODIGO, p_fam AS FAMILIA, p_grupo AS GRUPO ,p_tipo AS TIPO, p_color AS COLOR, p_cant as CANT FROM mnt_prod WHERE p_ref = $ref AND p_cod <> $codigo 
            AND p_fam = '$fam' and p_grupo = '$grupo' and p_tipo = '$tipo' and p_local <> '11' and p_local like '$p_suc' and prod_fin_pieza <> 'Si' and p_cant > 0  order by p_local asc";
     
    
    $db->Query($sql);
     
 
    while( $db->NextRecord() ){
    
        $el['SUC'] = $db->Record['SUC'];
        $el['CODIGO'] = $db->Record['CODIGO'];
        $el['FAMILIA'] = $db->Record['FAMILIA'];
        $el['GRUPO'] = $db->Record['GRUPO'];
        $el['TIPO'] = $db->Record['TIPO'];    
        $el['COLOR'] = $db->Record['COLOR'];   
        $el['CANT'] = $db->Record['CANT'];   
        $suc = $el['SUC'];
        if($local == $suc){
          $T->Set('color','lightblue');
        }else{
          $T->Set('color','white');  
        }

        // Preparing a template variables
        $T->Set('query0_SUC', $el['SUC']);
        $T->Set('query0_CODIGO', $el['CODIGO']);
        $T->Set('query0_FAMILIA', $el['FAMILIA']);
        $T->Set('query0_GRUPO', $el['GRUPO']);
        $T->Set('query0_TIPO', $el['TIPO']);
        $T->Set('query0_COLOR', $el['COLOR']);
         $T->Set('query0_CANT', $el['CANT']);
        
        $T->Show('query0_data_row');
    }
 

    
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['REF'] = $el['REF'];
    $old['FAMILIA'] = $el['FAMILIA'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
        
    $T->Show('end_query0');	
    die();
}
 
			// Ends a Table  
?>

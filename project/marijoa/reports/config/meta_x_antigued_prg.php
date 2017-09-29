<?php

/** Report prg file (meta_x_antigued) 
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
$T->Set( 'sup_func_ref', '171');
$T->Set( 'sup_func_cod', 'CesarV');
$T->Set( 'sup_func_lugar_trab', '02');
$T->Set( 'sup_func_fullname', 'Villalba Rodriguez, Cesar Antonio');
$T->Set( 'sup_func_ci', '3456537');
$T->Set( 'sup_func_fecha_nac', '1983-06-13');
$T->Set( 'sup_func_fecha_cont', '2009-12-18');
$T->Set( 'sup_func_sueldo', '2031336');
$T->Set( 'sup_func_sueldo_r', '');
$T->Set( 'sup_func_comision', '0.00');
$T->Set( 'sup_func_tel1', '0985-756081');
$T->Set( 'sup_func_tel2', '');
$T->Set( 'sup_func_dir', 'Encarnacion');
$T->Set( 'sup_func_email', '');
$T->Set( 'sup_func_ips', '182820');
$T->Set( 'sup_func_tipo', 'No');
$T->Set( 'sup_func_cat', 'MINORISTA JUNIOR 1');
$T->Set( 'sup_func_meta', '0');
$T->Set( 'sup_func_suel_f', '0');
$T->Set( 'sup_func_suel_v', '0');
$T->Set( 'sup_func_calc_var', '');
$T->Set( 'sup_func_fecha_sal', '0-00-00');
$T->Set( 'sup_func_motivo_sal', '');
$T->Set( 'sup_func_cargo', '');
$T->Set( 'sup_func_estado', 'Inactivo');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT func_cod as CODIGO, func_fullname AS NOMBRE,date_format(func_fecha_cont,"%d-%m-%Y") AS FECHA_CONT ,datediff(CURRENT_DATE,func_fecha_cont) AS ANTIGUEDAD FROM mnt_func WHERE func_cod = 'CesarV'";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$db = new Y_DB();
$db->Database = 'marijoa';

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
$old['CODIGO'] = '';
$old['NOMBRE'] = '';
$old['FECHA_CONT'] = '';
$old['ANTIGUEDAD'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['NOMBRE'] = $Q0->Record['NOMBRE'];
    $el['FECHA_CONT'] = $Q0->Record['FECHA_CONT'];
    $el['ANTIGUEDAD'] = $Q0->Record['ANTIGUEDAD'];

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_NOMBRE', $el['NOMBRE']);
    $T->Set('query0_FECHA_CONT', $el['FECHA_CONT']);
    $T->Set('query0_ANTIGUEDAD', $el['ANTIGUEDAD']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    
    $antig = $el['ANTIGUEDAD'];
    
    $db->Query("SELECT categ,a_min,a_max, meta, sueldo_base FROM mnt_cat_vend WHERE a_min <= $antig  AND $antig <=  a_max  ");
    
    if($db->NumRows()>0){
        $T->Show('cath');
       while($db->NextRecord()){
       $cat = $db->Record['categ'];    
       $min = $db->Record['a_min'];    
       $max = $db->Record['a_max'];    
       $meta= $db->Record['meta'];  
       $sueldo_base = $db->Record['sueldo_base'];  
       $T->Set('categ', $cat);
       $T->Set('rango', $min.'-'.$max);
       $T->Set('meta', number_format($meta,0,',','.'));   
       $T->Set('sb', number_format($sueldo_base,0,',','.'));    
       $T->Show('cat');
       }
    }else{
        $T->Show('not_found');
    }    
    
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
    $old['NOMBRE'] = $el['NOMBRE'];
    $old['FECHA_CONT'] = $el['FECHA_CONT'];
    $old['ANTIGUEDAD'] = $el['ANTIGUEDAD'];
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

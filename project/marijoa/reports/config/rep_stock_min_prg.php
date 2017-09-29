<?php

/** Report prg file (rep_stock_min) 
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
$T->Set( 'sup_p_comp', '%');
$T->Set( 'sup_p_temp', '%');
$T->Set( 'sup_p_estruc', '%');
$T->Set( 'sup_p_clasif', '%');
$T->Set( 'sup_p_color', '%');
$T->Set( 'sup_p_lisoest', '%');
$T->Set( 'sup_rep_cantidad', '50');
$T->Set( 'sup_rep_stock_min', ''); */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT  p.p_local as SUC,p.p_cod as COD_PROD, p.p_fam as FAM, p.p_grupo as GRUPO,p.p_tipo as TIPO, p.p_comp as COMP, p.p_temp as TEMP, p.p_estruc as ESTRUCT,  p.p_clasif as CLASIF,  p.p_color as COLOR, p.p_lisoest as LISOEST, p_cant as CANTIDAD FROM  mnt_prod p where  p.p_local LIKE '%' and p.p_fam like '%' and p.p_grupo like  '%' and p.p_tipo like '%' and p.p_comp like  '%' and p.p_temp like '%' and p.p_estruc like '%'  and p.p_clasif like '%'  and p.p_color like '%' and p.p_lisoest like '%' and p.p_cant <=  '50'";

if( $sup['c_prov'] == '' ){
    $T->Set('C_PROV','');
}else{
    $T->Set('C_PROV','PROV');
}
if( $sup['rep_localidad'] == '' ){
    $T->Set('C_EMPR','');
}else{
    $T->Set('C_EMPR','SUC');
}

if( $sup['p_fam'] == '' ){
    $T->Set('C_FAM','');
}else{
    $T->Set('C_FAM','FAMILIA');
}
if( $sup['p_grupo'] == '' ){
    $T->Set('C_GRU','');
}else{
    $T->Set('C_GRU','GRUPO');
}
if( $sup['p_tipo'] == '' ){
    $T->Set('C_TIPO','');
}else{
    $T->Set('C_TIPO','TIPO');
}
if( $sup['p_comp'] == '' ){
    $T->Set('C_COMP','');
}else{
    $T->Set('C_COMP','COMP');
}
if( $sup['p_temp'] == '' ){
    $T->Set('C_TEMP','');
}else{
    $T->Set('C_TEMP','TEMP');
}
if( $sup['p_estruc'] == '' ){
    $T->Set('C_EST','');
}else{
    $T->Set('C_EST','ESTRUCT');
}
if( $sup['p_clasif'] == '' ){
    $T->Set('C_CLA','');
}else{
    $T->Set('C_CLA','CLASIF');
}
if( $sup['p_color'] == '' ){
    $T->Set('C_COLOR','');
}else{
    $T->Set('C_COLOR','COLOR');
}
if( $sup['p_lisoest'] == '' ){
    $T->Set('C_LISO','');
}else{
    $T->Set('C_LISO','LISOEST');
}


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
$old['SUC'] = '';
$old['COD_PROD'] = '';
$old['FAM'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COMP'] = '';
$old['TEMP'] = '';
$old['ESTRUCT'] = '';
$old['CLASIF'] = '';
$old['COLOR'] = '';
$old['LISOEST'] = '';
$old['CANTIDAD'] = '';
$old['VALOR'] = '';
$old['FDP'] = '';

$cant_total = 0;
$valor_total = 0;

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['SUC'] = $Q0->Record['SUC'];
    $el['COD_PROD'] = $Q0->Record['COD_PROD'];
    $el['FAM'] = $Q0->Record['FAM'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COMP'] = $Q0->Record['COMP'];
    $el['TEMP'] = $Q0->Record['TEMP'];
    $el['ESTRUCT'] = $Q0->Record['ESTRUCT'];
    $el['CLASIF'] = $Q0->Record['CLASIF'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['LISOEST'] = $Q0->Record['LISOEST'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $el['VALOR'] = $Q0->Record['VALOR'];
    $el['FDP'] = $Q0->Record['FDP'];
    
    $cant_total += 0 + $el['CANTIDAD'];
    $valor_total  += 0 + $el['VALOR'];
    
    // Preparing a template variables
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_COD_PROD', $el['COD_PROD']);
    $T->Set('query0_FAM', $el['FAM']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COMP', $el['COMP']);
    $T->Set('query0_TEMP', $el['TEMP']);
    $T->Set('query0_ESTRUCT', $el['ESTRUCT']);
    $T->Set('query0_CLASIF', $el['CLASIF']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_LISOEST', $el['LISOEST']);
    $T->Set('query0_CANTIDAD', $el['CANTIDAD']);
    $T->Set('query0_VALOR', number_format($el['VALOR'],2,',','.'));     
    $T->Set('query0_FDP', $el['FDP']); 
    
    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['SUC'] = $el['SUC'];
    $old['COD_PROD'] = $el['COD_PROD'];
    $old['FAM'] = $el['FAM'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COMP'] = $el['COMP'];
    $old['TEMP'] = $el['TEMP'];
    $old['ESTRUCT'] = $el['ESTRUCT'];
    $old['CLASIF'] = $el['CLASIF'];
    $old['COLOR'] = $el['COLOR'];
    $old['LISOEST'] = $el['LISOEST'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['VALOR'] = $el['VALOR'];
    $old['FDP'] = $el['FDP'];
    $firstRow=false;

}

$endConsult = true;
if( true ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Set('cant_total', number_format($cant_total,2,',','.'));     
    $T->Set('valor_total', number_format($valor_total,2,',','.'));     
    
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

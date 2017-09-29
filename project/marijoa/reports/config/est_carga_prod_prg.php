<?php

/** Report prg file (est_carga_prod) 
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
$T->Set( 'sup_msg', 'Introdusca % para mostrar todos los funcionarios...');
$T->Set( 'sup___local', '02');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_busc_func', 'ant');
$T->Set( 'sup___user', 'AntonioMon');
$T->Set( 'sup_func_nombre', 'Montania Valenzuela, Antonio Ariel');
$T->Set( 'sup_desde', '2011-09-28');
$T->Set( 'sup_hasta', '2011-09-30');
$T->Set( 'sup_estado', 'Cerrada');
$T->Set( 'sup_gen', '');
$T->Set( 'sup_rep_hoy', '');
$T->Set( 'sup_rep_porc_ventas', '');
$T->Set( 'sup_est_carga_prod', '');
 * */

// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT  p.p_cod as CODIGO,p.p_padre AS PADRE, p.p_cant_compra  AS CANT_COMPRA FROM _audit_log_ a, mnt_prod p WHERE a.descrip = p.p_cod AND a.accion = "INSERTAR"  AND a.usuario = 'AntonioMon' AND  a.fecha BETWEEN  '2011-09-28' AND '2011-09-30'";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$desde = $sup['desde'];
$hasta = $sup['hasta'];
$suc = $sup['__local'];

$hijos = $sup['hijos'];


$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);
$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

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
$subtotal0_CANT_COMPRA = 0;


//Define a Old Values Variables
$old['CODIGO'] = '';
$old['PADRE'] = '';
$old['CANT_COMPRA'] = '';
$old['LISOEST'] = '';
$old['USUARIO'] = '';

$old['IMP_EXP'] = '';
$old['FECHA'] = '';
$old['G_ADMIN'] = '';
$old['REC'] = '';
$old['COSTO'] = '';

$i = 0;
$j = 0;
$k = 0;

$zi = 0;
$zj = 0;

$z_lisos = 0;
$z_estamp = 0;

$z_gadmin = 0;
$z_costo = 0;
$z_total_costo = 0;

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['USUARIO'] = $Q0->Record['USUARIO'];
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['PADRE'] = $Q0->Record['PADRE'];
    $el['CANT_COMPRA'] = $Q0->Record['CANT_COMPRA'];
    $el['LISOEST'] = $Q0->Record['LISOEST'];
    
    $el['IMP_EXP'] = $Q0->Record['IMP_EXP'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['G_ADMIN'] = $Q0->Record['G_ADMIN'];
    $el['REC'] = $Q0->Record['REC'];
    $el['COSTO'] = $Q0->Record['COSTO'];
    
    
    $T->Set('query0_IMP_EXP', $el['IMP_EXP']);
    $T->Set('query0_FECHA', $el['FECHA']);
    
     
    if($el['LISOEST'] === 'Liso'){
        $z_lisos++;
    }else{
        $z_estamp++;
    }

    if($el['PADRE'] === ''){ // Es Padre
       $i++;
       $zi += 0 +$el['CANT_COMPRA'];
       $T->Set('query0_G_ADMIN', number_format($el['G_ADMIN'] ,0,',','.'));    
       $T->Set('query0_REC', number_format($el['REC'],2,',','.'));    
       $T->Set('query0_COSTO',  number_format($el['COSTO'],0,',','.'));   
       $T->Set('query0_TOTAL_COSTO',  number_format($el['COSTO'] + $el['G_ADMIN'],0,',','.')); 
       $z_gadmin += 0 + $el['G_ADMIN'];
       $z_costo += 0 + $el['COSTO'];
       $z_total_costo+= 0 + $el['COSTO'] + $el['G_ADMIN'];

    }else{
       $j++;
       $zj += 0 +$el['CANT_COMPRA'];
       $T->Set('query0_G_ADMIN','');    
       $T->Set('query0_REC','');
       $T->Set('query0_COSTO', '');
       $T->Set('query0_TOTAL_COSTO',''); 
    }
    $k++;

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
     $T->Set('query0_USUARIO', $el['USUARIO']);

    if($el['PADRE'] != $old['PADRE'] || $el['PADRE'] == '') {
       $T->Set('query0_PADRE', $el['PADRE']);
    }else{
      $T->Set('query0_PADRE', '&nbsp;&nbsp;&nbsp;&nbsp;"');
    }
    $T->Set('query0_CANT_COMPRA', number_format($el['CANT_COMPRA'],0,',','.'));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CANT_COMPRA += 0 + $el['CANT_COMPRA'];

    if($hijos == "No"){
        if($el['PADRE'] === ''){ // Es Padre
          $T->Show('query0_data_row');
        }        
    }else{
      $T->Show('query0_data_row');
    }
    // Show Subtotal
    $T->Set('subtotal0_CANT_COMPRA', number_format($subtotal0_CANT_COMPRA,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANT_COMPRA = 0;
    }
    
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
     $old['USUARIO'] = $el['USUARIO'];
    $old['PADRE'] = $el['PADRE'];
    $old['CANT_COMPRA'] = $el['CANT_COMPRA'];
    
    $old['IMP_EXP'] = $el['IMP_EXP'];
    $old['REC'] = $el['REC'];
    $old['FECHA'] = $el['FECHA'];
    $old['G_ADMIN'] = $el['G_ADMIN'];
    $old['COSTO'] = $el['COSTO'];
    $firstRow=false;

}

$endConsult = true;
if( $endConsult ){
     $T->Set('i', $i );
     $T->Set('j', $j );
     $T->Set('k', $k );
     $T->Set('zi', $zi );
     $T->Set('zj', $zj );
     $T->Set('z_lisos', $z_lisos );
     $T->Set('z_estamp', $z_estamp );
     $T->Set('z_costo', number_format($z_costo,0,',','.'));
     $T->Set('z_gadmin', number_format($z_gadmin,0,',','.'));
     $T->Set('z_total_costo', number_format($z_total_costo,0,',','.'));
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    
    
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

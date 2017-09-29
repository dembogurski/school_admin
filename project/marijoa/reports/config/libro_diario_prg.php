<?php

/** Report prg file (asiento_preview) 
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
$T->Set( 'sup___user', 'Developer');
$T->Set( 'sup_nro_as', '7');
$T->Set( 'sup_suc', '02');
$T->Set( 'sup_desde', '2012-08-27');
$T->Set( 'sup_gen_as', 'No');
$T->Set( 'sup_asientos_det', '');
$T->Set( 'sup_obs', 'Para registrar los aportes del Sr. Cesar Lara como nuevo socio de la Cía.');
$T->Set( 'sup___lock', '');
$T->Set( 'sup___change', '');
$T->Set( 'sup_as_preview', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT a.nro_as AS NRO, DATE_FORMAT(a.desde,"%d-%m-%Y")  AS FECHA,d.codigo AS REF, p.c_descrip AS DESCRIPCION, d.debe AS DEBE, d.haber AS HABER FROM asientos_cont a, asientos_det d, plan_cuentas p WHERE a.nro_as = d.nro_as AND d.codigo = p.c_cod AND a.nro_as = '7'  ORDER BY  a.fecha ASC, a.nro_as ASC ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

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
$subtotal0_DEBE = 0;
$subtotal0_HABER = 0;


//Define a Old Values Variables
$old['NRO'] = '';
$old['FECHA'] = '';
$old['REF'] = '';
$old['DESCRIPCION'] = '';
$old['DEBE'] = '';
$old['HABER'] = '';
$old['OBS'] = '';
$ZEBRA = 0;
// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['NRO'] = $Q0->Record['NRO'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['REF'] = $Q0->Record['REF'];
    $el['DESCRIPCION'] = $Q0->Record['DESCRIPCION'];
    $el['DEBE'] = $Q0->Record['DEBE'];
    $el['HABER'] = $Q0->Record['HABER'];
    $el['OBS'] = $Q0->Record['OBS'];
    
    if($old['NRO']!=$el['NRO']){ 
        if($old['NRO']!=''){
          $T->Set('query0_OBS', $old['OBS']); 
          $T->Show('obs');
          $ZEBRA++;  
        }          
        
        $T->Set('query0_NRO', $el['NRO']);
        $T->Set('query0_FECHA', $el['FECHA']);
        
    }else{
       $T->Set('query0_NRO', '&nbsp;'); 
       $T->Set('query0_FECHA', '&nbsp;');
       
    }
    
    $fondo = "white";
    if($ZEBRA%2){
        $fondo = "white";
    }else{
       $fondo = "#EEEEEE"; 
    }
    $T->Set('fondo', $fondo);
    
    
    //
    // 
    $espacio = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a)&nbsp;";
     
    $T->Set('query0_OBS', $el['OBS']);
    $T->Set('query0_REF', $el['REF']);
    
    if($el['DEBE'] > 0){
      $T->Set('query0_DESCRIPCION', $el['DESCRIPCION']);
      $T->Set('query0_DEBE', number_format($el['DEBE'],0,',','.'));
      $T->Set('query0_HABER', '&nbsp;');
    }else{
      $T->Set('query0_DESCRIPCION', $espacio.$el['DESCRIPCION']);  
      $T->Set('query0_DEBE', '&nbsp;');
      $T->Set('query0_HABER', number_format($el['HABER'],0,',','.'));
    }
     

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_DEBE += 0 + $el['DEBE'];
    $subtotal0_HABER += 0 + $el['HABER'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_DEBE', number_format($subtotal0_DEBE,0,',','.'));
    $T->Set('subtotal0_HABER', number_format($subtotal0_HABER,0,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_DEBE = 0;
        $subtotal0_HABER = 0;
    }
    
    //Actualize Old Values Variables
    $old['NRO'] = $el['NRO'];
    $old['FECHA'] = $el['FECHA'];
    $old['REF'] = $el['REF'];
    $old['DESCRIPCION'] = $el['DESCRIPCION'];
    $old['DEBE'] = $el['DEBE'];
    $old['HABER'] = $el['HABER'];
    $old['OBS'] = $el['OBS'];
    $firstRow=false;

}

$endConsult = true;
if( $endConsult ){
    $T->Set('query0_OBS', $old['OBS']); 
    $T->Show('obs');
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

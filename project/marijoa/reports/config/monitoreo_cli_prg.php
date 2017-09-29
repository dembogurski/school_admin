<?php

/** Report prg file (monitoreo_cli) 
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
$T->Set( 'sup_cli_fullname', '');
$T->Set( 'sup_cli_cat', '3');
$T->Set( 'sup_suc', '01');
$T->Set( 'sup_p_grupo', '%');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_desde', '2012-01-01');
$T->Set( 'sup_hasta', '2012-09-12');
$T->Set( 'sup_desdeinv', '2012-01-01');
$T->Set( 'sup_hastainv', '2012-09-12');
$T->Set( 'sup_tipo', 'Detallado');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_msg2', '( ! ) Aqui reporte de Estadisticas de Ventas de Clientes (Solo para Admin)!!! ');
$T->Set( 'sup_anioini', '');
$T->Set( 'sup_aniofin', '');
$T->Set( 'sup_gen_rep2', '');
$T->Set( 'sup_msg', 'Reporte de Vents Agrupado por Metros Solo responde a los Filtros de Cliente Fechas Categoria y Sucursal ');
$T->Set( 'sup_vent_group_cli', '');
$T->Set( 'sup_msg6', '( ! ) Aqui solo monitoreo de Clientes (Campos validos Fechas, Categoria, Suc Promedio)!!! ');
$T->Set( 'sup_prom', 'P_3-A');
$T->Set( 'sup_meses', '8');
$T->Set( 'sup_rep_monit', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT DATE_FORMAT(fact_fecha,"%m-%Y") AS MES,cli_fullname as CLIENTE,cli_ci AS CI, cli_cat as CAT, sum(df_cantidad) as MTS, sum(df_subtotal) as Z_MONTO, count(*) as CANT, "1" AS VECES FROM VENTAS_A_CLIENTES where fact_fecha BETWEEN '2012-01-01' and '2012-09-12' and cli_cat = '3' and  fact_localidad like '01' and cli_ci <> "1" GROUP BY cli_ci, MES order by cli_ci asc,MES asc  ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4); 

$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

$meses = $sup['meses'];
$anios = ceil($meses / 12);

$prom = $sup['prom'];
$cat = $sup['cli_cat'];

$T->Set("meses",$meses);
$T->Set("anios",$anios);


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
$subtotal0_MTS = 0;
$subtotal0_CANT = 0;
$subtotal0_VECES = 0;


//Define a Old Values Variables
$old['MES'] = '';
$old['CLIENTE'] = '';
$old['CI'] = '';
$old['CAT'] = '';
$old['MTS'] = '';
$old['Z_MONTO'] = '';
$old['CANT'] = '';
$old['VECES'] = '';

$min = 0;$p_min = 0;
$max = 0;$p_max = 0;

 if($prom == "N_X"){
            
 }else if($prom == "P_3-A"){
     $min = 1; $max = 4.99; $p_min = $meses * 1; $p_max = $meses * 4.99;        
 }else if($prom == "C_0-10"  || $prom == "T_0-10"){
     $min = 5; $max = 10;  $p_min = $meses * 5; $p_max = $meses * 10;
 }else if($prom == "C_10-29" || $prom == "T_10-29"){
     $min = 10; $max = 29;   $p_min = $meses * 10; $p_max = $meses * 29;                         
 }else if($prom == "C_30-99" || $prom == "T_30-99"){
     $min = 30; $max = 99;     $p_min = $meses * 30; $p_max = $meses * 99;         
 }else if($prom == "C_100-X" || $prom == "T_100-X"){
     $min = 100; $max = 10000;  $p_min = $meses * 100; $p_max = 100000;        
 }else{ // X
     $min = 0; $max = 100000;   $p_min = 0; $p_max = 100000;               
 }
 $T->Set('min',$min);
 $T->Set('max',$max);
 $T->Set('cat',$cat);

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['MES'] = $Q0->Record['MES'];
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['CI'] = $Q0->Record['CI'];
    $el['CAT'] = $Q0->Record['CAT'];
    $el['MTS'] = $Q0->Record['MTS'];
    $el['Z_MONTO'] = $Q0->Record['Z_MONTO'];
    $el['CANT'] = $Q0->Record['CANT'];
    $el['VECES'] = $Q0->Record['VECES'];
    if( $old['CI'] != $el['CI'] && $old['CI'] !='' ){
         
        if($prom == "P_3-A"){
           if($subtotal0_CANT > $anios * 3){
             $T->Set('prom_metraje',"Dentro del Rango 3 Veces al a&ntilde;o <img src='images/ok.png' border='0'" );    
           }else{
             $T->Set('prom_metraje',"Fuera del Rango 3 Veces al a&ntilde;o <img src='images/baja.png' border='0'" );      
           } 
        }else{        
            if($subtotal0_MTS >= $p_min   && $subtotal0_CANT <= $p_max){
                $T->Set('prom_metraje',"Dentro del Rango de Mts. ($p_min-$p_max) <img src='images/ok.png' border='0'" );     
            }else{
                if($subtotal0_MTS > $p_max){
                $T->Set('prom_metraje',"Fuera de Rango de Mts. ($p_min-$p_max) <img src='images/alsa.png' border='0'" );     
                }else{
                $T->Set('prom_metraje',"Fuera de Rango de Mts. ($p_min-$p_max) <img src='images/baja.png' border='0'" );   
                }   

            }        
        }
   
        
        $T->Show('query0_subtotal_row'); 
        //Reset a Subtotal Variables
        $subtotal0_MTS = 0;
        $subtotal0_CANT = 0;
        $subtotal0_VECES = 0;
    }
    $mts = $el['MTS'];
    
    if($mts >= $min && $mts <=$max){
      $T->Set('range','<img src="images/alsa.png" border="0"' );   
    }else if($mts > $max){
      $T->Set('range', '<img src="images/alsa.png" border="0"' );  
    } else{
      $T->Set('range', '<img src="images/baja.png" border="0"' );    
    }   
    // Preparing a template variables
    $T->Set('query0_MES', $el['MES']);
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_CI', $el['CI']);
    $T->Set('query0_CAT', $el['CAT']);
    $T->Set('query0_MTS', number_format($el['MTS'],0,',','.'));
    $T->Set('query0_Z_MONTO', $el['Z_MONTO']);
    $T->Set('query0_CANT', number_format($el['CANT'],0,',','.'));
    $T->Set('query0_VECES', number_format($el['VECES'],0,',','.'));
    
    $T->Set('ruc', str_replace("*","",$el['CI']));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_MTS += 0 + $el['MTS'];
    $subtotal0_CANT += 0 + $el['CANT'];
    $subtotal0_VECES += 0 + $el['VECES'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_MTS', number_format($subtotal0_MTS,0,',','.'));
    $T->Set('subtotal0_CANT', number_format($subtotal0_CANT,0,',','.'));
    $categ = $el['CAT'];
    $veces = "<b>Cat:</b> $categ <b> &nbsp;Compras  </b> ".$subtotal0_VECES." / ".$meses."";
    $T->Set('subtotal0_VECES', $veces );
    
    //Actualize Old Values Variables
    $old['MES'] = $el['MES'];
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['CI'] = $el['CI'];
    $old['CAT'] = $el['CAT'];
    $old['MTS'] = $el['MTS'];
    $old['Z_MONTO'] = $el['Z_MONTO'];
    $old['CANT'] = $el['CANT'];
    $old['VECES'] = $el['VECES'];
    $firstRow=false;

}

$endConsult = true;
if( $old['CI'] != $el['CI'] ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_subtotal_row');
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

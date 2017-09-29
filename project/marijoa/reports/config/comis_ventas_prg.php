<?php

/** Report prg file (comis_ventas) 
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
$T->Set( 'sup_desde', '2014-01-01');
$T->Set( 'sup_hasta', '2014-07-15');
$T->Set( 'sup_sue_buscar_func', '');
$T->Set( 'sup_sue_cod_func', '');
$T->Set( 'sup_cat', '');
$T->Set( 'sup_antiguedad', '');
$T->Set( 'sup_antig_x_pri_fac', '');
$T->Set( 'sup_func_cat', 'MINORISTA JUNIOR 1');
$T->Set( 'sup_rep', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT f.fact_vend_cod AS Vendedor,f.fact_cli_cat AS Cat,p_fam,p_grupo,p_tipo,p_precio_1 AS P1, fact_localidad AS Suc,  SUM( df_cantidad) AS Unidades   FROM factura f,det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num AND f.fact_estado = "Cerrada"  AND f.fact_fecha BETWEEN '2014-01-01' AND '2014-07-15' AND d.df_cod_prod =  p.p_cod AND ((p_fam LIKE "HOGAR" AND  p_grupo LIKE "SABANAS HECHAS"  AND p_tipo LIKE "300 HILOS SATINADA%") OR  (p_fam LIKE "HOGAR" AND  p_grupo LIKE "TOALLAS"  AND p_tipo LIKE "PARA EL CUERPO" AND p_compra = 12925.00) OR  (p_fam LIKE "HOGAR" AND  p_grupo LIKE "TOALLAS"  AND p_tipo LIKE "PARA EL CUERPO" AND p_compra = 18800.00) OR  (p_fam LIKE "HOGAR" AND  p_grupo LIKE "COBERTORES"  AND p_tipo LIKE "JUEGO DE EDREDONES Y FUNDAS%") )GROUP BY Cat,p_fam,p_grupo,p_tipo, P1, Vendedor ORDER BY Vendedor ASC, Cat ASC   ";

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
$total0_Unidades = 0;

//Define a Subtotal Variables
$subtotal0_Unidades = 0;
$total_subtotal = 0;

$total = 0;


//Define a Old Values Variables
$old['Vendedor'] = '';
$old['Cat'] = '';
$old['p_fam'] = '';
$old['p_grupo'] = '';
$old['p_tipo'] = '';
$old['P1'] = '';
$old['Suc'] = '';
$old['Unidades'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['Vendedor'] = $Q0->Record['Vendedor'];
    $el['Cat'] = $Q0->Record['Cat'];
    $el['p_fam'] = $Q0->Record['p_fam'];
    $el['p_grupo'] = $Q0->Record['p_grupo'];
    $el['p_tipo'] = $Q0->Record['p_tipo'];
    $el['P1'] = $Q0->Record['P1'];
    $el['Suc'] = $Q0->Record['Suc'];
    $el['Unidades'] = $Q0->Record['Unidades'];
    
    if( $el['Vendedor']!=$old['Vendedor'] && $old['Vendedor'] !=''){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_Unidades = 0;
        $total_subtotal = 0;
    }

    // Preparing a template variables
    $T->Set('query0_Vendedor', $el['Vendedor']);
    $T->Set('query0_Cat', $el['Cat']);
    $T->Set('query0_p_fam', $el['p_fam']);
    $T->Set('query0_p_grupo', $el['p_grupo']);
    $T->Set('query0_p_tipo', $el['p_tipo']);
    $T->Set('query0_P1', $el['P1']);
    $T->Set('query0_Suc', $el['Suc']);
    $T->Set('query0_Unidades', number_format($el['Unidades'],0,',','.'));
     
    $s = $el['p_fam'];    $g =  $el['p_grupo'];     $t = $el['p_tipo']; $cat = $el['Cat']; $unidades = $el['Unidades'];  $p_compra = $el['P1'];
    
    
    
    $pos = strpos( $t, "300 HILOS SATINADA");
    $multiplicador = 0;
    $subtotal = 0;
    if($s == "HOGAR" && $g == "SABANAS HECHAS" &&  $pos!== false  ){
        if($cat < 4){
             $multiplicador = 4000;
        }else{
             $multiplicador = 2000;
        }
    } 
    
    $pos = strpos( $t, "JUEGO DE EDREDONES Y FUNDAS");
    if($s == "HOGAR" && $g == "COBERTORES" &&  $pos!== false  ){
        if($cat < 4){
             $multiplicador = 2500;
        }else{
             $multiplicador = 1250;
        }
    } 
    
    if($s == "HOGAR" && $g == "TOALLAS" && $t == "PARA EL CUERPO" && $p_compra == 12925.00 ){
        if($cat < 4){
             $multiplicador = 1000;
        }else{
             $multiplicador = 500;
        }
    } 
    if($s == "HOGAR" && $g == "TOALLAS" && $t == "PARA EL CUERPO" && $p_compra == 18800.00 ){
        if($cat < 4){
             $multiplicador = 1500;
        }else{
             $multiplicador = 750;
        }
    }     
    
    
    $subtotal = $unidades * $multiplicador;
    $total_subtotal += 0 + $subtotal;
    $total+= 0 + $subtotal;
    $T->Set('mult', number_format($multiplicador,0,',','.'));
    $T->Set('subtotal', number_format($subtotal,0,',','.'));
    $T->Set('total_subtotal', number_format($total_subtotal,0,',','.'));
    $T->Set('total', number_format($total,0,',','.'));
    
    

    // Calculating a total
    $total0_Unidades += 0 + $el['Unidades'];

    // Calculating a subtotal
    $subtotal0_Unidades += 0 + $el['Unidades'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_Unidades', number_format($subtotal0_Unidades,0,',','.'));

    
    //Actualize Old Values Variables
    $old['Vendedor'] = $el['Vendedor'];
    $old['Cat'] = $el['Cat'];
    $old['p_fam'] = $el['p_fam'];
    $old['p_grupo'] = $el['p_grupo'];
    $old['p_tipo'] = $el['p_tipo'];
    $old['P1'] = $el['P1'];
    $old['Suc'] = $el['Suc'];
    $old['Unidades'] = $el['Unidades'];
    $firstRow=false;

}

$endConsult = true;
if( $el['Vendedor']!=$old['Vendedor'] ){
    $T->Show('query0_subtotal_row');
}
// Show total
$T->Set('total0_Unidades', number_format($total0_Unidades,0,',','.'));

if( endConsult ){
     $T->Show('query0_subtotal_row');
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

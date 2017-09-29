<?php

/** Report prg file (ventas_x_vend) 
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
$T->Set( 'sup_busc_func', 'nata');
$T->Set( 'sup___user', 'natalialacy');
$T->Set( 'sup_func_nombre', 'Lacy Arzamendia, Natalia Elena');
$T->Set( 'sup_cli_cat', '%');
$T->Set( 'sup_p_grupo', '%');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_desde', '2011-07-07');
$T->Set( 'sup_hasta', '2011-08-16');
$T->Set( 'sup_desdeinv', '2011-07-07');
$T->Set( 'sup_hastainv', '2011-08-16');
$T->Set( 'sup_gen_rep', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT  f.fact_nro  AS NRO, DATE_FORMAT(f.fact_fecha,"%d-%m-%Y") AS FECHA ,fact_cli_cat AS CAT,d.df_cod_prod AS CODIGO, d.df_precio AS PRECIO, p.p_grupo AS GRUPO,p.p_tipo AS TIPO,d.df_cantidad AS CANTIDAD, d.df_subtotal AS SUBTOTAL FROM factura f, det_factura d,mnt_prod p WHERE f.fact_fecha BETWEEN '2011-07-07' AND '2011-08-16'  AND f.fact_vend_cod LIKE 'natalialacy'  AND f.fact_nro = d.df_fact_num AND  d.df_cod_prod = p.p_cod AND  p.p_grupo LIKE '%'  AND p.p_tipo LIKE  '%' ORDER BY p.p_grupo,p.p_tipo ASC";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );


$data_ini = substr($sup['desde'],8,2).'-'.
			substr($sup['desde'],5,2).'-'.
			substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.
			substr($sup['hasta'],5,2).'-'.
			substr($sup['hasta'],0,4);
$T->Set('data_ini',$data_ini);
$T->Set('data_fin',$data_fin);

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables
$total0_CANTIDAD = 0;
$total0_SUBTOTAL = 0;

//Define a Subtotal Variables
$subtotal0_CANTIDAD = 0;
$subtotal0_SUBTOTAL = 0;


//Define a Old Values Variables
$old['NRO'] = '';
$old['FECHA'] = '';
$old['CLIENTE'] = '';
$old['CAT'] = '';
$old['CODIGO'] = '';
$old['PRECIO'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['CANTIDAD'] = '';
$old['SUBTOTAL'] = '';

$i = 0;

$RANGO1 = 0;
$RANGO2 = 0;
$RANGO3 = 0;
$RANGO4 = 0;
$RANGO5 = 0;
$P_MIN5 = 0;
$P_MIN8 = 0;

$ZM1 = 0;
$ZM2 = 0;
$ZM3 = 0;
$ZM4 = 0;
$ZM5 = 0;
$ZM6 = 0;
$ZM7 = 0;
 
// Making a rows of consult
while( $Q0->NextRecord() ){
  
    // Define a elements
    $el['NRO'] = $Q0->Record['NRO'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['CAT'] = $Q0->Record['CAT'];
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['PRECIO'] = $Q0->Record['PRECIO'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $el['SUBTOTAL'] = $Q0->Record['SUBTOTAL'];
    if( ($el['NRO']!=$old['NRO']) ){
	    $i++;
        $c = $subtotal0_CANTIDAD ;
        if( $c <= 4  ){
            $RANGO1++;  $ZM1 += 0 + $subtotal0_CANTIDAD;
        }else if($c > 4 && $c < 10){
            $RANGO2++;  $ZM2 += 0 + $subtotal0_CANTIDAD;
        }else if($c > 9.9 && $c < 30){
            $RANGO3++;  $ZM3 += 0 + $subtotal0_CANTIDAD;
        }else if($c > 29.9 && $c < 100){
            $RANGO4++;   $ZM4 += 0 + $subtotal0_CANTIDAD;
        }else if($c > 99.9 && $c < 300){
            $RANGO5++;   $ZM5 += 0 + $subtotal0_CANTIDAD;
        }else if($c > 299.9 && $c < 500){
            $P_MIN5++;  $ZM6 += 0 + $subtotal0_CANTIDAD;
        }else if($c > 499.9 ){
            $P_MIN8++;  $ZM7 += 0 + $subtotal0_CANTIDAD;
        }

        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANTIDAD = 0;
        $subtotal0_SUBTOTAL = 0;
    }

    // Preparing a template variables
    $T->Set('query0_NRO', $el['NRO']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_CAT', $el['CAT']);
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_PRECIO',number_format( $el['PRECIO'] ,0,',','.'));
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_CANTIDAD', number_format($el['CANTIDAD'],2,',','.'));
    $T->Set('query0_SUBTOTAL', number_format($el['SUBTOTAL'],2,',','.'));

    // Calculating a total
    $total0_CANTIDAD += 0 + $el['CANTIDAD'];
    $total0_SUBTOTAL += 0 + $el['SUBTOTAL'];

    // Calculating a subtotal
    $subtotal0_CANTIDAD += 0 + $el['CANTIDAD'];
    $subtotal0_SUBTOTAL += 0 + $el['SUBTOTAL'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANTIDAD', number_format($subtotal0_CANTIDAD,2,',','.'));
    $T->Set('subtotal0_SUBTOTAL', number_format($subtotal0_SUBTOTAL,2,',','.'));
    
    //Actualize Old Values Variables
    $old['NRO'] = $el['NRO'];
    $old['FECHA'] = $el['FECHA'];
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['CAT'] = $el['CAT'];
    $old['CODIGO'] = $el['CODIGO'];
    $old['PRECIO'] = $el['PRECIO'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['SUBTOTAL'] = $el['SUBTOTAL'];
    $firstRow=false;

}

$endConsult = true;
if( ($el['NRO']!=$old['NRO'])  ){

    $T->Show('query0_subtotal_row');
}
// Show total
$T->Set('total0_CANTIDAD', number_format($total0_CANTIDAD,2,',','.'));
$T->Set('total0_SUBTOTAL', number_format($total0_SUBTOTAL,2,',','.'));
if( true ){
    $T->Set('cant', $i);
    $T->Show('query0_subtotal_row');

        $c = $subtotal0_CANTIDAD ;
        if( $c <= 4  ){
            $RANGO1++;  $ZM1 += 0 + $subtotal0_CANTIDAD;
        }else if($c > 4 && $c < 10){
            $RANGO2++;  $ZM2 += 0 + $subtotal0_CANTIDAD;
        }else if($c > 9.9 && $c < 30){
            $RANGO3++;  $ZM3 += 0 + $subtotal0_CANTIDAD;
        }else if($c > 29.9 && $c < 100){
            $RANGO4++;   $ZM4 += 0 + $subtotal0_CANTIDAD;
        }else if($c > 99.9 && $c < 300){
            $RANGO5++;   $ZM5 += 0 + $subtotal0_CANTIDAD;
        }else if($c > 299.9 && $c < 500){
            $P_MIN5++;  $ZM6 += 0 + $subtotal0_CANTIDAD;
        }else if($c > 499.9 ){
            $P_MIN8++;  $ZM7 += 0 + $subtotal0_CANTIDAD;
        }

    $T->Set('r1', $RANGO1);
    $T->Set('r2', $RANGO2);
    $T->Set('r3', $RANGO3);
    $T->Set('r4', $RANGO4);
    $T->Set('r5', $RANGO5);
    $T->Set('p5', $P_MIN5);
    $T->Set('p8', $P_MIN8);

    $T->Set('Z1', $ZM1);
    $T->Set('Z2', $ZM2);
    $T->Set('Z3', $ZM3);
    $T->Set('Z4', $ZM4);
    $T->Set('Z5', $ZM5);
    $T->Set('Z6', $ZM6);
    $T->Set('Z7', $ZM7);

    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

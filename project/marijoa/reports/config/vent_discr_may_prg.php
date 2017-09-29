<?php

/** Report prg file (vent_discr_may) 
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
$T->Set( 'sup_empr', '%');
$T->Set( 'sup_desde', '2013-10-14');
$T->Set( 'sup_hasta', '2013-10-14');
$T->Set( 'sup_tipo', '%');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup___rep', '');
 * 
 * */
 
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT f.fact_nro AS NRO,f.fact_nom_cli AS CLIENTE, f.fact_cli_ci AS RUC, f.fact_cli_cat AS CAT,date_format(f.fact_fecha,"%d-%m-%Y")AS FECHA, f.fact_vend_cod AS VENDEDOR, a.x1_ AS TIPO  FROM factura f, _audit_log_ a WHERE f.fact_nro = a.x0_ AND a.x1_ LIKE '%' AND f.fact_fecha BETWEEN '2013-10-14' AND '2013-10-14' AND f.fact_estado = "Cerrada" AND f.fact_localidad LIKE '%' AND accion LIKE "VENT_DISCR"  ORDER BY f.fact_nro ASC, f.fact_nom_cli ASC ";

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
$old['NRO'] = '';
$old['CLIENTE'] = '';
$old['RUC'] = '';
$old['CAT'] = '';
$old['FECHA'] = '';
$old['VENDEDOR'] = '';
$old['TIPO'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['NRO'] = $Q0->Record['NRO'];
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['RUC'] = $Q0->Record['RUC'];
    $el['CAT'] = $Q0->Record['CAT'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['VENDEDOR'] = $Q0->Record['VENDEDOR'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $factura = $el['NRO']; 
    
    if($el['TIPO'] == "Mayoristas"){
        $T->Set("tipo","#FF623A ");
    }else{
        $T->Set("tipo","#F2F75C");
    }
    
    // Preparing a template variables
    $T->Set('query0_NRO', $el['NRO']);
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_RUC', $el['RUC']);
    $T->Set('query0_CAT', $el['CAT']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_VENDEDOR', $el['VENDEDOR']);
    $T->Set('query0_TIPO', $el['TIPO']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');

    // Detalle
    
    $db->Query("SELECT p_cod,p_fam,p_grupo,p_tipo,p_color,p_descri, p_valmin,p_compra + (p_compra * p_porc_recargo / 100) as costo,p_precio_1,p_precio_2,p_precio_3,p_precio_4,p_precio_5,p_precio_6,p_precio_7,
    df_precio,df_cantidad,df_subtotal,  (( df_precio - p_valmin) * 100) / p_valmin  as porc_sobre_minimo  
    FROM det_factura d, mnt_prod p WHERE d.df_cod_prod = p.p_cod and df_fact_num = $factura and df_cod_prod <> '000' and df_cod_prod <> '1000'  and df_cod_prod <> '1001' and df_cod_prod <> '1002'  " );

    $T->Show('cab_detalle'); 
    
    $total_cant = 0;
    $total_venta = 0;
	$total_ganancia = 0;
    
    while( $db->NextRecord() ){
        $cod =   $db->Record['p_cod'];
        $fam =   $db->Record['p_fam'];
        $gru =   $db->Record['p_grupo'];
        $tipo =  $db->Record['p_tipo'];
        $color = $db->Record['p_color'];
        $descrip=$db->Record['p_descri'];
        $valmin =number_format( $db->Record['p_valmin'],0,',','.');    
        $costo = $db->Record['costo'];    
        $p1 =   number_format(  $db->Record['p_precio_1'],0,',','.');    
        $p2 =   number_format(  $db->Record['p_precio_2'],0,',','.');    
        $p3 =   number_format(  $db->Record['p_precio_3'],0,',','.');    
        $p4 =   number_format(  $db->Record['p_precio_4'],0,',','.');    
        $p5 =   number_format(  $db->Record['p_precio_5'],0,',','.');    
        $p6 =   number_format(  $db->Record['p_precio_6'],0,',','.');    
        $p7 =   number_format(  $db->Record['p_precio_7'],0,',','.');    
        $precio_venta =   number_format(   $db->Record['df_precio'],0,',','.');    
        $df_cantidad =    $db->Record['df_cantidad'];    
        $df_subtotal =    $db->Record['df_subtotal'];           
        $porc = number_format( $db->Record['porc_sobre_minimo'],1,',','.');    
        
        // Margen  
        $margen =  (($df_subtotal - ($costo * $df_cantidad))  * 100) /  ($costo * $df_cantidad);
		
		$margen_valor =  $df_subtotal -  ($costo * $df_cantidad);
		
        
        $total_cant += 0+$df_cantidad;
        $total_venta+= 0+$df_subtotal;
		$total_ganancia += 0+$margen_valor;
        
        $T->Set('cod', $cod);
        $T->Set('descrip', "$fam-$gru-$tipo-$color-$descrip");
        $T->Set('valmin', $valmin);
        $T->Set('costo', number_format( $costo,0,',','.'));
        $T->Set('p1', $p1);
        $T->Set('p2', $p2);
        $T->Set('p3', $p3);
        $T->Set('p4', $p4);
        $T->Set('p5', $p5);
        $T->Set('p6', $p6);
        $T->Set('p7', $p7);
        
        $T->Set('precio_venta', $precio_venta);
        $T->Set('cant',  number_format( $df_cantidad  ,2,',','.'));
        $T->Set('subtotal',  number_format(   $df_subtotal,2,',','.'));
        if($porc > 0){
           $T->Set('porc', "+$porc");
        }else if($porc < 0){
            $T->Set('porc', "-$porc");
        }else{
            $T->Set('porc', "$porc"); 
        }
        $T->Set('gan',  number_format( $margen,1,',','.'));    
		$T->Set('val_gan',  number_format( $margen_valor,0,',','.'));  
		
        $T->Show('detalle');         	
    }
    $T->Set('total_cant',  number_format( $total_cant,2,',','.'));    
    $T->Set('total_venta',  number_format( $total_venta,0,',','.'));    
    $T->Set('total_ganancia',  number_format( $total_ganancia,0,',','.'));    

    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['NRO'] = $el['NRO'];
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['RUC'] = $el['RUC'];
    $old['CAT'] = $el['CAT'];
    $old['FECHA'] = $el['FECHA'];
    $old['VENDEDOR'] = $el['VENDEDOR'];
    $old['TIPO'] = $el['TIPO'];
    $firstRow=false;

}

$endConsult = true;
 
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

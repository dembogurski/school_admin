<?php

/** Report prg file (porc_ventas_func) 
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
$T->Set( 'sup_busc_func', '');
$T->Set( 'sup___user', '');
$T->Set( 'sup_func_nombre', '');
$T->Set( 'sup_desde', '2011-09-30');
$T->Set( 'sup_hasta', '2011-12-30');
$T->Set( 'sup_estado', 'Cerrada');
$T->Set( 'sup_gen', '');
$T->Set( 'sup_rep_hoy', '');
$T->Set( 'sup_rep_porc_ventas', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT DISTINCT fact_vend_cod AS VENDEDOR, func_nombre as NOMBRE  FROM factura WHERE fact_fecha BETWEEN '2011-09-30' AND '2011-12-30'  AND  fact_localidad = '02' AND fact_estado = "Cerrada" ORDER BY fact_vend_cod ASC ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

$desde = $sup['desde'];
$hasta = $sup['hasta'];
$suc = $sup['__local'];


$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);
$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables



$db = new Y_DB();
$db->Database = $Global['project'];


//Define a Subtotal Variables


//Define a Old Values Variables
$old['VENDEDOR'] = '';
$old['NOMBRE'] = '';
$Z_CONTADO = 0;
$Z_11 = 0;
 
$Z_MONTO_DEVOLUCION = 0;
$Z_NETO = 0;
$Z_DESCUENTO = 0;


// Making a rows of consult
$i = 0;
while( $Q0->NextRecord() ){
   $i++;

    if($i%2 > 0){
       $T->Set('tr', 'odd');
    }else{
       $T->Set('tr', 'even');
    }
    // Define a elements
    $el['VENDEDOR'] = $Q0->Record['VENDEDOR'];
    $el['NOMBRE'] = $Q0->Record['NOMBRE'];
    $vendedor = $el['VENDEDOR'];
    // Preparing a template variables
    $T->Set('query0_VENDEDOR', $el['VENDEDOR']);
    $T->Set('query0_NOMBRE', $el['NOMBRE']);

    /*// Calculating a total
    $db->Query("SELECT SUM(d.df_subtotal) AS TOTAL FROM factura  f, det_factura d WHERE f.fact_nro = d.df_fact_num AND
    f.fact_vend_cod LIKE '$vendedor' AND f.fact_localidad = '$suc'
                AND f.fact_fecha  BETWEEN '$desde' AND '$hasta' AND f.fact_estado =  'Cerrada' AND (d.df_cod_prod NOT LIKE '%11' and  d.df_cod_prod NOT LIKE '%12' and d.df_cod_prod <> '1000' and d.df_cod_prod <> '1001')");
    $db->NextRecord();
    $TOTAL = $db->Record['TOTAL'];
    $T->Set('TOTAL', number_format($TOTAL,0,',','.'));
    $Z_CONTADO += 0 + $TOTAL; */

  

    // 11
    $db->Query("SELECT SUM(d.df_subtotal) AS TOTAL_11 FROM factura  f, det_factura d WHERE f.fact_nro = d.df_fact_num AND
    f.fact_vend_cod LIKE '$vendedor' AND f.fact_localidad = '$suc'
                AND f.fact_fecha  BETWEEN '$desde' AND '$hasta' AND f.fact_estado =  'Cerrada'  AND (d.df_cod_prod LIKE '%14' or d.df_cod_prod LIKE '%15' or d.df_cod_prod LIKE '%16' and d.df_cod_prod <> '1000' and d.df_cod_prod <> '1001' and d.df_cod_prod <> '1002'  and d.df_cod_prod <> '000')
				");
    $db->NextRecord();
    $TOTAL_11 = $db->Record['TOTAL_11'];
    $T->Set('TOTAL_11', number_format($TOTAL_11,0,',','.'));
    $Z_11 += 0 + $TOTAL_11;
    
    // Oferta
    $db->Query("SELECT SUM(d.df_subtotal) AS OFERTA FROM factura  f, det_factura d WHERE f.fact_nro = d.df_fact_num AND
    f.fact_vend_cod LIKE '$vendedor' AND f.fact_localidad = '$suc'
                AND f.fact_fecha  BETWEEN '$desde' AND '$hasta' AND f.fact_estado =  'Cerrada'  AND  (d.df_cod_prod NOT LIKE '%14' and d.df_cod_prod NOT LIKE '%15' and d.df_cod_prod NOT LIKE '%16' and d.df_cod_prod <> '1000' and d.df_cod_prod <> '1001' and d.df_cod_prod <> '1002'  and d.df_cod_prod <> '000' ) ");
    $db->NextRecord();
    $OFERTA = $db->Record['OFERTA'];
    $T->Set('OFERTA', number_format($OFERTA,0,',','.'));
    $Z_OFERTA += 0 + $OFERTA;

      
    
    $TOTAL = 0 + $TOTAL_11 +  $OFERTA;
    $T->Set('TOTAL', number_format($TOTAL,0,',','.'));
    $Z_CONTADO += 0 + $TOTAL; 
    
    $PORC_PARCIAL = ($OFERTA * 100) / $TOTAL;
    $T->Set('PORC_OFERTA', number_format($PORC_PARCIAL,0,',','.'));
    
    
    // Descuento
    $db->Query("SELECT SUM(d.df_subtotal) AS DESCUENTO FROM factura  f, det_factura d WHERE f.fact_nro = d.df_fact_num AND
    f.fact_vend_cod LIKE '$vendedor' AND f.fact_localidad = '$suc'
                AND f.fact_fecha  BETWEEN '$desde' AND '$hasta' AND f.fact_estado =  'Cerrada'  AND (d.df_cod_prod LIKE '1000' or  d.df_cod_prod LIKE '1001')");
    $db->NextRecord();
    $DESCUENTO = $db->Record['DESCUENTO'];
    $T->Set('DESCUENTO', number_format($DESCUENTO,0,',','.'));
    $Z_DESCUENTO += 0 + $DESCUENTO;

    
    
    
        // Devoluciones
    $db->Query("SELECT SUM(d.monto_dev) AS MONTO_DEVOLUCION FROM devoluciones d, factura f WHERE f.fact_nro = d.fact_nro AND  forma LIKE 'Efectivo' AND dv_hoy  BETWEEN '$desde' AND '$hasta' AND f.fact_vend_cod LIKE '$vendedor'");
    $db->NextRecord();
    $MONTO_DEVOLUCION = $db->Record['MONTO_DEVOLUCION'];
    $T->Set('MONTO_DEVOLUCION', number_format($MONTO_DEVOLUCION,0,',','.'));
    $Z_MONTO_DEVOLUCION +=0+$MONTO_DEVOLUCION;

    $NETO = 0 + $TOTAL - $MONTO_DEVOLUCION; // + $DESCUENTO;
    $T->Set('NETO', number_format($NETO,0,',','.'));


    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['VENDEDOR'] = $el['VENDEDOR'];
    $old['NOMBRE'] = $el['NOMBRE'];
    $firstRow=false;

}

$endConsult = true;
if( true ){
    $T->Set('Z_CONTADO', number_format($Z_CONTADO,0,',','.'));
    $T->Set('Z_11', number_format($Z_11,0,',','.'));
    $T->Set('Z_OFERTA', number_format($Z_OFERTA,0,',','.'));
    if($Z_CONTADO == 0){
       $Z_CONTADO = 1;  
    }
    $Z_PORC =  ($Z_OFERTA * 100) / $Z_CONTADO;
    $T->Set('Z_PORC', number_format($Z_PORC,0,',','.'));
    $T->Set('Z_DEV', number_format($Z_MONTO_DEVOLUCION,0,',','.'));

    $Z_NETO =0+ $Z_CONTADO - $Z_MONTO_DEVOLUCION ;//+  $Z_DESCUENTO ;
    $T->Set('Z_NETO', number_format($Z_NETO,0,',','.'));
    $T->Set('Z_DESCUENTO', number_format($Z_DESCUENTO,0,',','.'));

    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

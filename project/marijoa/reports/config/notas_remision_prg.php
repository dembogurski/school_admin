<?php

/** Report prg file (notas_remision) 
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
$T->Set( 'sup_desde', '2011-07-01');
$T->Set( 'sup_hasta', '2011-08-01');
$T->Set( 'sup_suco', '06');
$T->Set( 'sup_sucd', '01');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup___lock', 'true');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT r.rem_nro AS NRO, r.rem_fecha AS FECHA, d.df_cod_prod AS CODIGO, d.df_descrip AS DESCRIP, d.df_disponible AS CANTIDAD      FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND r.rem_origen = '06'  AND r.rem_destino = '01'  AND r.rem_fecha BETWEEN '2011-07-01' AND '2011-08-01'  AND r.rem_estado = "Cerrada" ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$detallado = $sup['detallado'];
$detalle_ventas = $sup['detalle_ventas']; 

  if($detallado == 'Si'){
     $T->Set('CODIGO_CANTIDAD','CODIGO');
  }else{
    $T->Set('CODIGO_CANTIDAD','CANTIDAD PIEZAS');
  }

$desde = $sup['desde'];
$hasta = $sup['ventas_hasta']; 
  
$data_ini = substr($sup['desde'],8,2).'-'.
			substr($sup['desde'],5,2).'-'.
			substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.
			substr($sup['hasta'],5,2).'-'.
			substr($sup['hasta'],0,4);
$T->Set('data_ini',$data_ini);
$T->Set('data_fin',$data_fin);

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
$total0_CANTIDAD = 0;

//Define a Subtotal Variables
$subtotal0_CANTIDAD = 0;


$Z_CANT_VENDIDA = 0;


//Define a Old Values Variables
$old['NRO'] = '';
$old['FECHA'] = '';
$old['CODIGO'] = '';
$old['DESCRIP'] = '';
$old['CANTIDAD'] = '';

$old['RECIBIDO'] = '';

$semitot = 0;
$TOTAL = 0;

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['NRO'] = $Q0->Record['NRO'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['DESCRIP'] = $Q0->Record['DESCRIP'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
     $el['RECIBIDO'] = $Q0->Record['RECIBIDO'];
    if( $old['NRO']!=$el['NRO'] ){
        if($old['NRO']!=''){
          $T->Show('query0_subtotal_row');
        }
        //Reset a Subtotal Variables
        $subtotal0_CANTIDAD = 0;
        $semitot = 0;
    }

    // Preparing a template variables
    $T->Set('query0_NRO', $el['NRO']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_DESCRIP', $el['DESCRIP']);
    if($el['RECIBIDO'] === 'Recibido'){
      $T->Set('query0_RECIBIDO','x');
    }else{
      $T->Set('query0_RECIBIDO', '');
    }
    $T->Set('query0_CANTIDAD', number_format($el['CANTIDAD'],2,',','.'));

    $semitot++;
    $TOTAL++;
    $T->Set('semitot', number_format($semitot,0,',','.'));
     $T->Set('total', number_format($TOTAL,0,',','.'));
    // Calculating a total
    $total0_CANTIDAD += 0 + $el['CANTIDAD'];

    // Calculating a subtotal
    $subtotal0_CANTIDAD += 0 + $el['CANTIDAD'];

   if($detallado == 'Si'){
     $T->Set('_query0_NRO', '');
     $T->Set('_query0_FECHA', '');
     $T->Show('query0_data_row');
     if($detalle_ventas == 'Si'){
        $codigo = $el['CODIGO'];
        $cant_pedida = $el['CANTIDAD'];

        $Q = new Y_DB();
        $Q->Database = $Global['project'];
        $codigo = $el['CODIGO'];
        $Q->Query("SELECT date_format(fact_fecha,'%d-%M') as fecha, df_descrip, df_precio, df_cantidad, df_subtotal, fact_nro, df_estado 
		FROM venta_detalle WHERE fact_fecha BETWEEN '$desde' AND '$hasta' 
		AND  df_cod_prod = '$codigo' AND  df_estado = 'Procesado' ORDER BY fact_fecha ASC;");

        if($Q->NumRows() > 0){
            $T->Show("ventas_cab");
        }
        $Z_SUBTOTAL = 0;
        $Z_CANTIDAD = 0;
        while ( $Q->NextRecord() ){
		    $fecha = $Q->Record['fecha'];
            $df_fact_num = $Q->Record['df_fact_num'];
            $precio = $Q->Record['df_precio'];
            $df_cantidad = $Q->Record['df_cantidad'];
            $df_subtotal = $Q->Record['df_subtotal'];

            $Z_CANT_VENDIDA +=0 + $df_cantidad;
            $T->Set("df_fact_num",$df_fact_num);
			$T->Set("fecha",$fecha);
            $T->Set("precio", number_format($precio,2,',','.'));
            $T->Set("df_cantidad",number_format($df_cantidad,2,',','.'));
            $T->Set("df_subtotal",number_format($df_subtotal,2,',','.'));
            $T->Show("ventas");
            $Z_CANTIDAD += 0 + $df_cantidad;
            $Z_SUBTOTAL += 0 + $df_subtotal;
        }
        if( $Z_SUBTOTAL > 0 ){
            $T->Set("Z_CANTIDAD",number_format($Z_CANTIDAD,2,',','.'));
            $T->Set("Z_SUBTOTAL",number_format($Z_SUBTOTAL,2,',','.'));

            $porc_ventas =  $Z_CANTIDAD * 100 / $cant_pedida;
            $T->Set("porc_ventas",number_format($porc_ventas,2,',','.'));
            $T->Show("ventas_total");
            $Z_CANTIDAD = 0;
            $Z_SUBTOTAL = 0;
        }
     }

   }else{
     $T->Set('_query0_NRO', $el['NRO']);
     $T->Set('_query0_FECHA', $el['FECHA']);
   }
    // Show Subtotal
    $T->Set('subtotal0_CANTIDAD', number_format($subtotal0_CANTIDAD,2,',','.'));
    
    //Actualize Old Values Variables
    $old['NRO'] = $el['NRO'];
    $old['FECHA'] = $el['FECHA'];
    $old['CODIGO'] = $el['CODIGO'];
    $old['DESCRIP'] = $el['DESCRIP'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['RECIBIDO'] = $el['RECIBIDO'];
    $firstRow=false;

}

$endConsult = true;
if( $old['NRO']!=$el['NRO'] ){
    $T->Show('query0_subtotal_row');
}
// Show total
$T->Show('query0_subtotal_row');
$PORC_TOTAL_VENTAS = $Z_CANT_VENDIDA * 100 / $total0_CANTIDAD;

$T->Set('total0_CANTIDAD', number_format($total0_CANTIDAD,2,',','.'));
$T->Set('METROS_VENDIDOS', number_format($Z_CANT_VENDIDA,2,',','.'));
$T->Set('PORC_TOTAL_VENTAS', number_format($PORC_TOTAL_VENTAS,2,',','.'));

if( endConsult ){
  if($detalle_ventas == 'Si'){
   $T->Set('nomenclatura1','Total Metros Vendidos:');
   $T->Set('nomenclatura2','Porcentaje de ventas sobre remisiones:');

  }

  $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

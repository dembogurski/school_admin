<?php

/** Report prg file (rep_ventas_FMinMay) 
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
$T->Set( 'sup_msg', 'Seleccione el tipo de reporte que desea! El simbolo % indica No mostrar, El %% indica mostrar todos!!!');
$T->Set( 'sup_aut_lock', 'true');
$T->Set( 'sup_rep_localidad', '%');
$T->Set( 'sup_busc', '');
$T->Set( 'sup_rep_cli', '');
$T->Set( 'sup_moneda', '%');
$T->Set( 'sup_cli_cat', '%');
$T->Set( 'sup_desde', '2012-01-01');
$T->Set( 'sup_hasta', '2012-01-31');
$T->Set( 'sup_desde2', '');
$T->Set( 'sup_hasta2', '');
$T->Set( 'sup_msg2', 'Filtre aqui los datos del Producto!!!');
$T->Set( 'sup_p_fam', '%');
$T->Set( 'sup_comp', 'No');
$T->Set( 'sup_rep_ventasFComp', '');
$T->Set( 'sup_p_grupo', '');
$T->Set( 'sup_p_tipo', '');
$T->Set( 'sup_guia_tipo', '');
$T->Set( 'sup_p_clasif', '');
$T->Set( 'sup_p_temp', '');
$T->Set( 'sup_p_estruc', '');
$T->Set( 'sup_p_color', '');
$T->Set( 'sup___term', '%');
$T->Set( 'sup_detallado', 'Resumido');
$T->Set( 'sup_desdeinv', '2012-01-01');
$T->Set( 'sup_hastainv', '2012-01-31');
$T->Set( 'sup_rep_ventasF', '');
$T->Set( 'sup_rep_ventasFMinMay', '');
$T->Set( 'sup_rep_ventasFG', '');
$T->Set( 'sup_rep_ventas', '');
$T->Set( 'sup_rep_ventasT', '');
$T->Set( 'sup_rep_ventasFT', '');
$T->Set( 'sup_rep_ventasTCG', '');
$T->Set( 'sup_rep_ventasTFG', '');
$T->Set( 'sup_rep_ventasTEG', '');
$T->Set( 'sup_rep_ventasTCLG', '');
$T->Set( 'sup_rep_ventasG', '');
$T->Set( 'sup_rep_ventasGT', '');
$T->Set( 'sup_limite', '0');
$T->Set( 'sup_rep_ventasGTC', '');
$T->Set( 'sup_rep_ventasFC', '');
$T->Set( 'sup_rep_ventasGET', '');
$T->Set( 'sup_rep_ventasGCT', '');


*/
// ------------------------------------------


$suc = $sup['rep_localidad'];
$fam = $sup['p_fam'];
$desde = $sup['desde'];
$hasta = $sup['hasta'];

$total0_CANTIDAD = 0;
$total0_VENTAS = 0;
$total0_MARGEN = 0;

$firstRow=true;
$Q0 = $DB;
 

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4); 
$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

// sumo los Totales
$query = "SELECT  sum( d.df_cantidad ) AS TOTAL_CANTIDAD, sum( d.df_subtotal ) AS TOTAL_VENTAS,
round(sum( df_subtotal - ((  p.p_compra  + (p.p_compra * p_porc_recargo / 100)  ) * d.df_cantidad)),0) AS TOTAL_MARGEN
FROM factura f,det_factura d, mnt_prod p 
WHERE f.fact_nro = d.df_fact_num AND fact_cli_cat > 0 AND d.df_cod_prod = p.p_cod AND f.fact_localidad LIKE '$suc'  AND p.p_fam LIKE '$fam' 
AND  f.fact_fecha BETWEEN '$desde' AND '$hasta' AND f. fact_estado = 'Cerrada'  ";

$Q0->Query( $query );

if($Q0->NumRows() > 0){
    $Q0->NextRecord();
    $total0_CANTIDAD = $Q0->Record['TOTAL_CANTIDAD'];
    $total0_VENTAS = $Q0->Record['TOTAL_VENTAS'];
    $total0_MARGEN = $Q0->Record['TOTAL_MARGEN']; 
    
}else{
    echo "Esta consulta no ha arrojado resultado alguno, intente con otro rango de fechas...";
    die();
}

// THIS IS YOUR FIRST QUERY:
$query0 = "SELECT p.p_fam AS FAM,sum( d.df_cantidad ) AS CANTIDAD,sum( d.df_subtotal ) AS VENTAS, 
round(sum( df_subtotal - ((  p.p_compra  + (p.p_compra * p_porc_recargo / 100)  ) * d.df_cantidad)),0) AS MARGEN
FROM factura f,det_factura d, mnt_prod p 
WHERE f.fact_nro = d.df_fact_num AND fact_cli_cat > 0 AND d.df_cod_prod = p.p_cod AND f.fact_localidad LIKE '$suc'  AND p.p_fam LIKE '$fam'  
AND  f.fact_fecha BETWEEN '$desde' AND '$hasta' AND f. fact_estado = 'Cerrada'   GROUP BY FAM   ORDER BY CANTIDAD DESC,VENTAS DESC,MARGEN DESC ";
 

$Q0->Query( $query0 );

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 

$T->Show('espacio');	

$T->Set('cabecera','VENTAS TOTALES - MAYORISTAS Y MINORISTAS');
$T->Set('color','#BBBBBB');
$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables


 

//Define a Subtotal Variables


//Define a Old Values Variables
$old['FAM'] = '';
$old['CANTIDAD'] = '';
$old['VENTAS'] = '';
$old['MARGEN'] = '';
 

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FAM'] = $Q0->Record['FAM'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $porc_cantidad = $el['CANTIDAD'] * 100 / $total0_CANTIDAD;
    $el['VENTAS'] = $Q0->Record['VENTAS'];
    $porc_ventas = $el['VENTAS'] * 100 / $total0_VENTAS;
    $el['MARGEN'] = $Q0->Record['MARGEN'];
    $porc_margen = $el['MARGEN'] * 100 / $total0_MARGEN;
    

    // Preparing a template variables
    $T->Set('query0_FAM', $el['FAM']);
    $T->Set('query0_CANTIDAD', number_format($el['CANTIDAD'],2,',','.'));
    $T->Set('porc_CANTIDAD', number_format($porc_cantidad,1,',','.'));
    $T->Set('query0_VENTAS',   number_format($el['VENTAS'],2,',','.'));
    $T->Set('porc_VENTAS', number_format($porc_ventas,1,',','.'));
    $T->Set('query0_MARGEN',   number_format($el['MARGEN'],2,',','.'));
    $T->Set('porc_MARGEN', number_format($porc_margen,1,',','.'));
   
    $T->Show('query0_data_row'); 
    
    //Actualize Old Values Variables
    $old['FAM'] = $el['FAM'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['VENTAS'] = $el['VENTAS'];
    $old['MARGEN'] = $el['MARGEN'];
    
    $firstRow=false;

}
 
 
// Show total
$T->Set('total0_CANTIDAD', number_format($total0_CANTIDAD,2,',','.'));
$T->Set('total0_VENTAS', number_format($total0_VENTAS,2,',','.'));
$T->Set('total0_MARGEN', number_format($total0_MARGEN,2,',','.'));

$T->Set('porc_cant', "100%");
$T->Set('porc_ventas', "100%");
$T->Set('porc_margen', "100%");

 
 $T->Show('query0_total_row');
   
 
 $T->Show('espacio');
 
 //////////////////////////////////////////////////////  Solo Minoristas ///////////////////////////////////////////////////////////////////

  $total0_CANTIDAD_MIN = 0;
  $total0_VENTAS_MIN = 0;
  $total0_MARGEN_MIN = 0;
 
 
 // sumo los Totales MINORISTA
$query = "SELECT  sum( d.df_cantidad ) AS TOTAL_CANTIDAD, sum( d.df_subtotal ) AS TOTAL_VENTAS,
round(sum( df_subtotal - ((  p.p_compra  + (p.p_compra * p_porc_recargo / 100)  ) * d.df_cantidad)),0) AS TOTAL_MARGEN
FROM factura f,det_factura d, mnt_prod p 
WHERE f.fact_nro = d.df_fact_num AND fact_cli_cat < 4 AND d.df_cod_prod = p.p_cod AND f.fact_localidad LIKE '$suc'  AND p.p_fam LIKE '$fam' 
AND  f.fact_fecha BETWEEN '$desde' AND '$hasta' AND f. fact_estado = 'Cerrada'  ";

$Q0->Query( $query );


if($Q0->NumRows() > 0){
    $Q0->NextRecord();
    $total0_CANTIDAD_MIN = $Q0->Record['TOTAL_CANTIDAD'];
    $total0_VENTAS_MIN = $Q0->Record['TOTAL_VENTAS'];
    $total0_MARGEN_MIN = $Q0->Record['TOTAL_MARGEN']; 
    
}else{
    echo "Esta consulta no ha arrojado resultado alguno, intente con otro rango de fechas...";
    die();
}

// THIS IS YOUR FIRST QUERY: MINORISTA 
$query0 = "SELECT p.p_fam AS FAM,sum( d.df_cantidad ) AS CANTIDAD,sum( d.df_subtotal ) AS VENTAS, 
round(sum( df_subtotal - ((  p.p_compra  + (p.p_compra * p_porc_recargo / 100)  ) * d.df_cantidad)),0) AS MARGEN
FROM factura f,det_factura d, mnt_prod p 
WHERE f.fact_nro = d.df_fact_num AND fact_cli_cat < 4 AND d.df_cod_prod = p.p_cod AND f.fact_localidad LIKE '$suc'  AND p.p_fam LIKE '$fam'  
AND  f.fact_fecha BETWEEN '$desde' AND '$hasta' AND f. fact_estado = 'Cerrada'   GROUP BY FAM   ORDER BY CANTIDAD DESC,VENTAS DESC,MARGEN DESC ";
  
$Q0->Query( $query0 );
 
$T->Show('espacio');	

$T->Set('cabecera','VENTAS TOTALES - MINORISTAS');
$T->Set('color','#fffccc');
$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
 
//Define a Old Values Variables
$old['FAM'] = '';
$old['CANTIDAD'] = '';
$old['VENTAS'] = '';
$old['MARGEN'] = '';
 

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FAM'] = $Q0->Record['FAM'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $porc_cantidad = $el['CANTIDAD'] * 100 / $total0_CANTIDAD_MIN;
    $el['VENTAS'] = $Q0->Record['VENTAS'];
    $porc_ventas = $el['VENTAS'] * 100 / $total0_VENTAS_MIN;
    $el['MARGEN'] = $Q0->Record['MARGEN'];
    $porc_margen = $el['MARGEN'] * 100 / $total0_MARGEN_MIN;
    

    // Preparing a template variables
    $T->Set('query0_FAM', $el['FAM']);
    $T->Set('query0_CANTIDAD', number_format($el['CANTIDAD'],2,',','.'));
    $T->Set('porc_CANTIDAD', number_format($porc_cantidad,1,',','.'));
    $T->Set('query0_VENTAS',   number_format($el['VENTAS'],2,',','.'));
    $T->Set('porc_VENTAS', number_format($porc_ventas,1,',','.'));
    $T->Set('query0_MARGEN',   number_format($el['MARGEN'],2,',','.'));
    $T->Set('porc_MARGEN', number_format($porc_margen,1,',','.'));
  
    $T->Show('query0_data_row');
  
    //Actualize Old Values Variables
    $old['FAM'] = $el['FAM'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['VENTAS'] = $el['VENTAS'];
    $old['MARGEN'] = $el['MARGEN'];
    
    $firstRow=false;

}

 

 
// Show total
$T->Set('total0_CANTIDAD', number_format($total0_CANTIDAD_MIN,2,',','.'));
$T->Set('total0_VENTAS', number_format($total0_VENTAS_MIN,2,',','.'));
$T->Set('total0_MARGEN', number_format($total0_MARGEN_MIN,2,',','.'));


$T->Set('porc_cant',   number_format($total0_CANTIDAD_MIN * 100 / $total0_CANTIDAD ,1,',','.')."%");
$T->Set('porc_ventas', number_format($total0_VENTAS_MIN * 100 / $total0_VENTAS ,1,',','.')."%");
$T->Set('porc_margen', number_format($total0_MARGEN_MIN * 100 / $total0_MARGEN ,1,',','.')."%");
 
 $T->Show('query0_total_row');
 
		// Ends a Table 
 
 $T->Show('espacio');
 
 
 ///////////////////////////////////////////////// Mayoristas ////////////////////////////////////////////////////
 
 
  $total0_CANTIDAD_MAY = 0;
  $total0_VENTAS_MAY = 0;
  $total0_MARGEN_MAY = 0;
 
 
 // sumo los Totales
$query = "SELECT  sum( d.df_cantidad ) AS TOTAL_CANTIDAD, sum( d.df_subtotal ) AS TOTAL_VENTAS,
round(sum( df_subtotal - ((  p.p_compra  + (p.p_compra * p_porc_recargo / 100)  ) * d.df_cantidad)),0) AS TOTAL_MARGEN
FROM factura f,det_factura d, mnt_prod p 
WHERE f.fact_nro = d.df_fact_num AND fact_cli_cat > 3 AND d.df_cod_prod = p.p_cod AND f.fact_localidad LIKE '$suc'  AND p.p_fam LIKE '$fam' 
AND  f.fact_fecha BETWEEN '$desde' AND '$hasta' AND f. fact_estado = 'Cerrada'  ";

$Q0->Query( $query );


if($Q0->NumRows() > 0){
    $Q0->NextRecord();
    $total0_CANTIDAD_MAY = $Q0->Record['TOTAL_CANTIDAD'];
    $total0_VENTAS_MAY = $Q0->Record['TOTAL_VENTAS'];
    $total0_MARGEN_MAY = $Q0->Record['TOTAL_MARGEN']; 
    
}else{
    echo "Esta consulta no ha arrojado resultado alguno, intente con otro rango de fechas...";
    die();
}

// THIS IS YOUR FIRST QUERY:
$query0 = "SELECT p.p_fam AS FAM,sum( d.df_cantidad ) AS CANTIDAD,sum( d.df_subtotal ) AS VENTAS, 
round(sum( df_subtotal - ((  p.p_compra  + (p.p_compra * p_porc_recargo / 100)  ) * d.df_cantidad)),0) AS MARGEN
FROM factura f,det_factura d, mnt_prod p 
WHERE f.fact_nro = d.df_fact_num AND fact_cli_cat > 3 AND d.df_cod_prod = p.p_cod AND f.fact_localidad LIKE '$suc'  AND p.p_fam LIKE '$fam'  
AND  f.fact_fecha BETWEEN '$desde' AND '$hasta' AND f. fact_estado = 'Cerrada'   GROUP BY FAM   ORDER BY CANTIDAD DESC,VENTAS DESC,MARGEN DESC ";
 

$Q0->Query( $query0 );

 

$T->Show('espacio');	

$T->Set('cabecera','VENTAS TOTALES - MAYORISTAS');
$T->Set('color','#cccfff');
$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables


 

//Define a Subtotal Variables


//Define a Old Values Variables
$old['FAM'] = '';
$old['CANTIDAD'] = '';
$old['VENTAS'] = '';
$old['MARGEN'] = '';
 

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FAM'] = $Q0->Record['FAM'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $porc_cantidad = $el['CANTIDAD'] * 100 / $total0_CANTIDAD_MAY;
    $el['VENTAS'] = $Q0->Record['VENTAS'];
    $porc_ventas = $el['VENTAS'] * 100 / $total0_VENTAS_MAY;
    $el['MARGEN'] = $Q0->Record['MARGEN'];
    $porc_margen = $el['MARGEN'] * 100 / $total0_MARGEN_MAY;
    

    // Preparing a template variables
    $T->Set('query0_FAM', $el['FAM']);
    $T->Set('query0_CANTIDAD', number_format($el['CANTIDAD'],2,',','.'));
    $T->Set('porc_CANTIDAD', number_format($porc_cantidad,1,',','.'));
    $T->Set('query0_VENTAS',   number_format($el['VENTAS'],2,',','.'));
    $T->Set('porc_VENTAS', number_format($porc_ventas,1,',','.'));
    $T->Set('query0_MARGEN',   number_format($el['MARGEN'],2,',','.'));
    $T->Set('porc_MARGEN', number_format($porc_margen,1,',','.'));
 

    // Calculating a subtotal

    $T->Show('query0_data_row');
 //
    //Actualize Old Values Variables
    $old['FAM'] = $el['FAM'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['VENTAS'] = $el['VENTAS'];
    $old['MARGEN'] = $el['MARGEN'];
    
    $firstRow=false;

}

 

 
// Show total
$T->Set('total0_CANTIDAD', number_format($total0_CANTIDAD_MAY,2,',','.'));
$T->Set('total0_VENTAS', number_format($total0_VENTAS_MAY,2,',','.'));
$T->Set('total0_MARGEN', number_format($total0_MARGEN_MAY,2,',','.'));


$T->Set('porc_cant',   number_format($total0_CANTIDAD_MAY * 100 / $total0_CANTIDAD ,1,',','.')."%");
$T->Set('porc_ventas', number_format($total0_VENTAS_MAY * 100 / $total0_VENTAS ,1,',','.')."%");
$T->Set('porc_margen', number_format($total0_MARGEN_MAY * 100 / $total0_MARGEN ,1,',','.')."%");
 
 $T->Show('query0_total_row');
 
		// Ends a Table 
 
 $T->Show('espacio');
 
 
 $T->Show('end_query0');		

?>

<?php

/** Report prg file (calif_prod_mrgn) 
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
$T->Set( 'sup_desde', '2010-03-20');
$T->Set( 'sup_hasta', '2010-03-31');
$T->Set( 'sup_suc_', '01');
$T->Set( 'sup_rep', '');
$T->Set( 'sup___lock', 'true'); */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p.p_tipo as TIPO, ((d.df_cantidad * d.df_precio ) - (d.df_cantidad * p.p_compra)) as MARGEN, d.df_cantidad * d.df_precio as SUBTOTAL, d.df_cantidad as METROS, d.df_precio as PRECIO_V, p.p_compra as PRECIO_C, (1 - ( p.p_compra / d.df_precio )) * 100 AS  PORC FROM mnt_prod p, factura f, det_factura d WHERE f.fact_nro = d.df_fact_num AND f.fact_fecha BETWEEN  '2010-03-20' and '2010-03-31' AND f.fact_localidad = '01'AND p.p_cod = d.df_cod_prod  order by TIPO ASC";

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
$subtotal0_MARGEN = 0;
$subtotal0_SUBTOTAL = 0;
$subtotal0_METROS = 0;
$subtotal0_PRECIO_V = 0;
$subtotal0_PRECIO_C = 0;
$subtotal0_PORC = 0;


//Define a Old Values Variables
$old['TIPO'] = '';
$old['GRUPO'] = '';
$old['MARGEN'] = '';
$old['SUBTOTAL'] = '';
$old['METROS'] = '';
$old['PRECIO_V'] = '';
$old['PRECIO_C'] = '';
$old['PORC'] = '';

    $Q1 = new Y_DB();
	$Q1->Database = $Global['project'];	
			 
  	$Q1->Query("delete from tmp_calif_prod;");
  	
  	echo "Preparando reporte espera a que termine para previsualizar...<br>";
  	

  	
$tipo = '';
$porcent ='';

$j = 0;

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['TIPO'] = $Q0->Record['TIPO'];
	$el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['MARGEN'] = $Q0->Record['MARGEN'];
    $el['SUBTOTAL'] = $Q0->Record['SUBTOTAL'];
    $el['METROS'] = $Q0->Record['METROS'];
    $el['PRECIO_V'] = $Q0->Record['PRECIO_V'];
    $el['PRECIO_C'] = $Q0->Record['PRECIO_C'];
    $el['PORC'] = $Q0->Record['PORC'];
    
    if(  $el['TIPO']!=$old['TIPO']   ){
    	$tipo = str_replace("'"," ",$old['TIPO'] ); 
		$grupo = str_replace("'"," ",$old['GRUPO'] ); 
    	 
    	if ($subtotal0_PRECIO_V != 0) {
          $porcent = (1 - ($subtotal0_PRECIO_C / $subtotal0_PRECIO_V)) * 100;
    	}else{
    		echo "Encontrado un Precio Venta = 0  <br> Abortando calculo %";
    		$porcent = 0;
    	} 
    	
        //$T->Show('query0_subtotal_row');
        if ($j > 0) {  
            $Q1->Query("insert into tmp_calif_prod 
			(id, p_tipo, margen, subtotal, metros, precio_v, precio_c, porc, p_grupo)
			values(default, '$tipo', $subtotal0_MARGEN, $subtotal0_SUBTOTAL, $subtotal0_METROS, $subtotal0_PRECIO_V, $subtotal0_PRECIO_C, $porcent ,'$grupo' );");
            echo ".";
         }
        
        $j++;
        //Reset a Subtotal Variables
        $subtotal0_MARGEN = 0;
        $subtotal0_SUBTOTAL = 0;
        $subtotal0_METROS = 0;
        $subtotal0_PRECIO_V = 0;
        $subtotal0_PRECIO_C = 0;
        $subtotal0_PORC = 0;
    }

    // Preparing a template variables
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_MARGEN', number_format($el['MARGEN'],2,',','.'));
    $T->Set('query0_SUBTOTAL', number_format($el['SUBTOTAL'],2,',','.'));
    $T->Set('query0_METROS', number_format($el['METROS'],2,',','.'));
    $T->Set('query0_PRECIO_V', number_format($el['PRECIO_V'],2,',','.'));
    $T->Set('query0_PRECIO_C', number_format($el['PRECIO_C'],2,',','.'));
    $T->Set('query0_PORC', number_format($el['PORC'],2,',','.'));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_MARGEN += 0 + $el['MARGEN'];
    $subtotal0_SUBTOTAL += 0 + $el['SUBTOTAL'];
    $subtotal0_METROS += 0 + $el['METROS'];
    $subtotal0_PRECIO_V += 0 + $el['PRECIO_V'];
    $subtotal0_PRECIO_C += 0 + $el['PRECIO_C'];
    $subtotal0_PORC += 0 + $el['PORC'];

    //$T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_MARGEN', number_format($subtotal0_MARGEN,2,',','.'));
    $T->Set('subtotal0_SUBTOTAL', number_format($subtotal0_SUBTOTAL,2,',','.'));
    $T->Set('subtotal0_METROS', number_format($subtotal0_METROS,2,',','.'));
    $T->Set('subtotal0_PRECIO_V', number_format($subtotal0_PRECIO_V,2,',','.'));
    $T->Set('subtotal0_PRECIO_C', number_format($subtotal0_PRECIO_C,2,',','.'));
    $T->Set('subtotal0_PORC', number_format($subtotal0_PORC,2,',','.'));
    
    //Actualize Old Values Variables
    $old['TIPO'] = $el['TIPO'];
    $old['MARGEN'] = $el['MARGEN'];
    $old['SUBTOTAL'] = $el['SUBTOTAL'];
    $old['METROS'] = $el['METROS'];
    $old['PRECIO_V'] = $el['PRECIO_V'];
    $old['PRECIO_C'] = $el['PRECIO_C'];
    $old['PORC'] = $el['PORC'];
	$old['GRUPO'] = $el['GRUPO']; 
    $firstRow=false;

}

$endConsult = true;
if($el['GRUPO']!=$old['GRUPO'] &&   $el['TIPO']!=$old['TIPO'] ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    //$T->Show('query0_total_row');
   // $T->Show('query0_subtotal_row');
    $Q1->Query("insert into marijoa.tmp_calif_prod 
			(id, p_tipo, margen, subtotal, metros, precio_v, precio_c, porc,p_grupo)
			values(default, '$tipo', $subtotal0_MARGEN, $subtotal0_SUBTOTAL, $subtotal0_METROS, $subtotal0_PRECIO_V, $subtotal0_PRECIO_C, $porcent,'$grupo');");
        echo "<br><b>Listo puede previsualizar el reporte. </b>    <img src='images/ok.jpg' border='0' >";
}
$T->Show('end_query0');				// Ends a Table 

?>


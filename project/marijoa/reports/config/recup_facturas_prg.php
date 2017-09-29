<?php

/** Report prg file (recup_facturas) 
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
$T->Set( 'sup_msg', '( ! ) Este reporte podria afectar la velocidad de las demás maquinas cliente. !!!');
$T->Set( 'sup_busc_prov', 'acho');
$T->Set( 'sup_prov', '6');
$T->Set( 'sup_desde', '2009-03-26');
$T->Set( 'sup_hasta', '2009-05-26');
$T->Set( 'sup_desdeinv', '2009-03-26');
$T->Set( 'sup_hastainv', '2009-05-26');
$T->Set( 'sup_ver_rep', '');  */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select c.c_ref as FACTURA, p.p_cod as CODIGOS, c.c_valor_total AS TOTAL_VALOR_COMPRA, p.p_cant_compra AS TOTAL_MTS_COMPRADOS from mov_compras c,mnt_prod p where c.c_ref = p.p_ref and c.c_prov = '6'  and c.c_fecha BETWEEN '2009-03-26' and '2009-05-26'";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$T->Set( 'prov', $sup['prov_nombre']);

$desde = $sup['desde'];
$hasta = $sup['hasta'];
$vhasta = $sup['vhasta'];

$limite = $sup['c_limite'];
 

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);

$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

if ($sup['simp'] === 'Si') {
	$T->Set('tipo',"(Simplificado)");
}

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
$subtotal0_TOTAL_VALOR_COMPRA = 0;
$subtotal0_TOTAL_VALOR_REF = 0;
$subtotal0_TOTAL_MTS_COMPRADOS = 0;

$cantidad = 0;
$precio_venta = 0;
$subtotal = 0;

$cant = 0;
$pv = 0;
$st = 0;

$Z_DIFERENCIA = 0;



//Define a Old Values Variables
$old['FACTURA'] = '';
$old['CODIGOS'] = '';
$old['TOTAL_VALOR_COMPRA'] = '';
$old['TOTAL_MTS_COMPRADOS'] = '';
$old['TOTAL_REF'] = '';

$old['SUMA_FRAC'] = '';
$old['DIFERENCIA'] = '';

	
	$grupo = '';
	$tipo = '';


// Making a rows of consult
while( $Q0->NextRecord() ){
	
    // Define a elements
    $el['FACTURA'] = $Q0->Record['FACTURA'];
    $el['CODIGOS'] = $Q0->Record['CODIGOS'];
    $el['TOTAL_VALOR_COMPRA'] = $Q0->Record['TOTAL_VALOR_COMPRA'];

    $el['DIFERENCIA'] = $Q0->Record['DIFERENCIA'];

    $el['SUMA_FRAC'] = $Q0->Record['SUMA_FRAC'];
    $SUMA_FRACCIONES = $el['SUMA_FRAC'];

    $el['TOTAL_MTS_COMPRADOS'] = $Q0->Record['TOTAL_MTS_COMPRADOS'];
    
    $el['TOTAL_REF'] = $Q0->Record['TOTAL_REF'];
 
 
    // Preparing a template variables
    if ($old['FACTURA'] != $el['FACTURA']) {
    	$T->Set('query0_FACTURA', $el['FACTURA']);
    	$T->Set('query0_TOTAL_VALOR_COMPRA', number_format($el['TOTAL_VALOR_COMPRA'],0,',','.'));
    	$T->Set('query0_TOTAL_REF', number_format($el['TOTAL_REF'],0,',','.'));
    }else {
    	$T->Set('query0_FACTURA', '&nbsp;&nbsp;&nbsp;"');
    	$T->Set('query0_TOTAL_VALOR_COMPRA','"&nbsp;&nbsp;&nbsp;');
    	$T->Set('query0_TOTAL_REF','"&nbsp;&nbsp;&nbsp;');
    }
    
    $T->Set('query0_CODIGOS', $el['CODIGOS']);
     $T->Set('DIFF',  number_format($el['DIFERENCIA'],2,',','.'));
   
    $T->Set('query0_TOTAL_MTS_COMPRADOS', number_format($el['TOTAL_MTS_COMPRADOS'],2,',','.'));
    $T->Set('query0_TOTAL_MTS_FRAC', number_format($el['SUMA_FRAC'],2,',','.'));
    
    
    // BY  Douglas 

	$Q = new Y_DB();
	$Q->Database = $Global['project'];
	
	if ($limite === 'No') {
      $Q->Query("select distinct p.p_grupo AS GRUPO, p.p_tipo AS TIPO, df_cantidad as CANTIDAD,df_precio as PRECIO_VENTA,df_subtotal as SUBTOTAL_VENTA  from  det_factura d , mnt_prod p
	             where d.df_cod_prod =  ".$el['CODIGOS']."  and d.df_cod_prod = p.p_cod ");
	}else {
	
	  $Q->Query("select distinct p.p_grupo AS GRUPO, p.p_tipo  AS TIPO, df_cantidad as CANTIDAD,df_precio as PRECIO_VENTA,df_subtotal as SUBTOTAL_VENTA  from  det_factura d,factura f , mnt_prod p
	             where d.df_cod_prod =  ".$el['CODIGOS']."  and f.fact_fecha  BETWEEN  '$desde'  and  '$vhasta'  and d.df_cod_prod = p.p_cod");  
	 
	}

	while ($Q->NextRecord() ){
	    $el['CANTIDAD'] = $Q->Record['CANTIDAD'];
	    $el['PRECIO_VENTA'] = $Q->Record['PRECIO_VENTA'];
	    $el['SUBTOTAL_VENTA'] = $Q->Record['SUBTOTAL_VENTA'];	
	    $grupo = $Q->Record['GRUPO'];
	    $tipo = $Q->Record['TIPO'];
	    
	    $cant += 0 + $el['CANTIDAD'];
	    $pv +=0+ $el['PRECIO_VENTA'];
	    $st +=0+ $el['SUBTOTAL_VENTA'];	     
    
    }
    $T->Set('grupo', $grupo );
    $T->Set('tipo',$tipo);
     
       
	    $T->Set('cantidad', number_format($cant,2,',','.') );
	    $T->Set('precio_venta', number_format($pv,0,',','.') );
	    $T->Set('subtotal_venta', number_format($st,0,',','.') );

	    
	    //$recup = ( $cant * 100) / $el['TOTAL_MTS_COMPRADOS'];
        $recup = ( $cant * 100) / $el['DIFERENCIA']; ;
	    $T->Set('porc_recup', number_format( $recup,0,',','.') );
        
	    $recupvalor = ( $st * 100) / $el['TOTAL_REF'];
	    $T->Set('porc_recupvalor', number_format( $recupvalor,0,',','.') );
	    $cantidad += 0 + $cant;	    
	    // $precio_venta += 0 + $el['PRECIO_VENTA'];
	    $subtotal += 0 + $st;	 
	      
    // Calculating a total

    // Calculating a subtotal
    if ($old['FACTURA'] != $el['FACTURA']) {
       $subtotal0_TOTAL_VALOR_COMPRA += 0 + $el['TOTAL_VALOR_COMPRA'];
       $subtotal0_TOTAL_VALOR_REF += 0 + $el['TOTAL_REF'];
    }


    //$subtotal0_TOTAL_MTS_COMPRADOS += 0 + $el['TOTAL_MTS_COMPRADOS'];
    $subtotal0_TOTAL_MTS_COMPRADOS += 0 + $el['DIFERENCIA'];
 
    if ($sup['simp'] === 'No') {
      $T->Show('query0_data_row');
    }
    // Show Subtotal
    $T->Set('subtotal0_TOTAL_VALOR_COMPRA', number_format($subtotal0_TOTAL_VALOR_COMPRA,0,',','.'));
    $T->Set('subtotal0_TOTAL_VALOR_REF', number_format($subtotal0_TOTAL_VALOR_REF,0,',','.'));
    $T->Set('subtotal0_TOTAL_MTS_COMPRADOS', number_format($subtotal0_TOTAL_MTS_COMPRADOS,2,',','.'));
    
    $T->Set('sumacantidad', number_format($cantidad,2,',','.'));
    $T->Set('sumaprecioventa', number_format($precio_venta,0,',','.'));
    $T->Set('sumasubtotal', number_format($subtotal,0,',','.'));  
    
    $tr = ( $cantidad * 100) / $subtotal0_TOTAL_MTS_COMPRADOS;
    $T->Set('tr', number_format( $tr,0,',','.') );  
    
    $tv = ( $subtotal * 100) / $subtotal0_TOTAL_VALOR_REF;
    $T->Set('tv', number_format( $tv,0,',','.') );  
 
    
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_TOTAL_VALOR_COMPRA = 0;
        $subtotal0_TOTAL_VALOR_REF = 0;
        $subtotal0_TOTAL_MTS_COMPRADOS = 0;
        $cantidad = 0;

        //$DIFERENCIA = 0;
    }
    
    //Actualize Old Values Variables
    $old['FACTURA'] = $el['FACTURA'];
    $old['CODIGOS'] = $el['CODIGOS'];
    $old['TOTAL_VALOR_COMPRA'] = $el['TOTAL_VALOR_COMPRA'];
    $old['TOTAL_VALOR_REF'] = $el['TOTAL_REF'];
    $old['TOTAL_MTS_COMPRADOS'] = $el['TOTAL_MTS_COMPRADOS'];
    $old['SUMA_FRAC'] = $el['SUMA_FRAC']; 
    
     $old['DIFERENCIA'] = $el['DIFERENCIA'];


    
    $cant=0;
    $st=0;
    $pv=0;
    
    $firstRow=false;

}

$endConsult = true;
if( $endConsult ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

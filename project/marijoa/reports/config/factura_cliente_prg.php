<?php

/** Report prg file (factura_cliente) 
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
$T->Set( 'sup_fact_mensaje', '');
$T->Set( 'sup_fact_sentinela', '');
$T->Set( 'sup_fact_fecha', '2008-09-01');
$T->Set( 'sup_fact_ruc', 'MAR45654455');
$T->Set( 'sup_fact_iva', '10.0');
$T->Set( 'sup_fact_localidad', '00');
$T->Set( 'sup_fact_emp_datos', 'TERMINAL');
$T->Set( 'sup_fact_emp_dir', '00 TERMINAL - -TERMINAL ');
$T->Set( 'sup_fact_emp_tel', '');
$T->Set( 'sup_fact_busc_cli', '');
$T->Set( 'sup_fact_cli_ci', '1');
$T->Set( 'sup_fact_cli_cat', '1');
$T->Set( 'sup_fact_nuevo_cli', '');
$T->Set( 'sup_fact_nom_cli', 'SIN NOMBRE');
$T->Set( 'sup_fact_vend_cod', 'EstelaM');
$T->Set( 'sup_func_nombre', 'Estela Rosa Mielniczuk Kobalew');
$T->Set( 'sup_cambiar_cli', 'false');
$T->Set( 'sup_fact_busc_vend', '');
$T->Set( 'sup_fact_ver_caja', 'Abierto');
$T->Set( 'sup_fact_comi_vend', '374.40');
$T->Set( 'sup_fact_estado_com', 'false');
$T->Set( 'sup_fact_nro', '15921');
$T->Set( 'sup_fact_gen_venta', 'No');
$T->Set( 'sup_fact_detalle', '');
$T->Set( 'sup_fact_conv', '0');
$T->Set( 'sup_fact_nro_orden', '');
$T->Set( 'sup_bloqueo', 'true');
$T->Set( 'sup_fact_finalizar', 'No');
$T->Set( 'sup_fact_cont_deta', '2');
$T->Set( 'sup_fact_empaque', 'Si');
$T->Set( 'sup_fact_mov_fact', 'false');
$T->Set( 'sup_fact_estado', 'Cerrada');
$T->Set( 'sup_fact_cambiar_es', 'false');
$T->Set( 'sup_fact_aceptar', '');
$T->Set( 'sup_fact_retorno', '');
$T->Set( 'sup_fact_tipo', 'Contado');
$T->Set( 'sup_fact_moneda', 'P$');
$T->Set( 'sup_fact_cotiz', '1250');
$T->Set( 'sup_fact_total_pagr', '18720');
$T->Set( 'sup_fact_total', '14.976');
$T->Set( 'sup_fact_entrega', '0.00');
$T->Set( 'sup_fact_vuelto', '-14.976');
$T->Set( 'sup_fact_det_pago', '');
$T->Set( 'sup_fact_concepto', '0');
$T->Set( 'sup___cursor', '');
$T->Set( 'sup_fact_imprimir', '');
$T->Set( 'sup_fact_cerrar', 'false');
$T->Set( 'sup___goback', '');
$T->Set( 'sup_fact_no_delete', '');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT df_renglon AS Nro , df_cod_prod AS Cod_Producto, df_descrip AS Descripcion,df_precio AS Precio,df_cantidad AS Cantidad, df_subtotal AS Subtotal FROM det_factura WHERE df_fact_num = '15921'";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );


/*

$T->Set( 'x1', '11px');
$T->Set( 'x2', '12px');
$T->Set( 'x3', '13px');

*/
$T->Set( 'x0', '13px');
$T->Set( 'x1', '15px');
$T->Set( 'x2', '16px');

 
  
$data_ini = substr($sup['fact_fecha'],8,2).'-'.substr($sup['fact_fecha'],5,2).'-'.substr($sup['fact_fecha'],0,4);
 
$T->Set('sup_fact_fecha',$data_ini);
 
 



$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header
 
  
 /*
if( $el['fact_total_pagr'] > $el['fact_total']  ){

   
     $T->Set('otra_moneda', $el['fact_total']);
     $T->Set('cod_moneda', 'TOTAL '.$el['fact_moneda']);
   
   
}else{
  $T->Set('otra_moneda', '');
   $T->Set('cod_moneda', '');
} */




 

//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables
$subtotal0_Subtotal = 0;


//Define a Old Values Variables
$old['Nro'] = '';
$old['Cod_Producto'] = '';
$old['Descripcion'] = '';
$old['Precio'] = '';
$old['Cantidad'] = '';
$old['Subtotal'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['Nro'] = $Q0->Record['Nro'];
    $el['Cod_Producto'] = $Q0->Record['Cod_Producto'];
    
    $cadena = $Q0->Record['Descripcion'];
    $desc = str_replace("ñ","&ntilde;", $cadena);
    $desc2 = str_replace("Ñ","&Ntilde;", $desc);
    
    $el['Descripcion'] = $desc2;
    $el['Precio'] = $Q0->Record['Precio'];
    $el['Cantidad'] = $Q0->Record['Cantidad'];
    $el['Subtotal'] = $Q0->Record['Subtotal'];

    // Preparing a template variables
    $T->Set('query0_Nro',  $el['Nro']);
    $T->Set('query0_Cod_Producto', $el['Cod_Producto']);
    
    $r0 = strtoupper($el['Descripcion']);
    $r1 = str_replace('&NTILDE;','&Ntilde;',$r0);
    $T->Set('query0_Descripcion',$r1 );
    $T->Set('query0_Precio',number_format( $el['Precio'],0,',','.'));
    $T->Set('query0_Cantidad', $el['Cantidad']);
    $T->Set('query0_Subtotal', number_format($el['Subtotal'],0,',','.'));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_Subtotal += 0 + $el['Subtotal'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_Subtotal', number_format($subtotal0_Subtotal,0,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_Subtotal = 0;
    }
    
    //Actualize Old Values Variables
    $old['Nro'] = $el['Nro'];
    $old['Cod_Producto'] = $el['Cod_Producto'];
    $old['Descripcion'] = $el['Descripcion'];
    $old['Precio'] = $el['Precio'];
    $old['Cantidad'] = $el['Cantidad'];
    $old['Subtotal'] = $el['Subtotal'];
    $firstRow=false;

}
 
   if( $sup['fact_moneda']!='' && $sup['fact_moneda']!='G$' ){
     $monto = $subtotal0_Subtotal;
	 
	
	 /*
 	 $monto0 = str_replace(".",",", $monto); 
	 $pos = strpos($monto0, ",");
	 $pos+=3;
	 $monto1 = substr($monto0,0,$pos);    
	 */
     $cotiz = $sup['fact_cotiz'];  
     $T->Set('otra_moneda', number_format($monto   / $cotiz,2,',','.'));   
     
     $T->Set('cod_moneda', 'TOTAL '.$sup['fact_moneda']);
   
   }else{ 
     
       $T->Set('otra_moneda', $total_otra_moneda);
       $T->Set('cod_moneda', '');  
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

<?php

/** Report prg file (ins_cod_venta) 
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
$T->Set( 'sup_fact_sentinela', '');
$T->Set( 'sup_fact_fecha', '2015-09-25');
$T->Set( 'sup_fact_ruc', '80027779-1');
$T->Set( 'sup_fact_iva', '10');
$T->Set( 'sup_fact_localidad', '00');
$T->Set( 'sup_fact_emp_datos', 'PRODUCCION');
$T->Set( 'sup_fact_emp_dir', '00 PRODUCCION - -Bº DEFENSORES DEL CHACO ');
$T->Set( 'sup_fact_emp_tel', '209185');
$T->Set( 'sup_fact_turno', '');
$T->Set( 'sup_fact_busc_cli', '');
$T->Set( 'sup_fact_cli_ci', '4865782');
$T->Set( 'sup_fact_cli_cat', '1');
$T->Set( 'sup_fact_edit', 'No');
$T->Set( 'sup_fact_nuevo_cli', '');
$T->Set( 'sup_fact_nom_cli', 'JORGE CABALLERO');
$T->Set( 'sup_fact_r0', '0');
$T->Set( 'sup_fact_r1', '7');
$T->Set( 'sup_fact_vend_cod', 'Douglas');
$T->Set( 'sup_func_nombre', 'Doglas Antonio Dembogurski Feix');
$T->Set( 'sup_fact_subfrm_cli', '');
$T->Set( 'sup_fact_sin_cod', 'Confeccion');
$T->Set( 'sup_cambiar_cli', 'false');
$T->Set( 'sup_fact_busc_vend', '');
$T->Set( 'sup_fact_ver_caja', 'Abierto');
$T->Set( 'sup_fact_comi_vend', '0.00');
$T->Set( 'sup_fact_estado_com', 'false');
$T->Set( 'sup_fact_nro', '1600062');
$T->Set( 'sup_fact_gen_venta', 'No');
$T->Set( 'sup_fact_detalle', '');
$T->Set( 'sup_fact_confec', '');
$T->Set( 'sup_fact_conv', '');
$T->Set( 'sup_fact_nro_orden', '');
$T->Set( 'sup_bloqueo', 'true');
$T->Set( 'sup_fact_finalizar', 'No');
$T->Set( 'sup_ins_lote', 'Si');
$T->Set( 'sup_codigos', 'concat( p_cod,\',\', p_cant)
7607107,28.70
9368608,15.87
5464206,18.16
8555408,132.70
9341408,20.50
7840007,35.50
7965007,10.05
9310308,11.10
6623707,10.45
8289007,12.05
5999914,15.00
3323705,35.80
4501506,15.50
7183807,11.80
9277208,32.10
9280008,34.00
7894207,22.30
8749508,538.00
8823008,24.95
9161208,20.50
6467007,96.50
8063407,12.60
8972408,50.00
7962507,16.25
7962907,15.25
7963007,12.30
7970307,11.35
9181408,45.00
6151207,35.90
6151507,12.50');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_fact_cont_deta', '0');
$T->Set( 'sup_fact_empaque', 'No');
$T->Set( 'sup_fact_mov_fact', 'false');
$T->Set( 'sup_fact_estado', 'Abierta');
$T->Set( 'sup_fact_cambiar_es', 'false');
$T->Set( 'sup_fact_aceptar', '');
$T->Set( 'sup_fact_retorno', '');
$T->Set( 'sup_fact_tipo', ' ');
$T->Set( 'sup_fact_moneda', '');
$T->Set( 'sup_fact_cotiz', '1');
$T->Set( 'sup_fact_total_pagr', '0');
$T->Set( 'sup_fact_total', '0.00');
$T->Set( 'sup_fact_entrega', '0.00');
$T->Set( 'sup_fact_vuelto', '');
$T->Set( 'sup_fact_det_pago', '');
$T->Set( 'sup_fact_concepto', '0');
$T->Set( 'sup___cursor', '');
$T->Set( 'sup_tipo_conf', 'Mantel');
$T->Set( 'sup_fact_imprimir', '');
$T->Set( 'sup_fact_cerrar', 'false');
$T->Set( 'sup___goback', '');
$T->Set( 'sup_fact_no_delete', 'true');
$T->Set( 'sup_fact_margen', '0.00');
$T->Set( 'sup___disableDel', 'true');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select 1 as uno";

$fact_nro = $sup['fact_nro'];
$codigos = $sup['codigos'];
$local = $sup['sup_fact_localidad'];
$codigos_r = array_filter(explode(";",$codigos));
$clean_cods = array();
$cant_cod = count($codigos_r);
$insertados = 0;
$excluidos = '';
$user = $Global['username'];
//$lista =  substr(implode(array_keys($clean_cods),','),0,-1);
//echo $codigos;

// Parsear aqui e Insertar en la Factura


$T->Set( 'time', daytime() );
$T->Set( 'user', $user );
$T->Set('info', "Factura Nro: ".$fact_nro);

$firstRow=true;
$Q0 = $DB;
$Q0->Query("select df_cod_prod, df_renglon from det_factura where df_fact_num = '$fact_nro'");
$codigos_fact = array();
$reglon = 1;

while($Q0->NextRecord()){
	$r = $Q0->Record['df_renglon'];
	array_push($codigos_fact,$Q0->Record['df_cod_prod']);
	$reglon = ($r>$reglon)?$r:$reglon;
}

//$qins_det_factura = "insert into det_factura  (df_renglon,df_descrip,df_precio,df_cantidad,df_subtotal,df_cod_prod,df_fact_num) select '$reglon',concat(p.p_grupo,'-',p.p_tipo,'-',p.p_color,'-',p.p_descri), round(p_compra +((p_compra*p_porc_recargo)/100),0) ,$cant,(round(p_compra +((p_compra*p_porc_recargo)/100),0)*$cant),p.p_cod,'$fact_nro' from mnt_prod p where p.p_cod ='$cod' ";
$total_cantidad = 0;
$total_metros = 0;
foreach ($codigos_r as $cod){
	$temp = split(",",$cod);
	$cod = trim($temp[0]);
	$cant = trim($temp[1]);
	$mts = trim($temp[2]);	
	
	$qins_inv_confec = "INSERT INTO inv_confec (c_ref,c_interno,c_codigo,c_user,c_cant,c_medida,c_cant_est,c_precio_costo) VALUES( '$fact_nro',_autonum('c_interno'),'$cod','$user','$cant','$mts',round(($cant/$mts),1),(select round(p_compra +((p_compra*p_porc_recargo)/100),0) from mnt_prod where p_cod = '$cod'))";
	//ins_confec(descrip,predio,cantidad,cod_prod,fact_num,tipo)
	$qins_det_factura = "SELECT ins_confec((select concat(p.p_grupo,'-',p.p_tipo,'-',p.p_color,'-',p.p_descri) from mnt_prod p where p.p_cod = $cod),(select round(p_compra +((p_compra*p_porc_recargo)/100),0) from mnt_prod where p_cod = '$cod'),$cant,$cod,$fact_nro,'insert')";
	
	
	if($cod != '' && $cant != ''){
		if(!in_array($cod,$codigos_fact)){
			$Q0->Query("select if(p_cant >= $cant ,'Ok', p_cant) as ex from mnt_prod where p_cod = $cod");
			$Q0->NextRecord();
			$ex = $Q0->Record['ex'];			
			if($ex == 'Ok'){
				$Q0->Query($qins_inv_confec);
				if($Q0->AffectedRows()>0){
					$Q0->Query($qins_det_factura);
					$total_metros += $cant;
					$total_cantidad += $cant*$mts;
					$reglon++;
					$insertados++;
				}
			}else{
				$excluidos .= "Pedido $cant mayor existencias $ex Cod:".$cod.'</br>';
			}										
		}else{
			$excluidos .= "Ya existe en la factura Cod:".$cod.'</br>';
		}
	}else if($cod != '' || $cant != ''){
		$excluidos .= "Alg&uacute;n valor nulo Cod:".$cod.'</br>';
	}
}

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

$Q0->Query("select * from det_factura where df_fact_num = '$fact_nro'");
// Making a rows of consult
$total = 0;
while( $Q0->NextRecord() ){

    // Define a elements
    $el['df_cod_prod'] = $Q0->Record['df_cod_prod'];
	$el['df_descrip'] = $Q0->Record['df_descrip'];
	$el['df_precio'] = $Q0->Record['df_precio'];
	$el['df_cantidad'] = $Q0->Record['df_cantidad'];
	$el['df_subtotal'] = $Q0->Record['df_subtotal'];

    // Preparing a template variables
    $T->Set('cod', $el['df_cod_prod']);
	$T->Set('desc', $el['df_descrip']);
	$T->Set('precio', $el['df_precio']);
	$T->Set('cant', $el['df_cantidad']);
	$T->Set('subtotal', $el['df_subtotal']);
	
	$total += $el['df_subtotal'];
	
    $T->Show('query0_data_row');    
    
}

$endConsult = true;
if( true ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
	$T->Set('total_metros',$total_metros);
	$T->Set('total_cantidad',$total_cantidad);
    $T->Show('query0_total_row');
}
$T->Show('end_query0');
// Ends a Table 
$T->Set('info', 'Se insertaron '.$insertados.' de '.$cant_cod.' registros.');
$T->Set('result', $excluidos);
$T->Show('info');

?>

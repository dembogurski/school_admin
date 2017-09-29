<?php

/** Report prg file (rem_diff_kg) 
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
$T->Set( 'sup_desde', '2014-12-26');
$T->Set( 'sup_hasta', '2014-12-30');
$T->Set( 'sup_suco', '00');
$T->Set( 'sup_sucd', '01');
$T->Set( 'sup_detallado', 'No');
$T->Set( 'sup_detalle_ventas', 'No');
$T->Set( 'sup_ventas_hasta', '2014-12-30');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_ref_dif_kg', '');
$T->Set( 'sup___lock', 'true');
*/
// ------------------------------------------


$suco = $sup['suco'];
$sucd = $sup['sucd'];
$desde = $sup['desde'];
$hasta = $sup['hasta'];
$padre = '';
$tipo_criterio = $sup['tipo_cri'];
$diferencia = $sup['dif_min'];
$criterio = "( (kg_env > kg_rec ) OR (kg_env < kg_rec) )";

// THIS IS YOUR FIRST QUERY:
if($tipo_criterio == "Gramos"){
	$diferencia_gramos = $diferencia/1000;
	$criterio = "( ((kg_env > kg_rec ) AND ( (kg_env - kg_rec)>$diferencia_gramos)) OR ((kg_env < kg_rec) AND ((kg_rec-kg_env)>$diferencia_gramos)) )";
}else if ($tipo_criterio == "Porcentaje"){
	$criterio = "( (kg_env > (kg_rec + ((kg_rec * $diferencia) / 100) ))  or  (kg_env < (kg_rec - ((kg_rec * $diferencia) / 100) )) )";
}
$query0 = "SELECT mnt_prod.p_padre AS 'Padre', mnt_prod.p_kg AS '_Kg_', mnt_prod.p_tara AS 'Tara', mnt_prod.p_ancho AS 'Ancho', mnt_prod.p_gram AS 'Gramaje', "
	."nota_remision.rem_nro AS 'Nro', DATE_FORMAT(rem_fecha,'%d-%m-%Y') AS 'Fecha',rem_origen AS 'Origen', rem_destino AS 'Destino',rem_vend_cod AS 'Usuario',rem_receptor AS 'Receptor',DATE_FORMAT(rem_fecha_cier,'%d-%m-%Y') AS 'Fecha_cierre', rem_obs AS 'Obs',df_cod_prod AS 'Codigo',df_descrip AS 'Descrip',df_disponible AS 'Cant_Env',enviado AS 'Enviado', kg_env,kg_rec, marcar AS 'Recibido' " 
	."from nota_remision LEFT JOIN remito_det ON nota_remision.rem_nro = remito_det.rem_nro LEFT JOIN mnt_prod ON remito_det.df_cod_prod = mnt_prod.p_cod "
	."WHERE nota_remision.rem_fecha_cier BETWEEN '$desde' AND '$hasta' AND nota_remision.rem_estado = 'Cerrada' "
	."AND nota_remision.rem_origen LIKE '$suco' AND nota_remision.rem_destino LIKE '$sucd' AND $criterio ORDER BY nota_remision.id ASC";

	/**"select r.rem_nro as Nro, date_format(rem_fecha,'%d-%m-%Y') as Fecha,rem_origen as Origen, rem_destino as Destino,rem_vend_cod as Usuario,rem_receptor as Receptor,DATE_FORMAT(rem_fecha_cier,'%d-%m-%Y') AS Fecha_cierre,"
        . " rem_obs AS Obs,df_cod_prod as Codigo,df_descrip as Descrip,df_disponible as Cant_Env,enviado as Enviado, kg_env,kg_rec, marcar as Recibido  from nota_remision r, remito_det d where r.rem_nro = d.rem_nro and r.rem_fecha_cier BETWEEN '$desde' and '$hasta' and r.rem_estado = 'Cerrada' and r.rem_origen like '$suco' and r.rem_destino like '$sucd' and $criterio order by r.id asc";*/

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
$subtotal0_kg_env = 0;
$subtotal0_kg_rec = 0;


//Define a Old Values Variables
$old['Nro'] = '';
$old['Fecha'] = '';
$old['Origen'] = '';
$old['Destino'] = '';
$old['Usuario'] = '';
$old['Receptor'] = '';
$old['Fecha_cierre'] = '';
$old['Obs'] = '';
$old['Codigo'] = '';
$old['Descrip'] = '';
$old['Cant_Env'] = '';
$old['Enviado'] = '';
$old['kg_env'] = '';
$old['kg_rec'] = '';
$old['Recibido'] = '';
$old['Padre'] = '';
$old['_Kg_'] = '';
$old['Tara'] = '';
$old['Ancho'] = '';
$old['Gramaje'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['Nro'] = $Q0->Record['Nro'];
    $el['Fecha'] = $Q0->Record['Fecha'];
    $el['Origen'] = $Q0->Record['Origen'];
    $el['Destino'] = $Q0->Record['Destino'];
    $el['Usuario'] = $Q0->Record['Usuario'];
    $el['Receptor'] = $Q0->Record['Receptor'];
    $el['Fecha_cierre'] = $Q0->Record['Fecha_cierre'];
    $el['Obs'] = $Q0->Record['Obs'];
    $el['Codigo'] = $Q0->Record['Codigo'];
    $el['Descrip'] = $Q0->Record['Descrip'];
    $el['Cant_Env'] = $Q0->Record['Cant_Env'];
    $el['Enviado'] = $Q0->Record['Enviado'];
    $el['kg_env'] = $Q0->Record['kg_env'];
    $el['kg_rec'] = $Q0->Record['kg_rec'];
    $el['Recibido'] = $Q0->Record['Recibido'];
	$el['Padre'] = $Q0->Record['Padre'];
	$el['_Kg_'] = $Q0->Record['_Kg_'];
	$el['Tara'] = $Q0->Record['Tara'];
	$el['Ancho'] = $Q0->Record['Ancho'];
	$el['Gramaje'] = $Q0->Record['Gramaje'];
	
	if($el['Padre'] != ""){
		$padre = "<a href='javascript:obtenerHijos(".$el['Padre'].")'>".$el['Padre']."</a>";
	}else{$padre="nulo";}
	

    // Preparing a template variables
    $T->Set('query0_Nro', $el['Nro']);
    $T->Set('query0_Fecha', $el['Fecha']);
    $T->Set('query0_Origen', $el['Origen']);
    $T->Set('query0_Destino', $el['Destino']);
    $T->Set('query0_Usuario', $el['Usuario']);
    $T->Set('query0_Receptor', $el['Receptor']);
    $T->Set('query0_Fecha_cierre', $el['Fecha_cierre']);
    $T->Set('query0_Obs', $el['Obs']);
    $T->Set('query0_Codigo', $el['Codigo']);
    $T->Set('query0_Descrip', $el['Descrip']);
    $T->Set('query0_Cant_Env', $el['Cant_Env']);
    $T->Set('query0_Enviado', $el['Enviado']);
    $T->Set('query0_kg_env', number_format($el['kg_env'],3,',','.'));
    $T->Set('query0_kg_rec', number_format($el['kg_rec'],3,',','.'));
	$T->Set('query0_kg_dif', number_format(($el['kg_rec']-$el['kg_env']),3,',','.'));
	$T->Set('query0_padre', $padre);
	$T->Set('query0__kg_', $el['_Kg_']);
	$T->Set('query0_tara', $el['Tara']);
	$T->Set('query0_ancho', $el['Ancho']);
	$T->Set('query0_gramaje', $el['Gramaje']);
    $T->Set('query0_Recibido', $el['Recibido']);
    
    if( $el['Nro']!=$old['Nro'] ){
        $T->Show('head');
    }


    // Calculating a subtotal
    $subtotal0_kg_env += 0 + $el['kg_env'];
    $subtotal0_kg_rec += 0 + $el['kg_rec'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_kg_env', number_format($subtotal0_kg_env,3,',','.'));
    $T->Set('subtotal0_kg_rec', number_format($subtotal0_kg_rec,3,',','.'));
    if( $el['Nro']!=$old['Nro'] && $old['Nro'] !='' ){
        //$T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_kg_env = 0;
        $subtotal0_kg_rec = 0;
    }
    
    //Actualize Old Values Variables
    $old['Nro'] = $el['Nro'];
    $old['Fecha'] = $el['Fecha'];
    $old['Origen'] = $el['Origen'];
    $old['Destino'] = $el['Destino'];
    $old['Usuario'] = $el['Usuario'];
    $old['Receptor'] = $el['Receptor'];
    $old['Fecha_cierre'] = $el['Fecha_cierre'];
    $old['Obs'] = $el['Obs'];
    $old['Codigo'] = $el['Codigo'];
    $old['Descrip'] = $el['Descrip'];
    $old['Cant_Env'] = $el['Cant_Env'];
    $old['Enviado'] = $el['Enviado'];
    $old['kg_env'] = $el['kg_env'];
    $old['kg_rec'] = $el['kg_rec'];
    $old['Recibido'] = $el['Recibido'];
	$old['Padre'] = $el['Padre'];
	$old['_Kg_'] = $el['_Kg_'];
	$old['Tara'] = $el['Tara'];
	$old['Ancho'] = $el['Ancho'];
	$old['Gramaje'] = $el['Gramaje'];
    $firstRow=false;

}

$endConsult = true;
if( $el['Nro']!=$old['Nro']&& $old['Nro'] !='' ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

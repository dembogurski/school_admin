<?php

/** Report prg file (ajustes_entrada)
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
 $T->Set( 'sup_f_cod', '9997314');
 $T->Set( 'sup_nombre_prov', 'PARAGUAY TEXTIL');
 $T->Set( 'sup_cant_aj', '0');
 $T->Set( 'sup_style', '');
 $T->Set( 'sup_tab0', '');
 $T->Set( 'sup_hfocus', 'false');
 $T->Set( 'sup_f_sql', 'RINDE POR KILO 2.3 METROS (MOLETINHO TUB)');
 $T->Set( 'sup_f_fecha', '2014-04-26');
 $T->Set( 'sup_descrip', 'TEJIDOS DEPORTIVOS-MOLETON--Algodon/poliester-Permanente-Rigido-Liso-BLANCO');
 $T->Set( 'sup_f_cant_comp', '10.00');
 $T->Set( 'sup_f_dest', '__NO DATA__');
 $T->Set( 'sup_p_suc', '06');
 $T->Set( 'sup_style0', '');
 $T->Set( 'sup_f_cant', '54.00');
 $T->Set( 'sup_diff', '54');
 $T->Set( 'sup_cant_real', '0.00');
 $T->Set( 'sup_diff2', '54');
 $T->Set( 'sup_ancho', '2.00');
 $T->Set( 'sup_kg', '12.30');
 $T->Set( 'sup_tara', '0.00');
 $T->Set( 'sup_style1', '');
 $T->Set( 'sup_style2', '');
 $T->Set( 'sup_style3', '');
 $T->Set( 'sup_style5', '');
 $T->Set( 'sup_tol', 'ERROR: Corte sobre tolerancia!');
 $T->Set( 'sup_errmsg', 'Codigo no se encuentra en Produccion!!!');
 $T->Set( 'sup_errmsgkg', 'Este rollo no tiene asingado el Kg.');
 $T->Set( 'sup_sign', '-');
 $T->Set( 'sup_oper', 'Disminucion en Entrada');
 $T->Set( 'sup_espacio', '');
 $T->Set( 'sup_aj_cant', 'false');
 $T->Set( 'sup_style8', '');
 $T->Set( 'sup_aj_admin', 'false');
 $T->Set( 'sup___reload', '');
 $T->Set( 'sup_select_text', '');
 $T->Set( 'sup_f_bloqueo', 'true');
 $T->Set( 'sup_setFocus', '');
 $T->Set( 'sup_msg', '( ! ) El codigo ya ha sido ajustado!!!');
 $T->Set( 'sup_style4', '');
 $T->Set( 'sup_style6', '');
 $T->Set( 'sup_style7', '');
 $T->Set( 'sup___local', '08');
 $T->Set( 'sup_ajuestes_ajax', '');

 */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p_cod as codigo, p_cant as Metros,prod_fin_pieza as Estado,p_ancho as Ancho,p_kg as Kg, p_tara as Tara,p_gram as Gramaje  FROM mnt_prod WHERE p_padre = '9997314' ";

$T -> Set('time', daytime());
$T -> Set('user', $Global['username']);

$firstRow = true;
$Q0 = $DB;
$Q0 -> Query($query0);

$padre = trim($sup['f_cod']);

$db = new Y_DB();
$db -> Database = 'marijoa';

$v = new Y_DB();
$v -> Database = 'marijoa';

$db -> Query("SELECT  p_kg,p_gram, p_ancho, p_cant_compra, c_nac_int FROM mnt_prod p, mov_compras c WHERE p.p_ref = c.c_ref AND p_cod = $padre");

$db -> NextRecord();

$kg = $db -> Record['p_kg'];
$kg_desc = $sup['kg_desc'];
$gramaje = $db -> Record['p_gram'];
$ancho = $db -> Record['p_ancho'];
$nacional_int = $db -> Record['c_nac_int'];

$kg_max = $kg_desc + ($kg_desc * 10 / 100);
$kg_min = $kg_desc - ($kg_desc * 10 / 100);

if ($kg == 0) {
	$T -> Show('warning');
	die();
}

if ($kg < $kg_min && $nacional_int == 'Internacional' && $kg_desc != '__NO DAT') {
	$T -> Set('kg_desc', $kg_desc);
	$T -> Set('p_kg', $kg);
	$T -> Show("warning_kg");
	die();
}
if ($kg > $kg_max && $nacional_int == 'Internacional' && $kg_desc != '__NO DAT') {
	$T -> Set('kg_desc', $kg_desc);
	$T -> Set('p_kg', $kg);
	$T -> Show("warning_kg");
	die();
}

$descrip = $sup['descrip'];
$cant_ini = $db -> Record['p_cant_compra'];

$T -> Set('kg', $kg);
$T -> Set('gramaje', $gramaje);
$T -> Set('ancho', $ancho);
$T -> Set('descrip', $descrip);
$T -> Set('cant_ini', $cant_ini);

$cant_piezas = $Q0 -> NumRows();
$T -> Set('cant_piezas', $cant_piezas);

// Starting a HTML
$T -> Show('general_header');
// Principal Header
$T -> Show('start_query0');
// Start a Table
$T -> Show('header0');
// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables

//Define a Old Values Variables
$old['codigo'] = '';
$old['Metros'] = '';
$old['Estado'] = '';
$old['Ancho'] = '';
$old['Kg'] = '';
$old['Tara'] = '';
$old['Gramaje'] = '';

$total = 0;
$ventas = 0;

// Making a rows of consult
while ($Q0 -> NextRecord()) {

	// Define a elements
	$el['codigo'] = $Q0 -> Record['codigo'];
	$el['Metros'] = $Q0 -> Record['Metros'];
	$el['Estado'] = $Q0 -> Record['Estado'];
	$el['Ancho'] = $Q0 -> Record['Ancho'];
	$el['Kg'] = $Q0 -> Record['Kg'];
	$el['Tara'] = $Q0 -> Record['Tara'];
	$el['Gramaje'] = $Q0 -> Record['Gramaje'];
	if ($el['Tara'] == null) {
		$el['Tara'] = 0;
	}
	$codigo = $el['codigo'];

	if ($codigo == $padre) {
		$T -> Set('fondo', '#DAA520');
		$T -> Set('boton_ajustar', '<input type="button" id="boton_ajustar" value="Ajuste Final" onclick="guardarAjustes()" disabled>');
		$T -> Set('read', '');
		$T -> Set('onkeyup', "onchange=setAjuste($codigo)");
		$T -> Set('back', "");
		$T -> Set('padre', 'padre');

		// Buscar Ventas

		$sqlv = "select sum(df_cantidad) as ventas from factura f, det_factura d where f.fact_nro = d.df_fact_num and d.df_cod_prod = '$codigo' and f.fact_estado = 'Cerrada'";
		$v -> Query($sqlv);
		if ($v -> NumRows() > 0) {
			$v -> NextRecord();
			$vent = $v -> Record['ventas'];
			$ventas += 0 + $vent;
		}

	} else {
		$T -> Set('fondo', 'white');
		$T -> Set('boton_ajustar', '<input type="button" id="boton_ajuste_' . $codigo . '" value="Ajustar" onclick="ajusteIndividual(' . $codigo . ')" disabled>');
		$T -> Set('read', 'readonly');
		$T -> Set('onkeyup', "onkeyup=setAjusteHijo($codigo)");
		$T -> Set('back', "style='background:#E8E8E8'");
		$T -> Set('padre', '');
	}

	// Preparing a template variables
	$T -> Set('query0_codigo', $el['codigo']);
	$T -> Set('query0_Metros', $el['Metros']);
	$T -> Set('query0_Estado', $el['Estado']);
	$T -> Set('query0_Ancho', $el['Ancho']);
	$T -> Set('query0_Kg', $el['Kg']);
	$T -> Set('query0_Tara', $el['Tara']);
	$T -> Set('query0_Gramaje', $el['Gramaje']);

	$total += 0 + $el['Metros'];

	$T -> Show('query0_data_row');

	// Buscar Hijos si es que no son del Padre en cuestion o sea buscar los nietos
	if ($codigo != $padre) {
		$qHijos = "SELECT p_cod as codigo, p_cant as Metros,prod_fin_pieza as Estado,p_ancho as Ancho,p_kg as Kg, p_tara  as Tara,p_gram as Gramaje  FROM mnt_prod WHERE p_padre = $codigo";
		$db -> Query($qHijos);
		if ($db -> NumRows() > 0) {
			while ($db -> NextRecord()) {
				$codigo_hijo = $db -> Record['codigo'];
				$cant_hijo = $db -> Record['Metros'];
				$tara_hijo = $db -> Record['Tara'];
				$gramaje_hijo = $db -> Record['Gramaje'];
				$kg_hijo = $db -> Record['Kg'];
				$ancho_hijo = $db -> Record['Ancho'];
				$estado_hijo = $db -> Record['Estado'];

				$total += 0 + $cant_hijo;

				$T -> Set('query0_codigo', $codigo_hijo);
				$T -> Set('query0_Metros', $cant_hijo);
				$T -> Set('query0_Estado', $estado_hijo);
				$T -> Set('query0_Ancho', $ancho_hijo);
				$T -> Set('query0_Kg', $kg_hijo);
				if ($tara_hijo == null) {
					$tara_hijo = 0;
				}
				$T -> Set('query0_Tara', $tara_hijo);
				$T -> Set('query0_Gramaje', $gramaje_hijo);
				$T -> Show('hijos');
			}
			$T -> Show('vacio');
		}
	}

	//Actualize Old Values Variables
	$old['codigo'] = $el['codigo'];
	$old['Metros'] = $el['Metros'];
	$old['Estado'] = $el['Estado'];
	$old['Ancho'] = $el['Ancho'];
	$old['Kg'] = $el['Kg'];
	$old['Tara'] = $el['Tara'];
	$old['Gramaje'] = $el['Gramaje'];
	$firstRow = false;

}
$total_metros = $total + $ventas;

$T -> Set('ventas', number_format($ventas, 2, ',', '.'));
$T -> Set('total', number_format($total_metros, 2, ',', '.'));

$endConsult = true;
if (true) {
	$T -> Show('query0_subtotal_row');
}
// Show total
if (true) {
	$T -> Show('query0_total_row');
}
$T -> Show('end_query0');
// Ends a Table
?>

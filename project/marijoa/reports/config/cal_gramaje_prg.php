<?php
//require_once("include/Productos.php");
/** Report prg file (cal_gramaje) 
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
  $T->Set( 'sup_codigo', '5760914');
  $T->Set( 'sup_gen_rep', '');

 */
// ------------------------------------------
// THIS IS YOUR FIRST QUERY:
// Starting a HTML
$T->Set('time', daytime());
$T->Set('user', $Global['username']);
//$producto = new Producto("11506014");
//$T->Set('producto', json_encode($producto->getFullInfo()));
$T->Show('variables');
$T->Show('general_header');   // Principal Header
$T->Set('option',getTaras());
$T->Show('popup');
$T->Show('start_query0');   // Start a Table 
$T->Show('header0');


$db = new Y_DB();
$db->Database = 'marijoa';
$db2 = new Y_DB();
$db2->Database = 'marijoa';
$local = $sup['localidad'];
$codigo = $sup['codigo'];
$T->Set('suc', $local);
$raw_cod = array_filter(array_map("trim", explode(",", $codigo)));
$codigos = array_map("trim", $raw_cod);
$cod_list = array();
$clean_list = array();
$Q3 = $DB;
$Q4 = $DB;
//Busca parientes si figura ene le packing_list.
$debug = "";
$nivel = 0;
$imp_cods = array();
foreach ($codigos as $cod) {
    $cod_tmp = $cod;
    $proc = "";
    $cod_padre = "";
    $nieto = false;

    do {
        $Q3->Query("select m.c_nac_int,p.p_padre from mnt_prod p inner join mov_compras m  on p.p_ref = m.c_ref where c_ref = (select p_ref from mnt_prod where p_cod = $cod_tmp) and p_cod = '$cod_tmp' ");

        if ($Q3->NumRows() > 0) {
            $Q3->NextRecord();
            $proc = $Q3->Record['c_nac_int'];
            if ($proc === 'Internacional') {
                $cod_padre = $Q3->Record['p_padre'];
                $Q4->Query("select p_kg_real from packing_list where p_cod = '$cod_tmp'");
                if ($Q4->NumRows() > 0) {
                    $Q4->NextRecord();
                    $kg_real = $Q4->Record['p_kg_real'];
                    if ($kg_real > 0 || trim($kg_real) !== "") {
                        if ($nieto) {
                            if (!in_array($cod_tmp, $imp_cods)) {
                                array_push($cod_list, array("cod" => $cod_tmp, "packing_list" => "Si", "nieto" => $cod));
                                array_push($imp_cods, $cod_tmp);
                            }
                        } else {
                            if (!in_array($cod_tmp, $imp_cods)) {
                                array_push($cod_list, array("cod" => $cod_tmp, "packing_list" => "Si", "nieto" => ""));
                                array_push($imp_cods, $cod_tmp);
                            }
                        }
                        $cod_tmp = 0;
                    }
                } else {
                    if (trim($cod_padre) !== '') {
                        if ($nivel > 0) {
                            $nieto = true;
                        }
                        $cod_tmp = $cod_padre;
                        $nivel ++;
                    } else {
                        array_push($cod_list, array("cod" => $cod, "packing_list" => "No", "nieto" => ""));
                        array_push($imp_cods, $cod_tmp);
                        $cod_tmp = 0;
                    }
                }
            } else {
                array_push($cod_list, array("cod" => $cod_tmp, "packing_list" => "No", "nieto" => ""));
                array_push($imp_cods, $cod_tmp);
                $cod_tmp = 0;
            }
        } else {
            $cod_tmp = 0;
        }
    } while ($cod_tmp !== 0);
}

foreach ($cod_list as $cod) {
    if ($cod['packing_list'] == "Si") {
        if ($cod['nieto'] == "") {
            $query0 = "SELECT p_cod,  p_padre, p_cant, p_cant_compra,p_gram,p_gram_m , p_ancho, p_kg, p_tara FROM mnt_prod WHERE p_cod = '" . $cod['cod'] . "'  OR p_padre = '" . $cod['cod'] . "' ";
        } else {
            $query0 = "SELECT p_cod,  p_padre, p_cant, p_cant_compra,p_gram,p_gram_m , p_ancho, p_kg, p_tara FROM mnt_prod WHERE p_cod = '" . $cod['cod'] . "'  OR p_cod = '" . $cod['nieto'] . "'  OR p_padre = '" . $cod['cod'] . "' ";
        }
        $T->Set('gramc', $cod['cod']);
    } else {
        $query0 = "SELECT p_cod,  p_padre, p_cant, p_cant_compra,p_gram,p_gram_m , p_ancho, p_kg, p_tara FROM mnt_prod WHERE p_cod = '" . $cod['cod'] . "'";
    }

    $Q0 = $DB;
    $Q0->Query($query0);

    // Show Header
    //Define a  variable
    $endConsult = false;
    //Define a Total Variables
    //Define a Subtotal Variables
    //Define a Old Values Variables
    $old['p_cod'] = '';
    $old['p_padre'] = '';
    $old['p_cant'] = '';
    $old['p_cant_compra'] = '';
    $old['p_gram'] = '';
    $old['p_gram_m'] = '';
    $old['p_ancho'] = '';
    $old['p_kg'] = '';
    $old['p_tara'] = '';


    $cant_compra_padre = 0;
    $sumatoria_fracciones = 0;
    $tara = 0;
    $ajustes = 0;
    $kg = 0;
    $gramaje_calc = 0;
    $ancho = 0;
    $fue_ajustado = 'No';
    // Making a rows of consult

    while ($Q0->NextRecord()) {
        // Define a elements
        $el['p_cod'] = $Q0->Record['p_cod'];
        $el['p_padre'] = $Q0->Record['p_padre'];
        $el['p_cant'] = $Q0->Record['p_cant'];
        $el['p_cant_compra'] = $Q0->Record['p_cant_compra'];
        $el['p_gram'] = $Q0->Record['p_gram'];
        $el['p_gram_m'] = $Q0->Record['p_gram_m'];
        $el['p_ancho'] = $Q0->Record['p_ancho'];
        $el['p_kg'] = $Q0->Record['p_kg'];
        $el['p_tara'] = $Q0->Record['p_tara'];

        // Preparing a template variables
        $T->Set('query0_p_cod', $el['p_cod']);
        $T->Set('query0_p_padre', $el['p_padre']);
        $T->Set('query0_p_cant', $el['p_cant']);
        $T->Set('query0_p_cant_compra', $el['p_cant_compra']);
        $T->Set('query0_p_gram', $el['p_gram']);
        $T->Set('fue_regramado', checkGramMod($el['p_cod']));
        $T->Set('query0_p_gram_m', $el['p_gram_m']);
        $T->Set('query0_p_ancho', $el['p_ancho']);
        $T->Set('query0_p_kg', $el['p_kg']);
        $T->Set('query0_p_tara', $el['p_tara']);

        $p_cod = $el['p_cod'];
        $tara = $el['p_tara'];

        if (in_array(trim($p_cod), $codigos)) {
            $T->Set('principal', 'principal');
        } else {
            $T->Set('principal', '');
        }

        $db->Query("select p_kg_real from packing_list where p_cod = $p_cod");
        if ($db->NumRows() > 0) { // Es rollo y esta en el Packing
            $db->NextRecord();
            $kg_desc = $db->Record['p_kg_real'];
            $T->Set('kg_desc', $kg_desc); //$el['p_kg']
            $T->Set("primero", "primero");
            $kg = $el['p_kg'];
            $ancho = $el['p_ancho'];
            $db2->Query("SELECT aj_signo,aj_ajuste FROM mnt_ajustes WHERE aj_prod = '$p_cod'   AND (aj_oper = 'Aumento en Entrada' OR aj_oper = 'Disminucion en Entrada')");
            if ($db2->NumRows() > 0) {
                $db2->NextRecord();
                $signo = $db2->Record['aj_signo'];
                $aj_ajuste = $db2->Record['aj_ajuste'];
                if ($signo == '-') {
                    $ajustes = $aj_ajuste * -1;
                }
                $fue_ajustado = 'Si';
            } else {
                $ajustes = 0;
                $fue_ajustado = 'No';
            }
            $cant_compra_padre = $el['p_cant_compra'];
            $T->Set('tiene_ajustes', $fue_ajustado);
            $T->Set('ajustes', $ajustes);
        } else {
            $T->Set('kg_desc', 0);
            $T->Set("primero", "");
            $sumatoria_fracciones += 0 + $el['p_cant_compra'];
            $db2->Query("SELECT aj_signo,aj_ajuste FROM mnt_ajustes WHERE aj_prod = '$p_cod'   AND (aj_oper = 'Aumento en Entrada' OR aj_oper = 'Disminucion en Entrada')");
            $ajustesh = 0;
            if ($db2->NumRows() > 0) {
                $db2->NextRecord();
                $signo = $db2->Record['aj_signo'];
                $aj_ajuste = $db2->Record['aj_ajuste'];

                if ($signo == '-') {
                    $ajustesh = $ajustesh * -1;
                }
                $fue_ajustado = 'Si';
            } else {
                $ajustesh = 0;
                $fue_ajustado = 'No';
            }
            $T->Set('tiene_ajustes', $fue_ajustado);
            $T->Set('ajustes', $ajustesh . "&nbsp;");
        }
        // Calculating a total
        // Calculating a subtotal

        $T->Show('query0_data_row');


        //Actualize Old Values Variables
        $old['p_cod'] = $el['p_cod'];
        $old['p_padre'] = $el['p_padre'];
        $old['p_cant'] = $el['p_cant'];
        $old['p_cant_compra'] = $el['p_cant_compra'];
        $old['p_gram'] = $el['p_gram'];
        $old['p_gram_m'] = $el['p_gram_m'];
        $old['p_ancho'] = $el['p_ancho'];
        $old['p_kg'] = $el['p_kg'];
        $old['p_tara'] = $el['p_tara'];
        //$firstRow=false;
    }

    $MtsTotal = $cant_compra_padre + $ajustes;
    $LxA = ($MtsTotal * $ancho) | 1;

    $gramaje_calc = ($kg * 1000) / ($LxA);


    $T->Set('total_mts', $MtsTotal);
    $T->Set('gramaje_calc', number_format($gramaje_calc, 2, '.', ','));

    $T->Show('query0_total_row');
}

$endConsult = true;

// Show total
if (true) {
    $T->Show('query0_total_row');
}
$T->Show('end_query0');    // Ends a Table 

function getTaras(){
	 $q = new Y_DB();$q->Database = 'marijoa';
	 $q->Query("SELECT * FROM taras order by gramos asc");
	 $op = '';
	 while($q->NextRecord()){
		 $op .= "<option value='".$q->Record['gramos']."'>".$q->Record['gramos']." - ".$q->Record['descrip']."</option>";
	 }
	 return $op;
}
// Verifica regramados anteriores
function checkGramMod($cod){
	 $q = new Y_DB();$q->Database = 'marijoa';
	 $q->Query("SELECT count(*) as modded FROM _audit_log_ WHERE accion = 'MOD_GRAMAJE' and descrip regexp '$cod';");
	 $q->NextRecord();
	 $res =$q->Record['modded'];
	 return ($res>0)?"Si: $res":'No';
}
?>

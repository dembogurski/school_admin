<?php

/** Report prg file (orden_pago) 
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
  $T->Set( 'sup_chq_cta', '01-10-7051953');
  $T->Set( 'sup_chq_bco', '1');
  $T->Set( 'sup_chq_moneda', 'G$');
  $T->Set( 'sup_chq_hoy', '20120529');
  $T->Set( 'sup_chq_num', 'D-18608280');
  $T->Set( 'sup_chq_estado', 'Emitido');
  $T->Set( 'sup_chq_fecha_emis', '2012-05-29');
  $T->Set( 'sup___diffdate', '1155');
  $T->Set( 'sup_chq_fecha_pag', '2012-06-15');
  $T->Set( 'sup___diffdate2', '1172');
  $T->Set( 'sup_chq_valor', '180960400.00');
  $T->Set( 'sup_es', 'S');
  $T->Set( 'sup_busc_conc', '');
  $T->Set( 'sup_concepto_princ', '114');
  $T->Set( 'sup_chq_conc', '114-1');
  $T->Set( 'sup_c_gasto', 'Si');
  $T->Set( 'sup_empr', '03');
  $T->Set( 'sup_depar', 'Dpto. Finanzas');
  $T->Set( 'sup_chq_benef', 'ROLAND S.A.C.');
  $T->Set( 'sup_chq_ci', '8754662-8');
  $T->Set( 'sup_chq_mens', '');
  $T->Set( 'sup_chq_ref', '');
  $T->Set( 'sup___disableAccept', 'true');
  $T->Set( 'sup___enableAccept', 'true');
  $T->Set( 'sup_chq_compl', 'Pago sobre facturas 7522256-5584-21122-11222');
  $T->Set( 'sup_chq_guardar', 'true');
  $T->Set( 'sup_chq_ord_impr', '');

 */
// ------------------------------------------
// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT o_ref AS NRO,o_benef AS BENEF,o_ci AS RUC,DATE_FORMAT(o_fecha,"%d-%m-%Y") AS FECHA, o_chq AS CHEQUE,o_bco AS BANCO,o_conc AS CONCEPTO,o_cta AS CTA, o_moneda AS MONEDA, o_monto AS MONTO FROM  orden_pago   WHERE o_chq = 'D-18608280' ";

$T->Set('time', daytime());
$T->Set('user', $Global['username']);

$firstRow = true;
$Q0 = $DB;
$Q0->Query($query0);

$suc = $sup['empr'];

// Starting a HTML
// Show Header
//Define a  variable
$endConsult = false;
//Define a Total Variables
//Define a Subtotal Variables


$db = new Y_DB();
$db->Database = 'marijoa';
$db->Query("SELECT emp_nombre AS SUCX FROM par_empresas WHERE emp_cod = '$suc'");
$db->NextRecord();
$nombre_suc = $db->Record['SUCX'];
$T->Set('nombre_suc', $nombre_suc);



//Define a Old Values Variables
$old['NRO'] = '';
$old['BENEF'] = '';
$old['RUC'] = '';
$old['FECHA'] = '';
$old['CHEQUE'] = '';
$old['BANCO'] = '';
$old['CONCEPTO'] = '';
$old['CTA'] = '';
$old['MONEDA'] = '';
$old['MONTO'] = '';

// Making a rows of consult
while ($Q0->NextRecord()) {

    // Define a elements
    $el['NRO'] = $Q0->Record['NRO'];
    $el['BENEF'] = $Q0->Record['BENEF'];
    $el['RUC'] = $Q0->Record['RUC'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['CHEQUE'] = $Q0->Record['CHEQUE'];
    $el['BANCO'] = $Q0->Record['BANCO'];
    $el['CONCEPTO'] = $Q0->Record['CONCEPTO'];
    $el['CTA'] = $Q0->Record['CTA'];
    $el['MONEDA'] = $Q0->Record['MONEDA'];
    $el['MONTO'] = $Q0->Record['MONTO'];

    $concepto = strtoupper($el['CONCEPTO'] . "................");
    for ($i = 0; $i < 480; $i++) {
        if ($i % 120 == 0) {
            $concepto = $concepto . "<br>";
        } else {
            $concepto = $concepto . "&nbsp;";
        }
    }
    
    // Fecha Pago
    $chq = $el['CHEQUE'];
    $db->Query("SELECT date_format(chq_fecha_emis,'%d-%m-%Y') AS FECHA_EMIS, date_format(chq_fecha_pag,'%d-%m-%Y') as FECHA_PAGO FROM bcos_chq WHERE chq_num  =  '$chq'");
    $db->NextRecord();
    $fecha_pago= $db->Record['FECHA_PAGO'];
    $fecha_emis= $db->Record['FECHA_EMIS'];
    $T->Set('fecha_pago', $fecha_pago);

    // Preparing a template variables
    $T->Set('query0_NRO', $el['NRO']);
    $T->Set('query0_BENEF', $el['BENEF']);
    $T->Set('query0_RUC', $el['RUC']);
    $T->Set('query0_FECHA', $fecha_emis);
    $T->Set('query0_CHEQUE', $el['CHEQUE']);
    $T->Set('query0_BANCO', $el['BANCO']);
    $T->Set('query0_CONCEPTO', $concepto);
    $T->Set('query0_CTA', $el['CTA']);
    $T->Set('query0_MONEDA', $el['MONEDA']);
    $monto = $el['MONTO'];


    if ($el['MONEDA'] === 'G$') {
        $monto = number_format($el['MONTO'], 0, ',', '.');
        $monto_en_letras = extense($el['MONTO'], 0);
        $mon = 'GUARANIES';
    } else {
        $monto = number_format($el['MONTO'], 2, ',', '.');
        $monto_en_letras = extense($el['MONTO'], 1);
        $monto_en_letras = str_replace("DOLARES", "", $monto_en_letras);
        $monto_en_letras = str_replace("GUARANIES", "DOLARES", $monto_en_letras);

        $mon = '';
    }

    $T->Set('query0_MONTO', $monto);
    $T->Set('mon', $mon);


    $T->Set('letras', $monto_en_letras);





    $T->Show('general_header');   // Principal Header
    $T->Show('start_query0');   // Start a Table 
    $T->Show('header0');

    $T->Show('query0_data_row');
    // Show Subtotal
    if (true) {
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    $T->Show('total');

    //Actualize Old Values Variables
    $old['NRO'] = $el['NRO'];
    $old['BENEF'] = $el['BENEF'];
    $old['RUC'] = $el['RUC'];
    $old['FECHA'] = $el['FECHA'];
    $old['CHEQUE'] = $el['CHEQUE'];
    $old['BANCO'] = $el['BANCO'];
    $old['CONCEPTO'] = $el['CONCEPTO'];
    $old['CTA'] = $el['CTA'];
    $old['MONEDA'] = $el['MONEDA'];
    $old['MONTO'] = $el['MONTO'];
    $firstRow = false;
}

$endConsult = true;

// Show total
if (true) {
    $T->Show('query0_total_row');
}
$T->Show('end_query0');    // Ends a Table 
?>

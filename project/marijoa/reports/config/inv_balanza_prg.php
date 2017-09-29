<?php

/** Report prg file (inv_balanza) 
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
  $T->Set( 'sup_usuario', 'Developer');
  $T->Set( 'sup___local', '00');
  $T->Set( 'sup___lock', 'true');
  $T->Set( 'sup_gen_rep', '');

 */
// ------------------------------------------
// THIS IS YOUR FIRST QUERY:
//$query0 = "select 1";

$T->Set('time', daytime());
$T->Set('user', $Global['username']);

function getIP() {
    if (isset($_SERVER)) {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    } else {
        if (isset($GLOBALS['HTTP_SERVER_VARS']['HTTP_X_FORWARDER_FOR'])) {
            return $GLOBALS['HTTP_SERVER_VARS']['HTTP_X_FORWARDED_FOR'];
        } else {
            return $GLOBALS['HTTP_SERVER_VARS']['REMOTE_ADDR'];
        }
    }
}

$ip = getIP();
$T->Set('ip',$ip);


$firstRow = true;
$Q0 = $DB;
$Q0->Query('SELECT descrip,cm,gramos FROM taras order by gramos asc');

// Starting a HTML
$T->Show('general_header');   // Principal Header
$T->Show('start_query0');   // Start a Table 
$T->Show('header0');    // Show Header
// Making a rows of consult
//$taras = '<select id="taras" onchange="setTaras()" style="font-size:15px;height:22px;">';
$taras = '<select id="taras" onchange="calcCantReal()" style="font-size:15px;height:22px;">';
$i = 0;
while ($Q0->NextRecord()) {
    // Define a elements
    $tara_desc = $Q0->Record['descrip'];
    $tara_cm = $Q0->Record['cm'];
    $tara_gramos = $Q0->Record['gramos'];
    //$taras.="<option value='$tara_cm|$tara_gramos'   style='font-size:15px;height:22px; '>$tara_gramos Gr. - $tara_desc</option>";
    $taras.="<option value='$tara_gramos'   style='font-size:15px;height:22px; '>$tara_gramos Gr. - $tara_desc</option>";
    if ($i == 0) {
        $T->Set('largo', $tara_cm);
        $T->Set('tara', $tara_gramos);
    }
    $i++;
}
$taras.="</select>";

$T->Set('taras', $taras);

$T->Show('query0_data_row');


if (true) {
    $T->Show('query0_subtotal_row');
}
// Show total
if (true) {
    $T->Show('query0_total_row');
}
$T->Show('end_query0');    // Ends a Table 
?>

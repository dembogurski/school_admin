<?php

/** Report prg file (impr_cheques) 
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
$T->Set( 'sup_chq_hoy', '20110525');
$T->Set( 'sup_chq_bco', '1');
$T->Set( 'sup_chq_moneda', 'G$');
$T->Set( 'sup_chq_num', 'D-12956392');
$T->Set( 'sup_chq_estado', 'Emitido');
$T->Set( 'sup_chq_fecha_emis', '2011-05-25');
$T->Set( 'sup___diffdate', '785');
$T->Set( 'sup_chq_fecha_pag', '2011-11-29');
$T->Set( 'sup___diffdate2', '972');
$T->Set( 'sup_chq_valor', '500000.00');
$T->Set( 'sup_es', 'S');
$T->Set( 'sup_busc_conc', 'pago a p');
$T->Set( 'sup_concepto_princ', '114');
$T->Set( 'sup_chq_conc', '114-3');
$T->Set( 'sup_c_gasto', 'No');
$T->Set( 'sup_empr', '01');
$T->Set( 'sup_depar', 'Dpto. Comercial');
$T->Set( 'sup_benef', 'par');
$T->Set( 'sup_chq_benef', 'PARAGUAY TEXTIL');
$T->Set( 'sup_chq_x_factura', 'No');
$T->Set( 'sup_chq_mens', '');
$T->Set( 'sup_chq_ref', '');
$T->Set( 'sup___disableAccept', 'true');
$T->Set( 'sup___enableAccept', 'true');
$T->Set( 'sup_chq_compl', '');
$T->Set( 'sup_imprimir', '');
 *
 * 
 */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT f.chq_formato as FORMATO  FROM chq_formatos f, bcos_chq c WHERE c.chq_formato = f.chq_cod AND  chq_num = 'D-12956392' ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$months = array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio",
                "08"=>"Agosto","09"=>"Setiempre","10"=>"Octubre","11"=>"Noviembre","12"=>"Diciembre");

$dia_emis = substr($sup['chq_fecha_emis'],8,2);
$mes_emis = substr($sup['chq_fecha_emis'],5,2);
$anio_emis= substr($sup['chq_fecha_emis'],0,4);

// Fecha pago
$dia_pag = substr($sup['chq_fecha_pag'],8,2);
$mes_pag = substr($sup['chq_fecha_pag'],5,2);
$anio_pag= substr($sup['chq_fecha_pag'],0,4);

/*Orden de*/
$beneficiario = strtoupper( $sup['chq_benef'] );


//$T->Set('sup_fact_fecha',$data_ini);



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


//Define a Old Values Variables
$old['FORMATO'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FORMATO'] = $Q0->Record['FORMATO'];
    $formato = $el['FORMATO'];

    $guion = str_replace("_", " ", $formato);
     
    $guion = str_replace("[DIA]", $dia_emis, $guion);
    $guion = str_replace("[MES]",$months[$mes_emis], $guion);
    $guion = str_replace("[ANIO]",$anio_emis, $guion);

    /*Fecha Pago*/
    $guion = str_replace("[DIAP]", $dia_pag, $guion);
    $guion = str_replace("[MESP]", $months[$mes_pag], $guion);
    $guion = str_replace("[ANIOP]",$anio_pag, $guion);

    $guion = str_replace("[ORDEN-DE]",$beneficiario, $guion);

    $VALOR = number_format($sup['chq_valor'],0,',','.');
    $LETRAS = extense($sup['chq_valor']);

    $guion = str_replace("[ORDEN-DE]",$beneficiario, $guion);
    $guion = str_replace("[EN-LETRAS]",$LETRAS.' Gs.', $guion);
    $guion = str_replace("[MONTO]",$VALOR." ~~~", $guion);

    echo "<tr>  <td>  $guion    </td> <tr>  ";


    $salida = shell_exec("echo $guion > /dev/lp0");
    exec('echo "----------------" > /dev/lp0');

    $T->Set('query0_FORMATO_CHEQUE', $guion);
 
    $T->Set('query0_FORMATO', $el['FORMATO']);


    $T->Show('query0_data_row');


}



?>

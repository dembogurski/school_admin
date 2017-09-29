<?php

/** Report prg file (autorizacion) 
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
$T->Set( 'sup_dp_fact_nro', '877365');
$T->Set( 'sup_dp_local', '02');
$T->Set( 'sup_dp_count_det', '0');
$T->Set( 'sup_dp_cli', 'Dionicio Saucedo G. ');
$T->Set( 'sup_dp_lock', 'true');
$T->Set( 'sup_dp_efectivo', '0.00');
$T->Set( 'sup_dp_moneda', '');
$T->Set( 'sup_dp_cotiz', '1');
$T->Set( 'sup_dp_otra_moneda', '29400');
$T->Set( 'sup_dp_moneda_ref', '0');
$T->Set( 'sup_dp_msg', 'Rellene los datos abajo si el cliente compra con convenio. Caso contrario deje en blanco...');
$T->Set( 'sup_dp_conv', '');
$T->Set( 'sup_dp_porc', '');
$T->Set( 'sup_dp_conv_tipo', '');
$T->Set( 'sup_dp_nro_orden', '');
$T->Set( 'sup_cp_cant_cts', '0');
$T->Set( 'sup_dp_cuentas', '');
$T->Set( 'sup_dp_dias_acr', '0');
$T->Set( 'sup_dp_cuotas', '');
$T->Set( 'sup_dp_print_aut', 'Unipersonal');
$T->Set( 'sup_imprimir_auth', '');
$T->Set( 'sup_dp_print', 'No');
$T->Set( 'sup_nro_pg', '');
$T->Set( 'sup_imprimir_pg', '');
$T->Set( 'sup_cheq_terceros', '');
$T->Set( 'sup_dp_pagares', '');
$T->Set( 'sup_dp_sum', '');
$T->Set( 'sup_dp_tmp', '');
$T->Set( 'sup_dp_suma', '0');
$T->Set( 'sup_dp_total_pagar', '29400');
$T->Set( 'sup_dp_total', '0');
$T->Set( 'sup_dp_faltante', '29400');
$T->Set( 'sup_dp_vuelto', '0');
$T->Set( 'sup_dp_informe', 'Faltante  29400');
$T->Set( 'sup_dp_finalizar', 'false');
$T->Set( 'sup_dp_insertar', '');
$T->Set( 'sup___goBack2', '');
$T->Set( 'sup_dp_ci', '1923809');

*/
// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT cli_ci AS CI, cli_fullname AS CLIENTE, cli_tel1 AS TEL, cli_dir AS DIR, pais AS PAIS, dep_estado AS ESTADO FROM mnt_cli WHERE cli_ci = '1923809'     LIMIT 1";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
//$Q0->Query( $query0 );

$REF = $sup['dp_fact_nro'];    

$Q = new Y_DB();
$Q->Database = $Global['project'];

$dia_hoy = date("d");
$este_mes = date("m");
$este_anio = date("Y");

$SUC = $sup['dp_local'];

$tipo = $sup['dp_print_aut'];
if($tipo=="Unipersonal"){
    $T->Set('mi_nos',"mi");
    $T->Set('mi_nos2',"mias");
    $T->Set('otor',"otorgo");
    $T->Set('rec',"reclamarme");
}else{
    $T->Set('mi_nos',"nuestro");
    $T->Set('mi_nos2',"nuestra");
    $T->Set('otor',"otorgamos");
    $T->Set('rec',"reclamarnos");
}

//Unipersonal


$DENOMINACION = 'Comercial & Industrial Marijoa S.R.L.';
$RUC = '80027779-1';

if($SUC == '01' || $SUC == '06' ){
  $DENOMINACION = 'Marijoa S.R.L.';
  $RUC = '80001404-9';
}else{
  $DENOMINACION = 'Comercial & Industrial Marijoa S.R.L.';
  $RUC = '80027779-1';
}

$Q->Query("select f.fact_cli_ci AS CI FROM   factura f WHERE  f.fact_nro AND  fact_nro = $REF  LIMIT 1");
$Q->NextRecord();
$CI = $Q->Record['CI'];   
$T->Set('ruc',$RUC);

$Q->Query("SELECT upper(cli_fullname) as cli_fullname,cli_tel1,upper(cli_dir) as cli_dir,upper(ciudad) as ciudad  FROM mnt_cli WHERE cli_ci = '$CI' limit 1");
$Q->NextRecord();
$CLIENTE = $Q->Record['cli_fullname'];
$TEL = $Q->Record['cli_tel1'];
$DIR = $Q->Record['cli_dir'];
$CIUDAD = $Q->Record['ciudad'];

$doc =  str_replace("*","",$CI);	

$T->Set('ci',$doc);
$T->Set('cliente',$CLIENTE);
$T->Set('tel',$TEL);
$T->Set('dir',$DIR);
$T->Set('ciudad',$CIUDAD);
 

$Q->Query("SELECT emp_dir, emp_ciudad FROM par_empresas WHERE emp_cod = '$SUC' limit 1");
$Q->NextRecord();
$CIU = $Q->Record['emp_ciudad'];
$EMP_DIR = $Q->Record['emp_dir'];
$T->Set('emp_ciu',$CIU);

$EMP_DIR = str_replace("é","&eacute;",$EMP_DIR);
$EMP_DIR = str_replace("ñ","&ntilde;",$EMP_DIR);

$T->Set('emp_dir',$EMP_DIR);


$meses = array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio",
                   "08"=>"Agosto","09"=>"Setiembre","10"=>"Octubre","11"=>"Noviembre","12"=>"Diciembre"); 

     
    $T->Set('dia_hoy',$dia_hoy);
    $T->Set('este_anio',$este_anio);
    $T->Set('este_mes',$meses[$este_mes]);
    $T->Set('denominacion',$DENOMINACION);

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

 
 /*

    // Define a elements
    $el['CI'] = $Q0->Record['CI'];
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['TEL'] = $Q0->Record['TEL'];
    $el['DIR'] = $Q0->Record['DIR'];
    $el['PAIS'] = $Q0->Record['PAIS'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];

    // Preparing a template variables
    $T->Set('query0_CI', $el['CI']);
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_TEL', $el['TEL']);
    $T->Set('query0_DIR', $el['DIR']);
    $T->Set('query0_PAIS', $el['PAIS']);
    $T->Set('query0_ESTADO', $el['ESTADO']);*/

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
 
 

 
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

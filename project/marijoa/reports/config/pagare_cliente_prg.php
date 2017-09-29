<?php

/** Report prg file (pagare_cliente) 
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
$T->Set( 'sup_dp_fact_nro', '823256');
$T->Set( 'sup_dp_local', '02');
$T->Set( 'sup_dp_count_det', '0');
$T->Set( 'sup_dp_cli', 'PEDRO NOLASCO VERA BENITEZ');
$T->Set( 'sup_dp_lock', 'true');
$T->Set( 'sup_dp_efectivo', '0.00');
$T->Set( 'sup_dp_moneda', '');
$T->Set( 'sup_dp_cotiz', '1');
$T->Set( 'sup_dp_otra_moneda', '32300');
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
$T->Set( 'sup_dp_print', 'Si');
$T->Set( 'sup_nro_pg', '1');
$T->Set( 'sup_imprimir_pg', '');
$T->Set( 'sup_cheq_terceros', '');
$T->Set( 'sup_dp_pagares', '');
$T->Set( 'sup_dp_sum', '');
$T->Set( 'sup_dp_tmp', '');
$T->Set( 'sup_dp_suma', '64600');
$T->Set( 'sup_dp_total_pagar', '32300');
$T->Set( 'sup_dp_total', '64600');
$T->Set( 'sup_dp_faltante', '-32300');
$T->Set( 'sup_dp_vuelto', '32300');
$T->Set( 'sup_dp_informe', 'Vuelto 32300');
$T->Set( 'sup_dp_finalizar', 'false');
$T->Set( 'sup_dp_insertar', '');
$T->Set( 'sup___goBack2', '');  */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT pg_ref AS REF,pg_nro AS NRO,  pg_monto AS MONTO,DATE_FORMAT(pg_fecha,"%d") AS DIA_VENC, DATE_FORMAT(pg_fecha,"%m") AS MES_VENC,DATE_FORMAT(pg_fecha,"%Y") AS ANIO_VENC FROM pagares WHERE  pg_ref = '823256'  AND pg_nro = '1' ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$REF = $sup['dp_fact_nro'];

$Q = new Y_DB();
$Q->Database = $Global['project'];
$Q->Query("SELECT count(id) as cant FROM cuotas c WHERE c.ct_ref = $REF LIMIT 1");
$Q->NextRecord();
$BARRA = $Q->Record['cant'];
$T->Set('barra',$BARRA);

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

$Q->Query("select fact_fecha from factura where fact_nro = '$REF'");
$Q->NextRecord();
$FECHA_EMI = explode("-",$Q->Record['fact_fecha']);

$dia_hoy = $FECHA_EMI[2];
$este_mes = $FECHA_EMI[1];
$este_anio = $FECHA_EMI[0];

$SUC = $sup['dp_local'];

$DENOMINACION = 'Corporaci&oacute;n Textil S.A.';

/*S
if($SUC == '01' || $SUC == '06' ){
  $DENOMINACION = 'Marijoa S.R.L.';
}else{
  $DENOMINACION = 'Comercial & Industrial Marijoa S.R.L.';
}*/



$Q->Query("SELECT f.fact_cli_ci AS CI FROM cuotas c, factura f WHERE c.ct_ref = f.fact_nro AND c.ct_ref = $REF LIMIT 1");
$Q->NextRecord();
$CI = $Q->Record['CI'];

$Q->Query("SELECT upper(cli_fullname) as cli_fullname,cli_tel1,upper(cli_dir) as cli_dir,upper(ciudad) as ciudad  FROM mnt_cli WHERE cli_ci = '$CI' limit 1");
$Q->NextRecord();
$CLIENTE = $Q->Record['cli_fullname'];
$TEL = $Q->Record['cli_tel1'];
$DIR = $Q->Record['cli_dir'];
$CIUDAD = $Q->Record['ciudad'];




$doc =  str_replace("*","",$CI);	

$T->Set('ci',$doc);
$T->Set('cliente',str_replace("NH","&Ntilde;",strtoupper($CLIENTE)));
$T->Set('tel',$TEL);
$T->Set('dir',str_replace("NH","&Ntilde;",strtoupper($DIR)));
$T->Set('ciudad',str_replace("NH","&Ntilde;",strtoupper($CIUDAD)));

$Q->Query("SELECT emp_dir, emp_ciudad FROM par_empresas WHERE emp_cod = '$SUC' limit 1");
$Q->NextRecord();
$CIU = ($Q->Record['emp_ciudad']==="Encarnacion")?"Encarnaci&oacute;n":$Q->Record['emp_ciudad'];
$EMP_DIR = $Q->Record['emp_dir'];

//$CIU = "Encarnaci&oacute;n";
$T->Set('emp_ciu',$CIU);

$EMP_DIR = str_replace("é","&eacute;",$EMP_DIR);
$EMP_DIR = str_replace("ñ","&ntilde;",$EMP_DIR);

$T->Set('emp_dir',$EMP_DIR);

 
//echo "$dia_hoy    $este_mes    $este_anio";

//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables


//Define a Old Values Variables
$old['REF'] = '';
$old['NRO'] = '';
$old['MONTO'] = '';
$old['DIA_VENC'] = '';
$old['MES_VENC'] = '';
$old['ANIO_VENC'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['REF'] = $Q0->Record['REF'];
    $el['NRO'] = $Q0->Record['NRO'];
    $el['MONTO'] = $Q0->Record['MONTO'];
    $el['DIA_VENC'] = $Q0->Record['DIA_VENC'];
    $el['MES_VENC'] = $Q0->Record['MES_VENC'];
    $el['ANIO_VENC'] = $Q0->Record['ANIO_VENC'];

    // Preparing a template variables
    $T->Set('query0_REF', $el['REF']);
    $T->Set('query0_NRO', $el['NRO']);
    $T->Set('query0_MONTO', number_format($el['MONTO'],0,',','.'));
    $T->Set('query0_DIA_VENC', $el['DIA_VENC']);
    $T->Set('query0_MES_VENC',$el['MES_VENC'] );
    $T->Set('query0_ANIO_VENC', $el['ANIO_VENC']);


    $meses = array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio",
                   "08"=>"Agosto","09"=>"Setiembre","10"=>"Octubre","11"=>"Noviembre","12"=>"Diciembre"); 

    $T->Set('query0_MES_VENC_LETRAS',$meses[$el['MES_VENC']]);
    $T->Set('dia_hoy',$dia_hoy);
    $T->Set('este_anio',$este_anio);
    $T->Set('este_mes',$meses[$este_mes]);
    $T->Set('denominacion',$DENOMINACION);

    $monto_en_letras = extense($el['MONTO']);
    $T->Set('monto_en_letras',$monto_en_letras);






    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
       // $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['REF'] = $el['REF'];
    $old['NRO'] = $el['NRO'];
    $old['MONTO'] = $el['MONTO'];
    $old['DIA_VENC'] = $el['DIA_VENC'];
    $old['MES_VENC'] = $el['MES_VENC'];
    $old['ANIO_VENC'] = $el['ANIO_VENC'];
    $firstRow=false;

}

$Q->Query("SELECT  ruc_auth,  nombre_auth FROM autorizados where cli_ruc = '$CI';");
$aut_list = "<select id='_autorizados'><option value='0' selected >SELECCIONE UNO</option>";
while($Q->NextRecord()){
	$aut_list .= "<option value=".$Q->Record['ruc_auth'].">".$Q->Record['nombre_auth']."</potion>";
}
$aut_list .= "</select>";
$T->Set("nombre_autorizado",$aut_list);
$endConsult = true;
if( true ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

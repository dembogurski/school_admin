<?php
 
/** Report prg file (nota_remision) 
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
$T->Set( 'sup_rem_nro', '15192');
$T->Set( 'sup___local', '02');
$T->Set( 'sup_rem_fecha', '2010-09-14');
$T->Set( 'sup_rem_origen', '02');
$T->Set( 'sup_rem_dir_origen', 'AVENIDA');
$T->Set( 'sup_rem_destino', '02');
$T->Set( 'sup_rem_dir_destino', 'AVENIDA');
$T->Set( 'sup_rem_busc_vend', '');
$T->Set( 'sup_rem_vend_cod', 'PabloI');
$T->Set( 'sup_blaser', 'Buscador');
$T->Set( 'sup_cod', '');
$T->Set( 'sup_codigo', '%');
$T->Set( 'sup_buscador', '');
$T->Set( 'sup_found', 'No Encontrado');
$T->Set( 'sup_enviar', 'false');
$T->Set( 'sup_hfocus', '');
$T->Set( 'sup_select_text', '');
$T->Set( 'sup_rem_func_nombre', 'Pablo Insaurralde');
$T->Set( 'sup_gen_rem', 'No');
$T->Set( 'sup_rem_detalle', '');
$T->Set( 'sup_rem_estado', 'Abierta');
$T->Set( 'sup_rem_fin', 'No');
$T->Set( 'sup_rem_tot', 'false');
$T->Set( 'sup_rem_tot_piez', '');
$T->Set( 'sup_rem_env', '');
$T->Set( 'sup_rem_aceptar', 'false');
$T->Set( 'sup_rem_imprimir', '');
$T->Set( 'sup_rem_sent', '');
$T->Set( 'sup_rem_obs', '');
$T->Set( 'sup_rem_receptor', 'Developer');
$T->Set( 'sup___lock', '');
$T->Set( 'sup_corr_cants', '');
$T->Set( 'sup___disableDel', '');
$T->Set( 'sup___enableDel', 'true');
$T->Set( 'sup___insert', '');
$T->Set( 'sup___change', '');
$T->Set( 'sup___update', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select df_cod_prod as CODIGO_PRODUCTO, df_descrip AS DESCRIPCION, df_disponible AS CANTIDAD, enviado as ENVIADO from remito_det where rem_nro ='15192' order by df_cod_prod asc";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$nro_remito =  $sup['rem_nro'];
$T->Set( 'nro_remito',$nro_remito);
$T->Set( 'destino', $sup['rem_destino']);


$data_ini = substr($sup['rem_fecha'],8,2).'-'.substr($sup['rem_fecha'],5,2).'-'.substr($sup['rem_fecha'],0,4);
$data_fin = substr($sup['rem_fecha_cier'],8,2).'-'.substr($sup['rem_fecha_cier'],5,2).'-'.substr($sup['rem_fecha_cier'],0,4);
 
$T->Set('data_fin',$data_fin);

 
$T->Set( 'fecha_aper',$data_ini);
 
$T->Set( 'fecha_cierre',$data_fin);

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
$T->Set('ip_',$ip);



$db = new Y_DB();
$db->Database = 'marijoa';

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
$old['CODIGO_PRODUCTO'] = '';
$old['DESCRIPCION'] = '';
$old['CANTIDAD'] = '';
$old['ENVIADO'] = '';
$old['KGE'] = '';
$old['KGR'] = '';
$old['RECIBIDO'] = '';
$old['GRAMAJE'] = '';
$old['ANCHO'] = '';

$old['KG'] = '';
$old['AJUSTE'] = '';
$old['TARA'] = '';

$estado = $sup['rem_estado'];



$i = 0;
$j = 0;

// Making a rows of consult
while( $Q0->NextRecord() ){
    $i++;
    // Define a elements
    $el['CODIGO_PRODUCTO'] = $Q0->Record['CODIGO_PRODUCTO'];
    $el['DESCRIPCION'] = $Q0->Record['DESCRIPCION'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $el['ENVIADO'] = $Q0->Record['ENVIADO'];
    $el['KGE'] = $Q0->Record['KGE'];
    $el['KGR'] = $Q0->Record['KGR'];
    $el['RECIBIDO'] = $Q0->Record['RECIBIDO'];
    $el['GRAMAJE'] = $Q0->Record['GRAMAJE'];
    $el['ANCHO'] = $Q0->Record['ANCHO'];
    
    $el['KG'] = $Q0->Record['KG'];
    $el['AJUSTE'] = $Q0->Record['AJUSTE'];
    $el['TARA'] = $Q0->Record['TARA'];
    
    
    $id = $el['CODIGO_PRODUCTO'];

    // Preparing a template variables
    $T->Set('query0_CODIGO_PRODUCTO', $el['CODIGO_PRODUCTO']);
    $T->Set('query0_DESCRIPCION', $el['DESCRIPCION']);
    $T->Set('query0_CANTIDAD', $el['CANTIDAD']);  
    $T->Set('query0_KGE', number_format($el['KGE'],3,',','.'));   
    $T->Set('query0_KGR', number_format($el['KGR'],3,',','.')); 
    $T->Set('query0_GRAMAJE', number_format($el['GRAMAJE'],2,'.','')); 
    $T->Set('query0_ANCHO', number_format($el['ANCHO'],2,'.',','));   
    
    $T->Set('query0_KG', number_format($el['KGE'],2,'.',',')); // Kilaje de Envio no el de descarga
    
    
    if($el['TARA'] == null || $el['TARA'] == "0" ){
       $T->Set('query0_TARA', 0);
    }else{
       $T->Set('query0_TARA', number_format($el['TARA'],2,'.',','));
    }
    if($el['AJUSTE'] == null || $el['AJUSTE'] == "0" ){
       $T->Set('query0_AJUSTE', 0);
    }else{        
       $T->Set('query0_AJUSTE', 1); 
    }
    
    $kge = $el['KGE'];
    $kgr = $el['KGR'];
    
    $kge10 = ($kge * 2) / 100;
    $alerta = '';
    if(($kgr < ($kge - $kge10))  || ($kgr > $kge + $kge10) ){
        $alerta = '&nbsp;<img src="images/dialog-warning.png"   width="18px"  height="18px" title="Margen de error sobrepasa el 10%">';
    }
    
    
    $T->Set('cant', $i);
    if ($el['ENVIADO'] === 'Enviado') {
    	$T->Set('query0_ENVIADO', '<img src="images/ok.png">' ); 
    }else {
    	$T->Set('query0_ENVIADO', ''); 
    }
   if ($el['RECIBIDO'] === 'Recibido') {
    	$T->Set('query0_RECIBIDO', '<img src="images/ok.png">'.$alerta );
        $T->Set('fondo', 'class="complete"' );
        $j++;
        $T->Set('punteados', $j);
    }else {
    	$T->Set('query0_RECIBIDO', '');
        $T->Set('fondo', '' );
    }
    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        //$T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['CODIGO_PRODUCTO'] = $el['CODIGO_PRODUCTO'];
    $old['DESCRIPCION'] = $el['DESCRIPCION'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['ENVIADO'] = $el['ENVIADO']; 
    $old['KGE'] = $el['KGE'];
    $old['KGR'] = $el['KGR'];
    $old['RECIBIDO'] =  $el['RECIBIDO'];
    $old['GRAMAJE'] = $el['GRAMAJE'];
    $old['ANCHO'] = $el['ANCHO'];
    
    $old['KG'] = $el['KG'];
    $old['AJUSTE'] = $el['AJUSTE'];
    $old['TARA'] = $el['TARA'];
    $firstRow=false;
    
}

$endConsult = true;
if( true ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $db->Query("select rem_obs from nota_remision where rem_nro = $nro_remito;");
    $db->NextRecord();
    $obs = $db->Record['rem_obs'];
    $T->Set('remps', "[$obs]" );
    
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

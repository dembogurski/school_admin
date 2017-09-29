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

$db = new Y_DB();
$db->Database = "marijoa";	


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
$db->Query("select descrip,gramos from taras order by gramos asc");
$taras = '<option value="0" selected>No tiene</option>';
while($db->NextRecord()){
	$peso = $db->Record['gramos'];
	$descrip = (int)$peso.'gr. - '.$db->Record['descrip'];
	$taras .= '<option value="'.$peso.'">'.$descrip.'</option>';
}
$T->set("taras",$taras);
$T->Show('msg');	
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
$old['CANT_ACTUAL'] = '';
$old['ENVIADO'] = '';
$old['KGE'] = '';
$old['GRAMAJE'] = '';
$old['ANCHO'] = '';
$old['KG'] = '';

$old['TIPO'] = '';
$old['CLASIF'] = '';

$estado = $sup['rem_estado'];

$i = 0;
$j = 0;
$existe_diff = false;
$codigos_alterados = "";
// Making a rows of consult
while( $Q0->NextRecord() ){
    $i++;
    // Define a elements
    $el['CODIGO_PRODUCTO'] = $Q0->Record['CODIGO_PRODUCTO'];
    $el['DESCRIPCION'] = $Q0->Record['DESCRIPCION'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $el['CANT_ACTUAL'] = $Q0->Record['CANT_ACTUAL'];
    $el['ENVIADO'] = $Q0->Record['ENVIADO'];
    $el['KGE'] = $Q0->Record['KGE'];
    $el['GRAMAJE'] = $Q0->Record['GRAMAJE'];
    $el['ANCHO'] = $Q0->Record['ANCHO'];
    $el['KG'] = $Q0->Record['KG'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['CLASIF'] = $Q0->Record['CLASIF'];  
    
    $id = $el['CODIGO_PRODUCTO'];
    
    if($el['CANTIDAD'] <>  $el['CANT_ACTUAL']){
        $codigos_alterados .=" ".$el['CODIGO_PRODUCTO']; 
    }
    
    $arr = Array();
    for($i = 13;$i > 0;$i-- ){
        if($i < 10 ){
           array_push($arr,"0$i");
        }else{
           array_push($arr,"$i");
        }        
    }
    
    
    $tipo = $el['TIPO'];
    $clasif = $el['CLASIF']; 
    
    $comb = strtoupper( $tipo." ".$clasif); 
    
    $terminacion = substr($id, -2);
    
    $exonerar = 0;
    
    $bordado = strpos($comb, "BORDA");
    
    if(in_array($terminacion,$arr)){ // Exonerar
        $exonerar = 1;
    }else{ 
        $exonerar = 0;
    }
    
      
    $es_bordada = 1;
    if ($bordado !== false) {
       $es_bordada = 1; 
    }else{
       $es_bordada = 0;
    }     
    $T->Set('bordada',"$es_bordada");  
    
    
    $db->Query("SELECT COUNT(*) as Ajustes FROM mnt_ajustes WHERE aj_prod = $id");
    $db->NextRecord();
    $Ajustes = $db->Record['Ajustes'];
    $gramaje = $el['GRAMAJE'] ;  
    
    if($Ajustes > 0){   
        if($gramaje == 1 || $exonerar /**|| $es_bordada*/){ // Es una pieza para excluir
            $T->Set('ajustes',"0");  
        }else{
           $T->Set('ajustes',"1");  
        }
    }else{
        $T->Set('ajustes',"0");  
    }
    // Preparing a template variables
    $T->Set('query0_CODIGO_PRODUCTO', $el['CODIGO_PRODUCTO']);
    $T->Set('query0_DESCRIPCION', $el['DESCRIPCION']);
    $T->Set('query0_CANTIDAD', $el['CANTIDAD']);  
    $T->Set('query0_KGE', number_format($el['KGE'],3,',','.')); 
    $T->Set('query0_GRAMAJE', number_format($el['GRAMAJE'],2,'.','')); 
    $T->Set('query0_ANCHO', number_format($el['ANCHO'],2,'.',','));   
    $T->Set('query0_KG', number_format($el['KG'],2,'.',','));  
    
 
    $T->Set('cant', $i);
    if ($el['ENVIADO'] === 'Enviado') {
    	$T->Set('query0_ENVIADO', '<img src="images/ok.png">' );
        $T->Set('fondo', 'style="background:lightblue"' );
        $j++;
        $T->Set('punteados', $j);
    }else {
    	$T->Set('query0_ENVIADO', '');
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
    $old['CANT_ACTUAL'] = $el['CANT_ACTUAL'];
    $old['ENVIADO'] = $el['ENVIADO']; 
    $old['KGE'] = $el['KGE'];
    $old['GRAMAJE'] = $el['GRAMAJE'];
    $old['ANCHO'] = $el['ANCHO'];
    $old['KG'] = $el['KG'];
    $old['TIPO'] = $el['TIPO'];
    $old['CLASIF'] = $el['CLASIF'];
    
    
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

if($codigos_alterados != ""){
    echo "<script> var c = confirm('Estos codigos tuvieron modificaciones en las cantidades Presione Ok para Corregir... "
    . " $codigos_alterados');   if(c){actualidadCantidades($nro_remito);}  </script>";
}

?>

<?php

/** Report prg file (pedidos_prov) 
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
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup___local', '00');
$T->Set( 'sup___suc', 'DEPOSITO');
$T->Set( 'sup_ped_pend', '');
$T->Set( 'sup_espacio', '');
$T->Set( 'sup_ped_rev', '');
$T->Set( 'sup_det_pedidos_all', '');
$T->Set( 'sup___imprimir', '');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select n.nro as NRO,n.__user AS USUARIO, grupo AS GRUPO, tipo AS TIPO, color AS COLOR, cantidad AS CANT, precio AS PRECIO, d.estado AS ESTADO, prov AS PROV, obs as OBS from nota_pedido n, nota_pedido_det d where n.nro = d.nro_pedido and n.__locald = "PR" and n.estado = "Pendiente" order by grupo, tipo, color desc";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$x = $sup['estadop'];
 
if($x != 'Pendiente'){
    $T->Set('add_code_cab','<td> <b>Casilla p/ Agregar Codigo</b></td>');
}
if($x == 'Despachado'){
    $T->Set('add_code_cab','<td align="right"> <b>Codigo</b></td>');
}
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
$old['NRO'] = '';
$old['USUARIO'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COLOR'] = '';
$old['CANT'] = '';
$old['PRECIO'] = '';
$old['ESTADO'] = '';
$old['PROV'] = '';
$old['OBS'] = ''; $old['OBSD'] = ''; $old['OBS_SEG'] = '';
$old['URGE'] = '';
$old['CODIGO'] = '';
$old['COD_REM'] = '';


$old['PREV'] = '';

//echo "<script> obs_seg['x0']='xxxx';  </script>";

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['ID'] = $Q0->Record['ID'];
    $el['NRO'] = $Q0->Record['NRO'];
    $el['USUARIO'] = $Q0->Record['USUARIO'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['CANT'] = $Q0->Record['CANT'];
    $el['PRECIO'] = $Q0->Record['PRECIO'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];
    $el['PROV'] = $Q0->Record['PROV'];
    $el['OBS'] = $Q0->Record['OBS'];
    $el['OBSD'] = $Q0->Record['OBSD'];
    $el['URGE'] = $Q0->Record['URGE'];
    $el['OBS_SEG'] = $Q0->Record['OBS_SEG'];
    $el['CODIGO'] = $Q0->Record['CODIGO']; 
	$el['COD_REM'] = $Q0->Record['COD_REM'];
    $el['PREV'] = $Q0->Record['PREV'];
    $codigo = $el['CODIGO'];
    // Preparing a template variables
    $T->Set('query0_NRO', $el['NRO']);
    $T->Set('query0_USUARIO', $el['USUARIO']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_CANT', $el['CANT']);
    $T->Set('query0_PRECIO', $el['PRECIO']);
    $T->Set('query0_ESTADO', $el['ESTADO']);
    $T->Set('query0_PROV', $el['PROV']);
    $T->Set('query0_OBS', $el['OBS']);  
    $T->Set('query0_ID', $el['ID']);
    $T->Set('query0_URGE', $el['URGE']);
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_OBS_SEG', $el['OBS_SEG']);
    $T->Set('query0_PREV', $el['PREV']);  
    $remplazo = $el['COD_REM'];
    $id = $el['ID'];
    $URG = $el['URGE'];
    $OBSD =  $el['OBSD'];
    $OBS_SEG =  $el['OBS_SEG'];
    if($OBS_SEG == ""){
          $OBS_SEG = " ";  
    }
    echo '<script> obs_seg["x'.$id.'"]="'.$OBS_SEG.'";  </script>';
   
    
     if($OBSD != "" ){
         $T->Set('query0_OBSD','<tr> <td colspan="6"><b>Observacion:</b>&nbsp;Observacion '.$OBSD.'</td></tr>');
     }else{
         $T->Set('query0_OBSD','');
     }

    if($URG ==="Si" ){
        //echo '<tr> <td  style="border-style:solid;border-color:red;"> URGENTE!!!  </td> </tr>';
        $T->Set('urge','style="border-style:solid; background: rgb(250, 250, 210);font-size:14px;"');
    }else{
        $T->Set('urge','style="font-size:14px;"');
    }
    if($x != 'Pendiente'){
        $T->Set('add_code','<td height="26px" width="220px"><input type="text" onkeyup="setVisible('.$id.')" maxlength="14" size="12" id="_'.$id.'" value="'.$remplazo.'" > <span id="span_'.$id.'" style="display:none"> <input class="item" id="boton_'.$id.'" type="button" value="Agregar Codigo" onclick="agregar_codigo('.$id.')"> </span> </td>');
    }
    if($x == 'Despachado'){
        $T->Set('add_code','<td  align="right"> &nbsp;&nbsp;'.$remplazo.'&nbsp;&nbsp;</td>');
    }
    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    if ($el['OBS']!='') {
    	$T->Show('obs');
    }
     
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['NRO'] = $el['NRO'];
    $old['USUARIO'] = $el['USUARIO'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COLOR'] = $el['COLOR'];
    $old['CANT'] = $el['CANT'];
    $old['PRECIO'] = $el['PRECIO'];
    $old['ESTADO'] = $el['ESTADO'];
    $old['PROV'] = $el['PROV'];
    $old['OBS'] = $el['OBS']; 
    $old['OBS_SEG'] = $el['OBS_SEG'];
    $old['URGE'] = $el['URGE'];
    $old['CODIGO'] = $el['CODIGO']; 
    $old['PREV'] = $el['PREV'];	 
	$old['COD_REM'] = $el['COD_REM'];	 
	 
    $firstRow=false;

}

$endConsult = true;
if( true ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$Hoy = date('Y-m-d'); 
$T->Set('hoy', $Hoy);
if($x != 'Comprado' && $x != 'Despachado'){
  $T->Show('end_query0');
}else{
  $T->Show('end_queryX');
}
// Ends a Table
$T->Show('script');



 

?>

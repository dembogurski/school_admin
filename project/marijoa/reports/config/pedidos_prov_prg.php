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




$Date1 =  date('Y-m-d');
$Date2 = date('Y-m-d', strtotime($Date1 . " + 2 day"));

$T->Set( 'previsto', $Date2 ); 

 


$x = $sup['estadop'];
if($x == 'Comprado'){
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
$old['OBS'] = '';
$old['URGE'] = '';
$old['CODIGO'] = '';  
$old['COD_REM'] = '';
$old['FECHA'] = '';

 $dbp = new Y_DB();
 $dbp->Database = 'marijoa';
 
 
      

$pendientes = 0;

// Making a rows of consult
while( $Q0->NextRecord() ){
    $pendientes++;
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
    $el['URGE'] = $Q0->Record['URGE'];
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $codigo = $el['CODIGO'];
    // Preparing a template variables
    $T->Set('query0_NRO', $el['NRO']);
    $T->Set('query0_USUARIO', $el['USUARIO']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_CANT',  number_format( $el['CANT'],1,',','.'));   
    $T->Set('query0_PRECIO', $el['PRECIO']);
    $T->Set('query0_ESTADO', $el['ESTADO']);
    $T->Set('query0_PROV', $el['PROV']);
    $T->Set('query0_OBS', $el['OBS']);
    $T->Set('query0_ID', $el['ID']);
    $T->Set('query0_URGE', $el['URGE']);
    
    if($el['CODIGO']!=null){
        $T->Set('query0_CODIGO', $el['CODIGO']);
        $T->Set('codigo_o_id', $el['CODIGO']);
    }else{
        $T->Set('query0_CODIGO', "No.Def");  
        $T->Set('codigo_o_id',"id_".$el['ID']);
    }
        
    $T->Set('FECHA', $el['FECHA']); 
     
    
    if($codigo != ""){
      
      $sql = "SELECT prov_nombre,prov_tel,p_compra,p_cant,prod_fin_pieza FROM   mov_compras c, mnt_prod p, mnt_prov t  WHERE  p.p_ref = c.c_ref and c.c_prov = t.prov_cod and  p.p_cod = $codigo ";
      $dbp->Query($sql);  
       if( $dbp->NumRows() > 0){
           $dbp->NextRecord(); 
            $prov = $dbp->Record['prov_nombre'];
            $tel = $dbp->Record['prov_tel'];
            $precio_compra =  $dbp->Record['p_compra'];
            $p_cant = $dbp->Record['p_cant'];
            $prod_fin_pieza = $dbp->Record['prod_fin_pieza'];
            $T->Set('title', "<b>Proveedor:&nbsp;&nbsp;</b> $prov  <br>  <b>Tel:&nbsp;&nbsp;</b>  $tel  <br>  <b>Stock Actual:&nbsp;&nbsp;</b>  $p_cant <br>   <b>Con Fin de Pieza:&nbsp;&nbsp;</b>  $prod_fin_pieza <br> <b>Precio Compra:&nbsp;&nbsp;</b>  ".number_format( $precio_compra,0,',','.'))."  "; 
       }else{
           $T->Set('title', "No hay informacion disponible de esta pieza..."); 
       }       
    }
     
    $id = $el['ID'];
    $nro = $el['NRO'];
    $URG = $el['URGE'];
    if($URG ==="Si" ){
        //echo '<tr> <td  style="border-style:solid;border-color:red;"> URGENTE!!!  </td> </tr>';
        $T->Set('urge','style="border-style:solid; background: rgb(250, 250, 210);font-size:14px;"');
        $T->Set('no_urge','<input type="checkbox" id="no_urge_'.$id.'" onclick=no_urge("'.$id.'","#div_nourge_'.$id.'") title="No URGE!!!">');

    }else{
        $T->Set('urge','style="font-size:14px;"');$T->Set('no_urge',''); 
    }
    if($x == 'Comprado'){
        $T->Set('add_code','<td height="26px" width="220px"><input type="text" maxlength="14" size="12" id="_'.$id.'" value="'.$codigo.'" > <span id="span_'.$id.'"> <input id="boton_'.$id.'" type="button" value="Agregar Codigo" onclick="agregar_codigo('.$id.')"> </span> </td>');
    }
    if($x == 'Despachado'){
        $T->Set('add_code','<td  align="right"> &nbsp;&nbsp;'.$codigo.'&nbsp;&nbsp;</td>');
    }
    // Calculating a total

    // Calculating a subtotal
    
    

    $T->Show('query0_data_row');

    if($URG ==="Si" ){
      echo '<tr><td colspan="9">  <div class="no_urge" id="div_nourge_'.$id.'" style="display:none;">
             <label><b>Observacion:</b></label> <input type="text" size="80" id="obs_'.$id.'" >
             <input type="button"  onclick=marcar_no_urge('.$id.',"#obs_'.$id.'","#div_nourge_'.$id.'",'.$nro.') value="Marcar como no Urgente!!! ">
			 <input type="button"  onclick=agregar_obs('.$id.',"#obs_'.$id.'","#div_nourge_'.$id.'",'.$nro.') value="Agregar Observación." >
      </div> <td></tr>';
    } 
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
    $old['URGE'] = $el['URGE'];
    $old['CODIGO'] = $el['CODIGO'];
    $old['FECHA'] =  $el['FECHA'];
    $firstRow=false;

}
$T->Set('pendientes', $pendientes); 
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



if($x != 'Comprado' && $x != 'Despachado'){
  $T->Show('revisar_pend');
}

?>

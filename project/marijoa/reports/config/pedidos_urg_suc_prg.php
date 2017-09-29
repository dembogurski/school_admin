<?php

/** Report prg file (pedidos_urg_suc) 
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
$T->Set( 'sup___local', '02');
$T->Set( 'sup___suc', 'AVENIDA');
$T->Set( 'sup_ped_pend', '');
$T->Set( 'sup_origen', '01');
$T->Set( 'sup_destino', '05');
$T->Set( 'sup_desde', '2012-01-01');
$T->Set( 'sup_hasta', '2012-04-17');
$T->Set( 'sup_estado', '%');
$T->Set( 'sup_urge', '%');
$T->Set( 'sup_pedidos_urg', '');

*/
// ------------------------------------------

$destino = $sup['destino']; 
$origen = $sup['origen'];
$desde = $sup['desde'];
$hasta = $sup['hasta'];
$estado = $sup['estado'];
$urge = $sup['urge'];
$mayorista = $sup['mayorista'];
$tipo_consulta = $sup['consulta_param'];

if($tipo_consulta == 'Nro.Pedido'){
     $ped_nro = $sup['ped_numero'];     
     $mayorista = '%';
     $aux = new Y_DB(); $aux->Database = 'marijoa';  
     $aux->Query("select __locald,__local from nota_pedido where nro =  $ped_nro");
     if($aux->NextRecord()){
        $T->Set( 'sup_origen', $aux->Record['__local']);
        $T->Set( 'sup_destino', $aux->Record['__locald']);
     }      
     $query0 = "SELECT p.nro AS NRO,p.__locald AS DESTINO,p.__local AS ORIGEN,DATE_FORMAT(p.fecha_hora_cierre,'%d-%m-%Y') AS FECHA, p.__user AS USURIO, p.estado as ESTADO,d.codigo AS CODIGO,d.cod_rem as REM, d.grupo AS GRUPO, d.tipo AS TIPO, d.color AS COLOR, d.descrip as DESCRIP, d.cantidad AS CANTIDAD, d.urge AS URGE, d.estado AS ESTADO_CODIGO,p.obs as OBS  FROM nota_pedido p, nota_pedido_det d WHERE p.nro = d.nro_pedido AND  p.nro =  $ped_nro order by GRUPO ASC,TIPO ASC , COLOR ASC";
}else{
  if($estado != 'Enviado'){
	 
     $query0 = "SELECT p.nro AS NRO,p.__locald AS DESTINO,p.__local AS ORIGEN,DATE_FORMAT(p.fecha_hora_cierre,'%d-%m-%Y') AS FECHA, p.__user AS USURIO, p.estado as ESTADO,d.codigo AS CODIGO,d.cod_rem as REM, d.grupo AS GRUPO, d.tipo AS TIPO, d.color AS COLOR, d.descrip as DESCRIP, d.cantidad AS CANTIDAD, d.urge AS URGE, d.estado AS ESTADO_CODIGO,p.obs as OBS  FROM nota_pedido p, nota_pedido_det d WHERE p.nro = d.nro_pedido AND  p.__local LIKE '$origen' AND p.__locald LIKE '$destino'  AND d.urge LIKE '$urge' and mayorista LIKE  '$mayorista'   AND p.estado !='Cerrada' AND p.estado !='Abierta'  AND d.estado LIKE '$estado' AND p.fecha_hora_cierre BETWEEN '$desde' AND DATE_ADD('$hasta', INTERVAL 1 DAY) order by GRUPO ASC,TIPO ASC , COLOR ASC";
  }else{	 
     $query0 = "SELECT p.nro AS NRO,p.__locald AS DESTINO,p.__local AS ORIGEN,DATE_FORMAT(p.fecha_hora_cierre,'%d-%m-%Y') AS FECHA, p.__user AS USURIO, p.estado as ESTADO,d.codigo AS CODIGO,d.cod_rem as REM, d.grupo AS GRUPO, d.tipo AS TIPO, d.color AS COLOR, d.descrip as DESCRIP, d.cantidad AS CANTIDAD, d.urge AS URGE, d.estado AS ESTADO_CODIGO,p.obs as OBS  FROM nota_pedido p inner join nota_pedido_det d on p.nro = d.nro_pedido WHERE p.__local LIKE '$origen' AND p.__locald LIKE '$destino'  AND d.urge LIKE '$urge' and mayorista LIKE  '$mayorista'   AND p.estado !='Abierta'  AND d.estado LIKE '$estado' AND d.enviado BETWEEN '$desde' AND DATE_ADD('$hasta', INTERVAL 1 DAY) order by GRUPO ASC,TIPO ASC , COLOR ASC";     
  }
}
$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$mayorista = $sup['mayorista'];
if($mayorista == '%'){
    $T->Set( 'mayorista', 'Mayorista y Minorista' );
}else if($mayorista == 'Si'){
    $T->Set( 'mayorista', 'Mayorista' );
}else{
     $T->Set( 'mayorista', 'Minorista' );
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

$Q1 = new Y_DB();
$Q1->Database = 'marijoa';  

//Define a Subtotal Variables
$subtotal0_CANTIDAD = 0;

$suc_origen = $sup['origen'];
$T->Set('suc', $suc_origen);


//Define a Old Values Variables
$old['NRO'] = '';
$old['DESTINO'] = ''; $old['ORIGEN'] = '';
$old['FECHA'] = '';
$old['USURIO'] = '';
$old['CODIGO'] = '';$old['REM'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COLOR'] = '';
$old['CANTIDAD'] = '';
$old['URGE'] = '';
$old['ESTADO'] = '';$old['DESCRIP'] = '';
$old['ESTADO_CODIGO'] = '';
$old['OBS'] = '';

$i = 0;

// Making a rows of consult
while( $Q0->NextRecord() ){

    $i++;
    // Define a elements
    $el['NRO'] = $Q0->Record['NRO'];
    $el['DESTINO'] = $Q0->Record['DESTINO'];$el['ORIGEN'] = $Q0->Record['ORIGEN'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['USURIO'] = $Q0->Record['USURIO'];
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $el['URGE'] = $Q0->Record['URGE'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];$el['DESCRIP'] = $Q0->Record['DESCRIP'];
    $el['ESTADO_CODIGO'] = $Q0->Record['ESTADO_CODIGO'];
    $el['REM'] = $Q0->Record['REM'];
    $el['OBS'] = $Q0->Record['OBS'];
    $codigo = $el['CODIGO'];
    
    $re = "/Pendiente|En Proceso|Enviado|Suspendido/i"; 
    $str = $el['ESTADO']; 
    $verif = preg_match($re, $str);
        
    if(!$verif && $tipo_consulta == 'Nro.Pedido'){
        $nro =  $el['NRO'];
        echo "<img src='images/warning32.png' height='24px' width='24px' style='margin-left:25px;' ><span style='color:red;font-weight:bold;margin-bottom:25px;margin-left:25px;margin-right:0pt;margin-top:25px;vertical-align:4px;'> No se puede mostrar la informacion porque el etado actual de la nota Nro. $nro es: $str </span>";
        break;
    }    
    
    if($el['ESTADO']!="Cerrada" && $codigo != ''){
        $Q1->Query("SELECT CONCAT(suc,':  ',estante, ':' ,fila, ':', col) as ubic, operacion  FROM ubic WHERE codigo = $codigo   ORDER BY id DESC LIMIT 1");
        if($Q1->NumRows() > 0){
        $Q1->NextRecord();
        $ubic = $Q1->Record['ubic'];
	      $operacion = $Q1->Record['operacion'];
            if($operacion == 'E'){
                $T->Set('ubic',$ubic);
            }else{
                $T->Set('ubic',''); 	
            }	
        }else{
           $T->Set('ubic',''); 
        }
    }
    // Preparing a template variables
    $T->Set('fila_numero', $i);
    $T->Set('query0_NRO', $el['NRO']);
    $T->Set('query0_DESTINO', $el['DESTINO']);$T->Set('query0_ORIGEN', $el['ORIGEN']);
    $T->Set('query0_FECHA', $el['FECHA']);    $T->Set('query0_DESCRIP', $el['DESCRIP']);
    $T->Set('query0_USURIO', $el['USURIO']);
    $T->Set('query0_CODIGO', $el['CODIGO']); $T->Set('query0_REM', $el['REM']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_CANTIDAD', number_format($el['CANTIDAD'],0,',','.'));
    $T->Set('query0_URGE', $el['URGE']);
    $T->Set('query0_ESTADO', $el['ESTADO']);
    $T->Set('query0_ESTADO_CODIGO', $el['ESTADO_CODIGO']);
    
    if($el['OBS']!=''){
        $T->Set('query0_OBS', "<td class='arrow'>&#x21B3;</td><td colspan='12'><div class='block'><b>Obs: </b>". $el['OBS']."</div></td></tr>");    
    }else{
        $T->Set('query0_OBS', '');
    }
    
    if($el['DESTINO']=="PR"){
      $T->Set('destino','pr');
    }else{
      $T->Set('destino','');
    }
    if($el['URGE']==='Si'){
      $T->Set('urge','urge');
    }else{
      $T->Set('urge','');
    }
    if($el['ESTADO']=="Abierta"){
        $T->Set('estado','abierta');
    }else if($el['ESTADO']=="Cerrada"){
         $T->Set('estado','cerrada');
    }else if($el['ESTADO']=="Pendiente"){
         $T->Set('estado','pendiente');
    }else if($el['ESTADO']=="En Proceso"){
     	 $T->Set('estado','en_proceso');
    }else{
         $T->Set('estado','abierta');
    }
    
    $f = $el['FECHA'];
    $fecha_inv = substr($f,6,10).'-'.substr($f,3,2).'-'.substr($f,0,2);
    $T->Set('fecha_inv',$fecha_inv);
     
    
    $subtotal0_CANTIDAD += 0 + $el['CANTIDAD'];
    
    $T->Set('codigo',$codigo);
     
     
    
    if($el['ESTADO_CODIGO'] == "En Proceso"){
        $T->Set('color_codigo','style="background:#999900"');
    }else if ($el['ESTADO_CODIGO'] == "Enviado") {
         $T->Set('color_codigo','style="background:#99ff00"');
    }else if ($el['ESTADO_CODIGO'] == "Suspendido") {
         $T->Set('color_codigo','style="background:red"');
    }else{
       $T->Set('color_codigo','');  
    } 

    $T->Show('query0_data_row');  
    
    if($el['ESTADO']=="Pendiente" || $el['ESTADO']=="En Proceso"  || $el['ESTADO']=="En Deposito"  ){
       $T->Show('opciones');
    } 
   
    
    // Show Subtotal
    $T->Set('subtotal0_CANTIDAD', number_format($subtotal0_CANTIDAD,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANTIDAD = 0;
    }
    
    //Actualize Old Values Variables
    $old['NRO'] = $el['NRO'];
    $old['DESTINO'] = $el['DESTINO']; $old['ORIGEN'] = $el['ORIGEN'];
    $old['FECHA'] = $el['FECHA'];
    $old['USURIO'] = $el['USURIO'];
    $old['CODIGO'] = $el['CODIGO'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COLOR'] = $el['COLOR'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['URGE'] = $el['URGE'];  $old['REM'] = $el['REM'];
    $old['ESTADO'] = $el['ESTADO'];  
    $old['ESTADO_CODIGO'] = $el['ESTADO_CODIGO'];
    $old['OBS'] = $el['OBS'];  
    
    $firstRow = false;

}

$T->Set('i', $i);
$endConsult = true;
if( $endConsult ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

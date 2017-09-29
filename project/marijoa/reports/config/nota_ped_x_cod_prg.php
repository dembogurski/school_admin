<?php

/** Report prg file (nota_ped_x_cod) 
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
$T->Set( 'sup___msg', '( ! ) Resultado de filtros Máximo 50 Registros. % = comodin ');
$T->Set( 'sup_bcodigo', '1154311');
$T->Set( 'sup_fdp', 'No');
$T->Set( 'sup_gr', '');
$T->Set( 'sup_gru', '');
$T->Set( 'sup_tp', '');
$T->Set( 'sup_tipo', '');
$T->Set( 'sup_clr', '');
$T->Set( 'sup_color', '');
$T->Set( 'sup_s', '%');
$T->Set( 'sup___msg2', '( ! ) Estas buscando tu propia sucursal!!!');
$T->Set( 'sup_check', '0');
$T->Set( 'sup_lcod', '1154311');
$T->Set( 'sup_pprov', 'No');
$T->Set( 'sup_msg5', '');
$T->Set( 'sup_mts', '55.00');
$T->Set( 'sup_lprod', '00');
$T->Set( 'sup_p_pend', '55.00');
$T->Set( 'sup_exis_pend', '0');
$T->Set( 'sup_investigar_ped', '');
$T->Set( 'sup_nro_ped_pnd', '__NO DATA__');
$T->Set( 'sup_pedido', '0.00');
$T->Set( 'sup___msg3', '( ! ) Pedido > a la Disponibilidad!!!');
$T->Set( 'sup___msg4', '( ! ) Aún no se ha generado pedido a la sucursal destino!!! Generar uno...');
$T->Set( 'sup_espacio', '');
$T->Set( 'sup_urg', 'No');
$T->Set( 'sup_inserta', 'false');
$T->Set( 'sup_add', 'false');
$T->Set( 'sup_addprov', 'false');
$T->Set( 'sup_ped_ab', '');
$T->Set( 'sup___reload', '');
$T->Set( 'sup___msg5', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT n.nro AS NRO,DATE_FORMAT(n.fecha,"%d-%m-%Y") AS FECHA , n.__user AS USUARIO,n.__suc AS ORIGEN,n.__sucd AS DESTINO,d.cantidad AS CANTIDAD,n.estado AS ESTADO  FROM nota_pedido n,nota_pedido_det d WHERE n.nro = d.nro_pedido AND d.codigo = '1154311' ";


function diffDate($d1, $d2, $type = '', $sep = '-') {
    $d1 = explode($sep, $d1);
    $d2 = explode($sep, $d2);
    switch ($type) {
        case 'A':
            $X = 31536000;
            break;
        case 'M':
            $X = 2592000;
            break;
        case 'D':
            $X = 86400;
            break;
        case 'H':
            $X = 3600;
            break;
        case 'MI':
            $X = 60;
            break;
        default:
            $X = 1;
    }
    return floor((
                    ( mktime(0, 0, 0, $d2[1], $d2[2], $d2[0])
                    - mktime(0, 0, 0, $d1[1], $d1[2], $d1[0]) ) / $X));
}


$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$suc_prod= $sup['lprod'];

$T->Set( 'suc_prod', $suc_prod );


$codigo = $sup['lcod'];

$db = new Y_DB(); 
$db->Database = 'marijoa';

$db->Query("select prod_fin_pieza from mnt_prod where p_cod = $codigo");
$db->NextRecord();

        

$fp = $db->Record['prod_fin_pieza'];



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
$subtotal0_CANTIDAD = 0;
 
$hoy = date("Y-m-d");
  

if($fp  == "Tr"){
    $T->Set('class','error');  
    $T->Set('mensaje',"Este se encuentra en Transito (No se debe pedir este producto) a los depositos antes de llegar, su pedido generar&aacute; transtornos en logistica.");
    $T->Show('msg');
    die();
}
        

$dbv = new Y_DB(); 
$dbv->Database = 'marijoa';


//Define a Old Values Variables
$old['NRO'] = '';
$old['FECHA'] = '';
$old['USUARIO'] = '';
$old['ORIGEN'] = '';
$old['DESTINO'] = '';
$old['CANTIDAD'] = '';
$old['ESTADO'] = '';

$tuvo_ventas = false;
$tuvo_remision = false;

// Making a rows of consult
while( $Q0->NextRecord() ){
    
    // Define a elements
    $el['NRO'] = $Q0->Record['NRO'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['USUARIO'] = $Q0->Record['USUARIO'];
    $el['ORIGEN'] = $Q0->Record['ORIGEN'];
    $el['DESTINO'] = $Q0->Record['DESTINO'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];

    // Preparing a template variables
    $T->Set('query0_NRO', $el['NRO']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_USUARIO', $el['USUARIO']);
    $T->Set('query0_ORIGEN', $el['ORIGEN']);
    $T->Set('query0_DESTINO', $el['DESTINO']);
    $T->Set('query0_CANTIDAD', number_format($el['CANTIDAD'],0,'.',','));
    $T->Set('query0_ESTADO', $el['ESTADO']);

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CANTIDAD += 0 + $el['CANTIDAD'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANTIDAD', number_format($subtotal0_CANTIDAD,2,'.',','));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANTIDAD = 0;
    }
    
    //Actualize Old Values Variables
    $old['NRO'] = $el['NRO'];
    $old['FECHA'] = $el['FECHA'];
    $old['USUARIO'] = $el['USUARIO'];
    $old['ORIGEN'] = $el['ORIGEN'];
    $old['DESTINO'] = $el['DESTINO'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['ESTADO'] = $el['ESTADO'];
    $firstRow=false;

}

$endConsult = true;
if( $endConsult ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}



// Obtengo la cantidad de Compra o Fraccionada

 



$db->Query("SELECT p_cant_compra FROM mnt_prod WHERE p_cod = $codigo");
$db->NextRecord();
$CANTIDAD_INICIAL = $db->Record['p_cant_compra'];
$PORC_VENDIDO = 0;

// Remisiones

$fecha_evaluacion = '2013-07-01';

$db->Query("SELECT r.rem_nro, date_format(r.rem_fecha,'%d-%m-%Y') AS fecha,rem_fecha, date_format(r.rem_fecha_cier,'%d-%m-%Y') as fecha_cierre,r.rem_fecha_cier,rem_origen,rem_destino,rem_vend_cod,rem_estado,rem_receptor,df_disponible AS cant
FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND r.rem_estado = 'Cerrada' AND r.rem_destino LIKE '$suc_prod' AND d.df_cod_prod = '$codigo' ORDER BY  r.id DESC LIMIT 1");

if($db->NumRows() > 0){
    $db->NextRecord();
    $tuvo_remision = true;
    $nro = $db->Record['rem_nro'];
    $fecha = $db->Record['fecha'];
    $cierre = $db->Record['fecha_cierre'];
    $origen = $db->Record['rem_origen'];
    $destino = $db->Record['rem_destino'];
    $vend_cod = $db->Record['rem_vend_cod']; 
    $receptor = $db->Record['rem_receptor'];
    $cant = $db->Record['cant'];
    $estado = $db->Record['rem_estado'];
    
    // Fechas Invertidas
    
    $rem_fecha = $db->Record['rem_fecha'];
    $rem_fecha_cier = $db->Record['rem_fecha_cier'];
    
    if($cierre == null){
       $fecha_evaluacion = $rem_fecha; 
    }else{
        $fecha_evaluacion = $rem_fecha_cier;
    }
     
    $CANTIDAD_INICIAL = $cant;
    
    $T->Set('nro',$nro);
    $T->Set('fecha',$fecha);
    $T->Set('cierre',$cierre);
    $T->Set('origen',$origen);
    $T->Set('destino',$destino);
    $T->Set('vend_cod',$vend_cod);
    $T->Set('receptor',$receptor);
    $T->Set('cant',$cant);
    $T->Set('estado',$estado);
    
    $T->Show('remision');
    
    // Busco las Ventas 
    $sql = "SELECT fact_nro,date_format(fact_fecha,'%d-%m-%Y') AS fecha_factura,fact_fecha,fact_localidad AS suc,fact_nom_cli AS cliente, df_cantidad, fact_total
    FROM factura f, det_factura d WHERE f.fact_nro = d.df_fact_num AND f.fact_fecha >= '$fecha_evaluacion' AND d.df_cod_prod = '$codigo' AND fact_estado = 'Cerrada' AND fact_localidad = '$suc_prod' order by f.id asc";
    
    $dbv->Query($sql);
    
    if($dbv->NumRows() > 0){
        $T->Set('titulo_ventas','Ultimas ventas en la Sucursal "'.$suc_prod.'" posteriores a la Remision');
        $T->Show('ventash');
        
        $tuvo_ventas = true;
        
        $total_ventas_en_suc = 0;
        
        while( $dbv->NextRecord() ){
             
           $fact_nro = $dbv->Record['fact_nro'];
           $fecha_factura = $dbv->Record['fecha_factura'];
           $fact_fecha = $dbv->Record['fact_fecha'];
           $suc = $dbv->Record['suc'];
           $cliente = $dbv->Record['cliente'];
           $df_cantidad = $dbv->Record['df_cantidad'];
           $fact_total = $dbv->Record['fact_total'];
           
           $total_ventas_en_suc += 0+$df_cantidad;
           
            $T->Set('fact_nro',$fact_nro);
            $T->Set('fact_fecha',$fecha_factura);
            $T->Set('suc',$suc);
            $T->Set('cliente',$cliente);
            $T->Set('cantidad',$df_cantidad);
            $T->Set('fact_total',$fact_total);
            
            $fecha_evaluacion = $fact_fecha;
            
            $PORC_VENDIDO = ($total_ventas_en_suc * 100) / $CANTIDAD_INICIAL;
            $T->Show('ventas');
        }  
        
        
    }else{//Sino No tuvo ventas no hacer nada
        echo '<tr> <th colspan="6"> Sin ventas posterior a la remision</th> </tr>'; 
        $PORC_VENDIDO = 0;
    }
       
     
}else{ // Not tiene remision alguna Puede que sea fraccionado en la Sucursal y tenga ventas

$sql = "SELECT fact_nro,date_format(fact_fecha,'%d-%m-%Y') AS fecha_factura,  fact_fecha,fact_localidad AS suc,fact_nom_cli AS cliente, df_cantidad, fact_total
    FROM factura f, det_factura d WHERE f.fact_nro = d.df_fact_num  AND d.df_cod_prod = '$codigo' AND fact_estado = 'Cerrada' AND fact_localidad = '$suc_prod' order by f.id desc limit 1";
    
    $dbv->Query($sql);
    $tuvo_ventas = true;
    
    if($dbv->NumRows() > 0){
        $T->Set('titulo_ventas','Ultima Venta en la Sucursal "'.$suc.'" ');
        $T->Show('ventash');
        $total_ventas_en_suc = 0;
        while( $dbv->NextRecord() ){
             
           $fact_nro = $dbv->Record['fact_nro'];
           $fact_fecha = $dbv->Record['fact_fecha'];
           $fecha_factura = $dbv->Record['fecha_factura'];
           $suc = $dbv->Record['suc'];
           $cliente = $dbv->Record['cliente'];
           $df_cantidad = $dbv->Record['df_cantidad'];
           $fact_total = $dbv->Record['fact_total'];
            $total_ventas_en_suc += 0+$df_cantidad;
            
            $T->Set('fact_nro',$fact_nro);
            $T->Set('fact_fecha',$fecha_factura);
            $T->Set('suc',$suc);
            $T->Set('cliente',$cliente);
            $T->Set('cantidad',$df_cantidad);
            $T->Set('fact_total',$fact_total);
            
            $fecha_evaluacion = $fact_fecha;
                        
            $T->Show('ventas');
               
        }    
      $PORC_VENDIDO = ($total_ventas_en_suc * 100) / $CANTIDAD_INICIAL;
    }else{// No tiene Ventas Ni remision Puede Pedir este producto    
             $tuvo_ventas = false;
             $PORC_VENDIDO = 0;
    }
}

 //echo $fecha_evaluacion ."  |   ".$hoy."<br><br>";


$diff_dias = diffDate( $fecha_evaluacion,$hoy, 'D');

//echo $diff_dias;

$LIMITE_DIAS = 35;
$LIMITE_PORCENTAJE = 50;




if ($diff_dias < $LIMITE_DIAS) {
    $T->Set('class','error');
    
    if($tuvo_ventas){
         $T->Set('mensaje',"Este producto tuvo movimiento por venta a $diff_dias d&iacute;as atras,  para pedir el producto no debe tener movimiento al menos $LIMITE_DIAS d&iacute;as (No se debe pedir este producto)");
    }else{
         $T->Set('mensaje',"Este producto ha sido remitido hace $diff_dias d&iacute;as atras, debe permanecer al menos $LIMITE_DIAS d&iacute;as  en la sucursal (No se debe pedir este producto)");
    }
     
}  else { // Estadía Mayor a 35 dias verificar el % Ventas
    
    if($PORC_VENDIDO > $LIMITE_PORCENTAJE){
       $T->Set('mensaje',"Este producto se ha vendido mas del $LIMITE_PORCENTAJE % en la Sucursal  ($PORC_VENDIDO%)(No debe pedir este producto)");
       $T->Set('class','error');  
    }else{
      $T->Set('mensaje',"Este producto no ha tenido movimiento ya hace $diff_dias d&iacute;as (Puede pedir este producto)");
      $T->Set('class','success');    
    }
    
    
    
}
$T->Show('end_query0');	

$T->Show('msg');



			// Ends a Table 

?>

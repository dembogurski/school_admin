<?php

/** Report prg file (nota_pedido) 
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
$T->Set( 'sup_nro', '1');
$T->Set( 'sup_fecha', '2010-05-08');
$T->Set( 'sup___user', 'Developer');
$T->Set( 'sup___local', '02');
$T->Set( 'sup___suc', 'AVENIDA');
$T->Set( 'sup___locald', '00');
$T->Set( 'sup___sucd', 'DEPOSITO');
$T->Set( 'sup_estado', 'Pendiente');
$T->Set( 'sup___print', '');
$T->Set( 'sup_obs', '64565464654');
$T->Set( 'sup_det', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT  nro_pedido AS Nro, codigo as CODIGO, grupo AS GRUPO, tipo AS TIPO, color AS COLOR, cantidad AS CANTIDAD, estado AS ESTADO ,"" AS MARCAR  FROM  nota_pedido_det WHERE nro_pedido = '1'";


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

$sucural = $sup['__suc'];


$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$Q1 = new Y_DB();
$Q1->Database = $Global['project'];

$db = new Y_DB();
$db->Database = $Global['project'];

$hoy = date("Y-m-d");
 

$dbv = new Y_DB(); 
$dbv->Database = 'marijoa';

if ($sup['__locald']==='PR') {
        $T->Set('cabprov', '<th>PROVEEDOR</th>');
       $T->Set('cabprecio', '<th>PRECIO</th>');
        $T->Set('cabcod',  '&nbsp;');
    }else{ 
       $T->Set('cabprov', '&nbsp;');
       $T->Set('cabprecio', '&nbsp;');
       $T->Set('cabcod', '<th>CODIGO</th>');
    }

$T->Set( 'nro', $sup['nro']);
$T->Set( 'fecha', $sup['fecha']);
$T->Set( 'usuario', $sup['__user']);

$T->Set( 'origen', $sup['__suc']);
 
$T->Set( 'destino', $sup['__sucd']);
  
$T->Set( 'obs', $sup['obs']);
 


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


//Define a Old Values Variables
$old['Nro'] = '';
$old['CODIGO'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';$old['DESCRIP'] = '';
$old['COLOR'] = '';
$old['CANTIDAD'] = '';
$old['ESTADO'] = '';
$old['MARCAR'] = '';
$old['prov'] = '';
$old['precio'] = '';
$old['URGENTE'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['Nro'] = $Q0->Record['Nro'];
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];  $el['DESCRIP'] = $Q0->Record['DESCRIP'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];
    $el['MARCAR'] = $Q0->Record['MARCAR'];
    $el['URGENTE'] = $Q0->Record['URGENTE'];
    $el['prov'] = $Q0->Record['prov'];
    $el['precio'] = $Q0->Record['precio'];

    if ($el['URGENTE']==='Si') {
      $T->Set('color', 'orange');
    }else{
      $T->Set('color', 'white');
    }

    $codigo =  $el['CODIGO'];
 
    

    // Preparing a template variables
    $T->Set('query0_Nro', $el['Nro']);
    
    if ($sup['__locald']==='PR') {
       $T->Set('cabcod', '&nbsp;');
       $T->Set('query0_CODIGO', '&nbsp;');
       $T->Set('cabprov', '<th><PROVEEDOR</th>');
       $T->Set('cabprecio', '<th>PRECIO</th>');
       $T->Set('prov',  $el['prov']);
       $T->Set('precio',   $el['precio']);
    }else{
       $T->Set('query0_CODIGO', $el['CODIGO']);
      // $T->Set('cabcod', 'CODIGO');
       $T->Set('prov', '&nbsp;');
       $T->Set('precio', '&nbsp;');
       $T->Set('cabprov', '&nbsp;');
       $T->Set('cabprecio', '&nbsp;');

    }
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_DESCRIP', $el['DESCRIP']);
    $T->Set('query0_CANTIDAD', number_format($el['CANTIDAD'],2,',','.'));
    $T->Set('query0_ESTADO', $el['ESTADO']);
    $T->Set('query0_MARCAR', $el['MARCAR']);
    $T->Set('query0_URGE', $el['URGENTE']);
    
    $urge = $el['URGENTE'];
    
    $fecha_evaluacion = '2013-07-01';
    
    $PORC_VENDIDO = 0;
 
    
    if($urge == 'No'){
    
        // Busco la cantidad inicial

        $db->Query("SELECT p_cant_compra FROM mnt_prod WHERE p_cod = $codigo ");
        $db->NextRecord();
        $CANTIDAD_INICIAL = $db->Record['p_cant_compra'];


        // Busco las Ventas 
        $sql = "SELECT fact_nro,date_format(fact_fecha,'%d-%m-%Y') AS fecha_factura,fact_fecha,fact_localidad AS suc,fact_nom_cli AS cliente, df_cantidad, fact_total
        FROM factura f, det_factura d WHERE f.fact_nro = d.df_fact_num AND f.fact_fecha >= '$fecha_evaluacion' AND d.df_cod_prod = '$codigo' AND fact_estado = 'Cerrada' AND fact_localidad = '$sucural' order by f.id desc limit 1";

        $dbv->Query($sql);

        $total_ventas_en_suc = 0;

        if($dbv->NumRows() > 0){

            $tuvo_ventas = true;
            while( $dbv->NextRecord() ){  
            $fact_fecha = $dbv->Record['fact_fecha']; 
            $df_cantidad = $dbv->Record['df_cantidad']; 
            $total_ventas_en_suc += 0+$df_cantidad;
            $fecha_evaluacion = $fact_fecha;  
            } 

            $PORC_VENDIDO = ($total_ventas_en_suc * 100) / $CANTIDAD_INICIAL;
        }else{ // Si no tuvo ventas busco la Remision hacia esta sucursal.
            $sql = "SELECT r.rem_nro, date_format(r.rem_fecha,'%d-%m-%Y') AS fecha,rem_fecha, date_format(r.rem_fecha_cier,'%d-%m-%Y') as fecha_cierre,r.rem_fecha_cier,rem_origen,rem_destino,rem_vend_cod,rem_estado,rem_receptor,df_disponible AS cant
            FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND r.rem_estado = 'Cerrada' AND r.rem_destino LIKE '$sucural' AND d.df_cod_prod = '$codigo' ORDER BY  r.id DESC LIMIT 1";
            $dbv->Query($sql);
            if($dbv->NumRows() > 0){
                $dbv->NextRecord();
                $rem_fecha = $db->Record['rem_fecha'];
                $rem_fecha_cier = $db->Record['rem_fecha_cier'];

                if($cierre == null){
                $fecha_evaluacion = $rem_fecha; 
                }else{
                $fecha_evaluacion = $rem_fecha_cier;
                }            
            }        
        }    
        $diff_dias = diffDate( $fecha_evaluacion,$hoy, 'D');

        //echo $diff_dias;

        $LIMITE_DIAS = 35;
        $LIMITE_PORCENTAJE = 50;


        if ($diff_dias < $LIMITE_DIAS) {
          $T->Set('color_alerta', 'red');
          $T->Set('alerta', 'No enviar');
        }else{
          if($PORC_VENDIDO > $LIMITE_PORCENTAJE){    
             $T->Set('color_alerta', 'red');
             $T->Set('alerta', 'No enviar');
          }else{
             $T->Set('color_alerta', 'green'); 
             $T->Set('alerta', 'Puede enviar');
          }
       
        }
    
    }else{
       $T->Set('color_alerta', 'white'); 
       $T->Set('alerta', 'Puede ------------');
    }

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CANTIDAD += 0 + $el['CANTIDAD'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANTIDAD', number_format($subtotal0_CANTIDAD,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANTIDAD = 0;
    }
    
    //Actualize Old Values Variables
    $old['Nro'] = $el['Nro'];
    $old['CODIGO'] = $el['CODIGO'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COLOR'] = $el['COLOR'];   $old['DESCRIP'] = $el['DESCRIP'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['ESTADO'] = $el['ESTADO'];
    $old['MARCAR'] = $el['MARCAR'];
    $old['URGENTE'] = $el['URGENTE']; 
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
$T->Show('end_query0');				// Ends a Table 

?>

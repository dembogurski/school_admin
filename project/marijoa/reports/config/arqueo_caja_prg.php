<?php

/** Report prg file (arqueo_caja) 
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
$T->Set( 'sup_empr', '02');
$T->Set( 'sup_moneda', '%');
$T->Set( 'sup_es', '%');
$T->Set( 'sup_mov_cons', 'No');
$T->Set( 'sup_m_cons', '5');
$T->Set( 'sup_fecha', '2011-08-19');
$T->Set( 'sup_fechah', '2011-08-19');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_fecha_inv', '2011-08-19');
$T->Set( 'sup_fechah_inv', '2011-08-19');
$T->Set( 'sup_defer', '0');
$T->Set( 'sup_rep_mov', '');
$T->Set( 'sup_rep_arqueo', '');
$T->Set( 'sup___msg', '( ! ) No necesita hacer reportes tan grades eso podria dejar mas lento el sistema!!! ');
$T->Set( 'sup___msg2', '( ! ) Elija un rango de fecha menor!!!
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$desde = $sup['fecha'];
$hasta = $sup['fechah'];
$suc = $sup['empr'];
$vend = getSellerList($suc,$desde,$hasta);

$arr_usuarios = array();

$query0 = "SELECT DISTINCT fact_vend_cod AS VENDEDOR, func_nombre as NOMBRE  FROM factura WHERE fact_fecha BETWEEN '$desde' AND '$hasta'  AND  fact_localidad = '$suc' AND fact_estado = 'Cerrada' ORDER BY fact_vend_cod ASC ";



$data_ini = substr($sup['fecha'],8,2).'-'.substr($sup['fecha'],5,2).'-'.substr($sup['fecha'],0,4);
$data_fin = substr($sup['fechah'],8,2).'-'.substr($sup['fechah'],5,2).'-'.substr($sup['fechah'],0,4);
$T->Set('desde',$data_ini);
//$T->Set('desde',$vend.','.$suc.','.$desde.','.$hasta);
$T->Set('hasta',$data_fin);

$db = new Y_DB();
$db->Database = $Global['project'];



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

$Z_CONTADO = 0;
$Z_CREDITO = 0;
$ZT_CREDITO = 0;
$ZT_DEBITO = 0;
$Z_CONVENIO = 0;
$Z_EFECTIVO = 0;
$Z_CHQ_AL_DIA = 0;
$Z_CHQ_DIFF = 0;
$Z_CUOTAS = 0;
$Z_CUOTAS_EFECTIVO = 0;
$Z_CUOTAS_CONVENIO = 0;
$DEVOLUCION = 0;

$Z_VENDEDOR = 0;
$Z_CONTADO_CREDITO = 0;
$Z_MONTO_DEVOLUCION = 0;
$Z_MONTO_DEVOLUCION_EFECTIVO = 0;

$vendedores = "'-1'";

// Making a rows of consult
//while( false ){
foreach($vend as $vendedor => $nombre){   
    // Define a elements    
    $vendedores.=",'$vendedor'";
    
    // Preparing a template variables
    $T->Set('query0_VENDEDOR', $vendedor);
    $T->Set('query0_NOMBRE', $nombre);

    // VENTAS AL CONTADO
    //$db->Query("SELECT SUM(f.fact_total) AS CONTADO FROM factura f WHERE f.fact_vend_cod LIKE '$vendedor' AND f.fact_localidad = '$suc' AND f.fact_fecha  BETWEEN '$desde' AND '$hasta' AND f.fact_estado =  'Cerrada' AND f.fact_tipo = 'Contado' ");
    $db->Query("SELECT SUM(df_subtotal) AS CONTADO FROM factura f, det_factura d WHERE f.fact_nro = d.df_fact_num and f.fact_vend_cod LIKE '$vendedor' AND f.fact_localidad = '$suc' AND f.fact_fecha  BETWEEN '$desde' AND '$hasta' AND f.fact_estado =  'Cerrada' AND f.fact_tipo = 'Contado' and d.df_cod_prod != 1002 ");
    $db->NextRecord();
    $contado = $db->Record['CONTADO'];
    $T->Set('contado', number_format($contado,0,',','.'));
    $Z_CONTADO += 0 + $contado;
    
    

     // VENTAS A CREDITO
    $db->Query("SELECT SUM(f.fact_total) AS CREDITO FROM factura  f WHERE f.fact_vend_cod LIKE '$vendedor' AND f.fact_localidad = '$suc' AND f.fact_fecha  BETWEEN '$desde' AND '$hasta' AND f.fact_estado =  'Cerrada' AND f.fact_tipo = 'Credito' ");
    $db->NextRecord();
    $credito  = $db->Record['CREDITO'];
    $T->Set('credito', number_format($credito,0,',','.'));
    $Z_CREDITO += 0 + $credito;


    // VENTAS TARJETA CREDITO
    $db->Query("SELECT SUM(f.fact_total - d.dp_moneda_ref) AS T_CREDITO FROM factura f, fact_detalle_pg d  WHERE f.fact_nro = d.dp_fact_nro AND  f.fact_vend_cod LIKE '$vendedor' AND f.fact_localidad = '$suc' AND f.fact_fecha BETWEEN '$desde' AND '$hasta' AND f.fact_estado = 'Cerrada' AND d.dp_conv_tipo = 'Tarjeta Credito' ORDER BY fact_vend_cod ASC");
    $db->NextRecord();
    $T_CREDITO = $db->Record['T_CREDITO'];
    $T->Set('T_CREDITO', number_format($T_CREDITO,0,',','.'));
    $ZT_CREDITO += 0 + $T_CREDITO;

    // VENTAS TARJETA DEBITO
    $db->Query("SELECT SUM(f.fact_total - d.dp_moneda_ref) AS T_DEBITO FROM factura f, fact_detalle_pg d  WHERE f.fact_nro = d.dp_fact_nro AND  f.fact_vend_cod LIKE '$vendedor' AND f.fact_localidad = '$suc' AND f.fact_fecha BETWEEN '$desde' AND '$hasta' AND f.fact_estado = 'Cerrada' AND d.dp_conv_tipo = 'Tarjeta Debito'  ORDER BY fact_vend_cod ASC");
    $db->NextRecord();
    $T_DEBITO = $db->Record['T_DEBITO'];
    $T->Set('T_DEBITO', number_format($T_DEBITO,0,',','.'));
    $ZT_DEBITO += 0 + $T_DEBITO;

    // VENTAS CON ORDENES DE COMPRA
    $db->Query("SELECT SUM(f.fact_total - d.dp_efectivo) AS CONVENIO FROM factura f, fact_detalle_pg d  WHERE f.fact_nro = d.dp_fact_nro AND  f.fact_vend_cod LIKE '$vendedor' AND f.fact_localidad = '$suc' AND f.fact_fecha BETWEEN '$desde' AND '$hasta' AND f.fact_estado = 'Cerrada' AND d.dp_conv_tipo = 'Convenio' ORDER BY fact_vend_cod ASC");
    $db->NextRecord();
    $CONVENIO = $db->Record['CONVENIO'];
    $T->Set('CONVENIO', number_format($CONVENIO,0,',','.'));
    $Z_CONVENIO += 0 + $CONVENIO;

    //  Entregas en Efectivo por Tarjeta de Credito y Convenios 
    $db->Query("SELECT SUM(d.dp_moneda_ref) AS EFECTIVO FROM factura f, fact_detalle_pg d  WHERE f.fact_nro = d.dp_fact_nro AND  f.fact_vend_cod LIKE '$vendedor' AND f.fact_localidad = '$suc' AND f.fact_fecha BETWEEN '$desde' AND '$hasta' AND f.fact_estado = 'Cerrada' AND d.dp_conv_tipo like '%' ORDER BY fact_vend_cod ASC");
    $db->NextRecord();
    $EFECTIVO = $db->Record['EFECTIVO'];
    $T->Set('EFECTIVO', number_format($EFECTIVO,0,',','.'));
    $Z_EFECTIVO += 0 + $EFECTIVO;

    //  Cheques de terceros
    $db->Query("SELECT SUM(c.chq_valor) AS CHEQUES FROM factura f,  cheq_terceros c  WHERE f.fact_nro = c.chq_ref AND  f.fact_vend_cod LIKE '$vendedor' AND f.fact_localidad = '$suc' AND f.fact_fecha BETWEEN '$desde' AND '$hasta' AND f.fact_estado = 'Cerrada' and c.chq_fecha_pag BETWEEN '$desde' AND '$hasta' ORDER BY fact_vend_cod ASC");
    $db->NextRecord();
    $CHEQUES = $db->Record['CHEQUES'];
    $T->Set('CHEQUES', number_format($CHEQUES,0,',','.'));
    $Z_CHQ_AL_DIA +=0+$CHEQUES;

    $db->Query("SELECT SUM(c.chq_valor) AS CHEQUES_DIF FROM factura f,  cheq_terceros c  WHERE f.fact_nro = c.chq_ref AND  f.fact_vend_cod LIKE '$vendedor' AND f.fact_localidad = '$suc' AND f.fact_fecha BETWEEN '$desde' AND '$hasta' AND f.fact_estado = 'Cerrada' and c.chq_fecha_pag > '$hasta'  ORDER BY fact_vend_cod ASC");
    $db->NextRecord();
    $CHEQUES_DIF = $db->Record['CHEQUES_DIF'];
    $T->Set('CHEQUES_DIF', number_format($CHEQUES_DIF,0,',','.'));
    $Z_CHQ_DIFF +=0+$CHEQUES_DIF;


    //  Cuotas
    $db->Query("SELECT SUM(c.ct_total) AS CUOTAS FROM factura f,  cuotas c  WHERE f.fact_nro = c.ct_ref AND  f.fact_vend_cod LIKE '$vendedor' AND f.fact_localidad = '$suc' AND f.fact_fecha BETWEEN '$desde' AND '$hasta' AND f.fact_estado = 'Cerrada'  ORDER BY fact_vend_cod ASC");
    $db->NextRecord();
    $CUOTAS = $db->Record['CUOTAS'];
    $T->Set('CUOTAS', number_format($CUOTAS,0,',','.'));
    $Z_CUOTAS +=0+$CUOTAS;

    //  Cuotas cobro en efectivo
    $db->Query("SELECT SUM(m.cm_entrada) AS CUOTAS_EFECTIVO FROM caja_mov m, factura f  WHERE m.cm_compl LIKE 'Cobro Cuota Nro%' AND f.fact_nro = SUBSTRING(m.cm_compl,23,7)   AND  f.fact_vend_cod LIKE '$vendedor' AND f.fact_localidad = '$suc' AND m.cm_fecha BETWEEN '$desde' AND '$hasta' AND f.fact_estado = 'Cerrada'  ORDER BY fact_vend_cod ASC");
    $db->NextRecord();
    $CUOTAS_EFECTIVO = $db->Record['CUOTAS_EFECTIVO'];
    $T->Set('CUOTAS_EFECTIVO', number_format($CUOTAS_EFECTIVO,0,',','.'));
    $Z_CUOTAS_EFECTIVO +=0+$CUOTAS_EFECTIVO;


    //  Cuotas cobro de Convenios
    $db->Query("SELECT SUM(m.cm_entrada) AS CUOTAS_CONVENIO FROM caja_mov m, factura f  WHERE m.cm_compl LIKE 'Cobro Cuota Convenio:%' AND f.fact_nro = SUBSTRING(m.cm_compl,23,7) AND  f.fact_vend_cod LIKE '$vendedor' AND f.fact_localidad = '$suc' AND m.cm_fecha BETWEEN '$desde' AND '$hasta' AND f.fact_estado = 'Cerrada'  ORDER BY fact_vend_cod ASC");
    $db->NextRecord();
    $CUOTAS_CONVENIO = $db->Record['CUOTAS_CONVENIO'];
    $T->Set('CUOTAS_CONVENIO', number_format($CUOTAS_CONVENIO,0,',','.'));
    $Z_CUOTAS_CONVENIO +=0+$CUOTAS_CONVENIO;


    //  Cheques cobro AL DIA
    $db->Query("SELECT SUM(chq_valor) AS CHQ_AL_DIA FROM cheq_terceros WHERE chq_fecha_ins BETWEEN '$desde' AND '$hasta' AND __local = '$suc' AND chq_fecha_emis = chq_fecha_pag AND chq_ref LIKE 'Cobro%'");
    $db->NextRecord();
    $CHQ_AL_DIA = $db->Record['CHQ_AL_DIA'];
    $T->Set('CHQ_AL_DIA', number_format($CHQ_AL_DIA,0,',','.'));

    //  Cheques cobro diferidos
    $db->Query("SELECT SUM(chq_valor) AS CHQ_DIFF FROM cheq_terceros WHERE chq_fecha_ins  BETWEEN '$desde' AND '$hasta'  AND __local = '$suc' AND  chq_fecha_emis <> chq_fecha_pag AND chq_ref LIKE 'Cobro%' ");
    $db->NextRecord();
    $CHQ_DIFF = $db->Record['CHQ_DIFF'];
    $T->Set('CHQ_DIFF', number_format($CHQ_DIFF,0,',','.'));

    //  Devoluciones
    $db->Query("SELECT SUM(d.monto_dev) AS MONTO_DEVOLUCION FROM devoluciones d, factura f WHERE f.fact_nro = d.fact_nro AND  forma LIKE 'Efectivo' AND dv_hoy  BETWEEN '$desde' AND '$hasta' AND f.fact_vend_cod LIKE '$vendedor'");
    $db->NextRecord();
    $MONTO_DEVOLUCION_EFECTIVO = $db->Record['MONTO_DEVOLUCION'];
    $Z_MONTO_DEVOLUCION_EFECTIVO   +=0+$MONTO_DEVOLUCION_EFECTIVO;  // Solo en Efectivo
    
    $titulo_dev = '';
    if($MONTO_DEVOLUCION_EFECTIVO != null){
        $titulo_dev.=' Efectivo '.$MONTO_DEVOLUCION_EFECTIVO;
    }

    //$DEVOLS = $MONTO_DEVOLUCION_EFECTIVO + $MONTO_DEV_NO_EFEC;
    $Z_VENDEDOR = $contado += 0 + $credito - ($MONTO_DEVOLUCION_EFECTIVO); // Solo Resto si es efectivo
    $T->Set('Z_VENDEDOR', number_format($Z_VENDEDOR,0,',','.'));

    // Devoluciones = Tela  // Tela    // Nota Credito no se muestra en Arqueo de caja
    $db->Query("SELECT SUM(d.monto_dev) AS MONTO_DEV_NO_EFEC FROM devoluciones d, factura f WHERE f.fact_nro = d.fact_nro AND  forma = 'Tela' AND dv_hoy  BETWEEN '$desde' AND '$hasta' AND f.fact_vend_cod LIKE '$vendedor'");
    $db->NextRecord();
    $MONTO_DEV_NO_EFEC = $db->Record['MONTO_DEV_NO_EFEC'];
    if($MONTO_DEV_NO_EFEC != null){
        $titulo_dev.=' Tela '.$MONTO_DEV_NO_EFEC;
    }
    $T->Set('titulo_devolucion',$titulo_dev);
    
    $z_DEVOLUCIONES = $MONTO_DEVOLUCION_EFECTIVO + $MONTO_DEV_NO_EFEC;
    $T->Set('MONTO_DEVOLUCION', number_format($z_DEVOLUCIONES,0,',','.'));

    $Z_MONTO_DEVOLUCION +=0+ $MONTO_DEVOLUCION_EFECTIVO ;
    
    


    //$Z_MONTO_DEVOLUCION +=0+$MONTO_DEVOLUCION_EFECTIVO;


    /*$db->Query("SELECT SUM(m.cm_salida) AS DEVOLUCION FROM caja_mov m  WHERE m.cm_con LIKE '102%' and m.cm_empr = '$suc' AND m.cm_fecha BETWEEN '$desde' AND '$hasta';  ");
    $db->NextRecord();
    $DEVOLUCION = $db->Record['DEVOLUCION'];
    $T->Set('DEVOLUCION', number_format($DEVOLUCION,0,',','.')); */

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        $Z_VENDEDOR = 0;
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables    
    $firstRow=false;

}
 

// Poner aqui los cobros por los demas vendedores sumar  $Z_CUOTAS_EFECTIVO
 

    $db->Query("SELECT SUM(m.cm_entrada) AS CUOTAS_EFECTIVO, fact_vend_cod, func_nombre
    FROM caja_mov m, factura f  WHERE m.cm_compl LIKE 'Cobro Cuota Nro%' AND f.fact_nro = SUBSTRING(m.cm_compl,23,7)   AND  f.fact_vend_cod NOT IN ($vendedores) AND
    f.fact_localidad = '$suc' AND m.cm_fecha BETWEEN '$desde' AND '$hasta' AND f.fact_estado = 'Cerrada'
    GROUP BY fact_vend_cod  ORDER BY fact_vend_cod ASC");
    if($db->NumRows()>0){
        $db->NextRecord();
        $CUOTAS_EFECTIVO = $db->Record['CUOTAS_EFECTIVO'];
        $funcionario = $db->Record['func_nombre'];
        $T->Set('CUOTAS_EFECTIVO', number_format($CUOTAS_EFECTIVO,0,',','.'));
        $Z_CUOTAS_EFECTIVO +=0+$CUOTAS_EFECTIVO;
        $T->Set('query0_NOMBRE', $funcionario);
        $T->Set('contado', '-');
        $T->Set('credito', '-');
        $T->Set('T_CREDITO', '-');
        $T->Set('T_DEBITO', '-');
        $T->Set('CONVENIO', '-');
        $T->Set('EFECTIVO', '-');
        $T->Set('CHEQUES', '-');
        $T->Set('CUOTAS', '-');
        $T->Set('CHEQUES_DIF', '-');
        $T->Set('CUOTAS_CONVENIO', '-');
        $T->Set('MONTO_DEVOLUCION', '-');
        $T->Set('Z_VENDEDOR', '-');
        
        $T->Show('query0_data_row');
    }

if( true ){
    $CONTADO = $Z_CONTADO; //Auxiliar
    
   
    $T->Set('Z_CONTADO', number_format($Z_CONTADO,0,',','.'));
    $T->Set('Z_CREDITO', number_format($Z_CREDITO,0,',','.'));
    $T->Set('ZT_CREDITO', number_format($ZT_CREDITO,0,',','.'));
    $T->Set('ZT_DEBITO', number_format($ZT_DEBITO,0,',','.'));
    $T->Set('Z_CONVENIO', number_format($Z_CONVENIO,0,',','.'));
    $T->Set('Z_EFECTIVO', number_format($Z_EFECTIVO,0,',','.'));
    $T->Set('Z_CHQ_AL_DIA', number_format($Z_CHQ_AL_DIA,0,',','.'));
    $T->Set('Z_CHQ_DIFF', number_format($Z_CHQ_DIFF,0,',','.'));
    $T->Set('Z_CUOTAS', number_format($Z_CUOTAS,0,',','.'));
    $T->Set('Z_CUOTAS_EFECTIVO', number_format($Z_CUOTAS_EFECTIVO,0,',','.'));
    $T->Set('Z_CUOTAS_CONVENIO', number_format($Z_CUOTAS_CONVENIO,0,',','.'));
    $T->Set('Z_MONTO_DEVOLUCION', number_format($Z_MONTO_DEVOLUCION,0,',','.'));

    $TOTAL_VENTAS = $Z_CONTADO +=0+ $Z_CREDITO - $Z_MONTO_DEVOLUCION;
    $T->Set('TOTAL_VENTAS', number_format($TOTAL_VENTAS,0,',','.'));

    $TOTAL_EFECTIVO = $CONTADO + $Z_EFECTIVO + $Z_CUOTAS_EFECTIVO + $Z_CUOTAS_CONVENIO - $Z_MONTO_DEVOLUCION_EFECTIVO;
     //echo "$CONTADO + $Z_EFECTIVO + $Z_CUOTAS_EFECTIVO + $Z_CUOTAS_CONVENIO - $Z_MONTO_DEVOLUCION_EFECTIVO;";
    
    
    $T->Set('total_efectivo', number_format(round($TOTAL_EFECTIVO),0,',','.'));

    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
//$T->Show('end_query0');				// Ends a Table
//$T->Show('cobros_cheques');

// Excluir conceptos
$exluir = "AND cm_con <> '55' AND cm_con <> '54' AND cm_con <> '53' ";

$db->Query("SELECT SUM(cm_entrada - cm_salida) as GS  FROM caja_mov WHERE cm_fecha BETWEEN '$desde' AND '$hasta' AND cm_empr = '$suc' AND cm_moneda = 'G$' $exluir");
$db->NextRecord();
$GS = $db->Record['GS'];
$T->Set("zgs",number_format(round($GS),0,',','.'));

$Z_40 = $TOTAL_EFECTIVO * 40 / 100;
$Z_60 = $TOTAL_EFECTIVO * 60 / 100;

$T->Set("marijoa",number_format(round($Z_60),0,',','.'));
$T->Set("comercial",number_format(round($Z_40),0,',','.'));

$db->Query("SELECT SUM(cm_entrada - cm_salida) as RS  FROM caja_mov WHERE cm_fecha BETWEEN '$desde' AND '$hasta' AND cm_empr = '$suc' AND cm_moneda = 'R$' $exluir");
$db->NextRecord();
$RS = $db->Record['RS'];
$T->Set("zrs",number_format(round($RS),0,',','.'));
//$T->Set("rs",round($RS));

$db->Query("SELECT SUM(cm_entrada - cm_salida) as US  FROM caja_mov WHERE cm_fecha BETWEEN '$desde' AND '$hasta' AND cm_empr = '$suc' AND cm_moneda = 'U$' $exluir");
$db->NextRecord();
$US = $db->Record['US'];
$T->Set("zus",number_format(round($US),0,',','.'));
//$T->Set("rs",round($US));


$db->Query("SELECT SUM(cm_entrada - cm_salida) as PS  FROM caja_mov WHERE cm_fecha BETWEEN '$desde' AND '$hasta' AND cm_empr = '$suc' AND cm_moneda = 'P$' $exluir");
$db->NextRecord();
$PS = $db->Record['PS'];
$T->Set("zps",number_format(round($PS),0,',','.'));
//$T->Set("ps",round($PS));


$T->Show('totales');
$T->Show('cab_cheques_x_ventas');

$db->Query("SELECT chq_nombre_de AS CLIENTE, chq_bco AS BANCO, chq_cta AS CUENTA, chq_num AS Nro, chq_valor AS VALOR,DATE_FORMAT(chq_fecha_emis,'%d-%m-%Y') AS FECHA_EMIS,
    DATE_FORMAT(chq_fecha_pag,'%d-%m-%Y') AS FECHA_PAGO
    FROM cheq_terceros WHERE chq_ref NOT LIKE 'Cobro%' AND  __local = '$suc' AND chq_fecha_ins BETWEEN '$desde' AND '$hasta' ");


$valor_cheques = 0;

while($db->NextRecord()){
  $CLIENTE = $db->Record['CLIENTE'];
  $BANCO = $db->Record['BANCO'];
  $CUENTA = $db->Record['CUENTA'];
  $Nro = $db->Record['Nro'];
  $FECHA_EMIS = $db->Record['FECHA_EMIS'];
  $FECHA_PAGO = $db->Record['FECHA_PAGO'];
  $VALOR = $db->Record['VALOR'];
  $T->Set("cliente",$CLIENTE);
  $T->Set("cuenta",$CUENTA);
  $T->Set("nro",$Nro);
  $T->Set("banco",$BANCO);
  $T->Set("valor",number_format($VALOR,0,',','.'));
  $T->Set("fecha_emis",$FECHA_EMIS );
  $T->Set("fecha_pago",$FECHA_PAGO );
  $T->Show('cheques_x_ventas_data');
  $valor_cheques +=0+$VALOR;
}

$T->Set('valor_total', number_format($valor_cheques,0,',','.'));
$T->Show('cheques_x_ventas_totales');
$valor_cheques = 0;



 $db->Query("SELECT chq_nombre_de AS CLIENTE, chq_bco AS BANCO, chq_cta AS CUENTA, chq_num AS Nro, chq_valor AS VALOR,DATE_FORMAT(chq_fecha_emis,'%d-%m-%Y') AS FECHA_EMIS,
 DATE_FORMAT(chq_fecha_pag,'%d-%m-%Y') AS FECHA_PAGO
 FROM cheq_terceros WHERE chq_ref LIKE 'Cobro%' AND  __local = '$suc' AND chq_fecha_ins BETWEEN '$desde' AND '$hasta' ");

$T->Show('cab_cheques_cobrados');
while($db->NextRecord()){
  $CLIENTE = $db->Record['CLIENTE'];
  $BANCO = $db->Record['BANCO'];
  $CUENTA = $db->Record['CUENTA'];
  $Nro = $db->Record['Nro'];
  $FECHA_EMIS = $db->Record['FECHA_EMIS'];
  $FECHA_PAGO = $db->Record['FECHA_PAGO'];
  $VALOR = $db->Record['VALOR'];
  $T->Set("cliente",$CLIENTE);
  $T->Set("cuenta",$CUENTA);
  $T->Set("nro",$Nro);
  $T->Set("banco",$BANCO);
  $T->Set("valor", number_format($VALOR,0,',','.'));
  $T->Set("fecha_emis",$FECHA_EMIS );
  $T->Set("fecha_pago",$FECHA_PAGO );
  $T->Show('cheques_x_ventas_data');
  $valor_cheques +=0+$VALOR;
}

$T->Set('valor_total', number_format($valor_cheques,0,',','.')); 
$T->Show('cheques_x_ventas_totales');



//Retiros con Señas de Reserva
$db->Query("SELECT fact_nro AS Factura,f.fact_cli_ci AS RUC,f.fact_nom_cli AS Cliente,DATE_FORMAT(f.fact_fecha,'%d-%m-%Y') AS Fecha,fact_localidad AS Suc,f.fact_total AS Total,df_descrip AS Descrip,df_subtotal * - 1 AS Reserva 
FROM factura f, det_factura d WHERE f.fact_nro = d.df_fact_num AND  df_cod_prod = '1002' AND f.fact_estado = 'Cerrada' AND fact_localidad = '$suc' AND f.fact_fecha BETWEEN '$desde' and '$hasta' ");
if($db->NextRecord()){
	$T->Show('retiro_sena_reservas');
	do{
		$T->Set('rsr_fact',$db->Record['Factura']);
		$T->Set('rsr_RUC',$db->Record['RUC']);
		$T->Set('rsr_cli',$db->Record['Cliente']);
		$T->Set('rsr_fecha',$db->Record['Fecha']);
		$T->Set('rsr_suc',$db->Record['Suc']);
		$T->Set('rsr_total',$db->Record['Total']);
		$T->Set('rsr_descrip',$db->Record['Descrip']);
		$T->Set('rsr_reserva',$db->Record['Reserva']);
		$T->Show('retiro_sena_reservas_det');
	}while($db->NextRecord());
}
$T->Show('retiro_sena_reservas_pie');
$T->Show('pie_cheques_x_ventas1');
//$db->Query("SELECT UPPER(cm_compl) AS OBS,cm_moneda AS MONEDA,cm_entrada AS ENTRADA, cm_salida AS SALIDA,cm_cambio AS COTIZ,cm_entrada_ref AS E_REF, cm_salida_ref AS S_REF  FROM caja_mov WHERE (cm_con LIKE '9-%' OR cm_con LIKE '33-1' OR cm_con LIKE '33-2' OR cm_con LIKE '8-1' OR ( cm_con LIKE '8-2' AND cm_moneda != 'G$' ))  AND cm_empr = '$suc' AND cm_fecha between '$desde' and '$hasta' ");
$db->Query("SELECT UPPER(cm_compl) AS OBS,cm_moneda AS MONEDA,cm_entrada AS ENTRADA, cm_salida AS SALIDA,cm_cambio AS COTIZ,cm_entrada_ref AS E_REF, cm_salida_ref AS S_REF  FROM caja_mov WHERE (cm_con LIKE '9-%' OR cm_con LIKE '33-1' OR cm_con LIKE '33-2' OR cm_con LIKE '8-1' OR cm_con LIKE '8-2')  AND cm_empr = '$suc' AND cm_fecha between '$desde' and '$hasta' ");

$tot_ent = 0;
$tot_sal = 0;
$tot_ent_tot_sal = 0;
$i = 1;
if($db->NumRows()>0){
	$T->Show('pie_cheques_x_ventas2');
	while($db->NextRecord()){
	  $obs = $db->Record['OBS'];
	  $MONEDA = $db->Record['MONEDA'];
	  $ENTRADA = $db->Record['ENTRADA'];
	  $SALIDA = $db->Record['SALIDA'];
	  $COTIZ = $db->Record['COTIZ'];
	  $E_REF = $db->Record['E_REF'];
	  $S_REF = $db->Record['S_REF'];
	  $T->Set("E_REF", number_format(round($E_REF),0,',','.'));
	  $T->Set("S_REF", number_format(round($S_REF),0,',','.'));

	  $T->Set("cotiz",$COTIZ);
	  $T->Set("obs",$obs);
	  $T->Set("moneda",$MONEDA );
	  $T->Set("ent",number_format($ENTRADA,2,',','.'));
	  $T->Set("sal",number_format($SALIDA,2,',','.'));

	  $T->Set("id",$i);
	  $T->Show('diferencias_x_perdida');
	  
	  $tot_ent+=0+$E_REF;
	  $tot_sal+=0+$S_REF;
	  $i++;
	}
	$T->Set("tot_ent",number_format(round($tot_ent),0,',','.'));
	$T->Set("tot_sal",number_format(round($tot_sal),0,',','.'));


	$DIFF_AJUSTES =round($tot_ent - $tot_sal);
	$T->Set("diff_ajustes", number_format( $DIFF_AJUSTES  ,0,',','.'));
	if($DIFF_AJUSTES > 0){
	   $T->Set("color_ajuste","green");
	}else{
	   $T->Set("color_ajuste","red");
	}
	$T->Show('diferencias_x_totales');
}
// Intereses ganados
 
$db->Query("SELECT UPPER(cm_compl) AS OBS,cm_moneda AS MONEDA,cm_entrada AS ENTRADA, cm_salida AS SALIDA,cm_cambio AS COTIZ,
cm_entrada_ref AS E_REF, cm_salida_ref AS S_REF  FROM caja_mov WHERE (cm_con LIKE '6-4') AND cm_empr = '$suc' AND cm_fecha between '$desde' and '$hasta' ");

$tot_ent = 0;
$tot_sal = 0;
$tot_ent_tot_sal = 0;
$i = 21;
if($db->NumRows()>0){
	$T->Show('intereses_cab');
	while($db->NextRecord()){
	  $obs = $db->Record['OBS'];
	  $MONEDA = $db->Record['MONEDA'];
	  $ENTRADA = $db->Record['ENTRADA'];
	  $SALIDA = $db->Record['SALIDA'];
	  $COTIZ = $db->Record['COTIZ'];
	  $E_REF = $db->Record['E_REF'];
	  $S_REF = $db->Record['S_REF'];
	  $T->Set("E_REF", number_format(round($E_REF),0,',','.'));
	  $T->Set("S_REF", number_format(round($S_REF),0,',','.'));

	  $T->Set("cotiz",$COTIZ);
	  $T->Set("obs",$obs);
	  $T->Set("moneda",$MONEDA );
	  $T->Set("ent",number_format($ENTRADA,2,',','.'));
	  $T->Set("sal",number_format($SALIDA,2,',','.'));

	  $T->Set("id",$i);
	  $T->Show('intereses_data');
	  
	  $tot_ent+=0+$E_REF;
	  $tot_sal+=0+$S_REF;
	  $i++;
	}
	$T->Set("tot_int", number_format( $tot_ent  ,0,',','.'));

	$T->Show('intereses_total');
	$T->Show('intereses_pie');
} 
$T->Show('pie_cheques_x_ventas3');
$T->Show('end_query0');	


function getSellerList($suc,$date_from,$date_to){
	$vend = array();
	$db = new Y_DB();$db->Database = 'marijoa';
	
	
	$db->Query("SELECT fact_vend_cod AS seller_cod, func_nombre as seller_name FROM factura WHERE fact_fecha BETWEEN '$date_from' AND '$date_to'  AND  fact_localidad = '$suc' AND fact_estado = 'Cerrada' ORDER BY fact_vend_cod ASC ");
	
	while($db->NextRecord()){
		$vend[$db->Record['seller_cod']]=$db->Record['seller_name'];
	}
	
	$db->Query("SELECT fact_vend_cod AS seller_cod, func_nombre as seller_name FROM devoluciones d inner join factura f on f.fact_nro = d.fact_nro where  forma LIKE 'Efectivo' AND dv_hoy  BETWEEN '$date_from' AND '$date_to' and f.fact_localidad = '$suc'");
	
	while($db->NextRecord()){
		$seller_cod = $db->Record['seller_cod'];
		if(!array_key_exists($seller_cod,$vend)){
			$vend[$seller_cod]=$db->Record['seller_name'];
		}		
	}	
	$db->Query("SELECT fact_vend_cod AS seller_cod, func_nombre as seller_name FROM cuotas_det_pago c inner join factura f on f.fact_nro = c.d_ref where c.d_fecha BETWEEN '$date_from' AND '$date_to' and f.fact_localidad = '$suc'");
	
	while($db->NextRecord()){
		$seller_cod = $db->Record['seller_cod'];
		if(!array_key_exists($seller_cod,$vend)){
			$vend[$seller_cod]=$db->Record['seller_name'];
		}		
	}
	
	return $vend;
}
?>


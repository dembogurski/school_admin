<html>
<head>
<style>
h1,h2{	
	text-align:center;
}
h3{
	text-align:right;
}
</style>
</head>
<body>

<?php
require_once("csv.lib.php");
require_once("dbmysql.class.php");
$T = new Y_Template( $file_tpl ); 
$desde = $sup['desde'];
$hasta = $sup['hasta'];
$suc = $sup['rep_localidad'];
$user = $Global['username'];
$fecha_hora = daytime();
$tipo = $sup['rep_cont_cred'];
$query1 = false;
$name = $sup['rep_cont_cred'];
$f_numeros = '';

echo "<h1>Reporte Facturas $tipo</h1>";

if( $name == 'Contado'){
	$query0 = "SELECT fact_nro as DocNum, '$suc' AS SUC, 'S' as DocType, date_format(f.fact_fecha,'%Y%m%d') as DocDate, date_format(f.fact_fecha,'%Y%m%d') as DocDueDate, f.fact_cli_ci as CardCode, 'G$' as DocCur, (select sum(df_subtotal)from det_factura where df_fact_num = f.fact_nro) as DocTotal, '-1' as GroupNum, '$suc' as Indicator, 'FV' as FolioPref, right(concat('0000000',c.f_nro),7) as FolioNum, if(c.f_nro>0,'','1') as BPLId, c.f_estab as U_SER_EST ,c.f_pdv AS U_SER_PE ,' ' as U_NUM_AUTOR, if(c.f_nro>0,'SI','NO') as U_DOC_DECLARABLE from factura f left join fact_cont c on  f.fact_nro = c.f_ref where fact_localidad LIKE '$suc' AND f.fact_fecha BETWEEN '$desde' AND '$hasta'  AND fact_estado = 'Cerrada' AND NOT EXISTS (SELECT * FROM cuotas WHERE ct_ref = fact_nro) AND NOT EXISTS (SELECT * FROM cuotas WHERE ct_ref = fact_nro) AND NOT EXISTS (SELECT * FROM cheq_terceros t WHERE f.fact_nro = t.chq_ref AND f.fact_fecha = t.chq_fecha_emis AND t.chq_fecha_pag = f.fact_fecha) ORDER BY SUC  LIMIT 100000;";
	// Consulta para Ventas con Cheques al Contado
	$query01 = "SELECT fact_nro as DocNum, '$suc' AS SUC, 'S' as DocType, date_format(f.fact_fecha,'%Y%m%d') as DocDate, date_format(f.fact_fecha,'%Y%m%d') as DocDueDate, f.fact_cli_ci as CardCode, 'G$' as DocCur,
(select sum(df_subtotal)from det_factura where df_fact_num = f.fact_nro) as DocTotal, '-1' as GroupNum, '$suc' as Indicator, 'FV' as FolioPref, right(concat('0000000',c.f_nro),7) as FolioNum, 
if(c.f_nro>0,'','1') as BPLId, c.f_estab as U_SER_EST ,c.f_pdv AS U_SER_PE ,' ' as U_NUM_AUTOR, if(c.f_nro>0,'SI','NO') as U_DOC_DECLARABLE 
from factura f inner join cheq_terceros t on f.fact_nro = t.chq_ref AND f.fact_fecha = t.chq_fecha_emis AND t.chq_fecha_pag = f.fact_fecha    
left join fact_cont c on  f.fact_nro = c.f_ref where fact_localidad LIKE '$suc' AND f.fact_fecha BETWEEN '$desde' AND '$hasta' AND fact_estado = 'Cerrada'       
ORDER BY SUC ";
}else{
	$query0 = "SELECT fact_nro as DocNum, '$suc' AS SUC, 'S' as DocType, date_format(f.fact_fecha,'%Y%m%d') as DocDate, date_format(max(ct.ct_fecha_venc),'%Y%m%d') as DocDueDate, f.fact_cli_ci as CardCode, 'G$' as DocCur, (select sum(df_subtotal)from det_factura where df_fact_num = f.fact_nro) as DocTotal, count(ct.ct_nro) as GroupNum, '01' as Indicator, 'FV' as FolioPref, right(concat('0000000',c.f_nro),7) as FolioNum, if(c.f_nro>0,'','1') as BPLId, ' ' as U_SER_EST ,f_pdv AS U_SER_PE ,' ' as U_NUM_AUTOR, if(c.f_nro>0,'SI','NO') as U_DOC_DECLARABLE from factura f left join fact_cont c on  f.fact_nro = c.f_ref  inner join cuotas ct on ct_ref = fact_nro where fact_localidad LIKE '$suc' AND f.fact_fecha BETWEEN '$desde' AND '$hasta'  AND fact_estado = 'Cerrada' group by fact_nro ORDER BY SUC  LIMIT 100000";
	$query1 = "SELECT fact_nro as DocNum, '$suc' AS SUC, 'S' as DocType, date_format(f.fact_fecha,'%Y%m%d') as DocDate, date_format(chq_fecha_pag,'%Y%m%d') as DocDueDate, f.fact_cli_ci as CardCode, 'G$' as DocCur, (select sum(df_subtotal)from det_factura where df_fact_num = f.fact_nro) as DocTotal, '1' as GroupNum, '01' as Indicator, 'FV' as FolioPref, right(concat('0000000',c.f_nro),7) as FolioNum, if(c.f_nro>0,'','1') as BPLId, ' ' as U_SER_EST ,f_pdv AS U_SER_PE ,' ' as U_NUM_AUTOR, if(c.f_nro>0,'SI','NO') as U_DOC_DECLARABLE from factura f left join fact_cont c on  f.fact_nro = c.f_ref inner join cheq_terceros ct on ct.chq_ref = f.fact_nro where chq_fecha_ins = f.fact_fecha and chq_fecha_pag > f.fact_fecha and fact_localidad LIKE '$suc' AND f.fact_fecha BETWEEN '$desde' AND '$hasta'  AND fact_estado = 'Cerrada' group by fact_nro ORDER BY SUC  LIMIT 100000";
}

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);

echo "<h2>Pr&iacute;odo $data_ini - $data_fin</h2>";
echo "<h3>$fecha_hora - $user</h3>";

$data_ini = substr($sup['desde'],8,2).'-'.
			substr($sup['desde'],5,2).'-'.
			substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.
			substr($sup['hasta'],5,2).'-'.
			substr($sup['hasta'],0,4);

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);

$file = 'reportesSAP/ReporteFactura'.$name.'SAP_desde_'.$data_ini.'_a_'.$data_fin.'.csv';

$archivo = fopen($file, "w");

$db = new DbMySQL("localhost", "marijoa", "plus", "case");
$db->connect();
$cvs_array = $db->select( $query0 );
$db2csv = new export2CSV(";","\n");
$csv = $db2csv->create_csv_file($cvs_array);

foreach ($cvs_array as $fact_num){
	$f_numeros .= "'".$fact_num['DocNum']."', ";
}
//Crefito, segunda consulta;
if($query1){
	$cvs_array = $db->select( $query1 );
	$db2csv = new export2CSV(";","\n");
	$csv .= $db2csv->create_csv_file($cvs_array);
	foreach ($cvs_array as $fact_num){
		$f_numeros .= "'".$fact_num['DocNum']."', ";
	}
	$f_numeros .= "'-1'";
}else{
	$f_numeros .= "'-1'";
}

fwrite($archivo,$csv);
fclose($archivo); 

$file_det = 'reportesSAP/ReporteFactura'.$name.'SAP_desde_'.$data_ini.'_a_'.$data_fin.'_detalle.csv';
$archivo = fopen($file_det, "w");
$query2 = "select f.fact_nro as DocNum, df.df_descrip as Description, (sum(df.df_subtotal)) as PriceAfVAT, 'G$' as Currency, '' as AccCode, 'IVA_10' as TaxCode, if((select count(*) from fact_cont where f_ref = f.fact_nro) > 0,'N','') as TaxStatus, (sum(df.df_subtotal)) as LineTotal  from factura f inner join det_factura df on f.fact_nro = df.df_fact_num where f.fact_nro in ($f_numeros)  group by f.fact_nro";
$cvs_array = $db->select( $query2 );
$db2csv = new export2CSV(";","\n");
$csv = $db2csv->create_csv_file($cvs_array);

fwrite($archivo,$csv);
fclose($archivo); 
echo "<b> Su Reporte ya esta listo </b><br>";

echo "<b> Su Reporte se guardo con el nombre de:</b> $file <br><br>";


echo "Para acceder a todos los reportes haga clik <a href='http://127.0.0.1/plus/reportesSAP/'> Aquí <A/><br><br><br>";

echo "<b> Al siguiente link dele Click derecho guardar enlace como (O en Ingles Save link as) elija el Escritorio o otro lugar que le paresca <b> <big> pongale un Nombre.csv </big> </b>  <br> 
 ejemplo   ReporteComprasDetalladas_20_02_2009.csv   o deje el que esta.</b><br><br>";
echo "<a href='$file'> (Reporte) Clic derecho aqui guardar enlace como<A/><br><br><br>";
echo "<a href='$file_det'> (Detalle) Clic derecho aqui guardar enlace como<A/><br><br><br>";
echo "<b> Despues abra Exell haga clic en el Menu Datos -->Obtener Datos Externos -->Importar Datos   elija el Archivo que guardo recientemente precione Siguiente En Separadores Tilde o marque 'Coma' <br> y presione siguiente en Avanzadas Separadores de decimales elija el punto y Finalizar </b><br>";

?>
</body>
</html>
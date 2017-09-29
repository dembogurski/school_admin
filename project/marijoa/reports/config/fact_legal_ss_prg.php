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
$f_cheques = '';
$f_cuotas = '';

$venc_cuota = "'00/01/1900'";
$cant_dias = 0;

if( $name == 'Contado'){
   $venc_cuota = "'00/01/1900'"; 
}else{ 
    $venc_cuota = "DATE_FORMAT(DATE_ADD(fact_fecha, INTERVAL 30 DAY), '%d/%m/%Y')";
    $cant_dias = "'30'";
}

$codigo1 = "'I' AS ven_tipimp, '0' AS ven_gra05,'0' AS ven_iva05,'' AS ven_disg05,'' AS cta_iva05,'1' AS ven_rubgra,'0' AS ven_rubg05,'G' AS ven_disexe,";
$codigo2 = "'0' AS ven_retenc,'0' AS ven_aux,'0' AS ven_ctrl,'Venta de Mercaderias' AS ven_con,'0' AS ven_cuota,$venc_cuota AS ven_fecven,$cant_dias AS cant_dias,
'LI' AS origen,'0' AS cambio,'0' AS valor,'' AS  moneda,'0' AS exen_dolar,'Venta de Mercaderias' AS concepto,'' AS cta_iva,'' AS cta_caja,'0' AS tkdesde,'0' AS tkhasta,'0' AS caja,'A' AS ven_disgra,'1' AS forma_devo,'' AS ven_cuense,'0' AS anular,'' AS reproceso,
'' AS cuenta_exe,'0' AS usu_ide,f_timbrado as rucvennrotim ";


echo "<h1>Reporte Facturas $tipo</h1>";
$Q0 = $DB;
$db = new DbMySQL("localhost", "marijoa", "plus", "case");
$db->connect();

$Q0->Query("SET SESSION group_concat_max_len = 100000000;");
$Q0->Query("UPDATE fact_cont SET f_ref = NULL WHERE f_estado = 'Anulada';");


$FACTURAS_LEGALES = "";

/*
SUCURSAL         ESTABLEIMIENTO
AVENIDA   (02)        001
CDE KM 3.5(06)        002
SANTA RITA(05)        004
CDE CENTRO(10)        005
OBLIGADO  (04)        006
TERMINAL  (01)        007
*/

// Actualizo la Primera vez la sda ya no Primero generar las de contado y despues credito
if( $name == 'Contado'){
        $sucs = array();
        $sucs["01"] = "007";
        $sucs["02"] = "001";
        $sucs["04"] = "006";
        $sucs["05"] = "004";
        $sucs["06"] = "002";
        $sucs["10"] = "005";

        foreach ($sucs as $suc => $estab) {
            $Q0->Query("UPDATE fact_cont SET f_estab = '$estab' WHERE f_suc = '$suc'");
            echo "Atualizando Establecimiento a $estab para sucursal $suc <br>";
        }
}
$sql_cuotas = "SELECT GROUP_CONCAT(fact_nro) as f_cuotas FROM factura f, cuotas c WHERE f.fact_nro = c.ct_ref AND f.fact_fecha BETWEEN '$desde' AND '$hasta' AND fact_estado = 'Cerrada'  ";
 
$Q0->Query($sql_cuotas );
if($Q0->NumRows()>0){
   $Q0->NextRecord();
   $f_cuotas = $Q0->Record['f_cuotas'];
}
  
// Consulta para extraer las cuotas

$Q0->Query("SELECT GROUP_CONCAT(fact_nro) AS cheques FROM factura f, cheq_terceros  t WHERE f.fact_nro = t.chq_ref AND f.fact_fecha BETWEEN '$desde' AND '$hasta'  AND fact_estado = 'Cerrada'");
if($Q0->NumRows()>0){
   $Q0->NextRecord();
   $f_cheques = $Q0->Record['cheques'];
}
 
$f_cuotas = trim($f_cuotas);
 
$f_cheques = trim($f_cheques);
 

if( $name == 'Contado'){
	$query0 = "SELECT $codigo1 CONCAT(f_estab,'-',f_pdv,'-', RIGHT(CONCAT('0000000',c.f_nro),7)) AS ven_numero,'' AS ven_imputa,fact_localidad AS ven_sucurs,'0' AS generar, 'Contado' AS form_pag,
        '' AS ven_centro,fact_cli_ci AS ven_provee,'41111' AS ven_cuenta,UPPER(fact_nom_cli) AS ven_prvnom,'Factura' AS	ven_tipofa,DATE_FORMAT(fact_fecha,'%d/%m/%Y') AS ven_fecha,ROUND(f_total+0.000001) AS ven_totfac,
        if(cl.cli_dip_ci is not null and cl.cli_dip_ci<>'',ROUND(f_total+0.000001),'0') AS ven_exenta,if(cl.cli_dip_ci is not null and cl.cli_dip_ci<>'','0',ROUND(ROUND(f_total+0.000001) / 1.1)) AS ven_gravad, if(cl.cli_dip_ci is not null and cl.cli_dip_ci<>'','0',ROUND(ROUND(f_total+0.000001) / 11)) AS ven_iva, $codigo2 FROM factura f INNER JOIN fact_cont c ON f.fact_nro = c.f_ref inner join mnt_cli cl on f.fact_cli_ci=cl.cli_ci WHERE  f.fact_fecha BETWEEN '$desde' AND '$hasta' AND c.f_venc > '$hasta'  AND fact_estado = 'Cerrada' "
        . "AND fact_nro NOT IN ($f_cuotas,  $f_cheques) "                    
        . "group by fact_nro,f_nro ORDER BY ven_sucurs  LIMIT 100000;";
       // echo $query0;
         
         
	// Consulta para Ventas con Cheques al Contado
	$query1 = "SELECT $codigo1 CONCAT(f_estab,'-',f_pdv,'-', RIGHT(CONCAT('0000000',c.f_nro),7)) AS ven_numero,'' AS ven_imputa,fact_localidad AS ven_sucurs,'0' AS generar, 'Contado' AS form_pag,
        '' AS ven_centro,fact_cli_ci AS ven_provee,'41111' AS ven_cuenta,UPPER(fact_nom_cli) AS ven_prvnom,'Factura' AS	ven_tipofa,DATE_FORMAT(fact_fecha,'%d/%m/%Y') AS ven_fecha,ROUND(f_total+0.000001) AS ven_totfac,
        if(cl.cli_dip_ci is not null and cl.cli_dip_ci<>'',ROUND(f_total+0.000001),'0') AS ven_exenta,if(cl.cli_dip_ci is not null and cl.cli_dip_ci<>'','0',ROUND(ROUND(f_total+0.000001) / 1.1)) AS ven_gravad, if(cl.cli_dip_ci is not null and cl.cli_dip_ci<>'','0',ROUND(ROUND(f_total+0.000001) / 11)) AS ven_iva, $codigo2 
        FROM factura f INNER JOIN cheq_terceros t ON f.fact_nro = t.chq_ref AND f.fact_fecha = t.chq_fecha_ins AND t.chq_fecha_pag = f.fact_fecha INNER JOIN fact_cont c ON  f.fact_nro = c.f_ref  inner join mnt_cli cl on f.fact_cli_ci=cl.cli_ci WHERE   f.fact_fecha BETWEEN '$desde' AND '$hasta'  AND c.f_venc > '$hasta' AND fact_estado = 'Cerrada'
         
        GROUP BY fact_nro,f_nro      
        ORDER BY ven_sucurs ";
         
         
}else{
	$query0 = "SELECT $codigo1 CONCAT(f_estab,'-',f_pdv,'-', RIGHT(CONCAT('0000000',c.f_nro),7)) AS ven_numero,'' AS ven_imputa,fact_localidad AS ven_sucurs,'0' AS generar, 'Credito' AS form_pag,
        '' AS ven_centro,fact_cli_ci AS ven_provee,'41111' AS ven_cuenta,UPPER(fact_nom_cli) AS ven_prvnom,'Factura' AS	ven_tipofa,DATE_FORMAT(fact_fecha,'%d/%m/%Y') AS ven_fecha,ROUND(f_total+0.000001) AS ven_totfac,
        if(cl.cli_dip_ci is not null and cl.cli_dip_ci<>'',ROUND(f_total+0.000001),'0') AS ven_exenta,if(cl.cli_dip_ci is not null and cl.cli_dip_ci<>'','0',ROUND(ROUND(f_total+0.000001) / 1.1)) AS ven_gravad, if(cl.cli_dip_ci is not null and cl.cli_dip_ci<>'','0',ROUND(ROUND(f_total+0.000001) / 11)) AS ven_iva, $codigo2 
        FROM factura f INNER JOIN fact_cont c on  f.fact_nro = c.f_ref  inner join cuotas ct on ct_ref = fact_nro  inner join mnt_cli cl on f.fact_cli_ci=cl.cli_ci where  f.fact_fecha BETWEEN '$desde' AND '$hasta'  AND c.f_venc > '$hasta'  AND fact_estado = 'Cerrada' "
                . "group by fact_nro,f_nro  ORDER BY ven_sucurs  LIMIT 100000" ;
        
	$query1 = "SELECT $codigo1 CONCAT(f_estab,'-',f_pdv,'-', RIGHT(CONCAT('0000000',c.f_nro),7)) AS ven_numero,'' AS ven_imputa,fact_localidad AS ven_sucurs,'0' AS generar, 'Credito' AS form_pag,
        '' AS ven_centro,fact_cli_ci AS ven_provee,'41111' AS ven_cuenta,UPPER(fact_nom_cli) AS ven_prvnom,'Factura' AS	ven_tipofa,DATE_FORMAT(fact_fecha,'%d/%m/%Y') AS ven_fecha,ROUND(f_total+0.000001) AS ven_totfac,
        if(cl.cli_dip_ci is not null and cl.cli_dip_ci<>'',ROUND(f_total+0.000001),'0') AS ven_exenta,if(cl.cli_dip_ci is not null and cl.cli_dip_ci<>'','0',ROUND(ROUND(f_total+0.000001) / 1.1)) AS ven_gravad, if(cl.cli_dip_ci is not null and cl.cli_dip_ci<>'','0',ROUND(ROUND(f_total+0.000001) / 11)) AS ven_iva, $codigo2 
        FROM factura f INNER JOIN fact_cont c on  f.fact_nro = c.f_ref inner join cheq_terceros ct on ct.chq_ref = f.fact_nro inner join mnt_cli cl on f.fact_cli_ci=cl.cli_ci where chq_fecha_ins = f.fact_fecha and chq_fecha_pag > f.fact_fecha AND  f.fact_fecha BETWEEN '$desde' AND '$hasta'  AND c.f_venc > '$hasta'  AND fact_estado = 'Cerrada'"
                . "group by fact_nro,f_nro ORDER BY ven_sucurs  LIMIT 100000;";
}

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);

echo "<h2>Pr&iacute;odo $data_ini - $data_fin</h2>";
echo "<h3>$fecha_hora - $user</h3>";

$file = 'reportesSAP/ReporteFactura'.$name.'_StarSoft_'.$data_ini.'_a_'.$data_fin.'.csv';

$archivo = fopen($file, "w");


$cvs_array = $db->select( $query0 );
$db2csv = new export2CSV(";","\n");
$csv = $db2csv->create_csv_file($cvs_array);

foreach ($cvs_array as $fact_num){
	$f_numeros .= "'".$fact_num['DocNum']."', ";
}
//Credito, segunda consulta;
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

//$file_det = 'reportesSAP/ReporteFactura'.$name.'SAP_desde_'.$data_ini.'_a_'.$data_fin.'_detalle.csv';
//$archivo = fopen($file_det, "w");
//$query2 = "select f.fact_nro as DocNum, df.df_descrip as Description, (sum(df.df_subtotal)) as PriceAfVAT, 'G$' as Currency, '' as AccCode, 'IVA_10' as TaxCode, if((select count(*) from fact_cont where f_ref = f.fact_nro) > 0,'N','') as TaxStatus, (sum(df.df_subtotal)) as LineTotal  from factura f inner join det_factura df on f.fact_nro = df.df_fact_num where f.fact_nro in ($f_numeros)  group by f.fact_nro";
//$cvs_array = $db->select( $query2 );
//$db2csv = new export2CSV(";","\n");
//$csv = $db2csv->create_csv_file($cvs_array);

//fwrite($archivo,$csv);
//fclose($archivo); 
echo "<b> Su Reporte ya esta listo </b><br>";

echo "<b> Su Reporte se guardo con el nombre de:</b> $file <br><br>";


echo "Para acceder a todos los reportes haga clik <a href='http://127.0.0.1/plus/reportesSAP/'> Aqu&iacute;­ <A/><br><br><br>";

echo "<b> Al siguiente link dele Click derecho guardar enlace como (O en Ingles Save link as) elija el Escritorio o otro lugar que le paresca <b> <big> pongale un Nombre.csv </big> </b>  <br> 
 ejemplo   ReporteComprasDetalladas_20_02_2009.csv   o deje el que esta.</b><br><br>";
echo "<a href='$file'> (Reporte) Clic derecho aqui guardar enlace como<A/><br><br><br>";
 
echo "<b> Despues abra Exell haga clic en el Menu Datos -->Obtener Datos Externos -->Importar Datos   elija el Archivo que guardo recientemente precione Siguiente En Separadores Tilde o marque 'Coma' <br> y presione siguiente en Avanzadas Separadores de decimales elija el punto y Finalizar </b><br>";

?>
</body>
</html>
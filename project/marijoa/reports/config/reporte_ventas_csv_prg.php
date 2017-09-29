<?php

/** Report prg file (reporte_ventas) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  
 
 
 require_once("csv.lib.php");
require_once("dbmysql.class.php");



// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 
/*
$T = new Y_Template( $file_tpl ); 
// Superior Variables
$T->Set( 'sup_aut_lock', 'true');
$T->Set( 'sup_msg', 'Seleccione el tipo de reporte que desea hacer!!!');
$T->Set( 'sup_tipo_rep', 'Ventas');
$T->Set( 'sup_desde', '2004-08-12');
$T->Set( 'sup_hasta', '2007-08-12');
$T->Set( 'sup_rep_ventas', '');
$T->Set( 'sup_rep_compras', '');
$T->Set( 'sup_desdeinv', '2004-12-08');
$T->Set( 'sup_hastainv', '2007-12-08');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT fact_nro as Nro, fact_fecha as FECHA,fact_emp_dir as LUGAR, fact_nom_cli as CLIENTE,fact_cli_cat as CATEGORIA, func_nombre as VENDEDOR,fact_comi_vend as COMISION,fact_tipo as TIPO, fact_total as TOTAL FROM factura  WHERE fact_fecha BETWEEN '2004-12-08' and '2007-12-08'  and fact_estado = "Cerrada"";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);

$name = 'reportes/ReporteVentas_desde_'.$data_ini.'_a_'.$data_fin.'.csv';

$ini = date('d-m-Y, h:y:s');

echo "Inicio: ".$ini;

$archivo = fopen($name, "w");


/*
$T->Set('data_ini',$data_ini);
$T->Set('data_fin',$data_fin);

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

*/

$db = new DbMySQL("localhost", "marijoa", "plus", "case");
$db->connect();
$cvs_array = $db->select( $query0 );

/*

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables
$subtotal0_TOTAL = 0;
$subtotal0_MARGEN = 0;


//Define a Old Values Variables
$old['Nro'] = '';
$old['FECHA'] = '';
$old['LUGAR'] = '';
$old['CLIENTE'] = '';
$old['CATEGORIA'] = '';
$old['VENDEDOR'] = '';
$old['COMISION'] = '';
$old['TIPO'] = '';
$old['TOTAL'] = '';
$old['MARGEN'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['Nro'] = $Q0->Record['Nro'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['LUGAR'] = $Q0->Record['LUGAR'];
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['CATEGORIA'] = $Q0->Record['CATEGORIA'];
    $el['VENDEDOR'] = $Q0->Record['VENDEDOR'];
    $el['COMISION'] = $Q0->Record['COMISION'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['TOTAL'] = $Q0->Record['TOTAL'];
    $el['MARGEN'] = $Q0->Record['MARGEN'];


    // Preparing a template variables
    $T->Set('query0_Nro', $el['Nro']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_LUGAR', $el['LUGAR']);
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_CATEGORIA', $el['CATEGORIA']);
    $T->Set('query0_VENDEDOR', $el['VENDEDOR']);
    $T->Set('query0_COMISION', $el['COMISION']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_TOTAL', number_format($el['TOTAL'],0,'.',','));
    $T->Set('query0_MARGEN', number_format($el['MARGEN'],0,'.',','));


    // Calculating a total

    // Calculating a subtotal
    $subtotal0_TOTAL += 0 + $el['TOTAL'];
    $subtotal0_MARGEN += 0 + $el['MARGEN'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_TOTAL', number_format($subtotal0_TOTAL,0,'.',','));
    $T->Set('subtotal0_MARGEN', number_format($subtotal0_MARGEN,0,'.',','));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_TOTAL = 0;
	$subtotal0_MARGEN = 0;
    }
    
    //Actualize Old Values Variables
    $old['Nro'] = $el['Nro'];
    $old['FECHA'] = $el['FECHA'];
    $old['LUGAR'] = $el['LUGAR'];
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['CATEGORIA'] = $el['CATEGORIA'];
    $old['VENDEDOR'] = $el['VENDEDOR'];
    $old['COMISION'] = $el['COMISION'];
    $old['TIPO'] = $el['TIPO'];
    $old['TOTAL'] = $el['TOTAL'];
    $old['MARGEN'] = $el['MARGEN'];
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

*/



$db2csv = new export2CSV(",","\n");

$csv = $db2csv->create_csv_file($cvs_array);

//header("Content-type: application/eml");
//header("Content-Disposition: attachment; filename=mysql_users.csv");
//echo $csv;
fwrite($archivo,$csv);
fclose($archivo); 
echo "<br><b> Su Reporte ya esta listo </b><br>";

$fin = date('d-m-Y, h:y:s');

echo "<br>Fin  : ".$fin;

echo "<b> Su Reporte se guardo con el nombre de:</b> $name <br><br>";


echo "Para acceder a todos los reportes haga clik <a href='http://192.168.0.254/~plus/reportes/'> Aquí <A/><br><br><br>";

echo "<b> Al siguiente link dele Click derecho guardar enlace como (O en Ingles Save link as) elija el Escritorio o otro lugar que le paresca <b> <big> pongale un Nombre.csv </big> </b>  <br> 
 ejemplo   ReporteVentas_20_02_2009.csv   o deje el que esta.</b><br><br>";
echo "<a href='$name'> Clic derecho aqui guardar enlace como<A/><br><br><br>";
echo "<b> Despues abra Exell haga clic en el Menu Datos -->Obtener Datos Externos -->Importar Datos   elija el Archivo que guardo recientemente precione Siguiente En Separadores Tilde o marque 'Coma' <br> y presione siguiente en Avanzadas Separadores de decimales elija el punto y Finalizar </b><br>";




?>

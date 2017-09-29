<?php

/** Report prg file (rep_compras_det) 
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
$T->Set( 'sup_msg', 'Seleccione el tipo de reporte que desea! El simbolo % indica No mostrar, El %% indica mostrar todos!!!');
$T->Set( 'sup_aut_lock', 'true');
$T->Set( 'sup_tipo_rep', 'Compras');
$T->Set( 'sup_rep_localidad', '%');
$T->Set( 'sup_c_prov', '%');
$T->Set( 'sup_rep_cli', '%');
$T->Set( 'sup_desde', '2008-12-15');
$T->Set( 'sup_hasta', '2008-12-15');
$T->Set( 'sup_msg2', 'Filtre aqui los datos del Producto!!!');
$T->Set( 'sup_p_fam', '%');
$T->Set( 'sup_p_grupo', '%');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_p_comp', '%');
$T->Set( 'sup_p_temp', '%');
$T->Set( 'sup_p_estruc', '%');
$T->Set( 'sup_p_clasif', '%');
$T->Set( 'sup_p_color', '%');
$T->Set( 'sup_p_lisoest', '%');
$T->Set( 'sup_rep_ventas', '');
$T->Set( 'sup_rep_compras', '');
$T->Set( 'sup_desdeinv', '2008-12-15');
$T->Set( 'sup_hastainv', '2008-12-15');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT c.c_ref as Nro, c.c_fecha as FECHA, c.c_prov as PROV, c.c_empr as SUC,p.p_cod as COD_PROD, p.p_fam as FAM, p.p_grupo as GRUPO,p.p_tipo as TIPO, p.p_comp as COMP,  p.p_temp as TEMP, p.p_estruc as ESTRUCT,  p.p_clasif as CLASIF,  p.p_color as COLOR, p.p_lisoest as LISOEST,p.p_compra as VALOR, p_cant_compra as CANT_COMPRA FROM mov_compras c, mnt_prod p WHERE c.c_ref = p.p_ref and c.c_empr LIKE '%' and c.c_prov like '%' and p.p_fam like '%' and p.p_grupo like  '%' and p.p_tipo like '%' and p.p_comp like  '%' and p.p_temp like '%' and p.p_estruc like '%'  and p.p_clasif like '%'  and p.p_color like '%' and p.p_lisoest like '%' and c.c_fecha between '2008-12-15' and '2008-12-15' and c.c_estado = "Cerrada"";

/*
$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );
$CONTADOR = 0;
 
if( $sup['c_prov'] == '%' ){    
    $T->Set('C_PROV','');
}else{
    $T->Set('C_PROV','PROV');
}
 
if( $sup['rep_localidad'] == '%' ){    
    $T->Set('C_EMPR','');
}else{
    $T->Set('C_EMPR','SUC');
}

if( $sup['p_fam'] == '%' ){    
    $T->Set('C_FAM','');
}else{
    $T->Set('C_FAM','FAMILIA');
}

if( $sup['p_grupo'] == '%' ){    
    $T->Set('C_GRU','');
}else{
    $T->Set('C_GRU','GRUPO');
}

if( $sup['p_tipo'] == '%' ){  
    $T->Set('C_TIPO','');
}else{
    $T->Set('C_TIPO','TIPO');
}

 
if( $sup['p_comp'] == '%' ){    
    $T->Set('C_COMP','');
}else{
    $T->Set('C_COMP','COMP');
}
 
if( $sup['p_temp'] == '%' ){    
    $T->Set('C_TEMP','');
}else{
    $T->Set('C_TEMP','TEMP');
}

 
if( $sup['p_estruc'] == '%' ){   
    $T->Set('C_EST','');
}else{
    $T->Set('C_EST','ESTRUCT');
}
 
if( $sup['p_clasif'] == '%' ){    
    $T->Set('C_CLA','');
}else{
    $T->Set('C_CLA','CLASIF');
}
 
if( $sup['p_color'] == '%' ){    
    $T->Set('C_COLOR','');
}else{
    $T->Set('C_COLOR','COLOR');
}

 
if( $sup['p_lisoest'] == '%' ){   
    $T->Set('C_LISO','');
}else{
    $T->Set('C_LISO','LISOEST');
}
 
*/

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$data_ini = substr($sup['desde'],8,2).'-'.
			substr($sup['desde'],5,2).'-'.
			substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.
			substr($sup['hasta'],5,2).'-'.
			substr($sup['hasta'],0,4);

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);

$name = 'reportes/ReporteComprasDetalladas_desde_'.$data_ini.'_a_'.$data_fin.'.csv';

$archivo = fopen($name, "w");

$db = new DbMySQL("localhost", "marijoa", "plus", "case");
$db->connect();
$cvs_array = $db->select( $query0 );

/*

			
$T->Set('data_ini',$data_ini);
$T->Set('data_fin',$data_fin);
$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

$old['Nro'] = '';
$old['FECHA'] = '';
$old['PROV'] = '';
$old['SUC'] = '';
$old['COD_PROD'] = '';
$old['FAM'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COMP'] = '';
$old['TEMP'] = '';
$old['ESTRUCT'] = '';
$old['CLASIF'] = '';
$old['COLOR'] = '';
$old['LISOEST'] = '';
$old['VALOR'] = '';
$old['CANT_COMPRA'] = '';

$subtotal0_TOTAL = 0;

$subtotal0_CANT_COMPRA = 0;

$endConsult = false;

$CONTADOR = 0;
$CANT_FACT = 0; */


/*
// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header
// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
 
    
    $el['Nro'] = $Q0->Record['Nro'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['PROV'] = $Q0->Record['PROV'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['COD_PROD'] = $Q0->Record['COD_PROD'];
    $el['FAM'] = $Q0->Record['FAM'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COMP'] = $Q0->Record['COMP'];
    $el['TEMP'] = $Q0->Record['TEMP'];
    $el['ESTRUCT'] = $Q0->Record['ESTRUCT'];
    $el['CLASIF'] = $Q0->Record['CLASIF'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['LISOEST'] = $Q0->Record['LISOEST'];
    $el['VALOR'] = $Q0->Record['VALOR'];
    $el['CANT_COMPRA'] = $Q0->Record['CANT_COMPRA'];

    // Preparing a template variables
   $CONTADOR++;

    // Preparing a template variables
    
    if( $old['Nro'] != $el['Nro'] ){
    
       $T->Set('query0_Nro', $el['Nro']);
       $T->Set('query0_FECHA', $el['FECHA']);
       $CANT_FACT++;
    
    }else{
    	$T->Set('query0_Nro', '');
    	$T->Set('query0_FECHA','');
    } 
    
    
    
    
    if( $sup['c_prov'] == '%' ){   
       $T->Set('query0_PROV', '');
    }else {
       $T->Set('query0_PROV', $el['PROV']);
    }
    
    if( $sup['rep_localidad'] == '%' ){  
       $T->Set('query0_SUC', '');
    }else {
    	$T->Set('query0_SUC', $el['SUC']);
    }
    
    $T->Set('query0_COD_PROD', $el['COD_PROD']);
    
    if( $sup['p_fam'] == '%' ){ 
     $T->Set('query0_FAM', '');
   }else {
   	 $T->Set('query0_FAM', $el['FAM']);
   }
   
    if($sup['p_grupo'] == '%' ){   
       $T->Set('query0_GRUPO', '');
    }else {
       $T->Set('query0_GRUPO', $el['GRUPO']);
    }
    
    if( $sup['p_tipo'] == '%' ){  
      $T->Set('query0_TIPO', '');
    }else {
      $T->Set('query0_TIPO', $el['TIPO']);
    }
    
    
    if( $sup['p_comp'] == '%' ){  
       $T->Set('query0_COMP','');
    }else {
    	$T->Set('query0_COMP', $el['COMP']);
    }
    
    if( $sup['p_temp'] == '%' ){    
       $T->Set('query0_TEMP', '');
    }else {
    	$T->Set('query0_TEMP', $el['TEMP']);
    }
    
    if( $sup['p_estruc'] == '%' ){  
      $T->Set('query0_ESTRUCT', '');
    }else{
    	  $T->Set('query0_ESTRUCT', $el['ESTRUCT']);
    }
    
    if( $sup['p_clasif'] == '%' ){  
      $T->Set('query0_CLASIF','');
    }else{
    	 $T->Set('query0_CLASIF', $el['CLASIF']);
    }
    
    if( $sup['p_color'] == '%' ){  
      $T->Set('query0_COLOR', '');
    }else{
    	 $T->Set('query0_COLOR', $el['COLOR']);
    }
    
    if( $sup['p_lisoest'] == '%' ){   
      $T->Set('query0_LISOEST', '');
    }else{
    	$T->Set('query0_LISOEST', $el['LISOEST']);
    }
    
    $T->Set('query0_VALOR', $el['VALOR']);    
    $T->Set('query0_CANT_COMPRA', $el['CANT_COMPRA']);    
    
     $subtotal0_TOTAL += 0 + $el['VALOR'];
     $subtotal0_CANT_COMPRA   += 0 + $el['CANT_COMPRA'];
    // Calculating a total

    // Calculating a subtotal   $subtotal0_CANT_COMPRA 

    $T->Show('query0_data_row');
    $T->Set('subtotal0_TOTAL', number_format($subtotal0_TOTAL,0,',','.'));
    $T->Set('subtotal0_CANT_COMPRA', number_format($subtotal0_CANT_COMPRA,0,',','.'));
    // Show Subtotal
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
	$subtotal0_TOTAL = 0;
	$subtotal0_CANT_COMPRA= 0;	
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
$old['Nro'] = $el['Nro'];
$old['FECHA'] = $el['FECHA'];
$old['PROV'] =  $el['PROV'];
$old['SUC'] =  $el['SUC'];
$old['COD_PROD'] =   $el['COD_PROD'];
$old['FAM'] = $el['FAM'];
$old['GRUPO'] = $el['GRUPO'];
$old['TIPO'] = $el['TIPO'];
$old['COMP'] = $el['COMP'];
$old['TEMP'] = $el['TEMP'];
$old['ESTRUCT'] = $el['ESTRUCT'];
$old['CLASIF'] = $el['CLASIF'];
$old['COLOR'] = $el['COLOR'];
$old['LISOEST'] = $el['LISOEST'];
$old['VALOR'] = $el['VALOR'];
$old['CANT_COMPRA'] = $el['CANT_COMPRA'];
  $T->Set('contador', $CONTADOR);
  $T->Set('cant_fact', $CANT_FACT);
  
      
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
echo "<b> Su Reporte ya esta listo </b><br>";

echo "<b> Su Reporte se guardo con el nombre de:</b> $name <br><br>";


echo "Para acceder a todos los reportes haga clik <a href='http://192.168.0.254/~plus/reportes/'> Aquí <A/><br><br><br>";

echo "<b> Al siguiente link dele Click derecho guardar enlace como (O en Ingles Save link as) elija el Escritorio o otro lugar que le paresca <b> <big> pongale un Nombre.csv </big> </b>  <br> 
 ejemplo   ReporteComprasDetalladas_20_02_2009.csv   o deje el que esta.</b><br><br>";
echo "<a href='$name'> Clic derecho aqui guardar enlace como<A/><br><br><br>";
echo "<b> Despues abra Exell haga clic en el Menu Datos -->Obtener Datos Externos -->Importar Datos   elija el Archivo que guardo recientemente precione Siguiente En Separadores Tilde o marque 'Coma' <br> y presione siguiente en Avanzadas Separadores de decimales elija el punto y Finalizar </b><br>";



?>

<?php

require_once("csv.lib.php");
require_once("dbmysql.class.php");

/** Report prg file (rep_prod_exist) 
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
$T->Set( 'sup_msg', 'El simbolo % indica todos!!!');
$T->Set( 'sup_aut_lock', 'true');
$T->Set( 'sup_rep_localidad', '04');
$T->Set( 'sup_msg2', 'Filtre  aqui los datos del Producto!!!');
$T->Set( 'sup_p_fam', '%');
$T->Set( 'sup_p_grupo', '%');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_p_comp', '%');
$T->Set( 'sup_p_temp', '%');
$T->Set( 'sup_p_estruc', '%');
$T->Set( 'sup_p_clasif', '%');
$T->Set( 'sup_p_color', '%');
$T->Set( 'sup_p_lisoest', '%');
$T->Set( 'sup_p_term', '%');
$T->Set( 'sup_p_preciox', '1');
$T->Set( 'sup_rep_stock', '');  */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select p_cod as CODIGO, p_grupo as GRUPO, p_tipo as TIPO, p_color as COLOR, p_cant as STOCK_ACTUAL, (p_compra * p_cant) as VALOR_AL_COSTO, (p_precio_1 * p_cant) as VALOR_VENTA_1,(p_precio_2 * p_cant) as VALOR_VENTA_2,(p_precio_3 * p_cant) as VALOR_VENTA_3,(p_precio_4 * p_cant) as VALOR_VENTA_4,(p_precio_5 * p_cant) as VALOR_VENTA_5 FROM mnt_prod p WHERE p.p_local LIKE '04' AND   p.p_fam like '%' and p.p_grupo like  '%' and p.p_tipo like '%' and p.p_comp like  '%' and p.p_temp like '%' and p.p_estruc like '%'  and p.p_clasif like '%'  and p.p_color like '%' and p.p_lisoest like '%'  and p.p_cant > 0 and prod_fin_pieza = "No" and p.p_cod like '%' order by p_grupo, p_tipo, p_color";

$fecha = date("d.m.Y");
    
    $name = 'reportes/ReporteStockActual_Suc_'.$sup['rep_localidad'].'_'.$fecha.'.csv';

if($sup['rep_localidad']==='%' || $sup['rep_localidad']==='%%'){
   $name = 'reportes/ReporteStockActual_SUC_TODAS_'.$fecha.'.csv';
}

$archivo = fopen($name, "w");

/*
$cab = 'CODIGO#GRUPO#TIPO#COLOR#STOCK_ACTUAL#VALOR_AL_COSTO#'; 

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );



if( $sup['m1'] == '%' ){    
    $T->Set('VALOR_VENTA_1','');   
}else{
    $T->Set('VALOR_VENTA_1','VALOR_VENTA_1'); $cab = $cab.'VALOR_VENTA_1#';
}
if( $sup['m2'] == '%' ){     
    $T->Set('VALOR_VENTA_2',''); 
}else{
    $T->Set('VALOR_VENTA_2','VALOR_VENTA_2');$cab = $cab.'VALOR_VENTA_2#';
}
if( $sup['m3'] == '%' ){    
    $T->Set('VALOR_VENTA_3',''); 
}else{
    $T->Set('VALOR_VENTA_3','VALOR_VENTA_3'); $cab = $cab.'VALOR_VENTA_3#';
}
if( $sup['m4'] == '%' ){    
    $T->Set('VALOR_VENTA_4',''); 
}else{
    $T->Set('VALOR_VENTA_4','VALOR_VENTA_4'); $cab = $cab.'VALOR_VENTA_4#';
}
if( $sup['m5'] == '%' ){    
    $T->Set('VALOR_VENTA_5',''); 
}else{
    $T->Set('VALOR_VENTA_5','VALOR_VENTA_5'); $cab = $cab.'VALOR_VENTA_5#';
}
//$cab = $cab.'\n';
  
    /*if (fwrite($archivo, $cab) === FALSE) {
        echo "No se puede escribir al archivo ($archivo)";
        exit;
    }   
    
 $lineas = array();
 
 array_push($lineas,$cab); 
  

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );*/

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
$subtotal0_STOCK_ACTUAL = 0;
$subtotal0_VALOR_AL_COSTO = 0;
$subtotal0_VALOR_VENTA_1 = 0;
$subtotal0_VALOR_VENTA_2 = 0;
$subtotal0_VALOR_VENTA_3 = 0;
$subtotal0_VALOR_VENTA_4 = 0;
$subtotal0_VALOR_VENTA_5 = 0;
$subtotal0_PRECIO_1 = 0;


//Define a Old Values Variables
$old['CODIGO'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COLOR'] = '';
$old['STOCK_ACTUAL'] = '';
$old['VALOR_AL_COSTO'] = '';
$old['VALOR_VENTA_1'] = '';
$old['VALOR_VENTA_2'] = '';
$old['VALOR_VENTA_3'] = '';
$old['VALOR_VENTA_4'] = '';
$old['VALOR_VENTA_5'] = '';
$old['PRECIO_1'] = '';

$contador = 0;

// Making a rows of consult
while( $Q0->NextRecord() ){

	 
    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['STOCK_ACTUAL'] = $Q0->Record['STOCK_ACTUAL'];
    $el['VALOR_AL_COSTO'] = $Q0->Record['VALOR_AL_COSTO'];
    $el['VALOR_VENTA_1'] = $Q0->Record['VALOR_VENTA_1'];
    $el['VALOR_VENTA_2'] = $Q0->Record['VALOR_VENTA_2'];
    $el['VALOR_VENTA_3'] = $Q0->Record['VALOR_VENTA_3'];
    $el['VALOR_VENTA_4'] = $Q0->Record['VALOR_VENTA_4'];
    $el['VALOR_VENTA_5'] = $Q0->Record['VALOR_VENTA_5'];
    $el['PRECIO_1'] = $Q0->Record['PRECIO_1'];

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_STOCK_ACTUAL', number_format($el['STOCK_ACTUAL'],2,',','.'));
    $T->Set('query0_VALOR_AL_COSTO', number_format($el['VALOR_AL_COSTO'],0,',','.'));
    
    $reglon = '';
    $reglon =$reglon.$el['CODIGO'].'#';
    $reglon =$reglon.''.  $el['GRUPO'].'#';
    $reglon =$reglon.''. $el['TIPO'].'#';
    $reglon =$reglon.''. $el['COLOR'].'#';
    $reglon =$reglon.''. number_format($el['STOCK_ACTUAL'],2,',','.').'#';
    $reglon =$reglon.''. number_format($el['VALOR_AL_COSTO'],0,',','.').'#';
	
    $contador++;
    
    if( $sup['m1'] == '%' ){    
	    $T->Set('query0_VALOR_VENTA_1','');  
	}else{
	    $T->Set('query0_VALOR_VENTA_1', number_format($el['VALOR_VENTA_1'],0,',','.')); 
	    $reglon +=number_format( $el['VALOR_VENTA_1'],0,',','.').'#';
	}    
    if( $sup['m2'] == '%' ){    
	    $T->Set('query0_VALOR_VENTA_2',''); 
	}else{
	    $T->Set('query0_VALOR_VENTA_2', number_format($el['VALOR_VENTA_2'],0,',','.'));
	    $reglon =$reglon.''. number_format($el['VALOR_VENTA_2'],0,',','.').'#';
	}     
    if( $sup['m3'] == '%' ){    
	    $T->Set('query0_VALOR_VENTA_3',''); 
	}else{
	    $T->Set('query0_VALOR_VENTA_3', number_format($el['VALOR_VENTA_3'],0,',','.'));
	    $reglon =$reglon.''. number_format($el['VALOR_VENTA_3'],0,',','.').'#';
	}  
    if( $sup['m4'] == '%' ){    
	    $T->Set('query0_VALOR_VENTA_4',''); 
	}else{
	    $T->Set('query0_VALOR_VENTA_4', number_format($el['VALOR_VENTA_4'],0,',','.'));
	    $reglon =$reglon.''.  number_format($el['VALOR_VENTA_4'],0,',','.').'#';
	}  	 
    if( $sup['m5'] == '%' ){    
	    $T->Set('query0_VALOR_VENTA_5',''); 
	}else{
	    $T->Set('query0_VALOR_VENTA_5', number_format($el['VALOR_VENTA_5'],0,',','.'));
	    $reglon =$reglon.''.  number_format($el['VALOR_VENTA_5'],0,',','.').'#';
	}  
	$T->Set('query0_PRECIO_1', number_format($el['PRECIO_1'],0,',','.'));
	
	$reglon =$reglon.''.  number_format($el['PRECIO_1'],0,',','.').'#';
    
    /*if (fwrite($archivo, $reglon) === FALSE) {
        echo "No se puede escribir al archivo ($archivo)";
        exit;
    }  
      array_push($lineas,$reglon);
    
	 
    // Calculating a total

    // Calculating a subtotal
    $subtotal0_STOCK_ACTUAL += 0 + $el['STOCK_ACTUAL'];
    $subtotal0_VALOR_AL_COSTO += 0 + $el['VALOR_AL_COSTO'];
    $subtotal0_VALOR_VENTA_1 += 0 + $el['VALOR_VENTA_1'];
    $subtotal0_VALOR_VENTA_2 += 0 + $el['VALOR_VENTA_2'];
    $subtotal0_VALOR_VENTA_3 += 0 + $el['VALOR_VENTA_3'];
    $subtotal0_VALOR_VENTA_4 += 0 + $el['VALOR_VENTA_4'];
    $subtotal0_VALOR_VENTA_5 += 0 + $el['VALOR_VENTA_5'];
    $subtotal0_PRECIO_1  += 0 + $el['PRECIO_1'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_STOCK_ACTUAL', number_format($subtotal0_STOCK_ACTUAL,2,',','.'));
    $T->Set('subtotal0_VALOR_AL_COSTO', number_format($subtotal0_VALOR_AL_COSTO,0,',','.'));
    
    if( $sup['m1'] == '%' ){    
	    $T->Set('subtotal0_VALOR_VENTA_1','');
	}else{
	    $T->Set('subtotal0_VALOR_VENTA_1', number_format($subtotal0_VALOR_VENTA_1,0,',','.'));
	}     
    if( $sup['m2'] == '%' ){    
	    $T->Set('subtotal0_VALOR_VENTA_2','');
	}else{
	    $T->Set('subtotal0_VALOR_VENTA_2', number_format($subtotal0_VALOR_VENTA_2,0,',','.'));
	} 
    if( $sup['m3'] == '%' ){    
	    $T->Set('subtotal0_VALOR_VENTA_3','');
	}else{
	    $T->Set('subtotal0_VALOR_VENTA_3', number_format($subtotal0_VALOR_VENTA_3,0,',','.'));
	} 
    if( $sup['m4'] == '%' ){    
	    $T->Set('subtotal0_VALOR_VENTA_4','');
	}else{
	    $T->Set('subtotal0_VALOR_VENTA_4', number_format($subtotal0_VALOR_VENTA_4,0,',','.'));
	} 			
    if( $sup['m5'] == '%' ){    
	    $T->Set('subtotal0_VALOR_VENTA_5','');
	}else{
	    $T->Set('subtotal0_VALOR_VENTA_5', number_format($subtotal0_VALOR_VENTA_5,0,',','.'));
	} 	    
     $T->Set('subtotal0_PRECIO_1', number_format($subtotal0_PRECIO_1,0,',','.')); 
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_STOCK_ACTUAL = 0;
        $subtotal0_VALOR_AL_COSTO = 0;
        $subtotal0_VALOR_VENTA_1 = 0;
        $subtotal0_VALOR_VENTA_2 = 0;
        $subtotal0_VALOR_VENTA_3 = 0;
        $subtotal0_VALOR_VENTA_4 = 0;
        $subtotal0_VALOR_VENTA_5 = 0;
        $subtotal0_PRECIO_1 = 0;
    }
    
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COLOR'] = $el['COLOR'];
    $old['STOCK_ACTUAL'] = $el['STOCK_ACTUAL'];
    $old['VALOR_AL_COSTO'] = $el['VALOR_AL_COSTO'];
    $old['VALOR_VENTA_1'] = $el['VALOR_VENTA_1'];
    $old['VALOR_VENTA_2'] = $el['VALOR_VENTA_2'];
    $old['VALOR_VENTA_3'] = $el['VALOR_VENTA_3'];
    $old['VALOR_VENTA_4'] = $el['VALOR_VENTA_4'];
    $old['VALOR_VENTA_5'] = $el['VALOR_VENTA_5'];
    $old['PRECIO_1'] = $el['PRECIO_1'];
    $firstRow=false;
  
}

$endConsult = true;
if( $endConsult ){
	$T->Set('contador', $contador);
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 
  
 /*foreach ($lineas as $linea) {
 	
   fputcsv($archivo,split('#', $linea ));   	
 }  */



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

echo "<b> Al siguiente link dele Click derecho guardar enlace como (O en Ingles Save link as) elija el Escritorio o otro lugar que le paresca pongale un Nombre.csv  <br> 
 ejemplo   ReporteStock_20_02_2009.csv   o deje el que esta.</b><br><br>";
echo "<a href='$name'> Clic derecho aqui guardar enlace como<A/><br><br><br>";
echo "<b> Despues abra Exell haga clic en el Menu Datos -->Obtener Datos Externos -->Importar Datos   elija el Archivo que guardo recientemente precione Siguiente En Separadores Tilde o marque 'Coma' y presione Finalizar </b><br>";

?>

<?php

/** Report prg file (calc_comis_vent) 
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
  $T->Set( 'sup_desde', '2013-04-01');
  $T->Set( 'sup_hasta', '2013-04-28');
  $T->Set( 'sup_sue_buscar_func', 'patr');
  $T->Set( 'sup_sue_cod_func', 'PatriL');
  $T->Set( 'sup_cat', '');
  $T->Set( 'sup_func_cat', 'MINORISTA SENIOR 2');
  $T->Set( 'sup_rep', '');

 */
// ------------------------------------------
// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT func_cod AS CODIGO,func_fullname AS NOMBRE,func_ci AS CI, date_format(func_fecha_cont,"%d-%m-%Y") AS FECHA_CONT FROM mnt_func WHERE func_cod = 'PatriL' ";

$T->Set('time', daytime());
$T->Set('user', $Global['username']);

$data_ini = substr($sup['desde'], 8, 2) . '-' . substr($sup['desde'], 5, 2) . '-' . substr($sup['desde'], 0, 4);
$data_fin = substr($sup['hasta'], 8, 2) . '-' . substr($sup['hasta'], 5, 2) . '-' . substr($sup['hasta'], 0, 4);
$T->Set('desde', $data_ini);
$T->Set('hasta', $data_fin);

$db = new Y_DB();
$db->Database = 'marijoa';

$categ = $sup['func_cat'];
$func_cod = $sup['sue_cod_func'];
$antiguedad = $sup['antiguedad'];

//echo $func_cod;

if($antiguedad == '__NO DATA_'){
    $T->Set('msg', "Error!!! Es necesario cargar la antiguedad del Funcionario... ");
    $T->Show("error");
    die();
}

$desde = $sup['desde'];
$hasta = $sup['hasta'];

// Inicializo a 0 el arreglo
$ventas = array();
// Array Ofertas | Normales | Dev Ofer | Dev Norm
$tmp = array(0,0,0,0);
$ventas[1] = $tmp;
$ventas[2] = $tmp;
$ventas[3] = $tmp;
$ventas[4] = $tmp;
$ventas[5] = $tmp;
$ventas[6] = $tmp;
$ventas[7] = $tmp;

$COEF_MINORISTA = 0;
$COEF_CAT_3 = 0;
$COEF_MAYORISTA = 0;


$CODIGO_OFERTAS = "( d.df_cod_prod NOT LIKE '%14' and  d.df_cod_prod NOT LIKE '%15' and d.df_cod_prod NOT LIKE '%16' and d.df_cod_prod NOT LIKE '%17' AND d.df_cod_prod <> '1000' AND d.df_cod_prod <> '1001' AND d.df_cod_prod <> '1002')";
$CODIGO_NORMALES = "( d.df_cod_prod LIKE '%14' or  d.df_cod_prod LIKE '%15' or  d.df_cod_prod LIKE '%16'  or  d.df_cod_prod LIKE '%17'  )";

$CODIGO_DEV_OFERTAS = "( d.cod_prod NOT LIKE '%14' AND cod_prod NOT LIKE '%15' AND cod_prod NOT LIKE '%16'  AND cod_prod NOT LIKE '%17' AND cod_prod <> '1000'  AND cod_prod <> '1001'  )";
$CODIGO_DEV_NORMALES = "( cod_prod LIKE '%14'  or  cod_prod LIKE '%15' or  cod_prod LIKE '%16' or  cod_prod LIKE '%17')";


// Obtener todo tipo de Ventas OFERTAS NORMALES DEVOLUCIONES DE AMBOS CASOS
// Ofertas

$db->Query("SELECT fact_cli_cat AS CAT, sum(d.df_subtotal) AS OFERTAS FROM factura  f, det_factura d WHERE f.fact_nro = d.df_fact_num AND
  f.fact_vend_cod LIKE '$func_cod' 
  AND f.fact_fecha  BETWEEN '$desde' AND '$hasta' AND f.fact_estado =  'Cerrada'  
  AND $CODIGO_OFERTAS and df_cod_prod <> '000' GROUP BY CAT");  // Exluir 000


$TOTAL_OFERTAS = 0;
$TOTAL_NORMALES = 0;

while ($db->NextRecord()) {
    $cat = $db->Record['CAT'];
    $ofertas = $db->Record['OFERTAS'];
    $TOTAL_OFERTAS += 0 + $ofertas;
    $array = $ventas[$cat];
    $array[0] = $ofertas;
    $ventas[$cat] = $array;
}


// Normales
$db->Query("SELECT fact_cli_cat AS CAT, SUM(d.df_subtotal) AS NORMALES FROM factura  f, det_factura d WHERE f.fact_nro = d.df_fact_num AND
    f.fact_vend_cod LIKE '$func_cod' 
    AND f.fact_fecha  BETWEEN '$desde' AND '$hasta' AND f.fact_estado =  'Cerrada'  
    AND $CODIGO_NORMALES  and df_cod_prod <> '000' GROUP BY CAT");  // Exluir 000

while ($db->NextRecord()) {
    $cat = $db->Record['CAT'];
    $normales = $db->Record['NORMALES'];
    $TOTAL_NORMALES += 0 + $normales;
    $array = $ventas[$cat]; 
    $array[1] = $normales;
    $ventas[$cat] = $array;
}


// Devoluciones
// Ofertas
$db->Query("SELECT fact_cli_cat AS CAT,SUM(d.monto_dev) AS DEV_OFERTAS FROM devoluciones d, factura f WHERE f.fact_nro = d.fact_nro AND  forma LIKE 'Efectivo' AND dv_hoy  BETWEEN '$desde' AND '$hasta' 
AND f.fact_vend_cod LIKE '$func_cod' AND $CODIGO_DEV_OFERTAS    GROUP BY CAT ASC");   
while ($db->NextRecord()) {
  $cat = $db->Record['CAT'];  
  $DEV_OFERTAS = $db->Record['DEV_OFERTAS'];
  //$T->Set('dev_ofertas', number_format($DEV_OFERTAS, 2, ',', '.'));
  $array = $ventas[$cat];
  $array[2] = $DEV_OFERTAS;
  $ventas[$cat] = $array;
  
}

// Normales
$db->Query("SELECT fact_cli_cat AS CAT,SUM(d.monto_dev) AS DEV_NORMALES FROM devoluciones d, factura f WHERE f.fact_nro = d.fact_nro AND  forma LIKE 'Efectivo' AND dv_hoy  BETWEEN '$desde' AND '$hasta' 
AND f.fact_vend_cod LIKE '$func_cod' AND $CODIGO_DEV_NORMALES   GROUP BY CAT ASC");  
while ($db->NextRecord()) {
   $cat = $db->Record['CAT']; 
   $DEV_NORMALES = $db->Record['DEV_NORMALES'];
   $array = $ventas[$cat];
   $array[3] = $DEV_NORMALES;
   $ventas[$cat] = $array;
   //$T->Set('dev_normales', number_format($DEV_NORMALES, 2, ',', '.'));
}

// Ventas - Devoluciones 

$total_ofertas_dev = $TOTAL_OFERTAS - $DEV_OFERTAS;
$total_normal_dev = $TOTAL_NORMALES - $DEV_NORMALES;
$T->Set('total_ofertas_dev', number_format($total_ofertas_dev, 2, ',', '.'));
$T->Set('total_normales_dev', number_format($total_normal_dev, 2, ',', '.'));

$total_neto = $total_ofertas_dev + $total_normal_dev;
$T->Set('total_neto', number_format($total_neto, 2, ',', '.'));


// Consultar Meta y Sueldo base
$db->Query("SELECT categ AS CATEGORIA, concat(a_min,'-',a_max) AS RANGO, meta AS META, sueldo_base AS SUELDO_BASE,pond_normal as PONDERACION FROM mnt_cat_vend WHERE categ = '$categ'");
$db->NextRecord();


$rango = $db->Record['RANGO'];
$meta = $db->Record['META'];
$sueldo_base = $db->Record['SUELDO_BASE'];
$variable = $db->Record['SUELDO_BASE'];
$ponderacion = $db->Record['PONDERACION'];

$variable_arrastre = $variable;
$meta_arrastre = $meta;

// Valores a Lograr en Ofertas y Normales
$valor_a_lograr_normales = $meta * $ponderacion / 100;
$valor_a_lograr_ofertas = $meta * (100 - $ponderacion) / 100;
 

$T->Set('rango', $rango);
$T->Set('meta', number_format($meta, 0, ',', '.'));
$T->Set('sueldo_base', number_format($sueldo_base, 0, ',', '.'));
$T->Set('ponderacion', $ponderacion);
$T->Set('valor_a_lograr_normales', number_format($valor_a_lograr_normales, 0, ',', '.'));
$T->Set('valor_a_lograr_ofertas', number_format($valor_a_lograr_ofertas, 0, ',', '.'));



$firstRow = true;
$Q0 = $DB;
$Q0->Query($query0);

// Starting a HTML
$T->Show('general_header');   // Principal Header
$T->Show('start_query0');   // Start a Table 
$T->Show('header0');    // Show Header
//Define a  variable
$endConsult = false;
//Define a Total Variables
//Define a Subtotal Variables
//Define a Old Values Variables
$old['CODIGO'] = '';
$old['NOMBRE'] = '';
$old['CI'] = '';
$old['FECHA_CONT'] = '';

// Making a rows of consult
while ($Q0->NextRecord()) {

    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['NOMBRE'] = $Q0->Record['NOMBRE'];
    $el['CI'] = $Q0->Record['CI'];
    $el['FECHA_CONT'] = $Q0->Record['FECHA_CONT'];

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_NOMBRE', $el['NOMBRE']);
    $T->Set('query0_CI', $el['CI']);
    $T->Set('query0_FECHA_CONT', $el['FECHA_CONT']);

    if ($categ != 'MAYORISTA (4y5)') {
       $T->Show('query0_data_row');
    }   

    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
    $old['NOMBRE'] = $el['NOMBRE'];
    $old['CI'] = $el['CI'];
    $old['FECHA_CONT'] = $el['FECHA_CONT'];
    $firstRow = false;
}

$endConsult = true;


$agrupado_1y2 = 0;
$agrupado3 = 0;
$agrupado_4y5 = 0;
$agrupado_1y2n = 0;
$agrupado3n = 0;
$agrupado_4y5n = 0;

$total_dev_ofertas = 0;
$total_dev_normales = 0;

$T->Show('end_query0');    // Ends a Table 

$T->Show('ventash');
foreach ($ventas as $cat => $array) {

    $T->Set('cat', $cat);
    $T->Set('ofertas', number_format($array[0], 2, ',', '.'));
    $T->Set('normales', number_format($array[1], 2, ',', '.'));
    $T->Set('dev_ofertas', number_format($array[2], 2, ',', '.'));
    $T->Set('dev_normales', number_format($array[3], 2, ',', '.'));
    
    $total_dev_normales         += 0 + $array[3];
    $total_dev_ofertas          += 0 + $array[2];   
    if ($cat < 3) {

        $agrupado_1y2 += 0 + $array[0];
        $agrupado_1y2n += 0 + $array[1];
        
        $dev_1y2  += 0 + $array[2];   //$total_dev_ofertas += 0 + $dev_1y2;
        $dev_1y2n  += 0 + $array[3];  //$total_dev_normales += 0 + $dev_1y2n;
        
        if ($cat == 2) {
            $agrupado_1y2 = $agrupado_1y2 - $dev_1y2;
            $agrupado_1y2n = $agrupado_1y2n - $dev_1y2n;
            
            $uno_dos = number_format($agrupado_1y2, 2, ',', '.');
            $uno_dosn = number_format($agrupado_1y2n, 2, ',', '.');
            
            $total_1y2 = $agrupado_1y2 + $agrupado_1y2n ;
                     
            $total_uno_dos = number_format($total_1y2, 2, ',', '.');
            
            $T->Set('agrupado_x_cat', "<td class='num' style='font-weight:bolder;background:#CCFFFF ;border-width: 0px 1px 1px 0px;'>$uno_dos</td> <td style='font-weight:bolder;background:#CCFFFF;border-width: 0px 1px 1px 0px;' class='num'>$uno_dosn</td><td style='font-weight:bolder;background:#CCFFFF;border-width: 0px 0px 1px 0px;' class='num'>$total_uno_dos</td>");
        } else {
            $T->Set('agrupado_x_cat', '<td style="background:#CCFFFF;border-width: 0px 1px 0px 0px;" >&nbsp;</td><td style="background:#CCFFFF;border-width: 0px 1px 0px 0px;">&nbsp;</td><td style="background:#CCFFFF;border-width: 0px 0px 0px 0px;">&nbsp;</td>');
        }
    } else if ($cat == 3) {
        $agrupado3 += 0 + $array[0];
        $agrupado3n += 0 + $array[1];
        
        $dev_3  += 0 + $array[2];   //$total_dev_ofertas += 0 + $dev_3;
        $dev_3n  += 0 + $array[3]; // $total_dev_normales += 0 + $dev_3n;
        
        
        $agrupado3 = $agrupado3 - $dev_3;
        $agrupado3n = $agrupado3n - $dev_3n;
        
        $agrup3 = number_format($agrupado3, 2, ',', '.');
        $agrup3n = number_format($agrupado3n, 2, ',', '.');
        
        $total3  =  $agrupado3 + $agrupado3n  ;
        $total_agrup3 = number_format($total3, 2, ',', '.');
        $T->Set('agrupado_x_cat', "<td class='num' style='font-weight:bolder;background:#cc9966 ;border-width: 0px 1px 1px 0px;'>$agrup3</td> <td style='font-weight:bolder;background:#cc9966 ;border-width: 0px 1px 01px 0px;' class='num'>$agrup3n</td><td style='font-weight:bolder;background:#cc9966 ;border-width: 0px 0px 01px 0px;' class='num'>$total_agrup3</td>");
    } else { // 4 y 5
        $agrupado_4y5 += 0 + $array[0];
        $agrupado_4y5n += 0 + $array[1];
        $dev4y5  += 0 + $array[2];    //$total_dev_ofertas += 0 +$dev4y5;
        $dev4y5n  += 0 + $array[3];  // $total_dev_normales += 0 + $dev4y5n;
          
        if ($cat == 7) {
             
            $agrupado_4y5 = $agrupado_4y5 - $dev4y5;
            $agrupado_4y5n = $agrupado_4y5n - $dev4y5n;
            
            $cat4y5 = number_format($agrupado_4y5  , 2, ',', '.');
            $cat4y5n = number_format($agrupado_4y5n, 2, ',', '.');
             
            $total4y5 = $agrupado_4y5 + $agrupado_4y5n ; 
            $total_cat4y5n = number_format($total4y5, 2, ',', '.');
            $T->Set('agrupado_x_cat', "<td class='num' style='font-weight:bolder;font-weight:bolder;background:#ffffcc;border-width: 0px 1px 1px 0px;'>$cat4y5</td> <td style='font-weight:bolder;font-weight:bolder;background:#ffffcc;border-width: 0px 1px 1px 0px;' class='num'>$cat4y5n</td><td style='font-weight:bolder;font-weight:bolder;background:#ffffcc;border-width: 0px 0px 1px 0px;' class='num'>$total_cat4y5n</td>");
        } else {
            $T->Set('agrupado_x_cat', "<td style='font-weight:bolder;background:#ffffcc;border-width: 0px 1px 0px 0px;' >&nbsp;</td><td style='font-weight:bolder;background:#ffffcc;border-width: 0px 1px 0px 0px;' >&nbsp;</td><td style='font-weight:bolder;background:#ffffcc;border-width: 0px 0px 0px 0px;' >&nbsp;</td>");
        }
    }
    //
    $T->Show('ventasdata');
}

$T->Set('total_ofertas', number_format($TOTAL_OFERTAS, 2, ',', '.'));
$T->Set('total_normales', number_format($TOTAL_NORMALES, 2, ',', '.'));

$T->Set('total_dev_ofertas', number_format($total_dev_ofertas, 2, ',', '.'));
$T->Set('total_dev_normales', number_format($total_dev_normales, 2, ',', '.'));

$total_ofertas_menos_dev = $TOTAL_OFERTAS - $total_dev_ofertas;
$total_normales_menos_dev = $TOTAL_NORMALES - $total_dev_normales;
$total_totales =  $total_ofertas_menos_dev + $total_normales_menos_dev;

$T->Set('total_ofertas_menos_dev', number_format($total_ofertas_menos_dev, 2, ',', '.'));
$T->Set('total_normales_menos_dev', number_format($total_normales_menos_dev, 2, ',', '.'));

$T->Set('total_totales', number_format($total_totales, 2, ',', '.'));
 

// Calculo de Ventas en % sobre Ofertas y Normales
 

$T->Show('ventastot');
$T->Show('ventasf');


// Cuadro Referencial tabla de Conversion

$meta_conversion = 0;
if ($categ == 'MAYORISTA 3') {
    $COEF_CAT_3 = 1;
    $meta_conversion = 100000000;    
    
} else if ($categ == 'MAYORISTA (4y5)') {
    $COEF_MAYORISTA = 1;
    $meta_conversion = 250000000;
} else {  // MINORISTAS
    $COEF_MINORISTA = 1; 
    $meta_conversion = 65800000;  
}
 
// Si es Minorista la Meta es de 65800000
$T->Set('cc_cat', $categ);
$T->Set('meta_ref', number_format($meta_conversion, 0, ',', '.'));
$T->Set('valor_ref', number_format(1, 3, ',', '.'));

$T->Show('tabla_conversionh');
$T->Show('tabla_conversiondata');

// Buscar todos los que son <> A ESTA CATEGORIA PERO con Monto Mayor a 65.800.000

$consulta = "SELECT categ AS CATEGORIA,   meta AS META , a_min, a_max FROM mnt_cat_vend  WHERE categ <> '$categ' AND $antiguedad > a_min AND $antiguedad < a_max ";
//echo "<br> Categ:".$categ." <br> $consulta ";
 
$db->Query($consulta);  // 367 para que filtre los montos menores a 65.800.000

//$i = 0;
while ($db->NextRecord()) {
    $cc_cat = $db->Record['CATEGORIA'];
   
    $cc_meta = $db->Record['META'];
    
    $buscar = "MAYORISTA 3";
    $resultado = strpos($cc_cat, $buscar);

    if ($resultado !== FALSE) {  //MAYORISTA 3 
        $COEF_CAT_3 = $cc_meta / $meta_conversion;  
        $T->Set('cc_cat', $cc_cat);
            $T->Set('meta_ref', number_format($cc_meta, 0, ',', '.'));
            $T->Set('valor_ref', number_format($cc_meta / $meta_conversion, 3, ',', '.'));
    } else {
        $buscar = "MAYORISTA (4y5)";      
        $resultado = strpos($cc_cat, $buscar);  //echo "<br>$buscar en ".$cc_cat."      $resultado";
        if ($resultado !== FALSE) {  // Es MAYORISTA (4y5) // Siempre es 250.000.000
            $COEF_MAYORISTA = 250000000 / $meta_conversion;   
            $T->Set('cc_cat', $cc_cat);
            $T->Set('meta_ref', number_format(250000000, 0, ',', '.'));
            $T->Set('valor_ref', number_format(250000000 / $meta_conversion, 3, ',', '.'));
        } else {                
            $COEF_MINORISTA = 65800000 / $meta_conversion;   
            $T->Set('cc_cat', $cc_cat);
            $T->Set('meta_ref', number_format(65800000, 0, ',', '.'));
            $T->Set('valor_ref', number_format(65800000 / $meta_conversion, 3, ',', '.'));
        }
    } 
     
    $T->Show('tabla_conversiondata');
}
$T->Show('tabla_conversiof');
 

// CALCULO PARA LA CONVERSION EN BASE AL COEFICIENTE OBTENIDO MIN MAY_3 Y MAY 4y5

$T->Show('tabla_metas_conv');

// MINORISTA
$T->Set('calc_cat', 'MINORISTAS 1 y 2');
$T->Set('calc_coef', number_format($COEF_MINORISTA, 3, ',', '.'));

$val_min_x_coef_oferta = $agrupado_1y2 / $COEF_MINORISTA;
$val_min_x_coef_normal = $agrupado_1y2n / $COEF_MINORISTA;


$T->Set('z_ofertas', number_format($val_min_x_coef_oferta, 2, ',', '.'));
$T->Set('z_normales', number_format($val_min_x_coef_normal, 2, ',', '.'));

$z_total = $val_min_x_coef_oferta + $val_min_x_coef_normal;
$T->Set('z_total', number_format($z_total, 2, ',', '.'));

$T->Show('tabla_metas_convdata');

// MINORISTA 3
$T->Set('calc_cat', 'MAYORISTA 3');
$T->Set('calc_coef', number_format($COEF_CAT_3, 3, ',', '.'));
$val_may3_x_coef_oferta = $agrupado3 / $COEF_CAT_3;
$val_may3_x_coef_normal = $agrupado3n / $COEF_CAT_3;

$z_total = $val_may3_x_coef_oferta + $val_may3_x_coef_normal;
$T->Set('z_total', number_format($z_total, 2, ',', '.'));


$T->Set('z_ofertas', number_format($val_may3_x_coef_oferta, 2, ',', '.'));
$T->Set('z_normales', number_format($val_may3_x_coef_normal, 2, ',', '.'));
$T->Show('tabla_metas_convdata');

// MINORISTA 4 y 5
$T->Set('calc_cat', 'MAYORISTAS 4 y 5');
$T->Set('calc_coef', number_format($COEF_MAYORISTA, 3, ',', '.'));
$val_may4y5_x_coef_oferta = $agrupado_4y5 / $COEF_MAYORISTA;
$val_may4y5_x_coef_normal = $agrupado_4y5n / $COEF_MAYORISTA;


$T->Set('z_ofertas', number_format($val_may4y5_x_coef_oferta, 2, ',', '.'));
$T->Set('z_normales', number_format($val_may4y5_x_coef_normal, 2, ',', '.'));

$z_total = $val_may4y5_x_coef_oferta + $val_may4y5_x_coef_normal;
$T->Set('z_total', number_format($z_total, 2, ',', '.'));

$T->Show('tabla_metas_convdata');

$TOTAL_OFERTAS_RECAL = $val_min_x_coef_oferta + $val_may3_x_coef_oferta + $val_may4y5_x_coef_oferta;
$TOTAL_NORMALES_RECAL = $val_min_x_coef_normal + $val_may3_x_coef_normal + $val_may4y5_x_coef_normal;

 //echo " TOTAL_OFERTAS_RECAL: $TOTAL_OFERTAS_RECAL       TOTAL_NORMALES_RECAL   $TOTAL_NORMALES_RECAL<br>";

//echo " TOTAL_NORMALES_RECAL $TOTAL_NORMALES_RECAL <br>";
//echo " TOTAL_OFERTAS_RECAL $TOTAL_OFERTAS_RECAL <br>";

$z_total_normal_y_oferta_calc = $TOTAL_OFERTAS_RECAL + $TOTAL_NORMALES_RECAL;


if ($categ == 'MAYORISTA (4y5)') {
     // Ver Meta Flotante de acuerdo al Monto de Venta 
     $total_neto = $z_total_normal_y_oferta_calc;  // Este es en Realidad lo que Vendio
     
    // echo "Total Neto: $total_neto<br>";
     
     $n = number_format($total_neto, 0, ',', '.');
     $n85porc =    number_format(($total_neto * 85) / 100, 0, ',', '.');
     //echo "Total Neto $n<br>85% = $n85porc"; 
    
    
    if ($total_neto < (100000000 * 85 / 100)) {
        //echo "No llega a la Meta  < (100000000 * 85 / 100)";
        $meta = 100000000;  
        $sueldo_base = 1200000;   
    }else  if ($total_neto > (100000000 * 85 / 100) && $total_neto < (150000000 * 85 / 100)  ) {   
        $meta = 150000000;      $meta_arrastre = 100000000;
        $sueldo_base = 1200000; $variable_arrastre =  1200000; 
        if($func_cod == 'EumelioV' || $func_cod == 'lucioc' ){
            $meta = 100000000;      $meta_arrastre = 100000000;
            $sueldo_base = 1200000; $variable_arrastre =  1200000; 
        } 
    } else if ($total_neto >= (150000000 * 85 / 100) && $total_neto < (200000000 * 85 / 100)) {   
        $meta = 150000000;    $meta_arrastre = 150000000;
        $sueldo_base = 1300000;   $variable_arrastre =  1200000; 
    } else if ($total_neto >= (200000000* 85 / 100) && $total_neto < (250000000 * 85 / 100)) {  
        $meta = 200000000;   $meta_arrastre = 150000000;
        $sueldo_base = 1400000;  $variable_arrastre =  1300000; 
    } else if ($total_neto >= (250000000* 85 / 100) && $total_neto < (300000000 * 85 / 100)) {  
        $meta = 250000000;     $meta_arrastre = 200000000;
        $sueldo_base = 1500000;  $variable_arrastre =  1400000; 
    } else if ($total_neto >= (300000000* 85 / 100) && $total_neto < (350000000 * 85 / 100)) {  
        $meta = 300000000;      $meta_arrastre = 250000000;
        $sueldo_base = 1600000;   $variable_arrastre =  1500000; 
    } else if ($total_neto >= (350000000 * 85 / 100) && $total_neto < (400000000 * 85 / 100)) {  
        $meta = 350000000;    $meta_arrastre = 300000000;
        $sueldo_base = 1700000;    $variable_arrastre =  1600000; 
    } else if ($total_neto >= (400000000 * 85 / 100) && $total_neto < (450000000 * 85 / 100)) {  
        $meta = 400000000;     $meta_arrastre = 350000000;
        $sueldo_base = 1800000;    $variable_arrastre =  1700000; 
    }else if ($total_neto >=  (450000000 * 85 / 100) && $total_neto < (500000000 * 85 / 100)) {  
        $meta = 450000000;  $meta_arrastre = 400000000;
        $sueldo_base = 1900000;   $variable_arrastre =  1800000; 
    }else if ($total_neto >=  (500000000 * 85 / 100) && $total_neto < (550000000 * 85 / 100)) {   
        $meta = 500000000;  $meta_arrastre = 450000000;
        $sueldo_base = 2000000;   $variable_arrastre =  1900000; 
    }else if ($total_neto >=  (550000000 * 85 / 100) && $total_neto < (600000000 * 85 / 100)) {   
        $meta = 550000000;  $meta_arrastre = 500000000;
        $sueldo_base = 2100000;   $variable_arrastre =  2000000; 
    }else if ($total_neto >=  (600000000 * 85 / 100) && $total_neto < (650000000 * 85 / 100)) {     
        $meta = 600000000;  $meta_arrastre = 550000000;
        $sueldo_base = 2200000;   $variable_arrastre =  2100000; 
    }else if ($total_neto >=  (650000000 * 85 / 100) && $total_neto < (700000000 * 85 / 100)) {    
        $meta = 650000000;  $meta_arrastre = 600000000;
        $sueldo_base = 2300000;   $variable_arrastre =  2200000; 
    }else if ($total_neto >=  (700000000 * 85 / 100) && $total_neto < (750000000 * 85 / 100)) {     
        $meta = 700000000;  $meta_arrastre = 650000000;
        $sueldo_base = 2400000;   $variable_arrastre =  2300000; 
    }else if ($total_neto >=  (750000000 * 85 / 100) && $total_neto < (850000000 * 85 / 100)) {     
        $meta = 750000000;  $meta_arrastre = 700000000;
        $sueldo_base = 2500000;   $variable_arrastre =  2400000; 
    }else{
        echo "Error: Agregar Monto para varialble > 800.000.000";
    }
    
    $variable = $sueldo_base;
   
    $valor_a_lograr_normales = $meta * $ponderacion / 100;
     
    $valor_a_lograr_ofertas = $meta * (100 - $ponderacion) / 100;
    //echo "valor_a_lograr_ofertas ".round($valor_a_lograr_ofertas,2)."<br>";
    $T->Set('rango', $rango);
    $T->Set('meta', number_format($meta, 0, ',', '.'));
    $T->Set('sueldo_base', number_format($sueldo_base, 0, ',', '.'));
    $T->Set('ponderacion', $ponderacion);
    $T->Set('valor_a_lograr_normales', number_format($valor_a_lograr_normales, 0, ',', '.'));
    $T->Set('valor_a_lograr_ofertas', number_format($valor_a_lograr_ofertas, 0, ',', '.'));
   
}
 

$T->Set('z_total_normal_y_oferta_calc', number_format(ceil($z_total_normal_y_oferta_calc), 0, ',', '.'));
$T->Set('z_ofertas_calc', number_format(ceil($TOTAL_OFERTAS_RECAL), 0, ',', '.'));
$T->Set('z_normales_calc', number_format(ceil($TOTAL_NORMALES_RECAL), 0, ',', '.'));

if ($valor_a_lograr_ofertas > 0) {
    $logros_ofertas = $TOTAL_OFERTAS_RECAL * 100 / $valor_a_lograr_ofertas;
} else {
    $logros_ofertas = 0;
}
$logros_normales = $TOTAL_NORMALES_RECAL * 100 / $valor_a_lograr_normales;

$T->Set('logros_ofertas_calc', number_format($logros_ofertas, 2, ',', '.'));
$T->Set('logros_normales_calc', number_format($logros_normales, 2, ',', '.'));

$porc_logrado = $z_total_normal_y_oferta_calc * 100 / $meta;

//echo "<br> porc_logrado".$porc_logrado."    $z_total_normal_y_oferta_calc       $meta<br>";
$cobra_variable = false;
if ($porc_logrado >= 85) {
    $cobra_variable = true;
}
//echo "<br> Cobra $cobra_variable  <br>";
$T->Set('porc_logrado', number_format($porc_logrado, 2, ',', '.'));


// Calculo del Premio
$sueldo_normales = $variable * $ponderacion / 100;
$sueldo_ofertas = $variable * (100 - $ponderacion) / 100;
$total_premios_a_cobrar = 0;

if ($cobra_variable) {
    $flag = true;
    
    //echo "Logro Normales ".round($logros_normales,2)."<br>";
    
    if ($logros_normales >= 85 ) {
        $premio_normal = $sueldo_normales * $logros_normales / 100;
        $T->Set('premio_normales', number_format($premio_normal, 0, ',', '.'));
    } else {
        
       if ($categ == 'MAYORISTA (4y5)') {
        // Volver a la Meta anterior
        //echo "$variable_arrastre  $ponderacion";
        $valor_a_lograr_normales = $meta_arrastre * $ponderacion / 100;
        $logros_normales = $TOTAL_NORMALES_RECAL * 100 / $valor_a_lograr_normales;
        
        
        $sueldo_normales = $variable_arrastre * $ponderacion / 100;        
        $premio_normal = $sueldo_normales * $logros_normales / 100;
        $sueldo_base = $variable_arrastre;
         
         
        $T->Set('valor_a_lograr_normales', number_format($valor_a_lograr_normales, 0, ',', '.'));
         
        
        $T->Set('meta', number_format($meta_arrastre, 0, ',', '.'));
        $T->Set('sueldo_base', number_format($variable_arrastre, 0, ',', '.'));
        
        $porc_logrado = $z_total_normal_y_oferta_calc * 100 / $meta_arrastre;
        $T->Set('porc_logrado', number_format($porc_logrado, 2, ',', '.'));       
        $T->Set('premio_normales',  number_format($premio_normal, 0, ',', '.')); // antes 0
         
        $logros_normales = $TOTAL_NORMALES_RECAL * 100 / $valor_a_lograr_normales;
        $T->Set('logros_normales_calc', number_format($logros_normales, 2, ',', '.'));
        $flag = false;
                
        
       }else{
          $T->Set('premio_normales', number_format(0, 0, ',', '.')); 
       }
        
    }
    
    if (($logros_ofertas >= 1 && $flag && ($categ == 'MAYORISTA (4y5)') ) || $logros_ofertas >= 85 ) {
        $premio_ofertas = $sueldo_ofertas * $logros_ofertas / 100;
        $T->Set('premio_ofertas', number_format($premio_ofertas, 0, ',', '.'));  
    } else {
        // Volver a la Meta anterior
       // echo "Logro Ofertas ".round($logros_ofertas,2)."   = meta anterior  $meta_arrastre";
       if ($categ == 'MAYORISTA (4y5)') {
        $valor_a_lograr_ofertas = $meta_arrastre * (100 - $ponderacion) / 100; 
        // echo "valor_a_lograr_ofertas Recalculado ".round($valor_a_lograr_ofertas,2)."<br>";
        $logros_ofertas = $TOTAL_OFERTAS_RECAL * 100 / $valor_a_lograr_ofertas;
        
        $sueldo_ofertas = $variable_arrastre * (100 - $ponderacion) / 100;        
        $sueldo_base = $variable_arrastre;
                 
        $premio_ofertas = $sueldo_ofertas * $logros_ofertas / 100;
        
        
        $T->Set('logros_ofertas_calc', number_format($logros_ofertas, 2, ',', '.')); 
        $T->Set('valor_a_lograr_ofertas', number_format($valor_a_lograr_ofertas, 0, ',', '.'));
        
        
        $T->Set('meta', number_format($meta_arrastre, 0, ',', '.'));
        $T->Set('sueldo_base', number_format($variable_arrastre, 0, ',', '.'));
        
        $porc_logrado = $z_total_normal_y_oferta_calc * 100 / $meta_arrastre;
        $T->Set('porc_logrado', number_format($porc_logrado, 2, ',', '.'));
        
        $T->Set('premio_ofertas',number_format($premio_ofertas, 0, ',', '.')); //antes 0
       }else{
           $T->Set('premio_ofertas', number_format(0, 0, ',', '.'));  
       }        
    }
    
    //echo "<br>  logros_ofertas  $logros_ofertas       logros_normales  $logros_normales      premio_normal   $premio_normal    sueldo_normales $sueldo_normales    logros_normales $logros_normales<br>";
    $total_premio_ofertas_normales = $premio_normal + $premio_ofertas;
    $T->Set('total_premio_ofertas_normales', number_format($total_premio_ofertas_normales, 0, ',', '.'));

    $total_premios_a_cobrar = $sueldo_base + $premio_normal + $premio_ofertas;
} else {
    $total_premios_a_cobrar = $sueldo_base;
    $T->Set('premio_normales', 0);
    $T->Set('premio_ofertas', 0);
    $T->Set('total_premio_ofertas_normales', number_format(0, 0, ',', '.'));
}

$T->Set('premio_total', number_format($total_premios_a_cobrar, 0, ',', '.'));

$T->Show('tabla_metas_convdatat');

$T->Show('tabla_metas_convf');

if ($categ == 'MAYORISTA (4y5)') {
   $T->Show('query0_data_row');
   echo '<script>    $( "#cabecera" ).append( $( "#cab_general" ) );    </script>';
} 
 
 
?>


<?php

/** Report prg file (est_cli_x_cat) 
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
$T->Set( 'sup_b_fam', 'cobe');
$T->Set( 'sup_fam', 'Cobertores');
$T->Set( 'sup_desde', '2012-01-01');
$T->Set( 'sup_hasta', '2012-02-24');
$T->Set( 'sup_rep', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT DISTINCT  f.fact_localidad AS SUC, e.emp_nombre AS NOMBRE  FROM mnt_cli c, factura f, det_factura d, mnt_prod p, par_empresas e WHERE c.cli_ci = f.fact_cli_ci AND f.fact_nro = d.df_fact_num AND f.fact_localidad = e.emp_cod AND d.df_cod_prod = p.p_cod AND p.p_fam LIKE 'Cobertores' AND cli_fecha_nac NOT LIKE "0000-00-00"  AND f.fact_fecha BETWEEN '2012-01-01' AND '2012-02-24' ORDER BY f.fact_localidad ASC,f.fact_cli_cat ASC";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

// DATOS DE CABECERA
$HOY = date("Y-m-d");
$FAM = $sup['fam'];
$desde = $sup['desde'];
$hasta = $sup['hasta'];

 
$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);
$T->Set('desde',$data_ini);
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


$sql_total = "SELECT SUM(f.fact_total) AS TOTAL  FROM mnt_cli c, factura f, det_factura d, mnt_prod p WHERE c.cli_ci = f.fact_cli_ci AND f.fact_nro = d.df_fact_num
AND d.df_cod_prod = p.p_cod AND p.p_fam LIKE '$FAM'
AND cli_fecha_nac NOT LIKE '0000-00-00'
AND f.fact_fecha BETWEEN '$desde' AND '$hasta' AND  f.fact_localidad = ";

$sql_cant = "SELECT  COUNT( DISTINCT f.fact_cli_ci)  AS CANT_CLI  FROM mnt_cli c, factura f, det_factura d, mnt_prod p WHERE c.cli_ci = f.fact_cli_ci AND f.fact_nro = d.df_fact_num
AND d.df_cod_prod = p.p_cod AND p.p_fam LIKE '$FAM'
AND cli_fecha_nac NOT LIKE '0000-00-00'
AND f.fact_fecha BETWEEN '$desde' AND '$hasta' AND  f.fact_localidad = ";

$z_total = 0;
$z_cant_cli = 0;

$z_total_jur = 0;
$z_cant_cli_jur = 0;

//$Z_CAT_1_R1 = 0; $Z_CAT_1_R2 = 0; $Z_CAT_1_R3 = 0;$Z_CAT_1_R4 = 0;$Z_CAT_1_R5 = 0;

$array = array("Z_CAT_1_R1"=>0,"Z_CAT_1_R2"=>0,"Z_CAT_1_R3"=>0,"Z_CAT_1_R4"=>0,"Z_CAT_1_R5"=>0,"Z_CAT_1_R6"=>0,
               "Z_CAT_2_R1"=>0,"Z_CAT_2_R2"=>0,"Z_CAT_2_R3"=>0,"Z_CAT_2_R4"=>0,"Z_CAT_2_R5"=>0,"Z_CAT_2_R6"=>0,
               "Z_CAT_3_R1"=>0,"Z_CAT_3_R2"=>0,"Z_CAT_3_R3"=>0,"Z_CAT_3_R4"=>0,"Z_CAT_3_R5"=>0,"Z_CAT_3_R6"=>0,
               "Z_CAT_4_R1"=>0,"Z_CAT_4_R2"=>0,"Z_CAT_4_R3"=>0,"Z_CAT_4_R4"=>0,"Z_CAT_4_R5"=>0,"Z_CAT_4_R6"=>0,
               "Z_CAT_5_R1"=>0,"Z_CAT_5_R2"=>0,"Z_CAT_5_R3"=>0,"Z_CAT_5_R4"=>0,"Z_CAT_5_R5"=>0,"Z_CAT_5_R6"=>0);

$array_cli = array("Z_CAT_1_R1"=>0,"Z_CAT_1_R2"=>0,"Z_CAT_1_R3"=>0,"Z_CAT_1_R4"=>0,"Z_CAT_1_R5"=>0,"Z_CAT_1_R6"=>0,
                   "Z_CAT_2_R1"=>0,"Z_CAT_2_R2"=>0,"Z_CAT_2_R3"=>0,"Z_CAT_2_R4"=>0,"Z_CAT_2_R5"=>0,"Z_CAT_2_R6"=>0,
                   "Z_CAT_3_R1"=>0,"Z_CAT_3_R2"=>0,"Z_CAT_3_R3"=>0,"Z_CAT_3_R4"=>0,"Z_CAT_3_R5"=>0,"Z_CAT_3_R6"=>0,
                   "Z_CAT_4_R1"=>0,"Z_CAT_4_R2"=>0,"Z_CAT_4_R3"=>0,"Z_CAT_4_R4"=>0,"Z_CAT_4_R5"=>0,"Z_CAT_4_R6"=>0,
                   "Z_CAT_5_R1"=>0,"Z_CAT_5_R2"=>0,"Z_CAT_5_R3"=>0,"Z_CAT_5_R4"=>0,"Z_CAT_5_R5"=>0,"Z_CAT_5_R6"=>0);

$array_jur = array("Z_CAT_1_R1"=>0,"Z_CAT_1_R2"=>0,"Z_CAT_1_R3"=>0,"Z_CAT_1_R4"=>0,"Z_CAT_1_R5"=>0,"Z_CAT_1_R6"=>0,
                   "Z_CAT_2_R1"=>0,"Z_CAT_2_R2"=>0,"Z_CAT_2_R3"=>0,"Z_CAT_2_R4"=>0,"Z_CAT_2_R5"=>0,"Z_CAT_2_R6"=>0,
                   "Z_CAT_3_R1"=>0,"Z_CAT_3_R2"=>0,"Z_CAT_3_R3"=>0,"Z_CAT_3_R4"=>0,"Z_CAT_3_R5"=>0,"Z_CAT_3_R6"=>0,
                   "Z_CAT_4_R1"=>0,"Z_CAT_4_R2"=>0,"Z_CAT_4_R3"=>0,"Z_CAT_4_R4"=>0,"Z_CAT_4_R5"=>0,"Z_CAT_4_R6"=>0,
                   "Z_CAT_5_R1"=>0,"Z_CAT_5_R2"=>0,"Z_CAT_5_R3"=>0,"Z_CAT_5_R4"=>0,"Z_CAT_5_R5"=>0,"Z_CAT_5_R6"=>0);

$array_jur_cli = array("Z_CAT_1_R1"=>0,"Z_CAT_1_R2"=>0,"Z_CAT_1_R3"=>0,"Z_CAT_1_R4"=>0,"Z_CAT_1_R5"=>0,"Z_CAT_1_R6"=>0,
                       "Z_CAT_2_R1"=>0,"Z_CAT_2_R2"=>0,"Z_CAT_2_R3"=>0,"Z_CAT_2_R4"=>0,"Z_CAT_2_R5"=>0,"Z_CAT_2_R6"=>0,
                       "Z_CAT_3_R1"=>0,"Z_CAT_3_R2"=>0,"Z_CAT_3_R3"=>0,"Z_CAT_3_R4"=>0,"Z_CAT_3_R5"=>0,"Z_CAT_3_R6"=>0,
                       "Z_CAT_4_R1"=>0,"Z_CAT_4_R2"=>0,"Z_CAT_4_R3"=>0,"Z_CAT_4_R4"=>0,"Z_CAT_4_R5"=>0,"Z_CAT_4_R6"=>0,
                       "Z_CAT_5_R1"=>0,"Z_CAT_5_R2"=>0,"Z_CAT_5_R3"=>0,"Z_CAT_5_R4"=>0,"Z_CAT_5_R5"=>0,"Z_CAT_5_R6"=>0);



function setDatosCategoria($T, $CAT, $_R1, $_R2, $nombre_rango,$SUC,$sql_total,$sql_cant,$Rango){
        $db = new Y_DB();
        $db->Database = $Global['project'];
        global $z_total, $z_cant_cli, $z_total_jur, $z_cant_cli_jur,$array,$array_jur,$array_cli,$array_jur_cli;


        // RUC SIN GUION !"-"
        $SQL0 =  $sql_total." '$SUC' AND f.fact_cli_cat = '$CAT' AND c.cli_fecha_nac BETWEEN '$_R1' AND '$_R2' AND f.fact_cli_ci NOT LIKE '%-%' ORDER BY f.fact_localidad ASC,f.fact_cli_cat ASC, cli_fecha_nac ASC";
        $db->Query($SQL0);
        if($db->NumRows()>0){
           $db->NextRecord();
           $TOTAL = $db->Record['TOTAL'];
           $T->Set('total', number_format($TOTAL,0,',','.'));
           $z_total  =  $z_total + $TOTAL; // echo $z_total."<br>";

           $suma = $array["Z_CAT_".$CAT."_".$Rango];
           $suma = $suma + $TOTAL;
           $array["Z_CAT_".$CAT."_".$Rango] = $suma;

        }
        // RUC CON GUION "-"
        $SQL0 =  $sql_total." '$SUC' AND f.fact_cli_cat = '$CAT' AND c.cli_fecha_nac BETWEEN '$_R1' AND '$_R2' AND f.fact_cli_ci LIKE '%-%' ORDER BY f.fact_localidad ASC,f.fact_cli_cat ASC, cli_fecha_nac ASC";
        $db->Query($SQL0);
        if($db->NumRows()>0){
           $db->NextRecord();
           $TOTAL_JUR = $db->Record['TOTAL'];
           $T->Set('total_jur', number_format($TOTAL_JUR,0,',','.'));
           $z_total_jur  =  $z_total_jur + $TOTAL_JUR; // echo $z_total."<br>";

           $suma = $array_jur["Z_CAT_".$CAT."_".$Rango];
           $suma = $suma + $TOTAL_JUR;
           $array_jur["Z_CAT_".$CAT."_".$Rango] = $suma;

        }


        $SQL2 =  $sql_cant." '$SUC' AND f.fact_cli_cat = '$CAT' AND c.cli_fecha_nac BETWEEN '$_R1' AND '$_R2' AND f.fact_cli_ci NOT LIKE '%-%' ORDER BY f.fact_localidad ASC,f.fact_cli_cat ASC, cli_fecha_nac ASC";
        
        if($Rango ==='R6' ){
            echo $SQL2."<br>";
        }
        
        $db->Query($SQL2);
        if($db->NumRows()>0){
           $db->NextRecord();
           $CANT_CLI = $db->Record['CANT_CLI'];
           $T->Set('cant_cli', $CANT_CLI);
           $z_cant_cli += 0 + $CANT_CLI;
           $suma = $array_cli["Z_CAT_".$CAT."_".$Rango];
           $suma = $suma + $z_cant_cli;
           $array_cli["Z_CAT_".$CAT."_".$Rango] = $suma;
        }
        $SQL2 =  $sql_cant." '$SUC' AND f.fact_cli_cat = '$CAT' AND c.cli_fecha_nac BETWEEN '$_R1' AND '$_R2' AND f.fact_cli_ci LIKE '%-%' ORDER BY f.fact_localidad ASC,f.fact_cli_cat ASC, cli_fecha_nac ASC";
        $db->Query($SQL2);
        if($db->NumRows()>0){
           $db->NextRecord();
           $CANT_CLI_JUR = $db->Record['CANT_CLI'];
           $T->Set('cant_cli_jur', $CANT_CLI_JUR);
           $z_cant_cli_jur += 0 + $CANT_CLI_JUR;
           $suma = $array_jur_cli["Z_CAT_".$CAT."_".$Rango];
           $suma = $suma + $z_cant_cli_jur;
           $array_jur_cli["Z_CAT_".$CAT."_".$Rango] = $suma; 
        }
        $T->Set('rango', $nombre_rango);
        $T->Show('categoria_data');
}


//Define a Old Values Variables
$old['SUC'] = '';
$old['NOMBRE'] = '';

    // Entre 15-20 años
    $_20 = date("Y-m-d", strtotime("$HOY - 20 year"));    $_15 = date("Y-m-d", strtotime("$HOY - 15 year"));
    // Entre 21-25 años
    $_25 = date("Y-m-d", strtotime("$HOY - 25 year"));    $_21 = date("Y-m-d", strtotime("$HOY - 21 year"));
    // Entre 26-35 años
    $_35 = date("Y-m-d", strtotime("$HOY - 35 year"));    $_26 = date("Y-m-d", strtotime("$HOY - 26 year"));
    // Entre 36-45 años
    $_45 = date("Y-m-d", strtotime("$HOY - 45 year"));    $_36 = date("Y-m-d", strtotime("$HOY - 36 year"));
    // Entre 46-55 años
    $_55 = date("Y-m-d", strtotime("$HOY - 55 year"));    $_46 = date("Y-m-d", strtotime("$HOY - 46 year"));
    // Mas de 56 años
    $_56 = date("Y-m-d", strtotime("$HOY - 55 year"));    $_siglo =  date("Y-m-d", strtotime("$HOY - 100 year"));


// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['SUC'] = $Q0->Record['SUC'];
    $el['NOMBRE'] = $Q0->Record['NOMBRE'];
    $SUC = $el['SUC'];
    // Preparing a template variables
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_NOMBRE', $el['NOMBRE']);
    $T->Show('query0_data_row');


    // Para todas las Categorias
    for($i = 1; $i < 6;$i++){
       $T->Set('cat', $i);  $T->Show('categoria');
       setDatosCategoria($T, $i, $_20, $_15, '15-20',$SUC,$sql_total,$sql_cant,'R1' );
       setDatosCategoria($T, $i, $_25, $_21, '21-25',$SUC,$sql_total,$sql_cant,'R2');
       setDatosCategoria($T, $i, $_35, $_26, '26-35',$SUC,$sql_total,$sql_cant,'R3');
       setDatosCategoria($T, $i, $_45, $_36, '36-45',$SUC,$sql_total,$sql_cant,'R4');
       setDatosCategoria($T, $i, $_55, $_46, '46-55',$SUC,$sql_total,$sql_cant,'R5');
       setDatosCategoria($T, $i, $_siglo,$_56, '56-<big>&#8734;</big>',$SUC,$sql_total,$sql_cant,'R6');
       global $z_total, $z_cant_cli, $z_total_jur, $z_cant_cli_jur;
       $T->Set('z_total',  number_format($z_total,0,',','.'));
       $T->Set('z_cant_cli', $z_cant_cli);

       $T->Set('z_total_jur',  number_format($z_total_jur,0,',','.'));
       $T->Set('z_cant_cli_jur', $z_cant_cli_jur);

       $T->Show('categoria_total');
       $z_total = 0;
       $z_cant_cli = 0;
       $z_cant_cli = 0;
       $z_cant_cli_jur = 0;

    }
    $old['SUC'] = $el['SUC'];
    $old['NOMBRE'] = $el['NOMBRE'];
    $firstRow=false;
}
//global $array;

 
$T->Set('cat', '1'); 
$T->Show('titulo_resumen');
$T->Show('cat');

$rangos = array('15-20','21-25','26-35','36-45','46-55','56-<big>&#8734;</big>');

global $array,$array_jur,$array_cli,$array_jur_cli;

$x = 0;
$edades = 0;

 $count = count($array);

 foreach($array as $k => $v) {
    //echo  " $array[$k] => $v.<br>";
    $T->Set('range', $rangos[$x]);
    $T->Set('sumatoria_cat',number_format($v,0,',','.'));
    // Uso la clave del otro
    $valor_jur = $array_jur[$k];
    $T->Set('sumatoria_cat_jur',number_format($valor_jur,0,',','.'));
    // Cantidad de clientes
    $cant_cli = $array_cli[$k];
    $T->Set('cant_cli_fis',number_format($cant_cli,0,',','.'));

    $canti_cli_jur = $array_jur_cli[$k];
    $T->Set('cant_jur_cli',number_format($canti_cli_jur,0,',','.'));

    $x++;  $edades++;
    $T->Show('totales_rango_x_cat');
    if($edades == 6){
       $x = 0; $T->Set('cat', '2');$T->Show('cat');
    }
    if($edades == 12){
       $x = 0; $T->Set('cat', '3');$T->Show('cat');
    }
    if($edades == 18){
       $x = 0; $T->Set('cat', '4');$T->Show('cat');
    }
    if($edades == 24){
       $x = 0; $T->Set('cat', '5');$T->Show('cat');
    }     
}


$endConsult = true;
if( true ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

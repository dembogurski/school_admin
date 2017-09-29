<?php

/** Report prg file (monit_mens_clie) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  

// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 

/*$T = new Y_Template( $file_tpl ); 
// Superior Variables
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_cli_cat', '3');
$T->Set( 'sup_cli_tipo', 'Confeccionista');
$T->Set( 'sup_suc', '01');
$T->Set( 'sup_desde', '2012-10-01');
$T->Set( 'sup_hasta', '2013-08-21');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_gen_repm', '');
$T->Set( 'sup_meses', '10');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT DISTINCT c.cli_fullname, c.cli_ci AS ci, c.cli_cat AS cat FROM mnt_cli c, factura f WHERE f.fact_cli_ci = c.cli_ci   AND f.fact_cli_cat = '3' AND c.cli_tipo = 'Confeccionista'AND f.fact_fecha BETWEEN '2012-10-01' AND '2013-08-21'AND f.fact_localidad = '01'ORDER BY cli_fullname ASC";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$desde = $sup['desde'];
$hasta = $sup['hasta'];
$data_ini = substr($sup['desde'], 8, 2) . '-' . substr($sup['desde'], 5, 2) . '-' . substr($sup['desde'], 0, 4);
$data_fin = substr($sup['hasta'], 8, 2) . '-' . substr($sup['hasta'], 5, 2) . '-' . substr($sup['hasta'], 0, 4);
$T->Set('desde', $data_ini);
$T->Set('hasta', $data_fin);

$cat = $sup['cli_cat'];
$suc=  $sup['suc'];

$db = new Y_DB();
$db->Database = 'marijoa';

// Obtengo todos los meses

$db->Query("SET lc_time_names = 'es_AR'");

$db->Query("SELECT DISTINCT  date_format(fact_fecha,'%m-%Y') as meses,date_format(fact_fecha,'%M-%y') as meses_nom  FROM factura WHERE fact_fecha BETWEEN '$desde' AND '$hasta'");

$array_meses = array();
$master = array();

while( $db->NextRecord() ){
    $mes = $db->Record['meses'];
    $nmes = $db->Record['meses_nom'];
    $array_meses[$mes] = $nmes;   
}
 

// Busco todas las ventas
$sql = "SELECT f.fact_cli_ci AS ci, date_format(f.fact_fecha,'%m-%Y') AS mes, sum(d.df_cantidad) AS cant,sum(d.df_subtotal) AS subtotal 
FROM factura f, det_factura d, mnt_cli c WHERE f.fact_nro = d.df_fact_num AND f.fact_fecha BETWEEN '$desde' AND '$hasta' and f.fact_cli_ci = c.cli_ci
AND f.fact_estado = 'Cerrada' and c.cli_cat = '$cat' and fact_localidad like '$suc'

and d.df_cod_prod <> '1000' and d.df_cod_prod <> '1001' and d.df_cod_prod <> '1002' 
GROUP BY mes,ci ORDER BY  ci ASC ,mes  ASC";

$db->Query($sql);
while( $db->NextRecord() ){
    $ci = $db->Record['ci'];
    $mes = $db->Record['mes'];
    $cant = $db->Record['cant'];
    $subt = $db->Record['subtotal'];
    $cant_subt = array(  $cant , $subt );    
    $arr_mes = array($mes => $cant_subt);
    
    if($master[$ci] != null){
       $arrci = $master[$ci];
       $arrci[$mes] = $cant_subt;        
       $master[$ci] = $arrci; 
    }else{
       $master[$ci] = $arr_mes;    
    }
      
}



$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 


//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables


// Cabeceras
$month_counter = 0;
foreach ($array_meses as $key => $value) {
  if($month_counter % 2 > 0){
      $zebra = 'rgb(191,191,255)';
  }else{
      $zebra = 'white';
  }  
  $cabecera.="<th style='background:$zebra'>$value</th>";  
  
  $month_counter++;
}
 $cabecera.="<th style='background:#FFFFCC;color:black'>Promedio</th>"; 
 $cabecera.="<th style='width:100px;background:#FFFFCC'>Mediana</th>";
 $cabecera.="<th style='width:100px;background:#FFFFCC'>Variacion Mensual</th>";
 
//print_r($array_meses);


$T->Set('cabecera', $cabecera);
$T->Show('header0');				// Show Header

//Define a Old Values Variables
$old['cli_fullname'] = '';
$old['ci'] = '';
$old['cat'] = '';


$array_totales = array();
$array_valores = array();
foreach ($array_meses as $mes => $value) {
    $array_totales[$mes] = 0;
    $array_valores[$mes] = 0;
}


$i = 0;
while( $Q0->NextRecord() ){
    $i++;
    // Define a elements
    $el['cli_fullname'] = $Q0->Record['cli_fullname'];
    $el['ci'] = $Q0->Record['ci'];
    $el['cat'] = $Q0->Record['cat'];
    $ci = $el['ci'];
    $cliente = $el['cli_fullname'];

    // Preparing a template variables
    ///$T->Set('query0_cli_fullname', $el['cli_fullname']);
    //$T->Set('query0_ci', $el['ci']);
    //$T->Set('query0_cat', $el['cat']);

   
    $array_ci = $master[$ci];
    
    
    if($i%2 > 0){
        $color = 'white';
    }else{
        
        if($cat == 1){        
          $color = 'white';
        }else if($cat == 2){
           $color = 'rgb(255,255,206)';
        }else if($cat == 3){
            $color = '#CCFFCC';
        }else if($cat == 4){
           $color = '#CCCCFF';
        }else{
           $color = 'lightblue '; 
        }
            
    }
    
    $fila = "<tr style='background:$color;' >
             <td class='cliente' style='height:46' rowspan='2'>$i</td>
             <td  class='cliente' title='CI: $ci' rowspan='2'>$cliente</td>
             <td class='itemc' style='background:white;'><b>Metros</b></td>";
    
     $valor_compra = "<tr style='background:$color;'  > 
     <td class='valores' style='background:white;text-align:center;'><b>Valor</b></td>";
                       
    
    $ultimo = 0;
    $penultimo = 0;
    $cant_meses = 0;          
    $total_metros = 0;
    
    $array_mediana_mts = array();
    
    foreach ($array_meses as $mes => $nombre_meses) {
          
          $cant_meses++;
          if($array_ci[$mes] != null){ // Compro este mes
              
              $compras = $array_ci[$mes];
              $cantidad = $compras[0];
              $valor  = $compras[1];
              $total_metros += 0+$cantidad;
              $fila.="<td class='num' style='background:white';>$cantidad</td>";
              $valor_compra.="<td class='valores' style='background:rgb(215,215,255)'>".number_format($valor,0, ',', '.'). "</td>";
              
              array_push($array_mediana_mts,$cantidad);
              
              // Sumar el total de cantidades
              
              $total_mes = $array_totales[$mes];
              $total_mes+= 0+$cantidad;
              $array_totales[$mes]= $total_mes;
              
              // Sumar el total de valores 
              $total_valor_mes = $array_valores[$mes];
              $total_valor_mes+= 0+$valor;
              $array_valores[$mes]= $total_valor_mes;
              
              $penultimo = $ultimo;
              $ultimo = $cantidad;
              
          }else{ // No compro
              $fila.="<td class='num' style='background:white';>0</td>"; 
              $valor_compra.="<td   class='valores' style='background:rgb(215,215,255)'>0</td>";
              $penultimo = $ultimo; 
              $ultimo = 0;
              array_push($array_mediana_mts,0);
          } 
          
           //$compras_cli = 
    }
    $promedio =  number_format($total_metros /  $cant_meses,1, ',', '.');  
    $var = $ultimo - $penultimo;
    $color_var = 'green';
    if($var < 0){
       $color_var = 'red'; 
    }else{
       $color_var = 'green';
    }
    
    // Mediana
    
    sort($array_mediana_mts);
    
    $tamanio = count($array_mediana_mts);
    $mediana = $array_mediana_mts[$tamanio / 2];
    
    $fila.="<td class='num' style='background:white'; >$promedio</td>"; 
    $fila.="<td class='num' style='background:white'; >$mediana</td>";
    $fila.="<td class='num' style='background:white;color:$color_var;font-weight:bolder'> $var </td>";
    $fila.= "</tr>";
    $valor_compra.="</tr>";
    
    $T->Set( 'fila', $fila );
    $T->Set( 'fila_valor', $valor_compra );
      
    
    $T->Show('query0_data_row');
    echo "<tr class='espacio'> <td style='background:white;height:16px;'>&nbsp; </td> </tr>";
    
    //Actualize Old Values Variables
    $old['cli_fullname'] = $el['cli_fullname'];
    $old['ci'] = $el['ci'];
    $old['cat'] = $el['cat'];
    $firstRow=false;

}

function calculate_average($arr) {
    $count = count($arr); //total numbers in array
    foreach ($arr as $value) {
        $total = $total + $value; // total value of array numbers
    }
    $average = ($total/$count); // get average value
    return $average;
}


echo "<tr ><td colspan='2'>    </td> <td > <b>&nbsp;Totales Metros</b>    </td>";
$um = 0;
$pum = 0;
foreach ($array_totales as $mes => $valor) {
    $pum = $um;
    $um = $valor;
    echo "<td class='num' style='color:white;background:olive;font-weight:bolder;font-size:16px'> ".number_format(  $valor  ,1, ',', '.')."</td> ";
}

$dif_cant = $um - $pum;

$avc = calculate_average($array_totales);

sort($array_totales);

$mediana_total = $array_totales[count($array_totales)  / 2];

if($dif_cant < 0){
   echo "<td class='num' style='color:black;font-weight:bolder;font-size:16px;'> ".number_format(  $avc ,0, ',', '.')."</td> <td class='num' style='color:black;font-weight:bolder;font-size:16px;'> ".number_format(  $mediana_total ,0, ',', '.')."</td> <td class='num'   style='color:red;font-weight:bolder;font-size:16px;'>".number_format(  $dif_cant  ,0, ',', '.')."</td>   </tr>";
}else{
   echo "<td class='num' style='color:black;font-weight:bolder;font-size:16px;'>  ".number_format(  $avc  ,0, ',', '.')."  </td> <td class='num' style='color:black;font-weight:bolder;font-size:16px;'> ".number_format(  $mediana_total ,0, ',', '.')."</td> <td class='num' style='color:green;font-weight:bolder;font-size:16px;'>".number_format(  $dif_cant  ,0, ',', '.')."</td>   </tr>";
} 

//echo "<td class='num' style='color:green:font-weight:bolder;font-size:16px;'>".number_format(  $dif_cant  ,1, ',', '.')."</td> <td>    </td> </tr>";

echo "<tr><td colspan='2'>    </td> <td > <b>&nbsp;Totales Valores</b>    </td>";
$um = 0;
$pum = 0;
foreach ($array_valores as $mes => $valor) {
  $pum = $um;
  $um = $valor;    
  echo "<td class='num' style='color:white;background:black;font-weight:bolder;font-size:16px' > ".number_format(  $valor  ,0, ',', '.')."</td> ";
}

$avt = calculate_average($array_valores);

sort($array_valores); 
$mediana_valores = $array_valores[count($array_valores)  / 2];

$dif_val = $um - $pum;
if($dif_val < 0){
   echo "<td class='num' style='color:black;font-weight:bolder;font-size:16px;'> ".number_format(  $avt  ,0, ',', '.')."    </td> <td class='num' style='color:black;font-weight:bolder;font-size:16px;'> ".number_format(  $mediana_valores  ,0, ',', '.')."    </td><td class='num'   style='color:red;font-weight:bolder;font-size:16px;'>".number_format(  $dif_val  ,0, ',', '.')."</td>  </tr>";
}else{
   echo "<td class='num' style='color:black;font-weight:bolder;font-size:16px;'> ".number_format(  $avt  ,0, ',', '.')." </td><td class='num' style='color:black;font-weight:bolder;font-size:16px;'> ".number_format(  $mediana_valores  ,0, ',', '.')."    </td><td class='num' style='color:green;font-weight:bolder;font-size:16px;'>".number_format(  $dif_val  ,0, ',', '.')."</td>   </tr>";
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

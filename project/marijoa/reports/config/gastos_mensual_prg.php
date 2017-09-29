<?php
header('Content-Type: text/html; charset=iso-8859-1');
/** Report prg file (gastos_mensual) 
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
$T->Set( 'sup_busc_conc', '%');
$T->Set( 'sup_con', '%');
$T->Set( 'sup_sub', '3-10');
$T->Set( 'sup_sub_form', '3-10');
$T->Set( 'sup_desde', '2014-01-04');
$T->Set( 'sup_hasta', '2014-01-04');
$T->Set( 'sup_local', '%');
$T->Set( 'sup_user', '');
$T->Set( 'sup_conp', '');
$T->Set( 'sup_detallado', 'Si');
$T->Set( 'sup_compl_tot', 'No');
$T->Set( 'sup_gen', '');
$T->Set( 'sup_gen_agrup', '');
$T->Set( 'sup_gen_apg', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select 1";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$desde = $sup['desde'];
$hasta = $sup['hasta'];
$data_ini = substr($sup['desde'], 8, 2) . '-' . substr($sup['desde'], 5, 2) . '-' . substr($sup['desde'], 0, 4);
$data_fin = substr($sup['hasta'], 8, 2) . '-' . substr($sup['hasta'], 5, 2) . '-' . substr($sup['hasta'], 0, 4);
$T->Set('desde', $data_ini);
$T->Set('hasta', $data_fin);


$suc = $sup['local'];

$db = new Y_DB();
$db->Database = 'marijoa';

$dbg = new Y_DB();
$dbg->Database = 'marijoa';

$dbs = new Y_DB();
$dbs->Database = 'marijoa';

// Obtengo todos los meses

$db->Query("SET lc_time_names = 'es_AR'");

$db->Query("SELECT DISTINCT  date_format(fact_fecha,'%m-%Y') as meses,date_format(fact_fecha,'%M-%y') as meses_nom  FROM factura WHERE fact_fecha BETWEEN '$desde' AND '$hasta'");

$array_meses = array();
$totales = array();

while( $db->NextRecord() ){
    $mes = $db->Record['meses'];
    $nmes = $db->Record['meses_nom'];
    $array_meses[$mes] = $nmes; 
    $totales[$mes] = 0;  
}


$dbg->Query("SELECT cjc_cod AS codigo, cjc_descri AS descrip FROM caja_con WHERE cjc_cod NOT LIKE '%-%' AND cjc_gasto LIKE 'Si' ORDER BY cjc_descri ASC"); 

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header


while( $dbg->NextRecord() ){
    $codigo = $dbg->Record['codigo'];
    $descrip = $dbg->Record['descrip']; 
    
    echo "<tr><td style='padding-left: 8px;height:36px; font-weight: bolder; vertical-align: bottom;background:rgb(255,255,230)' colspan='30'>$codigo - $descrip</td></tr>";

        $i = 0;
        echo '<tr> <td  style="width:280px;background:rgb(255,255,230)">&nbsp;.</td>';
        foreach ($array_meses as $mes => $nombre_mes) {
            $T->Set('mes', $nombre_mes);
            $T->Show('mes');
            $i++;
            if($i % 2){
              $T->Set('fondo', "#CACAFF"); 
            }else{
              $T->Set('fondo', "white");  
            } 
        }        
        echo '</tr>';
        
       
        $db->Query("SELECT  DISTINCT c.cjc_cod AS SCOD, c.cjc_descri AS SCONCEPTO  FROM caja_con c, gastos g 
        WHERE c.cjc_cod = g.g_con AND  c.cjc_cod LIKE '$codigo-%' AND  g.g_fecha BETWEEN '$desde'  AND '$hasta' AND g.g_empr LIKE '$suc' ");
        
     
        // Pongo en 0 los totalizadores
                foreach ($array_meses as $mes => $nombre_mes) {
                   $totales[$mes] = 0;
                } 
        // Por cada Sub Codigo recorrer todos los meses e imprimir
        while( $db->NextRecord() ){
            $sub_codigo = $db->Record['SCOD'];
            $sub_descrip = $db->Record['SCONCEPTO'];
            echo "<tr><td class='item' >&nbsp;&nbsp;$sub_codigo-$sub_descrip</td>";   
                   
                foreach ($array_meses as $mes => $nombre_mes) {
                list($m,$Y) = split('[-]', $mes);
                

                $dbs->Query("SELECT  sum(g.g_monto) AS MONTO FROM caja_con c, gastos g 
                WHERE c.cjc_cod = g.g_con AND  c.cjc_cod = '$sub_codigo' AND  g.g_fecha LIKE '$Y-$m-%' AND g.g_empr LIKE '$suc';");
                    if($dbs->NumRows()>0){
                        $dbs->NextRecord();
                        $MONTO = $dbs->Record['MONTO']; 
                        $monto_format = number_format($MONTO,2,',','.');
                        echo "<td title='$m-$Y' class='num'>$monto_format</td>"; 
                        $total_mes = $totales[$mes];
                        $total_mes+=0+$MONTO;
                        $totales[$mes] = $total_mes;
                    }  
                } 
            echo '</tr>';
            
          }
          // Imprimo los totales
          echo "<tr><th>Totales</th>"; 
          foreach ($array_meses as $mes => $nombre_mes) { 
                 $total_mes = number_format($totales[$mes] ,2,',','.'); 
                 echo "<td class='num' style='font-weight:bolder'>$total_mes</td>";
          } 
          echo '</tr>';
         
        
        
 }        

//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables


//Define a Old Values Variables
$old['1'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['1'] = $Q0->Record['1'];

    // Preparing a template variables
    $T->Set('query0_1', $el['1']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['1'] = $el['1'];
    $firstRow=false;

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

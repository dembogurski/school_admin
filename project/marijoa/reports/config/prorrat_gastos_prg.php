<?php

/** Report prg file (prorrat_gastos) 
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
$T->Set( 'sup_suc', '%');
$T->Set( 'sup_desde', '2012-05-14');
$T->Set( 'sup_hasta', '2012-12-14');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_emp_bus', '');
$T->Set( 'sup_emp_cta_cont', '');
$T->Set( 'sup_gen_mayor', '');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_as_huerfanos', '');
$T->Set( 'sup_as_sumas', '');
$T->Set( 'sup_nivel', '%');
$T->Set( 'sup_cod', '%');
$T->Set( 'sup_as_balance', '');
$T->Set( 'sup_rep_prorateo', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT fact_localidad AS SUC,sum(df_subtotal)  AS TOTAL FROM factura f, det_factura d WHERE f.fact_nro = d.df_fact_num AND f.fact_fecha BETWEEN '2012-05-14' AND '2012-12-14' AND  f.fact_estado = "Cerrada" GROUP BY SUC ASC";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$db = new Y_DB();
$db->Database = $Global['project']; 

$desde = $sup['desde'];
$hasta = $sup['hasta'];

 

$empr = $sup['empr'];

$T->Set( 'suc_gasto', $empr );

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
$subtotal0_TOTAL = 0;

$array = array();
$array_porc = array();

//Define a Old Values Variables
$old['SUC'] = '';
$old['TOTAL'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['SUC'] = $Q0->Record['SUC'];
    $el['TOTAL'] = $Q0->Record['TOTAL'];
    
    

    // Preparing a template variables
    
    $suc = $el['SUC'];
    $valor =   $el['TOTAL'] ;
    
    $array[$suc]=$valor;
    

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_TOTAL += 0 + $el['TOTAL'];

     
    //Actualize Old Values Variables
    $old['SUC'] = $el['SUC'];
    $old['TOTAL'] = $el['TOTAL'];
    $firstRow=false;

}

foreach ($array as $suc=>$value) {
    
    $T->Set('query0_SUC', $suc);
    $T->Set('query0_TOTAL', number_format($value,2,',','.'));  
    
    $porc =  $value  * 100  / $subtotal0_TOTAL;
    $array_porc[$suc]= $porc;
    
    $T->Set('porc_title', $porc);
    $T->Set('porc', number_format($porc,1,',','.'));
    $T->Show('query0_data_row');
}


$endConsult = true;
if( $endConsult ){
    $T->Set('subtotal0_TOTAL', number_format($subtotal0_TOTAL,2,',','.'));
     $T->Show('query0_subtotal_row');
}

$T->Show('end_query0');				// Ends a Table 

$db->Query("SELECT  g_con AS COD, g_con_n AS CONCEPTO, c.cjc_cta_cont AS CODIGO, p.c_descrip  AS CUENTA,  sum(g_monto) AS TOTAL 
FROM gastos g, caja_con c, plan_cuentas p WHERE g.g_con = c.cjc_cod AND c.cjc_cta_cont = p.c_cod AND  g_empr LIKE '$empr' 
AND g_fecha BETWEEN '$desde' AND '$hasta' and p.c_cod not like '1%'
GROUP BY CODIGO ASC");

$head = '';
foreach ($array as $suc=>$value) {
   $head = $head." <th>$suc</th>";    
    echo '<script> sucs.push("'.$suc.'"); </script>';
}
$T->Set('gheader', $head);
$T->Show('gastos_h');


while ($db->NextRecord()){
  $codigo = $db->Record['CODIGO'];
  $cuenta = $db->Record['CUENTA'];
  $valor = $db->Record['TOTAL'];
  $codigo_rem = str_replace(".","_",$codigo);
  
  $T->Set('codigo', $codigo);
  $T->Set('codigo_rem',$codigo_rem);
  $T->Set('cuenta', $cuenta);
  $T->Set('valor', number_format($valor,0,',','.'));
  
  
  $td = '';
  
  foreach ($array_porc as $suc=>$porcentaje) {
     $s_code = $suc.'_'.$codigo_rem;  
     $porc_prorat = $valor * $porcentaje / 100; 
     $td= $td."<td class='num' id='$s_code' >".number_format($porc_prorat,0,',','.')."</td>";    
  }
   
  
  $T->Set('data', $td);
  $T->Show('gastos'); 
  
}

$T->Show('gastos_f');
?>

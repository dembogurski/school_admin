<?php

/** Report prg file (rep_stad_cortes) 
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
$T->Set( 'sup_rep_localidad', '01');
$T->Set( 'sup_desde', '2012-01-01');
$T->Set( 'sup_hasta', '2012-04-10');
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
$T->Set( 'sup_desdeinv', '2012-01-01');
$T->Set( 'sup_hastainv', '2012-04-10');
$T->Set( 'sup_rep_stad_corte', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT  df.df_cantidad AS CORTE, COUNT(*) AS REPETICIONES,df.df_cantidad * COUNT(*) AS MULT    FROM factura f, det_factura df, mnt_prod p WHERE p.p_cod = df_cod_prod AND f.fact_nro = df.df_fact_num AND f.fact_localidad LIKE '01' AND    p.p_fam LIKE '%' AND p.p_grupo LIKE  '%' AND p.p_tipo LIKE '%' AND p.p_comp LIKE  '%' AND p.p_temp LIKE '%'   AND p.p_estruc LIKE '%'AND p.p_clasif LIKE '%' AND p.p_color LIKE '%' AND p.p_lisoest LIKE '%'    AND f.fact_fecha BETWEEN '2012-01-01' AND '2012-04-10' GROUP BY df.df_cantidad HAVING COUNT(*) > 1 ORDER BY REPETICIONES DESC";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);
$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

$cat = $sup['cli_cat'];

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

//Define a Subtotal Variables
$subtotal0_CORTE = 0;
$subtotal0_REPETICIONES = 0;
$subtotal0_MULT = 0;


//Define a Old Values Variables
$old['CORTE'] = '';
$old['REPETICIONES'] = '';
$old['MULT'] = '';

$contador = 0;

$media = 0;
$mediana = 0;
$moda = 0;


// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CORTE'] = $Q0->Record['CORTE'];
    $el['REPETICIONES'] = $Q0->Record['REPETICIONES'];
    $el['MULT'] = $Q0->Record['MULT'];

    if($firstRow){
        $moda =  $el['CORTE'];
    }

    // Preparing a template variables
    $T->Set('query0_CORTE', number_format($el['CORTE'],2,',','.'));
    $T->Set('query0_REPETICIONES', number_format($el['REPETICIONES'],0,',','.'));
    $T->Set('query0_MULT', number_format($el['MULT'],2,',','.'));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CORTE += 0 + $el['CORTE'];
    $subtotal0_REPETICIONES += 0 + $el['REPETICIONES'];
    $subtotal0_MULT += 0 + $el['MULT'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CORTE', number_format($subtotal0_CORTE,0,',','.'));
    $T->Set('subtotal0_REPETICIONES', number_format($subtotal0_REPETICIONES,0,',','.'));
    $T->Set('subtotal0_MULT', number_format($subtotal0_MULT,0,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CORTE = 0;
        $subtotal0_REPETICIONES = 0;
        $subtotal0_MULT = 0;
    }
    
    //Actualize Old Values Variables
    $old['CORTE'] = $el['CORTE'];
    $old['REPETICIONES'] = $el['REPETICIONES'];
    $old['MULT'] = $el['MULT'];
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

$suc = $sup['rep_localidad'];
$fam = $sup['p_fam'];
$grupo = $sup['p_grupo'];
$tipo = $sup['p_tipo'];
$comp =  $sup['p_comp'];
$temp = $sup['p_temp'];
$estruc = $sup['p_estruc'];
$clasif= $sup['p_clasif'];
$color = $sup['p_color'];
$lisoest= $sup['p_lisoest'];
$desde = $sup['desdeinv'];
$hasta = $sup['hastainv'];
 
$db->Query("SELECT SUM(df.df_cantidad) AS SUMA , COUNT(*) AS CANT, SUM(df.df_cantidad) / COUNT(*)  AS MEDIA    FROM factura f, det_factura df, mnt_prod p WHERE p.p_cod = df_cod_prod AND f.fact_nro = df.df_fact_num AND f.fact_localidad LIKE '$suc'  and f.fact_cli_cat like '$cat' and  p.p_fam LIKE '$fam' AND p.p_grupo LIKE  '$grupo' AND p.p_tipo LIKE '$tipo' AND p.p_comp LIKE  '$comp' AND p.p_temp LIKE '$temp'   AND p.p_estruc LIKE '$estruc' AND p.p_clasif LIKE '$clasif' AND p.p_color LIKE '$color' AND p.p_lisoest LIKE '$lisoest' AND f.fact_fecha BETWEEN '$desde' AND '$hasta'");

$db->NextRecord();

$media = $db->Record['MEDIA'];
$cantidad = $db->Record['CANT'];
$medio =  $cantidad / 2;


$db->Query("SELECT  df.df_cantidad AS CORTE  FROM factura f, det_factura df, mnt_prod p WHERE p.p_cod = df_cod_prod AND f.fact_nro = df.df_fact_num AND f.fact_localidad LIKE '$suc' and f.fact_cli_cat like '$cat' AND    p.p_fam LIKE '$fam' AND p.p_grupo LIKE  '$grupo' AND p.p_tipo LIKE '$tipo' AND p.p_comp LIKE  '$comp' AND p.p_temp LIKE '$temp'   AND p.p_estruc LIKE '$estruc' AND p.p_clasif LIKE '$clasif' AND p.p_color LIKE '$color' AND p.p_lisoest LIKE '$lisoest' AND f.fact_fecha BETWEEN '$desde' AND '$hasta' ORDER BY df.df_cantidad asc");

$cont = 0;
//$medio = $db->NumRows() / 2;
 
while($db->NextRecord()){
  $mediana = $db->Record['CORTE'];
  if($cont >= $medio ){
      break;
  }

  $cont++;
}

$T->Set('moda', number_format($moda,2,',','.'));
$T->Set('media', number_format($media,2,',','.'));
$T->Set('mediana', number_format($mediana,2,',','.'));


$T->Set('cont', number_format($cont,2,',','.'));

$T->Show('end_query0');				// Ends a Table 

?>

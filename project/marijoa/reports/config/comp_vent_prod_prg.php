<?php

/** Report prg file (comp_vent_prod) 
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
$T->Set( 'sup_aut_lock', 'true');
$T->Set( 'sup_rep_localidad', '01');
$T->Set( 'sup_busc', '%');
$T->Set( 'sup_rep_cli', '%');
$T->Set( 'sup_cli_cat', '%');
$T->Set( 'sup_msg01', 'Primer Periodo');
$T->Set( 'sup_desde', '2012-02-01');
$T->Set( 'sup_hasta', '2012-02-15');
$T->Set( 'sup_msg02', 'Segundo Periodo');
$T->Set( 'sup_desde2', '');
$T->Set( 'sup_hasta2', '2012-08-15');
$T->Set( 'sup_msg2', 'Filtre aqui los datos del Producto!!!');
$T->Set( 'sup_p_fam', '%');
$T->Set( 'sup_p_grupo', '%');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_guia_tipo', '%');
$T->Set( 'sup_p_clasif', '%');
$T->Set( 'sup_p_temp', '%');
$T->Set( 'sup_p_estruc', '%');
$T->Set( 'sup_ver_rep', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//
$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$desde = $sup['desde'];
$hasta = $sup['hasta'];
$desde2 = $sup['desde2'];
$hasta2 = $sup['hasta2'];
$suc = $sup['rep_localidad'];
$neg_pos = $sup['neg_pos'];


$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4); 
$data_ini2 = substr($sup['desde2'],8,2).'-'.substr($sup['desde2'],5,2).'-'.substr($sup['desde2'],0,4);
$data_fin2 = substr($sup['hasta2'],8,2).'-'.substr($sup['hasta2'],5,2).'-'.substr($sup['hasta2'],0,4);

$cli = $sup['rep_cli'];
$cat = $sup['cli_cat'];
$fam = $sup['p_fam'];
$grupo = $sup['p_grupo'];
$tipo = $sup['guia_tipo'];
$estruc = $sup['p_estruc'];
$clasif = $sup['p_clasif'];
$temp = $sup['p_temp'];


$query0 = "SELECT f.fact_cli_cat AS CAT, p.p_fam AS FAM, p.p_grupo AS GRUPO, p.p_tipo AS TIPO,  SUM(d.df_cantidad) AS CANT, SUM(d.df_subtotal) AS VALOR FROM factura f, det_factura d, mnt_prod p
WHERE f.fact_nro = d.df_fact_num AND d.df_cod_prod = p.p_cod AND f.fact_fecha BETWEEN '$desde' AND '$hasta' 
AND p.p_fam LIKE '$fam' AND p.p_grupo LIKE '$grupo' AND p.p_tipo LIKE '$tipo' AND p.p_clasif LIKE '$clasif' AND p.p_temp LIKE '$temp' AND  p.p_estruc LIKE '$estruc'AND f.fact_estado = 'Cerrada' 
AND f.fact_localidad LIKE '$suc' AND f.fact_cli_ci LIKE '$cli'  AND f.fact_cli_cat LIKE '$cat' GROUP BY  CAT, FAM, GRUPO, TIPO   ORDER BY CAT ASC, CANT DESC";



$T->Set('desde2',$data_ini);
$T->Set('hasta2',$data_fin);
$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);


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


//Define a Old Values Variables
$old['CAT'] = '';
$old['FAM'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['CANT'] = '';
$old['VALOR'] = '';

$array = array(); 

while( $Q0->NextRecord() ){

    // Define a elements
    $el['CAT'] = $Q0->Record['CAT'];
    $el['FAM'] = $Q0->Record['FAM'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['CANT'] = $Q0->Record['CANT'];
    $el['VALOR'] = $Q0->Record['VALOR'];
    
    $md5 = md5($el['CAT'].$el['FAM'].$el['GRUPO'].$el['TIPO']);
    
    $datos = array();
    array_push($datos,$el['CAT']);
    array_push($datos,$el['FAM']);
    array_push($datos,$el['GRUPO']);
    array_push($datos,$el['TIPO']);
    array_push($datos,$el['CANT']);
    array_push($datos,$el['VALOR']);
    array_push($datos,0);
    array_push($datos,0);
     
    $array[$md5]=$datos; 
   
    $old['CAT'] = $el['CAT'];
    $old['FAM'] = $el['FAM'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['CANT'] = $el['CANT'];
    $old['VALOR'] = $el['VALOR']; 
}

$endConsult = true;

// Segundo Periodo

$query0 = "SELECT f.fact_cli_cat AS CAT, p.p_fam AS FAM, p.p_grupo AS GRUPO, p.p_tipo AS TIPO,  SUM(d.df_cantidad) AS CANT, SUM(d.df_subtotal) AS VALOR FROM factura f, det_factura d, mnt_prod p
WHERE f.fact_nro = d.df_fact_num AND d.df_cod_prod = p.p_cod AND f.fact_fecha BETWEEN '$desde2' AND '$hasta2' 
AND p.p_fam LIKE '$fam' AND p.p_grupo LIKE '$grupo' AND p.p_tipo LIKE '$tipo' AND p.p_clasif LIKE '$clasif' AND p.p_temp LIKE '$temp' AND  p.p_estruc LIKE '$estruc'AND f.fact_estado = 'Cerrada' 
AND f.fact_localidad LIKE '$suc' AND f.fact_cli_ci LIKE '$cli'  AND f.fact_cli_cat LIKE '$cat' GROUP BY  CAT, FAM, GRUPO, TIPO   ORDER BY CAT ASC, CANT DESC";

$Q0->Query( $query0 );
$old['CAT'] = '';
$old['FAM'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['CANT'] = '';
$old['VALOR'] = '';
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CAT'] = $Q0->Record['CAT'];
    $el['FAM'] = $Q0->Record['FAM'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['CANT'] = $Q0->Record['CANT'];
    $el['VALOR'] = $Q0->Record['VALOR'];
    
    $md5 = md5($el['CAT'].$el['FAM'].$el['GRUPO'].$el['TIPO']);
    
    $datos= $array[$md5];
    
    if($datos[0] == ""){
       $datos = array();
       array_push($datos,$el['CAT']);
       array_push($datos,$el['FAM']);
       array_push($datos,$el['GRUPO']);
       array_push($datos,$el['TIPO']);
       array_push($datos,0);
       array_push($datos,0);
       array_push($datos,$el['CANT']);
       array_push($datos,$el['VALOR']);       
       $array[$md5]=$datos;  
    }else{
      $datos[6]=$el['CANT'];
      $datos[7]=$el['VALOR'];
      $array[$md5]=$datos; 
    } 
        
    $old['CAT'] = $el['CAT'];
    $old['FAM'] = $el['FAM'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['CANT'] = $el['CANT'];
    $old['VALOR'] = $el['VALOR'];
    $firstRow=false;

}

$Z_DIFF_CANT = 0;
$Z_DIFF_VAL = 0;

$i = 0;
foreach ($array as $key => $value) {
    
    $cat = $value[0];
    $fam = $value[1];
    $grupo = $value[2];
    $tipo = $value[3];
    $cant0 = $value[4];
    $val0 = $value[5];
    $cant1 = $value[6];
    $val1 = $value[7];
    
    $CA_CB =  $cant1 - $cant0;
    $VA_VB =  $val1 - $val0;
    
    if($neg_pos == "Todos"){
      $Z_DIFF_CANT += 0 + $CA_CB;
      $Z_DIFF_VAL += 0 +$VA_VB;
    }else if($neg_pos == "Positivos"){
        if($VA_VB > 0){
            $Z_DIFF_CANT += 0 + $CA_CB;
            $Z_DIFF_VAL += 0 +$VA_VB;
        }
    }else{
        if($VA_VB < 0){
            $Z_DIFF_CANT += 0 + $CA_CB;
            $Z_DIFF_VAL += 0 +$VA_VB;
        }
    }     
    
    if($CA_CB > 0){
       $T->Set('fluct_cant', 'alsa.png'); 
    }else if($CA_CB < 0 ){
       $T->Set('fluct_cant', 'baja.png');   
    }else{
       $T->Set('fluct_cant', 'equal.png');    
    }
    if($VA_VB > 0){
       $T->Set('fluct_val', 'alsa.png'); 
    }else if($VA_VB < 0 ){
       $T->Set('fluct_val', 'baja.png');   
    }else{
       $T->Set('fluct_val', 'equal.png');    
    }
    
    $T->Set('id', $i);
    $T->Set('cla',$clasif);
    $T->Set('temp',$temp);
    $T->Set('estruc',$estruc);
    $T->Set('desde',$desde);
    $T->Set('hasta',$hasta);
    $T->Set('cat',$cat);
    $T->Set('suc',$suc); 
    $T->Set('href',"javascript:verClientes('".$i."','".$fam."','".$grupo."','".$tipo."','".$clasif."','".$temp."','".$estruc."','".$desde."','".$hasta."','".$suc."','".$cat."','".$desde2."','".$hasta2."')"); 
    
    $T->Set('query0_CAT', $cat);
    $T->Set('query0_FAM', $fam);
    $T->Set('query0_GRUPO',$grupo);
    $T->Set('query0_TIPO', $tipo);
    $T->Set('query0_CANT',  number_format($cant0,0,',','.'));  
    $T->Set('query0_VALOR', number_format($val0,0,',','.'));  
    $T->Set('query0_CANT1', number_format($cant1,0,',','.'));  
    $T->Set('query0_VALOR1',number_format($val1,0,',','.'));  
    
    $T->Set('CA_CB',number_format($CA_CB,0,',','.'));  
    $T->Set('VA_VB',number_format($VA_VB,0,',','.'));  
    
    if($neg_pos == "Todos"){
        $T->Show('query0_data_row');
    }else if($neg_pos == "Positivos"){
        if($VA_VB > 0){
           $T->Show('query0_data_row');
        }
    }else{
        if($VA_VB < 0){
           $T->Show('query0_data_row');
        }
    }
    
    $i++;
}
$T->Set('Z_DIFF_CANT',  number_format($Z_DIFF_CANT,0,',','.'));  
$T->Set('Z_DIFF_VAL',  number_format($Z_DIFF_VAL,0,',','.'));  
$T->Show('query0_total_row');
$T->Show('end_query0');				

?>

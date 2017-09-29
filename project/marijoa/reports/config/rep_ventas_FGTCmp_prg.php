<?php

/** Report prg file (rep_ventas_F) 
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
$T->Set( 'sup_msg', 'Seleccione el tipo de reporte que desea! El simbolo % indica No mostrar, El %% indica mostrar todos!!!');
$T->Set( 'sup_aut_lock', 'true');
$T->Set( 'sup_rep_localidad', '%');
$T->Set( 'sup_busc', '%');
$T->Set( 'sup_rep_cli', '%');
$T->Set( 'sup_moneda', '%');
$T->Set( 'sup_cli_cat', '%');
$T->Set( 'sup_desde', '2012-03-02');
$T->Set( 'sup_hasta', '2012-11-02');
$T->Set( 'sup_msg2', 'Filtre aqui los datos del Producto!!!');
$T->Set( 'sup_p_fam', '%');
$T->Set( 'sup_p_grupo', '%');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_guia_tipo', '1 Y 1/2 C/ 1 FUNDA');
$T->Set( 'sup_p_clasif', '%');
$T->Set( 'sup_p_temp', '%');
$T->Set( 'sup_p_estruc', '%');
$T->Set( 'sup_p_color', '%');
$T->Set( 'sup___term', '%');
$T->Set( 'sup_detallado', 'Resumido');
$T->Set( 'sup_desdeinv', '2012-03-02');
$T->Set( 'sup_hastainv', '2012-11-02');
$T->Set( 'sup_rep_ventasF', '');
$T->Set( 'sup_rep_ventasFG', '');
$T->Set( 'sup_rep_ventas', '');
$T->Set( 'sup_rep_ventasT', '');
$T->Set( 'sup_rep_ventasFT', '');
$T->Set( 'sup_rep_ventasTCG', '');
$T->Set( 'sup_rep_ventasTFG', '');
$T->Set( 'sup_rep_ventasTEG', '');
$T->Set( 'sup_rep_ventasTCLG', '');
$T->Set( 'sup_rep_ventasG', '');
$T->Set( 'sup_rep_ventasGT', '');
$T->Set( 'sup_limite', '0');
$T->Set( 'sup_rep_ventasGTC', '');
$T->Set( 'sup_rep_ventasFC', '');
$T->Set( 'sup_rep_ventasGET', '');
$T->Set( 'sup_rep_ventasGCT', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT  p.p_fam AS FAM ,  sum(d.df_cantidad) AS CANT,sum(d.df_subtotal) AS SUBTOTAL,sum((d.df_subtotal) - (p.p_compra * d.df_cantidad)) AS MARGEN   FROM factura f,det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num AND d.df_cod_prod = p.p_cod AND f.fact_localidad LIKE '%' AND f.fact_cli_ci LIKE '%' AND p.p_fam LIKE '%' AND p.p_grupo LIKE  '%' AND  p.p_tipo LIKE '%'  AND p.p_cod LIKE '%'  AND  f.fact_fecha BETWEEN '2012-03-02' AND '2012-11-02'  AND f. fact_estado = "Cerrada" AND f.fact_cli_cat LIKE '%' AND fact_moneda LIKE  '%' GROUP BY p.p_fam   ORDER BY p.p_fam  ,CANT DESC   ";

 
$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4); 
$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

$data_ini2 = substr($sup['desde2'],8,2).'-'.substr($sup['desde2'],5,2).'-'.substr($sup['desde2'],0,4);
$data_fin2 = substr($sup['hasta2'],8,2).'-'.substr($sup['hasta2'],5,2).'-'.substr($sup['hasta2'],0,4); 
$T->Set('desde2',$data_ini2);
$T->Set('hasta2',$data_fin2);

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

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
$total0_CANT = 0;
$total0_SUBTOTAL = 0;
$total0_MARGEN = 0;

//Define a Subtotal Variables


//Define a Old Values Variables
$old['FAM'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['CANT'] = '';
$old['SUBTOTAL'] = '';
$old['MARGEN'] = '';

$master = array();

 

// Cargo la Primera parte del arreglo
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FAM'] = $Q0->Record['FAM'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['CANT'] = $Q0->Record['CANT'];
    $el['SUBTOTAL'] = $Q0->Record['SUBTOTAL'];
    $el['MARGEN'] = $Q0->Record['MARGEN'];
  
    
    $cod_fam = md5($el['FAM']."-".$el['GRUPO']."-".$el['TIPO']);
    
    $array = array($el['FAM']."-".$el['GRUPO']."-".$el['TIPO'],$el['CANT'],$el['SUBTOTAL'],$el['MARGEN'],0,0,0);
    $master[$cod_fam]=$array;
    
    
    // Calculating a total
    $total0_CANT += 0 + $el['CANT'];
    $total0_SUBTOTAL += 0 + $el['SUBTOTAL'];
    $total0_MARGEN += 0 + $el['MARGEN'];

    // Calculating a subtotal

    //$T->Show('query0_data_row');
    // Show Subtotal
    
    //Actualize Old Values Variables
    $old['FAM'] = $el['FAM'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['CANT'] = $el['CANT'];
    $old['SUBTOTAL'] = $el['SUBTOTAL'];
    $old['MARGEN'] = $el['MARGEN'];
    $firstRow=false;

}

$desde2 = $sup['desde2'];
$hasta2 = $sup['hasta2'];
$fam = $sup['p_fam'];
$grupo = $sup['p_grupo'];
$tipo = $sup['p_tipo'];
$suc = $sup['rep_localidad'];


$query = "SELECT  p.p_fam AS FAM ,p.p_grupo as GRUPO,p.p_tipo as TIPO,  sum(d.df_cantidad) AS CANT,sum(d.df_subtotal) AS SUBTOTAL,sum( (d.df_subtotal) - (((p.p_compra * -1 ) - (p.p_compra * p_porc_recargo / 100)) * -1 ) * d.df_cantidad) AS MARGEN 
FROM factura f,det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num AND d.df_cod_prod = p.p_cod AND f.fact_localidad LIKE 
'$suc' AND p.p_fam LIKE '$fam' and p_grupo like '$grupo' and p_tipo like '$tipo'  AND  f.fact_fecha BETWEEN '$desde2' AND '$hasta2'  
AND f. fact_estado = 'Cerrada' and df_cod_prod != '1002'  GROUP BY p.p_fam, p_grupo, p_tipo   ORDER BY SUBTOTAL DESC ,MARGEN DESC";


$Q0->Query( $query );

// Cargo la 2da parte del arreglo
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FAM'] = $Q0->Record['FAM'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['CANT'] = $Q0->Record['CANT'];
    $el['SUBTOTAL'] = $Q0->Record['SUBTOTAL'];
    $el['MARGEN'] = $Q0->Record['MARGEN'];
  
    $cod_fam = md5($el['FAM']."-".$el['GRUPO']."-".$el['TIPO']);
    $array = $master[$cod_fam];
        
    if($array == null){
        $array = array($el['FAM']."-".$el['GRUPO']."-".$el['TIPO'],0,0,0,$el['CANT'],$el['SUBTOTAL'],$el['MARGEN']);
        $master[$cod_fam]=$array; 
    }else{
      $array[4]= $el['CANT'];
      $array[5]= $el['SUBTOTAL'];
      $array[6]= $el['MARGEN'];
      $master[$cod_fam]=$array; 
    }
    
}    

$total_cant1 = 0;
$total_cant2 = 0;
$total_ventas1 = 0;
$total_ventas2 = 0;
$total_margen1 = 0;
$total_margen2 = 0;
$total_diff_cant = 0;
$total_diff_vent = 0;
$total_diff_marg = 0;

$total_porc_cant = 0;
$total_porc_ventas = 0;
$total_porc_margen = 0;

foreach ($master as $key => $array) {
    $familia = $array[0];
    $cant = $array[1];    $total_cant1+=$cant; 
    $subt = $array[2];    $total_ventas1+=$subt;
    $margen = $array[3];  $total_margen1+=$margen;
    
    $cant2 = $array[4];    $total_cant2+=$cant2;
    $subt2 = $array[5];    $total_ventas2+=$subt2;
    $margen2 = $array[6];  $total_margen2+=$margen2;
    
    list($sector, $grupo, $tipo) = split('-', $familia);

    $T->Set('query0_FAM', $sector);
    $T->Set('query0_GRUPO', $grupo);
    $T->Set('query0_TIPO', $tipo);
    
    $T->Set('query0_CANT', number_format($cant,2,',','.'));
    $T->Set('query0_SUBTOTAL', number_format($subt,2,',','.'));
    $T->Set('query0_MARGEN', number_format($margen,2,',','.'));
    
    $T->Set('query0_CANT2', number_format($cant2,2,',','.'));
    $T->Set('query0_SUBTOTAL2', number_format($subt2,2,',','.'));
    $T->Set('query0_MARGEN2', number_format($margen2,2,',','.'));
    
    $total_diff_cant+= $cant2 - $cant;
    $total_diff_vent+=$subt2-$subt;
    $total_diff_marg+=$margen2 - $margen;
    
    
    $diff_cant = number_format($cant2 - $cant,2,',','.');    
    $diff_subt = number_format($subt2 - $subt,2,',','.');
    $diff_marg = number_format($margen2 - $margen,2,',','.');
    
    $diff_cant2 =  $cant2 - $cant;
    $diff_subt2 =  $subt2 - $subt;
    $diff_marg2 =  $margen2 - $margen;
    
    $img = "<img src='images/alsa.png' >";
    if($diff_marg > 0){
       $img = "<img src='images/alsa.png' >";
    }else if( $diff_marg < 0 ) {
       $img = "<img src='images/baja.png' >"; 
    }else{
        $img = "<img src='images/equal.png' >";
    }    
    
    if($cant > 0){
       $porc_cant = number_format($diff_cant2 * 100 / $cant,1,',','.');
    }else{
       $porc_cant = number_format(100,1,',','.');  
    }
    if($subt>0){
      $porc_subt = number_format($diff_subt2 * 100 / $subt,1,',','.');
    }else{
      $porc_subt = number_format(100,1,',','.');   
    }
    if($margen > 0){
      $porc_marg = number_format($diff_marg2 * 100 / $margen,1,',','.');
    }else{
       $porc_marg = number_format(100,1,',','.');
    }
    
    
    $T->Set('diff_cant', "$diff_cant" );
    $T->Set('diff_subt', "$diff_subt" ); 
    $T->Set('diff_marg', "$diff_marg" );
    
    $T->Set('porc_diff_cant', "$porc_cant%" );
    $T->Set('porc_diff_subt', "$porc_subt%" ); 
    $T->Set('porc_diff_marg', "$porc_marg% &nbsp; $img " );
    
    $total_porc_cant  = number_format($total_diff_cant * 100 / $total_cant1,1,',','.');
    $total_porc_ventas = number_format($total_diff_vent * 100 / $total_ventas1 ,1,',','.');
    $total_porc_margen = number_format($total_diff_marg * 100 / $total_margen1 ,1,',','.');
    
    
  $T->Show('query0_data_row');
}


$T->Set('total_cant1', number_format($total_cant1,2,',','.'));
$T->Set('total_ventas1', number_format($total_ventas1,2,',','.'));

$T->Set('total_cant2', number_format($total_cant2,2,',','.'));
$T->Set('total_ventas2', number_format($total_ventas2,2,',','.'));

$T->Set('total_margen1', number_format($total_margen1,2,',','.'));
$T->Set('total_margen2', number_format($total_margen2,2,',','.'));

$T->Set('total_diff_cant', number_format($total_diff_cant,2,',','.'));
$T->Set('total_diff_vent', number_format($total_diff_vent,2,',','.'));
$T->Set('total_diff_marg', number_format($total_diff_marg,2,',','.'));

$T->Set('total_porc_cant', "$total_porc_cant%" );
$T->Set('total_porc_ventas', "$total_porc_ventas%" );
$T->Set('total_porc_margen', "$total_porc_margen%" );

$T->Show('query0_subtotal_row');
 
$T->Show('end_query0');				// Ends a Table 

?>

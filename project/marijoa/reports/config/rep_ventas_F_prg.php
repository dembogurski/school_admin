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



$desde = $sup['desde'];
$hasta = $sup['hasta'];  
$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4); 
$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);


//$query = "SELECT  p.p_fam AS FAM ,  sum(d.df_cantidad) AS CANT,sum(d.df_subtotal) AS SUBTOTAL,sum( (d.df_subtotal) - (((p.p_compra * -1 ) - (p.p_compra * p_porc_recargo / 100)) * -1 ) * d.df_cantidad) AS MARGEN   FROM factura f,det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num AND d.df_cod_prod = p.p_cod AND f.fact_localidad LIKE '+el['rep_localidad']+' AND f.fact_cli_ci LIKE '+el['rep_cli']+' AND p.p_fam LIKE '+el['p_fam']+' AND p.p_grupo LIKE  '+el['p_grupo']+' AND  p.p_tipo LIKE '+el['p_tipo']+'  AND p.p_cod LIKE '+el['__term']+'  AND  f.fact_fecha BETWEEN '+el['desdeinv']+' AND '+el['hastainv']+'  AND f. fact_estado = |{Cerrada}| AND f.fact_cli_cat LIKE '+el['cli_cat']+' AND fact_moneda LIKE  '+el['moneda']+' GROUP BY p.p_fam   ORDER BY SUBTOTAL DESC ,MARGEN DESC   '";




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
$old['CANT'] = '';
$old['SUBTOTAL'] = '';
$old['MARGEN'] = '';

$master = array();

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FAM'] = $Q0->Record['FAM'];
    $el['CANT'] = $Q0->Record['CANT'];
    $el['SUBTOTAL'] = $Q0->Record['SUBTOTAL'];
    $el['MARGEN'] = $Q0->Record['MARGEN'];

    $cod_fam = md5($el['FAM']);
    
    $array = array($el['FAM'],$el['CANT'],$el['SUBTOTAL'],$el['MARGEN'],0,0,0);
    $master[$cod_fam]=$array;

    // Preparing a template variables
    

    // Calculating a total
    $total0_CANT += 0 + $el['CANT'];
    $total0_SUBTOTAL += 0 + $el['SUBTOTAL'];
    $total0_MARGEN += 0 + $el['MARGEN'];

    // Calculating a subtotal

    
    // Show Subtotal
    
    //Actualize Old Values Variables
    $old['FAM'] = $el['FAM'];
    $old['CANT'] = $el['CANT'];
    $old['SUBTOTAL'] = $el['SUBTOTAL'];
    $old['MARGEN'] = $el['MARGEN'];
    $firstRow=false;

}

$endConsult = true;

foreach ($master as $key => $arr) {
    
    $fam = $arr[0];
    $cant = $arr[1];
    $subt = $arr[2];
    $margen = $arr[3];
    $porc_cant = $cant * 100 / $total0_CANT;
    $porc_subt = $subt * 100 / $total0_SUBTOTAL;
    $porc_margen = $margen * 100 / $total0_MARGEN;
    
    $T->Set('id', $key);
    
    echo "<input type='hidden' id='subt_$key' value='$subt'>";
    
    $T->Set('query0_FAM', $fam);
    $T->Set('query0_CANT', number_format($cant,2,',','.'));
    $T->Set('porc_CANT', number_format($porc_cant,1,',','.'));
    $T->Set('query0_SUBTOTAL', number_format($subt,2,',','.'));    
    $T->Set('porc_SUBTOTAL', number_format($porc_subt,1,',','.'));
    $T->Set('query0_MARGEN', number_format($margen,2,',','.'));
    $T->Set('porc_MARGEN', number_format($porc_margen,2,',','.'));
    
    $T->Show('query0_data_row');
}


// Show total
$T->Set('total0_CANT', number_format($total0_CANT,2,',','.'));
$T->Set('total0_SUBTOTAL', number_format($total0_SUBTOTAL,2,',','.'));
$T->Set('total0_MARGEN', number_format($total0_MARGEN,2,',','.'));
$total = number_format($total0_SUBTOTAL,2,'.','');
echo "<input type='hidden' id='total_ventas' value='$total'>";
if( endConsult ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

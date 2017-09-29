<?php

/** Report prg file (rep_ventas_FGT) 
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
  $T->Set( 'sup_rep_localidad', '01');
  $T->Set( 'sup_busc', '%');
  $T->Set( 'sup_rep_cli', '%');
  $T->Set( 'sup_moneda', '%');
  $T->Set( 'sup_cli_cat', '%');
  $T->Set( 'sup_desde', '2012-02-19');
  $T->Set( 'sup_hasta', '2012-02-22');
  $T->Set( 'sup_msg2', 'Filtre aqui los datos del Producto!!!');
  $T->Set( 'sup_p_fam', '%');
  $T->Set( 'sup_p_grupo', '%');
  $T->Set( 'sup_p_tipo', '%');
  $T->Set( 'sup_guia_tipo', 'A CUADROS DE 1.5');
  $T->Set( 'sup_p_clasif', '%');
  $T->Set( 'sup_p_temp', '%');
  $T->Set( 'sup_p_estruc', '%');
  $T->Set( 'sup_p_color', '');
  $T->Set( 'sup___term', '%');
  $T->Set( 'sup_detallado', 'Resumido');
  $T->Set( 'sup_desdeinv', '2012-02-19');
  $T->Set( 'sup_hastainv', '2012-02-22');
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
//$query0 = "SELECT  p.p_fam as FAM, p.p_grupo as GRUPO,p.p_tipo as TIPO,  SUM(d.df_cantidad) as CANT,SUM(d.df_subtotal) as SUBTOTAL,SUM((d.df_subtotal) - (p.p_compra * d.df_cantidad)) AS MARGEN   FROM factura f,det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num and d.df_cod_prod = p.p_cod and f.fact_localidad LIKE '01' and f.fact_cli_ci like '%' and p.p_fam like '%' and p.p_grupo like  '%' and  p.p_tipo like '%'  and p.p_cod like '%'  and  f.fact_fecha between '2012-02-19' and '2012-02-22'  and f. fact_estado = "Cerrada" and f.fact_cli_cat like '%' and fact_moneda like  '%' GROUP BY p.p_fam , p.p_grupo , p.p_tipo order by p.p_fam , p.p_grupo , p.p_tipo,CANT desc   ";

$T->Set('time', daytime());
$T->Set('user', $Global['username']);

$desde = $sup['desde'];
$hasta = $sup['hasta'];
$data_ini = substr($sup['desde'], 8, 2) . '-' . substr($sup['desde'], 5, 2) . '-' . substr($sup['desde'], 0, 4);
$data_fin = substr($sup['hasta'], 8, 2) . '-' . substr($sup['hasta'], 5, 2) . '-' . substr($sup['hasta'], 0, 4);
$T->Set('desde', $data_ini);
$T->Set('hasta', $data_fin);

$firstRow = true;
$Q0 = $DB;



$suc = $sup['rep_localidad'];
$cliente = $sup['rep_cli'];
$fam = $sup['p_fam'];
$grupo = $sup['p_grupo'];
$tipo = $sup['p_tipo'];
$term = $sup['__term'];
$moneda = $sup['moneda'];
$cat = $sup['cli_cat'];

$sector = $sup['sector'];



if($sector == 'Minorista'){
    $cat = '< 3';
}else if($sector == 'Mayorista'){
    $cat = '> 2';
}else{
    $cat = '> 0';
} 
 $T->Set('sector', $sector);


$query0 = "SELECT  p.p_fam as FAM, p.p_grupo as GRUPO,p.p_tipo as TIPO,  SUM(d.df_cantidad) as CANT, SUM( (((p.p_compra * -1 ) - (p.p_compra * p_porc_recargo / 100)) * -1 ) * df_cantidad) AS COSTO ,SUM(d.df_subtotal) as SUBTOTAL,sum( (d.df_subtotal) - (((p.p_compra * -1 ) - (p.p_compra * p_porc_recargo / 100)) * -1 ) * d.df_cantidad) AS MARGEN   
    FROM factura f,det_factura d, mnt_prod p 
    WHERE f.fact_nro = d.df_fact_num and d.df_cod_prod = p.p_cod and f.fact_localidad LIKE '$suc' and f.fact_cli_ci like '$cliente' and p.p_fam like '$fam' and p.p_grupo like  '$grupo' and  p.p_tipo like '$tipo' 
and p.p_cod like '$term'  and  f.fact_fecha between '$desde' and '$hasta'  and f. fact_estado = 'Cerrada' and f.fact_cli_cat $cat  and fact_moneda like  '$moneda' and df_cod_prod != '1002' GROUP BY p.p_fam , p.p_grupo , p.p_tipo order by p.p_fam , p.p_grupo ,SUBTOTAL desc   ";

$Q0->Query($query0);

if ($sup['detallado'] === 'Detallado') {
    $T->Set('tipo', 'Detallado');
} else {
    $T->Set('tipo', 'Resumido');
}

// Starting a HTML
$T->Show('general_header');   // Principal Header
$T->Show('start_query0');   // Start a Table 
$T->Show('header0');    // Show Header
//Define a  variable
$endConsult = false;
//Define a Total Variables
$total0_CANT = 0;
$total0_SUBTOTAL = 0;
$total0_MARGEN = 0;
$total0_COSTO = 0;

//Define a Subtotal Variables
$subtotal0_CANT = 0;
$subtotal0_SUBTOTAL = 0;
$subtotal0_MARGEN = 0;
$subtotal0_COSTO = 0;

$subtotal0_CANT_F = 0;
$subtotal0_SUBTOTAL_F = 0;
$subtotal0_MARGEN_F = 0;
$subtotal0_COSTO_F = 0;


//Define a Old Values Variables
$old['FAM'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['CANT'] = '';
$old['SUBTOTAL'] = '';
$old['MARGEN'] = '';
$old['COSTO'] = '';

$CONTADOR_FAMILIAS = 0;
$CONTADOR_GRUPOS = 0;
$CONTADOR_TIPOS = 0;


// Making a rows of consult
while ($Q0->NextRecord()) {

    // Define a elements
    $el['FAM'] = trim($Q0->Record['FAM']);
    $el['GRUPO'] = trim($Q0->Record['GRUPO']);
    $el['TIPO'] = trim($Q0->Record['TIPO']);
    $el['CANT'] = $Q0->Record['CANT'];
    $el['SUBTOTAL'] = $Q0->Record['SUBTOTAL'];
    $el['MARGEN'] = $Q0->Record['MARGEN'];
    $el['COSTO'] = $Q0->Record['COSTO'];
    
     
        $CONTADOR_TIPOS++;
    
     

    // Contador de Familias
    if ($el['FAM'] != $old['FAM'] && $old['FAM'] != '') {

        $CONTADOR_FAMILIAS++;
        $T->Set('cont_fam', number_format($CONTADOR_FAMILIAS, 0, ',', '.'));
        $T->Set('fondo_fam', 'greenyellow');
    } else {
        $T->Set('cont_fam', '');
        $T->Set('fondo_fam', '');
    }
    if ($el['GRUPO'] != $old['GRUPO'] && $old['GRUPO'] != '') {
        $CONTADOR_GRUPOS++;
        $T->Set('cant_grupos', number_format($CONTADOR_GRUPOS, 0, ',', '.'));
        //$CONTADOR_TIPOS =0;
    } else {
        $T->Set('cant_grupos', '');
    }

    if ($el['TIPO'] != $old['TIPO'] && $old['TIPO'] != '') {
        $T->Set('cantidades', "<b>Cant Grupos: &nbsp;$CONTADOR_GRUPOS&nbsp;&nbsp;&nbsp;Tipos&nbsp;$CONTADOR_TIPOS</b>"); 
        
    } else {
        $T->Set('cantidades', ""); 
    }
    


    if (($el['FAM'] != $old['FAM']) || ($el['GRUPO'] != $old['GRUPO'])) {

        $old_fam = $old['FAM'];
        $old_grupo = $old['GRUPO'];

        $T->Set('leyenda', "  $old_fam  &rarr;  $old_grupo   ");
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANT = 0;
        $subtotal0_SUBTOTAL = 0;
        $subtotal0_MARGEN = 0;
        $subtotal0_COSTO = 0;
        $CONTADOR_TIPOS =0;
    }

    if ($el['FAM'] != $old['FAM'] && $old['FAM'] != '') {
        $T->Set('familia', $old['FAM']);
        $T->Show('query0_total_fam');
        $subtotal0_CANT_F = 0;
        $subtotal0_SUBTOTAL_F = 0;
        $subtotal0_MARGEN_F = 0;
        $subtotal0_COSTO_F = 0;
        
        $CONTADOR_TIPOS =0;
        $CONTADOR_GRUPOS =0;
    }


    // Preparing a template variables
    $T->Set('query0_FAM', $el['FAM']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_CANT', number_format($el['CANT'], 2, ',', '.'));
    $T->Set('query0_SUBTOTAL', number_format($el['SUBTOTAL'], 2, ',', '.'));
    $T->Set('query0_MARGEN', number_format($el['MARGEN'], 2, ',', '.'));
    $T->Set('query0_COSTO', number_format($el['COSTO'], 2, ',', '.'));

    // Calculating a total
    $total0_CANT += 0 + $el['CANT'];
    $total0_SUBTOTAL += 0 + $el['SUBTOTAL'];
    $total0_MARGEN += 0 + $el['MARGEN'];
    $total0_COSTO += 0 + $el['COSTO'];

    // Calculating a subtotal
    $subtotal0_CANT += 0 + $el['CANT'];
    $subtotal0_SUBTOTAL += 0 + $el['SUBTOTAL'];
    $subtotal0_MARGEN += 0 + $el['MARGEN'];
    $subtotal0_COSTO += 0 + $el['COSTO'];


    $subtotal0_CANT_F += 0 + $el['CANT'];
    $subtotal0_SUBTOTAL_F += 0 + $el['SUBTOTAL'];
    $subtotal0_MARGEN_F += 0 + $el['MARGEN'];
    $subtotal0_COSTO_F += 0 + $el['COSTO'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANT', number_format($subtotal0_CANT, 2, ',', '.'));
    $T->Set('subtotal0_SUBTOTAL', number_format($subtotal0_SUBTOTAL, 2, ',', '.'));
    $T->Set('subtotal0_MARGEN', number_format($subtotal0_MARGEN, 2, ',', '.'));
    $T->Set('subtotal0_COSTO', number_format($subtotal0_COSTO, 2, ',', '.'));

    $T->Set('subtotal0_CANT_F', number_format($subtotal0_CANT_F, 2, ',', '.'));
    $T->Set('subtotal0_SUBTOTAL_F', number_format($subtotal0_SUBTOTAL_F, 2, ',', '.'));
    $T->Set('subtotal0_MARGEN_F', number_format($subtotal0_MARGEN_F, 2, ',', '.'));
    $T->Set('subtotal0_COSTO_F', number_format($subtotal0_COSTO_F, 2, ',', '.'));

    //Actualize Old Values Variables
    $old['FAM'] = $el['FAM'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['CANT'] = $el['CANT'];
    $old['SUBTOTAL'] = $el['SUBTOTAL'];
    $old['MARGEN'] = $el['MARGEN'];
    $old['COSTO'] = $el['COSTO'];
    $firstRow = false;
}
    $CONTADOR_TIPOS =0;
      

$CONTADOR_FAMILIAS++;
$CONTADOR_GRUPOS++;
$CONTADOR_TIPOS++;

$T->Set('cantidades', "<b>Cant Grupos: &nbsp;$CONTADOR_GRUPOS&nbsp;&nbsp;&nbsp;Tipos&nbsp;$CONTADOR_TIPOS</b>"); 

$T->Set('cont_fam', number_format($CONTADOR_FAMILIAS, 0, ',', '.'));
$T->Set('fondo_fam', 'greenyellow');
$T->Set('cant_grupos', number_format($CONTADOR_GRUPOS, 0, ',', '.'));



$endConsult = true;
if (($el['FAM'] != $old['FAM']) || ($el['GRUPO'] != $old['GRUPO'])) {
    $T->Show('query0_subtotal_row');
}
// Show total
$T->Set('total0_CANT', number_format($total0_CANT, 2, ',', '.'));
$T->Set('total0_SUBTOTAL', number_format($total0_SUBTOTAL, 2, ',', '.'));
$T->Set('total0_MARGEN', number_format($total0_MARGEN, 2, ',', '.'));
$T->Set('total0_COSTO', number_format($total0_COSTO, 2, ',', '.'));

if (endConsult) {
    $T->Show('query0_subtotal_row');
    $T->Show('query0_total_fam');
    $T->Show('query0_total_row');
}
$T->Show('end_query0');    // Ends a Table 
?>

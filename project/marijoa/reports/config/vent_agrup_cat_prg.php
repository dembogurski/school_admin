<?php

/** Report prg file (vent_agrup_cat) 
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
$T->Set( 'sup_busc', '');
$T->Set( 'sup_rep_cli', '');
$T->Set( 'sup_moneda', '%');
$T->Set( 'sup_cli_cat', '%');
$T->Set( 'sup_desde', '2012-05-01');
$T->Set( 'sup_hasta', '2012-05-31');
$T->Set( 'sup_desde2', '');
$T->Set( 'sup_hasta2', '');
$T->Set( 'sup_msg2', 'Filtre aqui los datos del Producto!!!');
$T->Set( 'sup_p_fam', '');
$T->Set( 'sup_comp', 'No');
$T->Set( 'sup_rep_ventasFComp', '');
$T->Set( 'sup_p_grupo', '');
$T->Set( 'sup_p_tipo', '');
$T->Set( 'sup_guia_tipo', '');
$T->Set( 'sup_p_clasif', '');
$T->Set( 'sup_p_temp', '');
$T->Set( 'sup_p_estruc', '');
$T->Set( 'sup_p_color', '');
$T->Set( 'sup___term', '%');
$T->Set( 'sup_detallado', 'Resumido');
$T->Set( 'sup_desdeinv', '2012-05-01');
$T->Set( 'sup_hastainv', '2012-05-31');
$T->Set( 'sup_rep_ventasF', '');
$T->Set( 'sup_rep_ventasFMinMay', '');
$T->Set( 'sup_rep_ventMinMayAgr', '');
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
//$query0 = "SELECT  f.fact_localidad AS SUC, f.fact_cli_cat AS CAT  ,sum(d.df_cantidad) AS METROS,sum(d.df_subtotal) AS VENTAS,round( sum(  (((p.p_compra * -1 ) - (p.p_compra * p_porc_recargo / 100)) * -1 ) * d.df_cantidad),2) AS COSTO,round( sum( (d.df_subtotal) - (((p.p_compra * -1 ) - (p.p_compra * p_porc_recargo / 100)) * -1 ) * d.df_cantidad),2) AS MARGEN   FROM factura f,det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num AND d.df_cod_prod = p.p_cod AND f.fact_localidad LIKE '%'  AND f.fact_fecha BETWEEN '2012-05-01' AND '2012-05-31'  AND f. fact_estado = "Cerrada"  GROUP BY SUC,CAT ORDER BY SUC ASC ,CAT ASC, MARGEN DESC";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);

$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

$T->Set( 'porc', "100%" );

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
$subtotal0_METROS = 0;
$subtotal0_VENTAS = 0;
$subtotal0_COSTO = 0;
$subtotal0_MARGEN = 0;


//Define a Old Values Variables
$old['SUC'] = '';
$old['CAT'] = '';
$old['METROS'] = '';
$old['VENTAS'] = '';
$old['COSTO'] = '';
$old['MARGEN'] = '';



// Consulta de subtotales
$desde  = $sup['desde'];
$hasta  = $sup['hasta'];
$sucursal  = $sup['rep_localidad'];


$db->Query("SELECT  f.fact_localidad AS SUC ,sum(d.df_cantidad) AS METROS,sum(d.df_subtotal) AS VENTAS,round( sum(  (((p.p_compra * -1 ) - (p.p_compra * p_porc_recargo / 100)) * -1 ) * d.df_cantidad),2) AS COSTO,
round( sum( (d.df_subtotal) - (((p.p_compra * -1 ) - (p.p_compra * p_porc_recargo / 100)) * -1 ) * d.df_cantidad),2) AS MARGEN  
FROM factura f,det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num AND d.df_cod_prod = p.p_cod AND f.fact_localidad LIKE '$sucursal'  AND f.fact_fecha 
BETWEEN '$desde' AND '$hasta'  AND f. fact_estado = 'Cerrada' and d.df_cod_prod <> '1000' and d.df_cod_prod <> '1001' and d.df_cod_prod <> '1002'  and d.df_cod_prod <> '000'  GROUP BY SUC ORDER BY SUC ASC");

$sucursales = array();

if($db->NumRows()>0){
    while($db->NextRecord()){
       $z_suc = $db->Record['SUC'];
       $z_metros = $db->Record['METROS'];
       $z_ventas = $db->Record['VENTAS'];
       $z_costo = $db->Record['COSTO'];
       $z_margen = $db->Record['MARGEN'];
       $data = array('Metros'=>$z_metros ,'Ventas'=> $z_ventas ,'Costo'=>  $z_costo ,'Margen'=>  $z_margen);
       $sucursales[$z_suc]=$data; 
    }
}
 
//print_r($sucursales);


// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['SUC'] = $Q0->Record['SUC'];
    $el['CAT'] = $Q0->Record['CAT'];
    $el['METROS'] = $Q0->Record['METROS'];
    $el['VENTAS'] = $Q0->Record['VENTAS'];
    $el['COSTO'] = $Q0->Record['COSTO'];
    $el['MARGEN'] = $Q0->Record['MARGEN'];
    if( $el['SUC']!=$old['SUC'] && $old['SUC']!='' ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_METROS = 0;
        $subtotal0_VENTAS = 0;
        $subtotal0_COSTO = 0;
        $subtotal0_MARGEN = 0;
    }
    
    $suc = $el['SUC'];
    
    $total_metros_suc = $sucursales[$suc]['Metros'];
    $total_ventas_suc = $sucursales[$suc]['Ventas'];
    $total_costo_suc = $sucursales[$suc]['Costo'];
    $total_margen_suc = $sucursales[$suc]['Margen'];
    
      
    // Preparing a template variables
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_CAT', $el['CAT']);
    $T->Set('query0_METROS', number_format($el['METROS'],2,',','.'));
    $T->Set('porc_METROS',   number_format( $el['METROS'] * 100 / $total_metros_suc,1,',','.'));
    
    $T->Set('query0_VENTAS', number_format($el['VENTAS'],2,',','.'));
    $T->Set('porc_VENTAS',   number_format( $el['VENTAS'] * 100 / $total_ventas_suc,1,',','.'));
    
    $T->Set('query0_COSTO', number_format($el['COSTO'],2,',','.'));
    $T->Set('porc_COSTO',   number_format( $el['COSTO'] * 100 / $total_costo_suc,1,',','.'));
    
    $T->Set('query0_MARGEN', number_format($el['MARGEN'],2,',','.'));
    $T->Set('porc_MARGEN',   number_format( $el['MARGEN'] * 100 / $total_margen_suc,1,',','.'));
    

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_METROS += 0 + $el['METROS'];
    $subtotal0_VENTAS += 0 + $el['VENTAS'];
    $subtotal0_COSTO += 0 + $el['COSTO'];
    $subtotal0_MARGEN += 0 + $el['MARGEN'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_METROS', number_format($subtotal0_METROS,2,',','.'));
    $T->Set('subtotal0_VENTAS', number_format($subtotal0_VENTAS,2,',','.'));
    $T->Set('subtotal0_COSTO', number_format($subtotal0_COSTO,2,',','.'));
    $T->Set('subtotal0_MARGEN', number_format($subtotal0_MARGEN,2,',','.'));
    
    //Actualize Old Values Variables
    $old['SUC'] = $el['SUC'];
    $old['CAT'] = $el['CAT'];
    $old['METROS'] = $el['METROS'];
    $old['VENTAS'] = $el['VENTAS'];
    $old['COSTO'] = $el['COSTO'];
    $old['MARGEN'] = $el['MARGEN'];
    $firstRow=false;

}

$endConsult = true;
if( $el['SUC']!=$old['SUC'] ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
     $T->Show('query0_subtotal_row');
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

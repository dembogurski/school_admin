<?php

/** Report prg file (control_pedidos) 
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
$T->Set( 'sup___local', '02');
$T->Set( 'sup___suc', 'AVENIDA');
$T->Set( 'sup_ped_pend', '');
$T->Set( 'sup_espacio', '');
$T->Set( 'sup_ped_rev', '');
$T->Set( 'sup_buscar', 'acho');
$T->Set( 'sup_prov', 'ACHON BAU S.A');
$T->Set( 'sup_desde', '');
$T->Set( 'sup_hasta', '2011-02-12');
$T->Set( 'sup_estadop', 'x');
$T->Set( 'sup_urg', '%');
$T->Set( 'sup___imprimir', '');
$T->Set( 'sup___imprimir2', '');
$T->Set( 'sup___imp_control', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select d.id AS ID, n.nro as NRO,n.__user AS USUARIO, grupo AS GRUPO, tipo AS TIPO, color AS COLOR, cantidad AS CANT, precio AS PRECIO, d.estado AS ESTADO, prov AS PROV, obs as OBS, urge AS URGE,codigo as CODIGO  from nota_pedido n, nota_pedido_det d where n.nro = d.nro_pedido and n.__locald = "PR" and d.estado like "Despachado" and d.prov like 'ACHON BAU S.A' and d.fecha_previsto between '' and '2011-02-12' and d.urge like '%'  order by grupo, tipo, color desc  ";

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

//Define a Subtotal Variables


//Define a Old Values Variables
$old['ID'] = '';
$old['NRO'] = '';
$old['USUARIO'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COLOR'] = '';
$old['CANT'] = '';
$old['PRECIO'] = '';
$old['ESTADO'] = '';
$old['PROV'] = '';
$old['OBS'] = '';
$old['URGE'] = '';
$old['CODIGO'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['ID'] = $Q0->Record['ID'];
    $el['NRO'] = $Q0->Record['NRO'];
    $el['USUARIO'] = $Q0->Record['USUARIO'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['CANT'] = $Q0->Record['CANT'];
    $el['PRECIO'] = $Q0->Record['PRECIO'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];
    $el['PROV'] = $Q0->Record['PROV'];
    $el['OBS'] = $Q0->Record['OBS'];
    $el['URGE'] = $Q0->Record['URGE'];
    $el['CODIGO'] = $Q0->Record['CODIGO'];

    // Preparing a template variables
    $T->Set('query0_ID', $el['ID']);
    $T->Set('query0_NRO', $el['NRO']);
    $T->Set('query0_USUARIO', $el['USUARIO']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_CANT', $el['CANT']);
    $T->Set('query0_PRECIO', $el['PRECIO']);
    $T->Set('query0_ESTADO', $el['ESTADO']);
    $T->Set('query0_PROV', $el['PROV']);
    
    $T->Set('query0_URGE', $el['URGE']);
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $obs = $el['OBS'];
    if($obs != ''){
      $T->Set('obs',"<tr><td colspan='6'><b>Obs: &nbsp;</b> $obs </td></tr>");
    }else{
      $T->Set('obs',"");
    }
    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    $Q = new Y_DB();
	$Q->Database = $Global['project'];
    $codigo = $el['CODIGO'];
    $Q->Query("SELECT df_descrip, df_precio, df_cantidad, df_subtotal, df_fact_num, df_estado FROM 	det_factura  WHERE df_cod_prod = '$codigo' AND df_estado = 'Procesado' order by id asc;");
    
    if($Q->NumRows() > 0){
        $T->Show("ventas_cab");
    }
    $Z_SUBTOTAL = 0;
    $Z_CANTIDAD = 0;
    while ( $Q->NextRecord() ){
        $df_fact_num = $Q->Record['df_fact_num'];
        $precio = $Q->Record['df_precio'];
        $df_cantidad = $Q->Record['df_cantidad'];
        $df_subtotal = $Q->Record['df_subtotal'];
        $T->Set("df_fact_num",$df_fact_num);
        $T->Set("precio", number_format($precio,2,',','.'));
        $T->Set("df_cantidad",number_format($df_cantidad,2,',','.'));
        $T->Set("df_subtotal",number_format($df_subtotal,2,',','.'));
        $T->Show("ventas");
        $Z_CANTIDAD += 0 + $df_cantidad;
        $Z_SUBTOTAL += 0 + $df_subtotal;
    }
    if( $Z_SUBTOTAL > 0 ){
        $T->Set("Z_CANTIDAD",number_format($Z_CANTIDAD,2,',','.'));
        $T->Set("Z_SUBTOTAL",number_format($Z_SUBTOTAL,2,',','.'));
        $T->Show("ventas_total");
        $Z_CANTIDAD = 0;
        $Z_SUBTOTAL = 0;
    }


    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['ID'] = $el['ID'];
    $old['NRO'] = $el['NRO'];
    $old['USUARIO'] = $el['USUARIO'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COLOR'] = $el['COLOR'];
    $old['CANT'] = $el['CANT'];
    $old['PRECIO'] = $el['PRECIO'];
    $old['ESTADO'] = $el['ESTADO'];
    $old['PROV'] = $el['PROV'];
    $old['OBS'] = $el['OBS'];
    $old['URGE'] = $el['URGE'];
    $old['CODIGO'] = $el['CODIGO'];
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

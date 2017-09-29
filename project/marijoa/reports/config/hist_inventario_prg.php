<?php

/** Report prg file (hist_inventario) 
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
$T->Set( 'sup_usuario', 'Developer');
$T->Set( 'sup___local', '02');
$T->Set( 'sup_fecha', '');
$T->Set( 'sup_tipo', 'Peso');
$T->Set( 'sup_codigo', '66613');
$T->Set( 'sup_dup', '1');
$T->Set( 'sup_msgdupli', 'Codigo duplicado!!!');
$T->Set( 'sup_rephist', '');
$T->Set( 'sup_suc', '02');
$T->Set( 'sup_descrip', 'DIOLEN - LISO DE 1.5 - SALMON');
$T->Set( 'sup_gramaje', '255.83');
$T->Set( 'sup_ancho', '1.60');
$T->Set( 'sup_cant', '30.30');
$T->Set( 'sup_kilos', '12.40');
$T->Set( 'sup_tara_tipo', '');
$T->Set( 'sup_cm_tara', '0.00');
$T->Set( 'sup_tara', '0.00');
$T->Set( 'sup_kilosr', '0.00');
$T->Set( 'sup_cantr', '0.00');
$T->Set( 'sup_diff_mts', '-30.30');
$T->Set( 'sup_hfocus', 'false');
$T->Set( 'sup_select_text', '');
$T->Set( 'sup_msgsuc', 'El producto no figura en esta sucursal!!!');
$T->Set( 'sup_stylec', '');
$T->Set( 'sup_stylesuc', '');
$T->Set( 'sup_stylemsgsuc', '');
$T->Set( 'sup_styledes', '');
$T->Set( 'sup_stylegram', '');
$T->Set( 'sup_styleancho', '');
$T->Set( 'sup_stylecant', '');
$T->Set( 'sup_stylekilos', '');
$T->Set( 'sup_stylekilosr', '');
$T->Set( 'sup_styletaratipo', '');
$T->Set( 'sup_stylecmtara', '');
$T->Set( 'sup_styletara', '');
$T->Set( 'sup_stylemtsr', '');
$T->Set( 'sup_stylediff', '');
$T->Set( 'sup_styledupli', '');
$T->Set( 'sup_msgchange', 'ATENCION! Al modificar y aceptar se tomaran los datos actuales del producto');
$T->Set( 'sup_stylemsgchange', '');
$T->Set( 'sup___lock', 'true');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT usuario,date_format(fecha,"%d-%m-%y %H:%i") AS fecha ,tipo,codigo,suc,gramaje,ancho,cant,kilos,tara, kilosr,cantr,diff_mts FROM inv WHERE codigo = '66613'";

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

$db = new Y_DB();
$db->Database = $Global['project'];


//Define a Old Values Variables
$old['usuario'] = '';
$old['fecha'] = '';
$old['tipo'] = '';
$old['codigo'] = '';
$old['suc'] = '';
$old['gramaje'] = '';
$old['ancho'] = '';
$old['cant'] = '';
$old['kilos'] = '';
$old['tara'] = '';
$old['kilosr'] = '';
$old['cantr'] = '';
$old['diff_mts'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['usuario'] = $Q0->Record['usuario'];
    $el['fecha'] = $Q0->Record['fecha'];
    $el['tipo'] = $Q0->Record['tipo'];
    $el['codigo'] = $Q0->Record['codigo'];
    $el['suc'] = $Q0->Record['suc'];
    $el['gramaje'] = $Q0->Record['gramaje'];
    $el['ancho'] = $Q0->Record['ancho'];
    $el['cant'] = $Q0->Record['cant'];
    $el['kilos'] = $Q0->Record['kilos'];
    $el['tara'] = $Q0->Record['tara'];
    $el['kilosr'] = $Q0->Record['kilosr'];
    $el['cantr'] = $Q0->Record['cantr'];
    $el['diff_mts'] = $Q0->Record['diff_mts'];
    
    $codigo = $el['codigo'];

    // Preparing a template variables
    $T->Set('query0_usuario', $el['usuario']);
    $T->Set('query0_fecha', $el['fecha']);
    $T->Set('query0_tipo', $el['tipo']);
    $T->Set('query0_codigo', $el['codigo']);
    $T->Set('query0_suc', $el['suc']);
    $T->Set('query0_gramaje', $el['gramaje']);
    $T->Set('query0_ancho', $el['ancho']);
    $T->Set('query0_cant', $el['cant']);
    $T->Set('query0_kilos', $el['kilos']);
    $T->Set('query0_tara', $el['tara']);
    $T->Set('query0_kilosr', $el['kilosr']);
    $T->Set('query0_cantr', $el['cantr']);
    $T->Set('query0_diff_mts', $el['diff_mts']);

    // Calculating a total

    // Calculating a subtotal
    
    $T->Show('query0_data_row');
    
     /* 
     * // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }*/
    
    //Actualize Old Values Variables
    $old['usuario'] = $el['usuario'];
    $old['fecha'] = $el['fecha'];
    $old['tipo'] = $el['tipo'];
    $old['codigo'] = $el['codigo'];
    $old['suc'] = $el['suc'];
    $old['gramaje'] = $el['gramaje'];
    $old['ancho'] = $el['ancho'];
    $old['cant'] = $el['cant'];
    $old['kilos'] = $el['kilos'];
    $old['tara'] = $el['tara'];
    $old['kilosr'] = $el['kilosr'];
    $old['cantr'] = $el['cantr'];
    $old['diff_mts'] = $el['diff_mts'];
    $firstRow=false;

}

$db->Query("SELECT r.rem_nro AS Nro,r.rem_origen AS origen, r.rem_destino as destino, date_format(r.rem_fecha,'%d-%m-%Y') AS fecha, r.rem_func_nombre AS Funcionario, r.rem_estado AS estado,r.rem_receptor AS receptor,
        r.rem_fecha_cier AS cierre
           FROM nota_remision r, remito_det d WHERE d.rem_nro = r.rem_nro AND d.df_cod_prod = $codigo;");


if($db->NumRows()>0){
   
    
    $T->Show('query0_subtotal_row');
    while($db->NextRecord()){
        $nro = $db->Record['Nro'];
        $origen = $db->Record['origen'];
        $destino = $db->Record['destino'];
        $fecha = $db->Record['fecha'];
        $funcionario = $db->Record['Funcionario'];
        $estado = $db->Record['estado'];
        $receptor = $db->Record['receptor'];
        $fechac = $db->Record['cierre'];
        
        $T->Set('nro', $nro);
        $T->Set('origen', $origen);
        $T->Set('destino', $destino);
        $T->Set('func', $funcionario);
        $T->Set('fecha', $fecha);
        $T->Set('estado', $estado);
        $T->Set('receptor', $receptor);
        $T->Set('cierre', $fechac); 
        
        
        if($estado =='Cerrada'){
            $T->Set('color', '#99ff66'); 
        }else if($estado =='Abierta'){
            $T->Set('color', 'red'); 
        }else{
           $T->Set('color', 'blue');  
        }
        
        $T->Show('query0_total_row'); 

    }

}

$endConsult = true;
 
 
$T->Show('end_query0');				// Ends a Table 

?>

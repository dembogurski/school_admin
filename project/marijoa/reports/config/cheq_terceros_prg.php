<?php

/** Report prg file (cheq_terceros) 
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
$T->Set( 'sup_chq_bco', '');
$T->Set( 'sup_chq_cta', '');
$T->Set( 'sup_chq_num', '');
$T->Set( 'sup_chq_nombre_de', '');
$T->Set( 'sup_desde', '2012-01-01');
$T->Set( 'sup_hasta', '2012-01-18');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_rep', '');
 * 
 */
// ------------------------------------------

$recibido = $sup['recibido'];
$recibido2 = $sup['recibido2'];
$filtro_fecha = $sup['filtro_fecha'];

$desde = $sup['desde'];
$hasta = $sup['hasta'];
$chq_bco = $sup['chq_bco']==""?"%":$sup['chq_bco'];
$chq_cta = $sup['chq_cta']==""?"%":$sup['chq_cta'];
$chq_num = $sup['chq_num']==""?"%":$sup['chq_num'];
$chq_nombre_de = $sup['chq_nombre_de']==""?"%":$sup['chq_nombre_de'];
$empr = $sup['empr'];
$estado = $sup['estado'];
$chq_tipo = $sup['chq_tipo'];

$order_by = $sup['order_by'];
$order  = $sup['order'];
 
$sql_recibido = "chq_recibido like '$recibido'";

if($recibido == "No Recibido"){
    $sql_recibido = "chq_recibido like 'No Recibido' or chq_recibido = ''";
}else{ // Recibido o %
    $sql_recibido = "chq_recibido like '$recibido'";
}

$sql_recibido2 = "chq_recibido2 like '$recibido'";

if($recibido2 == "No Recibido"){
    $sql_recibido2 = "chq_recibido2 like 'No Recibido' or chq_recibido2 = ''";
}else{ // Recibido o %
    $sql_recibido2 = "chq_recibido2 like '$recibido2'";
}

// THIS IS YOUR FIRST QUERY:
$query0 = "SELECT  chq_ref AS REF,__local as SUC,chq_tipo as TIPO,chq_nro_rec AS REC, chq_bco AS BANCO, chq_cta AS CUENTA, chq_num AS NRO,date_format(chq_fecha_pag,'%d-%m-%Y') AS FECHA_PAG,"
        . "date_format(fechadep,'%d-%m-%Y') AS FECHA_DEP, date_format(fechaacred,'%d-%m-%Y') AS FECHA_ACREED,chq_nro_dep  as NRO_DEP,b_nombre as BANCO_DEP,chq_nro_rec as RECIBO, "
        . "cta as CUENTA_DEP,__cj_bco as FORMA,chq_valor AS VALOR, chq_moneda AS MON,chq_cotiz AS COTIZ, chq_moneda_ref AS VALOR_GS,chq_estado AS ESTADO,chq_nombre_de AS NOMBRE_DE,"
        . "date_format(chq_fecha_emis,'%d-%m-%Y') AS FECHA_EMIS, date_format(chq_fecha_ins,'%d-%m-%Y') AS FECHA_INS,chq_docs AS DOCS, chq_recibido as ADMIN,chq_recibido2 as GERENCIA "
        . "FROM cheq_terceros t LEFT JOIN bcos b ON  t.bco = b.b_cod WHERE   $filtro_fecha  BETWEEN '$desde' AND '$hasta' and chq_bco like '$chq_bco' and chq_cta "
        . "like '$chq_cta' and chq_num like '$chq_num' and chq_nombre_de like '$chq_nombre_de' and __local like '$empr' AND chq_estado like '$estado' "
        . "AND ($sql_recibido) AND ($sql_recibido2) and chq_tipo like '$chq_tipo' order by $order_by $order  ";



 //echo $query0;

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
$subtotal0_VALOR = 0;
$subtotal0_VALOR_GS = 0;


//Define a Old Values Variables
$old['REF'] = '';
$old['BANCO'] = '';
$old['CUENTA'] = '';
$old['NRO'] = '';
$old['FECHA_PAG'] = '';
$old['VALOR'] = '';
$old['MON'] = '';
$old['COTIZ'] = '';
$old['VALOR_GS'] = '';
$old['ESTADO'] = '';
$old['NOMBRE_DE'] = '';
$old['FECHA_EMIS'] = '';
$old['FECHA_INS'] = '';
$old['DOCS'] = '';
$old['ADMIN'] = '';
$old['GERENCIA'] = '';

$old['FECHA_DEP'] = '';
$old['FECHA_ACREED'] = '';
$old['NRO_DEP'] = '';
$old['BANCO'] = ''; 
$old['RECIBO'] = '';
$old['CUENTA_DEP'] = '';
$old['FORMA'] = '';
$old['SUC'] = '';
$old['REC'] = '';
$old['TIPO'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['REF'] = $Q0->Record['REF'];
    $el['BANCO'] = $Q0->Record['BANCO'];
    $el['CUENTA'] = $Q0->Record['CUENTA'];
    $el['NRO'] = $Q0->Record['NRO'];
    $el['FECHA_PAG'] = $Q0->Record['FECHA_PAG'];
    $el['VALOR'] = $Q0->Record['VALOR'];
    $el['MON'] = $Q0->Record['MON'];
    $el['COTIZ'] = $Q0->Record['COTIZ'];
    $el['VALOR_GS'] = $Q0->Record['VALOR_GS'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];
    $el['NOMBRE_DE'] = $Q0->Record['NOMBRE_DE'];
    $el['FECHA_EMIS'] = $Q0->Record['FECHA_EMIS'];
    $el['FECHA_INS'] = $Q0->Record['FECHA_INS'];
    $el['DOCS'] = $Q0->Record['DOCS'];
    $el['ADMIN'] = $Q0->Record['ADMIN'];
    $el['GERENCIA'] = $Q0->Record['GERENCIA'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['REC'] = $Q0->Record['REC'];
    $el['TIPO'] = $Q0->Record['TIPO'];

    $el['FECHA_DEP'] = $Q0->Record['FECHA_DEP'];
    $el['FECHA_ACREED'] = $Q0->Record['FECHA_ACREED'];
    $el['NRO_DEP'] = $Q0->Record['NRO_DEP'];
    $el['BANCO_DEP'] = $Q0->Record['BANCO_DEP'];
    $el['RECIBO'] = $Q0->Record['RECIBO'];
    $el['CUENTA_DEP'] = $Q0->Record['CUENTA_DEP'];
    $el['FORMA'] = $Q0->Record['FORMA'];
    
    
    // Preparing a template variables
    $T->Set('query0_REF', $el['REF']);
    $T->Set('query0_BANCO', $el['BANCO']);
    $T->Set('query0_CUENTA', $el['CUENTA']);
    $T->Set('query0_NRO', $el['NRO']);
    $T->Set('query0_FECHA_PAG', $el['FECHA_PAG']);
    $T->Set('query0_VALOR', number_format($el['VALOR'],0,',','.'));
    $T->Set('query0_MON', $el['MON']);
    $T->Set('query0_COTIZ', $el['COTIZ']);
    $T->Set('query0_VALOR_GS', number_format($el['VALOR_GS'],0,',','.'));
    $T->Set('query0_ESTADO', $el['ESTADO']);
    $T->Set('query0_NOMBRE_DE', $el['NOMBRE_DE']);
    $T->Set('query0_FECHA_EMIS', $el['FECHA_EMIS']);
    $T->Set('query0_FECHA_INS', $el['FECHA_INS']);
    $T->Set('query0_DOCS', $el['DOCS']);
    $T->Set('query0_ADMIN', $el['ADMIN']);
    $T->Set('query0_GERENCIA', $el['GERENCIA']);
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_REC', $el['REC']);
    
    $T->Set('query0_FECHA_DEP', $el['FECHA_DEP']);
    $T->Set('query0_FECHA_ACREED', $el['FECHA_ACREED']);
    $T->Set('query0_NRO_DEP', $el['NRO_DEP']);
    $T->Set('query0_BANCO_DEP', $el['BANCO_DEP']);
    $T->Set('query0_RECIBO', $el['RECIBO']);
    $T->Set('query0_CUENTA_DEP', $el['CUENTA_DEP']);
    $T->Set('query0_FORMA', $el['FORMA']);

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_VALOR += 0 + $el['VALOR'];
    $subtotal0_VALOR_GS += 0 + $el['VALOR_GS'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_VALOR', number_format($subtotal0_VALOR,0,',','.'));
    $T->Set('subtotal0_VALOR_GS', number_format($subtotal0_VALOR_GS,0,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_VALOR = 0;
        $subtotal0_VALOR_GS = 0;
    }
    
    //Actualize Old Values Variables
    $old['REF'] = $el['REF'];
    $old['BANCO'] = $el['BANCO'];
    $old['CUENTA'] = $el['CUENTA'];
    $old['NRO'] = $el['NRO'];
    $old['FECHA_PAG'] = $el['FECHA_PAG'];
    $old['VALOR'] = $el['VALOR'];
    $old['MON'] = $el['MON'];
    $old['COTIZ'] = $el['COTIZ'];
    $old['VALOR_GS'] = $el['VALOR_GS'];
    $old['ESTADO'] = $el['ESTADO'];
    $old['NOMBRE_DE'] = $el['NOMBRE_DE'];
    $old['FECHA_EMIS'] = $el['FECHA_EMIS'];
    $old['FECHA_INS'] = $el['FECHA_INS'];
    $old['DOCS'] = $el['DOCS'];
    $old['ADMIN'] = $el['ADMIN'];
    $old['GERENCIA'] = $el['GERENCIA'];
    $old['SUC'] = $el['SUC'];
    $old['REC'] = $el['REC'];
    $old['TIPO'] = $el['TIPO'];
    
    $old['FECHA_DEP'] = $el['FECHA_DEP'];
    $old['FECHA_ACREED'] = $el['FECHA_ACREED'];
    $old['NRO_DEP'] = $el['NRO_DEP'];
    $old['BANCO_DEP'] = $el['BANCO_DEP'];
    $old['RECIBO'] = $el['RECIBO'];
    $old['CUENTA_DEP'] = $el['CUENTA_DEP'];
    $old['FORMA'] = $el['FORMA'];
      
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
$T->Show('end_query0');				// Ends a Table 
  /**
   *  A veces creo que el compilador ignora todos mis comentarios
   */
?>

<?php

/** Report prg file (fact_en_caja) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  

// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 
$T = new Y_Template( $file_tpl ); 
// Superior Variables
/**
$T->Set( 'sup_msg', 'Cierre y abra la grilla para actualizar las Ventas que estan en espera!!!');
$T->Set( 'sup___local', '06');
$T->Set( 'sup_nombre_suc', 'CDE');
$T->Set( 'sup___fact', '0');
$T->Set( 'sup_filtro', '');
$T->Set( 'sup_corroborar', '');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_facturas', '');
$T->Set( 'sup_doclick', 'true');
$T->Set( 'sup_open_sub', '');
// ------------------------------------------
*/
// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT fact_nro AS Factura,fact_cli_ci AS RUC,fact_cli_cat AS CAT,fact_nom_cli AS CLIENTE,fact_estado, DATE_FORMAT(fact_fecha,"%d-%m-%Y") AS Fecha,fact_vend_cod AS Vendedor,fact_empaque AS Empaque,fact_total AS Total   FROM factura WHERE fact_localidad = '06' AND fact_estado = "En_caja"";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );
$suc = $sup['__local'];

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

// Starting a HTML
$T->Show('css');
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables
$total0_Total = 0;

//Define a Subtotal Variables


//Define a Old Values Variables
$old['Factura'] = '';
$old['RUC'] = '';
$old['_RUC'] = '';
$old['CAT'] = '';
$old['_CAT'] = '';
$old['CLIENTE'] = '';
$old['_CLIENTE'] = '';
$old['fact_estado'] = '';
$old['Fecha'] = '';
$old['Vendedor'] = '';
$old['Empaque'] = '';
$old['Total'] = '';
$old['verif'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['Factura'] = $Q0->Record['Factura'];
    $el['RUC'] = $Q0->Record['RUC'];
    $el['_RUC'] = $Q0->Record['_RUC'];
    $el['CAT'] = $Q0->Record['CAT'];
    $el['_CAT'] = $Q0->Record['_CAT'];
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['_CLIENTE'] = $Q0->Record['_CLIENTE'];
    $el['fact_estado'] = $Q0->Record['fact_estado'];
    $el['Fecha'] = $Q0->Record['Fecha'];
    $el['Vendedor'] = $Q0->Record['Vendedor'];
    $el['Empaque'] = $Q0->Record['Empaque'];
    $el['Total'] = $Q0->Record['Total'];
	$el['verif'] = $Q0->Record['verif'];

    // Preparing a template variables
	
    $T->Set('revision', $el['verif']);
	$T->Set('query0_Factura', $el['Factura']);
    $T->Set('query0_RUC', $el['RUC']);
    $T->Set('query0_CAT', $el['CAT']);
    $T->Set('query0_CLIENTE', htmlentities($el['CLIENTE']));
    $T->Set('query0_fact_estado', $el['fact_estado']);
    $T->Set('query0_Fecha', $el['Fecha']);
    $T->Set('query0_Vendedor', $el['Vendedor']);
    $T->Set('query0_Empaque', $el['Empaque']);
    $T->Set('query0_Total', number_format($el['Total'],0,'.',','));
	
    // Calculating a total
    $total0_Total += 0 + $el['Total'];

    // Calculating a subtotal

    $T->Show('query0_data_row');
	
	if($el['verif']==='err'){
		$db_verif = new Y_DB();
		$db_verif->Database = 'marijoa';
		$db_verif->Query("select DATE_FORMAT(fecha,'%d-%m-%Y') as fecha,hora from _audit_log_ where accion = 'LOG_FACT' and descrip = '".$el['Factura']."' and y3_= '$suc' order by id desc limit 1");
		$db_verif->NextRecord();
		if($el['RUC'] == ''){
			$fact_cli_name = $el['CLIENTE'];
			$db_cli = new Y_DB(); $db_cli->Database = 'marijoa';			
			$db_cli->Query("select cli_ci,cli_fullname,cli_cat from mnt_cli where cli_fullname ='$fact_cli_name'");
			if($db_cli->NumRows()>0){
				$db_cli->NextRecord();
				$T->Set('cli_RUC', $db_cli->Record['cli_ci']);
				$T->Set('cli_CAT', $db_cli->Record['cli_cat']);
				$T->Set('cli_NOMBRE', htmlentities($db_cli->Record['cli_fullname']));
			}
		}else{
			$T->Set('cli_RUC', $el['_RUC']);
			$T->Set('cli_CAT', $el['_CAT']);
			$T->Set('cli_NOMBRE', htmlentities($el['_CLIENTE']));
		}		
		$T->Set('fact_fecha_hora_creacion', $db_verif->Record['fecha'].'  '.$db_verif->Record['hora']);		
		$T->Show('cliente');		
	}

    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['Factura'] = $el['Factura'];
    $old['RUC'] = $el['RUC'];
    $old['_RUC'] = $el['_RUC'];
    $old['CAT'] = $el['CAT'];
	$old['_CAT'] = $el['_CAT'];
    $old['CLIENTE'] = $el['CLIENTE'];
	$old['_CLIENTE'] = $el['_CLIENTE'];
    $old['fact_estado'] = $el['fact_estado'];
    $old['Fecha'] = $el['Fecha'];
    $old['Vendedor'] = $el['Vendedor'];
    $old['Empaque'] = $el['Empaque'];
    $old['Total'] = $el['Total'];
	$old['verif'] = $el['verif'];
    $firstRow=false;

}

$endConsult = true;
if( true ){
    $T->Show('query0_subtotal_row');
}
// Show total
$T->Set('total0_Total', number_format($total0_Total,0,'.',','));
if( endConsult ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

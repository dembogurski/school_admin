<?php

/** Report prg file (nota_credito) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  
/*
// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 
$T = new Y_Template( $file_tpl ); 
// Superior Variables
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup___disableDel', 'true');
$T->Set( 'sup_dv_hoy', '2008-01-08');
$T->Set( 'sup_fact_sentinela', '');
$T->Set( 'sup_dv_msg', 'Busque la factura del cliente');
$T->Set( 'sup_dv_cli', '15');
$T->Set( 'sup_dv_nomcli', 'KIKUCHI');
$T->Set( 'sup_dv_msg2', 'Ingrese una fecha para filtrar facturas hasta el dia de la Fecha...');
$T->Set( 'sup_dv_fecha_fact', '');
$T->Set( 'sup_fact_nro', '1');
$T->Set( 'sup_dv_det_fact', '');
$T->Set( 'sup_msg3', 'ATENCION!!! El monto correspondiente a las devoluciones se deben hacer en forma manual...');
$T->Set( 'sup_dv_aceptar', 'false');
$T->Set( 'sup_dv_valor_total', '79000');
$T->Set( 'sup_dv_insertar', '');
$T->Set( 'sup_dv_nota_credito', ''); */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select id as Nro, dv_nomcli as CLIENTE, dv_hoy as FECHA, dv_valor_total as VALOR, fact_nro as FACTURA  FROM devoluciones order by id desc limit 1";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$data_ini = substr($sup['fecha'],8,2).'-'.
			substr($sup['fecha'],5,2).'-'.
			substr($sup['fecha'],0,4);
			
 


$T->Set( 'nro', $sup['nro_nc']);
$T->Set( 'cliente', $sup['beneficiario']);
$T->Set( 'valor', number_format( $sup['monto'] ,0,',','.'));


 


$nro = $sup['nro_nc']; 
$beneficiario = $sup['beneficiario'];
$ci = $sup['cli_ci'];
$obs = $sup['obs'];
$monto = $sup['monto'];
$T->Set( 'ruc', $ci);

$T->Set( 'obs', $sup['obs']);


			
$T->Set('data',$data_ini);			

$firstRow=true;
$Q0 = $DB;


$Q0->Query("select count(*) as CANT from nota_credito where nro_nc = $nro");

$Q0->NextRecord();


$CANT = $Q0->Record['CANT'];

if($CANT < 1){
  $Q0->Query( "INSERT INTO nota_credito(nro_nc,fecha,cli_ci,beneficiario,obs,monto,saldo)VALUES($nro,CURRENT_DATE,'$ci','$beneficiario','$obs',$monto,$monto); " );    
}

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
$old['Nro'] = '';
$old['CLIENTE'] = '';
$old['FECHA'] = '';
$old['VALOR'] = '';
$old['FACTURA'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['Nro'] = $Q0->Record['Nro'];
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['VALOR'] = $Q0->Record['VALOR'];
    $el['FACTURA'] = $Q0->Record['FACTURA'];

    // Preparing a template variables
    $T->Set('query0_Nro', $el['Nro']);
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_VALOR',  number_format( $el['VALOR'],0,',','.'));
    $T->Set('query0_FACTURA', $el['FACTURA']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['Nro'] = $el['Nro'];
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['FECHA'] = $el['FECHA'];
    $old['VALOR'] = $el['VALOR'];
    $old['FACTURA'] = $el['FACTURA'];
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

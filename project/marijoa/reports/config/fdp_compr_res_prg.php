<?php

/** Report prg file (fdp_compr_res) 
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
$T->Set( 'sup_busc_prov', 'com');
$T->Set( 'sup_prov', '102');
$T->Set( 'sup_ref', '');
$T->Set( 'sup_msg2', 'Filtre aqui los datos del Producto!!!');
$T->Set( 'sup_p_grupo', '%');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_p_color', '%');
$T->Set( 'sup_fdp', '%');
$T->Set( 'sup_desde', '2010-06-01');
$T->Set( 'sup_hasta', '2010-06-03');
$T->Set( 'sup_rep_ajustes', '');
$T->Set( 'sup_rep_aj_con_fdp', '');
$T->Set( 'sup_desdeinv', '2010-06-01');
$T->Set( 'sup_hastainv', '2010-06-03');
$T->Set( 'sup_msg', '( ! ) No importan aqui Proveedor, Grupo, Tipo y Color, Fin de Pieza!!!');
$T->Set( 'sup_ph', 'Si');
$T->Set( 'sup_nsuc', '%');
$T->Set( 'sup_aj_oper', '%');
$T->Set( 'sup_tipo', 'Resumido');
$T->Set( 'sup_rep_com_fdp', '');
$T->Set( 'sup_rep_com_fdp2', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select p.p_grupo as GRUPO, p.p_tipo AS TIPO , a.aj_inicial AS CANT_INICIAL,  a.aj_ajuste as AJUSTE, a.aj_signo as SIGNO, a.aj_final as FINAL from mnt_prod p, mov_compras c, mnt_ajustes a where  c.c_ref = p.p_ref and c_fecha between  '2010-06-01' and '2010-06-03' and p.p_local <> '%'  and p.p_grupo like '%' and p.p_tipo like '%' and p.p_color like '%' and c.c_prov like '102' and c.c_ref LIKE '%' and a.aj_prod = p.p_cod and a.aj_oper like '%' order by p.p_grupo, p.p_tipo asc";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$proveedor = $sup['prov_nombre'];
 
if ($proveedor === '__NO DATA__' ) {
	$T->Set( 'prov_nombre', 'Todos los Proveedores' );
}else{ 
	$T->Set( 'prov_nombre', $sup['prov_nombre'] ); 	
}
 

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
$total0_CANT_INICIAL = 0;
$total0_AJUSTE = 0;
$total0_FINAL = 0;

//Define a Subtotal Variables
$subtotal0_CANT_INICIAL = 0;
$subtotal0_AJUSTE = 0;
$subtotal0_FINAL = 0;


//Define a Old Values Variables
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['CANT_INICIAL'] = '';
$old['AJUSTE'] = '';
$old['SIGNO'] = '';
$old['FINAL'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['CANT_INICIAL'] = $Q0->Record['CANT_INICIAL'];
    $el['AJUSTE'] = $Q0->Record['AJUSTE'];
    $el['SIGNO'] = $Q0->Record['SIGNO'];
    $el['FINAL'] = $Q0->Record['FINAL'];
    if( $el['GRUPO']!=$old['GRUPO'] && $el['TIPO']!=$old['TIPO']  ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANT_INICIAL = 0;
        $subtotal0_AJUSTE = 0;
        $subtotal0_FINAL = 0;
    }

    // Preparing a template variables
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_CANT_INICIAL', number_format($el['CANT_INICIAL'],2,',','.'));
    
    
    if ($el['SIGNO'] === '+') {
      	$T->Set('query0_AJUSTE', number_format($el['AJUSTE'],2,',','.'));
    }else{
    	$T->Set('query0_AJUSTE', number_format(-$el['AJUSTE'],2,',','.'));
    }
    
    $T->Set('query0_SIGNO', $el['SIGNO']);
    $T->Set('query0_FINAL', number_format($el['FINAL'],2,',','.'));

    // Calculating a total
    $total0_CANT_INICIAL += 0 + $el['CANT_INICIAL'];
    if ($el['SIGNO'] === '+') {
       $total0_AJUSTE += 0 + $el['AJUSTE'];
    }else{
       $total0_AJUSTE -= 0 + $el['AJUSTE'];
    }
    $total0_FINAL += 0 + $el['FINAL'];

    // Calculating a subtotal
    $subtotal0_CANT_INICIAL += 0 + $el['CANT_INICIAL'];
    if ($el['SIGNO'] === '+') {
       $subtotal0_AJUSTE += 0 + $el['AJUSTE'];
    }else{
       $subtotal0_AJUSTE -= 0 + $el['AJUSTE']; 	
    }
    $subtotal0_FINAL += 0 + $el['FINAL'];

   //$T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANT_INICIAL', number_format($subtotal0_CANT_INICIAL,2,',','.'));
    $T->Set('subtotal0_AJUSTE', number_format($subtotal0_AJUSTE,2,',','.'));
    $T->Set('subtotal0_FINAL', number_format($subtotal0_FINAL,2,',','.'));
    
    //Actualize Old Values Variables
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['CANT_INICIAL'] = $el['CANT_INICIAL'];
    $old['AJUSTE'] = $el['AJUSTE'];
    $old['SIGNO'] = $el['SIGNO'];
    $old['FINAL'] = $el['FINAL'];
    $firstRow=false;

}

$endConsult = true;
if( $el['GRUPO']!=$old['GRUPO'] && $el['TIPO']!=$old['TIPO']  ){
    $T->Show('query0_subtotal_row');
}
// Show total
$T->Set('total0_CANT_INICIAL', number_format($total0_CANT_INICIAL,2,',','.'));
$T->Set('total0_AJUSTE', number_format($total0_AJUSTE,2,',','.'));
$T->Set('total0_FINAL', number_format($total0_FINAL,2,',','.'));
if( endConsult ){
	$T->Show('query0_subtotal_row');
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

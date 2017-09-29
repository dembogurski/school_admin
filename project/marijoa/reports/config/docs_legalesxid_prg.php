<?php

/** Report prg file (docs_legales) 
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
$T->Set( 'sup_desde', '2011-08-19');
$T->Set( 'sup_hasta', '2013-08-19');
$T->Set( 'sup_busc_prov', '%');
$T->Set( 'sup_prov', '%');
$T->Set( 'sup_emp', 'Marijoa S.R.L.');
$T->Set( 'sup_tipo_doc', 'Factura');
$T->Set( 'sup_tipo_iva', '%');
$T->Set( 'sup_estado', '%');
$T->Set( 'sup_tipo_mov', '%');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_rep', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT tipo_doc ,nro_doc,prov,date_format(fecha,"%d-%m-%Y") as fecha,valor,tipo,estado, cotiz, valor_mon, compl,tipo_iva  FROM docs WHERE estado like '%' and emp like 'Marijoa S.R.L.' and fecha BETWEEN '2011-08-19' and '2013-08-19' AND prov like '%' and tipo_doc  like 'Factura' AND tipo_iva like  '%'  and tipo_mov like '%'  ORDER BY prov,fecha ASC";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);

$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

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
$total0_valor = 0;
$total0_valor_mon = 0;

//Define a Subtotal Variables
$subtotal0_valor = 0;
$subtotal0_valor_mon = 0;

$year = date("Y");
$T->Set( 'year', $year );


//Define a Old Values Variables
$old['tipo_doc'] = '';
$old['nro_doc'] = '';
$old['prov'] = '';
$old['fecha'] = '';
$old['valor'] = '';
$old['tipo'] = '';
$old['estado'] = '';
$old['cotiz'] = '';
$old['valor_mon'] = '';
$old['compl'] = '';
$old['tipo_iva'] = '';
$old['concepto'] = '';
$old['tipo_oc'] = '';
$old['id'] = '';
 

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['tipo_doc'] = $Q0->Record['tipo_doc'];
    $el['nro_doc'] = $Q0->Record['nro_doc'];
    $el['prov'] = $Q0->Record['prov'];
    $el['fecha'] = $Q0->Record['fecha_'];
    $el['valor'] = $Q0->Record['valor'];
    $el['tipo'] = $Q0->Record['tipo'];
    $el['estado'] = $Q0->Record['estado'];
    $el['cotiz'] = $Q0->Record['cotiz'];
    $el['valor_mon'] = $Q0->Record['valor_mon'];
    $el['compl'] = $Q0->Record['compl'];
    $el['tipo_iva'] = $Q0->Record['tipo_iva'];
    $el['concepto'] = $Q0->Record['concepto'];
    $el['tipo_oc'] = $Q0->Record['tipo_oc'];
    $el['id'] = $Q0->Record['id'];
    
    $id = $el['id'];
    $orig = $el['tipo_oc'];
    
    if($el['estado'] == "No Enviado"){
        $T->Set('query0_estado','');
         $T->Set('color','');
    }else{
        $T->Set('query0_estado','checked');
         $T->Set('color','#B0E2FF');
    }
    
    if($orig == ""){
        $T->Set('original','');
        $T->Set('copia','');
    }else if ($orig == "Original"){
         $T->Set('original','checked');
         $T->Set('copia','');
    }else{
         $T->Set('original','');
         $T->Set('copia','checked');
    }
        
    if( $el['fecha']!=$old['fecha'] ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_valor = 0;
        $subtotal0_valor_mon = 0;
    }
    
    $tipo_doc = $el['tipo_doc'];
    
    
    // Preparing a template variables
    $T->Set('query0_tipo_doc', $el['tipo_doc']);
    $T->Set('query0_nro_doc', $el['nro_doc']);
    $T->Set('query0_prov', $el['prov']);
    $T->Set('query0_fecha', $el['fecha']);
    $T->Set('query0_concepto', $el['concepto']);
    $T->Set('id', $id);
    
    if($tipo_doc != 'Nota Credito'){
        $T->Set('query0_valor', number_format($el['valor'],2,',','.'));
    }else{
        $T->Set('query0_valor',"-". number_format($el['valor'],2,',','.')); 
    }
    
    $T->Set('query0_tipo', $el['tipo']);
    
    $T->Set('query0_cotiz', $el['cotiz']);
    
    if($tipo_doc != 'Nota Credito'){
        $T->Set('query0_valor_mon', number_format($el['valor_mon'],2,',','.'));
    }else{
         $T->Set('query0_valor_mon',"-". number_format($el['valor_mon'],2,',','.')); 
    }
    $T->Set('query0_compl', $el['compl']);
    $T->Set('query0_tipo_iva', $el['tipo_iva']);
    
       

    // Calculating a total
    
    if($tipo_doc != 'Nota Credito'){
      $total0_valor += 0 + $el['valor'];
      $total0_valor_mon += 0 + $el['valor_mon'];
    }else{
       $total0_valor += 0 - $el['valor'];
       $total0_valor_mon += 0 - $el['valor_mon']; 
    }

    // Calculating a subtotal
    if($tipo_doc != 'Nota Credito'){
        $subtotal0_valor += 0 + $el['valor'];
        $subtotal0_valor_mon += 0 + $el['valor_mon'];
    }else{
        $subtotal0_valor += 0 - $el['valor'];
        $subtotal0_valor_mon += 0 - $el['valor_mon'];
    }

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_valor', number_format($subtotal0_valor,2,',','.'));
    $T->Set('subtotal0_valor_mon', number_format($subtotal0_valor_mon,2,',','.'));
    
    //Actualize Old Values Variables
    $old['tipo_doc'] = $el['tipo_doc'];
    $old['nro_doc'] = $el['nro_doc'];
    $old['prov'] = $el['prov'];
    $old['fecha'] = $el['fecha'];
    $old['valor'] = $el['valor'];
    $old['tipo'] = $el['tipo'];
    $old['estado'] = $el['estado'];
    $old['cotiz'] = $el['cotiz'];
    $old['valor_mon'] = $el['valor_mon'];
    $old['compl'] = $el['compl'];
    $old['tipo_iva'] = $el['tipo_iva'];
    $old['concepto'] = $el['concepto'];
    $old['tipo_oc'] = $el['tipo_oc'];
    $old['id'] = $el['id'];
      
    $firstRow=false;

}

$endConsult = true;
if( $el['fecha']!=$old['fecha'] ){
    $T->Show('query0_subtotal_row');
}
// Show total
$T->Set('total0_valor', number_format($total0_valor,2,',','.'));
$T->Set('total0_valor_mon', number_format($total0_valor_mon,2,',','.'));
if( endConsult ){
    $T->Show('query0_subtotal_row');
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

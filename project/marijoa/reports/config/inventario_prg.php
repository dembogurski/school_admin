<?php

/** Report prg file (inventario) 
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
$T->Set( 'sup___user', 'Developer');
$T->Set( 'sup___local', '02');
$T->Set( 'sup_check_suc', 'No');
$T->Set( 'sup_blaser', 'Manual');
$T->Set( 'sup_codigo', '');
$T->Set( 'sup_puntear', '');
$T->Set( 'sup_subst', '');
$T->Set( 'sup_check', '');
$T->Set( 'sup_hfocus', '');
$T->Set( 'sup_hfocus_esp', '');
$T->Set( 'sup_select_text', '');
$T->Set( 'sup_style2', '');
$T->Set( 'sup_style3', '');
$T->Set( 'sup_style4', '');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_msg', 'Area para Generar Reportes');
$T->Set( 'sup_suc_', '02');
$T->Set( 'sup_tipo', 'Diff. Suc');
$T->Set( 'sup_gen_rep', '');
 * 
 
// ------------------------------------------

*/
// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p_cod,p_fam,p_grupo, p_tipo,p_color,p_cant, codigo,suc_p as suc_punteo ,suc_s,hits,usuario,fecha_hora, duplicado  FROM mnt_prod p LEFT JOIN inv_control i ON p.p_cod = i.codigo     WHERE p.p_local = '02' AND prod_fin_pieza <> "Si" AND p_cant > 0  ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

 

$suc_punteo = $sup['suc_'];

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
$old['p_cod'] = '';
$old['p_fam'] = '';
$old['p_grupo'] = '';
$old['p_tipo'] = '';
$old['p_color'] = '';
$old['p_cant'] = '';
$old['codigo'] = '';
$old['suc_punteo'] = '';
$old['suc_s'] = '';
$old['hits'] = '';
$old['usuario'] = '';
$old['fecha_hora'] = '';
$old['duplicado'] = '';
$old['p_compra'] = '';
$old['fob'] = '';

$tipo = $sup['tipo'];
$i = 0;
$j = 0;
$duplicados = 0;


// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['p_cod'] = $Q0->Record['p_cod'];
    $el['p_fam'] = $Q0->Record['p_fam'];
    $el['p_grupo'] = $Q0->Record['p_grupo'];
    $el['p_tipo'] = $Q0->Record['p_tipo'];
    $el['p_color'] = $Q0->Record['p_color'];
    $el['p_cant'] = $Q0->Record['p_cant'];
    $el['codigo'] = $Q0->Record['codigo'];
    $el['suc_punteo'] = $Q0->Record['suc_punteo'];
    $el['suc_s'] = $Q0->Record['suc_s'];
    $el['hits'] = $Q0->Record['hits'];
    $el['usuario'] = $Q0->Record['usuario'];
    $el['fecha_hora'] = $Q0->Record['fecha_hora'];
    $el['duplicado'] = $Q0->Record['duplicado'];
    $el['p_compra'] = $Q0->Record['p_compra'];
	$el['fob'] = $Q0->Record['fob'];
    
    $suc_p = $el['suc_punteo'];
     
    $prod = $el['p_cod']." - ".$el['p_fam']." - ".$el['p_grupo']." - ".$el['p_tipo']." - ".$el['p_color'];
    $T->Set('producto', $prod); 
    
    if($el['duplicado']==='1'){
        $duplicados++;
    }
    
    if($el['suc_punteo'] != $el['suc_s'] && ($el['codigo']!='')){
       $T->Set('color','orange'); 
    }else{
       $T->Set('color','white'); 
    }
    
    // Preparing a template variables
    $T->Set('query0_p_cod', $el['p_cod']);
    $T->Set('query0_p_fam', $el['p_fam']);
    $T->Set('query0_p_grupo', $el['p_grupo']);
    $T->Set('query0_p_tipo', $el['p_tipo']);
    $T->Set('query0_p_color', $el['p_color']);
    $T->Set('query0_p_cant', $el['p_cant']);
    $T->Set('query0_codigo', $el['codigo']);
    $T->Set('query0_suc_punteo', $suc_p);
    $T->Set('query0_suc_s', $el['suc_s']);
    $T->Set('query0_hits', $el['hits']);
    $T->Set('query0_usuario', $el['usuario']);
    $T->Set('query0_fecha_hora', $el['fecha_hora']);
    $T->Set('query0_duplicado', $el['duplicado']);
    $T->Set('query0_p_compra',  number_format($el['p_compra'], 2, ',', '.'));
	$T->Set('query0_fob',  number_format($el['fob'], 2, ',', '.'));

    if($tipo == 'Todos'){
       $T->Show('query0_data_row');  $j++;
       //echo "No es necesario generar este reporte!!!";
    }else if($tipo == "Faltantes"){
       if($el['codigo']==='' || $el['codigo'] == null){
         $T->Show('query0_data_row');    $j++;
       }        
    }else if($tipo == "Diff. Suc"){
        if(($el['suc_punteo']!= $el['suc_s']) && $el['codigo'] != '' ) {
            
           
          $T->Show('query0_data_row');  $j++;
        }   
    }else{ // Duplicados
       if( $el['duplicado'] === '1'){
          $T->Show('query0_data_row');   $j++;
       } 
    }   
    
    //Actualize Old Values Variables
    $old['p_cod'] = $el['p_cod'];
    $old['p_fam'] = $el['p_fam'];
    $old['p_grupo'] = $el['p_grupo'];
    $old['p_tipo'] = $el['p_tipo'];
    $old['p_color'] = $el['p_color'];
    $old['p_cant'] = $el['p_cant'];
    $old['codigo'] = $el['codigo'];
    $old['suc_punteo'] = $el['suc_punteo'];
    $old['suc_s'] = $el['suc_s'];
    $old['hits'] = $el['hits'];
    $old['usuario'] = $el['usuario'];
    $old['fecha_hora'] = $el['fecha_hora'];
    $old['duplicado'] = $el['duplicado']; 
    $old['p_compra'] = $el['p_compra'];
	$old['fob'] = $el['fob'];
    $firstRow=false;

}

$endConsult = true;
if( true ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Set('total', $i);
    $T->Set('cant', $j);
    $T->Set('duplicados', $duplicados);
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

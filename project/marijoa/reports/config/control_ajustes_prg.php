<?php

/** Report prg file (ajuste_salida) 
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
$T->Set( 'sup_desde', '2012-10-27');
$T->Set( 'sup_hasta', '2012-10-27');
$T->Set( 'sup_usuario', '%');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_conc_ajuste', 'Descuento%');
$T->Set( 'sup_oper', 'Aumento en Salida');
$T->Set( 'sup_tipo_ajuste', 'Descuento');
$T->Set( 'sup_rep_salida', '');
 * /*
 */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT aj_prod AS CODIGO,date_format(aj_fecha,"%d-%m-%Y") AS FECHA,aj_hora AS HORA ,aj_usuario AS USUARIO,aj_inicial AS C_INI, aj_ajuste AS AJUSTE,aj_final AS C_FINAL, aj_oper AS OPERACION, aj_motivo AS MOTIVO   FROM mnt_ajustes  WHERE aj_fecha BETWEEN '2012-10-27' AND '2012-10-27' AND aj_usuario LIKE '%' AND aj_oper LIKE 'Aumento en Salida' AND aj_motivo LIKE 'Descuento%'";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );
  

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);

$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

$filtro_tol = $sup['filtro_tol'];
$tolerancia = $sup['tolerancia'] / 100;   // 0.02

if($filtro_tol == "Si"){ 
    $T->Set('tol',"Cortes Fuera de Tolerancia (".$sup['tolerancia']." cm * metro)");
}else{
    $T->Set('tol','');
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

//Define a Subtotal Variables


//Define a Old Values Variables
$old['ID'] = '';
$old['CODIGO'] = '';
$old['FECHA'] = '';
$old['HORA'] = '';
$old['USUARIO'] = '';
$old['C_INI'] = '';
$old['AJUSTE'] = '';
$old['C_FINAL'] = '';
$old['OPERACION'] = '';
$old['MOTIVO'] = '';
$old['CANT_V'] = '';
$old['VERIF'] = '';
$old['USUARIO'] = '';
$old['FP'] = '';

$total_monto = 0;
// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['ID'] = $Q0->Record['ID'];
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['HORA'] = $Q0->Record['HORA'];
    $el['USUARIO'] = $Q0->Record['USUARIO'];
    $el['C_INI'] = $Q0->Record['C_INI'];
    $el['AJUSTE'] = $Q0->Record['AJUSTE'];
    $el['C_FINAL'] = $Q0->Record['C_FINAL'];
    $el['OPERACION'] = $Q0->Record['OPERACION'];
    $el['MOTIVO'] = $Q0->Record['MOTIVO'];
    $el['CANT_V'] = $Q0->Record['CANT_V'];
    $el['VERIF'] = $Q0->Record['VERIF'];
    $el['USUARIO'] = $Q0->Record['USUARIO'];
	$el['FP'] = $Q0->Record['FP'];
    $id = $el['ID'];

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_HORA', $el['HORA']);
    $T->Set('query0_CANT_V', $el['CANT_V']);
    $T->Set('query0_USUARIO', $el['USUARIO']);
    $T->Set('query0_C_INI', number_format($el['C_INI'],2,',','.'));
    $T->Set('query0_AJUSTE',number_format( $el['AJUSTE'],2,',','.'));
    $T->Set('query0_C_FINAL',number_format( $el['C_FINAL'],2,',','.'));
    $T->Set('query0_OPERACION', $el['OPERACION']);  
	$T->Set('query0_FP', $el['FP']);  
    $T->Set('id', $id);  
    
    
    if($el['VERIF'] != ""){
       $T->Set('query0_VERIF', $el['VERIF']);
    }else{
        $verif_cod = '<input type="checkbox" id="check_'.$id.'">';
        $T->Set('query0_VERIF', $verif_cod);
    }
    
    
    $T->Set('query0_USUARIO', $el['USUARIO']);
    
    $motivo =  $el['MOTIVO'];
    
    $pos = strpos($motivo,"Monto :");
    $posVend = strpos($motivo,"Vend:");
     
    $monto = substr($motivo,$pos + 7, $posVend);
    
    $vendedor = substr($motivo,$posVend + 5, 60);
    
    $T->Set('vendedor',$vendedor);
    
    $cant_v = $el['CANT_V'];
    $ajuste = $el['AJUSTE'];
    $calc_tol = $cant_v * $tolerancia;
    
    if($filtro_tol == "Si"){ 
        if($ajuste > $calc_tol){        
           $total_monto += 0 + $monto;
           $T->Set('monto',number_format($monto,0,',','.')); 
        } 
    }else{
       $total_monto += 0 + $monto;
       $T->Set('monto',number_format($monto,0,',','.')); 
    }    
    
    
    $T->Set('total_monto', number_format($total_monto,0,',','.')); 

        
    $motivo = substr($motivo,0, $pos);
    $T->Set('query0_MOTIVO',$motivo);
    
    // Calculating a total

    // Calculating a subtotal
    
    
    if($filtro_tol == "Si"){
        
        if($ajuste > $calc_tol){        
          $T->Show('query0_data_row');
        }
        
    }else{
      $T->Show('query0_data_row');
    }    
    // Show Subtotal
    if( true ){
        //$T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['ID'] = $el['ID'];
    $old['CODIGO'] = $el['CODIGO'];
    $old['FECHA'] = $el['FECHA'];
    $old['HORA'] = $el['HORA'];
    $old['USUARIO'] = $el['USUARIO'];
    $old['C_INI'] = $el['C_INI'];
    $old['AJUSTE'] = $el['AJUSTE'];
    $old['C_FINAL'] = $el['C_FINAL'];
    $old['OPERACION'] = $el['OPERACION'];
    $old['MOTIVO'] = $el['MOTIVO'];
    $old['CANT_V'] = $el['CANT_V'];     
    $old['VERIF'] = $el['VERIF']; 
    $old['USUARIO'] = $el['USUARIO']; 
    $old['FP'] = $el['FP']; 
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

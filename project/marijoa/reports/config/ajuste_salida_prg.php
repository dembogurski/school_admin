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


$desde = $sup['desde'];
$hasta = $sup['hasta'];
$vend_porc = $sup['vend_porc'];
$suc = $sup['suc_'];
$usuario = $sup['usuario'];
$conc_ajuste = $sup['conc_ajuste'];

$oper = $sup['oper'];
$operacion = "aj_oper LIKE '$oper'";
if($oper == '%'){
    $operacion = "(aj_oper LIKE 'Aumento en Salida' or aj_oper LIKE 'Disminucion en Salida')";
}  
$motivo = "aj_motivo LIKE '$conc_ajuste'";
if($conc_ajuste =='%%'){
    $motivo = "(aj_motivo LIKE '%Descuento%' or  aj_motivo LIKE '%Mal Corte%')";
}

// THIS IS YOUR FIRST QUERY:
$query0 = "SELECT aj_suc AS SUC,aj_prod AS CODIGO,p.prod_fin_pieza AS FDP,date_format(aj_fecha,'%d-%m-%Y') AS FECHA,aj_hora AS HORA ,aj_usuario AS USUARIO,aj_inicial AS C_INI, aj_ajuste AS AJUSTE, aj_signo  as SIGNO,aj_final AS C_FINAL, aj_oper AS OPERACION, aj_motivo AS MOTIVO,"
        . "SUBSTRING_INDEX(aj_motivo, ':', -3) AS CORTE,aj_cant_v AS CANT_V,aj_verificador AS VERIF "
        . "FROM mnt_ajustes a, mnt_prod p  WHERE p.p_cod = a.aj_prod AND aj_fecha BETWEEN '$desde' AND '$hasta' AND aj_usuario LIKE '$usuario' AND $operacion AND $motivo AND aj_suc LIKE '$suc' AND aj_motivo LIKE '$vend_porc' "
        . " ORDER BY a.id asc ";

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
$old['FDP'] = '';
$old['SIGNO'] = '';

$i = 0;
$sum_x_vend = array();
$total_monto = 0;
// Making a rows of consult
while( $Q0->NextRecord() ){
    $i++;
	$T->Set("i", $i);
    // Define a elements
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
    $el['FDP'] = $Q0->Record['FDP'];
    $el['SIGNO'] = $Q0->Record['SIGNO'];
    
    $aj_signo =  $el['SIGNO'];

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
    $T->Set('query0_VERIF', $el['VERIF']);  
    $T->Set('query0_FDP', $el['FDP']);
     
    
    if($el['SIGNO'] == "-"){
        $T->Set('signo', "+");
    }else{
        $T->Set('signo', "-");
    }
         
    
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
		  $sum_x_vend[$vendedor] += $monto;
        }
        
    }else{
      $T->Show('query0_data_row');
	  $sum_x_vend[$vendedor] += $monto;
    }    
    // Show Subtotal
    if( true ){
        //$T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
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
    $old['FDP'] = $el['FDP']; 
    $old['SIGNO'] = $el['SIGNO'];  
    $firstRow=false;
    
}


$endConsult = true;
if( true ){
    $T->Show('query0_subtotal_row');
}

if($sup['tipo_ajuste']=="Mal Corte"){
	$T->Set('vend','VENDEDOR');
	$T->Set('vend_total','VALOR');
	$T->Set('style','style="text-align: center; font-weight: 900;"');
	$T->Show('query0_total_row_header');
	$T->Show('query0_total_row');
	ksort($sum_x_vend);

	foreach($sum_x_vend as $key => $value){
		//echo "$key = ".number_format($value,0,',','.')." </br>";
		$T->Set('vend',$key);
		$T->Set('vend_total',number_format($value,0,',','.'));
		$T->Set('style','');
		$T->Show('query0_total_row');
	}
}
// Show total
/**
if( true ){
    $T->Show('query0_total_row');
}*/
$T->Show('end_query0');				// Ends a Table 

?>

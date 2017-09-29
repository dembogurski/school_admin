<?php

/** Report prg file (liquidacion_all) 
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
$T->Set( 'sup_fact_mensaje', 'Para imprimir Liquidaciones anteriores Seleccione la Localidad y la  Fecha de liquidación!!!');
$T->Set( 'sup_bloqueo', 'true');
$T->Set( 'sup_sue_localidad', '00');
$T->Set( 'sup_localidad', '03');
$T->Set( 'sup_sue_suc', 'MATRIZ');
$T->Set( 'sup_fecha', '2013-01-01');
$T->Set( 'sup_fecha_inv', '2013-01-01');
$T->Set( 'sup_hasta', '2013-05-10');
$T->Set( 'sup_hastainv', '2013-05-10');
$T->Set( 'sup_busc_func', '%');
$T->Set( 'sup_func_code', '%');
$T->Set( 'sup_imprimir_all', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT s.sue_nro_liquid AS Nro,f.func_fullname AS Funcionario,date_format(s.sue_fecha,"%d-%m-%Y") AS Fecha,s.sue_localidad AS Suc,s.sue_mes AS Mes,s.sue_dias_trab AS dt,s.sue_sueldo AS Sueldo_C,s.sue_extras AS extras_c,s.sue_feriado_c AS feriado_c,s.prec AS preaviso_c,s.indc AS Ind_c,s.vacc AS Vac_c,s.sue_reposo AS reposo,  s.sue_reposo  AS TOTAL_CONT,s.sue_ips AS IPS, s.sue_ips*16.5/25.5 AS Aporte_Pat,s.sue_ips*9/25.5 AS Aporte_Obrero,s.sue_desc_actual AS Descuento,s.sue_recup AS Recup,  s.sue_recup  AS TOTAL_PAGAR_1,  s.sue_recup   AS DIFF_SALARIO, s.sue_sum_comi AS Comision, s.agui AS Aguinaldo,s.pre AS Preaviso,s.ind AS Indenm,s.vac AS Vacaciones,s.sue_extras_r AS Horas_ExtrasR,   s.sue_extras_r AS TOTAL_PAGAR_2  from  sueldos_func s, mnt_func f WHERE f.func_cod =s.sue_cod_func and sue_fecha BETWEEN '2013-01-01' AND  '2013-05-10'  AND sue_cod_func LIKE  '%' AND sue_localidad LIKE '03' ";

$suc = $sup['localidad'];
$desde = $sup['fecha'];
$hasta = $sup['hasta'];
$func_code = $sup['func_code'];

$data_ini = substr($sup['fecha'],8,2).'-'.substr($sup['fecha'],5,2).'-'.substr($sup['fecha'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);

if($suc == '%'){
    $T->Set('suc','Todas');
}else{
    $T->Set('suc',$sup['sue_suc']); 
}

$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);


$query0 = "SELECT s.sue_nro_liquid AS Nro,f.func_fullname AS Funcionario,date_format(s.sue_fecha,'%d-%m-%Y') AS Fecha,s.sue_localidad AS Suc,s.sue_mes AS Mes,s.sue_dias_trab AS dt
,s.sue_sueldo AS Sueldo_C,s.sue_sueldo_r as Sueldo_R,s.sue_extras AS extras_c,s.sue_feriado_c AS feriado_c,s.sue_feriado_r,s.prec AS preaviso_c,s.indc AS Ind_c,s.vacc AS Vac_c,s.sue_reposo AS reposo,
s.sue_reposo AS reposo,(s.sue_sueldo + s.sue_extras + s.sue_feriado_c - s.sue_reposo)  AS TOTAL_CONT,
s.sue_ips AS IPS, s.sue_ips*16.5/25.5 AS Aporte_Pat,s.sue_ips*9/25.5 AS Aporte_Obrero,s.sue_desc_actual AS Descuento,s.sue_desc_r AS DescuentoR,
s.sue_recup AS Recup, 
(s.sue_sueldo + s.sue_extras + sue_feriado_c -  sue_reposo -(s.sue_ips*9/25.5) - s.sue_desc_actual)  AS TOTAL_PAGAR_1, 
s.sue_sueldo_r - s.sue_sueldo - s.sue_extras AS DIFF_SALARIO,
s.sue_sum_comi AS Comision, s.agui AS Aguinaldo,s.pre AS Preaviso,s.ind AS Indenm,s.vac AS Vacaciones,s.sue_extras_r AS Horas_ExtrasR,  
(s.sue_sueldo_r - (s.sue_sueldo + s.sue_extras -(s.sue_ips*9/25.5) - s.sue_recup)) + s.sue_sum_comi + s.aguic + (pre - prec) + (ind -indc) + (vac - vacc) + s.sue_extras_r as TOTAL_PAGAR_2  
from  sueldos_func s, mnt_func f WHERE f.func_cod =s.sue_cod_func and sue_fecha BETWEEN '$desde' AND  '$hasta'  AND sue_cod_func LIKE  '$func_code' AND sue_localidad LIKE '$suc' ";


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
$subtotal0_TOTAL_CONT = 0;
$subtotal0_TOTAL_PAGAR_1 = 0;
$subtotal0_DIFF_SALARIO = 0;
$subtotal0_TOTAL_PAGAR_2 = 0;


//Define a Old Values Variables
$old['Nro'] = '';
$old['Funcionario'] = '';
$old['Fecha'] = '';
$old['Suc'] = '';
$old['Mes'] = '';
$old['dt'] = '';
$old['Sueldo_C'] = '';  
$old['Sueldo_R'] = ''; 
$old['extras_c'] = '';
$old['feriado_c'] = '';
$old['feriado_r'] = '';
$old['preaviso_c'] = '';
$old['Ind_c'] = '';
$old['Vac_c'] = '';
$old['reposo'] = '';
$old['TOTAL_CONT'] = '';
$old['IPS'] = '';
$old['Aporte_Pat'] = '';
$old['Aporte_Obrero'] = '';
$old['Descuento'] = '';
$old['DescuentoR'] = '';
$old['Recup'] = '';
$old['TOTAL_PAGAR_1'] = '';
$old['DIFF_SALARIO'] = '';
$old['Comision'] = '';
$old['Aguinaldo'] = '';
$old['Preaviso'] = '';
$old['Indenm'] = '';
$old['Vacaciones'] = '';
$old['Horas_ExtrasR'] = '';
$old['TOTAL_PAGAR_2'] = '';

 

// Making a rows of consult
while( $Q0->NextRecord() ){
    
    $asiento_sueldos = 0;
    $asiento_liq = 0;
    $desembolso = 0;
    
    // Define a elements
    $el['Nro'] = $Q0->Record['Nro'];
    $el['Funcionario'] = $Q0->Record['Funcionario'];
    $el['Fecha'] = $Q0->Record['Fecha'];
    $el['Suc'] = $Q0->Record['Suc'];
    $el['Mes'] = $Q0->Record['Mes'];
    $el['dt'] = $Q0->Record['dt'];
    $el['Sueldo_C'] = $Q0->Record['Sueldo_C'];
    $el['Sueldo_R'] = $Q0->Record['Sueldo_R'];
    $el['extras_c'] = $Q0->Record['extras_c'];
    $el['feriado_c'] = $Q0->Record['feriado_c'];  
    $el['feriado_r'] = $Q0->Record['feriado_r']; 
    $el['preaviso_c'] = $Q0->Record['preaviso_c'];
    $el['Ind_c'] = $Q0->Record['Ind_c'];
    $el['Vac_c'] = $Q0->Record['Vac_c'];
    $el['reposo'] = $Q0->Record['reposo'];
    $el['TOTAL_CONT'] = $Q0->Record['TOTAL_CONT'];
    $el['IPS'] = $Q0->Record['IPS'];
    $el['Aporte_Pat'] = $Q0->Record['Aporte_Pat'];
    $el['Aporte_Obrero'] = $Q0->Record['Aporte_Obrero'];
    $el['Descuento'] = $Q0->Record['Descuento'];
    $el['DescuentoR'] = $Q0->Record['DescuentoR'];
    $el['Recup'] = $Q0->Record['Recup'];
    $el['TOTAL_PAGAR_1'] = $Q0->Record['TOTAL_PAGAR_1'];
    $el['DIFF_SALARIO'] = $Q0->Record['DIFF_SALARIO'];
    $el['Comision'] = $Q0->Record['Comision'];
    $el['Aguinaldo'] = $Q0->Record['Aguinaldo'];
    $el['Preaviso'] = $Q0->Record['Preaviso'];
    $el['Indenm'] = $Q0->Record['Indenm'];
    $el['Vacaciones'] = $Q0->Record['Vacaciones'];
    $el['Horas_ExtrasR'] = $Q0->Record['Horas_ExtrasR'];
    $el['TOTAL_PAGAR_2'] = $Q0->Record['TOTAL_PAGAR_2'];

    // Preparing a template variables
    $T->Set('query0_Nro', $el['Nro']);
    $T->Set('query0_Funcionario', $el['Funcionario']);
    $T->Set('query0_Fecha', $el['Fecha']);
    $T->Set('query0_Suc', $el['Suc']);
    $T->Set('query0_Mes', $el['Mes']);
    $T->Set('query0_dt', $el['dt']);
    $T->Set('query0_Sueldo_C', number_format($el['Sueldo_C'],0,',','.'));
    $T->Set('query0_Sueldo_R', number_format($el['Sueldo_R'],0,',','.')); 
    $T->Set('query0_extras_c', number_format($el['extras_c'],0,',','.'));
    $T->Set('query0_feriado_c', number_format($el['feriado_c'],0,',','.'));
    $T->Set('query0_preaviso_c', number_format($el['preaviso_c'],0,',','.'));
    $T->Set('query0_Ind_c', number_format($el['Ind_c'],0,',','.'));
    $T->Set('query0_Vac_c', number_format($el['Vac_c'],0,',','.'));
    $T->Set('query0_reposo', number_format($el['reposo'],0,',','.'));
    $T->Set('query0_TOTAL_CONT', number_format($el['TOTAL_CONT'],0,',','.'));
    $T->Set('query0_IPS', number_format($el['IPS'],0,',','.'));
    $T->Set('query0_Aporte_Pat', number_format($el['Aporte_Pat'],0,',','.'));
    $T->Set('query0_Aporte_Obrero', number_format($el['Aporte_Obrero'],0,',','.'));
    $T->Set('query0_Descuento', number_format($el['Descuento'],0,',','.'));
    $T->Set('query0_DescuentoR', number_format($el['DescuentoR'],0,',','.'));
    $T->Set('query0_Recup', number_format($el['Recup'],0,',','.'));
    $T->Set('query0_TOTAL_PAGAR_1', number_format($el['TOTAL_PAGAR_1'],0,',','.'));
    $T->Set('query0_DIFF_SALARIO', number_format($el['DIFF_SALARIO'],0,',','.'));
    $T->Set('query0_Comision', number_format($el['Comision'],0,',','.'));
    $T->Set('query0_Aguinaldo', number_format($el['Aguinaldo'],0,',','.'));
    $T->Set('query0_Preaviso', number_format($el['Preaviso'],0,',','.'));
    $T->Set('query0_Indenm', number_format($el['Indenm'],0,',','.'));
    $T->Set('query0_Vacaciones', number_format($el['Vacaciones'],0,',','.'));
    $T->Set('query0_Horas_ExtrasR', number_format($el['Horas_ExtrasR'],0,',','.'));
    $T->Set('query0_TOTAL_PAGAR_2', number_format($el['TOTAL_PAGAR_2'],0,',','.'));
    
    // Calculo de Valor de Asientos
    //SET SyJ = suel_r + ext_r + fer_r - dsc - reposo ;   
    
    $asiento_sueldos = $el['Sueldo_R']  +  $el['Horas_ExtrasR']   +  $el['feriado_r']  - $el['DescuentoR'] -  $el['reposo'];
    $asiento_liq =  $el['Preaviso'] + $el['Indenm'] + $el['Vacaciones'];
    
    $desembolso = $el['TOTAL_PAGAR_1'] - $el['Recup'];
    
            
    $T->Set('asiento_sueldos', number_format($asiento_sueldos,0,',','.'));
    $T->Set('asiento_liq', number_format($asiento_liq,0,',','.'));
    $T->Set('desembolso', number_format($desembolso,0,',','.'));
    
    
    // Calculating a subtotal
    $subtotal0_TOTAL_CONT += 0 + $el['TOTAL_CONT'];
    $subtotal0_TOTAL_PAGAR_1 += 0 + $el['TOTAL_PAGAR_1'];
    $subtotal0_DIFF_SALARIO += 0 + $el['DIFF_SALARIO'];
    $subtotal0_TOTAL_PAGAR_2 += 0 + $el['TOTAL_PAGAR_2'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_TOTAL_CONT', number_format($subtotal0_TOTAL_CONT,0,',','.'));
    $T->Set('subtotal0_TOTAL_PAGAR_1', number_format($subtotal0_TOTAL_PAGAR_1,0,',','.'));
    $T->Set('subtotal0_DIFF_SALARIO', number_format($subtotal0_DIFF_SALARIO,0,',','.'));
    $T->Set('subtotal0_TOTAL_PAGAR_2', number_format($subtotal0_TOTAL_PAGAR_2,0,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_TOTAL_CONT = 0;
        $subtotal0_TOTAL_PAGAR_1 = 0;
        $subtotal0_DIFF_SALARIO = 0;
        $subtotal0_TOTAL_PAGAR_2 = 0;
    }
    
    //Actualize Old Values Variables
    $old['Nro'] = $el['Nro'];
    $old['Funcionario'] = $el['Funcionario'];
    $old['Fecha'] = $el['Fecha'];
    $old['Suc'] = $el['Suc'];
    $old['Mes'] = $el['Mes'];
    $old['dt'] = $el['dt'];
    $old['Sueldo_C'] = $el['Sueldo_C'];  
    $old['Sueldo_R'] = $el['Sueldo_R'];  
    $old['extras_c'] = $el['extras_c'];
    $old['feriado_c'] = $el['feriado_c']; 
    $old['feriado_r'] = $el['feriado_r']; 
    $old['preaviso_c'] = $el['preaviso_c'];
    $old['Ind_c'] = $el['Ind_c'];
    $old['Vac_c'] = $el['Vac_c'];
    $old['reposo'] = $el['reposo'];
    $old['TOTAL_CONT'] = $el['TOTAL_CONT'];
    $old['IPS'] = $el['IPS'];
    $old['Aporte_Pat'] = $el['Aporte_Pat'];
    $old['Aporte_Obrero'] = $el['Aporte_Obrero'];
    $old['Descuento'] = $el['Descuento'];
    $old['DescuentoR'] = $el['DescuentoR'];
    $old['Recup'] = $el['Recup'];
    $old['TOTAL_PAGAR_1'] = $el['TOTAL_PAGAR_1'];
    $old['DIFF_SALARIO'] = $el['DIFF_SALARIO'];
    $old['Comision'] = $el['Comision'];
    $old['Aguinaldo'] = $el['Aguinaldo'];
    $old['Preaviso'] = $el['Preaviso'];
    $old['Indenm'] = $el['Indenm'];
    $old['Vacaciones'] = $el['Vacaciones'];
    $old['Horas_ExtrasR'] = $el['Horas_ExtrasR'];
    $old['TOTAL_PAGAR_2'] = $el['TOTAL_PAGAR_2'];
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

?>

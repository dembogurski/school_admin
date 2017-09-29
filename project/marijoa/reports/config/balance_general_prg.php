<?php

/** Report prg file (balance_general) 
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
$T->Set( 'sup_suc', '%');
$T->Set( 'sup_desde', '2012-11-16');
$T->Set( 'sup_hasta', '2012-11-16');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_emp_bus', 'ac');
$T->Set( 'sup_emp_cta_cont', '%');
$T->Set( 'sup_gen_mayor', '');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_as_huerfanos', '');
$T->Set( 'sup_as_sumas', '');
$T->Set( 'sup_nivel', '1');
$T->Set( 'sup_as_balance', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT c_cod AS CODIGO,c_descrip AS CUENTA,c_int AS C_INT FROM plan_cuentas WHERE c_cod LIKE '%' AND c_nivel LIKE '1' ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );
 
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4); 
$T->Set('hasta',$data_fin);

$db = new Y_DB();
$db->Database = $Global['project']; 

$fecha = $sup['hasta'];
$nivel =  $sup['nivel'];

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
$old['CUENTA'] = '';
$old['C_INT'] = '';

$TOTAL_ACTIVO = 0;
$TOTAL_PASIVO = 0;
$TOTAL_P_NETO = 0;

$TOTAL_INGRESOS = 0;
$TOTAL_EGRESOS = 0;





$masterInt = array();

global $masterInt; 

$hashInt = array();
global $hashInt; 

$nombreCuentas = array();
global $nombreCuentas; 

$niveles = array();
global $niveles; 

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['CUENTA'] = $Q0->Record['CUENTA'];
    $el['C_INT'] = $Q0->Record['C_INT'];
    $el['NIVEL'] = $Q0->Record['NIVEL'];
       
    
    $codigo = $el['CODIGO'];
    
    $nombreCuentas[$codigo]= $el['CUENTA'];
    $niveles[$codigo]= $el['NIVEL'];
    
    $db->Query("SELECT saldo FROM asientos_cont a,asientos_det d WHERE a.nro_as = d.nro_as  AND codigo = '$codigo' AND fecha <= '$fecha' ORDER BY d.id DESC LIMIT 1");
         
     
    $db->NextRecord();
         
    $saldo = $db->Record['saldo'];
            
    
    if($saldo != ''){
                  
        // Agrego al arreglo la cuenta y su saldo
        $cuenta = $el['CODIGO'];
        $masterInt[$cuenta] =  $saldo;
        
        // Resultado del Ejercicio
        $codigo_cuenta = substr($cuenta, 0, 1);
        if($codigo_cuenta == "1"){ // Activo
            $TOTAL_ACTIVO += 0 +$saldo;
        }else if($codigo_cuenta == "2"){ // Pasivo
            $TOTAL_PASIVO += 0 +$saldo;
        }else if($codigo_cuenta == "2.03"){ // Ingresos
            $TOTAL_P_NETO += 0 +$saldo;
        }else if($codigo_cuenta == "3"){ // Ingresos
            $TOTAL_INGRESOS += 0 +$saldo;
        }else{ // Egresos
            $TOTAL_EGRESOS += 0 +$saldo;
        }
        
        
    
        //Busco en el Arreglo la cuenta Integradora si no existe cargo si existe sumo sumo el valor
        $integ = $el['C_INT'];
        $integradora = $masterInt[$integ]; 
        
        if($integradora == null){
           $masterInt[$integ] =  $saldo;
           buscar_integrador( $integ, $saldo);       
        }else{
           $saldo_ant = $masterInt[$integ]; 
           $saldo_ant += 0 +$saldo;
           $masterInt[$integ] = $saldo_ant;
           buscar_integrador( $integ, $saldo);          
        } 
        
    }
      
    // $T->Show('query0_subtotal_row'); 
       
    $old['CODIGO'] = $el['CODIGO'];
    $old['CUENTA'] = $el['CUENTA'];
    $old['C_INT'] = $el['C_INT'];
    $old['NIVEL'] = $el['NIVEL'];
    $firstRow=false; 
}

function buscar_integrador($codigo_cuenta, $saldo){
   global $masterInt; 
   global $hashInt; 
   global $nombreCuentas; 
   global $niveles;

   //Buscar en el arreglo si no esta buscar la integradora 
   if($codigo_cuenta == ''){
       return;
   }else{
        if($nombreCuentas[$codigo_cuenta] == null){
            $db3 = new Y_DB();
            $db3->Database = $Global['project'];
            $db3->Query("select c_cod, c_descrip, c_nivel  as nivel from plan_cuentas where c_cod = '$codigo_cuenta'");
            $db3->NextRecord();      
            $c_cod = $db3->Record['c_cod'];      
            $c_descrip = $db3->Record['c_descrip'];
            $c_nivel = $db3->Record['nivel']; 

            $nombreCuentas[$c_cod]=  $c_descrip;
            $niveles[$c_cod]= $c_nivel;  
        }
   }
   $intg = $hashInt[$codigo_cuenta]; 
   if($intg == null){
      $db2 = new Y_DB();
      $db2->Database = $Global['project'];
      $db2->Query("select c_int  from plan_cuentas where c_cod = '$codigo_cuenta'");   
      $db2->NextRecord();
      $c_int = $db2->Record['c_int']; 
      
      if($c_int != ''){
         
        $db3 = new Y_DB();
        $db3->Database = $Global['project'];
        $db3->Query("select c_cod, c_descrip, c_nivel  as nivel from plan_cuentas where c_cod = '$c_int'");
        $db3->NextRecord();      
        $c_cod = $db3->Record['c_cod'];      
        $c_descrip = $db3->Record['c_descrip'];
        $c_nivel = $db3->Record['nivel']; 
            
        $nombreCuentas[$c_cod]=  $c_descrip;
        $niveles[$c_cod]= $c_nivel;
      
        //echo "$c_int -->  $c_cod --> $c_descrip  <br>";  
        $hashInt[$codigo_cuenta] = $c_int; 
        $intg = $c_int;
      }else{
         return; 
      }
   }
   $integradora = $masterInt[$intg]; 
   
   if($integradora == null){
       $masterInt[$intg] =  $saldo;
       $integradora = $masterInt[$intg];
        
   }else{
      $saldo_ant = $masterInt[$intg]; 
      $saldo_ant += 0 +$saldo;
      $masterInt[$intg] = $saldo_ant; 
   } 
   buscar_integrador( $intg, $saldo);          
   // Busco la cuenta integradora en el masterInt
     
}

ksort($masterInt);

$indentado = ""; 
$i= 0;
foreach ($masterInt as $key => $value) {
   // echo $key."     -->  ".$value."<br>";   
   
   $cuenta  = $nombreCuentas[$key];
   $nvl  = $niveles[$key];
   
   for($i = 1;$i < $nvl; $i++ ){
       $indentado = $indentado."&nbsp;&nbsp;&nbsp;&nbsp;";
   }
   if($nvl < 5){
      $T->Set('estilo', 'bolder');
   }else{
      /*if($i % 2 > 0){
        $T->Set('fondo', 'white');
      }else{
        $T->Set('fondo', 'lightgray');  
      }*/
      
      $T->Set('estilo', 'normal');
   }
   
   $T->Set('query0_CODIGO', $key);
   $T->Set('query0_CUENTA',$indentado.$cuenta);
   
     
   $T->Set('saldo',number_format($value,2,',','.'));
   if($nvl <= $nivel || $nivel == '%'  ){
     $T->Show('query0_data_row');
   }
   $indentado = "";
   $i++;
}
$T->Show('end_query0');	


$T->Set('total_activo',number_format($TOTAL_ACTIVO,2,',','.'));
$T->Set('total_pasivo',number_format($TOTAL_PASIVO,2,',','.'));
$T->Set('total_ingresos',number_format($TOTAL_INGRESOS,2,',','.'));
$T->Set('total_egresos',number_format($TOTAL_EGRESOS,2,',','.'));
$T->Set('total_p_neto',number_format($TOTAL_P_NETO,2,',','.'));
$RESULTADO = $TOTAL_INGRESOS - $TOTAL_EGRESOS;
$T->Set('resultado',number_format($RESULTADO,2,',','.'));
 
$T->Show('resultado_ejercicio');	


   // 2.03  = Patrimonio Neto



 /*
global $nombreCuentas;
foreach ($nombreCuentas as $key => $value) {
    echo $key."  --> ".$value."<br>";
} */   








?>

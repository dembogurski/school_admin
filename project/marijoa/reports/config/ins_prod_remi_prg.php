<?php

/** Report prg file (ins_prod_remi) 
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
$T->Set( 'sup_rem_nro', '34710');
$T->Set( 'sup___local', '02');
$T->Set( 'sup_rem_fecha', '2012-05-07');
$T->Set( 'sup_rem_origen', '02');
$T->Set( 'sup_rem_dir_origen', 'AVENIDA');
$T->Set( 'sup_rem_destino', '01');
$T->Set( 'sup_rem_dir_destino', '');
$T->Set( 'sup_rem_busc_vend', '');
$T->Set( 'sup_rem_vend_cod', '');
$T->Set( 'sup_blaser', 'Buscador');
$T->Set( 'sup_cod', '');
$T->Set( 'sup_codigo', '%');
$T->Set( 'sup_buscador', '');
$T->Set( 'sup_found', 'No Encontrado');
$T->Set( 'sup_enviar', 'false');
$T->Set( 'sup_movto', 'No');
$T->Set( 'sup_rem_open', '');
$T->Set( 'sup_mov', 'false');
$T->Set( 'sup_hfocus', '');
$T->Set( 'sup_select_text', '');
$T->Set( 'sup_rem_func_nombre', '');
$T->Set( 'sup_gen_rem', 'No');
$T->Set( 'sup_rem_insgroup', 'Laser');
$T->Set( 'sup_rem_procede', '');
$T->Set( 'sup_rem_group', '');
$T->Set( 'sup_rem_detalle', '');
$T->Set( 'sup_rem_estado', 'Abierta');
$T->Set( 'sup_rem_fin', 'No');
$T->Set( 'sup_rem_tot', 'false');
$T->Set( 'sup_rem_tot_piez', '');
$T->Set( 'sup_rem_env', '');
$T->Set( 'sup_rem_aceptar', 'false');
$T->Set( 'sup_rem_imprimir', '');
$T->Set( 'sup_rem_sent', '');
$T->Set( 'sup_rem_obs', '');
$T->Set( 'sup_rem_receptor', 'Developer');
$T->Set( 'sup___lock', '');
$T->Set( 'sup_corr_cants', '');
$T->Set( 'sup___disableDel', '');
$T->Set( 'sup___enableDel', 'true');
$T->Set( 'sup___insert', '');
$T->Set( 'sup___change', '');
$T->Set( 'sup___update', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select 1 as GRUPO_CODIGOS";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );


$codigos = trim($sup['rem_group']);

$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');

if($codigos==""){
  $T->Set('color','red'); 
  $T->Set('mensaje',"Nada que procesar!!!");  
  $T->Show('query0_data_row');
  die();
} 

$nro = $sup['rem_nro'];
$origen = $sup['rem_origen'];

$codigos = str_replace(" ","\n",$codigos);

$array = explode("\n",$codigos);

$array_limpio = array_unique($array);
 



 
$Q0 = $DB;
//$Q0->Query( $query0 );

 


$db = new Y_DB();
$db->Database = $Global['project'];
      
 
 
foreach ($array_limpio as $codigo){
   $cod = trim($codigo); 
   $T->Set('query0_GRUPO_CODIGOS',$cod);
   
   $Q0->Query("SELECT r.rem_nro AS NRO, r.rem_estado AS ESTADO, DATE_FORMAT(r.rem_fecha,'%d-%m-%Y') AS FECHA 
         FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND r.rem_estado != 'Cerrada' AND d.df_cod_prod = '$cod' ");
           
   if($Q0->NumRows()>0){
       $Q0->NextRecord();
       $nro_remito = $Q0->Record['NRO'];
       $estado = $Q0->Record['ESTADO'];
       $fecha = $Q0->Record['FECHA'];
       
       $T->Set('color','red'); 
       $T->Set('mensaje',"Codigo en Remici&oacute;n ''$estado'' N&deg;: $nro_remito  de Fecha: $fecha");
   }else{
      $T->Set('color','green');  
      $T->Set('mensaje','Ok'); 
      $db->Query("SELECT  CONCAT(p_grupo,'-',p_tipo,'-',p_color,'-',p_descri) AS DESCRIP,p_cant as CANT, p_local AS LOCAL, prod_fin_pieza as FDP FROM mnt_prod WHERE p_cod = $cod");
           
      if($db->NumRows()>0){      
          $db->NextRecord();
          
          // Validaciones
          
          $descrip = $db->Record['DESCRIP'];
          $local = $db->Record['LOCAL'];
          $fdp = $db->Record['FDP']; 
          $cant = $db->Record['CANT'];
          if($fdp != "Si"){
             
            if($local === $origen){  
                $T->Set('color','green');  
                $db->Query( "INSERT INTO remito_det(rem_nro,df_cod_prod,df_descrip,df_disponible,enviado) VALUES($nro,$cod,'$descrip',$cant,'Enviado');" );
            }else{
             $T->Set('color','red'); 
             $T->Set('mensaje',"Origen distinto de Sucursal del Producto!!! ($local)");    
            }
          }else{
            $T->Set('color','red'); 
            $T->Set('mensaje',"Codigo con Fin de Pieza!!!");    
          }
      }else{
        $T->Set('color','red'); 
        $T->Set('mensaje',"Codigo No Existe!!!"); 
      }
   } 
   
   
   
   $T->Show('query0_data_row');
   
   
   
}    

 
 
    
     
 

 
$T->Show('end_query0');				// Ends a Table 

?>

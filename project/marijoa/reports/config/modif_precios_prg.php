<?php

/** Report prg file (modif_precios) 
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
$T->Set( 'sup___lock', '');
$T->Set( 'sup_nro', '116');
$T->Set( 'sup_usuario', 'Developer');
$T->Set( 'sup_u_suc', '02');
$T->Set( 'sup_fecha', '2013-09-20');
$T->Set( 'sup_codigo', '66613');
$T->Set( 'sup_p_cant', '27.00');
$T->Set( 'sup_p_suc', '02');
$T->Set( 'sup_p_fdp', 'No');
$T->Set( 'sup_p_ref', '6832');
$T->Set( 'sup_descrip', 'FORROS-DIOLEN-LISO DE 1.5-SALMON-16* (16)');
$T->Set( 'sup_motivo', 'F1');
$T->Set( 'sup_cant_f', '20');
$T->Set( 'sup_tipo_mod', 'Codigo Hijo');
$T->Set( 'sup_p_valmin', '2415');
$T->Set( 'sup_p_compra', '1988');
$T->Set( 'sup_p_precio_1', '3000');
$T->Set( 'sup_p_precio_1n', '3000');
$T->Set( 'sup_p_precio_2', '3000');
$T->Set( 'sup_p_precio_2n', '3000');
$T->Set( 'sup_p_precio_3', '2800');
$T->Set( 'sup_p_precio_3n', '2800');
$T->Set( 'sup_p_precio_4', '2700');
$T->Set( 'sup_p_precio_4n', '2700');
$T->Set( 'sup_p_precio_5', '2700');
$T->Set( 'sup_p_precio_5n', '2700');
$T->Set( 'sup___lock2', 'true');
$T->Set( 'sup_msg', '');
$T->Set( 'sup_obs', 'xxxx');
$T->Set( 'sup_msg1', '');
$T->Set( 'sup_msg2', '');
$T->Set( 'sup_msg3', '');
$T->Set( 'sup_style1', '');
$T->Set( 'sup_style2', '');
$T->Set( 'sup_style3', '');
$T->Set( 'sup_upload_images', '');
$T->Set( 'sup_proceder_frac', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select _autonum("nro") as NRO";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$user = $Global['username'];

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

$nro = $sup['nro'];

$p_ref = $sup['p_ref'];

$p_suc = $sup['p_suc'];
$p_valmin = $sup['p_valmin'];
$p_compra = $sup['p_compra'];

$p1 = $sup['p_precio_1'];
$p2 = $sup['p_precio_2'];
$p3 = $sup['p_precio_3'];
$p4 = $sup['p_precio_4'];
$p5 = $sup['p_precio_5'];
$p6 = $sup['p_precio_6'];
$p7 = $sup['p_precio_6'];

$p1n = $sup['p_precio_1n'];
$p2n = $sup['p_precio_2n'];
$p3n = $sup['p_precio_3n'];
$p4n = $sup['p_precio_4n'];
$p5n = $sup['p_precio_5n'];
$p6n = $sup['p_precio_6n'];
$p7n = $sup['p_precio_7n'];


$motivo = $sup['motivo'];
$obs = $sup['obs'];


$db = new Y_DB(); 
$db->Database = 'marijoa';

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header


$codigo_padre = $sup['codigo'];     
$cant_padre = $sup['p_cant'];
$cant_hijo = $sup['cant_f'];
$modificar = $sup['tipo_mod'];
    
$saldo_padre = $cant_padre - $cant_hijo;
    
$vol_actual = 0;  
//Define a Subtotal Variables


//Define a Old Values Variables
$old['NRO'] = '';

function registrar($usuario,$codigo,$p_valmin,$p_precio_1,$p_precio_2,$p_precio_3,$p_precio_4,$p_precio_5,$p_precio_6,$p_precio_7,$p_compra,$p_precio_1n,$p_precio_2n,$p_precio_3n,$p_precio_4n,$p_precio_5n,$p_precio_6n,$p_precio_7n,$p_suc,$p_cant,$motivo,$obs,$nro,$volumen_orig,$vol_actual){
  $reg =  "INSERT INTO hist_precios
         (usuario,codigo,fecha,p_valmin,p_precio_1,p_precio_2,p_precio_3,p_precio_4,p_precio_5,p_precio_6,p_precio_7,p_compra,p_precio_1n,p_precio_2n,p_precio_3n,p_precio_4n,p_precio_5n,p_precio_6n,p_precio_7n,p_suc,p_cant,motivo,obs,nro,volumen_orig,vol_actual)
  VALUES('$usuario',$codigo,current_date,$p_valmin,$p_precio_1,$p_precio_2,$p_precio_3,$p_precio_4,$p_precio_5,$p_precio_6,$p_compra,$p_precio_7,$p_precio_1n,$p_precio_2n,$p_precio_3n,$p_precio_4n,$p_precio_5n,$p_precio_6n,$p_precio_7n,'$p_suc','$p_cant','$motivo','$obs','$nro',$volumen_orig,$vol_actual);";    
  
  $dbins = new Y_DB(); 
  $dbins->Database = 'marijoa';
  $dbins->Query($reg);
}


// Making a rows of consult
while( $Q0->NextRecord() ){ 
     
   // $nro  = $Q0->Record['NRO'];
    
    
    // Obtengo Sector Grupo y Tipo
    $fgtc = "SELECT p_ref, p_fam, p_grupo,p_tipo, p_color FROM mnt_prod WHERE p_cod = $codigo_padre";
    $db->Query($fgtc);
    $db->NextRecord();
    $fam = $db->Record['p_fam'];
    $gru = $db->Record['p_grupo'];
    $tipo = $db->Record['p_tipo'];
    $color = $db->Record['p_color'];
    
    // Obtengo el volumen original
     $volumen_orginal = 0;
    $sql_vol = "SELECT sum( p_cant_compra) as volumen FROM mnt_prod WHERE p_fam = '$fam' AND p_grupo = '$gru' AND p_tipo = '$tipo' AND p_color = '$color'    AND p_ref = $p_ref AND p_padre = ''";   
    $db->Query($sql_vol);
    if($db->NumRows()>0){
      $db->NextRecord();
      $volumen_orginal = $db->Record['volumen'];
    }else{ // Err
        $volumen_orginal = 0;
    }
	if($volumen_orginal == null ){
	   $volumen_orginal = 0;
	}
    
    
    // Obtengo la sumatoria total hasta el momento para esta Sector Grupo y Tipo
    $vol_actual = 0;  
    $sql_sum = "SELECT  sum(h.p_cant) as sum_actual FROM hist_precios h, mnt_prod p WHERE p.p_cod = h.codigo and p.p_fam = '$fam' AND p.p_grupo = '$gru' AND p.p_tipo = '$tipo' AND p.p_color = '$color' AND p.p_ref = $p_ref";   
    $db->Query($sql_sum);
    if($db->NumRows() > 0){
       $db->NextRecord();
       $vol_actual = $db->Record['sum_actual'];
       if($vol_actual == NULL){
           $vol_actual = 0;
       }
    }else{
       $vol_actual = 0;  
    }
    $vol_actual += 0 + $cant_hijo; // Sumo la cantidad del fraccionamiento actual 
    
    
    $db->Query("SELECT makeLog_('log_precios',concat('Vol Orig ',$volumen_orginal,' Vol. Act. ',$vol_actual,' Padre : ',$cant_padre,' Frac: ',$cant_hijo),'Douglas')");
    
    // echo $sql_sum;
     
    // Verifico las cantidades
    if($cant_hijo == $cant_padre){ // No Fraccionar solo bajar Precios por Falla del Codigo Padre
        $modif = "select modificar_precios($codigo_padre,$p1n,$p2n,$p3n,$p4n,$p5n,'$user')";
        $db->Query($modif);       
        
        // Insertar
        registrar($user,$codigo_padre,$p_valmin,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p_compra,$p1n,$p2n,$p3n,$p4n,$p5n,$p6n,$p7n,$p_suc,$cant_padre,$motivo,$obs,$nro,$volumen_orginal,$vol_actual);
        
    }else{  // Es necesario Fraccionar
        // Select fraccionar
        
        $frac = "select fraccionar($codigo_padre,$cant_hijo,current_date) as codigo_fraccionado";
        $db->Query($frac);
        $db->NextRecord();
        $codigo_fraccionado = $db->Record['codigo_fraccionado'];
        
                   
        $T->Set( 'codigo_fraccionado','<b>Se creo el codigo:</b>   <label style="font-size:22px;font-weight:bolder;color:green">  '.$codigo_fraccionado.' </label> &nbsp; Imprima este codigo y pegue en la pieza ');
        $db->Query("select makeLog_('INSERTAR','$codigo_fraccionado','$user')");
        
        $T->Set( 'imprimir',$codigo_fraccionado);
               
        if($modificar == 'Codigo Hijo'){   // Modificar codigo hijo
            $modif = "select modificar_precios($codigo_fraccionado,$p1n,$p2n,$p3n,$p4n,$p5n,'$user')";
             
            $db->Query($modif);
            
            // Insertar
            
            registrar($user,$codigo_fraccionado,$p_valmin,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p_compra,$p1n,$p2n,$p3n,$p4n,$p5n,$p6n,$p7n,$p_suc,$cant_hijo,$motivo,$obs,$nro,$volumen_orginal,$vol_actual);
            
            $T->Set( 'codigo_modificado','<b>Se han modificado los precios del codigo Fraccionado:</b>  <label style="font-size:16px;font-weight:bolder;color:green">  '.$codigo_fraccionado.'</label> ');
            // echo '<br>Se ha modificado el precio del codigo Fraccionado  '.$codigo_fraccionado;
            
        }else{   // Modificar Codigo Padre
            $modif = "select modificar_precios($codigo_padre,$p1n,$p2n,$p3n,$p4n,$p5n,'$user')";
            
            //echo " Modificar codigo padre.....  ".$modif," <br>";
            $db->Query($modif);
            
            $T->Set( 'codigo_modificado','<b>Se Se han modificado los precios del codigo:</b>  <label style="font-size:14px;font-weight:bolder;color:black">  '.$codigo_padre.'</label> ');
            // Insertar  
            
            $diferencia = $cant_padre - $cant_hijo;
            
            registrar($user,$codigo_padre,$p_valmin,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p_compra,$p1n,$p2n,$p3n,$p4n,$p5n,$p6n,$p7n,$p_suc,$diferencia,$motivo,$obs,$nro,$volumen_orginal,$vol_actual);
            
            $T->Set( 'codigo_modificado','<b>Se han modificado los precios del codigo Padre:</b>  <label style="font-size:14px;font-weight:bolder;color:black">  '.$codigo_padre.'</label> ');
            
        }       
        
    }  
    
    
    
    $T->Set('query0_NRO', $nro);
    $T->Show('query0_data_row');
     
    
    //Actualize Old Values Variables
    $old['NRO'] = $el['NRO'];
     
}
 
$total = $sup['p_cant'] ;

$parcial = $sup['cant_f'] ;

$t1 = ($total - $parcial) * 100 / $total;

$t2 = $parcial * 100 / $total;


if($parcial * 100 /  $total < 19){ // 18%
   $t1 = 80;
   $t2 = 20;
}
    


$T->Set( 't1', $t1 - 0.8);
$T->Set( 't2', $t2 - 0.8);
  
 
 
$T->Show('end_query0');				// Ends a Table 
 

       $T->Set( 'm1',"$p1  <big> &rarr; </big>   $p1n");
       $T->Set( 'm2',"$p2  <big> &rarr; </big>   $p2n");
       $T->Set( 'm3',"$p3  <big> &rarr; </big>   $p3n");
       $T->Set( 'm4',"$p4  <big> &rarr; </big>   $p4n");
       $T->Set( 'm5',"$p5  <big> &rarr; </big>   $p5n");
       $T->Set( 'm6',"$p6  <big> &rarr; </big>   $p6n");
       $T->Set( 'm7',"$p7  <big> &rarr; </big>   $p7n");


if($cant_hijo == $cant_padre){ 
  
   $T->Set( 'titulo',"Precios del Codigo $codigo_padre");   
   $T->Set( 'tejido_fallado_o_sano2', 'Tejido Da&ntilde;ado     ---'.$total.'m---');
    $T->Show('padre'); 
}else{
   if($modificar == 'Codigo Hijo'){
       $T->Set( 'tejido_fallado_o_sano1', 'Tejido Da&ntilde;ado     ---'.$cant_hijo.'m---');
       $T->Set( 'tejido_fallado_o_sano2', 'Tejido Sano     ---'.$saldo_padre.'m---');
      
        $T->Set( 'titulo',"Precios del Codigo $codigo_fraccionado");

       
   }else{
       $T->Set( 'tejido_fallado_o_sano2', 'Tejido Da&ntilde;ado     ---'.$saldo_padre.'m---');
       $T->Set( 'tejido_fallado_o_sano1', 'Tejido Sano     ---'.$cant_hijo.'m---');
       
       $T->Set( 'titulo',"Precios del Codigo $codigo_padre");        
 
   }    
      
   $T->Show('fraccion');
  
   
}

 $T->Show('precios');

echo '<script type="text/javascript">
      function closeParent()  {
           var s=window.opener;
           s.close();   
      }      
      closeParent();
    </script>';

?>

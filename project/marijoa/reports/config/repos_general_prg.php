<?php
  

/** Report prg file (repos_general) 
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
$T->Set( 'sup_p_fam', 'TEJIDOS TRAJES');
$T->Set( 'sup_p_grupo', '%');
$T->Set( 'sup_b_tipo', '%');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_p_clasif', '%');
$T->Set( 'sup_p_temp', '%');
$T->Set( 'sup_p_estruc', '%');
$T->Set( 'sup_p_color', 'NEGRO');
$T->Set( 'sup_p_rojos', 'Rojo');
$T->Set( 'sup_p_font', '10');
$T->Set( 'sup_p_limit', '0');
$T->Set( 'sup_fecha_prev1', '2011-01-01');
$T->Set( 'sup_fecha_prev2', '2011-01-01');
$T->Set( 'sup_t1', '');
$T->Set( 'sup_t2', '');
$T->Set( 'sup_pt1', '');
$T->Set( 'sup_pt2', '');
$T->Set( 'sup_gen_rep', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select p_fam AS FAM, p_grupo AS GRUPO, p_tipo AS TIPO, p_color AS COLOR, sum(p_cant) as CANT from prods_sin_fdp p WHERE  p.p_fam LIKE 'TEJIDOS TRAJES' AND p.p_grupo LIKE '%' AND p.p_tipo LIKE '%'  AND p.p_clasif LIKE '%'  AND p.p_temp LIKE '%'  AND p.p_estruc LIKE '%' AND p.p_color LIKE 'NEGRO'   GROUP BY FAM,GRUPO,TIPO,COLOR ORDER BY FAM,GRUPO,TIPO,COLOR limit 1000";
//
$z_cant = 0;
$z_vp = 0;
$z_st_proy = 0;
$z_p1 = 0;
$z_p2 = 0;
$z_p3 = 0;
$z_tend = 0;
$z_ve = 0;
$z_prev = 0;

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );



function setMensaje($msg){
  $fp = fopen('project/marijoa/reports/mensaje.txt', 'w');
  fwrite($fp, $msg);
  fclose($fp);
}

setMensaje('Buscando Stock Actual...|10');
 
 
function current_millis() {
    list($usec, $sec) = explode(" ", microtime());
    return round(((float)$usec + (float)$sec) * 1000); 
}
$inicio = current_millis();

$db = new Y_DB();
$db->Database = 'marijoa';


// Definicion de Arrays

$tam_fuente = $sup['p_font'];

$T->Set('tam_fuente',$tam_fuente."px");

$master = array();  //  Pila general de Arreglos id = fam_grupo_tipo_color  => [FAM],[GRUPO],[TIPO],[COLOR],[1P],[2P],[3P],[STOCK]
global $master; 
 
$fam = $sup['p_fam'];
$gru = $sup['p_grupo']; 
$tipo = $sup['p_tipo'];
$cla = $sup['p_clasif'];
$temp = $sup['p_temp'];
$estruc = $sup['p_estruc'];
$color = $sup['p_color'];

$T->Set('cla',$cla);
$T->Set('temp',$temp);
$T->Set('estruc',$estruc);



$T->Set('tela',"<b><i>$fam-$gru-$tipo-$cla-$temp-$estruc-$color</i></b>");

$fecha_prev1 = $sup['fecha_prev1'];
$fecha_prev2 = $sup['fecha_prev2'];

//$meses = array("Enero"=>"01-01","Febrero"=>"02-01","Marzo"=>"03-01","Abril"=>"04-01","Mayo"=>"05-01","Junio"=>"06-01","Julio"=>"07-01","Agosto"=>"08-01","Setiembre"=>"09-01","Octubre"=>"10-01","Noviembre"=>"11-01","Diciembre"=>"12-01");
 
$anio = date("Y");

$fecha_hoy = date("Y-m-d");

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

// Starting a HTML
$T->Show('general_header');			// Principal Header

$T->Show('start_query0');			// Start a Table 

$T->Show('header0');				// Show Header
flush();
//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables


//Define a Old Values Variables
$old['FAM'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COLOR'] = '';
$old['CANT'] = '';
 
// Carga normal del Arreglo master
// 
while( $Q0->NextRecord() ){
 
    $el['FAM'] = $Q0->Record['FAM'];   $el['GRUPO'] = $Q0->Record['GRUPO'];  $el['TIPO'] = $Q0->Record['TIPO'];    $el['COLOR'] = $Q0->Record['COLOR'];    $el['CANT'] = $Q0->Record['CANT'];
    
    
    $CANT = $el['CANT']; 
    $FGTC = $el['FAM']."_".$el['GRUPO']."_".$el['TIPO']."_".$el['COLOR'];
    
    $z_cant += 0+ $CANT;
    
    $id = str_replace(" ","_",$FGTC );
    $id = str_replace(".","_",$id );
    
    $master[$id] = array("0"=>$el['FAM'], "1" => $el['GRUPO'], "2" => $el['TIPO'], "3"=>$el['COLOR'],"4"=>$el['CANT'],"5" => 0,"6"=>0,"7"=>0,"8"=>0,"9"=>0 ); 
 
    $old['FAM'] = $el['FAM'];    $old['GRUPO'] = $el['GRUPO'];    $old['TIPO'] = $el['TIPO'];   $old['COLOR'] = $el['COLOR'];
    $old['CANT'] = $el['CANT'];
   

} 

 
// Venta Previa a la Fecha de prevision
// Rango de Fecha de Venta Previa = (HOY - 1 AÑO <==>  Fecha Prev 1 - 1 AÑO)
$fecha_hoy = date("Y-m-d");
$vp_desde = date("Y-m-d", strtotime("$fecha_hoy -365 day"));
$vp_hasta = date("Y-m-d", strtotime("$fecha_prev1 -365 day"));

setMensaje("Buscando Ventas Previas y Stock Proyectado...  $vp_desde <-> $vp_hasta|20");

$query = "SELECT p.p_fam AS FAM, p_grupo AS GRUPO, p_tipo AS TIPO, p_color AS COLOR,sum(d.df_cantidad) AS CANT FROM   factura f, det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num AND 
d.df_cod_prod = p.p_cod  AND f.fact_estado = 'Cerrada'
AND f.fact_fecha  BETWEEN '$vp_desde' AND '$vp_hasta' AND p.p_fam LIKE '$fam'  AND p.p_grupo LIKE '$gru' AND p.p_tipo LIKE '$tipo'
AND p.p_clasif LIKE '$cla'  AND p.p_temp LIKE '$temp'  AND p.p_estruc LIKE '$estruc' AND p.p_color LIKE '$color'
GROUP BY FAM,GRUPO,TIPO,COLOR ORDER BY FAM,GRUPO,TIPO,COLOR";
$db->Query($query);
while( $db->NextRecord() ){
    $el['FAM'] = $db->Record['FAM'];   $el['GRUPO'] = $db->Record['GRUPO'];  $el['TIPO'] = $db->Record['TIPO'];    $el['COLOR'] = $db->Record['COLOR'];    $el['CANT'] = $db->Record['CANT'];
        
    $CANT = $el['CANT']; 
    $FGTC = $el['FAM']."_".$el['GRUPO']."_".$el['TIPO']."_".$el['COLOR'];
    $z_vp += 0+ $CANT;
    $id = str_replace(" ","_",$FGTC );
    $id = str_replace(".","_",$id );
    
    if( $master[$id] == null ){ // Agrego
        
        $stock_proyectado = 0 - $el['CANT'];
        $master[$id] = array("0"=>$el['FAM'], "1" => $el['GRUPO'], "2" => $el['TIPO'], "3"=>$el['COLOR'],"4"=>0,"5" => $el['CANT'],"6"=>$stock_proyectado,"7"=>0,"8"=>0,"9"=>0 );
        $z_st_proy +=0+$stock_proyectado;
    }else{ // Modifico
        $arr = $master[$id];
        $arr["5"] = $CANT;
        $stock_actual = $arr["4"];
        $stock_proyectado = $stock_actual - $el['CANT'];
        $z_st_proy +=0+$stock_proyectado;
        $arr["6"] = $stock_proyectado;
        $master[$id] = $arr;
    }       
    $old['FAM'] = $el['FAM'];    $old['GRUPO'] = $el['GRUPO'];    $old['TIPO'] = $el['TIPO'];   $old['COLOR'] = $el['COLOR']; $old['CANT'] = $el['CANT'];
}


// Calculo para el 1P



$p1_d = $sup['p1_d'];
$p1_h = $sup['p1_h'];
setMensaje("Buscando Ventas del Primer Periodo (P1)... $p1_d <-> $p1_h|40");

$query = "SELECT p.p_fam AS FAM, p_grupo AS GRUPO, p_tipo AS TIPO, p_color AS COLOR,sum(d.df_cantidad) AS CANT FROM   factura f, det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num AND 
d.df_cod_prod = p.p_cod  AND f.fact_estado = 'Cerrada'
AND f.fact_fecha  BETWEEN '$p1_d' AND '$p1_h' AND p.p_fam LIKE '$fam'  AND p.p_grupo LIKE '$gru' AND p.p_tipo LIKE '$tipo'
AND p.p_clasif LIKE '$cla'  AND p.p_temp LIKE '$temp'  AND p.p_estruc LIKE '$estruc' AND p.p_color LIKE '$color'
GROUP BY FAM,GRUPO,TIPO,COLOR ORDER BY FAM,GRUPO,TIPO,COLOR";
$db->Query($query);
while( $db->NextRecord() ){
    $el['FAM'] = $db->Record['FAM'];   $el['GRUPO'] = $db->Record['GRUPO'];  $el['TIPO'] = $db->Record['TIPO'];    $el['COLOR'] = $db->Record['COLOR'];    $el['CANT'] = $db->Record['CANT'];
        
    $CANT = $el['CANT']; 
    $FGTC = $el['FAM']."_".$el['GRUPO']."_".$el['TIPO']."_".$el['COLOR'];
    $z_p1 += 0+ $CANT;
    
    $id = str_replace(" ","_",$FGTC );
    $id = str_replace(".","_",$id );
    
    if( $master[$id] == null ){ // Agrego 
        $master[$id] = array("0"=>$el['FAM'], "1" => $el['GRUPO'], "2" => $el['TIPO'], "3"=>$el['COLOR'],"4"=>0,"5" => 0,"6"=>0,"7"=>$CANT,"8"=>0,"9"=>0 );
    }else{ // Modifico
        $arr = $master[$id];        
        $arr["7"] = $CANT;
        $master[$id] = $arr;
    }       
    $old['FAM'] = $el['FAM'];    $old['GRUPO'] = $el['GRUPO'];    $old['TIPO'] = $el['TIPO'];   $old['COLOR'] = $el['COLOR']; $old['CANT'] = $el['CANT'];
}



// Calculo para el 2P

$p2_d = $sup['p2_d'];
$p2_h = $sup['p2_h'];
setMensaje("Buscando Ventas del Segundo Periodo (P2)... $p2_d <-> $p2_h|65");

$query = "SELECT p.p_fam AS FAM, p_grupo AS GRUPO, p_tipo AS TIPO, p_color AS COLOR,sum(d.df_cantidad) AS CANT FROM   factura f, det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num AND 
d.df_cod_prod = p.p_cod  AND f.fact_estado = 'Cerrada'
AND f.fact_fecha  BETWEEN '$p2_d' AND '$p2_h' AND p.p_fam LIKE '$fam'  AND p.p_grupo LIKE '$gru' AND p.p_tipo LIKE '$tipo'
AND p.p_clasif LIKE '$cla'  AND p.p_temp LIKE '$temp'  AND p.p_estruc LIKE '$estruc' AND p.p_color LIKE '$color'
GROUP BY FAM,GRUPO,TIPO,COLOR ORDER BY FAM,GRUPO,TIPO,COLOR";
$db->Query($query);
while( $db->NextRecord() ){
    $el['FAM'] = $db->Record['FAM'];   $el['GRUPO'] = $db->Record['GRUPO'];  $el['TIPO'] = $db->Record['TIPO'];    $el['COLOR'] = $db->Record['COLOR'];    $el['CANT'] = $db->Record['CANT'];
        
    $CANT = $el['CANT']; 
    $FGTC = $el['FAM']."_".$el['GRUPO']."_".$el['TIPO']."_".$el['COLOR'];
    $z_p2 += 0+ $CANT;
    $id = str_replace(" ","_",$FGTC );
    $id = str_replace(".","_",$id );
    
    if( $master[$id] == null ){ // Agrego 
        $master[$id] = array("0"=>$el['FAM'], "1" => $el['GRUPO'], "2" => $el['TIPO'], "3"=>$el['COLOR'],"4"=>0,"5" => 0,"6"=>0,"7"=>0,"8"=>$CANT,"9"=>0 );
    }else{ // Modifico
        $arr = $master[$id];        
        $arr["8"] = $CANT;
        $master[$id] = $arr;
    }       
    $old['FAM'] = $el['FAM'];    $old['GRUPO'] = $el['GRUPO'];    $old['TIPO'] = $el['TIPO'];   $old['COLOR'] = $el['COLOR']; $old['CANT'] = $el['CANT'];
}



// Calculo del 3P

$p3_d = $sup['p3_d'];
$p3_h = $sup['p3_h'];
setMensaje("Buscando Ventas del Tercer Periodo (P3)... $p3_d <-> $p3_h|85"); 

$query = "SELECT p.p_fam AS FAM, p_grupo AS GRUPO, p_tipo AS TIPO, p_color AS COLOR,sum(d.df_cantidad) AS CANT FROM   factura f, det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num AND 
d.df_cod_prod = p.p_cod  AND f.fact_estado = 'Cerrada'
AND f.fact_fecha  BETWEEN '$p3_d' AND '$p3_h' AND p.p_fam LIKE '$fam'  AND p.p_grupo LIKE '$gru' AND p.p_tipo LIKE '$tipo'
AND p.p_clasif LIKE '$cla'  AND p.p_temp LIKE '$temp'  AND p.p_estruc LIKE '$estruc' AND p.p_color LIKE '$color'
GROUP BY FAM,GRUPO,TIPO,COLOR ORDER BY FAM,GRUPO,TIPO,COLOR";
$db->Query($query);
while( $db->NextRecord() ){
    $el['FAM'] = $db->Record['FAM'];   $el['GRUPO'] = $db->Record['GRUPO'];  $el['TIPO'] = $db->Record['TIPO'];    $el['COLOR'] = $db->Record['COLOR'];    $el['CANT'] = $db->Record['CANT'];
        
    $CANT = $el['CANT']; 
    $FGTC = $el['FAM']."_".$el['GRUPO']."_".$el['TIPO']."_".$el['COLOR'];
    $z_p3 += 0+ $CANT;
    $id = str_replace(" ","_",$FGTC );
    $id = str_replace(".","_",$id );
    
    if( $master[$id] == null ){ // Agrego 
        $master[$id] = array("0"=>$el['FAM'], "1" => $el['GRUPO'], "2" => $el['TIPO'], "3"=>$el['COLOR'],"4"=>0,"5" => 0,"6"=>0,"7"=>0,"8"=>0,"9"=>$CANT );
    }else{ // Modifico
        $arr = $master[$id];        
        $arr["9"] = $CANT;
        $master[$id] = $arr;
    }       
    $old['FAM'] = $el['FAM'];    $old['GRUPO'] = $el['GRUPO'];    $old['TIPO'] = $el['TIPO'];   $old['COLOR'] = $el['COLOR']; $old['CANT'] = $el['CANT'];
}

 
setMensaje('Ordenando claves de Matriz para Impresion en Pantalla... Tendencia Venta Estimada y Prevision|95'); 
krsort($master);

foreach ($master as $key => $value) {
    
  $familia_ = $value["0"];    $T->Set('query0_FAM',   $familia_);
  $grupo_   = $value["1"];    $T->Set('query0_GRUPO', $grupo_ );
  $tipo_    = $value["2"];    $T->Set('query0_TIPO',  $tipo_);
  $color_   = $value["3"];    $T->Set('query0_COLOR', $color_);  
  $cant_    = $value["4"];    $T->Set('query0_CANT',  number_format($cant_,2,',','.') );
  $vp_      = $value["5"];    $T->Set('query0_VP',    number_format($vp_,2,',','.') );
  $st_proy_ = $value["6"];    $T->Set('cant_proy',    number_format($st_proy_,2,',','.') );
  
  $p1 = $value["7"];    $T->Set('p1',    number_format($p1,2,',','.') );
  $p2 = $value["8"];    $T->Set('p2',    number_format($p2,2,',','.') );
  $p3 = $value["9"];    $T->Set('p3',    number_format($p3,2,',','.') );
  
  $id = md5("$familia_.$grupo_.$tipo_.$color_");
  $T->Set('id',$id);
  
  $tendencia = 0;
  
  if($p2 > 0){
    $tendencia =  $p1 / $p2;
  }else{
    $tendencia = 1;   
  }
    
  $T->Set('tendencia',    number_format($tendencia,2,',','.') );
  
  $venta_estimada = $tendencia * $p3;
  $T->Set('ve',    number_format($venta_estimada,2,',','.') );
  
  
  
  $prevision = 0;
  if($st_proy_ > 0){
     $prevision =  $st_proy_ - $venta_estimada;
  }else{
     $prevision =  -$venta_estimada; 
  }
  
  $T->Set('prevision',    number_format($prevision,2,',','.') );
  
  $T->Set('discriminar', "discr('$familia_','$grupo_','$tipo_','$color_','$cant_','$vp_desde','$vp_hasta','$p1_d','$p1_h','$p2_d','$p2_h','$p3_d','$p3_h','$id')" );
  
  $T->Show('query0_data_row');
      
}  


$t  = (current_millis() - $inicio);
if ($t < 1000) {
       $T->Set("tiempo","Reporte generado en : " . $t . " milisegundos...");
}else {
    if ($t / 1000 > 60){
        $T->Set("tiempo","Reporte generado en :  ". number_format($t / 1000 / 60,2,',','.')  ."  minutos...");
    }else{
       $T->Set("tiempo","Reporte generado en :  ". number_format($t / 1000,2,',','.')  ."  segundos...");
    }
}  
$T->Show('tiempo');
$T->Set('z_cant',    number_format($z_cant,2,',','.') );
$T->Set('z_vp',    number_format($z_vp,2,',','.') );
$T->Set('z_st_proy',    number_format($z_st_proy,2,',','.') );
$T->Set('z_p1',    number_format($z_p1,2,',','.') );
$T->Set('z_p2',    number_format($z_p2,2,',','.') );
$T->Set('z_p3',    number_format($z_p3,2,',','.') );   


if($z_p2 > 0){
  $z_tend = $z_p1 / $z_p2;  
}else{
   $z_tend = 1; 
}
$T->Set('z_tend',    number_format($z_tend,2,',','.') );   
$z_ve = $z_tend * $z_p3;
$T->Set('z_ve',    number_format($z_ve,2,',','.') );   


if($z_st_proy > 0){
  $z_prev = $z_st_proy - $z_ve;
}else{
 $z_prev =  -$z_ve;
}
$T->Set('z_prev',    number_format($z_prev,2,',','.') );   


$T->Show('query0_total_row');	
$T->Show('end_query0');				// Ends a Table 
 	
 setMensaje('Fin|100');  
?>

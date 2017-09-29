<?php

/** Report prg file (repos_prod) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  
 
 
 
//$query0 = " SELECT p.p_fam AS FAMILIA, p.p_grupo AS GRUPO,p.p_tipo AS TIPO, p.p_color AS COLOR, SUM(v.df_cantidad) AS CANT, p.p_cant  AS STOCK FROM venta_detalle v, productos_all p  WHERE fact_fecha BETWEEN "2012-01-01" AND CURRENT_DATE AND v.df_cod_prod = p.p_cod AND p.p_local LIKE '00' AND p.p_fam LIKE '%' AND p.p_grupo LIKE '%' AND p.p_tipo LIKE '%'  AND p.p_clasif LIKE '%'  AND p.p_temp LIKE '%'  AND p.p_estruc LIKE '%' AND p.p_color LIKE '%'      GROUP BY p.p_fam, p.p_grupo,p.p_tipo, p.p_color ORDER BY p.p_fam, p.p_grupo,p.p_tipo, p.p_color";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

function current_millis() {
    list($usec, $sec) = explode(" ", microtime());
    return round(((float)$usec + (float)$sec) * 1000);
}
$inicio = current_millis();


// Definicion de Arrays

$tam_fuente = $sup['p_font'];

$T->Set('tam_fuente',$tam_fuente."px");

$master = array();  //  Pila general de Arreglos id = fam_grupo_tipo_color  => [FAM],[GRUPO],[TIPO],[COLOR],[1P],[2P],[3P],[STOCK]
global $master; 

$suc = $sup['rep_localidad'];
$fam = $sup['p_fam'];
$gru = $sup['p_grupo']; 
$tipo = $sup['p_tipo'];
$cla = $sup['p_clasif'];
$temp = $sup['p_temp'];
$estruc = $sup['p_estruc'];
$color = $sup['p_color'];

$prev = $sup['mes_prev'];

$meses = array("Enero"=>"01-01","Febrero"=>"02-01","Marzo"=>"03-01","Abril"=>"04-01","Mayo"=>"05-01","Junio"=>"06-01","Julio"=>"07-01","Agosto"=>"08-01","Setiembre"=>"09-01","Octubre"=>"10-01","Noviembre"=>"11-01","Diciembre"=>"12-01");
 
$anio = date("Y");

$fecha_hoy = date("Y-m-d");
 
$mes_previcion = $anio."-".$meses[$prev];
 
$days = (strtotime($mes_previcion) - strtotime($fecha_hoy)) / (60 * 60 * 24);

if($days < 0 ){
  $days = 0;
}

 

//echo "Mes de Previcion $prev = $mes_previcion <br><br>"; 
$pp0 = 60 + $days;
$pp1 = 1 + $days;
$pp_desde = date("Y-m-d", strtotime("$mes_previcion -$pp0 day"));
$pp_hasta = date("Y-m-d", strtotime("$mes_previcion -$pp1 day"));
 

$T->Set( 'per', "$pp_desde  <-->  $pp_hasta" );
//echo "Primer Periodo = $pp_desde  <-->  $pp_hasta <br><br>"; 

$ss0 = 425 + $days;
$ss1 = 366 + $days;
$seg_desde = date("Y-m-d", strtotime("$mes_previcion -$ss0 day"));
$seg_hasta = date("Y-m-d", strtotime("$mes_previcion -$ss1 day"));
$T->Set( 'sdo', "$seg_desde  <-->  $seg_hasta" );
//echo "Segundo Periodo = $seg_desde  <-->  $seg_hasta <br><br>"; 

$rango_prev_desde = 365 +$days;
$mes_prev_desde = date("Y-m-d", strtotime("$mes_previcion - $rango_prev_desde day"));
$mes_prev_hasta = date("Y-m-d", strtotime("$mes_previcion -335 day"));
$T->Set( 'mes_prev', "$prev <br> $mes_prev_desde <--> $mes_prev_hasta" );
 
// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

 
$TENDENCIA = 0;  

$Q0 = $DB;

cargarArreglo($pp_desde,$pp_hasta,$Q0,$suc,$fam,$gru,$tipo,$cla,$temp,$estruc,$color,$master,1);
cargarArreglo($seg_desde,$seg_hasta,$Q0,$suc,$fam,$gru,$tipo,$cla,$temp,$estruc,$color,$master,2);
cargarArreglo($mes_prev_desde,$mes_prev_hasta,$Q0,$suc,$fam,$gru,$tipo,$cla,$temp,$estruc,$color,$master,3);

calcularStock($Q0,$suc,$fam,$gru,$tipo,$cla,$temp,$estruc,$color,$master);

krsort($master);

$rojos = $sup['p_rojos'];
$LIMIT = $sup['p_limit'];
$LIMIT = $LIMIT * -1;

foreach ($master as $key => $value) {
    
  $familia_ =   $value["0"];  $T->Set('query0_FAMILIA', $familia_);
  $grupo_ = $value["1"];      $T->Set('query0_GRUPO', $grupo_ );
  $tipo_ = $value["2"];       $T->Set('query0_TIPO',  $tipo_);
  $color_ = $value["3"];      $T->Set('query0_COLOR', $color_);  
  
  $cant_1p = $value["4"];
  $cant_2p = $value["5"];
  $cant_3p = $value["6"]; 
  $STOCK = $value["7"];
  $T->Set('pp',$cant_1p);
  $T->Set('sp',$cant_2p);
  
  
  $T->Set('query0_CANT',  number_format($value["4"],1,',','.'));
  $T->Set('query0_CANT2', number_format($value["5"],1,',','.'));
  $T->Set('query0_CANT3', number_format($value["6"],1,',','.'));
  $T->Set('query0_STOCK', number_format($value["7"],0,',','.'));  
  
  if($cant_1p > 0 && $cant_2p > 0){
    $TENDENCIA = $cant_1p / $cant_2p; 
  }else{
    $TENDENCIA = 1;  
  }
  
  if($TENDENCIA > 2){
     $TENDENCIA = 2; 
  }
  $T->Set('query0_TEND', number_format($TENDENCIA,1,',','.'));
  $VE = $cant_3p * $TENDENCIA;
  $T->Set('query0_VE', number_format($VE,1,',','.'));
  
  $PREVISION = $STOCK - $VE;
  $T->Set('prev_sucs',"");   $T->Set('previcion_sucursales',""); 
  if($PREVISION == 0){
     $T->Set('color','black');    
  }else if($PREVISION < 0){
     $T->Set('color','red');  $T->Set('cursor','pointer');  
     // Si rojo podria calular la previcion en otras sucursales 
     $id_col = md5($familia_.$grupo_.$tipo_.$color_.$temp.$cla.$estruc);
     $click = "onclick=\"calcularPrev('$suc','$pp_desde','$pp_hasta','$seg_desde','$seg_hasta','$mes_prev_desde','$mes_prev_hasta','$familia_','$grupo_','$tipo_','$color_','$temp','$cla','$estruc','$id_col','$tam_fuente',$PREVISION)\"";  
     
     $T->Set('prev_sucs',$click); 
     $T->Set('img_up_down','<img id="img_'.$id_col.'"  src="images/left.png" width="5px" height="8px">');
     $T->Set('previcion_sucursales','<tr><td id="cods_'.$id_col.'" colspan="3" style="height:0px" ></td> <td colspan="8" id="'.$id_col.'"  ></td></tr>'); 
      
      
     
     
  }else{$T->Set('cursor','none');  
     $T->Set('color','green');  
  }
  
  if($cant_1p > $cant_3p){
     $T->Set('image','alsa.png');    
  }else if($cant_1p < $cant_3p){
     $T->Set('image','baja.png');
  }else{
     $T->Set('image','equal.png'); 
  }
  
  $T->Set('query0_PREV', number_format($PREVISION,1,',','.')); 
  if($rojos == "Rojo"){
     if($PREVISION < $LIMIT){  
         $T->Show('query0_data_row'); 
     } 
  }else if ($rojos == "Verde") {
     if($PREVISION > 0){  $T->Show('query0_data_row');  }    
  }else{
    $T->Show('query0_data_row');   
  }
   
}
    $t  = (current_millis() - $inicio);
    if ($t < 1000) {
            $T->Set("tiempo","Reporte generado en : " . $t . " milisegundos...");
    }else {
            $T->Set("tiempo","Reporte generado en :  ". number_format($t / 1000,2,',','.')  ."  segundos...");
    }  
    $T->Show('tiempo');
  
    
    
    function cargarArreglo($desde,$hasta,$Q0,$suc,$fam,$gru,$tipo,$cla,$temp,$estruc,$color,$master, $periodo){
        global $master;
        $query0 = "SELECT p.p_fam AS FAMILIA, p.p_grupo as GRUPO,p.p_tipo AS TIPO, p.p_color AS COLOR, SUM(v.df_cantidad) AS CANT   
        FROM venta_detalle v, productos_all p  
        WHERE fact_fecha BETWEEN '$desde' AND '$hasta' AND v.df_cod_prod = p.p_cod AND v.fact_localidad LIKE '$suc' AND p.p_fam LIKE '$fam' AND 
        p.p_grupo LIKE '$gru' AND p.p_tipo LIKE '$tipo'  AND p.p_clasif LIKE '$cla'  AND p.p_temp LIKE '$temp'  AND p.p_estruc LIKE '$estruc' 
        AND p.p_color LIKE '$color' GROUP BY p.p_fam, p.p_grupo,p.p_tipo, p.p_color ORDER BY p.p_fam, p.p_grupo,p.p_tipo, p.p_color";
 
        $firstRow=true;

        $Q0->Query( $query0 ); 

        //Define a Old Values Variables
        $old['FAMILIA'] = '';
        $old['GRUPO'] = '';
        $old['TIPO'] = '';
        $old['COLOR'] = '';
        $old['CANT'] = '';
        
        
        while( $Q0->NextRecord() ){

            // Define a elements
            $el['FAMILIA'] = $Q0->Record['FAMILIA'];  $fam_ = $el['FAMILIA'];
            $el['GRUPO'] = $Q0->Record['GRUPO'];      $gru_ = $el['GRUPO'];
            $el['TIPO'] = $Q0->Record['TIPO'];        $tipo_ = $el['TIPO'];
            $el['COLOR'] = $Q0->Record['COLOR'];      $color_ = $el['COLOR'];
            $el['CANT'] = $Q0->Record['CANT']; 

            $CANT = $el['CANT']; 
            $FGTC = $el['FAMILIA']."_".$el['GRUPO']."_".$el['TIPO']."_".$el['COLOR'];

            $id = str_replace(" ","_",$FGTC );
            $id = str_replace(".","_",$id );

            // fam_grupo_tipo_color  => [FAM],[GRUPO],[TIPO],[COLOR],[1P],[2P],[3P],[STOCK]
            
            
            if($periodo == 1){
                $master[$id] = array("0"=>$fam_, "1" => $gru_, "2" => $tipo_, "3"=>$color_,"4"=>$CANT,"5" => 0,"6"=>0,"7"=>0 );
            }else if($periodo == 2){
                if( $master[$id] == null ){ // Agrego
                   $master[$id] = array("0"=>$fam_, "1" => $gru_, "2" => $tipo_, "3"=>$color_,"4"=>0,"5" => $CANT,"6"=>0,"7"=>0 );   
                }else{ // Modifico
                    $arr = $master[$id];
                    $arr["5"] = $CANT;
                    $master[$id] = $arr;
                }    
            }else{
                if( $master[$id] == null ){ // Agrego
                   $master[$id] = array("0"=>$fam_, "1" => $gru_, "2" => $tipo_, "3"=>$color_,"4"=>0,"5" => 0,"6"=>$CANT,"7"=>0 );   
                }else{ // Modifico
                    $arr = $master[$id];
                    $arr["6"] = $CANT;
                    $master[$id] = $arr;
                }
            }
       
            //Actualize Old Values Variables
            $old['FAMILIA'] = $el['FAMILIA'];
            $old['GRUPO'] = $el['GRUPO'];
            $old['TIPO'] = $el['TIPO'];
            $old['COLOR'] = $el['COLOR'];
            $old['CANT'] = $el['CANT'];
            $old['STOCK'] = $el['STOCK'];
            $firstRow=false; 

        }
        //print_r($master);
    }
    
    function calcularStock($Q0,$suc,$fam,$gru,$tipo,$cla,$temp,$estruc,$color,$master){
        global $master;
        $query0 = "SELECT p.p_fam AS FAMILIA, p.p_grupo AS GRUPO,p.p_tipo AS TIPO, p.p_color AS COLOR, SUM(p.p_cant) AS STOCK 
        FROM productos p 
        WHERE  p.p_local LIKE '$suc' AND p.p_fam LIKE '$fam' AND 
        p.p_grupo LIKE '$gru' AND p.p_tipo LIKE '$tipo'  AND p.p_clasif LIKE '$cla'  AND p.p_temp LIKE '$temp'  AND p.p_estruc LIKE '$estruc' 
        AND p.p_color LIKE '$color' and prod_fin_pieza = 'No' and prod_fin_pieza <> 'RS' GROUP BY p.p_fam, p.p_grupo,p.p_tipo, p.p_color ORDER BY p.p_fam, p.p_grupo,p.p_tipo, p.p_color";
 
        $firstRow=true;

        $Q0->Query( $query0 ); 

        //Define a Old Values Variables
        $old['FAMILIA'] = '';
        $old['GRUPO'] = '';
        $old['TIPO'] = '';
        $old['COLOR'] = ''; 
        $old['STOCK'] = '';  
        
        while( $Q0->NextRecord() ){

            // Define a elements
            $el['FAMILIA'] = $Q0->Record['FAMILIA'];   
            $el['GRUPO'] = $Q0->Record['GRUPO'];       
            $el['TIPO'] = $Q0->Record['TIPO'];        
            $el['COLOR'] = $Q0->Record['COLOR'];       
            $el['STOCK'] = $Q0->Record['STOCK'];
            
            $FGTC = $el['FAMILIA']."_".$el['GRUPO']."_".$el['TIPO']."_".$el['COLOR'];
            $id = str_replace(" ","_",$FGTC );
            $id = str_replace(".","_",$id );
            
            $arr = $master[$id];
            if( $arr == null ){ // Agrego
                 //$master[$id] = array("0"=>"*".$el['FAMILIA'], "1" => $el['GRUPO'], "2" => $el['TIPO'], "3"=>$el['COLOR'],"4"=>0,"5" => 0,"6"=>0,"7"=>$el['STOCK'] ); 
                  
            }else{ 
               $arr["7"] = $el['STOCK'];
               $master[$id] = $arr;
            }
             
                        //Actualize Old Values Variables
            $old['FAMILIA'] = $el['FAMILIA'];
            $old['GRUPO'] = $el['GRUPO'];
            $old['TIPO'] = $el['TIPO'];
            $old['COLOR'] = $el['COLOR']; 
            $old['STOCK'] = $el['STOCK'];
            $firstRow=false;  
        }    
    }

 
$T->Show('end_query0');				// Ends a Table 

?>

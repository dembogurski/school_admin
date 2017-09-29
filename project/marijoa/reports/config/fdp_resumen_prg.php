<?php

/** Report prg file (fdp_resumen) 
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
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_desde', '2012-12-04');
$T->Set( 'sup_hasta', '2013-07-04');
$T->Set( 'sup_usuario', '%');
$T->Set( 'sup_cod', '%');
$T->Set( 'sup_suc_', '%');
$T->Set( 'sup_genre', '');
$T->Set( 'sup_grupo', '%');
$T->Set( 'sup_tipo', '%');
$T->Set( 'sup_canti', '1');
$T->Set( 'sup_fecha_rem', '');
$T->Set( 'sup_gen', '');
$T->Set( 'sup_genresumen', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select f.codigo as CODIGO, usuario AS USUARIO, suc as SUC, DATE_FORMAT(fecha,"%d-%m-%Y") as FECHA, hora AS HORA , descrip AS DESCRIP, grupo as GRUPO, tipo as TIPO,p_cant_compra as C_INI, stockf as STOCK,p_compra AS P_COMPRA,p_porc_recargo as REC from prod_fdp f, mnt_prod p where p.p_cod = f.codigo and usuario like '%' and fecha BETWEEN '2012-12-04' and '2013-07-04' and suc like '%'  and grupo like '%' and tipo like '%' and descrip like '%' and accion = "FDP" and p_cant > '1' order by suc asc";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

			// Show Header

$rem_fecha = $sup['fecha_rem'];

$data_ini = substr($sup['desde'], 8, 2) . '-' . substr($sup['desde'], 5, 2) . '-' . substr($sup['desde'], 0, 4);
$data_fin = substr($sup['hasta'], 8, 2) . '-' . substr($sup['hasta'], 5, 2) . '-' . substr($sup['hasta'], 0, 4);

$T->Set('desde', $data_ini);
$T->Set('hasta', $data_fin);

$db = new Y_DB();
$db->Database = $Global['project'];
$dv = new Y_DB();
$dv->Database = $Global['project'];
$aj = new Y_DB();
$aj->Database = $Global['project'];


// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');	

//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables


//Define a Old Values Variables
$old['CODIGO'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['USUARIO'] = '';
$old['SUC'] = '';
$old['FECHA'] = '';
$old['HORA'] = '';
$old['DESCRIP'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['C_INI'] = '';
$old['STOCK'] = '';
$old['P_COMPRA'] = '';
$old['REC'] = '';

$TOTAL_DESCUENTO = 0;
$TOTAL_DESCUENTO00 = 0;; 
$TOLERANCIA = 0.02;
$total_registros = 0;
// Making a rows of consult
while( $Q0->NextRecord()){

    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['USUARIO'] = $Q0->Record['USUARIO'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['HORA'] = $Q0->Record['HORA'];
    $el['DESCRIP'] = $Q0->Record['DESCRIP'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['C_INI'] = $Q0->Record['C_INI'];
    $el['STOCK'] = $Q0->Record['STOCK'];
    $el['P_COMPRA'] = $Q0->Record['P_COMPRA'];
    $el['REC'] = $Q0->Record['REC'];
    
	$usuario = $el['USUARIO'];
    $codigo = $el['CODIGO'];
    $suc = $el['SUC'];
    $stockf = $el['STOCK'];
    $costo = $el['P_COMPRA'] + (($el['P_COMPRA'] * $el['REC']) / 100); 
    $T->Set('costo', number_format($costo,0,',','.')); 
    
    
        

    // Buscar la Ultima Remision
    
    $sql_tra = "SELECT n.rem_nro AS Nro,date_format(n.rem_fecha,'%d-%m-%Y') AS fecha,rem_fecha as fecha_normal, n.rem_origen AS Origen, n.rem_destino AS Destino,n.rem_receptor AS Receptor,d.df_cod_prod AS Codigo, d.df_disponible AS Cant_recib  FROM nota_remision n inner join remito_det d on n.rem_nro = d.rem_nro where n.rem_estado = 'Cerrada' and rem_fecha >= '$rem_fecha' and n.rem_destino = '$suc' AND d.df_cod_prod = $codigo order by n.rem_nro desc limit 1";
    $db->Query($sql_tra);
    
    $exceso = 0;
    $tolerancia = 0;  
    
    $fondo = 'style="background-color:white;color:black"';   
    if ($db->NumRows() > 0) {
		// Preparing a template variables
		$T->Set('query0_CODIGO', $el['CODIGO']);
		$T->Set('query0_GRUPO', $el['GRUPO']);
		$T->Set('query0_TIPO', $el['TIPO']);
		$T->Set('query0_USUARIO', $el['USUARIO']);
		$T->Set('query0_SUC', $el['SUC']);
		$T->Set('query0_FECHA', $el['FECHA']);
		$T->Set('query0_HORA', $el['HORA']);
		$T->Set('query0_DESCRIP', $el['DESCRIP']);
		$T->Set('query0_GRUPO', $el['GRUPO']);
		$T->Set('query0_TIPO', $el['TIPO']);
		$T->Set('query0_C_INI', $el['C_INI']);
		$T->Set('query0_STOCK', $el['STOCK']);
		$calc_can_final= ((float)$el['C_INI']+saldoFinalCalculado($el['CODIGO']));
		$T->Set('saldo_final_calculado', number_format($calc_can_final,2,',','.'));
		$T->Set('query0_P_COMPRA', $el['P_COMPRA']);
		$T->Set('query0_REC', $el['REC']);
              
        $db->NextRecord(); 
        
        $Nro = $db->Record['Nro'];
        $Origen = $db->Record['Origen'];
        $Destino = $db->Record['Destino'];
        $Cant_recib = $db->Record['Cant_recib'];
        //$fecha = $db->Record['fecha'];
        //$fecha_normal = $db->Record['fecha_normal'];
        $T->Set('urem', "($Nro)  $Origen  > $Destino");
        $T->Set('cant_recib', number_format($Cant_recib,2,',','.')); 

         
         $tolerancia = $Cant_recib * $TOLERANCIA;
         $T->Set('tolerancia', number_format($tolerancia,2,',','.')); 
         
         $exceso =  round(  0  + $stockf - $tolerancia,2);
         
        $dv->Query("select CONCAT(fecha,' ',hora) AS fecha_hora from factura f inner join det_factura d on d.df_fact_num = f.fact_nro inner join _audit_log_ a on a.descrip = f.fact_nro and a.fecha=f.fact_fecha where a.accion = 'CERRAR_VENTA' and d.df_cod_prod = '$codigo' and f.fact_estado = 'Cerrada' order by f.fact_nro desc limit 1"); 
        
        if($dv->NumRows() > 0){
            $dv->NextRecord();
            $fecha_hora = $dv->Record['fecha_hora']; 
            // Buscar Ajustes posterior a la hora de cierre que no corresponden al control
            $aj->Query("select sum(if(aj_signo = '+',aj_ajuste,0)) as POS,SUM(IF(aj_signo = '-',aj_ajuste,0)) AS NEG from mnt_ajustes where aj_prod = '$codigo' and aj_cant_v > 0 and CONCAT(aj_fecha,' ',aj_hora) > '$fecha_hora'");
            if($aj->NumRows() > 0){
                $aj->NextRecord();
                $POS = $aj->Record['POS'];
                $NEG = $aj->Record['NEG'];
                $T->Set('pos', $POS); 
                $T->Set('neg', $NEG); 
            }else{
                $T->Set('pos', ''); 
                $T->Set('neg', ''); 
            }
        }
        
         
        $T->Set('exceso', number_format($exceso,2,',','.'));  
        $T->Set('exceso_title',  $exceso );  
         
         
        if($exceso > 0){
            $descuento = $costo * $exceso; // Antes Stockf ahora $exceso x costo
            $TOTAL_DESCUENTO += 0 +$descuento; 
             
            $T->Set('descuento', number_format($descuento,0,',','.')); 
             
            if($Origen == "00" || $Origen == "07" || $Origen == "08" || $Origen == "09" || $Origen == "12" || $Origen == "13"  || $Origen == "14"  || $Origen == "15" || $Origen == "16" || $Origen == "17" || $Origen == "18"){
                $T->Set('desc00', number_format($descuento,0,',','.')); 
                $TOTAL_DESCUENTO00 += 0 +$descuento; 
            }else{
                $T->Set('desc00', '0');  
            }
             
        }else{
             $T->Set('descuento', '0'); 
             $T->Set('desc00', '0');  
        }  
         
      $fondo = 'style="background-color:white;color:black"';       
		$T->Set('estilo', $fondo);
		$T->Show('query0_data_row');
		$total_registros ++;
    }/**
	else{
      $fondo = 'style="background-color:#ffff99;color:red"'; 
      //$cat_fraccion = $el['P_COMPRA'];
	  //$tolerancia = $cat_fraccion * $TOLERANCIA;
      //$T->Set('tolerancia', number_format($tolerancia,2,',','.')); 
      $T->Set('urem', "S/R >= $rem_fecha");
      $T->Set('cant_recib', number_format(0,0,',','.')); 
      $T->Set('tolerancia', number_format(0,0,',','.')); 
      $T->Set('descuento',  number_format(0,0,',','.')); 
      $T->Set('desc00',  number_format(0,0,',','.')); 
      $T->Set('exceso', number_format(0,0,',','.')); 
      
    } */
 
    
     
    
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['USUARIO'] = $el['USUARIO'];
    $old['SUC'] = $el['SUC'];
    $old['FECHA'] = $el['FECHA'];
    $old['HORA'] = $el['HORA'];
    $old['DESCRIP'] = $el['DESCRIP'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['C_INI'] = $el['C_INI'];
    $old['STOCK'] = $el['STOCK'];
    $old['P_COMPRA'] = $el['P_COMPRA'];
    $old['REC'] = $el['REC'];
    $firstRow=false;

}
$T->Set('total_descuento', number_format($TOTAL_DESCUENTO,0,',','.')); 
$T->Set('total_descuento00', number_format($TOTAL_DESCUENTO00,0,',','.')); 
$T->Set('total_registros', $total_registros); 

$endConsult = true;
 
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

function saldoFinalCalculado($codigo){	
	$cod = $codigo;
	$ventas = getVentas($cod);
	$transferencias_ = getTransferencia($cod);
	$ajustes = getTotalAjustes($cod);
	$fracciones = getSumFracciones($cod);
	//echo $cod.'- ventas: '.$ventas.', Trans:'.$transferencias_.', Ajustes:'.$ajustes.', Frac:'.$fracciones.'</br>';
	$ret = ($ventas+$transferencias_+$ajustes+$fracciones);
	//echo $ret+"<br/>";
	return $ret;
}
function getVentas($cod){
	$db_v = new Y_DB();$db_v->Database = $Global['project'];
	$db_v->Query("select sum(d.df_cantidad-(if(v.id is null,0,v.cant_dev))) as ventas from det_factura d inner join factura f on d.df_fact_num=f.fact_nro left join devoluciones v on f.fact_nro=v.fact_nro and d.df_cod_prod=v.cod_prod where f.fact_estado= 'Cerrada' and d.df_cod_prod = '$cod'");
	if($db_v->NextRecord()){
		$ventas = $db_v->Record['ventas'];
		return -$ventas;
	}else{
		return 0;
	}	
}
function getTransferencia($cod){
	$db_t = new Y_DB();$db_t->Database = $Global['project'];
	$db_t->Query("select sum(if(t.codigo_a='$cod',t.cantidad,0))-sum(if(t.codigo_de='$cod',t.cantidad,0)) as trans from transf_piezas t");
	if($db_t->NextRecord()){
		$transferencias = $db_t->Record['trans'];
		return $transferencias;
	}else{
		return 0;
	}
}
function getTotalAjustes($cod){
	$db_a = new Y_DB();$db_a->Database = $Global['project'];
	$db_a->Query("select sum(concat(a.aj_signo,a.aj_ajuste)) as ajustes from mnt_ajustes a where aj_motivo <> 'Devolucion de ProductoCaja' and a.aj_prod='$cod' group by a.aj_prod");
	$db_a->NextRecord();
	$totalAjustes = $db_a->Record['ajustes'];
	//$db_a->Close();
	return $totalAjustes;
}
function getSumFracciones($cod){
	$db_f = new Y_DB();$db_f->Database = $Global['project'];
	$db_f->Query("select sum(p.p_cant_compra) as fracciones from mnt_prod p where p.p_padre = '$cod'");
	$db_f->NextRecord();
	$totFraciones = $db_f->Record['fracciones'];
	//$db_f->Close();
	return -$totFraciones;
}
?>

<!--

        
        /*
        // Ventas 
        $sql_ventas = "SELECT sum(d.df_cantidad) AS cant  FROM factura f, det_factura d 
        WHERE f.fact_nro = d.df_fact_num AND f.fact_localidad = '$Destino' AND d.df_cod_prod = $codigo and fact_estado = 'Cerrada' and fact_fecha >= '$fecha_normal'"; 
        $dv->Query($sql_ventas);
         if ($dv->NumRows() > 0) {// Ventas
            $dv->NextRecord();
            $cantv = $dv->Record['cant'];
            $T->Set('ventas', number_format($cantv,2,',','.')); 
         }else{
            $T->Set('ventas', '0');  
         } */
    /*
         // Ajustes
         
         $dv->Query("SELECT sum( IF(aj_signo = '+',aj_ajuste,NULL)) AS POS, sum(IF(aj_signo = '-',aj_ajuste,NULL)) AS NEG  FROM mnt_ajustes WHERE aj_suc = '$Destino'  AND aj_prod = $codigo and aj_fecha  >= '$fecha_normal'");
         if ($dv->NumRows() > 0) {
             $dv->NextRecord();
             $POS = $dv->Record['POS'];
             $NEG = $dv->Record['NEG'];
             $DIFF_AJ = $POS - $NEG;
             $T->Set('ajustes', number_format($DIFF_AJ,2,',','.')); 
         }else{
             $T->Set('ajustes', '0');   
         }
         
         */









-->
<?php

/** Report prg file (cmp_vent_color) 
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
$T->Set( 'sup_p_fam', 'FORROS');
$T->Set( 'sup_p_grupo', 'DIOLEN');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_p_clasif', '%');
$T->Set( 'sup_p_estruc', '%');
$T->Set( 'sup_p_color', '%');
$T->Set( 'sup_desde', '2010-09-01');
$T->Set( 'sup_hasta', '2010-09-21');
$T->Set( 'sup_s1', '02');
$T->Set( 'sup_k', '1.00');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_gen_repc', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT  p_cod AS COD, p_fam AS FAM, p_grupo AS GRUPO,p_tipo AS TIPO, p_clasif AS CLASIF, p_estruc AS ESTRUC, p_color AS COLOR,d.df_cantidad AS CANT_V , p.p_cant AS STOCK   FROM factura f, det_factura d, mnt_prod p WHERE p.p_fam like 'FORROS' AND p.p_grupo like 'DIOLEN' AND p.p_tipo like '%' AND p.p_clasif like '%' AND p.p_estruc like '%' and p.p_color like '%' AND f.fact_nro = d.df_fact_num AND d.df_cod_prod = p.p_cod AND f.fact_localidad LIKE '02' AND  f.fact_fecha BETWEEN '2010-09-01' AND '2010-09-21' order by p.p_color asc";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

function current_millis() {
    list($usec, $sec) = explode(" ", microtime());
    return round(((float)$usec + (float)$sec) * 1000);
}
$inicio = current_millis();

$firstRow=true;
$Q0 = $DB;


$FAM = $sup['p_fam'];
$GRU = $sup['p_grupo'];
$TIPO = $sup['p_tipo'];
$CLASIF = $sup['p_clasif'];
$ESTRUC = $sup['p_estruc'];
$COLOR = $sup['p_color'];
$k = $sup['k'] + 0;
$T->Set("k","<b> $k </b>");	
$sucursales = $sup['s1'];
$T->Set("k","<b> $k </b>");	
$T->Set("sucursales","<b> $sucursales </b>");	


$desde = $sup['desde'];
$hasta = $sup['hasta'];
 
// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header



//Define a  variable
$endConsult = false;

if ($sucursales==='%' || $sucursales==='') {
	$sucursales = "01,02,04,05,06";
}

$sucs = split(",",$sucursales);
$hid = 0;

foreach ($sucs as $suc){ 
	 $T->Set('suc',$suc);  $T->Show('suc');
 	//$Q0->Query( $query0 );
 	if($suc != '00'){
	  $Q0->Query("SELECT  p_cod AS COD, p_fam AS FAM, p_grupo AS GRUPO,p_tipo AS TIPO, p_clasif AS CLASIF, p_estruc AS ESTRUC, p_color AS COLOR,d.df_cantidad AS CANT_V  FROM factura f, det_factura d, mnt_prod p WHERE p.p_fam like '$FAM' AND p.p_grupo like '$GRU' AND p.p_tipo like '$TIPO' AND p.p_clasif like '$CLASIF' AND p.p_estruc like '$ESTRUC' and p.p_color like '$COLOR' AND f.fact_nro = d.df_fact_num AND d.df_cod_prod = p.p_cod AND f.fact_localidad LIKE '$suc' AND  f.fact_fecha BETWEEN '$desde' AND '$hasta' order by p.p_color asc");
 	}else{
 	  $Q0->Query("SELECT p_cod AS COD, p_fam AS FAM, p_grupo AS GRUPO,p_tipo AS TIPO, p_clasif AS CLASIF, p_estruc AS ESTRUC,p_color AS COLOR ,'0' AS CANT_V   FROM  mnt_prod WHERE  p_fam like '$FAM' AND  p_grupo like '$GRU' AND  p_tipo like '$TIPO' AND  p_clasif like '$CLASIF' AND  p_estruc like '$ESTRUC'  ORDER BY p_color ASC ");	
 	}

//Define a Total Variables
$total0_CANT_V = 0;
$total0_STOCK = 0;

//Define a Subtotal Variables
$subtotal0_CANT_V = 0;
$subtotal0_STOCK = 0;


//Define a Old Values Variables
$old['COD'] = '';
$old['FAM'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['CLASIF'] = '';
$old['ESTRUC'] = '';
$old['COLOR'] = '';
$old['CANT_V'] = '';
$old['STOCK'] = '';

$STOCK = 0;

// Making a rows of consult
while( $Q0->NextRecord() ){
   $hid++;
    // Define a elements
    $el['COD'] = $Q0->Record['COD'];
    $el['FAM'] = $Q0->Record['FAM'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['CLASIF'] = $Q0->Record['CLASIF'];
    $el['ESTRUC'] = $Q0->Record['ESTRUC'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['CANT_V'] = $Q0->Record['CANT_V'];
    //$el['STOCK'] = $Q0->Record['STOCK']; 
    
    if( $el['COLOR']!=$old['COLOR'] && $old['COLOR']!='' ){ 
         $Q1 = new Y_DB();   $CL = $old['COLOR'];
		 $Q1->Database = $Global['project'];	
    	 $Q1->Query("SELECT  sum(p.p_cant) as STOCK FROM mnt_prod p WHERE p.p_fam like '$FAM' AND p.p_grupo like '$GRU' AND p.p_tipo like '$TIPO' AND p.p_clasif like '$CLASIF' AND p.p_estruc like '$ESTRUC' and p.p_color like '$CL' AND p.prod_fin_pieza = 'No' AND p_local LIKE '$suc' ");
    	 $Q1->NextRecord();
    	 $STOCK = $Q1->Record['STOCK'];

         $T->Set('subtotal0_STOCK', number_format($STOCK ,2,',','.'));
         
         // Previsto
	     $PREVISTO = ($subtotal0_CANT_V + 0) * $k;
	     $DIFF =  $STOCK - $PREVISTO ;
	     
	     $T->Set('PREVISTO', number_format($PREVISTO,2,',','.'));
	     $T->Set('check_id', $hid);
	    
	     if ($DIFF < 0) {
	    	$T->Set('query0_DIFF','<td align="right" ><b> <input  style="text-align: right;color:white; background-color:red;" type="text" id="diff_'.$hid.'" class="diff" size="8" value="'.number_format($DIFF,2,',','') .'" readonly="readonly" />  <b> </td>' );   
	     }else {
	    	$T->Set('query0_DIFF','<td style="text-align: right;"> <input type="text" id="diff_'.$hid.'"   class="diff" size="8" value="'.number_format($DIFF,2,',','') .'" readonly="readonly"/>   </td>' );  
	     }          
         
         
         $T->Show('query0_subtotal_row');
         //Reset a Subtotal Variables
         $subtotal0_CANT_V = 0;
         $subtotal0_STOCK = 0;
         $STOCK = 0;
    }
 
    // Preparing a template variables
    $T->Set('query0_COD', $el['COD']);
    $T->Set('query0_FAM', $el['FAM']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_CLASIF', $el['CLASIF']);
    $T->Set('query0_ESTRUC', $el['ESTRUC']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_CANT_V', number_format($el['CANT_V'],2,',','.'));
    
 
    

    // Calculating a total
    $total0_CANT_V += 0 + $el['CANT_V'];
    //$total0_STOCK += 0 + $el['STOCK'];

    // Calculating a subtotal
    $subtotal0_CANT_V += 0 + $el['CANT_V'];
    //$subtotal0_STOCK += 0 + $el['STOCK'];

   // $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANT_V', number_format($subtotal0_CANT_V,2,',','.'));
   // $T->Set('subtotal0_STOCK', number_format($STOCK ,2,',','.'));
    
    //Actualize Old Values Variables
    $old['COD'] = $el['COD'];
    $old['FAM'] = $el['FAM'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['CLASIF'] = $el['CLASIF'];
    $old['ESTRUC'] = $el['ESTRUC'];
    $old['COLOR'] = $el['COLOR'];
    $old['CANT_V'] = $el['CANT_V'];
    $old['STOCK'] = $el['STOCK'];
    $firstRow=false;

}
  $hid++;
  $T->Set('check_id', $hid);
}

$endConsult = true;
if( $el['COLOR']!=$old['COLOR'] ){ 
    $T->Show('query0_subtotal_row');
}
//$T->Show('query0_subtotal_row');
// Show total
$T->Set('total0_CANT_V', number_format($total0_CANT_V,2,',','.'));
$T->Set('total0_STOCK', number_format($total0_STOCK,2,',','.'));
if( endConsult ){
    $T->Show('query0_total_row');
}
$t  = (current_millis() - $inicio);
if ($t < 1000) {
	$T->Set("tiempo","Reporte generado en : " . $t . " milisegundos...");
}else {
	$T->Set("tiempo","Reporte generado en :  ". number_format($t / 1000,2,',','.')  ."  segundos...");
}
 
 $T->Show('bar');

$T->Show('end_query0');	  // Ends a Table 
echo "<script>  limpiar();  </script>";
 

?>

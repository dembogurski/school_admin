<?php

/** Report prg file (comparat_ventas) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  
 
// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p.p_fam as FAM,p.p_grupo AS GRUPO, p.p_tipo AS TIPO, p.p_color AS COLOR,  d.df_cantidad  AS CANT_V , p.p_cant  AS STOCK,  (d.df_cantidad - p.p_cant)  as DIFF  FROM factura f, det_factura d, mnt_prod p WHERE p.p_fam like '%' AND p.p_grupo like 'DIOLEN' AND p.p_tipo like '%' AND p.p_clasif like '%' AND p.p_estruc like '%' and p.p_color like '%' AND f.fact_nro = d.df_fact_num AND d.df_cod_prod = p.p_cod AND f.fact_localidad LIKE '%' AND  f.fact_fecha BETWEEN '2009-09-01' AND '2009-09-10' order by p.p_color,p.p_fam,p.p_grupo,p.p_tipo asc";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

 
$Q1 = new Y_DB();
$Q1->Database = $Global['project'];	
	
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
 
if ($FAM!='%'){
  $T->Set("CFAM","<th>FAMILIA</th>");	
  $T->Set("FAM","<td>$FAM</td>");	
}else{
   $T->Set("CFAM",""); $T->Set("FAM","");
}
if ($GRU!='%'){
  $T->Set("CGRU","<th>GRUPO</th>");	
  $T->Set("GRU","<td>$GRU</tD>");	
}else{
  $T->Set("CGRU",""); $T->Set("GRU","");
}
if ($TIPO!='%'){
  $T->Set("CTIPO","<th>TIPO</th>");	
  $T->Set("TIPO","<td>$TIPO</td>");
}else{
  $T->Set("CTIPO",""); $T->Set("TIPO","");
}
if ($CLASIF!='%'){
  $T->Set("CCLASIF"," <th>CLASIF</th>");	
  $T->Set("CLASIF"," <td>$CLASIF</td>");	
}else{
  $T->Set("CCLASIF","");$T->Set("CLASIF","");
}	        
if ($ESTRUC!='%'){
  $T->Set("CESTRUC","<th>ESTRUCT</th>");	
  $T->Set("ESTRUC","<td>$ESTRUC</td>");	
}else{
  $T->Set("CESTRUC","");$T->Set("ESTRUCT","");
}   
if ($COLOR!='%'){
  $T->Set("CCOLOR"," <th>COLOR</th>");	
  $T->Set("COLOR"," <td>$COLOR</td>");	
}else{
  $T->Set("CCOLOR","");$T->Set("COLOR","");
}
 


$firstRow=true;
$Q0 = $DB;
//$Q0->Query( $query0 );

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables
$total0_CANT_V = 0;
 
$total0_DIFF = 0;

//Define a Subtotal Variables
$subtotal0_CANT_V = 0;
 
$subtotal0_DIFF = 0;

$PREVISTO = 0;


$sucs = split(",",$sucursales);
  
$j = 0;
 
foreach ($sucs as $suc){ 
  $T->Set('suc',$suc);   
 
  $T->Show('suc');
	//$Q0->Query( $query0 );
  if($suc != '00' && $suc != '07' && $suc != '08' && $suc != '09'){	
	  $sql = "SELECT p.p_fam as FAM,p.p_grupo AS GRUPO, p.p_tipo AS TIPO, p.p_color AS COLOR,  d.df_cantidad  AS CANT_V ,   (d.df_cantidad - p.p_cant)  as DIFF  ,f.fact_localidad AS SUC
	  FROM factura f, det_factura d, mnt_prod p 
	  WHERE p.p_fam like '$FAM' AND p.p_grupo like '$GRU' AND p.p_tipo like '$TIPO' AND p.p_clasif like '$CLASIF' AND p.p_estruc like '$ESTRUC' and p.p_color like '$COLOR' AND f.fact_nro = d.df_fact_num AND 
	  d.df_cod_prod = p.p_cod AND  f.fact_localidad = '$suc' AND  f.fact_fecha BETWEEN '$desde' AND '$hasta'  and fact_estado ='Cerrada'  order by p.p_color,p.p_fam,p.p_grupo,p.p_tipo asc";	
  }else{
  	  $sql = "SELECT p.p_fam as FAM,p.p_grupo AS GRUPO, p.p_tipo AS TIPO, p.p_color AS COLOR, '0'  AS CANT_V ,   '0'  as DIFF  ,p.p_local AS SUC
	  FROM   mnt_prod p 
	  WHERE p.p_fam like '$FAM' AND p.p_grupo like '$GRU' AND p.p_tipo like '$TIPO' AND p.p_clasif like '$CLASIF' AND p.p_estruc like '$ESTRUC' and p.p_color like '$COLOR'  AND 
	  p.p_local = '$suc'  order by p.p_color,p.p_fam,p.p_grupo,p.p_tipo asc";
  }
  $Q0->Query($sql);
  
  
	
//Define a Old Values Variables
$old['FAM'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COLOR'] = '';
$old['CANT_V'] = '';
 
$old['DIFF'] = '';
$old['DIFF'] = '';
$old['SUC'] = '';



    $f = '';
    $g = '';
    $t =  '';
    
    $color = '';
    $color_id0 = '';
    $color_id1 = '';
	$color_id4 = '';


// Making a rows of consult
while( $Q0->NextRecord() ){
 
    // Define a elements
    $el['FAM'] = $Q0->Record['FAM'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['CANT_V'] = $Q0->Record['CANT_V'];
     
    $el['DIFF'] = $Q0->Record['DIFF'];
    $el['SUC'] = $Q0->Record['SUC'];

    
    
    
    if( ($el['FAM']!=$old['FAM'] )||($el['GRUPO']!=$old['GRUPO'])||($el['TIPO']!=$old['TIPO']||($el['COLOR']!=$old['COLOR']) ) ){
    	    $_OLD_TIPO = $old['TIPO'];
    		$_OLD_FAM = $old['FAM'];
    		$_OLD_GRUPO = $old['GRUPO'];
    	    $_ODL_COLOR = $old['COLOR'];
    		
    		$Q1->Query("SELECT  sum(p.p_cant)  AS CANT_STOCK FROM   mnt_prod p 
	  		WHERE p.p_fam like '$_OLD_FAM' AND p.p_grupo like '$_OLD_GRUPO' AND p.p_tipo like '$_OLD_TIPO' AND p.p_clasif like '$CLASIF' AND p.p_estruc like '$ESTRUC' and p.p_color like '$_ODL_COLOR'   AND 	p.p_local = '$suc'  AND p.p_cant > 0  AND prod_fin_pieza <> 'Si' ;");
    		$Q1->NextRecord();
    		$STOCK = $Q1->Record['CANT_STOCK'];  
    		 
	    	$PREVISTO = ($subtotal0_CANT_V + 0) * $k;
		    $DIFF =  $STOCK - $PREVISTO ;
		   
		    $T->Set('subtotal0_STOCK', number_format($STOCK,2,',','.'));
		    
		     
		    if ($DIFF < 0) {
		    	$T->Set('query0_DIFF','<td align="right" > <input style="text-align: right;color:white; background-color:red;" type="text" name="'.$color_id4.'"   class="diff" size="8" value="'.number_format($DIFF,2,',','') .'" readonly="readonly"/> </td>' );   
		    }else {
		    	$T->Set('query0_DIFF','<td style="text-align: right;"> <input type="text" name="'.$color_id4.'"  class="diff" size="8" value="'.number_format($DIFF,2,',','') .'" readonly="readonly"/> </td>' );  
		    }  
		   
		    $T->Set('PREVISTO', number_format($PREVISTO,2,',','.'));
		    
	    if ($j > 0) {
	    	$T->Show('query0_subtotal_row'); 
	    }
        $j++;
        //Reset a Subtotal Variables
        $subtotal0_CANT_V = 0;
        $subtotal0_STOCK = 0;
        $subtotal0_DIFF = 0;
        $PREVISTO = 0;
    }
    // if(  $el['SUC']!=$old['SUC'] ){
    	 
    //} 
    
    // Preparing a template variables
       
    $f = $el['FAM'];
    $g =  $el['GRUPO'];
    $t =  $el['TIPO'];
    
    $color = $el['COLOR'];
    $color_id0 = str_replace(" ","_",$f."_".$g."_".$t."_".$color);
    $color_id1 = str_replace(".","_",$color_id0); 
	$color_id2 = str_replace("Ñ","NH",$color_id1); // Ñ 
	$color_id3 = str_replace("ñ","nh",$color_id2); // ñ 
	$parentesis = array("(",")","/","|",",",";");
	$color_id4 = str_replace($parentesis,"_",$color_id3); // ( 
	
	
    $T->Set('color_id', $color_id4);  

    
    $T->Set('query0_FAM', $el['FAM']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COLOR', $el['COLOR']);
    
    $T->Set('query0_CANT_V', number_format($el['CANT_V'],2,',','.'));
    
    
   
    //$T->Set('query0_DIFF', number_format($el['DIFF'],2,',','.'));

    // Calculating a total
    $total0_CANT_V += 0 + $el['CANT_V'];
    
    $total0_DIFF += 0 + $el['DIFF'];

    // Calculating a subtotal
    $subtotal0_CANT_V += 0 + $el['CANT_V'];
     
    $subtotal0_DIFF += 0 + $el['DIFF'];

    // $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANT_V', number_format($subtotal0_CANT_V,2,',','.'));
    
    $T->Set('subtotal0_DIFF', number_format($subtotal0_DIFF,2,',','.'));
    
    //Actualize Old Values Variables
    $old['FAM'] = $el['FAM'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COLOR'] = $el['COLOR'];
    $old['CANT_V'] = $el['CANT_V']; 
    $old['DIFF'] = $el['DIFF'];
    $old['SUC'] = $el['SUC'];
    
    $firstRow=false;

}

$endConsult = true;
if( ($el['FAM']!=$old['FAM'])||($el['GRUPO']!=$old['GRUPO'])||($el['TIPO']!=$old['TIPO']||($el['COLOR']!=$old['COLOR'])) ){
    $T->Show('query0_subtotal_row');
}
// Show total
$T->Set('total0_CANT_V', number_format($total0_CANT_V,2,',','.'));
$T->Set('total0_STOCK', number_format($total0_STOCK,2,',','.'));
$T->Set('total0_DIFF', number_format($total0_DIFF,2,',','.'));
if( endConsult ){
   // $T->Show('query0_total_row');
}
$j=0;
} // Sucursales 

$T->Show('end_query0');				// Ends a Table 


?>

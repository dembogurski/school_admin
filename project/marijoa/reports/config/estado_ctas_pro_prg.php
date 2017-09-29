<?php

/** Report prg file (estado_ctas_pro) 
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
$T->Set( 'sup_busc_prov', '%');
$T->Set( 'sup_prov', '%');
$T->Set( 'sup_prov_nombre', '__NO DATA__');
$T->Set( 'sup_desde', '2009-06-20');
$T->Set( 'sup_hasta', '2009-09-15');
$T->Set( 'sup_desdeinv', '2009-06-20');
$T->Set( 'sup_hastainv', '2009-09-15');
$T->Set( 'sup_gen_rep2', '');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select c.ct_ref as REF,c.ct_prov as PROVEEDOR, f.c_factura as FACTURA, c.ct_nro as NRO_CUOTA, f.c_moneda, c.ct_fecha_venc  AS FECHA_VENC, c.ct_monto as MONTO  from cuotas_pagar c, mov_compras f where c.ct_cod_prov like '%' and c.ct_cod_prov = f.c_prov   and c.ct_fecha_venc BETWEEN '2009-06-20' and '2009-09-15' and c.ct_estado = "Pendiente" order by c.ct_prov asc ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$desde = $sup['desde'];
$hasta = $sup['hasta'];  
$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4); 
$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

$estado = $sup['estado'];

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
//$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables
$total0_MONTOGS = 0;
$total0_MONTOUS = 0;
$total0_CUOTAGS = 0;
$total0_CUOTAUS = 0;

//Define a Subtotal Variables
$subtotal0_MONTOGS = 0;
$subtotal0_MONTOUS = 0;
$subtotal0_CUOTAGS = 0;
$subtotal0_CUOTAUS = 0;

$diff_CUOTAGS = 0;
$diff_CUOTAUS = 0;

$Tdiff_CUOTAGS = 0;
$Tdiff_CUOTAUS = 0;

        $T_GS = 0;
        $T_US = 0;


//Define a Old Values Variables
$old['REF'] = '';
$old['PROVEEDOR'] = '';
$old['FACTURA'] = '';
$old['NRO_CUOTA'] = '';
$old['c_moneda'] = '';
$old['FECHA_VENC'] = '';
$old['FECHA_FAC'] = '';
$old['MONTO'] = '';
$old['DEV'] = '';
$old['COD_PROV'] = '';
$old['ESTADO'] = '';

$old['FL'] = '';

    $Q1 = new Y_DB();
	$Q1->Database = $Global['project'];	

	$Q2 = new Y_DB();
	$Q2->Database = $Global['project'];			 
  	$contador = 0;
	
	$prov_act ='';
$k = 0;
// Making a rows of consult
$numero_rows = $Q0->NumRows();
while( $Q0->NextRecord() ){
    $contador++;
	
    // Define a elements
    $el['REF'] = $Q0->Record['REF'];
    $el['PROVEEDOR'] = $Q0->Record['PROVEEDOR'];
    $el['FACTURA'] = $Q0->Record['FACTURA'];
    $el['NRO_CUOTA'] = $Q0->Record['NRO_CUOTA'];
    $el['c_moneda'] = $Q0->Record['c_moneda'];
    $el['FECHA_VENC'] = $Q0->Record['FECHA_VENC'];
    $el['FECHA_FAC'] = $Q0->Record['FECHA_FAC'];
    $el['MONTO'] = $Q0->Record['MONTO'];
	$el['DEV'] = $Q0->Record['DEV'];
	$el['COD_PROV'] = $Q0->Record['COD_PROV']; 
	$el['ESTADO'] = $Q0->Record['ESTADO']; 
	$el['FL'] = $Q0->Record['FL']; 
	
	$cod_prov = $el['COD_PROV'];
	
	 if( $el['DEV']=='*' ){ 
	    $T->Set('dev', "orange");
	 }else{
	    $T->Set('dev', "white");
	 }
	  if( $el['ESTADO']=='Cancelada' ){ 
	    $T->Set('color', "gray");
	 }else{
	    $T->Set('color', "white");
	 }
    $STEMP  = 0; //$STEMP_US = 0;
    if( $el['PROVEEDOR']!=$old['PROVEEDOR'] && $old['PROVEEDOR']!='' ){
    	
       $T->Show('query0_subtotal_row');
       
        //Reset a Subtotal Variables
        $STEMP = $subtotal0_MONTOGS;
        $STEMP_US = $subtotal0_MONTOUS;   // LEEEEEEEEEEEEEERRRRRRRRRR SI NO SALE BIEN ES POR QUE EL MONTO DE LA FACTURA LEGAL NO ESTA CARGADA
         
        $subtotal0_MONTOGS = 0;
        $subtotal0_MONTOUS = 0; 
        $subtotal0_CUOTAGS = 0;
        $subtotal0_CUOTAUS = 0;
        
        $diff_CUOTAGS = 0;
        $diff_CUOTAUS = 0;
        $Tdiff_CUOTAGS = 0;
	$Tdiff_CUOTAUS = 0;
        
        $T_GS = 0;
        $T_US = 0;
       
        $prov_act = $old['COD_PROV']; 
		if ($contador == 1){
		   $prov_act = $el['COD_PROV']; 
		}
		
		$Z_NETO = 0;
		$NETO_US =0;
            // Devoluciones
	        $Q1->Query('SELECT c_ref, c_cant, c_precio, c_valor_dev, c_valor,c_mon,  DATE_FORMAT(c_fecha,"%d-%m-%Y") as c_fecha ,c_motivo, __user, concat(p.p_fam,"-", p.p_grupo,"-", p.p_tipo,"-", p.p_color) as COMB FROM  mov_compras_dev d, mnt_prod p  where c_prov = "'.$prov_act.'" and c_estado =  "'.$estado.'" and c_fecha between "'.$desde.'" and "'.$hasta.'" and d.c_cod = p.p_cod;');
	        if ($Q1->NumRows()>0) {
	        	$T->Show('devol_cab'); 
			       $z_dev = 0;
			       $z_dev_us = 0;
			       $j = $Q1->NumRows();
			       while ($Q1->NextRecord()) {  $j--;
			       	   $ref = $Q1->Record['c_ref'];
			       	   $cantidad = $Q1->Record['c_cant'];
			       	   $c_precio = $Q1->Record['c_precio'];
			       	   $c_valor_dev = 0;   
			           $c_valor_dev_us =  0;          
			       	   $c_fecha = $Q1->Record['c_fecha'];
			       	   $c_motivo = $Q1->Record['c_motivo'];
			       	   $c_moneda = $Q1->Record['c_mon'];
			       	   $COMB =  strtolower( $Q1->Record['COMB'] );
			       	   $__user = $Q1->Record['__user'];  
			       	   
			       	   if($c_moneda == "G$"){     
			       	   	   $c_valor_dev =  $Q1->Record['c_valor_dev'];   
			       	   	   $c_valor_dev_us =  0;         
                                           $z_dev += 0 + $c_valor_dev; 
				       	   $NETO = $STEMP - $z_dev   ;    
				       	   $Z_NETO = $NETO; 
			       	   }else{
			       	   	  $c_valor_dev =  0;   
			       	   	  $c_valor_dev_us =  $Q1->Record['c_valor_dev'];   
			       	   	  $z_dev_us += 0 + $c_valor_dev_us; 
                                          $NETO_US = $STEMP_US - $z_dev_us   ;  
			       	   }
			       	   echo "<tr style='font-size:12px' > <td> $ref </td>  <td> $cantidad </td> <td> $c_precio  </td>  <td align='right'>". number_format( $c_valor_dev  ,0,',','.') ." </td> <td align='right'>". number_format( $c_valor_dev_us  ,2,',','.') ." </td>  <td>  $c_fecha  </td>  <td colspan='2'>  $c_motivo  </td> <td>  $__user  </td> <td  colspan='4'>  $COMB  </td> </tr>";
			            // echo "<tr style='font-size:12px' ><td>  </td> <td colspan='7'> $COMB  </td> </tr>";	
			          if ($j < 1 ) {
			          	 // Totales
			          	 echo "<tr style='font-size:14px;font-weight:bolder;' > <td> &nbsp;  </td>  <td> &nbsp;  </td> <td>  Totales </td> 
			          	         <td align='right'>". number_format( $z_dev ,0,',','.') ."   </td> <td colspan='4'> &nbsp;<B>NETO G$</B>  ". number_format( $NETO ,0,',','.') ." </td> <td  colspan='4'> NETO U$  ". number_format( $NETO_US ,0,',','.') ." </td> 
			          	       </tr>";	
			          }
		          }  
		         
		          $T->Show('vacio'); 
	        }else {
	        	 $Z_NETO = $STEMP;
	        }
	        // Descuentos
	        $Q2->Query('select f.c_ref as REF, f.c_obs as OBS, f.c_descuento as DESCUENTO from mov_compras f where f.c_dev = "*" and f.c_descuento > 0 and c_prov =   "'.$prov_act.'" and f.c_fechafac between "'.$desde.'" and "'.$hasta.'" ;');
 	        $Z_DESC = 0; $K = $Q2->NumRows();
	        if ($Q2->NumRows()>0) {
	        	$T->Show('desc_cab');
	        	 while ($Q2->NextRecord()) {  
			       	  $reff = $Q2->Record['REF'];  $obs = $Q2->Record['OBS']; 
			       	  $desc = $Q2->Record['DESCUENTO'];
			       	  $Z_DESC += 0 + $desc;
			       	  echo "<tr style='font-size:12px;' > <td> $reff  </td>   <td colspan='10'>Obs:  $obs </td>  <td > &nbsp;<B></B>  ". number_format( $desc ,0,',','.') ."  </td> </tr>";	
	        	 } 
	        	 $Z_NETO = $Z_NETO - $Z_DESC ;
	        	 echo "<tr style='font-size:14px;font-weight:bolder;' > <td> &nbsp;  </td>  <td> &nbsp;  </td> <td>  Total Descuentos </td>  <td align='right'>". number_format( $Z_DESC ,0,',','.') ."   </td> <td> &nbsp;   </td> <td colspan='3'> &nbsp;<B>NETO</B>  ". number_format( $Z_NETO ,0,',','.') ."  </td> </tr>";	
	        		   
	        }  $T->Show('vacio'); 
        
        $pr = $el['PROVEEDOR'];
        echo "<tr style='background-color:#FFFF99; font-size:12px;font-weight:bolder;'> <td colspan='3' height='26px' style='background-color:#CCFFFF; font-size:14px;font-weight:bolder;' ><b> $pr </b> </td> 
                <td style='text-align: center;'>NRO_CUOTA</td>
        <td style='text-align: center;'>MONEDA</td> 
        <td style='text-align: center;'>FECHA_VENC</td>
        <td style='text-align: center;'>MONTO G$</td>
		<td style='text-align: center;'>MONTO U$</td>
        <td style='text-align: center;'>Valor CUOTA G$</td>
		<td style='text-align: center;'>Valor CUOTA U$</td>		
        <td style='text-align: center;'>DIFF G$</td>
		<td style='text-align: center;'>DIFF U$</td>	
        </tr>";
     }  
     if ($k < 1) {  // Primera vez
	 
  		$pr = $el['PROVEEDOR'];
        echo "<tr style='background-color:#FFFF99; font-size:12px;font-weight:bolder;'> <td colspan='3' height='26px' style='background-color:#CCFFFF; font-size:14px;font-weight:bolder;' ><b> $pr </b> </td> 
                <td style='text-align: center;'>NRO_CUOTA</td>
        <td style='text-align: center;'>MONEDA</td> 
        <td style='text-align: center;'>FECHA_VENC</td>
        <td style='text-align: center;'>MONTO G$</td>
		<td style='text-align: center;'>MONTO U$</td>
        <td style='text-align: center;'>Valor CUOTA G$</td>
		<td style='text-align: center;'>Valor CUOTA U$</td>		
        <td style='text-align: center;'>DIFF G$</td>
		<td style='text-align: center;'>DIFF U$</td>	
        </tr>";
        $k++;   	
     }
         
    //echo "<tr> <td colspan='7' height='40px' style='background-color:#FFFFFF;'> &nbsp; </td> </tr>";
   
    // Preparing a template variables
    $T->Set('query0_REF', $el['REF']);
    $T->Set('query0_PROVEEDOR', $el['PROVEEDOR']);
    
    if ($el['FACTURA'] != '') {
    	$T->Set('query0_FACTURA', $el['FACTURA']);
    }else {
    	$T->Set('query0_FACTURA','N/A');
    }  
    
    $T->Set('query0_NRO_CUOTA', $el['NRO_CUOTA']);
    $T->Set('query0_c_moneda', $el['c_moneda']);
    $T->Set('query0_FECHA_VENC', $el['FECHA_VENC']);
    $T->Set('query0_FECHA_FAC', $el['FECHA_FAC']);
    
    // Diferencias montos para columnas en US o G$
    if( $el['c_moneda']==='G$' ){ 
        $T->Set('query0_MONTOGS', number_format($el['MONTO'],0,',','.'));  
        $T->Set('query0_MONTOUS', '&nbsp;');  
        // Calculating a total
        $total0_MONTOGS += 0 + $el['MONTO']; 
        // Calculating a subtotal
        $subtotal0_MONTOGS += 0 + $el['MONTO'];

        //Cuotas
        $T->Set('query0_CUOTAGS', number_format($el['FL'],2,',','.'));  
        $T->Set('query0_CUOTAUS', '&nbsp;');        
        $total0_CUOTAGS += 0 + $el['FL']; 
        $subtotal0_CUOTAGS += 0 + $el['FL'];
        
        $DIFF_GS = $el['MONTO'] - $el['FL'];
        $T->Set('DIFFGS', number_format($DIFF_GS,2,',','.')); 
        $T->Set('DIFFUS', '&nbsp;');  
        $Tdiff_CUOTAGS += 0 + $DIFF_GS;

    }else {
        $T->Set('query0_MONTOUS', number_format($el['MONTO'],2,',','.'));  
        $T->Set('query0_MONTOGS', '&nbsp;');  
        // Calculating a total
        $total0_MONTOUS += 0 + $el['MONTO']; 
        // Calculating a subtotal
        $subtotal0_MONTOUS += 0 + $el['MONTO'];  

        //CUOTAS
        $T->Set('query0_CUOTAUS', number_format($el['FL'],2,',','.'));  
        $T->Set('query0_CUOTAGS', '&nbsp;');    
        $total0_CUOTAUS += 0 + $el['FL']; 	
        $subtotal0_CUOTAUS += 0 + $el['FL'];  
        
        $DIFF_US = $el['MONTO'] - $el['FL'];
        $T->Set('DIFFUS', number_format($DIFF_US,2,',','.')); 
        $T->Set('DIFFGS', '&nbsp;');   
        $Tdiff_CUOTAUS += 0 + $DIFF_US;
    }
 

    $T->Show('query0_data_row'); 
    
    // Show Subtotal
    $T->Set('subtotal0_MONTOGS', number_format($subtotal0_MONTOGS,0,',','.')); 
    $T->Set('subtotal0_MONTOUS', number_format($subtotal0_MONTOUS,2,',','.')); 
    
    //CUOTAS
    $T->Set('subtotal0_CUOTAGS', number_format($subtotal0_CUOTAGS,0,',','.')); 
    $T->Set('subtotal0_CUOTAUS', number_format($subtotal0_CUOTAUS,2,',','.')); 
    // DIFF
	$T_GS = $subtotal0_CUOTAGS  - $total0_CUOTAGS;
	$T_US = $subtotal0_CUOTAUS  - $total0_CUOTAUS;
	$T->Set('totalDIFFGS', number_format($Tdiff_CUOTAGS,2,',','.')); 
	$T->Set('totalDIFFUS', number_format($Tdiff_CUOTAUS,2,',','.')); 
    ob_flush();
    flush();
    
            
    //Actualize Old Values Variables
    $old['REF'] = $el['REF'];
    $old['PROVEEDOR'] = $el['PROVEEDOR'];
    $old['FACTURA'] = $el['FACTURA'];
    $old['NRO_CUOTA'] = $el['NRO_CUOTA'];
    $old['c_moneda'] = $el['c_moneda'];
    $old['FECHA_VENC'] = $el['FECHA_VENC'];
    $old['FECHA_FAC'] = $el['FECHA_FAC'];
    $old['MONTO'] = $el['MONTO'];
	$old['DEV'] = $el['DEV']; 
	$old['COD_PROV'] = $el['COD_PROV']; 
	$old['ESTADO'] = $el['ESTADO'];  
	$old['FL'] = $el['FL']; 
    $firstRow=false; 

}
 $STEMP = $subtotal0_MONTOGS;
        $STEMP_US = $subtotal0_MONTOUS;   // LEEEEEEEEEEEEEERRRRRRRRRR SI NO SALE BIEN ES POR QUE EL MONTO DE LA FACTURA LEGAL NO ESTA CARGADA

        $subtotal0_MONTOGS = 0;
        $subtotal0_MONTOUS = 0;
        $subtotal0_CUOTAGS = 0;
        $subtotal0_CUOTAUS = 0;

        $diff_CUOTAGS = 0;
        $diff_CUOTAUS = 0;
        $Tdiff_CUOTAGS = 0;
		$Tdiff_CUOTAUS = 0;

        $T_GS = 0;
        $T_US = 0;

        $prov_act = $old['COD_PROV']; 
            // Devoluciones
	        $Q1->Query('SELECT c_ref, c_cant, c_precio, c_valor_dev ,c_mon,  DATE_FORMAT(c_fecha,"%d-%m-%Y") as c_fecha ,c_motivo, __user, concat(p.p_fam,"-", p.p_grupo,"-", p.p_tipo,"-", p.p_color) as COMB FROM  mov_compras_dev d, mnt_prod p  where c_prov = "'.$prov_act.'" and c_estado =  "'.$estado.'" and c_fecha between "'.$desde.'" and "'.$hasta.'" and d.c_cod = p.p_cod;');
	        if ($Q1->NumRows()>0) {
	        	$T->Show('devol_cab');
			       $z_dev = 0;
			       $z_dev_us = 0;
			       $j = $Q1->NumRows();
			       while ($Q1->NextRecord()) {  $j--;
			       	   $ref = $Q1->Record['c_ref'];
			       	   $cantidad = $Q1->Record['c_cant'];
			       	   $c_precio = $Q1->Record['c_precio'];
			       	   $c_valor_dev = 0;
			           $c_valor_dev_us =  0;
			       	   $c_fecha = $Q1->Record['c_fecha'];
			       	   $c_motivo = $Q1->Record['c_motivo'];
			       	   $c_moneda = $Q1->Record['c_mon'];
			       	   $COMB =  strtolower( $Q1->Record['COMB'] );
			       	   $__user = $Q1->Record['__user'];

			       	   if($c_moneda === 'G$'){
			       	   	   $c_valor_dev =  $Q1->Record['c_valor_dev'];
			       	   	   $c_valor_dev_us =  0;
						   $z_dev += 0 + $c_valor_dev;
				       	   $NETO = $STEMP - $z_dev   ;
				       	   $Z_NETO = $NETO;
			       	   }else{
			       	   	  $c_valor_dev =  0;
			       	   	  $c_valor_dev_us =  $Q1->Record['c_valor_dev'];
			       	   	  $z_dev_us += 0 + $c_valor_dev_us;
			       	      $NETO_US = $STEMP_US - $z_dev_us   ;

			       	   }


			             echo "<tr style='font-size:12px' > <td> $ref </td>  <td> $cantidad </td> <td> $c_precio  </td>  <td align='right'>". number_format( $c_valor_dev  ,0,',','.') ." </td> <td align='right'>". number_format( $c_valor_dev_us  ,2,',','.') ." </td>  <td>  $c_fecha  </td>  <td colspan='2'>  $c_motivo  </td> <td>  $__user  </td> <td  colspan='4'>  $COMB  </td> </tr>";
			            // echo "<tr style='font-size:12px' ><td>  </td> <td colspan='7'> $COMB  </td> </tr>";
			          if ($j < 1 ) {
			          	 // Totales
			          	 echo "<tr style='font-size:14px;font-weight:bolder;' > <td> &nbsp;  </td>  <td> &nbsp;  </td> <td>  Totales </td>
			          	         <td align='right'>". number_format( $z_dev ,0,',','.') ."   </td> <td colspan='4'> &nbsp;<B>NETO G$</B>  ". number_format( $NETO ,0,',','.') ." </td> <td  colspan='4'> NETO U$  ". number_format( $NETO_US ,0,',','.') ." </td>
			          	       </tr>";
			          }
		          }

		          $T->Show('vacio');
	        }else {
	        	 $Z_NETO = $STEMP;
	        }
	        // Descuentos
	        $Q2->Query('select f.c_ref as REF, f.c_obs as OBS, f.c_descuento as DESCUENTO from mov_compras f where f.c_dev = "*" and f.c_descuento > 0 and c_prov =   "'.$prov_act.'" and f.c_fechafac between "'.$desde.'" and "'.$hasta.'" ;');
 	        $Z_DESC = 0; $k = $Q2->NumRows();
	        if ($Q2->NumRows()>0) {
	        	$T->Show('desc_cab');
	        	 while ($Q2->NextRecord()) {
			       	  $reff = $Q2->Record['REF'];  $obs = $Q2->Record['OBS'];
			       	  $desc = $Q2->Record['DESCUENTO'];
			       	  $Z_DESC += 0 + $desc;
			       	  echo "<tr style='font-size:12px;' > <td> $reff  </td>   <td colspan='10'>Obs:  $obs </td>  <td > &nbsp;<B></B>  ". number_format( $desc ,0,',','.') ."  </td> </tr>";
	        	 }
	        	 $Z_NETO = $Z_NETO - $Z_DESC ;
	        	 echo "<tr style='font-size:14px;font-weight:bolder;' > <td> &nbsp;  </td>  <td> &nbsp;  </td> <td>  Total Descuentos </td>  <td align='right'>". number_format( $Z_DESC ,0,',','.') ."   </td> <td> &nbsp;   </td> <td colspan='3'> &nbsp;<B>NETO</B>  ". number_format( $Z_NETO ,0,',','.') ."  </td> </tr>";

	        } 
$endConsult = true;
if( $el['PROVEEDOR']!=$old['PROVEEDOR'] ){
    $T->Show('query0_subtotal_row');  
    
}
// Show total
$T->Set('total0_MONTOGS', number_format($total0_MONTOGS,2,',','.')); 
$T->Set('total0_MONTOUS', number_format($total0_MONTOUS,2,',','.')); 
// Cuota
$T->Set('total0_CUOTAGS', number_format($total0_CUOTAGS,2,',','.')); 
$T->Set('total0_CUOTAUS', number_format($total0_CUOTAUS,2,',','.')); 

// DIFF
$T_GS = $total0_MONTOGS += 0 - $total0_CUOTAGS;
$T_US = $total0_CUOTAUS += 0 - $total0_CUOTAUS;
$T->Set('totalDIFFGS', number_format($T_GS,2,',','.')); 
$T->Set('totalDIFFUS', number_format($T_US,2,',','.')); 

if( true ){
   $T->Show('query0_subtotal_row'); 	
   $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

<?php

/** Report prg file (rep_ventas_FGT) 
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
$T->Set( 'sup_msg', 'Seleccione el tipo de reporte que desea! El simbolo % indica No mostrar, El %% indica mostrar todos!!!');
$T->Set( 'sup_aut_lock', 'true');
$T->Set( 'sup_rep_localidad', '%');
$T->Set( 'sup_rep_cli', '%');
$T->Set( 'sup_moneda', '%');
$T->Set( 'sup_cli_cat', '%');
$T->Set( 'sup_desde', '2009-01-01');
$T->Set( 'sup_hasta', '2009-01-03');
$T->Set( 'sup_msg2', 'Filtre aqui los datos del Producto!!!');
$T->Set( 'sup_p_fam', '%');
$T->Set( 'sup_p_COLOR', '%');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_rep_ventas', '');
$T->Set( 'sup_desdeinv', '2009-01-01');
$T->Set( 'sup_hastainv', '2009-01-03');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT distinct  p.p_fam as FAM, p.p_COLOR as COLOR,p.p_tipo as TIPO,  d.df_cantidad as CANT, d.df_subtotal as SUBTOTAL  FROM factura f,det_factura d, mnt_prod p WHERE f.fact_nro = d.df_fact_num and d.df_cod_prod = p.p_cod and f.fact_localidad LIKE '%' and f.fact_cli_ci like '%' and p.p_fam like '%' and p.p_COLOR like  '%' and p.p_tipo like '%'  and  f.fact_fecha between '2009-01-01' and '2009-01-03'  and f. fact_estado = "Cerrada" and f.fact_cli_cat like '%' and fact_moneda like  '%' order by p.p_fam , p.p_COLOR , p.p_tipo,d.df_cantidad asc    ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$desde = $sup['desde'];
$hasta = $sup['hasta'];  
$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4); 
$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

if($sup['detallado'] === 'Detallado'){
	$T->Set('tipo','Detallado');
}else{
	$T->Set('tipo','Resumido');
}

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables
$total0_CANT = 0;
$total0_SUBTOTAL = 0;

//Define a Subtotal Variables
$subtotal0_CANT = 0;
$subtotal0_SUBTOTAL = 0;

$FAM = 0;
$COLOR = 0;
$FAM_S = 0;
$COLOR_S = 0;

//Define a Old Values Variables
$old['FAM'] = '';
$old['COLOR'] = '';
 
$old['CANT'] = '';
$old['SUBTOTAL'] = '';



$flag = 0;


// Making a rows of consult
while( $Q0->NextRecord() ){
     $flag++;
    // Define a elements
    $el['FAM'] = $Q0->Record['FAM'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    
    $el['CANT'] = $Q0->Record['CANT'];
    $el['SUBTOTAL'] = $Q0->Record['SUBTOTAL']; 
    

    
    if( ($el['FAM']!=$old['FAM'])||($el['COLOR']!=$old['COLOR']) ){
        if($sup['detallado'] === 'Detallado'){
    	  $T->Show('query0_subtotal_row'); 
        }else {
          //  $T->Show('query0_subtotal_row2');	 
        }
        //Reset a Subtotal Variables
        $subtotal0_CANT = 0;
        $subtotal0_SUBTOTAL = 0; 
    }
 		       if( trim($el['COLOR'])!=trim($old['COLOR'])){
				  if ($flag > 1) {  echo "<tr> <td>&nbsp;&nbsp; ".$old['FAM']." </td> <td colspan='1' align='left' >&nbsp;&nbsp; ".$old['COLOR']."    </td>   <td align='right'> ". number_format( $COLOR ,2,',','.')."  &nbsp;&nbsp;</td>  <td align='right' > ".number_format($COLOR_S,2,',','.')." &nbsp;&nbsp;</td> </tr>";}
				  $COLOR = 0 + $el['CANT'];
				  $COLOR_S = 0 +$el['SUBTOTAL'];
			   }else { 
			      $COLOR += 0 + $el['CANT'];
			      $COLOR_S += 0 +$el['SUBTOTAL'];
			   }
			   if($el['FAM']!=$old['FAM']){
					 if ($flag > 1) {   echo "<tr> <td colspan='2'>&nbsp;&nbsp;<b>".$old['FAM']."   </b></td> <td align='right'><b> ". number_format( $FAM,2,',','.')."  &nbsp;&nbsp;</b></td>  <td align='right'> <b> ".number_format($FAM_S,2,',','.')."</b> &nbsp;&nbsp;</td>  </tr>"; }
					  $FAM = 0 +$el['CANT'];
					  $FAM_S  = 0 +$el['SUBTOTAL'];
			   }else{ 
			       	  $FAM += 0 + $el['CANT'];   
			       	  $FAM_S += 0 +$el['SUBTOTAL'];
			   }	
    // Preparing a template variables
    $T->Set('query0_FAM', $el['FAM']);
    $T->Set('query0_COLOR', $el['COLOR']);
   
    $T->Set('query0_CANT', number_format($el['CANT'],2,',','.'));
    $T->Set('query0_SUBTOTAL', number_format($el['SUBTOTAL'],2,',','.'));

    // Calculating a total
    $total0_CANT += 0 + $el['CANT'];
    $total0_SUBTOTAL += 0 + $el['SUBTOTAL'];

    // Calculating a subtotal
    $subtotal0_CANT += 0 + $el['CANT'];
    $subtotal0_SUBTOTAL += 0 + $el['SUBTOTAL'];
    
    if($sup['detallado'] === 'Detallado'){
      $T->Show('query0_data_row');
    }
    // Show Subtotal
    $T->Set('subtotal0_CANT', number_format($subtotal0_CANT,2,',','.'));
    $T->Set('subtotal0_SUBTOTAL', number_format($subtotal0_SUBTOTAL,2,',','.'));

    
     
    //Actualize Old Values Variables
    $old['FAM'] = $el['FAM'];
    $old['COLOR'] = $el['COLOR'];
    
    $old['CANT'] = $el['CANT'];
    $old['SUBTOTAL'] = $el['SUBTOTAL'];
    $firstRow=false;

}

$endConsult = true;
if( ($el['FAM']!=$old['FAM'])||($el['COLOR']!=$old['COLOR']) ){
       $T->Show('query0_subtotal_row'); 
}
 
// Show total
$T->Set('total0_CANT', number_format($total0_CANT,2,',','.'));
$T->Set('total0_SUBTOTAL', number_format($total0_SUBTOTAL,2,',','.'));
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

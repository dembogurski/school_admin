<?php

/** Report prg file (fdp_compras) 
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
$T->Set( 'sup_busc_prov', '');
$T->Set( 'sup_prov', '');
$T->Set( 'sup_msg2', 'Filtre aqui los datos del Producto!!!');
$T->Set( 'sup_p_grupo', '%');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_p_color', '%');
$T->Set( 'sup_fdp', 'No');
$T->Set( 'sup_desde', '2009-01-01');
$T->Set( 'sup_hasta', '2009-01-10');
$T->Set( 'sup_rep_ajustes', '');
$T->Set( 'sup_rep_aj_con_fdp', '');
$T->Set( 'sup_desdeinv', '2009-01-01');
$T->Set( 'sup_hastainv', '2009-01-10');
$T->Set( 'sup_msg', '( ! ) No importan aqui Proveedor, Grupo, Tipo y Color, Fin de Pieza!!!');
$T->Set( 'sup_ph', 'Si');
$T->Set( 'sup_rep_com_fdp', '');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select c.c_ref as NRO_REF_FACT,c.c_factura as FACTURA_REAL,  DATE_FORMAT(c_fecha,"%d-%m-%Y") as FECHA_COMPRA,p.p_cod as CODIGO, p.p_cant AS CANTIDAD,  p.p_padre as PADRE from mnt_prod p, mov_compras c where  c.c_ref = p.p_ref and c_fecha between  '2009-01-01' and '2009-01-10' ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$desde = $sup['desde'];
$hasta = $sup['hasta'];  
$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4); 
$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

$operacion = $sup['aj_oper'];

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
$subtotal0_CANTIDAD = 0;
$subtotal0_AJUSTE = 0;
$TOTAL_CANTIDAD = 0;


//Define a Old Values Variables
$old['NRO_REF_FACT'] = '';
$old['FACTURA_REAL'] = '';
$old['FECHA_COMPRA'] = '';
$old['CODIGO'] = '';
$old['CANTIDAD'] = '';
$old['PADRE'] = '';

$old['TIPO'] = '';
$old['COLOR'] = '';
$old['DESCRIP'] = '';
$old['GRUPO'] = '';

$codigo = 0;

$aj = 0;

$CANTIDAD = 0;

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['NRO_REF_FACT'] = $Q0->Record['NRO_REF_FACT'];
    $el['FACTURA_REAL'] = $Q0->Record['FACTURA_REAL'];
    $el['FECHA_COMPRA'] = $Q0->Record['FECHA_COMPRA'];
	 $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $el['PADRE'] = $Q0->Record['PADRE'];
  
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['DESCRIP'] = $Q0->Record['DESCRIP'];

	$CANTIDAD ++ ;
	$codigo = $Q0->Record['CODIGO'];	
	 
    // Preparing a template variables
    $T->Set('query0_NRO_REF_FACT', $el['NRO_REF_FACT']);
    $T->Set('query0_FACTURA_REAL', $el['FACTURA_REAL']);
    $T->Set('query0_FECHA_COMPRA', $el['FECHA_COMPRA']);
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_CANTIDAD', number_format($el['CANTIDAD'],0,'.',','));
	
	if($el['PADRE'] != ''){
      $T->Set('query0_PADRE', $el['PADRE']);
	}else{
	   $T->Set('query0_PADRE', "<label style='background-color:99CC99'> &nbsp;&nbsp; Padre &nbsp;&nbsp;   </label>");
	}

    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COLOR', $el['COLOR'] );
	$T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_DESCRIP', $el['DESCRIP']);	
    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CANTIDAD += 0 + $el['CANTIDAD'];
    $TOTAL_CANTIDAD  += 0 + $el['CANTIDAD'];
    
	//if ($sup['tipo']=== 'Detallado') { 
       $T->Show('query0_data_row');
	//}
	 
	$Q1 = new Y_DB();
	$Q1->Database = $Global['project'];
	$Q1->Query('select DATE_FORMAT(aj_fecha,"%d-%m-%Y") as aj_fecha , aj_usuario,aj_inicial, aj_ajuste,aj_final, aj_oper, aj_motivo, aj_signo from mnt_ajustes where aj_prod = '.$codigo.' and aj_oper like "'.$operacion.'"; ' );
	
	if($Q1->NumRows()>0){
	    echo "<tr> <td style='background-color: lightgray;' align='center' colspan='10'> <b> Ajustes </b> </td>  </tr>";
	    $TOTAL_AJ = 0;
	  	while( $Q1->NextRecord() ){
		   $aj_fecha = $Q1->Record['aj_fecha'];
		   $aj_usuario = $Q1->Record['aj_usuario'];
		   $aj_inicial = $Q1->Record['aj_inicial'];
		   $aj_ajuste = $Q1->Record['aj_ajuste'];
		   $aj_final = $Q1->Record['aj_final'];
		   $aj_signo = $Q1->Record['aj_signo'];
		   $aj_oper = $Q1->Record['aj_oper'];
		   $aj_motivo = $Q1->Record['aj_motivo'];
		   
		   if (trim($aj_signo) === '+') {
		   	 $TOTAL_AJ += 0 + $aj_ajuste;
		   	 $subtotal0_AJUSTE += 0 + $aj_ajuste;
		   }else{
		     $TOTAL_AJ += 0 -  $aj_ajuste;
		     $subtotal0_AJUSTE += 0 -  $aj_ajuste;
		   }
		   $T->Set('subtotal0_AJUSTE', number_format($subtotal0_AJUSTE,2,'.',','));
		   if ($sup['tipo']=== 'Detallado') { 
		   		echo "<tr style='font-size: 11;'> <td  >Fecha </td> <td >Usuario</td> <td >Inicial   </td> <td > Ajuste  </td> <td > Final  </td> <td > Oper  </td> <td colspan='4'> Motivo  </td> </tr>";
		  	 	echo "<tr style='font-size: 11;'> <td >$aj_fecha </td> <td >$aj_usuario</td> <td >$aj_inicial   </td> <td > $aj_ajuste  </td> <td > $aj_final  </td> <td > $aj_oper  </td> <td colspan='4'> $aj_motivo  </td> </tr>";
		   }
		} 
		echo '<tr style="font-size: 11;"> <td >  </td> <td > </td> <td > </td> <td >'.  number_format($TOTAL_AJ,2,'.',',') .'  </td> <td > </td> <td > </td> <td colspan="4">  </td> </tr>';
		$aj = 1;
	}else{
	    $aj = 0; 
	}
	

	 
    // Show Subtotal
   
	
    $T->Set('subtotal0_CANTIDAD', number_format($subtotal0_CANTIDAD,2,'.',','));
    $T->Set('TOTAL_CANTIDAD', number_format($TOTAL_CANTIDAD,2,'.',','));
   
    if ($el['GRUPO'] != $old['GRUPO'] && $el['TIPO'] != $old['TIPO'] ) {
       // $T->Show('query0_subtotal_grupo_tipo'); 
        $subtotal0_CANTIDAD = 0;
    } 
  	if($aj){
	   echo  '
	    <tr > <td colspan="11" >. </td> </tr>   
	   <tr style="font-weight:bold;"> <td>NRO_REF_FACT</td>
        <td>FACTURA_REAL</td>
        <td>FECHA_COMPRA</td>
        <td>CODIGO</td>
        <td style="text-align: right;">CANTIDAD</td>
        <td colspan="2">PADRE</td>
		 <td>GRUPO</td>
		        <td>TIPO</td>
        <td>COLOR</td>
        <td>DESCRIP</td> </tr>';
	}  
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANTIDAD = 0;
    }
    
    //Actualize Old Values Variables
    $old['NRO_REF_FACT'] = $el['NRO_REF_FACT'];
    $old['FACTURA_REAL'] = $el['FACTURA_REAL'];
    $old['FECHA_COMPRA'] = $el['FECHA_COMPRA'];
    $old['CODIGO'] = $el['CODIGO'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['PADRE'] = $el['PADRE'];
 
    $old['TIPO'] = $el['TIPO'];
    $old['COLOR'] = $el['COLOR'];
	 $old['GRUPO'] = $el['GRUPO'];
    $old['DESCRIP'] = $el['DESCRIP'];
    $firstRow=false;
    $T->Set('CANTIDAD', number_format($CANTIDAD,0,'.',','));
}

$endConsult = true;
if( $endConsult ){
	//$T->Show('query0_subtotal_grupo_tipo'); 
    $T->Show('query0_subtotal_row');  
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

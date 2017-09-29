<?php

/** Report prg file (rep_compras_det) 
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
$T->Set( 'sup_tipo_rep', 'Compras');
$T->Set( 'sup_rep_localidad', '%');
$T->Set( 'sup_c_prov', '%');
$T->Set( 'sup_rep_cli', '%');
$T->Set( 'sup_desde', '2008-12-15');
$T->Set( 'sup_hasta', '2008-12-15');
$T->Set( 'sup_msg2', 'Filtre aqui los datos del Producto!!!');
$T->Set( 'sup_p_fam', '%');
$T->Set( 'sup_p_grupo', '%');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_p_comp', '%');
$T->Set( 'sup_p_temp', '%');
$T->Set( 'sup_p_estruc', '%');
$T->Set( 'sup_p_clasif', '%');
$T->Set( 'sup_p_color', '%');
$T->Set( 'sup_p_lisoest', '%');
$T->Set( 'sup_rep_ventas', '');
$T->Set( 'sup_rep_compras', '');
$T->Set( 'sup_desdeinv', '2008-12-15');
$T->Set( 'sup_hastainv', '2008-12-15');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT c.c_ref as Nro, c.c_fecha as FECHA, c.c_prov as PROV, c.c_empr as SUC,p.p_cod as COD_PROD, p.p_fam as FAM, p.p_grupo as GRUPO,p.p_tipo as TIPO, p.p_comp as COMP,  p.p_temp as TEMP, p.p_estruc as ESTRUCT,  p.p_clasif as CLASIF,  p.p_color as COLOR, p.p_lisoest as LISOEST,p.p_compra as VALOR, p_cant_compra as CANT_COMPRA FROM mov_compras c, mnt_prod p WHERE c.c_ref = p.p_ref and c.c_empr LIKE '%' and c.c_prov like '%' and p.p_fam like '%' and p.p_grupo like  '%' and p.p_tipo like '%' and p.p_comp like  '%' and p.p_temp like '%' and p.p_estruc like '%'  and p.p_clasif like '%'  and p.p_color like '%' and p.p_lisoest like '%' and c.c_fecha between '2008-12-15' and '2008-12-15' and c.c_estado = "Cerrada"";

$desde = $sup['desdeinv'];
$hasta = $sup['hastainv'];

$suc = $sup['rep_localidad'];
$contado_credito = $sup['rep_cont_cred'];

$suc = $sup['rep_localidad'];
$prov = $sup['c_prov'];
$moneda = $sup['moneda'];

$grupo = $sup['p_grupo'];
$p_tipo = $sup['p_tipo'];
$p_comp = $sup['p_comp'];
$p_temp = $sup['p_temp'];
$p_fam = $sup['p_fam'];
$p_estruc = $sup['p_estruc'];
$p_clasif = $sup['p_clasif'];
$p_color = $sup['p_color'];
$p_lisoest = $sup['p_lisoest'];

$fcierre = $sup['fcierre'];


if($fcierre==='Fecha de Cierre'){

$query0 = "SELECT c.c_ref as Nro, c.c_fecha as FECHA, c.c_prov as PROV, c.c_empr as SUC,c.c_moneda as MONEDA, c.c_valor_total as TOTAL,
p.p_cod as COD_PROD, p.p_fam as FAM, p.p_grupo as GRUPO,p.p_tipo as TIPO, p.p_comp as COMP,  p.p_temp as TEMP, p.p_estruc as ESTRUCT,
p.p_clasif as CLASIF,  p.p_color as COLOR, p.p_lisoest as LISOEST,p.p_compra as VALOR, p_cant_compra as CANT_COMPRA FROM mov_compras c,
 mnt_prod p WHERE c.c_ref = p.p_ref and c.c_empr LIKE '$suc' and c.c_prov like '$prov' and p.p_fam like '$p_fam'
and p.p_grupo like  '$grupo' and p.p_tipo like '$p_tipo' and p.p_comp like  '$p_comp' and p.p_temp like '$p_temp'
and p.p_estruc like '$p_estruc'  and p.p_clasif like '$p_clasif'  and p.p_color like '$p_color' and p.p_lisoest like
'$p_lisoest' and c.c_fecha_cierre between '$desde' and '$hasta' and c.c_estado = 'Cerrada'  and p.p_padre = ''
 and c.c_moneda like '$moneda'  order by  c_ref asc";

}else{
   $query0 = "SELECT c.c_ref as Nro, c.c_fecha as FECHA, c.c_prov as PROV, c.c_empr as SUC,c.c_moneda as MONEDA, c.c_valor_total as TOTAL,
p.p_cod as COD_PROD, p.p_fam as FAM, p.p_grupo as GRUPO,p.p_tipo as TIPO, p.p_comp as COMP,  p.p_temp as TEMP, p.p_estruc as ESTRUCT,
p.p_clasif as CLASIF,  p.p_color as COLOR, p.p_lisoest as LISOEST,p.p_compra as VALOR, p_cant_compra as CANT_COMPRA FROM mov_compras c,
 mnt_prod p WHERE c.c_ref = p.p_ref and c.c_empr LIKE '$suc' and c.c_prov like '$prov' and p.p_fam like '$p_fam'
and p.p_grupo like  '$grupo' and p.p_tipo like '$p_tipo' and p.p_comp like  '$p_comp' and p.p_temp like '$p_temp'
and p.p_estruc like '$p_estruc'  and p.p_clasif like '$p_clasif'  and p.p_color like '$p_color' and p.p_lisoest like
'$p_lisoest' and c.c_fecha between '$desde' and '$hasta' and c.c_estado = 'Cerrada'  and p.p_padre = ''
 and c.c_moneda like '$moneda'  order by  c_ref asc";
}


$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );
$CONTADOR = 0;
 
if( $sup['c_prov'] == '%' ){    
    $T->Set('C_PROV','');
}else{
    $T->Set('C_PROV','PROV');
}
 
if( $sup['rep_localidad'] == '%' ){    
    $T->Set('C_EMPR','');
}else{
    $T->Set('C_EMPR','SUC');
}

if( $sup['p_fam'] == '%' ){    
    $T->Set('C_FAM','');
}else{
    $T->Set('C_FAM','FAMILIA');
}

if( $sup['p_grupo'] == '%' ){    
    $T->Set('C_GRU','');
}else{
    $T->Set('C_GRU','GRUPO');
}

if( $sup['p_tipo'] == '%' ){  
    $T->Set('C_TIPO','');
}else{
    $T->Set('C_TIPO','TIPO');
}

 
if( $sup['p_comp'] == '%' ){    
    $T->Set('C_COMP','');
}else{
    $T->Set('C_COMP','COMP');
}
 
if( $sup['p_temp'] == '%' ){    
    $T->Set('C_TEMP','');
}else{
    $T->Set('C_TEMP','TEMP');
}

 
if( $sup['p_estruc'] == '%' ){   
    $T->Set('C_EST','');
}else{
    $T->Set('C_EST','ESTRUCT');
}
 
if( $sup['p_clasif'] == '%' ){    
    $T->Set('C_CLA','');
}else{
    $T->Set('C_CLA','CLASIF');
}
 
if( $sup['p_color'] == '%' ){    
    $T->Set('C_COLOR','');
}else{
    $T->Set('C_COLOR','COLOR');
}

 
if( $sup['p_lisoest'] == '%' ){   
    $T->Set('C_LISO','');
}else{
    $T->Set('C_LISO','LISOEST');
}
 


$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$data_ini = substr($sup['desde'],8,2).'-'.
			substr($sup['desde'],5,2).'-'.
			substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.
			substr($sup['hasta'],5,2).'-'.
			substr($sup['hasta'],0,4);
$T->Set('data_ini',$data_ini);
$T->Set('data_fin',$data_fin);
$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

$old['Nro'] = '';
$old['FECHA'] = '';
$old['PROV'] = '';
$old['SUC'] = '';
$old['MONEDA'] = '';
$old['VALOR'] = '';
$old['COD_PROD'] = '';
$old['FAM'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COMP'] = '';
$old['TEMP'] = '';
$old['ESTRUCT'] = '';
$old['CLASIF'] = '';
$old['COLOR'] = '';
$old['LISOEST'] = '';
$old['VALOR'] = '';
$old['CANT_COMPRA'] = '';

$subtotal0_TOTAL = 0;

$valor_total= 0;
$valor_totalus= 0;

$subtotal0_CANT_COMPRA = 0;
$valor_compra = 0;

$endConsult = false;

$CONTADOR = 0;
$CANT_FACT = 0;

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header
// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
 
    
    $el['Nro'] = $Q0->Record['Nro'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['PROV'] = $Q0->Record['PROV'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['MONEDA'] = $Q0->Record['MONEDA'];
    $el['TOTAL'] = $Q0->Record['TOTAL'];
    $el['COD_PROD'] = $Q0->Record['COD_PROD'];
    $el['FAM'] = $Q0->Record['FAM'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COMP'] = $Q0->Record['COMP'];
    $el['TEMP'] = $Q0->Record['TEMP'];
    $el['ESTRUCT'] = $Q0->Record['ESTRUCT'];
    $el['CLASIF'] = $Q0->Record['CLASIF'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['LISOEST'] = $Q0->Record['LISOEST'];
    $el['VALOR'] = $Q0->Record['VALOR'];
    $el['CANT_COMPRA'] = $Q0->Record['CANT_COMPRA'];

    // Preparing a template variables
   $CONTADOR++;

    // Preparing a template variables
    
    if( $old['Nro'] != $el['Nro'] ){
    
       $T->Set('query0_Nro', $el['Nro']);
       $T->Set('query0_FECHA', $el['FECHA']);
       $CANT_FACT++;
    
    }else{
    	$T->Set('query0_Nro', '');
    	$T->Set('query0_FECHA','');
    } 
    
    
    
    
    if( $sup['c_prov'] == '%' ){   
       $T->Set('query0_PROV', '');
    }else {
       $T->Set('query0_PROV', $el['PROV']);
    }
    
    if( $sup['rep_localidad'] == '%' ){  
       $T->Set('query0_SUC', '');
    }else {
      if( $old['Nro'] != $el['Nro'] ){ 
    	$T->Set('query0_SUC', $el['SUC']);
     }else{
        $T->Set('query0_SUC',' &nbsp;');
     }  	
   }
   
    if( $old['Nro'] != $el['Nro'] ){ 
        $T->Set('moneda',  $el['MONEDA']);
    }else{
        $T->Set('moneda',' &nbsp;');
     }  
    if( $old['Nro'] != $el['Nro'] ){ 
        if($el['MONEDA']==='G$'){
           $T->Set('valor',  number_format($el['TOTAL'],2,',','.'));   $T->Set('valorus','.');
	   $valor_total += $el['TOTAL'];     
	}else{
           $T->Set('valorus',  number_format($el['TOTAL'],2,',','.')); $T->Set('valor','.');
	   $valor_totalus += $el['TOTAL'];
	}
    }else{
        $T->Set('valor','');
	    $T->Set('valorus','');
     }       
    
    $T->Set('query0_COD_PROD', $el['COD_PROD']);
   
    
     $T->Set('query0_VALOR',  number_format($el['VALOR'],2,',','.'));  
      
    
    if( $sup['p_fam'] == '%' ){ 
     $T->Set('query0_FAM', '');
   }else {
   	 $T->Set('query0_FAM', $el['FAM']);
   }
   
    if($sup['p_grupo'] == '%' ){   
       $T->Set('query0_GRUPO', '');
    }else {
       $T->Set('query0_GRUPO', $el['GRUPO']);
    }
    
    if( $sup['p_tipo'] == '%' ){  
      $T->Set('query0_TIPO', '');
    }else {
      $T->Set('query0_TIPO', $el['TIPO']);
    }
    
    
    if( $sup['p_comp'] == '%' ){  
       $T->Set('query0_COMP','');
    }else {
    	$T->Set('query0_COMP', $el['COMP']);
    }
    
    if( $sup['p_temp'] == '%' ){    
       $T->Set('query0_TEMP', '');
    }else {
    	$T->Set('query0_TEMP', $el['TEMP']);
    }
    
    if( $sup['p_estruc'] == '%' ){  
      $T->Set('query0_ESTRUCT', '');
    }else{
    	  $T->Set('query0_ESTRUCT', $el['ESTRUCT']);
    }
    
    if( $sup['p_clasif'] == '%' ){  
      $T->Set('query0_CLASIF','');
    }else{
    	 $T->Set('query0_CLASIF', $el['CLASIF']);
    }
    
    if( $sup['p_color'] == '%' ){  
      $T->Set('query0_COLOR', '');
    }else{
    	 $T->Set('query0_COLOR', $el['COLOR']);
    }
    
    if( $sup['p_lisoest'] == '%' ){   
      $T->Set('query0_LISOEST', '');
    }else{
    	$T->Set('query0_LISOEST', $el['LISOEST']);
    }
    

  
    $T->Set('query0_CANT_COMPRA',  number_format( $el['CANT_COMPRA'],2,',','.'));   
    $val =  ($el['CANT_COMPRA'] + 0) * ($el['VALOR'] + 0);
    $valor_compra += $val;
     $T->Set('VAL_VALOR',  number_format($val,0,',','.'));    
    
     $subtotal0_TOTAL += 0 + $el['VALOR'];
     $subtotal0_CANT_COMPRA   += 0 + $el['CANT_COMPRA'];
    // Calculating a total

    // Calculating a subtotal   $subtotal0_CANT_COMPRA 

    $T->Show('query0_data_row');
    $T->Set('subtotal0_TOTAL', number_format($subtotal0_TOTAL,0,',','.'));
    $T->Set('subtotal0_CANT_COMPRA', number_format($subtotal0_CANT_COMPRA,2,',','.'));
   $T->Set('total', number_format($valor_total,2,',','.'));
   $T->Set('totalus', number_format($valor_totalus,2,',','.'));
     $T->Set('valor_compra', number_format($valor_compra,2,',','.'));
   
    // Show Subtotal
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
	$subtotal0_TOTAL = 0;
	$subtotal0_CANT_COMPRA= 0;	
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
$old['Nro'] = $el['Nro'];
$old['FECHA'] = $el['FECHA'];
$old['PROV'] =  $el['PROV'];
$old['SUC'] =  $el['SUC'];
$old['MONEDA'] =  $el['MONEDA'];
$old['TOTAL'] =  $el['TOTAL'];
$old['COD_PROD'] =   $el['COD_PROD'];
$old['FAM'] = $el['FAM'];
$old['GRUPO'] = $el['GRUPO'];
$old['TIPO'] = $el['TIPO'];
$old['COMP'] = $el['COMP'];
$old['TEMP'] = $el['TEMP'];
$old['ESTRUCT'] = $el['ESTRUCT'];
$old['CLASIF'] = $el['CLASIF'];
$old['COLOR'] = $el['COLOR'];
$old['LISOEST'] = $el['LISOEST'];
$old['VALOR'] = $el['VALOR'];
$old['CANT_COMPRA'] = $el['CANT_COMPRA'];
  $T->Set('contador', $CONTADOR);
  $T->Set('cant_fact', $CANT_FACT);
  
      
    $firstRow=false;

}

$endConsult = true;
if( $endConsult ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

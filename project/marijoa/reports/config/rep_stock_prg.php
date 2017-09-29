<?php

/** Report prg file (rep_stock) 
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
$T->Set( 'sup_msg', 'El simbolo % indica todos!!!');
$T->Set( 'sup_aut_lock', 'true');
$T->Set( 'sup_rep_localidad', '%');
$T->Set( 'sup_c_prov', '%');
$T->Set( 'sup_desde', '2006-09-15');
$T->Set( 'sup_hasta', '2009-09-15');
$T->Set( 'sup_msg2', 'Filtre  aqui los datos del Producto!!!');
$T->Set( 'sup_p_fam', '%');
$T->Set( 'sup_p_grupo', '%');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_p_comp', '%');
$T->Set( 'sup_p_temp', '%');
$T->Set( 'sup_p_estruc', '%');
$T->Set( 'sup_p_clasif', '%');
$T->Set( 'sup_p_color', '%');
$T->Set( 'sup_p_lisoest', '%');
$T->Set( 'sup_rep_stock', '');
$T->Set( 'sup_desdeinv', '2006-09-15');
$T->Set( 'sup_hastainv', '2009-09-15');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT c.c_ref as Nro, c.c_fecha as FECHA, c.c_prov as PROV, c.c_empr as SUC,p.p_cod as COD_PROD, p.p_fam as FAM, p.p_grupo as GRUPO,p.p_tipo as TIPO, p.p_comp as COMP,  p.p_temp as TEMP, p.p_estruc as ESTRUCT,  p.p_clasif as CLASIF,  p.p_color as COLOR, p.p_lisoest as LISOEST, p_cant as CANTIDAD FROM mov_compras c, mnt_prod p where c.c_ref = p.p_ref and c.c_empr LIKE '%' and c.c_prov like '%' and p.p_fam like '%' and p.p_grupo like  '%' and p.p_tipo like '%' and p.p_comp like  '%' and p.p_temp like '%' and p.p_estruc like '%'  and p.p_clasif like '%'  and p.p_color like '%' and p.p_lisoest like '%' and c.c_fecha between '2006-09-15' and '2009-09-15' and c.c_estado = "Cerrada"";


// ALTERACION PARA QUE SOLO APAREZCAN LOS CAMPOS SELECCIONADOS - MODELO
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

$T->Set( 'fdp', $sup['fdp'] );


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

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables


//Define a Old Values Variables
$old['Nro'] = '';
$old['FECHA'] = '';
$old['PROV'] = '';
$old['SUC'] = '';
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
$old['CANTIDAD'] = '';
$old['VALOR'] = '';

$suma_total = 0;
// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['Nro'] = $Q0->Record['Nro'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['PROV'] = $Q0->Record['PROV'];
    $el['SUC'] = $Q0->Record['SUC'];
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
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $el['VALOR'] = $Q0->Record['VALOR'];
    
    // Preparing a template variables
    $T->Set('query0_Nro', $el['Nro']);
    $T->Set('query0_FECHA', $el['FECHA']);
    
    if( $sup['c_prov'] == '%' ){   
       $T->Set('query0_PROV', '');
    }else {
       $T->Set('query0_PROV', $el['PROV']);
    }
    
    if( $sup['rep_localidad'] == '%' ){  
       $T->Set('query0_SUC', '');
    }else {
    	$T->Set('query0_SUC', $el['SUC']);
    }
    
    $T->Set('query0_COD_PROD', $el['COD_PROD']);
    
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
     $T->Set('query0_CANTIDAD', $el['CANTIDAD']);    
    
   $total =  $el['VALOR'] *  $el['CANTIDAD'] + 0; 
    $T->Set('query0_VALOR', number_format(  $el['VALOR'],0,',','.')); 
    $T->Set('TOTAL',  number_format( $total ,0,',','.'));    
   $suma_total += 0 + $total;  
    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['Nro'] = $el['Nro'];
    $old['FECHA'] = $el['FECHA'];
    $old['PROV'] = $el['PROV'];
    $old['SUC'] = $el['SUC'];
    $old['COD_PROD'] = $el['COD_PROD'];
    $old['FAM'] = $el['FAM'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COMP'] = $el['COMP'];
    $old['TEMP'] = $el['TEMP'];
    $old['ESTRUCT'] = $el['ESTRUCT'];
    $old['CLASIF'] = $el['CLASIF'];
    $old['COLOR'] = $el['COLOR'];
    $old['LISOEST'] = $el['LISOEST'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['VALOR'] = $el['VALOR'];
    $firstRow=false;

}

$endConsult = true;
if( true ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
   $T->Set('suma_total',  number_format( $suma_total ,2,',','.'));    
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

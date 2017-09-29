<?php

/** Report prg file (rep_frac) 
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
$T->Set( 'sup_cod_prod', '9488608');
$T->Set( 'sup_cant_actual', '45.00');
$T->Set( 'sup_ver_ajustes', '');
$T->Set( 'sup_mov_ventas', '');
$T->Set( 'sup_info_trans', '');
$T->Set( 'sup_fracs', '');*/
// ------------------------------------------


// Buscar el Padre
$codigo = $sup['cod_prod'];

$db = new Y_DB();
$db->Database = $Global['project'];
$db->Query("select p_ref,  p_fam,p_grupo,p_tipo,p_comp,p_temp,p_color,p_descri from mnt_prod where p_cod = $codigo;");

if(  $db->NumRows() > 0  ){  
   $db->NextRecord();
   $ref = $db->Record['p_ref'];
   $sector = $db->Record['p_fam'];
   $grupo = $db->Record['p_grupo'];
   $tipo = $db->Record['p_tipo'];
   $comp = $db->Record['p_comp'];
   $temp = $db->Record['p_temp'];
   $color = $db->Record['p_color'];
   $descr = $db->Record['p_descri'];
   $query0 = "select p_ref AS REF, p_cod as CODIGO,p_foto  as FOTO,p_grupo as GRUPO, p_tipo as TIPO, p_comp as COMP,  p_temp as TEMP, p_estruc as ESTRUCT,  p_color as COLOR, p_lisoest as LISOEST,p_descri as DESCRIPCION, prod_fin_pieza as FDP, p_cant as CANTIDAD,p_cant_compra CANT_COMPRA, p_local as SUC  "
           . " FROM  mnt_prod where p_ref = $ref and p_fam = '$sector' and p_grupo = '$grupo' and p_tipo = '$tipo' and p_comp = '$comp' and p_temp = '$temp' and p_color = '$color' and p_descri = '$descr' order by p_local asc   ";
 // echo   $query0;
  $T->Set( 'referencia',$ref ); 
}else{
    echo "Codigo no existe!!!";
    die();
}
 
/*

function  buscarPadre($codigo){
   $db = new Y_DB();
   $db->Database = $Global['project'];
   $db->Query("select p_cod,p_padre from mnt_prod where p_cod = $codigo"); 
   if($db->NumRows() > 0){
       $db->NextRecord();
       $c  = $db->Record['p_cod'];
       $padre = $db->Record['p_padre'];
       
        //echo "<br>Codigo: $c Padre:  |$padre|";
       if($padre == "0" || $padre == ""){  
          $GLOBALS['codigo_padre'] = $c; 
          return $c; // El es el Padre 
       }else{ 
           //echo "<br>Dado $codigo Buscando padre de:  $padre";
           buscarPadre($padre);
       } 
   } 
}
*/ 

  
$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );
 
$T->Set( 'codigo', $el['cod_prod'] );

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
$old['CODIGO'] = '';
$old['REF'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COMP'] = '';
$old['TEMP'] = '';
$old['ESTRUCT'] = '';
$old['COLOR'] = '';
$old['LISOEST'] = '';
$old['DESCRIPCION'] = '';
$old['CANTIDAD'] = '';
$old['SUC'] = '';
$old['VALOR'] = '';
$old['CANT_COMPRA'] = ''; 
$old['FOTO'] = ''; 
$old['FDP'] = '';
 
 
$total_suc = 0;
// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['REF'] = $Q0->Record['REF'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COMP'] = $Q0->Record['COMP'];
    $el['TEMP'] = $Q0->Record['TEMP'];
    $el['ESTRUCT'] = $Q0->Record['ESTRUCT'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['LISOEST'] = $Q0->Record['LISOEST'];
    $el['DESCRIPCION'] = $Q0->Record['DESCRIPCION'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['CANT_COMPRA'] = $Q0->Record['CANT_COMPRA'];
    $el['FOTO'] = $Q0->Record['FOTO'];
    $el['FDP'] = $Q0->Record['FDP'];
    
    if($el['CODIGO'] == $codigo){
       $T->Set( 'fondo', "lightblue" ); 
    }else{
       $T->Set( 'fondo', "white" ); 
    }
     
   if($el['SUC'] != $old['SUC'] && $old['SUC']!=''){
        $T->Show('query0_subtotal_row');
        $total_suc=0;
   } 
    
    $total_suc += 0 + $el['CANTIDAD'];
    $T->Set( 'total_suc',  number_format($total_suc,2,',','.'));
     
    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_FDP', $el['FDP']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COMP', $el['COMP']);
    $T->Set('query0_TEMP', $el['TEMP']);
    $T->Set('query0_ESTRUCT', $el['ESTRUCT']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_LISOEST', $el['LISOEST']);
    $T->Set('query0_DESCRIPCION', $el['DESCRIPCION']);
    $T->Set('query0_CANTIDAD', $el['CANTIDAD']);
    $T->Set('query0_SUC', $el['SUC']); 
    $T->Set('query0_CANT_COMPRA', $el['CANT_COMPRA']);

    $foto = $el['FOTO'];
    $ref = $el['REF'];
    $T->Set('ref',$ref);
    if($foto != null){
        $url = "prod_images/$ref/$foto.jpg";
        $T->Set('foto','<img src="images/image.png" title="Ver Imagen '.$url.'" style="cursor:pointer" onclick=verImagen("'.$url.'") >');
    }else{
        $T->Set('foto','&nbsp;');
    }
    
    $fdp = $el['FDP'];
    
    if($fdp == 'Si'){
       $T->Set('estado','red');
    }elseif($fdp == 'R'){
       $T->Set('estado','orange');
    }elseif($fdp == 'RS'){
      $T->Set('estado','gray'); 
    }elseif($fdp == 'Tr'){
      $T->Set('estado','lightblue');
    }else{
      $T->Set('estado','white');
    }
    

    $T->Show('query0_data_row');
 
    
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COMP'] = $el['COMP'];
    $old['TEMP'] = $el['TEMP'];
    $old['ESTRUCT'] = $el['ESTRUCT'];
    $old['COLOR'] = $el['COLOR'];
    $old['LISOEST'] = $el['LISOEST'];
    $old['DESCRIPCION'] = $el['DESCRIPCION'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['SUC'] = $el['SUC'];
    $old['CANT_COMPRA'] = $el['CANT_COMPRA'];
    $old['FOTO'] = $el['FOTO'];
    $old['REF'] = $el['REF']; 
    $old['FDP'] = $el['FDP'];
    $firstRow=false;

}






$endConsult = true;
if( true ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

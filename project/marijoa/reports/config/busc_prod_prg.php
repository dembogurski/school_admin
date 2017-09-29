<?php

/** Report prg file (busc_prod) 
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
$T->Set( 'sup_msg2', 'Filtre  aqui los datos del Producto!!! SE LISTAN LOS PRIMEROS 30 DATOS');
$T->Set( 'sup_p_cod', '');
$T->Set( 'sup_p_local', '%');
$T->Set( 'sup___msg', '( ! ) Los Items de la derecha son solo guías!!! ');
$T->Set( 'sup_p_fam', 'articulos%');
$T->Set( 'sup_f', 'ARTICULOS DE BEBE');
$T->Set( 'sup_p_grupo', '%');
$T->Set( 'sup_g', '');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_t', '');
$T->Set( 'sup_p_comp', '%');
$T->Set( 'sup_c', '');
$T->Set( 'sup_p_temp', '%');
$T->Set( 'sup_tp', '');
$T->Set( 'sup_p_estruc', '%');
$T->Set( 'sup_e', '');
$T->Set( 'sup_p_clasif', '%');
$T->Set( 'sup_cl', '');
$T->Set( 'sup_p_lisoest', '%');
$T->Set( 'sup_p_color', '%');
$T->Set( 'sup_l', '%');
$T->Set( 'sup_cr', '');
$T->Set( 'sup_msg', 'Use el comodin (%) para abarcar busquedas mas amplias Ej.:   %a cuandros%  ');
$T->Set( 'sup_p_descri', '');
$T->Set( 'sup_p_cant', '');
$T->Set( 'sup___report', '');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p_cod as CODIGO,p_fam AS FAMILIA,p_grupo AS GRUPO,p_tipo AS TIPO,p_color AS COLOR,p_descri AS DESCRIPCION,p_cant AS CANT,p_local AS SUC FROM mnt_prod WHERE p_local LIKE '%' AND p_fam LIKE 'articulos%' AND p_grupo LIKE '%' AND p_tipo LIKE '%' AND p_comp LIKE '%' AND p_temp LIKE '%' AND p_estruc LIKE '%' AND p_clasif LIKE '%' AND p_lisoest LIKE '%' AND p_color LIKE '%'order by p_fam  LIMIT 50;";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$db = new Y_DB();
$db->Database = 'marijoa';

$db2 = new Y_DB();
$db2->Database = 'marijoa';

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
$old['FAMILIA'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COLOR'] = '';
$old['DESCRIPCION'] = '';
$old['CANT'] = '';
$old['SUC'] = '';
$old['PRECIO_1'] = '';
$old['FOTO'] = '';
$old['REF'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['FAMILIA'] = $Q0->Record['FAMILIA'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['DESCRIPCION'] = $Q0->Record['DESCRIPCION'];
    $el['CANT'] = $Q0->Record['CANT'];
    $el['SUC'] = $Q0->Record['SUC'];
	$el['PRECIO_1'] = $Q0->Record['PRECIO_1'];
        $el['FOTO'] = $Q0->Record['FOTO'];
        $el['REF'] = $Q0->Record['REF'];

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_FAMILIA', $el['FAMILIA']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_DESCRIPCION', $el['DESCRIPCION']);
    $T->Set('query0_CANT', $el['CANT']);
    $T->Set('query0_SUC', $el['SUC']);
	$T->Set('query0_PRECIO_1', $el['PRECIO_1']);
        
     $foto = $el['FOTO'];
    $ref = $el['REF'];
    
    $codigo = $el['CODIGO'];
   
    if($foto != null){
        $url = "prod_images/$ref/$foto.jpg";
        $T->Set('foto','<img src="images/image.png" title="Ver Imagen" style="cursor:pointer" onclick=verImagen("'.$url.'") >');
    }else{
        $T->Set('foto','&nbsp;');
    }
    // Verificar si no esta en Nota de Remision, y nota de pedido
    
    $db2->Query("SELECT r.rem_nro AS Nro, CONCAT(rem_origen,'->',rem_destino) AS Destino FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND r.rem_estado != 'Cerrada'  AND d.df_cod_prod =  $codigo");
    if($db2->NumRows()>0){
        $db2->NextRecord();
        $nro = $db2->Record['Nro'];
        $destino = $db2->Record['Destino'];
        $T->Set('rem_ped',"Remito: $nro Dest.: $destino");        
    }else{
        $db2->Query("SELECT nro,__user AS usuario FROM nota_pedido p, nota_pedido_det d WHERE p.nro = d.nro_pedido AND p.estado != 'Cerrado' AND d.codigo = $codigo");
         if($db2->NumRows()>0){
             $db2->NextRecord();
             $nro = $db2->Record['nro'];
             $usuario = $db2->Record['usuario'];
             $T->Set('rem_ped',"Pedido: $nro ($usuario)");
         }else{
             $T->Set('rem_ped',"Libre");
         }
        
    } 

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
    $old['FAMILIA'] = $el['FAMILIA'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COLOR'] = $el['COLOR'];
    $old['DESCRIPCION'] = $el['DESCRIPCION'];
    $old['CANT'] = $el['CANT'];
    $old['SUC'] = $el['SUC']; 
	$old['PRECIO_1'] = $el['PRECIO_1'];
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

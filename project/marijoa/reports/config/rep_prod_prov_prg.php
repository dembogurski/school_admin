<?php

/** Report prg file (rep_prod_prov) 
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
$T->Set( 'sup_prov', '1');
$T->Set( 'sup_p_cod', '');
$T->Set( 'sup_cod', '%');
$T->Set( 'sup_local', '%');
$T->Set( 'sup_p_grupo', '%');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_p_color', '%');
$T->Set( 'sup_ver', '');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT c.c_prov AS PROV,pr.prov_nombre as NOMBRE_PROV ,p.p_cod AS CODIGO, p.p_local as SUC,p.p_fam as FAM,p.p_grupo as GRUPO,p.p_tipo as TIPO,p.p_comp as COMP,p.p_temp as TEMP,p.p_estruc as ESTRUCT,p.p_clasif as CLASIF, p.p_color as COLOR,p.p_descri as DESCRIP,p.p_cant as CANT,p.p_precio_1 as PRECIO_1 FROM mov_compras c, mnt_prod p,mnt_prov pr  where c.c_ref = p.p_ref AND c.c_prov like '1' and p.p_cod like '%' and p.p_local like '%'  and p.p_grupo like '%'  and p.p_tipo like '%' and p.p_color like   '%' and pr.prov_cod = c.c_prov";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$db = new Y_DB();
$db->Database = 'marijoa';

$db2 = new Y_DB();
$db2->Database = 'marijoa';

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

$ubic = $sup['ubic'];

$TOTAL = 0;
$ZPRECIO = 0;

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables


//Define a Old Values Variables
$old['PROV'] = '';
$old['NOMBRE_PROV'] = '';
$old['CODIGO'] = '';
$old['SUC'] = '';
$old['FAM'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COMP'] = '';
$old['TEMP'] = '';
$old['ESTRUCT'] = '';
$old['CLASIF'] = '';
$old['COLOR'] = '';
$old['DESCRIP'] = '';
$old['CANT'] = '';
$old['ANCHO'] = '';
$old['PRECIO_1'] = '';
$old['PREC_COSTO'] = '';
$old['FOTO'] = '';
$old['REF'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['PROV'] = $Q0->Record['PROV'];
    $el['NOMBRE_PROV'] = $Q0->Record['NOMBRE_PROV'];
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['REF'] = $Q0->Record['REF'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['FAM'] = $Q0->Record['FAM'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COMP'] = $Q0->Record['COMP'];
    $el['TEMP'] = $Q0->Record['TEMP'];
    $el['ESTRUCT'] = $Q0->Record['ESTRUCT'];
    $el['CLASIF'] = $Q0->Record['CLASIF'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['DESCRIP'] = $Q0->Record['DESCRIP'];
    $el['CANT'] = $Q0->Record['CANT'];
    $el['ANCHO'] = $Q0->Record['ANCHO'];
    $el['PRECIO_1'] = $Q0->Record['PRECIO_1'];
    $el['PREC_COSTO'] = $Q0->Record['PREC_COSTO'];
    $el['FOTO'] = $Q0->Record['FOTO'];
    if( true ){
       // $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    $codigo = $el['CODIGO'];
    
    if($ubic == 'Si'){ 
       $db->Query("SELECT CONCAT(operacion,'   ',estante,'-',fila,'-',col ) AS ubic FROM ubic WHERE codigo = '$codigo' ORDER BY id DESC LIMIT 1");
       
       if($db->NumRows()>0){
           $db->NextRecord();
           $u = $db->Record['ubic'];
           $T->Set('ubic', $u);
       }else{
           $T->Set('ubic','N/A');
       }
    }
    
    $foto = $el['FOTO'];
    $ref = $el['REF'];
   
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
    
    // Preparing a template variables
    $T->Set('query0_PROV', $el['PROV']);
    $T->Set('query0_NOMBRE_PROV', $el['NOMBRE_PROV']);
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_FAM', $el['FAM']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COMP', $el['COMP']);
    $T->Set('query0_TEMP', $el['TEMP']);
    $T->Set('query0_ESTRUCT', $el['ESTRUCT']);
    $T->Set('query0_CLASIF', $el['CLASIF']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_DESCRIP', $el['DESCRIP']);
    $T->Set('query0_CANT', $el['CANT']);
    $T->Set('query0_ANCHO', $el['ANCHO']);
    $T->Set('query0_PRECIO_1', $el['PRECIO_1']);
    $T->Set('query0_PREC_COSTO', number_format($el['PREC_COSTO'], 2, ',', '.'));   
     

    // Calculating a total
     $TOTAL = $TOTAL + 0 + $el['CANT'];
    
    // Calculating a subtotal
     $T->Set('TOTAL', number_format( $TOTAL,2,',','.') );
    $T->Show('query0_data_row');
    // Show Subtotal
    
    //Actualize Old Values Variables
    $old['PROV'] = $el['PROV'];
    $old['NOMBRE_PROV'] = $el['NOMBRE_PROV'];
    $old['CODIGO'] = $el['CODIGO'];
    $old['SUC'] = $el['SUC'];
    $old['FAM'] = $el['FAM'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COMP'] = $el['COMP'];
    $old['TEMP'] = $el['TEMP'];
    $old['ESTRUCT'] = $el['ESTRUCT'];
    $old['CLASIF'] = $el['CLASIF'];
    $old['COLOR'] = $el['COLOR'];
    $old['DESCRIP'] = $el['DESCRIP'];
    $old['CANT'] = $el['CANT'];
	$old['ANCHO'] = $el['ANCHO'];
    $old['PRECIO_1'] = $el['PRECIO_1'];
    $old['FOTO'] = $el['FOTO'];
    $old['REF'] = $el['REF'];
    $old['PREC_COSTO'] = $el['PREC_COSTO'];
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

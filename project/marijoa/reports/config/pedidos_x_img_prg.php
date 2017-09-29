<?php

/** Report prg file (pedidos_x_img) 
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
$T->Set( 'sup___user', 'Developer');
$T->Set( 'sup___local', '04');
$T->Set( 'sup___suc', 'OBLIGADO');
$T->Set( 'sup___moveto', '');
$T->Set( 'sup___movme', 'false');
$T->Set( 'sup___msg20', '( ! ) Ya estas ahi TORPE!!! :P ');
$T->Set( 'sup_bcodigo', '%');
$T->Set( 'sup_fdp', 'No');
$T->Set( 'sup_galery', '');
$T->Set( 'sup_fam', '');
$T->Set( 'sup_gr', '');
$T->Set( 'sup_gru', '');
$T->Set( 'sup_tp', '');
$T->Set( 'sup_tipo', '');
$T->Set( 'sup_clr', '');
$T->Set( 'sup_color', '');
$T->Set( 'sup_s', '%');
$T->Set( 'sup___msg2', '( ! ) Estas buscando tu propia sucursal!!!');
$T->Set( 'sup_check', '0');
$T->Set( 'sup_lcod', '');
$T->Set( 'sup_pprov', 'No');
$T->Set( 'sup_verif_prov', '0');
$T->Set( 'sup_msg5', '');
$T->Set( 'sup_mts', '');
$T->Set( 'sup_lprod', '');
$T->Set( 'sup_p_pend', '');
$T->Set( 'sup_exis_pend', '0');
$T->Set( 'sup_investigar_ped', '');
$T->Set( 'sup_nro_ped_pnd', '');
$T->Set( 'sup_pedido', '0.00');
$T->Set( 'sup_remito', '');
$T->Set( 'sup_style', '');
$T->Set( 'sup_notapedido', '');
$T->Set( 'sup_existencia', '0');
$T->Set( 'sup_prods_simil', '');
$T->Set( 'sup_df_stad', '0');
$T->Set( 'sup_mayorista', 'No');
$T->Set( 'sup_urg', 'No');
$T->Set( 'sup___msg3', '( ! ) Pedido > a la Disponibilidad!!!');
$T->Set( 'sup___msg4', '( ! ) Aún no se ha generado pedido a la sucursal destino!!! Generar uno...');
$T->Set( 'sup_inserta', 'false');
$T->Set( 'sup_add', 'false');
$T->Set( 'sup_addprov', 'false');
$T->Set( 'sup_ped_ab', '');
$T->Set( 'sup___reload', '');
$T->Set( 'sup___reload2', '');
$T->Set( 'sup___msg5', '');
$T->Set( 'sup_styles', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT * FROM mnt_fam WHERE f_cod <> "JOSE YUNIS" AND f_cod <> "ACTIVO FIJO"";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$suc = $sup['__local'];
$T->Set( 'suc', $suc );
 

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
$old['id'] = '';
$old['f_cod'] = '';
$options = "";
// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['id'] = $Q0->Record['id'];
    $el['f_cod'] = $Q0->Record['f_cod'];
   
    $sector = $el['f_cod'];  
    
    $options  .="<option value='$sector'>$sector</option>";
        
    $T->Set('sector_options', $options);
    
      
    //Actualize Old Values Variables
    $old['id'] = $el['id'];
    $old['f_cod'] = $el['f_cod'];
    $firstRow=false;

}
 $T->Show('query0_data_row');
 
// Buscar Remisiones 
$T->Show('remisiones_cab');

$db = new Y_DB();
$db->Database = 'marijoa';
$dbd = new Y_DB();
$dbd->Database = 'marijoa';
$remitos = "SELECT nro,DATE_FORMAT(fecha,'%d-%m-%Y') AS fecha, __user AS usuario,__locald AS destino FROM nota_pedido WHERE estado = 'Abierta' AND __local = '$suc' order by __locald asc";
$db->Query($remitos);

while($db->NextRecord()){
    $nro = $db->Record['nro'];          $T->Set("nro",$nro);
    $fecha = $db->Record['fecha'];      $T->Set("fecha",$fecha);
    $usuario = $db->Record['usuario'];  $T->Set("usuario",$usuario);
    $destino = $db->Record['destino'];  $T->Set("destino",$destino);
    $T->Show('rtable');
    $dbd->Query("SELECT codigo,p_foto, p_ref FROM nota_pedido_det d, mnt_prod p WHERE p.p_cod = d.codigo AND  nro_pedido = $nro");
    while($dbd->NextRecord()){
       $cod = $dbd->Record['codigo'];   
       $foto = $dbd->Record['p_foto'];
       $ref = $dbd->Record['p_ref'];   
       if($foto == null){
           $T->Set("d_src","images/no-image-mini.png");
       }else{
           $T->Set("d_src","prod_images/$ref/$foto.jpg");
       }
       $T->Set("d_cod",$cod);
      $T->Show('table_data');
    }
    $T->Show('rtableend');
}


$T->Show('remisiones_data');
$T->Show('remisiones_foot');
$T->Show('end_query0');				// Ends a Table 

?>

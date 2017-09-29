<?php

/** Report prg file (packing_list) 
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
$T->Set( 'sup_c_ref', '5335');
$T->Set( 'sup_c_empr', '00');
$T->Set( 'sup_c_busc', '');
$T->Set( 'sup_c_prov', '42');
$T->Set( 'sup_c_cta_prov', '2.01.01.01');
$T->Set( 'sup_c_fecha', '2011-05-19');
$T->Set( 'sup_c_fechafac', '2010-12-23');
$T->Set( 'sup_c_msg', 'ATENCION!!! Proveedor sin Codigo de Contabilidad!!!');
$T->Set( 'sup_c_style', '');
$T->Set( 'sup_c_n_prov', 'TEX TELA');
$T->Set( 'sup_c_c_fact', 'Si');
$T->Set( 'sup_c_factura', '33192');
$T->Set( 'sup_c_c_int', 'Si');
$T->Set( 'sup_c_interno', '');
$T->Set( 'sup_c_moneda', 'U$');
$T->Set( 'sup_c_cambio', '4800');
$T->Set( 'sup_c_nac_int', 'Internacional');
$T->Set( 'sup_c_ant', 'No');
$T->Set( 'sup_c_cta_ant', '');
$T->Set( 'sup_c_valor_total', '31303.02');
$T->Set( 'sup_c_valor_factl', '0.00');
$T->Set( 'sup_c_desglosar', 'No');
$T->Set( 'sup_c_fi', '2000.00');
$T->Set( 'sup_c_iva', '0.00');
$T->Set( 'sup_c_fif', '0.00');
$T->Set( 'sup_c_seg', '0.00');
$T->Set( 'sup_c_fit', '0.00');
$T->Set( 'sup_c_comis_rem', '0.00');
$T->Set( 'sup_c_fn', '0.00');
$T->Set( 'sup_c_di', '7200.00');
$T->Set( 'sup_c_cp', '0.00');
$T->Set( 'sup_c_viatico', '0.00');
$T->Set( 'sup_c_manip', '0.00');
$T->Set( 'sup_c_comis_forw', '0.00');
$T->Set( 'sup_c_multas', '0.00');
$T->Set( 'sup_c_otros', '120.00');
$T->Set( 'sup_c_sobre_costo', '29.77');
$T->Set( 'sup_c_tipo', 'Contado');
$T->Set( 'sup_c_aut_gen', 'No');
$T->Set( 'sup_c_gen', '');
$T->Set( 'sup_c_change', '');
$T->Set( 'sup_c_estado', 'Abierta');
$T->Set( 'sup_c_dev', '');
$T->Set( 'sup_c_descuento', '0.00');
$T->Set( 'sup_imprimir', '');
$T->Set( 'sup_c_obs', '');
$T->Set( 'sup_imprimir_dev', '');
$T->Set( 'sup_c_type', 'Nuevo');
$T->Set( 'sup_subir_archivo', '');
$T->Set( 'sup_subir_packing', '');
$T->Set( 'sup_packing_list', '');
$T->Set( 'sup_update_data', '');
$T->Set( 'sup_frac_x_color', '');
$T->Set( 'sup_frac_x_fgt', '');
$T->Set( 'sup_remitir', '');
$T->Set( 'sup_recib_rollos', '');
$T->Set( 'sup_c_cant_trs', '');
$T->Set( 'sup_c_filtrar', 'Padre');
$T->Set( 'sup_p_filter', '');
$T->Set( 'sup_c_filtro', 'p_padre');
$T->Set( 'sup_c_compras_det', '');
$T->Set( 'sup_c_compras_detc', '');
$T->Set( 'sup_c_pagos_det', '');
$T->Set( 'sup_c_devoluciones', '');
$T->Set( 'sup_c_lib_ins', 'true');
$T->Set( 'sup_monto_abonado', '0.00');
$T->Set( 'sup___disableDel', 'true');
$T->Set( 'sup___disableChange', '');
$T->Set( 'sup___msg', '');
$T->Set( 'sup_c_bloq_ins', '');
$T->Set( 'sup_c_lib_tr', 'false');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT  p_design ,p_mar ,p_bag ,p_precio ,p_color_desc ,p_each_quty ,p_unit ,p_cod ,p_color ,p_qty_ticket ,p_kg_real ,p_ancho ,p_gram ,p_foto FROM  packing_list p WHERE  p.pack_ref ='5335' ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );



$ref = $sup['c_ref'];
$factura = $sup['c_factura'];

$color_descrip = $_REQUEST['color_desc'];
if($color_descrip == ""){
    $color_descrip = "%";
}
$T->Set( 'color_descrip', $color_descrip );

$filtromar = $_REQUEST['mar'];
$T->Set( 'mar', $filtromar );
if($filtromar == ""){
    $filtromar = "%";
}
$solo_incompletos = $_REQUEST['completos'];

if($solo_incompletos == "true"){
   $T->Set( 'estado_completos', "checked" );
}else{
   $T->Set( 'estado_completos', "" );
}


$limite = $_REQUEST['c_limite']; 
if($limite == ""){ 
    $limite = $sup['c_limite']; //echo $limite; die();
}

$inicio = $_REQUEST['inicio'];
if($inicio == ""){
    $inicio = 0;
}

$T->Set( 'inicio', $inicio );
$T->Set( 'limite', $limite );

$siguiente = $inicio + $limite; 
$anterior = $inicio - $limite;
if($anterior < 0){
    $anterior = 0;
}
 

$T->Set( 'fin', $siguiente );


$server = $_SERVER["SERVER_NAME"];

$port = $_SERVER['SERVER_PORT'];

$url = $_SERVER["REQUEST_URI"];
 

$url_actual = "http://" . $server.":".$port."".$url;

 

$T->Set( 'sig', $url_actual."&inicio=$siguiente" );
$T->Set( 'ant', $url_actual."&inicio=$anterior" );
$T->Set( 'actual', $url_actual."&inicio=$inicio" );

$T->Set( 'ref', $ref );
$T->Set( 'invoice', $factura );



$query0 = "SELECT id, p_design ,p_mar ,p_bag + 0 as p_bag ,p_precio ,p_color_desc ,p_each_quty ,p_unit ,p_cod ,p_color ,p_qty_ticket ,p_kg_real ,p_ancho ,p_gram ,p_foto,p_print FROM  packing_list p WHERE  p.pack_ref = $ref and p_mar like '$filtromar' and p_color_desc like '$color_descrip' order by  p_design asc, p_mar asc, p_bag asc,p_cod asc limit $inicio, $limite";

//echo $query0;

function getTiempo() { 
        list($usec, $sec) = explode(" ",microtime()); 
        return ((float)$usec + (float)$sec); 
} 
$TiempoInicial = getTiempo(); 


$db = new Y_DB(); 
$db->Database = 'marijoa'; 
$sql = "SELECT p_fecha as  fecha,p_fecha_cierre, p_transp,p_super,p_integrantes,p_obs, p_estado FROM packing_cab WHERE p_ref = $ref"; 
$db->Query($sql);
if($db->NumRows()>0){
    $db->NextRecord();
    $fecha = $db->Record['fecha'];
    $p_fecha_cierre = $db->Record['p_fecha_cierre'];
    $transp = $db->Record['p_transp'];
    $p_super = $db->Record['p_super'];
    $int = $db->Record['p_integrantes'];
    $obs = $db->Record['p_obs'];
    $estado = $db->Record['p_estado'];
    
    $T->Set( 'superv', $p_super );  
    $T->Set( 'fecha_desc', $fecha );
    $T->Set( 'fecha_fin', $p_fecha_cierre );
    $T->Set( 'transp', $transp );
    $T->Set( 'superv', $p_super );
    $T->Set( 'integ', $int );
    $T->Set( 'observacion', $obs );
    
    $disabled = 'disabled';
 
    if($estado == 'Cerrado'){
       $T->Set( 'state', 'readonly' );
       $T->Set( 'estado', '<input type="text" size="10" id="estado" style="text-align:center" readonly value="Cerrado">');
    }else{
        $T->Set( 'estado',   '<select id="estado" onchange="saveCab()" >
                                       <option value="Abierto">Abierto</option>
                                       <option value="Cerrado">Cerrado</option>
                                   </select> '  );
        $disabled = '';
    }
    
     $sql = "SELECT emp_cod, emp_nombre FROM par_empresas WHERE emp_tipo = 'Deposito'"; 
    $db->Query($sql);
    $sucs = '<select id="depositos" '.$disabled.' onchange="saveCab()" >';
    while($db->NextRecord()){ 
        $dep = $db->Record['emp_cod'];
        $dep_nombre = $db->Record['emp_nombre'];
        $sucs .= '<option value="'.$dep.'">'.$dep.' - '.$dep_nombre.'</option>';
    }    
     $sucs .= '</select>';
     $T->Set( 'depositos', $sucs ); 
    
     
}

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
$subtotal0_p_each_quty = 0;
$subtotal0_p_qty_ticket = 0;


//Define a Old Values Variables
$old['id'] = '';
$old['p_design'] = '';
$old['p_mar'] = '';
$old['p_bag'] = '';
$old['p_precio'] = '';
$old['p_color_desc'] = '';
$old['p_each_quty'] = '';
$old['p_unit'] = '';
$old['p_cod'] = '';
$old['p_color'] = '';
$old['p_qty_ticket'] = '';
$old['p_kg_real'] = '';
$old['p_ancho'] = '';
$old['p_gram'] = '';
$old['p_foto'] = '';
$old['p_print'] = '';

$cant = 0;
$cant_rec = 0;
        
// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['id'] = $Q0->Record['id'];
    $el['p_design'] = $Q0->Record['p_design'];
    $el['p_mar'] = $Q0->Record['p_mar'];
    $el['p_bag'] = $Q0->Record['p_bag'];
    $el['p_precio'] = $Q0->Record['p_precio'];
    $el['p_color_desc'] = $Q0->Record['p_color_desc'];
    $el['p_each_quty'] = $Q0->Record['p_each_quty'];
    $el['p_unit'] = $Q0->Record['p_unit'];
    $el['p_cod'] = $Q0->Record['p_cod'];
    $el['p_color'] = $Q0->Record['p_color'];
    $el['p_qty_ticket'] = $Q0->Record['p_qty_ticket'];
    $el['p_kg_real'] = $Q0->Record['p_kg_real'];
    $el['p_ancho'] = $Q0->Record['p_ancho'];
    $el['p_gram'] = $Q0->Record['p_gram'];
    $el['p_foto'] = $Q0->Record['p_foto'];
    $el['p_print'] = $Q0->Record['p_print'];
    
    $cant++; 
    
    if( ($old['p_design']!=$el['p_design'] || $old['p_mar']!=$el['p_mar'])  &&  $old['p_mar']!= '' ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_p_each_quty = 0;
        $subtotal0_p_qty_ticket = 0;
    } 
    
    if( $old['p_design']!=$el['p_design']){
        $T->Set('query0_p_design', $el['p_design']);
    }else{
        $T->Set('query0_p_design', '');
    }
    
    // Preparing a template variables
    
    $T->Set('id', $el['id']);
    $T->Set('query0_p_mar', $el['p_mar']);
    $T->Set('query0_p_bag', $el['p_bag']);
    $T->Set('query0_p_precio', number_format($el['p_precio'],2,'.',',')); 
    
    $color_desc_sanit = str_replace("/","-",trim($el['p_color_desc']));
    $color_desc_sanit = str_replace(" ","-",$color_desc_sanit);
    
    $T->Set('query0_p_color_desc', $color_desc_sanit);
    $T->Set('query0_p_each_quty', number_format($el['p_each_quty'],2,'.',','));
    $T->Set('query0_p_unit', $el['p_unit']);
    $T->Set('query0_p_cod', $el['p_cod']);  
    if($el['p_color'] === ""){
        $T->Set('query0_p_color', ''); $T->Set('complete', '');  $T->Set('msg', '&nbsp;');  $T->Set('sp_foto', '');  
    }else{
        $T->Set('query0_p_color', $el['p_color']); $T->Set('complete', 'complete'); $T->Set('msg', "<img src='images/ok.png'>");  $cant_rec++;  
    }
    
    
    $class_mar_color = $el['p_mar']."_".$color_desc_sanit;
    $cmar =  str_replace(" ","_",$class_mar_color);
    $T->Set('class_mar_color', $cmar);
    
    
    $T->Set('query0_p_qty_ticket', number_format($el['p_qty_ticket'],2,'.',','));  
    $T->Set('query0_p_kg_real', $el['p_kg_real']);
    $T->Set('query0_p_ancho', $el['p_ancho']);
    $T->Set('query0_p_gram', $el['p_gram']);
    
    if($el['p_foto'] === ""){
        $T->Set('query0_p_foto', '&nbsp;');  $T->Set('sp_foto', '<img  style="cursor:pointer" title="Sacar foto" onclick="foto('.$el['p_cod'].')" src="images/camera_capture_photo.png"  >'); 
    }else{
        $T->Set('query0_p_foto', $el['p_foto']); $T->Set('sp_foto', '<img style="cursor:pointer"  title="Ver Foto" src="images/image.png" onclick="verFoto('.$el['p_cod'].')">'); 
    }
    
    if($el['p_print'] > 0){
        $T->Set('print_state', 'disabled');
         $T->Set('print_value',$el['p_print']);
    }else{
        $T->Set('print_state',"");
        $T->Set('print_value', 'Imprimir');
    }
    

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_p_each_quty += 0 + $el['p_each_quty'];
    $subtotal0_p_qty_ticket += 0 + $el['p_qty_ticket'];
    
    //Cargo el array para la busqueda
    $id = $el['id'];
    $mar = $el['p_mar'];
    $bag = $el['p_bag'];
    $each_quty = $el['p_each_quty'];
    $color_desc = $color_desc_sanit;
    $cadena = " $bag $each_quty $color_desc";
    
    // echo $solo_incompletos;
    
    if($solo_incompletos == "true"  ){ 
      if($el['p_gram'] > 0){  // Esta comleto
        // $T->Show('query0_data_row');
      }else{
           echo "<script> data[$id]= '$cadena';  </script>";
          $T->Show('query0_data_row');
      }
    }else{
        echo "<script> data[$id]= '$cadena';  </script>";
        $T->Show('query0_data_row');
    }
    
    // Show Subtotal
    $T->Set('subtotal0_p_each_quty', number_format($subtotal0_p_each_quty,2,'.',','));  
    $T->Set('subtotal0_p_qty_ticket', number_format($subtotal0_p_qty_ticket,2,'.',','));  
    
    //Actualize Old Values Variables
    $old['id'] = $el['id'];
    $old['p_design'] = $el['p_design'];
    $old['p_mar'] = $el['p_mar'];
    $old['p_bag'] = $el['p_bag'];
    $old['p_precio'] = $el['p_precio'];
    $old['p_color_desc'] = $el['p_color_desc'];
    $old['p_each_quty'] = $el['p_each_quty'];
    $old['p_unit'] = $el['p_unit'];
    $old['p_cod'] = $el['p_cod'];
    $old['p_color'] = $el['p_color'];
    $old['p_qty_ticket'] = $el['p_qty_ticket'];
    $old['p_kg_real'] = $el['p_kg_real'];
    $old['p_ancho'] = $el['p_ancho'];
    $old['p_gram'] = $el['p_gram'];  
    $old['p_foto'] = $el['p_foto'];
    $old['p_print'] = $el['p_print'];
    $firstRow=false;

}

$endConsult = true;
if( $old['p_design']!=$el['p_design'] || $old['p_mar']!=$el['p_mar']   ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_subtotal_row');  
    $T->Set('cant',$cant);
    $T->Set('cant_rec',$cant_rec);
    $T->Show('query0_total_row');
}

$T->Show('end_query0');				// Ends a Table 

$TiempoFinal = getTiempo(); 
$Tiempo = $TiempoFinal - $TiempoInicial; 
$Tiempo = round($Tiempo,6); 
echo "Esta planilla se ha cargado en $Tiempo segundos."; 

 
?>

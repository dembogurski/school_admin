<?php

/** Report prg file (pedido_internac) 
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
$T->Set( 'sup_usuario', 'Developer');
$T->Set( 'sup_suc', '02');
$T->Set( 'sup_nro_pedido_int', '1');
$T->Set( 'sup_fecha', '2014-07-01');
$T->Set( 'sup_temporada', 'Verano');
$T->Set( 'sup_estado', 'Abierta');
$T->Set( 'sup_n_pedido_detail', '');
$T->Set( 'sup_set_estado', 'false');
$T->Set( 'sup_msg', '');
$T->Set( 'sup_gen_nota', 'No');
$T->Set( 'sup___change', '');
$T->Set( 'sup_detalle', '');
$T->Set( 'sup___nodel', 'true');
*/
// ------------------------------------------

$limite = $_REQUEST['c_limite']; 
if($limite == ""){ 
    $limite = 200; //echo $limite; die();
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

$sector = $sup['sector']; 
$grupo = $sup['grupo'];
$tipo = $sup['tipo'];


$server = $_SERVER["SERVER_NAME"];
$port = $_SERVER['SERVER_PORT'];
$url = $_SERVER["REQUEST_URI"];
$url_actual = "http://" . $server.":".$port."".$url;
$T->Set( 'sig', $url_actual."&inicio=$siguiente" );
$T->Set( 'ant', $url_actual."&inicio=$anterior" );
$T->Set( 'actual', $url_actual."&inicio=$inicio" );


$nro_pedido = $sup['nro_pedido_int'];
$query0 = "SELECT p.id as id, p.nro_pedido_int AS Nro,usuario as Usuario,obs,suc as Suc,p.cli_ruc AS RUC, c.cli_fullname AS Cliente, sector AS Sector,p_grupo AS Grupo,p_tipo AS Tipo, p.p_color AS Color, p.p_cant AS Cant,ponderacion AS Ponderacion,cant_pond AS Cant_Pond,'' as Cant_Final, precio_est AS PrecioEst FROM pedido_int_det p, mnt_cli c  WHERE p.cli_ruc = c.cli_ci AND nro_pedido_int = $nro_pedido  and sector like '$sector' and p_grupo like '$grupo' and p_tipo like '$tipo' order by Sector asc,Grupo asc,Tipo asc,Color asc,Cliente asc,suc asc  limit $inicio, $limite";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$T->Set( 'nro_pedido_int', $sup['nro_pedido_int']);

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


$db = new Y_DB();
$db->Database = 'marijoa';



//Define a Old Values Variables
$old['id'] = '';
$old['Nro'] = '';
$old['Usuario'] = '';
$old['Suc'] = '';
$old['RUC'] = '';
$old['Cliente'] = '';
$old['Sector'] = '';
$old['Grupo'] = '';
$old['Tipo'] = '';
$old['Color'] = '';
$old['Cant'] = '';
$old['Ponderacion'] = '';
$old['Cant_Pond'] = '';
$old['PrecioEst'] = '';
$old['Cant_Final'] = '';
$old['obs'] = '';


$SUBTOTAL_TOTAL_CANT = 0;
$SUBTOTAL_TOTAL_CANT_POND = 0;


$TOTAL_CANT = 0;
$TOTAL_CANT_POND = 0;
$TOTAL_VALOR = 0;

$md5_sgtc_old = '';


$i = 0;

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['id'] = $Q0->Record['id'];
    $el['Nro'] = $Q0->Record['Nro'];
    $el['Usuario'] = $Q0->Record['Usuario'];
    $el['Suc'] = $Q0->Record['Suc'];
    $el['RUC'] = $Q0->Record['RUC'];
    $el['Cliente'] = $Q0->Record['Cliente'];
    $el['Sector'] = $Q0->Record['Sector'];
    $el['Grupo'] = $Q0->Record['Grupo'];
    $el['Tipo'] = $Q0->Record['Tipo'];
    $el['Color'] = $Q0->Record['Color'];
    $el['Cant'] = $Q0->Record['Cant'];
    $el['Ponderacion'] = $Q0->Record['Ponderacion'];
    $el['Cant_Pond'] = $Q0->Record['Cant_Pond'];
    $el['PrecioEst'] = $Q0->Record['PrecioEst'];
    $el['Cant_Final'] = $Q0->Record['Cant_Final'];
    $el['obs'] = $Q0->Record['obs'];
    
    $nro_pedido = $el['Nro'];
    if(($el['Color'] != $old['Color']) && $old['Color'] != '' ){ 
        $T->Set('subtotal_total_cant',  number_format($SUBTOTAL_TOTAL_CANT,0,',','.')); 
        $T->Set('subtotal_total_cant_pond',  number_format($SUBTOTAL_TOTAL_CANT_POND,0,',','.')); 
        $T->Set('md5_sgtc_old', $md5_sgtc_old);  
        
        $sector = $old['Sector']; $grupo = $old['Grupo']; $tipo = $old['Tipo']; $color = $old['Color'];
        
        $db->Query("SELECT COUNT(*) AS Piezas, SUM(p_cant) AS Metros FROM mnt_prod WHERE prod_fin_pieza = 'No' AND p_cant > 0 AND p_fam = '$sector' AND p_grupo = '$grupo' AND p_tipo = '$tipo' AND p_color = '$color'");
        $db->NextRecord();
        $piezas = $db->Record['Piezas']; $metros = $db->Record['Metros'];
        $T->Set('piezas',  number_format($piezas,0,',','.'));  
        $T->Set('stock_actual',  number_format($metros,2,'.',','));  
        $diff =  $metros - $SUBTOTAL_TOTAL_CANT;
        $T->Set('diff_sgtc',  number_format($diff,2,'.',','));  
        if($diff > 0){
            $T->Set('diff_style',"border: solid 1px black;color: black");
            $T->Set('diff_label',"Excedente: "); 
        }else{
           $T->Set('diff_style',"border: solid 1px red;font-weight:bolder;color: red;");
           $T->Set('diff_label',"Faltante: "); 
        }
       
        $db->Query("select p_cant, precio_est, p_cant * precio_est as valor from pedido_int_resu where sector =  '$sector' AND p_grupo = '$grupo' AND p_tipo = '$tipo' AND p_color = '$color' and nro_pedido_int = $nro_pedido");
        
        
        if($db->NumRows() > 0){
            $db->NextRecord();
            $cant_final = $db->Record['p_cant'];
            $precio_est = $db->Record['precio_est'];
            $valor = $db->Record['valor'];
            $T->Set('cant_final_color',  number_format($cant_final,0,',','.')); 
            //$T->Set('precio_est_color',  number_format($precio_est,0,',','.')); 
            $T->Set('valor_color',  number_format($valor,0,',','.')); 
        }else{
           $T->Set('cant_final_color',  number_format(0,0,',','.')); 
           //$T->Set('precio_est_color',  number_format($precio_est,0,',','.')); 
           $T->Set('valor_color',  number_format(0,0,',','.'));          
        }
        
        $T->Show("query0_subtotal_row");
        $SUBTOTAL_TOTAL_CANT = 0;
        $SUBTOTAL_TOTAL_CANT_POND = 0; $i++;
    } 
    if($i % 2 > 0){ 
       $T->Set('estilo', "style='background:#D3D6FF'");
       $T->Set('cli', "style='background:#D3D6FF; cursor:pointer'"); 
    }else{
       $T->Set('estilo', "style='background:white'");
       $T->Set('cli', "style='background:white; cursor:pointer'"); 
    }
    
    $md5_ruc = md5($el['RUC']);
    $md5_sgt = md5($el['Sector'].$el['Grupo'].$el['Tipo']); 
    $md5_sgtc = md5($el['Sector'].$el['Grupo'].$el['Tipo'].$el['Color']); 
    $md5_sgtc_old = $md5_sgtc;
    
    $T->Set('md5_ruc', $md5_ruc);
    $T->Set('md5_sgt', $md5_sgt);
    $T->Set('md5_sgtc', $md5_sgtc);
    
    $SUBTOTAL_TOTAL_CANT += 0 + $el['Cant'];
    $SUBTOTAL_TOTAL_CANT_POND += 0 + $el['Cant_Pond'];
    
    
    $TOTAL_CANT += 0 + $el['Cant'];
    $TOTAL_CANT_POND += 0 + $el['Cant_Pond'];
    $TOTAL_VALOR  += 0 + $el['Cant_Pond'] * $el['PrecioEst']; 

    // Preparing a template variables
    $T->Set('query0_id', $el['id']);
    $T->Set('query0_Nro', $el['Nro']);
    $T->Set('query0_Usuario', $el['Usuario']);
    $T->Set('query0_Suc', $el['Suc']);
    $T->Set('query0_RUC', $el['RUC']);
    $T->Set('query0_Cliente', $el['Cliente']);
    
   
    $T->Set('query0_Sector', $el['Sector']);
    
    $T->Set('query0_Grupo', $el['Grupo']);
    $T->Set('query0_Tipo', $el['Tipo']);
    $T->Set('query0_Color', $el['Color']);
    $T->Set('query0_Cant', $el['Cant']);
    $T->Set('query0_Ponderacion', $el['Ponderacion']);
    $T->Set('query0_Cant_Pond', $el['Cant_Pond']);
    $T->Set('query0_PrecioEst', $el['PrecioEst']);
    $T->Set('query0_Cant_Final', $el['Cant_Final']);
    $T->Set('obs',"<b>".$el['Cliente']."</b> : ". $el['obs']);
        
    $T->Set('valor_estimado', number_format( $el['Cant_Pond'] * $el['PrecioEst'] ,2,'.',',')); 
  
 

    $T->Show('query0_data_row');
 
    
    //Actualize Old Values Variables
    $old['id'] = $el['id'];
    $old['Nro'] = $el['Nro'];
    $old['Usuario'] = $el['Usuario'];
    $old['Suc'] = $el['Suc'];
    $old['RUC'] = $el['RUC'];
    $old['Cliente'] = $el['Cliente'];
    $old['Sector'] = $el['Sector'];
    $old['Grupo'] = $el['Grupo'];
    $old['Tipo'] = $el['Tipo'];
    $old['Color'] = $el['Color'];
    $old['Cant'] = $el['Cant'];
    $old['Ponderacion'] = $el['Ponderacion'];
    $old['Cant_Pond'] = $el['Cant_Pond'];
    $old['PrecioEst'] = $el['PrecioEst'];
    $old['Cant_Final'] = $el['Cant_Final'];
    $old['obs'] = $el['obs'];
    $firstRow=false;

}

$endConsult = true;
if( true ){
   $T->Show("query0_subtotal_row");
}
// Show total
if( true ){
    $T->Set('total_cant', number_format($TOTAL_CANT ,0,',','.')); 
    $T->Set('total_cant_pond', number_format($TOTAL_CANT_POND ,0,',','.')); 
    $T->Set('total_valor_estimado', number_format( $TOTAL_VALOR ,2,'.',',')); 
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

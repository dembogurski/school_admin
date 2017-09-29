<?php

/** Report prg file (pedidos_tracking) 
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
$T->Set( 'sup_origen', '05');
$T->Set( 'sup_destino', '%');
$T->Set( 'sup_desde', '2012-05-01');
$T->Set( 'sup_hasta', '2014-05-29');
$T->Set( 'sup_estado', 'Pendiente');
$T->Set( 'sup_urge', '%');
$T->Set( 'sup_pedidos_urg', '');
$T->Set( 'sup_pedidos_tracking', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p.nro AS Nro,p.__local AS Origen,p.__locald AS Destino,DATE_FORMAT(p.fecha,"%d-%m-%Y") AS Fecha, p.__user AS Usuario, p.estado AS Estado,d.codigo AS Codigo,cod_rem AS Remplazo,concat(d.grupo," - ", d.tipo, " - ", d.color) AS Grupo_Tipo_Color, d.cantidad AS Cant, d.urge AS Urge,d.estado AS Estado_Cod,DATE_FORMAT(d.fecha_previsto,"%d-%m-%Y") AS Previsto,p.obs AS Obs FROM nota_pedido p, nota_pedido_det d WHERE p.nro = d.nro_pedido AND  p.__local LIKE '05' AND p.__locald LIKE '%' AND p.fecha BETWEEN '2012-05-01' AND '2014-05-29' ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

setlocale(LC_ALL,"es_ES");

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

$db = new Y_DB();
$db->Database = $Global['project'];


//Define a Old Values Variables
$old['Nro'] = '';
$old['Origen'] = '';
$old['Destino'] = '';
$old['Fecha'] = '';
$old['Fecha_normal'] = '';
$old['Cierre'] = '';
$old['Usuario'] = '';
$old['Estado'] = '';
$old['Codigo'] = '';
$old['Remplazo'] = '';
$old['Grupo_Tipo_Color'] = '';
$old['Cant'] = '';
$old['Urge'] = '';
$old['Estado_Cod'] = '';
$old['Previsto'] = '';
$old['Obs'] = '';
$old['obs_seg'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['Nro'] = $Q0->Record['Nro'];
    $el['Origen'] = $Q0->Record['Origen'];
    $el['Destino'] = $Q0->Record['Destino'];
    $el['Fecha'] = $Q0->Record['Fecha'];  
	$el['Cierre'] = $Q0->Record['Cierre'];  
    $el['Fecha_normal'] = $Q0->Record['Fecha_normal']; 
    $el['Usuario'] = $Q0->Record['Usuario'];
    $el['Estado'] = $Q0->Record['Estado'];
    $el['Codigo'] = $Q0->Record['Codigo'];
    $el['Remplazo'] = $Q0->Record['Remplazo'];
    $el['Grupo_Tipo_Color'] = $Q0->Record['Grupo_Tipo_Color'];
    $el['Cant'] = $Q0->Record['Cant'];
    $el['Urge'] = $Q0->Record['Urge'];
    $el['Estado_Cod'] = $Q0->Record['Estado_Cod'];
    $el['Previsto'] = $Q0->Record['Previsto'];
    $el['Obs'] = $Q0->Record['Obs'];
    $el['obs_seg'] = $Q0->Record['obs_seg'];

    // Preparing a template variables
    $T->Set('query0_Nro', $el['Nro']);
    $T->Set('query0_Origen', $el['Origen']);
    $T->Set('query0_Destino', $el['Destino']);
    $T->Set('query0_Fecha', $el['Fecha']); 
	$T->Set('query0_Cierre', $el['Cierre']); 
    $T->Set('query0_Usuario', $el['Usuario']);
    $T->Set('query0_Estado', $el['Estado']);
    $T->Set('query0_Codigo', $el['Codigo']);
    $T->Set('query0_Remplazo', $el['Remplazo']);
    $T->Set('query0_Grupo_Tipo_Color', $el['Grupo_Tipo_Color']);
    $T->Set('query0_Cant', $el['Cant']);
    $T->Set('query0_Urge', $el['Urge']);
    $T->Set('query0_Estado_Cod', $el['Estado_Cod']);
    $T->Set('query0_Previsto', $el['Previsto']);
    $T->Set('query0_Obs', $el['Obs']);
    $T->Set('query0_obs_seg', $el['obs_seg']);
    
    $observ = $el['Obs'];
    $obs_seg =  $el['obs_seg'];
    $title = $observ." <hr> $obs_seg";
    $nro_pedido = $el['Nro'];
    $rtitle = str_replace("|", "<b><big><br>&#8627;</big></b>", $title);
        
    $T->Set('titulo', $rtitle);
    
    $estado = $el['Estado_Cod'];
    
    $color_estado = "white";
    
    if($estado == "Pendiente"){
        $color_estado = "Orange";
    }else if($estado == "Comprado"){
        $color_estado = "#FFD700";
    }else if($estado == "En Transito"){
        $color_estado = "#FFFF00";
    }else if($estado == "En Deposito"){
        $color_estado = "#ADFF2F";
    }else if($estado == "Despachado" || $estado == "Enviado"){
        $color_estado = "#CAE1FF";
    }else if($estado == "Disponible en Stock" || $estado == "Enviado"){
        $color_estado = "#5CACEE";
    }else if($estado == "Cancelado"){
        $color_estado = "#8B7D7B";
    }else{
       $color_estado = "white"; 
    }
    
    if($el['Urge'] == 'Si'){
        $T->Set('urge', 'rgb(250, 250, 210)'); 
    }else{
        $T->Set('urge', 'white'); 
    }
    
    $T->Set('color_estado', $color_estado); 

    // Calculating a total

    $fecha_pedido = $el['Fecha_normal'];

    //$T->Show('query0_data_row');
    
    $codigo_pedido = $el['Codigo'];
    $remplazo = $el['Remplazo'];
    
    // Le doy prioridad al codigo de Remplazo.
    if($remplazo != null){
        $codigo_pedido = $remplazo;
    }
    
    if($codigo_pedido != ''){		
        /**$db->Query("SELECT df_cod_prod AS codigo,r.rem_nro,DATE_FORMAT(rem_fecha_cier,'%d-%M-%Y') AS fecha,rem_origen, rem_destino,rem_estado,df_disponible AS cant,enviado AS estado 
        FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND rem_fecha BETWEEN '$fecha_pedido' AND CURRENT_DATE  and df_cod_prod = $codigo_pedido");*/
		$db->Query("SELECT df_cod_prod AS codigo,r.rem_nro,DATE_FORMAT(rem_fecha_cier,'%d-%M-%Y') AS fecha,rem_origen, rem_destino,rem_estado,df_disponible AS cant,d.enviado AS estado,r.rem_env_emp,r.rem_env_cod FROM nota_remision r inner join remito_det d on r.rem_nro = d.rem_nro inner join nota_pedido_det pd on (d.df_cod_prod = pd.codigo or d.df_cod_prod = pd.cod_rem) and pd.estado='Enviado' inner join nota_pedido p on pd.nro_pedido=p.nro and r.rem_destino=p.__local and r.rem_origen=p.__locald and r.rem_fecha>=p.fecha where p.nro='$nro_pedido' and d.df_cod_prod = $codigo_pedido limit 1");

        if($db->NumRows()>0){
                  

            while( $db->NextRecord() ){
               $codigo = $db->Record['codigo'];
               $rem_nro = $db->Record['rem_nro'];
               $fecha = $db->Record['fecha'];
               $origen = $db->Record['rem_origen'];
               $destino = $db->Record['rem_destino'];
               $cant = $db->Record['cant'];
               $estado = $db->Record['rem_estado'];
               $enviado = $db->Record['estado'];
               $rem_env_emp = $db->Record['rem_env_emp'];
               $rem_env_cod = $db->Record['rem_env_cod'];
			   
			   if($estado=='Abierta'){
				   $T->Set('color_estado', '#9966ff');
				   $T->Set('query0_Estado_Cod', "En Proceso");
			   }
			   $T->Show('query0_data_row');			   
			   $T->Show('query0_subtotal_cab');
			   
               $T->Set('codigo',$codigo); 
               $T->Set('remito',$rem_nro);
               $T->Set('fecha',$fecha);
               $T->Set('origen',$origen);
               $T->Set('destino',$destino);
               $T->Set('estado',$estado);
               $T->Set('cant', number_format($cant,2,',','.'));  
               $T->Set('rem_env_emp', ucwords($rem_env_emp));  
               $T->Set('rem_env_cod', $rem_env_cod);  
               $T->Set('enviado',$enviado); 
               $T->Show('data');      
            }
            $T->Show('query0_subtotal_foot');      
        }else{$T->Show('query0_data_row');}
    }//else{$T->Show('query0_data_row');}
    //Actualize Old Values Variables
    $old['Nro'] = $el['Nro'];
    $old['Origen'] = $el['Origen'];
    $old['Destino'] = $el['Destino']; 
    $old['Fecha'] = $el['Fecha']; 
	$old['Cierre'] = $el['Cierre'];
    $old['Fecha_normal'] = $el['Fecha_normal'];
    $old['Usuario'] = $el['Usuario'];
    $old['Estado'] = $el['Estado'];
    $old['Codigo'] = $el['Codigo'];
    $old['Remplazo'] = $el['Remplazo'];
    $old['Grupo_Tipo_Color'] = $el['Grupo_Tipo_Color'];
    $old['Cant'] = $el['Cant'];
    $old['Urge'] = $el['Urge'];
    $old['Estado_Cod'] = $el['Estado_Cod'];
    $old['Previsto'] = $el['Previsto']; 
    $old['Obs'] = $el['Obs'];
    $old['obs_seg'] = $el['obs_seg'];
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

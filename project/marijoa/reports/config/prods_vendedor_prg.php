<?php

/** Report prg file (prods_vendedor) 
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
$T->Set( 'sup_p_cod', '');
$T->Set( 'sup_cod', '%');
$T->Set( 'sup_p_local', '%');
$T->Set( 'sup_p_grupo', '');
$T->Set( 'sup_grupo', '');
$T->Set( 'sup_p_tipo', '');
$T->Set( 'sup_tipo', '');
$T->Set( 'sup_p_color', '');
$T->Set( 'sup_color', '');
$T->Set( 'sup___msg', '( ! ) Maximo 2000 registros...');
$T->Set( 'sup_ver', '');
 * 
 */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p_cod AS CODIGO, p_fam AS FAMILIA, p_grupo AS GRUPO, p_tipo AS TIPO, p_color AS COLOR,p_cant AS CANT, p_local AS SUC,p_precio_1 AS PRECIO_1  FROM productos  WHERE p_local LIKE '%' AND p_grupo LIKE  ''  AND p_tipo LIKE  ''  AND p_color LIKE  ''   AND ( p_cod LIKE '%' OR p_padre LIKE '%' ) ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$db = new Y_DB();
$db->Database = $Global['project']; 

$firstRow=true;
$Q0 = $DB;


$codigo = $sup['cod'];
$grupo = $sup['p_grupo'];
$tipo = $sup['p_tipo'];
$color = $sup['p_color'];
$suc = $sup['p_local'];
$can_min = $sup['cant_min'];

$fdp= $sup['fdp'];

 

$query0 = "SELECT SQL_CALC_FOUND_ROWS p_cod  ,p_padre,p_ref, p_fam  , p_grupo  , p_tipo  , p_color  ,p_cant,p_ancho  , p_local ,p_foto as foto  ,p_precio_1 , prod_fin_pieza , p_descri  FROM mnt_prod  WHERE p_local like '$suc' AND p_grupo like '$grupo'  AND p_tipo like '$tipo'  AND p_color like '$color' AND prod_fin_pieza like '$fdp' and p_cant>$can_min and p_local <> '11' limit 2000";

$dbx = new Y_DB();$dbx->Database = $Global['project'];

$Q0->Query( $query0 );
$dbx->Query("SELECT FOUND_ROWS() as resultados");

if($dbx->NextRecord()){
	$T->Set("showing_result",$Q0->NumRows());
	$T->Set("results_count",$dbx->Record['resultados']);
}
// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header
// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['p_cod'] = $Q0->Record['p_cod'];
    $el['p_ref'] = $Q0->Record['p_ref'];
    $el['p_padre'] = $Q0->Record['p_padre'];
    $el['p_local'] = $Q0->Record['p_local'];
    $el['fam'] = $Q0->Record['p_fam'];
    $el['grupo'] = $Q0->Record['p_grupo'];
    $el['tipo'] = $Q0->Record['p_tipo'];
    $el['color'] = $Q0->Record['p_color'];
    $el['p_descri'] = $Q0->Record['p_descri'];
    $el['p_cant'] = $Q0->Record['p_cant'];
    $el['p_ancho'] = $Q0->Record['p_ancho'];
    $el['p_precio'] = $Q0->Record['p_precio_1'];
    $el['prod_fin_pieza'] = $Q0->Record['prod_fin_pieza'];
    $el['p_descri'] = $Q0->Record['p_descri'];
    $el['foto'] = $Q0->Record['foto'];
	 
    
    $new_cod = $el['p_cod'];
    $padre =  $el['p_padre'];
    $estado = $el['prod_fin_pieza'];
    $disponible = disponible($new_cod)?"si":"no";
	
    if($estado == "RS" || $estado == "R"){
        $T->Set('estado', 'style="background:orange;text-align:center"');  
    }else if($estado == "Si"){
        $T->Set('estado', 'style="background:red"');  
    }else{
      $T->Set('estado', 'style="background:#99cc33;text-align:center"');    
    }
    $T->Set('query0_ESTADO',$estado);       
    
    if($new_cod === $codigo){
       $T->Set('color', '#ffff99');   
    }else{
       $T->Set('color', 'white');    
    }        
    $foto = $el['foto'];
    $ref = $el['p_ref'];
   
    if($foto != null){
        $url = "prod_images/$ref/$foto.jpg";
        $T->Set('foto','<img src="images/image.png" title="Ver Imagen" style="cursor:pointer" onclick=verImagen("'.$url.'") >');
    }else{
        $T->Set('foto','&nbsp;');
    }
    // Preparing a template variables
	$T->Set('disponible', $disponible); 
    $T->Set('query0_p_cod', $el['p_cod']); 
    $T->Set('query0_p_padre', $el['p_padre']);
    $T->Set('query0_p_ref', $el['p_ref']);
    $T->Set('query0_p_local', $el['p_local']);
     $T->Set('query0_fam', $el['fam']);
    $T->Set('query0_grupo', $el['grupo']);
    $T->Set('query0_tipo', $el['tipo']);
    $T->Set('query0_color', $el['color']);
     $T->Set('descrip', $el['p_descri']);
    $T->Set('query0_p_cant',   number_format($el['p_cant'],2,',','.'));         
    $T->Set('query0_p_ancho',   number_format($el['p_ancho'],2,',','.'));         
    $T->Set('query0_p_precio_1', number_format($el['p_precio'],0,',','.'));   

    $T->Show('query0_data_row');
    $T->Set('color', 'white');    
    
    // Busqueda de Hermanos
    if($codigo != '%' && $new_cod === $codigo){
        // Busco los datos del padre 
         
        $query1 =  "SELECT p_cod , p_fam  , p_grupo  , p_tipo  , p_color  ,p_cant, p_ancho  , p_local  ,p_precio_1 , prod_fin_pieza   FROM productos  WHERE  p_cod LIKE '$padre'  ; ";
        $db->Query( $query1 );
        
         //echo "padre $padre  $query1 <br>";
        $db->NextRecord();
            $p_cod= $db->Record['p_cod'];
            $p_local= $db->Record['p_local'];
            $grupo= $db->Record['p_grupo'];
            $tipo= $db->Record['p_tipo'];
            $color= $db->Record['p_color'];
            $p_cant= $db->Record['p_cant'];
            $p_ancho= $db->Record['p_ancho'];
            $p_precio= $db->Record['p_precio_1']; 
            $estado = $db->Record['prod_fin_pieza'];
			$disponible = disponible($p_cod)?"si":"no";
            
    
            if($estado == "RS"){
                $T->Set('estado', 'style="background:orange;text-align:center"');  
            }else if($estado == "Si"){
                $T->Set('estado', 'style="background:red"');  
            }else{
               $T->Set('estado', 'style="background:#99cc33;text-align:center"');    
            }
			
			$T->Set('disponible', $disponible); 
            $T->Set('query0_p_cod', $p_cod);
            $T->Set('query0_p_local', $p_local);
            $T->Set('query0_grupo', $grupo);
            $T->Set('query0_tipo', $tipo);
            $T->Set('query0_color', $color);
            $T->Set('query0_p_cant',   number_format($p_cant,2,',','.'));         
            $T->Set('query0_p_ancho',   number_format($p_ancho,2,',','.'));         
            $T->Set('query0_p_precio_1', number_format($p_precio,0,',','.'));   
            $T->Set('query0_ESTADO',$estado);       
            $T->Show('query0_data_row');
           
            // Busco los Hermanos los hermanos son los hijos del mismo padre si el padre existe
        if($padre !=''){    
            $query2 =  "SELECT p_cod , p_fam  , p_grupo  , p_tipo  , p_color  ,p_cant, p_ancho  , p_local  ,p_precio_1 , prod_fin_pieza   FROM productos  WHERE p_local LIKE '$suc' and  p_padre LIKE '$padre' AND p_cod <> '$codigo'  ; ";
            $db->Query( $query2 );
            // echo "hermanos $query2  <br>";
            while( $db->NextRecord() ){
                $p_cod= $db->Record['p_cod'];
                $p_local= $db->Record['p_local'];
                $grupo= $db->Record['p_grupo'];
                $tipo= $db->Record['p_tipo'];
                $color= $db->Record['p_color'];
                $p_cant= $db->Record['p_cant'];
                $p_ancho= $db->Record['p_ancho'];
                $p_precio= $db->Record['p_precio_1']; 
                $estado = $db->Record['prod_fin_pieza'];
				$disponible = disponible($p_cod)?"si":"no";
            
    
                if($estado == "RS"){
                    $T->Set('estado', 'style="background:orange;text-align:center"');  
                }else if($estado == "Si"){
                    $T->Set('estado', 'style="background:red"');  
                }else{
                $T->Set('estado', 'style="background:#99cc33;text-align:center"');    
                }

				$T->Set('disponible', $disponible);                
                $T->Set('query0_p_cod', $p_cod);
                $T->Set('query0_p_local', $p_local);
                $T->Set('query0_grupo', $grupo);
                $T->Set('query0_tipo', $tipo);
                $T->Set('query0_color', $color);
                $T->Set('query0_p_cant',   number_format($p_cant,2,',','.'));         
                $T->Set('query0_p_ancho',   number_format($p_ancho,2,',','.'));         
                $T->Set('query0_p_precio_1', number_format($p_precio,0,',','.'));  
                $T->Set('query0_ESTADO',$estado); 
                $T->Show('query0_data_row');
            }       
        }  
    }
    
    // Show Subtotal
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['p_cod'] = $el['p_cod'];
    $old['p_local'] = $el['p_local'];
    $old['grupo'] = $el['grupo'];
    $old['tipo'] = $el['tipo'];
    $old['color'] = $el['color'];
    $old['p_cant'] = $el['p_cant'];
    $old['p_ancho'] = $el['p_ancho'];
    $old['p_precio'] = $el['p_precio'];
    $old['prod_fin_pieza'] = $el['prod_fin_pieza'];
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

//verifica disponibilidad del codigo
function disponible($codigo){
	$db = new Y_DB();$db->Database = 'marijoa';        

	$db->Query("select count(rd.df_cod_prod) from remito_det rd inner join nota_remision r on rd.rem_nro=r.rem_nro where r.rem_estado <> 'Cerrada' and rd.df_cod_prod='$codigo'");
	$db->NextRecord();
	$verif = $db->Record['verif'];
	if ($verif>0) {            
		return false;
	} else {
		$db->Query("SELECT count(d.codigo) as verif FROM nota_pedido p inner join nota_pedido_det d on p.nro = d.nro_pedido WHERE p.estado <> 'Cerrada' and d.codigo = '$codigo'");
		$db->NextRecord();
		$verif = $db->Record['verif'];
		if ($verif>0) {            
			return false;
		}
	}
	return true;
}
?>

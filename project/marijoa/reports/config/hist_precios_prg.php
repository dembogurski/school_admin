<?php

/** Report prg file (hist_precios) 
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
$T->Set( 'sup_empr', '%');
$T->Set( 'sup_desde', '2013-01-01');
$T->Set( 'sup_hasta', '2013-09-30');
$T->Set( 'sup_motivo', '%');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup___rep', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT nro,date_format(fecha,"%d-%m-%Y") AS fecha,usuario,codigo,h.p_cant as p_cant,h.p_valmin as p_valmin,h.p_compra as p_compra,    concat(h.p_precio_1,"  -  ",p_precio_1n)  AS p1,    concat(h.p_precio_2,"  -  ",p_precio_2n)  AS p2,    concat(h.p_precio_3,"  -  ",p_precio_3n)  AS p3,    concat(h.p_precio_4,"  -  ",p_precio_4n)  AS p4,    concat(h.p_precio_5,"  -  ",p_precio_5n)  AS p5,    motivo,obs,p_fam,p_grupo,p_tipo, p_color     FROM hist_precios h, mnt_prod p WHERE p.p_cod = codigo  AND fecha between '2013-01-01' and  '2013-09-30' and p_suc like '%' and motivo like '%' ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

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
$old['nro'] = '';
$old['fecha'] = '';
$old['usuario'] = '';
$old['codigo'] = '';
$old['p_cant'] = '';
$old['p_valmin'] = '';
$old['p_compra'] = '';
$old['p1'] = '';
$old['p2'] = '';
$old['p3'] = '';
$old['p4'] = '';
$old['p5'] = '';
$old['motivo'] = '';
$old['obs'] = '';
$old['p_fam'] = '';
$old['p_grupo'] = '';
$old['p_tipo'] = '';
$old['p_color'] = '';

$old['volumen_orig'] = '';
$old['vol_actual'] = ''; 

$old['nombre_falla'] = ''; 
$old['falla'] = ''; 



function verificar($p,$pn){
    
      
    $equal = '<img src="images/equal.png">';
    $alsa = '<img src="images/alsa.png">';
    $baja = '<img src="images/baja.png">';
    if($p > $pn){
       return "$p $baja $pn";
    }elseif($p < $pn){
       return "$p $alsa $pn";
    }else{
        return "$p $equal $pn";   
    }
}




// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['nro'] = $Q0->Record['nro'];
    $el['fecha'] = $Q0->Record['fecha'];
    $el['usuario'] = $Q0->Record['usuario'];
    $el['codigo'] = $Q0->Record['codigo'];
    $el['p_cant'] = $Q0->Record['p_cant'];
    $el['p_valmin'] = $Q0->Record['p_valmin'];
    $el['p_compra'] = $Q0->Record['p_compra'];
    $el['p1'] = $Q0->Record['p1'];
    $el['p2'] = $Q0->Record['p2'];
    $el['p3'] = $Q0->Record['p3'];
    $el['p4'] = $Q0->Record['p4'];
    $el['p5'] = $Q0->Record['p5'];
    $el['motivo'] = $Q0->Record['motivo'];
    $el['obs'] = $Q0->Record['obs'];
    $el['p_fam'] = $Q0->Record['p_fam'];
    $el['p_grupo'] = $Q0->Record['p_grupo'];
    $el['p_tipo'] = $Q0->Record['p_tipo'];
    $el['p_color'] = $Q0->Record['p_color'];
    $el['volumen_orig'] = $Q0->Record['volumen_orig'];
    $el['vol_actual'] = $Q0->Record['vol_actual'];
    $el['nombre_falla'] = $Q0->Record['nombre_falla'];
    $el['falla'] = $Q0->Record['falla'];
    
    
    $xp1 = explode(">", $el['p1']);
    $xp2 = explode(">", $el['p2']); 
    $xp3 = explode(">", $el['p3']); 
    $xp4 = explode(">", $el['p4']); 
    $xp5 = explode(">", $el['p5']); 
    
    $p1 = trim($xp1[0]);
    $p2 = trim($xp2[0]);
    $p3 = trim($xp3[0]);
    $p4 = trim($xp4[0]);
    $p5 = trim($xp5[0]);
    
    $p1n = trim($xp1[1]);
    $p2n = trim($xp2[1]);
    $p3n = trim($xp3[1]);
    $p4n = trim($xp4[1]);
    $p5n = trim($xp5[1]);
    
    
    
    
    
    $vol_orig = $el['volumen_orig'];
    $vol_actual = $el['vol_actual'];
    
    $porc = ($vol_actual * 100) / $vol_orig;

    // Preparing a template variables
    $T->Set('query0_nro', $el['nro']);
    $T->Set('query0_fecha', $el['fecha']);
    $T->Set('query0_usuario', $el['usuario']);
    $T->Set('query0_codigo', $el['codigo']);
    $T->Set('query0_p_cant', $el['p_cant']);
    $T->Set('query0_p_valmin', $el['p_valmin']);
    $T->Set('query0_p_compra', $el['p_compra']);
     
    $T->Set('query0_p1', verificar($p1,$p1n));
    $T->Set('query0_p2', verificar($p2,$p2n));
    $T->Set('query0_p3', verificar($p3,$p3n));
    $T->Set('query0_p4', verificar($p4,$p4n));
    $T->Set('query0_p5', verificar($p5,$p5n));
    $T->Set('query0_motivo', $el['motivo']);
    $T->Set('query0_obs', $el['obs']);
    $T->Set('query0_p_fam', $el['p_fam']);
    $T->Set('query0_p_grupo', $el['p_grupo']);
    $T->Set('query0_p_tipo', $el['p_tipo']);
    $T->Set('query0_p_color', $el['p_color']);
    $T->Set('query0_volumen_orig', $el['volumen_orig']);
    $T->Set('query0_vol_actual', $el['vol_actual']);
    $T->Set('query0_nombre_falla', $el['nombre_falla']);
    $T->Set('query0_falla', $el['falla']);
    $T->Set('query0_porc', number_format($porc,2,',','.'));  
    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['nro'] = $el['nro'];
    $old['fecha'] = $el['fecha'];
    $old['usuario'] = $el['usuario'];
    $old['codigo'] = $el['codigo'];
    $old['p_cant'] = $el['p_cant'];
    $old['p_valmin'] = $el['p_valmin'];
    $old['p_compra'] = $el['p_compra'];
    $old['p1'] = $el['p1'];
    $old['p2'] = $el['p2'];
    $old['p3'] = $el['p3'];
    $old['p4'] = $el['p4'];
    $old['p5'] = $el['p5'];
    $old['motivo'] = $el['motivo'];
    $old['obs'] = $el['obs'];
    $old['p_fam'] = $el['p_fam'];
    $old['p_grupo'] = $el['p_grupo'];
    $old['p_tipo'] = $el['p_tipo'];
    $old['p_color'] = $el['p_color'];
    $old['volumen_orig'] = $el['volumen_orig'];
    $old['vol_actual'] = $el['vol_actual'];
    $old['nombre_falla'] = $el['nombre_falla'];
    $old['falla'] = $el['falla'];
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

<?php

/** Report prg file (re_impresion) 
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
$T->Set( 'sup_f_cod', '3012');
$T->Set( 'sup___user', 'Developer');
$T->Set( 'sup_f_term', '%12');
$T->Set( 'sup_f_sql', 'con borde  verde y circulos con girasoles ');
$T->Set( 'sup_descrip', 'DECORACIONES-MANTELERIA--Polyester-Permanente-Rigido-Liso-BLANCO');
$T->Set( 'sup_f_cant', '0.00');
$T->Set( 'sup_f_bloqueo', 'true');
$T->Set( 'sup_f_precio', '21500');
$T->Set( 'sup_f_codigo_nuevo', '3012');
$T->Set( 'sup_f_hasta', '3612');
$T->Set( 'sup_f_ref', '%');
$T->Set( 'sup_f_rango', '3612');
$T->Set( 'sup_f_adv', '');
$T->Set( 'sup_f_size', '230');
$T->Set( 'sup_f_alt', '65');
$T->Set( 'sup_f_tam', '8');
$T->Set( 'sup_f_izq', '5');
$T->Set( 'sup_f_recordar', 'false');
$T->Set( 'sup_f_dist', '0');
$T->Set( 'sup_mostrar_precio', 'Si');
$T->Set( 'sup_f_habilitar', 'No');
$T->Set( 'sup_f_imprimir_new', '');
$T->Set( 'sup_re_imprimir', '');
$T->Set( 'sup_style', '');
$T->Set( 'sup_tab0', '');
$T->Set( 'sup_hfocus', 'false');
$T->Set( 'sup___local', '02');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:

//'+el[f_codigo_nuevo]+'  AND codigo <=  '+el[f_rango]+'  AND codigo LIKE '+el[f_term]+'

$primer_codigo = $sup['f_codigo_nuevo'];
$segundo_codigo = $sup['f_rango'];
$term = $sup['f_term'];

$query0 = "SELECT codigo AS CODIGOS   FROM mnt_prod p, reg_impresion r WHERE p.p_cod = r.codigo and codigo >=  $primer_codigo  AND codigo <=  $segundo_codigo  AND codigo LIKE '$term' ";
//echo $query0;

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
$old['CODIGOS'] = '';

$master = array();
$array = array();




// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGOS'] = $Q0->Record['CODIGOS']; 
	
	 
    // Preparing a template variables
    //$T->Set('query0_CODIGOS', $el['CODIGOS']);
  
    array_push($master,$el['CODIGOS']); 
        
    //Actualize Old Values Variables
    $old['CODIGOS'] = $el['CODIGOS'];
    $firstRow=false;

}
$i = 0;
 
//$T->Show('query0_data_row');

echo '<tr><td class="item" style="font-size: 17px"> ';

foreach ($master as $codigo) {
    $var = $i % 6; 
    //echo "$var <br>";
    
    if($i % 6 == 0){
      echo "<br>".$codigo."&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;";
    }else{ 
      echo  $codigo."&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;";     
    }
//echo// $codigo;
    $i++;
}

echo '</td>
         </tr>'; 

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

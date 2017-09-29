<?php

/** Report prg file (imprimir_lista) 
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
$T->Set( 'sup_p_cod', '7202507');
$T->Set( 'sup_p_fam', '%');
$T->Set( 'sup_p_grupo', '%');
$T->Set( 'sup_p_tipo', '%');
$T->Set( 'sup_p_comp', '%');
$T->Set( 'sup_p_temp', '%');
$T->Set( 'sup_p_estruc', '%');
$T->Set( 'sup_p_clasif', '%');
$T->Set( 'sup_p_lisoest', '%');
$T->Set( 'sup_p_color', '%');
$T->Set( 'sup___msg', '( ! ) El simbolo % no muestra precio, %% muestra precio para impresion...');
$T->Set( 'sup_p_precio_1', '%%');
$T->Set( 'sup_p_precio_2', '%%');
$T->Set( 'sup_p_precio_3', '%%');
$T->Set( 'sup_p_precio_4', '%%');
$T->Set( 'sup_p_precio_5', '%%');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_imprimir', '');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT p_cod as CODIGO,CONCAT(p_fam,"-",p_grupo,"-",p_tipo,"-",p_comp,"-",p_temp,"-",p_estruc,"-",p_clasif,"-",p_lisoest,"-",p_color)AS DESCRIPCION, p_precio_1 as PRECIO_1,p_precio_2 as PRECIO_2,p_precio_3 as PRECIO_3,p_precio_4 as PRECIO_4,p_precio_5 as PRECIO_5 FROM mnt_prod WHERE p_cod LIKE '7202507' and p_fam  LIKE '%' and p_grupo LIKE '%' and p_tipo LIKE  '%' and p_comp LIKE '%' and p_temp LIKE '%'and p_estruc LIKE '%' and p_clasif LIKE '%' and p_lisoest LIKE '%' and p_color LIKE '%' and prod_fin_pieza like "No" and p_cant > 0 LIMIT 20;";

if( $sup['p_precio_1'] == '%' ){    
    $T->Set('PRECIO_1','');
}else{
    $T->Set('PRECIO_1','PRECIO_1');
}


if( $sup['p_precio_2'] == '%' ){    
    $T->Set('PRECIO_2','');
}else{
    $T->Set('PRECIO_2','PRECIO_2');
}


if( $sup['p_precio_3'] == '%' ){    
    $T->Set('PRECIO_3','');
}else{
    $T->Set('PRECIO_3','PRECIO_3');
}

if( $sup['p_precio_4'] == '%' ){    
    $T->Set('PRECIO_4','');
}else{
    $T->Set('PRECIO_4','PRECIO_4');
}

if( $sup['p_precio_5'] == '%' ){    
    $T->Set('PRECIO_5','');
}else{
    $T->Set('PRECIO_5','PRECIO_5');
}


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
$old['CODIGO'] = '';
$old['DESCRIPCION'] = '';
$old['PRECIO_1'] = '';
$old['PRECIO_2'] = '';
$old['PRECIO_3'] = '';
$old['PRECIO_4'] = '';
$old['PRECIO_5'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['DESCRIPCION'] = $Q0->Record['DESCRIPCION'];
    $el['PRECIO_1'] = $Q0->Record['PRECIO_1'];
    $el['PRECIO_2'] = $Q0->Record['PRECIO_2'];
    $el['PRECIO_3'] = $Q0->Record['PRECIO_3'];
    $el['PRECIO_4'] = $Q0->Record['PRECIO_4'];
    $el['PRECIO_5'] = $Q0->Record['PRECIO_5'];

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_DESCRIPCION', $el['DESCRIPCION']);
    
   // Precio 1 
    if( $sup['p_precio_1'] == '%' ){    
	 $T->Set('query0_PRECIO_1', '');
    }else{
	 $T->Set('query0_PRECIO_1', $el['PRECIO_1']);
    }
    
    // Precio 2
    if( $sup['p_precio_2'] == '%' ){    
	 $T->Set('query0_PRECIO_2', '');
    }else{
	 $T->Set('query0_PRECIO_2', $el['PRECIO_2']);
    }    
    // Precio 3
    if( $sup['p_precio_3'] == '%' ){    
	 $T->Set('query0_PRECIO_3', '');
    }else{
	$T->Set('query0_PRECIO_3', $el['PRECIO_3']);
    }    
    // Precio 4
    if( $sup['p_precio_4'] == '%' ){    
	 $T->Set('query0_PRECIO_4', '');
    }else{
	$T->Set('query0_PRECIO_4', $el['PRECIO_4']);
    }     
     // Precio 5
    if( $sup['p_precio_5'] == '%' ){    
	 $T->Set('query0_PRECIO_5', '');
    }else{
	$T->Set('query0_PRECIO_5', $el['PRECIO_5']);
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
    $old['DESCRIPCION'] = $el['DESCRIPCION'];
    $old['PRECIO_1'] = $el['PRECIO_1'];
    $old['PRECIO_2'] = $el['PRECIO_2'];
    $old['PRECIO_3'] = $el['PRECIO_3'];
    $old['PRECIO_4'] = $el['PRECIO_4'];
    $old['PRECIO_5'] = $el['PRECIO_5'];
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

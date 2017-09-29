<?php

/** Report prg file (liquid_legal) 
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
$T->Set( 'empleador', 'Marijoa SRL');
$T->Set( 'patronal', '30 201');
$T->Set( 'nro', '1');
$T->Set( 'nombre', 'López Silva Maria Cristina');
$T->Set( 'salario', '1408864');
$T->Set( 'horas_extras', '316980.00');
$T->Set( 'oi', '-');
$T->Set( 'total_s', '1725844.00');
$T->Set( 'ips', '155326');
$T->Set( 'todal_dsc', '0');
$T->Set( 'sub_total', '-');
$T->Set( 'saldo', '1570518');
$T->Set( 'dt', 'M');
$T->Set( 'comis', '-');
$T->Set( 'imprimir', '');
$T->Set( 'estado', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select 1";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$T->Set( 'empleador', $sup['empleador']);
$T->Set( 'patronal', $sup['patronal']);
$T->Set( 'nro', $sup['nro']);
$T->Set( 'nombre', $sup['nombre']);
$T->Set( 'salario',number_format( $sup['salario'] ,0,',','.')  );
$T->Set( 'horas_extras',number_format(  $sup['horas_extras'] ,0,',','.') );
$T->Set( 'oi',  $sup['oi']);
$T->Set( 'total_s',number_format($sup['total_s'] ,0,',','.')     );
$T->Set( 'ips', $sup['ips']);
$T->Set( 'todal_dsc',number_format( $sup['todal_dsc'] ,0,',','.') );
$T->Set( 'sub_total', $sup['sub_total'] ,0,',','.')   ;
$T->Set( 'saldo',number_format($sup['saldo'] ,0,',','.') );
$T->Set( 'dt', $sup['dt']);
$T->Set( 'comis', $sup['comis']);



$T->Set( 'estado', $sup['']);

$iz = $sup['mg_iz'] + 0 ;  // Default x
$bsup = $sup['mg_sup'] + 52 ; // Default y

$T->Set( 'izq', $iz);
$T->Set( 'izqar', $iz + 20);

$T->Set( 'bsup', $bsup);




//$T->Set( 'periodo',$sup['periodo']);
$T->Set( 'periodo','01');

$T->Set( 'w', '40px');


$T->Set( 'dia', $sup['diah']);
$T->Set( 'm_code', $sup['n_mes']);
$T->Set( 'anio', $sup['anio']);
$T->Set( 'mesa', $sup['mesa']);
$T->Set( 'suc', $sup['suc']);

$T->Set( 'anioc', substr($sup['anio'],2,4) );


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
$old['1'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['1'] = $Q0->Record['1'];

    // Preparing a template variables
    $T->Set('query0_1', $el['1']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['1'] = $el['1'];
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

/**############################# DUPLICADO ##################################**/
echo "<br><br><br><br><br>";

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
$old['1'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['1'] = $Q0->Record['1'];

    // Preparing a template variables
    $T->Set('query0_1', $el['1']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['1'] = $el['1'];
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
$T->Show('end_query0');		



?>


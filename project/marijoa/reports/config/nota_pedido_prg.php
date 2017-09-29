<?php

/** Report prg file (nota_pedido) 
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
$T->Set( 'sup_nro', '1');
$T->Set( 'sup_fecha', '2010-05-08');
$T->Set( 'sup___user', 'Developer');
$T->Set( 'sup___local', '02');
$T->Set( 'sup___suc', 'AVENIDA');
$T->Set( 'sup___locald', '00');
$T->Set( 'sup___sucd', 'DEPOSITO');
$T->Set( 'sup_estado', 'Pendiente');
$T->Set( 'sup___print', '');
$T->Set( 'sup_obs', '64565464654');
$T->Set( 'sup_det', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT  nro_pedido AS Nro, codigo as CODIGO, grupo AS GRUPO, tipo AS TIPO, color AS COLOR, cantidad AS CANTIDAD, estado AS ESTADO ,"" AS MARCAR  FROM  nota_pedido_det WHERE nro_pedido = '1'";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$Q1 = new Y_DB();
$Q1->Database = $Global['project'];

if ($sup['__locald']==='PR') {
        $T->Set('cabprov', '<th>PROVEEDOR</th>');
       $T->Set('cabprecio', '<th>PRECIO</th>');
        $T->Set('cabcod',  '&nbsp;');
    }else{ 
       $T->Set('cabprov', '&nbsp;');
       $T->Set('cabprecio', '&nbsp;');
       $T->Set('cabcod', '<th>CODIGO</th>');
    }

$T->Set( 'nro', $sup['nro']);
$T->Set( 'fecha', $sup['fecha']);
$T->Set( 'usuario', $sup['__user']);

$T->Set( 'origen', $sup['__suc']);
 
$T->Set( 'destino', $sup['__sucd']);
  
$T->Set( 'obs', $sup['obs']);
 


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
$subtotal0_CANTIDAD = 0;


//Define a Old Values Variables
$old['Nro'] = '';
$old['CODIGO'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';$old['DESCRIP'] = '';
$old['COLOR'] = '';
$old['CANTIDAD'] = '';
$old['ESTADO'] = '';
$old['MARCAR'] = '';
$old['prov'] = '';
$old['precio'] = '';
$old['URGENTE'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['Nro'] = $Q0->Record['Nro'];
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];  $el['DESCRIP'] = $Q0->Record['DESCRIP'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $el['ESTADO'] = $Q0->Record['ESTADO'];
    $el['MARCAR'] = $Q0->Record['MARCAR'];
    $el['URGENTE'] = $Q0->Record['URGENTE'];
    $el['prov'] = $Q0->Record['prov'];
    $el['precio'] = $Q0->Record['precio'];

    if ($el['URGENTE']==='Si') {
      $T->Set('color', 'orange');
    }else{
      $T->Set('color', 'white');
    }

    $cod =  $el['CODIGO'];
    if($cod !=''){
        $Q1->Query("SELECT CONCAT('<B>Est: </B>', estante, '<B> Fila: </B>', fila,'<B> Col: </B> ',col  ) AS UBICACION  FROM ubic WHERE codigo = $cod AND operacion = 'E' AND estado = 'En Cuadrante' ORDER BY id DESC LIMIT 1");
        while($Q1->NextRecord() ){
            $ubic = $Q1->Record['UBICACION'];
            $T->Set('cabubic', '<th>UBICACION</th>');
            $T->Set('ubic', '<td>'.$ubic.'</td>');
        }
    }
    

    // Preparing a template variables
    $T->Set('query0_Nro', $el['Nro']);
    
    if ($sup['__locald']==='PR') {
       $T->Set('cabcod', '&nbsp;');
       $T->Set('query0_CODIGO', '&nbsp;');
       $T->Set('cabprov', '<th><PROVEEDOR</th>');
       $T->Set('cabprecio', '<th>PRECIO</th>');
       $T->Set('prov',  $el['prov']);
       $T->Set('precio',   $el['precio']);
    }else{
       $T->Set('query0_CODIGO', $el['CODIGO']);
      // $T->Set('cabcod', 'CODIGO');
       $T->Set('prov', '&nbsp;');
       $T->Set('precio', '&nbsp;');
       $T->Set('cabprov', '&nbsp;');
       $T->Set('cabprecio', '&nbsp;');

    }
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_DESCRIP', $el['DESCRIP']);
    $T->Set('query0_CANTIDAD', number_format($el['CANTIDAD'],2,',','.'));
    $T->Set('query0_ESTADO', $el['ESTADO']);
    $T->Set('query0_MARCAR', $el['MARCAR']);
    $T->Set('query0_URGE', $el['URGENTE']);

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_CANTIDAD += 0 + $el['CANTIDAD'];

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_CANTIDAD', number_format($subtotal0_CANTIDAD,2,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_CANTIDAD = 0;
    }
    
    //Actualize Old Values Variables
    $old['Nro'] = $el['Nro'];
    $old['CODIGO'] = $el['CODIGO'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COLOR'] = $el['COLOR'];   $old['DESCRIP'] = $el['DESCRIP'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['ESTADO'] = $el['ESTADO'];
    $old['MARCAR'] = $el['MARCAR'];
    $old['URGENTE'] = $el['URGENTE']; 
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

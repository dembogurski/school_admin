<?php

/** Report prg file (ubic_cons) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  

// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 
//$T = new Y_Template( $file_tpl ); 
// Superior Variables
//$T->Set( 'sup_suc', '00');
/*$T->Set( 'sup_estante', 'B');
$T->Set( 'sup_fila', '1');
$T->Set( 'sup_col', '1');
$T->Set( 'sup_insConsButton', 'true');
$T->Set( 'sup_gen_rep', '');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:

$db = new Y_DB();
$db->Database = 'marijoa';

$suc = $sup['suc'];
$estante = $sup['estante'];
$fila = $sup['fila'];
$col = $sup['col'];


$db->Query("SELECT   codigo, MAX(c.id) AS maxid   FROM ubic c, mnt_prod p WHERE c.codigo = p.p_cod AND p.p_local = '$suc' AND  suc = '$suc' AND estante = '$estante' AND fila = '$fila' AND col = '$col'   GROUP BY codigo");

$ids = '';

if($db->NumRows()>0){
   while($db->NextRecord()){
       $id = $db->Record['maxid'];
      $ids.=$id." OR id =";  
   } 
}else{
    
    echo "Cuadrante Vacio...";
    die();
}
 

$ids = substr($ids,0,-8);
  

$query0 = "SELECT codigo AS Codigo, __user AS Usuario,DATE_FORMAT(fecha,'%d-%m-%Y') AS Fecha, descrip, suc,operacion AS Oper,estante AS Estante,fila AS Fila,col AS Col,estado AS Estado FROM ubic where id = $ids";

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
$old['Codigo'] = '';
$old['Usuario'] = '';
$old['Fecha'] = '';
$old['descrip'] = '';
$old['suc'] = '';
$old['Oper'] = '';
$old['Estante'] = '';
$old['Fila'] = '';
$old['Col'] = '';
$old['Estado'] = '';

$i= 0;

// Making a rows of consult
while( $Q0->NextRecord() ){
    
    // Define a elements
    $el['Codigo'] = $Q0->Record['Codigo'];
    $el['Usuario'] = $Q0->Record['Usuario'];
    $el['Fecha'] = $Q0->Record['Fecha'];
    $el['descrip'] = $Q0->Record['descrip'];
    $el['suc'] = $Q0->Record['suc'];
    $el['Oper'] = $Q0->Record['Oper'];
    $el['Estante'] = $Q0->Record['Estante'];
    $el['Fila'] = $Q0->Record['Fila'];
    $el['Col'] = $Q0->Record['Col'];
    $el['Estado'] = $Q0->Record['Estado'];

    // Preparing a template variables
    $T->Set('query0_Codigo', $el['Codigo']);
    $T->Set('query0_Usuario', $el['Usuario']);
    $T->Set('query0_Fecha', $el['Fecha']);
    $T->Set('query0_descrip', $el['descrip']);
    $T->Set('query0_suc', $el['suc']);
    $T->Set('query0_Oper', $el['Oper']);
    $T->Set('query0_Estante', $el['Estante']);
    $T->Set('query0_Fila', $el['Fila']);
    $T->Set('query0_Col', $el['Col']);
    $T->Set('query0_Estado', $el['Estado']);

    // Calculating a total

    // Calculating a subtotal
    
    
    if( $el['Oper'] == 'E' && $el['Estado'] == 'En Cuadrante'){
        $i++;
        $T->Show('query0_data_row');
    }
    // Show Subtotal
 
    
    //Actualize Old Values Variables
    $old['Codigo'] = $el['Codigo'];
    $old['Usuario'] = $el['Usuario'];
    $old['Fecha'] = $el['Fecha'];
    $old['descrip'] = $el['descrip'];
    $old['suc'] = $el['suc'];
    $old['Oper'] = $el['Oper'];
    $old['Estante'] = $el['Estante'];
    $old['Fila'] = $el['Fila'];
    $old['Col'] = $el['Col'];
    $old['Estado'] = $el['Estado'];
    $firstRow=false;

}


$T->Set( 'i', $i );

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

<?php




/** Report prg file (rep_gastos) 
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
$T->Set( 'sup_busc_conc', '%');
$T->Set( 'sup_con', '1');
$T->Set( 'sup_sub', '%');
$T->Set( 'sup_sub_form', '1-%');
$T->Set( 'sup_desde', '2011-02-01');
$T->Set( 'sup_hasta', '2011-02-29');
$T->Set( 'sup_local', '06');
$T->Set( 'sup_conp', '');
$T->Set( 'sup_gen', '');*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT cjc_cod AS CODIGO, upper(cjc_descri) AS DESCRIPCION, cjc_tipo AS TIPO FROM  caja_con WHERE cjc_cod NOT LIKE "%-%" ";

// select id AS ID, DATE_FORMAT(g_fecha,|{%d-%m-%Y}|)  as FECHA, g_dep as DEPARTAMENTO, g_user AS USUARIO, g_con_n as CONCEPTO, g_compl as COMPLEMENTO ,g_monto as MONTO FROM gastos  where (g_con = '+el[con]+' or  g_con like '+el[sub_form]+') and g_fecha BETWEEN '+el[desde]+' and '+el[hasta]+' and g_empr like '+el[local]+' order by id asc' 

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$desde = $sup['desde'];
$hasta = $sup['hasta'];
$suc = $sup['local'];
$user = $sup['user'];
 
$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);
$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

$detallado = true;
if ($sup['detallado']==='No'){
    $detallado = false;
}

$order = 'g_fecha';
$totalizar = false;

$TOTAL_CONCEPTO = 0;

if($sup['compl_tot']==='Si'){
  $order = 'c.cjc_descri';
  $totalizar = true;
}


$subconcepto = $el['sub'];


$SUB_TOT = 0;

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

$db = new Y_DB();
$db->Database = $Global['project'];

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
$old['TIPO'] = '';


$TOTAL_GASTOS = 0;

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['DESCRIPCION'] = $Q0->Record['DESCRIPCION'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $tipo_gasto = $el['DESCRIPCION'];
    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_DESCRIPCION', $el['DESCRIPCION']);
    $T->Set('query0_TIPO', $el['TIPO']);

    // Calculating a total

    // Calculating a subtotal

    
    $cod = $el['CODIGO'];
	 

    $db->Query("select g.id AS ID, DATE_FORMAT(g_fecha,'%d-%m-%Y')  as FECHA, g_dep as DEPARTAMENTO, g_user AS USUARIO, c.cjc_descri as CONCEPTO, g_compl as COMPLEMENTO ,g_monto as MONTO,g_empr as SUC FROM gastos g, caja_con c  WHERE g.g_con = c.cjc_cod AND  g_con like '$cod-%' and g_con like $subconcepto and g_fecha BETWEEN '$desde' and '$hasta' and g_empr like '$suc' AND g_user like '$user' order by $order asc, g_fecha asc ");

    $tuplas = $db->NumRows();
    $cont = 0;
    $flag = 0;
    if($db->NumRows() >0 ){
         $T->Show('query0_data_row');
         
       if($detallado){
          $T->Show("cab");
          $T->Show("sub_head");
       }else{
          $T->Show("cab");
       }

      
       $old['CONCEPTO'] = '';
       $SUB_TOT = 0;


        
       while($db->NextRecord()){
        
        $ID = $db->Record['ID'];
        $fecha = $db->Record['FECHA'];
        $dep = $db->Record['DEPARTAMENTO'];
        $us = $db->Record['USUARIO'];
        $con = $db->Record['CONCEPTO'];
        $sucursal = $db->Record['SUC'];


        
        $compl = $db->Record['COMPLEMENTO'];
        $monto_bruto = $db->Record['MONTO'];
        $monto = number_format($monto_bruto,0,',','.');
        $T->Set("fecha",$fecha);
        $T->Set("dep",$dep);
        $T->Set("us",$us);
        $T->Set("con",$con);
        $T->Set("compl",$compl);
        $T->Set("monto",$monto);
        $T->Set("id",$ID);
        $T->Set("suc",$sucursal);

        if(!$detallado){

           if($old['CONCEPTO']=='' ){
             $T->Set('nombre_sub_cuenta',$con);
           }else{

              if($old['CONCEPTO']==$con){
               $T->Set('nombre_sub_cuenta',$old['CONCEPTO']);
              }else{
                 $T->Set('nombre_sub_cuenta', $old['CONCEPTO']);
              }

           }

         }else{
           $T->Set('nombre_sub_cuenta','' );
           // $T->Set('old', '' );
         }

        if($totalizar){

          if($old['CONCEPTO']!=$con && $old['CONCEPTO']!='' ){

            $T->Set('subtotal_x_concepto', number_format($TOTAL_CONCEPTO,0,',','.'));

            $T->Show("subtotal_x_concepto");
    
            $TOTAL_CONCEPTO = 0;

          }
        }

        if($totalizar){
          $TOTAL_CONCEPTO += 0 + $monto_bruto;
        }

        if($detallado){
          $T->Show("body");
        }
        $SUB_TOT += 0 + $db->Record['MONTO'];
        $old['CONCEPTO'] = $con;

        // Totalizar aqui
        $cont++;
        if($tuplas == $cont  ){
          if(!$detallado){
             $T->Set('nombre_sub_cuenta',$con);
          }else{
             $T->Set('nombre_sub_cuenta','');
          }
        }
        
      }

      $T->Set('subtotal_x_concepto', number_format($TOTAL_CONCEPTO,0,',','.'));
      $T->Show("subtotal_x_concepto");
      $TOTAL_CONCEPTO = 0;  
           
      
      $T->Show("pie");
      $T->Set("subtotal",number_format($SUB_TOT,0,',','.'));
      $T->Show("subtotal");
      $TOTAL_GASTOS += 0 + $SUB_TOT;
     
    }

    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    $T->Set("TOTAL",number_format($TOTAL_GASTOS,0,',','.'));
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
    $old['DESCRIPCION'] = $el['DESCRIPCION'];
    $old['TIPO'] = $el['TIPO'];
    $firstRow=false;

}

$endConsult = true;
if( true ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
     $T->Show('totales');
}
$T->Show('end_query0');				// Ends a Table

?>

<?php

/** Report prg file (recup_factuGT) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  

// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE
 
$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$FLAG = false;

$desde = $sup['desde'];
$hasta = $sup['hasta'];
$vhasta = $sup['vhasta'];
$T->Set( 'prov', $sup['prov_nombre']);
$limite = $sup['c_limite']; 

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);

$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

if ($sup['simp'] === 'Si') {
	$T->Set('tipo',"(Simplificado)");
}

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
$subtotal0_CANT_COMPRA = 0;
$subtotal0_PRECIO_COMPRA = 0;
$subtotal0_VALOR_COMPRA = 0;

$subtotal0_TOTAL_MTS_COMPRADOS = 0;

$ZZ_CANT = 0;
$ZZ_SUBTOTAL = 0;
$ZZ_CANT_COMPRA = 0;
$ZZ_VAL_COMPRA = 0;

//Define a Old Values Variables
$old['FACTURA'] = '';
$old['CODIGOS'] = '';
$old['PADRE'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['CANT_COMPRA'] = '';
$old['PRECIO_COMPRA'] = '';
$old['VALOR_COMPRA'] = '';

$cantidad = 0;
$precio_venta = 0;
$subtotal = 0;

$cant = 0;
$pv = 0;
$st = 0;
// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['FACTURA'] = $Q0->Record['FACTURA'];
    $el['CODIGOS'] = $Q0->Record['CODIGOS'];$el['PADRE'] = $Q0->Record['PADRE'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['CANT_COMPRA'] = $Q0->Record['CANT_COMPRA'];
    $el['PRECIO_COMPRA'] = $Q0->Record['PRECIO_COMPRA'];
    $el['VALOR_COMPRA'] = $Q0->Record['VALOR_COMPRA'];

    if( $old['TIPO']!=$el['TIPO'] && $old['TIPO']!=''){
        $odl_grupo = $old['GRUPO']; $old_tipo = $old['TIPO'];
        $SCANTV = number_format($cant,2,',','.');
        //$SPV = number_format($pv,2,',','.');
        $SST = number_format($st,0,',','.');
        $cr = number_format($recup,2,',','.');
        $vr = number_format($recupvalor,2,',','.');
        $SVC = number_format($subtotal0_VALOR_COMPRA,0,',','.');
        $SCC = number_format($subtotal0_CANT_COMPRA,2,',','.');

        echo "<tr style='font-size:12px'><td>$odl_grupo</td><td>$old_tipo</td> <td align='right'>  $SCANTV &nbsp;</td><td align='right'>$SST &nbsp;</td><td align='right'> $SCC &nbsp;</td> <td align='right'> $SVC &nbsp;</td> <td align='right'> ".$cr."%&nbsp; </td><td align='right'> ".$vr."%&nbsp; </td></tr>";
        $cant = 0;
        $pv = 0;
        $st = 0;
        $subtotal0_CANT_COMPRA = 0;
        $subtotal0_VALOR_COMPRA = 0;
    }

    // Preparing a template variables
    $T->Set('query0_FACTURA', $el['FACTURA']);
    $T->Set('query0_CODIGOS', $el['CODIGOS']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_CANT_COMPRA', number_format($el['CANT_COMPRA'],2,',','.'));
    $T->Set('query0_PRECIO_COMPRA', number_format($el['PRECIO_COMPRA'],2,',','.'));
    $T->Set('query0_VALOR_COMPRA', number_format($el['VALOR_COMPRA'],2,',','.'));

    // Calculating a total

    // Calculating a subtotal

    $subtotal0_CANT_COMPRA += 0 + $el['CANT_COMPRA']; 
    $subtotal0_PRECIO_COMPRA += 0 + $el['PRECIO_COMPRA'];

    if ($el['PADRE'] == '') { // Sumar solo si los codigos son distintos
       $subtotal0_VALOR_COMPRA += 0 + $el['VALOR_COMPRA'];
       $ZZ_VAL_COMPRA  += 0 + $el['VALOR_COMPRA'];
    }

    $ZZ_CANT_COMPRA  += 0 + $el['CANT_COMPRA'];

    if($FLAG){
      $T->Show('query0_data_row');
    }

    $Q = new Y_DB();
	$Q->Database = $Global['project'];
    if ($limite === 'No') {
      $Q->Query("SELECT   SUM(df_cantidad) AS CANTIDAD,SUM(df_precio) AS PRECIO_VENTA,SUM(df_subtotal) AS SUBTOTAL_VENTA  FROM  det_factura d , mnt_prod p
	             WHERE d.df_cod_prod =   ".$el['CODIGOS']."  AND d.df_cod_prod = p.p_cod ");
	}else { 
	  $Q->Query("SUM(d.df_cantidad) AS CANTIDAD,SUM(d.df_precio) AS PRECIO_VENTA,SUM(d.df_subtotal) AS SUBTOTAL_VENTA   from  det_factura d,factura f , mnt_prod p
	             where d.df_cod_prod =  ".$el['CODIGOS']."  and f.fact_fecha  BETWEEN  '$desde'  and  '$vhasta'  and d.df_cod_prod = p.p_cod");

	}
       
       while ( $Q->NextRecord() ){

            $el['CANTIDAD'] = $Q->Record['CANTIDAD'];
            $el['PRECIO_VENTA'] = $Q->Record['PRECIO_VENTA'];
            $el['SUBTOTAL_VENTA'] = $Q->Record['SUBTOTAL_VENTA'];

            if($el['CANTIDAD'] != '' ){
               if($FLAG){
                 echo "<tr style='background:lightgray;'><td colspan='5'> <b> Ventas de : ".$el['CODIGOS']."</b> </td> <td> Cant: ".$el['CANTIDAD']." </td> <td>ST ".$el['SUBTOTAL_VENTA']." </td></tr>";
               }
               $cant += 0 + $el['CANTIDAD'];
               //$pv   += 0 + number_format($el['PRECIO_VENTA'],2,',','.') ;               
               $st   += 0 + $el['SUBTOTAL_VENTA'];

               $ZZ_CANT += 0 + $cant;
               $ZZ_SUBTOTAL += 0 + $st;
               echo "<tr><td>ST $st </td> <td>Despues $ZZ_SUBTOTAL </td></tr>";
             }            
       }

      
         
       $T->Set('ZZ_CANT', number_format($ZZ_CANT,2,',','.'));
       
       $T->Set('ZZ_SUBTOTAL', number_format($ZZ_SUBTOTAL,2,',','.'));
       $T->Set('ZZ_CANT_COMPRA', number_format($ZZ_CANT_COMPRA ,2,',','.'));
       $T->Set('ZZ_VAL_COMPRA', number_format($ZZ_VAL_COMPRA ,2,',','.'));

       $ZZ_CANT_RECUP = ($ZZ_CANT / $ZZ_CANT_COMPRA ) * 100;
       $T->Set('ZZ_CANT_RECUP', number_format($ZZ_CANT_RECUP ,2,',','.'));

       $ZZ_VAL_RECUP = ($ZZ_SUBTOTAL / $ZZ_VAL_COMPRA ) * 100;
       $T->Set('ZZ_VAL_RECUP', number_format($ZZ_VAL_RECUP ,2,',','.'));

       if($subtotal0_CANT_COMPRA > 0){
         $recup = ( $cant * 100) / $subtotal0_CANT_COMPRA;
       }
       if($subtotal0_VALOR_COMPRA > 0){
	     $recupvalor = ( $st *  100) / $subtotal0_VALOR_COMPRA;
       }
    // Show Subtotal

    if( $endConsult ){
        if($FLAG){
          $T->Show('query0_subtotal_row');
        }
        //Reset a Subtotal Variables
        $subtotal0_CANT_COMPRA = 0;
        $subtotal0_PRECIO_COMPRA = 0;
        $subtotal0_VALOR_COMPRA = 0;
    }
    
    //Actualize Old Values Variables
    $old['FACTURA'] = $el['FACTURA'];
    $old['CODIGOS'] = $el['CODIGOS'];
    $old['PADRE'] = $el['PADRE'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['CANT_COMPRA'] = $el['CANT_COMPRA'];
    $old['PRECIO_COMPRA'] = $el['PRECIO_COMPRA'];
    $old['VALOR_COMPRA'] = $el['VALOR_COMPRA'];
    $firstRow=false;

}

$endConsult = true;
if( $endConsult ){
   // $T->Show('query0_subtotal_row');
        $odl_grupo = $old['GRUPO']; $old_tipo = $old['TIPO'];
        $SCANTV = number_format($cant,2,',','.');
        //$SPV = number_format($pv,2,',','.');
        $SST = number_format($st,0,',','.');
        $cr = number_format($recup,2,',','.');
        $vr = number_format($recupvalor,2,',','.');
        $SVC = number_format($subtotal0_VALOR_COMPRA,0,',','.');
        $SCC = number_format($subtotal0_CANT_COMPRA,2,',','.');
        echo "<tr style='font-size:12px'><td>$odl_grupo</td><td>$old_tipo</td> <td align='right'>  $SCANTV &nbsp;</td><td align='right'>$SST &nbsp;</td><td align='right'> $SCC &nbsp;</td> <td align='right'> $SVC &nbsp;</td> <td align='right'> ".$cr."%&nbsp; </td><td align='right'> ".$vr."%&nbsp; </td></tr>";
        $cant = 0;
        $pv = 0;
        $st = 0;
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

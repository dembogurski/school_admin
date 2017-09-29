<?php

/** Report prg file (factura_cliente) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  

 

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT df_renglon AS Nro , df_cod_prod AS Cod_Producto, df_descrip AS Descripcion,df_precio AS Precio,df_cantidad AS Cantidad, df_subtotal AS Subtotal FROM det_factura WHERE df_fact_num = '15921'";

$frase = "Gracias por su preferencia";
$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );
$T->Set( 'frase', $frase);

$nro = $sup['nro_res'];
$senia_ = $sup['r_senia'];
 
$cliente = strtoupper( $sup['fact_nom_cli'] ); 
$ruc = $sup['fact_cli_ci']; 
$func = $sup['__user']; 
 
$suc = $sup['__local']; 
 
 
  
$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$hasta = $sup['hasta'];
 
$T->Set('sup_fact_fecha',$data_ini);
$T->Set('nro_reserva',$nro);

$Q = new Y_DB();
$Q->Database = $Global['project'];

$Q->Query("update reservas set r_senia =  $senia_ where nro_res = $nro"); // Actualizo la seña si se cambio

 
   
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
$subtotal0_Subtotal = 0;


//Define a Old Values Variables
$old['Nro'] = '';
$old['Cod_Producto'] = '';
$old['Descripcion'] = '';
$old['Precio'] = '';
$old['Cantidad'] = '';
$old['Subtotal'] = '';


$Q->Query("select func_fullname from mnt_func where func_cod = '$func'");
$Q->NextRecord();
$vendedor = $Q->Record['func_fullname'];





$Q->Query("select emp_tel from par_empresas where emp_cod = '$suc'");
$Q->NextRecord();
$tel = $Q->Record['emp_tel'];

//+---------------- Cabecera --------------------+//

$add = $add."+-------------------------------------+\n"; 
$add = $add."|           Marijoa Tejidos           |\n";
$add = $add."|                                     |\n";
$add = $add."|          TICKET DE RESERVA          |\n";
$add = $add."+-------------------------------------+\n"; 


$add = $add. "Nro: $nro    Fecha: $data_ini\n"; 
 
$add = $add."Cliente:  $cliente \n"; 

$add = $add."C.I./RUC: $ruc\n"; 

$add = $add."Vendedor:  $vendedor \n";   

$add = $add."Tel:  $tel \n"; 



$add = $add."+-------------------------------------+\n"; 

//+---------------- Cabecera --------------------+//


//+----------------- Detalle --------------------+//

$add = $add."*   Cod.       Precio  Cant.   Subtotal\n";
 
 
$TOTAL = 0;
// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
     
    $el['Cod_Producto'] = $Q0->Record['Cod_Producto'];
    
    $el['Descripcion'] = $Q0->Record['Descripcion'];
    //$desc = str_replace("ñ","&ntilde;", $cadena);
    // $desc2 = str_replace("Ñ","&Ntilde;", $desc);
    
    if($el['Descripcion'] == '__NO DATA__'){
        $el['Descripcion'] = "Reserva sin pieza definida";
    }
    
   
    $el['Precio'] = $Q0->Record['Precio'];
    $el['Cantidad'] = $Q0->Record['Cantidad'];
    $el['Subtotal'] = $Q0->Record['Subtotal'];

    // Preparing a template variables
    $T->Set('query0_Nro',  $el['Nro']);
    $T->Set('query0_Cod_Producto', $el['Cod_Producto']);
    
   $descripcion = strtolower( $el['Descripcion']);  // minusculas
 
    
    $T->Set('query0_Descripcion',$descripcion );
    $T->Set('query0_Precio',number_format( $el['Precio'],0,',','.'));
    $T->Set('query0_Cantidad', $el['Cantidad']);
    $T->Set('query0_Subtotal', number_format($el['Subtotal'],0,',','.'));

    // Calculating a total

    // Calculating a subtotal
    $subtotal0_Subtotal += 0 + $el['Subtotal'];
    
    // Contenido del Archivo //
     $add = $add."".$el['Nro']."- ".$el['Cod_Producto']."   ".$el['Precio']."    ".$el['Cantidad']."   ".$el['Subtotal']."\n";
     
     $add = $add."".$descripcion."\n";
    

    $T->Show('query0_data_row');
    // Show Subtotal
    $T->Set('subtotal0_Subtotal', number_format($subtotal0_Subtotal,0,',','.'));
    if( $endConsult ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotal0_Subtotal = 0;
    }
    $TOTAL_SF = $subtotal0_Subtotal;
    $TOTAL =  number_format($subtotal0_Subtotal,0,',','.'); 
    //$SENIA = number_format( $TOTAL_SF * 30 / 100  ,0,',','.'); 
    $SENIA = number_format( $senia_  ,0,',','.'); 
    //$senia
    
    //Actualize Old Values Variables
    $old['Nro'] = $el['Nro'];
    $old['Cod_Producto'] = $el['Cod_Producto'];
    $old['Descripcion'] = $el['Descripcion'];
    $old['Precio'] = $el['Precio'];
    $old['Cantidad'] = $el['Cantidad'];
    $old['Subtotal'] = $el['Subtotal'];
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

 

$add = $add."TOTAL Gs._____________________".$TOTAL." \n";

$add = $add."TOTAL A ABONAR Gs._____________".$SENIA." \n";
  

if (date("d.m")==='30.07' ) {
	$add = $add."    Feliz dia de la Amistad!!!    \n";
}

$add = $add."\nLa reserva tendra vigencia hasta la \nfecha $hasta.\nUna vez vencida la reserva el cliente no\ntendra derecho a reclamar su mercaderia\nsolo podra retirar mercaderias por el valor abonado.\n";
$add = $add."El cliente debe pasar a abonar el Total restante antes de la fecha de vencimiento\n";
$add = $add."    Gracias por su preferencia!!!    \n";
$add = $add." \n";
$add = $add." \n";
$add = $add." \n";
$add = $add." \n";

 
$T->Set("content",$add);

$T->Show('end_query0');	  // Ends a Table 


//$Q->Query("update reservas set estado = 'En Caja' where nro_res = $nro;");

 
?>

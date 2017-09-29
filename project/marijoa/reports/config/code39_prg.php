<?php

/** Report prg file (codigo_barras) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  
/*
// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 
$T = new Y_Template( $file_tpl ); 
// Superior Variables
$T->Set( 'sup_f_cod', '150');
$T->Set( 'sup_f_sql', ' TERRY DE 1.5');
$T->Set( 'sup_f_combinado', 'TERRY DE 1.5');
$T->Set( 'sup_f_cant', '54.90');
$T->Set( 'sup_f_bloqueo', 'true');
$T->Set( 'sup_f_codigo_nuevo', '150');
$T->Set( 'sup_f_hasta', '152');
$T->Set( 'sup_f_rango', '152');
$T->Set( 'sup_f_habilitar', 'Si');
$T->Set( 'sup_f_imprimir', '');
$T->Set( 'sup_f_precio', '');*/

// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select p_cod as CODIGO_BARRAS, p_local as LOCALIDAD,p_fam, p_grupo,p_tipo,p_comp,p_temp,p_estruc,p_clasif,p_color,p_cant  from mnt_prod where p_cod between '150' and   '152' ";

//require_once("/www/barcodegen/RadPlusBarcode.php");
require_once("barcodegen/RadPlusBarcode.php");

$db = new Y_DB();
$db->Database = 'marijoa';
 
 
$suc_u = $sup['__local'];
 
$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$user = $Global['username'];

    $Q1 = new Y_DB();
    $Q1->Database = $Global['project'];	
  

$T->Set( 'suc_name', $sup['LOCALIDAD'] );

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

$long = strlen($el['f_tam']);
$tamano = substr($el['f_tam'],1,$long -2); 
$T->Set( 'tam', 'style=" font-size:'.$tamano.'px"'); 

$suma = $tamano + 25;

$ref = $sup['f_ref'];

$T->Set( 'code', 'style=" font-size:'.$suma.'px"'); 


// Espacios a la izquierd

$izlong = strlen($el['f_izq']);
$espacios = substr($el['f_izq'],1,$izlong  -2); 

$esp = "";
for ($i=0; $i < $espacios; $i++){
	$esp = $esp."&nbsp;";
}
$T->Set('izq', $esp );


// Ancho de la etiqueta

$etiq = strlen($el['f_size']);
$etiqueta = substr($el['f_size'],1,$etiq -2); 

$T->Set('ancho', 'width='.$etiqueta.'px');
 
// alto


$alto = $sup['f_alt'] ;
 
$T->Set('alto', 'height='.$altura.'px');


$tamcode = ($etiqueta / 100) * 20;

$T->Set('tamcode', 'width='.$tamcode.'px');


// Distancia entre etiquetas

$dist = strlen($el['f_dist']);
$distancia = substr($el['f_dist'],1,$dist -2); 

$saltos = '';

for ($i=0;$i< $distancia;$i++){
  $saltos = $saltos."";  
}
$T->Set('saltos', $saltos );


//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables


//Define a Old Values Variables
$old['CODIGO_BARRAS'] = '';
$old['LOCALIDAD'] = '';
$old['p_fam'] = '';
$old['p_grupo'] = '';
$old['p_tipo'] = '';
$old['p_comp'] = '';
$old['p_temp'] = '';
$old['p_estruc'] = '';
$old['p_clasif'] = '';
$old['p_color'] = '';
$old['p_cant'] = '';
$old['p_descri'] = '';
$old['p_ancho'] = '';
$old['p_echo_en'] = '';
$old['p_import'] = '';
$old['REF'] = '';

$salto = 0;

$cant = 0; 
// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CODIGO_BARRAS'] = $Q0->Record['CODIGO_BARRAS'];
    $el['LOCALIDAD'] = $Q0->Record['LOCALIDAD'];
    $el['p_fam'] = $Q0->Record['p_fam'];
    $el['p_grupo'] = $Q0->Record['p_grupo'];
    $el['p_tipo'] = $Q0->Record['p_tipo'];
    $el['p_comp'] = $Q0->Record['p_comp'];
    $el['p_temp'] = $Q0->Record['p_temp'];
    $el['p_estruc'] = $Q0->Record['p_estruc'];
    $el['p_clasif'] = $Q0->Record['p_clasif'];
    $el['p_color'] = $Q0->Record['p_color'];
    $el['p_cant'] = $Q0->Record['p_cant'];
    $el['p_precio'] = $Q0->Record['PRECIO'];
    $el['p_descri'] = $Q0->Record['p_descri'];
    $el['p_ancho'] = $Q0->Record['p_ancho'];
    $el['p_echo_en'] = $Q0->Record['p_echo_en'];
    $el['p_import'] = $Q0->Record['p_import'];
    $el['REF'] = $Q0->Record['REF'];

    $codigo_barras = $el['CODIGO_BARRAS'];
    
    $suc_p = $el['LOCALIDAD'];
    
    // Verifica si ya no ha sido impreso antes
    
    $db->Query("select count(*) as impresiones from reg_impresion where codigo = $codigo_barras;");
    $db->NextRecord();
    
    $impresiones = $db->Record['impresiones'];
    
    $T->Set( 'impresiones', $impresiones );
      
    if($impresiones < 1){
     $impresiones = $db->Record['impresiones'] + 0 + 1;
    
    $T->Set( 'impresiones', $impresiones );   
     $cant++;
     $Q1->Query('select  usuario as USER from _audit_log_ where descrip like '.$codigo_barras.'  and accion like "INSERTAR";');
     $usuario = 'Indef.';
     if($Q1->NumRows() > 0){
		 $Q1->NextRecord();
		 if ($Q1->NumRows()>0) {
			
			 $el['usuario'] = $Q1->Record['USER'];
                         $usuario = $el['usuario'];
			 $T->Set( 'user__', $el['usuario'] );
		 }
     }else{
         $T->Set( 'user__','Indef.' );
     }	 
     
     //Controlar si $usuario es = a el que selecciona el Operador 
     /*
      *   Se podria Usar continue
      * 
      * 
      * 
      */
     
     
     $Q1->Query("INSERT INTO reg_impresion(codigo,usuario,suc_u,suc_p,fecha,hora,ci,obs)
     VALUES('$codigo_barras','$user','$suc_u','$suc_p',current_date,CURRENT_TIME,1,'Primera Impresion');");
     
    $filename = new RadPlusBarcode();
    $code = $filename->parseCode($codigo_barras);    
     
    // Preparing a template variables
    //$T->Set('query0_CODIGO_BARRAS', $el['CODIGO_BARRAS']);

    // Buscar Ultima Remision y extraer destino sino tiene tomar el local del producto
    $query = "SELECT r.rem_destino as DEST FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND d.df_cod_prod = $codigo_barras ORDER BY r.id DESC LIMIT 1;";
    $db->Query($query);
    if($db->NumRows() > 0){
        $db->NextRecord();
        $suc_ = $db->Record['DEST'];
        $T->Set('query0_LOCALIDAD', $suc_);  
    } else {
      $T->Set('query0_LOCALIDAD', $el['LOCALIDAD']);  
    }
    
    $T->Set('query0_CODIGO_BARRAS', $code);
    
    
    $T->Set('query0_p_fam', $el['p_fam']);
    $T->Set('query0_p_grupo', $el['p_grupo']);
    $T->Set('query0_p_tipo', $el['p_tipo']);
    $T->Set('query0_p_comp', $el['p_comp']);
    $T->Set('query0_p_temp', $el['p_temp']);
    $T->Set('query0_p_estruc', $el['p_estruc']);
    $T->Set('query0_p_clasif', $el['p_clasif']);
    $T->Set('query0_p_color', $el['p_color']);
    $T->Set('query0_p_cant', $el['p_cant']);
    $T->Set('query0_p_precio', number_format($el['p_precio'],0,',','.'));  
    $T->Set('query0_p_descri', $el['p_descri']);
    $T->Set('query0_p_ancho', $el['p_ancho']);
    $T->Set('query0_p_echo_en', $el['p_echo_en']);
    $T->Set('query0_p_import', 'Corporaci&oacute;n Textil S.A. RUC:80001404-9');
    $T->Set('REF', $el['REF']);
     
    
    $combinado =  $el['p_grupo'].'-'.$el['p_tipo'].'-'.$el['p_color'].'-'.$el['p_descri'].'_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _';
    // $combinado =  $el['p_grupo'].'-'.$el['p_tipo'].'-'.$el['p_color'].'-'.$el['p_descri'].'. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . ';
    $minusculas = strtolower($combinado);  
    
    $T->Set('combinado',substr($minusculas, 0,83));  // Default 0,83
     $salto++;
     if($salto > 5){
       //  $T->Set('salto_linea', '<DIV style="height:30px"></DIV>');
       $salto = 0;
    }else{     
      //   $T->Set('salto_linea', '');
    }  
    //$T->Set('salto_linea', '');

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['CODIGO_BARRAS'] = $el['CODIGO_BARRAS'];
    $old['LOCALIDAD'] = $el['LOCALIDAD'];
    $old['p_fam'] = $el['p_fam'];
    $old['p_grupo'] = $el['p_grupo'];
    $old['p_tipo'] = $el['p_tipo'];
    $old['p_comp'] = $el['p_comp'];
    $old['p_temp'] = $el['p_temp'];
    $old['p_estruc'] = $el['p_estruc'];
    $old['p_clasif'] = $el['p_clasif'];
    $old['p_color'] = $el['p_color'];
    $old['p_cant'] = $el['p_cant'];
    $old['p_descri'] = $el['p_descri'];
    $old['p_ancho'] = $el['p_ancho']; 
    $old['p_echo_en'] = $el['p_echo_en'];
    $old['p_import'] = $el['p_import'];
    
    } 
    
    $firstRow=false;

}

if($cant < 1){
    echo ' &nbsp;  <img src="images/dialog-warning.png"  border="0"> <big> <b> Este rango de codigos ya han sido impresos con anterioridad. <br>Vea lista de reimpresion de codigos!!! </b> </big>';
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

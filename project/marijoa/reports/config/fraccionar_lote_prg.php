<?php

/** Report prg file (fraccionar_lote) 
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
$T->Set( 'sup___local', '02');
$T->Set( 'sup_f_cod', '66613');
$T->Set( 'sup_remision', '__NO DATA__');
$T->Set( 'sup__user', 'Developer');
$T->Set( 'sup_f_fecha', '2013-10-08');
$T->Set( 'sup_f_sql', '16* (16)');
$T->Set( 'sup_descrip', 'FORROS-DIOLEN--Polyester-Permanente-Rigido-Liso-SALMON');
$T->Set( 'sup_f_cant', '4.50');
$T->Set( 'sup_suc', '02');
$T->Set( 'sup_nombre_suc', 'AVENIDA');
$T->Set( 'sup_f_bloqueo', 'true');
$T->Set( 'sup_msg', 'Pegue abajo, las cantidades y la sucursal separados por coma, uno debajo del otro Ej.  20,06');
$T->Set( 'sup_lote', '
1222
12222');
$T->Set( 'sup_fraccionar', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select '66613' as CODIGO";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$user = $Global['username'];

$time = daytime();

$db = new Y_DB();
$db->Database = 'marijoa';


$dbr = new Y_DB();
$dbr->Database = 'marijoa';

$Q0 = $DB;

$codigo_padre = $sup['f_cod'];
 
$Q0->Query("select p_cant from mnt_prod where p_cod = $codigo_padre;"); 
$Q0->NextRecord();
$cant_padre = $Q0->Record['p_cant'];

//$cant_padre = $sup['f_cant']  ;   

$total_orig =  number_format($cant_padre,2,',','.');  
 
$T->Show('general_header');	

 

$lote = trim($sup['lote']); 
 
$pattern = array("#", "$" ,"-" ,".","+","!","|", "'", "(",")", "{" ,"}" , "^","~","[","]","?",";","/","`","<",">","#",":","@","&","=","A","B","C","D","E","G","H","I","J","K","L","M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","Y","Z" );

// Verificacion de Caracteres Raros
$encontro = false;
$linea = 0;
foreach ($pattern as $findme) {
  $linea++;
  $pos = strpos($lote, $findme);
  if ($pos === false) {
    // Não Faser nada 
  } else {
    //echo "El Caracter '$findme' fue encontrado en el lote, en la posicion $pos de la linea $linea  <br>";
    $T->Set("alerta","El Caracter '$findme' encontrado en el lote en la posicion $pos ,  de la linea $linea  <br>");
    $T->Show("alerta");
    $encontro = true;
 }
}
 
if($encontro){
    $T->Set("alerta","Corrija el Lote de Datos entes de proseguir...<br>");
    $T->Show("alerta");
     //echo "Corrija el Lote de Datos entes de proseguir...<br>";
     die();
}

 
$array = explode("\n",$lote);

$total = 0;
 
$mensaje = "Fraccionamiento x Lotes $user:     $time<br>";
$mensaje.= "Cantidad en Metros codigo $codigo_padre =  $cant_padre<br>";
  

$i = 0;
 
foreach ($array  as $codigo){
   $linea = trim($codigo); 
   $sep = explode("*", $linea);
   $cant = trim($sep[0]);
   $suc = trim($sep[1]); 
   if($cant == "" || $suc == ""){
       $T->Set("alerta","Error en la linea $linea ");
       $T->Show("alerta");
        //echo "Error en la linea $linea ";
        die();
   }
   $total += 0 +$cant;  
} 

$array_codigos = array();
$array_fallas = array();
 
$mensaje.="Codigo  |  Corte Mts.   |   Destino  |   Remito Nº  |  Tipo de Falla<br>";
//Fraccionar
foreach ($array  as $codigo){
   $linea = trim($codigo); 
   $sep = explode("*", $linea);
   $cant =  trim( str_replace(",",".",  $sep[0] ));  
   $suc = trim($sep[1]);
   $falla = trim($sep[2]);
   
   //echo "$cant   ,   $suc      ,        $falla   <br>";
         
   $db->Query("SELECT fraccionar($codigo_padre,$cant,CURRENT_DATE) as CODIGO_NUEVO"); 
   $db->NextRecord();
   $new_cod = $db->Record['CODIGO_NUEVO'];
   
   // Registrar Usuario que Fracciono
   $db->Query("INSERT INTO _audit_log_ (usuario,fecha,hora,accion,descrip)VALUES('$user',CURRENT_DATE,CURRENT_TIME,'INSERTAR','$new_cod')"); 
   
   
   // Insertar en Remito Abierto, si no hay crear uno e insertar en el, 
   if($suc != '00'){
      $dbr->Query("select ins_en_remito_abiert($new_cod,'00','$suc','$user') as remito");
      $dbr->NextRecord();
      $remito = $dbr->Record['remito'];
   }else{
      $remito = 'Sin Remision'; 
   } 
   
   // Actualizo la Descripcion con la falla respectiva si es que tiene
   
   if($falla != ''){
       $Q0->Query("update mnt_prod set p_descri = concat('($falla)','-',p_descri) where p_cod = $new_cod;");   
   }   
   
   array_push($array_codigos,$new_cod);
   $array_fallas[$new_cod]= $falla;
   
   $msg_falla = '';
   if($falla != ''){
      $msg_falla = "<label style='color:red;width:60px'>  Con falla $falla  </label>";
   }else{
       $msg_falla = '';
   }
   $mensaje.="<span style='width:60px'>$new_cod </span> |  <span style='width:60px'>$cant</span>  |  <span style='width:60px'>$suc</span>  |   <span style='width:60px'>$remito</span>   |  <span style='width:60px'>$msg_falla</span>  <br>";
   $i++;   
}  

 
$mensaje.="Total Cortes $i, Total metros fraccionados: $total_orig<br>";

 
if($total > $cant_padre){    
    echo "Demasiados Fraccionamientos  Cantidad Insuficiente...   Disponible $total_orig Total Fracciones $total";
    die();
}

$T->Set( 'mensaje', $mensaje);
$T->Show("ventana"); 

echo '<script> abrirVentana();  </script>';

 
//////////////////////////////////////////////////////////////////////// Impresion de Codigos /////////////////////////////////////////////////

$codigos = "";

foreach ($array_codigos as $codigo){
   $cod = trim($codigo); 
   
   $codigos.=''.$cod.' or p_cod =';  
}  
$codigos.= ''.$codigo_padre.''; 

$query0 = "select p_cod as CODIGO_BARRAS, p_local as LOCALIDAD,p_fam, p_grupo,p_tipo,p_comp,p_temp,p_estruc,p_clasif,p_color,p_cant,p_precio_1,p_descri  from mnt_prod where p_cod =  $codigos ";

//require_once("/www/barcodegen/RadPlusBarcode.php");
require_once("barcodegen/RadPlusBarcode.php");


$Q0->Query( $query0 );


$Q1 = new Y_DB();
$Q1->Database = $Global['project'];	


$long = strlen($el['f_tam']);
$tamano = substr($el['f_tam'],1,$long -2); 
$T->Set( 'tam', 'style=" font-size:'.$tamano.'px"'); 

$suma = $tamano + 25; 

$motivo = $sup['motivo'];

$obs = $sup['obs'];


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
    $el['p_precio'] = $Q0->Record['p_precio_1'];
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
    $impresiones = $db->Record['impresiones'] + 0 + 1;
    
    $T->Set( 'impresiones', $impresiones );
    
     $Q1->Query('select  usuario as USER from _audit_log_ where descrip like '.$codigo_barras.'  and accion like "INSERTAR";');
     if($Q1->NumRows() > 0){
            $Q1->NextRecord();
        	 if ($Q1->NumRows()>0) {
                	 $el['usuario'] = $Q1->Record['USER']; 	
                	 $T->Set( 'user__', $el['usuario'] );
		 }
     }else{
         $T->Set( 'user__',$user );
     }	 
     
     $Q1->Query("INSERT INTO reg_impresion(codigo,usuario,suc_u,suc_p,fecha,hora,ci,obs)
	VALUES('$codigo_barras','$user','$suc_u','$suc_p',current_date,CURRENT_TIME,$impresiones,'$motivo | $obs');");
     
    $filename = new RadPlusBarcode();
    $code = $filename->parseCode($codigo_barras);    
     
    // Preparing a template variables
    //$T->Set('query0_CODIGO_BARRAS', $el['CODIGO_BARRAS']);

    // Buscar Ultima Remision y extraer destino sino tiene tomar el local del producto
    $query = "SELECT r.rem_destino as DEST FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND d.df_cod_prod = $codigo_barras ORDER BY r.id DESC LIMIT 1;";
    $db->Query($query);
    if($db->NumRows()> 0){
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

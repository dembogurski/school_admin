<?php

/** Report prg file (det_comp_fgt) 
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
$T->Set( 'sup_codigo', '%');
$T->Set( 'sup_ref', '6900');
$T->Set( 'sup_familia', 'DECORACIONES');
$T->Set( 'sup_grupo', 'MANTELERIA');
$T->Set( 'sup_tipo', 'NAVIDENHO DE 1.5');
$T->Set( 'sup_color', 'AZUL FRANCIA');
$T->Set( 'sup_preview', '');
*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:

$Q0 = $DB;

$codigo = $sup['codigo'];
if($codigo === ''){
    $codigo = '%';
}
$ref = $sup['ref'];
$f = $sup['familia'];
$g = $sup['grupo'];
$t = $sup['tipo'];
$c = $sup['color'];

$pvm = $sup['pvm'];
$p_compra = $sup['p_compra'];
$p1n = $sup['p1n'];
$p2n = $sup['p2n'];
$p3n = $sup['p3n'];
$p4n = $sup['p4n'];
$p5n = $sup['p5n'];
$p6n = $sup['p6n'];
$p7n = $sup['p7n'];

if($p_compra ==''){
    $p_compra = '%';
}

$motivo = $sup['motivo'];

$tipo_rep = $sup['tipo_rep'];


if($pvm < 1 ){
    echo "<div> &nbsp;&nbsp; <big><b>El precio Minimo es muy bajo... Favor corrija este error y vuelva a intentarlo...</b></big></div>";
    die();
}

$q = "SELECT c_factura, prov_nombre FROM mov_compras c, mnt_prov p WHERE c.c_prov= p.prov_cod AND c.c_ref = $ref limit 1";
$Q0->Query($q);
$Q0->NextRecord();
$factura = $Q0->Record['c_factura'];
$proveedor = $Q0->Record['prov_nombre'];


//echo getcwd();

function enviarMail($email,$subject, $message,$attach ,$isHTML ) {
  
    
        require_once("../mail/phpmailer-gmail/class.phpmailer.php");
        require_once("../mail/phpmailer-gmail/class.smtp.php");
        

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "mail.marijoa.com";
        $mail->Port = 465;
        $mail->Username = "sistema@marijoa.com";
        $mail->Password = "rootdba";

        $mail->From = "sistema@marijoa.com";
        $mail->FromName = "Sistema Marijoa";
        $mail->Subject = "$subject";
        $mail->MsgHTML("$message");
        $mail->AltBody = "$message";
        
    
        $mail->AddAddress("$email","$email" );
         
	//$mail->AddBCC("douglas@marijoa.com","Ing. Douglas A. Dembogurski"); 
        
                
        foreach ($attach as $value) {
           print  $value."\n";
           $mail->AddAttachment($value); 
        }
          	 
        
        $mail->IsHTML($isHTML);

        if(!$mail->Send()) {
           echo "Error: " . $mail->ErrorInfo;
        } else {
           //echo "Mensaje enviado correctamente.../n <br>";
        }

    }



if($tipo_rep == "Modificar los Precios"){
    $query0 = "update mnt_prod set p_valmin = $pvm ,p_precio_1 = $p1n,p_precio_2 =$p2n,p_precio_3 =$p3n,p_precio_4 =$p4n,p_precio_5 =$p5n ,p_precio_6 =$p6n,p_precio_7 =$p7n  
    WHERE p_cod LIKE '$codigo' AND p_ref = '$ref'  AND p_fam LIKE '$f'  AND p_grupo LIKE '$g'  AND p_tipo LIKE '$t'   AND p_color LIKE '$c' AND prod_fin_pieza <> 'Si' AND p_cant > 0 and p_compra like '$p_compra' ";
    $Q0->Query( $query0 ); 
}
    

$query0 = "SELECT p_cod AS CODIGO, p_fam AS FAMILIA, p_grupo AS GRUPO, p_tipo AS TIPO,p_color as COLOR,p_compra,p_valmin,p_precio_1,p_precio_2,p_precio_3,p_precio_4,p_precio_5,p_precio_6,p_precio_7, p_cant as CANT, p_local as SUC 
    FROM mnt_prod 
    WHERE p_cod LIKE '$codigo' AND p_ref LIKE '$ref'  AND p_fam LIKE '$f'  AND p_grupo LIKE '$g'  AND p_tipo LIKE '$t'   AND p_color LIKE '$c' AND prod_fin_pieza <> 'Si' AND p_cant > 0 and p_compra like '$p_compra'";

// echo $query0;

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );


$user = $Global['username'];

$firstRow=true;

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
$old['FAMILIA'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['COLOR'] = '';
$old['p_compra'] = '';
$old['p_valmin'] = '';
$old['p_precio_1'] = '';
$old['p_precio_2'] = '';
$old['p_precio_3'] = '';
$old['p_precio_4'] = '';
$old['p_precio_5'] = '';
$old['p_precio_6'] = '';
$old['p_precio_7'] = '';
$old['CANT'] = '';
$old['SUC'] = '';

$i = 0;
// Making a rows of consult
while( $Q0->NextRecord() ){
$i++;
    // Define a elements
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['FAMILIA'] = $Q0->Record['FAMILIA'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['COLOR'] = $Q0->Record['COLOR'];
    $el['p_compra'] = $Q0->Record['p_compra'];
    $el['p_valmin'] = $Q0->Record['p_valmin'];
    $el['p_precio_1'] = $Q0->Record['p_precio_1'];
    $el['p_precio_2'] = $Q0->Record['p_precio_2'];
    $el['p_precio_3'] = $Q0->Record['p_precio_3'];
    $el['p_precio_4'] = $Q0->Record['p_precio_4'];
    $el['p_precio_5'] = $Q0->Record['p_precio_5'];
    $el['p_precio_6'] = $Q0->Record['p_precio_6'];
    $el['p_precio_7'] = $Q0->Record['p_precio_7'];
    
    $el['CANT'] = $Q0->Record['CANT'];
    $el['SUC'] = $Q0->Record['SUC'];

    // Preparing a template variables
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_FAMILIA', $el['FAMILIA']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_COLOR', $el['COLOR']);
    $T->Set('query0_p_compra', $el['p_compra']);
    $T->Set('query0_p_valmin', $el['p_valmin']);
    $T->Set('query0_p_precio_1', $el['p_precio_1']);
    $T->Set('query0_p_precio_2', $el['p_precio_2']);
    $T->Set('query0_p_precio_3', $el['p_precio_3']);
    $T->Set('query0_p_precio_4', $el['p_precio_4']);
    $T->Set('query0_p_precio_5', $el['p_precio_5']);
    $T->Set('query0_p_precio_6', $el['p_precio_6']);
    $T->Set('query0_p_precio_7', $el['p_precio_7']);
    
    $T->Set('query0_CANT', $el['CANT']);
    $T->Set('query0_SUC', $el['SUC']);

    // Calculating a total

    // Calculating a subtotal

    $T->Show('query0_data_row');
 
    
    //Actualize Old Values Variables
    $old['CODIGO'] = $el['CODIGO'];
    $old['FAMILIA'] = $el['FAMILIA'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['COLOR'] = $el['COLOR'];
    $old['p_compra'] = $el['p_compra'];
    $old['p_valmin'] = $el['p_valmin'];
    $old['p_precio_1'] = $el['p_precio_1'];
    $old['p_precio_2'] = $el['p_precio_2'];
    $old['p_precio_3'] = $el['p_precio_3'];
    $old['p_precio_4'] = $el['p_precio_4'];
    $old['p_precio_5'] = $el['p_precio_5'];
    $old['p_precio_6'] = $el['p_precio_6'];
    $old['p_precio_7'] = $el['p_precio_7']; 
    $old['CANT'] = $el['CANT'];
    $old['SUC'] = $el['SUC'];
    $firstRow=false;

}

$endConsult = true;
 
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

if($tipo_rep == "Modificar los Precios"){
    echo  "  
     
    <div align='center'> <big> <b>Todos los Precios han sido establecidos... puede cerrar...  </b> </big></div>
    
    <script>
         window.opener.close();
    </script>
    ";
    
   $message = "Se han establecidos nuevos precios a productos de la factura de compra<br>
   Ref.: $ref.<br>
   Factura/Invoice: $factura <br>
   Proveedor: $proveedor<br>
   Usuario: $user<br><br>
    
   Valmin = $pvm ,Precio1 = $p1n,Precio2 =$p2n,Precio3 =$p3n,Precio4 =$p4n,Precio5 =$p5n,Precio6 =$p6n,Precio7 =$p7n<br> 
   Sector  '$f'    Grupo  '$g'    Tipo '$t'   Color '$c'<br>
   <br>
   
    
   Motivo: $motivo<br>
   Cantidad de productos modificados $i <br> 
   ";
   $attach = array();
   //enviarMail("douglas@marijoa.com","Modificacion de Precios x Factura de Compra", $message,$attach ,true );
   enviarMail("marshall1842@gmail.com","Modificacion de Precios x Factura de Compra", $message,$attach ,true );    
   enviarMail("ricardoyunis@marijoa.com","Modificacion de Precios x Factura de Compra", $message,$attach ,true );   
   enviarMail("aliciac@marijoa.com","Modificacion de Precios x Factura de Compra", $message,$attach ,true );  
}

?>

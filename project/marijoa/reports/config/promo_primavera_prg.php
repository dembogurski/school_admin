<?php

/** Report prg file (promo_primavera) 
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
$T->Set( 'sup_df_fact_num', '1377064');
$T->Set( 'sup_df_renglon', '2');
$T->Set( 'sup_df_limit', '30');
$T->Set( 'sup_df_vendedor', 'Ricardo');
$T->Set( 'sup___local', '02');
$T->Set( 'sup___user', 'Ricardo');
$T->Set( 'sup_df_concept_vta', 'Venta');
$T->Set( 'sup_df_cod_prod', '');
$T->Set( 'sup_df_fact_estado', '');
$T->Set( 'sup_df_datos_prod', '');
$T->Set( 'sup_df_descrip', '---');
$T->Set( 'sup_df_p_valmin', '0');
$T->Set( 'sup_df_disponible', '');
$T->Set( 'sup_df_fin_piez', '');
$T->Set( 'sup_df_local_prod', '');
$T->Set( 'sup_df_cantidad', '0.00');
$T->Set( 'sup_df_precio_minim', '');
$T->Set( 'sup_df_precio', '0');
$T->Set( 'sup_df_confirmar', 'No');
$T->Set( 'sup_df_fin_pieza', 'false');
$T->Set( 'sup__msgok', '');
$T->Set( 'sup_df_subtotal', '0');
$T->Set( 'sup_df_total_fact', '171000.00');
$T->Set( 'sup_df_promo', '');
$T->Set( 'sup___msg', '');
$T->Set( 'sup_df_verif', '');
$T->Set( 'sup_check0', '');
$T->Set( 'sup_check1', '');
$T->Set( 'sup___lock', '');
$T->Set( 'sup___log', '');
$T->Set( 'sup_stockf', '');
$T->Set( 'sup___lock0', 'true');
$T->Set( 'sup___msg2', '');
$T->Set( 'sup___disableDel', '');


*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT SUM(df_subtotal) AS CRUCERO  FROM det_factura d, mnt_prod p WHERE p.p_cod = d.df_cod_prod AND df_fact_num = '1377064' ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );


// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 

$fact_nro = $sup['df_fact_num'];

$db = new Y_DB();
$db->Database = 'marijoa';

$db->Query("SELECT COUNT(*) as descu FROM det_factura WHERE df_cod_prod = 1001 AND df_fact_num = $fact_nro");
$db->NextRecord();
$desc = $db->Record['descu'];  
if($desc > 0){ // Borrar el Descuento actual si es que ya tiene
   $db->Query("DELETE FROM det_factura WHERE df_cod_prod = 1001 AND df_fact_num = $fact_nro");
}

 

$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables


//Define a Old Values Variables
$old['CRUCERO'] = '';

// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CRUCERO'] = $Q0->Record['CRUCERO']; 
    
    
    $total_crucero =    $el['CRUCERO'];
    
    if($total_crucero > 0){
      $T->Set('query0_CRUCERO',number_format( $el['CRUCERO'],0,',','.')); 
      $T->Set("ok_error","<img src='images/ok.png'>"); 
      $T->Show('crucero');
    
      $db->Query("SELECT SUM(df_subtotal) AS HOGAR FROM det_factura d, mnt_prod p WHERE p.p_cod = d.df_cod_prod AND df_fact_num = $fact_nro
      AND p_fam = 'HOGAR'  AND ((p_grupo LIKE 'SABANAS HECHAS' AND p_tipo LIKE '300 HILOS SATINADA%') OR (p_grupo LIKE 'TOALLAS' AND p_tipo LIKE 'PARA%') ) ");
      $db->NextRecord();
      $total_hogar =  $db->Record['HOGAR'];  
        

        if($total_hogar != null){
            
            $T->Set('query0_HOGAR',number_format( $total_hogar,0,',','.')); 
            $T->Set("ok_error","<img src='images/ok.png'>"); 
            $T->Show('hogar');
            

            if($total_crucero < 150000){
                $T->Set("info","Debe llevar por almenos 150.000 Gs en Sector CRUCERO para acceder a un descuento en el Sector Hogar");
                $T->Set("descuento",0);
                $T->Set("ok_error","<img src='images/error.png'>"); 
            }else if($total_crucero >= 150000 && $total_crucero < 300000 ){

                $T->Set("info","Tiene 10% de descuento en el Sector HOGAR");
                $T->Set("descuento",number_format( (($total_hogar * 10) / 100),0,',','.')); 
                $T->Set("ok_error","<img src='images/ok.png'>"); 
                $DESCUENTO = ($total_hogar * 10) / 100;
                $db->Query("INSERT INTO  det_factura(df_renglon,df_descrip,df_precio,df_cantidad,df_subtotal,df_cod_prod,df_fact_num,df_estado)
		VALUES(101, 'DESCUENTO PROMO PRIMAVERA EN MARIJOA',-$DESCUENTO ,1,-$DESCUENTO , 1001,$fact_nro,''); ");
                
            }else{ // > 300000
              $T->Set("info","Tiene 20% de descuento en el Sector HOGAR");
              $T->Set("descuento",number_format( (($total_hogar * 20) / 100),0,',','.')); 
              $T->Set("ok_error","<img src='images/ok.png'>"); 
              $DESCUENTO = ($total_hogar * 20) / 100;
                $db->Query("INSERT INTO  det_factura(df_renglon,df_descrip,df_precio,df_cantidad,df_subtotal,df_cod_prod,df_fact_num,df_estado)
		VALUES(101, 'DESCUENTO PROMO PRIMAVERA EN MARIJOA',-$DESCUENTO ,1,-$DESCUENTO , 1001,$fact_nro,''); ");
            }        
             $T->Show("info");
        }else{
            $T->Set("info","Debe cargar al menos un producto del Sector HOGAR.");
            $T->Set("descuento",number_format( 0,0,',','.')); 
            $T->Set("ok_error","<img src='images/error.png'>"); 
            $T->Show("info");
        }
        
    }else{
         
        $T->Set('query0_CRUCERO',number_format( $el['CRUCERO'],0,',','.')); 
        $T->Show('crucero'); 
        $T->Set("info","Debe cargar al menos un producto del Sector CRUCERO."); 
        $T->Set("ok_error","<img src='images/error.png'>");  
        $T->Show("info");
        
        
        $db->Query("SELECT COUNT(*) AS COMBO FROM det_factura d, mnt_prod p WHERE p.p_cod = d.df_cod_prod AND df_fact_num = $fact_nro
        AND p_fam = 'HOGAR'  AND p_grupo LIKE 'SABANAS HECHAS' AND p_tipo LIKE '300 HILOS SATINADA%'");
        $db->NextRecord();
        $CANT =  $db->Record['COMBO'];  
        if($CANT >= 2){
            $T->Set('query0_HOGAR',number_format( $CANT,0,',','.')); 
            $T->Set("ok_error","<img src='images/ok.png'>"); 
            $T->Show('hogar');
            
            $db->Query(" SELECT COUNT(*) AS TOALLAS FROM det_factura d, mnt_prod p WHERE p.p_cod = d.df_cod_prod AND df_fact_num = $fact_nro
            AND p_fam = 'HOGAR'  AND p_grupo LIKE 'TOALLAS' AND p_tipo LIKE 'PARA EL CUERPO' AND p_precio_1 = 42000");
            $db->NextRecord();
            $TOALLAS =  $db->Record['TOALLAS']; 
            if($TOALLAS > 0){
                $db->Query("INSERT INTO  det_factura(df_renglon,df_descrip,df_precio,df_cantidad,df_subtotal,df_cod_prod,df_fact_num,df_estado)
		VALUES(101, 'DESCUENTO PROMO PRIMAVERA EN MARIJOA',-42000 ,1,-42000 , 1001,$fact_nro,''); ");
                
                $T->Set("info","Accede a un descuento de por llevar el combo de Hogar Sabanas Hechas 300 Hilos..."); 
                $T->Set("ok_error","<img src='images/ok.png'>");  
                $T->Show("info");
                
            }else{
                $T->Set("info","Debe cargar al menos 1 producto HOGAR TOALLAS PARA EL CUERPO..."); 
                $T->Set("ok_error","<img src='images/error.png'>");  
                $T->Show("info");
            }
            
        }else{
            $T->Set("info","Debe cargar al menos 2 productos  HOGAR->SABANAS HECHAS->300 HILOS..."); 
            $T->Set("ok_error","<img src='images/error.png'>");  
            $T->Show("info");
        }
    }
     
    
}

if( true ){
    $T->Show('query0_subtotal_row');
}
// Show total
if( true ){
    $T->Show('query0_total_row');
}
$T->Show('end_query0');				// Ends a Table 

?>

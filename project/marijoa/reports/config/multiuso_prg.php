<?php

/** Report prg file (multiuso) 
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
$T->Set( 'sup___user', 'Ricardo');
$T->Set( 'sup___local', '02');
$T->Set( 'sup_check_suc', 'No');
$T->Set( 'sup_blaser', 'Manual');
$T->Set( 'sup_codigo', '');
$T->Set( 'sup_puntear', '');
$T->Set( 'sup_subst', '');
$T->Set( 'sup_check', '');
$T->Set( 'sup_hfocus', '');
$T->Set( 'sup_hfocus_esp', '');
$T->Set( 'sup_select_text', '');
$T->Set( 'sup_style2', '');
$T->Set( 'sup_style3', '');
$T->Set( 'sup_style4', '');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup_msg', 'Area para Generar Reportes');
$T->Set( 'sup_suc_', '');
$T->Set( 'sup_tipo', '');
$T->Set( 'sup_gen_rep_inv', '');
$T->Set( 'sup_gen_rep', '');
$T->Set( 'sup_gen_rep_duplicados', '');
$T->Set( 'sup_gen_rep_diff', '');
$T->Set( 'sup_gen_punt', '');
$T->Set( 'sup_cod', '');
$T->Set( 'sup_gen_punteo', '');
$T->Set( 'sup_rep_multiuso', '');

*/
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT DISTINCT p_ref,"a","b","c" FROM mnt_prod LIMIT  10000";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$db = new Y_DB();
$db->Database = $Global['project'];

$dbc = new Y_DB();
$dbc->Database = $Global['project'];

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
$old['p_ref'] = '';
$old['a'] = '';
$old['b'] = '';
$old['c'] = '';

$filas = 0;
// Making a rows of consult
while( $Q0->NextRecord() ){

    // Define a elements
    $el['p_ref'] = $Q0->Record['p_ref'];
     
    
    $p_ref = $el['p_ref'];
    if($p_ref == ""){
        $p_ref = ' ';
    }
    
    $filtro = 'AND (p_gram is null or p_gram <=0)';
    
    $db->Query("SELECT DISTINCT p_fam,p_grupo,p_tipo FROM mnt_prod WHERE  prod_fin_pieza != 'Si' AND p_cant > 0  AND p_ref = '$p_ref'  $filtro;");
    while( $db->NextRecord() ){
      $f = $db->Record['p_fam'];   
      $g = $db->Record['p_grupo'];   
      $t = $db->Record['p_tipo'];  
      $T->Set('query0_p_ref', $el['p_ref']);
      $T->Set('fam', $f);
      $T->Set('grupo', $g);
      $T->Set('tipo', $t);
      
      // Verifico primero en los depositos 
      $dbc->Query("SELECT  p_cod,p_local,p_color,p_estruc, p_cant, p_gram,p_kg,p_tara FROM mnt_prod WHERE  prod_fin_pieza != 'Si' AND p_cant > 0 and p_local <> '11' $filtro  AND  p_ref = '$p_ref' AND p_fam = '$f' AND p_grupo = '$g' AND p_tipo = '$t' and (p_local = '00' or p_local = '08' or p_local = '09' ) order by p_cant desc LIMIT 1;");
     
      if($dbc->NumRows()>0){
            while( $dbc->NextRecord() ){
                $codigo = $dbc->Record['p_cod'];    
                $suc = $dbc->Record['p_local'];   
                $color= $dbc->Record['p_color'];   
                $cant = $dbc->Record['p_cant'];  
		$estruc = $dbc->Record['p_estruc'];  
                $p_gram = $dbc->Record['p_gram'];  
                $p_kg = $dbc->Record['p_kg'];  
                $p_tara = $dbc->Record['p_tara'];  
                
                $T->Set('codigo', $codigo); 
                $T->Set('suc', $suc);
                $T->Set('color', $color);
                $T->Set('cant', number_format($cant,2,',','.'));   
                $T->Set('estruc', $estruc);
                $T->Set('gram', $p_gram);
                $T->Set('kg', $p_kg);
                $T->Set('tara', $p_tara);
                
                
                $filas++;
                $T->Set('filas', $filas); 
                $T->Show('query0_data_row');
            }
             
      }else{ // Si no hay en los depositos entonces agarro el primero que encuentre
          
          // Priorizo las sucursales AV y TER
           $dbc->Query("SELECT  p_cod,p_local,p_color,p_estruc,p_cant, p_gram,p_kg,p_tara FROM mnt_prod WHERE  prod_fin_pieza != 'Si' AND p_cant > 0 and p_local <> '11'  $filtro AND   p_ref = '$p_ref' AND p_fam = '$f' AND p_grupo = '$g' AND p_tipo = '$t' and (p_local = '02' or p_local = '01' ) order by p_cant desc LIMIT 1;");
            if($dbc->NumRows()>0){
                    while( $dbc->NextRecord() ){
                        $codigo = $dbc->Record['p_cod'];    
                        $suc = $dbc->Record['p_local'];   
                        $color= $dbc->Record['p_color'];   
                        $cant = $dbc->Record['p_cant'];  
			$estruc = $dbc->Record['p_estruc']; 
                        $estruc = $dbc->Record['p_estruc'];  
                        $p_gram = $dbc->Record['p_gram'];  
                        $p_kg = $dbc->Record['p_kg'];  
                        $p_tara = $dbc->Record['p_tara']; 
                
                        $T->Set('codigo', $codigo); 
                        $T->Set('suc', $suc);
                        $T->Set('color', $color);
                        $T->Set('cant', number_format($cant,2,',','.'));   
                        $T->Set('estruc', $estruc);
                        $T->Set('gram', $p_gram);
                        $T->Set('kg', $p_kg);
                        $T->Set('tara', $p_tara);
                        $filas++;
                        $T->Set('filas', $filas); 
                        $T->Show('query0_data_row');
                    }
            }else{      // Sino hay tomo el primero que venga 
      
                $dbc->Query("SELECT  p_cod,p_local,p_color,p_estruc,p_cant, p_gram,p_kg,p_tara FROM mnt_prod WHERE  prod_fin_pieza != 'Si' AND p_cant > 0 and p_local <> '11' $filtro AND p_ref = '$p_ref' AND p_fam = '$f' AND p_grupo = '$g' AND p_tipo = '$t' order by p_cant desc LIMIT 1;");
                while( $dbc->NextRecord() ){
                        $codigo = $dbc->Record['p_cod'];    
                        $suc = $dbc->Record['p_local'];   
                        $color= $dbc->Record['p_color'];   
                        $cant = $dbc->Record['p_cant'];
			$estruc = $dbc->Record['p_estruc']; 
                        $p_gram = $dbc->Record['p_gram'];  
                        $p_kg = $dbc->Record['p_kg'];  
                        $p_tara = $dbc->Record['p_tara'];     
                        
                        $T->Set('codigo', $codigo); 
                        $T->Set('suc', $suc);
                        $T->Set('color', $color);
                        $T->Set('cant', number_format($cant,2,',','.'));   
                        $T->Set('estruc', $estruc);
                        $T->Set('gram', $p_gram);
                        $T->Set('kg', $p_kg);
                        $T->Set('tara', $p_tara);
                        $filas++;
                        $T->Set('filas', $filas); 
                        $T->Show('query0_data_row');
                }
          
          }   
      } 
      
    }    
 
    
 
    //Actualize Old Values Variables
    $old['p_ref'] = $el['p_ref'];
   
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

?>

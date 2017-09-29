<?php

/** Report prg file (alta_clientes_fecha) 
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
$T->Set( 'sup_desde', '2012-01-01');
$T->Set( 'sup_hasta', '2012-01-15');
$T->Set( 'sup_suc_', '02');
$T->Set( 'sup_vend', '%');
$T->Set( 'sup_desdeinv', '2012-01-01');
$T->Set( 'sup_hastainv', '2012-01-15');
$T->Set( 'sup___lock', 'true');
$T->Set( 'sup___rep', '');
$T->Set( 'sup___rep2', '');
 * 
 */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT cli_fullname AS CLIENTE, cli_cat AS CATEGORIA, DATE_FORMAT(cli_fecha_ins,"%d-%m-%Y") AS FECHA_ALTA, cli_suc AS SUC, cli_vend AS VENDEDOR FROM mnt_cli WHERE cli_fecha_ins BETWEEN '2012-01-01' AND  '2012-01-15' AND cli_vend like '%' AND cli_suc like  '02'  ";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$data_ini = substr($sup['desde'],8,2).'-'.substr($sup['desde'],5,2).'-'.substr($sup['desde'],0,4);
$data_fin = substr($sup['hasta'],8,2).'-'.substr($sup['hasta'],5,2).'-'.substr($sup['hasta'],0,4);
$T->Set('desde',$data_ini);
$T->Set('hasta',$data_fin);

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
$old['CLIENTE'] = '';
$old['CATEGORIA'] = '';
$old['FECHA_ALTA'] = '';
$old['SUC'] = '';
$old['VENDEDOR'] = '';
$old['CI_RUC'] = '';
$old['TEL'] = '';
$old['DIR'] = '';
$old['id'] = '';

// Making a rows of consult
$i = 1;
while( $Q0->NextRecord() ){

    // Define a elements
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['CATEGORIA'] = $Q0->Record['CATEGORIA'];
    $el['FECHA_ALTA'] = $Q0->Record['FECHA_ALTA'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['VENDEDOR'] = $Q0->Record['VENDEDOR'];
    $el['CI_RUC'] = $Q0->Record['CI_RUC'];
    $el['TEL'] = $Q0->Record['TEL'];
    $el['DIR'] = $Q0->Record['DIR'];
    $el['id'] = $Q0->Record['id'];
    
    
    $id = $el['id'] ;
    
    
    // Preparing a template variables
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_CATEGORIA', $el['CATEGORIA']);
    $T->Set('query0_FECHA_ALTA', $el['FECHA_ALTA']);
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_VENDEDOR', $el['VENDEDOR']);
    $T->Set('query0_CI_RUC', $el['CI_RUC']);
    $T->Set('query0_TEL', $el['TEL']);
    $T->Set('query0_DIR', $el['DIR']);
    
    $T->Set('id', $id);

    $zebra = $i % 2;
    $T->Set('zebra',"zebra$zebra");

    // BUSCAR SIMILARES SI HUBIERE
    
    $cliente = $el['CLIENTE'];  
    $ruc = $el['CI_RUC'];
    $ruc_completo = $el['CI_RUC'];
    $fullname = $el['CLIENTE'];
        
        // Remplazar * por vacio
            
        
        $ruc = str_replace("*","",$ruc);
        $cliente = str_replace("*","",$cliente);
        $cliente = str_replace(" DEL ","",$cliente);
        $cliente = str_replace(" DE ","",$cliente);
        
        // Cortar hasta el guion -
        
        $pos  = stripos($ruc, '-'); 
        if ($pos != false) {
            //echo "A string '-'   foi encontrada na string '$ruc' na pos: $pos";
            $ruc = substr($ruc,0, $pos);
        } 
             
        // Separar Nombres
         
        $arr = explode(" ", $cliente); 
        $arr = array_filter( $arr, 'strlen');
                      
        
        // Saco los espacios en Blanco del array
        $nombres = array();
        foreach ($arr as $key => $value) {
          array_push($nombres,$value);
        }          
        
        $n1 = $nombres[0]; // piece1
        $n2 = $nombres[1]; // piece2
        $n3 = $nombres[2]; // piece3
        
        $n1ter = substr($n1,-3); 
         
        if($n2 == ""){
            $n2 = $n1;
            $n3 = $n1;
        }else{
           if($n3 == ""){ 
              $n3 = $n1; 
           }
        } 
        
        $n2ter = substr($n2,-3);
        $n3ter = substr($n3,-3); 
        $ruc = substr($ruc,0, 6);
    
        $db = new Y_DB();
        $db->Database = 'marijoa';
        $sql = "SELECT cli_ci,cli_fullname,cli_cat,cli_tel1,cli_dir,cli_suc,date_format(cli_fecha_ins,'%d-%m-%Y') as registro, concat(ciudad,'-',dep_estado,'-',pais) AS CPE  FROM mnt_cli 
        WHERE  cli_ci <> '$ruc_completo' 
        and (( cli_ci LIKE '%$ruc%' and (cli_fullname LIKE '%$n1%' or cli_fullname LIKE '%$n2%' ))
        or ( cli_ci LIKE '%$ruc%' and (cli_fullname LIKE '%$n1ter%' or cli_fullname LIKE '%$n2ter%' or cli_fullname LIKE '%$n3ter%' )    )) "; 
        //echo $sql; 
        $db->Query($sql);
        
        if($db->NumRows() > 0){
           $T->Show('query0_data_row');
           
           echo '<tr> <td colspan="8" id="tr_'.$id.'"> ';
           echo '<table border="1" cellpadding="0" cellspacing="0" style="width:70%"> ';
           
           echo '<tr> <th style="background-color:#CCCC99" colspan="6">Clientes con CI/RUC Similares a <label style="background-color:#CC3300;color:white">&nbsp;&nbsp;"'.$ruc.'" &nbsp;&nbsp; </label>
           &nbsp;&nbsp;&nbsp;Nombre que contenga &nbsp;&nbsp;<label style="background-color:#FFD700;color:black">'.$n1ter.'</label>,&nbsp;&nbsp;<label style="background-color:#CC3300;color:white">'.$n2ter.'</label>&nbsp;&nbsp;o&nbsp;&nbsp;<label style="background-color:#FFD700;color:black">'.$n3ter.'</label>     
           </th> </tr>';
           echo '<tr> <th>CI/RUC</th> <th>CLIENTE</th> <th>CAT</th><th>TEL</th> <th>DIR</th> <th>FECHA REG.</th> </tr>';
           while($db->NextRecord()){
             $ci = $db->Record['cli_ci']; 
             $cli_fullname = $db->Record['cli_fullname']; 
             $cli_cat = $db->Record['cli_cat']; 
             $cli_tel1 = $db->Record['cli_tel1']; 
             $cli_dir = $db->Record['cli_dir']; 
             $reg = $db->Record['registro']; 
             $cpe = $db->Record['CPE']; 
                          
             $posini = strpos($ci, $ruc);
            
             $praParte = substr($ci, 0, $posini);
             $sdaParte = substr($ci, $posini,6);
             $traParte = substr($ci, $posini+6,100);
            
            
             //#FFD700
            
             $cadena = '<label style="background-color:#FFD700;color:black">'.$praParte.'</label><label style="background-color:#CC3300;color:white">'.$sdaParte.'</label><label style="background-color:#FFD700;color:black">'.$traParte.'</label> ';
            //echo "$praParte  $sdaParte    $traParte";
            
                  
            echo "<tr> <td class='item'>$cadena</td><td class='item'>$cli_fullname</td> <td class='itemc'>$cli_cat</td>  <td class='item'>$cli_tel1&nbsp;</td> <td class='item'>$cli_dir - $cpe</td> <td class='itemc'>$reg</td></tr>";
           }    
           echo '</table> ';
           echo ' </td> </tr>';
        }  
     
    
    
    
    // Show Subtotal
    if( true ){
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
    }
    
    //Actualize Old Values Variables
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['CATEGORIA'] = $el['CATEGORIA'];
    $old['FECHA_ALTA'] = $el['FECHA_ALTA'];
    $old['SUC'] = $el['SUC'];
    $old['CI_RUC'] = $el['CI_RUC'];
    $old['VENDEDOR'] = $el['VENDEDOR'];
    $old['TEL'] = $el['TEL'];
    $old['DIR'] = $el['DIR'];
    $old['id'] = $el['id'];
    $firstRow=false;
    $T->Set('i',$i);
   $i++;
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

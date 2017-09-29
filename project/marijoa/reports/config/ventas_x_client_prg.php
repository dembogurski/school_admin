<?php

/** Report prg file (ventas_x_client) 
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
  $T->Set( 'sup_cli_fullname', '');
  $T->Set( 'sup_cli_cat', '%');
  $T->Set( 'sup_p_grupo', '%');
  $T->Set( 'sup_p_tipo', '%');
  $T->Set( 'sup_desde', '2009-02-02');
  $T->Set( 'sup_hasta', '2009-02-12');
  $T->Set( 'sup_desdeinv', '2009-02-02');
  $T->Set( 'sup_hastainv', '2009-02-12');
  $T->Set( 'sup_gen_rep', ''); */
// ------------------------------------------
// THIS IS YOUR FIRST QUERY:
//$query0 = "select f.fact_nom_cli AS CLIENTE, f.fact_nro  as NRO, DATE_FORMAT(f.fact_fecha,"%d-%m-%Y") as FECHA, p.p_fam as FAMILIA, p.p_grupo as GRUPO,p.p_tipo as TIPO,d.df_cantidad as CANTIDAD, d.df_subtotal as SUBTOTAL   from factura f, det_factura d,mnt_prod p where f.fact_fecha BETWEEN '2009-02-02' and '2009-02-12' and f.fact_cli_cat like '%' and f.fact_nom_cli LIKE '%' AND f.fact_nro = d.df_fact_num and  d.df_cod_prod = p.p_cod and p.p_tipo like  '%' and p.p_grupo like '%' ORDER BY f.fact_nom_cli, f.fact_total desc;";

function diffDate($d1, $d2, $type = '', $sep = '-') {
    $d1 = explode($sep, $d1);
    $d2 = explode($sep, $d2);
    switch ($type) {
        case 'A':
            $X = 31536000;
            break;
        case 'M':
            $X = 2592000;
            break;
        case 'D':
            $X = 86400;
            break;
        case 'H':
            $X = 3600;
            break;
        case 'MI':
            $X = 60;
            break;
        default:
            $X = 1;
    }
    return floor((
                    ( mktime(0, 0, 0, $d2[1], $d2[2], $d2[0])
                    - mktime(0, 0, 0, $d1[1], $d1[2], $d1[0]) ) / $X));
}

$T->Set('time', daytime());
$T->Set('user', $Global['username']);

$db = new Y_DB();
$db->Database = $Global['project'];

$desde = $sup['desde'];
$hasta = $sup['hasta'];

$diff_meses = diffDate($desde, $hasta, 'M');

$T->Set('meses', $diff_meses);
$T->Set('limite', 0);

if ($sup['tipo'] === 'Detallado') {
    $T->Set('tipo', 'Detallado');
} else {
    $T->Set('tipo', 'Resumido');
}

$firstRow = true;
$Q0 = $DB;
$Q0->Query($query0);

$subtotaCANTIDAD = 0;
$subtotaSUBTOTAL = 0;
$subtotaPRECIO = 0;

$Z_CANTIDAD = 0;
$Z_SUBTOTAL = 0;


// Starting a HTML
$T->Show('general_header');   // Principal Header
$T->Show('start_query0');   // Start a Table 
$T->Show('header0');    // Show Header

$old['CLIENTE'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['CANTIDAD'] = '';
$old['SUBTOTAL'] = '';
$old['NRO'] = '';
$old['SUC'] = '';
$old['FECHA'] = '';
$old['VENDEDOR'] = '';
$old['PRECIO'] = '';
$old['RUC'] = '';

$tmp_total = 0; 

// Making a rows of consult
while ($Q0->NextRecord()) {

    // Define a elements
    $el['CLIENTE'] = $Q0->Record['CLIENTE'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['CANTIDAD'] = $Q0->Record['CANTIDAD'];
    $el['SUBTOTAL'] = $Q0->Record['SUBTOTAL'];
    $el['NRO'] = $Q0->Record['NRO'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['PRECIO'] = $Q0->Record['PRECIO'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['VENDEDOR'] = $Q0->Record['VENDEDOR'];
    $el['RUC'] = $Q0->Record['RUC'];

    if (($el['GRUPO'] != $old['GRUPO']) || ($el['TIPO'] != $old['TIPO']) || ($el['CLIENTE'] != $old['CLIENTE'])) {
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotaCANTIDAD = 0;
        $tmp_total +=0+$subtotaSUBTOTAL;
        $subtotaSUBTOTAL = 0;
        $subtotaPRECIO = 0;
    }
    if ($el['CLIENTE'] != $old['CLIENTE']) {
        if ($old['CLIENTE'] != '') {
            
            $ruc = $old['RUC'];
            $sql = "SELECT cli_limit FROM mnt_cli WHERE cli_ci = '$ruc' limit 1";
            $db->Query($sql);
            $db->NextRecord();
            
            $limit = $db->Record['cli_limit'];
            if($tmp_total > $limit){
                $T->Set('color', 'red');
            }else{
                $T->Set('color', 'green'); 
            }
            
            $T->Set('limite', number_format($limit, 0, ',', '.'));
            $T->Set('cliente', $old['CLIENTE']);
            // echo $tmp_total." $limit<br>";
            
            
            $T->Show('tot_cli');
            $tmp_total = 0;
        }
        echo "<tr> <td colspan='9' height='30' style='background-color:lightgray'> <B> " . $el['CLIENTE'] . "   </B> </td>  </tr>";
        $subtotaCANTIDAD = 0;
        $subtotaSUBTOTAL = 0;
        $subtotaPRECIO = 0;
        $Z_CANTIDAD = 0;
        $Z_SUBTOTAL = 0;
    }
    /* if ( $old['CLIENTE'] === '' ){// Primera vez
      echo "<tr> <td colspan='9' height='30' style='background-color:lightgray'>".$el['CLIENTE']."    </td>  </tr>";
      } */


    // Preparing a template variables
    $T->Set('query0_CLIENTE', $el['CLIENTE']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_PRECIO', $el['PRECIO']);

    $T->Set('query0_CANTIDAD', $el['CANTIDAD']);
    $T->Set('query0_SUBTOTAL', $el['SUBTOTAL']);

    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_NRO', $el['NRO']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_VENDEDOR', $el['VENDEDOR']);


    // Calculating a total
    // Calculating a subtotal
    $subtotaCANTIDAD += 0 + $el['CANTIDAD'];
    $subtotaSUBTOTAL += 0 + $el['SUBTOTAL'];
    $subtotaPRECIO += 0 + $el['PRECIO'];

    // Totales por Cliente
    $Z_CANTIDAD += 0 + $el['CANTIDAD'];
    $Z_SUBTOTAL += 0 + $el['SUBTOTAL'];
    
    if ($sup['tipo'] === 'Detallado') {
        $T->Show('query0_data_row');
    }
    if ($Z_SUBTOTAL > 0) {
        $promedio = $Z_SUBTOTAL / $diff_meses / 3;
        $T->Set('promedio', number_format($promedio, 0, ',', '.'));
    }


    // Para los subtotales 
    $T->Set('query0_GRUPOS', $el['GRUPO']);
    $T->Set('query0_TIPOS', $el['TIPO']);
    $T->Set('query0_SUCS', $el['SUC']);
    $T->Set('query0_NROS', $el['NRO']);
    $T->Set('query0_FECHAS', $el['FECHA']);
    $T->Set('query0_VENDEDORS', $el['VENDEDOR']);

    $T->Set('subtotaCANTIDAD', number_format($subtotaCANTIDAD, 2, ',', '.'));
    $T->Set('subtotaSUBTOTAL', number_format($subtotaSUBTOTAL, 0, ',', '.'));
    $T->Set('subtotaPRECIO', number_format($subtotaPRECIO, 0, ',', '.'));
    $T->Set('Z_CANTIDAD', number_format($Z_CANTIDAD, 2, ',', '.'));
    $T->Set('Z_SUBTOTAL', number_format($Z_SUBTOTAL, 0, ',', '.'));

   
 
    if ($sup['tipo'] === 'Detallado') {

        $T->Set('query0_GRUPOS', '-');
        $T->Set('query0_VENDEDORS', '-');
        $T->Set('query0_TIPOS', '-');
        $T->Set('query0_SUCS', '-');
        $T->Set('query0_NROS', '<B>Totales</B>');
        $T->Set('query0_FECHAS', '-');
    }

    if ($endConsult) {
        $T->Show('query0_subtotal_row');
        //Reset a Subtotal Variables
        $subtotaCANTIDAD = 0;
        $subtotaSUBTOTAL = 0;
    }

    //Actualize Old Values Variables
    $old['CLIENTE'] = $el['CLIENTE'];
    $old['GRUPO'] = $el['GRUPO'];
    $old['TIPO'] = $el['TIPO'];
    $old['CANTIDAD'] = $el['CANTIDAD'];
    $old['SUBTOTAL'] = $el['SUBTOTAL'];
    $old['NRO'] = $el['NRO'];
    $old['SUC'] = $el['SUC'];
    $old['FECHA'] = $el['FECHA'];
    $old['VENDEDOR'] = $el['VENDEDOR'];
    $old['RUC'] = $el['RUC'];

    $firstRow = false;
}

$endConsult = true;
if (($el['GRUPO'] != $old['GRUPO']) || ($el['TIPO'] != $old['TIPO'])) {
    $T->Show('query0_subtotal_row');
}
// Show total
if (true) {
    $T->Show('query0_subtotal_row');
    $ruc = $el['RUC'];
            $sql = "SELECT cli_limit FROM mnt_cli WHERE cli_ci = '$ruc' limit 1";
            $db->Query($sql);
            $db->NextRecord();
            
            $limit = $db->Record['cli_limit'];
            $T->Set('limite', number_format($limit, 0, ',', '.'));
            $T->Set('cliente', $el['CLIENTE']);
    
    $T->Show('tot_cli');
    $T->Show('query0_total_row');
}
$T->Show('end_query0');    // Ends a Table 
?>

<?php

/** Report prg file (rep_log_fdp) 
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
  $T->Set( 'sup_desde', '2009-11-20');
  $T->Set( 'sup_hasta', '2009-11-20');
  $T->Set( 'sup_usuario', '%');
  $T->Set( 'sup_cod', '%');
  $T->Set( 'sup_suc_', '%');
  $T->Set( 'sup_grupo', '%');
  $T->Set( 'sup_tipo', 'bar%');
  $T->Set( 'sup_gen', ''); */
// ------------------------------------------
// THIS IS YOUR FIRST QUERY:
//$query0 = "select usuario AS USUARIO, suc as SUC, DATE_FORMAT(fecha,"%d-%m-%Y") as FECHA, hora AS HORA , descrip AS DESCRIP, grupo as GRUPO, tipo as TIPO from prod_fdp where usuario like '%' and fecha BETWEEN '2009-11-20' and '2009-11-20' and suc like '%'  and grupo like '%' and tipo like 'bar%' and descrip like '%' and accion = "FDP" order by grupo asc";

$T->Set('time', daytime());
$T->Set('user', $Global['username']);

$rem_fecha = $sup['fecha_rem'];

$data_ini = substr($sup['desde'], 8, 2) . '-' . substr($sup['desde'], 5, 2) . '-' . substr($sup['desde'], 0, 4);
$data_fin = substr($sup['hasta'], 8, 2) . '-' . substr($sup['hasta'], 5, 2) . '-' . substr($sup['hasta'], 0, 4);

$T->Set('desde', $data_ini);
$T->Set('hasta', $data_fin);

$db = new Y_DB();
$db->Database = $Global['project'];
$dv = new Y_DB();
$dv->Database = $Global['project'];

$firstRow = true;
$Q0 = $DB;
$Q0->Query($query0);

// Starting a HTML
$T->Show('general_header');   // Principal Header
$T->Show('start_query0');   // Start a Table 
// Show Header
//Define a  variable
$endConsult = false;
//Define a Total Variables
//Define a Subtotal Variables
//Define a Old Values Variables
$old['CODIGO'] = '';
$old['P_COMPRA'] = '';
$old['REC'] = '';
$old['USUARIO'] = '';
$old['SUC'] = '';
$old['FECHA'] = '';
$old['HORA'] = '';
$old['DESCRIP'] = '';
$old['GRUPO'] = '';
$old['TIPO'] = '';
$old['STOCK'] = '';
$old['C_INI'] = '';

$total_codigos = 0;
// Making a rows of consult
while ($Q0->NextRecord()) {
	$total_codigos += 1;
    // Define a elements
    $el['USUARIO'] = $Q0->Record['USUARIO'];
    $el['CODIGO'] = $Q0->Record['CODIGO'];
    $el['SUC'] = $Q0->Record['SUC'];
    $el['FECHA'] = $Q0->Record['FECHA'];
    $el['HORA'] = $Q0->Record['HORA'];
    $el['DESCRIP'] = $Q0->Record['DESCRIP'];
    $el['GRUPO'] = $Q0->Record['GRUPO'];
    $el['TIPO'] = $Q0->Record['TIPO'];
    $el['STOCK'] = $Q0->Record['STOCK'];
    $el['C_INI'] = $Q0->Record['C_INI'];
    $el['P_COMPRA'] = $Q0->Record['P_COMPRA'];
    $el['REC'] = $Q0->Record['REC'];
    
    $stock = $el['STOCK'];
    $costo = 0;
    if($stock > 0){
       $costo = $el['P_COMPRA'] + ($el['P_COMPRA'] * $el['REC'] / 100 );
    }else{
       $costo =  0;
    } 

    // Preparing a template variables
    $T->Set('query0_USUARIO', $el['USUARIO']);
    $T->Set('query0_CODIGO', $el['CODIGO']);
    $T->Set('query0_SUC', $el['SUC']);
    $T->Set('query0_FECHA', $el['FECHA']);
    $T->Set('query0_HORA', $el['HORA']);
    $T->Set('query0_DESCRIP', $el['DESCRIP']);
    $T->Set('query0_GRUPO', $el['GRUPO']);
    $T->Set('query0_TIPO', $el['TIPO']);
    $T->Set('query0_STOCK', $el['STOCK']);
    $T->Set('query0_C_INI', $el['C_INI']);
    $T->Set('query0_COSTO', number_format($costo,0,',','.')); 
    
    $T->Set('query0_P_COMPRA', $el['P_COMPRA']);
    $T->Set('query0_REC', $el['REC']);

    $codigo = $el['CODIGO'];
    $T->Show('header0');
    $T->Show('query0_data_row');

     

    // Busco Ajustes en Origen

    $db->Query("SELECT aj_prod,aj_suc, date_format(aj_fecha,'%d-%m-%Y') AS fecha,aj_hora,aj_usuario,aj_inicial,aj_ajuste,aj_final,aj_motivo,aj_verificador  FROM mnt_ajustes WHERE aj_suc = '00'  AND aj_prod = $codigo");
    if ($db->NumRows() > 0) {
        $T->Set('suc', '00');
         
        $T->Show('ajustes_h');
        while ($db->NextRecord()) {
            $aj_suc = $db->Record['aj_suc'];
            $aj_hora = $db->Record['aj_hora'];
            $fecha = $db->Record['fecha'];
            $aj_usuario = $db->Record['aj_usuario'];
            $aj_inicial = $db->Record['aj_inicial'];
            $aj_ajuste = $db->Record['aj_ajuste'];
            $aj_final = $db->Record['aj_final'];
            $aj_motivo = $db->Record['aj_motivo'];
            $aj_verificador = $db->Record['aj_verificador'];
            if ($aj_verificador == "") {
                $aj_verificador = "Sin Verificacion";
            }

            $T->Set('aj_suc', $aj_suc);
            $T->Set('aj_hora', $aj_hora);
            $T->Set('fecha', $fecha);
            $T->Set('aj_usuario', $aj_usuario);
            $T->Set('aj_inicial', $aj_inicial);
            $T->Set('aj_ajuste', $aj_ajuste);
            $T->Set('aj_final', $aj_final);
            $T->Set('aj_motivo', $aj_motivo);
            $T->Set('aj_verificador', $aj_verificador);

            $T->Show('ajustes_data');
        }
        $T->Show('ajustes_f');
    }

    // Busco Ventas producidas en le Deposito
    $db->Query("SELECT f.fact_nro AS factura,f.fact_localidad AS suc,date_format(f.fact_fecha,'%d-%m-%Y') AS fecha,f.fact_vend_cod as vendedor, d.df_cantidad AS cant  FROM factura f, det_factura d WHERE f.fact_nro = d.df_fact_num AND f.fact_localidad = '00' AND d.df_cod_prod = $codigo and fact_estado = 'Cerrada' ");

    if ($db->NumRows() > 0) {
        $T->Set('suc', $suc); 
        $T->Show('history_h');

        while ($db->NextRecord()) {
            $factura = $db->Record['factura'];
            $suc = $db->Record['suc'];
            $fecha = $db->Record['fecha'];
            $cant = $db->Record['cant'];
            $T->Set('factura', $factura);
            $T->Set('suc', $suc);
            $T->Set('fecha', $fecha);
            $T->Set('cant', $cant);
            $T->Show('history_data');
        }
        $T->Show('history_f');
    }

    // Busco todos los traslados y por cada translado las ventas que tuvo en el Destino del Translado

    $sql_tra = "SELECT n.rem_nro AS Nro,date_format(n.rem_fecha,'%d-%m-%Y') AS fecha,n.rem_origen AS Origen, n.rem_destino AS Destino,
    n.rem_receptor AS Receptor,d.df_cod_prod AS Codigo, d.df_disponible AS Cant_recib  FROM nota_remision n,  remito_det d WHERE n.rem_nro = d.rem_nro AND n.rem_estado = 'Cerrada' and rem_fecha >= '$rem_fecha'
    AND d.df_cod_prod = $codigo";
    $db->Query($sql_tra);

    if ($db->NumRows() > 0) {
         
        $T->Show('traslados_h');
        while ($db->NextRecord()) {
            $Nro = $db->Record['Nro'];
            $fecha = $db->Record['fecha'];
            $Origen = $db->Record['Origen'];
            $Destino = $db->Record['Destino'];
            $Receptor = $db->Record['Receptor'];
            $Cant_recib = $db->Record['Cant_recib'];
            $T->Set('rem_nro', $Nro);
            $T->Set('fecha', $fecha);
            $T->Set('origen', $Origen);
            $T->Set('destino', $Destino);
            $T->Set('receptor', $Receptor);
            $T->Set('cant_recib', $Cant_recib);
            
            // Busar Ventas y Ajustes
            
            $dv->Query("SELECT f.fact_nro AS factura,f.fact_localidad AS suc,date_format(f.fact_fecha,'%d-%m-%Y') AS fecha, f.fact_vend_cod as vendedor, d.df_cantidad AS cant  FROM factura f, det_factura d WHERE f.fact_nro = d.df_fact_num AND f.fact_localidad = '$Destino' AND d.df_cod_prod = $codigo and fact_estado = 'Cerrada'");
            $ventas = "";
            if ($dv->NumRows() > 0) {// Ventas
                 
               $ventas = getVentasHeader($Destino);
               $metros = 0; 
                while ($dv->NextRecord()) {
                    $factura = $dv->Record['factura'];
                    $vendedor= $dv->Record['vendedor'];
                    $fecha = $dv->Record['fecha'];
                    $cant = $dv->Record['cant'];
                    $metros += 0 + $cant;
                    $data = getVentasData($factura,$vendedor,$fecha,$cant);
                    $ventas = $ventas."".$data;                                        
                }
                $ventas = $ventas."<tr><td colspan='3'> <td class='num'><b>$metros</b></td></tr>
                                    </table>";
                
            }else{
                $ventas = "<label style='width:26px;text-align:center;font-size:12px'>&nbsp;&nbsp; Sin Ventas en $Destino </label>";
            }
            
            // Buscar Ajustes
            $ajustes = '';
            
        $dv->Query("SELECT aj_prod,aj_suc, date_format(aj_fecha,'%d-%m-%Y') AS fecha,aj_hora,aj_usuario,aj_signo,aj_inicial,aj_ajuste,aj_final,aj_motivo,aj_verificador  FROM mnt_ajustes WHERE aj_suc = '$Destino'  AND aj_prod = $codigo");
            if ($dv->NumRows() > 0) {
                 
                $ajustes = getAjustesHeader($Destino);
                
                $pos = 0;
                $neg = 0;
                 
                while ($dv->NextRecord()) {
                    $aj_suc = $dv->Record['aj_suc'];
                    $aj_hora = $dv->Record['aj_hora'];
                    $fecha = $dv->Record['fecha'];
                    $aj_usuario = $dv->Record['aj_usuario'];
                    $aj_inicial = $dv->Record['aj_inicial'];
                    $aj_ajuste = $dv->Record['aj_ajuste'];
                    $aj_final = $dv->Record['aj_final'];
                    $aj_motivo = $dv->Record['aj_motivo'];
                    $aj_verificador = $dv->Record['aj_verificador'];
                    $aj_signo = $dv->Record['aj_signo'];
                    
                    if($aj_signo=="+"){
                        $pos  += 0 + $aj_ajuste;
                    }else{
                        $neg  += 0 - $aj_ajuste; 
                    }
                    
                    if ($aj_verificador == "") {
                        $aj_verificador = "No Verif";
                    }
                    $data = getAjustesData($fecha,$aj_hora,$aj_usuario,$aj_inicial,$aj_signo,$aj_ajuste,$aj_final,$aj_motivo,$aj_verificador);
                    $ajustes = $ajustes."".$data;  
                }
                $ajustes = $ajustes."<tr> <td colspan='3'>   </td> <td colspan='3' class='item'><b> Ajustes positivos: $pos &nbsp;&nbsp;Ajustes Negativos: $neg   </b></td>    </tr> </table>";
            }else{
                $ajustes =  "<label style='width:26px;text-align:center;font-size:12px'>&nbsp;&nbsp; Sin Ajustes en $Destino </label>";
            }
            $T->Set('ventas', $ventas);
            $T->Set('ajustes', $ajustes);
            $T->Show('traslados_data');
        }
            $T->Show('traslados_f');
        }

        

        //Actualize Old Values Variables
        $old['CODIGO'] = $el['CODIGO'];
        $old['USUARIO'] = $el['USUARIO'];
        $old['SUC'] = $el['SUC'];
        $old['FECHA'] = $el['FECHA'];
        $old['HORA'] = $el['HORA'];
        $old['DESCRIP'] = $el['DESCRIP'];
        $old['GRUPO'] = $el['GRUPO'];
        $old['TIPO'] = $el['TIPO'];
        $old['STOCK'] = $el['STOCK'];
        $old['C_INI'] = $el['C_INI'];
        $old['REC'] = $el['REC'];
        $old['P_COMPRA'] = $el['P_COMPRA'];
        $firstRow = false;
    }
	$T->Set('tot_cod',$total_codigos);
	$T->Show('end_query0');
 

    $endConsult = true;
	function getVentasHeader($suc){
       return '<table cellpadding="0" cellspacing="0" border="1" style="width: 100%" > 
        <tr>  <th colspan="4" style="background:#0099FF; width: 25%;">Ventas en '.$suc.'</th>  </tr>
                   <tr><th>Factura</th><th>Suc</th><th>Fecha</th><th>Cantidad</th> </tr>';  
	}
	function getVentasData($fact,$vend,$fecha,$cant){
			 return  '<tr>
					<td class="item">'.$fact.'</td> <td class="itemc">'.$vend.'</td> <td class="itemc">'.$fecha.'</td> <td  class="num">'.$cant.'</td> 
				</tr>';  
	}

	function getAjustesHeader($suc){
		return '<table cellpadding="0" cellspacing="0" border="1" style="width: 100%;" > 
					   <tr style="background-color: #FFCC00";width: 55%;>  <th colspan="9">Ajustes en '.$suc.'</th>  </tr> 
					   <tr> <th>Fecha</th><th>Hora</th><th>Usuario</th>   <th>C.Ini</th>  <th>Signo</th>  <th>Ajuste</th><th>C.Final</th><th>Motivo</th><th>Verif.</th> </tr>';
	}
	function getAjustesData($fecha,$hora,$usuario,$ini,$signo,$ajuste,$final,$motivo,$verif){
		return '<tr>
				   <td class="itemc">'.$fecha.'</td> <td class="itemc">'.$hora.'</td> <td class="item">'.$usuario.'</td>  <td  class="num">'.$ini.'</td> 
					   <td  class="num">'.$signo.'</td>  
						   <td class="num">   '.$ajuste.'</td>  <td class="num">'.$final.'</td>   <td  class="item">'.$motivo.'</td> <td class="itemc">'.$verif.'</td> 
				</tr> ';
	}


    
    ?>


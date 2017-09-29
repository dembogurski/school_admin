<?php

/** Report prg file (pol_abast_rep) 
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
  $T->Set( 'sup_usuario', 'Developer');
  $T->Set( 'sup___suc', '02');
  $T->Set( 'sup_temporada', 'VERANO');
  $T->Set( 'sup_rep_pol', '');
 */
// ------------------------------------------
// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT sector,grupo,tipo,cant_min FROM pol_abast WHERE temporada = 'VERANO' AND suc = '02'";


$cantidad = $sup['cant'];

$T->Set('time', daytime());
$T->Set('user', $Global['username']);

$db = new Y_DB();
$db->Database = 'marijoa';
$dba = new Y_DB();
$dba->Database = 'marijoa';
$db2 = new Y_DB();
$db2->Database = 'marijoa';

$dbs = new Y_DB();
$dbs->Database = 'marijoa';


$dbc = new Y_DB();
$dbc->Database = 'marijoa';

$suc = $sup['__suc'];
$T->Set('suc', $suc);

$firstRow = true;
$Q0 = $DB;
$Q0->Query($query0);

// Starting a HTML
$T->Show('general_header');   // Principal Header
$T->Show('start_query0');   // Start a Table 
$T->Show('header0');    // Show Header
//Define a  variable
$endConsult = false;
//Define a Total Variables
//Define a Subtotal Variables
//Define a Old Values Variables
$old['sector'] = '';
$old['grupo'] = '';
$old['tipo'] = '';
$old['cant_min'] = '';

$depositos = "(p_local = '00' or p_local = '07' or p_local = '08' or p_local = '09' or p_local = '12')";
$distinto_de_depositos = "(p_local != '00' and p_local != '07' and p_local != '08' and p_local != '09' and p_local != '12' and p_local != '11')";

$cont = 0;
$cont_all = 0;


// Making a rows of consult
while ($Q0->NextRecord()) {
    $cont_all++;
    // Define a elements
    $el['sector'] = $Q0->Record['sector'];
    $el['grupo'] = $Q0->Record['grupo'];
    $el['tipo'] = $Q0->Record['tipo'];
    $el['cant_min'] = $Q0->Record['cant_min'];

    $sector = $el['sector'];
    $grupo = $el['grupo'];
    $tipo = $el['tipo'];
    $minimo = $el['cant_min'];

    // Preparing a template variables
    $T->Set('query0_sector', $el['sector']);
    $T->Set('query0_grupo', $el['grupo']);
    $T->Set('query0_tipo', $el['tipo']);
    $T->Set('query0_cant_min', $el['cant_min']);

    // Buscar el Stock de esta sucursal * cada color

    $dbc->Query("select distinct p_color from mnt_prod where p_fam = '$sector'  AND p_grupo = '$grupo'  AND p_tipo = '$tipo' AND prod_fin_pieza != 'Si' AND p_local != '11'");

    while ($dbc->NextRecord()) {
        $color = $dbc->Record['p_color'];
        $T->Set('query0_color', $color);

        $stock = "SELECT SUM(p_cant) as stock FROM mnt_prod WHERE p_local = '$suc' AND p_fam = '$sector'  AND p_grupo = '$grupo'  AND p_tipo = '$tipo' and p_color = '$color' AND prod_fin_pieza != 'Si' AND p_cant > $cantidad and p_local != '11'";
        $db->Query($stock);
        if ($db->NumRows() > 0) {
            $db->NextRecord();
            $stock_actual = $db->Record['stock'];
        } else {
            $stock_actual = 0;
        }
        $T->Set('query0_stock_actual', number_format($stock_actual, 1, ',', '.'));


        if ($stock_actual < (($minimo * 20) / 100)) {
            
            // Buscar en los depositos
            $stock_depositos = 0;
            $db2->Query("SELECT p_local, p_cod,p_foto,p_ref,p_color, p_cant as stock_deps FROM mnt_prod WHERE p_fam = '$sector'  AND p_grupo = '$grupo'  AND p_tipo = '$tipo' and p_color = '$color' AND prod_fin_pieza != 'Si' AND p_cant > 0 and $depositos");

            if ($db2->NumRows() > 0) {
                $stock_dep = "<div style='text-align:right'><img style='cursor:pointer'  src='images/12-em-cross.png' onclick='hideAnchorTitle()'></div>";
                $stock_dep .="<table cellspacing='0' cellpadding='2' style='padding: 2px;margin:2px' border='1'>";
                $stock_dep .="<tr><th>Codigo</th><th>Color</th>  <th>Suc</th> <th>Mts</th><th>Img</th> <th>Est</th><th>*</th></tr>";

                while ($db2->NextRecord()) {

                    $p_local = $db2->Record['p_local'];
                    $p_cod = $db2->Record['p_cod'];
                    $p_ref = $db2->Record['p_ref'];
                    $p_col = $db2->Record['p_color'];
                    $p_foto = $db2->Record['p_foto'];
                    $stock_deposito = $db2->Record['stock_deps'];

                    $stock_redondeado = floor($stock_deposito);

                    $path = "prod_images/$p_ref/$p_foto.jpg";

                    if ($p_foto != null) {
                        $foto = "<img src='images/image.png' style='cursor:pointer' onclick='verFoto($p_cod)'>";
                    } else {
                        $foto = "<img src='images/no-image-mini.png' height='24' width='32'>";
                    }

                    // Verificaciones
                    // Verificar si esta procesado en Produccion
                    $dba->Query("SELECT COUNT(*) AS ajustes FROM mnt_ajustes WHERE aj_motivo = 'Ajuste en metraje original' AND aj_prod = '$p_cod'");
                    if ($dba->NumRows()) {
                        $dba->NextRecord();
                        $ajustes = $dba->Record['ajustes'];
                    }

                    if ($ajustes > 0) {
                        //Aqui una vista
                        //
                        // Verificar si esta en una remision Abierta o en Proceso
                        $dba->Query("SELECT CONCAT('En Remision  ', r.rem_estado ,'  Destino ', r.rem_dir_destino,' Nro: ',r.rem_nro) AS en_remito FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND r.rem_estado <> 'Cerrada' AND d.df_cod_prod = '$p_cod';");
                        if ($dba->NumRows()) {
                            $dba->NextRecord();
                            $en_remito = $dba->Record['en_remito'];
                            $estado = 'truck.png';
                            $img_pedir = 'abort';
                            $atributos = "";
                        } else {
                            // Aqui otra vista
                            $dba->Query("select CONCAT('En Nota de Pedido  ', p.nro  ,' Fecha: ',  fecha ,'  ',p.estado, '  ',__suc) as en_pedido from nota_pedido_det d, nota_pedido p where p.nro = d.nro_pedido and  d.codigo = '$p_cod' and p.estado != 'Cerrada' and __locald != 'PR'");
                            if ($dba->NumRows()) {
                                $dba->NextRecord();
                                $en_pedidos = $dba->Record['en_pedido'];
                                $estado = 'carrito0.png';
                                $img_pedir = 'abort';
                                $atributos = "";
                            } else {
                                $estado = 'bien.png';
                                $img_pedir = 'carrito0';
                                $atributos = "style='cursor:pointer'   onclick=addToCart($p_cod,$stock_redondeado,'$p_local','$path','1',true) ";
                            }
                        }
                        // Verificar si no esta en un pedido
                    } else { // Si no tiene ajustes no se podra pedir
                        $estado = 'nopic.png';
                        $img_pedir = 'abort';
                        $atributos = "";
                    }



                    $stock_dep.="<tr><td>$p_cod</td><td>$p_col</td><td style='text-align:center'>$p_local</td><td>$stock_deposito</td><td style='text-align:center'>  <span id='spanfoto_$p_cod'></span>$foto</td> <td><img src='images/$estado'></td> <td><img $atributos src='images/$img_pedir.png'></td> </tr>";
                    $stock_depositos+=0 + $stock_deposito;
                }
                $stock_dep.="</table>";
            } else {

                $stock_dep = "";
                $stock_depositos = 0;
                $sql_ = "SELECT p_local, p_cod,p_foto,p_ref, p_cant as stock_suc FROM mnt_prod WHERE p_fam = '$sector'  AND p_grupo = '$grupo'  AND p_tipo = '$tipo' and p_color = '$color' AND prod_fin_pieza != 'Si' AND p_cant > $cantidad and $distinto_de_depositos";
                $dbs->Query($sql_);

                if ($dbs->NumRows() > 0) {
                    $stock_dep = "<div style='text-align:right'><img style='cursor:pointer'  src='images/12-em-cross.png' onclick='hideAnchorTitle()'></div>";
                    $stock_dep .="<table cellspacing='0' cellpadding='2' style='padding: 2px;margin:2px' border='1'>";
                    $stock_dep .="<tr><th>Codigo</th> <th>Suc</th> <th>Mts</th><th>Img</th> <th>Est</th><th>-</th></tr>";

                    while ($dbs->NextRecord()) {

                        $p_local = $dbs->Record['p_local'];
                        $p_cod = $dbs->Record['p_cod'];
                        $p_ref = $dbs->Record['p_ref'];
                        $p_foto = $dbs->Record['p_foto'];
                        $stock_deposito = $dbs->Record['stock_suc'];

                        $stock_redondeado = floor($stock_deposito);

                        $path = "prod_images/$p_ref/$p_foto.jpg";

                        if ($p_foto != null) {
                            $foto = "<img src='images/image.png' style='cursor:pointer' onclick='verFoto($p_cod)'>"; 
                        } else {
                            $foto = "<img src='images/no-image-mini.png' height='24' width='32'>";
                            $path = "images/no-image-mini.png";
                        }

                        // Verificaciones
                        // Verificar si desde la ultima remision la cantidad que se fue hacia dicha sucursal y cuanto se vendio a partir de dicha remision, si  se vendio mas del 30% de lo que se fue dejar ahi
                        $sqlr = "SELECT rem_fecha_cier, df_disponible,DATEDIFF(CURRENT_DATE,rem_fecha_cier) as dias FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND rem_destino = '$p_local' AND d.df_cod_prod = $p_cod AND rem_estado = 'Cerrada'  ORDER BY d.id DESC LIMIT 1";
                        $dba->Query($sqlr);
                        if ($dba->NumRows()) {
                            $dba->NextRecord();
                            $rem_fecha_cier = $dba->Record['rem_fecha_cier'];
                            $cant_enviada = $dba->Record['df_disponible'];
                            $dias = $dba->Record['dias'];
                            $obligacion = ceil(($cant_enviada * $dias) / 100);

                            // Buscar la cantidad vendida desde esa fecha 
                            $ventas = "select sum(df_cantidad) as ventas from factura f, det_factura d where f.fact_nro = d.df_fact_num and f.fact_estado = 'Cerrada' and f.fact_localidad = '$p_local' and fact_fecha BETWEEN '$rem_fecha_cier' and current_date and df_cod_prod = '$p_cod'";
                            $dbc->Query($ventas);
                            if ($dbc->NumRows() > 0) {
                                $dbc->NextRecord();
                                $metros_vendidos = $dbc->Record['ventas'];

                                if ($metros_vendidos > $obligacion) { // No se puede pedir
                                    $stock_dep = "";
                                } else {
                                   // echo "$p_cod |  $metros_vendidos < $obligacion Transladado.. $ventas <br>";
                                }
                            } else {
                               // echo "$p_cod Sin ventas <br>";
                            }
                        } else { // Probablemente haya sido fraccionado ahi
                            // Ver cuando se fracciono
                            $sqlr = "SELECT fecha,p_cant_compra ,DATEDIFF(CURRENT_DATE,fecha) as dias FROM _audit_log_ a, mnt_prod p WHERE a.descrip = p.p_cod AND accion LIKE 'INSERTAR' AND descrip = '$p_cod'  ORDER BY a.id DESC  LIMIT 1";

                            $dba->Query($sqlr);
                            if ($dba->NumRows()) {
                                $dba->NextRecord();
                                $rem_fecha_cier = $dba->Record['fecha'];
                                $p_cant_compra = $dba->Record['p_cant_compra'];
                                $dias = $dba->Record['dias'];
                                $obligacion = ceil(($p_cant_compra * $dias) / 100);

                                // Buscar la cantidad vendida desde esa fecha 
                                $ventas = "select sum(df_cantidad) as ventas from factura f, det_factura d where f.fact_nro = d.df_fact_num and f.fact_estado = 'Cerrada' and f.fact_localidad = '$p_local' and fact_fecha BETWEEN '$rem_fecha_cier' and current_date and df_cod_prod = '$p_cod'";
                                $dbc->Query($ventas);
                                if ($dbc->NumRows() > 0) {
                                    $dbc->NextRecord();
                                    $metros_vendidos = $dbc->Record['ventas'];

                                    if ($metros_vendidos > $obligacion) { // No se puede pedir
                                        $stock_dep = "";
                                    } else {
                                      //  echo "$p_cod |  $metros_vendidos < $obligacion Fraccionado.. $ventas<br>";
                                    }
                                } else {
                                   // echo "$p_cod Fraccionado Sin ventas <br>";
                                }
                            }
                        }
                        if ($stock_dep != "") {
                             
                            // Verificar si esta en una remision Abierta o en Proceso
                            $dba->Query("SELECT CONCAT('En Remision  ', r.rem_estado ,'  Destino ', r.rem_dir_destino,' Nro: ',r.rem_nro) AS en_remito FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND r.rem_estado <> 'Cerrada' AND d.df_cod_prod = '$p_cod';");
                            if ($dba->NumRows()) {
                                $dba->NextRecord();
                                $en_remito = $dba->Record['en_remito'];
                                $estado = 'truck.png';
                                $img_pedir = 'abort';
                                $atributos = "";
                                $stock_dep = "";
                                echo "$p_cod en nota de remision<br>";
                            } else {

                                $dba->Query("select CONCAT('En Nota de Pedido  ', p.nro  ,' Fecha: ',  fecha ,'  ',p.estado, '  ',__suc) as en_pedido from nota_pedido_det d, nota_pedido p where p.nro = d.nro_pedido and  d.codigo = '$p_cod' and p.estado != 'Cerrada' and __locald != 'PR'");
                                if ($dba->NumRows()) {
                                    $dba->NextRecord();
                                    $en_pedidos = $dba->Record['en_pedido'];
                                    $estado = 'carrito0.png';
                                    $img_pedir = 'abort';
                                    $atributos = "";
                                    //$stock_dep .="<tr><td colspan='4'>$p_cod en nota de pedido</td></tr>";
                                    $stock_dep = "";
                                } else {
                                    $estado = 'bien.png';
                                    $img_pedir = 'carrito0';
                                    $atributos = "style='cursor:pointer'   onclick=addToCart($p_cod,$stock_redondeado,'$p_local','$path','1',true) ";
                                }
                            }


                            if ($stock_dep != "") {
                                $stock_dep.="<tr><td>$p_cod</td><td style='text-align:center'>$p_local</td><td>$stock_deposito</td><td style='text-align:center'>  <span id='spanfoto_$p_cod'></span>$foto</td> <td><img src='images/$estado'></td> <td><img $atributos src='images/$img_pedir.png'></td> </tr>";
                                $stock_depositos+=0 + $stock_deposito;
                                $stock_dep.="</table>";
                            }
                        }
                    }
                } else {
                    $stock_dep = "";
                }
            }
            
            if ($stock_dep != "") {
                $cont++;
                $T->Set('stock_dep', $stock_dep);
                $T->Set('query0_stock_deps', number_format($stock_depositos, 1, ',', '.'));
                if ($cont == 1) {
                    $T->Set('remitos', '<td rowspan="200" id="remitos" style="vertical-align:top"></td>');
                } else {
                    $T->Set('remitos', "");
                }
                $T->Show('query0_data_row');
            } else {
                $stock_dep = "";
            }
        }
    }

    //Actualize Old Values Variables
    $old['sector'] = $el['sector'];
    $old['grupo'] = $el['grupo'];
    $old['tipo'] = $el['tipo'];
    $old['cant_min'] = $el['cant_min'];
    $firstRow = false;
}
$T->Set('cant', $cont);
$T->Set('cant_all', $cont_all);
$T->Set('abasto', $cont_all - $cont);
$endConsult = true;
if (true) {
    $T->Show('query0_subtotal_row');
}
// Show total
if (true) {
    $T->Show('query0_total_row');
}
$T->Show('end_query0');    // Ends a Table 
// Buscar Remisiones 
$T->Show('remisiones_cab');

$db = new Y_DB();
$db->Database = 'marijoa';
$dbd = new Y_DB();
$dbd->Database = 'marijoa';
$remitos = "SELECT nro,DATE_FORMAT(fecha,'%d-%m-%Y') AS fecha, __user AS usuario,__locald AS destino FROM nota_pedido WHERE estado = 'Abierta' AND __local = '$suc' order by __locald asc";
$db->Query($remitos);

while ($db->NextRecord()) {
    $nro = $db->Record['nro'];
    $T->Set("nro", $nro);
    $fecha = $db->Record['fecha'];
    $T->Set("fecha", $fecha);
    $usuario = $db->Record['usuario'];
    $T->Set("usuario", $usuario);
    $destino = $db->Record['destino'];
    $T->Set("destino", $destino);
    $T->Show('rtable');
    $dbd->Query("SELECT codigo,p_foto, p_ref FROM nota_pedido_det d, mnt_prod p WHERE p.p_cod = d.codigo AND  nro_pedido = $nro");
    while ($dbd->NextRecord()) {
        $cod = $dbd->Record['codigo'];
        $foto = $dbd->Record['p_foto'];
        $ref = $dbd->Record['p_ref'];
        if ($foto == null) {
            $T->Set("d_src", "images/no-image-mini.png");
        } else {
            $T->Set("d_src", "prod_images/$ref/$foto.jpg");
        }
        $T->Set("d_cod", $cod);
        $T->Show('table_data');
    }
    $T->Show('rtableend');
}


$T->Show('remisiones_data');
$T->Show('remisiones_foot');
?>


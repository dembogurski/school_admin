<?php

/** Report prg file (ins_prod_remi) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */
// THIS IS YOUR FIRST QUERY:
//$query0 = "select 1 as GRUPO_CODIGOS";

$T->Set('time', daytime());
$T->Set('user', $Global['username']);


$codigos = trim($sup['rem_group']);

$T->Show('general_header');   // Principal Header
$T->Show('start_query0');   // Start a Table 
$T->Show('header0');

if ($codigos == "") {
    $T->Set('color', 'red');
    $T->Set('mensaje', "Nada que procesar!!!");
    $T->Show('query0_data_row');
    die();
}

$nro = $sup['rem_nro'];
$origen = $sup['rem_origen'];
$destino = $sup['rem_destino'];

$codigos = str_replace(" ", "\n", $codigos);

$array = explode("\n", $codigos);

$array_limpio = array_unique($array);





$Q0 = $DB;
//$Q0->Query( $query0 );




$db = new Y_DB();
$db->Database = $Global['project'];
$db2 = new Y_DB();
$db2->Database = $Global['project'];



foreach ($array_limpio as $codigo) {
    $cod = trim($codigo);
    $T->Set('query0_GRUPO_CODIGOS', $cod);

    $Q0->Query("SELECT  d.df_cod_prod  as COD FROM nota_remision r, remito_det d WHERE r.rem_nro = d.rem_nro AND r.rem_estado = 'Abierta' AND d.df_cod_prod = '$cod' and r.rem_nro = $nro ");

    if ($Q0->NumRows() > 0) {
        $Q0->NextRecord();
        $CODE = $Q0->Record['COD'];


        $db->Query("SELECT n.nro AS NRO_PEDIDO FROM nota_pedido n, nota_pedido_det d WHERE  n.nro = d.nro_pedido 
                   AND (d.codigo = $CODE OR d.cod_rem = $CODE) AND n.__local = '$destino' AND n.__locald = '$origen' and n.estado != 'Abierta';");
        $msg = "";
        if ($db->NumRows() > 0) {
            $db->NextRecord();
            $nro_pedido = $db->Record['NRO_PEDIDO'];
            $db2->Query("UPDATE nota_pedido_det set estado = 'Enviado'  WHERE nro_pedido = $nro_pedido  AND codigo = $CODE;");
            cambiarEstadoNotaPedido($nro_pedido);
            $msg = "Codigo en contrado y punteado como Enviado en Pedido Nro: $nro_pedido  ($destino --> $origen)";
        }else{
          $msg ="<label style='color:black;font-weight:bolder;'> No se encontro en ninguna Nota de Pedido...</label>";   
        }        

        $T->Set('color', 'green');
        $T->Set('mensaje', "Codigo marcado como enviado...$msg");
    } else {
        $T->Set('color', 'red');
        $T->Set('mensaje', "Codigo No existe o No se encuentra en esta remision...!!!");
    }



    $T->Show('query0_data_row');
}

function cambiarEstadoNotaPedido($nro_nota) {
    $db3 = new Y_DB();
    $db3->Database = $Global['project'];
    $db3->Query("SELECT codigo, estado ,COUNT(*) AS CANT FROM nota_pedido_det  WHERE  nro_pedido = $nro_nota GROUP BY estado;");
    $TOTAL = 0;
    $pendiente = 0;
    $en_proc = 0;
    $enviados = 0;

    while ($db3->NextRecord()) {
        $cant = $db3->Record['CANT'];
        $TOTAL +=0 + $cant;
        $estado = $db3->Record['estado'];
        if ($estado == 'x') {
            $estado = 'Enviado';
        }

        if ($estado == 'En Proceso') {
            $en_proc = $cant;
        } else if ($estado == 'Enviado') {
            $enviados = $cant;
        } else {
            $pendiente = $cant;
        }
    }
    if ($enviados == $TOTAL) {
        $db3->Query("UPDATE nota_pedido  set estado = 'Cerrada'     WHERE nro  = $nro_nota;");
    } else if ($pendiente == $TOTAL) {
        $db3->Query("UPDATE nota_pedido  set estado = 'Pendiente'   WHERE nro  = $nro_nota;");
    } else {
        $db3->Query("UPDATE nota_pedido  set estado = 'En Proceso'  WHERE nro  = $nro_nota;");
    }
}

$T->Show('end_query0');    // Ends a Table 
?>



<?php


class ImpresorFactura{
    
    public $LIMIT = 15;

    function __construct(){}

    function cuerpo($T,$query0,$user,$suc,$parte,$nro_factura,$flag){  

        $T->Set( 'time', daytime() ); 
        
        $Q0 = new Y_DB();
        $Q0->Database = $Global['project']; 
        $Q0->Query( $query0 );
        
        if($flag){
          $this->margenes($T,$user,$suc);
        }
        
        $T->Show('start_header');
                         
        $old['NRO'] = '';
        $old['SUC'] = '';
        $old['CLIENTE'] = '';
        $old['CI'] = '';
        $old['DIR'] = '';
        $old['CIUDAD'] = '';

        $Q0->NextRecord();  

        
        $el['NRO'] = $Q0->Record['NRO'];
        $el['SUC'] = $Q0->Record['SUC'];
        $el['CLIENTE'] = $Q0->Record['CLIENTE'];
        $el['CI'] = $Q0->Record['CI'];
        $el['DIR'] = $Q0->Record['DIR'];
        $el['CIUDAD'] = $Q0->Record['CIUDAD'];
        
        $nro = $el['NRO'];

        // Preparing a template variables
        $T->Set('query0_NRO', $el['NRO']);
        $T->Set('query0_SUC', $el['SUC']);
        $T->Set('query0_CLIENTE', $el['CLIENTE']);
        $T->Set('query0_CI', $el['CI']);
        $T->Set('query0_DIR', $el['DIR']);
        $T->Set('query0_CIUDAD', $el['CIUDAD']);
        $T->Set('parte', $parte);

        $T->Show('query0_data_row');
        $T->Show('cabecera_detalle');
        $this->detalle($T,$nro,$parte,$nro_factura,$this->LIMIT,$flag );
        $T->Show('pie_detalle'); 
        $T->Show('printer_popup');
    }
       
    function detalle($T,$NRO,$PARTE,$NRO_FACTURA,$LIMITE,$flag){

        $INICIO =  ($PARTE * $LIMITE) - $LIMITE;  // Ej.:  12 * 5 = 60 - 12 ==>  LIMIT 48,12

        $Z_SUBTOTAL = 0;

        $db = new Y_DB();
        $db->Database = $Global['project'];
        $db->Query("SELECT df_cod_prod AS CODIGO,df_cantidad AS CANT,upper(df_descrip) AS DESCRIP, df_precio AS PRECIO,df_subtotal AS SUBTOTAL  FROM det_factura WHERE df_fact_num = $NRO LIMIT $INICIO, $LIMITE;"); // Agregar and p_user = '$user' en caso de mas de una impresora x suc
        $filas = $db->NumRows();
        $cont = $LIMITE - $db->NumRows();
        if($filas > 0){
            while($db->NextRecord()){
               $T->Set( 'codigo',  $db->Record['CODIGO']);
               $T->Set( 'cantidad',  $db->Record['CANT']);
               $T->Set( 'descrip',  $db->Record['DESCRIP']);
               $T->Set( 'precio', number_format($db->Record['PRECIO'],0,',','.'));
               $T->Set( 'exentas','&nbsp');
               $T->Set( 'cinco_porc','&nbsp');
               $subtotal = $db->Record['SUBTOTAL'];
               $Z_SUBTOTAL += 0 +$subtotal;
               $T->Set( 'diez_porc',number_format($subtotal,0,',','.'));
               $T->Show('detalle');
           }

           while($cont > 0){
               $T->Show('detalle_vacio');
               $cont--;
           }

           $T->Set( 'total',number_format($Z_SUBTOTAL,0,',','.'));
           $monto_en_letras = extense($Z_SUBTOTAL);
           
           $IVA =  round($Z_SUBTOTAL / 11 );
           $T->Set( 'iva_10',number_format($IVA,0,',','.'));
           $T->Set( 'total_letras',$monto_en_letras);
           
           if($flag){          
             $db->Query("UPDATE fact_cont SET f_ref = $NRO, f_estado = 'Cerrada',f_total = $Z_SUBTOTAL, f_fecha = CURRENT_DATE WHERE f_nro = $NRO_FACTURA;");
           }
                      
        }else{
           $T->Set( 'error', 'No hay nada para imprimir!!!'); $T->Show('error');
           die();
        }
    }

    function margenes($T,$user,$suc){
        $db = new Y_DB();
        $db->Database = $Global['project'];
        $db->Query("SELECT p_user AS USER ,p_top AS SUP ,p_bottom AS INF,p_left AS IZQ, p_right AS DER,p_medium as MEDIO FROM par_parametros WHERE p_suc = '$suc';"); // Agregar and p_user = '$user' en caso de mas de una impresora x suc
        if($db->NumRows()>0){
           $db->NextRecord(); $T->Set( 'margenes',  $db->Record['SUP']."px ".$db->Record['DER']."px ".$db->Record['INF']."px ".$db->Record['IZQ']."px;" );
           return $db->Record['MEDIO'];
        }else{
           $T->Set( 'error', 'Debe configurar parametros de impresion, favor contacte con el Administrador!!!'); $T->Show('error');
           die();
        }
    }

}
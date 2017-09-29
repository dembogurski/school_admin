

<?php


class ImpresorFactura{
    
    public $LIMIT = 15;

    function __construct(){ }
    
    function setLimit($LIMIT = 15){
       $this->LIMIT = $LIMIT;
    }

    function cuerpo($T,$query0,$user,$suc,$parte,$nro_factura,$tipo,$flag){  

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
		$el['DIPCI']= $Q0->Record['DIPCI'];
        $el['DIR'] = $Q0->Record['DIR'];
        $el['CIUDAD'] = $Q0->Record['CIUDAD'];
        $diplomatico = (trim($el['DIPCI']!='')); 
        
        $nro = $el['NRO'];

        // Preparing a template variables
        $T->Set('query0_NRO', $el['NRO']);
        $T->Set('query0_SUC', $el['SUC']);
        $T->Set('query0_CLIENTE', str_replace("NH","&Ntilde;",strtoupper($el['CLIENTE'])));
		$T->Set('read_only',(preg_match_all("/nh/i", $el['CLIENTE'], $matches)>0)?"":'readonly="readonly" ');
        $T->Set('query0_CI',  ($diplomatico)?$el['DIPCI']:$el['CI']);
        $T->Set('query0_DIR', str_replace("NH","&Ntilde;",strtoupper($el['DIR'])));
        $T->Set('query0_CIUDAD', str_replace("NH","&Ntilde;",strtoupper($el['CIUDAD'])));
        $T->Set('parte', $parte);

        $T->Show('query0_data_row');
        $T->Show('cabecera_detalle');		
        $this->detalle($T,$nro,$parte,$nro_factura,$this->LIMIT,$tipo,$flag,$suc,$diplomatico,$exenta);
        $T->Show('pie_detalle'); 
        $T->Show('printer_popup');
    }
       
    function detalle($T,$NRO,$PARTE,$NRO_FACTURA,$LIMITE,$TIPO,$flag,$suc,$diplomatico,$es_exenta){
        $INICIO =  ($PARTE * $LIMITE) - $LIMITE;  // Ej.:  15 * 5 = 75 - 15 ==>  LIMIT 60,15

		
        $Z_SUBTOTAL = 0;

        $db = new Y_DB();
        $db->Database = $Global['project'];
        
        $sql = "SELECT df_cod_prod AS CODIGO,df_cantidad AS CANT,upper(df_descrip) AS DESCRIP, df_precio AS PRECIO,df_subtotal AS SUBTOTAL  FROM det_factura WHERE df_fact_num = $NRO order by df_cod_prod asc LIMIT $INICIO, $LIMITE;";
        $db->Query($sql); // Agregar and p_user = '$user' en caso de mas de una impresora x suc
        
        $filas = $db->NumRows();
        $cont = 15 - $db->NumRows(); // 15 es el Numero de lineas que entra en una factura
        if($filas > 0){
            while($db->NextRecord()){
               $T->Set( 'codigo',  $db->Record['CODIGO']);
               $T->Set( 'cantidad',  $db->Record['CANT']);
               $T->Set( 'descrip',  $db->Record['DESCRIP']);
               $T->Set( 'precio', number_format($db->Record['PRECIO'],0,',','.'));
			   $subtotal = $db->Record['SUBTOTAL'];
               $Z_SUBTOTAL += 0 +$subtotal;
               $T->Set( 'exentas',($diplomatico)?(number_format($subtotal,0,',','.')):'&nbsp');
               $T->Set( 'cinco_porc','&nbsp');               
               $T->Set( 'diez_porc',($diplomatico)?'&nbsp':(number_format($subtotal,0,',','.')));
               $T->Show('detalle');
           }

           while($cont > 0){
               $T->Show('detalle_vacio');
               $cont--;
           }
           $T->Set( 'total',($diplomatico)?'&nbsp;':(number_format($Z_SUBTOTAL,0,',','.')));
           $T->Set( 'total_exenta',($diplomatico)?(number_format($Z_SUBTOTAL,0,',','.')):'&nbsp;');
           $T->Set( 'total_pagar',number_format($Z_SUBTOTAL,0,',','.'));
           $redondeado = number_format($Z_SUBTOTAL,0,',','');
         
           $monto_en_letras = extense($redondeado);
             
           $IVA =  $diplomatico?0:round($Z_SUBTOTAL / 11 );
           $T->Set( 'iva_10',number_format($IVA,0,',','.'));
           $T->Set( 'total_letras',$monto_en_letras);
           
           if($flag){   
             // Anulo las facturas anteriormente impresas si no tiene mas de 15 Itmes
        
            $db->Query( "SELECT COUNT(*) AS items FROM det_factura WHERE df_fact_num = $NRO");
            $db->NextRecord();
            $items = $db->Record['items'];
            if($items < 15){ // 15 Entran en una Factura si hay < 15 items ya se puede Anular la anteriormente impresa
               $db->Query( "UPDATE fact_cont set f_estado = 'Anulada', f_mot_anul = 'Anulada x Sistema Reimpresion sobre $NRO_FACTURA' WHERE f_suc = '$suc' and f_ref = '$NRO' "); 
            }  
               
             $db->Query("UPDATE fact_cont SET f_ref = $NRO, f_estado = 'Cerrada',f_total = $Z_SUBTOTAL, f_fecha = CURRENT_DATE, f_tipo = '$TIPO' WHERE f_nro = $NRO_FACTURA and f_suc = '$suc';");
           }
                      
        }else{
           $T->Set( 'error', 'No hay nada para imprimir!!!'); $T->Show('error');
           die();
        }
    }

    function margenes($T,$user,$suc){
        $db = new Y_DB();
        $db->Database = $Global['project'];
        
        $db->Query("SELECT p_user AS USER ,p_top AS SUP ,p_bottom AS INF,p_left AS IZQ, p_right AS DER,p_medium as MEDIO FROM par_parametros WHERE p_suc = '$suc' and  p_user = '$user';"); // Agregar and p_user = '$user' en caso de mas de una impresora x suc
        if($db->NumRows()>0){
           $db->NextRecord(); $T->Set( 'margenes',  $db->Record['SUP']."px ".$db->Record['DER']."px ".$db->Record['INF']."px ".$db->Record['IZQ']."px;" );
           return $db->Record['MEDIO'];
        }else{  
            // Si no hay para este usuario busca al menos uno de la sucursal
            $db->Query("SELECT p_user AS USER ,p_top AS SUP ,p_bottom AS INF,p_left AS IZQ, p_right AS DER,p_medium as MEDIO FROM par_parametros WHERE p_suc = '$suc' limit 1 ;");
            if($db->NumRows()>0){
               $db->NextRecord(); $T->Set( 'margenes',  $db->Record['SUP']."px ".$db->Record['DER']."px ".$db->Record['INF']."px ".$db->Record['IZQ']."px;" );
               return $db->Record['MEDIO'];
            }else{
              $T->Set( 'error', 'Debe configurar parametros de impresion, favor contacte con el Administrador!!!'); $T->Show('error');
              die();
            }
        }
    }

}
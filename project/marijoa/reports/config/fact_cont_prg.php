<?php
 
/*
$T->Set( 'sup_fact_localidad', '02');
$T->Set( 'sup_func_nombre', 'Yunis Afara, Ricardo Nayib');
$T->Set( 'sup_fact_estado', 'En_caja');
$T->Set( 'sup_fact_tipo', ' ');

$T->Set( 'sup_fact_moneda', '');
$T->Set( 'sup_fact_cotiz', '1');
 */
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "SELECT f.fact_nro AS NRO,f.fact_localidad AS SUC, f.fact_nom_cli AS CLIENTE, f.fact_cli_ci AS CI, C.cli_dir AS DIR, c.ciudad AS CIUDAD  FROM factura f, mnt_cli c   WHERE f.fact_cli_ci = c.cli_ci AND f.fact_nro = '823276' ";
require_once("barcodegen/RadPlusBarcodeNoFont128.php");
require_once("ImpresorFactura.class.php");
        
        $LIMIT = 15;
        
        $user = $Global['username']; 
        $NRO = $sup['fact_nro'];
        $T->Set( 'user', $user );
        
        $dia_hoy = date("d");
        $este_mes = date("m");
        $este_anio = date("Y");
        $meses = array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio",
                    "08"=>"Agosto","09"=>"Setiembre","10"=>"Octubre","11"=>"Noviembre","12"=>"Diciembre");

        
        $T->Set('dia_hoy',$dia_hoy);
        $T->Set('este_anio',$este_anio);
        $T->Set('este_mes',$meses[$este_mes]);

        $suc = $sup['fact_localidad'];
        $T->Set( 'suc', $suc );
        $parte = $sup['fact_parte'];


        $vendedor = $sup['func_nombre'];
        $T->Set( 'vendedor', $vendedor );
        $filename = new RadPlusBarcode();
        $code = $filename->parseCode($sup['fact_nro']); 
        $T->Set( 'ref', "<img src='$code' />" );
        $nro_factura = $sup['fact_cont'];
        
       
        
        $Q0 = new Y_DB();
        $Q0->Database = $Global['project']; 
        
        $Q0->Query("SELECT COUNT(*) AS cant FROM det_factura WHERE df_fact_num = $NRO");
        if($Q0->NumRows() > 0){
            $Q0->NextRecord();
            $cant = $Q0->Record['cant'];  
            if($cant == 16 || $cant == 31){ 
                $LIMIT = 14;
            }
        }
        
         
        $tipo = $sup['fact_tipo'];  
        
        if($sup['fact_tipo']=='Contado'){
           $T->Set( 'contado','X');$T->Set( 'credito','&nbsp;&nbsp;');
        }else{
           $T->Set( 'contado','&nbsp;&nbsp;');$T->Set( 'credito','X');
        }
       

        $T->Show('general_header');			// Principal Header 
        
        $Q0->Query( "SELECT f_estado AS ESTADO FROM fact_cont WHERE f_nro = $nro_factura and f_suc = '$suc'  ORDER BY id DESC LIMIT 1;" );
        if($Q0->NumRows()>0){
            $T->Set('nro_factura',$nro_factura);
            
           $Q0->NextRecord(); 
           $estado_factura = $Q0->Record['ESTADO'];
           if($estado_factura==='Cerrada'){
              $T->Set( 'error', 'La Factura N&deg;: "'.$nro_factura.'" ya ha sido Impresa! , Favor elija otra y vuelva a intentarlo!!!'); $T->Show('error'); 
              $T->Show('start_marco');
             $T->Show('anular');
              $T->Show('habilitar');
             
              die(); 
           }if($estado_factura==='Anulada'){
              $T->Set( 'error', 'Esta Factura ha sido Anulada! , Favor elija otra y vuelva a intentarlo!!!'); $T->Show('error');
              $T->Show('habilitar');
              die();  
           }
        }
        
 
        $imp = new ImpresorFactura();
        $imp->setLimit($LIMIT);
        $medio =  $imp->margenes($T,$user,$suc);
        $T->Set('id_nombre_cliente','primer_nombre');
		$T->Set('id_fecha','1ra_fecha');
		
        $T->Set('id_ci','primer_ci');
        $T->Show('start_marco');			// Start a Table
        
        $imp->cuerpo($T,$query0,$user,$suc,$parte,$nro_factura,$tipo,true);
         
        $T->Set( 'medio',$medio.'px');
        $T->Show('medio');			// 
        $T->Set('id_nombre_cliente','segundo_nombre'); 
		$T->Set('id_fecha','2da_fecha');
        $T->Set('id_ci','segundo_ci');
        $imp = new ImpresorFactura();
        $imp->setLimit($LIMIT);
        $imp->cuerpo($T,$query0,$user,$suc,$parte,$nro_factura,$tipo,false);


        //$monto_en_letras = extense($el['MONTO']);
        
        $T->Show('end_marco');
        
        
        

				// Ends a Table
  

?>

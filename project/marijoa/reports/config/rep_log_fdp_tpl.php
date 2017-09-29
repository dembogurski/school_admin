<!-- 
    Report Template File (rep_log_fdp)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
        <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
	<treset_page>
            
            <style type="text/css">
                .nom{
                    border: solid 1px;
                    text-align: center;    
                    padding: 4px;
                    margin: 4px;
                    font-weight: bolder;
                }
				#totCod{
					background:lightBlue none repeat scroll 0;
					padding:1px 7px;
					position:absolute;					
					top:100px;
					right:10px;
					-webkit-border-radius: 6px;
					-moz-border-radius: 6px;
					border-radius: 6px;
				}
            </style>    
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 100%;" border="1"cellpadding="0" cellspacing="0">
    <tbody>
    
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="2" cellspacing="0">
	  <tbody>
		<tr>
                    <td style="width: 184px;alignment-adjust: center"><small><i>Douglas</i></small> </td>
		  <td style="text-align: center;">
			<b>Marijoa</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td>
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Reporte de Finalizaciones de Piezas</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr>
                    <th colspan="3">Periodo: {desde}<-->{hasta}</th>
                </tr>
	  </tbody>
	</table> 
</td></tr>
    </tbody>
</table>
<br>
<div>
    <label class="nom" style="background-color: #FF6600">Codigo con Fin de Pieza</label> &nbsp;
    <label class="nom" style="background-color: #FFCC00">Ajustes</label> &nbsp;
    <label class="nom" style="background-color: #00CC00">Remisiones</label>&nbsp;
    <label class="nom" style="background-color: #0099FF">Ventas</label>&nbsp;
     
</div>
<br>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
<table style="text-align: left; width: 100%;" border="1" cellpadding="0" cellspacing="0">
    <tr style="background-color: #FF6600">
        <th>CODIGO</th>
        <th>USUARIO</th>
        <th>SUC</th>
        <th>FECHA</th>
        <th>HORA</th>
        <th>DESCRIP</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th>C.INI</th>
        <th>STOCK.F</th>
        <th>COSTO</th>
    </tr>



<!-- end:   header0 -->

<!-- begin: query0_data_row -->
       <tr>
            <td class="item">{query0_CODIGO}</td>
            <td class="item">{query0_USUARIO}</td>
            <td class="itemc">{query0_SUC}</td>
            <td class="itemc">{query0_FECHA}</td>
            <td class="itemc">{query0_HORA}</td>
            <td class="item">{query0_DESCRIP}</td>
            <td class="item">{query0_GRUPO}</td>
            <td class="item">{query0_TIPO}</td>
            <td class="num">{query0_C_INI}</td>
            <td class="num">{query0_STOCK}</td> 
            <td class="num">{query0_COSTO}</td> 
        </tr>
</table>        
<!-- end:    query0_data_row -->


<!-- begin: history_h --> 
    <table cellpadding="0" cellspacing="0" border="1" style="width: 50%" > 
        <tr>  <th colspan="4" style="background:#0099FF ">Ventas en {suc}</th>   </tr>
                   <tr><th>Factura</th><th>Suc</th><th>Fecha</th><th>Cantidad</th>  </tr>  
<!-- end:    history_h -->

<!-- begin: history_data -->
            <tr>
                <td class="item">{factura}</td> <td class="itemc">{suc}</td> <td class="itemc">{fecha}</td> <td  class="num">{cant}</td> 
            </tr>                
         
<!-- end:    history_data -->

<!-- begin: history_f -->
              </table>
 
<!-- end:    history_f -->
 

<!-- begin: ajustes_h -->
  
               <table cellpadding="0" cellspacing="0" border="1" style="width: 90%;" > 
                   <tr style="background-color: #FFCC00">  <th colspan="9">Ajustes en {suc}</th>  </tr> 
                   <tr>   <th>Suc</th><th>Fecha</th><th>Hora</th><th>Usuario</th>   <th>C.Ini</th><th>Ajuste</th><th>C.Final</th><th>Motivo</th><th>Verificador</th> </tr>
<!-- end:    ajustes_h -->

<!-- begin: ajustes_data -->
            <tr>
                <td class="itemc">{aj_suc}</td> <td class="itemc">{fecha}</td> <td class="itemc">{aj_hora}</td> <td class="item">{aj_usuario}</td>  <td  class="num">{aj_inicial}</td>  <td class="num">{aj_ajuste}</td>  <td class="num">{aj_final}</td>   <td  class="item">{aj_motivo}</td> <td class="itemc">{aj_verificador}</td> 
            </tr>          
         
<!-- end:    ajustes_data -->

<!-- begin: ajustes_f -->
              </table>
 
<!-- end:    ajustes_f -->



<!-- begin: traslados_h -->
 
               <table cellpadding="0" cellspacing="0" border="1" style="width: 100%" > 
                   <tr>  <th colspan="6" style="background: #00CC00">Remisiones</th> <!-- <th style="width: 25%;background: #0099FF" rowspan="2"  >Ventas</th>  <th  rowspan="2" style="width: 55%;background: #FFCC00" >Ajustes</th>   </tr> -->
                   <tr><th>N&deg;</th><th>Fecha</th><th>Origen</th><th>Destino</th><th>Receptor</th><th title="Cantidad Recibida">Cant. Rec</th>  </tr>  
<!-- end:    traslados_h -->

<!-- begin: traslados_data -->
            <tr>
                <td class="itemc" style="vertical-align: top">{rem_nro}</td> <td class="itemc" style="vertical-align: top">{fecha}</td> <td class="itemc" style="vertical-align: top">{origen}</td><td class="itemc" style="vertical-align: top">{destino}</td> <td class="item" style="vertical-align: top">{receptor}</td> <td class="num" style="vertical-align: top">{cant_recib}</td><td style="vertical-align: top">{ventas}</td><td style="vertical-align: top">{ajustes}</td>  
            </tr>                
         
<!-- end:    traslados_data -->

<!-- begin: traslados_f -->
              </table> <br><br>
<!-- end:    traslados_f -->


<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>  <td></td> <td></td> <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
<div id="totCod">{tot_cod} C&oacute;digos Procesados.</div>
<!-- end:   end_query0 -->
 


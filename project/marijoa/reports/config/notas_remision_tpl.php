<!-- 
    Report Template File (notas_remision)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>
     <style>

    tr{
       font-size:14px;
    }
    tr>td{
        padding-left:3px;
        padding-right:3px;
    }
    th{
       font-size:13px;
       font-weight:bolder;
       text-align:center;
    }
    .num{
      text-align:right;
      padding-right:3px;
    }

    </style>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="1"cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td style="width: 184px;"> </td>
		  <td style="text-align: center;">
			<b>Marijoa</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td>
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big style="font-weight: bold;"> Reporte de Remisiones  </big>  </td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>

        <tr>  <td align="center" colspan="3">De: &nbsp;<b>{sup_suco}</b>  &nbsp;&nbsp;&nbsp; a &nbsp;&nbsp;&nbsp; <b>{sup_sucd}</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Periodo:  {data_ini} <-> {data_fin} &nbsp;&nbsp;&nbsp;&nbsp; </b>  <small> Ctrl + (+) Zoom (+) &nbsp;&nbsp;  Ctrl + (-) Zoom (-)  &nbsp;&nbsp;  Ctrl + (Rueda mouse)  </small> </td> </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr class="cabecera">
        <th>NRO</th>
        <th>FECHA</th>
        <th>{CODIGO_CANTIDAD}</th>
        <th colspan="2" >DESCRIP</th>
        <th style="text-align: right;">CANTIDAD</th>
        <th style="text-align: center;" >RECIBIDO</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
          <tr class="celda">
            <td>{query0_NRO}</td>
            <td>{query0_FECHA}</td>
            <td>{query0_CODIGO}</td>
            <td colspan="2" >{query0_DESCRIP}</td>
            <td style="text-align: right;">{query0_CANTIDAD}</td>
            <td  style="text-align: center;" >{query0_RECIBIDO}</td>
          </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr style="font-weight:bolder">  
            <td colspan="2">Cantidad de Piezas: {total}</td>

            <td colspan="4">Total Metros remitidos:&nbsp;&nbsp; {total0_CANTIDAD}
            
            &nbsp;&nbsp;{nomenclatura1}&nbsp;&nbsp;{METROS_VENDIDOS}&nbsp;&nbsp;&nbsp;
            {nomenclatura2}&nbsp;&nbsp; {PORC_TOTAL_VENTAS}%</td>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr style="background:#CCFF00;">
            <td>&nbsp;{_query0_NRO}</td>
            <td>&nbsp;{_query0_FECHA}</td>
            <td colspan="2" align="left"><b> {semitot} piezas </b>  </td>
            <td ></td>
            <td style="text-align: right;"><b>{subtotal0_CANTIDAD}</b></td>
             <td ></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->










<!-- begin: ventas_cab -->
        <tr style="font-size:12px;font-weight:bolder;background:#CCCC99;">
            <td align="center">Factura&nbsp; / &nbsp;Fecha</td>
		    
            <td align="center">Precio</td>
            <td align="center">Cantidad</td>
            <td align="center" style="width:100px">Subtotal</td>
        </tr>
<!-- end:    ventas_cab -->
<!-- begin: ventas -->
        <tr style="font-size:11px;background:#FFFFCC;">
            <td>{df_fact_num}&nbsp; / &nbsp;{fecha}</td>
			 
            <td align="right">{precio}</td>
            <td align="right" style="width:80px">{df_cantidad}</td>
            <td align="right" style="width:100px">{df_subtotal}</td>
            <td style="background:white;"></td>
            <td style="background:white;"></td>
            <td style="background:white;"></td>
        </tr>
<!-- end:  ventas -->
<!-- begin: ventas_total -->
        <tr style="font-size:12px;font-weight:bolder;background:lightgray;" >
            <td align="right" colspan="2">Totales:</td>
            <td align="right">{Z_CANTIDAD}</td>
            <td align="right">{Z_SUBTOTAL}</td>
            <td>&nbsp;&nbsp;Porcentaje de Ventas sobre Pedido:&nbsp;&nbsp;{porc_ventas}&nbsp;%</td>
        </tr>
        
<!-- end:    ventas_total -->





<!-- 
    Report Template File (control_pedidos)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header -->
	<treset_page>
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
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Control de Pedidos Despachados</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
        <tr> <td>  </td> <td align="center" ><b>Periodo:&nbsp;&nbsp; {sup_desde}&nbsp;&nbsp;-&nbsp;&nbsp;{sup_hasta} </b> </td> </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr style="font-size:13px;"> 
        <th>NRO</th>
        <th>CODIGO</th>
        <th>USUARIO</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th>COLOR</th>
        <th>CANT</th>
        <th>PRECIO</th>
        <th>ESTADO</th>
        <th>PROV</th>       
        
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr style="font-size:12px;">
            <td>{query0_NRO}</td>
            <td>{query0_CODIGO}</td>
            <td>{query0_USUARIO}</td>
            <td>{query0_GRUPO}</td>
            <td>{query0_TIPO}</td>
            <td>{query0_COLOR}</td>
            <td>{query0_CANT}</td>
            <td>{query0_PRECIO}</td>
            <td>{query0_ESTADO}</td>
            <td>{query0_PROV}</td>
            
         </tr>
         {obs}
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>          
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr> 
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>             
            <td></td>           
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


<!-- begin: ventas_cab -->
        <tr style="font-size:12px;font-weight:bolder;background:#CCCC99;">
            <td align="center">Factura</td>
            <td align="center">Precio</td>
            <td align="center">Cantidad</td>
            <td align="center">Subtotal</td>
        </tr>
<!-- end:    ventas_cab -->
<!-- begin: ventas -->
        <tr style="font-size:11px;background:#FFFFCC;">
            <td>{df_fact_num}</td>
            <td align="right">{precio}</td>
            <td align="right">{df_cantidad}</td>
            <td align="right">{df_subtotal}</td>
        </tr>
<!-- end:  ventas -->
<!-- begin: ventas_total -->
        <tr style="font-size:12px;font-weight:bolder;background:lightgray;">
            <td align="right" colspan="2">Totales:</td>
            <td align="right">{Z_CANTIDAD}</td>
            <td align="right">{Z_SUBTOTAL}</td>
        </tr>
        <tr><td colspan="4">&nbsp;</td> </tr>
<!-- end:    ventas_total -->


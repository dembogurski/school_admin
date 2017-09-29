<!-- 
    Report Template File (rep_prod_exist)

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
	<table style="text-align: left; width: 99%;" border="0"
	 cellpadding="0" cellspacing="2">
	  <tbody>
		<tr>
		  <td style="width: 184px;"> </td>
		  <td style="text-align: center;">
			<b>marijoa</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td>
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Reporte de existencia actual de productos</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>CODIGO</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th>COLOR</th>
        <th style="text-align: right;">STOCK_ACTUAL</th>
        <th style="text-align: right;">VALOR_AL_COSTO</th>
        <th style="text-align: right;">{VALOR_VENTA_1}</th>
        <th style="text-align: right;">{VALOR_VENTA_2}</th>
        <th style="text-align: right;">{VALOR_VENTA_3}</th>
        <th style="text-align: right;">{VALOR_VENTA_4}</th>
        <th style="text-align: right;">{VALOR_VENTA_5}</th>
        <th style="text-align: right;">PRECIO_1</th> 
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>
            <td>{query0_CODIGO}</td>
            <td>{query0_GRUPO}</td>
            <td>{query0_TIPO}</td>
            <td>{query0_COLOR}</td>
            <td style="text-align: right;">{query0_STOCK_ACTUAL}</td>
            <td style="text-align: right;">{query0_VALOR_AL_COSTO}</td>
            <td style="text-align: right;">{query0_VALOR_VENTA_1}</td>
            <td style="text-align: right;">{query0_VALOR_VENTA_2}</td>
            <td style="text-align: right;">{query0_VALOR_VENTA_3}</td>
            <td style="text-align: right;">{query0_VALOR_VENTA_4}</td>
            <td style="text-align: right;">{query0_VALOR_VENTA_5}</td>
            <td style="text-align: right;">{query0_PRECIO_1}</td>
        </div> </tr>
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
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td><b>Cantidad : {contador}</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_STOCK_ACTUAL}</b></td>
            <td style="text-align: right;"><b>{subtotal0_VALOR_AL_COSTO}</b></td>
            <td style="text-align: right;"><b>{subtotal0_VALOR_VENTA_1}</b></td>
            <td style="text-align: right;"><b>{subtotal0_VALOR_VENTA_2}</b></td>
            <td style="text-align: right;"><b>{subtotal0_VALOR_VENTA_3}</b></td>
            <td style="text-align: right;"><b>{subtotal0_VALOR_VENTA_4}</b></td>
            <td style="text-align: right;"><b>{subtotal0_VALOR_VENTA_5}</b></td>
            <td style="text-align: right;"><b>{subtotal0_PRECIO_1}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


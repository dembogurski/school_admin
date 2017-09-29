<!-- 
    Report Template File (mov_x_venta_pro)

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
			<b>Marijoa</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td>
			<small><small>ycube plus RAD [1.2.30b]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Movimientos por ventas de productos</big></td>
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
        <th style="text-align: center;">FACTURA</th>
        <th style="text-align: center;">FECHA</th>
        <th style="text-align: center;">SUC</th>
        <th style="text-align: center;">VENDEDOR</th>
        <th style="text-align: center;">CANTIDAD</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td style="text-align: center;">{query0_FACTURA}</td>
            <td style="text-align: center;">{query0_FECHA}</td>
            <td style="text-align: center;">{query0_SUC}</td>
            <td style="text-align: center;">{query0_VENDEDOR}</td>
            <td style="text-align: center;">{query0_CANTIDAD}</td>
        </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
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
            <td style="text-align: center;"><b> TOTAL :  {subtotal0_CANTIDAD}  </b> </td>
            <td><b> Devoluciones: {DEVOL}</b></td>
            <td><b> TOTAL - DEVOLUCIONES: {LIQUIDO}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


<!-- 
    Report Template File (cuotas_convenio)

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
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td style="width: 184px;">Nº  {impresion} </td>
		  <td style="text-align: center;">
			<b>Marijoa</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td>
			<small><small>ycube plus RAD [1.2.21]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Reporte de Ventas con Convenios (Cuotas) {sup_con_nombre}</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time} -- {impresion}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>FACTURA</th>
        <th>Nro_CUOTA</th>
        <th>FECHA_VENC</th>
        <th style="text-align: right;">MONTO</th>
        <th style="text-align: right;">DESCUENTO</th>
        <th style="text-align: right;">TOTAL_SIN_DESCUENTO</th>
        <th>CLIENTE</th>
        <th>Nro_ORDEN</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>
            <td>{query0_FACTURA}</td>
            <td>{query0_Nro_CUOTA}</td>
            <td>{query0_FECHA_VENC}</td>
            <td style="text-align: right;">{query0_MONTO}</td>
            <td style="text-align: right;">{query0_DESCUENTO}</td>
            <td style="text-align: right;">{query0_TOTAL_SIN_DESCUENTO}</td>
            <td>{query0_CLIENTE}</td>
            <td>{query0_Nro_ORDEN}</td>
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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_MONTO}</b></td>
            <td style="text-align: right;"><b>{subtotal0_DESCUENTO}</b></td>
            <td style="text-align: right;"><b>{subtotal0_TOTAL_SIN_DESCUENTO}</b></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


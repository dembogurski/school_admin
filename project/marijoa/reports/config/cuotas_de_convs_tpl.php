<!-- 
    Report Template File (cuotas_de_convs)

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
	<table style="text-align: left; width: 100%;" border="0"
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
			style="font-weight: bold;"><b>Cuotas de Ventas con Convenios  (Entre: {desde} y {hasta}) <br>{conv}</b></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th style="text-align: center;">FACTURA</th>
        <th style="text-align: center;">NRO_ORDEN</th>
        <th style="text-align: center;">NRO_CUOTA</th>
        <th style="text-align: center;">FECHA_VENC</th>
        <th style="text-align: right;">MONTO</th>
        <th style="text-align: center;">DESCUENTO</th>
        <th style="text-align: right;">TOTAL</th>
        <th style="text-align: center;">ESTADO</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>
            <td style="text-align: center;">{query0_FACTURA}</td>
	      <td style="text-align: center;">{query0_NRO_ORDEN}</td>
            <td style="text-align: center;">{query0_NRO_CUOTA}</td>
	
            <td style="text-align: center;">{query0_FECHA_VENC}</td>
            <td style="text-align: right;">{query0_MONTO}</td>
            <td style="text-align: center;">{query0_DESCUENTO}</td>
            <td style="text-align: right;">{query0_TOTAL}</td>
            <td style="text-align: center;">{query0_ESTADO}</td>
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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td><td></td>
            <td style="text-align: right;"><b>{subtotal0_MONTO}</b></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_TOTAL}</b></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


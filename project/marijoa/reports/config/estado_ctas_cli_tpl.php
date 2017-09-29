<!-- 
    Report Template File (estado_ctas_cli)

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
			style="font-weight: bold;"><big>Estado de Cuenta de Clientes &nbsp;  {sup_fecha_inv}&nbsp;&nbsp;-&nbsp;&nbsp;{sup_fecha_inva}</big></td>
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
        <th>CLIENTE</th>
        <th>FACTURA</th>
		<th>SUC</th>
        <th>NRO</th>
		<th>FECHA EMISION</th>
        <th>FECHA VTO.</th>
        <th style="text-align: right;">MONTO</th>
        <th style="text-align: right;">MONTO_ENTREGA</th>
        <th>ESTADO</th>
        <th style="text-align: right;">RESTANTE</th>
        <th style="text-align: right;">LIM. CREDITO </th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr style="background-color:{back};font-size:11px;">
            <td>{query0_CLIENTE}</td>
            <td>{query0_FACTURA}</td>
			 <td style="text-align: center;">{query0_LOCAL}</td>
            <td style="text-align: center;">{query0_NRO_CTA}</td>
			<td style="text-align: center;">{query0_EMISION}</td>
            <td style="text-align: center;">{query0_VENCIMIENTO}</td>
            <td style="text-align: right;">{query0_MONTO}</td>
            <td style="text-align: right;">{query0_MONTO_ENTREGA}</td>
            <td>{query0_ESTADO}</td>
            <td style="text-align: right;">{query0_RESTANTE}</td>
            <td style="text-align: right;">{limite}</td>
        </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr style="background-color:lightgray;font-size:12px;">
            <td></td>
            <td></td> <td></td>
            <td></td>
			<td></td>
            <td></td>
            <td style="text-align: right;"><b>{total0_MONTO}</b></td>
            <td style="text-align: right;"><b>{total0_MONTO_ENTREGA}</b></td>
            <td></td>
            <td style="text-align: right;"><b>{total0_RESTANTE}</b></td>
             <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr style="background-color:lightgray;font-size:12px;">
            <td></td>
            <td></td> <td></td>
            <td></td>
            <td></td><td></td>
            <td style="text-align: right;"><b>{subtotal0_MONTO}</b></td>
            <td style="text-align: right;"><b>{subtotal0_MONTO_ENTREGA}</b></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_RESTANTE}</b></td>
             <td></td>
        </tr>
		<tr colspan="8" style="height:20px" > <td> </td> </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


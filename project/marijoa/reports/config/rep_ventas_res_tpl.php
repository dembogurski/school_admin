<!-- 
    Report Template File (rep_ventas_res)

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
			style="font-weight: bold;"><big>Reporte de Ventas Simplificado&nbsp; &nbsp;[{sup_rep_localidad}]</big></td>
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
        <th>Nro</th>
        <th>FECHA</th>
        <th>LUGAR</th>
        <th>CLIENTE</th>
        <th>CATEGORIA</th>
        <th>VENDEDOR</th>
        <th style="text-align: right;">COMISION</th>
        <th>TIPO</th>
        <th style="text-align: right;">TOTAL</th>
        <th style="text-align: right;">MARGEN</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>
            <td>{query0_Nro}</td>
            <td>{query0_FECHA}</td>
            <td>{query0_LUGAR}</td>
            <td>{query0_CLIENTE}</td>
            <td>{query0_CATEGORIA}</td>
            <td>{query0_VENDEDOR}</td>
            <td style="text-align: right;">{query0_COMISION}</td>
            <td>{query0_TIPO}</td>
            <td style="text-align: right;">{query0_TOTAL}</td>
            <td style="text-align: right;">{query0_MARGEN}</td>
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
            <td style="text-align: right;"><b>{subtotal0_COMISION}</b></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_TOTAL}</b></td>
            <td style="text-align: right;"><b>{subtotal0_MARGEN}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


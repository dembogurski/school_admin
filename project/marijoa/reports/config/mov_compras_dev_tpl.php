<!-- 
    Report Template File (mov_compras_dev)

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
			style="font-weight: bold;"><big>Devoluciones de Compra [{sup_c_n_prov}]</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
		<tr > <td> </td>  <td>Factura: {sup_c_factura} &nbsp; &nbsp; Fecha Factura: {sup_c_fechafac}</td> </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>REF</th>
        <th>FECHA</th>
        <th>COD</th>
        <th>MOTIVO</th>
        <th>USUARIO</th>
        <th>CANT</th>
        <th>PRECIO</th>
        <th style="text-align: right;">VALOR </th>
        <th style="text-align: right;">VALOR</th>
        <th>ARTICULO</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr style="font-size:14px;">
            <td>{query0_REF}</td>
            <td>{query0_FECHA}</td>
            <td>{query0_COD}</td>
            <td>{query0_MOTIVO}</td>
            <td>{query0_USUARIO}</td>
            <td>{query0_CANT}</td>
            <td>{query0_PRECIO}</td>
            <td style="text-align: right;">{query0_VALOR_MON}</td>
            <td style="text-align: right;">{query0_VALOR}</td>
            <td>{query0_COMB}</td>
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
            <td></td>
            <td><b>TOTAL: </b> </td>
            <td style="text-align: right;"><b>{subtotal0_VALOR}</b></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


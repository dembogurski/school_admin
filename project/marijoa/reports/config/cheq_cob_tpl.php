<!-- 
    Report Template File (cheq_cob)

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
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Cheques de terceros por cobrar Sucursal {suc}</big></td>
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
        <th>NUMERO</th>
        <th>CUENTA</th>
        <th>BANCO</th>
        <th>FECHA_EMISION</th>
        <th>FECHA_PAGO</th>
        <th>VALOR</th>
        <th style="text-align: right;">MONEDA</th>
        <th>COTIZ</th>
        <th style="text-align: right;">MONEDA_REF</th>
        <th>NOMBRE_DE</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>
            <td>{query0_NUMERO}</td>
            <td>{query0_CUENTA}</td>
            <td>{query0_BANCO}</td>
            <td style="text-align: center;">{query0_FECHA_EMISION}</td>
            <td style="text-align: center;">{query0_FECHA_PAGO}</td>
            <td style="text-align: right;">{query0_VALOR}</td>
            <td style="text-align: center;">{query0_MONEDA}</td>
            <td style="text-align: right;">{query0_COTIZ}</td>
            <td style="text-align: right;">{query0_MONEDA_REF}</td>
            <td>{query0_NOMBRE_DE}</td>
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
            <td style="text-align: right;"><b>{subtotal0_MONEDA}</b></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_MONEDA_REF}</b></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


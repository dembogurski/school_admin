<!-- 
    Report Template File (prod_undef)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
        <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
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
			style="font-weight: bold;"><big>Reporte de Productos Indefinidos  &nbsp;&nbsp;Suc: {sup_p_local}</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr> <th colspan="3" align="center"><b> <i> Periodo: &nbsp; {desde} - {hasta} </i> </b> </th> </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>VENDEDOR</th>
        <th>FECHA</th>
        <th>CLIENTE</th>
        <th>FACTURA</th>
        <th>DESCRIP</th>
        <th style="text-align: right;">CANTIDAD</th>
        <th>PRECIO</th>
        <th style="text-align: right;">SUBTOTAL</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item">{query0_VENDEDOR}</td>
            <td class="item">{query0_FECHA}</td>
            <td class="item">{query0_CLIENTE}</td>
            <td class="item">{query0_FACTURA}</td>
            <td class="item">{query0_DESCRIP}</td>
            <td class="num">{query0_CANTIDAD}</td>
            <td class="num">{query0_PRECIO}</td>
            <td class="num">{query0_SUBTOTAL}</td>
        </tr>
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
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_CANTIDAD}</b></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_SUBTOTAL}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


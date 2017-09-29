<!-- 
    Report Template File (facturas_contab)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>
            <link rel="stylesheet" type="text/css" href="templates/reports.css" />
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
			style="font-weight: bold;"><big>Reporte de Facturas Impresas</big></td>
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
        <th>SUC</th>
        <th>FACTURA</th>
        <th>REF</th>
        <th>FECHA</th><th>CLIENTE</th>
        <th style="text-align: right;">INTERNO</th>
        <th style="text-align: right;">F.CONTABLE</th>
        <th>TIPO</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr class="{tr}">
            <td class="item" >{query0_SUC}</td>
            <td class="item" >{query0_FACTURA}</td>
            <td class="item" >{query0_REF}</td>
            <td class="item" style="text-align: center" >{query0_FECHA}</td>
            <td class="item" >{query0_CLIENTE}</td>
            <td  class="num" >{query0_TOTAL}</td>
            <td  class="num" >{query0_TOTAL_FACT}</td>
            <td class="item" style="text-align: center" >{query0_TIPO}</td>
       </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td> <td></td>
            <td></td><td></td>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td> <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_TOTAL}</b></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


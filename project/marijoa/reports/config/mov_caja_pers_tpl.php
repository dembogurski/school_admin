<!-- 
    Report Template File (mov_caja_pers)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="1" cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td style="width: 20%;height:40px;"> </td>
		  <td style="text-align: center;width: 60%;">
			<b>Marijoa</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td  style="width: 20%;">
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big
                      style="font-weight: bold;"><big>Reporte Control de Facturas contra Caja  &nbsp; {sup_empr}</big></td>
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
        <th>FACTURA</th>
        <th>TOTAL</th>
        <th>E_S</th>
        <th>DIFF</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
<tr style="background: {color}">
             <td class="item">{query0_FACTURA}</td>
             <td class="num">{query0_TOTAL}</td>
             <td class="num">{query0_E_S}</td>
             <td class="num">{diff}</td>
             
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
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
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


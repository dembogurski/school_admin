<!-- 
    Report Template File (margenes)

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
			style="font-weight: bold;"><big>Reporte de Margenes y Totales &nbsp;&nbsp; <small> {desde}&nbsp;&nbsp;<->&nbsp;&nbsp;{hasta} </small></big></td>
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
        <th>ID</th>
        <th>FECHA</th>
        <th>SUC</th>
        <th style="text-align: right;">CANT</th>
        <th style="text-align: right;">TOTALES</th>
        <th style="text-align: right;">MARGEN</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item">{query0_ID}</td>
            <td class="item">{query0_FECHA}</td>
            <td class="item">{query0_SUC}</td>
            <td class="num">{query0_CANT}</td>
            <td class="num">{query0_TOTALES}</td>
            <td class="num">{query0_MARGEN}</td>
          </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr> 
            <td></td>
            <td></td>
            <td></td>
            <td></td><td></td>
            <td colspan="2" style="text-align: right;"><b>{porc}&nbsp;%</b></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_CANT}</b></td>
            <td style="text-align: right;"><b>{subtotal0_TOTALES}</b></td>
            <td style="text-align: right;"><b>{subtotal0_MARGEN}</b></td>
        </tr>

<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


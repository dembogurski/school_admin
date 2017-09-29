<!-- 
    Report Template File (sumas_y_saldos)

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
			style="font-weight: bold;"><big>Reporte de Sumas y Saldos</big></td>
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
        <th rowspan="2">CUENTA</th> <th rowspan="2">DESCRIP</th> <th colspan="2">SUMAS</th><th colspan="2">SALDOS</th>
    </tr>    
    <tr>  
        <th>DEBITOS</th>
        <th>CREDITOS</th>
        <th>DEUDOR</th>
        <th>ACREEDOR</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr title="{query0_DB_HB}">
            <td class="item">{query0_CUENTA}</td>
            <td class="item">{query0_DESCRIP}</td> 
            <td class="num">{query0_DEBITOS}</td>
            <td class="num">{query0_CREDITOS}</td>
            <td class="num">{query0_SALDO_DEUDOR}</td>
            <td class="num">{query0_SALDO_ACREEDOR}</td>
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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td> 
            <td style="text-align: right;font-size: 14px"><b>{subtotal0_DEBITOS}</b></td>
            <td style="text-align: right;font-size: 14px"><b>{subtotal0_CREDITOS}</b></td>
            <td style="text-align: right;font-size: 14px"><b>{subtotal0_DEUDOR}</b></td>
            <td style="text-align: right;font-size: 14px"><b>{subtotal0_ACREEDOR}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


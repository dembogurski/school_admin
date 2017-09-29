<!-- 
    Report Template File (rep_stock_min)

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
			<small><small>ycube plus RAD [1.2.16]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Reporte de Stock Minimo</big></td>
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
       <th>{C_EMPR}</th>
        <th>COD_PROD</th>
        <th>{C_FAM}</th>
        <th>{C_GRU}</th>
        <th>{C_TIPO}</th>
        <th>{C_COMP}</th>
        <th>{C_TEMP}</th>
        <th>{C_EST}</th>
        <th>{C_CLA}</th>
        <th>{C_COLOR}</th>
        <th>{C_LISO}</th>
        <th>CANTIDAD</th>
        <th>FP</th>
        <th>VALOR</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr>
            <td class="item">{query0_SUC}</td>
            <td class="item">{query0_COD_PROD}</td>
            <td class="item">{query0_FAM}</td>
            <td class="item">{query0_GRUPO}</td>
            <td class="item">{query0_TIPO}</td>
            <td class="item">{query0_COMP}</td>
            <td class="item">{query0_TEMP}</td>
            <td class="item">{query0_ESTRUCT}</td>
            <td class="item">{query0_CLASIF}</td>
            <td class="item">{query0_COLOR}</td>
            <td class="item">{query0_LISOEST}</td>
            <td class="num">{query0_CANTIDAD}</td>
            <td class="num">{query0_FDP}</td>
            <td class="num">{query0_VALOR}</td>
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
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="num"><b>{cant_total}</b></td>
            <td class="num"><b>{valor_total}</b></td>
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
            <td></td>
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


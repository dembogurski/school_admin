<!-- 
    Report Template File (retazos)

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
			style="font-weight: bold;"><big>Reporte de Retazos</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr> <td align="center" colspan="3"><b>Periodo:&nbsp;&nbsp;</b>{desde}&nbsp;-&nbsp;{hasta}</td></tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>USUARIO</th>
        <th>FECHA</th>
        <th>SUC</th>
        <th>CODIGO</th>
        <th style="text-align: right;">CANT</th>
        <th>P_COMPRA</th>
        <th>VALOR</th>
        <th>DESCRIP</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
             <td class="item">{query0_USUARIO}</td>
            <td class="item">{query0_FECHA}</td>
            <td class="item">{query0_SUC}</td>
            <td class="item">{query0_CODIGO}</td>
            <td class="num">{query0_CANT}</td>
            <td class="num">{query0_P_COMPRA}</td>
            <td class="num">{valor}</td>
            <td class="item">{query0_DESCRIP}</td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td><td></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td colspan="4"><b>Cant:&nbsp;</b>{cant}</td>
             
            <td style="text-align: right;"><b>{subtotal0_CANT}</b></td>
            <td></td><td style="text-align: right;"><b>{z_valor}</b></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


<!-- 
    Report Template File (monit_cliente)

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
			style="font-weight: bold;"><big>Reporte de Monitorio de Clientes</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr>
                    <td colspan="3"> <b>&nbsp;&nbsp;Periodo:</b> <i> {desde}&nbsp;<-->&nbsp;{hasta} &nbsp;&nbsp;&nbsp;{tiempo}&nbsp;  </i> &nbsp;&nbsp;&nbsp;<b>Suc:</b> {sup_suc}&nbsp;&nbsp;&nbsp;<b>Cat:</b> {sup_cli_cat} &nbsp;&nbsp;&nbsp;<b>Rubro:</b> {sup_cli_tipo}</td>                    
                </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>CAT</th>
        <th>TIPO</th>
        <th>PROMEDIO</th>
        <th>CLIENTE</th>
        <th style="text-align: right;">CANT</th>
        <th style="text-align: right;">SUBTOTAL</th>
        <th style="text-align: right;">MARGEN</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item">{query0_CAT}</td>
            <td class="item">{query0_TIPO}</td>
            <td class="item">{query0_PROMEDIO}</td>
            <td class="item">{query0_CLIENTE}</td>
            <td class="num">{query0_CANT}</td>
            <td class="num">{query0_SUBTOTAL}</td>
            <td class="num">{query0_MARGEN}</td>
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
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_CANT}</b></td>
            <td style="text-align: right;"><b>{subtotal0_SUBTOTAL}</b></td>
            <td style="text-align: right;"><b>{subtotal0_MARGEN}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


<!-- 
    Report Template File (rep_ventas_FGT)

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
			style="font-weight: bold;"><big>Reporte de Ventas Grupo Tipo  ({tipo})   &nbsp; {desde}&nbsp;--&nbsp;{hasta}&nbsp; &nbsp; &nbsp;[{sup_rep_localidad}] &nbsp; &nbsp; CAT:&nbsp; &nbsp; {sup_cli_cat} &nbsp; &nbsp; LIMITE:&nbsp; &nbsp; {sup_limite}</big></td>
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
        
        <th>GRUPO</th>
        <th>TIPO</th>
        <th style="text-align: right;">CANT</th>
        <th style="text-align: right;">SUBTOTAL</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>
            
            <td><small>{query0_GRUPO}</small></td>
            <td><small>{query0_TIPO}</small></td>
            <td style="text-align: right;">{query0_CANT}</td>
            <td style="text-align: right;">{query0_SUBTOTAL}</td>
        </div> </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{total0_CANT}</b></td>
            <td style="text-align: right;"><b>{total0_SUBTOTAL}</b></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_CANT}</b></td>
            <td style="text-align: right;"><b>{subtotal0_SUBTOTAL}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: query0_subtotal_row2 -->
        <tr>
            
            <td>{query0_GRUPO}</td>
            <td>{query0_TIPO}</td>
            <td style="text-align: right;"><b>{subtotal0_CANT}</b></td>
            <td style="text-align: right;"><b>{subtotal0_SUBTOTAL}</b></td>
        </tr>
<!-- end:    query0_subtotal_row2 -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


<!-- 
    Report Template File (stock_FG)

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
			style="font-weight: bold;"><big>Reporte de Stock  Grupo Tipo ({sup_p_grupo}-{sup_p_tipo})  FP: {sup_fp}</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr style="font-size:13px;">
        <th>GRUPO</th>
        <th>TIPO</th>
        <th style="text-align: right;">CANT</th>
        <th style="text-align: right;">VALOR_AL_COSTO</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div ><tr>
            <td>{query0_GRUPO}</td>
            <td>{query0_TIPO}</td>
            <td style="text-align: right;">{query0_CANT}</td>
            <td style="text-align: right;">{query0_VALOR_AL_COSTO}</td>
        </div> </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{total0_CANT}</b></td>
            <td style="text-align: right;"><b>{total0_VALOR_AL_COSTO} </b></td> 
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr style="font-size:11px;">
            <td>{query0_GRUPO}</td>
            <td>{query0_TIPO}</td>
            <td style="text-align: right;"> {subtotal0_CANT} </td>
            <td style="text-align: right;"> {subtotal0_VALOR_AL_COSTO}  </td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

 
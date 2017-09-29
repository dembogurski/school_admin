<!-- 
    Report Template File (fdp_compr_res)

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
			style="font-weight: bold;"><big>Reporte de Fines de Pieza relacionados con Compras RESUMIDO <br> Operacion: &nbsp; {sup_aj_oper}<br> Rango compra:&nbsp; {sup_desde}-{sup_hasta} <br> Prov:&nbsp; {prov_nombre}</big></td>
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
        <th style="text-align: right;">CANT_INICIAL</th>
        <th style="text-align: right;">AJUSTE</th>
         
        <th style="text-align: right;">FINAL</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>
            <td>{query0_GRUPO}</td>
            <td>{query0_TIPO}</td>
            <td style="text-align: right;">{query0_CANT_INICIAL}</td>
            <td style="text-align: right;">{query0_AJUSTE}</td>
            
            <td style="text-align: right;">{query0_FINAL}</td>
        </div> </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td colspan="2"><b>Totales </b> </td>
             
            <td style="text-align: right;"><b>{total0_CANT_INICIAL}</b></td>
            <td style="text-align: right;"><b>{total0_AJUSTE}</b></td>
            
            <td style="text-align: right;"><b>{total0_FINAL}</b></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td>{query0_GRUPO}</td>
            <td>{query0_TIPO}</td>
            <td style="text-align: right;"><b>{subtotal0_CANT_INICIAL}</b></td>
            <td style="text-align: right;"><b>{subtotal0_AJUSTE}</b></td>
             
            <td style="text-align: right;"><b>{subtotal0_FINAL}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


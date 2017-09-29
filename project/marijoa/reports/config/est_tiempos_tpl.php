<!-- 
    Report Template File (est_tiempos)

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
			style="font-weight: bold;"><big>Reporte Estadistico de Tiempos de Ventas</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
        <tr> <td colspan="2" align="center"><b>SUC:&nbsp;&nbsp;{sup_suc} &nbsp;&nbsp;&nbsp;&nbsp;USUARIO:&nbsp;&nbsp; {sup_user} &nbsp;&nbsp;&nbsp;&nbsp;ITEMS:&nbsp;&nbsp; {sup_it}&nbsp;&nbsp;&nbsp;&nbsp;{sup_desde}&nbsp;<-->&nbsp;{sup_hasta}</b></td>
         </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
     <th>&nbsp;TURNO</th>
        <th>&nbsp;USUARIO</th>
        <th align="center" >FECHA</th>
        <th align="center">APERTURA</th>
        <th align="center">CIERRE</th>
        <th align="center">DELAY</th>
        <th align="center">ITEMS</th>
        <th align="center">MTS</th>
        <th style="text-align: right;">TOTAL</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
      <tr>
             <td>&nbsp;{query0_TURNO}</td>
            <td>&nbsp;{query0_USUARIO}</td>
            <td align="center">{query0_FECHA}</td>
            <td align="center">{query0_APERTURA}</td>
            <td align="center">{query0_CIERRE}</td>
            <td style="text-align: right;">{query0_DELAY}&nbsp;&nbsp;</td>
            <td style="text-align: right;">{query0_ITEMS}&nbsp;</td>
            <td style="text-align: right;">{query0_MTS}&nbsp;</td>
            <td style="text-align: right;">{query0_TOTAL}&nbsp;</td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td> <td></td>
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
            <td></td> <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
             <td style="text-align: right;"><b>{subtotal0_MTS}</b></td>
            <td style="text-align: right;"><b>{subtotal0_TOTAL}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


<!-- 
    Report Template File (fdp_compras)

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
			style="font-weight: bold;"><big>Reporte de Fines de Pieza relacionados con Compras {desde}--{hasta}</big></td>
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
        <th>NRO_REF_FACT</th>
        <th>FACTURA_REAL</th>
        <th>FECHA_COMPRA</th>
        <th>CODIGO</th>
        <th style="text-align: right;">CANTIDAD</th>
        <th colspan="2">PADRE</th>
		 <th>GRUPO</th>
		        <th>TIPO</th>
        <th>COLOR</th>
        <th>DESCRIP</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>
            <td>{query0_NRO_REF_FACT}</td>
            <td>{query0_FACTURA_REAL}</td>
            <td>{query0_FECHA_COMPRA}</td>
            <td>{query0_CODIGO}</td>
            <td style="text-align: right;">{query0_CANTIDAD}</td>
            <td colspan="2">{query0_PADRE}</td>
			<td>{query0_GRUPO}</td>
			<td>{query0_TIPO}</td>
			<td>{query0_COLOR}</td>
			<td>{query0_DESCRIP}</td>
        </div> </tr>
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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td><b>CANTIDAD DE CODIGOS: &nbsp;&nbsp;&nbsp; {CANTIDAD}</b> </td>
            <td></td>
             <td colspan="2" style="text-align: left;"><b>AJUSTES: &nbsp;&nbsp;&nbsp;  {subtotal0_AJUSTE}</b></td>
             
            <td style="text-align: right;"><b>{TOTAL_CANTIDAD}</b></td>
            <td></td>
			 <td></td>
			             <td></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->

<!-- begin: query0_subtotal_grupo_tipo -->
        <tr style="background-color:#FFCC66;">
            <td></td>
            <td></td>
             <td colspan="2" style="text-align: left;"><b>AJUSTES: &nbsp;&nbsp;&nbsp;  {subtotal0_AJUSTE}</b></td>
             
            <td style="text-align: right;"><b>{subtotal0_CANTIDAD}</b></td>
            <td></td>
			 <td></td>
			             <td></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_grupo_tipo -->
<!-- begin: end_query0 -->

    </tbody>
</table>
<!-- end:   end_query0 -->


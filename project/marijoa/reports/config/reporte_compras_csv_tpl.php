<!-- 
    Report Template File (reporte_compras)

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
			<small><small>ycube plus RAD [1.2.12]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Reporte de Compras del periodo {data_ini} al {data_fin}</big></td>
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
        <th>Nro</th>
        <th>PROVEEDOR</th>
        <th>FECHA</th>
        <th>FACTURA</th>
        <th>MONEDA</th>
        <th style="text-align: right;">SUBTOTAL</th>
        <th style="text-align: right;">VALOR</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>
            <td>{query0_Nro}</td>
            <td>{query0_PROVEEDOR}</td>
            <td>{query0_FECHA}</td>
            <td>{query0_FACTURA}</td>
            <td>{query0_MONEDA}</td>
            <td style="text-align: right;">{query0_CAMBIO}</td>
            <td style="text-align: right;">{query0_VALOR}</td>
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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
             <td></td>
            <td align="right"><B> TOTAL </B></td>
            <td style="text-align: right;"><b>{subtotal0_VALOR}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
 <script>
   this.print();
 </script>
<!-- end:   end_query0 -->


<!-- 
    Report Template File (mov_x_venta_emp)

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
			style="font-weight: bold;"><big>Registro de Ventas y Control de Producto</big></td>
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
        <th>FACTURA</th>
        <th>FECHA</th>
        <th>VENDEDOR</th>
        <th style="text-align: right;">CANTIDAD</th>
        <th>FECHA_CONTROL</th>
        <th>HORA</th>
        <th>CONTROLADO POR</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item">{query0_FACTURA}</td>
            <td class="item">{query0_FECHA}</td>
            <td class="item">{query0_VENDEDOR}</td>
            <td class="num">{query0_CANTIDAD}</td>
            <td class="item">{query0_FECHA_CONTROL}</td>
            <td class="item">{query0_HORA}</td>
            <td class="item">{query0_EMPAQUETADOR}</td>
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
            <td style="text-align: right;"><b>{subtotal0_CANTIDAD}</b></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->


<!-- begin: msg -->
<tr> <td  colspan="7" style="height: 40px;color:red;text-align: center"><b> <img src="images/dialog-warning.png" >&nbsp;&nbsp; El informe solo arrojar&aacute; resultados para ventas posteriores al 21 de dicimebre del 2012! </b></td> </tr>
<!-- end:   msg -->

<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


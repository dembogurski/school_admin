<!-- 
    Report Template File (estado_producto)

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
			style="font-weight: bold;"><big>Estado de Producto</big></td>
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
        <th>Suc</th>
        <th>Estado</th>
        <th>Vendedor</th>
        <th>Codigo</th>
        <th>Precio</th>
        <th >Cantidad</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr>
            <td class="itemc">{query0_NRO}</td>
            <td class="itemc">{query0_SUC}</td>
            <td class="itemc">{query0_ESTADO}</td>
            <td class="item">{query0_VENDEDOR}</td>
            <td class="num">{query0_CODIGO}</td>
            <td class="num">{query0_PRECIO}</td>
            <td class="num">{query0_CANTIDAD}</td>
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
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_CANTIDAD}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->


<!-- begin: cab -->
<tr><th style="text-align: center;height: 38px;vertical-align: bottom" colspan="7">Registro de Fin de Pieza</th></tr>
<tr>  <th>Codigo</th> <th>Usuario</th><th>Fecha</th><th>Hora</th><th>Codigo Factura, Disponibilidad en ese Momento y Cantidad Vendida</th><th>Suc</th><th>Cant. Final</th> </tr>
<!-- end:    cab -->

<!-- begin: fin_pieza -->
        <tr>
            <td class="itemc">{codigo}</td>
            <td class="item">{usuario}</td>
            <td class="item">{fecha}</td>
            <td class="item">{hora}</td>
            <td class="item">{descrip}</td>
            <td class="itemc">{suc}</td>
            <td class="num" >{stockf}</td>
        </tr>
<!-- end:    fin_pieza -->


<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


<!-- 
    Report Template File (det_venta_devol)

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
			style="font-weight: bold;"><big>Detalle de Venta (Informe por Devolucion)</big></td>
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
        <th>CODIGO</th>
        <th>DESCRIPCION</th>
        <th>PRECIO</th>
        <th >CANTIDAD</th>
        <th >SUBTOTAL</th>
        <th >MENSAJE</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item">{query0_CODIGO}</td>
            <td class="item">{query0_DESCRIPCION}</td>
            <td class="num">{query0_PRECIO}</td>
            <td class="num">{query0_CANTIDAD}</td>
            <td class="num">{query0_SUBTOTAL}</td>
            <td class="item" style="font-style: bolder;font-size: 14px;color:{color};height:26px" >{info}</td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td colspan="6" style="font-weight: bolder;font-size: 17px;color:red;height:32px;text-align:center"> 
                Para mercader&iacute;as con cantidad menores a 10 metros solo se permitir&aacute;n devoluciones por Fallas.  
            </td>
             
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_CANTIDAD}</b></td>
            <td style="text-align: right;"><b>{subtotal0_SUBTOTAL}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


<!-- 
    Report Template File (nota_compra)

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
			style="font-weight: bold;"><big>Reporte de Notas de Compra &nbsp;&nbsp;({sup_desde} &nbsp;-&nbsp; {sup_hasta})</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr style="font-size: 13px;">
        <th>PROVEEDOR</th>
        <th>FECHA_PEDIDO</th>
        <th>FECHA_PREVISTA</th>
        <th>NOMBRE_EN_EL_PROV</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th>COLOR</th>
        <th>PRECIO COMPRA</th>
        <th style="text-align: right;">MTs</th>
		 <th>OBS</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr style="font-size: 11px;">
            <td>{query0_PROVEEDOR}</td>
            <td>{query0_FECHA_PEDIDO}</td>
            <td>{query0_FECHA_PREVISTA}</td>
            <td>{query0_NOMBRE_EN_EL_PROV}</td>
            <td>{query0_GRUPO}</td>
            <td>{query0_TIPO}</td>
            <td>{query0_COLOR}</td>
            <td>{query0_PRECIO}</td>
            <td style="text-align: right;">{query0_MTs}</td><td>{query0_OBS}</td>
           
         </tr>
         <tr> <td colspan="10" height="60">. </td> </tr>
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
            <td></td>  <td></td>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr style="font-size: 12px;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_MTs}</b></td>  <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


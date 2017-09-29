<!-- 
    Report Template File (translado_prod)

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
			<small><small>ycube plus RAD [1.2.30b]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Detalle de Translado de Producto &nbsp; &nbsp;  Cod:&nbsp; {sup_cod_prod}</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>Nro</th>
        <th>FECHA</th>
        <th>FECHA CIERRE</th>
        <th>ORIGEN</th>
        <th>DESTINO</th>
        <th>RESPONSABLE</th>  
        <th>RECEPTOR</th>
        <th>CANTDISPONIBLE</th>
        <th>CANTINICIAL</th>
        <th>CODIGOPADRE</th>
	<th>ESTADO</th>
      
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr>
            <td class="item" >{query0_Nro}</td>
            <td class="item" >{query0_FECHA}</td>
            <td class="item" >{query0_FECHA_CIERRE}</td>
            <td class="item" >{query0_ORIGEN}</td>
            <td class="item" >{query0_DESTINO}</td>
            <td class="item" >{query0_RESPONSABLE}</td>
            <td class="item" >{query0_RECEPTOR}</td>
            <td class="num" >{query0_CANTDISPONIBLE}</td>
            <td class="num" >{query0_CANTINICIAL}</td>
            <td class="num" >{query0_CODIGOPADRE}</td>
			<td class="item" >{query0_ESTADO}</td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
            <td></td> <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td><td></td>
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
            <td></td> <td></td>
            <td></td>
            <td></td><td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


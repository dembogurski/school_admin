<!-- 
    Report Template File (analisis_cartera)

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
			style="font-weight: bold;"><big>Analisis de Cartera de Productos</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr style="font-size:12px;">
        <th >TIPO</th>
        <th style="text-align: right;">MARGEN</th>
        <th style="text-align: right;">SUBTOTAL</th>
        <th style="text-align: right;">METROS</th>
        <th style="text-align: right;">PRECIO_V</th>
        <th style="text-align: right;">PRECIO_C</th>
        <th style="text-align: center;">%</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr style="font-size:11px;">
            <td>{query0_TIPO}</td>
            <td style="text-align: right;">{query0_MARGEN}</td>
            <td style="text-align: right;">{query0_SUBTOTAL}</td>
            <td style="text-align: right;">{query0_METROS}</td>
            <td style="text-align: right;">{query0_PRECIO_V}</td>
            <td style="text-align: right;">{query0_PRECIO_C}</td>
            <td style="text-align: right;">{query0_PORC}%</td>
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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr style="font-size:12px;">
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_MARGEN}</b></td>
            <td style="text-align: right;"><b>{subtotal0_SUBTOTAL}</b></td>
            <td style="text-align: right;"><b>{subtotal0_METROS}</b></td>
            <td style="text-align: right;"><b>{subtotal0_PRECIO_V}</b></td>
            <td style="text-align: right;"><b>{subtotal0_PRECIO_C}</b></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->

<!-- begin: head -->
        <tr style="background-color:#FFFFCC;">
            <td colspan="7" align="center" ><b> Rentabilidad {x}  </b> </td> 
        </tr>
<!-- end:    head -->


<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


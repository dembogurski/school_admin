<!-- 
    Report Template File (rep_stock)

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
			<small><small>ycube plus RAD [1.2.16]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Reporte de Stock Fecha compra entre {data_ini} y {data_fin} Fin de Pieza [{fdp}]</big></td>
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
        <th align="center">FECHA</th>
        <th>{C_PROV}</th>
        <th align="center">{C_EMPR}</th>
        <th>COD_PROD</th>
        <th>{C_FAM}</th>
        <th>{C_GRU}</th>
        <th>{C_TIPO}</th>
        <th>{C_COMP}</th>
        <th>{C_TEMP}</th>
        <th>{C_EST}</th>
        <th>{C_CLA}</th>
        <th>{C_COLOR}</th>
        <th>{C_LISO}</th>
        <th align="center">CANTIDAD</th>
        <th align="center">VALOR</th>
       <th align="center">TOTAL</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>
            <td>{query0_Nro}</td>
            <td align="center">{query0_FECHA}</td>
            <td>{query0_PROV}</td>
            <td align="center">{query0_SUC}</td>
            <td>{query0_COD_PROD}</td>
            <td>{query0_FAM}</td>
            <td>{query0_GRUPO}</td>
            <td>{query0_TIPO}</td>
            <td>{query0_COMP}</td>
            <td>{query0_TEMP}</td>
            <td>{query0_ESTRUCT}</td>
            <td>{query0_CLASIF}</td>
            <td>{query0_COLOR}</td>
            <td>{query0_LISOEST}</td>
            <td align="right">{query0_CANTIDAD}</td>
            <td align="right">{query0_VALOR}</td>
	  <td align="right">{TOTAL}</td>
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
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
	    <td></td> 
	  <td>{suma_total}</td>  
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
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td> </td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


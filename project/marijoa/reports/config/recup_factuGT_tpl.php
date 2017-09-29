<!-- 
    Report Template File (recup_factuGT)

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
		  <td style="text-align: center;"><big style="font-weight: bold;" > Reporte de Recupracion de Facturas GRUPO Y TIPO </big> </td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
		<tr> <td colspan="3" align="center"> <b>  <small> ({prov})- {desde}<->{hasta} </small> </b> </td> </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
  <!--     <tr>
        <th>FACTURA</th>
        <th>CODIGOS</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th style="text-align: right;">CANT_COMPRA</th>
        <th style="text-align: right;">PRECIO_COMPRA</th>
        <th style="text-align: right;">VALOR_COMPRA</th>
    </tr>  -->
    <tr style="font-weight:bolder;"> <td>GRUPO</td><td>TIPO</td> <td> SUMA CANT VENDIDA </td><td>SUMA SUB-TOTALES </td><td>SUMA CANT COMPRA  </td> <td>SUMA VALOR COMPRA </td> <td>% Cant Recup: </td><td>% Valor Rec  </td></tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>
            <td>{query0_FACTURA}</td>
            <td>{query0_CODIGOS}</td>
            <td>{query0_GRUPO}</td>
            <td>{query0_TIPO}</td>
            <td style="text-align: right;">{query0_CANT_COMPRA}</td>
            <td style="text-align: right;">{query0_PRECIO_COMPRA}</td>
            <td style="text-align: right;">{query0_VALOR_COMPRA}</td>
        </div> </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr style="font-weight:bolder;font-size:14px;text-align:right;">
            <td> </td>
            <td> </td>
            <td>{ZZ_CANT}</td>
            <td>{ZZ_SUBTOTAL}</td>
            <td>{ZZ_CANT_COMPRA}</td>
            <td>{ZZ_VAL_COMPRA}</td>
            <td>{ZZ_CANT_RECUP}</td>
            <td>{ZZ_VAL_RECUP}</td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_CANT_COMPRA}</b></td>
            <td style="text-align: right;"><b>{subtotal0_PRECIO_COMPRA}</b></td>
            <td style="text-align: right;"><b>{subtotal0_VALOR_COMPRA}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


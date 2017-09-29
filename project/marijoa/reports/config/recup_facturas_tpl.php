<!-- 
    Report Template File (recup_facturas)

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
			style="font-weight: bold;"><big>Reporte de Recupracion de Facturas {tipo}</big></td>
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
    <tr>
        <th><small>FACTURA</small></th>
        <th style="text-align: right;"><small>T_VALOR_COMPRA</small></th>
        <th style="text-align: right;"><small>T_VALOR_REF</small></th>
        <th><small>CODIGOS</small></th>
        <th><small>GRUPO</small></th>
        <th><small>TIPO</small></th>
        <th style="text-align: right;"><small>T_MTS_COMPRADOS</small></th>
        <th style="text-align: right;"><small>T_MTS_FRAC</small></th>
        <th style="text-align: right;"><small>DIFF</small></th>
       <th><small>TOTAL_MTS_VENDIDOS</small></th>
     <!--   <th>PRECIO_VENTA</th> -->
       <th><small>SUBTOTAL_VENTA</small></th>
       <th><small>% RECUP.Mts</small></th>
        <th><small>% RECUP.Valor</small></th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot> 
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>
            <td>{query0_FACTURA}</td>
            <td style="text-align: right;">{query0_TOTAL_VALOR_COMPRA}</td>
            <td style="text-align: right;">{query0_TOTAL_REF}</td>
            <td>{query0_CODIGOS}</td>
            <td><small>{grupo}</small></td>
            <td><small>{tipo}</small></td>
            <td style="text-align: right;">{query0_TOTAL_MTS_COMPRADOS}</td>
             <td style="text-align: right;">{query0_TOTAL_MTS_FRAC}</td>
             <td style="text-align: right;">{DIFF}</td>
	        <td style="text-align: right;">{cantidad}</td>
	   <!-- <td style="text-align: right;">{precio_venta}</td>  -->
	        <td style="text-align: right;">{subtotal_venta}</td>
	        <td style="text-align: center;">{porc_recup}%</td>
	        <td style="text-align: center;">{porc_recupvalor}%</td>
        </div> </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td> <td></td>
            <td></td>
            <td></td>
             <td></td> <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            
            <td style="text-align: right;"><b>{subtotal0_TOTAL_VALOR_COMPRA}</b></td>
            <td style="text-align: right;"><b>{subtotal0_TOTAL_VALOR_REF}</b></td>  
            <td></td><td></td><td></td>


              <td style="text-align: right;" colspan="3"><b>Total Mts. Comprados: {subtotal0_TOTAL_MTS_COMPRADOS}</b></td>
            <td style="text-align: right;"><b>{sumacantidad}</b></td>
           <!-- <td style="text-align: right;"><b>{sumaprecioventa}</b></td> -->
           <td style="text-align: right;"><b>{sumasubtotal}</b></td>
            <td  style="text-align: center;"><b>{tr}%</b></td><td  style="text-align: center;"><b>{tv}%</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


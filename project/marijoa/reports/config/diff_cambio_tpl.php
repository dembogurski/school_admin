<!-- 
    Report Template File (diff_cambio)

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
			style="font-weight: bold;"><big>Reporte de Diferencias de Cambio en Compras</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr> <td colspan="3" style="text-align: center">{sup_desdeinv}<->{sup_hastainv}</td></tr>
	  </tbody>
	</table>
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>REF</th>
        <th>Factura</th>
        <th>Nac_Int</th>
        <th>Proveedor</th>
        <th>Origen Prov</th>
        <th>Fecha Reg</th>
        <th>Fecha Factura</th>
        <th>Fecha Cierre</th>
        <th>Estado</th>
        <th>Valor Total</th>
		<th>IVA</th>
        <th>Moneda</th>
        <th>Cambio</th>
        <th>Cambio Merc</th>
        <th>Sobre Costo</th>
        <th>Valor Stock</th>
        <th>Valor Stock Spec</th>
        <th>Diff</th>
        <th>Metros Vendidos</th>
        <th>Mts. Vend. x T.C.Marijoa</th>
        <th>Mts. Vend. x T.C.Mercado</th>
        <th>Diff. Mts. Vend.</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item">{query0_c_ref}</td>
            <td class="item">{query0_c_factura}</td>
            <td class="item">{query0_c_nac_int}</td>
            <td class="item">{query0_prov_nombre}</td>
            <td class="item">{query0_prov_pais}</td>
            <td class="itemc">{query0_c_fecha}</td>
            <td class="itemc">{query0_c_fechafac}</td>
            <td class="itemc">{query0_c_fecha_cierre}</td>
            <td class="itemc">{query0_c_estado}</td>
            <td class="num">{query0_c_valor_total}</td>
			<td class="itemc">{query0_c_iva}</td>
            <td class="itemc">{query0_c_moneda}</td> 
            <td class="num">{query0_c_cambio}</td>
            <td class="num">{query0_c_cambio_merc}</td>
            <td class="num">{query0_c_sobre_costo}</td>
            <td class="num">{query0_VALOR_STOCK}</td>
            <td class="num">{query0_VALOR_STOCK_TIPO_ESPEC}</td>
            <td class="num">{query0_DIFF}</td>
            <td class="num">{mts_vendidos}</td>
            <td class="num">{XCostoXTCMarijoa}</td>
            <td class="num">{XCostoXTCMercado}</td>
            <td class="num">{XCostoDiff}</td>
            
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
            <td></td>
            <td></td>
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
            <td style="text-align: right;"><b>{subtotal0_DIFF}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


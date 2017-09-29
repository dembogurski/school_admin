<!-- 
    Report Template File (estado_ctas_pro)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header -->
	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 45%;" border="1"cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td style="width: 100px;"> </td>
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
			style="font-weight: bold;">Estado de Cuentas Proveedores <BR>   {desde} &nbsp;&nbsp;{hasta} </td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table><hr />
	<label style="font-size: 12;background-color:orange;font-weight:bold;"> Celdas color "naranja" con devolucion o descuento, Color "Gris" cuotas canceladas </label> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr  style="font-size: 12;">
        <th>REF</th> 
        <th>FACTURA</th>
        <th style="text-align: center;">FECHA_FAC</th>
        <th style="text-align: center;">NRO_CUOTA</th>
        <th style="text-align: center;">MONEDA</th> 
        <th style="text-align: center;">FECHA_VENC</th>
        <th style="text-align: center;">MONTO G$</th>
		<th style="text-align: center;">MONTO U$</th>
        <th style="text-align: center;">Valor CUOTA G$</th>
		<th style="text-align: center;">Valor CUOTA U$</th>		
        <th style="text-align: center;">DIFF G$</th>
		<th style="text-align: center;">DIFF U$</th>			
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->
 
<!-- begin: query0_data_row -->
        <div class="block"><tr style="font-size: 11;background-color:{dev};">
            <td style="background-color:{color};">{query0_REF}</td> 
            <td>{query0_FACTURA}</td>
            <td style="text-align: center;">{query0_FECHA_FAC}</td>
            <td style="text-align: center;">{query0_NRO_CUOTA}</td>
            <td style="text-align: center;">{query0_c_moneda}</td>
            <td style="text-align: center;">{query0_FECHA_VENC}</td>
            <td style="text-align: right;">{query0_MONTOGS}</td>
		    <td style="text-align: right;">{query0_MONTOUS}</td>
            <td style="text-align: right;">{query0_CUOTAGS}</td>
		    <td style="text-align: right;">{query0_CUOTAUS}</td>		  
		    <td style="text-align: right;">{DIFFGS}</td>
		    <td style="text-align: right;">{DIFFUS}</td>	  
        </div> </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr style="font-size: 14;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{total0_MONTOGS}</b></td>
		    <td style="text-align: right;"><b>{total0_MONTOUS}</b></td>
		     <td style="text-align: right;"><b>{total0_CUOTAGS}</b></td>
		    <td style="text-align: right;"><b>{total0_CUOTAUS}</b></td>
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
            
            <td style="text-align: right;"><b>{subtotal0_MONTOGS}</b></td>
			<td style="text-align: right;"><b>{subtotal0_MONTOUS}</b></td>
            <td style="text-align: right;"><b>{subtotal0_CUOTAGS}</b></td>
			<td style="text-align: right;"><b>{subtotal0_CUOTAUS}</b></td>		
            <td style="text-align: right;"><b>{totalDIFFGS}</b></td>
		    <td style="text-align: right;"><b>{totalDIFFUS}</b></td>      	

        </tr> 
<!-- end:    query0_subtotal_row -->

<!-- begin: devol_cab -->
        <tr  style="background-color:#CCCC99;font-size:13px;">
            <td colspan="1" height='14px'> <b> Devoluciones </b>  </td> 
             <td> Cantidad </td> <td> Precio  </td>  <td align='right'> Valor G$ </td> <td align='right'> Valor U$ </td> <td>  Fecha </td>  <td colspan='2'>  Motivo  </td> <td>  Usuario  </td> <td  colspan='4'> Descripci&oacute;n  </td>  
        </tr> 
<!-- end:    devol_cab -->

<!-- begin: desc_cab -->
        <tr>
            <td colspan="12" height='14px' style="background-color:#006699;font-size:13px;"> <b> Descuentos </b>  </td>  
        </tr> 
<!-- end:    desc_cab -->

<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


<!-- begin: vacio -->
        <tr>
            <td colspan="8" height='28px' style="border: 0px solid white; "> &nbsp;</td>  
        </tr> 
<!-- end:    vacio -->


<!-- 
    Report Template File (ventas_cred_cuo)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script type="text/javascript" src="include/jquery.js" > </script>
	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 100%;" border="1" cellpadding="2" cellspacing="0">
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
			style="font-weight: bold;"><big>Reporte de Ventas a Credito</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr><td colspan="3"> <b>Periodo: {desde} <small> &#9668;&#9658; {hasta} </small> &nbsp;&nbsp;&nbsp;&nbsp; <label id="cliente"></label>&#9786; </b> </td> </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>FACTURA</th>
        {cab_cli}
        <th>FECHA_FAC</th>
        <th style="text-align: right;">TOTAL</th>
        <th title="N&deg; de Cuota">N&deg;</th>
        <th>VENC</th>
        <th style="text-align: right;">VALOR_CUOTA</th>
        <th>ESTADO</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
         
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item">{query0_FACTURA}</td>
            {query0_CLIENTE} 
            <td class="item" style="text-align: center">{query0_FECHA_FACTURA}</td>
            <td class="num">{query0_TOTAL}</td>
            <td class="item" style="text-align: center">{query0_CUOTA_NRO}</td>
            <td class="item" style="text-align: center">{query0_VENC}</td>
            <td class="num">{query0_VALOR_CUOTA}</td>
            <td style="background: {fondo};text-align:center" class="item">{query0_ESTADO}</td>
            {titulo_detalle}
         </tr>
         
<!-- end:    query0_data_row -->


<!-- begin: cab_detalle_pago --> 
<tr> <td></td> <h><th> <h><th> <h><th> <h><th> <h><th> <h><th> <h><th>  
    <th>Fecha</th> <th>Concepto</th> <th>Comprobante</th> <th>Monto</th> <th>Saldo</th>
</tr>  
     
<!-- end:    cab_detalle_pago -->

<!-- begin: detalle_pago --> 
 
        <tr>
            <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>  
             <td class="item">{fecha}</td> <td class="item">{conc}</td><td class="item">{comp}</td> <td class="num">{monto}</td>  <td class="num">{saldo}</td> 
        </tr>
<!-- end:    detalle_pago -->

<!-- begin: linea_vacia -->
    <tr><td  colspan="13" style="border:0px" >&nbsp;</td>  </tr> 
        <tr>
           <th>FACTURA</th>
        {cab_cli}
        <th>FECHA_FAC</th>
        <th style="text-align: right;">TOTAL</th>
        <th title="N&deg; de Cuota">N&deg;</th>
        <th>VENC</th>
        <th style="text-align: right;">VALOR_CUOTA</th>
        <th>ESTADO</th>
        <td  colspan="5" style="border:0px" >&nbsp;</td>  
        </tr>
<!-- end:    linea_vacia -->

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
        </tr>       
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            {foot_cli}
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_TOTAL}</b></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_VALOR_CUOTA}</b></td>
            <td></td>
            <td></td>
            
                         
            {z_entrega}
            {z_saldo}
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


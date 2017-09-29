<!-- 
    Report Template File (historial_cli)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
 <style type="text/css">
 .num{
   text-align:right;
   font-size:13px;
    padding-right:3px;
 }
 tr{
    font-size:13px;
 }
 tr>td{
     padding-left:3px;
 }
 tr>th{
     padding-left:3px;
 }
  .head{
    font-size:13px;
    font-weight:bolder;
 }
 .cab{
   -moz-border-radius: 15px 0px 0px -10px;
 }
  .fin{
   
    -moz-border-radius: 0px 15px 0px 0px;
 }
 .vacio{
    height:26px;
    border:solid 0px;
 }

 </style>
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
			style="font-weight: bold;"><big>Historial de Cuenta de Cliente</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
        <tr> <th colspan="3" align="left">&nbsp;&nbsp;Cliente:&nbsp; {sup_cliente} &nbsp;&nbsp; Periodo:&nbsp;<i>{desde}&nbsp; - &nbsp; {hasta} </i> </th> </tr>

	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
 <!--   <tr>
        <th>FACTURA</th>
        <th style="text-align: center;">CUOTA</th>
        <th style="text-align: center;">FECHA DE EMISION</th>
        <th style="text-align: center;">FECHA DE VENCIMIENTO</th>
        <th style="text-align: right;">MONTO&nbsp;</th>
        <th style="text-align: center;">RET. IVA</th>
        <th style="text-align: center;">ESTADO</th>
        <th align="center" colspan="5" style="background-color: lightgray">Detalle de Amortizaciones</th>
    </tr> -->
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
    <tr style="background-color: #F0FFFF">
        <th >REF. Int</th>
        <th style="text-align: center;">SUC</th>
        <th style="text-align: center;">CUOTA</th>
        <th style="text-align: center;">FECHA DE EMISION</th>
        <th style="text-align: center;">FECHA DE VENCIMIENTO</th>
        <th style="text-align: right;">MONTO&nbsp;</th>
        <th style="text-align: center;">RET. IVA</th>
        <th style="text-align: center;">ESTADO</th>
        <th align="center" colspan="5" style="background-color: lightgray">Detalle de Amortizaciones</th>
    </tr>
        <tr>
            <td>{query0_FACTURA}</td>
            <td style="text-align: center;">{query0_SUC}</td>
            <td style="text-align: center;">{query0_NRO_CTA}</td>
            <td style="text-align: center;">{query0_FECHA_EMISION}</td>
            <td style="text-align: center;">{query0_VENCIMIENTO}</td>
            <td style="text-align: right;" class="num">{query0_MONTO}</td>
            <td style="text-align: right;" class="num">{query0_RET}</td>
            <td style="text-align: center;" class="{estado}">{query0_ESTADO}</td>
            {cabecera}
        </tr>
<!-- end:    query0_data_row -->


<!-- begin: detalle -->
   <tr>
   <td colspan="8">{facturas}</td>
   <td style="width:100px">{fecha}</td>
   <td style="width:200px">{concepto}</td>
   <td>{comp}</td>   
   <td class="num">{monto}</td>
   <td class="num">{saldo}</td>
   </tr>
<!-- end:    detalle -->

<!-- begin: sin_detalle -->
   <tr>
   <td colspan="7">{facturas}</td>
    
   </tr>
<!-- end:    sin_detalle -->


<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td><td></td>
            <td><b>TOTAL:</b></td>
            <td style="text-align: right;"><b>{subtotal0_MONTO}</b></td>
            <!-- <td style="text-align: right;"><b>{subtotal0_MONTO_ENTREGA}</b></td> -->
            <td></td>
            <td></td>
            <td colspan="2" style="text-align: right;"><b> Total Pagado:&nbsp;{total0_PAGADO}</b></td> 
           
            <td colspan="2" style="text-align: right;"><b>Saldo Restante:&nbsp;{subtotal0_RESTANTE}</b></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

  


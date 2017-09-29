<!-- 
    Report Template File (nota_ped_x_cod)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
   <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
	<treset_page>
      
 <style>           
 .info, .success, .warning, .error {

margin: 3px 0 5px -5px;
padding: 15px 0 15px 0;
width: 100%;	
text-align: center;
-moz-box-shadow: 0 0 5px #888;
-webkit-box-shadow: 0 0 5px#888;
box-shadow: 0 0 5px #888;
text-shadow: 2px 2px 2px #ccc;
-webkit-border-radius: 15px;
-moz-border-radius: 15px;
border-radius: 15px;
font-weight: bolder;
 
}
.info {
    border: 1px solid #00529B;
    color: #00529B;
    background: #BDE5F8   no-repeat 10px center;
    padding-left: 120px;
}
.success {
    border: 1px solid green;
    color: black;
    background: #DFF2BF url('images/icon-tick.jpg') no-repeat 10px center;
}
.warning {
    color: #9F6000;
    background: #FEEFB3 url('../img/icon-warn.png') no-repeat 10px center;
}
.error {
    border: 1px solid #D8000C;
    color: #D8000C;
    background: #FFBABA url('images/icon-cross.jpg') no-repeat 10px center;
}
        </style>
            
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
			style="font-weight: bold;"><big>Notas de Pedido de un Codigo</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->

<tr> <th colspan="7"  class="info" style="text-align: left;border:  #ADFF2F;padding:3px;font-weight: bolder;font-size: 16;height: 36px">&nbsp;&nbsp;&nbsp;&nbsp;Esta pieza se encuentra en la Sucursal "{suc_prod}"</th> </tr>

<tr><th colspan="7" style="text-align: center;background: #FFD700">Pedidos de Esta pieza</th> </tr>

    <tr>
        <th>NRO</th>
        <th>FECHA</th>
        <th>USUARIO</th>
        <th>ORIGEN</th>
        <th>DESTINO</th>
        <th>CANTIDAD</th>
        <th>ESTADO</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
       <tr>
           <td class="itemc">{query0_NRO}</td>
            <td class="itemc">{query0_FECHA}</td>
            <td class="itemc">{query0_USUARIO}</td>
            <td class="itemc">{query0_ORIGEN}</td>
            <td class="itemc">{query0_DESTINO}</td>
            <td  class="num">{query0_CANTIDAD}</td>
            <td  class="itemc">{query0_ESTADO}</td>
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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_CANTIDAD}</b></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->



<!-- begin: remision -->
        <tr>
           <th colspan="7" style="text-align: center;height: 36px">&nbsp;</th>
        </tr> 
        <tr>
            <th colspan="9" style="text-align: center;background: #DCDCDC">Ultima Remisi&oacute;n hacia "{suc_prod}"</th>
        </tr>
        <tr>
            <th>Nro</th> <th>Fecha</th> <th>Fecha Cierre</th><th>Origen</th><th>Destino</th><th>Responsable</th><th>Recepcionista</th> <th>Cantidad</th><th>Estado</th>
        </tr>
        <tr>
            <td class="itemc">{nro}</td>
            <td class="itemc">{fecha}</td>
            <td class="itemc">{cierre}</td>
            <td class="itemc">{origen}</td>
            <td class="itemc">{destino}</td>
            <td class="itemc">{vend_cod}</td>
            <td class="itemc">{receptor}</td>
            <td class="num">{cant}</td>
            <td class="itemc">{estado}</td>
        </tr>
       <tr>
           <th colspan="9" style="text-align: center;height: 36px">&nbsp;</th>
        </tr>        
<!-- end:    remision -->



<!-- begin: ventash -->
        <tr>
            <th colspan="6" style="text-align: center;height:24px;background: #BDB76B">{titulo_ventas}</th>
        </tr>
        <tr>
            <th>Factura</th> <th>Fecha</th> <th>Suc</th><th>Cliente</th><th>Cantidad</th><th>Total</th>
        </tr>
 
<!-- end:    ventash -->

<!-- begin: ventas -->
 
        <tr>
            <td class="itemc">{fact_nro}</td>
            <td class="itemc">{fact_fecha}</td>
            <td class="itemc">{suc}</td>
            <td class="itemc">{cliente}</td>
            <td class="itemc">{cantidad}</td>
            <td class="itemc">{fact_total}</td>
            
        </tr>
<!-- end:    ventas -->

 

<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->



<!-- begin: msg -->
 
<div class="{class}">{mensaje}</div>
<!-- end:   msg -->


<!-- 
    Report Template File (vent_discr_may)

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
     
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td style="width: 20%;height:40px;"> &nbsp;Suc.:  {sup_empr} </td>
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
			style="font-weight: bold;"><big>Reporte de Ventas Discriminadas / Mayoristas </big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
<tr >
        <th >FACTURA</th>
        <th>CLIENTE</th>
        <th>RUC</th>
        <th>CAT</th>
        <th>FECHA</th>
        <th>VENDEDOR</th>
        <th>TIPO</th>
        
    </tr>
 
 
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="itemc" style="background: #DCD9FC;height:26px;">{query0_NRO}</td>
            <td class="item"  style="background: #DCD9FC">{query0_CLIENTE}</td>
            <td class="itemc" style="background: #DCD9FC">{query0_RUC}</td>
            <td class="itemc" style="background: #DCD9FC">{query0_CAT}</td>
            <td class="itemc" style="background: #DCD9FC">{query0_FECHA}</td>
            <td class="itemc" style="background: #DCD9FC">{query0_VENDEDOR}</td>
            <td class="itemc" style="background: {tipo}">{query0_TIPO}</td>
             <th   style="-moz-border-radius: 0 50 0 0;background: #DCD9FC"> &nbsp;</th> 
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
            <th colspan="12"></th>
              
            <th>{total_cant}</th>
            <th>{total_venta}</th>
			<th></th>
			<th></th>
			<th>{total_ganancia}</th>
            
        </tr>
<!-- end:    query0_subtotal_row -->

<!-- begin: cab_detalle -->
        <tr>
            <th>Codigo</th>
            <th>Descrip</th> 
            <th>Valmin</th>
            <th>Costo</th>
            <th>Precio 1</th>
            <th>Precio 2</th>
            <th>Precio 3</th>
            <th>Precio 4</th>
            <th>Precio 5</th>
            <th>Precio 6</th>
            <th>Precio 7</th>
            <th>Precio Venta</th>
            <th>Cant. Vendida</th>
            <th>Subtotal</th>
            <th>% S/Minimo</th>
            <th>% Gan.</th>
			<th>Valor Gan.</th>
        </tr>
<!-- end:    cab_detalle -->

<!-- begin: detalle -->
        <tr>
            <td class="itemc">{cod}</td>
            <td class="item">{descrip}</td>
            <td class="num">{valmin}</td>
            <td class="num" title="Costo con Porcentaje de Recargo Incluido">{costo}</td>
            <td class="num" style="background:#E9F3F9">{p1}</td>
            <td class="num" style="background:#E9F3F9">{p2}</td>
            <td class="num" style="background:#E9F3F9">{p3}</td>
            <td class="num" style="background:#E9F3F9">{p4}</td>
            <td class="num" style="background:#E9F3F9">{p5}</td>
            <td class="num" style="background:#E9F3F9">{p6}</td>
            <td class="num" style="background:#E9F3F9">{p7}</td>
            <td class="num">{precio_venta}</td>
            <td class="num">{cant}</td>
            <td class="num">{subtotal}</td>
            <td class="itemc">{porc}%</td>
            <td class="itemc">{gan}%</td> 
            <td class="num">{val_gan}</td> 
        </tr>
<!-- end:    detalle -->



<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


<!-- 
    Report Template File (fact_en_caja)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: css noeval -->
	<style>
		.ok{
			
		}
		.err{
			color: red;
		}
		.cli{
			color: #666600;
			background-color: #C8C8C8 ;
		}
		.inf{
			color:blue;
		}
	</style>	
<!-- end:   css -->


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
			<b>MARIJOA</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td>
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Facturas en Caja</big></td>
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
        <th>Factura</th>
        <th>RUC</th>
        <th>CAT</th>
        <th>CLIENTE</th>
        <th>fact_estado</th>
        <th>Fecha</th>
        <th>Vendedor</th>
        <th>Empaque</th>
        <th style="text-align: right;">Total</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr class="{revision}">
            <td>{query0_Factura}</td>
            <td>{query0_RUC}</td>
            <td>{query0_CAT}</td>
            <td>{query0_CLIENTE}</td>
            <td>{query0_fact_estado}</td>
            <td>{query0_Fecha}</td>
            <td>{query0_Vendedor}</td>
            <td>{query0_Empaque}</td>
            <td style="text-align: right;">{query0_Total}</td>
        </div> </tr>
<!-- end:    query0_data_row -->
<!-- begin: cliente -->
        <div class="block"><tr>
            <td align="right" class="inf">&#8627;</td>
            <td class="cli">{cli_RUC}</td>
            <td class="cli">{cli_CAT}</td>
            <td class="cli">{cli_NOMBRE}</td> 
			<td class="cli" colspan="2">Datos de la tabla Clientes</td>
			<td colspan="3" class="inf">Factura Creada en Fecha: {fact_fecha_hora_creacion}</td> 			
        </div> </tr>
<!-- end:    cliente -->
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
            <td style="text-align: right;"><b>{total0_Total}</b></td>
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
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


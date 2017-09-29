<!-- 
    Report Template File (vent_agrup_cat)

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
			style="font-weight: bold;"><big>Reporte de Ventas Agrupadas x Categoria</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                
                <tr>
                    <td style="text-align: center;font-size: 13px" colspan="3"><b>Periodo:&nbsp;&nbsp;&nbsp;</b>{desde}&nbsp;<-->&nbsp;{hasta}</td> 
                </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>SUC</th>
        <th>CAT</th>
        <th>METROS</th>
        <th>%METROS</th>
        <th>VENTAS</th>
        <th>%VENTAS</th>
        <th>COSTO</th>
        <th>%COSTO</th>
        <th>MARGEN</th>
        <th>%MARGEN</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="itemc">{query0_SUC}</td>
            <td class="itemc">{query0_CAT}</td>
            <td class="num">{query0_METROS}</td>
            <td class="itemc">{porc_METROS}%</td>
            <td class="num">{query0_VENTAS}</td>
            <td class="itemc">{porc_VENTAS}%</td>
            <td class="num">{query0_COSTO}</td>
            <td class="itemc">{porc_COSTO}%</td>
            <td class="num">{query0_MARGEN}</td>
            <td class="itemc">{porc_MARGEN}%</td>
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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td style="text-align: right;font-size: 13px"><b>{subtotal0_METROS}</b></td>
            <td style="text-align: center;font-size: 13px"><b>{porc}</b></td>
            <td style="text-align: right;font-size: 13px"><b>{subtotal0_VENTAS}</b></td>
            <td style="text-align: center;font-size: 13px"><b>{porc}</b></td>
            <td style="text-align: right;font-size: 13px"><b>{subtotal0_COSTO}</b></td>
            <td style="text-align: center;font-size: 13px"><b>{porc}</b></td>
            <td style="text-align: right;font-size: 13px"><b>{subtotal0_MARGEN}</b></td>
            <td style="text-align: center;font-size: 13px"><b>{porc}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


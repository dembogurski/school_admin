<!-- 
    Report Template File (alta_clientes)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>
    <style>
 
    .cli{
       font-size:13px;
       font-weight:bolder; 
       background:#FFFFCC;
       padding-left:3px;
    }
    .num{
      text-align:right;
      padding-right:3px;
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
			style="font-weight: bold;"><big>Reporte de Altas de Clientes</big></td>
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
        <th>CLIENTE / CATEGORIA</th>

        <th>FECHA_ALTA</th>
        <th>SUC</th>
        <th>VENDEDOR</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        
        <tr class="cli">
            <td style="padding-left:4px;">{query0_CLIENTE}&nbsp;&nbsp;/&nbsp;&nbsp;(&nbsp;{query0_CATEGORIA}&nbsp;)</td>

            <td style="padding-left:4px;">Fecha alta: &nbsp;{query0_FECHA_ALTA}</td>
            <td style="padding-left:4px;">{query0_SUC}</td>
            <td style="padding-left:4px;">{query0_VENDEDOR}</td>
        </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
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
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


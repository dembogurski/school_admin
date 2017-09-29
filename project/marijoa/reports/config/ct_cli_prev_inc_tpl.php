<!-- 
    Report Template File (ct_cli_prev_inc)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>
     <style>

    tr{
       font-size:13px;
       height:22px;
    }
    th{
       font-size:13px;
       font-weight:bolder;
       text-align:center;
    }
    td{
       font-size:13px; 
        
       padding-left:3px;
    }
    .num{
      text-align:right;
      padding-right:3px;
    }
    .no_display{
       display:none;
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
			style="font-weight: bold;"><big>Cuotas ({sup_ct_tipo})</big></td>
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
        <th>CLIENTE</th>
        <th>FACTURA</th>
        <th>NRO_CTA</th>
        <th>VENCIMIENTO</th>
        <th style="text-align: right;">MONTO</th>
        <th style="text-align: right;">MONTO_ENTREGA</th>
        <th>ESTADO</th>
        <th style="text-align: right;">RESTANTE</th>
        <th>LOCAL</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>
            <td>{query0_CLIENTE}</td>
            <td>{query0_FACTURA}</td>
            <td>{query0_NRO_CTA}</td>
            <td>{query0_VENCIMIENTO}</td>
            <td style="text-align: right;">{query0_MONTO}</td>
            <td style="text-align: right;">{query0_MONTO_ENTREGA}</td>
            <td>{query0_ESTADO}</td>
            <td style="text-align: right;">{query0_RESTANTE}</td>
            <td>{query0_LOCAL}</td>
        </div> </tr>
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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_MONTO}</b></td>
            <td style="text-align: right;"><b>{subtotal0_MONTO_ENTREGA}</b></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_RESTANTE}</b></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


<!-- 
    Report Template File (devol_rep)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>
    <style>

    tr{
       font-size:13px;
       height:26px;
    }
    th{
       font-size:13px;
       font-weight:bolder;
       text-align:center;
    }
    .num{
      text-align:right;
      padding-right:3px;
      font-family:Georgia;
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
			style="font-weight: bold;"><big>Reporte de Devoluciones</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>

        <tr> <td colspan="3" align="center"><b>Fecha/Periodo:&nbsp;&nbsp;{desde}-{hasta} </b> </td> </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>NRO</th>
        <th>CLIENTE</th>
        <th>VENDEDOR</th>
        <th>FECHA</th>
        <th>COD_PROD</th>
        <th>PRECIO</th>
        <th style="text-align: right;">CANT_DEV</th>
        <th style="text-align: right;">MONTO_DEV</th>
        <th>FORMA</th>
        <th>COD_PROD_DEV</th>
        <th>PRECIO_ACT</th>
        <th style="text-align: right;">METROS</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
          <tr>
            <td align="center" >{query0_NRO}</td>
            <td>&nbsp;{query0_CLIENTE}</td>
            <td>&nbsp;{query0_VENDEDOR}</td>
            <td align="center">{query0_FECHA}</td>
            <td>&nbsp;{query0_COD_PROD}</td>
            <td class="num">&nbsp;{query0_precio}</td>
            <td class="num" style="text-align: right;">{query0_CANT_DEV}</td>
            <td style="text-align: right;">{query0_MONTO_DEV}</td>
            <td align="center">{query0_FORMA}</td>
            <td>&nbsp;{query0_COD_PROD_DEV}</td>
            <td  class="num" >{query0_PRECIO_ACT}</td>
            <td class="num"  style="text-align: right;">{query0_METROS}</td>
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
            <td style="text-align: right;"><b>{subtotal0_CANT_DEV}</b></td>
            <td style="text-align: right;"><b>{subtotal0_MONTO_DEV}</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_METROS}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


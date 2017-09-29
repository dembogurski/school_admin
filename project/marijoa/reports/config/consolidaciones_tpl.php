<!-- 
    Report Template File (consolidaciones)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header -->
	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="1"cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 99%;" border="0"
	 cellpadding="0" cellspacing="2">
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
			style="font-weight: bold;"><big>Consolidaciones</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table> 
</td></tr>

<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>FECHA</th>
        <th>CONCEPTO</th>
        <th>COMPLEMENTO</th>
        <th>MONEDA</th>
        <th>ENTRADA</th>
        <th>COTIZ</th>
        <th>MONTO_Moneda_Ref</th>
    </tr>
</thead>
 
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
               {otra_suc}
            <td style="text-align: center;" >{query0_FECHA}</td>
            <td style="text-align: center;" >{query0_CONCEPTO}</td>
            <td>&nbsp;{query0_COMPLEMENTO}</td>
            <td style="text-align: center;" >{query0_MONEDA} </td>
            <td  style="text-align: right;"><b>{query0_ENTRADA} </b>&nbsp;</td>
            <td  style="text-align: right;">{query0_COTIZ} &nbsp;</td>
            <td  style="text-align: right;">{query0_MONTO_Moneda_Ref} &nbsp;</td>
          
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
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


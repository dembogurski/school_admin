<!-- 
    Report Template File (rep_det_mis_ven)

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
    }

    </style>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="0"cellpadding="0" cellspacing="2">
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
			<small><small>ycube plus RAD [1.2.30]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"> Ventas entre {sup_desde} y {sup_hasta} </td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
		
		<tr>  		  <td style="text-align: center;" colspan='3'><big
			style="font-weight: bold;"> {sup_func_nombre} </td></tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>Nro</th>
        <th>CLIENTE</th>
        <th style="text-align: right;">COMISION</th>
        <th style="text-align: right;">TOTAL</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>
            <td>{query0_Nro}</td>
            <td>{query0_CLIENTE}</td>
            <td style="text-align: right;">{query0_COMISION}</td>
            <td style="text-align: right;">{query0_TOTAL}</td>
        </div> </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
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
            <td style="text-align: right;"><b>{subtotal0_COMISION}</b></td>
            <td style="text-align: right;"><b>{subtotal0_TOTAL}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->




<!-- begin: cab_des -->
        <table border="1" cellpadding="0" cellspacing="0">
           <tr> <th>ID</th> <th>COD_FUNC</th><th>VENDEDOR</th><th>MONTO </th> <th>MOTIVO </th><th>FECHA </th><th>ESTADO</th> </tr>

<!-- end:    cab_des -->


<!-- begin: body_desc -->
<tr> <td>{ID}</td><td>{COD_FUNC}</td><td>{VENDEDOR}</td><td>{MONTO}</td> <td>{MOTIVO}</td><td>{FECHA}</td><td>{ESTADO}</td> </tr>
<!-- end:   body_desc -->

<!-- begin: pie_desc -->
</table>
<!-- end:   pie_desc -->

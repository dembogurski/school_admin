<!-- 
    Report Template File (ventas_convenio)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->

 <style type="text/css">
    tr{
       font-size:13px;
       height:24px;

    }
    tr>td{
        padding-left:3px;
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
			<small><small>ycube plus RAD [1.2.17]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Ventas con Convenios desde {data_ini} hasta {data_fin} </big></td>
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
        <th>FACT</th>
        <th>SUC</th>
        <th>FECHA</th>
        <th>CLIENTE</th>
        <th>CI_RUC</th>
        <th>TIPO</th>
        <th>NRO_ORDEN</th>
        <th>CONVENIO</th> 
        <th style="text-align: right;">TOTAL</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>
            <td>{query0_FACT}</td>
            <td align="center">{query0_SUC}</td>
            <td>{query0_FECHA}</td>
            <td>{query0_CLIENTE}</td>
            <td>{query0_CI_RUC}</td>
            <td>{query0_TIPO}</td>
            <td>{query0_NRO_ORDEN}</td>
            <td>{query0_CONVENIO}</td>
  
            <td style="text-align: right;">{query0_TOTAL}</td>
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
 
 
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td><td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;" colspan="2"><b>TOTAL G$ &nbsp;&nbsp;&nbsp; &nbsp; {subtotal0_TOTAL}</b></td>
        </tr>
	<tr>
            <td></td><td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan='2' style="text-align: right;"><b>  Descuentos G$ &nbsp;&nbsp;&nbsp;     {descuento}</b>  </td>
	</tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->



<!-- 
    Report Template File (rep_prod_exist)

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
    .zebra1{
        background:#E8E8E8;
    }
    .zebra0{
      background:white;
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
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Reporte de Existencia actual de Productos&nbsp;&nbsp;&nbsp; {tipo}  &nbsp;Suc.:&nbsp;{sup_rep_localidad}</big></td>
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
        <th>CODIGO</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        {CLASIF}
		{ESTRUC}
		<th>COLOR</th>
        <th style="text-align: center;">STOCK_ACTUAL</th>
        <th style="text-align: center;">COSTO FOB</th>
        <th style="text-align: center;">COSTO CIF</th>
        <th style="text-align: right;">{VALOR_VENTA_1}</th>
        <th style="text-align: right;">{VALOR_VENTA_2}</th>
        <th style="text-align: right;">{VALOR_VENTA_3}</th>
        <th style="text-align: right;">{VALOR_VENTA_4}</th>
        <th style="text-align: right;">{VALOR_VENTA_5}</th>
        <th style="text-align: right;">PRECIO_1</th> 
		 <th style="text-align: right;">ANCHO</th> 
		 
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
       <tr class="zebra{zebra}">
            <td>{query0_CODIGO}</td>
            <td>{query0_GRUPO}</td>
            <td>{query0_TIPO}</td>
			{query0_CLASIF}
			{query0_ESTRUC}			
            <td>{query0_COLOR}</td>

            <td class="num">{query0_STOCK_ACTUAL}</td>
            <td class="num">{query0_VALOR_AL_COSTO}</td>
            <td class="num">{query0_CIF}</td>
            <td class="num">{query0_VALOR_VENTA_1}</td>
            <td class="num">{query0_VALOR_VENTA_2}</td>
            <td class="num">{query0_VALOR_VENTA_3}</td>
            <td class="num">{query0_VALOR_VENTA_4}</td>
            <td class="num">{query0_VALOR_VENTA_5}</td>
            <td class="num">{query0_PRECIO_1}</td>
			<td class="num">{query0_ANCHO}</td>
       </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
    <!--    <tr>
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
			 
        </tr>  -->
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td><b>Cantidad : {contador}</b></td>
            <td></td>
            <td></td>
 
		
			{TCLASIF}
		    {TESTRUC}
            <td></td>
            <td class="num"><b>{subtotal0_STOCK_ACTUAL}</b></td>
            <td class="num"><b>{subtotal0_VALOR_AL_COSTO}</b></td>
            <td class="num"><b>{subtotal0_CIF}</b></td>
            <td class="num"><b>{subtotal0_VALOR_VENTA_1}</b></td>
            <td class="num"><b>{subtotal0_VALOR_VENTA_2}</b></td>
            <td class="num"><b>{subtotal0_VALOR_VENTA_3}</b></td>
            <td class="num"><b>{subtotal0_VALOR_VENTA_4}</b></td>
            <td class="num"><b>{subtotal0_VALOR_VENTA_5}</b></td>
            <td class="num"><b>{subtotal0_PRECIO_1}</b></td>
			<td style="text-align: right;"><b> &nbsp;</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


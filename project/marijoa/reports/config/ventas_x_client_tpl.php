<!-- 
    Report Template File (ventas_x_client)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>
     <style>

    tr{
       font-size:14px;
    }
    tr>td{
        padding-left:3px;
        padding-right:3px;
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
			<small><small>ycube plus RAD [1.2.31] <br> Revisado en: 22-Julio-2010 </small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Reporte de Ventas por cliente ({tipo})  &nbsp;&nbsp;&nbsp;{sup_suc}</big></td>
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
        
        <th>FACTURA</th>
        <th>FECHA</th>
        <th>VENDEDOR</th>
        <th>SUC</th>
		<th>GRUPO</th>
        <th>TIPO</th>
        <th style="text-align: right;">CANTIDAD</th>
        <th style="text-align: right;">PRECIO</th>
       <th style="text-align: right;">SUBTOTAL</th>	 
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>
           
            <td>{query0_NRO}</td>
            <td>{query0_FECHA}</td>
            <td>{query0_VENDEDOR}</td>
            <td>{query0_SUC}</td>
            
            <td>{query0_GRUPO}</td>
            <td>{query0_TIPO}</td>
            <td style="text-align: right;">{query0_CANTIDAD}</td>
             <td style="text-align: right;">{query0_PRECIO}</td>
            <td style="text-align: right;">{query0_SUBTOTAL}</td>
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

<!-- begin: tot_cli -->
        <tr style="font-weight:bolder;font-size:15px;color:red;">
            <td colspan="5" rowspan="3"  > Total de cliente <label style="color:black"> ({cliente})</label> </td> <td>&nbsp;</td>

            <td style="text-align: right;">{Z_CANTIDAD}</td>
            <td>&nbsp;</td>
            <td style="text-align: right;">{Z_SUBTOTAL}</td>
        </tr>
        <tr >    <th style="font-size:15px;background: lightgray"> Limite credito: <label style="color:{color}"> {limite} </label> </th><th colspan="4" style="font-size:15px;background: lightgray" title="TOTAL VENTAS / MESES / 3"> Promedio sobre {meses} meses: {promedio} </th></tr>
        <tr> <td colspan="4">&nbsp;</td> </tr>
<!-- end:    tot_cli -->

<!-- begin: query0_subtotal_row -->
        <tr>
     <!--        <td>  {query0_CLIENTE}  </td> -->
            <td>{query0_NROS}</td>
            <td>{query0_FECHAS}</td>
            <td>{query0_VENDEDORS}</td>
            <td>{query0_SUCS}</td>
            
            <td>  {query0_GRUPOS}  </td>
            <td>{query0_TIPOS}</td>
            
            <td style="text-align: right;"><b>{subtotaCANTIDAD}</b></td>
            <td style="text-align: right;"><b>{subtotaPRECIO}</b></td>
            <td style="text-align: right;"><b>{subtotaSUBTOTAL}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


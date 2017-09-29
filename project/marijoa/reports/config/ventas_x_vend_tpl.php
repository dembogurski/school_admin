<!-- 
    Report Template File (ventas_x_vend)

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
		  <td style="text-align: center;"><big 	style="font-weight: bold;" > Reporte de Ventas por Vendedor </big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>

        <tr> <td colspan="3" align="center" > <b> Periodo: </b> {data_ini}&nbsp;<-->&nbsp;{data_fin}&nbsp;&nbsp;&nbsp;<b> Vendedor: {sup_func_nombre} </b> </td> </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr style="font-size:13px; font-weight:bolder;">
        <th>NRO</th>
        <th>FECHA</th>
        <th>CLIENTE</th>
        <th align="center" >CAT</th>
        <th>CODIGO</th>
        <th  align="center" >PRECIO</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th style="text-align: right;">CANTIDAD</th>
        <th style="text-align: right;">SUBTOTAL</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr style="font-size:12px; ">
            <td>{query0_NRO}</td>
            <td>{query0_FECHA}</td>
             <td>{query0_CLIENTE}</td>
            <td align="center" >{query0_CAT}</td>
            <td> &nbsp;{query0_CODIGO} &nbsp;</td>
            <td  align="right" >{query0_PRECIO}&nbsp;</td>
            <td> &nbsp;{query0_GRUPO}</td>
            <td> &nbsp;{query0_TIPO}</td>
            <td style="text-align: right;">{query0_CANTIDAD}&nbsp;</td>
            <td style="text-align: right;">{query0_SUBTOTAL}&nbsp;</td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr  style="font-size:13px; font-weight:bolder;">
            <td> <b> Cant. Facturas:  {cant} </b> </td>
            <td>C1: &nbsp; {r1} </td>
            <td>C2: &nbsp; {r2} </td>
            <td>C3: &nbsp; {r3} </td>
            <td>C4: &nbsp; {r4} </td>
            <td>C5: &nbsp; {r5} </td>
            <td> P Min. 5%: &nbsp; {p5}&nbsp;&nbsp;&nbsp;&nbsp;P Min. 8%: &nbsp; {p8}  </td>
             <td> </td>
            <td style="text-align: right;"><b>{total0_CANTIDAD}&nbsp;</b></td>
            <td style="text-align: right;"><b>{total0_SUBTOTAL}&nbsp;</b></td>
        </tr>
        <tr  style="font-size:13px; font-weight:bolder;">
            <td> Sumatorias de Mts.</td>
            <td> {Z1} </td>
            <td> {Z2} </td>
            <td> {Z3} </td>
            <td> {Z4} </td>
            <td> {Z5} </td>

            <td>P Min. 5%: &nbsp; {Z6}&nbsp;&nbsp;&nbsp;&nbsp;P Min. 8%: &nbsp; {Z7}  </td>
            <td> </td>
            <td> </td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr  style="font-size:13px; font-weight:bolder;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
             <td> </td>
            <td style="text-align: right;"><b>{subtotal0_CANTIDAD}&nbsp;</b></td>
            <td style="text-align: right;"><b>{subtotal0_SUBTOTAL}&nbsp;</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


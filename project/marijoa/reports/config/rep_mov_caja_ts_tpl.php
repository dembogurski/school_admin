<!-- 
    Report Template File (rep_mov_caja)

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
			style="font-weight: bold;"><big>Reporte de Movimientos de caja (Tesoreria)</big></td>
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
        <th>SUC</th>
        <th>FECHA</th>
        <th>EoS</th>
        <th>COMPLEMENTO</th>
        <th>MONEDA</th>
        <th>ENTRADA</th>
        <th>SALIDA</th>
        <th>COTIZ</th>
        <th style="text-align: center;">E_REF</th>
        <th style="text-align: center;">S_REF</th>
        <th>SALDO</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>
            <td>{query0_SUC}</td>
            <td style="text-align: center;">{query0_FECHA}</td>
            <td>{query0_EoS}</td>
            <td>{query0_COMPL}</td>
            <td style="text-align: center;">{query0_MONEDA}</td>
            <td style="text-align: right;">{query0_ENTRADA}</td>
            <td style="text-align: right;">{query0_SALIDA}</td>
            <td style="text-align: center;">{query0_COTIZ}</td>
            <td style="text-align: right;">{query0_E_REF}</td>
            <td style="text-align: right;">{query0_S_REF}</td>
            <td style="text-align: right;">{query0_SALDO}</td>
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
            <td></td> <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{entrada}</b></td>
            <td style="text-align: right;"><b>{salida}</b></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_E_REF}</b></td>
            <td style="text-align: right;"><b>{subtotal0_S_REF}</b></td>
            <td>&nbsp;</td>
        </tr>
	<tr><td colspan='11'>&nbsp;</td> </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
             
            <td colspan='2' style="text-align: right;background-color:rgb(200,200,200)"><b> Entrada - Salida :  &nbsp;&nbsp;&nbsp;&nbsp;    </b></td>
	  <td   style="text-align: right; "><b> {dif}   </b></td>
           <td colspan='1' style="text-align: right; background-color:rgb(200,200,200)"><b> E - REF - S - REF :  &nbsp;&nbsp;     </b></td>
	   <td   style="text-align: right; "><b>    {diferencia} </b></td>   <td>&nbsp;</td> <td>&nbsp;</td>
</tr>	    
        </tr>
	<tr><td colspan='11'>.</td> </tr>
        <tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


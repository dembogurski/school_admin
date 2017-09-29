<!-- 
    Report Template File (rep_cheq)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
        <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
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
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Cheques  &nbsp; desde: &nbsp; {desde}&nbsp; hasta: {hasta} &nbsp; &nbsp; Cuenta: {sup_chq_cta}</big></td>
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
        <th> &nbsp;CTA</th> 
        <th> &nbsp;Nro</th>
        <th style="text-align: center;">FECHA_EMISION</th>
        <th style="text-align: center;"> FECHA_PAGO</th>
        <th style="text-align: right;">VALOR</th>
        <th>&nbsp;&nbsp;BENEFICIARIO</th>
        <th style="text-align: center;">CONCEPTO</th>
        <th style="text-align: center;">COMPLEMENTO</th>
        <th style="text-align: center;" title="Moneda">MON</th>
        <th style="text-align: center;">ESTADO</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr>
            <td class="item" > &nbsp;{query0_CTA}</td>    
            <td class="item" > &nbsp;{query0_Nro}</td>
            <td  class="item" >{query0_FECHA_EMISION}</td>
            <td   class="item" >{query0_FECHA_PAGO}</td>
            <td  class="num" >{query0_VALOR}</td>
            <td  class="item" > {query0_BENEFICIARIO}</td>
             <td   class="item" >{query0_CONCEPTO}</td>
              <td   class="item" >{query0_COMPL}</td>
            <td   class="item" >{query0_MONEDA}</td>
            <td  class="item" >{query0_ESTADO}</td>
        </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{total0_VALOR}</b></td>
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
            <td style="text-align: right;"><b>{subtotal0_VALOR}</b></td>
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


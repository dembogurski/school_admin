<!-- 
    Report Template File (rep_ventas_det)

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
			<small><small>ycube plus RAD [1.2.16]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Reporte de Ventas Detallado del periodo {data_ini} al {data_fin} {tipo} &nbsp; &nbsp;[{sup_rep_localidad}] </big></td>
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
        <th>Nro</th>
        <th>FECHA</th>
        <th>{C_EMPR}</th>
        <th>{C_CLI}</th>
         
        <th style="text-align: right;">TOTAL</th>
        <th>COD_PROD</th>
        <th>CANT</th>
        <th>SUBTOTAL</th>
        <th>{C_FAM}</th>
        <th>{C_GRU}</th>
        <th>{C_TIPO}</th>
        <th>{C_COMP}</th>
        <th>{C_TEMP}</th>
        <th>{C_EST}</th>
        <th>{C_CLA}</th>
        <th>{C_COLOR}</th>
        <th>{C_LISO}</th>
       
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item">{query0_Nro}</td>
            <td class="item">{query0_FECHA}</td>
            <td class="item">{query0_SUC}</td>
            <td class="item">{query0_CLIENTE}</td>
            
            <td class="num">{query0_TOTAL}</td>
            <td class="item">{query0_COD_PROD}</td>
	    <td class="num">{CANT}</td>
	    <td class="num">{query0_SUBTOTAL}</td>
            <td class="item">{query0_FAM}</td>
            <td class="item">{query0_GRUPO}</td>
            <td class="item">{query0_TIPO}</td>
            <td class="item">{query0_COMP}</td>
            <td class="item">{query0_TEMP}</td>
            <td class="item">{query0_ESTRUCT}</td>
            <td class="item">{query0_CLASIF}</td>
            <td class="item">{query0_COLOR}</td>
            <td class="item">{query0_LISOEST}</td>
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
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
             <td><b>Facts:{f}</b></td>
            <td></td>
            
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_TOTAL}</b></td>
            <td><b>Total:{c}</b></td>
	    <td><b>{m} Mts.</b></td>
            <td align="right"><b>{subtotal0_SUBTOTAL}</b></td>
            <td></td>
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


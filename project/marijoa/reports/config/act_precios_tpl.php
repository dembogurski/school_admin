<!-- 
    Report Template File (act_precios)

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
			style="font-weight: bold;"><big>Actualizacion de Precios </big></td>
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
        <th>COMB</th>
        <th>DESCRIP</th>
        <th style="text-align: right;">CANT_ACT</th>
        <th style="text-align: right;">PRECIO_COMPRA</th>
        <th style="text-align: right;">CANT_X_PR_COMPRA</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>
            <td>{query0_CODIGO}</td>
            <td>{query0_COMB}</td>
            <td>{query0_DESCRIP}</td>
            <td style="text-align: right;">{query0_CANT_ACT}</td>
            <td style="text-align: right;">{query0_PRECIO_COMPRA}</td>
            <td style="text-align: right;">{query0_CANT_X_PR_COMPRA}</td>
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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td><b><big> TOTALES</big> </b></td>
            <td style="text-align: right;"><b>{subtotal0_CANT_ACT}</b></td>
            <td style="text-align: right;"><b>{subtotal0_PRECIO_COMPRA}</b></td>
            <td style="text-align: right;"><b>{subtotal0_CANT_X_PR_COMPRA}</b></td>
        </tr>
       <tr> 
            <td colspan='4'></td>
 
             <td   style="text-align: right;"  ><b><big> Promedio  &nbsp;&nbsp;  {PROMEDIO}</big> </b></td> 
	   <td></td>   
       </tr> 
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


<!-- 
    Report Template File (reporte_ventas)

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
		  <td colspan="3" style="text-align: center;">
			<b>Marijoa</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>		  
		   <td colspan="5" style="text-align: center;">
		       <big	style="font-weight: bold;"><big>Reporte de Ventas </big> 
		       <br> <big> Periodo {data_ini} al {data_fin}</big> 		     		     
   	       </td>  
		</tr>
		   		 
		<tr >
		  <td colspan="1"> <small><small>ycube plus RAD [1.2.12]    </small></small>   </td>		  
		  <td colspan="4" style="text-align: right;">	<small><small>{user} - {time}</small></small>  </td>
		</tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>Nro</th>
        <th>FECHA</th>
        <th>LUGAR</th>
        <th>CLIENTE</th>
        <th>CAT</th>
        <th>VENDEDOR</th>
        <th>COMISION</th>
        <th>TIPO</th>
        <th style="text-align: right;">VALOR</th>
       <th style="text-align: right;">MARGEN</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>
            <td>{query0_Nro}</td>
            <td>{query0_FECHA}</td>
            <td>{query0_LUGAR}</td>
            <td>{query0_CLIENTE}</td>
            <td>{query0_CATEGORIA}</td>
            <td>{query0_VENDEDOR}</td>
            <td>{query0_COMISION}</td>
            <td>{query0_TIPO}</td>
            <td style="text-align: right;">{query0_TOTAL}</td>
	  <th style="text-align: right;">{query0_MARGEN}</th>
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
            <td><b>TOTAL</b>  </td>
            <td style="text-align: right;"><b>{subtotal0_TOTAL}</b></td>
	  <td style="text-align: right;"><b>{subtotal0_MARGEN}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


<!-- 
    Report Template File (prestamos)

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
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Reporte de Prestamos</big></td>
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
   <!--     <th>CHEQUE</th>
        <th style="text-align: right;">VALOR_CHQ</th>
        <th>NOMBRE_DE</th>
        <th>NOMBRE_RAZON_SOCIAL</th>
        <th>COMPROBANTE</th>
        <th>OBS</th>
        <th>COTIZ</th>
        <th>ESTADO</th>
        <th>MONEDA</th>
        <th style="text-align: right;">MONTO</th>
        <th style="text-align: right;">MONTO_MREF</th>
        <th>COMPR_COBRO</th>
        <th>OBS_COBRO</th>
        <th>FECHA_PRES</th>
    </tr> -->
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->

        <tr style="font-weight:bold;font-size:12; background-color:orange;">
            <td> CHEQUE </td>
            <td style="text-align: right;"> VALOR_CHQ </td>
            <td colspan="5"> NOMBRE_DE </td>
        </tr>
         <tr>
            <td>{query0_CHEQUE}</td>
            <td style="text-align: right;">{query0_VALOR_CHQ}</td>
            <td colspan="5">{query0_NOMBRE_DE}</td>
        </tr>  
<!-- end:    query0_data_row -->

<!-- begin: prestamo -->
        <tr style="font-weight:bold;font-size:12;">
            <td> NOMBRE_RAZON_SOCIAL </td>
            <td style="text-align: right;"> MONTO </td>
            <td align="center"> MONEDA </td>
            <td align="center"> COTIZ </td>   
            <td style="text-align: right;"> MONTO_MREF </td> 
            <td align="center"> COMPROBANTE </td>
            <td> OBS </td>
        </tr>
   
        <tr>    
            <td>{query0_NOMBRE_RAZON_SOCIAL}</td>
                  
            <td style="text-align: right;">{query0_MONTO}</td>
            <td align="center">{query0_MONEDA}</td>
            <td align="center">{query0_COTIZ}</td>   
            <td style="text-align: right;">{query0_MONTO_MREF}</td>
             <td align="center">{query0_COMPROBANTE}</td>     
            <td>{query0_OBS}</td>
        </tr>
         <tr style="font-weight:bold;font-size:12; background-color:#FFFFCC;">    
            <td> COMPR_COBRO </td>
            <td colspan="4"> OBS_COBRO </td>
            <td align="center"> FECHA_PRES </td>
            <td> ESTADO </td>
        </tr>             
        
        <tr>    
            <td>{query0_COMPR_COBRO}</td>
            <td colspan="4">{query0_OBS_COBRO}</td>
            <td align="center">{query0_FECHA_PRES}</td>
            <td>{query0_ESTADO}</td>
        </tr>
        <tr  style="background-color:white;"><td height="18" colspan="8"> </td> </tr>
<!-- end:    prestamo -->



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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
   <!--     <tr>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_VALOR_CHQ}</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_MONTO}</b></td>
            <td style="text-align: right;"><b>{subtotal0_MONTO_MREF}</b></td>
            <td></td>
            <td></td>
            <td></td>
        </tr> -->
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


<!-- begin: div -->
        <tr style="font-weight:bold;font-size:14; background-color:lightgray;" >
            <td height="26px" colspan="7"> Prestamos cancelados por Caja </td>
 
        </tr>
<!-- end:    div -->


<!--
        


        <tr> <td height="20px"> </td> </tr>  -->
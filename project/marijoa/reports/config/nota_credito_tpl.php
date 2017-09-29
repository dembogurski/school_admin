<!-- 
    Report Template File (nota_credito)

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
		</tr>
		<tr>
		  <td>
			<small><small>ycube plus RAD [1.2.21]</small></small>
		  </td>
		  <td style="text-align: center;"><big
                      style="font-weight: bold;"><big>Nota de Cr&eacute;dito</big></td>
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
 
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         
         <tr > 
             <td height="30px"><b>&nbsp; N&deg;.:</b>  {nro}</td> <td>&nbsp;<b> FECHA: </b> {data}</td>
         </tr>  
         <tr>  
            <td height="30px" colspan="2"><b>&nbsp; CLIENTE: </b> {cliente} &nbsp; &nbsp; &nbsp;<b>RUC: </b>  {ruc}</td> 
          </tr>
          <tr>
            <td colspan="2" align="center"><b> Detalle </b>   </td>
          </tr>  
           <tr >
            <td height="100px" colspan="2" align="left" style="font-size: 20;"> &nbsp;&nbsp;  {obs} <br>
	      
           </td>
          </tr> 
           <tr >
            <td height="45px" colspan="2" align="left"> &nbsp;&nbsp; <b>  Firma del Receptor    ____________________________	</b>	
           </td>
          </tr> 	  
          <tr>              
            <td colspan="2" align="right"><b> Valor Total: {valor} Gs.</b></td>            
         </tr>   
           
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
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
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>

<script>
    window.opener.close();
</script>
<!-- end:   end_query0 -->


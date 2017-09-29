<!-- 
    Report Template File (imp_cheque_terc)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 50%;padding-left:0.6cm;font-size:12px " border="1" cellpadding="2" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"  cellpadding="2" cellspacing="0">
	  <tbody>
		<tr>
		   
		  <td style="text-align: center;width: 60%;">
			<b>Marijoa</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		   
		  <td style="text-align: center;"><big
                      style="font-weight: bold;"><big>Cheque N&deg; {sup_chq_num} </big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
     
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
       <tr> <th style="text-align: left;" >REF</th><td>{query0_REF}</td>  </tr>
       <tr> <th style="text-align: left;padding-left: 2px" >BANCO</th><td>{query0_BANCO}</td></tr>
       <tr> <th style="text-align: left;padding-left: 2px" >CUENTA</th> <td>{query0_CUENTA}</td></tr>
       <tr> <th style="text-align: left;padding-left: 2px" >N&deg; CHEQUE</th><td>{query0_NRO}</td></tr>
       <tr> <th style="text-align: left;padding-left: 2px" >BENEFICIARIO</th><td>{query0_BENEFICIARIO}</td></tr>
       <tr> <th style="text-align: left;padding-left: 2px" >FECHA REGISTRO</th><td>{query0_FECHA_REGISTRO}</td></tr>
       <tr> <th style="text-align: left;padding-left: 2px" >FECHA PAGO</th><td>{query0_FECHA_PAGO}</td></tr>
       <tr> <th style="text-align: left;padding-left: 2px" >FECHA EMIS</th><td>{query0_FECHA_EMIS}</td></tr>
       <tr> <th style="text-align: left;padding-left: 2px" >VALOR</th><td>{query0_VALOR}</td></tr>
       <tr> <th style="text-align: left;padding-left: 2px" >MONEDA</th><td>{query0_MONEDA}</td></tr>
       <tr> <th style="text-align: left;padding-left: 2px" >COTIZ. a la FECHA</th><td>{query0_COTIZACION_ACTUAL}</td></tr>
       <tr> <th style="text-align: left;padding-left: 2px" >EQUIV_GS</th><td>{query0_EQUIV_GS}</td></tr>
       <tr> <th style="text-align: left;padding-left: 2px" >SUC</th><td>{query0_SUC}</td></tr>
       <tr> <th style="text-align: left;padding-left: 2px" >ADMINISTRATION</th><td>{query0_ADMINISTRATION}</td></tr>
       <tr> <th style="text-align: left;padding-left: 2px" >GERENCIA</th><td>{query0_GERENCIA}</td></tr>
       <tr> <th style="text-align: left;padding-left: 2px" >ESTADO</th><td>{query0_ESTADO}</td></tr>
          
<!-- end:    query0_data_row -->
  

  
<!-- begin: query0_total_row -->
 <tr> <td colspan="2" style="height: 56px;text-align: center;vertical-align:bottom"> 
         <label><b>Retirado por:</b></label>_________________ <label><b>Fecha:&nbsp;</b></label>__/__/_____ 
    </td></tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
   
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


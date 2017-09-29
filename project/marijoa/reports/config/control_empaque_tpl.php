<!-- 
    Report Template File (control_empaque)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 60%;" border="1" cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td style="width: 20%;height:40px;"> </td>
		  <td style="text-align: center;width: 60%;">
			<b>Marijoa</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td  style="width: 20%;">
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Reporte de Control de Empaque</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr> <td colspan="3"> <b>&nbsp;Periodo: {desde}<-> {hasta} &nbsp;SUC</b>&nbsp;&nbsp;{sup_suc}   </td> </tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
<tr  style="font-size: 22px">
             <th style="text-align: left;font-size: 22px;height:36px ">TOTAL FACTURAS:  </th> <td class="num" style="font-size: 22px">{query0_CANT_FACTURAS}</td> <td> </td><td style="width: 20%"> </td>  
         </tr>
         <tr  >
             <th style="text-align: left;font-size: 22px;height:36px">FACTURAS NO CONTROLADAS: </th><td class="num" style="color: {color};font-size: 22px">{SIN_CONTROL}</td><td style="width: 20%"> </td>
         </tr>
         <tr  >
             <th style="text-align: left;font-size: 22px;height:36px">FACTURAS CONTROLADAS: </th><td class="num" style="font-size: 22px">{DIFF}</td><td style="width: 20%;text-align:center "><b> % &nbsp;</b> {porc} </td>
         </tr>
         <!--<tr>
             <th style="text-align: left">Cant. Productos Controlados: </th><td class="num">{AJUSTADOS}</td><td style="width: 20%"> </td>
         </tr>  -->
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
       
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


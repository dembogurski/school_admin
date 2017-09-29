<!-- 
    Report Template File (apg)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>
            <link rel="stylesheet" type="text/css" href="templates/reports.css" />
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
			style="font-weight: bold;"><big>Activos - Pasivos - Gastos</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr> <td colspan="3" align="center"><b>Fecha/Periodo:&nbsp;&nbsp;{desde} & {hasta} &nbsp;&nbsp; [{sup_local}]</b> </td> </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        
        <th>FECHA</th>
        <th>USUARIO</th>
        <th>SUC</th>
        <th>COD</th>
        <th>CONCEPTO</th>
        <th>COMPLEMENTO</th>
        <th style="text-align: right;">MONTO</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
       <tr>
           
            <td class="item" >{query0_FECHA}</td>
            <td class="item" >{query0_USUARIO}</td>
            <td class="item" >{query0_SUC}</td>
            <td class="item" >{query0_COD}</td>
            <td class="item" >{query0_CONCEPTO}</td>
            <td class="item" >{query0_COMPLEMENTO}</td>
            <td  class="num" >{query0_MONTO}</td>
        </div>   
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
       <tr><td colspan="6" style="height:20px">&nbsp; </td></tr>
        <tr>
            
            <td colspan="6" style="background: lightgrey" ><b>&nbsp; TOTALES</b>  </td>  
             
            <td style="text-align: right;background: lightgrey;"><b>{total0_MONTO}</b></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_con -->
        <tr>
             
            <td></td>
            <td></td>
            <td></td>
           <td colspan="3" style="text-align: right; text-align: right; font-size: 13px;font-weight: bolder;font-style: italic"> {TOTAL} {query0_CONCEPTO}   &nbsp;</td>
            
            
            <td  style="text-align: right;font-size: 13px;font-weight: bolder;font-style: italic"> {subtotal0_CONCEPTO} &nbsp;</td>
        </tr>
<!-- end:    query0_subtotal_con -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td colspan="6" style="background: graytext" >  </td>  
            <td style="text-align: right;background: graytext"><b>{subtotal0_MONTO} &nbsp;</b></td>
        </tr>
        <tr> <td colspan="7" style="height:26px;font-style: italic;font-size: 36px" >   &nbsp;&nbsp;{tipo} </td>  </tr>
<!-- end:    query0_subtotal_row -->


<!-- begin: query0_subtotal_row2 -->
        <tr>
            <td colspan="6" style="background: graytext" >  </td>  
            <td style="text-align: right;background: graytext"><b>{subtotal0_MONTO}</b></td>
        </tr>
         
<!-- end:    query0_subtotal_row2 -->

<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


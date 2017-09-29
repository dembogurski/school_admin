<!-- 
    Report Template File (ajustes_x_user)

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
			style="font-weight: bold;"><big>Reporte de Ajustes por Usuario &nbsp;&nbsp;&nbsp; [{sup_usuario}]</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
		<tr> <td> </td> <td style="font-weight: bold;"> Fecha: {sup_desde} </td> </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>CODIGO</th>
        <th>FECHA</th>
        <th>HORA</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th style="text-align: right;">MTS_ORIGINAL</th>
        <th style="text-align: right;">AJUSTE</th>
        <th style="text-align: right;">FINAL</th>
        <th style="text-align: center;">+/-</th>
        
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item"> {query0_CODIGO}</td>
            <td class="itemc" >{query0_FECHA}</td>
            <td class="itemc" >{query0_HORA}</td>
            <td class="item" >{query0_GRUPO}</td>
            <td class="item">{query0_TIPO}</td>
            <td  class="num">{query0_MTS_ORIGINAL} </td>
            <td  class="num">{query0_AJUSTE} </td>
            <td  class="num">{query0_FINAL} </td>
            <td  class="num">{query0_SIGNO}</td> 
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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td colspan="5"><b>Cantidad de Piezas:&nbsp; {i}</b> </td>
   
            <td style="text-align: right;"><b>{subtotal0_MTS_ORIGINAL}</b></td>
            <td style="text-align: right;"><b>{subtotal0_AJUSTE}</b></td>
            <td style="text-align: right;"><b>{subtotal0_FINAL}</b></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


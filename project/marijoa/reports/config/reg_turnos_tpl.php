<!-- 
    Report Template File (reg_turnos)

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
			style="font-weight: bold;"><big>Estadistica de Atencion de (Turnos)</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
		<tr><td colspan='3'>{sup_desde} - {sup_hasta}</td></tr>
	  </tbody>
	</table> 
</td></tr>
</thead>
</tbody>
    
</table>

<table style="text-align: left; width: 60%;border-collapse:collapse" border="1" cellpadding="0" cellspacing="0">
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>Fecha</th>
		<th>Dia</th>
        <th>0-5</th>
        <th>5-10</th>
        <th>10-15</th>
        <th>> 15</th>
    </tr>

 
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr>
            <td class="item">{query0_DIA}</td>
			<td class="item">{query0_DIA_SEM}</td>
            <td class="num">{query0_CERO_5}</td>
            <td class="num">{query0_CINCO_10}</td>
            <td class="num">{query0_DIEZ_15}</td>
            <td class="num">{query0_MAYOR_15}</td>
        </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
   
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
    
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    
</table>
<!-- end:   end_query0 -->


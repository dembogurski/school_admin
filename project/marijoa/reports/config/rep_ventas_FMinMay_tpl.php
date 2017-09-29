<!-- 
    Report Template File (rep_ventas_FMinMay)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 100%;" border="1" cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1" cellpadding="0" cellspacing="0">
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
			style="font-weight: bold;"><big>Reporte de Ventas Sector (Minoristas/Mayoristas)</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr> 
                    <td colspan="3" style="text-align: center">
                        <b>Periodo 1:</b> <i> {desde}&nbsp;--&nbsp;{hasta}  </i>    &nbsp; <b> Suc: </b> {sup_rep_localidad}                       
                    </td>
                </tr>
	  </tbody>
	</table> 
</td></tr>

</thead>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
 
<table style="text-align: left; width: 100%;" border="1" cellpadding="0" cellspacing="0">
    <tr>
        <th colspan="7" style="background: {color}"> {cabecera} </th>
    </tr>

    <tr>
        <th>SECTOR</th>
        <th>CANTIDAD</th>
        <th>%</th>
        <th>VENTAS</th>
        <th>%</th>
        <th>MARGEN</th>
        <th>%</th>
    </tr>

 
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item">{query0_FAM}</td>
            <td class="num">{query0_CANTIDAD}</td>
            <td class="num">{porc_CANTIDAD}</td>            
            <td class="num">{query0_VENTAS}</td>
            <td class="num">{porc_VENTAS}</td>
            <td class="num">{query0_MARGEN}</td> 
            <td class="num">{porc_MARGEN}</td> 
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td style="text-align: left;font-size: 12px;padding-left:3px;font-weight:bolder;font-size:12px"> TOTALES </td>
            <td style="text-align: right;font-size: 12px"><b>{total0_CANTIDAD}</b></td>
            <td style="text-align: right;font-size: 12px"><b>{porc_cant}</b></td>
            <td style="text-align: right;font-size: 12px"><b>{total0_VENTAS}</b></td>
            <td style="text-align: right;font-size: 12px"><b>{porc_ventas}</b></td>
            <td style="text-align: right;font-size: 12px"><b>{total0_MARGEN}</b></td> 
            <td style="text-align: right;font-size: 12px"><b>{porc_margen}</b></td>
        </tr>
</table>
<!-- end:    query0_total_row -->
 
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

<!-- begin: espacio -->
<tr> <td style="height: 36px">&nbsp;</td> </tr>
<!-- end:   espacio -->


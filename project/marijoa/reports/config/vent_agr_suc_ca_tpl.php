<!-- 
    Report Template File (vent_agr_suc_ca)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="1" cellpadding="0" cellspacing="0">
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
			style="font-weight: bold;"><big>Reporte de Ventas Agrupado por Sucursales y Categoria</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr> <td colspan="3" align="center"><b>Periodo: &nbsp; &nbsp; {desde}&nbsp;-&nbsp;{hasta}  </b></td> </tr>
                
	  </tbody>
	</table>
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>SUC</th>
        <th>VENDEDOR</th>
        <th>CAT</th>
        <th style="text-align: right;">VTAS_MTS</th>
        <th style="text-align: right;">VTAS_GS</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
             <td class="item">{query0_SUC}</td>
            <td class="item">{query0_VENDEDOR}</td>
            <td class="item" style="text-align: center">{query0_CAT}</td>
            <td  class="num">{query0_VTAS_MTS}</td>
            <td  class="num">{query0_VTAS_GS}</td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr  >
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;font-size: 14px"><b>{total0_VTAS_MTS}</b></td>
            <td style="text-align: right;font-size: 14px"><b>{total0_VTAS_GS}</b></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;font-size: 14px"><b>{subtotal0_VTAS_MTS}</b></td>
            <td style="text-align: right;font-size: 14px"><b>{subtotal0_VTAS_GS}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->

<!-- begin: query0_subtotal_row_suc -->
<tr style="background-color: lightgray" >
            <td colspan="3"><b>Total de Suc:</b> </td>
             
            <td style="text-align: right;"><b>{subtotal0_VTAS_MTS_SUC}</b></td>
            <td style="text-align: right;"><b>{subtotal0_VTAS_GS_SUC}</b></td>
        </tr>
<!-- end:    query0_subtotal_row_suc -->

<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

